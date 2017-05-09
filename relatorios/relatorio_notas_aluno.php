
<?php
date_default_timezone_set('America/Sao_Paulo');
$dataatual = date('Y-m-d');
$datainicial= date('Y-m-d',strtotime('2017-05-05')); // RTV
$datafinal=  date('Y-m-d',strtotime('2017-05-20')); // RTV
/*
$datainicial= strtotime('2017-06-02'); // PP
$datafinal= strtotime('2017-06-04');  // PP
*/
if($dataatual > $datainicial && $dataatual < $datafinal){

  require_once ("../assets/mPDF/vendor/autoload.php");
  require_once("../classes/class_prova.php");
  require_once("../model/conexao.php");
  $ra = $_POST['ra'];
  $conn = $PDO->prepare("SELECT p.nomealuno, p.nota, qa.*, q.respostacorreta, q.titulo 
                                FROM questoes_aluno qa
                                INNER JOIN questao q
                                ON qa.idquestao = q.id
                                INNER JOIN prova p
                                ON qa.idprova = p.id
                                WHERE p.ra = :ra");
        $conn->bindParam(":ra",$ra,PDO::PARAM_INT);
        $conn->execute();
        $retorno = $conn->fetchAll(PDO::FETCH_ASSOC);
       $conn=null;
       $nota = round($retorno[0]['nota'],1);
      $html = '
      <link rel="stylesheet" type="text/css" href="../assets/reports/css/style.css">
      <header class="clearfix">
        <h1 style="">Gabarito do Aluno</h1>
        <h3> Aluno:'.$retorno[0]['nomealuno'].'</h3>
        <h3> Nota da PU:'.$nota.'</h3>
      </header>
      <main>
        <table>
          <thead>
            <tr>
              <th class="desc" colspan="2">Resposta do Aluno</th>
              <th class="desc" colspan="2">Resposta Correta</th>
              <th class="desc" colspan="2">Enunciado da Questão</th>
            </tr>
          </thead>
          <tbody>';

             foreach ($retorno as $key) {
             $titulo = substr($key['titulo'], 0, 100);
              $html .= '
              <tr>';
                $html .= '
                <td class="desc" colspan="2">'.$key['respostaaluno'].'</td>';
                $html .= '
                <td class="desc nota" colspan="2">'.$key['respostacorreta'].'</td>';
                $html .= '
               <strong> <td class="desc " colspan="2">'.$titulo.'...</td> </strong>';
              $html .= '
              </tr>';
            }
          $html .= '
          </tbody>
        </table>
      </main>';

  $pdf = new mPDF('utf-8', 'A4');
  $file = "relatorio_notas.pdf";
  $pdf->SetHeader('Prova Unificada|Relatório de notas|{PAGENO}');
  $pdf->SetFooter('Turma de Sistemas para Internet@2016||{DATE j-m-Y}');
  $pdf->WriteHTML($html);
  $md = strcode2utf($file);
  $pdf->SetTitle($md);
  $pdf->Output($file, 'I');

  $css = file_get_contents('../assets/reports/css/style.css');
  $pdf->WriteHTML($css,1);
}else{
  echo "<script> alert('O gabarito Não está disponível.');</script>";
  header("Location: ../index.php"); exit; 
}
<?php
  require_once ("../assets/mPDF/vendor/autoload.php");

      include '../model/conexao.php';
          $ra = $_POST['ra'];
          $consulta = $PDO->prepare("SELECT p.nomealuno, p.nota, qa.*, q.respostacorreta 
                                    FROM questoes_aluno qa
                                    INNER JOIN questao q
                                    ON qa.idquestao = q.id
                                    INNER JOIN prova p
                                    ON qa.idprova = p.id
                                    WHERE p.ra = :ra");
            $consulta->bindParam(":ra",$ra,PDO::PARAM_INT);
            $consulta->execute();
            $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);

      $html = '
      <link rel="stylesheet" type="text/css" href="../assets/reports/css/style.css">
      <header class="clearfix">
        <h1 style="">Relatório do Aluno</h1>
      </header>
      <main>
      <h2>Nome do Aluno: '.$resultado[0]['nomealuno'].'</h2>
      <h2>Nota da PU: '.round($resultado[0]['nota'],1).'</h2>
        <table>
          <thead>
            <tr>
              <th class="desc" colspan="2">Id Questão</th>
              <th class="desc" colspan="2">Alt. Selecionada</th>
              <th class="desc" colspan="2">Alt. Correta</th>
            </tr>
          </thead>
          <tbody>';
          
            

             foreach ($resultado as $linha) {
              $html .= '
              <tr>';
                $html .= '
                <td class="desc" colspan="2">'.$linha['idquestao'].'</td>';
                $html .= '
               <strong> <td class="desc" colspan="2">'.$linha['respostaaluno'].'</td> </strong>';
                $html .= '
               <strong> <td class="desc nota" colspan="2">'.$linha['respostacorreta'].'</td> </strong>';
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
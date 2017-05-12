
<?php
require_once ("../assets/mPDF/vendor/autoload.php");
require_once("../model/conexao.php");
require_once("../classes/class_disciplina.php");

$curso = $_POST['curso'];
$turno = $_POST['turno'];
$semestre = $_POST['semestre'];

$classeDisciplina = new disciplina();
$disciplinas = $classeDisciplina->selectDisciplinasByCursoTurnoAndSemestre($PDO, $curso, $turno, $semestre);

$conn = $PDO->prepare(
  "SELECT p.id, p.ra, p.nomealuno,
  d.nome, pd.notadisciplina,
  round(p.nota, 1) as nota
  FROM prova p
  INNER JOIN prova_disciplina pd
  ON pd.idprova = p.id
  INNER JOIN disciplina d
  ON d.id = pd.iddisciplina
  AND d.curso = :curso
  AND d.turno = :turno
  AND d.semestre = :semestre
  AND pd.notadisciplina is not null
  ORDER BY p.id;"
);

$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
$conn->bindParam(":semestre",$semestre,PDO::PARAM_INT);

$conn->execute();
$retorno = $conn->fetchAll(PDO::FETCH_ASSOC);
$conn=null;

$html = '
    <link rel="stylesheet" type="text/css" href="../assets/reports/css/style.css">
    <header class="clearfix">
      <h1 style="">Relatório Geral por Turma</h1>
    </header>
    <main>
      <table>
        <thead>
          <tr>
          <th class="desc" colspan="2">RA</th>
          <th class="desc" colspan="2">Nome Aluno</th>
          ';
  foreach ($disciplinas as $key) {
    $html .= '<th class="desc" colspan="2">'.$key['nome'].'</th>';
  }

$html .= '<th class="desc" colspan="2">Nota PU</th>
        </tr>
        </thead>
        <tbody>';
          $controleId = 0;
          $contadorColunas = 0;
          for ($i=0; $i < count($retorno); $i++) {
             if ($controleId != $retorno[$i]['id']){
               $html .= '
               <tr>';
                 $html .= '
                 <td class="desc" colspan="2">'.$retorno[$i]['ra'].'</td>';
                 $html .= '
                 <td class="desc nota" colspan="2">'.$retorno[$i]['nomealuno'].'</td>';

               $controleId = $retorno[$i]['id'];
             }

             if ($contadorColunas != count($disciplinas)) {
               foreach ($disciplinas as $key) {
                 if($retorno[$i]['nome'] == $key['nome']) {
                   $html .= '<td class="desc" colspan="2">'.$retorno[$i]['notadisciplina'].'</td>';
                   $contadorColunas++;
                 }
               }
             } else {
               $html .= '<td class="desc" colspan="2">'.$retorno[$i]['nota'].'</td>';
               $html .= '</tr>';
               $contadorColunas = 0;
             }

             if ($retorno[$i]['id'] != $retorno[$i + 1]['id']) {
               while ($contadorColunas != count($disciplinas)){
                 $html .= '<td class="desc" colspan="2"></td>';
                 $contadorColunas++;
               }
               $html .= '<td class="desc" colspan="2">'.$retorno[$i]['nota'].'</td>';
               $contadorColunas = 0;
             }

          }
        $html .= '
        </tbody>
      </table>
    </main>';

$pdf = new mPDF('utf-8', 'A4-L');
$file = "relatorio_notas.pdf";
//$pdf->SetHeader('Prova Unificada|Relatório de notas|{PAGENO}');
//$pdf->SetFooter('Turma de Sistemas para Internet@2016||{DATE j-m-Y}');
$pdf->WriteHTML($html);
$md = strcode2utf($file);
$pdf->SetTitle($md);
$pdf->Output($file, 'I');

$css = file_get_contents('../assets/reports/css/style.css');
$pdf->WriteHTML($css,1);
?>

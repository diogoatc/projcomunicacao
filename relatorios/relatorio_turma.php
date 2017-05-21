
<?php
require_once ("../assets/mPDF/vendor/autoload.php");
require_once("../model/conexao.php");
require_once("../classes/class_disciplina.php");
require_once("../classes/class_prova.php");

// teste local
//$curso = "PP";
//$turno = "Noturno";
//$semestre = 1;

$curso = $_POST['curso'];
$turno = $_POST['turno'];
$semestre = $_POST['semestre'];

$classeProva = new prova();
$provas = $classeProva->selectProvasByCursoAndTurnoAndSemestre($PDO, $curso, $turno, $semestre);

if (!empty($provas)){

    $classeDisciplina = new disciplina();
    $disciplinas = $classeDisciplina->selectDisciplinasByCursoTurnoAndSemestre($PDO, $curso, $turno, $semestre);

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

    foreach ($provas as $prova) {
        $html .= '<tr>';
        $html .= '<td class="desc" colspan="2">'.$prova['ra'].'</td>';
        $html .= '<td class="desc nota" colspan="2">'.$prova['nomealuno'].'</td>';

        $notasdisciplinas =
            $classeDisciplina->selectNotasDisciplinasByIdProva($PDO, $prova['id']);

        foreach ($disciplinas as $disciplina) {

            $notaImpressa = "-";

            foreach ($notasdisciplinas as $nota) {
                if ($nota['iddisciplina'] == $disciplina['id']) {
                    $notaImpressa = $nota['notadisciplina'];
                }
            }

            $html .= '<td class="desc nota" colspan="2">'.$notaImpressa.'</td>';

        }

        $html .= '<td class="desc" colspan="2">'.$prova['notaPu'].'</td>';
        $html .= '</tr>';
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
} else {
    echo "<script> alert('Nenhuma prova encontrada para esta turma.');</script>";
}
?>
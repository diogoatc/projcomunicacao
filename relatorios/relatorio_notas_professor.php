<?php
  require_once ("../assets/mPDF/vendor/autoload.php");

      $html = '
      <link rel="stylesheet" type="text/css" href="../assets/reports/css/style.css">
      <header class="clearfix">
        <h1 style="">Relatório de Notas</h1>
      </header>
      <main>
        <table>
          <thead>
            <tr>
              <th class="desc" colspan="2">RA</th>
              <th class="desc" colspan="2">Aluno</th>
              <th class="desc" colspan="2">Nota</th>
            </tr>
          </thead>
          <tbody>';
          include '../model/conexao.php';
          $curso = $_POST['curso'];
          $turno = $_POST['turno'];
          $semestre = $_POST['semestre'];
          $consulta = $PDO->prepare("SELECT DISTINCT P.id, P.ra, P.nomealuno, ROUND(P.nota, 1) AS nota
                                      FROM prova P
                                      INNER JOIN prova_disciplina PD
                                      ON P.id = PD.idprova
                                      INNER JOIN disciplina D
                                      ON D.id = PD.iddisciplina
                                      AND D.curso=:curso 
                                      AND D.turno=:turno
                                      AND D.semestre=:semestre
                                      ORDER BY P.nomealuno ASC;");
            $consulta->bindParam(":curso",$curso,PDO::PARAM_STR);
            $consulta->bindParam(":turno",$turno,PDO::PARAM_STR);
            $consulta->bindParam(":semestre",$semestre,PDO::PARAM_STR);
            $consulta->execute();
            $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);

             foreach ($resultado as $linha) {
              $html .= '
              <tr>';
                $html .= '
                <td class="desc" colspan="2">'.$linha['ra'].'</td>';
                $html .= '
                <td class="desc" colspan="2">'.$linha['nomealuno'].'</td>';
                $html .= '
               <strong> <td class="desc nota" colspan="2">'.$linha['nota'].'</td> </strong>';
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

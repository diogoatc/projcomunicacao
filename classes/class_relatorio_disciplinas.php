<?php
  require_once ("../assets/mPDF/vendor/autoload.php");

      $html = '
      <link rel="license" href="../assets/reports/css/style.css">
      <header class="clearfix">
        <h1 style="">Relatório de todas as Disciplinas</h1>
      </header>
      <main>
        <table>
          <thead>
            <tr>
              <th class="desc" colspan="4">Disciplina</th>
              <th class="desc" colspan="4">Curso</th>
              <th class="desc" colspan="4">Turno</th>
              <th class="desc" colspan="4">Semestre</th>
              <th class="desc" colspan="4">RA</th>
              <th class="desc" colspan="4">Aluno</th>
              <th class="desc" colspan="4">Nota</th>
            </tr>
          </thead>
          <tbody>';
          include '../model/conexao.php';
          $idusuario = $_GET['idusuario'];
          $consulta = $PDO->query("SELECT D.nome, D.curso, D.turno, D.semestre,P.ra, P.nomealuno, ROUND(P.nota, 1) AS nota
                                    FROM disciplina D
                                    INNER JOIN prova_disciplina PD
                                    ON D.id = PD.iddisciplina
                                    INNER JOIN prova P
                                    ON P.id = PD.idprova WHERE D.idusuario = 2");
            $consulta->execute();
            $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);

             foreach ($resultado as $linha) {
              $html .= '
              <tr>';
                $html .= '
                <td class="desc" colspan="4">'.$linha['nome'].'</td>';
                $html .= '
                <td class="desc" colspan="4">'.$linha['curso'].'</td>';
                $html .= '
                <td class="desc" colspan="4">'.$linha['turno'].'</td>';
                $html .= '
                <td class="desc" colspan="4">'.$linha['semestre'].'</td>';
                $html .= '
                <td class="desc" colspan="4">'.$linha['ra'].'</td>';
                $html .= '
                <td class="desc" colspan="4">'.$linha['nomealuno'].'</td>';
                $html .= '
                <td class="desc" colspan="4">'.$linha['nota'].'</td>';
              $html .= '
              </tr>';
            }
          $html .= '
          </tbody>
        </table>
      </main>';

  $pdf = new mPDF('utf-8', 'A4');
  $file = "teste.pdf";
  $pdf->SetHeader('unasp@net.com|Relatorio_Teste|{PAGENO}');
  $pdf->SetFooter('Sistema de gerenciamento@2016||{DATE j-m-Y}');
  $pdf->WriteHTML($html);
  $md = strcode2utf($file);
  $pdf->SetTitle($md);
  $pdf->Output($file, 'I');

  $css = file_get_contents('../assets/reports/css/style.css');
  $pdf->WriteHTML($css,1);

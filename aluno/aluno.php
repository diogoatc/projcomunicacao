<?php
if (isset($_POST['fazerprova'])) {
  $nome = $_POST['nome'];
  $ra = $_POST['ra'];
  $semestre = $_POST['semestre'];
  $curso = $_POST['curso'];
  $turno = $_POST['turno'];
  $timezone=date_default_timezone_set('America/Sao_Paulo');
  $horainicio = date('H:i:s');

  echo $nome;
  echo $ra;
  echo $semestre;
  echo $curso;
  echo $turno;
  echo $horainicio;
}
?>

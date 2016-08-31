<?php
if (isset($_POST['fazerprova'])) {
  $nome = $_POST['nome'];
  $ra = $_POST['ra'];
  $semestre = $_POST['semestre'];
  $curso = $_POST['curso'];
  $turno = $_POST['turno'];
  $timezone=date_default_timezone_set('America/Sao_Paulo');
  $horainicio = date('H:i:s');

include('../classes/class_disciplina.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <label for="disciplina">Disciplinas: </label>
    <?php
    $x = new disciplina();
    $retorno = $x->selectDisciplinaByAluno($PDO, $curso, $turno, $semestre);

    foreach ($retorno as $key) {
    ?>
    <input type="checkbox" name="name" value="<?php echo $key['id'] ?>">
    <?php
    echo $key['nomedisciplina']." | ".$key['nomeprofessor']." | ".$key['curso']." | ".$key['turno'];
  }
  ?>
  </body>
</html>
<?php
}
?>

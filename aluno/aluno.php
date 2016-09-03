<?php
//TODO verificar se o aluno fez o pré registro para fazer a prova

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
    <form class="" action="prova.php" method="post">
      <label for="disciplina">Selecione as disciplinas: </label><br>
      <?php
      $x = new disciplina();
      $retorno = $x->selectDisciplinaByAluno($PDO, $curso, $turno, $semestre);

      foreach ($retorno as $key) {
      ?>
      <input type="checkbox" name="check_list[]" value="<?php echo $key['id'] ?>">
      <?php
      echo $key['nomedisciplina']." | ".$key['nomeprofessor']." | ".$key['curso']." | ".$key['turno']." | ".$key['id'];
      echo "<br>";
    }
    ?>
    <input type="submit" name="prova" value="Avançar">
    </form>
  </body>
</html>
<?php
}
?>

<?php
if (!empty($_POST['nome']) and !empty($_POST['ra'])){
if (!isset($_SESSION)) session_start();

include('../classes/class_disciplina.php');

if (isset($_POST['fazerprova'])) {

  $nome = $_POST['nome'];
  $ra = $_POST['ra'];
  $semestre = $_POST['semestre'];
  $curso = $_POST['curso'];
  $turno = $_POST['turno'];
  $timezone=date_default_timezone_set('America/Sao_Paulo');
  $dtainicio = date('Y-m-d H:i:s');

  $_SESSION['nome'] = $nome;
  $_SESSION['ra'] = $ra;
  $_SESSION['dtainicio'] = $dtainicio;

  $x = new disciplina();
  $retorno = $x->selectDisciplinaByAluno($PDO, $curso, $turno, $semestre,$dtainicio);

  if ($retorno == null) {
    /*echo "<script>
    alert('Não há nenhuma prova disponível');
    window.location='index.php';
    </script>"; */
    echo $dtainicio."<br/>";
    echo $turno."<br/>";
    echo $curso."<br/>";

  }
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Prova Unificada</title>
  </head>

<body>

      <div class="container">
      <div class="header">
        <img src="../assets/img/UNASP.png" height="66" width="199" alt="logo unasp">
      </div>

          <nav id="menu">
              <h1>Menu Principal</h1>
            <ul type="disc">
              <li><a href="../index.php">MENU</a></li>
            </ul>
          </nav>

      <div class="content" style="top: 44%; height: 220px;width: 480px; left:50%">
      <div class="login" style="font-family:sans-serif; font-size:18pt;">Prova Unificada</div>
      <div class="form" style="top: 30%; width:70%;left:60%;">



          <form class="" action="prova.php" method="post">

            <label style="left:40px;font-size:22px;font-family:sans-serif;" for="disciplina">Selecione as disciplinas</label><br/>
<?php
foreach ($retorno as $key) {
?>

            <input style="width:3%;" type="checkbox" name="check_list[]" value="<?php echo $key['id'] ?>">
<?php
echo $key['nomedisciplina']." | ".$key['nomeprofessor']." | ".$key['curso']." | ".$key['turno']." | ".$key['id'];
echo "<br>";
}
?>

            <input style="width:60%; font-size:22px;left:35px;padding:15px;" type="submit" name="prova" value="Avançar">
          </form>

</body>
      </div>
      </div>
          <footer id="rodape">
            <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>
          </footer>
      </div>
</html>


<?php
}
}else{
  header('Location: index.php');
}
?>

<?php
if (!isset($_SESSION)) session_start();
if (isset($_POST['finalizar'])) {
  $idquestoes = unserialize($_COOKIE['idquestoes']);
  $respquestoes = unserialize($_COOKIE['respquestoes']);
  $disciplinas = unserialize($_COOKIE['check_list']);
  $numQuestoes = count($respquestoes);
  $respostaAluno = array();
  $respIncorretas = 0;

  for ($i=1; $i < $numQuestoes+1; $i++) {
    array_push($respostaAluno, $_POST['respQuestao'.$i.'']);
  }

  for ($i=0; $i < $numQuestoes; $i++) {
    if ($respostaAluno[$i] !== $respquestoes[$i]) {
      $respIncorretas++;
    }
  }
  $nota = (($numQuestoes-$respIncorretas)/$numQuestoes)*10;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Nota Prova Unificada</title>
</head>
<body>
  <h3>Suas respostas: <?php foreach ($respostaAluno as $key) {
    echo $key." | ";
  } ?></h3>
  <h3>Respostas corretas: <?php foreach ($respquestoes as $key) {
    echo $key." | ";
  } ?></h3>
  <h3>Sua nota é: <?php echo round($nota, 1); ?></h3>
</body>
</html>
<?php
require_once('../classes/class_prova.php');
include ('../model/conexao.php');
$x = new prova();
$ra = $_SESSION['ra'];
$nome = $_SESSION['nome'];
$dtainicio = $_SESSION['dtainicio'];

$x->salvarProva($PDO, $ra, $nome, $nota, $dtainicio, $disciplinas, $idquestoes, $respostaAluno);


unset($_SESSION['nome']);
unset($_SESSION['ra']);
?>

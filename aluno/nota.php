<?php


if (isset($_POST['finalizar'])) {
  $questoes = unserialize($_COOKIE['questoes']);
  $disciplinas = unserialize($_COOKIE['check_list']);
  $numQuestoes = count($questoes);
  $respostaAluno = array();
  $respIncorretas = 0;

  for ($i=1; $i < $numQuestoes+1; $i++) {
    array_push($respostaAluno, $_POST['respQuestao'.$i.'']);
  }

  for ($i=0; $i < $numQuestoes; $i++) {
    if ($respostaAluno[$i] !== $questoes[$i]['respostacorreta']) {
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
    <h3>Respostas corretas: <?php foreach ($questoes as $key) {
      echo $key['respostacorreta']." | ";
    } ?></h3>
    <h3>Sua nota é: <?php echo round($nota, 1); ?></h3>
  </body>
</html>

<?php
require_once('../classes/class_prova.php');
include ('../model/conexao.php');
$x = new prova();
$ra = $_COOKIE['ra'];
$nome = $_COOKIE['nome'];
$horainicio = $_COOKIE['horainicio'];

$x->salvarProva($PDO,$ra,$nome,$nota, $horainicio);
$idprova = $x->retornaIdProva($PDO,$ra, $nome);
foreach ($disciplinas as $key) {
  $x->relacionaProvaDisciplina($PDO, $idprova,$key['id']);
}


?>

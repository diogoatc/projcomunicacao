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
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	    <script src="../assets/bootstrap-3.3.7-dist/js/newjs.js"></script>
	      <link rel="stylesheet" href="../assets/css/normalize.css">
	      <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">
	      <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/js/newjs.js">
	      <link rel="stylesheet" href="../assets/css/newstyle.css">
   
</head>
<body>
 <nav class="navbar navbar-inverse" style="border-radius:0px; background:#20205a;">

  <div class="container-fluid">
    
	      <div class="col-sm-5">
	        <a  class="navbar-brand" href="index.php"><img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp"></a>
	     </div>
          
	      <div class="col-sm-3">
	        <h2 style="color:#ffffff;">ÁREA DO ALUNO</h2>
	      </div>
    
    </ul>
  </div>
  </div>
</nav>
<div id="wrap"> 
<div class="text-center" style="margin-top:50px;">
  <h3>Suas respostas: <?php foreach ($respostaAluno as $key) {
    echo $key." | ";
  } ?></h3>
  <h3>Respostas corretas: <?php foreach ($respquestoes as $key) {
    echo $key." | ";
  } ?></h3>
  <h3>Sua nota é: <?php echo round($nota, 1); ?></h3>
</div>
</div>
    <div id="push"></div>
		<div id="footer">
	  <div class="container">
		<p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
	  </div>
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

?>

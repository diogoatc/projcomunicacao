<?php
include '../model/conexao.php';
require_once('../classes/class_prova.php');
if (!isset($_SESSION)) session_start();

$respostas=($_SESSION['resps']);
$disciplinas=($_SESSION['check_list']);
$gabarito = array();
$respostasaluno = array();
$idquestoes = array();
$qtdquestoes = 0;
$incorretas = 0;

//conta a quantidade de questões e de respostas incorretas
foreach ($respostas as $key => $value) {
	$respostaaluno = $_POST['questaoid'.$key];
	if($respostaaluno !== $value){
		$incorretas++;
	}
	
	$qtdquestoes++;
	array_push($respostasaluno,$respostaaluno);
	array_push($gabarito,$value);
	array_push($idquestoes,$key);

}



$nota = (($qtdquestoes-$incorretas)/$qtdquestoes)*10;
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
<div class="panel panel-default" style="margin-left: 30%; margin-right: 30%">
  <h2>Você selecionou as seguintes alternativas:</h2> <h3><?php foreach ($respostasaluno as $key) {
    echo $key." | ";
  } ?></h3>
  </div>
  <br/>
  <div class="panel panel-default" style="margin-left: 40%; margin-right: 40%">
  <h2>Sua nota é:</h2><strong><h2 class="span6 text-danger offset3"> <?php echo round($nota, 1); ?></h2></strong>
  </div>
  <br/>
  <div class=" center-block" style="margin-left: 18%; margin-right: 18%"> 
    <h2 class="bg-primary">Prova Concluída com Sucesso! Você já pode fechar essa tela.</h2>
  </div>
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
$ra= "104696";
$nome="Testeembaralha";
$timezone=date_default_timezone_set('America/Sao_Paulo');
$dtainicio = date('Y-m-d H:i:s');
echo "Sua nota é: ".$nota;
$x = new prova();
$x->salvarProva($PDO, $ra, $nome, $nota, $dtainicio, $disciplinas, $idquestoes, $respostasaluno);
?>
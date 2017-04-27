<?php
if (!isset($_SESSION)) session_start();
include_once('../model/conexao.php');
include('../classes/class_questao.php');
include('../classes/class_disciplina.php');
$check_list = array(1,6,11,12,13,14,32);

$array_questoes = array();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teste embaralhamento</title>
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
	<style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section2 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section3 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section4 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section5 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section6 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section7 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#20205a;">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      <img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp">
         </a>
    </div>
    <div>
       <div class="collapse navbar-collapse" id="myNavbar">
	<?php 
  $section="";
  $contador=1;
  foreach ($check_list as $disc) {
    $disciplina = new disciplina();
    $retornonome= $disciplina->selectNomeDisciplinaById($PDO,$disc);
    if ($retornonome !== $section) {
             $section = $retornonome;
             echo '<ul class="nav navbar-nav">
             <li><a href="#section'.$contador.'">'.$section.'</a></li></ul>';
             $contador++;
           }
  } 
  ?>
  </div>
    </div>
  </div>
</nav>
  <form method="POST" action="recebe.php">
  <?php
  $cont=1;
  $nome="";
  $contquestao=1;
	foreach ($check_list as $id) {
    	$disciplina = new disciplina();
   		$retornonome= $disciplina->selectNomeDisciplinaById($PDO,$id);
    	if ($retornonome !== $nome) {
    $nome = $retornonome;
    echo '<div id="espaco"></div>
          <div id="section'.$cont.'" class="container-fluid text-center">
          <legend id="alinhamento" class="text-center"><strong>'.$nome.'</strong></legend>';
    $cont++;
  }
   		
   		$questao = new questao();
    	$retorno = $questao->selectQuestaoByDisciplina($PDO, $id);
    	shuffle($retorno);
      
    	foreach ($retorno as $questoes) {
    	echo "</div>
        <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
        <h2><strong>Questão ".$contquestao++."</strong></h2>";
    	echo "<h3 style='white-space: pre-wrap; text-align:justify;'> {$questoes['titulo']}</h3>"; 	
       if (!empty($questoes['imagem'])){
        echo '<div id="espacoum"></div>
                <div class="col-md-5 col-md-offset-2">
                <img class="responsiva" style="margin-bottom:20px;" alt="imagem" src="data:image/jpg;base64,'.$questoes['imagem'].'" />

                </div>
                <br/>';
       }else{
        echo "";
       }
			echo "<input type='radio' name='questaoid{$questoes['id']}' value='A'> {$questoes['resposta1']} <br/>" ;
			echo "<input type='radio' name='questaoid{$questoes['id']}' value='B'> {$questoes['resposta2']} <br/>" ;
			echo "<input type='radio' name='questaoid{$questoes['id']}' value='C'> {$questoes['resposta3']} <br/>" ;
			echo "<input type='radio' name='questaoid{$questoes['id']}' value='D'> {$questoes['resposta4']} <br/>" ;
			echo "<input type='radio' name='questaoid{$questoes['id']}' value='E'> {$questoes['resposta5']} <br/>" ;
			$id = $questoes['id'];
			$respostascertas[$id] = $questoes['respostacorreta'];
      
    	}
	}
	$_SESSION['resps']=$respostascertas;
	print_r($_SESSION['resps']);
	?>
	<input type="submit" name="envia" value="ENVIA">
</form>
</body>
</html>
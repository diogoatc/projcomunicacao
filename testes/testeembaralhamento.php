<?php
if (!isset($_SESSION)) session_start();
include_once('../model/conexao.php');
include('../classes/class_questao.php');
include('../classes/class_disciplina.php');
$check_list = array(1,2,3,4,5);

$array_questoes = array();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teste embaralhamento</title>
	<style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section2 {padding-top:50px;height:auto;color: black; background -color: #ffffff}
  #section3 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section4 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section5 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section6 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section7 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<form method="POST" action="recebe.php">
	<?php 
	foreach ($check_list as $id) {
    	$disciplina = new disciplina();
   		$retornonome= $disciplina->selectNomeDisciplinaById($PDO,$id);
    	echo "<h3> Disciplina: ".$retornonome;
   		
   		$questao = new questao();
    	$retorno = $questao->selectQuestaoByDisciplina($PDO, $id);
    	shuffle($retorno);
    	foreach ($retorno as $questoes) {
    	
    		echo "<h3> {$questoes['titulo']}</h3>"; 	
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
<?php
if (!isset($_SESSION)) session_start();
include_once('../model/conexao.php');
include('../classes/class_questao.php');
include('../classes/class_disciplina.php');
$check_list = array(1,2,3,4,5);

$array_questoes = array();
  foreach($check_list as $id) {
    $questao = new questao();
    $retorno = $questao->selectQuestaoByDisciplina($PDO, $id);
    foreach ($retorno as $key) {
    	array_push($array_questoes, $key);
    }
    
	}
	shuffle($array_questoes);
	$respostascertas = array();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teste embaralhamento</title>
</head>
<body>
<form method="POST" action="recebe.php">
	<?php 
	
	foreach ($array_questoes as $questoes) {
		echo "<h3> {$questoes['titulo']}</h3>"; 	
		echo "<input type='radio' name='questaoid{$questoes['id']}' value='A'> {$questoes['resposta1']} <br/>" ;
		echo "<input type='radio' name='questaoid{$questoes['id']}' value='B'> {$questoes['resposta2']} <br/>" ;
		echo "<input type='radio' name='questaoid{$questoes['id']}' value='C'> {$questoes['resposta3']} <br/>" ;
		echo "<input type='radio' name='questaoid{$questoes['id']}' value='D'> {$questoes['resposta4']} <br/>" ;
		echo "<input type='radio' name='questaoid{$questoes['id']}' value='E'> {$questoes['resposta5']} <br/>" ;
		$id = $questoes['id'];
		$respostascertas[$id] = $questoes['respostacorreta'];
		
	}
	$_SESSION['resps']=$respostascertas;
	print_r($_SESSION['resps']);
	?>
	<input type="submit" name="envia" value="ENVIA">
</form>
</body>
</html>
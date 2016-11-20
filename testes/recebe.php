<?php
if (!isset($_SESSION)) session_start();

$respostas=($_SESSION['resps']);
$gabarito = array();
$respostasaluno = array();
$idquestoes = array();
$qtdquestoes = 0;
$incorretas = 0;

foreach ($respostas as $key => $value) {
	$respostaaluno = $_POST['questaoid'.$key];
	$qtdquestoes++;
	array_push($respostasaluno,$respostaaluno);
	array_push($gabarito,$value);
	array_push($idquestoes,$key);
	if($respostaaluno !== $value){
		$incorretas++;
	}

	echo "Resposta correta: ".$value ."<br/>";
	echo"resposta escolhida: ".$_POST['questaoid'.$key]."<br/>";

}
print_r($idquestoes);
?>
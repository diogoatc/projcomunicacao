<?php
include '../model/conexao.php';
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
echo var_dump($idquestoes);
echo "<br/>";
echo "-------------------------------------------";
echo var_dump($disciplinas);
//*echo "Sua nota é: ",round($nota, 1);
?>
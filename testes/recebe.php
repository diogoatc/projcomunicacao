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
$ra= "104696";
$nome="Testeembaralha";
$timezone=date_default_timezone_set('America/Sao_Paulo');
$dtainicio = date('Y-m-d H:i:s');

$x = new prova();
$x->salvarProva($PDO, $ra, $nome, $nota, $dtainicio, $disciplinas, $idquestoes, $respostasaluno);
?>
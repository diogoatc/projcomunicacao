<?php
include '../model/conexao.php';

$conn=$PDO->prepare("SELECT id,respostacorreta FROM questao WHERE iddisciplina=:iddisc");
$check=array(1,6);
$respostascertas=array(2=>"A",1=>"B",15=>"D"); // O GABARITO é: B A D B
foreach ($check as $key) {
	$conn->bindParam(":iddisc",$key, PDO::PARAM_INT);

if($conn->execute()){
			$retorno=$conn->fetchAll();
		}else{
			echo "ERRO VERIFICA Prova";
		}
		$totalquestoes=count($retorno);
		$incorretas=0;
		var_dump($retorno);
foreach ($retorno as $questao) {
	
		foreach ($respostascertas as $id => $resposta) {
			if($questao['id']==$id){
				if($questao['respostacorreta']!=$resposta){
					$incorretas++;
				}
			}
		}

	}
	$nota = (($totalquestoes-$incorretas)/$totalquestoes)*10;
	echo "Nota da disciplina id: ".$key." é: ".$nota."<br/>";
	//echo $incorretas;
}


	
/*$teste=array();
$iddisciplina=array(1,2,3);
$idquestao=array(5=>"a",21=>"b",35=>"c",44=>"d",321=>"e",2412=>"f");
$respostas = array("a","b","c","d","e","f");
$batata = 3;
$feijao = "feijão";

var_dump($idquestao);*/

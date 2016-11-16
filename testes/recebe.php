<?php
if (!isset($_SESSION)) session_start();

$respostas=($_SESSION['resps']);


foreach ($respostas as $key => $value) {

	if($_POST['questaoid'.$key] == $value){
		echo "Tá certa <br/>";
	}else{
		echo "tá errada <br/>";
	}
	
	echo "Resposta correta: ".$value ."<br/>";
	echo"resposta escolhida: ".$_POST['questaoid'.$key]."<br/>";

}

?>
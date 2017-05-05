<?php

$arrayName = array('teste' =>'batata' , 'teste2' => 'feijão', 'teste3' => 'banana');

$contador=0;
foreach ($arrayName as $key => $value) {
	array_push($arrayName, $value);
}

var_dump($arrayName);
?>
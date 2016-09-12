<?php
/*
$host = "169.44.117.18:3306";
$user ="root";
$pswrd = "unasp";
$dbname = "projcomunicacao";
*/

$host = "127.0.0.1:3306";
$user ="root";
$pswrd = "root";
$dbname = "projcomunicacao";

try{
	$PDO = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname,
	$user, $pswrd,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch ( PDOException $e ){
	echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
?>

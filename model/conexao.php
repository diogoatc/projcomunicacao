<?php
<<<<<<< HEAD
//Servidor de produção
=======
/*//Servidor de produção
>>>>>>> da9ddcdcaf58574c96195396b7d792ac372646cb
$host = "169.44.117.18:3306";
$user ="root";
$pswrd = "unasp";
$dbname = "projcomunicacao";
*/
//Servidor de testes

$host = "us-cdbr-iron-east-04.cleardb.net";
$user ="b74daafaa1c67b";
$pswrd = "30316046";
$dbname = "ad_ef0ae188db8c966";

<<<<<<< HEAD
//Servidor de testes

/*$host = "us-cdbr-iron-east-04.cleardb.net";
$user ="b74daafaa1c67b";
$pswrd = "30316046";
$dbname = "ad_ef0ae188db8c966";
*/
=======
>>>>>>> da9ddcdcaf58574c96195396b7d792ac372646cb
//Servidor Local
/*
$host = "127.0.0.1:3306";
$user ="root";
$pswrd = "";
$dbname = "projcomunicacao";*/


try{
	$PDO = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname,
	$user, $pswrd,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch ( PDOException $e ){
	echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
?>

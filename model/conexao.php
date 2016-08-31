<?php



		$host = "localhost:3306";
		$user ="root";
		$pswrd = "root";
		$dbname = "projcomunicacao";

		/*$host = "127.0.0.1:3306";
		$user ="root";
		$pswrd = "";
		$dbname = "projcomunicacao"; 
		*/
		try
		{
    		$PDO = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname,
				$user, $pswrd,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		catch ( PDOException $e )
		{
    		echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
		}

?>

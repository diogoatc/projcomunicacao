<?php

/*	$servidor = 'sql3.freemysqlhosting.net:3306';
	$usuario = 'sql3130819';
	$senha = 'P9fRUQZbwv';
	$banco = 'sql3130819';
	// Conecta-se ao banco de dados MySQL
	$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

  if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		
			*/


		define( 'MYSQL_HOST', '169.44.117.18:3306' );
		define( 'MYSQL_USER', 'root' );
		define( 'MYSQL_PASSWORD', 'unasp' );
		define( 'MYSQL_DB_NAME', '' );  //TODO: inserir o DB name quando criar o banco

		try
		{
    		$PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
		}
		catch ( PDOException $e )
		{
    		echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
		}
	
?>

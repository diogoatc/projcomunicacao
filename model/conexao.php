<?php

/*	$servidor = 'sql3.freemysqlhosting.net:3306';
	$usuario = 'sql3130819';
	$senha = 'P9fRUQZbwv';
	$banco = 'sql3130819';
	// Conecta-se ao banco de dados MySQL
	$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

  if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		
			*/


		define( 'MYSQL_HOST', 'sql3.freemysqlhosting.net:3306' );
		define( 'MYSQL_USER', 'sql3130819' );
		define( 'MYSQL_PASSWORD', 'P9fRUQZbwv' );
		define( 'MYSQL_DB_NAME', 'sql3130819' );

		try
		{
    		$PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
		}
		catch ( PDOException $e )
		{
    		echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
		}
	
?>

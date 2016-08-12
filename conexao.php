<?php

	$servidor = 'sql3.freemysqlhosting.net:3306';
	$usuario = 'sql3130819';
	$senha = 'P9fRUQZbwv';
	$banco = 'sql3130819';
	// Conecta-se ao banco de dados MySQL
	$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

  if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>

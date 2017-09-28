<?php

		define( 'MYSQL_HOST', 'localhost:3306' );
		define( 'MYSQL_USER', 'root' );
		define( 'MYSQL_PASSWORD', 'root' );
		define( 'MYSQL_DB_NAME', 'laravel' );

		try
		{
    		$PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
		}
		catch ( PDOException $e )
		{
    		echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
		}

		class disciplina {

			public function selectAtivo($PDO){

			$conn = $PDO->query("SELECT * FROM telefones");
				//$array = $conn->fetchAll(PDO::FETCH_ASSOC);
				return $conn->fetchAll(PDO::FETCH_ASSOC);


				
		}

		}
?>


		<<!DOCTYPE html>
		<html>
		<head>
			<title>Teste</title>
		</head>
		<body>
		<form method="post" action="">
		<label for="disciplina">Disciplina: </label>
			<select name="disciplina" id="disciplina" >
			<?php
			$x = new disciplina();
			$retorno = $x->selectAtivo($PDO);
			foreach ($retorno as $key) {
    			
			?>
			<option value="<?php echo $key['id'];?>" ><?php echo $key['descricao'];?></option>
			<?php
		}
		?>
			</select>
		</form>
		</body>
		</html>

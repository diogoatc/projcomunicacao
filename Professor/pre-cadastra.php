<?php







?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de questões</title>
</head>
<body>
		<label for="Form">SELECIONE O CURSO E O TURNO QUE DESEJA INSERIR AS QUESTÕES</label>	
		<form method="post" action="pre-cadastra.php" >
		
		<select name="curso" id="curso">
			
		<option value="PP">PP</option>
		<option value="RTV">RTV</option>


		</select>

		<select name="turno" id="turno">
			
		<option value="Matutino">Matutino</option>
		<option value="Noturno">Noturno</option>


		</select>
		<input type="submit" name="envia">


		</form>

</body>
</html>

<?php

if (isset($_POST['envia'])){

$curso = $_POST['curso'];
$turno = $_POST['turno'];

header("Location: cadastraquestoes.php?curso=$curso&turno=$turno"); exit;
}
?>
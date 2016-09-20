<!DOCTYPE html>
<html>
<head>
	<title>Teste Data</title>
</head>
<body>

	<form action="" method="POST">
		<input type="datetime-local" name="data">
		<input type="submit" name="envia">
	</form>

</body>
</html>

<?php 

	if(isset($_POST['envia'])){

		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');
		echo $date;

	}

?>
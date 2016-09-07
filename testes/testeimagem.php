<!DOCTYPE html>
<html>
<head>
	<title>Teste Imagem</title>
</head>
<body>
	<form enctype="multipart/form-data" action="testeimagem.php" method="post" >
	<input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
		<p>IMAGEM:</p>
		<input type="file" data-max-size="2048" name="imagem"> <br/>
		<input type="submit" name="envia">
	</form>
</body>
</html>

<?php

if(isset($_POST['envia'])){

	$imagem = $_FILES["imagem"];
	echo $imagem['size']."<br/>";
	echo $imagem['error']."<br/>";
	var_dump($imagem);
	$img_src = $imagem['tmp_name'];
	$imgbinary = fread(fopen($img_src, "r"), filesize($img_src));
	$img_str = base64_encode($imgbinary);
	echo '<img src="data:image/jpg;base64,'.$img_str.'" />';

	

}


?>
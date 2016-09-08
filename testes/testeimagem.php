<!DOCTYPE html>
<html>
<head>
	<title>Teste Imagem</title>
</head>
<body>
	<form enctype="multipart/form-data" action="testeimagem.php" method="post" >
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>  <!-- Valor fixo para tamanho máximo de imagem: 2MB. Acima disso tem que alterar no PHP.ini -->
		<p>IMAGEM:</p>
		<input type="file" data-max-size="2048" name="imagem"> <br/>
		<input type="submit" name="envia">
	</form>
</body>
</html>

<?php

if(isset($_POST['envia'])){

	$imagem = $_FILES["imagem"];
	if($imagem['error'] == 1 or $imagem['error'] == 2){

		echo "
			<script>
				alert('O tamanho da imagem é maior que o suportado. Por favor insira uma imagem de até 2MB');
				window.location='testeimagem.php';
			</script>

		";
	}else{
	echo $imagem['size']."<br/>";
	echo $imagem['error']."<br/>";
	var_dump($imagem);
	$img_src = $imagem['tmp_name'];
	$imgbinary = fread(fopen($img_src, "r"), filesize($img_src));
	$img_str = base64_encode($imgbinary);

	include_once '../model/conexao.php';
	$conn = $PDO->prepare("UPDATE questao SET imagem = :imagem WHERE id = :idquestao");
	$conn->bindParam(":imagem", $img_str, PDO::PARAM_STR);
	$idquestao = 2;
	$conn->bindParam(":idquestao",$idquestao,PDO::PARAM_INT);

	if($conn->execute()){
		echo "INSERIDO COM SUCESSO";
	}else{
		echo "ERRO INSERE IMAGEM";
	}
	$conn=null;
	try{
	$conexao = $PDO->prepare("SELECT imagem FROM questao WHERE id=:idquestao");
	$conexao->bindParam(":idquestao",$idquestao,PDO::PARAM_INT);
	$conexao->execute();
	$resultado = $conexao->fetchColumn();
	echo '<img src="data:image/jpg;base64,'.$resultado.'" />';

	}catch(PDOException $e){
    // Caso ocorra uma exceção, exibe na tela
    echo $e->getMessage();

	}	
	}
}


?>
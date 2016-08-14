<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
		<div class="container">
			<div class="header">
            	<img src="assets/img/Comunica%C3%A7%C3%A3o.png" alt="logo unasp">
       		</div>
       			<div class="content">
            		<div class="login">Cadastro de Professores</div>
            		<div class="form">

				<form action="cadastro.php" id="cadastro" method="post">
					<label for="txUsuario">Usuário</label>
        			<input type="text" required="Favor Preencher o campo com o seu usuário" name="usuario" id="txUsuario" maxlength="25" /> <br/>
        			<label for="txSenha">Senha</label>
        			<input type="password" required="Favor Preencher o campo com a sua senha" name="senha" id="txSenha" /> <br/>
        			<label for="txNome">Nome Completo</label>
        			<input type="text" required="Favor Preencher o campo com o seu nome completo" name="nome" id="txNome" /> <br/>
        			<label for="txEmail">Email</label>
        			<input type="email" required="Favor Preencher o campo com o seu email" name="email" id="txemail" /> <br/>
  					<input type="submit" name="enviar" value="Cadastrar" />
				</form>
				  </div>
        	</div>
		</div>
</body>
</html>


<?php

if(isset($_POST['enviar'])){

if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']) OR empty($_POST['nome']) OR empty($_POST['email']))) {

	header("Location: index.php"); exit;

}

include('conexao.php');

$usuario = $_POST['usuario'];
$senha = sha1($_POST['senha']);
$nome = $_POST['nome'];
$email = $_POST['email'];
$id=null;
$nivel = 2;


$tb = $PDO->prepare("INSERT INTO usuario (id, nome, usuario, senha, email, nivel) VALUES(:id, :nome, :usuario, :senha, :email, :nivel)");

$tb->bindParam(":id",$id,PDO::PARAM_INT);
$tb->bindParam(":nome",$nome,PDO::PARAM_STR);
$tb->bindParam(":usuario",$usuario,PDO::PARAM_STR);
$tb->bindParam(":senha",$senha,PDO::PARAM_STR);
$tb->bindParam(":email",$email,PDO::PARAM_STR);
$tb->bindParam(":nivel",$nivel,PDO::PARAM_INT);

if($tb->execute()){
	echo "<script> alert('Cadastro Efetuado Com Sucesso');</script>";
}else{
	echo "<script> alert('ERRO');</script>";
}

$tb=null;


}
/*$stmt = $mysqli->prepare("INSERT INTO usuario (id, nome, usuario, senha, email, nivel) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->bind_param('issssi', $id, $nome, $usuario, $senha, $email, $nivel);

if($stmt->execute()){
    echo "Sucesso!";
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}

$stmt->close();
*/

?>

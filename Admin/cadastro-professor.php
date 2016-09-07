<?php
include('verifica_sessao_admin.php');
include('../model/conexao.php');
include('../classes/class_usuario.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
		<div class="container">
		<div class="header">
            <img src="../assets/img/UNASP.png" alt="logo unasp">
		</div>
        <nav id="menu">
		  <h1>Menu Principal</h1>
            <ul type="disc">
		          <li><a href="index.php">MENU</a></li>
		     </ul>
        </nav>

       	<div id="cad-prof" class="content">
        <div id="cadastro-prof" class="login">Cadastro de Professores</div>
		<div id="form-cad-prof" class="form">

			<form action="cadastro-professor.php" id="cadastro" method="post">

				<label for="txUsuario">Usuário</label>
        			<input type="text" required="Favor Preencher o campo com o seu usuário" name="usuario" id="txUsuario" maxlength="25" /> </br>

				<label for="txSenha">Senha</label>
        			<input type="password" required="Favor Preencher o campo com a sua senha" name="senha" id="txSenha" /></br>

				<label id="nome" for="txNome">Nome Completo</label>
        			<input type="text" required="Favor Preencher o campo com o seu nome completo" name="nome" id="txNome" /></br>

				<label for="txEmail">E-mail</label>
        			<input type="email" required="Favor Preencher o campo com o seu email" name="email" id="txemail" /></br></br>

  				<input id="btn-cad" type="submit" name="enviar" value="Cadastrar"/>

			</form>

		</div>
        </div>
            <footer id="rodape">
		      <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>
            </footer>
		</div>

</body>
</html>
<?php
if(isset($_POST['enviar'])){

	if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha'])
	OR empty($_POST['nome']) OR empty($_POST['email']))) {

		header("Location: ../index.php");
		exit;
	}

	$usuario = $_POST['usuario'];
	$senha = sha1($_POST['senha']);
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$nivel = 2;
	$flgativo = 1;

	$y= new usuario();
	$resultado = $y->verificaExistente($PDO,$usuario);

	if(!empty($resultado)){
		echo "<script> alert('Este usuário já existe.');</script>";
		header("Location: cadastro-professor.php"); exit;
	}else{
		$y->registrarProfessor($PDO, $nome, $usuario, $senha, $email, $nivel, $flgativo);
	}
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="../assets/bootstrap-3.3.7-dist/js/newjs.js"></script>
		  <link rel="stylesheet" href="../assets/css/normalize.css">
		  <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/js/newjs.js">
		  <link rel="stylesheet" href="../assets/css/newstyle.css">
	<title>Cadastro Temporário de Admin</title>
</head>
<body>

<form class="form-horizontal" action="criaadmin.php" id="cadastro" method="post">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Cadastrar Administrador</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="txUsuario">Usuário</label>  
  <div class="col-md-3">
  <input id="txUsuario" name="usuario" type="text" placeholder="Insira nome do usuário" class="form-control input-md" required="">
  <span class="help-block">Exemplo: joao.francisco</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="txSenha">Senha</label>
  <div class="col-md-3">
    <input id="txSenha" name="senha" type="password" placeholder="Digite a senha" class="form-control input-md" required="">
    <span class="help-block">Insira a Senha</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="txNome">Nome Completo</label>  
  <div class="col-md-3">
  <input id="txNome" name="nome" type="text" placeholder="Nome completo" class="form-control input-md" required="">
  <span class="help-block">Exemplo: João Matheus Francisco</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="btn-cad"></label>
  <div class="col-md-3">
    <input style="font-size:13pt;" type="submit" id="btn-cad" name="enviar" class="btn btn-primary">Finalizar Cadastro</input>
  </div>
</div>

</fieldset>
</form>

</body>
</html>

<?php

if(isset($_POST['enviar'])){

	include('../model/conexao.php');
	include('../classes/class_usuario.php');

	$usuario = $_POST['usuario'];
	$senha = sha1($_POST['senha']);
	$nome = $_POST['nome'];
	$nivel = 1;
	$flgativo = 1;

	$y= new usuario();
	$resultado = $y->verificaExistente($PDO,$usuario);

	if(!empty($resultado)){
		echo "<script> alert('Este usuário já existe.');</script>";
		header("Location: cadastro-professor.php"); exit;
	}else{
		$y->registrarProfessor($PDO, $nome, $usuario, $senha, $nivel, $flgativo);
	}

}


?>
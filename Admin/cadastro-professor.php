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
</head>
<body>
		<nav class="navbar navbar-inverse" style="border-radius:0px; background:#20205a;">

  <div class="container-fluid">

		  <div class="col-sm-2">
			<a  class="navbar-brand" href="index.php"><img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp"></a>
		 </div>

		  <div class="col-sm-2">
			<h3 class="areadoprofessor">ÁREA DO ADMINISTRADOR</h3>
		  </div>

	<div class="col-sm-8">
	<ul class="nav navbar-nav pull-right">
	  <li><a id="font-white"  href="index.php">Home</a></li>
<li><a id="font-white" href="cadastro-disciplina.php">Cadastrar Disciplina</a></li>
<li><a id="font-white" href="liberarprova.php">Liberar Prova</a></li>
<li class="active"><a id="ativo" href="cadastro-professor.php">Cadastrar Professor</a></li>
	  <li><a id="font-white" href="pre_relatorio.php">Relatório de Provas</a></li>
	  <li class="dropdown"><a id="font-white" class="dropdown-toggle" data-toggle="dropdown" href="#">Listar<span class="caret"></span></a>
		<ul class="dropdown-menu">
		  <li><a href="visualizadisciplinas.php">
				Todas as Disciplinas
				</a></li>
			<li><a href="visualizaprofessores.php">
				Todas os Professores
			</a></li>
		   </ul>
	  </li>
	  <li><a id="font-white" href="../logout.php">Logout</a></li>
	</ul>
  </div>
  </div>
</nav>
<div id="wrap">
       	
	<form class="form-horizontal" action="cadastro-professor.php" id="cadastro" method="post">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Cadastrar Professor</legend>

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
  <input id="txNome" name="nome" type="text" placeholder="Insira nome completo" class="form-control input-md" required="">
  <span class="help-block">Exemplo: João Matheus Francisco</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="btn-cad"></label>
  <div class="col-md-3">
    <button style="font-size:13pt;" type="submit" id="btn-cad" name="enviar" class="btn btn-primary">Finalizar Cadastro</button>
  </div>
</div>

</fieldset>
</form>

</div>

	<div id="push"></div>
		<div id="footer">
	  <div class="container">
		<p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
	  </div>
	</div>	

</body>
</html>
<?php
if(isset($_POST['enviar'])){

	if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha'])
	OR empty($_POST['nome']))) {

		header("Location: ../index.php");
		exit;
	}

	$usuario = $_POST['usuario'];
	$senha = sha1($_POST['senha']);
	$nome = $_POST['nome'];
	$nivel = 2;
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

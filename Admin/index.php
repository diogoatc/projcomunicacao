<?php
include('verifica_sessao_admin.php');
?>

<!DOCTYPE html>

<head>
    <title>Área do Administrador</title>
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

		  <div class="col-sm-4">
			<h3 class="areadoprofessor">ÁREA DO ADMINISTRADOR</h3>
		  </div>

	<div class="col-sm-6">
	<ul class="nav navbar-nav">
	  <li class="active"><a id="ativo" href="index.php">Home</a></li>
<li><a id="font-white" href="cadastro-disciplina.php">Cadastrar Disciplina</a></li>
<li><a id="font-white" href="cadastro-professor.php">Cadastrar Professor</a></li>
	  <li class="dropdown"><a id="font-white" class="dropdown-toggle" data-toggle="dropdown" href="#">Relatório de Prova<span class="caret"></span></a>
		<ul class="dropdown-menu">
		  <li><a target="_blank" href="../classes/class_relatorio_disciplinas.php?idusuario=<?php echo $_SESSION['UsuarioID'] ?>">
					Relatorios de todas as disciplinas
				</a></li>
		   </ul>
	  </li>
	  <li><a id="font-white" href="../logout.php">Logout</a></li>
	</ul>
  </div>
  </div>
</nav>
  <div id="wrap">
	<div class="geral">
  <div class="container">
	  <div class="row text-center">
		<h1>Seja bem-vindo Administrador(a): <?php echo $_SESSION['UsuarioNome'];?></h1>

		  </div>
		</div>
  </div>


</div>
<div id="push"></div>
		<div id="footer">
	  <div class="container">
		<p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
	  </div>
	</div>
       
</body>
</html>
  <?php
  include('verifica_sessao_professor.php');
  ?>

  <!DOCTYPE html>

  <head>
	  <title>Área do Professor</title>
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
			<h3 class="areadoprofessor">ÁREA DO PROFESSOR</h3>
		  </div>

	<div class="col-sm-8">
	<ul class="nav navbar-nav pull-right">
	  <li class="active"><a id="ativo" href="index.php">Home</a></li>
<li><a id="font-white" href="pre-cadastra.php">Cadastrar Questões</a></li>
	  <li><a id="font-white" href="pre_relatorio.php"> Relatórios de Notas</a></li>
	  <li><a id="font-white" href="listadisciplinas.php">Editar/Visualizar Questões</a></li>
			<li><a id="font-white" href="alterarsenha.php">Alterar Senha</a></li>
			<li><a id="font-white" href="../logout.php">Logout</a></li>
	</ul>
  </div>
  </div>
</nav>
  <div id="wrap">
	<div class="geral">
  <div class="container">
	  <div class="row text-center">
		<h1>Seja bem-vindo professor(a): <?php echo $_SESSION['UsuarioNome'];?></h1>

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





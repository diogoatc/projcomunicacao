<?php 

include 'verifica_sessao_admin.php';
require_once("../model/conexao.php");
require_once("../classes/class_disciplina.php");

$x = new disciplina();
$retorno = $x->lista_itemdisciplina($PDO);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Disciplinas Cadastradas</title>
	<meta charset="utf-8">
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
		<nav class="navbar navbar-inverse" style='border-radius:0px; background:#20205a;'>

  <div class="container-fluid">
    	
  		 <div class="col-sm-2">
			<a  class="navbar-brand" href="index.php"><img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp"></a>
		 </div>

	      <div class="col-sm-2">
			<h4 class="areadoprofessor">ÁREA DO ADMINISTRADOR</h4>
		  </div>

	<div class="col-sm-8">
	<ul class="nav navbar-nav pull-right">
	  <li><a id="font-white"  href="index.php">Home</a></li>
	<li><a id="font-white" href="cadastro-disciplina.php">Cadastrar Disciplina</a></li>
	<li><a id="font-white" href="liberarprova.php">Liberar Prova</a></li>
	<li><a id="font-white" href="cadastro-professor.php">Cadastrar Professor</a></li>
	  <li><a id="font-white" href="pre_relatorio.php">Relatório de Provas</a></li>
	  <li class="dropdown active"><a id="ativo" class="dropdown-toggle" data-toggle="dropdown" href="#">Listar<span class="caret"></span></a>
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

  <div class="table-responsive">
  <table class="table table-hover">
   		
		<thead>
			<td><strong>Nome</strong></td>
			<td><strong>Curso</strong></td>
			<td><strong>Turno</strong></td>
			<td><strong>Semestre</strong></td>
			<td><strong>Número de Créditos</strong></td>
			<td><strong></strong></td>
			<td><strong></strong></td>
		</thead>

	<?php foreach ($retorno as $key) {   ?>
			<tr>
				<td><?php echo $key['nome']; ?></a></td>
				<td><?php echo $key['curso']; ?></td>
				<td><?php echo $key['turno']; ?></a></td>
				<td class="text-center"><?php echo $key['semestre']; ?></td>
				<td class="text-center"><?php echo $key['credito']; ?></a></td>
				<td><a href='editadisciplina.php?id=<?php echo $key['iditemdisciplina']; ?>'>Editar Disciplina </a></td>
				<td><a href='visualizadisciplinas.php?id=<?php echo $key['iditemdisciplina']; ?>'>Excluir Disciplina </a></td>
			</tr>

<?php } ?>

	</table>
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

<?php
if(isset($_GET['id'])){
	require_once('../classes/class_disciplina.php');
	$id = $_GET['id'];
	$x = new disciplina();
	$x->excluiDisciplinaById($PDO,$id);
}
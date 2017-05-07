<?php
include('verifica_sessao_admin.php');
include('../classes/class_disciplina.php');
include('../model/conexao.php');
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
			<h4 class="areadoprofessor">ÁREA DO ADMINISTRADOR</h4>
		  </div>

	<div class="col-sm-8">
	<ul class="nav navbar-nav pull-right">
	  <li><a id="font-white"  href="index.php">Home</a></li>
<li class="active"><a id="ativo" href="cadastro-disciplina.php">Cadastrar Disciplina</a></li>
<li><a id="font-white" href="liberarprova.php">Liberar Prova</a></li>
<li><a id="font-white" href="cadastro-professor.php">Cadastrar Professor</a></li>
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
 			
<form class="form-horizontal" action="" id="cadastro" method="post">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Cadastrar Disciplina</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="nome">Nome da Disciplina</label>  
  <div class="col-md-3">
  <input name="nome" type="text" placeholder="Nome da Disciplina" class="form-control input-md" required="">
  <span class="help-block">Exemplo: Atendimento Publicitário</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label" for="curso">Curso</label>
  <div class="col-md-3">
    <select required="" type="text" name="curso" class="form-control">
      <option value="">Selecione uma das opções</option>
      <option value="PP">PP</option>
      <option value="RTV">RTV</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label" for="turno">Turno</label>
  <div class="col-md-3">
    <select required="" type="text" name="turno" class="form-control">
      <option value="">Selecione uma das opções</option>
      <option value="Matutino">Matutino</option>
      <option value="Noturno">Noturno</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label" for="credito">Quantidade de Créditos da Disciplina</label>
  <div class="col-md-3">
    <select required="" type="text" name="credito" class="form-control">
      <option value="">Selecione uma das opções</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label" for="semestre">Semestre</label>
  <div class="col-md-3">
    <select required="" id="semestre" name="semestre" class="form-control">
      <option value="">Selecione uma das opções</option>
      <option value="1">1º Semestre</option>
      <option value="2">2º Semestre</option>
      <option value="3">3º Semestre</option>
      <option value="4">4º Semestre</option>
      <option value="5">5º Semestre</option>
      <option value="6">6º Semestre</option>
      <option value="7">7º Semestre</option>
      <option value="8">8º Semestre</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="submit"></label>
  <div class="col-md-4">
    <button style="font-size:13pt;" name="envia" type="submit" class="btn btn-primary">Finalizar Cadastro</button>
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
  if(isset($_POST['envia'])){
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $turno = $_POST['turno'];
    $credito = $_POST['credito'];
    $semestre = $_POST['semestre'];
    $flgativo = 1;

    $x = new disciplina();
    $cadDisciplina = $x->cadastra_itemdisciplina($PDO, $nome, $curso, $turno, $credito, $semestre, $flgativo);
  }
?>

<?php
include('verifica_sessao_professor.php');
require_once("../model/conexao.php");
require_once("../classes/class_questao.php");
$iddisciplina = $_GET['id'];

$x = new questao();
$retorno = $x->selectQuestaoByDisciplina($PDO,$iddisciplina);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Lista de Questões</title>
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
          
	      <div class="col-sm-3">
	        <h3 class="areadoprofessor">ÁREA DO PROFESSOR</h3>
	      </div>

    <div class="col-sm-7">
    <ul class="nav navbar-nav">
      <li><a id="font-white" href="index.php">Home</a></li>
<li><a id="font-white" href="pre-cadastra.php">Cadastrar Questões</a></li>
     <li><a id="font-white" href="pre_relatorio.php"> Relatórios de Notas</a></li>
      <li class="active"><a id="ativo" href="listadisciplinas.php">Editar/Visualizar Questões</a></li>
	        <li><a id="font-white" href="alterarsenha.php">Alterar Senha</a></li>
	        <li><a id="font-white" href="../logout.php">Logout</a></li>
    </ul>
  </div>
  </div>
</nav>

<div id="wrap">
       <legend id="noline" class="text-center">Editar, Excluir ou Visualizar Questões</legend>
       <h4 id="min" class="text-right">Para visualizar a imagem inserida na Questão, click em "Visualizar"</h4>
  <div class="table-responsive">
  <table class="table table-bordered table table-hover">

<thead> 
	<td><strong>Enunciado</strong></td>
	<td><strong>Alternativa A</strong></td>
	<td><strong>Alternativa B</strong></td>
	<td><strong>Alternativa C</strong></td>
	<td><strong>Alternativa D</strong></td>
	<td><strong>Alternativa E</strong></td>
	<td><strong>Alternativa Correta</strong></td>
	<td></td>
	<td></td>
    <td></td>

</thead>
<?php foreach ($retorno as $key) {   ?>
	<tr>
		<td> <?php echo $key['titulo']; ?></a></td>
		<td> <?php echo $key['resposta1']; ?></td>
		<td> <?php echo $key['resposta2']; ?></td>
		<td> <?php echo $key['resposta3']; ?></td>
		<td> <?php echo $key['resposta4']; ?></td>
		<td> <?php echo $key['resposta5']; ?></td>
		<td> <?php echo $key['respostacorreta']; ?></td>
		<td> <a href="editaquestao.php?iddisciplina=<?php echo $iddisciplina; ?>&id=<?php echo $key['id']; ?>">Editar</a></td>
		<td> <a href="editaquestao.php?iddisciplina=<?php echo $iddisciplina; ?>&deleta=1&id=<?php echo $key['id']; ?>">Excluir</a></td>
        <td> <a href="visualizaquestao.php?iddisciplina=<?php echo $iddisciplina; ?>&idquestao=<?php echo $key['id']; ?>">Visualizar</a></td>
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
<?php
include_once('../classes/class_disciplina.php');
include_once('../classes/class_questao.php');
include('verifica_sessao_professor.php');
	
$iddisciplina = $_GET['iddisciplina'];
$idquestao = $_GET['id'];

if(isset($_GET['deleta'])){

$x = new questao();
$retorno = $x->deletaQuestao($PDO,$idquestao,$iddisciplina);


}else{

$x= new questao();
    $key = $x->selectQuestaoById($PDO,$idquestao);
?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Edita Questões</title>
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
      <li ><a id="font-white" href="index.php">Home</a></li>
<li class="active"><a id="ativo" href="pre-cadastra.php">Cadastrar Questões</a></li>
      <li class="dropdown"><a id="font-white" class="dropdown-toggle" data-toggle="dropdown" href="#">Relatório de Prova<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a target="_blank" href="../classes/class_relatorio_disciplinas.php?idusuario=<?php echo $_SESSION['UsuarioID'] ?>">
                    Relatorios de todas as disciplinas
                </a></li>
           </ul>
      </li>
      <li><a id="font-white" href="listadisciplinas.php">Editar/Visualizar Questões</a></li>
	        <li><a id="font-white" href="alterarsenha.php">Alterar Senha</a></li>
	        <li><a id="font-white" href="../logout.php">Logout</a></li>
    </ul>
  </div>
  </div>
</nav>

	<legend class="text-center">Editar Questão</legend>

	<form class="form-horizontal" id="questcad" enctype="multipart/form-data" action="editaquestao.php" method="post">

	<fieldset>
	<!-- Select Basic -->
	<input type="hidden" name="MAX_FILE_SIZE" value="1048576"/>  <!-- Valor fixo para tamanho máximo de imagem: 1MB. Acima de 2MB tem que alterar no PHP.ini -->
	<input type="hidden" name="idusuario" value="<?php echo $_SESSION['UsuarioID']; ?>"/>
	<input type="hidden" name="iddisciplina" value="<?php echo $iddisciplina; ?>"/>
	<input type="hidden" name="idquestao" value="<?php echo $idquestao; ?>"/>
			</div>
	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textarea">Enunciado da Questão:</label>
	  <div class="col-md-4">
	    <textarea required="" class="form-control" rows="20" id="titulo" name="titulo"  placeholder="Insira o Enunciado da Questão"><?php echo $key[0]['titulo']; ?></textarea>
	  </div>
	</div>
	<!-- File Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="img">Imagem: (Não Obrigatório)</label>
	  <div class="col-md-4">
	    <input id="img" name="imagem" class="input-file" type="file">
	  </div>
	</div>
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp1">Alternativa A:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp1" type="textarea" placeholder="Insira Alternativa A"><?php echo $key[0]['resposta1']; ?></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp2">Alternativa B:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp2" type="textarea" placeholder="Insira Alternativa B"><?php echo $key[0]['resposta2']; ?></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp3">Alternativa C:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp3" type="textarea" placeholder="Insira Alternativa C"><?php echo $key[0]['resposta3']; ?></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp4">Alternativa D:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp4" type="textarea" placeholder="Insira Alternativa D"><?php echo $key[0]['resposta4']; ?></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp5">Alternativa E:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp5" type="textarea" placeholder="Insira Alternativa E"><?php echo $key[0]['resposta5']; ?></textarea>
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="respcorreta">Alternativa Correta:</label>
	  <div class="col-md-3">
	    <select id="respcorreta" name="respcorreta" class="form-control" style="font-size:14pt;">
	    		<option value="">Selecione uma alternativa</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
	    </select>
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="singlebutton"></label>
	  <div class="col-md-1">
	    <input style="font-size:13pt;" name="envia" type="submit" class="btn btn-primary"></input>
	  </div>
	</div>

	</fieldset>
	</form>
	
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

		$idquestao = $_POST['idquestao'];
		$iddisciplina = $_POST['iddisciplina'];
		$titulo = $_POST['titulo'];
		$resp1 = $_POST['resp1'];
		$resp2 = $_POST['resp2'];
		$resp3 = $_POST['resp3'];
		$resp4 = $_POST['resp4'];
		$resp5 = $_POST['resp5'];
		$respcorreta = $_POST['respcorreta'];
		
		
		$x = new questao();
		$edita = $x->editaQuestaoById($PDO,$idquestao,$iddisciplina,$titulo,$resp1,$resp2,$resp3,$resp4,$resp5,$respcorreta);


	}
}
	?>
	<?php

	// A sessão precisa ser inicaida em cada página diferente
	    if (!isset($_SESSION)) session_start();

	    $nivel_necessario = 2;  //2 é o nível Professor

	    // Verifica se não há a variável da sessão que identifica o usuário
	    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] !=$nivel_necessario)) {
	        // Destrói a sessão por segurança
	        echo "<script> alert('Você precisa estar logado para acessar essa página');</script>";
	        session_destroy();
	        // Redireciona o visitante de volta pro login
	        header("Location: ../index.php"); exit;
	    }
	    include('../classes/class_disciplina.php');
		include('../classes/class_questao.php');
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastro de Questões</title>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	      <link rel="stylesheet" href="../assets/css/normalize.css">
	      <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">
	      <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/js/newjs.js">

	      <link rel="stylesheet" href="../assets/css/newstyle.css">
	       <!-- Latest compiled and minified CSS -->
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	      <!-- Optional theme -->
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	      <!-- Latest compiled and minified JavaScript -->
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
	        <li class="active"><a id="ativo" href="pre-cadastra.php">Cadastrar Questões</a></li>
	        <li><a id="font-white" href="relatorios.php">Relatório de Provas</a></li>
	        <li><a id="font-white" href="listadisciplinas.php">Editar/Visualizar Questões</a></li>
	        <li><a id="font-white" href="alterarsenha.php">Alterar Senha</a></li>
	        <li><a id="font-white" href="../logout.php">Logout</a></li>
	      </ul>
	      </div>
	      </div>
	  </nav>

	<legend class="text-center">Cadastrar de Questão</legend>

	<form class="form-horizontal" id="questcad" enctype="multipart/form-data" action="cadastraquestoes.php" method="post">

	<fieldset>
	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="disciplina">Disciplina</label>
	  <div class="col-md-3">
	    <select required="" id="disciplina" name="disciplina" class="form-control">
			<option value="">Selecione uma das opções</option>
	    <?php
			$curso=$_COOKIE['curso'];
			$turno=$_COOKIE['turno'];
			$semestre=$_COOKIE['semestre'];

			$x = new disciplina();
			$retorno = $x->selectAtivo($PDO,$curso,$turno,$semestre);
			foreach ($retorno as $key) {
		?>
		<option value="<?php echo $key['nome'];?>" >
	    <?php echo $key['nome'];?>
	     </option>

				<?php
			}
			?>

	    </select>
	  </div>
	</div>

	<!-- Select Basic -->
	<input type="hidden" name="MAX_FILE_SIZE" value="1048576"/>  <!-- Valor fixo para tamanho máximo de imagem: 1MB. Acima de 2MB tem que alterar no PHP.ini -->
	<input type="hidden" name="idusuario" value="<?php echo $_SESSION['UsuarioID']; ?>"/>
			</div>
	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textarea">Enunciado da Questão:</label>
	  <div class="col-md-4">
	    <textarea required="" class="form-control" rows="20" id="titulo" name="titulo"  placeholder="Insira o Enunciado da Questão"></textarea>
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
	  <textarea required="" class="form-control" rows="10" name="resp1" type="textarea" placeholder="Insira Alternativa A"></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp2">Alternativa B:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp2" type="textarea" placeholder="Insira Alternativa B"></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp3">Alternativa C:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp3" type="textarea" placeholder="Insira Alternativa C"></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp4">Alternativa D:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp4" type="textarea" placeholder="Insira Alternativa D"></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp5">Alternativa E:</label>
	  <div class="col-md-4">
	  <textarea required="" class="form-control" rows="10" name="resp5" type="textarea" placeholder="Insira Alternativa E"></textarea>
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
	    <input style="font-size:18pt;" name="envia" type="submit" class="btn btn-primary"></input>
	  </div>
	</div>

	</fieldset>
	</form>

	<?php


	if(isset($_POST['envia'])){

		$imagem = $_FILES["imagem"];
		if($imagem['error'] == 1 or $imagem['error'] == 2){

			echo "
				<script>
					alert('O tamanho da imagem é maior que o suportado. Por favor insira uma imagem de até 1MB');
					window.location='cadastraquestoes.php';
				</script>

			";
		}else{
			$img_src = $imagem['tmp_name'];
			$imgbinary = fread(fopen($img_src, "r"), filesize($img_src));
			$img_base64 = base64_encode($imgbinary);
			$nomedisciplina = $_POST['disciplina'];
			$titulo = $_POST['titulo'];
			$resp1 = $_POST['resp1'];
			$resp2 = $_POST['resp2'];
			$resp3 = $_POST['resp3'];
			$resp4 = $_POST['resp4'];
			$resp5 = $_POST['resp5'];
			$respcorreta = $_POST['respcorreta'];
			$semestre = $_POST['semestre'];
			$idusuario = $_POST['idusuario'];
			$curso=$_COOKIE['curso'];
			$turno=$_COOKIE['turno'];



			$y = new disciplina();

			$iddisciplina = $y->verifica_disciplina_cadastrada($PDO,$nomedisciplina, $curso, $turno, $idusuario);

			if(empty($iddisciplina)){
			$cadastradiscicplina = $y->cadastra_disciplina($PDO, $nomedisciplina, $idusuario, $curso, $turno, $semestre);
			$iddisciplina = $y->verifica_disciplina_cadastrada($PDO,$nomedisciplina, $curso, $turno, $idusuario);
			}

			$x = new questao();
			$cadastraquestao = $x->registrarQuestoes($PDO, $iddisciplina, $titulo, $resp1, $resp2, $resp3, $resp4, $resp5, $respcorreta,$img_base64);
		}
	}


	?>
	

 		<footer>Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</footer>

	</body>
	</html>

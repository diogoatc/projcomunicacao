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
		<link rel="stylesheet" href="../assets/css/style.css">
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

	      <div class="col-sm-3">
	        <a  class="navbar-brand" href="index.php"><img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp"></a>
	      </div>
	      <div class="col-sm-3">
	        <h3 class="areadoprofessor">ÁREA DO PROFESSOR</h3>
	      </div>
	      <div class="col-sm-6">
	      <ul class="nav navbar-nav">

	        <li class="active"><a style="color:black;background: #f79f38; font-family:sans-serif; border-radius:8px;" href="cadastraquestoes.php">Cadastrar Questões</a></li>
	        <li><a style="color:white;" href="notasalunos.php">Notas Alunos</a></li>
	        <li><a style="color:white;" href="editaquestao.php">Editar Questões</a></li>
	        <li><a style="color:white;" href="alterarsenha.php">Alterar Senha</a></li>
	        <li><a style="color:white;" href="../logout.php">Logout</a></li>
	      </ul>
	      </div>
	      </div>
	  </nav>

	  		<!--
				<form id="questcad" enctype="multipart/form-data" action="cadastraquestoes.php" method="post">
					<div class="form-group"> 	
					<label for="disciplina">Disciplina: </label>
					<select required="" name="disciplina" id="disciplina" >

				<?php
				
				$curso=$_COOKIE['curso'];
				$turno=$_COOKIE['turno'];

				$x = new disciplina();
				$retorno = $x->selectAtivo($PDO,$curso,$turno);
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

				<div class="form-group">
				<select required="" name="semestre" id="semestre">
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

				<div class="form-group">
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576"/>-->  <!-- Valor fixo para tamanho máximo de imagem: 1MB. Acima de 2MB tem que alterar no PHP.ini --> <!--
				<input type="hidden" name="idusuario" value="<?php echo $_SESSION['UsuarioID']; ?>"/>
				</div>

				<div class="form-group">
				<p>Enunciado da Questão:</p>

				<textarea required="" name="titulo" id="titulo" rows="10" cols="74" placeholder="Enunciado da Questão"></textarea> <br/><br/>

				<label for="resp1">Alternativa A:</label>
				<input required="" type="text" name="resp1"> <br/></br>

				<label for="resp2">Alternativa B:</label>
				<input required="" type="text" name="resp2"> <br/></br>

				<label for="resp3">Alternativa C:</label>
				<input required="" type="text" name="resp3"> <br/></br>

				<label for="resp4">Alternativa D:</label>
				<input required="" type="text" name="resp4"> <br/></br>

				<label for="resp5">Alternativa E:</label>
				<input required="" type="text" name="resp5"> <br/></br></br>

				<label for="respcorreta">Alternativa Correta:</label>

				<select required="" name="respcorreta" id="respcorreta">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>

				</select>
				</div>
				<div class="form-group">
				<label for="img" >Imagem: (Não Obrigatório) </label>
				<input type="file" id="img" name="imagem"> <br/>
				<input type="submit" name="envia">
				</div>

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
	</form>
	</div>
	</div>
	</div>
	-->


	<form class="form-horizontal" id="questcad" enctype="multipart/form-data" action="cadastraquestoes.php" method="post"> 

	<fieldset>

	<!-- Form Name -->
	<legend class="text-center" style="font-size:20pt;">Cadastrar de Questão</legend>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="disciplina">Disciplina</label>
	  <div class="col-md-4">
	    <select required="" id="disciplina" name="disciplina" class="form-control">

	    <?php
			$curso=$_COOKIE['curso'];
			$turno=$_COOKIE['turno'];

			$x = new disciplina();
			$retorno = $x->selectAtivo($PDO,$curso,$turno);
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
	<div class="form-group">
	  <label class="col-md-4 control-label" for="semestre">Semestre</label>
	  <div class="col-md-4">
	    <select required="" id="semestre" name="semestre" class="form-control">
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
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"/>  <!-- Valor fixo para tamanho máximo de imagem: 1MB. Acima de 2MB tem que alterar no PHP.ini --> 
<input type="hidden" name="idusuario" value="<?php echo $_SESSION['UsuarioID']; ?>"/>
			</div>
	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="textarea">Enunciado da Questão:</label>
	  <div class="col-md-4">                     
	    <textarea required="" class="form-control" id="titulo" name="titulo" cols="74" placeholder="Insira a Questão"></textarea>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp1">Alternativa A:</label>  
	  <div class="col-md-4">
	  <input name="resp1" type="text" placeholder="Insira a questão" class="form-control input-md" required="">
	  <span class="help-block">Insira a questão</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp2">Alternativa B:</label>  
	  <div class="col-md-4">
	  <input name="resp2" type="text" placeholder="Insira a questão" class="form-control input-md" required="">
	  <span class="help-block">Insira a questão</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp3">Alternativa C:</label>  
	  <div class="col-md-4">
	  <input name="resp3" type="text" placeholder="Insira a questão" class="form-control input-md" required="">
	  <span class="help-block">Insira a questão</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp4">Alternativa D:</label>  
	  <div class="col-md-4">
	  <input name="resp4" type="text" placeholder="Insira a questão" class="form-control input-md" required="">
	  <span class="help-block">Insira a questão</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="resp5">Alternativa E:</label>  
	  <div class="col-md-4">
	  <input name="resp5" type="text" placeholder="Insira a questão" class="form-control input-md" required="">
	  <span class="help-block">Insira a questão</span>  
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="respcorreta">Alternativa Correta:</label>
	  <div class="col-md-4">
	    <select id="respcorreta" name="respcorreta" class="form-control">
	    			<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
	    </select>
	  </div>
	</div>

	<!-- File Button --> 
	<div class="form-group">
	  <label class="col-md-4 control-label" for="img">Imagem: (Não Obrigatório)</label>
	  <div class="col-md-4">
	    <input id="img" name="imagem" class="input-file" type="file">
	  </div>
	</div>



	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="singlebutton"></label>
	  <div class="col-md-4">
	    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
	  </div>
	</div>

	</fieldset>

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
	</form>

 <footer class="footer" style="background:#20205a;position:relative;width:100%;height:29px;">
      <div class="container">
        <p class="text-muted" style="color:white;">Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</p>
      </div>
    </footer>

	</body>
	</html>

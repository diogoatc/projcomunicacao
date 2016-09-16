<?php
include('verifica_sessao_professor.php');
if(isset($_POST['envia'])){
	

$curso = $_POST['curso'];
$turno = $_POST['turno'];
$semestre = $_POST['semestre'];
echo $curso;
echo $turno;
echo $semestre;



setcookie('curso', $curso);
setcookie('turno', $turno);
setcookie('semestre', $semestre);

header("Location: cadastraquestoes.php"); exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Questões</title>
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
<nav class="navbar navbar-inverse" style="border-radius:0px; background:#20205a;>

  <div class="container-fluid">
    
	      <div class="col-sm-2">
	        <a  class="navbar-brand" href="index.php"><img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp"></a>
	     </div>
          
	      <div class="col-sm-3">
	        <h3 class="areadoprofessor">ÁREA DO PROFESSOR</h3>
	      </div>

    <div class="col-sm-7">
    <ul class="nav navbar-nav">
      <li class="active"><a id="ativo" href="index.php">Home</a></li>
<li><a id="font-white" href="pre-cadastra.php">Cadastrar Questões</a></li>
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
<div id="wrap">
       <legend class="text-center">SELECIONE O CURSO, O TURNO E O SEMESTRE QUE DESEJA INSERIR AS QUESTÕES</legend>
       
       <form class="form-horizontal" id="questcad" enctype="multipart/form-data" action="pre-cadastra.php" method="post">

        <fieldset>

        	<div class="form-group">
	  		<label class="col-md-4 control-label" for="curso">Curso: </label>
			<div class="col-md-3">
				<select required="" name="curso" id="curso" class="form-control" style="font-size:14pt;">
				<option value="">Selecione o Curso</option>
				<option value="PP">PP</option>
				<option value="RTV">RTV</option>
				</select>
			</div>
			</div>

			<div class="form-group">
	  		<label class="col-md-4 control-label" for="turno">Turno: </label>
	  		<div class="col-md-3">	
	  			<select required="" name="turno" id="turno" class="form-control" style="font-size:14pt;">
				<option value="">Selecione o Turno</option>
				<option value="Matutino">Matutino</option>
				<option value="Noturno">Noturno</option>
				</select> 
			</div>
			</div>

			<div class="form-group">
	        <label class="col-md-4 control-label" for="semestre" >Semestre: </label>
	         <div class="col-md-3">
				 <select required="" id="semestre" name="semestre" class="form-control" style="font-size:14pt;">

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


				<div class="form-group">
	  <label class="col-md-4 control-label" for="singlebutton"></label>
	  <div class="col-md-1">

	    <input style="font-size:13pt;" name="envia" type="submit" class="btn btn-primary"></input>
	   
				</fieldset>
				</form>
</div>	

<div id="push"></div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
      </div>
    </div>
</body>
</html>


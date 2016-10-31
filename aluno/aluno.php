<?php
if (!empty($_POST['nome']) and !empty($_POST['ra'])){
if (!isset($_SESSION)) session_start();

include('../classes/class_disciplina.php');

if (isset($_POST['fazerprova'])) {

  $nome = $_POST['nome'];
  $ra = $_POST['ra'];
  $semestre = $_POST['semestre'];
  $curso = $_POST['curso'];
  $turno = $_POST['turno'];
  $timezone=date_default_timezone_set('America/Sao_Paulo');
  $dtainicio = date('Y-m-d H:i:s');

  $_SESSION['nome'] = $nome;
  $_SESSION['ra'] = $ra;
  $_SESSION['dtainicio'] = $dtainicio;

  $x = new disciplina();
  $retorno = $x->selectDisciplinaByAluno($PDO, $curso, $turno, $semestre,$dtainicio);

  if ($retorno == null) {
    echo "<script>
    alert('Não há nenhuma prova disponível');
    window.location='index.php';
    </script>"; 
    

  }
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Prova Unificada</title>
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
    
	      <div class="col-sm-5">
	        <a  class="navbar-brand" href="index.php"><img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp"></a>
	     </div>
          
	      <div class="col-sm-3">
	        <h2 style="color:#ffffff;">ÁREA DO ALUNO</h2>
	      </div>
    
    </ul>
  </div>
  </div>
</nav>

<div id="wrap"> 
<!-- Form Name -->
<form class="form-horizontal" action="prova.php" method="post">
<fieldset>

<legend class="text-center"><h1><strong>Prova Unificada de Comunicação Social<strong></h1></legend>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label" for="disciplina"><h3><strong>Selecione as Disciplinas</strong></h3></label>            
<div class="col-md-9">
<div class="row">
  
<?php
foreach ($retorno as $key) {
  
?>
   
      <div class="col-sm-1 col-md-offset-1" style="border-width: thin; border-style: solid; border-color:#D3D3D3;width:400px;height:200px;">
    <div style="height:20px;">
     <div class="card card-block">
     <div class="span4">
      <h2 class="card-title text-center"><legend><?php echo $key['nomedisciplina']; ?></legend></h2>
      <h3 class="card-text text-center"><?php echo $key['nomeprofessor']; ?></h3>
      <input type="checkbox" name="check_list[]" value="<?php echo $key['id'] ?>" style="transform: scale(3.5); margin-left:50%;margin-top:30px;">
        </div>
        </div>
        </div>
     </div> 
<?php
}
?>

</div>
<div style="height:40px;"> </div>
<div class="form-group">
  <label class="col-md-5 control-label"></label>
  <div class="col-md-3">
    <button style="font-size:16pt;" name="prova" type="submit" class="btn btn-warning">AVANÇAR</button>
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
</body>
</html>


<?php
}
}else{
  header('Location: index.php');
}
?>

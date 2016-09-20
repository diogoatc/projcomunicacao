<?php 
include('verifica_sessao_admin.php');
 include_once('../model/conexao.php');
 include_once('../classes/class_disciplina.php');
 ?>

 <!DOCTYPE html>
 <html>
 <head>
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
 	<title>Liberar Prova</title>
 </head>
 <body>
 
<form class="form-horizontal" action="" id="cadastro" method="post">
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
<input type="datetime-local" name="data">

<input type="submit" name="envia">

</form>

 </body>
 </html>

 <?php 
 if(isset($_POST['envia'])){

 	$curso=$_POST['curso'];
 	$turno=$_POST['turno'];
 	$semestre=$_POST['semestre'];
 	$data=$_POST['data'];
 	$dataformat=date_create($data);
 	$ndata = date_format($dataformat, 'Y-m-d H:i:s');

 	$x=new disciplina();
 	$x->insereDataDisciplina($PDO,$curso,$turno,$semestre,$ndata);

 	
 }

  ?>
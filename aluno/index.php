<!DOCTYPE html>
<html>
  <head>
  <title>Área do Aluno</title>
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
<form class="form-horizontal" action="aluno.php" method="post">
<fieldset>

<!-- Form Name -->
<legend class="text-center"><h2>Prova Unificada de Comunicação Social</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label">Nome</label>  
  <div class="col-md-3">
  <input name="nome" type="text" placeholder="Insira seu Nome" class="form-control input-md" required="">
  <span class="help-block">Exemplo: João Barbosa Fransciso</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label">RA</label>  
  <div class="col-md-3">
  <input name="ra" type="text" placeholder="Insira seu RA" class="form-control input-md" required="">
  <span class="help-block">Exemplo: 777777</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label">Semestre</label>
  <div class="col-md-3">
    <select id="semestre" name="semestre" class="form-control" required="">
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

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label">Curso</label>
  <div class="col-md-3">
    <select id="curso" name="curso" class="form-control" required="">
      <option value="">Selecione uma das opções</option>
      <option value="PP">PP</option>
      <option value="RTV">RTV</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label">Turno</label>
  <div class="col-md-3">
    <select id="turno" name="turno" class="form-control" required="">
      <option value="">Selecione uma das opções</option>
      <option value="Matutino">Matutino</option>
      <option value="Noturno">Noturno</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label"></label>
  <div class="col-md-3">
    <button style="font-size:13pt;" name="envia" type="submit" class="btn btn-warning">CONFIRMAR</button>
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

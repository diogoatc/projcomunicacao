<html lang="pt-br">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="assets/bootstrap-3.3.7-dist/js/newjs.js"></script>
		  <link rel="stylesheet" href="assets/css/normalize.css">
		  <link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/js/newjs.js">
		  <link rel="stylesheet" href="assets/css/newstyle.css">
</head>

<body>

<nav class="navbar navbar-inverse" style="border-radius:0px; background:#20205a;">

  <div class="container-fluid">

		  <div class="col-sm-4">
			<a  class="navbar-brand pull-left" href="index.php"><img style="margin-top:-13px;width:70%;"  src="assets/img/UNASP.png" alt="logo unasp"></a>
		 </div>
         </div>
</nav>

   <div id="wrap">

<div class="container">
  <div class="jumbotron">
    <h1 class="text-center">Prova Unificada</h1>
    <h2 class="text-center">Bem-vindo</h2><br>
  </div>
  <strong><h4><p class="text-center">Se você for aluno, basta clicar na imagem para fazer a prova. Se for professor ou administrador, apenas faça o Login.</p>
  </h4></strong>
  </div>

    <div class="col-sm-4">
    <section>
            <a href="aluno/index.php"><img class="responsivo" src="assets/img/art.png" onMouseOver="this.src='assets/img/click.png'" onMouseOut="this.src='assets/img/art.png'" onClick="location='#'"></a>
        </section>
    </div>

  
<form class="form-horizontal" action="model/validacao.php" method="post">
<fieldset>

<!-- Form Name -->
<legend class="text-center" style="width:450px;">Área de Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="text">Usuário</label>  
  <div class="col-md-4">
  <input name="usuario" type="text" placeholder="Insira o Usuário" class="form-control input-md" required="Por favor,preencher o campo com o seu usuário">
  <span class="help-block">Exemplo: joao.francisco</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="pwd">Senha:</label>
  <div class="col-md-4">
    <input id="pwd" name="senha" type="password" placeholder="Insira sua Senha" class="form-control input-md" required="Por Favor, preencher o campo com a sua senha">
    <span class="help-block">Qualquer dúvida entrar em contato Coordenação</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="submit"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning">ENTRAR</button>
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

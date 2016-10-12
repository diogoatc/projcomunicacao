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

<nav class="navbar navbar-inverse" style="border-radius:0px; background:#20205a; height:80px;">

  <div class="container-fluid">

		  <div class="col-sm-7">
			<a  class="navbar-brand pull-right" href="index.php"><img style="margin-top:-13px;width:100%;"  src="assets/img/UNASP.png" alt="logo unasp"></a>
		 </div>
         </div>
</nav>

   <div id="wrap">

    <h2 class="text-center">Prova Unificada de Comunicação Social</h2>
    <h3 class="text-center">Seja Bem-vindo</h3><br>
   <h4><p class="text-center">Se você for aluno, basta clicar na imagem para fazer a prova, professor ou administrador, realize o Login.</p>
  </h4><br>
 

      <div class="col-sm-4 col-md-offset-2">
    <section>
            <a href="aluno/index.php"><img class="responsivo" src="assets/img/art.png" onMouseOver="this.src='assets/img/click.png'" onMouseOut="this.src='assets/img/art.png'" onClick="location='#'"></a>
        </section>
    </div>
<form class="form-horizontal" action="model/validacao.php" method="post">
<fieldset>

<!-- Form Name -->
<h2 class="text-center"><strong>Área de Login</strong></h2>
<br>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="text">Usuário:</label>  
  <div class="col-md-6">
  <input name="usuario" type="text" placeholder="Insira o Usuário" class="form-control input-md" required="Por favor,preencher o campo com o seu usuário">
  <span class="help-block">Exemplo: joao.francisco</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pwd">Senha:</label>
  <div class="col-md-6">
    <input id="pwd" name="senha" type="password" placeholder="Insira sua Senha" class="form-control input-md" required="Por Favor, preencher o campo com a sua senha">
    <span class="help-block">Qualquer dúvida entrar em contato com a Coordenação</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-6">
    <button style="font-size:13pt;"type="submit" class="btn btn-primary">ENTRAR</button>
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

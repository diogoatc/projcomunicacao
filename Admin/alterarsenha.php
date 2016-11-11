<?php 

	include_once('../model/conexao.php');
	include_once('../classes/class_usuario.php');
    include('verifica_sessao_admin.php');
  
?>

<!DOCTYPE html>

<head>
    <title>Alterar Senha</title>
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
	        <h3 class="areadoprofessor">ÁREA DO ADMINISTRADOR</h3>
	      </div>

  <div class="col-sm-8">
  <ul class="nav navbar-nav pull-right">
    <li><a id="font-white"  href="index.php">Home</a></li>
<li><a id="font-white" href="cadastro-disciplina.php">Cadastrar Disciplina</a></li>
<li><a id="font-white" href="liberarprova.php">Liberar Prova</a></li>
<li class="active"><a id="ativo" href="cadastro-professor.php">Cadastrar Professor</a></li>
    <li><a id="font-white" href="pre_relatorio.php">Relatório de Provas</a></li>
    <li class="dropdown"><a id="font-white" class="dropdown-toggle" data-toggle="dropdown" href="#">Listar<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="visualizadisciplinas.php">
        Todas as Disciplinas
        </a></li>
      <li><a href="visualizaprofessores.php">
        Todas os Professores
      </a></li>
       </ul>
    </li>
    <li><a id="font-white" href="../logout.php">Logout</a></li>
  </ul>
  </div>
  </div>
</nav>

<div id="wrap">
       <legend class="text-center">ALTERAR SENHA</legend>
       
    <form class="form-horizontal" action="alterarsenha.php" method="post">
<fieldset>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="senhaatual">Digite a Senha Atual:</label>
  <div class="col-md-4">
    <input name="senhaatual" type="password" placeholder="Digite a Senha Atual" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite a Senha Atual'" class="form-control input-md" required="">
    <span class="help-block">insira a senha atual</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="novasenha">Digite a Nova Senha:</label>  
  <div class="col-md-4">
  <input name="novasenha" type="password" placeholder="Digite a Nova Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite a Nova Senha'" class="form-control input-md" required="">
  <span class="help-block">Insira a nova senha</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="confsenha">Confirme a Senha:</label>
  <div class="col-md-4">
    <input name="confsenha" type="password" placeholder="Confirme a Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirme a Senha'" class="form-control input-md" required="">
    <span class="help-block">Confirme a senha novamente</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" for="envia"></label>
  <div class="col-md-4">
    <button style="font-size:13pt;" name="envia" type="submit" class="btn btn-success">Confirmar</button>
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
<?php

	if(isset($_POST['envia'])){


		$idusuario         = $_SESSION['UsuarioID'];
    	$senha_atual       = sha1(($_POST['senhaatual']));
   		$senha_nova        = sha1(($_POST['novasenha']));
    	$confirme_senha    = sha1(($_POST['confsenha']));

    	$conn = $PDO->query("SELECT senha FROM usuario WHERE id = $idusuario");
			$senha_banco = $conn->fetchColumn();

			

		if($senha_atual != $senha_banco){

			echo "
            <script>
            
            alert('Senha atual INCORRETA');
            window.location='alterarsenha.php';
        
            </script>
        
            ";

		}elseif($senha_nova != $confirme_senha){

			echo "
            <script>
            
            alert('As senhas não conferem');
            window.location='alterarsenha.php';
        
            </script>
        
            ";

		}elseif($senha_atual == $senha_banco){

			$x=new usuario();
			$x->alterarsenha($PDO, $idusuario, $senha_nova);

		}
	
	}
	

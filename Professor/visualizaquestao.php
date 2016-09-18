
<!DOCTYPE html>
<html>
<head>
  <title>Visualizar Questão</title>
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
<li><a id="font-white" href="pre-cadastra.php">Cadastrar Questões</a></li>
      <li class="dropdown"><a id="font-white" class="dropdown-toggle" data-toggle="dropdown" href="#">Relatório de Prova<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a target="_blank" href="../classes/class_relatorio_disciplinas.php?idusuario=<?php echo $_SESSION['UsuarioID'] ?>">
                    Relatorios de todas as disciplinas
                </a></li>
           </ul>
      </li>
      <li  class="active"><a id="ativo" href="listadisciplinas.php">Editar/Visualizar Questões</a></li>
	        <li><a id="font-white" href="alterarsenha.php">Alterar Senha</a></li>
	        <li><a id="font-white" href="../logout.php">Logout</a></li>
    </ul>
  </div>
  </div>
</nav>
<div id="wrap">
<legend class="text-center">Visualize a Questão</legend>

            <div class="row">
						<div class="col-md-4 column ui-sortable text-center"></div>
                        <?php
  include('../classes/class_questao.php');
  include('../model/conexao.php');
  $idquestao = $_GET['idquestao'];
  $iddisciplina = $_GET['iddisciplina'];
    $x= new questao();
    $key = $x->selectQuestaoById($PDO,$idquestao);
    
    echo $key[0]['titulo']."<br/>";
      if (!empty($key[0]['imagem'])){
        echo'<img height="100" width="100" src="data:image/jpg;base64,'.$key[0]['imagem'].'" />';
      }else{
        echo "";
      }
      ?>
						</div>
    

            <form class="form-horizontal">
            <fieldset>
                        <div class="row">
						<div class="col-md-4 column ui-sortable"></div>
						<div class="col-md-4 column ui-sortable">
            <input type="radio" required><?php print_r($key[0]['resposta1']) ?><br>
              <input type="radio" value="B"><?php print_r($key[0]['resposta2']) ?><br>
              <input type="radio"  value="C"><?php print_r($key[0]['resposta3']) ?><br>
              <input type="radio"  value="D"><?php print_r($key[0]['resposta4']) ?><br>
              <input type="radio" value="E"><?php print_r($key[0]['resposta5']) ?><br>
             </div>
						<div class="col-md-4 column ui-sortable"></div>
					</div>
                         
           </fieldset>
           <form>
    </div>
           <a href="listaquestoes.php?id=<?php echo $iddisciplina;?>"> Voltar para a Lista de Questões </a>
           
           <div id="push"></div>
    </div>
 		 <div id="footer">
      <div class="container">
        <p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
      </div>
    </div>
</body>
</html>


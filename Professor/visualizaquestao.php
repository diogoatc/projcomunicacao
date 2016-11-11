

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
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
  <style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:auto;color: black; background-color: #ffffff}

  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#20205a;">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      <img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp">
         </a>
    </div>
    <div>
       <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
           <li><a href="#section1">Disciplina</a></li><!--chamar função php nome da disciplina -->
        </ul>
      </div>
    </div>
  </div>
</nav>


<!-- Começa aqui -->
<div id="espaco"></div>

<div id="section1" class="container-fluid text-center">
 <legend id="alinhamento" class="text-center"><strong>Nome da Disciplina</strong></legend> <!--chamar função php nome da disciplina -->
 </div>
 <?php
  include('../classes/class_questao.php');
  include('../model/conexao.php');
  $idquestao = $_GET['idquestao'];
  $iddisciplina = $_GET['iddisciplina'];
    $x= new questao();
    $key = $x->selectQuestaoById($PDO,$idquestao);

?>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
  <h2><strong>Questão<strong></h2><!--chamar função php número da questão -->
  <h3 style=" white-space: pre-wrap;  text-align:justify;"><?php echo $key[0]['titulo']; ?></h3> <!--chamar função php Enunciado -->
 </div>
  </div>

<div id="espacoum"></div>

    <div class="row">
        <div class="col-md-5 col-md-offset-2">
            <?php
              if (!empty($key[0]['imagem'])){
            echo '<img class="responsiva" src="data:image/jpg;base64,'.$key[0]['imagem'].'" />';
            }else{
            echo "";
      }
             ?>
        </div>
    </div>

<div style="top-margin:40px;"></div>
<form class="form-horizontal">
<fieldset>
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>
  <div class="col-md-7">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="radios" id="" value="" checked="checked">
      <?php echo $key[0]['resposta1'] ?>
    </label>
  </div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="radios" id="" value="">
     <?php echo $key[0]['resposta2'] ?>
    </label>
  </div>
  <div class="radio">
    <label for="radios-2">
      <input type="radio" name="radios" id="" value="">
      <?php echo $key[0]['resposta3'] ?>
    </label>
  </div>
  <div class="radio">
    <label for="radios-3">
      <input type="radio" name="radios" id="" value="">
      <?php echo $key[0]['resposta4'] ?>
    </label>
  </div>
  <div class="radio">
    <label for="radios-4">
      <input type="radio" name="radios" id="" value="">
      <?php echo $key[0]['resposta5'] ?>
    </label>
  </div>
  </div>
</div>
</fieldset>
<legend></legend>
</form>

<!-- Termina aqui -->
<!-- Button -->
<div class="form-group" style="margin-top:-40px;">
  <label class="col-md-5 control-label" for="singlebutton"></label>
  <div class="col-md-3">
    <button id="singlebutton" name="singlebutton" class="btn btn-success" onclick="window.location='index.php'">VOLTAR PARA O MENU PRINCIPAL</button>
  </div>
</div>

     <div id="espacoum"></div>
    <div id="footer">
    <div class="container">
    <p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
    </div>
  </div>

</body>
</html>
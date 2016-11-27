<?php 

require_once("../classes/class_prova.php");
require_once("../model/conexao.php");
$ra = $_POST['ra'];
$x = new prova();
$retorno = $x->geraRelatorioPorRa($PDO,$ra);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de Questões feitas pelo Aluno</title>
  <meta charset="utf-8">
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

  </div>
</nav>

  <div id="wrap">
  <h3> Aluno: <?php echo $retorno[0]['nomealuno']; ?></h3>
   <h3> Nota da PU: <?php echo round($retorno[0]['nota'], 1); ?></h3>
  <div class="table-responsive">
  <table class="table table-hover">
      
    <thead>
      <td class="text-center"><strong>Resposta do Aluno</strong></td>
      <td class="text-center"><strong>Resposta Correta</strong></td>
      <td><strong></strong></td>
    </thead>
 
  <?php foreach ($retorno as $key) {   ?>
      <tr>
        <td class="text-center"><?php echo $key['respostaaluno']; ?></a></td>
        <td class="text-center text-danger offset3"><?php echo $key['respostacorreta']; ?></td>
        <td><a href='../Professor/visualizaquestao.php?idquestao=<?php echo $key['idquestao']; ?>'>Visualizar Questão </a></td>

      </tr>

<?php } ?>

  </table>
  </div>
  </div>


  <div id="push"></div>
     <div id="footer">
      <div class="container">
        <p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
      </div>
    </div>  
</body>
</html>


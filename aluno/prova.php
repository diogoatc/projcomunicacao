<?php
if (!isset($_SESSION)) session_start();
if (!empty($_SESSION['nome']) and !empty($_SESSION['ra'])){
include_once('../model/conexao.php');
include('../classes/class_questao.php');
include('../classes/class_disciplina.php');
if(!empty($_POST['check_list'])) {
  $questoes = array();
  $respcorretaquestoes = array();
  $idquestoes = array();
  $numResposta = 1;
  $numQuestao = 1;
  $check_list = $_POST['check_list'];
  $questoesEmbaralhadas = array();
  $nomeDisciplinas = array();

  foreach($check_list as $id) {
    $questao = new questao();
    $retorno = $questao->selectQuestaoByDisciplina($PDO, $id);
    $disciplina = new disciplina();
    $retornoNome = $disciplina->selectNomeDisciplinaById($PDO, $id);
    $nomeDisciplinas['nome'] = $retornoNome;

    foreach ($retorno as $key) {
      array_push($questoes, $key);
      array_push($respcorretaquestoes,$key['respostacorreta']);
      array_push($idquestoes, $key['id']);
    }

    //shuffle($retorno);

    foreach ($retorno as $key) {
      if (!empty($key['imagem'])){
        $img = '<div id="espacoum"></div>
                <div class="col-md-5 col-md-offset-2">
                <img class="responsiva" style="margin-bottom:20px;" alt="imagem" src="data:image/jpg;base64,'.$key['imagem'].'" />
                </div>';
      }else{
        $img = "";
      }
      $printQuestao = '<h3 style="white-space: pre-wrap; text-align:justify;">'.$key['titulo'].'</h3>
                      </div>
                      </div>
                      <div class="row">
                      '.$img.'
                      </div>
                      <div style="top-margin:30px;"></div>
                      <div class="form-group">
                      <fieldset>
                        <label class="col-md-2 control-label" for=""></label>
                        <div class="col-md-7">
                        <div class="radio">
                          <label for="radios-0">
                            <input type="radio" name="respQuestao'.$numResposta.'" id="" value="A" required>
                            '.$key['resposta1'].'
                          </label>
                      	</div>
                        <div class="radio">
                          <label for="radios-1">
                            <input type="radio" name="respQuestao'.$numResposta.'" id="" value="B">
                            '.$key['resposta2'].'
                          </label>
                      	</div>
                        <div class="radio">
                          <label for="radios-2">
                            <input type="radio" name="respQuestao'.$numResposta.'" id="" value="C">
                            '.$key['resposta3'].'
                          </label>
                      	</div>
                        <div class="radio">
                          <label for="radios-3">
                            <input type="radio" name="respQuestao'.$numResposta.'" id="" value="D">
                            '.$key['resposta4'].'
                          </label>
                      	</div>
                        <div class="radio">
                          <label for="radios-4">
                            <input type="radio" name="respQuestao'.$numResposta.'" id="" value="E">
                            '.$key['resposta5'].'
                          </label>
                      	</div>
                        </div>
                      </div>
                      </fieldset>
                      <legend></legend>';
        $numResposta++;
        $nomeDisciplinas['print'] = $printQuestao;
        array_push($questoesEmbaralhadas, $nomeDisciplinas);
      }

  }

  setcookie('idquestoes',serialize($idquestoes));
  setcookie('respquestoes',serialize($respcorretaquestoes));
  setcookie('check_list',serialize($check_list));
?>
<!DOCTYPE html>
<html>
<head>
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
  <style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section2 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section3 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section4 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section5 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section6 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
  #section7 {padding-top:50px;height:auto;color: black; background-color: #ffffff}
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
         <?php
         $section = "";
         $contador = 1;
         foreach ($questoesEmbaralhadas as $key) {
           if ($key['nome'] != $section) {
             $section = $key['nome'];
             echo '<ul class="nav navbar-nav">
             <li><a href="#section'.$contador.'">'.$section.'</a></li></ul>';
             $contador++;
           }
         }
         $contador = 1;
         ?>
      </div>
    </div>
  </div>
</nav>
<form class="form-horizontal" action="nota.php" method="post">

<?php
$nome = "";
foreach ($questoesEmbaralhadas as $key) {
  if ($key['nome'] != $nome) {
    $nome = $key['nome'];
    echo '<div id="espaco"></div>
          <div id="section'.$contador.'" class="container-fluid text-center">
          <legend id="alinhamento" class="text-center"><strong>'.$nome.'</strong></legend>';
    $contador++;
  }

  echo '</div>
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h2><strong>Questão '.$numQuestao++.'</strong></h2>';
  echo $key['print'];
}
?>
<br>
<br>
<!-- Button -->
<div class="form-group" style="margin-top:-40px;">
  <label class="col-md-5 control-label" for="singlebutton"></label>
  <div class="col-md-3">
    <button id="singlebutton" type="submit" name="finalizar" class="btn btn-success">FINALIZAR A PROVA</button>
  </div>
</div>
</form>
    
		<div id="footer">
	  <div class="container">
		<p class="muted credit"> Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</a></p>
	  </div>
	</div>

</body>
</html>
<?php
}
}else {
  header('Location: index.php');
}
?>

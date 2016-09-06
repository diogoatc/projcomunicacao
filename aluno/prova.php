<?php
if (!empty($_COOKIE['nome']) and !empty($_COOKIE['ra'])){

include_once('../model/conexao.php');
include('../classes/class_questao.php');

if(!empty($_POST['check_list'])) {

    $questoes = array();
    $numResposta = 1;
    $numQuestao = 1;

    foreach($_POST['check_list'] as $id) {
        $questao = new questao();
        $retorno = $questao->selectQuestaoByDisciplina($PDO,$id);

        foreach ($retorno as $key) {
          array_push($questoes, $key);
        }

        if (!isset($_SESSION)) session_start();
        $_SESSION['questoes'] = $questoes;

    }
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Prova Unificada</title>
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>

  <body>
      <div class="container">
      <div class="header">
        <img src="../assets/img/UNASP.png" height="66" width="199" alt="logo unasp">
      </div>

          <nav id="menu">
              <h1>Menu Principal</h1>
                <ul type="disc">
                    <li><a href="index.php">MENU</a></li>
                </ul>
           
                <ul id="logout" type="disc">
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
          </nav>         

      <div class="content" style="top: 44%; height: 200px;width: 800px; left:40%">
      <div class="login" style="font-family:sans-serif; font-size:16pt;">Prova Unificada</div>
      <div class="form" style="top: 36%; width: 50%;left:55%;">

    <?php foreach ($questoes as $key) {
      echo "<h4>Questão ".$numQuestao++."</h4>";
      echo $key['titulo'];?><br>

          <form class="" action="nota.php" method="post">
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="A" required><?php print_r($key['resposta1']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="B"><?php print_r($key['resposta2']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="C"><?php print_r($key['resposta3']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="D"><?php print_r($key['resposta4']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="E"><?php print_r($key['resposta5']) ?><br>

        <?php $numResposta++;} ?><br>

              <input type="submit" name="finalizar" value="Finalizar Prova">
            </form>
      </div>
      </div>
          <footer id="rodape">
             <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>
          </footer>
      </div>  

</body>
</html>
<?php
}
setcookie('nome');
setcookie('ra');

}else{

  header('Location: index.php');
}
?>

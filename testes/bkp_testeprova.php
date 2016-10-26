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

    shuffle($retorno);

    foreach ($retorno as $key) {
      if (!empty($key['imagem'])){
        $img = '<img src="data:image/jpg;base64,'.$key['imagem'].'" />';
      }else{
        $img = "";
      }
      $printQuestao = ''.$key['titulo'].'<br>'
                       .$img.'<br>
                       <form class="" action="nota.php" method="post">
                       <input type="radio" name="respQuestao'.$numResposta.'" value="A" required>'.$key['resposta1'].'<br>
                       <input type="radio" name="respQuestao'.$numResposta.'" value="B">'.$key['resposta2'].'<br>
                       <input type="radio" name="respQuestao'.$numResposta.'" value="C">'.$key['resposta3'].'<br>
                       <input type="radio" name="respQuestao'.$numResposta.'" value="D">'.$key['resposta4'].'<br>
                       <input type="radio" name="respQuestao'.$numResposta.'" value="E">'.$key['resposta5'].'<br>';
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

    <?php
      $nome = "";
      foreach ($questoesEmbaralhadas as $key) {
        if ($key['nome'] != $nome) {
          $nome = $key['nome'];
          echo '<h4>'.$nome.'</h4><br>';
        }

        echo '<h4>Questão '.$numQuestao++.'</h4><br>';
        echo $key['print'];
      }
      ?>
      <br>
            <input type="submit" name="finalizar" value="Finalizar Prova">
          </form>
          <br>
          <br>
          <br>
      </div>
      </div>

      </div>
          <footer id="rodape">
             <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>
          </footer>
</body>
</html>
<?php
}
}else {
  header('Location: index.php');
}
?>

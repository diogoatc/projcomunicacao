<?php
//TODO verificar se o aluno fez o pré registro para fazer a prova

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
  </head>
  <body>
    <h3>Prova Unificada</h3>
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
  </body>
</html>
<?php
}
?>

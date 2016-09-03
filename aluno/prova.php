<?php
//TODO verificar se o aluno fez o pré registro para fazer a prova

include_once('../model/conexao.php');
include('../classes/class_questao.php');

if(!empty($_POST['check_list'])) {

    $questoes = array();
    $contador = 1;

    foreach($_POST['check_list'] as $id) {
            $questao = new questao();
            $retorno = $questao->selectQuestaoByDisciplina($PDO,$id);

            foreach ($retorno as $key) {
              array_push($questoes, $key);
            }
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
      echo "<h4>Questão ".$contador++."</h4>";
      echo $key['titulo'];?><br>
      <input type="radio" name="resposta" value="A"><?php print_r($key['resposta1']) ?><br>
      <input type="radio" name="resposta" value="B"><?php print_r($key['resposta2']) ?><br>
      <input type="radio" name="resposta" value="C"><?php print_r($key['resposta3']) ?><br>
      <input type="radio" name="resposta" value="D"><?php print_r($key['resposta4']) ?><br>
      <input type="radio" name="resposta" value="E"><?php print_r($key['resposta5']) ?><br>
    <?php } ?><br>
    <input type="submit" name="finalizar" value="Finalizar Prova">
  </body>
</html>
<?php
}
?>

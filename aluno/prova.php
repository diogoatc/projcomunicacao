<?php
//TODO verificar se o aluno fez o pré registro para fazer a prova

include_once('../model/conexao.php');
include('../classes/class_questao.php');

if(!empty($_POST['check_list'])) {

    $questoes = array();
    $contador = 0;

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
    <h3>Questão <?php echo $contador+1?></h3>
    <h3><?php print_r($questoes[$contador]['titulo']) ?></h3>
    <input type="checkbox" name="resposta" value="A"><?php print_r($questoes[$contador]['resposta1']) ?><br>
    <input type="checkbox" name="resposta" value="B"><?php print_r($questoes[$contador]['resposta2']) ?><br>
    <input type="checkbox" name="resposta" value="C"><?php print_r($questoes[$contador]['resposta3']) ?><br>
    <input type="checkbox" name="resposta" value="D"><?php print_r($questoes[$contador]['resposta4']) ?><br>
    <input type="checkbox" name="resposta" value="E"><?php print_r($questoes[$contador]['resposta5']) ?><br>
    <input type="submit" name="proxima" value="Próxima Questão">
  </body>
</html>
<?php
}
?>

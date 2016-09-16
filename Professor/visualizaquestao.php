
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
  include('../classes/class_questao.php');
  include('../model/conexao.php');
  $idquestao = $_GET['idquestao'];
  $iddisciplina = $_GET['iddisciplina'];
    $x= new questao();
    $key = $x->selectQuestaoById($PDO,$idquestao);
    
    echo $key[0]['titulo'];
      if (!empty($key[0]['imagem'])){
        echo'<img src="data:image/jpg;base64,'.$key['imagem'].'" />';
      }else{
        echo "";
      }
      ?>
      <br>

            <form>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="A" required><?php print_r($key[0]['resposta1']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="B"><?php print_r($key[0]['resposta2']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="C"><?php print_r($key[0]['resposta3']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="D"><?php print_r($key[0]['resposta4']) ?><br>
              <input type="radio" name="respQuestao<?php echo $numResposta; ?>" value="E"><?php print_r($key[0]['resposta5']) ?><br>
           <form>

           <a href="listaquestoes.php?id="<? echo $iddisciplina;?>"> aaaaaa </a>
</body>
</html>


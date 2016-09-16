
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
              <input type="radio" required><?php print_r($key[0]['resposta1']) ?><br>
              <input type="radio" value="B"><?php print_r($key[0]['resposta2']) ?><br>
              <input type="radio"  value="C"><?php print_r($key[0]['resposta3']) ?><br>
              <input type="radio"  value="D"><?php print_r($key[0]['resposta4']) ?><br>
              <input type="radio" value="E"><?php print_r($key[0]['resposta5']) ?><br>
           <form>

           <a href="listaquestoes.php?id=<?php echo $iddisciplina;?>"> Voltar para a Lista de Questões </a>
           
</body>
</html>


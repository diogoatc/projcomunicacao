<?php
// A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();
      
    $nivel_necessario = 2;  //2 é o nível Professor
      
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] !=$nivel_necessario)) {
        // Destrói a sessão por segurança
        echo "<script> alert('Você precisa estar logado para acessar essa página');</script>";
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: ../index.php"); exit;
    }

require_once("../model/conexao.php");
require_once("../classes/class_questao.php");
$iddisciplina = $_GET['id'];

$x = new questao();
$retorno = $x->selectQuestaoByDisciplina($PDO,$iddisciplina);


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table border='1' cellspacing='3' cellpadding='2'>
<thead> 
	<td>Enunciado</td>
	<td>Resposta A</td>
	<td>Resposta B</td>
	<td>Resposta C</td>
	<td>Resposta D</td>
	<td>Resposta E</td>
	<td>Resposta Certa</td>
	<td></td>
	<td></td>

</thead>
<?php foreach ($retorno as $key) {   ?>
	<tr>
		<td> <?php echo $key['titulo']; ?></a></td>
		<td> <?php echo $key['resposta1']; ?></td>
		<td> <?php echo $key['resposta2']; ?></td>
		<td> <?php echo $key['resposta3']; ?></td>
		<td> <?php echo $key['resposta4']; ?></td>
		<td> <?php echo $key['resposta5']; ?></td>
		<td> <?php echo $key['respostacorreta']; ?></td>
		<td> <a href="editaquestao.php?iddisciplina=<?php echo $iddisciplina; ?>&id=<?php echo $key['id']; ?>">Editar</a></td>
		<td> <a href="editaquestao.php?iddisciplina=<?php echo $iddisciplina; ?>&deleta=1&id=<?php echo $key['id']; ?>">Excluir</a></td>
	</tr>
<?php } ?>

</table>
</body>

</html>
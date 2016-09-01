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
require_once("../classes/class_disciplina.php");
$idusuario = $_SESSION['UsuarioID'];
$x = new disciplina();
$retorno = $x->selectDisciplinaByProfessor($PDO, $idusuario);
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table border='1' cellspacing='3' cellpadding='2'>
<thead> 
	<td>Nome</td>
	<td>Curso</td>
	<td>Turno</td>
	<td>Semestre</td>
	<td></td>

</thead>
<?php foreach ($retorno as $key) {   ?>
	<tr>
		<td><a href="listaquestoes.php?id=<?php echo $key['id']; ?>"> <?php echo $key['nome']; ?></a></td>
		<td> <?php echo $key['curso']; ?></td>
		<td> <?php echo $key['turno']; ?></td>
		<td> <?php echo $key['semestre']; ?></td>
		<td> <a href="editadisciplina.php?id=<?php echo $key['id']; ?>">Editar</a></td>
	</tr>
<?php } ?>

</table>
</body>

</html>
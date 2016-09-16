<?php
include('verifica_sessao_professor.php');
require_once("../model/conexao.php");
require_once("../classes/class_disciplina.php");
$idusuario = $_SESSION['UsuarioID'];
$x = new disciplina();
$retorno = $x->selectDisciplinaByProfessor($PDO, $idusuario);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Lista de Disciplina</title>
	<meta charset="utf-8">
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


		<footer id="rodape">
	          <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>
        </footer>
		</div>
</body>
</html>
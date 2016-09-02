<?php 
include('../classes/class_disciplina.php');

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
$iddisciplina = $_GET['id'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Disciplina</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="post" action="editadisciplina.php">

		<input type="hidden" name="iddisciplina" value="<?php echo $iddisciplina; ?>">
		<label for="semestre">Semestre:</label>
			<select required="" name="semestre" id="semestre">
					<option value="1">1º Semestre</option>
					<option value="2">2º Semestre</option>
					<option value="3">3º Semestre</option>
					<option value="4">4º Semestre</option>
					<option value="5">5º Semestre</option>
					<option value="6">6º Semestre</option>
					<option value="7">7º Semestre</option>
					<option value="8">8º Semestre</option>
			</select><br/>
		<label for="curso">Curso:</label>
			<select required="" name="curso" id="curso">
				<option value="PP">PP</option>
				<option value="RTV">RTV</option>
			</select><br/>
		<label for="turno">Turno:</label>
			<select required="" name="turno" id="turno">
					<option value="Diurno">Diurno</option>
					<option value="Noturno">Noturno</option>
			</select><br/>
		<input type="submit" name="envia">
		
	</form>

</body>
</html

<?php 

if(isset($_POST['envia'])){

	$iddisciplina = $_POST['iddisciplina'];
	$semestre = $_POST['semestre'];
	$curso = $_POST['curso'];
	$turno = $_POST['turno'];

	$x = new disciplina();
	$editadisciplina = $x->editaDisciplinaByID($PDO,$iddisciplina,$semestre,$curso,$turno);

}



?>
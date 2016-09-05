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
            <div class="content" style="top: 44%; height: 300px;
            width: 900px; left:35%">

            <div class="login" style="font-family:sans-serif; font-size:16pt;">ALTERE O SEMESTRE,CURSO OU TURNO DA DISCIPLINA SELECIONADA</div>

            <div class="form" style="top: 26%; width: 50%;left:40%;">

	<form method="post" action="editadisciplina.php">

		<input type="hidden" name="iddisciplina" value="<?php echo $iddisciplina; ?>">
		<label style="font-size:28;margin-left: -15px;
    padding:-12%;" for="semestre">Semestre:</label>
			<select class="imobSelect" style="width:40%;font-size: 28px;" required="" name="semestre" id="semestre">
					<option value="1">1º Semestre</option>
					<option value="2">2º Semestre</option>
					<option value="3">3º Semestre</option>
					<option value="4">4º Semestre</option>
					<option value="5">5º Semestre</option>
					<option value="6">6º Semestre</option>
					<option value="7">7º Semestre</option>
					<option value="8">8º Semestre</option>
			</select><br/>
		<label style="font-size:28; padding:10px;" for="curso">Curso:</label>
			<select class="imobSelect" style="width:40%;font-size: 28px;" required="" name="curso" id="curso">
				<option value="PP">PP</option>
				<option value="RTV">RTV</option>
			</select><br/>
		<label style="font-size:28; padding:10px;" for="turno">Turno:</label>
			<select class="imobSelect" style="width:40%;font-size: 28px;" required="" name="turno" id="turno">
					<option value="Diurno">Diurno</option>
					<option value="Noturno">Noturno</option>
			</select><br/></br>
		<input style="width:41%; font-size:22px;margin-left:20%;" type="submit" name="envia">
		
	</form>
</div>
</div>
 <footer id="rodape">

                    <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>

                </footer>
</div>

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
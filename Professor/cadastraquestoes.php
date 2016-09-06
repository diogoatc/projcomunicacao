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
      

include('../classes/class_disciplina.php');
include('../classes/class_questao.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de questões</title>
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

            <div class="content" style="top: 40%; height: 980px; width:600px; left:48%;">
            <div class="login" style="font-family:sans-serif; font-size:20pt;">Cadastro de Questões</div>
            <div class="form" style="top:8%; width: 90%;left:30%;height: 980px;">

			<form id="questcad" action="cadastraquestoes.php" method="post">
				<label style="font-size:20px;font-family: sans-serif;height: 50%;" for="disciplina">Disciplina: </label>

				<select class="imobSelect" style="font-size:25px;font-family: sans-serif;height: 35%;width:46%;" required="" name="disciplina" id="disciplina" >

			<?php
			
			$curso=$_COOKIE['curso'];
			$turno=$_COOKIE['turno'];

			$x = new disciplina();
			$retorno = $x->selectAtivo($PDO,$curso,$turno);
			foreach ($retorno as $key) {

			?>
			<option value="<?php echo $key['nome'];?>" >
        <?php echo $key['nome'];?>
      </option>

			<?php
		}
		?>
			</select>

			<select  class="imobSelect" style="font-size:25px;font-family: sans-serif;height: 35%;width:35%;" required="" name="semestre" id="semestre">
				<option value="1">1º Semestre</option>
				<option value="2">2º Semestre</option>
				<option value="3">3º Semestre</option>
				<option value="4">4º Semestre</option>
				<option value="5">5º Semestre</option>
				<option value="6">6º Semestre</option>
				<option value="7">7º Semestre</option>
				<option value="8">8º Semestre</option>
			</select>

			<input type="hidden" name="idusuario" value="<?php echo $_SESSION['UsuarioID']; ?>"/>

			<p style="font-size:20px;font-family: sans-serif;">Enunciado da Questão:</p>

			<textarea required="" name="titulo" id="titulo" rows="10" cols="74" placeholder="Enunciado da Questão"></textarea> <br/><br/>

			<label style="font-size:20px;font-family: sans-serif;" for="resp1">Alternativa A:</label>
			<input style="height: 0px;width:500px;" required="" type="text" name="resp1"> <br/></br>

			<label style="font-size:20px;font-family: sans-serif;" for="resp2">Alternativa B:</label>
			<input style="height: 0px;width:500px;" required="" type="text" name="resp2"> <br/></br>

			<label style="font-size:20px;font-family: sans-serif;" for="resp3">Alternativa C:</label>
			<input style="height: 0px;width:500px;" required="" type="text" name="resp3"> <br/></br>

			<label style="font-size:20px;font-family: sans-serif;" for="resp4">Alternativa D:</label>
			<input style="height: 0px;width:500px;" required="" type="text" name="resp4"> <br/></br>

			<label style="font-size:20px;font-family: sans-serif;" for="resp5">Alternativa E:</label>
			<input style="height: 0px;width:500px;" required="" type="text" name="resp5"> <br/></br></br>

			<label style="font-size:25px;font-family: sans-serif;color:black;" for="respcorreta">Alternativa Correta:</label>

			<select  class="imobSelect" style="font-size:35px;font-family: sans-serif; width:50px; height:45px;top:40px; border-radius:10px;" required="" name="respcorreta" id="respcorreta">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				<option value="E">E</option>

			</select> <br/>
			
			<input style="font-size:35px;font-family: sans-serif; width:150px; height:60px;top:40px; border-radius:10px;padding:10px" type="submit" name="envia">
		</form>

		

<?php


if(isset($_POST['envia'])){

		$nomedisciplina = $_POST['disciplina'];
		$titulo = $_POST['titulo'];
		$resp1 = $_POST['resp1'];
		$resp2 = $_POST['resp2'];
		$resp3 = $_POST['resp3'];
		$resp4 = $_POST['resp4'];
		$resp5 = $_POST['resp5'];
		$respcorreta = $_POST['respcorreta'];
		$semestre = $_POST['semestre'];
		$idusuario = $_POST['idusuario'];
		$curso=$_COOKIE['curso'];
		$turno=$_COOKIE['turno'];

		
		
		$y = new disciplina();

		$iddisciplina = $y->verifica_disciplina_cadastrada($PDO,$nomedisciplina, $curso, $turno, $idusuario);

		if(empty($iddisciplina)){
		$cadastradiscicplina = $y->cadastra_disciplina($PDO, $nomedisciplina, $idusuario, $curso, $turno, $semestre);
		$iddisciplina = $y->verifica_disciplina_cadastrada($PDO,$nomedisciplina, $curso, $turno, $idusuario);
		}

		$x = new questao();
		$cadastraquestao = $x->registrarQuestoes($PDO, $iddisciplina, $titulo, $resp1, $resp2, $resp3, $resp4, $resp5, $respcorreta);
		
}


?>

</div>
</div>
   <footer id="rodape">
         <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>
    </footer>
 </div>

</body>
</html>

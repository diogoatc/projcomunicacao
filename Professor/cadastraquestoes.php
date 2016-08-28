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
		<form id="questcad" action="cadastraquestoes.php" method="post">
			<label for="disciplina">Disciplina: </label>
			<select required="" name="disciplina" id="disciplina" >
			<?php
			
			$x = new disciplina();
			$retorno = $x->selectAtivo($PDO);
			foreach ($retorno as $key) {

			?>
			<option value="<?php echo $key['id'];?>" >
        <?php echo $key['nome']." - ".$key['curso']." - ".$key['turno'];?>
      </option>

			<?php
		}
		?>
			</select>
			<select required="" name="semestre" id="semestre">
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
			<p>Enunciado da Questão:</p>
			<textarea required="" name="titulo" id="titulo" rows="10" cols="40">Enunciado da Questão</textarea> <br/>
			<label for="resp1">Alternativa A:</label>
			<input required="" type="text" name="resp1"> <br/>
			<label for="resp2">Alternativa B:</label>
			<input required="" type="text" name="resp2"> <br/>
			<label for="resp3">Alternativa C:</label>
			<input required="" type="text" name="resp3"> <br/>
			<label for="resp4">Alternativa D:</label>
			<input required="" type="text" name="resp4"> <br/>
			<label for="resp5">Alternativa E:</label>
			<input required="" type="text" name="resp5"> <br/>
			<label for="respcorreta"><h3>Alternativa Correta</h3></label>
			<select required="" name="respcorreta" id="respcorreta">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				<option value="E">E</option>

			</select> <br/>
			
			<input type="submit" name="envia">
		</form>




<?php


if(isset($_POST['envia'])){

		$disciplina = $_POST['disciplina'];
		$titulo = $_POST['titulo'];
		$resp1 = $_POST['resp1'];
		$resp2 = $_POST['resp2'];
		$resp3 = $_POST['resp3'];
		$resp4 = $_POST['resp4'];
		$resp5 = $_POST['resp5'];
		$respcorreta = $_POST['respcorreta'];
		$semestre = $_POST['semestre'];
		$idusuario = $_POST['idusuario'];
		
		$x = new questao();
		$cadastraquestao = $x->registrarQuestoes($PDO,$disciplina, $titulo, $resp1, $resp2, $resp3, $resp4, $resp5, $respcorreta);

}



?>

</body>
</html>

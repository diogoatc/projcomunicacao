<?php
include_once('../classes/class_disciplina.php');
include_once('../classes/class_questao.php');

$idquestao=$_GET['id'];
$iddisciplina = $_GET['iddisciplina'];

if(isset($_GET['deleta'])){

$x = new questao();
$retorno = $x->deletaQuestao($PDO,$idquestao,$iddisciplina);


}else{
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
      


?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de questões</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
		<form id="questcad" action="editaquestao.php" method="post">
						
		

			<input type="hidden" name="iddisciplina" value="<?php echo $iddisciplina ?>"/>
			<input type="hidden" name="idquestao" value="<?php echo $idquestao ?>"/>
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

		$idquestao = $_POST['idquestao'];
		$iddisciplina = $_POST['iddisciplina'];
		$titulo = $_POST['titulo'];
		$resp1 = $_POST['resp1'];
		$resp2 = $_POST['resp2'];
		$resp3 = $_POST['resp3'];
		$resp4 = $_POST['resp4'];
		$resp5 = $_POST['resp5'];
		$respcorreta = $_POST['respcorreta'];
		
		
		$x = new questao();
		$editaquestao = $x->editaQuestaoById($PDO,$idquestao,$iddisciplina,$titulo,$resp1,$resp2,$resp3,$resp4,$resp5,$respcorreta);


	}
}
	?>

<?php

if(isset($_POST['enviar'])){

if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']) OR empty($_POST['nome']) OR empty($_POST['email']))) {

	header("Location: ../index.php"); exit;

}

include('../model/conexao.php');
include('../classes/class_usuario.php');
$usuario = $_POST['usuario'];
$senha = sha1($_POST['senha']);
$nome = $_POST['nome'];
$email = $_POST['email'];
$nivel = 2;
$flgativo = 1;

 $y= new usuario();
 $resultado = $y->verificaExistente($PDO,$usuario);



if(!empty($resultado)){
		echo "<script> alert('Este usuário já existe.');</script>";
		header("Location: cadastro-professor.html"); exit;
}else{

	$y->registrarProfessor($PDO, $nome, $usuario, $senha, $email, $nivel, $flgativo);
}
}



?>

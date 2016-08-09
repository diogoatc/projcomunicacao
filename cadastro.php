<?php

if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']) OR empty($_POST['nome']) OR empty($_POST['email']) OR empty($_POST['tipodeusuario']))) {
	
	header("Location: index.php"); exit;

}

include('conexao.php');

$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$nivel = mysqli_real_escape_string($mysqli, $_POST['tipodeusuario']);
$id=null;
$csenha = sha1($senha);

$stmt = $mysqli->prepare("INSERT INTO usuarios (id,nome,usuario,senha,email,nivel) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->bind_param('issssi', $id, $nome, $usuario, $csenha, $email, $nivel);
if($stmt->execute()){
    print "Sucesso!";
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}
$stmt->close();

?>
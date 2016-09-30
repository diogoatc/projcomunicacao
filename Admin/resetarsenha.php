<?php 
include 'verifica_sessao_admin.php';
include_once('../classes/class_usuario.php');
$idusuario = $_GET['id'];

$senha = sha1("unasp16");

$x= new usuario();
$x->alterarsenha($PDO,$idusuario,$senha);


?>
<?php
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
  header("Location: index.php");
  exit;
}

include('conexao.php');

$usuario =($_POST['usuario']);
$senha = ($_POST['senha']);

$conn = $PDO->prepare("SELECT `id`, `nome`, `nivel` FROM `usuario`
  WHERE `usuario` = :usuario AND `senha` = :senha
  AND `flgativo` = :flgativo LIMIT 1");

$conn->bindParam(":usuario",$usuario, PDO::PARAM_STR);
$encsenha = sha1($senha);
$conn->bindParam(":senha", $encsenha, PDO::PARAM_STR);
$flgativo=1;
$conn->bindParam(":flgativo", $flgativo, PDO::PARAM_INT);
$conn->execute();
$resultado = $conn->fetch(PDO::FETCH_ASSOC);
$conn= null;

if(!empty($resultado)){
  if (!isset($_SESSION)) session_start();

  $_SESSION['UsuarioID'] = $resultado['id'];
  $_SESSION['UsuarioNome'] = $resultado['nome'];
  $_SESSION['UsuarioNivel'] = $resultado['nivel'];

  switch ($_SESSION['UsuarioNivel']) {
    case '1':
    header("Location:../Admin/index.php");
    break;
    case '2':
    header("Location:../Professor/index.php");
    break;
    default:
    echo "OPÇÂO INVÁLIDA";
    break;
  }
}else{
  error_log("Big trouble, we're all out of FOOs!", 1,
               "diogol_l@hotmail.com");
  echo "<script>
  alert('Usuário e/ou senha incorretos');
  window.location='../login.php';
  </script>";
}
?>

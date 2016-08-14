<?php
      
        
    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
        header("Location: index.php"); exit;
    }
      
   include('conexao.php');
    
      
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

    // Validação do usuário/senha digitados
    $sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') LIMIT 1";
    $query = $mysqli->query($sql);
    if ($query->num_rows != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        echo "Login inválido!";
    } else {
        // Salva os dados encontados na variável $resultado
        $resultado = mysqli_fetch_array($query);

        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();
      
        // Salva os dados encontrados na sessão
        $_SESSION['UsuarioID'] = $resultado['id'];
        $_SESSION['UsuarioNome'] = $resultado['nome'];
        $_SESSION['UsuarioNivel'] = $resultado['nivel'];
      
        // Redireciona o visitante
        switch ($_SESSION['UsuarioNivel']) {
        	case '1':
        		header("Location: admin.php");
        		break;
        	case '2':
        		header("Location: professor.php");
        		break;
        	case '3':
        		header("Location: aluno.html");
        		break;
        	default:
        		echo "OPÇÂO INVÁLIDA";
        		break;
        }
        }
    









    ?>


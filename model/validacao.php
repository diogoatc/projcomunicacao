<?php


    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
        header("Location: index.php"); exit;
    }

   include('conexao.php');


    $usuario =($_POST['usuario']);
    $senha = ($_POST['senha']);

   

    $conn = $PDO->prepare("SELECT `id`, `nome`, `nivel` FROM `usuario` WHERE `usuario` = :usuario AND `senha` = :senha AND `flgativo` = :flgativo LIMIT 1");
    $conn->bindParam(":usuario",$usuario, PDO::PARAM_STR);
    $encsenha = sha1($senha);   //PDO Não aceita como parametro sha1($senha)
    $conn->bindParam(":senha", $encsenha, PDO::PARAM_STR);
    $flgativo=1;   //PDO não aceita int direta como parâmetro
    $conn->bindParam(":flgativo", $flgativo, PDO::PARAM_INT);
    $conn->execute();
    $resultado = $conn->fetch(PDO::FETCH_ASSOC);
    $conn= null;
    

    //$query = $mysqli->query($sql);

    //Verifica se retornou algum resultado
    if(!empty($resultado)){

        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();

        // Salva os dados encontrados na sessão
        $_SESSION['UsuarioID'] = $resultado['id'];
        $_SESSION['UsuarioNome'] = $resultado['nome'];
        $_SESSION['UsuarioNivel'] = $resultado['nivel'];

        // Redireciona o visitante
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

        echo "
            <script>
            
            alert('Usuário e/ou senha incorretos');
            window.location='../login.php';
        
            </script>
        
            ";

    }
 










    ?>

<?php

    //A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();
      
    $nivel_necessario = 2;  //2 é o nível professor 
      
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

<head>
    <title>Área do Professor</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>


    <div class="container">
    <div class="header">
        <img src="../assets/img/UNASP.png" alt="logo unasp">
    </div>
        
        <nav id="menu">
            <h1>Menu Principal</h1>
            <ul type="disc">
                <li><a href="pre-cadastra.php">Cadastrar Questões</a></li>
                <li><a href="notasalunos.php">Notas Alunos</a></li>
                <li><a href="listadisciplinas.php">Editar Questões</a></li>                          
            </ul>

            <ul id="logout" type="disc">
                <li><a href="alterarsenha.html">Alterar Senha</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>

        <header id="cabecalho">
            <hgroup>
                <h1>ÁREA DO PROFESSOR</h1>
                <h2>Seja bem-vindo professor(a): <?php echo $_SESSION['UsuarioNome'];?></h2>
            </hgroup>
    </div>
        <footer id="rodape">
             <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.</b></p><br>
        </footer>
    </div>

</body>
</html>

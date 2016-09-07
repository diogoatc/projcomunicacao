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

        <header id="cabecalho">
            <hgroup>
                <h1>ÁREA DO PROFESSOR</h1>
                <!--a href="../classes/class_relatorio_teste.php">
                   <img src="../assets/img/pdf.png" height="60" width="60" alt="" style=" margin-top: 5%;">
                </a-->
                <a href="../classes/class_relatorio_disciplinas.php?idusuario=<?php echo $_SESSION['UsuarioID'] ?>">
                    Relatorios de todas as disciplinas
                </a>
                
            </hgroup>
        </header> 
           
    </div>
        
        <nav id="menu">
            <h1>Menu Principal</h1>
            <ul type="disc">
                <li><a href="pre-cadastra.php">Cadastrar Questões</a></li>
                <li><a href="notasalunos.php">Notas Alunos</a></li>
                <li><a href="listadisciplinas.php">Editar Questões</a></li>                          
                <li><a href="relatorios.php">Relatórios</a></li>                          
            </ul>

            <ul id="logout" type="disc">
                <li><a href="alterarsenha.php">Alterar Senha</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>

        <footer id="rodape">
             <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>
        </footer>
    </div>

</body>
</html>
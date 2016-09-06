<?php
      
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();
      
    $nivel_necessario = 1;  //1 é o nível Admin
      
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
    <title>Área do Administrador</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container">
    <div class="header">
        <img src="../assets/img/UNASP.png" alt="logo unasp">
    </div>

        <nav id="menu">
        <h1>Gerar relatorios</h1>

            <ul type="disc">
                 <li><a href="index.php">MENU</a></li>
                 <li><a href="cadastro-disciplina.php">Cadastrar Disciplina</a></li>
                 <li><a href="cadastro-professor.html">Cadastrar Professor</a></li>
                           
            </ul>

             <ul id="logout" type="disc">
                 <li><a href="../logout.php">Logout</a></li>
            </ul>

        </nav>
    
            <header id="cabecalho">
                <hgroup>
                <h1>ÁREA DO ADMINISTRADOR</h1>

                <a href="../classes/class_relatorio_teste.php">
                    <img src="../assets/img/pdf.png" height="60" width="60" alt="" style=" margin-top: 5%;"></a>

                <a href="../assets/mPDF/examples/example09_forms.php">
                    <img src="../assets/img/pdf.png" height="60" width="60" alt="" style=" margin-top: 5%;"></a>

                <a href="../assets/mPDF/examples/example16_headers_method_2.php">
                    <img src="../assets/img/pdf.png" height="60" width="60" alt="" style=" margin-top: 5%;"></a>
                </hgroup>

    <footer id="rodape">
        <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.</b></p>
    </footer>
</div>

</body>
</html>
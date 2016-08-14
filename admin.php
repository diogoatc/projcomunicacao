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
        header("Location: index.php"); exit;
    }
      
    ?>
      
    <h1>Página restrita</h1>
    <p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>
    <br/>
    <h3><a href="cadastro.php"> Fazer cadastro de novo Professor </a></h3>
     <h3><a href="logout.php"> SAIR </a></h3>



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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../assets/css/normalize.css">
      <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">

      <link rel="stylesheet" href="../assets/bootstrap-3.3.7-dist/js/newjs.js">

      <link rel="stylesheet" href="../assets/css/newstyle.css">
       <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
  </head>

  <body>
  
  <nav class="navbar navbar-inverse" style="border-radius:0px; background:#20205a;"> 

   
    <div class="container-fluid">

      <div class="col-sm-2">
        <a  class="navbar-brand" href="index.php"><img style="margin-top:-13px;width:70%;"  src="../assets/img/UNASP.png" alt="logo unasp"></a>
      </div>
      <div class="col-sm-3">
        <h3 class="areadoprofessor">ÁREA DO PROFESSOR</h3>
      </div>
      <div class="col-sm-7">
      <ul class="nav navbar-nav">
        <li class="active"><a id="ativo"style="color:white;" href="index.php">Home</a></li>
        <li ><a id="font-white" href="pre-cadastra.php">Cadastrar Questões</a></li>
        <li><a id="font-white" href="relatorios.php">Relatorio de Provas</a></li>
        <li><a id="font-white" href="listadisciplinas.php">Editar/Visualizar Questões</a></li>
        <li><a id="font-white" href="alterarsenha.php">Alterar Senha</a></li>
        <li><a id="font-white" href="../logout.php">Logout</a></li>
      </ul>
      </div>
      </div>
  </nav>

    <div class="geral">
  <div class="container">
      <div class="row">
        <h1 class="text-center">Seja bem-vindo professor(a): <?php echo $_SESSION['UsuarioNome'];?></h1>
        
          </div>
        </div> 
  </div>

 <footer class="footer" style="border-radius:0px; background:#20205a;position:fixed;width:100%;height:29px;">
      <div class="container">
        <p class="text-muted" style="color:white;">Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</p>
      </div>
    </footer>

   </body>
  </html>



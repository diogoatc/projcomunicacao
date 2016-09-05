<html lang="pt-br">

<head>
    <title>UNASP Comunicação</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="assets/img/UNASP.png" alt="logo unasp">
        </div>
<nav id="menu">
                <h1>Menu Principal</h1>
                <ul type="disc">
          <li><a href="index.php">MENU</a></li>
                      </ul>
        
        <div class="content">
            <div class="login">Login</div>
            <div class="form">
                <form action="model/validacao.php" method="post">
                  <input type="text" name="usuario" required="Favor Preencher o campo com o seu usuário" placeholder="Usuário" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Usuário'">
                  <input type="password" name="senha" required="Favor Preencher o campo com a sua senha" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'">
                <br/>
                <button class="button">Enviar</button>
                </form>
            </div>
        </div>
        <footer id="rodape">

            <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>

        </footer>
    </div>
</body>

</html>

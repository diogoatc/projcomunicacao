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
        <div class="content">
            <div class="login">Login</div>
            <div class="form">
                <form action="validacao.php" method="post">
                  <input type="text" name="usuario" required="Favor Preencher o campo com o seu usuário" placeholder="Usuário" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Usuário'">
                  <input type="password" name="senha" required="Favor Preencher o campo com a sua senha" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'">
                <br/>
                <button class="button">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<html lang="pt-br">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/newstyle.css">
    <script src="assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper-index">
        <header>
            <a href="index.php"><img src="assets/img/UNASP.png" alt="logo unasp"></a>
        </header>
        <section>
            <a href="aluno/index.php"><img src="assets/img/art.png" onMouseOver="this.src='assets/img/click.png'" onMouseOut="this.src='assets/img/art.png'" onClick="location='#'"></a>
        </section>

        <div class="login-area">
            <div class="container">
                <div class="box-texto">
                    <h1>Bem Vindo</h1>
                    <br>Se você for aluno, basta clicar na imagem para fazer a prova. Se for professor ou administrador, apenas faça o Login.
                </div>
                <div class="form">
                    <form action="model/validacao.php" method="post">
                        <div class="form-group">
                            <label for="text">Usuário:</label>
                            <input type="text" name="usuario" class="form-control" id="email" required="Favor Preencher o campo com o seu usuário">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Senha:</label>
                            <input type="password" name="senha" class="form-control" id="pwd" required="Favor Preencher o campo com a sua senha">
                        </div>
                        <button type="submit" class="btn">Acessar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>Unasp - Centro Universitário Adventista de São Paulo - © 2016 - Todos os direitos reservados.</footer>
</body>
</html>

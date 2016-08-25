<!DOCTYPE html>

<head>
    <title>Alterar Senha</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>



<div class="container">
    <div class="header">
        <img src="../assets/img/UNASP.png" alt="logo unasp">


        <nav id="menu">
            <h1>Menu Principal</h1>
            <ul type="disc">
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastraquestoes.php">Cadastrar Questões</a></li>
                <li><a href="notasalunos.php">Notas Alunos</a></li>
            </ul>
        </nav>

        <div class="content">
            <div class="login">Alterar Senha</div>
            <div class="form">
                <form action="#" method="post">
                    <input type="password" name="senhaatual" required="Digite a senha atual" placeholder="Digite a Senha Atual" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite a senha atual'">
                    <input type="password" name="novasenha" required="Digite nova senha" placeholder="Digite a Nova Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite nova senha'">
                    <input type="password" name="confsenha" required="Confirme a senha" placeholder="Confirme a Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirme a senha'">
                    <br/>
                    <button class="button">OK</button>
                </form>
            </div>

            </div>

            <footer id="rodape">

                <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva<br>

            </footer>
    </div>
</div>

</body>
</html>

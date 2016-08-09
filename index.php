<!DOCTYPE html>
<html>
<head>
	<title>Login Proj Comunicacao</title>
</head>
<body>
<form action="validacao.php" method="post">
    <fieldset>
    <legend>Dados de Login</legend>
        <label for="txUsuario">Usuário</label>
        <input type="text" name="usuario" id="txUsuario" maxlength="25" />
        <label for="txSenha">Senha</label>
        <input type="password" name="senha" id="txSenha" />
      
        <input type="submit" value="Entrar" />
    </fieldset>
    </form>

</body>
</html>
<?php 

	include_once('../model/conexao.php');
	include_once('../classes/class_usuario.php');
    include('verifica_sessao_professor.php');
  
?>

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
    </div>    

        <nav id="menu">
            <h1>Menu Principal</h1>
            <ul type="disc">
                <li><a href="index.php">Home</a></li>
                <li><a href="pre-cadastra.php">Cadastrar Questões</a></li>
                <li><a href="notasalunos.php">Notas Alunos</a></li>
            </ul>
        </nav>

        <div style="height:370px;" class="content">
        <div class="login">Alterar Senha</div>
        <div class="form">
                <form action="alterarsenha.php" method="post">

                    <input type="password" name="senhaatual" required="Digite a senha atual" placeholder="Digite a Senha Atual" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite a senha atual'">
                    <input type="password" name="novasenha" required="Digite nova senha" placeholder="Digite a Nova Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite nova senha'">
                    <input type="password" name="confsenha" required="Confirme a senha" placeholder="Confirme a Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirme a senha'">
                    <br/>

                        <button name="envia" class="button">CONFIRMAR</button>
                </form>
            </div>

            </div>

            <footer id="rodape">

                <p><b>Copyright &copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>

            </footer>
    </div>

</body>
</html>  
<?php

	if(isset($_POST['envia'])){


		$idusuario         = $_SESSION['UsuarioID'];
    	$senha_atual       = sha1(($_POST['senhaatual']));
   		$senha_nova        = sha1(($_POST['novasenha']));
    	$confirme_senha    = sha1(($_POST['confsenha']));

    	$conn = $PDO->query("SELECT senha FROM usuario WHERE id = $idusuario");
			$senha_banco = $conn->fetchColumn();

			

		if($senha_atual != $senha_banco){

			echo "
            <script>
            
            alert('Senha atual INCORRETA');
            window.location='alterarsenha.php';
        
            </script>
        
            ";

		}elseif($senha_nova != $confirme_senha){

			echo "
            <script>
            
            alert('As senhas não conferem');
            window.location='alterarsenha.php';
        
            </script>
        
            ";

		}elseif($senha_atual == $senha_banco){

			$x=new usuario();
			$x->alterarsenha($PDO, $idusuario, $senha_nova);

		}
	
	}
	

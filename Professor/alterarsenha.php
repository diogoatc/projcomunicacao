<?php 

	include_once('../model/conexao.php');
	include_once('../classes/class_usuario.php');

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

	if(isset($_POST['envia'])){


		$idusuario         = $_SESSION['UsuarioID'];
    	$senha_atual       = sha1(($_POST['senhaatual']));
   		$senha_nova        = sha1(($_POST['novasenha']));
    	$confirme_senha    = sha1(($_POST['confsenha']));

    	$conn = $PDO->query("SELECT senha FROM usuario WHERE id = $idusuario");
			$senha_banco = $conn->fetch();

			

		if($senha_atual != $senha_banco[0]){

			echo "
            <script>
            
            alert('Senha atual INCORRETA');
            window.location='alterarsenha.html';
        
            </script>
        
            ";

		}elseif($senha_nova != $confirme_senha){

			echo "
            <script>
            
            alert('As senhas não conferem');
            window.location='alterarsenha.html';
        
            </script>
        
            ";

		}elseif($senha_atual == $senha_banco[0]){

			$x=new usuario();
			$alterasenha = $x->alterarsenha($PDO, $idusuario, $senha_nova);

		}
	
	}
	

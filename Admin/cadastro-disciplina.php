<?php  
  include('../classes/class_disciplina.php');
  include('../model/conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

		<div class="container">
			<div class="header">
      	<img src="../assets/img/UNASP.png" height="66" width="199" alt="logo unasp">
   		</div>

            <nav id="menu">
                <h1>Menu Principal</h1>
                <ul type="disc">
                    <li><a href="index.php">MENU</a></li>


                </ul>

 			<div class="content" style="top: 44%; height: 445px;">

    		<div class="login">Cadastro de Disciplina</div>
    		<div class="form" style="top: 12%;">
  				<form action="" id="cadastro" method="post">
            <label for="nome">Nome da Disciplina: </label>
      			<input type="text" name="nome" placeholder="Exemplo: Atendimento Publicitário"><br/>
            <label for="curso">Curso: </label>
            <select class="form-group" type="text" name="curso">
              <option value="PP">PP</option>
              <option value="RTV">RTV</option>
            </select> <br/>
            <label for="turno">Turno: </label>
            <select class="form-group" type="text" name="turno">
              <option value="Matutino">Manhã</option>
              <option value="Noturno">Noite</option>
            </select> <br/>
            <label for="credito">Quantidade de créditos da Disciplina: </label>
            <select class="form-group" type="text" name="credito">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select> <br/>
					  <input type="submit" name="envia" value="Cadastrar" />
  				</form>
  		  </div>
    	</div>
                <footer id="rodape">

                    <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br>

                </footer>
		</div>
</body>
</html>
<?php  
  
  if(isset($_POST['envia'])){
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $turno = $_POST['turno'];
    $credito = $_POST['credito'];
    $flgativo = 1;

    $x = new disciplina();
    $cadDisciplina = $x->cadastra_itemdisciplina($PDO, $nome, $curso, $turno, $credito, $flgativo);

    
  }

?>
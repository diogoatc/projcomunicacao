<?php
include('verifica_sessao_admin.php');
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

            <ul id="logout" type="disc">
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </nav>

 			<div class="content" style="top: 44%; height: 500px;">

    	<div class="login" style="font-family:sans-serif; font-size:20pt;">Cadastro de Disciplina</div>

    	<div class="form" style="top: 20%; width: 80%;left:60%;">

  				  <form action="" id="cadastro" method="post">

                 <label style="font-size:20px;font-family: sans-serif;" for="nome">Nome da Disciplina: </label>
      			     <input type="text" name="nome" required="Nome da Disciplina Obrigatório" placeholder="Exemplo: Atendimento Publicitário"><br/></br>

                 <label style="font-size:20px;font-family: sans-serif;height: 10%;" for="curso">Curso: </label>

                <select class="imobSelect" type="text" name="curso">
                 <option value="PP">PP</option>
                 <option value="RTV">RTV</option>
                </select> <br/>

                  <label style="font-size:20px;font-family: sans-serif;" for="turno">Turno: </label>
                <select class="imobSelect" type="text" name="turno">
                  <option value="Matutino">Manhã</option>
                  <option value="Noturno">Noite</option>
                </select> <br/>

                  <label style="font-size:20px;font-family: sans-serif;" for="credito">Quantidade de créditos da Disciplina: </label>
                <select class="imobSelect" type="text" name="credito">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select> <br/>

                <select class="imobSelect" style="width:70%;font-size:20px;" required="" id="semestre" name="semestre" class="form-control">
                <label for="semestre">Semestre: </label> 
              <option value="">Selecione uma das opções</option>
              <option value="1">1º Semestre</option>
              <option value="2">2º Semestre</option>
              <option value="3">3º Semestre</option>
              <option value="4">4º Semestre</option>
              <option value="5">5º Semestre</option>
              <option value="6">6º Semestre</option>
              <option value="7">7º Semestre</option>
              <option value="8">8º Semestre</option>
          </select>
					      <input style="font-size:18px;" type="submit" name="envia" value="Cadastrar" />

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
    $semestre = $_POST['semestre'];
    $flgativo = 1;

    $x = new disciplina();
    $cadDisciplina = $x->cadastra_itemdisciplina($PDO, $nome, $curso, $turno, $credito, $semestre, $flgativo);
  }
?>

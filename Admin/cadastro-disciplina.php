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
 			<div class="content" style="top: 44%; height: 445px;">
    		<div class="login">Cadastro de Disciplina</div>
    		<div class="form" style="top: 12%;">
  				<form action="" id="cadastro" method="post">
      			<input type="text" name="nome" placeholder="Exemplo: Programação Web I">
            <input type="text" name="curso" placeholder="Exemplo: Sistemas Para Internet"><br/>
            <select class="form-group" type="text" name="turno">
              <option value="Matutino">Manhã</option>
              <option value="Noturno">Noite</option>
            </select> <br/>
            <select class="form-group" type="text" name="credito">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="4">4</option>
            </select> <br/>
					  <input type="submit" name="envia" value="Cadastrar" />
  				</form>
  		  </div>
    	</div>
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
    $cadDisciplina = $x->Reg_disciplina($PDO, $nome, $curso, $turno, $credito, $flgativo);

    
  }

?>
<?php


setcookie('curso');
setcookie('turno');




?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Questões</title>
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

        <div class="content" style="top: 44%; height: 200px;width: 800px; left:40%">
        <div class="login" style="font-family:sans-serif; font-size:16pt;">SELECIONE O CURSO, O TURNO E O SEMESTRE QUE DESEJA INSERIR AS QUESTÕES</div>
        <div class="form" style="top: 36%; width: 50%;left:55%;">


					<label for="Form"></label>	
				<form method="post" action="pre-cadastra.php" >
				
				<select class="imobSelect" style="font-size: 28px;" name="curso" id="curso">
					<option value="PP">PP</option>
					<option value="RTV">RTV</option>
				</select>

				<select class="imobSelect" style="width:35%;font-size: 28px;" name="turno" id="turno">
					<option value="Matutino">Matutino</option>
					<option value="Noturno">Noturno</option>
				</select> 

							<input style="width:41%; font-size:22px;left:30%;" type="submit" name="envia">

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

if (isset($_POST['envia'])){

$curso = $_POST['curso'];
$turno = $_POST['turno'];
$semestre = $_POST['semestre'];


setcookie('curso', $curso);
setcookie('turno', $turno);
setcookie('semestre', $semestre);

header("Location: cadastraquestoes.php"); exit;
}
?>
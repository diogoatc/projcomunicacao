<?php

/*// A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();
      
    $nivel_necessario = 2;  // 2 é o nível Professor
      
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] !=$nivel_necessario)) {
         echo "<script> alert('Você precisa estar logado para acessar essa página');</script>";
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: index.php"); exit;
     */

include('../model/conexao.php');
include('../classes/class_disciplina.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de questões</title>
	<meta charset="utf-8">
</head>
<body>
		<form id="questcad" action="cadastraquestoes.php" method="post">
			<label for="habilita">Habilitação em:
			<input id="habilita" type="radio" name="habilita" value="rtv"> RTV
			<input id="habilita" type="radio" name="habilita" value="pp"> PP
			</label>
			<label for="turno">Turno:
			<input id="turno" type="radio" name="turno" value="diurno"> Diurno
			<input id="turno" type="radio" name="turno" value="noturno"> Noturno
			</label>
			<label for="disciplina">Disciplina: </label>
			<select name="disciplina" id="disciplina" >
			<?php
			
			$x = new disciplina();
			$retorno = $x->selectAtivo($PDO);
			foreach ($retorno as $key) {
    			
			?>
			<option value="<?php echo $key['id'];?>" ><?php echo $key['nome'];?></option>
			<?php
		}
		?>
			</select>
			<label for="enunciado">Enunciado da Questão:</label>
			<textarea name="enunciado" id="enunciado" rows="10" cols="40">Enunciado da Questão</textarea>
			<label for="resp1">Alternativa 1</label>
			<input type="text" name="resp1">
			<label for="resp2">Alternativa 2</label>
			<input type="text" name="resp2">
			<label for="resp3">Alternativa 3</label>
			<input type="text" name="resp3">
			<label for="resp4">Alternativa 4</label>
			<input type="text" name="resp4">
			<label for="respcorreta"><h3>Alternativa Correta</h3></label>
			<input type="text" name="respcorreta">
			<input type="submit" name="envia">
		</form>
</body>
</html>



<?php


//TODO: Filtrar e validar os inputs, receber o form e chamar a função questao->registrarQuestoes()












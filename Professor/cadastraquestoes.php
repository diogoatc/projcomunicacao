<?php
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












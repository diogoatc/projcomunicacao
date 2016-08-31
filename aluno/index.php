<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aluno</title>
  </head>
  <body>
    <div class="container">
      <div class="content">
        <form class="" action="aluno.php" method="post">
          <input type="text" name="nome" value="" placeholder="Nome"><br>
          <input type="number" name="ra" value="" placeholder="RA"><br>
          <select required="" name="semestre" id="semestre">
    				<option value="1">1º Semestre</option>
    				<option value="2">2º Semestre</option>
    				<option value="3">3º Semestre</option>
    				<option value="4">4º Semestre</option>
    				<option value="5">5º Semestre</option>
    				<option value="6">6º Semestre</option>
    				<option value="7">7º Semestre</option>
    				<option value="8">8º Semestre</option>
    			</select><br>
          <select name="curso" id="curso">
        		<option value="PP">PP</option>
        		<option value="RTV">RTV</option>
      		</select><br>
          <select name="turno" id="turno">
        		<option value="Matutino">Matutino</option>
        		<option value="Noturno">Noturno</option>
      		</select>
          <input type="submit" name="fazerprova" value="Fazer prova">
        </form>
      </div>
    </div>
  </body>
</html>

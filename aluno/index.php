<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Aluno</title>
  </head>
  <body>

<div class="container">
      <div class="header">
        <img src="../assets/img/UNASP.png" height="66" width="199" alt="logo unasp">
      </div>
            <nav id="menu">
                <h1>Menu Principal</h1>
                <ul type="disc">
          <li><a href="../index.php">MENU</a></li>

            </nav>


                   <div class="content" style="top: 44%; height: 380px;
            width: 380px; left:53%">

                        <div class="login" style="font-family:sans-serif; font-size:16pt;">Prova Unificada</div>
                                <div class="form" style="top: 10%; width:70%;left:50%;">

        <form class="" action="aluno.php" method="post">
          <input type="text" name="nome" value="" placeholder="Nome"><br>
          <input type="number" name="ra" value="" placeholder="RA"><br></br>

          <select class="imobSelect" style="font-size: 28px;width:65%;" required="" name="semestre" id="semestre">
    				<option value="1">1º Semestre</option>
    				<option value="2">2º Semestre</option>
    				<option value="3">3º Semestre</option>
    				<option value="4">4º Semestre</option>
    				<option value="5">5º Semestre</option>
    				<option value="6">6º Semestre</option>
    				<option value="7">7º Semestre</option>
    				<option value="8">8º Semestre</option>
    			</select></br>

          <select class="imobSelect" style="font-size: 28px;width:65%" name="curso" id="curso">
        		<option value="PP">PP</option>
        		<option value="RTV">RTV</option>
      		</select><br>

          <select class="imobSelect" style="font-size: 28px;width:65%" name="turno" id="turno">
        		<option value="Matutino">Matutino</option>
        		<option value="Noturno">Noturno</option>
      		</select>


          <input style="width:60%; font-size:22px;left:35px;padding:15px;"type="submit" name="fazerprova" value="Fazer prova">
        </form>
      </div>
               
    </div>
                <footer id="rodape">

                    <p><b>Copyright&copy; 2016 - by Ana Carla Moraes, Diogo Lopes, Gabriel Tagliari, Matheus Hofart, Wesley R. Silva.<br></b></p></footer>
</div>

  </body>
</html>

<?php  
	require_once ('../assets/mPDF/mpdf.php');
	//@$link= mysql_connect("localhost", "root", "") or die(mysql_error());
	//$db_selected = mysql_select_db("sysgat", $link);

  $host = "169.44.117.18:3306";
    $user ="root";
    $pswrd = "unasp";
    $dbname = "projcomunicacao";

    try{
      $PDO = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname,
      $user, $pswrd,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch ( PDOException $e ) {
      echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }

	$page = '
	  <header class="clearfix">
      <div id="logo">
        <img src="../assets/reports/img/logo.png">
      </div>
      <h1>RELATORIOS</h1>
       <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="desc" colspan="4">Nome</th>
            <th class="desc" colspan="4">Usuario</th>
            <th class="desc" colspan="4">Email</th>
          </tr>
        </thead>
        <tbody>';

        $consulta = $PDO->query("SELECT nome, usuario, email FROM usuario;");
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  		   $page.='<tr>
                  <td class="desc" colspan="4">'.$linha['nome'].'</td>
                  <td class="desc" colspan="4">'.$linha['usuario'].'</td>
                  <td class="desc" colspan="4">'.$linha['email'].'</td>
                </tr>'; 
        }
        $page.=' 
        </tbody>
      </table>

      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
        Sistema de Gerenciamento Administrativo de Trufas @ SysGAT 2016
    </footer>';

	$file = "teste.pdf";
	$mpdf = new mPDF();
	$css = file_get_contents('../assets/reports/css/style.css');
	$mpdf->WriteHTML($css, 1);
	$mpdf->WriteHTML($page);
	$mpdf->Output($file, 'I');

	// I - Abre no navegador
	// F - Salva o arquivo no servidos
	// D - Salva o arquivo direto no computador do usuario 

?>
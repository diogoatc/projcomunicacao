<?php  
require_once('../model/conexao.php'); 

	class disciplina {
		private $iditemdisciplina;
		private $nome;
		private $curso;
		private $turno;
		private $credito;
		private $flgativo;

		function _construct() {
			$this->iditemdisciplina= "";
			$this->nome = "";
			$this->curso = "";
			$this->turno = "";
			$this->credito = "";
			$this->flgativo = "";
		}

		//metodos Gets
		public function getIditemdisciplina($iditemdisciplina){
			return $this->iditemdisciplina = $iditemdisciplina;
		}
		public function getNome($nome){
			return $this->nome = $nome;
		}
		public function getCurso($curso){
			return $this->curso = $curso;
		}
		public function getTurno($turno){
			return $this->turno = $turno;
		}
		public function getCredito($credito){
			return $this->credito = $credito;
		}
		public function getFlgativo($flgativo){
			return $this->flgativo = $flgativo;
		}

		//metodos Sets
		public function setIditemdisciplina($iditemdisciplina){
			return $this->iditemdisciplina = $iditemdisciplina;
		}
		public function setNome($nome){
			return $this->nome = $nome;
		}
		public function setCurso($curso){
			return $this->curso = $curso;
		}
		public function setTurno($turno){
			return $this->turno = $turno;
		}
		public function setCredito($credito){
			return $this->credito = $credito;
		}
		public function setFlgativo($flgativo){
			return $this->flgativo = $flgativo;
		}

		function registrarDisciplina($idusuario, $nome, $flgativo){
			@mysql_query("INSERT INTO disciplina (id, idusuario, nome, flgativo)
				VALUES ( NULL ,'$idusuario','$nome','$flgativo')");
		}
		//Funcão para funcionar o select ativo
		public function selectAtivo($pdo,$curso,$turno){
			
			$conn = $pdo->prepare("SELECT * FROM itemdisciplina WHERE curso=:curso AND turno=:turno");

				$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
				$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
				$conn->execute();
				return $conn->fetchAll(PDO::FETCH_ASSOC);
		}

		function Reg_disciplina($con, $nome, $curso, $turno, $credito, $flgativo){
			$disc = $con->prepare("INSERT INTO itemdisciplina (nome, curso, turno, credito, flgativo) VALUES(:nome, :curso, :turno, :credito, :flgativo)");

				
				$disc->bindParam(":nome",$nome,PDO::PARAM_STR);
				$disc->bindParam(":curso",$curso,PDO::PARAM_STR);
				$disc->bindParam(":turno",$turno,PDO::PARAM_STR);
				$disc->bindParam(":credito",$credito,PDO::PARAM_INT);
				$disc->bindParam(":flgativo",$flgativo,PDO::PARAM_INT);

				if($disc->execute()){
					echo "
            		<script>
            
            		alert('DISCIPLINA CADASTRADA COM SUCESSO!');
            		window.location='../Admin/cadastro-disciplina.php';
        
           			 </script>
        
            	";
				}else{
					echo "<script> alert('ERRO');</script>";
				}

			$disc=null;
		}
	}
?>
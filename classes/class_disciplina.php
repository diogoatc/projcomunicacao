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

		
		//Funcão para funcionar o select ativo
		public function selectAtivo($pdo,$curso,$turno){

			$conn = $pdo->prepare("SELECT * FROM itemdisciplina WHERE curso=:curso AND turno=:turno");

				$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
				$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
				$conn->execute();
				return $conn->fetchAll(PDO::FETCH_ASSOC);
		}

		function selectDisciplinaByAluno($pdo, $curso, $turno, $semestre){
			$conn = $pdo->prepare("SELECT D.nome as 'nomedisciplina', D.curso, D.turno,
															D.semestre, P.nome as 'nomeprofessor'
															FROM disciplina D	INNER JOIN usuario P
															ON D.idusuario = P.id
															WHERE D.flgativo = 1
															AND D.curso = :curso
															AND D.turno = :turno
															AND D.semestre = :semestre");

			$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
			$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
			$conn->bindParam(":semestre",$semestre,PDO::PARAM_INT);
			$conn->execute();
			return $conn->fetchAll(PDO::FETCH_ASSOC);
		}

		function cadastra_itemdisciplina($con, $nome, $curso, $turno, $credito, $flgativo){
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
					echo "<script> alert('ERRO CADASTRO DISCIPLINA');</script>";
				}

			$disc=null;
		}

		function verifica_disciplina_cadastrada($con,$nome, $curso, $turno, $idusuario){

			$q= $con->prepare("SELECT id FROM disciplina WHERE nome=:nome AND curso=:curso AND turno=:turno AND idusuario=:idusuario AND flgativo=1" );

			$q->bindParam(":nome",$nome,PDO::PARAM_STR);
			$q->bindParam(":curso",$curso,PDO::PARAM_STR);
			$q->bindParam(":turno",$turno,PDO::PARAM_STR);
			$q->bindParam(":idusuario",$idusuario,PDO::PARAM_INT);


			if($q->execute()){

			 return $q->fetchColumn();

		}else{

			echo "<script> alert('ERRO VERIFICA DISCIPLINA');</script>";
		}
	}

		function cadastra_disciplina($con,$nomedisciplina,$idusuario,$curso,$turno,$semestre){

			$disc = $con->prepare("INSERT INTO disciplina (idusuario, nome, curso, turno, semestre) 
				VALUES(:idusuario,:nome, :curso, :turno, :semestre)");
			$disc->bindParam(":idusuario",$idusuario,PDO::PARAM_INT);
			$disc->bindParam(":nome",$nomedisciplina,PDO::PARAM_STR);
			$disc->bindParam(":curso",$curso,PDO::PARAM_STR);
			$disc->bindParam(":turno",$turno,PDO::PARAM_STR);
			$disc->bindParam(":semestre",$semestre,PDO::PARAM_STR);

			if($disc->execute()){

				echo "
            		<script>

            		alert('DISCIPLINA CADASTRADA COM SUCESSO!');           		
        
            		

           			 </script>

            	";
			}else{

				echo "<script> alert('ERRO CADASTRA DISCIPLINA');</script>";
			}

		}
	}
?>

<?php  
include '../model/conexao.php';

	class prova {
		private $id;
		private $ra;
		private $curso;
		private $semestre;
		private $nota;

		function _construct() {
			$this->id = "";
			$this->ra = "";
			$this->curso = "";
			$this->semestre = "";
			$this->nota = "";
		}

		//metodos Gets
		public function getId($id){
			return $this->id = $id;
		}
		public function getRa($ra){
			return $this->ra = $ra;
		}
		public function getCurso($curso){
			return $this->curso = $curso;
		}
		public function getSemestre($semestre){
			return $this->semestre = $semestre;
		}
		public function getNota($nota){
			return $this->nota = $nota;
		}

		//metodos Sets
		public function setId($id){
			return $this->id = $id;
		}
		public function setRa($ra){
			return $this->ra = $ra;
		}
		public function setCurso($curso){
			return $this->curso = $curso;
		}
		public function setSemestre($semestre){
			return $this->semestre = $semestre;
		}
		public function setNota($nota){
			return $this->nota = $nota;
		}


		function salvarProva($pdo,$ra,$nomealuno,$nota,$dtainicio){

			$conn = $pdo->prepare("INSERT INTO prova (ra,nomealuno,nota,dtainicio,dtafim)
								 VALUES (:ra, :nomealuno, :nota, :dtainicio, now()) ");

			$conn->bindParam(":ra", $ra, PDO::PARAM_INT);
			$conn->bindParam(":nomealuno", $nomealuno, PDO::PARAM_STR);
			$conn->bindParam(":nota", $nota, PDO::PARAM_STR);
			$conn->bindParam(":dtainicio", $dtainicio, PDO::PARAM_STR);
			
			if($conn->execute()){
				echo "
            		<script>
            
            		alert('PROVA SALVA');
            		
        
           			 </script>
        
            	";
			}else{

				echo "ERRO SALVAR PROVA";
			}
		}

		function retornaIdProva($pdo,$ra,$nome){
			$conn = $pdo->prepare("SELECT id FROM prova WHERE ra=:ra and nomealuno=:nomealuno");
			$conn->bindParam(":ra", $ra, PDO::PARAM_INT);
			$conn->bindParam(":nomealuno", $nomealuno, PDO::PARAM_STR);

			if($conn->execute()){

			 return $conn->fetchColumn();

			}else{

			echo "<script> alert('ERRO RETORNA ID');</script>";
			}
		}

		function relacionaProvaDisciplina($pdo,$idprova,$iddisciplina){

			$conn = $pdo->prepare("INSERT INTO prova_disciplina (idprova, iddisciplina)
								 VALUES (:idprova, :iddisciplina)");
			$conn->bindParam(":idprova", $idprova, PDO::PARAM_INT);
			$conn->bindParam(":iddisciplina", $iddisciplina, PDO::PARAM_INT);

			if($conn->execute()){
				echo "
            		<script>
            
            		alert('PROVA_DISCIPLINA SALVA');
            		
        
           			 </script>
        
            	";
			}else{

				echo "ERRO SALVAR PROVA_DISCIPLINA";
			}

		}
	}
?>
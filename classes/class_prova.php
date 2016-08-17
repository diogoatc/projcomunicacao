<?php  
include '../conexao.php';

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

		function registrarProva($ra, $curso, $semestre, $nota){
			@mysql_query("INSERT INTO prova (id, ra, curso, semestre, nota)
				VALUES ( NULL ,'$ra','$curso','$semestre','$nota')");
		}
	}
?>
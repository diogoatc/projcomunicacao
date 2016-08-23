<?php  
require_once('../model/conexao.php'); 

	class disciplina {
		private $id;
		private $idusuario;
		private $nome;
		private $flgativo;

		function _construct() {
			$this->id = "";
			$this->idusuario = "";
			$this->nome = "";
			$this->flgativo = "";
		}

		//metodos Gets
		public function getId($id){
			return $this->id = $id;
		}
		public function getIdusuario($idusuario){
			return $this->idusuario = $idusuario;
		}
		public function getNome($nome){
			return $this->nome = $nome;
		}
		public function getFlgativo($flgativo){
			return $this->flgativo = $flgativo;
		}

		//metodos Sets
		public function setId($id){
			return $this->id = $id;
		}
		public function setIdusuario($idusuario){
			return $this->idusuario = $idusuario;
		}
		public function setNome($nome){
			return $this->nome = $nome;
		}
		public function setFlgativo($flgativo){
			return $this->flgativo = $flgativo;
		}

		function registrarDisciplina($idusuario, $nome, $flgativo){
			@mysql_query("INSERT INTO disciplina (id, idusuario, nome, flgativo)
				VALUES ( NULL ,'$idusuario','$nome','$flgativo')");
		}
		//Funcão para funcionar o select ativo
		public function selectAtivo($pdo){
			
			$conn = $pdo->query("SELECT * FROM disciplina");
				return $conn->fetchAll(PDO::FETCH_ASSOC);


				
		}
	}
?>
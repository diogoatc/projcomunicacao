<?php  
include '../conexao.php';

	class usuario {
		private $id;
		private $nome;
		private $usuario;
		private $senha;
		private $email;
		private $nivel;
		private $flgativo;

		function _construct() {
			$this->id = "";
			$this->nome = "";
			$this->usuario = "";
			$this->senha  = "";
			$this->email = "";
			$this->nivel = "";
			$this->flgativo = "";
		}

		//metodos Gets
		public function getId($id){
			return $this->id = $id;
		}
		public function getNome($nome){
			return $this->nome = $nome;
		}
		public function getUsuario($usuario){
			return $this->usuario = $usuario;
		}
		public function getSenha($senha){
			return $this->senha = $senha;
		}
		public function getEmail($email){
			return $this->email = $email;
		}
		public function getNivel($nivel){
			return $this->nivel = $nivel;
		}
		public function getFlgativo($flgativo){
			return $this->flgativo = $flgativo;
		}

		//metodos Sets
		public function setId($id){
			return $this->id = $id;
		}
		public function setNome($nome){
			return $this->nome = $nome;
		}
		public function setUsuario($usuario){
			return $this->usuario = $usuario;
		}
		public function setSenha($senha){
			return $this->senha = $senha;
		}
		public function setEmail($email){
			return $this->email = $email;
		}
		public function setNivel($nivel){
			return $this->nivel = $nivel;
		}
		public function setFlgativo($flgativo){
			return $this->flgativo = $flgativo;
		}

		function registrarAluno($nome, $usuario, $senha, $email, $nivel, $flgativo){
			@mysql_query("INSERT INTO usuario (id, nome, usuario, senha, email, nivel, flgativo)
				VALUES ( NULL ,'$nome','$usuario','$senha','$email','1','$flgativo')");
		}

		function registrarProfessor($nome, $usuario, $senha, $email, $nivel, $flgativo){
			@mysql_query("INSERT INTO usuario (id, nome, usuario, senha, email, nivel, flgativo)
				VALUES ( NULL ,'$nome','$usuario','$senha','$email','2','$flgativo')");
		}
	}
?>
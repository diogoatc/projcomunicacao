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

	function salvarProva($pdo,$ra,$nomealuno,$nota,$dtainicio,$disciplinas,$questoes,$respostaAluno){
		$conn = $pdo->prepare("INSERT INTO prova (ra,nomealuno,nota,dtainicio,dtafim)
		VALUES (:ra, :nomealuno, :nota, :dtainicio, now()) ");

		$conn->bindParam(":ra", $ra, PDO::PARAM_INT);
		$conn->bindParam(":nomealuno", $nomealuno, PDO::PARAM_STR);
		$conn->bindParam(":nota", $nota, PDO::PARAM_STR);
		$conn->bindParam(":dtainicio", $dtainicio, PDO::PARAM_STR);

		if($conn->execute()){
			echo "<script>alert('PROVA SALVA');</script>";
		}else{
			echo "ERRO SALVAR PROVA";
		}

		$lastId = $pdo->lastInsertId();

		//Insere na tabela de relacionamento prova_disciplina
		$conn = $pdo->prepare("INSERT INTO prova_disciplina (idprova, iddisciplina)
		VALUES (:lastId, :iddisciplina)");

		foreach ($disciplinas as $key) {
			$conn->bindParam(":lastId",$lastId, PDO::PARAM_INT);
			$conn->bindParam(":iddisciplina", $key, PDO::PARAM_INT);

			if($conn->execute()){
				echo "<script>alert('PROVA_DISCIPLINA SALVA');</script>";
			}else{
				echo "ERRO SALVAR PROVA_DISCIPLINA: ".$key;
			}
		}

		//Insere na tabela de relacionamento questoes_aluno
		$conn = $pdo->prepare("INSERT INTO questoes_aluno (idprova, idquestao, respostaaluno)
		VALUES (:lastId, :idquestao, :respostaaluno)");

		for ($i=0; $i < count($questoes); $i++) {
			$conn->bindParam(":lastId", $lastId, PDO::PARAM_INT);
			$conn->bindParam(":idquestao", $questoes[$i]['id'], PDO::PARAM_INT);
			$conn->bindParam(":respostaaluno", $respostaAluno[$i], PDO::PARAM_STR);

			if($conn->execute()){
				echo "<script>alert('QUESTOES_ALUNO SALVA');</script>";
			}else{
				echo "ERRO SALVAR QUESTOES_ALUNO";
			}
		}
	}
}
?>

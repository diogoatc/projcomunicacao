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

	function insereDataDisciplina($pdo,$curso,$turno,$semestre,$data){

		$conn = $pdo->prepare("UPDATE disciplina SET dataprova=:data
		 WHERE
			curso=:curso AND
			turno=:turno AND
			semestre=:semestre");
		$conn->bindParam(":data",$data,PDO::PARAM_STR);
		$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
		$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
		$conn->bindParam(":semestre",$semestre,PDO::PARAM_STR);

		if($conn->execute()){
			echo "<script>
				alert('Data Inserida Com Sucesso!');
				window.location='index.php';
				</script>";
			}else{
				echo "<script> alert('ERRO INSERE DATA');</script>";
			}
			$conn=null;

		
	}

	function editaDisciplinaByID($pdo,$iddisciplina,$semestre,$curso,$turno){
		$conn = $pdo->prepare("UPDATE disciplina
			SET curso = :curso,
			turno = :turno,
			semestre = :semestre
			WHERE id=:id");

			$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
			$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
			$conn->bindParam(":semestre",$semestre,PDO::PARAM_STR);
			$conn->bindParam(":id",$iddisciplina,PDO::PARAM_INT);

			if($conn->execute()){
				echo "<script>
				alert('DISCIPLINA ALTERADA COM SUCESSO!');
				window.location='index.php';
				</script>";
			}else{
				echo "<script> alert('ERRO CADASTRO DISCIPLINA');</script>";
			}
			$conn=null;
		}
		
		function selectAtivo($pdo,$curso,$turno,$semestre){
			$conn = $pdo->prepare("SELECT * FROM itemdisciplina
				WHERE curso=:curso AND turno=:turno AND semestre=:semestre");

				$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
				$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
				$conn->bindParam(":semestre",$semestre,PDO::PARAM_INT);
				$conn->execute();
				return $conn->fetchAll(PDO::FETCH_ASSOC);
				$conn=null;
		}

		function selectDisciplinaByProfessor($pdo, $id){
			$conn = $pdo->prepare("SELECT * FROM disciplina
				WHERE idusuario=:id AND flgativo=1");
				$conn->bindParam(":id",$id,PDO::PARAM_INT);

				$conn->execute();
				return $conn->fetchAll(PDO::FETCH_ASSOC);
		}

		function selectDisciplinaByAluno($pdo, $curso, $turno, $semestre,$datainicio){
			$conn = $pdo->prepare("SELECT D.id, D.nome as 'nomedisciplina', D.curso, D.turno,
				D.semestre, P.nome as 'nomeprofessor'
				FROM disciplina D	INNER JOIN usuario P
				ON D.idusuario = P.id
				WHERE D.flgativo = 1
				AND D.dataprova BETWEEN :datainicio AND :datafim
				AND D.curso = :curso
				AND D.turno = :turno
				AND D.semestre = :semestre");
			
				$datafimformatada = date_create($datainicio); //PEGA A STRING E TRANSFORMA PRO TIPO DATE
				date_add($datafimformatada, date_interval_create_from_date_string('2 hours')); //ADICIONA 2 HORAS A DATA INFORMADA
				$datafim = date_format($datafimformatada, 'Y-m-d H:i:s'); //FORMATA DE VOLTA PARA O PADRÃO DATETIME
				$conn->bindParam(":datainicio",$datainicio,PDO::PARAM_STR);
				$conn->bindParam(":datafim",$datafim,PDO::PARAM_STR);
				$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
				$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
				$conn->bindParam(":semestre",$semestre,PDO::PARAM_INT);
				$conn->execute();
				return $conn->fetchAll(PDO::FETCH_ASSOC);
				$conn=null;
		}

		function cadastra_itemdisciplina($con, $nome, $curso, $turno, $credito, $semestre, $flgativo){
			$conn = $con->prepare("INSERT INTO itemdisciplina (nome, curso, turno, credito, semestre, flgativo)
			VALUES(:nome, :curso, :turno, :credito, :semestre, :flgativo)");

			$conn->bindParam(":nome",$nome,PDO::PARAM_STR);
			$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
			$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
			$conn->bindParam(":credito",$credito,PDO::PARAM_INT);
			$conn->bindParam(":semestre",$semestre,PDO::PARAM_INT);
			$conn->bindParam(":flgativo",$flgativo,PDO::PARAM_INT);

			if($conn->execute()){
				echo "<script>
				alert('DISCIPLINA CADASTRADA COM SUCESSO!');
				window.location='../Admin/cadastro-disciplina.php';
				</script>";
			}else{
				echo "<script> alert('ERRO CADASTRO DISCIPLINA');</script>";
			}
			$conn=null;
		}

		function verifica_disciplina_cadastrada($con,$nome, $curso, $turno, $idusuario){

			$conn= $con->prepare("SELECT id FROM disciplina WHERE nome=:nome
				AND curso=:curso AND turno=:turno
				AND idusuario=:idusuario AND flgativo=1" );

				$conn->bindParam(":nome",$nome,PDO::PARAM_STR);
				$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
				$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
				$conn->bindParam(":idusuario",$idusuario,PDO::PARAM_INT);

				if($conn->execute()){
					return $conn->fetchColumn();
				}else{
					echo "<script> alert('ERRO VERIFICA DISCIPLINA');</script>";
				}
		}

		function cadastra_disciplina($con,$nomedisciplina,$idusuario,$curso,$turno,$semestre){
			$conn = $con->prepare("INSERT INTO disciplina (idusuario, nome, curso, turno, semestre)
			VALUES(:idusuario,:nome, :curso, :turno, :semestre)");
			$conn->bindParam(":idusuario",$idusuario,PDO::PARAM_INT);
			$conn->bindParam(":nome",$nomedisciplina,PDO::PARAM_STR);
			$conn->bindParam(":curso",$curso,PDO::PARAM_STR);
			$conn->bindParam(":turno",$turno,PDO::PARAM_STR);
			$conn->bindParam(":semestre",$semestre,PDO::PARAM_STR);

			if($conn->execute()){
				echo "<script>alert('DISCIPLINA CADASTRADA COM SUCESSO!');</script>";
			}else{
				echo "<script> alert('ERRO CADASTRA DISCIPLINA');</script>";
			}
		}
	}
?>

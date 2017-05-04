<?php
class questao {
	private $id;
	private $iddisciplina;
	private $titulo;
	private $resposta1;
	private $resposta2;
	private $resposta3;
	private $resposta4;
	private $resposta5;
	private $respostacorreta;

	function _construct() {
		$this->id = "";
		$this->iddisciplina = "";
		$this->titulo = "";
		$this->resposta1 = "";
		$this->resposta2 = "";
		$this->resposta3 = "";
		$this->resposta4 = "";
		$this->resposta5 = "";
		$this->respostacorreta = "";
	}

	//metodos Gets
	public function getId($id){
		return $this->id = $id;
	}
	public function getIddisciplina($iddisciplina){
		return $this->iddisciplina = $iddisciplina;
	}
	public function getTitulo($titulo){
		return $this->titulo = $titulo;
	}
	public function getResposta1($resposta1){
		return $this->resposta1 = $resposta1;
	}
	public function getResposta2($resposta2){
		return $this->resposta2 = $resposta2;
	}
	public function getResposta3($resposta3){
		return $this->resposta3 = $resposta3;
	}
	public function getResposta4($resposta4){
		return $this->resposta4 = $resposta4;
	}
	public function getResposta5($resposta5){
		return $this->resposta5 = $resposta5;
	}
	public function getRespostacorreta($respostacorreta){
		return $this->respostacorreta = $respostacorreta;
	}

	//metodos Sets
	public function setId($id){
		return $this->id = $id;
	}
	public function setIddisciplina($iddisciplina){
		return $this->iddisciplina = $iddisciplina;
	}
	public function setTitulo($titulo){
		return $this->titulo = $titulo;
	}
	public function setResposta1($resposta1){
		return $this->resposta1 = $resposta1;
	}
	public function setResposta2($resposta2){
		return $this->resposta2 = $resposta2;
	}
	public function setResposta3($resposta3){
		return $this->resposta3 = $resposta3;
	}
	public function setResposta4($resposta4){
		return $this->resposta4 = $resposta4;
	}
	public function setResposta5($resposta5){
		return $this->resposta5 = $resposta5;
	}
	public function setRespostacorreta($respostacorreta){
		return $this->respostacorreta = $respostacorreta;
	}

	function deletaQuestao($pdo,$id,$iddisciplina){
		$conn = $pdo->prepare("UPDATE questao set flgativo = 0  WHERE id=:id");
		$conn->bindParam(":id",$id,PDO::PARAM_INT);

		if($conn->execute()){
			echo "<script>
			alert('Questão Excluída com Sucesso');
			window.location='listaquestoes.php?id=".$iddisciplina."';
			</script>";
		}else{
			echo "<script> alert('ERRO EXCLUI QUESTÃO');</script>";
		}
		$conn=null;
	}

	function editaQuestaoById($pdo,$idquestao,$iddisciplina,$titulo,$imagem,
	$resp1,$resp2,$resp3,$resp4,$resp5,$respcorreta){
		$conn = $pdo->prepare("UPDATE questao SET iddisciplina = :iddisciplina,
			titulo = :titulo,
			imagem = :imagem,
			resposta1 = :resposta1,
			resposta2 = :resposta2,
			resposta3 = :resposta3,
			resposta4 = :resposta4,
			resposta5 = :resposta5,
			respostacorreta = :respostacorreta
			WHERE id=:id");
			$conn->bindParam(":iddisciplina",$iddisciplina,PDO::PARAM_STR);
			$conn->bindParam(":titulo",$titulo,PDO::PARAM_STR);
			$conn->bindParam(":imagem",$imagem,PDO::PARAM_STR);
			$conn->bindParam(":resposta1",$resp1,PDO::PARAM_STR);
			$conn->bindParam(":resposta2",$resp2,PDO::PARAM_STR);
			$conn->bindParam(":resposta3",$resp3,PDO::PARAM_STR);
			$conn->bindParam(":resposta4",$resp4,PDO::PARAM_STR);
			$conn->bindParam(":resposta5",$resp5,PDO::PARAM_STR);
			$conn->bindParam(":respostacorreta",$respcorreta,PDO::PARAM_STR);
			$conn->bindParam(":id",$idquestao,PDO::PARAM_INT);

			if($conn->execute()){
				echo "<script> alert('Questão Editada Com Sucesso');
				window.location='listaquestoes.php?id=".$iddisciplina."';
				</script>";
				//redireciona
			}else{
				echo "<script> alert('ERRO EDITA QUESTÃO');</script>";
			}
			$conn=null;
		}

		function selectQuestaoByDisciplina($pdo,$id){
			$conn = $pdo->prepare("SELECT * FROM questao WHERE iddisciplina=:id and flgativo = 1");
			$conn->bindParam(":id",$id,PDO::PARAM_INT);
			$conn->execute();
			return $conn->fetchAll(PDO::FETCH_ASSOC);
			$conn=null;
		}

		function selectQuestaoById($pdo,$id){
			$conn = $pdo->prepare("SELECT * FROM questao WHERE id=:id");
			$conn->bindParam(":id",$id,PDO::PARAM_INT);
			$conn->execute();
			return $conn->fetchAll(PDO::FETCH_ASSOC);
			$pdo=null;
			$conn=null;
		}

		function registrarQuestoes($con,$iddisciplina, $titulo, $resposta1,
		$resposta2, $resposta3, $resposta4, $resposta5, $respostacorreta,$imagem){
			$conn = $con->prepare("INSERT INTO questao (id, iddisciplina, titulo,imagem, resposta1, resposta2, resposta3,resposta4,resposta5, respostacorreta)
			VALUES(:id, :iddisciplina, :titulo, :imagem, :resposta1, :resposta2,:resposta3, :resposta4, :resposta5, :respostacorreta)");

			$conn->bindParam(":id",$id,PDO::PARAM_INT);
			$conn->bindParam(":iddisciplina",$iddisciplina,PDO::PARAM_STR);
			$conn->bindParam(":titulo",$titulo,PDO::PARAM_STR);
			$conn->bindParam(":imagem",$imagem,PDO::PARAM_STR);
			$conn->bindParam(":resposta1",$resposta1,PDO::PARAM_STR);
			$conn->bindParam(":resposta2",$resposta2,PDO::PARAM_STR);
			$conn->bindParam(":resposta3",$resposta3,PDO::PARAM_STR);
			$conn->bindParam(":resposta4",$resposta4,PDO::PARAM_STR);
			$conn->bindParam(":resposta5",$resposta5,PDO::PARAM_STR);
			$conn->bindParam(":respostacorreta",$respostacorreta,PDO::PARAM_STR);

			if($conn->execute()){
				echo "<script> if(confirm('Questão Cadastrada Com Sucesso. Se deseja inserir mais questões, clique em OK. Se quiser voltar para o menu principal, clique em CANCELAR')){
								window.location='cadastraquestoes.php';
								}else{
									window.location='index.php';
								}
					</script>";
			}else{
				echo "<script> alert('ERRO CADASTRA QUESTÃO');</script>";
			}
			$conn=null;
		}
	}
	?>

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

			$conn = $pdo->prepare("DELETE FROM questao WHERE id=:id");
			$conn->bindParam(":id",$id,PDO::PARAM_INT);

			if($conn->execute()){
					
					echo "
            		<script>
            
            		alert('Questão Excluída com Sucesso');
            		window.location='listaquestoes.php?id=".$iddisciplina."';
        
           			 </script>
        
            	";
				}else{
					echo "<script> alert('ERRO EXCLUI QUESTÃO');</script>";
			}

		$conn=null;


		}
		

		function selectQuestaoByDisciplina($pdo,$id){

			$conn = $pdo->prepare("SELECT * FROM questao WHERE iddisciplina=:id");
			$conn->bindParam(":id",$id,PDO::PARAM_INT);

			$conn->execute();
			return $conn->fetchAll(PDO::FETCH_ASSOC);

		}

		function registrarQuestoes($con,$iddisciplina, $titulo, $resposta1, $resposta2, $resposta3, $resposta4, $resposta5, $respostacorreta){
			$tb = $con->prepare("INSERT INTO questao (id, iddisciplina, titulo, resposta1, resposta2, resposta3,resposta4,resposta5, respostacorreta) VALUES(:id, :iddisciplina, :titulo, :resposta1, :resposta2, :resposta3, :resposta4, :resposta5, :respostacorreta)");

				$tb->bindParam(":id",$id,PDO::PARAM_INT);
				$tb->bindParam(":iddisciplina",$iddisciplina,PDO::PARAM_STR);
				$tb->bindParam(":titulo",$titulo,PDO::PARAM_STR);
				$tb->bindParam(":resposta1",$resposta1,PDO::PARAM_STR);
				$tb->bindParam(":resposta2",$resposta2,PDO::PARAM_STR);
				$tb->bindParam(":resposta3",$resposta3,PDO::PARAM_STR);
				$tb->bindParam(":resposta4",$resposta4,PDO::PARAM_STR);
				$tb->bindParam(":resposta5",$resposta5,PDO::PARAM_STR);
				$tb->bindParam(":respostacorreta",$respostacorreta,PDO::PARAM_STR);

				if($tb->execute()){
					echo "<script> alert('Questão Cadastrada Com Sucesso');</script>";
					//redireciona
				}else{
					echo "<script> alert('ERRO CADASTRA QUESTÃO');</script>";
	}

	$tb=null;
		}
}
	
?>
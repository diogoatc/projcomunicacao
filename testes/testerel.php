<?php
  require_once("../classes/class_prova.php");
  require_once("../model/conexao.php");

  $conn = $PDO->prepare("SELECT p.ra, p.nomealuno, round(p.nota, 1), 
d.nome, pd.notadisciplina
FROM prova p
INNER JOIN prova_disciplina pd
ON pd.idprova = p.id
INNER JOIN disciplina d
ON d.id = pd.iddisciplina
AND d.curso = :pp
AND d.turno = :noturno 
AND d.semestre = :um 
AND pd.notadisciplina is not null
ORDER BY p.id");
$pp="PP";
$noturno="Noturno";
$um = 1;
$conn->bindParam(":pp",$pp,PDO::PARAM_STR);  
$conn->bindParam(":noturno",$noturno,PDO::PARAM_STR);
$conn->bindParam(":um",$um,PDO::PARAM_INT); 
$conn->execute();
$retorno = $conn->fetchAll(PDO::FETCH_ASSOC);
$conn=null;
$ultimo = $retorno[0];
foreach($retorno as $key){
	
	if($retorno['ra']==$key[])
}
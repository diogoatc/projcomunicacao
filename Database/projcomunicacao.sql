CREATE DATABASE  IF NOT EXISTS `projcomunicacao` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projcomunicacao`;
-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: projcomunicacao
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `semestre` int(11) NOT NULL,
  `flgativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_disciplina_usuario_idx` (`idusuario`),
  CONSTRAINT `fk_disciplina_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,2,'Programação','PP','Noturno',1,1),(2,2,'HIC','RTV','Matutino',1,1);
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemdisciplina`
--

DROP TABLE IF EXISTS `itemdisciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemdisciplina` (
  `iditemdisciplina` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `flgativo` tinyint(1) NOT NULL,
  `credito` int(11) NOT NULL,
  PRIMARY KEY (`iditemdisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemdisciplina`
--

LOCK TABLES `itemdisciplina` WRITE;
/*!40000 ALTER TABLE `itemdisciplina` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemdisciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prova`
--

DROP TABLE IF EXISTS `prova`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ra` int(11) NOT NULL,
  `nomealuno` varchar(45) NOT NULL,
  `nota` double NOT NULL,
  `dtainicio` datetime DEFAULT NULL,
  `dtafim` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prova`
--

LOCK TABLES `prova` WRITE;
/*!40000 ALTER TABLE `prova` DISABLE KEYS */;
INSERT INTO `prova` VALUES (1,89696,'',10,'2016-08-24 20:44:56',NULL);
/*!40000 ALTER TABLE `prova` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prova_disciplina`
--

DROP TABLE IF EXISTS `prova_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prova_disciplina` (
  `idprova` int(11) NOT NULL,
  `iddisciplina` int(11) NOT NULL,
  PRIMARY KEY (`idprova`,`iddisciplina`),
  KEY `fk_prova_has_disciplina_disciplina1_idx` (`iddisciplina`),
  KEY `fk_prova_has_disciplina_prova1_idx` (`idprova`),
  CONSTRAINT `fk_prova_has_disciplina_disciplina1` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prova_has_disciplina_prova1` FOREIGN KEY (`idprova`) REFERENCES `prova` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prova_disciplina`
--

LOCK TABLES `prova_disciplina` WRITE;
/*!40000 ALTER TABLE `prova_disciplina` DISABLE KEYS */;
INSERT INTO `prova_disciplina` VALUES (1,1);
/*!40000 ALTER TABLE `prova_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questao`
--

DROP TABLE IF EXISTS `questao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddisciplina` int(11) NOT NULL,
  `titulo` varchar(512) NOT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `resposta1` varchar(255) NOT NULL,
  `resposta2` varchar(255) NOT NULL COMMENT '	',
  `resposta3` varchar(255) NOT NULL,
  `resposta4` varchar(255) NOT NULL,
  `resposta5` varchar(255) NOT NULL,
  `respostacorreta` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questao_disciplina1_idx` (`iddisciplina`),
  CONSTRAINT `fk_questao_disciplina1` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questao`
--

LOCK TABLES `questao` WRITE;
/*!40000 ALTER TABLE `questao` DISABLE KEYS */;
INSERT INTO `questao` VALUES (1,1,'Porque o céu é azul?',NULL,'Porque sim','Porque não','Não sei','Vai saber','NDA','B'),(2,1,'Qual a melhor linguagem?',NULL,'Java','Python','PHP','Ruby','Pascal','A'),(3,2,'Porque a gente veste a calça e calça a bota?',NULL,'Se joga','de lá pra cá','de lá pra lá','Sacos plásticos','Dilma vez','A');
/*!40000 ALTER TABLE `questao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questoes_aluno`
--

DROP TABLE IF EXISTS `questoes_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questoes_aluno` (
  `id` int(11) NOT NULL,
  `idprova` int(11) NOT NULL,
  `idquestao` int(11) NOT NULL,
  `respostaaluno` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes_aluno_prova1_idx` (`idprova`),
  KEY `fk_questoes_aluno_questao1_idx` (`idquestao`),
  CONSTRAINT `fk_questoes_aluno_prova1` FOREIGN KEY (`idprova`) REFERENCES `prova` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questoes_aluno_questao1` FOREIGN KEY (`idquestao`) REFERENCES `questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questoes_aluno`
--

LOCK TABLES `questoes_aluno` WRITE;
/*!40000 ALTER TABLE `questoes_aluno` DISABLE KEYS */;
INSERT INTO `questoes_aluno` VALUES (1,1,1,'A'),(2,1,2,'B');
/*!40000 ALTER TABLE `questoes_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `senha` varchar(512) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `flgativo` tinyint(1) NOT NULL DEFAULT '1' COMMENT '		',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Teste Teste','teste','teste','teste@mail.com',1,1),(2,'Percival Lucena','Pervical','percival','percival@gmail.com',1,1),(3,'Testando','teste2','96a62ca98bdec7f55343f8cfa594379bdba76cc9','testetes@teste.com',2,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-05 22:04:00

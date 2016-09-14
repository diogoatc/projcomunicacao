-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `disciplina`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `itemdisciplina`;
CREATE TABLE `itemdisciplina` (
  `iditemdisciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `flgativo` tinyint(1) NOT NULL DEFAULT '1',
  `credito` int(11) NOT NULL,
  PRIMARY KEY (`iditemdisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `prova`;
CREATE TABLE `prova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ra` int(11) NOT NULL,
  `nomealuno` varchar(45) NOT NULL,
  `nota` double NOT NULL,
  `dtainicio` datetime DEFAULT NULL,
  `dtafim` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `prova_disciplina`;
CREATE TABLE `prova_disciplina` (
  `idprova` int(11) NOT NULL,
  `iddisciplina` int(11) NOT NULL,
  PRIMARY KEY (`idprova`,`iddisciplina`),
  KEY `fk_prova_has_disciplina_disciplina1_idx` (`iddisciplina`),
  KEY `fk_prova_has_disciplina_prova1_idx` (`idprova`),
  CONSTRAINT `fk_prova_has_disciplina_disciplina1` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prova_has_disciplina_prova1` FOREIGN KEY (`idprova`) REFERENCES `prova` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `questao`;
CREATE TABLE `questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddisciplina` int(11) NOT NULL,
  `titulo` mediumtext NOT NULL,
  `imagem` longtext,
  `resposta1` mediumtext NOT NULL,
  `resposta2` mediumtext NOT NULL COMMENT '	',
  `resposta3` mediumtext NOT NULL,
  `resposta4` mediumtext NOT NULL,
  `resposta5` mediumtext NOT NULL,
  `respostacorreta` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questao_disciplina1_idx` (`iddisciplina`),
  CONSTRAINT `fk_questao_disciplina1` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `questoes_aluno`;
CREATE TABLE `questoes_aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idprova` int(11) NOT NULL,
  `idquestao` int(11) NOT NULL,
  `respostaaluno` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes_aluno_prova1_idx` (`idprova`),
  KEY `fk_questoes_aluno_questao1_idx` (`idquestao`),
  CONSTRAINT `fk_questoes_aluno_prova1` FOREIGN KEY (`idprova`) REFERENCES `prova` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questoes_aluno_questao1` FOREIGN KEY (`idquestao`) REFERENCES `questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `nome` varchar(128) NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `senha` varchar(512) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `flgativo` tinyint(1) NOT NULL DEFAULT '1' COMMENT '		',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2016-09-14 22:51:08

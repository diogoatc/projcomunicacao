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

INSERT INTO `disciplina` (`id`, `idusuario`, `nome`, `curso`, `turno`, `semestre`, `flgativo`) VALUES
(1,	2,	'Programação',	'PP',	'Noturno',	1,	1),
(2,	2,	'HIC',	'RTV',	'Noturno',	2,	1),
(3,	4,	'Antropologia Cristã',	'PP',	'Diurno',	1,	1),
(4,	4,	'Atendimento Publicitário',	'PP',	'Diurno',	1,	1),
(5,	4,	'Dramaturgia Dir. Atores',	'RTV',	'Noturno',	2,	1),
(6,	4,	'Psicologia da Comunicação',	'PP',	'Noturno',	1,	1),
(7,	9,	'Batatões',	'PP',	'Noturno',	1,	1),
(8,	4,	'exemplo',	'PP',	'Diurno',	1,	1);

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

INSERT INTO `itemdisciplina` (`iditemdisciplina`, `nome`, `curso`, `turno`, `flgativo`, `credito`) VALUES
(1,	'Programação',	'PP',	'Noturno',	1,	4),
(2,	'HIC',	'RTV',	'Noturno',	1,	4),
(3,	'Antropologia Cristã',	'PP',	'Noturno',	1,	2),
(4,	'Atendimento Publicitário',	'PP',	'Noturno',	1,	4),
(5,	'Dramaturgia Dir. Atores',	'RTV',	'Noturno',	1,	4),
(6,	'',	'',	'Matutino',	1,	1),
(7,	'Algotitimos',	'Sistemas Para Internet',	'Matutino',	1,	2),
(8,	'Batatões',	'PP',	'Noturno',	1,	4),
(9,	'Psicologia da Comunicação',	'PP',	'Noturno',	1,	3),
(10,	'',	'PP',	'Matutino',	1,	1),
(11,	'exemplo',	'PP',	'Matutino',	1,	1),
(12,	'',	'PP',	'Matutino',	1,	1),
(13,	'',	'PP',	'Matutino',	1,	1),
(14,	'Atendimento ao Percival',	'PP',	'Matutino',	1,	1),
(15,	'aa',	'PP',	'Matutino',	1,	1);

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

INSERT INTO `prova` (`id`, `ra`, `nomealuno`, `nota`, `dtainicio`, `dtafim`) VALUES
(1,	89696,	'gabriel',	10,	'2016-08-24 20:44:56',	NULL),
(2,	104696,	'Diogo Lopes',	0,	'2016-09-07 09:14:40',	'2016-09-07 12:14:58'),
(3,	111111,	'Diogo Lopes da Costa',	0,	'2016-09-07 09:41:00',	'2016-09-07 12:41:13'),
(4,	104696,	'Diogo Costa',	5,	'2016-09-07 09:46:18',	'2016-09-07 12:46:31'),
(5,	110011,	'Diogo Lopes',	5,	'2016-09-07 09:53:25',	'2016-09-07 12:53:36'),
(6,	110011,	'Diogo Lopes',	5,	'2016-09-07 09:53:25',	'2016-09-07 12:54:35'),
(7,	111001,	'Diogo Lopes2',	5,	'2016-09-07 09:55:09',	'2016-09-07 12:55:19'),
(8,	104696,	'Diogo Lopes',	0,	'2016-09-07 09:56:44',	'2016-09-07 12:56:52'),
(9,	104696,	'Diogo Lopes',	5,	'2016-09-07 10:08:29',	'2016-09-07 13:08:39'),
(10,	104696,	'Diogo Lopes',	5,	'2016-09-07 10:08:29',	'2016-09-07 13:10:54'),
(11,	104696,	'Diogo Lopes',	5,	'2016-09-07 10:08:29',	'2016-09-07 13:12:18'),
(12,	53523,	'Gabriel',	10,	'2016-09-07 10:12:34',	'2016-09-07 13:12:42'),
(13,	10231,	'Diogo',	0,	'2016-09-07 10:14:02',	'2016-09-07 13:14:11'),
(14,	1111,	'aaaa',	0,	'2016-09-07 10:16:24',	'2016-09-07 13:16:35'),
(15,	12312,	'aaaaa',	5,	'2016-09-07 10:30:30',	'2016-09-07 13:30:40'),
(16,	1231,	'Diogo Lopes',	5,	'2016-09-07 10:33:33',	'2016-09-07 13:33:48'),
(17,	11111,	'babab',	0,	'2016-09-07 10:34:47',	'2016-09-07 13:35:01'),
(18,	1231,	'aaaa',	0,	'2016-09-07 10:39:21',	'2016-09-07 13:39:30'),
(19,	1231,	'aaaa',	0,	'2016-09-07 10:39:21',	'2016-09-07 13:45:56'),
(20,	12522,	'gabriel',	5,	'2016-09-07 10:49:57',	'2016-09-07 13:50:52'),
(21,	1521,	'teste',	5,	'2016-09-07 10:51:04',	'2016-09-07 13:51:12'),
(22,	12412,	'teste',	5,	'2016-09-07 10:52:54',	'2016-09-07 13:53:01'),
(23,	53225,	'Gabriel',	10,	'2016-09-07 11:18:59',	'2016-09-07 14:19:05'),
(24,	85896,	'Gabriel',	10,	'2016-09-07 11:21:35',	'2016-09-07 14:21:47'),
(25,	846746,	'Gabriel teste questoes',	6.6666666666667,	'2016-09-07 11:56:05',	'2016-09-07 14:56:16'),
(26,	12412,	'Gasdg',	3.3333333333333,	'2016-09-07 12:03:43',	'2016-09-07 15:03:55'),
(27,	124125,	'gdasg',	6.6666666666667,	'2016-09-07 12:10:11',	'2016-09-07 15:10:19'),
(28,	124125,	'gdasg',	6.6666666666667,	'2016-09-07 12:10:11',	'2016-09-07 15:12:34'),
(29,	124125,	'gdasg',	6.6666666666667,	'2016-09-07 12:10:11',	'2016-09-07 15:13:47'),
(30,	124125,	'gdasg',	6.6666666666667,	'2016-09-07 12:10:11',	'2016-09-07 15:15:09'),
(31,	124125,	'gdasg',	6.6666666666667,	'2016-09-07 12:10:11',	'2016-09-07 15:16:32'),
(32,	24125,	'asdgasdg',	3.3333333333333,	'2016-09-07 12:22:25',	'2016-09-07 15:22:35'),
(33,	23512,	'Gasdgas',	6.6666666666667,	'2016-09-07 12:28:22',	'2016-09-07 15:28:35'),
(34,	23512,	'Gasdgas',	6.6666666666667,	'2016-09-07 12:28:22',	'2016-09-07 15:28:38'),
(35,	12412,	'gadgasdg',	6.6666666666667,	'2016-09-07 12:30:50',	'2016-09-07 15:31:03'),
(36,	104696,	'Diogo Lopes',	0,	'2016-09-07 14:36:15',	'2016-09-07 17:36:33'),
(37,	79256,	'ANA CARLA MORAES',	0,	'2016-09-07 18:18:44',	'2016-09-07 21:20:22');

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

INSERT INTO `prova_disciplina` (`idprova`, `iddisciplina`) VALUES
(23,	1),
(24,	1),
(25,	1),
(26,	1),
(28,	1),
(29,	1),
(30,	1),
(31,	1),
(32,	1),
(33,	1),
(34,	1),
(35,	1),
(36,	1),
(24,	6),
(25,	6),
(26,	6),
(28,	6),
(29,	6),
(30,	6),
(31,	6),
(32,	6),
(33,	6),
(34,	6),
(35,	6),
(36,	6),
(37,	6);

DROP TABLE IF EXISTS `questao`;
CREATE TABLE `questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddisciplina` int(11) NOT NULL,
  `titulo` varchar(512) NOT NULL,
  `imagem` longtext,
  `resposta1` varchar(255) NOT NULL,
  `resposta2` varchar(255) NOT NULL COMMENT '	',
  `resposta3` varchar(255) NOT NULL,
  `resposta4` varchar(255) NOT NULL,
  `resposta5` varchar(255) NOT NULL,
  `respostacorreta` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questao_disciplina1_idx` (`iddisciplina`),
  CONSTRAINT `fk_questao_disciplina1` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `questao` (`id`, `iddisciplina`, `titulo`, `imagem`, `resposta1`, `resposta2`, `resposta3`, `resposta4`, `resposta5`, `respostacorreta`) VALUES
(1,	1,	'Porque o céu é azul?',	NULL,	'Porque sim',	'Porque não',	'Não sei',	'Vai saber',	'NDA',	'B'),
(2,	1,	'Qual a melhor linguagem?',	NULL,	'Java',	'Python',	'PHP',	'Ruby',	'Pascal',	'A'),
(3,	2,	'Porque a gente veste a calça e calça a bota?',	NULL,	'Se joga',	'de lá pra cá',	'de lá pra lá',	'Sacos plásticos',	'Dilma vez',	'A'),
(9,	3,	'Batata é fruta?',	NULL,	'Sim',	'Não',	'Talvez',	'Não, mas é gostosa pakas',	'N',	'A'),
(11,	5,	'dramaturgia',	NULL,	'2',	'3',	'4',	'4',	'2',	'D'),
(12,	5,	'dramaturgia',	NULL,	'2',	'a',	'ff',	'2',	'agasdads',	'C'),
(14,	4,	'bafasda',	NULL,	'as',	'sd',	'ds',	'sd',	'sd',	'B'),
(15,	6,	'Psicologia da Comunicacao',	NULL,	'Viagem?',	'Respostas nada a ver?',	'Encheção de linguiça?',	'Só vou por causa da professora?',	'NDA',	'D'),
(16,	7,	'Ser ou nao ser, eis a questão.',	NULL,	'Ser',	'Não ser',	'Ser vivo',	'Ser morto',	'Morto vivo',	'E'),
(17,	8,	'a',	NULL,	'a',	'a',	'a',	'a',	'a',	'A'),
(18,	8,	'teste impossível de acertar!',	NULL,	'joia',	'beleza',	'tranquilo',	'deboa',	'muitodeboa',	'A'),
(19,	8,	'ieohiosh',	NULL,	'aihdoi',	'huhaudih',	'hiu',	'hiu',	'asas',	'E');

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

INSERT INTO `questoes_aluno` (`id`, `idprova`, `idquestao`, `respostaaluno`) VALUES
(1,	35,	1,	'B'),
(2,	35,	2,	'A'),
(3,	35,	15,	'E'),
(4,	36,	1,	'C'),
(5,	36,	2,	'D'),
(6,	36,	15,	'B'),
(7,	37,	15,	'C');

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `nome` varchar(128) NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `senha` varchar(512) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `flgativo` tinyint(1) NOT NULL DEFAULT '1' COMMENT '		',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `flgativo`) VALUES
(1,	'Teste Teste',	'teste',	'teste',	'teste@mail.com',	1,	1),
(2,	'Percival Lucena',	'Percival',	'f6c651682660a72dc794d2081ccb1241a2ea4b67',	'percival@gmail.com',	1,	1),
(3,	'Testando',	'teste2',	'162c79263d0f38233aa91dfd9900026664846739',	'testetes@teste.com',	2,	1),
(4,	'Diogo Lopes',	'diogo',	'8cb2237d0679ca88db6464eac60da96345513964',	'diogol_l@hotmail.com',	2,	1),
(5,	'Professor Batata',	'batata',	'8cb2237d0679ca88db6464eac60da96345513964',	'123@123.com',	2,	1),
(6,	'Diogo teste 3',	'teste3',	'8cb2237d0679ca88db6464eac60da96345513964',	'diogol_l@hotmail.com',	2,	1),
(7,	'Diogo Lopes',	'Batatões',	'8cb2237d0679ca88db6464eac60da96345513964',	'123@123.com',	2,	1),
(8,	'Valdecir Simões Lima',	'valdecir.lima',	'8cb2237d0679ca88db6464eac60da96345513964',	'valdecir.lima@ucb.org.br',	2,	1),
(9,	'Gabriel Tagliari',	'gabriel',	'18a98c35f49808b45edadc75fb1b25ebfd4037d6',	'gabriel@gabriel.com',	2,	1),
(10,	'Gabriel Teste',	'testegabriel',	'330a496768518ccc7883d0d2d696d250f7a23aba',	'gabrielteste@teste.com',	2,	1);

-- 2016-09-07 21:55:20

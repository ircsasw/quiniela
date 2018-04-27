
-- Crear las tablas de Yii Advanced

-- Crear las tablas del proyecto
CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `group` varchar(5) NOT NULL,
  `shortcut` varchar(5) NOT NULL,
  `flag` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

CREATE TABLE `matches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `round` varchar(5) DEFAULT NULL,
  `team_a_id` int(11) unsigned DEFAULT NULL,
  `score_a` int(11) DEFAULT '0',
  `team_b_id` int(11) unsigned DEFAULT NULL,
  `score_b` int(11) DEFAULT '0',
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `soccer_bet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `total_points` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `soccer_bet_id` int(11) unsigned NOT NULL,
  `match_id` int(11) NOT NULL,
  `score_a` int(10) unsigned NOT NULL DEFAULT '0',
  `score_b` int(10) unsigned NOT NULL DEFAULT '0',
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Datos iniciales
INSERT INTO teams (`id`,`name`, `group`, `shortcut`) VALUES (1,'Rusia','GA','RUS'),(2,'Arabia Saudí','GA','ARS'),(3,'Egipto','GA','EGI'),(4,'Uruguay','GA','URU'),
(5,'Portugal','GB','POR'),(6,'España','GB','ESP'),(7,'Marruecos','GB','MAR'),(8,'Irán','GB','IRN'),
(9,'Francia','GC','FRA'),(10,'Australia','GC','AUS'),(11,'Perú','GC','PER'),(12,'Dinamarca','GC','DIN'),
(13,'Argentina','GD','ARG'),(14,'Islandia','GD','ISL'),(15,'Croacia','GD','CRO'),(16,'Nigeria','GD','NIG'),
(17,'Brasil','GE','BRA'),(18,'Suiza','GE','SUI'),(19,'Costa Rica','GE','CSR'),(20,'Serbia','GE','SRB'),
(21,'Alemania','GF','ALE'),(22,'México','GF','MEX'),(23,'Suecia','GF','SUE'),(24,'República de Corea','GF','RKR'),
(25,'Bélgica','GG','BEL'),(26,'Panamá','GG','PAN'),(27,'Túnez','GG','TUN'),(28,'Inglaterra','GG','ENG'),
(29,'Polonia','GH','POL'),(30,'Senegal','GH','SEN'),(31,'Colombia','GH','COL'),(32,'Japón','GH','JPN');

INSERT INTO matches (`date`,`round`,`team_a_id`,`team_b_id`) VALUES ('2018-06-14 10:00:00','GA',1,2),
('2018-06-15 07:00:00','GA',3,4), ('2018-06-15 10:00:00','GB',7,8), ('2018-06-15 13:00:00','GB',5,6),
('2018-06-16 05:00:00','GC',9,10), ('2018-06-16 08:00:00','GD',13,14), ('2018-06-16 11:00:00','GC',11,12),
('2018-06-16 14:00:00','GD',15,16), ('2018-06-17 07:00:00','GE',19,20), ('2018-06-17 10:00:00','GF',21,22),
('2018-06-17 13:00:00','GE',18,17), ('2018-06-18 07:00:00','GF',23,24), ('2018-06-18 10:00:00','GG',25,26),
('2018-06-18 13:00:00','GG',27,28), ('2018-06-19 07:00:00','GH',31,32), ('2018-06-19 10:00:00','GH',29,30),

('2018-06-19 13:00:00','GA',1,3),('2018-06-20 07:00:00','GB',5,7), ('2018-06-20 10:00:00','GA',4,2),
('2018-06-20 13:00:00','GB',8,6),('2018-06-21 07:00:00','GC',12,10), ('2018-06-21 10:00:00','GC',9,11),
('2018-06-21 13:00:00','GD',13,15),('2018-06-22 07:00:00','GE',17,19), ('2018-06-22 10:00:00','GD',16,14),
('2018-06-22 13:00:00','GE',20,18),('2018-06-23 07:00:00','GG',25,27), ('2018-06-23 10:00:00','GF',24,22),
('2018-06-23 13:00:00','GF',21,23),('2018-06-24 07:00:00','GG',26,28), ('2018-06-24 10:00:00','GH',30,32),
('2018-06-24 13:00:00','GH',31,29),

('2018-06-25 09:00:00','GA',2,3),('2018-06-25 09:00:00','GA',4,1), ('2018-06-25 13:00:00','GB',8,5),
('2018-06-25 13:00:00','GB',6,7),('2018-06-26 09:00:00','GC',11,10), ('2018-06-26 09:00:00','GC',9,12),
('2018-06-26 13:00:00','GD',13,16),('2018-06-26 13:00:00','GD',14,15), ('2018-06-27 09:00:00','GF',24,21),
('2018-06-27 09:00:00','GF',22,23),('2018-06-27 13:00:00','GE',18,19), ('2018-06-27 13:00:00','GE',17,20),
('2018-06-28 09:00:00','GH',30,31),('2018-06-28 09:00:00','GH',32,29), ('2018-06-28 13:00:00','GG',28,25),
('2018-06-28 13:00:00','GG',26,27),

('2018-06-30 09:00:00','R16',NULL,NULL),('2018-06-30 13:00:00','R16',NULL,NULL), ('2018-07-01 09:00:00','R16',NULL,NULL),
('2018-07-01 13:00:00','R16',NULL,NULL),('2018-07-02 09:00:00','R16',NULL,NULL), ('2018-07-02 13:00:00','R16',NULL,NULL),
('2018-07-03 09:00:00','R16',NULL,NULL),('2018-07-03 13:00:00','R16',NULL,NULL),

('2018-07-06 09:00:00','R8',NULL,NULL),('2018-07-06 13:00:00','R8',NULL,NULL), ('2018-07-07 09:00:00','R8',NULL,NULL),
('2018-07-07 13:00:00','R8',NULL,NULL),

('2018-07-10 13:00:00','R4',NULL,NULL),('2018-07-11 13:00:00','R4',NULL,NULL),

('2018-07-14 09:00:00','R3',NULL,NULL),('2018-07-15 10:00:00','R2',NULL,NULL);

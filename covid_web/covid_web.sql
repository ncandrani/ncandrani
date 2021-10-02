-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_recover` tinyint(4) DEFAULT NULL,
  `inpatient` tinyint(4) DEFAULT NULL,
  `indication` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `gender`, `birth`, `address`, `is_recover`, `inpatient`, `indication`) VALUES
(1,	'Joko',	'L',	'1987-07-14',	'Jakarta, DKI',	1,	1,	'Batuk dan Demam'),
(2,	'Kusumo',	'L',	'2000-07-14',	'Semarang, Jawa Tengah',	1,	0,	'Batuk'),
(4,	'tes',	'L',	'2020-12-29',	'Yogyakarta, DIY',	0,	0,	'Tidak ada');

-- 2021-07-14 23:13:24
-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.50-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-11-29 13:33:08
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table mydb.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `idcities` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcities`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table mydb.coders
CREATE TABLE IF NOT EXISTS `coders` (
  `idcoders` int(11) NOT NULL AUTO_INCREMENT,
  `coders` varchar(255) NOT NULL,
  PRIMARY KEY (`idcoders`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table mydb.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `idlanguages` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`idlanguages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table mydb.pets
CREATE TABLE IF NOT EXISTS `pets` (
  `idpets` int(11) NOT NULL AUTO_INCREMENT,
  `pets` varchar(255) NOT NULL,
  PRIMARY KEY (`idpets`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table mydb.users
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `coders` varchar(255) DEFAULT NULL,
  `cities_idcities` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_cities1_idx` (`cities_idcities`),
  CONSTRAINT `fk_users_cities1` FOREIGN KEY (`cities_idcities`) REFERENCES `cities` (`idcities`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table mydb.users_has_languages
CREATE TABLE IF NOT EXISTS `users_has_languages` (
  `users_iduser` int(11) NOT NULL,
  `languages_idlanguages` int(11) NOT NULL,
  PRIMARY KEY (`users_iduser`,`languages_idlanguages`),
  KEY `fk_users_has_languages_languages1_idx` (`languages_idlanguages`),
  KEY `fk_users_has_languages_users1_idx` (`users_iduser`),
  CONSTRAINT `fk_users_has_languages_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_languages_languages1` FOREIGN KEY (`languages_idlanguages`) REFERENCES `languages` (`idlanguages`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table mydb.users_has_pets
CREATE TABLE IF NOT EXISTS `users_has_pets` (
  `users_iduser` int(11) NOT NULL,
  `pets_idpets` int(11) NOT NULL,
  PRIMARY KEY (`users_iduser`,`pets_idpets`),
  KEY `fk_users_has_pets_pets1_idx` (`pets_idpets`),
  KEY `fk_users_has_pets_users_idx` (`users_iduser`),
  CONSTRAINT `fk_users_has_pets_users` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_pets_pets1` FOREIGN KEY (`pets_idpets`) REFERENCES `pets` (`idpets`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

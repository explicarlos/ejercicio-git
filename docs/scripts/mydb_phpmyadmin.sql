-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2012 a las 13:34:21
-- Versión del servidor: 5.1.50
-- Versión de PHP: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `idcities` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcities`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `cities`
--

INSERT INTO `cities` (`idcities`, `city`) VALUES
(1, 'Ourense'),
(2, 'Zaragoza'),
(3, 'Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coders`
--

CREATE TABLE IF NOT EXISTS `coders` (
  `idcoders` int(11) NOT NULL AUTO_INCREMENT,
  `coders` varchar(255) NOT NULL,
  PRIMARY KEY (`idcoders`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `coders`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `idlanguages` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`idlanguages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `languages`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `idpets` int(11) NOT NULL AUTO_INCREMENT,
  `pets` varchar(255) NOT NULL,
  PRIMARY KEY (`idpets`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pets`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

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
  KEY `fk_users_cities1_idx` (`cities_idcities`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `name`, `email`, `password`, `description`, `photo`, `coders`, `cities_idcities`) VALUES
(1, 'Sebastian', 'sebastian@gmail.com', '1234', 'Otra desc', 'photo.jpg', 'php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_has_languages`
--

CREATE TABLE IF NOT EXISTS `users_has_languages` (
  `users_iduser` int(11) NOT NULL,
  `languages_idlanguages` int(11) NOT NULL,
  PRIMARY KEY (`users_iduser`,`languages_idlanguages`),
  KEY `fk_users_has_languages_languages1_idx` (`languages_idlanguages`),
  KEY `fk_users_has_languages_users1_idx` (`users_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `users_has_languages`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_has_pets`
--

CREATE TABLE IF NOT EXISTS `users_has_pets` (
  `users_iduser` int(11) NOT NULL,
  `pets_idpets` int(11) NOT NULL,
  PRIMARY KEY (`users_iduser`,`pets_idpets`),
  KEY `fk_users_has_pets_pets1_idx` (`pets_idpets`),
  KEY `fk_users_has_pets_users_idx` (`users_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `users_has_pets`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_cities1` FOREIGN KEY (`cities_idcities`) REFERENCES `cities` (`idcities`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_has_languages`
--
ALTER TABLE `users_has_languages`
  ADD CONSTRAINT `fk_users_has_languages_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_languages_languages1` FOREIGN KEY (`languages_idlanguages`) REFERENCES `languages` (`idlanguages`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_has_pets`
--
ALTER TABLE `users_has_pets`
  ADD CONSTRAINT `fk_users_has_pets_users` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_pets_pets1` FOREIGN KEY (`pets_idpets`) REFERENCES `pets` (`idpets`) ON DELETE NO ACTION ON UPDATE NO ACTION;

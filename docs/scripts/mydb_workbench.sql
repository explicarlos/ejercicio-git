SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`cities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`cities` (
  `idcities` INT NOT NULL AUTO_INCREMENT ,
  `city` VARCHAR(255) NULL ,
  PRIMARY KEY (`idcities`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`users` (
  `iduser` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `description` VARCHAR(255) NULL ,
  `photo` VARCHAR(255) NULL ,
  `coders` VARCHAR(255) NULL ,
  `cities_idcities` INT NOT NULL ,
  PRIMARY KEY (`iduser`) ,
  INDEX `fk_users_cities1_idx` (`cities_idcities` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  CONSTRAINT `fk_users_cities1`
    FOREIGN KEY (`cities_idcities` )
    REFERENCES `mydb`.`cities` (`idcities` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pets`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`pets` (
  `idpets` INT NOT NULL AUTO_INCREMENT ,
  `pets` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`idpets`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users_has_pets`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`users_has_pets` (
  `users_iduser` INT NOT NULL ,
  `pets_idpets` INT NOT NULL ,
  PRIMARY KEY (`users_iduser`, `pets_idpets`) ,
  INDEX `fk_users_has_pets_pets1_idx` (`pets_idpets` ASC) ,
  INDEX `fk_users_has_pets_users_idx` (`users_iduser` ASC) ,
  CONSTRAINT `fk_users_has_pets_users`
    FOREIGN KEY (`users_iduser` )
    REFERENCES `mydb`.`users` (`iduser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_pets_pets1`
    FOREIGN KEY (`pets_idpets` )
    REFERENCES `mydb`.`pets` (`idpets` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`coders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`coders` (
  `idcoders` INT NOT NULL AUTO_INCREMENT ,
  `coders` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`idcoders`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`languages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`languages` (
  `idlanguages` INT NOT NULL AUTO_INCREMENT ,
  `language` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`idlanguages`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users_has_languages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`users_has_languages` (
  `users_iduser` INT NOT NULL ,
  `languages_idlanguages` INT NOT NULL ,
  PRIMARY KEY (`users_iduser`, `languages_idlanguages`) ,
  INDEX `fk_users_has_languages_languages1_idx` (`languages_idlanguages` ASC) ,
  INDEX `fk_users_has_languages_users1_idx` (`users_iduser` ASC) ,
  CONSTRAINT `fk_users_has_languages_users1`
    FOREIGN KEY (`users_iduser` )
    REFERENCES `mydb`.`users` (`iduser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_languages_languages1`
    FOREIGN KEY (`languages_idlanguages` )
    REFERENCES `mydb`.`languages` (`idlanguages` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

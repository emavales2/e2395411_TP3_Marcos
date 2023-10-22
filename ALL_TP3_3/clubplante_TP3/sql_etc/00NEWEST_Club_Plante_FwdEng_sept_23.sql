-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE;
SET SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema clubPlante
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clubPlante
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clubPlante` DEFAULT CHARACTER SET utf8 ;
USE `clubPlante` ;

-- -----------------------------------------------------
-- Table `clubPlante`.`CP_City`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`CP_City` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`CP_Plant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`CP_Plant` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `type` VARCHAR(45) NULL,
  `care` TEXT NULL,
  `image` BLOB NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`CP_Member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`CP_Member` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `postal_code` VARCHAR(10) NULL,
  `email` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(20) NULL,
  `wishlist` VARCHAR(45) NOT NULL,
  `City_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Member_City1_idx` (`City_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `fk_Member_City1`
    FOREIGN KEY (`City_id`)
    REFERENCES `clubPlante`.`CP_City` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`CP_Exchange`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`CP_Exchange` (
  `id` INT NOT NULL,
  `Date` DATETIME NOT NULL,
  `Member_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Bid_Member1_idx` (`Member_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_Bid_Member1`
    FOREIGN KEY (`Member_id`)
    REFERENCES `clubPlante`.`CP_Member` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`CP_ExchgPlantTransaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`CP_ExchgPlantTransaction` (
  `Exchange_id` INT NOT NULL,
  `Plant_id` INT NOT NULL,
  `traded_for` VARCHAR(45) NOT NULL,
  INDEX `fk_Exchange_has_Plant_Exchange1_idx` (`Exchange_id` ASC),
  INDEX `fk_Exchange_has_Plant_Plant1_idx` (`Plant_id` ASC),
  CONSTRAINT `fk_Exchange_has_Plant_Exchange1`
    FOREIGN KEY (`Exchange_id`)
    REFERENCES `clubPlante`.`CP_Exchange` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Exchange_has_Plant_Plant1`
    FOREIGN KEY (`Plant_id`)
    REFERENCES `clubPlante`.`CP_Plant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
PRIMARY KEY (`Exchange_id`, `Plant_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

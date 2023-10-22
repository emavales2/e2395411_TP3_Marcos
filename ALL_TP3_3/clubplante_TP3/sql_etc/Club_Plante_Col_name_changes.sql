-- MySQL Workbench Synchronization
-- Generated: 2023-09-22 15:36
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: msanches

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE IF NOT EXISTS `clubplante`.`CP_City` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `clubplante`.`CP_Plant` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `type` VARCHAR(45) NULL DEFAULT NULL,
  `care` TEXT NULL DEFAULT NULL,
  `image` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `clubplante`.`Member` 
RENAME TO  `clubplante`.`CP_Member` ;

ALTER TABLE `clubplante`.`Exchange` 
RENAME TO  `clubplante`.`CP_Exchange` ;

ALTER TABLE `clubplante`.`ExchgPlantTransaction` 
RENAME TO  `clubplante`.`CP_ExchgPlantTransaction` ;

ALTER TABLE `clubplante`.`City` 
RENAME TO  `clubplante`.`CP_City` ;

ALTER TABLE `clubplante`.`Plant` 
RENAME TO  `clubplante`.`CP_Plant` ;





ALTER TABLE `clubplante`.`Member` 
ADD CONSTRAINT `fk_Member_City1`
  FOREIGN KEY (`City_id`)
  REFERENCES `clubplante`.`CP_City` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `clubplante`.`Exchange` 
ADD CONSTRAINT `fk_Bid_Member1`
  FOREIGN KEY (`Member_id`)
  REFERENCES `clubplante`.`CP_Member` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `clubplante`.`ExchgPlantTransaction` 
ADD CONSTRAINT `fk_Exchange_has_Plant_Exchange1`
  FOREIGN KEY (`Exchange_id` , `Plant_id`)
  REFERENCES `clubplante`.`CP_Exchange` (`id` , `id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Exchange_has_Plant_Plant1`
  FOREIGN KEY (`Plant_id`)
  REFERENCES `clubplante`.`CP_Plant` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

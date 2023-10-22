-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema clubplantetp3
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clubplantetp3
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clubplantetp3` DEFAULT CHARACTER SET utf8 ;
USE `clubplantetp3` ;

-- -----------------------------------------------------
-- Table `clubplantetp3`.`cptp3_city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubplantetp3`.`cptp3_city` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubplantetp3`.`cptp3_plant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubplantetp3`.`cptp3_plant` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `type` VARCHAR(45) NULL,
  `care` TEXT NULL,
  `image` TEXT NULL,
  `offered_by` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubplantetp3`.`cptp3_privilege`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubplantetp3`.`cptp3_privilege` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `privilege` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubplantetp3`.`cptp3_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubplantetp3`.`cptp3_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `email_username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `postal_code` VARCHAR(10) NULL,
  `phone` VARCHAR(20) NULL,
  `wishlist` VARCHAR(45) NOT NULL,
  `city_id` INT NOT NULL,
  `privilege_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_city_idx` (`city_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_username_UNIQUE` (`email_username` ASC),
  INDEX `fk_user_privilege_idx` (`privilege_id` ASC),
  CONSTRAINT `fk_user_city`
    FOREIGN KEY (`city_id`)
    REFERENCES `clubplantetp3`.`cptp3_city` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_privilege`
    FOREIGN KEY (`privilege_id`)
    REFERENCES `clubplantetp3`.`cptp3_privilege` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubplantetp3`.`cptp3_exchange`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubplantetp3`.`cptp3_exchange` (
  `id` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bid_user_idx` (`user_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_bid_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `clubplantetp3`.`cptp3_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubplantetp3`.`cptp3_exchg_plant_transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubplantetp3`.`cptp3_exchg_plant_transaction` (
  `exchange_id` INT NOT NULL,
  `plant_id` INT NOT NULL,
  `traded_for` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`exchange_id`, `plant_id`),
  INDEX `fk_exchange_has_plant_plant_idx` (`plant_id` ASC),
  CONSTRAINT `fk_exchange_has_plant_exchange`
    FOREIGN KEY (`exchange_id`)
    REFERENCES `clubplantetp3`.`cptp3_exchange` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exchange_has_plant_plant`
    FOREIGN KEY (`plant_id`)
    REFERENCES `clubplantetp3`.`cptp3_plant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

ALTER TABLE cptp3_user
ADD created_at TIMESTAMP DEFAULT NOW();

CREATE TABLE cptp3_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    timestamp DATETIME,
    ip_address VARCHAR(45),
    is_guest BOOLEAN,
    username VARCHAR(255),
    page_visited VARCHAR(255)
);



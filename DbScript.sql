-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `UserID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE INDEX `UserID_UNIQUE` (`UserID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`State`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`State` (
  `StateID` TINYINT UNSIGNED NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`StateID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Control Panel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Control Panel` (
  `ControlPanelID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `StateID` TINYINT UNSIGNED ZEROFILL NOT NULL,
  `ApplicationID` INT UNSIGNED NULL,
  `UserID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ControlPanelID`),
  UNIQUE INDEX `MachineID_UNIQUE` (`ControlPanelID` ASC),
  UNIQUE INDEX `UserID_UNIQUE` (`UserID` ASC),
  INDEX `fkState_idx` (`StateID` ASC),
  CONSTRAINT `fkUserID`
    FOREIGN KEY (`UserID`)
    REFERENCES `mydb`.`User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkState`
    FOREIGN KEY (`StateID`)
    REFERENCES `mydb`.`State` (`StateID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Application`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Application` (
  `ApplicationID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `IP` VARCHAR(45) NOT NULL,
  `Image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ApplicationID`),
  CONSTRAINT `fkApplicationID`
    FOREIGN KEY (`ApplicationID`)
    REFERENCES `mydb`.`User` (`UserID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Machine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Machine` (
  `MachineID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `IP` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`MachineID`),
  CONSTRAINT `fkMachineID`
    FOREIGN KEY (`MachineID`)
    REFERENCES `mydb`.`Control Panel` (`ControlPanelID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

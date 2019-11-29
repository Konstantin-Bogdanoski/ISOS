<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
$host = "127.0.0.1:3306";
$dbname = "cars";
$username = "root";
$password = "password";
$conn = null;
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = '
-- -----------------------------------------------------
-- Table `cars`.`owner`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `owner` ;

CREATE TABLE IF NOT EXISTS `owner` (
  `owner_id` INT NOT NULL AUTO_INCREMENT,
  `owner_name` VARCHAR(255) NOT NULL,
  `owner_phone` VARCHAR(255) NOT NULL,
  `owner_email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`owner_id`),
  INDEX `oid_idx` (`owner_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cars`.`mechanic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mechanic` ;

CREATE TABLE IF NOT EXISTS `mechanic` (
  `mechanic_id` INT NOT NULL AUTO_INCREMENT,
  `mechanic_name` VARCHAR(255) NOT NULL,
  `department` VARCHAR(255) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`mechanic_id`),
  INDEX `mid_idx` (`mechanic_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cars`.`car`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `car` ;

CREATE TABLE IF NOT EXISTS `car` (
  `car_id` INT NOT NULL AUTO_INCREMENT,
  `car_model` VARCHAR(128) NOT NULL,
  `date_added` DATETIME NOT NULL,
  `owner_id` INT NOT NULL,
  `mechanic_id` INT NOT NULL,
  PRIMARY KEY (`car_id`),
  INDEX `cid_idx` (`car_id` ASC),
  CONSTRAINT `owner_id`
    FOREIGN KEY (`owner_id`)
    REFERENCES `owner` (`owner_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cars`.`accessory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `accessory` ;

CREATE TABLE IF NOT EXISTS `accessory` (
  `accessory_id` INT NOT NULL AUTO_INCREMENT,
  `accessory_name` VARCHAR(255) NOT NULL,
  `accessory_price` FLOAT NOT NULL,
  `car_id` INT NOT NULL,
  PRIMARY KEY (`accessory_id`),
  INDEX `aid_idx` (`accessory_id` ASC),
  CONSTRAINT `car_id`
    FOREIGN KEY (`car_id`)
    REFERENCES `car` (`car_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
';
    $q = $conn->query($sql);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
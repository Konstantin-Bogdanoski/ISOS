<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
$host = "127.0.0.1:3306";
$dbname = "groceries";
$username = "root";
$password = "password";
$conn = null;
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = '
-- -----------------------------------------------------
-- Table `groceries`.`shopping_list`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `shopping_list` ;

CREATE TABLE IF NOT EXISTS `shopping_list` (
  `shopping_list_id` INT NOT NULL AUTO_INCREMENT,
  `list_name` VARCHAR(255) NOT NULL,
  `creator` VARCHAR(255) NOT NULL,
  `secret` VARCHAR(255) NOT NULL,
  `favorite` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`shopping_list_id`),
  INDEX `sid_idx` (`shopping_list_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `groceries`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `products` ;

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` INT NOT NULL AUTO_INCREMENT,
  `shopping_list_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `is_bought` TINYINT(1) NULL DEFAULT 0,
  `is_urgent` TINYINT(1) NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`product_id`)),
  INDEX `pid_idx` (`product_id` ASC),
  CONSTRAINT `shopping_list_id`
    FOREIGN KEY (`shopping_list_id`)
    REFERENCES `shopping_list` (`shopping_list_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
';
    $q = $conn->query($sql);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
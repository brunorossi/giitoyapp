CREATE DATABASE `giitoyapp` CHARACTER SET utf8 COLLATE utf8_general_ci;
use `giitoyapp`;

DROP TABLE IF EXISTS `giitoyapp`.`books`;
CREATE  TABLE IF NOT EXISTS `giitoyapp`.`books` (
  `book_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `number_of_pages` SMALLINT UNSIGNED NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `author` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`book_id`) 
) ENGINE = InnoDB;

DROP TABLE IF EXISTS `giitoyapp`.`cars`;
CREATE  TABLE IF NOT EXISTS `giitoyapp`.`cars` (
  `car_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(50) NOT NULL,
  `model` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`car_id`) 
) ENGINE = InnoDB;
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NOT NULL ,
  `gender` ENUM('Male','Female') NOT NULL ,
  `email` VARCHAR(50) NOT NULL ,
  `mobile_number` VARCHAR(10) NULL DEFAULT NULL ,
  `date_of_birth` DATE NULL DEFAULT NULL ,
  `designation` VARCHAR(50) NOT NULL ,
  `branch` VARCHAR(50) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`(11)), UNIQUE (`email`)
) ENGINE = InnoDB;
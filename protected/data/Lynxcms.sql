DROP DATABASE IF EXISTS `Lynxcms`;
CREATE DATABASE IF NOT EXISTS `Lynxcms` CHARACTER SET=utf8 COLLATE=utf8_general_ci;
 
 USE `Lynxcms`;
 
DROP TABLE IF EXISTS `tbl_tag`; 
CREATE TABLE `tbl_tag` (
        `tag_id` INT UNSIGNED NOT NULL  AUTO_INCREMENT,
        `tag_name` VARCHAR(150) NOT NULL,
        CONSTRAINT `pk_tag_id` PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
    `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `creation_date` DATETIME NOT NULL,
    `last_login_time` DATETIME,
     CONSTRAINT `pk_user_id`PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category`(
    `category_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(45),
    `description` VARCHAR(45),
    `published` VARCHAR(45),
    CONSTRAINT `pk_category_id` PRIMARY KEY (`category_id`)
) ENGINE=InnoDB;


DROP TABLE IF EXISTS `tbl_content`;
CREATE TABLE `tbl_content` (
    `content_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(150) NOT NULL,
    `alias` VARCHAR(150) NOT NULL,
    `content` TEXT NOT NULL,
    `published` BOOLEAN NOT NULL,
    `keywords` VARCHAR(150),
    `description` VARCHAR(150),
    `created_by` INT UNSIGNED NOT NULL,
    `creation_date` DATETIME,
    `updated_by` INT UNSIGNED NOT NULL,
    `updation_date` DATETIME,
    `category_id` INT UNSIGNED NOT NULL,
    CONSTRAINT `pk_content_id` PRIMARY KEY (`content_id`),
    CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`user_id`),
    CONSTRAINT `fk_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`user_id`),
    CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`)
) ENGINE=InnoDB;


DROP TABLE IF EXISTS `tbl_content_tag_assignment`;
CREATE TABLE `tbl_content_tag_assignment`(
    `content_id` INT UNSIGNED NOT NULL,
    `tag_id` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`content_id`,`tag_id`),
    CONSTRAINT `fk_content_id` FOREIGN KEY (`content_id`) REFERENCES `tbl_content` (`content_id`),
    CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tbl_tag` (`tag_id`)
) ENGINE=InnoDB;
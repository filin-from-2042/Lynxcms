/*username: root password: 123456*/

DROP DATABASE IF EXISTS `Lynxcms`;
CREATE DATABASE IF NOT EXISTS `Lynxcms` CHARACTER SET=utf8 COLLATE=utf8_general_ci;
 
 USE `Lynxcms`;
 
DROP TABLE IF EXISTS `tbl_tag`; 
CREATE TABLE `tbl_tag` (
        `tag_id` INT UNSIGNED NOT NULL  AUTO_INCREMENT,
        `tag_name` VARCHAR(150) NOT NULL,
        PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE `tbl_role` (
        `role_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL,
        `description` VARCHAR(100),
        PRIMARY KEY (`role_id`)
) ENGINE=InnoDB;

/*INSERT INTO `tbl_role` (role_id,name,description) VALUES 
        (1,'administrator','delete'),          
        (2,'editor','create, update - content, categgory, menu'),
        (3,'user','site view, login');*/

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
    `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(150) NOT NULL,
    `creation_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `last_login_time` TIMESTAMP,
    `role` TINYINT UNSIGNED NOT NULL,
    CONSTRAINT `fk_role` FOREIGN KEY (`role`) REFERENCES `tbl_role` (`role_id`),
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

/*INSERT INTO `tbl_user` (name,email,password,role) VALUES ('demo','webmaster@example.com','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','1');*/
/*INSERT INTO `tbl_user` (name,email,password,role) VALUES ('demo','webmaster@example.com','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','1');*/


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
    PRIMARY KEY (`content_id`),
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

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu` (
    `item_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `url` VARCHAR(150) NOT NULL,
    `position` TINYINT NOT NULL,
    `published` BOOLEAN,
    `content_id` INT UNSIGNED NOT NULL, 
    CONSTRAINT `fk_content_id_menu` FOREIGN KEY (`content_id`) REFERENCES `tbl_content` (`content_id`),
    PRIMARY KEY (`item_id`)
) ENGINE=InnoDB;


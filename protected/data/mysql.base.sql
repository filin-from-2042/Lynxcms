CREATE DATABASE IF NOT EXISTS `Lynxcms`
        CHARSET=utf-8 COLLATE=utf-8_unicode_ci;
        
CREATE TABLE `tbl_tag`(
        `tag_id` INT NOT NULL AUTO_INCREMENT,
        `tag_name` VARCHAR(150) NOT NULL,
        CONSTRAINT `pk_tag_id` PRIMARY KEY (tag_id)
);


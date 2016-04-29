
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(128),
	`user_name` VARCHAR(255),
	`password` CHAR(128),
	`salt` CHAR(64),
	`auth_token` CHAR(32),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `user_U_1` (`email`),
	UNIQUE KEY `user_U_2` (`user_name`),
	KEY `user_FI_1`(`auth_token`),
	KEY `user_FI_2`(`email`),
	KEY `user_FI_3`(`user_name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- city
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `city`;


CREATE TABLE `city`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`city_name` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `city_FI_1`(`city_name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- zipcode
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `zipcode`;


CREATE TABLE `zipcode`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`zip_code` VARCHAR(32),
	PRIMARY KEY (`id`),
	UNIQUE KEY `zipcode_U_1` (`zip_code`),
	KEY `zipcode_FI_1`(`zip_code`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- state
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `state`;


CREATE TABLE `state`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`state_name` VARCHAR(128),
	`state_abbreviation` VARCHAR(32),
	PRIMARY KEY (`id`),
	UNIQUE KEY `state_U_1` (`state_name`),
	UNIQUE KEY `state_U_2` (`state_abbreviation`),
	KEY `state_FI_1`(`state_name`),
	KEY `state_FI_2`(`state_abbreviation`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- service
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `service`;


CREATE TABLE `service`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`service_name` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `service_FI_1`(`service_name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- volunteer
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `volunteer`;


CREATE TABLE `volunteer`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`last_name` VARCHAR(255),
	`first_name` VARCHAR(255),
	`address_line` VARCHAR(255),
	`city_id` INTEGER,
	`state_id` INTEGER,
	`zipcode_id` INTEGER,
	`telephone_home` VARCHAR(128),
	`telephone_cell` VARCHAR(128),
	`telephone_work` VARCHAR(128),
	`email` VARCHAR(255),
	`church` VARCHAR(255),
	`city_area` VARCHAR(255),
	`service_id` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `volunteer_U_1` (`email`),
	KEY `volunteer_FIKey_1`(`church`),
	KEY `volunteer_FIKey_2`(`email`),
	KEY `volunteer_FIKey_3`(`city_area`),
	KEY `volunteer_FIKey_4`(`last_name`),
	KEY `volunteer_FIKey_5`(`first_name`),
	INDEX `volunteer_FI_1` (`city_id`),
	CONSTRAINT `volunteer_FK_1`
		FOREIGN KEY (`city_id`)
		REFERENCES `city` (`id`)
		ON DELETE SET NULL,
	INDEX `volunteer_FI_2` (`state_id`),
	CONSTRAINT `volunteer_FK_2`
		FOREIGN KEY (`state_id`)
		REFERENCES `state` (`id`)
		ON DELETE SET NULL,
	INDEX `volunteer_FI_3` (`zipcode_id`),
	CONSTRAINT `volunteer_FK_3`
		FOREIGN KEY (`zipcode_id`)
		REFERENCES `zipcode` (`id`)
		ON DELETE SET NULL,
	INDEX `volunteer_FI_4` (`service_id`),
	CONSTRAINT `volunteer_FK_4`
		FOREIGN KEY (`service_id`)
		REFERENCES `service` (`id`)
		ON DELETE SET NULL
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- client
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `client`;


CREATE TABLE `client`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`last_name` VARCHAR(255),
	`first_name` VARCHAR(255),
	`parent_guardian_name` VARCHAR(255),
	`address_line` VARCHAR(255),
	`city_id` INTEGER,
	`state_id` INTEGER,
	`zipcode_id` INTEGER,
	`telephone1` VARCHAR(64),
	`telephone2` VARCHAR(64),
	`school` VARCHAR(255),
	`email` VARCHAR(255),
	`family_size` INTEGER,
	`city_area` VARCHAR(255),
	`service_id` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `client_U_1` (`email`),
	KEY `client_FIKey_1`(`last_name`),
	KEY `client_FIKey_2`(`first_name`),
	KEY `client_FIKey_3`(`school`),
	KEY `client_FIKey_4`(`city_area`),
	INDEX `client_FI_1` (`city_id`),
	CONSTRAINT `client_FK_1`
		FOREIGN KEY (`city_id`)
		REFERENCES `city` (`id`)
		ON DELETE SET NULL,
	INDEX `client_FI_2` (`state_id`),
	CONSTRAINT `client_FK_2`
		FOREIGN KEY (`state_id`)
		REFERENCES `state` (`id`)
		ON DELETE SET NULL,
	INDEX `client_FI_3` (`zipcode_id`),
	CONSTRAINT `client_FK_3`
		FOREIGN KEY (`zipcode_id`)
		REFERENCES `zipcode` (`id`)
		ON DELETE SET NULL,
	INDEX `client_FI_4` (`service_id`),
	CONSTRAINT `client_FK_4`
		FOREIGN KEY (`service_id`)
		REFERENCES `service` (`id`)
		ON DELETE SET NULL
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- client_volunteer_map
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `client_volunteer_map`;


CREATE TABLE `client_volunteer_map`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`client_id` INTEGER,
	`volunteer_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `client_volunteer_map_FI_1` (`client_id`),
	CONSTRAINT `client_volunteer_map_FK_1`
		FOREIGN KEY (`client_id`)
		REFERENCES `client` (`id`)
		ON DELETE SET NULL,
	INDEX `client_volunteer_map_FI_2` (`volunteer_id`),
	CONSTRAINT `client_volunteer_map_FK_2`
		FOREIGN KEY (`volunteer_id`)
		REFERENCES `volunteer` (`id`)
		ON DELETE SET NULL
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

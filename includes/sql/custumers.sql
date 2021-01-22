CREATE TABLE `gers_garage`.`customers` (
     `user_id` INT(100) NOT NULL AUTO_INCREMENT , 
     `user_name` VARCHAR NOT NULL , 
     `user_email` VARCHAR NOT NULL , 
     `user_phone` INT(10) NOT NULL , 
     `user_pwd` VARCHAR(100) NOT NULL , 
     `user_booking` VARCHAR NOT NULL , 
     `user_car_make` VARCHAR NOT NULL , 
     `user_car_engine` VARCHAR NOT NULL , 
     PRIMARY KEY (`user_id`)) ENGINE = InnoDB;

CREATE TABLE `gers_garage`.`bookings`(
    `id_booking` INT(100) NOT NULL AUTO_INCREMENT,
    `id_user` INT(100) NOT NULL,
    `u_name` mediumtext NOT NULL,
    `u_mail` mediumtext NOT NULL,
    `u_phone` int(100) NOT NULL,
    `c_make` mediumtext NOT NULL,
    `c_eng` mediumtext NOT NULL,
    `c_prob` mediumtext NOT NULL,
    `b_date` date NOT NULL,
    `b_time` time NOT NULL,
    `comments` longtext NOT NULL,
    `serv_type` mediumtext NOT NULL,
    FOREIGN KEY(id_user) REFERENCES customers(id_user),
    PRIMARY KEY(`id_booking`)
) ENGINE = INNODB;
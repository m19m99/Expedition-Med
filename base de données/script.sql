CREATE DATABASE IF NOT EXISTS expeditionmed;

CREATE USER IF NOT EXISTS 'sea'@'localhost' IDENTIFIED BY 'azerty1234';

GRANT ALL PRIVILEGES ON med.* TO 'sea'@'localhost';

FLUSH PRIVILEGES;

USE med; 

CREATE TABLE `Sample_DATA` (
    `Sample` string  NOT NULL ,
    `Sea` string  NOT NULL ,
    `Start_date` date  NOT NULL ,
    `Start_time` date  NOT NULL ,
    PRIMARY KEY (
        `Sample`
    )
);

CREATE TABLE `Gps` (
    `id` int  NOT NULL ,
    `start_latitude` int  NOT NULL ,
    `start_longitude` int  NOT NULL ,
    `mid_latitude` int  NOT NULL ,
    `mid_longitude` int  NOT NULL ,
    `end_latitude` int  NOT NULL ,
    `end_longitude` int  NOT NULL ,
    `Sample` string  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Navigation` (
    `id` int  NOT NULL ,
    `wind_force` int  NOT NULL ,
    `wind_speed` int  NOT NULL ,
    `sea_state` int  NOT NULL ,
    `water_temperature` int  NOT NULL ,
    `Sample` string  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Surface` (
    `id` int  NOT NULL ,
    `boat_speed` int  NOT NULL ,
    `start_flowmeter` int  NOT NULL ,
    `filtered_volume` int  NOT NULL ,
    `filtered_distance` int  NOT NULL ,
    `filtered_surface` int  NOT NULL ,
    `comments` string  NOT NULL ,
    `Sample` string  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `Tri` (
    `id` int  NOT NULL ,
    `size` string  NOT NULL ,
    `type` string  NOT NULL ,
    `color` int  NOT NULL ,
    `number` int  NOT NULL ,
    `Sample` string  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

ALTER TABLE `Gps` ADD CONSTRAINT `fk_Gps_Sample` FOREIGN KEY(`Sample`)
REFERENCES `Sample_DATA` (`Sample`);

ALTER TABLE `Navigation` ADD CONSTRAINT `fk_Navigation_Sample` FOREIGN KEY(`Sample`)
REFERENCES `Sample_DATA` (`Sample`);

ALTER TABLE `Surface` ADD CONSTRAINT `fk_Surface_Sample` FOREIGN KEY(`Sample`)
REFERENCES `Sample_DATA` (`Sample`);

ALTER TABLE `Tri` ADD CONSTRAINT `fk_Tri_Sample` FOREIGN KEY(`Sample`)
REFERENCES `Sample_DATA` (`Sample`);


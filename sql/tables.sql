-- User Table
CREATE TABLE `user` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `usertype` ENUM('a', 'd', 'p') NOT NULL
);

-- Admin Table
CREATE TABLE `admin` (
  `id` INT PRIMARY KEY,
  `name` VARCHAR(50) NOT NULL,
  FOREIGN KEY (`id`) REFERENCES `user`(`id`)
);

-- Insert into user table
INSERT INTO `user` (`email`, `password`, `usertype`)
VALUES ('admin@alb_esthetics.com', '$2y$10$Ael6oaqXBIAj8ao1HQ0gw.0o2VeGAHyS2KXiSuiC9hldIneThAFFq', 'a');

-- Retrieve the auto-generated ID for the new user
SET @admin_id = LAST_INSERT_ID();

-- Insert into admin table
INSERT INTO `admin` (`id`, `name`)
VALUES (@admin_id, 'Pegi');


-- Doctor Table
CREATE TABLE `doctor` (
  `id` INT PRIMARY KEY,
  `name` VARCHAR(50) NOT NULL,
  `surname` VARCHAR(50) NOT NULL,
  `docclinic` VARCHAR(15) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `specialties` VARCHAR(50) NOT NULL,
  `telephone` VARCHAR(15) NOT NULL,
  `department` VARCHAR(50) NOT NULL,
  FOREIGN KEY (`id`) REFERENCES `user`(`id`)
);

-- Patient Table
CREATE TABLE `patient` (
  `id` INT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `surname` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `reg_date` DATETIME NOT NULL,
  `ptel` VARCHAR(15) NOT NULL,
  FOREIGN KEY (`id`) REFERENCES `user`(`id`)
);


DROP TABLE IF EXISTS `specialties`;
CREATE TABLE specialties
(
    `id`    int (2) NOT NULL ,
    `sname` varchar(50) DEFAULT NULL,
    PRIMARY KEY
        (`id`)
);
INSERT INTO `specialties` (`id`, `sname`)
VALUES (1, 'Medical Dermatology'),
       (2, 'Cosmetic Dermatology'),
       (3, 'Surgical Dermatology'),
       (4,'Pediatric Dermatology'),
       (5,'Plastic Surgery'),
       (6,'Dermatopathology'),
       (7,'Mohs Surgery'),
       (8,'Dermatologic Oncology'),
       (9,'Dermatologic Immunology'),
       (10,'Dermatologic Surgery'),
       (11,'Laser Dermatology'),
       (12,'Dermatologic Infectious Diseases'),
       (13,'Teledermatology'),
       (14,'Dermatoeidemiology'),
       (15,'Dermato-trichology'),
       (16,'Dermatologic Allergy'),
       (17,'Dermatologic Genomics'),
       (18,'Dermatologic Toxicology'),
       (19,'Dermatologic Radiology');



DROP TABLE IF EXISTS session;
CREATE TABLE session
(
    `s_time` varchar(50) not null,
    PRIMARY KEY
        (`s_time`)
);

INSERT into session
values ('08:00');
INSERT into session
values ('08:30');
INSERT into session
values ('09:00');
INSERT into session
values ('09:30');
INSERT into session
values ('10:00');
INSERT into session
values ('10:30');
INSERT into session
values ('11:00');
INSERT into session
values ('11:30');
INSERT into session
values ('12:00');
INSERT into session
values ('12:30');
INSERT into session
values ('13:00');
INSERT into session
values ('13:30');
INSERT into session
values ('14:00');
INSERT into session
values ('14:30');
INSERT into session
values ('15:00');
INSERT into session
values ('15:30');
INSERT into session
values ('16:00');
INSERT into session
values ('16:30');
INSERT into session
values ('17:00');
INSERT into session
values ('17:30');
INSERT into session
values ('18:00');
INSERT into session
values ('18:30');

DROP TABLE IF EXISTS appointment;
-- Table for appointments
CREATE TABLE appointment
(
    app_id INT PRIMARY KEY AUTO_INCREMENT,
    doc_id INT,
    id    INT,
    date   DATE,
    s_time varchar(50)
);

CREATE TABLE subscriber
(
    email varchar(50) PRIMARY KEY
);








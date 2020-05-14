-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `employees`;
CREATE DATABASE `employees` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `employees`;

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`
(
    `id`         int         NOT NULL AUTO_INCREMENT,
    `first_name` varchar(20) NOT NULL,
    `patronymic` varchar(20) NOT NULL,
    `last_name`  varchar(40) NOT NULL,
    `email`      varchar(64) NOT NULL,
    `room`       int         NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `employee` (`id`, `first_name`, `patronymic`, `last_name`, `email`, `room`)
VALUES (1, 'Михаил', 'Иванович', 'Николаев', 'nikol@bnb.by', 9),
       (2, 'Константин', 'Васильевич', 'Махеев', 'mahey@bnb.by', 3),
       (3, 'Семен', 'Андреевич', 'Поломаев', 'polom@bnb.by', 9),
       (4, 'геннадий', 'Петрович', 'Овчаренко', 'ovchar@bnb.by', 6),
       (5, 'Константин', 'Васильевич', 'Седовласов', 'sedoy@bnb.by', 1),
       (6, 'Петр', 'Ильич', 'Коровин', 'bizon@bnb.by', 2),
       (15, 'Анна', 'Сигизмундовна', 'Резедова', 'rezeda@bnb.by', 3),
       (19, 'Максим', 'Викторович', 'Чернышев', 'chernish@bnb.by', 2),
       (23, 'Алиса', 'Витальевна', 'Игнатенко', 'alisa@bnb.by', 3),
       (24, 'Антон', 'Семенович', 'Макаренко', 'makar@bnb.by', 5),
       (25, 'Светлана', 'Витальевна', 'Петрова', 'petr@bnb.by', 3);

DROP TABLE IF EXISTS `employee_phones`;
CREATE TABLE `employee_phones`
(
    `id`       int NOT NULL AUTO_INCREMENT,
    `e_id`     int NOT NULL,
    `phone_id` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `e_id` (`e_id`),
    KEY `phone_id` (`phone_id`),
    CONSTRAINT `employee_phones_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `employee_phones_ibfk_2` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `employee_phones` (`id`, `e_id`, `phone_id`)
VALUES (1, 1, 3),
       (2, 1, 2),
       (3, 2, 5),
       (4, 3, 5),
       (5, 4, 7),
       (6, 5, 1),
       (7, 6, 7),
       (8, 15, 4),
       (9, 19, 13),
       (15, 23, 18),
       (16, 23, 19),
       (17, 24, 16),
       (18, 24, 17),
       (19, 24, 3),
       (20, 25, 20),
       (21, 25, 21);

DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones`
(
    `id`           int         NOT NULL AUTO_INCREMENT,
    `num_sequence` varchar(20) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `num_sequence` (`num_sequence`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `phones` (`id`, `num_sequence`)
VALUES (16, '1111111111111'),
       (14, '1213141516178'),
       (18, '1213141516179'),
       (1, '1234567891011'),
       (2, '1234567891012'),
       (5, '1234567891013'),
       (6, '1234567891014'),
       (7, '1234567891015'),
       (8, '1234567891016'),
       (9, '1234567891017'),
       (10, '1234567891018'),
       (19, '1904'),
       (17, '202'),
       (3, '3333333333333'),
       (20, '402'),
       (4, '4444444444444'),
       (21, '8(017)923-74-80'),
       (13, '9876543210123');

-- 2020-05-12 21:01:11

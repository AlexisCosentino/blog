-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `blog`;

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `nickname` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname_UNIQUE` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `authors` (`id`, `name`, `firstname`, `nickname`) VALUES
(1,	'Smith',	'Bob',	'Matéo'),
(2,	'Apple',	'Jim',	'yoyo35'),
(3,	'Roger',	'Bill',	'billy'),
(4,	'Pristy',	'Valentina',	'Valentine'),
(7,	'Denver',	'Matt',	'matthew'),
(8,	'Bron',	'Anna',	'banana58');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `name`) VALUES
(2,	'Loisirs'),
(3,	'Actus');

DROP TABLE IF EXISTS `categories_has_posts`;
CREATE TABLE `categories_has_posts` (
  `categories_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  PRIMARY KEY (`categories_id`,`posts_id`),
  KEY `fk_categories_has_posts_posts1_idx` (`posts_id`),
  KEY `fk_categories_has_posts_categories_idx` (`categories_id`),
  CONSTRAINT `fk_categories_has_posts_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categories_has_posts_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories_has_posts` (`categories_id`, `posts_id`) VALUES
(2,	1),
(2,	2),
(3,	3),
(3,	4);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(150) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `authors_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_authors1_idx` (`authors_id`),
  KEY `fk_comments_posts1_idx` (`posts_id`),
  CONSTRAINT `fk_comments_authors1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `text`, `date`, `authors_id`, `posts_id`) VALUES
(1,	'Bravo !',	'2021-01-21 11:49:10',	8,	1),
(2,	'Sans avis',	'2021-01-21 11:49:10',	4,	2),
(3,	'Reflexion...',	'2021-01-21 11:51:05',	1,	2),
(4,	'La vérité fait mal',	'2021-01-21 11:56:14',	4,	3),
(5,	'!!!!!!',	'2021-01-21 11:56:14',	7,	4);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `text` varchar(150) NOT NULL,
  `date_begin` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `important` int(11) NOT NULL DEFAULT 0,
  `authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_authors1_idx` (`authors_id`),
  CONSTRAINT `fk_posts_authors1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `text`, `date_begin`, `date_end`, `important`, `authors_id`) VALUES
(1,	'Le sport c\'est la vie',	'Le sport c\'est vraiment génial les gars ! Notamment le Biathlon !',	'2021-01-21 11:46:36',	'2021-02-28 11:44:05',	5,	8),
(2,	'La petanque est il vraiment un sport ?',	'C\'est une excellente question qui mérite réflexion.',	'2021-01-21 11:46:36',	'2021-01-30 11:44:05',	1,	1),
(3,	'La politique française est elle corrompu ?',	'Nous connaissons déjà la réponse à cette problématique.',	'2021-01-21 11:55:06',	'2021-01-31 11:51:28',	4,	2),
(4,	'Comment Macron a t-il pu devenir président',	'Je vous réfère à l\'article concernant la corruption en France dans le milieu politique Francais',	'2021-01-21 11:55:06',	'2021-02-06 11:51:28',	3,	3);

-- 2021-01-25 10:40:13

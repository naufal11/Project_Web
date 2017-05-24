/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 5.1.61-community : Database - loldb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`loldb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `loldb`;

/*Table structure for table `lol_like_post` */

DROP TABLE IF EXISTS `lol_like_post`;

CREATE TABLE `lol_like_post` (
  `intIdLike` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `intIdPost` bigint(20) NOT NULL,
  `intIdUser` bigint(20) NOT NULL,
  `response` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intIdLike`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `lol_like_post` */

LOCK TABLES `lol_like_post` WRITE;

insert  into `lol_like_post`(`intIdLike`,`intIdPost`,`intIdUser`,`response`) values 
(1,1,3,1),
(5,1,4,0),
(7,2,4,0);

UNLOCK TABLES;

/*Table structure for table `lol_post` */

DROP TABLE IF EXISTS `lol_post`;

CREATE TABLE `lol_post` (
  `intIdPost` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `caption` text,
  `file` varchar(100) NOT NULL,
  `dtmDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `intIdUser` bigint(20) NOT NULL,
  `mark` varchar(25) DEFAULT NULL,
  `heading` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`intIdPost`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `lol_post` */

LOCK TABLES `lol_post` WRITE;

insert  into `lol_post`(`intIdPost`,`title`,`caption`,`file`,`dtmDate`,`intIdUser`,`mark`,`heading`) values 
(1,'asd','asdasd','BusinessmanView1.png','2017-05-24 20:19:54',3,'goodboy','New Style Broh'),
(2,'Mantan Gelis Ah','This is very very waw but nothing happen and crazy words.','1452504805353.jpg','2017-05-24 20:36:28',4,'Happy Fun','Galau Style');

UNLOCK TABLES;

/*Table structure for table `lol_user` */

DROP TABLE IF EXISTS `lol_user`;

CREATE TABLE `lol_user` (
  `intIdUser` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(75) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `last_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`intIdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `lol_user` */

LOCK TABLES `lol_user` WRITE;

insert  into `lol_user`(`intIdUser`,`username`,`firstname`,`lastname`,`email`,`password`,`gender`,`isActive`,`last_log`) values 
(3,'admin','admin','a','admin@gmail.com','4297f44b13955235245b2497399d7a93',1,0,'2017-05-24 00:00:00'),
(4,'cukai','cuk','ai','cukai@gmail.com','4297f44b13955235245b2497399d7a93',1,0,'2017-05-24 00:00:00');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

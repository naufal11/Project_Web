/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 10.1.21-MariaDB : Database - loldb
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

/*Table structure for table `lol_comments` */

DROP TABLE IF EXISTS `lol_comments`;

CREATE TABLE `lol_comments` (
  `intComments` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `intIdPost` bigint(20) NOT NULL,
  `intIdUser` bigint(20) DEFAULT NULL,
  `comment` text NOT NULL,
  `dtmDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`intComments`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `lol_comments` */

LOCK TABLES `lol_comments` WRITE;

UNLOCK TABLES;

/*Table structure for table `lol_like_post` */

DROP TABLE IF EXISTS `lol_like_post`;

CREATE TABLE `lol_like_post` (
  `intIdLike` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `intIdPost` bigint(20) NOT NULL,
  `intIdUser` bigint(20) NOT NULL,
  `response` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`intIdLike`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `lol_like_post` */

LOCK TABLES `lol_like_post` WRITE;

insert  into `lol_like_post`(`intIdLike`,`intIdPost`,`intIdUser`,`response`) values 
(1,1,3,1),
(5,1,4,0),
(7,2,4,0),
(8,5,6,1),
(9,1,6,1),
(10,2,6,1);

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
  `heading` varchar(100) NOT NULL,
  PRIMARY KEY (`intIdPost`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `lol_post` */

LOCK TABLES `lol_post` WRITE;

insert  into `lol_post`(`intIdPost`,`title`,`caption`,`file`,`dtmDate`,`intIdUser`,`mark`,`heading`) values 
(1,'asd','asdasd','BusinessmanView1.png','2017-05-24 20:19:54',3,'goodboy','New Style Broh'),
(2,'Mantan Gelis Ah','This is very very waw but nothing happen and crazy words.','1452504805353.jpg','2017-05-24 20:36:28',4,'Happy Fun','Galau Style'),
(3,'kos','loren ingsung color ot aned.','1453010366749.jpg','2017-05-25 11:12:54',5,'Kaka','sem Ja'),
(4,'Saat mencoba ','mungkin ini percobaan','http://www.memecomicindonesia.net/wp-content/uploads/2016/05/meme-comic-teletubbies-18-1.jpg','2017-05-25 11:18:03',5,'bisa aja kosong','Imeg ling'),
(5,'Satwa marga','saat lagi maen sakitnya tuh dikaki yg nyeker ...','50ecbbb216ce5364fbfdefda10133e00.jpg','2017-05-28 10:37:55',6,'ketimpa aer','Kecap ABC');

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
  `image_profile` varchar(75) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`intIdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `lol_user` */

LOCK TABLES `lol_user` WRITE;

insert  into `lol_user`(`intIdUser`,`username`,`firstname`,`lastname`,`email`,`password`,`gender`,`isActive`,`last_log`,`image_profile`,`bio`) values 
(3,'admin','admin','a','admin@gmail.com','4297f44b13955235245b2497399d7a93',1,0,'2017-05-25 18:56:59',NULL,'ane cuma bio'),
(4,'cukai','cuk','ai','cukai@gmail.com','4297f44b13955235245b2497399d7a93',1,0,'2017-05-25 18:57:09',NULL,'bukan bio biasa'),
(5,'KUy76','As','em','asemjawa@gmail.com','f26d9bf4d4af8870fc1def217c8d1ae7',1,0,'2017-05-25 00:00:00',NULL,NULL),
(6,'kuya','kuyaa','ya22','kuya@gmail.com','4297f44b13955235245b2497399d7a93',1,1,'2017-05-28 17:04:54','bcd884128ba2896d2b17c239408fae98.png',NULL),
(7,'mei35','mei','laniy','meimei@gmail.com','4297f44b13955235245b2497399d7a93',0,0,'2017-05-28 13:30:56',NULL,NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

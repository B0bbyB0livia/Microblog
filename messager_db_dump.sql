/*
SQLyog Community v11.01 (32 bit)
MySQL - 5.0.45-log : Database - sandbox_kriswelsh_com
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `Messages` */

DROP TABLE IF EXISTS `Messages`;

CREATE TABLE `Messages` (
  `user_username` varchar(128) NOT NULL,
  `text` varchar(256) NOT NULL,
  `posted_at` datetime default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  KEY `userbane` (`user_username`),
  CONSTRAINT `userbane` FOREIGN KEY (`user_username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `Messages` */

insert  into `Messages`(`user_username`,`text`,`posted_at`,`id`) values ('kris','Lunch at the shard? Sounds like more of a dinner thing','2013-08-14 11:56:45',1),('paul','What about the IC then? That\'s the 5th Oct','2013-08-14 11:57:55',2),('ben','I don\'t want to stay at the IC though, would just be a daytrip','2013-08-14 12:04:34',3),('sam','Yummy yummy chineeeese. I want some more of that lamb','2013-08-14 13:44:16',4),('kris','I should probably post a second message to test the view properly','2013-08-14 14:22:56',5),('kris','This was posted with the web form','2013-08-14 15:51:48',9),('kris','...and so was this!','2013-08-14 15:53:08',10),('hannah','We\'ve lost another parcel. Oh well, insurance will cover it','2013-08-14 16:20:42',11),('kris','I should really try with a considerably longer message, just to see what it displays like. Probably badly.','2013-08-14 17:14:40',12),('paul','I really need a second message for paul, so I wrote one.','2013-08-14 17:23:37',13);

/*Table structure for table `User_Follows` */

DROP TABLE IF EXISTS `User_Follows`;

CREATE TABLE `User_Follows` (
  `follower_username` varchar(128) default NULL,
  `followed_username` varchar(128) default NULL,
  KEY `follower` (`follower_username`),
  KEY `followed` (`followed_username`),
  CONSTRAINT `follower` FOREIGN KEY (`follower_username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `followed` FOREIGN KEY (`followed_username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `User_Follows` */

insert  into `User_Follows`(`follower_username`,`followed_username`) values ('kris','ben'),('kris','paul'),('kris','sam'),('ben','paul'),('ben','kris'),('paul','ben'),('paul','kris'),('paul','keith'),('paul','hannah'),('hannah','paul'),('hannah','keith'),('keith','paul'),('keith','hannah'),('sam','kris');

/*Table structure for table `Users` */

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) default NULL,
  `avatar_url` varchar(256) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `Users` */

insert  into `Users`(`username`,`password`,`email`,`avatar_url`) values ('ben','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','ben@unspam.us',NULL),('hannah','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','hannah@unspam.us',NULL),('keith','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','keith@unspam.us',NULL),('kris','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','kris@unspam.us',NULL),('paul','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','paul@unspam.us',NULL),('sam','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','sam@unspam.us',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
# MySQL-Front 3.2  (Build 14.8)

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='SYSTEM' */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


# Host: localhost    Database: new
# ------------------------------------------------------
# Server version 5.0.27-community-nt

DROP DATABASE IF EXISTS `new`;
CREATE DATABASE `new` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `new`;

#
# Table structure for table photo
#

CREATE TABLE `photo` (
  `id` int(11) NOT NULL auto_increment,
  `filename` varchar(20) default NULL,
  `textname` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table photo
#

INSERT INTO `photo` VALUES (1,'20070130045240.jpg','描述描述描述描述描述描述');
INSERT INTO `photo` VALUES (2,'20070130052247.jpg','dfsdfsd');
INSERT INTO `photo` VALUES (3,'20070130055431.jpg','dsfsdfsdf');
INSERT INTO `photo` VALUES (4,'20070130055542.jpg','sdfsfsf');
INSERT INTO `photo` VALUES (5,'20070130060222.jpg','fsafasf');

#
# Table structure for table user
#

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `mail` varchar(60) default NULL,
  `xie` varchar(50) default NULL,
  `diz` varchar(100) default NULL,
  `number` int(6) default NULL,
  `power` int(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table user
#

INSERT INTO `user` VALUES (38,'admin','1981','forhao@126.com','天津','天津是潮阳胪20号',100026,NULL);
INSERT INTO `user` VALUES (39,'baidu','1981','baidu@126.com','上海','上海市潮阳胪30号',100026,NULL);
INSERT INTO `user` VALUES (40,'google','1981','baidu@126.com','上海','上海市潮阳胪30号',100026,NULL);
INSERT INTO `user` VALUES (41,'baigool','1981','baidu@126.com','上海','上海市潮阳胪30号',100026,NULL);

#
# Table structure for table work
#

CREATE TABLE `work` (
  `id` int(11) NOT NULL auto_increment,
  `number` varchar(16) NOT NULL default '',
  `name` varchar(8) NOT NULL default '',
  `sex` varchar(4) NOT NULL default '',
  `wenhua` varchar(8) NOT NULL default '',
  `home` text NOT NULL,
  `ph` varchar(8) NOT NULL default '',
  `postion` varchar(8) NOT NULL default '',
  `dataa` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `number` (`number`),
  KEY `number_2` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table work
#


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

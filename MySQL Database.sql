CREATE DATABASE  IF NOT EXISTS `random_database`;
USE `random_database`;
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageContent` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
LOCK TABLES `pages` WRITE;
INSERT INTO `pages` VALUES (1,'Home','Welcome to homepage '),(2,'About','Welcome to about page ');
UNLOCK TABLES;

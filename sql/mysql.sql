-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ccpanel_db
DROP DATABASE IF EXISTS `ccpanel_db`;
CREATE DATABASE IF NOT EXISTS `ccpanel_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `ccpanel_db`;


-- Dumping structure for table ccpanel_db.ccp_users
DROP TABLE IF EXISTS `ccp_users`;
CREATE TABLE IF NOT EXISTS `ccp_users` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `addedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table ccpanel_db.ccp_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `ccp_users` DISABLE KEYS */;
REPLACE INTO `ccp_users` (`userID`, `username`, `password`, `email`, `addedDate`) VALUES
	(1, 'admin', '$2y$12$.UbcZmFBEXWtmI2T5ayDGOsh80FsOim8wWb5jBKzZNW0yPl8qsbFm', 'admin@ccpanel.com', '2015-02-10 22:06:49'),
	(2, 'user', '$2y$12$MyuxdVAIoZrFMtRVjezdCu.JTMayQtexIsFsBrDWLiQj4v2Mw4jeW', 'user@ccpanel.com', '2015-02-10 22:06:57');
/*!40000 ALTER TABLE `ccp_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

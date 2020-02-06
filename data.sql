-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ccpanel_db.cc_langs
CREATE TABLE IF NOT EXISTS `cc_langs` (
  `langID` int(11) NOT NULL AUTO_INCREMENT,
  `langTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `langCode` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`langID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table ccpanel_db.cc_langs: ~0 rows (approximately)
/*!40000 ALTER TABLE `cc_langs` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_langs` ENABLE KEYS */;

-- Dumping structure for table ccpanel_db.cc_members
CREATE TABLE IF NOT EXISTS `cc_members` (
  `memberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `addedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table ccpanel_db.cc_members: ~0 rows (approximately)
/*!40000 ALTER TABLE `cc_members` DISABLE KEYS */;
INSERT INTO `cc_members` (`memberID`, `username`, `password`, `email`, `addedDate`) VALUES
	(1, 'admin', '$2y$12$Si1kl6wWwSx8Hso54TczzeMURnKz0nWtArinmCLnyv1R3SJuGaf6.', 'admin@taner.web.tr', '2014-12-08 20:07:19');
/*!40000 ALTER TABLE `cc_members` ENABLE KEYS */;

-- Dumping structure for table ccpanel_db.cc_menus
CREATE TABLE IF NOT EXISTS `cc_menus` (
  `menuID` int(11) NOT NULL AUTO_INCREMENT,
  `menuTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuPID` int(11) DEFAULT NULL,
  `menuType` smallint(6) DEFAULT NULL,
  `menuImg` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuLink` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuDesc` text COLLATE utf8_turkish_ci,
  PRIMARY KEY (`menuID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table ccpanel_db.cc_menus: ~4 rows (approximately)
/*!40000 ALTER TABLE `cc_menus` DISABLE KEYS */;
INSERT INTO `cc_menus` (`menuID`, `menuTitle`, `menuPID`, `menuType`, `menuImg`, `menuLink`, `menuDesc`) VALUES
	(1, 'Home', NULL, NULL, NULL, '/', NULL),
	(2, 'About', NULL, NULL, NULL, 'about', NULL),
	(3, 'Posts', NULL, NULL, NULL, '/', NULL),
	(4, 'Contact', NULL, NULL, NULL, 'contact', NULL);
/*!40000 ALTER TABLE `cc_menus` ENABLE KEYS */;

-- Dumping structure for table ccpanel_db.cc_pages
CREATE TABLE IF NOT EXISTS `cc_pages` (
  `pageID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `pageSlug` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `pageDesc` text COLLATE utf8_turkish_ci,
  `pageCont` text COLLATE utf8_turkish_ci,
  `pageImg` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table ccpanel_db.cc_pages: ~2 rows (approximately)
/*!40000 ALTER TABLE `cc_pages` DISABLE KEYS */;
INSERT INTO `cc_pages` (`pageID`, `pageTitle`, `pageSlug`, `pageDesc`, `pageCont`, `pageImg`) VALUES
	(2, 'About', 'about', 'About Us<br>', 'About content<br>', NULL),
	(3, 'Contact', 'contact', 'asdf<br>', 'asdf<br>', NULL);
/*!40000 ALTER TABLE `cc_pages` ENABLE KEYS */;

-- Dumping structure for table ccpanel_db.cc_posts
CREATE TABLE IF NOT EXISTS `cc_posts` (
  `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postSlug` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postDesc` text COLLATE utf8_turkish_ci,
  `postCont` text COLLATE utf8_turkish_ci,
  `postImg` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `catID` int(11) DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table ccpanel_db.cc_posts: ~2 rows (approximately)
/*!40000 ALTER TABLE `cc_posts` DISABLE KEYS */;
INSERT INTO `cc_posts` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postImg`, `postDate`, `catID`) VALUES
	(1, 'Temp post', 'temp-post', 'My desc', 'My content', 'images/vlcsnap-2020-01-09-21h54m38s815.png', '2014-12-09 20:32:44', 1),
	(5, 'Another Sample Post', 'another-sample-post', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'images/facebooksmall.jpg', '2014-12-10 20:32:19', 1),
	(6, 'Latest News', 'latest-news', ' It has survived not only five centuries, but also the leap', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'images/Vesikalik.jpg', '2014-12-10 20:33:05', 1),
	(7, 'asdf', 'asdf', 'asdf<br>', 'asdf<br>', NULL, '2020-01-28 00:44:35', 2);
/*!40000 ALTER TABLE `cc_posts` ENABLE KEYS */;

-- Dumping structure for table ccpanel_db.cc_post_cats
CREATE TABLE IF NOT EXISTS `cc_post_cats` (
  `catID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `catSlug` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ccpanel_db.cc_post_cats: ~2 rows (approximately)
/*!40000 ALTER TABLE `cc_post_cats` DISABLE KEYS */;
INSERT INTO `cc_post_cats` (`catID`, `catTitle`, `catSlug`) VALUES
	(1, 'General', 'general'),
	(2, 'Demo', 'demo');
/*!40000 ALTER TABLE `cc_post_cats` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

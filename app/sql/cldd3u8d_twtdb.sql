-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 30.30.30.3
-- Generation Time: Oct 24, 2015 at 07:25 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cldd3u8d_twtdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dc_langs`
--

CREATE TABLE IF NOT EXISTS `dc_langs` (
  `langID` int(11) NOT NULL AUTO_INCREMENT,
  `langTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `langCode` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`langID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dc_lang_menus`
--

CREATE TABLE IF NOT EXISTS `dc_lang_menus` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `menuID` int(11) NOT NULL DEFAULT '0',
  `langID` int(11) NOT NULL DEFAULT '0',
  `menuTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuDesc` text COLLATE utf8_turkish_ci,
  PRIMARY KEY (`rowID`),
  KEY `Key_menuID` (`menuID`),
  KEY `Key_langID` (`langID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dc_members`
--

CREATE TABLE IF NOT EXISTS `dc_members` (
  `memberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `addedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dc_members`
--

INSERT INTO `dc_members` (`memberID`, `username`, `password`, `email`, `addedDate`) VALUES
(1, 'admin', '$2y$12$Si1kl6wWwSx8Hso54TczzeMURnKz0nWtArinmCLnyv1R3SJuGaf6.', 'admin@websitesablon.com', '2014-12-08 17:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `dc_menus`
--

CREATE TABLE IF NOT EXISTS `dc_menus` (
  `menuID` int(11) NOT NULL AUTO_INCREMENT,
  `menuTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuPID` int(11) DEFAULT NULL,
  `menuType` smallint(6) DEFAULT NULL,
  `menuImg` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuDesc` text COLLATE utf8_turkish_ci,
  PRIMARY KEY (`menuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dc_menus`
--

INSERT INTO `dc_menus` (`menuID`, `menuTitle`, `menuPID`, `menuType`, `menuImg`, `menuDesc`) VALUES
(1, 'Menu1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_posts`
--

CREATE TABLE IF NOT EXISTS `dc_posts` (
  `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postSlug` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postDesc` text COLLATE utf8_turkish_ci,
  `postCont` text COLLATE utf8_turkish_ci,
  `postImg` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `catID` int(11) DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dc_posts`
--

INSERT INTO `dc_posts` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postImg`, `postDate`, `catID`) VALUES
(1, 'Temp post', 'temp-post', 'My desc', 'My content', 'images/facebook.jpg', '2014-12-09 17:32:44', 1),
(5, 'Another Sample Post', 'another-sample-post', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'images/facebooksmall.jpg', '2014-12-10 17:32:19', 1),
(6, 'Latest News', 'latest-news', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'images/20150914_215227.jpg', '2014-12-10 17:33:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_post_cats`
--

CREATE TABLE IF NOT EXISTS `dc_post_cats` (
  `catID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `catSlug` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dc_post_cats`
--

INSERT INTO `dc_post_cats` (`catID`, `catTitle`, `catSlug`) VALUES
(1, 'General', 'general'),
(2, 'Demo', 'demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

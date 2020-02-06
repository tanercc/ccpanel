-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2020 at 01:13 PM
-- Server version: 5.6.41
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpotaner_ccpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc_langs`
--

CREATE TABLE `cc_langs` (
  `langID` int(11) NOT NULL,
  `langTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `langCode` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cc_lang_menus`
--

CREATE TABLE `cc_lang_menus` (
  `rowID` int(11) NOT NULL,
  `menuID` int(11) NOT NULL DEFAULT '0',
  `langID` int(11) NOT NULL DEFAULT '0',
  `menuTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuDesc` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cc_members`
--

CREATE TABLE `cc_members` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `addedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `cc_members`
--

INSERT INTO `cc_members` (`memberID`, `username`, `password`, `email`, `addedDate`) VALUES
(1, 'admin', '$2y$12$Si1kl6wWwSx8Hso54TczzeMURnKz0nWtArinmCLnyv1R3SJuGaf6.', 'admin@taner.web.tr', '2014-12-08 17:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `cc_menus`
--

CREATE TABLE `cc_menus` (
  `menuID` int(11) NOT NULL,
  `menuTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuPID` int(11) DEFAULT NULL,
  `menuType` smallint(6) DEFAULT NULL,
  `menuImg` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuDesc` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `cc_menus`
--

INSERT INTO `cc_menus` (`menuID`, `menuTitle`, `menuPID`, `menuType`, `menuImg`, `menuDesc`) VALUES
(1, 'Menu1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cc_posts`
--

CREATE TABLE `cc_posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postSlug` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postDesc` text COLLATE utf8_turkish_ci,
  `postCont` text COLLATE utf8_turkish_ci,
  `postImg` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `catID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `cc_posts`
--

INSERT INTO `cc_posts` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postImg`, `postDate`, `catID`) VALUES
(1, 'Temp post', 'temp-post', 'My desc', 'My content', 'images/facebook.jpg', '2014-12-09 17:32:44', 1),
(5, 'Another Sample Post', 'another-sample-post', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'images/facebooksmall.jpg', '2014-12-10 17:32:19', 1),
(6, 'Latest News', 'latest-news', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'images/20150914_215227.jpg', '2014-12-10 17:33:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cc_post_cats`
--

CREATE TABLE `cc_post_cats` (
  `catID` int(11) UNSIGNED NOT NULL,
  `catTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `catSlug` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cc_post_cats`
--

INSERT INTO `cc_post_cats` (`catID`, `catTitle`, `catSlug`) VALUES
(1, 'General', 'general'),
(2, 'Demo', 'demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_langs`
--
ALTER TABLE `cc_langs`
  ADD PRIMARY KEY (`langID`);

--
-- Indexes for table `cc_lang_menus`
--
ALTER TABLE `cc_lang_menus`
  ADD PRIMARY KEY (`rowID`),
  ADD KEY `Key_menuID` (`menuID`),
  ADD KEY `Key_langID` (`langID`);

--
-- Indexes for table `cc_members`
--
ALTER TABLE `cc_members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `cc_menus`
--
ALTER TABLE `cc_menus`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `cc_posts`
--
ALTER TABLE `cc_posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `cc_post_cats`
--
ALTER TABLE `cc_post_cats`
  ADD PRIMARY KEY (`catID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_langs`
--
ALTER TABLE `cc_langs`
  MODIFY `langID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cc_lang_menus`
--
ALTER TABLE `cc_lang_menus`
  MODIFY `rowID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cc_members`
--
ALTER TABLE `cc_members`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cc_menus`
--
ALTER TABLE `cc_menus`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cc_posts`
--
ALTER TABLE `cc_posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cc_post_cats`
--
ALTER TABLE `cc_post_cats`
  MODIFY `catID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

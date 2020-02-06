CREATE TABLE IF NOT EXISTS `dc_lang_menus` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `menuID` int(11) NOT NULL DEFAULT '0',
  `langID` int(11) NOT NULL DEFAULT '0',
  `menuTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `menuDesc` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  PRIMARY KEY (`rowID`),
  KEY `Key_menuID` (`menuID`),
  KEY `Key_langID` (`langID`)
) ENGINE=InnoDB;
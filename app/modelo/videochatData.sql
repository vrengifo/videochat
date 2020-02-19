# MySQL-Front 3.2  (Build 4.4)

# Host: localhost    Database: videochat
# ------------------------------------------------------
# Server version 4.0.13-nt

CREATE DATABASE `videochat`;

USE `videochat`;

#
# Table Objects for table authrequestxuser
#

CREATE TABLE `authrequestxuser` (
  `FROMUSER_ID` varchar(20) NOT NULL default '',
  `TOUSER_ID` varchar(20) NOT NULL default '',
  `AUTREQUSER_COMMENT` blob,
  `AUTREQUSER_DATE` datetime default NULL,
  PRIMARY KEY  (`FROMUSER_ID`,`TOUSER_ID`)
) TYPE=MyISAM;

#
# Dumping data for table authrequestxuser
#


#
# Table Objects for table billxuser
#

CREATE TABLE `billxuser` (
  `BILLUSER_ID` int(11) unsigned NOT NULL auto_increment,
  `USER_ID` varchar(20) NOT NULL default '',
  `CC_ID` int(2) unsigned NOT NULL default '0',
  `BILLUSER_HOLDERNAME` varchar(200) default NULL,
  `BILLUSER_NUMBER` varchar(50) default NULL,
  `BILLUSER_EXPMONTH` char(2) NOT NULL default '00',
  `BILLUSER_EXPYEAR` int(5) unsigned default NULL,
  `BILLUSER_ADDRESS` varchar(250) default NULL,
  PRIMARY KEY  (`BILLUSER_ID`)
) TYPE=MyISAM;

#
# Dumping data for table billxuser
#

INSERT INTO `billxuser` (`BILLUSER_ID`,`USER_ID`,`CC_ID`,`BILLUSER_HOLDERNAME`,`BILLUSER_NUMBER`,`BILLUSER_EXPMONTH`,`BILLUSER_EXPYEAR`,`BILLUSER_ADDRESS`) VALUES (2,'v',3,'V','1212202032324040','01',2007,'v dir');
INSERT INTO `billxuser` (`BILLUSER_ID`,`USER_ID`,`CC_ID`,`BILLUSER_HOLDERNAME`,`BILLUSER_NUMBER`,`BILLUSER_EXPMONTH`,`BILLUSER_EXPYEAR`,`BILLUSER_ADDRESS`) VALUES (3,'v',1,'Victor','2020121242420505','03',2006,'Direccion');
INSERT INTO `billxuser` (`BILLUSER_ID`,`USER_ID`,`CC_ID`,`BILLUSER_HOLDERNAME`,`BILLUSER_NUMBER`,`BILLUSER_EXPMONTH`,`BILLUSER_EXPYEAR`,`BILLUSER_ADDRESS`) VALUES (4,'uno',2,'Uno','2020121220201212','05',2007,'-');

#
# Table Objects for table contactxuser
#

CREATE TABLE `contactxuser` (
  `USER_ID` varchar(20) NOT NULL default '',
  `CONTACT_ID` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`USER_ID`,`CONTACT_ID`)
) TYPE=MyISAM;

#
# Dumping data for table contactxuser
#

INSERT INTO `contactxuser` (`USER_ID`,`CONTACT_ID`) VALUES ('uno','v');

#
# Table Objects for table country
#

CREATE TABLE `country` (
  `COU_ID` int(6) unsigned NOT NULL auto_increment,
  `COU_NAME` varchar(200) default NULL,
  PRIMARY KEY  (`COU_ID`)
) TYPE=MyISAM;

#
# Dumping data for table country
#

INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (4,'Afghanistan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (8,'Albania');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (10,'Antarctica');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (12,'Algeria');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (16,'American Samoa');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (20,'Andorra');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (24,'Angola');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (28,'Antigua and Barbuda');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (31,'Azerbaijan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (32,'Argentina');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (36,'Australia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (40,'Austria');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (44,'Bahamas');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (48,'Bahrain');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (50,'Bangladesh');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (51,'Armenia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (52,'Barbados');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (56,'Belgium');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (60,'Bermuda');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (64,'Bhutan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (68,'Bolivia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (70,'Bosnia and Herzegovina');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (72,'Botswana');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (76,'Brazil');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (84,'Belize');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (86,'British Indian Ocean Territory');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (90,'Solomon Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (92,'GB Virgin  Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (96,'Brunei Darussalam');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (100,'Bulgary');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (104,'Myanmar');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (108,'Burundi');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (112,'Belarus');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (116,'Cambodia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (120,'Cameroon');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (124,'Canada');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (132,'Cape Verde Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (136,'Cayman Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (140,'Central African Republic');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (144,'Sri Lanka');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (148,'Chad');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (152,'Chile');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (156,'China');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (158,'Taiwan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (162,'Christmas Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (166,'Cocos (Keeling) Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (170,'Colombia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (174,'Comoros');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (175,'Mayotte Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (178,'Congo');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (180,'Zaire');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (184,'Cook Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (188,'Costa Rica');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (191,'Croatia (local name: Hrvatska)');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (192,'Cuba');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (196,'Cyprus');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (203,'Czech Republic');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (204,'Benin');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (208,'Denmark');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (212,'Dominica');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (214,'Dominican Republic');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (218,'Ecuador');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (222,'El Salvador');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (226,'Equatorial Guinea');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (231,'Ethiopia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (232,'Eritrea');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (233,'Estonia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (234,'Faroe Island (Malvinas)');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (238,'Falkland Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (242,'Fiji Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (246,'Finland');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (250,'France');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (254,'French Guiana');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (258,'French Polynesia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (260,'French Southern Territories');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (262,'Djibouti');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (266,'Gabon Republic');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (268,'Georgia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (270,'Gambia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (276,'Germany');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (288,'Ghana');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (292,'Gibraltar');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (296,'Kiribati');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (300,'Greece');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (304,'Greenland');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (308,'Grenada');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (312,'Guadaloupe');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (316,'Guam');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (320,'Guatemala');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (324,'Guinea');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (328,'Guyana');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (332,'Haiti');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (334,'Heard and McDonald Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (336,'Vatican City');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (340,'Honduras');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (344,'Hong Kong');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (348,'Hungary');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (352,'Iceland');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (356,'India');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (360,'Indonesia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (364,'Iran');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (368,'Iraq');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (372,'Ireland');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (376,'Israel');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (380,'Italy');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (384,'Ivory Coast');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (388,'Jamaica');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (392,'Japan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (398,'Kazakhstan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (400,'Jordan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (404,'Kenya');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (408,'Korea ( North Korea )');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (410,'Korea (South Korea)');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (414,'Kuwait');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (417,'Kyrgystan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (418,'Laos');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (422,'Lebanon');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (426,'Lesotho');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (428,'Latvia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (430,'Liberia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (434,'Libya');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (438,'Liechtenstein');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (440,'Lithuania');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (442,'Luxembourg');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (446,'Macau');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (450,'Madagascar');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (454,'Malawi');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (458,'Malaysia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (462,'Maldives');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (466,'Mali');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (470,'Malta');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (474,'Martinique');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (478,'Mauritania');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (480,'Mauritius');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (484,'Mexico');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (492,'Monaco');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (496,'Mongolia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (498,'Moldova');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (500,'Montserrat');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (504,'Morocco');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (508,'Mozambique');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (512,'Oman');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (516,'Namibia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (520,'Nauru');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (524,'Nepal');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (528,'Netherlands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (530,'Netherlands   Antill');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (533,'Aruba');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (540,'New Caledonia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (548,'Vanuatu Republic');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (554,'New Zealand');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (558,'Nicaragua');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (562,'Niger');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (566,'Nigeria');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (570,'Niue');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (574,'Norfolk Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (578,'Norway');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (580,'Mariana Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (583,'Micronesia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (584,'Marshall Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (585,'Palau');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (586,'Pakistan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (591,'Panama');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (598,'New Guinea');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (600,'Paraguay');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (604,'Peru');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (608,'Philippines');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (612,'Picairn');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (616,'Poland');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (620,'Portugal');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (624,'Guinea-Bissau');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (626,'East Timor');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (630,'Puerto Rico');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (634,'Qatar');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (638,'Reunion Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (642,'Romania');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (643,'Russian Federation');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (646,'Rwanda');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (654,'St. Helena');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (659,'Sanit Kidds and Nevis');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (660,'Anguilla');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (662,'Saint Lucia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (666,'Localic');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (670,'Saint Vincent and Granadina');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (674,'San Marino');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (678,'Sao Tome');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (682,'Saudi Arabia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (686,'Senegal');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (690,'Seychelles Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (694,'Sierra Leone');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (702,'Singapore');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (703,'Slovakia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (704,'Vietnam');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (705,'Slovenia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (706,'Somalia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (710,'South Africa');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (716,'Zimbabwe');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (724,'Spain');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (736,'Sudan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (740,'Suriname');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (748,'Swaziland');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (752,'Sweden');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (756,'Switzerland');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (760,'Syria');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (762,'Tajikstan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (764,'Thailand');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (768,'Togo');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (772,'Tokelau');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (776,'Tonga Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (780,'Trinidad &Tobago');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (784,'United Arab Emirates');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (788,'Tunisia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (792,'Turkey');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (795,'Turkmenistan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (796,'Turks & Caicos');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (798,'Tuvalu');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (800,'Uganda');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (804,'Ukraine');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (807,'Macedonia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (818,'Egypt');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (826,'England');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (834,'Tanzania');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (840,'USA');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (850,'US Virign  Islands');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (854,'Burkina Faso');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (858,'Uruguay');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (860,'Uzbekistan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (862,'Venezuela');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (876,'Wallis & Futuna');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (882,'Western Samoa');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (887,'Yemen');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (891,'Yugoslavia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (894,'Zambia');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (901,'Ascension Island');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (902,'Atlantic Ocean');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (903,'Atlantic West');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (904,'Guantanamo Bay');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (905,'Indian Ocean');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (907,'Pacific Ocean');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (908,'Saipan');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (909,'Diego García');
INSERT INTO `country` (`COU_ID`,`COU_NAME`) VALUES (957,'Argentum');

#
# Table Objects for table creditcard
#

CREATE TABLE `creditcard` (
  `CC_ID` int(2) unsigned NOT NULL auto_increment,
  `CC_NAME` varchar(100) default NULL,
  PRIMARY KEY  (`CC_ID`)
) TYPE=MyISAM;

#
# Dumping data for table creditcard
#

INSERT INTO `creditcard` (`CC_ID`,`CC_NAME`) VALUES (1,'Mastercard');
INSERT INTO `creditcard` (`CC_ID`,`CC_NAME`) VALUES (2,'American Express');
INSERT INTO `creditcard` (`CC_ID`,`CC_NAME`) VALUES (3,'Visa');
INSERT INTO `creditcard` (`CC_ID`,`CC_NAME`) VALUES (4,'Discovery');

#
# Table Objects for table faq
#

CREATE TABLE `faq` (
  `FAQ_ID` int(6) unsigned NOT NULL auto_increment,
  `FAQ_QUESTION` blob,
  `FAQ_ANSWER` blob,
  PRIMARY KEY  (`FAQ_ID`)
) TYPE=MyISAM;

#
# Dumping data for table faq
#

INSERT INTO `faq` (`FAQ_ID`,`FAQ_QUESTION`,`FAQ_ANSWER`) VALUES (1,'Pregunta 1\r\n','respuesta 1');

#
# Table Objects for table plan
#

CREATE TABLE `plan` (
  `PLAN_ID` int(3) unsigned NOT NULL auto_increment,
  `PLAN_NAME` varchar(100) default NULL,
  `PLAN_COST` decimal(10,2) default NULL,
  `PLAN_DURATION` int(3) unsigned default NULL,
  `PLAN_NBOXES` int(3) NOT NULL default '0',
  PRIMARY KEY  (`PLAN_ID`)
) TYPE=MyISAM;

#
# Dumping data for table plan
#

INSERT INTO `plan` (`PLAN_ID`,`PLAN_NAME`,`PLAN_COST`,`PLAN_DURATION`,`PLAN_NBOXES`) VALUES (1,'Text Chat',0,0,0);
INSERT INTO `plan` (`PLAN_ID`,`PLAN_NAME`,`PLAN_COST`,`PLAN_DURATION`,`PLAN_NBOXES`) VALUES (2,'2 Video Boxes',0,30,2);
INSERT INTO `plan` (`PLAN_ID`,`PLAN_NAME`,`PLAN_COST`,`PLAN_DURATION`,`PLAN_NBOXES`) VALUES (3,'5 Video Boxes',0,30,5);
INSERT INTO `plan` (`PLAN_ID`,`PLAN_NAME`,`PLAN_COST`,`PLAN_DURATION`,`PLAN_NBOXES`) VALUES (4,'10 Video Boxes',0,30,10);

#
# Table Objects for table status
#

CREATE TABLE `status` (
  `STA_ID` int(3) unsigned NOT NULL auto_increment,
  `STA_NAME` varchar(100) default NULL,
  `STA_ICON` varchar(250) default NULL,
  PRIMARY KEY  (`STA_ID`)
) TYPE=MyISAM;

#
# Dumping data for table status
#

INSERT INTO `status` (`STA_ID`,`STA_NAME`,`STA_ICON`) VALUES (1,'Online','images/icon_online.gif');
INSERT INTO `status` (`STA_ID`,`STA_NAME`,`STA_ICON`) VALUES (2,'Offline','images/icon_offline.gif');
INSERT INTO `status` (`STA_ID`,`STA_NAME`,`STA_ICON`) VALUES (3,'Waiting','images/icon_waiting.gif');
INSERT INTO `status` (`STA_ID`,`STA_NAME`,`STA_ICON`) VALUES (4,'Blocked','images/icon_blocked.gif');

#
# Table Objects for table statusxuser
#

CREATE TABLE `statusxuser` (
  `USER_ID` varchar(20) NOT NULL default '',
  `STA_ID` int(3) unsigned NOT NULL default '0',
  `STAXUSER_DATE` datetime default NULL,
  PRIMARY KEY  (`USER_ID`,`STA_ID`)
) TYPE=MyISAM;

#
# Dumping data for table statusxuser
#


#
# Table Objects for table user
#

CREATE TABLE `user` (
  `USER_ID` varchar(20) NOT NULL default '',
  `USER_PASSWORD` varchar(20) default NULL,
  `USER_NAME` varchar(200) default NULL,
  `USER_NICKNAME` varchar(100) default NULL,
  `SEX_ID` varchar(10) default NULL,
  `USER_AGE` int(3) unsigned default NULL,
  `MARSTA_ID` varchar(10) default NULL,
  `COU_ID` int(6) unsigned NOT NULL default '0',
  `USER_STATE` varchar(200) default NULL,
  `USER_CITY` varchar(200) default NULL,
  `USER_EMAIL` varchar(200) default NULL,
  `USER_PHOTO` varchar(250) default NULL,
  `USER_PUBLIC` char(1) default NULL,
  `PLAN_ID` int(3) unsigned default NULL,
  `USER_DATE` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`USER_ID`)
) TYPE=MyISAM;

#
# Dumping data for table user
#

INSERT INTO `user` (`USER_ID`,`USER_PASSWORD`,`USER_NAME`,`USER_NICKNAME`,`SEX_ID`,`USER_AGE`,`MARSTA_ID`,`COU_ID`,`USER_STATE`,`USER_CITY`,`USER_EMAIL`,`USER_PHOTO`,`USER_PUBLIC`,`PLAN_ID`,`USER_DATE`) VALUES ('uno','uno','Uno','uno','M',24,'S',218,'Guayas','Guayaquil','uno@uno.com','photouser/uno.bmp','1',4,'2005-11-08');
INSERT INTO `user` (`USER_ID`,`USER_PASSWORD`,`USER_NAME`,`USER_NICKNAME`,`SEX_ID`,`USER_AGE`,`MARSTA_ID`,`COU_ID`,`USER_STATE`,`USER_CITY`,`USER_EMAIL`,`USER_PHOTO`,`USER_PUBLIC`,`PLAN_ID`,`USER_DATE`) VALUES ('v','vvvv','Victor','VHRP','M',25,'C',218,'Pichincha','Quito','victor@vhrp.com','photouser/v.jpg','1',3,'2005-11-08');

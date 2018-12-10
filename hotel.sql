/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : hotel

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-06-26 10:25:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `ID_ACTIVITY` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_ACTIVITY` int(11) NOT NULL,
  `ID_STATE_ACTIVITY` int(11) NOT NULL,
  `NAME_ACTIVITY` char(50) NOT NULL,
  `DESCRIPTION_ACTIVITY` varchar(350) NOT NULL,
  `DATE_START_ACTIVITY` date NOT NULL,
  `TIME_START_ACTIVITY` time NOT NULL,
  `DATE_END_ACTIVITY` date NOT NULL,
  `TIME_END_ACTIVITY` time NOT NULL,
  `IMAGE_ACTIVITY` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_ACTIVITY`),
  KEY `FK_RELATIONSHIP_92` (`ID_TYPE_ACTIVITY`),
  KEY `FK_RELATIONSHIP_93` (`ID_STATE_ACTIVITY`),
  CONSTRAINT `FK_RELATIONSHIP_92` FOREIGN KEY (`ID_TYPE_ACTIVITY`) REFERENCES `type_activity` (`ID_TYPE_ACTIVITY`),
  CONSTRAINT `FK_RELATIONSHIP_93` FOREIGN KEY (`ID_STATE_ACTIVITY`) REFERENCES `state_activity` (`ID_STATE_ACTIVITY`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '3', '2', 'Matrimonio de juan con juana', 'recepcion de la boda en el auditorio. las entradas tienen un pase <br>', '2017-06-30', '09:30:00', '2017-06-30', '18:00:00', 'img/activity/20170618000142.jpg');
INSERT INTO `activity` VALUES ('2', '5', '2', 'Concierto de aeroesmith en el auditorio', 'presentacion del grupo aroesmit festejando su aniversario. buscar<br>entradas en recepcion<br>', '2017-07-04', '12:00:00', '2017-07-04', '22:30:00', 'img/activity/20170618000324.jpg');
INSERT INTO `activity` VALUES ('3', '4', '2', 'Recepcion de aÃ±o nuevo', 'se celebrara la llegada del aÃ±o nuevo<br>', '2017-08-06', '17:00:00', '2017-08-07', '04:00:00', 'img/activity/20170618001354.jpg');
INSERT INTO `activity` VALUES ('4', '4', '2', 'Navidad', 'Recepcion a la nohce buena<br>', '2017-12-24', '00:00:00', '2017-12-25', '00:00:00', 'img/activity/20170618000733.jpg');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `ID_ARTICLE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_ARTICLE` varchar(20) NOT NULL,
  `DESCRIPTION_ARTICLE` varchar(50) NOT NULL,
  `STATE_ARTICLE` decimal(1,0) NOT NULL,
  `UNIT_ARTICLE` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', 'Llaves de la habitac', 'Llaves de ingreso a l habitacion<br>', '1', '1');
INSERT INTO `article` VALUES ('2', 'Control remoto', 'Control de la televicion<br>', '1', '1');
INSERT INTO `article` VALUES ('3', 'Toallas', 'toallas', '1', '2');

-- ----------------------------
-- Table structure for article_consum
-- ----------------------------
DROP TABLE IF EXISTS `article_consum`;
CREATE TABLE `article_consum` (
  `ID_ARTICLE` int(11) NOT NULL,
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ID_STATE_ARTICLE` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`,`ID_CONSUME_SERVICE`),
  KEY `FK_RELATIONSHIP_105` (`ID_CONSUME_SERVICE`),
  KEY `FK_RELATIONSHIP_109` (`ID_STATE_ARTICLE`),
  CONSTRAINT `FK_RELATIONSHIP_102` FOREIGN KEY (`ID_ARTICLE`) REFERENCES `article` (`ID_ARTICLE`),
  CONSTRAINT `FK_RELATIONSHIP_105` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_109` FOREIGN KEY (`ID_STATE_ARTICLE`) REFERENCES `state_article` (`ID_STATE_ARTICLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_consum
-- ----------------------------
INSERT INTO `article_consum` VALUES ('1', '72', '1');
INSERT INTO `article_consum` VALUES ('1', '73', '1');
INSERT INTO `article_consum` VALUES ('1', '74', '1');
INSERT INTO `article_consum` VALUES ('1', '96', '1');
INSERT INTO `article_consum` VALUES ('2', '72', '1');
INSERT INTO `article_consum` VALUES ('2', '73', '1');
INSERT INTO `article_consum` VALUES ('2', '74', '1');
INSERT INTO `article_consum` VALUES ('2', '96', '1');
INSERT INTO `article_consum` VALUES ('3', '72', '1');
INSERT INTO `article_consum` VALUES ('3', '73', '1');
INSERT INTO `article_consum` VALUES ('3', '74', '1');
INSERT INTO `article_consum` VALUES ('1', '31', '2');
INSERT INTO `article_consum` VALUES ('1', '32', '2');
INSERT INTO `article_consum` VALUES ('1', '33', '2');
INSERT INTO `article_consum` VALUES ('1', '35', '2');
INSERT INTO `article_consum` VALUES ('1', '36', '2');
INSERT INTO `article_consum` VALUES ('1', '39', '2');
INSERT INTO `article_consum` VALUES ('1', '40', '2');
INSERT INTO `article_consum` VALUES ('1', '41', '2');
INSERT INTO `article_consum` VALUES ('1', '66', '2');
INSERT INTO `article_consum` VALUES ('1', '67', '2');
INSERT INTO `article_consum` VALUES ('1', '77', '2');
INSERT INTO `article_consum` VALUES ('1', '79', '2');
INSERT INTO `article_consum` VALUES ('1', '82', '2');
INSERT INTO `article_consum` VALUES ('1', '84', '2');
INSERT INTO `article_consum` VALUES ('1', '88', '2');
INSERT INTO `article_consum` VALUES ('1', '91', '2');
INSERT INTO `article_consum` VALUES ('1', '92', '2');
INSERT INTO `article_consum` VALUES ('1', '94', '2');
INSERT INTO `article_consum` VALUES ('1', '95', '2');
INSERT INTO `article_consum` VALUES ('1', '97', '2');
INSERT INTO `article_consum` VALUES ('1', '98', '2');
INSERT INTO `article_consum` VALUES ('1', '99', '2');
INSERT INTO `article_consum` VALUES ('1', '100', '2');
INSERT INTO `article_consum` VALUES ('1', '101', '2');
INSERT INTO `article_consum` VALUES ('1', '103', '2');
INSERT INTO `article_consum` VALUES ('2', '31', '2');
INSERT INTO `article_consum` VALUES ('2', '32', '2');
INSERT INTO `article_consum` VALUES ('2', '33', '2');
INSERT INTO `article_consum` VALUES ('2', '35', '2');
INSERT INTO `article_consum` VALUES ('2', '36', '2');
INSERT INTO `article_consum` VALUES ('2', '39', '2');
INSERT INTO `article_consum` VALUES ('2', '40', '2');
INSERT INTO `article_consum` VALUES ('2', '41', '2');
INSERT INTO `article_consum` VALUES ('2', '66', '2');
INSERT INTO `article_consum` VALUES ('2', '67', '2');
INSERT INTO `article_consum` VALUES ('2', '78', '2');
INSERT INTO `article_consum` VALUES ('2', '79', '2');
INSERT INTO `article_consum` VALUES ('2', '84', '2');
INSERT INTO `article_consum` VALUES ('2', '88', '2');
INSERT INTO `article_consum` VALUES ('2', '91', '2');
INSERT INTO `article_consum` VALUES ('2', '92', '2');
INSERT INTO `article_consum` VALUES ('2', '94', '2');
INSERT INTO `article_consum` VALUES ('2', '95', '2');
INSERT INTO `article_consum` VALUES ('2', '97', '2');
INSERT INTO `article_consum` VALUES ('2', '98', '2');
INSERT INTO `article_consum` VALUES ('2', '99', '2');
INSERT INTO `article_consum` VALUES ('2', '100', '2');
INSERT INTO `article_consum` VALUES ('2', '101', '2');
INSERT INTO `article_consum` VALUES ('2', '102', '2');
INSERT INTO `article_consum` VALUES ('2', '103', '2');
INSERT INTO `article_consum` VALUES ('3', '31', '2');
INSERT INTO `article_consum` VALUES ('3', '32', '2');
INSERT INTO `article_consum` VALUES ('3', '35', '2');
INSERT INTO `article_consum` VALUES ('3', '36', '2');
INSERT INTO `article_consum` VALUES ('3', '78', '2');
INSERT INTO `article_consum` VALUES ('3', '79', '2');
INSERT INTO `article_consum` VALUES ('3', '88', '2');
INSERT INTO `article_consum` VALUES ('3', '92', '2');
INSERT INTO `article_consum` VALUES ('3', '94', '2');
INSERT INTO `article_consum` VALUES ('3', '95', '2');
INSERT INTO `article_consum` VALUES ('3', '97', '2');
INSERT INTO `article_consum` VALUES ('3', '98', '2');
INSERT INTO `article_consum` VALUES ('3', '99', '2');
INSERT INTO `article_consum` VALUES ('3', '100', '2');
INSERT INTO `article_consum` VALUES ('3', '101', '2');

-- ----------------------------
-- Table structure for bill
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `ID_BILL` int(11) NOT NULL AUTO_INCREMENT,
  `CODE_BILL` varchar(50) NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `ID_PERSON_SENDER` int(11) NOT NULL,
  `ID_CHECK` int(11) NOT NULL,
  `CONSUME_BILL` float(8,2) NOT NULL,
  `DATE_BILL` date NOT NULL,
  `TIME_BILL` time NOT NULL,
  PRIMARY KEY (`ID_BILL`),
  KEY `FK_RELATIONSHIP_59` (`ID_PERSON`),
  KEY `FK_RELATIONSHIP_89` (`ID_CHECK`),
  KEY `FK_RELATIONSHIP_90` (`ID_PERSON_SENDER`),
  CONSTRAINT `FK_RELATIONSHIP_59` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_89` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`),
  CONSTRAINT `FK_RELATIONSHIP_90` FOREIGN KEY (`ID_PERSON_SENDER`) REFERENCES `person` (`ID_PERSON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bill
-- ----------------------------

-- ----------------------------
-- Table structure for card
-- ----------------------------
DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `ID_CARD` int(8) NOT NULL AUTO_INCREMENT,
  `ID_CHECK` int(11) NOT NULL,
  `NUMBER_CARD` varchar(25) NOT NULL,
  `ID_TYPE_CARD` int(11) NOT NULL,
  `MONTH_CARD` decimal(2,0) NOT NULL,
  `YEAR_CARD` decimal(4,0) NOT NULL,
  `CCV_CARD` decimal(3,0) NOT NULL,
  `VALID_CARD` tinyint(1) NOT NULL,
  `TYPE_MONEY_CARD` varchar(3) NOT NULL,
  `DEPOSIT_CARD` float(8,2) NOT NULL,
  PRIMARY KEY (`ID_CARD`),
  KEY `FK_RELATIONSHIP_86` (`ID_CHECK`),
  KEY `FK_RELATIONSHIP_87` (`ID_TYPE_CARD`),
  CONSTRAINT `FK_RELATIONSHIP_86` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`),
  CONSTRAINT `FK_RELATIONSHIP_87` FOREIGN KEY (`ID_TYPE_CARD`) REFERENCES `type_card` (`ID_TYPE_CARD`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of card
-- ----------------------------
INSERT INTO `card` VALUES ('27', '28', '13216545', '1', '1', '2016', '123', '0', '', '0.00');
INSERT INTO `card` VALUES ('28', '29', '43245346', '1', '2', '2015', '213', '0', '', '0.00');
INSERT INTO `card` VALUES ('29', '30', '4646546', '1', '1', '2015', '312', '0', '', '0.00');
INSERT INTO `card` VALUES ('30', '31', '', '1', '1', '2015', '0', '0', '', '0.00');
INSERT INTO `card` VALUES ('31', '32', '4656', '1', '1', '2016', '456', '0', '', '0.00');
INSERT INTO `card` VALUES ('32', '33', '', '1', '1', '2015', '0', '0', '', '100.00');
INSERT INTO `card` VALUES ('33', '34', '', '1', '1', '2015', '0', '0', '', '100.00');
INSERT INTO `card` VALUES ('34', '35', '354665564', '1', '1', '2016', '244', '0', '', '300.00');
INSERT INTO `card` VALUES ('36', '37', '34645654', '1', '2', '2016', '999', '-1', '', '100.00');
INSERT INTO `card` VALUES ('37', '38', '', '1', '1', '2015', '0', '0', '', '100.00');
INSERT INTO `card` VALUES ('38', '39', '44534685453', '1', '1', '2016', '358', '1', '', '100.00');
INSERT INTO `card` VALUES ('39', '40', '343546456', '1', '1', '2015', '999', '0', '', '100.00');
INSERT INTO `card` VALUES ('40', '41', '0', '1', '0', '0', '0', '0', '', '0.00');
INSERT INTO `card` VALUES ('41', '42', '54645', '1', '1', '2017', '534', '0', '', '0.00');
INSERT INTO `card` VALUES ('42', '43', '2345346', '1', '1', '2017', '999', '0', '', '0.00');
INSERT INTO `card` VALUES ('43', '44', '2138465', '1', '1', '2015', '999', '0', '', '0.00');
INSERT INTO `card` VALUES ('44', '45', '456465', '1', '1', '2015', '456', '0', '', '0.00');
INSERT INTO `card` VALUES ('45', '46', '46546456', '1', '1', '2017', '323', '0', '', '0.00');
INSERT INTO `card` VALUES ('46', '47', '456456465', '1', '1', '2017', '265', '0', '', '0.00');
INSERT INTO `card` VALUES ('47', '48', '546464', '1', '1', '2017', '999', '0', '', '0.00');
INSERT INTO `card` VALUES ('48', '49', '12365564', '1', '1', '2018', '153', '0', '', '0.00');
INSERT INTO `card` VALUES ('49', '50', '4665435465', '1', '1', '2018', '999', '0', '', '0.00');
INSERT INTO `card` VALUES ('50', '51', '45687456', '1', '1', '2018', '565', '0', '', '180.00');
INSERT INTO `card` VALUES ('51', '52', '4654645', '1', '1', '2018', '999', '0', '', '0.00');

-- ----------------------------
-- Table structure for check_person
-- ----------------------------
DROP TABLE IF EXISTS `check_person`;
CREATE TABLE `check_person` (
  `ID_CHECK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSON_TITULAR` int(11) NOT NULL,
  `ID_PERSON_RECEPTION` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_STATE_CHECK` int(11) NOT NULL,
  `DATE_START_CHECK` date NOT NULL,
  `TIME_START_CHECK` time NOT NULL,
  `DATE_END_CHECK` date NOT NULL,
  `TIME_END_CHECK` time NOT NULL,
  `OBSERVATIONS_CHECK` varchar(500) NOT NULL,
  `ID_TYPE_CHECK` int(11) NOT NULL,
  `DATE_CREATED_CHECK` date NOT NULL,
  `TIME_CREATED_CHECK` time NOT NULL,
  `DATE_UPDATE_CHECK` date NOT NULL,
  `TIME_UPDATE_CHECK` time NOT NULL,
  PRIMARY KEY (`ID_CHECK`),
  KEY `FK_RELATIONSHIP_100` (`ID_PERSON_TITULAR`),
  KEY `FK_RELATIONSHIP_110` (`ID_HOTEL`),
  KEY `FK_RELATIONSHIP_123` (`ID_PERSON_RECEPTION`),
  KEY `FK_RELATIONSHIP_85` (`ID_STATE_CHECK`),
  KEY `FK_RELATIONSHIP_88` (`ID_TYPE_CHECK`),
  CONSTRAINT `FK_RELATIONSHIP_100` FOREIGN KEY (`ID_PERSON_TITULAR`) REFERENCES `person` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_110` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  CONSTRAINT `FK_RELATIONSHIP_123` FOREIGN KEY (`ID_PERSON_RECEPTION`) REFERENCES `person` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_85` FOREIGN KEY (`ID_STATE_CHECK`) REFERENCES `state_check` (`ID_STATE_CHECK`),
  CONSTRAINT `FK_RELATIONSHIP_88` FOREIGN KEY (`ID_TYPE_CHECK`) REFERENCES `type_check` (`ID_TYPE_CHECK`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of check_person
-- ----------------------------
INSERT INTO `check_person` VALUES ('28', '3', '2', '1', '6', '2015-01-02', '06:00:00', '2015-01-03', '06:19:30', '', '3', '2015-01-01', '17:21:16', '2015-01-01', '17:21:16');
INSERT INTO `check_person` VALUES ('29', '40', '2', '1', '6', '2015-01-03', '06:00:00', '2015-01-04', '06:49:02', '', '3', '2015-01-02', '06:19:27', '2015-01-02', '06:19:27');
INSERT INTO `check_person` VALUES ('30', '39', '2', '1', '6', '2015-01-03', '06:00:00', '2015-01-04', '06:49:59', '', '3', '2015-01-02', '06:24:21', '2015-01-02', '06:24:21');
INSERT INTO `check_person` VALUES ('31', '39', '39', '1', '8', '2015-01-05', '06:00:00', '2015-01-08', '06:00:00', '', '1', '2015-01-02', '06:30:31', '2015-01-02', '08:27:15');
INSERT INTO `check_person` VALUES ('32', '39', '2', '1', '6', '2015-01-03', '06:00:00', '2015-01-04', '06:49:35', '', '3', '2015-01-02', '08:41:15', '2015-01-02', '08:41:15');
INSERT INTO `check_person` VALUES ('33', '41', '2', '1', '6', '2015-01-05', '06:00:00', '2015-01-06', '07:58:36', '', '3', '2015-01-04', '06:51:52', '2015-01-04', '06:51:52');
INSERT INTO `check_person` VALUES ('34', '3', '3', '1', '2', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '', '1', '2015-01-06', '08:04:04', '2015-01-06', '08:04:04');
INSERT INTO `check_person` VALUES ('35', '3', '2', '1', '6', '2015-01-07', '06:00:00', '2015-01-08', '08:36:09', '', '3', '2015-01-06', '08:20:12', '2015-01-06', '08:20:12');
INSERT INTO `check_person` VALUES ('37', '74', '1', '1', '6', '2015-01-09', '06:00:00', '2015-01-10', '06:15:22', '', '3', '2015-01-08', '00:34:08', '2015-01-08', '00:34:08');
INSERT INTO `check_person` VALUES ('38', '78', '1', '1', '2', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '', '1', '2015-01-10', '06:28:02', '2015-01-10', '06:28:02');
INSERT INTO `check_person` VALUES ('39', '81', '1', '1', '6', '2015-01-11', '06:00:00', '2015-01-12', '05:02:02', '', '3', '2015-01-10', '06:32:54', '2015-01-10', '06:32:54');
INSERT INTO `check_person` VALUES ('40', '84', '1', '1', '6', '2015-01-11', '06:00:00', '2015-01-12', '05:01:28', '', '3', '2015-01-10', '07:17:46', '2015-01-10', '07:17:46');
INSERT INTO `check_person` VALUES ('41', '91', '1', '1', '2', '2017-06-26', '04:21:18', '2017-06-27', '04:21:18', '', '2', '2017-06-26', '04:21:32', '2017-06-26', '04:21:32');
INSERT INTO `check_person` VALUES ('42', '3', '1', '1', '6', '2015-02-05', '04:22:32', '2015-02-26', '08:57:49', '', '3', '2015-02-05', '04:22:47', '2015-02-05', '04:22:47');
INSERT INTO `check_person` VALUES ('43', '97', '1', '1', '2', '2015-02-26', '09:30:00', '2015-03-05', '09:30:00', '', '2', '2015-02-26', '08:58:55', '2015-02-26', '08:58:55');
INSERT INTO `check_person` VALUES ('44', '100', '1', '1', '6', '2015-02-26', '09:30:00', '2015-03-05', '09:16:25', '', '3', '2015-02-26', '09:07:54', '2015-02-26', '09:07:54');
INSERT INTO `check_person` VALUES ('45', '103', '1', '1', '6', '2015-03-05', '09:16:29', '2015-03-06', '09:21:28', '', '3', '2015-03-05', '09:16:58', '2015-03-05', '09:16:58');
INSERT INTO `check_person` VALUES ('46', '106', '1', '1', '6', '2015-03-31', '09:22:11', '2015-04-15', '09:28:28', '', '3', '2015-03-31', '09:26:08', '2015-03-31', '09:26:08');
INSERT INTO `check_person` VALUES ('47', '109', '1', '1', '6', '2015-05-15', '09:28:48', '2015-06-18', '09:31:31', '', '3', '2015-05-15', '09:29:31', '2015-05-15', '09:29:31');
INSERT INTO `check_person` VALUES ('48', '3', '1', '1', '6', '2017-04-18', '09:37:22', '2017-04-19', '09:39:14', '', '3', '2017-04-18', '09:37:31', '2017-04-18', '09:37:31');
INSERT INTO `check_person` VALUES ('49', '114', '1', '1', '6', '2017-05-19', '10:00:37', '2017-05-20', '10:03:52', '', '3', '2017-05-19', '10:00:48', '2017-05-19', '10:00:48');
INSERT INTO `check_person` VALUES ('50', '119', '1', '1', '6', '2017-06-19', '10:04:29', '2017-06-20', '10:07:23', '', '3', '2017-06-19', '10:04:39', '2017-06-19', '10:04:39');
INSERT INTO `check_person` VALUES ('51', '122', '1', '1', '1', '2017-06-26', '08:00:00', '2017-06-28', '08:00:00', '', '2', '2017-06-20', '10:09:29', '2017-06-20', '10:09:29');
INSERT INTO `check_person` VALUES ('52', '3', '1', '1', '6', '2017-06-18', '10:17:38', '2017-06-19', '10:23:46', '', '3', '2017-06-18', '10:17:57', '2017-06-18', '10:17:57');

-- ----------------------------
-- Table structure for consume_food
-- ----------------------------
DROP TABLE IF EXISTS `consume_food`;
CREATE TABLE `consume_food` (
  `ID_CONSUME_FOOD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CHECK` int(11) NOT NULL,
  `ID_FOOD` int(11) NOT NULL,
  `ID_TYPE_MONEY` int(11) NOT NULL,
  `UNIT_COST_FOOD` decimal(3,0) NOT NULL,
  `PRICE_CONSUME_FOOD` float(8,2) NOT NULL,
  `PAY_CONSUME_FOOD` float(8,2) NOT NULL,
  `TIME_CONSUME_FOOD` time NOT NULL,
  `DATE_CONSUME_FOOD` date NOT NULL,
  `UNIT_CONSUME_FOOD` decimal(5,0) NOT NULL,
  `STATE_CONSUME_FOOD` decimal(1,0) NOT NULL,
  `SITE_CONSUME_FOOD` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_CONSUME_FOOD`,`ID_CHECK`),
  KEY `FK_RELATIONSHIP_106` (`ID_CHECK`),
  KEY `FK_RELATIONSHIP_98` (`ID_FOOD`,`ID_TYPE_MONEY`,`UNIT_COST_FOOD`),
  CONSTRAINT `FK_RELATIONSHIP_106` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`),
  CONSTRAINT `FK_RELATIONSHIP_98` FOREIGN KEY (`ID_FOOD`, `ID_TYPE_MONEY`, `UNIT_COST_FOOD`) REFERENCES `cost_food` (`ID_FOOD`, `ID_TYPE_MONEY`, `UNIT_COST_FOOD`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consume_food
-- ----------------------------
INSERT INTO `consume_food` VALUES ('1', '32', '5', '1', '1', '35.00', '0.00', '06:33:14', '2015-01-03', '1', '1', 'mesa-7');
INSERT INTO `consume_food` VALUES ('2', '32', '3', '1', '1', '40.00', '0.00', '06:33:14', '2015-01-03', '1', '1', 'mesa-7');
INSERT INTO `consume_food` VALUES ('3', '32', '10', '1', '1', '15.00', '0.00', '06:33:14', '2015-01-03', '1', '1', 'mesa-7');
INSERT INTO `consume_food` VALUES ('4', '32', '8', '1', '1', '25.00', '0.00', '06:33:14', '2015-01-03', '1', '1', 'mesa-7');
INSERT INTO `consume_food` VALUES ('5', '33', '5', '1', '1', '35.00', '0.00', '07:56:22', '2015-01-05', '4', '1', 'HabitaciÃ³n S5');
INSERT INTO `consume_food` VALUES ('6', '33', '3', '1', '1', '40.00', '0.00', '07:56:23', '2015-01-05', '1', '1', 'HabitaciÃ³n S5');
INSERT INTO `consume_food` VALUES ('7', '33', '10', '1', '1', '15.00', '0.00', '07:56:23', '2015-01-05', '1', '1', 'HabitaciÃ³n S5');
INSERT INTO `consume_food` VALUES ('8', '33', '8', '1', '1', '25.00', '0.00', '07:56:23', '2015-01-05', '1', '1', 'HabitaciÃ³n S5');
INSERT INTO `consume_food` VALUES ('9', '33', '6', '1', '1', '25.00', '0.00', '07:56:23', '2015-01-05', '1', '1', 'HabitaciÃ³n S5');
INSERT INTO `consume_food` VALUES ('10', '40', '1', '1', '1', '20.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('11', '40', '2', '1', '1', '20.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('12', '40', '5', '1', '1', '35.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('13', '40', '3', '1', '1', '40.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('14', '40', '10', '1', '1', '15.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('15', '40', '8', '1', '1', '25.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('16', '40', '6', '1', '1', '25.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('17', '40', '4', '1', '1', '50.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('18', '40', '9', '1', '1', '12.00', '0.00', '07:28:56', '2015-01-11', '1', '1', 'mesa-4');
INSERT INTO `consume_food` VALUES ('19', '42', '10', '1', '1', '15.00', '0.00', '04:29:27', '2015-02-05', '1', '1', 'mesa-15');
INSERT INTO `consume_food` VALUES ('20', '42', '8', '1', '1', '25.00', '0.00', '04:29:27', '2015-02-05', '1', '1', 'mesa-15');
INSERT INTO `consume_food` VALUES ('21', '44', '7', '1', '1', '15.00', '0.00', '09:15:54', '2015-02-26', '1', '1', 'mesa-16');
INSERT INTO `consume_food` VALUES ('22', '44', '5', '1', '1', '35.00', '0.00', '09:15:55', '2015-02-26', '1', '1', 'mesa-16');
INSERT INTO `consume_food` VALUES ('23', '44', '3', '1', '1', '40.00', '0.00', '09:15:55', '2015-02-26', '3', '1', 'mesa-16');
INSERT INTO `consume_food` VALUES ('24', '50', '1', '1', '1', '20.00', '0.00', '10:06:52', '2017-06-19', '1', '1', 'mesa-13');
INSERT INTO `consume_food` VALUES ('25', '50', '2', '1', '1', '20.00', '0.00', '10:06:53', '2017-06-19', '1', '1', 'mesa-13');
INSERT INTO `consume_food` VALUES ('26', '50', '9', '1', '1', '12.00', '0.00', '10:06:53', '2017-06-19', '1', '1', 'mesa-13');
INSERT INTO `consume_food` VALUES ('27', '50', '7', '1', '1', '15.00', '0.00', '10:06:53', '2017-06-19', '1', '1', 'mesa-13');
INSERT INTO `consume_food` VALUES ('28', '50', '5', '1', '1', '35.00', '0.00', '10:06:53', '2017-06-19', '1', '1', 'mesa-13');
INSERT INTO `consume_food` VALUES ('29', '50', '3', '1', '1', '40.00', '0.00', '10:06:53', '2017-06-19', '1', '1', 'mesa-13');
INSERT INTO `consume_food` VALUES ('30', '50', '4', '1', '1', '50.00', '0.00', '10:06:53', '2017-06-19', '7', '1', 'mesa-13');

-- ----------------------------
-- Table structure for consume_service
-- ----------------------------
DROP TABLE IF EXISTS `consume_service`;
CREATE TABLE `consume_service` (
  `ID_CONSUME_SERVICE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CHECK` int(11) NOT NULL,
  `ID_TYPE_CONSUME` int(11) NOT NULL,
  `ID_COST_SERVICE` int(11) NOT NULL,
  `DATE_START_CONSUME_SERVICE` date NOT NULL,
  `TIME_START_CONSUME_SERVICE` time NOT NULL,
  `DATE_END_CONSUME_SERVICE` date NOT NULL,
  `TIME_END_CONSUME_SERVICE` time NOT NULL,
  `PAY_CONSUME_SERVICE` float(8,2) NOT NULL,
  `PRICE_CONSUME_SERVICE` float(8,2) NOT NULL,
  `DETAIL_CONSUME_SERVICE` varchar(50) NOT NULL,
  `ACTIVE_CONSUME_SERVICE` tinyint(1) NOT NULL,
  `UNIT_CONSUME_SERVICE` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONSUME_SERVICE`),
  KEY `FK_RELATIONSHIP_108` (`ID_COST_SERVICE`),
  KEY `FK_RELATIONSHIP_111` (`ID_CHECK`),
  KEY `FK_RELATIONSHIP_84` (`ID_TYPE_CONSUME`),
  CONSTRAINT `FK_RELATIONSHIP_108` FOREIGN KEY (`ID_COST_SERVICE`) REFERENCES `cost_service` (`ID_COST_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_111` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`),
  CONSTRAINT `FK_RELATIONSHIP_84` FOREIGN KEY (`ID_TYPE_CONSUME`) REFERENCES `type_consume` (`ID_TYPE_CONSUME`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consume_service
-- ----------------------------
INSERT INTO `consume_service` VALUES ('31', '28', '3', '1', '2015-01-02', '06:00:00', '2015-01-03', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('32', '29', '3', '1', '2015-01-03', '06:00:00', '2015-01-04', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('33', '30', '3', '1', '2015-01-03', '06:00:00', '2015-01-04', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('34', '31', '3', '4', '2015-01-05', '06:00:00', '2015-01-08', '06:00:00', '0.00', '300.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('35', '32', '3', '2', '2015-01-03', '06:00:00', '2015-01-04', '06:00:00', '180.00', '180.00', 'Consumo habitacion', '0', '2');
INSERT INTO `consume_service` VALUES ('36', '32', '3', '2', '2015-01-03', '06:00:00', '2015-01-04', '06:00:00', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('37', '32', '3', '3', '2015-01-03', '06:33:25', '2015-01-03', '09:33:00', '15.00', '15.00', 'esto es un consumo<br>', '0', '1');
INSERT INTO `consume_service` VALUES ('38', '32', '3', '9', '2015-01-03', '06:46:32', '2015-01-03', '15:46:00', '40.00', '40.00', 'esto es un consumo<br>', '0', '1');
INSERT INTO `consume_service` VALUES ('39', '33', '3', '1', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('40', '33', '3', '1', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('41', '33', '3', '1', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('42', '33', '3', '1', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('43', '33', '3', '1', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('44', '33', '3', '1', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('45', '33', '3', '2', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('46', '33', '3', '2', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('47', '33', '3', '2', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('48', '33', '3', '2', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('49', '33', '3', '2', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('50', '33', '3', '4', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '300.00', '300.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('51', '33', '3', '4', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '300.00', '300.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('52', '33', '3', '5', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '500.00', '500.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('53', '33', '3', '5', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '500.00', '500.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('54', '33', '3', '5', '2015-01-05', '06:00:00', '2015-01-06', '06:00:00', '500.00', '500.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('55', '33', '3', '3', '2015-01-05', '07:56:29', '2015-01-05', '10:56:00', '15.00', '15.00', '', '0', '1');
INSERT INTO `consume_service` VALUES ('56', '33', '3', '9', '2015-01-05', '07:56:55', '2015-01-05', '16:56:00', '40.00', '40.00', '', '0', '1');
INSERT INTO `consume_service` VALUES ('57', '34', '3', '1', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('58', '34', '3', '1', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('59', '34', '3', '1', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('60', '34', '3', '1', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('61', '34', '3', '1', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('62', '34', '3', '1', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('63', '34', '3', '5', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '500.00', '500.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('64', '34', '3', '5', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '500.00', '500.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('65', '34', '3', '5', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '500.00', '500.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('66', '35', '3', '4', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '300.00', '300.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('67', '35', '3', '4', '2015-01-07', '06:00:00', '2015-01-08', '06:00:00', '300.00', '300.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('68', '35', '3', '3', '2015-01-07', '08:30:52', '2015-01-07', '11:30:00', '15.00', '15.00', '', '0', '1');
INSERT INTO `consume_service` VALUES ('72', '37', '3', '1', '2015-01-09', '06:00:00', '2015-01-10', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('73', '37', '3', '1', '2015-01-09', '06:00:00', '2015-01-10', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('74', '37', '3', '1', '2015-01-09', '06:00:00', '2015-01-10', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('75', '38', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('76', '38', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('77', '39', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('78', '39', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('79', '40', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('80', '40', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('81', '40', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('82', '40', '3', '1', '2015-01-11', '06:00:00', '2015-01-12', '06:00:00', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('83', '41', '3', '2', '2017-06-26', '04:21:18', '2017-06-27', '04:21:18', '0.00', '180.00', 'Consumo habitacion', '-1', '1');
INSERT INTO `consume_service` VALUES ('84', '42', '3', '2', '2015-02-05', '04:22:32', '2015-02-06', '04:22:32', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('85', '42', '3', '9', '2015-02-05', '04:28:44', '2015-02-05', '13:28:00', '40.00', '40.00', '', '0', '1');
INSERT INTO `consume_service` VALUES ('86', '42', '3', '3', '2015-02-05', '04:28:58', '2015-02-05', '07:28:00', '15.00', '15.00', '', '0', '1');
INSERT INTO `consume_service` VALUES ('87', '43', '3', '2', '2015-02-26', '09:30:00', '2015-03-05', '09:30:00', '200.00', '1260.00', 'Consumo habitacion', '-1', '1');
INSERT INTO `consume_service` VALUES ('88', '44', '3', '2', '2015-02-26', '09:30:00', '2015-03-05', '09:30:00', '1260.00', '1260.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('89', '45', '3', '2', '2015-03-05', '09:16:29', '2015-03-06', '09:16:29', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('90', '46', '3', '2', '2015-03-31', '09:22:11', '2015-04-15', '09:22:11', '2700.00', '2700.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('91', '47', '3', '1', '2015-05-15', '09:28:48', '2015-06-18', '09:28:48', '3400.00', '3400.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('92', '48', '3', '2', '2017-04-18', '09:37:22', '2017-04-19', '09:37:22', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('93', '49', '3', '2', '2017-05-19', '10:00:37', '2017-05-20', '10:00:37', '102.00', '180.00', 'Consumo habitacion', '2', '1');
INSERT INTO `consume_service` VALUES ('94', '49', '3', '2', '2017-05-19', '10:00:37', '2017-05-20', '10:00:37', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('95', '50', '3', '4', '2017-06-19', '10:04:29', '2017-06-20', '10:04:29', '300.00', '300.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('96', '51', '3', '2', '2017-06-26', '08:00:00', '2017-06-28', '08:00:00', '180.00', '180.00', 'Consumo habitacion', '1', '1');
INSERT INTO `consume_service` VALUES ('97', '52', '3', '5', '2017-06-18', '10:17:38', '2017-06-19', '10:17:38', '100.00', '500.00', 'Consumo habitacion', '2', '1');
INSERT INTO `consume_service` VALUES ('98', '52', '3', '5', '2017-06-18', '10:17:38', '2017-06-19', '10:17:38', '400.00', '500.00', 'Consumo habitacion', '2', '1');
INSERT INTO `consume_service` VALUES ('99', '52', '3', '5', '2017-06-18', '10:17:38', '2017-06-19', '10:17:38', '500.00', '500.00', 'Consumo habitacion', '2', '1');
INSERT INTO `consume_service` VALUES ('100', '52', '3', '1', '2017-06-18', '10:17:38', '2017-06-19', '10:17:38', '100.00', '100.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('101', '52', '3', '2', '2017-06-18', '10:17:38', '2017-06-19', '10:17:38', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('102', '52', '3', '2', '2017-06-18', '10:17:38', '2017-06-19', '10:17:38', '180.00', '180.00', 'Consumo habitacion', '0', '1');
INSERT INTO `consume_service` VALUES ('103', '52', '3', '2', '2017-06-18', '10:17:38', '2017-06-19', '10:17:38', '180.00', '180.00', 'Consumo habitacion', '0', '1');

-- ----------------------------
-- Table structure for cost_food
-- ----------------------------
DROP TABLE IF EXISTS `cost_food`;
CREATE TABLE `cost_food` (
  `ID_FOOD` int(11) NOT NULL,
  `ID_TYPE_MONEY` int(11) NOT NULL,
  `UNIT_COST_FOOD` decimal(3,0) NOT NULL,
  `PRICE_COST_FOOD` float(8,2) NOT NULL,
  `POINT_OBTAIN_COST_FOOD` decimal(6,0) NOT NULL,
  `POINT_REQUIRED_COST_FOOD` decimal(6,0) NOT NULL,
  `TIME_CREATED_COST_FOOD` time NOT NULL,
  `DATE_CREATED_COST_FOOD` date NOT NULL,
  `ACTIVE_COST_FOOD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_FOOD`,`ID_TYPE_MONEY`,`UNIT_COST_FOOD`),
  KEY `FK_RELATIONSHIP_96` (`ID_TYPE_MONEY`),
  CONSTRAINT `FK_RELATIONSHIP_95` FOREIGN KEY (`ID_FOOD`) REFERENCES `food` (`ID_FOOD`),
  CONSTRAINT `FK_RELATIONSHIP_96` FOREIGN KEY (`ID_TYPE_MONEY`) REFERENCES `type_money` (`ID_TYPE_MONEY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cost_food
-- ----------------------------
INSERT INTO `cost_food` VALUES ('1', '1', '1', '20.00', '0', '10', '22:28:27', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('2', '1', '1', '20.00', '0', '5', '22:29:13', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('3', '1', '1', '40.00', '0', '0', '23:35:09', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('4', '1', '1', '50.00', '0', '0', '23:36:08', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('5', '1', '1', '35.00', '0', '0', '23:37:34', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('6', '1', '1', '25.00', '0', '10', '23:38:42', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('7', '1', '1', '15.00', '0', '3', '23:40:12', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('8', '1', '1', '25.00', '0', '12', '23:41:15', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('9', '1', '1', '12.00', '0', '0', '23:42:12', '2017-06-17', '1');
INSERT INTO `cost_food` VALUES ('10', '1', '1', '15.00', '0', '0', '23:42:53', '2017-06-17', '1');

-- ----------------------------
-- Table structure for cost_service
-- ----------------------------
DROP TABLE IF EXISTS `cost_service`;
CREATE TABLE `cost_service` (
  `ID_COST_SERVICE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SERVICE` int(11) NOT NULL,
  `ID_TYPE_MONEY` int(11) NOT NULL,
  `UNIT_COST_SERVICE` decimal(3,0) NOT NULL,
  `UNIT_DAY_COST_SERVICE` decimal(2,0) NOT NULL,
  `UNIT_HOUR_COST_SERVICE` decimal(2,0) NOT NULL,
  `PRICE_COST_SERVICE` float(8,2) NOT NULL,
  `POINT_OBTAIN_COST_SERVICE` decimal(6,0) NOT NULL,
  `POINT_REQUIRED_COST_SERVICE` decimal(6,0) NOT NULL,
  `ACTIVE_COST_SERVICE` tinyint(1) NOT NULL,
  `TIME_CREATED_COST_SERVICE` time NOT NULL,
  `DATE_CREATED_COST_SERVICE` date NOT NULL,
  PRIMARY KEY (`ID_COST_SERVICE`),
  KEY `FK_RELATIONSHIP_112` (`ID_SERVICE`),
  KEY `FK_RELATIONSHIP_94` (`ID_TYPE_MONEY`),
  CONSTRAINT `FK_RELATIONSHIP_112` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_94` FOREIGN KEY (`ID_TYPE_MONEY`) REFERENCES `type_money` (`ID_TYPE_MONEY`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cost_service
-- ----------------------------
INSERT INTO `cost_service` VALUES ('1', '1', '1', '1', '1', '0', '100.00', '50', '0', '1', '21:54:48', '2017-06-17');
INSERT INTO `cost_service` VALUES ('2', '2', '1', '1', '1', '0', '180.00', '0', '0', '1', '21:55:44', '2017-06-17');
INSERT INTO `cost_service` VALUES ('3', '3', '1', '1', '0', '1', '15.00', '0', '0', '1', '21:58:56', '2017-06-17');
INSERT INTO `cost_service` VALUES ('4', '4', '1', '1', '1', '0', '300.00', '0', '0', '1', '22:00:00', '2017-06-17');
INSERT INTO `cost_service` VALUES ('5', '5', '1', '1', '1', '0', '500.00', '0', '0', '1', '22:01:11', '2017-06-17');
INSERT INTO `cost_service` VALUES ('6', '6', '1', '1', '0', '1', '0.00', '0', '0', '1', '22:02:12', '2017-06-17');
INSERT INTO `cost_service` VALUES ('7', '7', '1', '1', '1', '0', '0.00', '0', '0', '1', '22:03:44', '2017-06-17');
INSERT INTO `cost_service` VALUES ('8', '8', '1', '1', '0', '0', '40.00', '0', '0', '0', '00:22:03', '2017-06-18');
INSERT INTO `cost_service` VALUES ('9', '8', '1', '1', '0', '1', '40.00', '0', '0', '1', '00:22:18', '2017-06-18');

-- ----------------------------
-- Table structure for food
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `ID_FOOD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_FOOD` int(11) NOT NULL,
  `ID_STATE_FOOD` int(11) NOT NULL,
  `NAME_FOOD` varchar(50) NOT NULL,
  `DESCRIPTION_FOOD` varchar(350) NOT NULL,
  `IMAGE_FOOD` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_FOOD`),
  KEY `FK_RELATIONSHIP_60` (`ID_TYPE_FOOD`),
  KEY `FK_RELATIONSHIP_83` (`ID_STATE_FOOD`),
  CONSTRAINT `FK_RELATIONSHIP_60` FOREIGN KEY (`ID_TYPE_FOOD`) REFERENCES `type_food` (`ID_TYPE_FOOD`),
  CONSTRAINT `FK_RELATIONSHIP_83` FOREIGN KEY (`ID_STATE_FOOD`) REFERENCES `state_food` (`ID_STATE_FOOD`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES ('1', '1', '1', 'Cafe', 'cafe con pan<br>', 'img/food/20170617222827.png');
INSERT INTO `food` VALUES ('2', '1', '1', 'Hamburguesa', '<span>Comida que se prepara con carne picada de animales vacunos, cerdo o aves, generalmente condimentada con sal, pimienta, ajo y perejil, y forma redonda y plana; suele asarse a la plancha o freÃ­rse</span>', 'img/food/20170617222913.jpg');
INSERT INTO `food` VALUES ('3', '2', '1', 'Pollo al horno', '<span class=\"st\"> la cocinamos a menudo, como es tan sencilla de hacer, y econÃ³mica, la Receta de <i>Pollo al Horno</i> es una buena Comida<br></span>', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES ('4', '5', '1', 'Pizza', '<span>Comida que consiste en una base de masa de pan, generalmente delgada y redonda, que se recubre con salsa de tomate, queso mozzarella o similar y diversos ingredientes troceados y se cuece al horno; es de origen italiano.</span>', 'img/food/20170617233608.jpg');
INSERT INTO `food` VALUES ('5', '2', '1', 'Espagueti', '<span>Pasta italiana de forma alargada, fina y cilÃ­ndrica</span>', 'img/food/20170617233734.jpg');
INSERT INTO `food` VALUES ('6', '2', '1', 'Sopa de zapallo', '<span class=\"st\">La <i>sopa</i> de calabaza es una especie de purÃ© elaborado con calabaza. Este tipo de <i>sopa</i> se elabora de diferentes formas a lo largo de las diversas cocinas del mundo<br></span>', 'img/food/20170617233842.jpg');
INSERT INTO `food` VALUES ('7', '5', '1', 'Tucumana', '<span>Pasta o masa en forma de media luna rellena de ingredientes dulces o salados que se frÃ­e en abundante aceite o se cuece al horno.</span>', 'img/food/20170617234012.jpg');
INSERT INTO `food` VALUES ('8', '5', '1', 'ensalada de frutas', '<span>Plato que se prepara mezclando distintos alimentos, crudos o cocidos, principalmente hortalizas troceadas, y se sirve frÃ­o o tibio, y aliÃ±ado o aderezado con alguna salsa.</span>', 'img/food/20170617234115.jpg');
INSERT INTO `food` VALUES ('9', '6', '1', 'Vaso de coca cola', 'REfresco refrescante<br>', 'img/food/20170617234212.jpg');
INSERT INTO `food` VALUES ('10', '6', '1', 'Coca cola 1/2 litro', 'Coca cola gaseosa<br>', 'img/food/20170617234253.jpg');

-- ----------------------------
-- Table structure for form
-- ----------------------------
DROP TABLE IF EXISTS `form`;
CREATE TABLE `form` (
  `ID_FORM` decimal(3,0) NOT NULL,
  `NAME_FORM` char(25) NOT NULL,
  `DESCRIPTION_FORM` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_FORM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of form
-- ----------------------------

-- ----------------------------
-- Table structure for function
-- ----------------------------
DROP TABLE IF EXISTS `function`;
CREATE TABLE `function` (
  `ID_FUNCTION` decimal(3,0) NOT NULL,
  `NAME_FUNCTION` char(25) NOT NULL,
  `DESCRIPTION_FUNCTION` varchar(250) NOT NULL,
  `IMAGE_FUNCTION` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_FUNCTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of function
-- ----------------------------

-- ----------------------------
-- Table structure for func_form
-- ----------------------------
DROP TABLE IF EXISTS `func_form`;
CREATE TABLE `func_form` (
  `ID_FORM` decimal(3,0) NOT NULL,
  `ID_FUNCTION` decimal(3,0) NOT NULL,
  `DATE_FUNCTION_FORM` date NOT NULL,
  `TIME_FUNCTION_FORM` time NOT NULL,
  PRIMARY KEY (`ID_FORM`,`ID_FUNCTION`),
  KEY `FK_RELATIONSHIP_10` (`ID_FUNCTION`),
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_FUNCTION`) REFERENCES `function` (`ID_FUNCTION`),
  CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_FORM`) REFERENCES `form` (`ID_FORM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of func_form
-- ----------------------------

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `ID_HOTEL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_HOTEL` int(11) NOT NULL,
  `NAME_HOTEL` varchar(100) NOT NULL,
  `DOMINIO_HOTEL` varchar(75) NOT NULL,
  `DATE_FOUNDATION_HOTEL` date NOT NULL,
  `LOGO_HOTEL` varchar(200) NOT NULL,
  `ADDRESS_HOTEL` varchar(250) NOT NULL,
  `ADDRESS_GPS_X_HOTEL` float NOT NULL,
  `ADDRESS_GPS_Y_HOTEL` float NOT NULL,
  `ADDRESS_IMAGE_HOTEL` varchar(200) NOT NULL,
  `HISTORY_HOTEL` varchar(5000) NOT NULL,
  `MISSION_HOTEL` varchar(1000) NOT NULL,
  `VISION_HOTEL` varchar(1000) NOT NULL,
  `SCOPE_HOTEL` varchar(1000) NOT NULL,
  `OBJECTIVE_HOTEL` varchar(1000) NOT NULL,
  `WATCHWORD_HOTEL` varchar(1000) NOT NULL,
  `DESCRIPTION_HOTEL` varchar(1024) NOT NULL,
  `EMAIL_HOTEL` varchar(50) NOT NULL,
  `PHONE_HOTEL` decimal(15,0) NOT NULL,
  PRIMARY KEY (`ID_HOTEL`),
  KEY `FK_RELATIONSHIP_46` (`ID_TYPE_HOTEL`),
  CONSTRAINT `FK_RELATIONSHIP_46` FOREIGN KEY (`ID_TYPE_HOTEL`) REFERENCES `type_hotel` (`ID_TYPE_HOTEL`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('1', '6', 'Hotel', 'www.hoteltesis.esy.es', '2017-06-01', 'img/system/logo.png', 'Av. siempre viva Nro355', '-17.3934', '-66.1472', 'img/system/hotel_font.jpg', '<h6>En una bella casona a unos pasos de la catedral con estacionamiento, pensiÃ³n de mascotas, wifi, niÃ±era.</h6>                            <p>Hotel en el centro histÃ³rico, ubicado en una casona de finales del siglo XVIII pero con el confort, servicios y atenciÃ³n del siglo XXI. Rodeado de importantes construcciones arquitectÃ³nicas tales como Museo Regional Michoacano, La Catedral, Centro Cultural Clavijero, Centro Cultural Universitario, Mercado del Dulce, entre otros; a tan solo 10 min. del Ceconexpo, y 30 minutos del aeropuerto.</p>              <p>En  su prÃ³ximo viaje a la ciudad de Morelia ya sea de trabajo, placer o negocios brÃ­ndenos la oportunidad de ofrecerle nuestro servicio de hospitalidad ya que aparte de su excelente ubicaciÃ³n cuenta con el personal capacitado para darle a usted un servicio personalizado y de calidad.</p>              <p>El concepto de nuestro Hotel es de carÃ¡cter TemÃ¡tico  ya que cuenta con 12 habitaciones estÃ¡ndar finamente decoradas con rÃ©plicas de edificaciones, arquitectura e incluso artesanÃ­as caracterÃ­sticas de la regiÃ³n, dÃ¡ndonos la sensaciÃ³n de<br></p>', 'omos una empresa familiar comprometida con la satisfacciÃ³n de nuestros clientes, ofreciÃ©ndoles una experiencia Ãºnica y siendo la excelencia nuestra carta de presentaciÃ³n. Desarrollamos nuestra actividad en un marco de compromiso con la sociedad y respeto al Medio Ambiente.', 'Trabajamos para posicionarnos como una organizaciÃ³n lÃ­der en el negocio de la hotelerÃ­a, siendo reconocidos por la calidad de nuestro servicio y la orientaciÃ³n a la satisfacciÃ³n de las necesidades y expectativas de nuestros huÃ©spedes, siempre bajo estrictos criterios de rentabilidad, transparencia, protecciÃ³n del Medio Ambiente y compromiso social.', 'Desarrollar una importante labor de opiniÃ³n, interlocuciÃ³n y comunicaciÃ³n entre los actores de la comunidad receptora, los consumidores, los empresarios, el gobierno a todos sus niveles y con el poder legislativo, para conformar polÃ­ticas pÃºblicas y programas empresariales que fortalezcan la industria turÃ­stica, la protecciÃ³n de los consumidores de servicios turÃ­sticos, la conservaciÃ³n y cuidado de los recursos naturales y el desarrollo comunitario. Actividades alineadas para consolidar al Turismo como prioridad nacional y regional.', '<ol><li>. Mantener el liderazgo de la Industria TurÃ­stica</li><li>. Unificar la fuerza de los Asociados</li><li>. Representar y proteger los intereses de sus afiliados</li><li>. Impulsar y fomentar las acciones de promociÃ³n de la industria turÃ­stica hacia el desarrollo del destino.</li><li>. Elevar los estÃ¡ndares de calidad de los servicios que se ofrecen al turismo a travÃ©s de programas de capacitaciÃ³n.</li><li>. Fomentar el trabajo en equipo con otras asociaciones y Â organizaciones afines para lograr objetivos comunes.</li><li>. Trabajar para renovar y mejorar la atenciÃ³n y el servicio, para mantener al destino en los primeros lugares turÃ­sticos del mundo.</li></ol>', '<p>Cumplir integralmente en sus dimensiones econÃ³mica, social y ambiental, en sus contextos externo e interno. La AsociaciÃ³n de Hoteles de CancÃºn y Puerto Morelos adopta una actitud Ã©tica en todas sus acciones, buscando por igual:</p><p>1.-El desarrollo de sus agremiados y empleados</p><p>2.-El desarrollo de la comunidad</p><p>3.-El cuidado y preservaciÃ³n del medio ambiente</p>', 'El Hotel Cellai es un hotel boutique situado en el corazÃ³n del centro histÃ³rico de Florencia, rodeado de la extraordinaria belleza de iglesias, palacios y monumentos Ãºnicos en el mundo. El Duomo y la Galeria de la Accademia estÃ¡n a solo 5 minutos a pie.Ya en el umbral de este exclusivo hotel de Florencia se percibe claramente un ambiente particular, cÃ¡lido e Ã­ntimo, relajante y ecojedor. Una atmÃ³sfera que transmite la sensaciÃ³n de encontrarse en una casa, donde cada detalle estÃ¡ cuidado con pasiÃ³n, donde cada espacio merece ser descubierto.Muebles de Ã©poca, toques contemporÃ¡neos y preciosos complementos de decoraciÃ³n artÃ­stica caracterizan las muchas salas donde dedicarse a la lectura, al descanso o a la conversaciÃ³n.WIFIAcceso a Internet WIFI en todas las habitaciones, salas de reuniones y en el Roof Garden.BUSINESS CORNERNuestro staff estÃ¡ a su disposiciÃ³n para ayudarle a imprimir y enviar por fax sus documentos.Caja de seguridadEn el servicio de recepciÃ³n estÃ¡ disponib', 'hotel@gmail.com', '78965432');

-- ----------------------------
-- Table structure for image_site_tour
-- ----------------------------
DROP TABLE IF EXISTS `image_site_tour`;
CREATE TABLE `image_site_tour` (
  `ID_IMAGE_SITE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SITE_TOUR` int(11) NOT NULL,
  `IMAGE_SITE` varchar(250) NOT NULL,
  `NAME_IMAGE_SITE` varchar(200) NOT NULL,
  `DESCRIPTION_IMAGE_SITE` varchar(750) NOT NULL,
  `STATE_IMAGE_SITE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_IMAGE_SITE`),
  KEY `FK_RELATIONSHIP_44` (`ID_SITE_TOUR`),
  CONSTRAINT `FK_RELATIONSHIP_44` FOREIGN KEY (`ID_SITE_TOUR`) REFERENCES `site_tour` (`ID_SITE_TOUR`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image_site_tour
-- ----------------------------
INSERT INTO `image_site_tour` VALUES ('1', '1', 'img/site/201706180033561.jpeg', 'entrada', 'Paisaje de entrada', '1');
INSERT INTO `image_site_tour` VALUES ('2', '1', 'img/site/201706180034271.jpeg', 'Contenido', 'Paisaje de adentro del lugar', '1');
INSERT INTO `image_site_tour` VALUES ('3', '2', 'img/site/201706180038441.png', 'esntrad', 'fahcada de enfrente', '1');
INSERT INTO `image_site_tour` VALUES ('4', '2', 'img/site/201706180038442.jpeg', 'detras', 'fachada de aras del edificio', '1');
INSERT INTO `image_site_tour` VALUES ('5', '2', 'img/site/201706180038443.jpeg', 'interior', 'adentro fachada interior dl edificio', '1');

-- ----------------------------
-- Table structure for inquest
-- ----------------------------
DROP TABLE IF EXISTS `inquest`;
CREATE TABLE `inquest` (
  `ID_INQUEST` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSON` int(11) NOT NULL,
  `ID_STATE_INQUEST` int(11) NOT NULL,
  `NAME_INQUEST` varchar(250) NOT NULL,
  `DESCRIPTION_INQUEST` varchar(750) NOT NULL,
  `DATE_START_INQUEST` date NOT NULL,
  `TIME_START_INQUEST` time NOT NULL,
  `DATE_END_INQUEST` date DEFAULT NULL,
  `TIME_END_INQUEST` time DEFAULT NULL,
  PRIMARY KEY (`ID_INQUEST`),
  KEY `FK_RELATIONSHIP_50` (`ID_PERSON`),
  KEY `FK_RELATIONSHIP_82` (`ID_STATE_INQUEST`),
  CONSTRAINT `FK_RELATIONSHIP_50` FOREIGN KEY (`ID_PERSON`) REFERENCES `user` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_82` FOREIGN KEY (`ID_STATE_INQUEST`) REFERENCES `state_inquest` (`ID_STATE_INQUEST`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inquest
-- ----------------------------
INSERT INTO `inquest` VALUES ('1', '1', '5', 'Preguntas frecuentes', 'Preguntas realizadas por los clientes', '2017-06-17', '22:06:13', '0000-00-00', '00:00:00');
INSERT INTO `inquest` VALUES ('2', '1', '1', 'Encuesta de satisfaccion', 'Estimado cliente.<br>Con el fin de mejorar la calidad de nuestros servicios y asegurar la satisfacciÃ³n de todos nuestros visitantes, agradecerÃ­amos respondiera a este cuestionario. PuntuÃ© del 1 (Muy mal) al 5 (muy bien) los siguientes aspectos de este establecimiento.', '2017-06-18', '00:00:00', '2017-07-31', '00:00:00');
INSERT INTO `inquest` VALUES ('3', '1', '1', 'Encuesta decalidad de la comida', 'Estimado cliente.<br>Con el fin de mejorar la calidad de nuestros servicios y asegurar la satisfacciÃ³n de todos nuestros visitantes, agradecerÃ­amos respondiera a este cuestionario. <br>', '2017-06-18', '00:00:00', '2017-12-08', '00:00:00');
INSERT INTO `inquest` VALUES ('4', '1', '1', 'Preguntas de fidelizacion', 'Preguntas sobre el estado del hotel y los servicios<br>', '2017-06-26', '00:00:00', '2018-02-28', '00:00:00');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `ID_LOG` int(15) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_LOG` int(11) NOT NULL,
  `ENTITY` char(25) NOT NULL,
  `DATA_NEW` varchar(350) NOT NULL,
  `DATA_OLD` varchar(350) NOT NULL,
  `DATE_CREATED_LOG` date NOT NULL,
  `TIME_CREATED_LOG` time NOT NULL,
  `IP_LOG` varchar(50) NOT NULL,
  `BROWSER_LOG` varchar(300) NOT NULL,
  `SESSION_LOG` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_LOG`),
  KEY `FK_RELATIONSHIP_67` (`ID_TYPE_LOG`),
  CONSTRAINT `FK_RELATIONSHIP_67` FOREIGN KEY (`ID_TYPE_LOG`) REFERENCES `type_log` (`ID_TYPE_LOG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for member_check
-- ----------------------------
DROP TABLE IF EXISTS `member_check`;
CREATE TABLE `member_check` (
  `ID_PERSON` int(11) NOT NULL,
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ACTIVE_MEMBER` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_PERSON`,`ID_CONSUME_SERVICE`),
  KEY `FK_RELATIONSHIP_115` (`ID_CONSUME_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_114` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_115` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member_check
-- ----------------------------
INSERT INTO `member_check` VALUES ('3', '31', '1');
INSERT INTO `member_check` VALUES ('3', '35', '1');
INSERT INTO `member_check` VALUES ('3', '42', '1');
INSERT INTO `member_check` VALUES ('3', '66', '1');
INSERT INTO `member_check` VALUES ('39', '32', '1');
INSERT INTO `member_check` VALUES ('39', '33', '1');
INSERT INTO `member_check` VALUES ('39', '34', '1');
INSERT INTO `member_check` VALUES ('39', '35', '1');
INSERT INTO `member_check` VALUES ('40', '32', '1');
INSERT INTO `member_check` VALUES ('41', '33', '1');
INSERT INTO `member_check` VALUES ('41', '39', '1');
INSERT INTO `member_check` VALUES ('41', '40', '1');
INSERT INTO `member_check` VALUES ('41', '41', '1');
INSERT INTO `member_check` VALUES ('41', '42', '1');
INSERT INTO `member_check` VALUES ('41', '43', '1');
INSERT INTO `member_check` VALUES ('41', '44', '1');
INSERT INTO `member_check` VALUES ('41', '45', '1');
INSERT INTO `member_check` VALUES ('41', '46', '1');
INSERT INTO `member_check` VALUES ('41', '47', '1');
INSERT INTO `member_check` VALUES ('41', '48', '1');
INSERT INTO `member_check` VALUES ('41', '49', '1');
INSERT INTO `member_check` VALUES ('41', '50', '1');
INSERT INTO `member_check` VALUES ('41', '51', '1');
INSERT INTO `member_check` VALUES ('41', '52', '1');
INSERT INTO `member_check` VALUES ('41', '53', '1');
INSERT INTO `member_check` VALUES ('41', '54', '1');
INSERT INTO `member_check` VALUES ('47', '34', '1');
INSERT INTO `member_check` VALUES ('48', '35', '1');
INSERT INTO `member_check` VALUES ('49', '36', '1');
INSERT INTO `member_check` VALUES ('50', '36', '1');
INSERT INTO `member_check` VALUES ('51', '45', '1');
INSERT INTO `member_check` VALUES ('52', '46', '1');
INSERT INTO `member_check` VALUES ('53', '47', '1');
INSERT INTO `member_check` VALUES ('54', '48', '1');
INSERT INTO `member_check` VALUES ('55', '49', '1');
INSERT INTO `member_check` VALUES ('56', '50', '1');
INSERT INTO `member_check` VALUES ('57', '51', '1');
INSERT INTO `member_check` VALUES ('58', '57', '1');
INSERT INTO `member_check` VALUES ('59', '58', '1');
INSERT INTO `member_check` VALUES ('60', '59', '1');
INSERT INTO `member_check` VALUES ('61', '60', '1');
INSERT INTO `member_check` VALUES ('62', '61', '1');
INSERT INTO `member_check` VALUES ('63', '62', '1');
INSERT INTO `member_check` VALUES ('64', '63', '1');
INSERT INTO `member_check` VALUES ('65', '64', '1');
INSERT INTO `member_check` VALUES ('66', '65', '1');
INSERT INTO `member_check` VALUES ('67', '66', '1');
INSERT INTO `member_check` VALUES ('68', '67', '1');
INSERT INTO `member_check` VALUES ('69', '67', '1');
INSERT INTO `member_check` VALUES ('75', '72', '1');
INSERT INTO `member_check` VALUES ('76', '73', '1');
INSERT INTO `member_check` VALUES ('77', '74', '1');
INSERT INTO `member_check` VALUES ('79', '75', '1');
INSERT INTO `member_check` VALUES ('80', '76', '1');
INSERT INTO `member_check` VALUES ('82', '77', '1');
INSERT INTO `member_check` VALUES ('83', '78', '1');
INSERT INTO `member_check` VALUES ('85', '79', '1');
INSERT INTO `member_check` VALUES ('86', '80', '1');
INSERT INTO `member_check` VALUES ('87', '81', '1');
INSERT INTO `member_check` VALUES ('88', '82', '1');
INSERT INTO `member_check` VALUES ('92', '83', '1');
INSERT INTO `member_check` VALUES ('93', '83', '1');
INSERT INTO `member_check` VALUES ('95', '84', '1');
INSERT INTO `member_check` VALUES ('96', '84', '1');
INSERT INTO `member_check` VALUES ('98', '87', '1');
INSERT INTO `member_check` VALUES ('99', '87', '1');
INSERT INTO `member_check` VALUES ('101', '88', '1');
INSERT INTO `member_check` VALUES ('102', '88', '1');
INSERT INTO `member_check` VALUES ('104', '89', '1');
INSERT INTO `member_check` VALUES ('105', '89', '1');
INSERT INTO `member_check` VALUES ('107', '90', '1');
INSERT INTO `member_check` VALUES ('108', '90', '1');
INSERT INTO `member_check` VALUES ('110', '91', '1');
INSERT INTO `member_check` VALUES ('112', '92', '1');
INSERT INTO `member_check` VALUES ('113', '92', '1');
INSERT INTO `member_check` VALUES ('115', '93', '1');
INSERT INTO `member_check` VALUES ('116', '93', '1');
INSERT INTO `member_check` VALUES ('117', '94', '1');
INSERT INTO `member_check` VALUES ('118', '94', '1');
INSERT INTO `member_check` VALUES ('120', '95', '1');
INSERT INTO `member_check` VALUES ('121', '95', '1');
INSERT INTO `member_check` VALUES ('123', '96', '1');
INSERT INTO `member_check` VALUES ('124', '96', '1');
INSERT INTO `member_check` VALUES ('126', '97', '1');
INSERT INTO `member_check` VALUES ('127', '98', '1');
INSERT INTO `member_check` VALUES ('128', '99', '1');
INSERT INTO `member_check` VALUES ('129', '100', '1');
INSERT INTO `member_check` VALUES ('130', '101', '1');
INSERT INTO `member_check` VALUES ('131', '101', '1');
INSERT INTO `member_check` VALUES ('132', '102', '1');
INSERT INTO `member_check` VALUES ('133', '102', '1');
INSERT INTO `member_check` VALUES ('134', '103', '1');
INSERT INTO `member_check` VALUES ('135', '103', '1');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL AUTO_INCREMENT,
  `ACTIVE_MENU` tinyint(1) NOT NULL,
  `TIME_UPDATE_MENU` time NOT NULL,
  `DATE_UPDATE_MENU` date NOT NULL,
  `TIME_CREATED_MENU` time NOT NULL,
  `DATE_CREATED_MENU` date NOT NULL,
  `DATE_START_MENU` date NOT NULL,
  `DATE_END_MENU` date NOT NULL,
  `NAME_MENU` char(50) NOT NULL,
  PRIMARY KEY (`ID_MENU`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '1', '23:43:33', '2017-06-17', '23:43:33', '2017-06-17', '2014-06-17', '2017-10-31', 'menu desayuno');
INSERT INTO `menu` VALUES ('2', '1', '23:44:21', '2017-06-17', '23:44:21', '2017-06-17', '2014-06-18', '2018-06-23', 'Almuerzo');

-- ----------------------------
-- Table structure for menu_food
-- ----------------------------
DROP TABLE IF EXISTS `menu_food`;
CREATE TABLE `menu_food` (
  `ID_FOOD` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  PRIMARY KEY (`ID_FOOD`,`ID_MENU`),
  KEY `FK_RELATIONSHIP_81` (`ID_MENU`),
  CONSTRAINT `FK_RELATIONSHIP_117` FOREIGN KEY (`ID_FOOD`) REFERENCES `food` (`ID_FOOD`),
  CONSTRAINT `FK_RELATIONSHIP_81` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu_food
-- ----------------------------
INSERT INTO `menu_food` VALUES ('1', '1');
INSERT INTO `menu_food` VALUES ('2', '1');
INSERT INTO `menu_food` VALUES ('3', '2');
INSERT INTO `menu_food` VALUES ('4', '2');
INSERT INTO `menu_food` VALUES ('5', '2');
INSERT INTO `menu_food` VALUES ('6', '2');
INSERT INTO `menu_food` VALUES ('7', '2');
INSERT INTO `menu_food` VALUES ('8', '2');
INSERT INTO `menu_food` VALUES ('9', '2');
INSERT INTO `menu_food` VALUES ('10', '2');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `ID_MESSAGE` int(7) NOT NULL AUTO_INCREMENT,
  `SENDER_MESSAGE` int(11) NOT NULL,
  `RECEIVER_MESSAGE` int(11) NOT NULL,
  `ID_TYPE_MESSAGE` int(11) NOT NULL,
  `DATE_MESSAGE` date NOT NULL,
  `TIME_MESSAGE` time NOT NULL,
  `STATE_MESSAGE` tinyint(1) NOT NULL,
  `TITTLE_MESSAGE` varchar(50) NOT NULL,
  `CONTAINER_MESSAGE` varchar(750) NOT NULL,
  `IMAGE_MESSAGE` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_MESSAGE`),
  KEY `FK_RELATIONSHIP_55` (`SENDER_MESSAGE`),
  KEY `FK_RELATIONSHIP_79` (`RECEIVER_MESSAGE`),
  KEY `FK_RELATIONSHIP_99` (`ID_TYPE_MESSAGE`),
  CONSTRAINT `FK_RELATIONSHIP_55` FOREIGN KEY (`SENDER_MESSAGE`) REFERENCES `user` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_79` FOREIGN KEY (`RECEIVER_MESSAGE`) REFERENCES `user` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_99` FOREIGN KEY (`ID_TYPE_MESSAGE`) REFERENCES `type_message` (`ID_TYPE_MESSAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '1', '1', '14', '2017-06-17', '23:46:33', '1', 'Registro de nuevo usuario: 2', 'Nuevo Usuario Registrado: con  nombre: recepcionista cepscionista, Sexo: 0, Correo: recepcion@gmail.com, Telefono: 32154653', null);
INSERT INTO `message` VALUES ('2', '1', '1', '14', '2017-06-17', '23:46:33', '1', 'Registro de nuevo usuario: 2', 'Nuevo Usuario Registrado: con  nombre: recepcionista cepscionista, Sexo: 0, Correo: recepcion@gmail.com, Telefono: 32154653', null);
INSERT INTO `message` VALUES ('3', '1', '1', '14', '2017-06-17', '23:46:33', '1', 'Registro de nuevo usuario: 2', 'Nuevo Usuario Registrado: con  nombre: recepcionista cepscionista, Sexo: 0, Correo: recepcion@gmail.com, Telefono: 32154653', null);
INSERT INTO `message` VALUES ('4', '1', '1', '14', '2017-06-17', '23:48:12', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: cliente gmail, Sexo: 1, Correo: cliente@gmail.com, Telefono: 314654662', null);
INSERT INTO `message` VALUES ('5', '1', '1', '14', '2017-06-17', '23:48:12', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: cliente gmail, Sexo: 1, Correo: cliente@gmail.com, Telefono: 314654662', null);
INSERT INTO `message` VALUES ('6', '1', '1', '14', '2017-06-17', '23:48:12', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: cliente gmail, Sexo: 1, Correo: cliente@gmail.com, Telefono: 314654662', null);
INSERT INTO `message` VALUES ('7', '1', '3', '1', '2017-06-18', '12:52:19', '0', 'Comunicado', 'Este es un comunicado para el cliente<br>', null);
INSERT INTO `message` VALUES ('8', '3', '3', '1', '2017-06-18', '12:54:37', '1', 'Comunicado', 'Este es un mensaje de prueba<br>', null);
INSERT INTO `message` VALUES ('9', '3', '1', '6', '2017-06-18', '14:39:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva15, n&uacute;mero de tarjeta 212245, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('10', '3', '1', '6', '2017-06-18', '14:39:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva15, n&uacute;mero de tarjeta 212245, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('11', '3', '1', '6', '2017-06-18', '14:39:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva15, n&uacute;mero de tarjeta 212245, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('12', '3', '2', '6', '2017-06-18', '14:39:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva15, n&uacute;mero de tarjeta 212245, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('13', '3', '2', '6', '2017-06-18', '14:39:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva15, n&uacute;mero de tarjeta 212245, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('14', '3', '2', '6', '2017-06-18', '14:39:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva15, n&uacute;mero de tarjeta 212245, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('15', '1', '1', '14', '2017-06-25', '16:27:35', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: Hugo Galicia Razo, Sexo: 1, Correo: hugo@gmail.com, Telefono: 77266025', null);
INSERT INTO `message` VALUES ('16', '1', '1', '14', '2017-06-25', '16:27:35', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: Hugo Galicia Razo, Sexo: 1, Correo: hugo@gmail.com, Telefono: 77266025', null);
INSERT INTO `message` VALUES ('17', '1', '1', '14', '2017-06-25', '16:27:35', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: Hugo Galicia Razo, Sexo: 1, Correo: hugo@gmail.com, Telefono: 77266025', null);
INSERT INTO `message` VALUES ('18', '1', '1', '14', '2017-06-25', '16:36:20', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: Maria Acevedo Manriquez, Sexo: 1, Correo: maria@gmail.com, Telefono: 9128752781', null);
INSERT INTO `message` VALUES ('19', '1', '1', '14', '2017-06-25', '16:36:21', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: Maria Acevedo Manriquez, Sexo: 1, Correo: maria@gmail.com, Telefono: 9128752781', null);
INSERT INTO `message` VALUES ('20', '1', '1', '14', '2017-06-25', '16:36:21', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: Maria Acevedo Manriquez, Sexo: 1, Correo: maria@gmail.com, Telefono: 9128752781', null);
INSERT INTO `message` VALUES ('21', '1', '1', '14', '2017-06-25', '16:42:28', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: JOSEFINA ENRIQUEZ PENIA, Sexo: 0, Correo: josefina@gmail.com, Telefono: 9128750017', null);
INSERT INTO `message` VALUES ('22', '1', '1', '14', '2017-06-25', '16:42:28', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: JOSEFINA ENRIQUEZ PENIA, Sexo: 0, Correo: josefina@gmail.com, Telefono: 9128750017', null);
INSERT INTO `message` VALUES ('23', '1', '1', '14', '2017-06-25', '16:42:29', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: JOSEFINA ENRIQUEZ PENIA, Sexo: 0, Correo: josefina@gmail.com, Telefono: 9128750017', null);
INSERT INTO `message` VALUES ('24', '1', '1', '14', '2017-06-25', '16:44:31', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: VICTORIA EUGENIA CUEVAS JIMENEZ, Sexo: 0, Correo: VICTORIA@gmail.com, Telefono: 912875427354499', null);
INSERT INTO `message` VALUES ('25', '1', '1', '14', '2017-06-25', '16:44:31', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: VICTORIA EUGENIA CUEVAS JIMENEZ, Sexo: 0, Correo: VICTORIA@gmail.com, Telefono: 912875427354499', null);
INSERT INTO `message` VALUES ('26', '1', '1', '14', '2017-06-25', '16:44:31', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: VICTORIA EUGENIA CUEVAS JIMENEZ, Sexo: 0, Correo: VICTORIA@gmail.com, Telefono: 912875427354499', null);
INSERT INTO `message` VALUES ('27', '1', '1', '14', '2017-06-25', '16:46:44', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: CAMILO CAMILO MORA MUÃ‘OZ, Sexo: 1, Correo: camilo@gmai.com, Telefono: 9128753932', null);
INSERT INTO `message` VALUES ('28', '1', '1', '14', '2017-06-25', '16:46:45', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: CAMILO CAMILO MORA MUÃ‘OZ, Sexo: 1, Correo: camilo@gmai.com, Telefono: 9128753932', null);
INSERT INTO `message` VALUES ('29', '1', '1', '14', '2017-06-25', '16:46:45', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: CAMILO CAMILO MORA MUÃ‘OZ, Sexo: 1, Correo: camilo@gmai.com, Telefono: 9128753932', null);
INSERT INTO `message` VALUES ('30', '1', '1', '14', '2017-06-25', '16:49:09', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: ISIDRO BRAVO UBIETA, Sexo: 1, Correo: isidro@gmail.com, Telefono: 128753665', null);
INSERT INTO `message` VALUES ('31', '1', '1', '14', '2017-06-25', '16:49:09', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: ISIDRO BRAVO UBIETA, Sexo: 1, Correo: isidro@gmail.com, Telefono: 128753665', null);
INSERT INTO `message` VALUES ('32', '1', '1', '14', '2017-06-25', '16:49:09', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: ISIDRO BRAVO UBIETA, Sexo: 1, Correo: isidro@gmail.com, Telefono: 128753665', null);
INSERT INTO `message` VALUES ('33', '1', '1', '14', '2017-06-25', '16:50:42', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: IBIS IVONNE JUAREZ GAVITO, Sexo: 0, Correo: IBIS@gmail.com, Telefono: 321354634', null);
INSERT INTO `message` VALUES ('34', '1', '1', '14', '2017-06-25', '16:50:42', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: IBIS IVONNE JUAREZ GAVITO, Sexo: 0, Correo: IBIS@gmail.com, Telefono: 321354634', null);
INSERT INTO `message` VALUES ('35', '1', '1', '14', '2017-06-25', '16:50:42', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: IBIS IVONNE JUAREZ GAVITO, Sexo: 0, Correo: IBIS@gmail.com, Telefono: 321354634', null);
INSERT INTO `message` VALUES ('36', '1', '1', '14', '2017-06-25', '16:52:15', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: HECTOR IGNACIO GOMEZ FUENTES, Sexo: 1, Correo: HECTOR@gmail.com, Telefono: 1324564534', null);
INSERT INTO `message` VALUES ('37', '1', '1', '14', '2017-06-25', '16:52:16', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: HECTOR IGNACIO GOMEZ FUENTES, Sexo: 1, Correo: HECTOR@gmail.com, Telefono: 1324564534', null);
INSERT INTO `message` VALUES ('38', '1', '1', '14', '2017-06-25', '16:52:16', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: HECTOR IGNACIO GOMEZ FUENTES, Sexo: 1, Correo: HECTOR@gmail.com, Telefono: 1324564534', null);
INSERT INTO `message` VALUES ('39', '1', '1', '14', '2017-06-25', '16:54:18', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: DONACIANO MERINO AGUILAR, Sexo: 1, Correo: DONACIANO@gmail.com, Telefono: 42454686', null);
INSERT INTO `message` VALUES ('40', '1', '1', '14', '2017-06-25', '16:54:18', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: DONACIANO MERINO AGUILAR, Sexo: 1, Correo: DONACIANO@gmail.com, Telefono: 42454686', null);
INSERT INTO `message` VALUES ('41', '1', '1', '14', '2017-06-25', '16:54:18', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: DONACIANO MERINO AGUILAR, Sexo: 1, Correo: DONACIANO@gmail.com, Telefono: 42454686', null);
INSERT INTO `message` VALUES ('42', '1', '1', '14', '2017-06-25', '16:56:18', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: JUAN CARLOS OLIVO FERNANDEZ, Sexo: 1, Correo: JUAN@gmail.com, Telefono: 345213466', null);
INSERT INTO `message` VALUES ('43', '1', '1', '14', '2017-06-25', '16:56:18', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: JUAN CARLOS OLIVO FERNANDEZ, Sexo: 1, Correo: JUAN@gmail.com, Telefono: 345213466', null);
INSERT INTO `message` VALUES ('44', '1', '1', '14', '2017-06-25', '16:56:18', '1', 'Registro de nuevo usuario: 3', 'Nuevo Usuario Registrado: con  nombre: JUAN CARLOS OLIVO FERNANDEZ, Sexo: 1, Correo: JUAN@gmail.com, Telefono: 345213466', null);
INSERT INTO `message` VALUES ('45', '1', '1', '14', '2017-06-25', '16:58:06', '1', 'Registro de nuevo usuario: 2', 'Nuevo Usuario Registrado: con  nombre: REGINA GONZALEZ ALUJO, Sexo: 0, Correo: regina@gmail.com, Telefono: 53434544', null);
INSERT INTO `message` VALUES ('46', '1', '1', '14', '2017-06-25', '16:58:06', '1', 'Registro de nuevo usuario: 2', 'Nuevo Usuario Registrado: con  nombre: REGINA GONZALEZ ALUJO, Sexo: 0, Correo: regina@gmail.com, Telefono: 53434544', null);
INSERT INTO `message` VALUES ('47', '1', '1', '14', '2017-06-25', '16:58:06', '1', 'Registro de nuevo usuario: 2', 'Nuevo Usuario Registrado: con  nombre: REGINA GONZALEZ ALUJO, Sexo: 0, Correo: regina@gmail.com, Telefono: 53434544', null);
INSERT INTO `message` VALUES ('48', '3', '1', '6', '2015-01-01', '17:38:19', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('49', '3', '1', '6', '2015-01-01', '17:38:19', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('50', '3', '1', '6', '2015-01-01', '17:38:20', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('51', '3', '2', '6', '2015-01-01', '17:38:20', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('52', '3', '2', '6', '2015-01-01', '17:38:20', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('53', '3', '2', '6', '2015-01-01', '17:38:20', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('54', '3', '46', '6', '2015-01-01', '17:38:20', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('55', '3', '46', '6', '2015-01-01', '17:38:20', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('56', '3', '46', '6', '2015-01-01', '17:38:20', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-01 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('57', '3', '1', '2', '2015-01-02', '06:14:08', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('58', '3', '1', '2', '2015-01-02', '06:14:08', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('59', '3', '1', '2', '2015-01-02', '06:14:08', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('60', '3', '2', '2', '2015-01-02', '06:14:08', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('61', '3', '2', '2', '2015-01-02', '06:14:08', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('62', '3', '2', '2', '2015-01-02', '06:14:08', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('63', '3', '46', '2', '2015-01-02', '06:14:09', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('64', '3', '46', '2', '2015-01-02', '06:14:09', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('65', '3', '46', '2', '2015-01-02', '06:14:09', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-02 por el usuario cliente gmailcon el correo electronico: .</p><p>Las fechas de la reserva son en fechas del:2015-01-02 a 2015-01-03 con n&uacute;mero de reserva28, n&uacute;mero de tarjeta 13216545, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('66', '40', '1', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('67', '40', '1', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('68', '40', '1', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('69', '40', '2', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('70', '40', '2', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('71', '40', '2', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('72', '40', '46', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('73', '40', '46', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('74', '40', '46', '6', '2015-01-02', '06:22:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('75', '39', '1', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('76', '39', '1', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('77', '39', '1', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('78', '39', '2', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('79', '39', '2', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('80', '39', '2', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('81', '39', '46', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('82', '39', '46', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('83', '39', '46', '6', '2015-01-02', '06:30:05', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('84', '39', '1', '6', '2015-01-02', '09:05:37', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('85', '39', '1', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('86', '39', '1', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('87', '39', '2', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('88', '39', '2', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('89', '39', '2', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('90', '39', '46', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('91', '39', '46', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('92', '39', '46', '6', '2015-01-02', '09:05:38', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-02 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('93', '3', '1', '3', '2015-01-03', '06:19:30', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 28 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('94', '3', '1', '3', '2015-01-03', '06:19:30', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 28 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('95', '3', '1', '3', '2015-01-03', '06:19:31', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 28 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('96', '39', '1', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('97', '39', '1', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('98', '39', '1', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('99', '39', '2', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('100', '39', '2', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('101', '39', '2', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('102', '39', '46', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('103', '39', '46', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('104', '39', '46', '2', '2015-01-03', '06:25:37', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva32, n&uacute;mero de tarjeta 4656, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('105', '39', '1', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('106', '39', '1', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('107', '39', '1', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('108', '39', '2', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('109', '39', '2', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('110', '39', '2', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('111', '39', '46', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('112', '39', '46', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('113', '39', '46', '2', '2015-01-03', '06:25:44', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario VICTORIA EUGENIA CUEVAS JIMENEZcon el correo electronico: VICTORIA@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva30, n&uacute;mero de tarjeta 4646546, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('114', '40', '1', '2', '2015-01-03', '06:30:41', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('115', '40', '1', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('116', '40', '1', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('117', '40', '2', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('118', '40', '2', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('119', '40', '2', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('120', '40', '46', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('121', '40', '46', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('122', '40', '46', '2', '2015-01-03', '06:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-03 por el usuario CAMILO CAMILO MORA MUÃ‘OZcon el correo electronico: camilo@gmai.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-03 a 2015-01-04 con n&uacute;mero de reserva29, n&uacute;mero de tarjeta 43245346, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('123', '40', '1', '3', '2015-01-04', '06:49:02', '1', 'Salida de un Huesped: camilo@gmai.com', 'El h&uacute;esped: CAMILO CAMILO MORA MUÃ‘OZ  con n&uacute;mero de registro: 29 \r\n                    con correo Electronico: camilo@gmai.com nacido en: 1989-06-03<br>', null);
INSERT INTO `message` VALUES ('124', '40', '1', '3', '2015-01-04', '06:49:02', '1', 'Salida de un Huesped: camilo@gmai.com', 'El h&uacute;esped: CAMILO CAMILO MORA MUÃ‘OZ  con n&uacute;mero de registro: 29 \r\n                    con correo Electronico: camilo@gmai.com nacido en: 1989-06-03<br>', null);
INSERT INTO `message` VALUES ('125', '40', '1', '3', '2015-01-04', '06:49:02', '1', 'Salida de un Huesped: camilo@gmai.com', 'El h&uacute;esped: CAMILO CAMILO MORA MUÃ‘OZ  con n&uacute;mero de registro: 29 \r\n                    con correo Electronico: camilo@gmai.com nacido en: 1989-06-03<br>', null);
INSERT INTO `message` VALUES ('126', '39', '1', '3', '2015-01-04', '06:49:35', '1', 'Salida de un Huesped: VICTORIA@gmail.com', 'El h&uacute;esped: VICTORIA EUGENIA CUEVAS JIMENEZ  con n&uacute;mero de registro: 32 \r\n                    con correo Electronico: VICTORIA@gmail.com nacido en: 1986-12-17<br>', null);
INSERT INTO `message` VALUES ('127', '39', '1', '3', '2015-01-04', '06:49:35', '1', 'Salida de un Huesped: VICTORIA@gmail.com', 'El h&uacute;esped: VICTORIA EUGENIA CUEVAS JIMENEZ  con n&uacute;mero de registro: 32 \r\n                    con correo Electronico: VICTORIA@gmail.com nacido en: 1986-12-17<br>', null);
INSERT INTO `message` VALUES ('128', '39', '1', '3', '2015-01-04', '06:49:35', '1', 'Salida de un Huesped: VICTORIA@gmail.com', 'El h&uacute;esped: VICTORIA EUGENIA CUEVAS JIMENEZ  con n&uacute;mero de registro: 32 \r\n                    con correo Electronico: VICTORIA@gmail.com nacido en: 1986-12-17<br>', null);
INSERT INTO `message` VALUES ('129', '39', '1', '3', '2015-01-04', '06:50:00', '1', 'Salida de un Huesped: VICTORIA@gmail.com', 'El h&uacute;esped: VICTORIA EUGENIA CUEVAS JIMENEZ  con n&uacute;mero de registro: 30 \r\n                    con correo Electronico: VICTORIA@gmail.com nacido en: 1986-12-17<br>', null);
INSERT INTO `message` VALUES ('130', '39', '1', '3', '2015-01-04', '06:50:00', '1', 'Salida de un Huesped: VICTORIA@gmail.com', 'El h&uacute;esped: VICTORIA EUGENIA CUEVAS JIMENEZ  con n&uacute;mero de registro: 30 \r\n                    con correo Electronico: VICTORIA@gmail.com nacido en: 1986-12-17<br>', null);
INSERT INTO `message` VALUES ('131', '39', '1', '3', '2015-01-04', '06:50:00', '1', 'Salida de un Huesped: VICTORIA@gmail.com', 'El h&uacute;esped: VICTORIA EUGENIA CUEVAS JIMENEZ  con n&uacute;mero de registro: 30 \r\n                    con correo Electronico: VICTORIA@gmail.com nacido en: 1986-12-17<br>', null);
INSERT INTO `message` VALUES ('132', '41', '1', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('133', '41', '1', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('134', '41', '1', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('135', '41', '2', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('136', '41', '2', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('137', '41', '2', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('138', '41', '46', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('139', '41', '46', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('140', '41', '46', '6', '2015-01-04', '07:10:18', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-04 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('141', '41', '1', '2', '2015-01-05', '07:55:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('142', '41', '1', '2', '2015-01-05', '07:55:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('143', '41', '1', '2', '2015-01-05', '07:55:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('144', '41', '2', '2', '2015-01-05', '07:55:29', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('145', '41', '2', '2', '2015-01-05', '07:55:29', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('146', '41', '2', '2', '2015-01-05', '07:55:29', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('147', '41', '46', '2', '2015-01-05', '07:55:29', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('148', '41', '46', '2', '2015-01-05', '07:55:29', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('149', '41', '46', '2', '2015-01-05', '07:55:29', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-05 por el usuario ISIDRO BRAVO UBIETAcon el correo electronico: isidro@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-05 a 2015-01-06 con n&uacute;mero de reserva33, n&uacute;mero de tarjeta , tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('150', '41', '1', '3', '2015-01-06', '07:58:37', '1', 'Salida de un Huesped: isidro@gmail.com', 'El h&uacute;esped: ISIDRO BRAVO UBIETA  con n&uacute;mero de registro: 33 \r\n                    con correo Electronico: isidro@gmail.com nacido en: 1998-06-05<br>', null);
INSERT INTO `message` VALUES ('151', '41', '1', '3', '2015-01-06', '07:58:37', '1', 'Salida de un Huesped: isidro@gmail.com', 'El h&uacute;esped: ISIDRO BRAVO UBIETA  con n&uacute;mero de registro: 33 \r\n                    con correo Electronico: isidro@gmail.com nacido en: 1998-06-05<br>', null);
INSERT INTO `message` VALUES ('152', '41', '1', '3', '2015-01-06', '07:58:37', '1', 'Salida de un Huesped: isidro@gmail.com', 'El h&uacute;esped: ISIDRO BRAVO UBIETA  con n&uacute;mero de registro: 33 \r\n                    con correo Electronico: isidro@gmail.com nacido en: 1998-06-05<br>', null);
INSERT INTO `message` VALUES ('153', '3', '1', '6', '2015-01-06', '08:24:52', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('154', '3', '1', '6', '2015-01-06', '08:24:52', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('155', '3', '1', '6', '2015-01-06', '08:24:52', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('156', '3', '2', '6', '2015-01-06', '08:24:52', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('157', '3', '2', '6', '2015-01-06', '08:24:52', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('158', '3', '2', '6', '2015-01-06', '08:24:52', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('159', '3', '46', '6', '2015-01-06', '08:24:52', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('160', '3', '46', '6', '2015-01-06', '08:24:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('161', '3', '46', '6', '2015-01-06', '08:24:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-06 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('162', '3', '1', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('163', '3', '1', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('164', '3', '1', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('165', '3', '2', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('166', '3', '2', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('167', '3', '2', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('168', '3', '46', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('169', '3', '46', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('170', '3', '46', '2', '2015-01-07', '08:27:15', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-07 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-07 a 2015-01-08 con n&uacute;mero de reserva35, n&uacute;mero de tarjeta 354665564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('171', '3', '1', '3', '2015-01-08', '08:36:10', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 35 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('172', '3', '1', '3', '2015-01-08', '08:36:10', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 35 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('173', '3', '1', '3', '2015-01-08', '08:36:10', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 35 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('174', '70', '1', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('175', '70', '1', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('176', '70', '1', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('177', '70', '2', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('178', '70', '2', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('179', '70', '2', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('180', '70', '46', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('181', '70', '46', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('182', '70', '46', '6', '2015-01-08', '00:30:01', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-27 a 2017-06-28 con n&uacute;mero de reserva36, n&uacute;mero de tarjeta 4231354, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('183', '74', '1', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('184', '74', '1', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('185', '74', '1', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('186', '74', '2', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('187', '74', '2', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('188', '74', '2', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('189', '74', '46', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('190', '74', '46', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('191', '74', '46', '6', '2015-01-08', '00:50:57', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-08 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('192', '74', '1', '2', '2015-01-09', '06:13:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('193', '74', '1', '2', '2015-01-09', '06:13:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('194', '74', '1', '2', '2015-01-09', '06:13:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('195', '74', '2', '2', '2015-01-09', '06:13:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('196', '74', '2', '2', '2015-01-09', '06:13:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('197', '74', '2', '2', '2015-01-09', '06:13:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('198', '74', '46', '2', '2015-01-09', '06:13:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('199', '74', '46', '2', '2015-01-09', '06:13:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('200', '74', '46', '2', '2015-01-09', '06:13:28', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-09 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-09 a 2015-01-10 con n&uacute;mero de reserva37, n&uacute;mero de tarjeta 34645654, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('201', '74', '1', '3', '2015-01-10', '06:15:22', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 37 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('202', '74', '1', '3', '2015-01-10', '06:15:22', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 37 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('203', '74', '1', '3', '2015-01-10', '06:15:22', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 37 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('204', '81', '1', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('205', '81', '1', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('206', '81', '1', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('207', '81', '2', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('208', '81', '2', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('209', '81', '2', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('210', '81', '46', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('211', '81', '46', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('212', '81', '46', '6', '2015-01-10', '06:54:53', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('213', '84', '1', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('214', '84', '1', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('215', '84', '1', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('216', '84', '2', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('217', '84', '2', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('218', '84', '2', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('219', '84', '46', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('220', '84', '46', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('221', '84', '46', '6', '2015-01-10', '07:23:03', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2015-01-10 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('222', '81', '1', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('223', '81', '1', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('224', '81', '1', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('225', '81', '2', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('226', '81', '2', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('227', '81', '2', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('228', '81', '46', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('229', '81', '46', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('230', '81', '46', '2', '2015-01-11', '07:25:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario morisato kenji arimacon el correo electronico: kenji@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva39, n&uacute;mero de tarjeta 44534685453, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('231', '84', '1', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('232', '84', '1', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('233', '84', '1', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('234', '84', '2', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('235', '84', '2', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('236', '84', '2', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('237', '84', '46', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('238', '84', '46', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('239', '84', '46', '2', '2015-01-11', '07:27:40', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-01-11 por el usuario silope arce venadocon el correo electronico: silope@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-01-11 a 2015-01-12 con n&uacute;mero de reserva40, n&uacute;mero de tarjeta 343546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('240', '84', '1', '3', '2015-01-12', '05:01:29', '1', 'Salida de un Huesped: silope@gmail.com', 'El h&uacute;esped: silope arce venado  con n&uacute;mero de registro: 40 \r\n                    con correo Electronico: silope@gmail.com nacido en: 2005-01-01<br>', null);
INSERT INTO `message` VALUES ('241', '84', '1', '3', '2015-01-12', '05:01:29', '1', 'Salida de un Huesped: silope@gmail.com', 'El h&uacute;esped: silope arce venado  con n&uacute;mero de registro: 40 \r\n                    con correo Electronico: silope@gmail.com nacido en: 2005-01-01<br>', null);
INSERT INTO `message` VALUES ('242', '84', '1', '3', '2015-01-12', '05:01:29', '1', 'Salida de un Huesped: silope@gmail.com', 'El h&uacute;esped: silope arce venado  con n&uacute;mero de registro: 40 \r\n                    con correo Electronico: silope@gmail.com nacido en: 2005-01-01<br>', null);
INSERT INTO `message` VALUES ('243', '81', '1', '3', '2015-01-12', '05:02:02', '1', 'Salida de un Huesped: kenji@gmail.com', 'El h&uacute;esped: morisato kenji arima  con n&uacute;mero de registro: 39 \r\n                    con correo Electronico: kenji@gmail.com nacido en: 2005-01-02<br>', null);
INSERT INTO `message` VALUES ('244', '81', '1', '3', '2015-01-12', '05:02:02', '1', 'Salida de un Huesped: kenji@gmail.com', 'El h&uacute;esped: morisato kenji arima  con n&uacute;mero de registro: 39 \r\n                    con correo Electronico: kenji@gmail.com nacido en: 2005-01-02<br>', null);
INSERT INTO `message` VALUES ('245', '81', '1', '3', '2015-01-12', '05:02:02', '1', 'Salida de un Huesped: kenji@gmail.com', 'El h&uacute;esped: morisato kenji arima  con n&uacute;mero de registro: 39 \r\n                    con correo Electronico: kenji@gmail.com nacido en: 2005-01-02<br>', null);
INSERT INTO `message` VALUES ('246', '1', '1', '14', '2017-06-26', '03:41:03', '1', 'Registro de nuevo usuario: 4', 'Nuevo Usuario Registrado: con  nombre: cocina cocina, Sexo: 1, Correo: cocina@gmail.com, Telefono: 34556546', null);
INSERT INTO `message` VALUES ('247', '1', '1', '14', '2017-06-26', '03:41:03', '1', 'Registro de nuevo usuario: 4', 'Nuevo Usuario Registrado: con  nombre: cocina cocina, Sexo: 1, Correo: cocina@gmail.com, Telefono: 34556546', null);
INSERT INTO `message` VALUES ('248', '1', '1', '14', '2017-06-26', '03:41:03', '1', 'Registro de nuevo usuario: 4', 'Nuevo Usuario Registrado: con  nombre: cocina cocina, Sexo: 1, Correo: cocina@gmail.com, Telefono: 34556546', null);
INSERT INTO `message` VALUES ('249', '1', '1', '14', '2017-06-26', '03:46:07', '1', 'Registro de nuevo usuario: 5', 'Nuevo Usuario Registrado: con  nombre: servicio servicio, Sexo: 1, Correo: servicio@gmail.com, Telefono: 456464565', null);
INSERT INTO `message` VALUES ('250', '1', '1', '14', '2017-06-26', '03:46:07', '1', 'Registro de nuevo usuario: 5', 'Nuevo Usuario Registrado: con  nombre: servicio servicio, Sexo: 1, Correo: servicio@gmail.com, Telefono: 456464565', null);
INSERT INTO `message` VALUES ('251', '1', '1', '14', '2017-06-26', '03:46:07', '1', 'Registro de nuevo usuario: 5', 'Nuevo Usuario Registrado: con  nombre: servicio servicio, Sexo: 1, Correo: servicio@gmail.com, Telefono: 456464565', null);
INSERT INTO `message` VALUES ('252', '3', '1', '2', '2015-02-05', '04:28:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('253', '3', '1', '2', '2015-02-05', '04:28:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('254', '3', '1', '2', '2015-02-05', '04:28:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('255', '3', '2', '2', '2015-02-05', '04:28:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('256', '3', '2', '2', '2015-02-05', '04:28:05', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('257', '3', '2', '2', '2015-02-05', '04:28:05', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('258', '3', '46', '2', '2015-02-05', '04:28:05', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('259', '3', '46', '2', '2015-02-05', '04:28:05', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('260', '3', '46', '2', '2015-02-05', '04:28:05', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-05 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-05 a 2015-02-06 con n&uacute;mero de reserva42, n&uacute;mero de tarjeta 54645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('261', '3', '1', '3', '2015-02-26', '08:57:49', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 42 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('262', '3', '1', '3', '2015-02-26', '08:57:49', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 42 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('263', '3', '1', '3', '2015-02-26', '08:57:49', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 42 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('264', '100', '1', '2', '2015-02-26', '09:15:17', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('265', '100', '1', '2', '2015-02-26', '09:15:17', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('266', '100', '1', '2', '2015-02-26', '09:15:17', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('267', '100', '2', '2', '2015-02-26', '09:15:17', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('268', '100', '2', '2', '2015-02-26', '09:15:17', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('269', '100', '2', '2', '2015-02-26', '09:15:17', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('270', '100', '46', '2', '2015-02-26', '09:15:18', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('271', '100', '46', '2', '2015-02-26', '09:15:18', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('272', '100', '46', '2', '2015-02-26', '09:15:18', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-02-26 por el usuario blalvla blslsscon el correo electronico: blalbla@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-02-26 a 2015-03-05 con n&uacute;mero de reserva44, n&uacute;mero de tarjeta 2138465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('273', '100', '1', '3', '2015-03-05', '09:16:26', '1', 'Salida de un Huesped: blalbla@gmail.com', 'El h&uacute;esped: blalvla blslss  con n&uacute;mero de registro: 44 \r\n                    con correo Electronico: blalbla@gmail.com nacido en: 2005-02-01<br>', null);
INSERT INTO `message` VALUES ('274', '100', '1', '3', '2015-03-05', '09:16:26', '1', 'Salida de un Huesped: blalbla@gmail.com', 'El h&uacute;esped: blalvla blslss  con n&uacute;mero de registro: 44 \r\n                    con correo Electronico: blalbla@gmail.com nacido en: 2005-02-01<br>', null);
INSERT INTO `message` VALUES ('275', '100', '1', '3', '2015-03-05', '09:16:26', '1', 'Salida de un Huesped: blalbla@gmail.com', 'El h&uacute;esped: blalvla blslss  con n&uacute;mero de registro: 44 \r\n                    con correo Electronico: blalbla@gmail.com nacido en: 2005-02-01<br>', null);
INSERT INTO `message` VALUES ('276', '103', '1', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('277', '103', '1', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('278', '103', '1', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('279', '103', '2', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('280', '103', '2', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('281', '103', '2', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('282', '103', '46', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('283', '103', '46', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('284', '103', '46', '2', '2015-03-05', '09:21:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-05 por el usuario sdlsdfsdfsd jdkljlfgcon el correo electronico: sdssdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-05 a 2015-03-06 con n&uacute;mero de reserva45, n&uacute;mero de tarjeta 456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('285', '103', '1', '3', '2015-03-06', '09:21:28', '1', 'Salida de un Huesped: sdssdf@gmail.com', 'El h&uacute;esped: sdlsdfsdfsd jdkljlfg  con n&uacute;mero de registro: 45 \r\n                    con correo Electronico: sdssdf@gmail.com nacido en: 2005-03-01<br>', null);
INSERT INTO `message` VALUES ('286', '103', '1', '3', '2015-03-06', '09:21:28', '1', 'Salida de un Huesped: sdssdf@gmail.com', 'El h&uacute;esped: sdlsdfsdfsd jdkljlfg  con n&uacute;mero de registro: 45 \r\n                    con correo Electronico: sdssdf@gmail.com nacido en: 2005-03-01<br>', null);
INSERT INTO `message` VALUES ('287', '103', '1', '3', '2015-03-06', '09:21:28', '1', 'Salida de un Huesped: sdssdf@gmail.com', 'El h&uacute;esped: sdlsdfsdfsd jdkljlfg  con n&uacute;mero de registro: 45 \r\n                    con correo Electronico: sdssdf@gmail.com nacido en: 2005-03-01<br>', null);
INSERT INTO `message` VALUES ('288', '106', '1', '2', '2015-03-31', '09:28:00', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('289', '106', '1', '2', '2015-03-31', '09:28:00', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('290', '106', '1', '2', '2015-03-31', '09:28:00', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('291', '106', '2', '2', '2015-03-31', '09:28:00', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('292', '106', '2', '2', '2015-03-31', '09:28:00', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('293', '106', '2', '2', '2015-03-31', '09:28:00', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('294', '106', '46', '2', '2015-03-31', '09:28:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('295', '106', '46', '2', '2015-03-31', '09:28:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('296', '106', '46', '2', '2015-03-31', '09:28:01', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-03-31 por el usuario dororoki kuncon el correo electronico: dodo@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2015-03-31 a 2015-04-15 con n&uacute;mero de reserva46, n&uacute;mero de tarjeta 46546456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('297', '106', '1', '3', '2015-04-15', '09:28:28', '1', 'Salida de un Huesped: dodo@gmail.com', 'El h&uacute;esped: dororoki kun  con n&uacute;mero de registro: 46 \r\n                    con correo Electronico: dodo@gmail.com nacido en: 2005-03-02<br>', null);
INSERT INTO `message` VALUES ('298', '106', '1', '3', '2015-04-15', '09:28:28', '1', 'Salida de un Huesped: dodo@gmail.com', 'El h&uacute;esped: dororoki kun  con n&uacute;mero de registro: 46 \r\n                    con correo Electronico: dodo@gmail.com nacido en: 2005-03-02<br>', null);
INSERT INTO `message` VALUES ('299', '106', '1', '3', '2015-04-15', '09:28:28', '1', 'Salida de un Huesped: dodo@gmail.com', 'El h&uacute;esped: dororoki kun  con n&uacute;mero de registro: 46 \r\n                    con correo Electronico: dodo@gmail.com nacido en: 2005-03-02<br>', null);
INSERT INTO `message` VALUES ('300', '109', '1', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('301', '109', '1', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('302', '109', '1', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('303', '109', '2', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('304', '109', '2', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('305', '109', '2', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('306', '109', '46', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('307', '109', '46', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('308', '109', '46', '2', '2015-05-15', '09:30:42', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2015-05-15 por el usuario sdskjdfsldkfj jkldjldgcon el correo electronico: dsdf@gmial.com.</p><p>Las fechas de la reserva son en fechas del:2015-05-15 a 2015-06-18 con n&uacute;mero de reserva47, n&uacute;mero de tarjeta 456456465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('309', '109', '1', '3', '2015-06-18', '09:31:31', '1', 'Salida de un Huesped: dsdf@gmial.com', 'El h&uacute;esped: sdskjdfsldkfj jkldjldg  con n&uacute;mero de registro: 47 \r\n                    con correo Electronico: dsdf@gmial.com nacido en: 2005-05-04<br>', null);
INSERT INTO `message` VALUES ('310', '109', '1', '3', '2015-06-18', '09:31:31', '1', 'Salida de un Huesped: dsdf@gmial.com', 'El h&uacute;esped: sdskjdfsldkfj jkldjldg  con n&uacute;mero de registro: 47 \r\n                    con correo Electronico: dsdf@gmial.com nacido en: 2005-05-04<br>', null);
INSERT INTO `message` VALUES ('311', '109', '1', '3', '2015-06-18', '09:31:31', '1', 'Salida de un Huesped: dsdf@gmial.com', 'El h&uacute;esped: sdskjdfsldkfj jkldjldg  con n&uacute;mero de registro: 47 \r\n                    con correo Electronico: dsdf@gmial.com nacido en: 2005-05-04<br>', null);
INSERT INTO `message` VALUES ('312', '3', '1', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('313', '3', '1', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('314', '3', '1', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('315', '3', '2', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('316', '3', '2', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('317', '3', '2', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('318', '3', '46', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('319', '3', '46', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('320', '3', '46', '2', '2017-04-18', '09:38:45', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-04-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-04-18 a 2017-04-19 con n&uacute;mero de reserva48, n&uacute;mero de tarjeta 546464, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('321', '3', '1', '3', '2017-04-19', '09:39:14', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 48 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('322', '3', '1', '3', '2017-04-19', '09:39:14', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 48 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('323', '3', '1', '3', '2017-04-19', '09:39:14', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 48 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('324', '114', '1', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('325', '114', '1', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('326', '114', '1', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('327', '114', '2', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('328', '114', '2', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('329', '114', '2', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('330', '114', '46', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('331', '114', '46', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('332', '114', '46', '2', '2017-05-19', '10:03:27', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-05-19 por el usuario fsddfsdfjhui hiuhihucon el correo electronico: sdsf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-05-19 a 2017-05-20 con n&uacute;mero de reserva49, n&uacute;mero de tarjeta 12365564, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('333', '114', '1', '3', '2017-05-20', '10:03:52', '1', 'Salida de un Huesped: sdsf@gmail.com', 'El h&uacute;esped: fsddfsdfjhui hiuhihu  con n&uacute;mero de registro: 49 \r\n                    con correo Electronico: sdsf@gmail.com nacido en: 2007-05-01<br>', null);
INSERT INTO `message` VALUES ('334', '114', '1', '3', '2017-05-20', '10:03:52', '1', 'Salida de un Huesped: sdsf@gmail.com', 'El h&uacute;esped: fsddfsdfjhui hiuhihu  con n&uacute;mero de registro: 49 \r\n                    con correo Electronico: sdsf@gmail.com nacido en: 2007-05-01<br>', null);
INSERT INTO `message` VALUES ('335', '114', '1', '3', '2017-05-20', '10:03:52', '1', 'Salida de un Huesped: sdsf@gmail.com', 'El h&uacute;esped: fsddfsdfjhui hiuhihu  con n&uacute;mero de registro: 49 \r\n                    con correo Electronico: sdsf@gmail.com nacido en: 2007-05-01<br>', null);
INSERT INTO `message` VALUES ('336', '119', '1', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('337', '119', '1', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('338', '119', '1', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('339', '119', '2', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('340', '119', '2', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('341', '119', '2', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('342', '119', '46', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('343', '119', '46', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('344', '119', '46', '2', '2017-06-19', '10:06:04', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-19 por el usuario sdffjsdkfsdf jsdklsdjfoicon el correo electronico: dsdf@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-19 a 2017-06-20 con n&uacute;mero de reserva50, n&uacute;mero de tarjeta 4665435465, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('345', '119', '1', '3', '2017-06-20', '10:07:23', '1', 'Salida de un Huesped: dsdf@gmail.com', 'El h&uacute;esped: sdffjsdkfsdf jsdklsdjfoi  con n&uacute;mero de registro: 50 \r\n                    con correo Electronico: dsdf@gmail.com nacido en: 2007-06-01<br>', null);
INSERT INTO `message` VALUES ('346', '119', '1', '3', '2017-06-20', '10:07:23', '1', 'Salida de un Huesped: dsdf@gmail.com', 'El h&uacute;esped: sdffjsdkfsdf jsdklsdjfoi  con n&uacute;mero de registro: 50 \r\n                    con correo Electronico: dsdf@gmail.com nacido en: 2007-06-01<br>', null);
INSERT INTO `message` VALUES ('347', '119', '1', '3', '2017-06-20', '10:07:23', '1', 'Salida de un Huesped: dsdf@gmail.com', 'El h&uacute;esped: sdffjsdkfsdf jsdklsdjfoi  con n&uacute;mero de registro: 50 \r\n                    con correo Electronico: dsdf@gmail.com nacido en: 2007-06-01<br>', null);
INSERT INTO `message` VALUES ('348', '122', '1', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('349', '122', '1', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('350', '122', '1', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('351', '122', '2', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('352', '122', '2', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('353', '122', '2', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('354', '122', '46', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('355', '122', '46', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('356', '122', '46', '6', '2017-06-20', '10:11:33', '1', 'Solicitud de reserva', '<p>Envio de soliciud de reserva en fecha 2017-06-20 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('357', '122', '1', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('358', '122', '1', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('359', '122', '1', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('360', '122', '2', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('361', '122', '2', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('362', '122', '2', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('363', '122', '46', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('364', '122', '46', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('365', '122', '46', '2', '2017-06-26', '10:14:55', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-26 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-26 a 2017-06-28 con n&uacute;mero de reserva51, n&uacute;mero de tarjeta 45687456, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('366', '3', '1', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('367', '3', '1', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('368', '3', '1', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('369', '3', '2', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('370', '3', '2', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('371', '3', '2', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('372', '3', '46', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('373', '3', '46', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('374', '3', '46', '2', '2017-06-18', '10:22:30', '1', 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2017-06-18 por el usuario cliente gmailcon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2017-06-18 a 2017-06-19 con n&uacute;mero de reserva52, n&uacute;mero de tarjeta 4654645, tipo de tarjetaBisa</p>', null);
INSERT INTO `message` VALUES ('375', '3', '1', '3', '2017-06-19', '10:23:47', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 52 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('376', '3', '1', '3', '2017-06-19', '10:23:47', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 52 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);
INSERT INTO `message` VALUES ('377', '3', '1', '3', '2017-06-19', '10:23:47', '1', 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente gmail  con n&uacute;mero de registro: 52 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 1999-06-01<br>', null);

-- ----------------------------
-- Table structure for occupation
-- ----------------------------
DROP TABLE IF EXISTS `occupation`;
CREATE TABLE `occupation` (
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONSUME_SERVICE`,`ID_ROOM`),
  KEY `FK_RELATIONSHIP_113` (`ID_ROOM`),
  CONSTRAINT `FK_RELATIONSHIP_113` FOREIGN KEY (`ID_ROOM`) REFERENCES `room` (`ID_ROOM`),
  CONSTRAINT `FK_RELATIONSHIP_116` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of occupation
-- ----------------------------
INSERT INTO `occupation` VALUES ('31', '1');
INSERT INTO `occupation` VALUES ('33', '1');
INSERT INTO `occupation` VALUES ('41', '1');
INSERT INTO `occupation` VALUES ('72', '1');
INSERT INTO `occupation` VALUES ('77', '1');
INSERT INTO `occupation` VALUES ('43', '2');
INSERT INTO `occupation` VALUES ('73', '2');
INSERT INTO `occupation` VALUES ('80', '2');
INSERT INTO `occupation` VALUES ('91', '2');
INSERT INTO `occupation` VALUES ('100', '2');
INSERT INTO `occupation` VALUES ('40', '3');
INSERT INTO `occupation` VALUES ('74', '3');
INSERT INTO `occupation` VALUES ('79', '3');
INSERT INTO `occupation` VALUES ('32', '4');
INSERT INTO `occupation` VALUES ('42', '4');
INSERT INTO `occupation` VALUES ('81', '4');
INSERT INTO `occupation` VALUES ('33', '5');
INSERT INTO `occupation` VALUES ('44', '5');
INSERT INTO `occupation` VALUES ('82', '5');
INSERT INTO `occupation` VALUES ('31', '6');
INSERT INTO `occupation` VALUES ('39', '6');
INSERT INTO `occupation` VALUES ('78', '6');
INSERT INTO `occupation` VALUES ('46', '7');
INSERT INTO `occupation` VALUES ('83', '7');
INSERT INTO `occupation` VALUES ('84', '7');
INSERT INTO `occupation` VALUES ('94', '7');
INSERT INTO `occupation` VALUES ('102', '7');
INSERT INTO `occupation` VALUES ('49', '8');
INSERT INTO `occupation` VALUES ('87', '8');
INSERT INTO `occupation` VALUES ('88', '8');
INSERT INTO `occupation` VALUES ('90', '8');
INSERT INTO `occupation` VALUES ('92', '8');
INSERT INTO `occupation` VALUES ('101', '8');
INSERT INTO `occupation` VALUES ('35', '9');
INSERT INTO `occupation` VALUES ('48', '9');
INSERT INTO `occupation` VALUES ('96', '9');
INSERT INTO `occupation` VALUES ('36', '10');
INSERT INTO `occupation` VALUES ('45', '10');
INSERT INTO `occupation` VALUES ('89', '10');
INSERT INTO `occupation` VALUES ('93', '10');
INSERT INTO `occupation` VALUES ('103', '10');
INSERT INTO `occupation` VALUES ('47', '11');
INSERT INTO `occupation` VALUES ('52', '12');
INSERT INTO `occupation` VALUES ('97', '12');
INSERT INTO `occupation` VALUES ('54', '13');
INSERT INTO `occupation` VALUES ('99', '13');
INSERT INTO `occupation` VALUES ('53', '14');
INSERT INTO `occupation` VALUES ('98', '14');
INSERT INTO `occupation` VALUES ('50', '15');
INSERT INTO `occupation` VALUES ('66', '15');
INSERT INTO `occupation` VALUES ('51', '16');
INSERT INTO `occupation` VALUES ('67', '16');
INSERT INTO `occupation` VALUES ('95', '16');

-- ----------------------------
-- Table structure for offer
-- ----------------------------
DROP TABLE IF EXISTS `offer`;
CREATE TABLE `offer` (
  `ID_OFFER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SERVICE` int(11) NOT NULL,
  `DATE_INI_OFFER` date NOT NULL,
  `TIME_INI_OFFER` time NOT NULL,
  `DATE_FIN_OFFER` date NOT NULL,
  `TIME_FIN_OFFER` time NOT NULL,
  `ACTIVE_OFFER` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_OFFER`),
  KEY `FK_RELATIONSHIP_74` (`ID_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_74` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of offer
-- ----------------------------
INSERT INTO `offer` VALUES ('1', '8', '2017-06-18', '00:00:00', '2017-06-30', '23:59:59', '1');

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `ID_PERSON` int(7) NOT NULL AUTO_INCREMENT,
  `NAME_PERSON` char(25) NOT NULL,
  `LAST_NAME_PERSON` char(25) NOT NULL,
  `LAST_NAME_PERSON2` char(25) NOT NULL,
  `SEX_PERSON` tinyint(1) NOT NULL,
  `DATE_BORN_PERSON` date NOT NULL,
  `EMAIL_PERSON` varchar(50) NOT NULL,
  `CITY_PERSON` char(30) NOT NULL,
  `COUNTRY_PERSON` char(30) NOT NULL,
  `ADDRESS_PERSON` varchar(250) NOT NULL,
  `DATE_REGISTER_PERSON` date NOT NULL,
  `IMAGE_PROFILE` varchar(250) NOT NULL,
  `POINT_PERSON` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERSON`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('1', 'admin', 'administrador', '', '1', '2006-02-01', 'admin@gmail.com', 'Cochabamba', 'Bolivia', 'Mimar Mehmet Aga Cad. Amiral Tafdil Sok. No:23 | Sultanahmet, Fatih, Estambul 34400, TurquÃ­a', '2017-06-17', 'img/perfil/20170617213905.jpg', '0');
INSERT INTO `person` VALUES ('2', 'recepcionista', 'cepscionista', '', '0', '1997-06-01', 'recepcion@gmail.com', 'Cochabamba', 'Bolivia', 'avenida siempre viva calle Nro5356', '2017-06-17', 'img/perfil/20170617234632.jpg', '0');
INSERT INTO `person` VALUES ('3', 'cliente', 'gmail', '', '1', '1999-06-01', 'cliente@gmail.com', 'sddsfsdfdf', 'Bolivia', 'urbanuzacion el buen lugar', '2017-06-17', 'img/perfil/20170617234847.jpg', '0');
INSERT INTO `person` VALUES ('36', 'Hugo', 'Galicia Razo', '', '1', '1980-06-05', 'hugo@gmail.com', 'Caracas', 'Venezuela', 'Pastores #123', '2017-06-25', 'img/perfil/20170625162734.jpg', '0');
INSERT INTO `person` VALUES ('37', 'Maria', 'Acevedo Manriquez', '', '1', '1997-06-07', 'maria@gmail.com', 'Cochabamba', 'Bolivia', 'CALLE AGUSTIN LARA NO. 69-B', '2017-06-25', 'img/perfil/20170625163620.jpg', '0');
INSERT INTO `person` VALUES ('38', 'JOSEFINA', 'ENRIQUEZ PENIA', '', '0', '1988-06-02', 'josefina@gmail.com', 'Tuxtepec', 'Mexico', 'AV. INDEPENDENCIA NO. 241', '2017-06-25', 'img/perfil/20170625164226.jpg', '0');
INSERT INTO `person` VALUES ('39', 'VICTORIA EUGENIA', 'CUEVAS JIMENEZ', '', '0', '1986-12-17', 'VICTORIA@gmail.com', '', 'Bolivia', 'AV. 20 DE NOVIEMBRE NO.1024', '2017-06-25', 'img/perfil/20170625164429.jpg', '0');
INSERT INTO `person` VALUES ('40', 'CAMILO', 'CAMILO MORA MUÃ‘OZ', '', '1', '1989-06-03', 'camilo@gmai.com', '', 'Bolivia', 'CARRETERA A LOMA ALTA S/N.', '2017-06-25', 'img/perfil/20170625164644.jpg', '0');
INSERT INTO `person` VALUES ('41', 'ISIDRO', 'BRAVO UBIETA', '', '1', '1998-06-05', 'isidro@gmail.com', '', 'Bolivia', 'CALLE ZARAGOZA NO. 1010', '2017-06-25', 'img/perfil/20170625164908.jpg', '0');
INSERT INTO `person` VALUES ('42', 'IBIS IVONNE', 'JUAREZ GAVITO', '', '0', '1988-06-03', 'IBIS@gmail.com', 'Santa cruz', 'Bolivia', 'CALLE MATAMOROS NO. 310', '2017-06-25', 'img/perfil/20170625165041.jpg', '0');
INSERT INTO `person` VALUES ('43', 'HECTOR IGNACIO', 'GOMEZ FUENTES', '', '1', '1977-06-09', 'HECTOR@gmail.com', 'La Paz', 'Bolivia', 'AV. 20 DE NOVIEMBRE NO.859-B', '2017-06-25', 'img/perfil/20170625165215.jpg', '0');
INSERT INTO `person` VALUES ('44', 'DONACIANO', 'MERINO AGUILAR', '', '1', '1989-06-08', 'DONACIANO@gmail.com', 'Cochabamba', 'Bolivia', 'BLVD. BENITO JUAREZ S / N', '2017-06-25', 'img/perfil/20170625165417.jpg', '0');
INSERT INTO `person` VALUES ('45', 'JUAN CARLOS', 'OLIVO FERNANDEZ', '', '1', '1988-06-16', 'JUAN@gmail.com', 'Sucre', 'Bolivia', 'MATAMOROS NO 85 ESQ. 20 DE NOVIEMBRE', '2017-06-25', 'img/perfil/20170625165617.jpg', '0');
INSERT INTO `person` VALUES ('46', 'REGINA', 'GONZALEZ ALUJO', '', '0', '1987-06-05', 'regina@gmail.com', 'Santiago', 'Chile', 'AV INDEPENDENCIA 565-A', '2017-06-25', 'img/perfil/20170625165805.jpg', '0');
INSERT INTO `person` VALUES ('47', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-02', '', '0');
INSERT INTO `person` VALUES ('48', 'manuel darios', 'esterpiscore', '', '1', '1997-01-06', '', '', 'Bahamas', 'av. siempre viva', '2015-01-02', '', '0');
INSERT INTO `person` VALUES ('49', 'juan', 'padilla', '', '1', '1997-01-09', '', '', 'Argentina', 'av. siempre viva', '2015-01-02', '', '0');
INSERT INTO `person` VALUES ('50', 'bernardo', 'moulin', '', '1', '1995-01-06', '', '', 'Argentina', 'lolopez', '2015-01-02', '', '0');
INSERT INTO `person` VALUES ('51', 'Daniel', 'paredes', '', '1', '2005-01-01', '', '', 'Uruguay', 'av. siempre viva', '2015-01-04', '', '0');
INSERT INTO `person` VALUES ('52', 'judas', 'iscariote', '', '1', '2005-01-04', '', '', 'Afghanistan', 'av. siempre viva', '2015-01-04', '', '0');
INSERT INTO `person` VALUES ('53', 'bacilio', 'contreras', '', '1', '2005-01-01', '', '', 'Colombia', 'perales', '2015-01-04', '', '0');
INSERT INTO `person` VALUES ('54', 'fabricio', 'agapito', '', '1', '2005-01-01', '', '', 'Ecuador', '', '2015-01-04', '', '0');
INSERT INTO `person` VALUES ('55', 'wilfredo', 'rigoberta', '', '1', '1996-01-10', '', '', 'Uruguay', 'av. siempre viva', '2015-01-04', '', '0');
INSERT INTO `person` VALUES ('56', 'roberto', 'mancilla', '', '1', '2005-01-01', '', '', 'Ecuador', 'av. siempre viva', '2015-01-04', '', '0');
INSERT INTO `person` VALUES ('57', 'manfred', 'lutiano', '', '1', '2005-01-01', '', '', 'Estonia', 'droroki', '2015-01-04', '', '0');
INSERT INTO `person` VALUES ('58', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('59', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('60', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('61', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('62', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('63', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('64', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('65', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('66', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('67', 'chimoltrufia', 'multro', '', '0', '1996-01-12', '', '', 'Bolivia', 'a', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('68', 'pepe', 'ustariz', '', '1', '2005-01-04', '', '', 'Chad', 'av. siempre viva', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('69', 'pretonila', 'petron', '', '0', '2005-01-03', '', '', 'Afghanistan', 'av. siempre viva', '2015-01-06', '', '0');
INSERT INTO `person` VALUES ('70', 'cliente', 'gmail', 'gmail', '1', '1999-06-01', 'cliente@gmail.com', '', 'Bolivia', 'urbanuzacion el buen lugar', '2017-06-26', 'img/perfil/20170617234847.jpg', '0');
INSERT INTO `person` VALUES ('71', 'bernandino', 'pandino', '', '1', '2005-01-07', '', '', 'Bolivia', 'av. siempre viva', '2017-06-26', '', '0');
INSERT INTO `person` VALUES ('72', 'joaquino', 'aquino', '', '1', '2005-01-07', '', '', 'Bahrain', 'av. siempre viva', '2017-06-26', '', '0');
INSERT INTO `person` VALUES ('73', 'marcelo', 'peredo', '', '1', '2005-01-06', '', '', 'Mexico', 'av. siempre viva', '2017-06-26', '', '0');
INSERT INTO `person` VALUES ('74', 'cliente', 'gmail', '', '1', '1999-06-01', 'cliente@gmail.com', '', 'Bolivia', 'urbanuzacion el buen lugar', '2015-01-08', 'img/perfil/20170617234847.jpg', '0');
INSERT INTO `person` VALUES ('75', 'nuevo', 'usuairo', '', '1', '2005-01-01', '', '', 'Bolivia', 'av. siempre viva', '2015-01-08', '', '0');
INSERT INTO `person` VALUES ('76', 'juan', 'martinez', '', '1', '2005-01-02', '', '', 'Ethiopia', 'av. siempre viva', '2015-01-08', '', '0');
INSERT INTO `person` VALUES ('77', 'apocope', 'porcino', '', '1', '2005-01-04', '', '', 'Chile', 'av. siempre viva', '2015-01-08', '', '0');
INSERT INTO `person` VALUES ('78', 'mario', 'marial', '', '1', '0000-00-00', 'marial@gmail.com', 'cbba', 'Bolivia', 'av', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('79', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('80', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('81', 'morisato', 'kenji arima', '', '1', '2005-01-02', 'kenji@gmail.com', '', 'Japan', 'av', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('82', 'severo', 'several', '', '1', '2005-01-05', '', '', 'Chad', 'severino', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('83', 'edgar', 'darios', '', '1', '2005-01-05', '', '', 'Pakistan', 'esdafas', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('84', 'silope', 'arce venado', '', '1', '2005-01-01', 'silope@gmail.com', 'Sucre', 'Bolivia', 'Av. Siempre viva', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('85', 'nuevoas', 'colon', '', '1', '2005-01-06', '', '', 'Portugal', 'av. siempre viva', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('86', 'aricarlos', 'arispe gamboa', '', '1', '2005-01-04', '', '', 'Estonia', 'av. siempre viva', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('87', 'carlitos', 'carlanga', '', '1', '2005-01-03', '', '', 'Armenia', 'av. siempre viva', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('88', 'mariano', 'madnril', '', '1', '2005-01-04', '', '', 'Cambodia', 'av. siempre viva', '2015-01-10', '', '0');
INSERT INTO `person` VALUES ('89', 'cocina', 'cocina', '', '1', '2007-06-01', 'cocina@gmail.com', 'cbba', 'Bolivia', 'cocina', '2017-06-26', 'img/perfil/20170626034446.jpg', '0');
INSERT INTO `person` VALUES ('90', 'servicio sss', 'servicio', '', '1', '2007-06-01', 'servicio@gmail.com', 'Cochabamva', 'Bolivia', 'servicios', '2017-06-26', 'img/perfil/20170626034646.jpg', '0');
INSERT INTO `person` VALUES ('91', '', '', '', '-1', '0000-00-00', '', '', '', '', '2017-06-26', '', '0');
INSERT INTO `person` VALUES ('92', '', '', '', '-1', '0000-00-00', '', '', '', '', '2017-06-26', '', '0');
INSERT INTO `person` VALUES ('93', '', '', '', '-1', '0000-00-00', '', '', '', '', '2017-06-26', '', '0');
INSERT INTO `person` VALUES ('94', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-02-05', '', '0');
INSERT INTO `person` VALUES ('95', 'juan', 'junios', '', '1', '2005-02-03', '', '', 'Afghanistan', 'av. siempre viva', '2015-02-05', '', '0');
INSERT INTO `person` VALUES ('96', 'jauan', 'juana', '', '0', '2005-01-06', '', '', 'Antigua And Barbuda', 'av. siempre viva', '2015-02-05', '', '0');
INSERT INTO `person` VALUES ('97', 'pericope', 'parrales', '', '1', '2005-02-01', 'pericope@gmail.com', 'CBBA', 'Bolivia', 'Av. Siempre viva', '2015-02-26', '', '0');
INSERT INTO `person` VALUES ('98', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-02-26', '', '0');
INSERT INTO `person` VALUES ('99', '', '', '', '-1', '0000-00-00', '', '', '', '', '2015-02-26', '', '0');
INSERT INTO `person` VALUES ('100', 'blalvla', 'blslss', '', '1', '2005-02-01', 'blalbla@gmail.com', 'cbba', 'Bolivia', 'cocina', '2015-02-26', '', '0');
INSERT INTO `person` VALUES ('101', 'mamanu', 'manamim', '', '1', '2005-02-02', '', '', 'Bahamas', 'appinvnto', '2015-02-26', '', '0');
INSERT INTO `person` VALUES ('102', 'juan', 'juanirt', '', '0', '2005-02-12', '', '', 'Argentina', 'sdfdssfdfds', '2015-02-26', '', '0');
INSERT INTO `person` VALUES ('103', 'sdlsdfsdfsd', 'jdkljlfg', '', '1', '2005-03-01', 'sdssdf@gmail.com', 'sdfsdf', 'Denmark', 'sdfsdfsfsdf', '2015-03-05', '', '0');
INSERT INTO `person` VALUES ('104', 'dldkfdflkgjf', 'jdfldfjg', '', '1', '2005-03-02', '', '', 'Afghanistan', 'dfjgdh', '2015-03-05', '', '0');
INSERT INTO `person` VALUES ('105', 'xdddjsdkfjksdf', 'sdsfdsdf', '', '1', '2005-03-04', '', '', 'Afghanistan', 'sdfdfsdf', '2015-03-05', '', '0');
INSERT INTO `person` VALUES ('106', 'dororoki', 'kun', '', '1', '2005-03-02', 'dodo@gmail.com', 'cbba', 'Bahamas', 'Address', '2015-03-31', '', '0');
INSERT INTO `person` VALUES ('107', 'manuel darios', 'ssdfsdf', '', '1', '2005-03-02', '', '', 'Afghanistan', 'sdfsdfsdf', '2015-03-31', '', '0');
INSERT INTO `person` VALUES ('108', 'ddfsdfsdf', 'ndsjkfsdfj', '', '1', '2005-03-06', '', '', 'Andorra', 'hjkhkjhi', '2015-03-31', '', '0');
INSERT INTO `person` VALUES ('109', 'sdskjdfsldkfj', 'jkldjldg', '', '1', '2005-05-04', 'dsdf@gmial.com', 'sdfsd', 'Afghanistan', 'sdsdfsdf', '2015-05-15', '', '50');
INSERT INTO `person` VALUES ('110', 'sdsdfsdj', 'jljlksdjfl', '', '1', '2005-05-04', '', '', 'Saint Barthelemy', 'jsdlfjsdof', '2015-05-15', '', '0');
INSERT INTO `person` VALUES ('111', '', '', '', '-1', '0000-00-00', '', '', '', '', '2017-04-18', '', '0');
INSERT INTO `person` VALUES ('112', 'sdlsdkf;sdfds', 'jiojdoifgjio', '', '1', '2007-04-04', '', '', 'Afghanistan', 'sidojfsdoifdsjo', '2017-04-18', '', '0');
INSERT INTO `person` VALUES ('113', 'dfsdfsdf', 'ksdlkjglkdfj', '', '1', '2007-04-11', '', '', 'Afghanistan', 'jkljl', '2017-04-18', '', '0');
INSERT INTO `person` VALUES ('114', 'fsddfsdfjhui', 'hiuhihu', '', '1', '2007-05-01', 'sdsf@gmail.com', 'sdsfsdfsd', 'Afghanistan', 'sdfdsfdsfd', '2017-05-19', '', '0');
INSERT INTO `person` VALUES ('115', 'dsdfsdf', 'jkdlfjdflg', '', '1', '2007-05-02', '', '', 'Jamaica', 'jsdklfsdjflk', '2017-05-19', '', '0');
INSERT INTO `person` VALUES ('116', 'ddfgfdgdfjkl', 'jskldfjsdlfj', '', '1', '2007-05-01', '', '', 'Afghanistan', 'skdfgdflkgdfj', '2017-05-19', '', '0');
INSERT INTO `person` VALUES ('117', 'sdfdffs', 'dkdsdfsdf', '', '1', '2007-05-08', '', '', 'Jamaica', 'sdklsfj', '2017-05-19', '', '0');
INSERT INTO `person` VALUES ('118', 'sdfsdfdfsd', 'sdfervre', '', '0', '2007-05-03', '', '', 'Afghanistan', 'sdsfserre', '2017-05-19', '', '0');
INSERT INTO `person` VALUES ('119', 'sdffjsdkfsdf', 'jsdklsdjfoi', '', '1', '2007-06-01', 'dsdf@gmail.com', 'ssdfsdfede', 'Afghanistan', 'dfsfsdfw', '2017-06-19', '', '0');
INSERT INTO `person` VALUES ('120', 'dlsjdfkldfj', 'jhsdfusdhu', '', '1', '2007-06-07', '', '', 'Afghanistan', 'dsjfsdfsu', '2017-06-19', '', '0');
INSERT INTO `person` VALUES ('121', 'sddfdsfdsf', 'sdfsdfdf', '', '1', '2007-06-09', '', '', 'Antarctica', 'dsdsfsdfe', '2017-06-19', '', '0');
INSERT INTO `person` VALUES ('122', 'cliente', 'gmail', '', '1', '1999-06-01', 'cliente@gmail.com', 'Cochabamba', 'Bolivia', 'urbanuzacion el buen lugar', '2017-06-20', 'img/perfil/20170617234847.jpg', '0');
INSERT INTO `person` VALUES ('123', 'mario', 'martines', '', '1', '1989-06-17', '', '', 'Bolivia', 'av. siempre viva', '2017-06-20', '', '0');
INSERT INTO `person` VALUES ('124', 'teresa', 'cantua', '', '1', '2007-06-01', '', '', 'Bahamas', 'av. siempre viva', '2017-06-20', '', '0');
INSERT INTO `person` VALUES ('125', '', '', '', '-1', '0000-00-00', '', '', '', '', '2017-06-18', '', '50');
INSERT INTO `person` VALUES ('126', 'sdfkjdfkljkljg', 'jldfjo', '', '1', '2007-06-13', '', '', 'Afghanistan', 'jdoi', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('127', 'sddfkjdklj', 'jlsdjdfsio', '', '1', '2007-06-07', '', '', 'Jamaica', 'jsiodfjio', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('128', 'sdflksdfdjsij', 'jiojoijo', '', '1', '2007-06-01', '', '', 'Jamaica', 'lfkdjfgoifd', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('129', 'dkljsdklfjo', 'jdiojio', '', '1', '2007-06-09', '', '', 'Afghanistan', 'dfdsdfsdf', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('130', 'sddfldkfj', 'jiodsjsdoi', '', '1', '2007-06-01', '', '', 'Afghanistan', 'joddjsoi', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('131', 'sdfsdffgg', 'sddfdfee', '', '0', '2007-06-01', '', '', 'Aland Islands', 'sdfdsfgr', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('132', 'dsdfkfjdlk', 'hdfhdfugh', '', '0', '2007-06-14', '', '', 'Afghanistan', 'odfhdfiu', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('133', 'sdsdfsdf', 'dfdfdfsd', '', '1', '2007-06-06', '', '', 'Bahamas', 'sddfdsfs', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('134', 'dfdsfjsdklfjoi', 'jioijojio', '', '0', '2007-06-01', '', '', 'Jamaica', 'joijdog', '2017-06-18', '', '0');
INSERT INTO `person` VALUES ('135', 'sddfhsdjkh', 'jkhjkhdjk', '', '1', '2007-06-09', '', '', 'Afghanistan', 'hjkdhdk', '2017-06-18', '', '0');

-- ----------------------------
-- Table structure for person_document
-- ----------------------------
DROP TABLE IF EXISTS `person_document`;
CREATE TABLE `person_document` (
  `NUMBER_DOCUMENT` decimal(25,0) NOT NULL,
  `ID_TYPE_DOCUMENT` int(11) NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `DATE_REGISTER_DOCUMENT` date NOT NULL,
  `TIME_REGISTER_DOCUMENT` time NOT NULL,
  PRIMARY KEY (`NUMBER_DOCUMENT`),
  KEY `FK_RELATIONSHIP_3` (`ID_TYPE_DOCUMENT`),
  KEY `FK_TIENE` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_TYPE_DOCUMENT`) REFERENCES `type_document` (`ID_TYPE_DOCUMENT`),
  CONSTRAINT `FK_TIENE` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person_document
-- ----------------------------
INSERT INTO `person_document` VALUES ('5', '1', '83', '2015-01-10', '06:54:30');
INSERT INTO `person_document` VALUES ('45649', '1', '116', '2017-05-19', '10:03:13');
INSERT INTO `person_document` VALUES ('54343', '1', '104', '2015-03-05', '09:20:32');
INSERT INTO `person_document` VALUES ('54456', '1', '106', '2015-03-31', '09:27:06');
INSERT INTO `person_document` VALUES ('326546', '1', '73', '2015-01-08', '00:20:19');
INSERT INTO `person_document` VALUES ('456456', '1', '113', '2017-04-18', '09:38:28');
INSERT INTO `person_document` VALUES ('456468', '1', '109', '2015-05-15', '09:30:06');
INSERT INTO `person_document` VALUES ('456489', '1', '128', '2017-06-18', '10:19:55');
INSERT INTO `person_document` VALUES ('464565', '1', '108', '2015-03-31', '09:27:47');
INSERT INTO `person_document` VALUES ('464566', '1', '110', '2015-05-15', '09:30:33');
INSERT INTO `person_document` VALUES ('464897', '1', '135', '2017-06-18', '10:22:24');
INSERT INTO `person_document` VALUES ('464989', '1', '133', '2017-06-18', '10:21:49');
INSERT INTO `person_document` VALUES ('465456', '1', '121', '2017-06-19', '10:05:53');
INSERT INTO `person_document` VALUES ('465465', '1', '112', '2017-04-18', '09:38:28');
INSERT INTO `person_document` VALUES ('465486', '1', '88', '2015-01-10', '07:22:34');
INSERT INTO `person_document` VALUES ('466546', '1', '126', '2017-06-18', '10:19:05');
INSERT INTO `person_document` VALUES ('543546', '1', '85', '2015-01-10', '07:20:31');
INSERT INTO `person_document` VALUES ('543649', '1', '76', '2015-01-08', '00:43:28');
INSERT INTO `person_document` VALUES ('545649', '1', '130', '2017-06-18', '10:21:07');
INSERT INTO `person_document` VALUES ('546546', '1', '132', '2017-06-18', '10:21:49');
INSERT INTO `person_document` VALUES ('1356564', '1', '114', '2017-05-19', '10:01:38');
INSERT INTO `person_document` VALUES ('2455454', '1', '105', '2015-03-05', '09:20:32');
INSERT INTO `person_document` VALUES ('3131235', '1', '57', '2015-01-04', '07:00:11');
INSERT INTO `person_document` VALUES ('3543546', '1', '95', '2015-02-05', '04:27:26');
INSERT INTO `person_document` VALUES ('4543456', '1', '84', '2015-01-10', '07:18:52');
INSERT INTO `person_document` VALUES ('4553343', '1', '55', '2015-01-04', '07:01:51');
INSERT INTO `person_document` VALUES ('4564898', '1', '129', '2017-06-18', '10:20:26');
INSERT INTO `person_document` VALUES ('4565349', '1', '51', '2015-01-04', '07:02:57');
INSERT INTO `person_document` VALUES ('4565434', '1', '52', '2015-01-04', '07:04:46');
INSERT INTO `person_document` VALUES ('4566489', '1', '123', '2017-06-20', '10:11:20');
INSERT INTO `person_document` VALUES ('5464565', '1', '97', '2015-02-26', '08:59:57');
INSERT INTO `person_document` VALUES ('12334565', '1', '54', '2015-01-04', '07:06:04');
INSERT INTO `person_document` VALUES ('13256465', '1', '119', '2017-06-19', '10:05:14');
INSERT INTO `person_document` VALUES ('13546494', '1', '120', '2017-06-19', '10:05:53');
INSERT INTO `person_document` VALUES ('15648666', '1', '115', '2017-05-19', '10:03:13');
INSERT INTO `person_document` VALUES ('24542755', '1', '69', '2015-01-06', '08:24:28');
INSERT INTO `person_document` VALUES ('32135456', '1', '48', '2015-01-02', '08:43:13');
INSERT INTO `person_document` VALUES ('32165465', '1', '2', '2017-06-17', '23:46:32');
INSERT INTO `person_document` VALUES ('32165699', '1', '1', '2017-06-17', '21:39:06');
INSERT INTO `person_document` VALUES ('41345354', '1', '81', '2015-01-10', '06:34:02');
INSERT INTO `person_document` VALUES ('42354566', '1', '72', '2015-01-08', '00:21:00');
INSERT INTO `person_document` VALUES ('42453445', '1', '53', '2015-01-04', '07:05:26');
INSERT INTO `person_document` VALUES ('43545343', '1', '86', '2015-01-10', '07:21:12');
INSERT INTO `person_document` VALUES ('45343456', '1', '77', '2015-01-08', '00:44:04');
INSERT INTO `person_document` VALUES ('45644564', '1', '90', '2017-06-26', '03:46:07');
INSERT INTO `person_document` VALUES ('45645656', '1', '96', '2015-02-05', '04:27:26');
INSERT INTO `person_document` VALUES ('46468998', '1', '124', '2017-06-20', '10:11:21');
INSERT INTO `person_document` VALUES ('46489465', '1', '118', '2017-05-19', '10:02:26');
INSERT INTO `person_document` VALUES ('46543465', '1', '68', '2015-01-06', '08:24:28');
INSERT INTO `person_document` VALUES ('46546464', '1', '102', '2015-02-26', '09:15:02');
INSERT INTO `person_document` VALUES ('46546596', '1', '75', '2015-01-08', '00:42:52');
INSERT INTO `person_document` VALUES ('53446632', '1', '82', '2015-01-10', '06:53:22');
INSERT INTO `person_document` VALUES ('53464565', '1', '71', '2015-01-08', '00:29:52');
INSERT INTO `person_document` VALUES ('54224575', '1', '67', '2015-01-06', '08:23:05');
INSERT INTO `person_document` VALUES ('54354546', '1', '56', '2015-01-04', '07:01:03');
INSERT INTO `person_document` VALUES ('72660251', '1', '36', '2017-06-25', '16:27:34');
INSERT INTO `person_document` VALUES ('212344656', '1', '87', '2015-01-10', '07:21:42');
INSERT INTO `person_document` VALUES ('321324534', '1', '50', '2015-01-02', '08:55:07');
INSERT INTO `person_document` VALUES ('456456454', '1', '103', '2015-03-05', '09:19:53');
INSERT INTO `person_document` VALUES ('456464564', '1', '100', '2015-02-26', '09:12:24');
INSERT INTO `person_document` VALUES ('465469459', '1', '127', '2017-06-18', '10:19:26');
INSERT INTO `person_document` VALUES ('545345653', '1', '101', '2015-02-26', '09:15:02');
INSERT INTO `person_document` VALUES ('546456456', '1', '117', '2017-05-19', '10:02:26');
INSERT INTO `person_document` VALUES ('546456546', '1', '107', '2015-03-31', '09:27:47');
INSERT INTO `person_document` VALUES ('912872781', '1', '37', '2017-06-25', '16:36:20');
INSERT INTO `person_document` VALUES ('1235345665', '1', '40', '2017-06-25', '16:46:44');
INSERT INTO `person_document` VALUES ('2134654986', '1', '3', '2017-06-17', '23:48:11');
INSERT INTO `person_document` VALUES ('2135453564', '1', '45', '2017-06-25', '16:56:17');
INSERT INTO `person_document` VALUES ('2436456564', '1', '43', '2017-06-25', '16:52:15');
INSERT INTO `person_document` VALUES ('3254654536', '1', '39', '2017-06-25', '16:44:30');
INSERT INTO `person_document` VALUES ('3421234655', '1', '44', '2017-06-25', '16:54:17');
INSERT INTO `person_document` VALUES ('4356554654', '1', '38', '2017-06-25', '16:42:27');
INSERT INTO `person_document` VALUES ('4534354354', '1', '89', '2017-06-26', '03:41:03');
INSERT INTO `person_document` VALUES ('5646455346', '1', '46', '2017-06-25', '16:58:05');
INSERT INTO `person_document` VALUES ('42654535654', '1', '41', '2017-06-25', '16:49:09');
INSERT INTO `person_document` VALUES ('43534355437', '1', '49', '2015-01-02', '08:55:07');
INSERT INTO `person_document` VALUES ('54346343546', '1', '42', '2017-06-25', '16:50:42');

-- ----------------------------
-- Table structure for person_phone
-- ----------------------------
DROP TABLE IF EXISTS `person_phone`;
CREATE TABLE `person_phone` (
  `NUMBER_PHONE` decimal(10,0) NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `ID_TYPE_PHONE` int(11) NOT NULL,
  `DATE_REGISTER_PHONE` date NOT NULL,
  `TIME_REGISTER_PHONE` time NOT NULL,
  PRIMARY KEY (`NUMBER_PHONE`),
  KEY `FK_RELATIONSHIP_126` (`ID_TYPE_PHONE`),
  KEY `FK_RELATIONSHIP_62` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_126` FOREIGN KEY (`ID_TYPE_PHONE`) REFERENCES `type_phone` (`ID_TYPE_PHONE`),
  CONSTRAINT `FK_RELATIONSHIP_62` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person_phone
-- ----------------------------
INSERT INTO `person_phone` VALUES ('456', '106', '1', '2015-03-31', '09:27:06');
INSERT INTO `person_phone` VALUES ('456546', '100', '1', '2015-02-26', '09:12:24');
INSERT INTO `person_phone` VALUES ('534659', '119', '1', '2017-06-19', '10:05:14');
INSERT INTO `person_phone` VALUES ('4564564', '84', '1', '2015-01-10', '07:18:52');
INSERT INTO `person_phone` VALUES ('7654321', '1', '1', '2017-06-17', '20:30:33');
INSERT INTO `person_phone` VALUES ('16554645', '114', '1', '2017-05-19', '10:01:38');
INSERT INTO `person_phone` VALUES ('32154653', '2', '1', '2017-06-17', '23:46:33');
INSERT INTO `person_phone` VALUES ('34556546', '89', '1', '2017-06-26', '03:41:03');
INSERT INTO `person_phone` VALUES ('42454686', '44', '1', '2017-06-25', '16:54:18');
INSERT INTO `person_phone` VALUES ('53434544', '46', '1', '2017-06-25', '16:58:06');
INSERT INTO `person_phone` VALUES ('77266025', '36', '1', '2017-06-25', '16:27:34');
INSERT INTO `person_phone` VALUES ('128753665', '41', '1', '2017-06-25', '16:49:09');
INSERT INTO `person_phone` VALUES ('314654662', '3', '1', '2017-06-17', '23:48:11');
INSERT INTO `person_phone` VALUES ('321354634', '42', '1', '2017-06-25', '16:50:42');
INSERT INTO `person_phone` VALUES ('345213466', '45', '1', '2017-06-25', '16:56:18');
INSERT INTO `person_phone` VALUES ('435465456', '97', '1', '2015-02-26', '08:59:57');
INSERT INTO `person_phone` VALUES ('453465656', '81', '1', '2015-01-10', '06:34:02');
INSERT INTO `person_phone` VALUES ('456464565', '90', '1', '2017-06-26', '03:46:07');
INSERT INTO `person_phone` VALUES ('456465456', '103', '1', '2015-03-05', '09:20:54');
INSERT INTO `person_phone` VALUES ('465456456', '109', '1', '2015-05-15', '09:30:06');
INSERT INTO `person_phone` VALUES ('1324564534', '43', '1', '2017-06-25', '16:52:15');
INSERT INTO `person_phone` VALUES ('9128750017', '38', '1', '2017-06-25', '16:42:27');
INSERT INTO `person_phone` VALUES ('9128752781', '37', '1', '2017-06-25', '16:36:20');
INSERT INTO `person_phone` VALUES ('9128753932', '40', '1', '2017-06-25', '16:46:44');
INSERT INTO `person_phone` VALUES ('9999999999', '39', '1', '2017-06-25', '16:44:30');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INQUEST` int(11) NOT NULL,
  `DESCRIPTION_QUESTION` varchar(250) NOT NULL,
  `ACTIVE_QUESTION` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_QUESTION`),
  KEY `FK_RELATIONSHIP_49` (`ID_INQUEST`),
  CONSTRAINT `FK_RELATIONSHIP_49` FOREIGN KEY (`ID_INQUEST`) REFERENCES `inquest` (`ID_INQUEST`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '1', 'Â¿Hasta quÃ© edad los niÃ±os no pagan?', '1');
INSERT INTO `question` VALUES ('2', '1', 'Â¿La cuenta se puede pagar al llegar?', '1');
INSERT INTO `question` VALUES ('3', '1', 'Â¿CuÃ¡les son las tarjetas de crÃ©dito aceptadas?', '1');
INSERT INTO `question` VALUES ('4', '1', 'Â¿Las habitaciones tienen aire acondicionado?', '1');
INSERT INTO `question` VALUES ('5', '1', 'Â¿El hotel tiene ascensor?', '1');
INSERT INTO `question` VALUES ('6', '1', 'Â¿QuÃ© idiomas se hablan en la recepciÃ³n?', '1');
INSERT INTO `question` VALUES ('7', '1', 'Â¿CuÃ¡l es el horario del restaurante del hotel?', '1');
INSERT INTO `question` VALUES ('8', '1', 'Â¿A partir de quÃ© hora se sirve el desayuno?', '1');
INSERT INTO `question` VALUES ('9', '1', 'Â¿CuÃ¡l es el horario de apertura del gimnasio?', '1');
INSERT INTO `question` VALUES ('10', '1', 'Â¿CÃ³mo hago para reservar en el sito web? ', '1');
INSERT INTO `question` VALUES ('11', '2', 'AtenciÃ³n al realizar su ReservaciÃ³n ', '1');
INSERT INTO `question` VALUES ('12', '2', 'AtenciÃ³n al registrarse en el Hotel (Check-in)', '1');
INSERT INTO `question` VALUES ('13', '2', 'AtenciÃ³n durante su salida del Hotel (Check-out) ', '1');
INSERT INTO `question` VALUES ('14', '2', 'Limpieza y condiciones de habitaciÃ³n ', '1');
INSERT INTO `question` VALUES ('15', '2', 'Limpieza y condiciones de baÃ±os ', '1');
INSERT INTO `question` VALUES ('16', '2', 'Limpieza y condiciones de instalaciones exteriores ', '1');
INSERT INTO `question` VALUES ('17', '2', 'Comodidad en su habitaciÃ³n ', '1');
INSERT INTO `question` VALUES ('18', '3', 'En general, Â¿cÃ³mo calificarÃ­a la hospitalidad de nuestro personal?', '1');
INSERT INTO `question` VALUES ('19', '3', 'cÃ³mo calificarÃ­a las zonas comunes de nuestro centro vacacional? ', '1');
INSERT INTO `question` VALUES ('20', '3', 'Â¿cÃ³mo calificarÃ­a el valor por el precio pagado?', '1');
INSERT INTO `question` VALUES ('21', '3', 'Â¿cÃ³mo calificarÃ­a la capacidad del complejo para proporcionar un ambiente relajante?', '1');
INSERT INTO `question` VALUES ('22', '2', 'Â¿Se siente comodo?', '2');
INSERT INTO `question` VALUES ('23', '2', 'Â¿El gimnasio es bueno?', '2');
INSERT INTO `question` VALUES ('24', '2', 'Â¿Como califica la recepcion?', '2');
INSERT INTO `question` VALUES ('25', '4', 'Como califica el ambiente?', '2');
INSERT INTO `question` VALUES ('26', '4', 'que le parce la DecoraciÃ³n?', '2');
INSERT INTO `question` VALUES ('27', '4', 'se siente comodo en el hotel?', '2');
INSERT INTO `question` VALUES ('28', '4', 'como califica las instalaciones?', '2');
INSERT INTO `question` VALUES ('29', '4', 'que le parece la recepcion?', '2');
INSERT INTO `question` VALUES ('30', '4', 'qye le parece el precio?', '2');
INSERT INTO `question` VALUES ('31', '4', 'como califica la hospitalidad?', '2');
INSERT INTO `question` VALUES ('32', '4', 'le gusto el desayuno?', '2');
INSERT INTO `question` VALUES ('33', '4', 'esta intersado en nuestras ofertas', '2');
INSERT INTO `question` VALUES ('34', '4', 'la limpieza como lo califica?', '2');
INSERT INTO `question` VALUES ('35', '4', 'la calefaccion fue de su agrado?', '2');
INSERT INTO `question` VALUES ('36', '4', 'las bebidas fueron de su agrado', '2');

-- ----------------------------
-- Table structure for reserve
-- ----------------------------
DROP TABLE IF EXISTS `reserve`;
CREATE TABLE `reserve` (
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ID_ROOM_MODEL` int(11) NOT NULL,
  `UNIT_RESERVED` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONSUME_SERVICE`,`ID_ROOM_MODEL`),
  KEY `FK_RELATIONSHIP_118` (`ID_ROOM_MODEL`),
  CONSTRAINT `FK_RELATIONSHIP_118` FOREIGN KEY (`ID_ROOM_MODEL`) REFERENCES `room_model` (`ID_ROOM_MODEL`),
  CONSTRAINT `FK_RELATIONSHIP_119` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve
-- ----------------------------
INSERT INTO `reserve` VALUES ('31', '1', '1');
INSERT INTO `reserve` VALUES ('32', '1', '1');
INSERT INTO `reserve` VALUES ('33', '1', '1');
INSERT INTO `reserve` VALUES ('34', '4', '1');
INSERT INTO `reserve` VALUES ('35', '2', '1');
INSERT INTO `reserve` VALUES ('36', '2', '1');
INSERT INTO `reserve` VALUES ('39', '1', '1');
INSERT INTO `reserve` VALUES ('40', '1', '1');
INSERT INTO `reserve` VALUES ('41', '1', '1');
INSERT INTO `reserve` VALUES ('42', '1', '1');
INSERT INTO `reserve` VALUES ('43', '1', '1');
INSERT INTO `reserve` VALUES ('44', '1', '1');
INSERT INTO `reserve` VALUES ('45', '2', '1');
INSERT INTO `reserve` VALUES ('46', '2', '1');
INSERT INTO `reserve` VALUES ('47', '2', '1');
INSERT INTO `reserve` VALUES ('48', '2', '1');
INSERT INTO `reserve` VALUES ('49', '2', '1');
INSERT INTO `reserve` VALUES ('50', '4', '1');
INSERT INTO `reserve` VALUES ('51', '4', '1');
INSERT INTO `reserve` VALUES ('52', '3', '1');
INSERT INTO `reserve` VALUES ('53', '3', '1');
INSERT INTO `reserve` VALUES ('54', '3', '1');
INSERT INTO `reserve` VALUES ('57', '1', '1');
INSERT INTO `reserve` VALUES ('58', '1', '1');
INSERT INTO `reserve` VALUES ('59', '1', '1');
INSERT INTO `reserve` VALUES ('60', '1', '1');
INSERT INTO `reserve` VALUES ('61', '1', '1');
INSERT INTO `reserve` VALUES ('62', '1', '1');
INSERT INTO `reserve` VALUES ('63', '3', '1');
INSERT INTO `reserve` VALUES ('64', '3', '1');
INSERT INTO `reserve` VALUES ('65', '3', '1');
INSERT INTO `reserve` VALUES ('66', '4', '1');
INSERT INTO `reserve` VALUES ('67', '4', '1');
INSERT INTO `reserve` VALUES ('72', '1', '1');
INSERT INTO `reserve` VALUES ('73', '1', '1');
INSERT INTO `reserve` VALUES ('74', '1', '1');
INSERT INTO `reserve` VALUES ('75', '1', '1');
INSERT INTO `reserve` VALUES ('76', '1', '1');
INSERT INTO `reserve` VALUES ('77', '1', '1');
INSERT INTO `reserve` VALUES ('78', '1', '1');
INSERT INTO `reserve` VALUES ('79', '1', '1');
INSERT INTO `reserve` VALUES ('80', '1', '1');
INSERT INTO `reserve` VALUES ('81', '1', '1');
INSERT INTO `reserve` VALUES ('82', '1', '1');
INSERT INTO `reserve` VALUES ('96', '2', '1');

-- ----------------------------
-- Table structure for response
-- ----------------------------
DROP TABLE IF EXISTS `response`;
CREATE TABLE `response` (
  `ID_PERSON` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `DESCRIPTION_RESPONSE` varchar(200) NOT NULL,
  `DATE_RESPONSE` date NOT NULL,
  `TIME_RESPONSE` time NOT NULL,
  PRIMARY KEY (`ID_PERSON`,`ID_QUESTION`),
  KEY `FK_RELATIONSHIP_65` (`ID_QUESTION`),
  CONSTRAINT `FK_RELATIONSHIP_64` FOREIGN KEY (`ID_PERSON`) REFERENCES `user` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_65` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of response
-- ----------------------------
INSERT INTO `response` VALUES ('1', '1', 'El niÃ±o menor de 12 aÃ±os, aÃºn no cumplidos, puede hospedarse gratuitamente en la habitaciÃ³n con sus padres, desayuno incluido.', '2017-06-17', '22:22:14');
INSERT INTO `response` VALUES ('1', '2', 'SÃ­, la cuenta puede pagarse en cualquier momento del dÃ­a.', '2017-06-17', '22:22:56');
INSERT INTO `response` VALUES ('1', '3', 'Aceptamos las principales tarjetas de crÃ©dito: American Express - CartaSÃ¬ - Diners - Visa - Master Card - Tarjeta de debito.', '2017-06-17', '22:23:15');
INSERT INTO `response` VALUES ('1', '4', 'SÃ­, todas las habitaciones tienen aire acondicionado con temperatura regulable en la habitaciÃ³n.', '2017-06-17', '22:23:40');
INSERT INTO `response` VALUES ('1', '5', 'A las cinco plantas se accede con dos modernos ascensores', '2017-06-17', '22:24:15');
INSERT INTO `response` VALUES ('1', '6', 'InglÃ©s, francÃ©s, espaÃ±ol y alemÃ¡n.', '2017-06-17', '22:24:35');
INSERT INTO `response` VALUES ('1', '7', 'El restaurante panorÃ¡mico \"Sala delle Nuvoleâ€ estÃ¡ abierto desde las 12:00 hasta las 15:00 horas, mientras que el restaurante y vinoteca â€œPandiaâ€ estÃ¡ abierto desde las 17:00 hasta la mediano', '2017-06-17', '22:25:20');
INSERT INTO `response` VALUES ('1', '8', 'Los esperamos desde las 7:00 hasta las 11:00 con nuestros croissants reciÃ©n horneados y con un delicioso buffet caliente y frÃ­o. Pero desde la medianoche hasta las 7:00 tambiÃ©n le ofrecemos el serv', '2017-06-17', '22:25:41');
INSERT INTO `response` VALUES ('1', '9', 'El gimnasio del hotel estÃ¡ abierto desde las 6:00 hasta las 22:00 horas.', '2017-06-17', '22:25:59');
INSERT INTO `response` VALUES ('1', '10', 'Controle la disponibilidad y los precios y luego siga las instrucciones.<br>Para poder acceder a la confirmaciÃ³n de las reservas se le pedirÃ¡ el nÃºmero y la fecha de caducidad de su tarjeta de crÃ©', '2017-06-17', '22:26:43');
INSERT INTO `response` VALUES ('1', '11', 'hola mundo', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES ('1', '12', 'muy bueba', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES ('1', '13', 'la atncio', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES ('1', '14', 'en este hotel', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES ('1', '15', 'es buena la limpieza', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES ('1', '16', 'con condiciones favotrables', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES ('1', '17', 'muy comodo', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES ('1', '18', 'habl', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES ('1', '19', 'aqui', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES ('1', '20', 'estoy', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES ('1', '21', 'muy ', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES ('1', '25', '1', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '26', '2', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '27', '3', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '28', '3', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '29', '2', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '30', '4', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '31', '4', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '32', '4', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES ('1', '33', '4', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES ('1', '34', '4', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES ('1', '35', '3', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES ('1', '36', '5', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES ('45', '25', '2', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '26', '5', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '27', '4', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '28', '3', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '29', '2', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '30', '3', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '31', '4', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '32', '5', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '33', '4', '2017-06-26', '05:59:42');
INSERT INTO `response` VALUES ('45', '34', '4', '2017-06-26', '05:59:43');
INSERT INTO `response` VALUES ('45', '35', '4', '2017-06-26', '05:59:43');
INSERT INTO `response` VALUES ('45', '36', '4', '2017-06-26', '05:59:43');
INSERT INTO `response` VALUES ('46', '25', '2', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '26', '2', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '27', '2', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '28', '1', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '29', '2', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '30', '3', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '31', '5', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '32', '5', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '33', '5', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '34', '5', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '35', '5', '2017-06-26', '05:58:41');
INSERT INTO `response` VALUES ('46', '36', '5', '2017-06-26', '05:58:42');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `ID_ROL` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_ROL` char(25) NOT NULL,
  `DESCRIPTION_ROL` varchar(250) NOT NULL,
  `IMAGE_ROL` longblob,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES ('1', 'admin', 'Gerente del hotel', null);
INSERT INTO `rol` VALUES ('2', 'recepcion', 'resliza las reservas', null);
INSERT INTO `rol` VALUES ('3', 'cliente', 'Huesped del hotel', null);
INSERT INTO `rol` VALUES ('4', 'cocina', 'Envia pedidos de alimentos y registra consumo', null);
INSERT INTO `rol` VALUES ('5', 'servicio', 'Registra consumo de servicios', null);

-- ----------------------------
-- Table structure for rol_function
-- ----------------------------
DROP TABLE IF EXISTS `rol_function`;
CREATE TABLE `rol_function` (
  `ID_ROL` int(11) NOT NULL,
  `ID_FUNCTION` decimal(3,0) NOT NULL,
  `DATE_CREATED_ROL_FUNCTION` date NOT NULL,
  `TIME_CREATED_ROL_FUNCTION` time NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_FUNCTION`),
  KEY `FK_RELATIONSHIP_9` (`ID_FUNCTION`),
  CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`),
  CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_FUNCTION`) REFERENCES `function` (`ID_FUNCTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rol_function
-- ----------------------------

-- ----------------------------
-- Table structure for rol_inquest
-- ----------------------------
DROP TABLE IF EXISTS `rol_inquest`;
CREATE TABLE `rol_inquest` (
  `ID_ROL` int(11) NOT NULL,
  `ID_INQUEST` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_INQUEST`),
  KEY `FK_RELATIONSHIP_53` (`ID_INQUEST`),
  CONSTRAINT `FK_RELATIONSHIP_52` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`),
  CONSTRAINT `FK_RELATIONSHIP_53` FOREIGN KEY (`ID_INQUEST`) REFERENCES `inquest` (`ID_INQUEST`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rol_inquest
-- ----------------------------

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `ID_ROOM` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_ROOM` varchar(15) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_ROOM_MODEL` int(11) NOT NULL,
  `IMAGE_ROOM` varchar(100) NOT NULL,
  `STATE_ROOM` decimal(1,0) NOT NULL,
  `DATE_CREATED_ROOM` date NOT NULL,
  `TIME_CREATED_ROOM` time NOT NULL,
  `DATE_CHECK_OUT_ROOM` date NOT NULL,
  `TIME_CHECK_OUT_ROOM` time NOT NULL,
  `DATE_CHECK_IN_ROOM` date NOT NULL,
  `TIME_CHECK_IN_ROOM` time NOT NULL,
  PRIMARY KEY (`ID_ROOM`),
  KEY `FK_RELATIONSHIP_107` (`ID_HOTEL`),
  KEY `FK_RELATIONSHIP_43` (`ID_ROOM_MODEL`),
  CONSTRAINT `FK_RELATIONSHIP_107` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  CONSTRAINT `FK_RELATIONSHIP_43` FOREIGN KEY (`ID_ROOM_MODEL`) REFERENCES `room_model` (`ID_ROOM_MODEL`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('1', 'S1', '1', '1', '', '1', '2015-01-01', '00:00:00', '2015-01-12', '06:00:00', '2015-01-11', '06:00:00');
INSERT INTO `room` VALUES ('2', 'S2', '1', '1', '', '1', '2015-01-01', '00:00:00', '2017-06-19', '10:17:38', '2017-06-18', '10:17:38');
INSERT INTO `room` VALUES ('3', 'S3', '1', '1', '', '1', '2015-01-01', '00:00:00', '2015-01-12', '06:00:00', '2015-01-11', '06:00:00');
INSERT INTO `room` VALUES ('4', 'S4', '1', '1', '', '1', '2015-01-01', '00:00:00', '2015-01-12', '06:00:00', '2015-01-11', '06:00:00');
INSERT INTO `room` VALUES ('5', 'S5', '1', '1', '', '1', '2015-01-01', '00:00:00', '2015-01-12', '06:00:00', '2015-01-11', '06:00:00');
INSERT INTO `room` VALUES ('6', 'S6', '1', '1', '', '1', '2015-01-01', '00:00:00', '2015-01-12', '06:00:00', '2015-01-11', '06:00:00');
INSERT INTO `room` VALUES ('7', 'D1', '1', '2', '', '1', '2015-01-01', '00:00:00', '2017-06-19', '10:17:38', '2017-06-18', '10:17:38');
INSERT INTO `room` VALUES ('8', 'D2', '1', '2', '', '1', '2015-01-01', '00:00:00', '2017-06-19', '10:17:38', '2017-06-18', '10:17:38');
INSERT INTO `room` VALUES ('9', 'D3', '1', '2', '', '1', '2015-01-01', '00:00:00', '2017-06-28', '08:00:00', '2017-06-26', '08:00:00');
INSERT INTO `room` VALUES ('10', 'D4', '1', '2', '', '1', '2015-01-01', '00:00:00', '2017-06-19', '10:17:38', '2017-06-18', '10:17:38');
INSERT INTO `room` VALUES ('11', 'D5', '1', '2', '', '1', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00');
INSERT INTO `room` VALUES ('12', 'C1', '1', '3', '', '1', '2015-01-01', '00:00:00', '2017-06-19', '10:17:38', '2017-06-18', '10:17:38');
INSERT INTO `room` VALUES ('13', 'C2', '1', '3', '', '1', '2015-01-01', '00:00:00', '2017-06-19', '10:17:38', '2017-06-18', '10:17:38');
INSERT INTO `room` VALUES ('14', 'C3', '1', '3', '', '1', '2015-01-01', '00:00:00', '2017-06-19', '10:17:38', '2017-06-18', '10:17:38');
INSERT INTO `room` VALUES ('15', 'M1', '1', '4', '', '1', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00');
INSERT INTO `room` VALUES ('16', 'M2', '1', '4', '', '1', '2015-01-01', '00:00:00', '2017-06-20', '10:04:29', '2017-06-19', '10:04:29');
INSERT INTO `room` VALUES ('17', 'Gim1', '1', '5', '', '1', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00');
INSERT INTO `room` VALUES ('18', 'Gim2', '1', '5', '', '1', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00');
INSERT INTO `room` VALUES ('19', 'Piscina1', '1', '6', '', '1', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00');
INSERT INTO `room` VALUES ('20', 'Comedor General', '1', '7', '', '1', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00');
INSERT INTO `room` VALUES ('21', 'Comedor VIP', '1', '7', '', '1', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00', '2015-01-01', '00:00:00');

-- ----------------------------
-- Table structure for room_model
-- ----------------------------
DROP TABLE IF EXISTS `room_model`;
CREATE TABLE `room_model` (
  `ID_ROOM_MODEL` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_ROOM_MODEL` varchar(50) NOT NULL,
  `DESCRIPTION_ROOM_MODEL` varchar(500) NOT NULL,
  `DATE_CREATED_ROOM_MODEL` date NOT NULL,
  `TIME_CREATED_ROOM_MODEL` time NOT NULL,
  `IMAGE_ROOM_MODEL` varchar(200) NOT NULL,
  `UNIT_ADULT_ROOM_MODEL` decimal(2,0) NOT NULL,
  `UNIT_BOY_ROOM_MODEL` decimal(2,0) NOT NULL,
  `UNIT_PET_ROOM_MODEL` decimal(2,0) NOT NULL,
  `VALUE_TYPE_ROOM_MODEL` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_ROOM_MODEL`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_model
-- ----------------------------
INSERT INTO `room_model` VALUES ('1', 'HabitaciÃ²n Individual', 'Cama de 100-120cm / Aire acondiciondo<br>BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital /&nbsp;HabitaciÃ²n insonorizad<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a', '2017-06-17', '21:43:04', 'img/room/20170617214304.jpg', '1', '0', '0', '1');
INSERT INTO `room_model` VALUES ('2', 'HabitaciÃ²n Doble', 'Cama matrimonial / Aire acondiciondo<br>BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital / HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a baÃ±o', '2017-06-17', '21:44:01', 'img/room/20170617214401.jpg', '2', '0', '0', '1');
INSERT INTO `room_model` VALUES ('3', 'Clasico', 'Cama matrimonial o dos camas a pedido<br>Aire acondiciondo / BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital / HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a baÃ±o', '2017-06-17', '21:44:52', 'img/room/20170617214452.jpg', '1', '0', '0', '1');
INSERT INTO `room_model` VALUES ('4', 'Matrimonial', 'Cama matrimonial o dos camas a pedido<br>Aire acondiciondo / BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital / HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a baÃ±o<br>Desayuno servido en la habitaciÃ²n a pedido<br>Salida de baÃ±o / Pantuflas<br>Una botellita de Chianti de bienvenida<br>Una cesta de frutas frescas', '2017-06-17', '21:46:02', 'img/room/20170617214602.jpg', '2', '0', '0', '1');
INSERT INTO `room_model` VALUES ('5', 'Gimnasio', 'lugar que permite practicar deportes o hacer ejercicio en un recinto cerrado con varias maquinas y artÃ­culos deportivos a disposiciÃ³n de quienes lo visiten', '2017-06-17', '21:47:35', 'img/room/20170617214735.jpg', '99', '20', '0', '2');
INSERT INTO `room_model` VALUES ('6', 'Piscina', 'espacio que se destina al <b>acto de comer</b> (ingerir alimentos). En las viviendas, el comedor puede ser una habitaciÃ³n dedicada exclusivamente a esta acciÃ³n o un sector integrado a otro ambiente (como la <b>cocina-comedor</b> o el <b>living-comedor</b>).', '2017-06-17', '21:52:41', 'img/room/20170617215042.jpg', '99', '99', '0', '2');
INSERT INTO `room_model` VALUES ('7', 'Comedor', 'espacio que se destina al <b>acto de comer</b> (ingerir alimentos). En las viviendas, el comedor puede ser una habitaciÃ³n dedicada exclusivamente a esta acciÃ³n o un sector integrado a otro ambiente (como la <b>cocina-comedor</b> o el <b>living-comedor</b>).', '2017-06-17', '21:52:22', 'img/room/20170617215222.jpg', '99', '99', '0', '2');

-- ----------------------------
-- Table structure for rule
-- ----------------------------
DROP TABLE IF EXISTS `rule`;
CREATE TABLE `rule` (
  `ID_TYPE_RULE` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `NAME_RULE` varchar(250) NOT NULL,
  `DESCRIPTION_RULE` varchar(750) NOT NULL,
  `STATE_RULE` decimal(1,0) NOT NULL,
  PRIMARY KEY (`ID_TYPE_RULE`,`ID_HOTEL`,`NAME_RULE`),
  KEY `FK_RELATIONSHIP_47` (`ID_HOTEL`),
  CONSTRAINT `FK_RELATIONSHIP_47` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  CONSTRAINT `FK_RELATIONSHIP_48` FOREIGN KEY (`ID_TYPE_RULE`) REFERENCES `type_rule` (`ID_TYPE_RULE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rule
-- ----------------------------
INSERT INTO `rule` VALUES ('1', '1', 'DaÃ±os', 'Cualquier <b>daÃ±o causado</b> por los huÃ©spedes a los objetos, bienes muebles o al inmueble de propiedad del hotel, serÃ¡ de su exclusiva responsabilidad, debiendo abonar la reparaciÃ³n de los mismos.', '1');
INSERT INTO `rule` VALUES ('1', '1', 'DERECHO DE ADMISION', 'El hotel se reserva el derecho de admisiÃ³n de visitas ocasionales y en ningÃºn caso se permitirÃ¡ el acceso de las mismas a las habitaciones. En caso de incumplimiento la gerencia se reserva el derecho de ordenar la salida inmediata del visitante', '1');
INSERT INTO `rule` VALUES ('1', '1', 'HORA DE ENTRADA Y SALIDA', 'El horario de ingreso a las habitaciones se fija a las 13 Hs. y deberÃ¡n ser desocupadas a las 10 Hs. del dÃ­a siguiente; despuÃ©s de esa hora, el hotel tendrÃ¡ derecho a efectuar un cargo extra segÃºn la tarifa vigente.', '1');
INSERT INTO `rule` VALUES ('1', '1', 'Llaves', 'En todas las oportunidades en que los huÃ©spedes abandonen el hotel, deberÃ¡n entregar las llaves en recepciÃ³n sin excepciÃ³n. Para la limpieza de la habitaciÃ³n, deben dejarse las llaves antes de las 13 Hs. de lo contrario la limpieza se realizarÃ¡ despuÃ©s de las 17 hrs.', '1');
INSERT INTO `rule` VALUES ('1', '1', 'Registro', ' Todas las personas hospedadas deberÃ¡n registrarse antes de ingresar al hotel.', '1');
INSERT INTO `rule` VALUES ('1', '1', 'Toallas', 'Esta totalmente prohibido (sin ninguna excepciÃ³n) retirar toallas de la habitaciÃ³n. Para la piscina puede solicitar toallas en el Snack.â€¨â€¨', '1');
INSERT INTO `rule` VALUES ('1', '1', 'Transferencia', 'el registro es intransferiable<br>', '1');
INSERT INTO `rule` VALUES ('3', '1', 'Alimentos y bebidas', 'No se permite la introducciÃ³n de los mismos en las habitaciones o Ã¡reas pÃºblicas del hotel, salvo que fueran adquiridos en el bar o restaurante del mismo; caso contrario el hotel podrÃ¡ exigir el retiro de los mismos.â€¨â€¨', '1');

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `ID_SERVICE` int(2) NOT NULL AUTO_INCREMENT,
  `ID_STATE_SERVICE` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_TYPE_SERVICE` int(11) NOT NULL,
  `NAME_SERVICE` char(75) NOT NULL,
  `DESCRIPTION_SERVICE` varchar(500) NOT NULL,
  `IMAGE_SERVICE` varchar(200) NOT NULL,
  `RESERVED_SERVICE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_SERVICE`),
  KEY `FK_RELATIONSHIP_23` (`ID_TYPE_SERVICE`),
  KEY `FK_RELATIONSHIP_66` (`ID_HOTEL`),
  KEY `FK_RELATIONSHIP_97` (`ID_STATE_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`ID_TYPE_SERVICE`) REFERENCES `type_service` (`ID_TYPE_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_66` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  CONSTRAINT `FK_RELATIONSHIP_97` FOREIGN KEY (`ID_STATE_SERVICE`) REFERENCES `state_service` (`ID_STATE_SERVICE`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('1', '1', '1', '2', 'Habitacion Simple', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.</p>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s un  s', 'img/service/20170617215448.jpg', '1');
INSERT INTO `service` VALUES ('2', '1', '1', '2', 'Habitacion Doble', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.</p>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s un  s', 'img/service/20170617215544.jpg', '1');
INSERT INTO `service` VALUES ('3', '1', '1', '1', 'Gimnasio', 'Sala de fitness equipada con aparatos de Ãºltima generaciÃ³n con Internet y TV individual', 'img/service/20170617215856.jpg', '1');
INSERT INTO `service` VALUES ('4', '1', '1', '2', 'Habitacion Matrimonial', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.</p>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s un  s', 'img/service/20170617220000.jpg', '1');
INSERT INTO `service` VALUES ('5', '1', '1', '2', 'Habitacon Suit', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.</p>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s un  s', 'img/service/20170617220110.jpg', '1');
INSERT INTO `service` VALUES ('6', '1', '1', '1', 'Servicio de piscina', 'Perfecciona tu estilo de nataciÃ³n en nuestra piscina climatizada.', 'img/service/20170617220211.jpg', '1');
INSERT INTO `service` VALUES ('7', '1', '1', '1', 'Comedor', 'Nuestro restaurante resulta el lugar idÃ³neo para reunirte con tus amigos o con otros socios y disfrutar de una comida saludable.', 'img/service/20170617220343.jpg', '0');
INSERT INTO `service` VALUES ('8', '1', '1', '3', 'Gimnasio temporadas', 'El gimansio estara a mitad de precio por fin de mes<br>', 'img/offers/20170618002203.jpg', '0');

-- ----------------------------
-- Table structure for service_activity
-- ----------------------------
DROP TABLE IF EXISTS `service_activity`;
CREATE TABLE `service_activity` (
  `ID_SERVICE` int(11) NOT NULL,
  `ID_ACTIVITY` int(11) NOT NULL,
  `DATE_INI_ACTIVITY` datetime NOT NULL,
  `DATE_FIN_ACTIVITY` datetime NOT NULL,
  PRIMARY KEY (`ID_SERVICE`,`ID_ACTIVITY`),
  KEY `FK_RELATIONSHIP_40` (`ID_ACTIVITY`),
  CONSTRAINT `FK_RELATIONSHIP_40` FOREIGN KEY (`ID_ACTIVITY`) REFERENCES `activity` (`ID_ACTIVITY`),
  CONSTRAINT `FK_RELATIONSHIP_41` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_activity
-- ----------------------------

-- ----------------------------
-- Table structure for service_function
-- ----------------------------
DROP TABLE IF EXISTS `service_function`;
CREATE TABLE `service_function` (
  `ID_SERVICE` int(11) NOT NULL,
  `ID_FUNCTION` decimal(3,0) NOT NULL,
  PRIMARY KEY (`ID_SERVICE`,`ID_FUNCTION`),
  KEY `FK_RELATIONSHIP_75` (`ID_FUNCTION`),
  CONSTRAINT `FK_RELATIONSHIP_75` FOREIGN KEY (`ID_FUNCTION`) REFERENCES `function` (`ID_FUNCTION`),
  CONSTRAINT `FK_RELATIONSHIP_76` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_function
-- ----------------------------

-- ----------------------------
-- Table structure for service_incharge
-- ----------------------------
DROP TABLE IF EXISTS `service_incharge`;
CREATE TABLE `service_incharge` (
  `ID_PERSON` int(11) NOT NULL,
  `ID_SERVICE` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERSON`,`ID_SERVICE`),
  KEY `FK_RELATIONSHIP_103` (`ID_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_103` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_104` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_incharge
-- ----------------------------

-- ----------------------------
-- Table structure for service_room_model
-- ----------------------------
DROP TABLE IF EXISTS `service_room_model`;
CREATE TABLE `service_room_model` (
  `ID_ROOM_MODEL` int(11) NOT NULL,
  `ID_SERVICE` int(11) NOT NULL,
  `UNIT_ROOM_MODEL` decimal(3,0) NOT NULL,
  `DATE_CREATED_SERVICE_ROOM_MODEL` date NOT NULL,
  `TIME_CREAED_SERVICE_ROOM_MODEL` time NOT NULL,
  PRIMARY KEY (`ID_ROOM_MODEL`,`ID_SERVICE`),
  KEY `FK_RELATIONSHIP_78` (`ID_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_78` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`),
  CONSTRAINT `FK_RELATIONSHIP_91` FOREIGN KEY (`ID_ROOM_MODEL`) REFERENCES `room_model` (`ID_ROOM_MODEL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_room_model
-- ----------------------------
INSERT INTO `service_room_model` VALUES ('1', '1', '1', '2017-06-17', '21:54:48');
INSERT INTO `service_room_model` VALUES ('2', '2', '1', '2017-06-17', '21:55:44');
INSERT INTO `service_room_model` VALUES ('3', '5', '1', '2017-06-17', '22:01:10');
INSERT INTO `service_room_model` VALUES ('4', '4', '1', '2017-06-17', '22:00:00');
INSERT INTO `service_room_model` VALUES ('5', '3', '1', '2017-06-17', '21:58:56');
INSERT INTO `service_room_model` VALUES ('5', '5', '1', '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES ('5', '8', '1', '2017-06-18', '00:22:03');
INSERT INTO `service_room_model` VALUES ('6', '5', '1', '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES ('6', '6', '1', '2017-06-17', '22:02:11');
INSERT INTO `service_room_model` VALUES ('7', '5', '1', '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES ('7', '7', '1', '2017-06-17', '22:03:43');

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `ID_SESSION` int(15) NOT NULL AUTO_INCREMENT,
  `ID_PERSON` int(11) DEFAULT NULL,
  `IP_PROXI` varchar(50) NOT NULL,
  `IP_MULTIUSER` varchar(50) NOT NULL,
  `IP_CLIENT` varchar(50) NOT NULL,
  `PID` varchar(20) NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_END` date NOT NULL,
  `BROWSER` varchar(300) NOT NULL,
  `TIME_START` time NOT NULL,
  `TIME_END` time NOT NULL,
  `ACTIVED` tinyint(1) NOT NULL,
  `LATITUD` varchar(15) NOT NULL,
  `LONGITUD` varchar(15) NOT NULL,
  `CITY` varchar(25) NOT NULL,
  `REGION` varchar(25) NOT NULL,
  `AREA_CODE` varchar(10) NOT NULL,
  `COUNTRY` varchar(25) NOT NULL,
  `REGION_CODE` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_SESSION`),
  KEY `FK_RELATIONSHIP_20` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`ID_PERSON`) REFERENCES `user` (`ID_PERSON`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('1', '1', '', '', 'localhost', 'localhost:31635', '2017-06-17', '2017-06-17', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '20:32:12', '20:32:12', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('2', '1', '', '', 'localhost', 'localhost:33725', '2017-06-17', '2017-06-17', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '21:30:59', '21:30:59', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('3', '1', '', '', 'localhost', 'localhost:33732', '2017-06-17', '2017-06-17', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '21:31:07', '21:31:07', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('4', '1', '', '', 'localhost', 'localhost:33736', '2017-06-17', '2017-06-17', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '21:31:15', '21:31:15', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('5', '1', '', '', 'localhost', 'localhost:33779', '2017-06-17', '2017-06-17', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '21:37:26', '21:37:26', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('6', '1', '', '', 'localhost', 'localhost:33809', '2017-06-17', '2017-06-17', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '21:39:50', '21:39:50', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('7', '3', '', '', 'localhost', 'localhost:42647', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '09:33:31', '09:33:31', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('8', '3', '', '', 'localhost', 'localhost:43526', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '11:34:16', '11:34:16', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('9', '2', '', '', 'localhost', 'localhost:43567', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '11:42:10', '11:42:10', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('10', '1', '', '', 'localhost', 'localhost:43617', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '11:45:30', '11:45:30', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('11', '3', '', '', 'localhost', 'localhost:44618', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '12:52:38', '12:52:38', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('12', '2', '', '', 'localhost', 'localhost:45660', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '14:39:59', '14:39:59', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('13', '3', '', '', 'localhost', 'localhost:45700', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '14:40:59', '14:40:59', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('14', '3', '', '', 'localhost', 'localhost:47060', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '16:31:52', '16:31:52', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('15', '3', '', '', 'localhost', 'localhost:47267', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '16:44:44', '16:44:44', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('16', '3', '', '', 'localhost', 'localhost:47277', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '16:45:22', '16:45:22', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('17', '3', '', '', 'localhost', 'localhost:47337', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '16:47:02', '16:47:02', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('18', '3', '', '', 'localhost', 'localhost:47799', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:04:39', '17:04:39', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('19', '1', '', '', 'localhost', 'localhost:47926', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:16:17', '17:16:17', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('20', '3', '', '', 'localhost', 'localhost:47970', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:18:24', '17:18:24', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('21', '2', '', '', 'localhost', 'localhost:48082', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:23:43', '17:23:43', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('22', '2', '', '', 'localhost', 'localhost:48108', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:26:15', '17:26:15', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('23', '2', '', '', 'localhost', 'localhost:48116', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:26:43', '17:26:43', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('24', '2', '', '', 'localhost', 'localhost:48124', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:26:53', '17:26:53', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('25', '2', '', '', 'localhost', 'localhost:48143', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:28:57', '17:28:57', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('26', '3', '', '', 'localhost', 'localhost:48184', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:29:25', '17:29:25', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('27', '3', '', '', 'localhost', 'localhost:48193', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:29:53', '17:29:53', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('28', '3', '', '', 'localhost', 'localhost:48208', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:30:16', '17:30:16', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('29', '3', '', '', 'localhost', 'localhost:48221', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:30:42', '17:30:42', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('30', '3', '', '', 'localhost', 'localhost:48229', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:30:52', '17:30:52', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('31', '3', '', '', 'localhost', 'localhost:48271', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:33:51', '17:33:51', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('32', '3', '', '', 'localhost', 'localhost:48296', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:34:38', '17:34:38', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('33', '1', '', '', 'localhost', 'localhost:48316', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:34:54', '17:34:54', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('34', '1', '', '', 'localhost', 'localhost:48321', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '17:35:35', '17:35:35', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('35', '3', '', '', 'localhost', 'localhost:49163', '2017-06-18', '2017-06-18', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '20:56:05', '20:56:05', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('36', '1', '', '', 'localhost', 'localhost:13167', '2017-06-20', '2017-06-20', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '03:53:32', '03:53:32', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('37', '1', '', '', 'localhost', 'localhost:6446', '2017-06-20', '2017-06-20', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '13:09:14', '13:09:14', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('38', '2', '', '', 'localhost', 'localhost:17543', '2017-06-25', '2017-06-25', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '13:41:03', '13:41:03', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('39', '1', '', '', 'localhost', 'localhost:17833', '2017-06-25', '2017-06-25', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '13:41:52', '13:41:52', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('40', '1', '', '', 'localhost', 'localhost:20434', '2017-06-25', '2017-06-25', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '13:53:14', '13:53:14', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('41', '3', '', '', 'localhost', 'localhost:25490', '2015-06-25', '2015-06-25', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '17:18:17', '17:18:17', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('42', '2', '', '', 'localhost', 'localhost:26147', '2015-01-02', '2015-01-02', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '05:39:06', '05:39:06', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('43', '40', '', '', 'localhost', 'localhost:26948', '2015-01-02', '2015-01-02', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '06:18:56', '06:18:56', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('44', '2', '', '', 'localhost', 'localhost:27152', '2015-01-02', '2015-01-02', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '06:22:24', '06:22:24', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('45', '39', '', '', 'localhost', 'localhost:27238', '2015-01-02', '2015-01-02', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '06:24:07', '06:24:07', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('46', '2', '', '', 'localhost', 'localhost:28508', '2015-01-02', '2015-01-02', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '09:06:03', '09:06:03', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('47', '41', '', '', 'localhost', 'localhost:29598', '2015-01-04', '2015-01-04', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '06:51:01', '06:51:01', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('48', '2', '', '', 'localhost', 'localhost:30214', '2015-01-04', '2015-01-04', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '07:11:12', '07:11:12', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('49', '3', '', '', 'localhost', 'localhost:31281', '2015-01-06', '2015-01-06', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '08:03:37', '08:03:37', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('50', '2', '', '', 'localhost', 'localhost:31824', '2015-01-06', '2015-01-06', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '08:25:22', '08:25:22', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('51', '3', '', '', 'localhost', 'localhost:32467', '2015-01-08', '2015-01-08', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '08:37:20', '08:37:20', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('52', '1', '', '', 'localhost', 'localhost:32492', '2015-01-08', '2015-01-08', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '08:37:34', '08:37:34', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('53', '89', '', '', 'localhost', 'localhost:17340', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '03:48:13', '03:48:13', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('54', '1', '', '', 'localhost', 'localhost:17385', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '03:54:06', '03:54:06', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('55', '89', '', '', 'localhost', 'localhost:17407', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '03:56:57', '03:56:57', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('56', '89', '', '', 'localhost', 'localhost:17413', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '03:57:30', '03:57:30', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('57', '89', '', '', 'localhost', 'localhost:17423', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '03:59:46', '03:59:46', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('58', '89', '', '', 'localhost', 'localhost:17441', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:01:50', '04:01:50', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('59', '89', '', '', 'localhost', 'localhost:17449', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:02:08', '04:02:08', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('60', '89', '', '', 'localhost', 'localhost:17457', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:03:25', '04:03:25', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('61', '89', '', '', 'localhost', 'localhost:17465', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:04:37', '04:04:37', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('62', '89', '', '', 'localhost', 'localhost:17494', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:06:49', '04:06:49', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('63', '89', '', '', 'localhost', 'localhost:17513', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:07:53', '04:07:53', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('64', '89', '', '', 'localhost', 'localhost:17518', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:08:12', '04:08:12', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('65', '1', '', '', 'localhost', 'localhost:17536', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:08:28', '04:08:28', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('66', '89', '', '', 'localhost', 'localhost:17556', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:08:46', '04:08:46', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('67', '89', '', '', 'localhost', 'localhost:17565', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:10:44', '04:10:44', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('68', '90', '', '', 'localhost', 'localhost:17737', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:16:41', '04:16:41', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('69', '90', '', '', 'localhost', 'localhost:17742', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:17:24', '04:17:24', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('70', '90', '', '', 'localhost', 'localhost:17750', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:18:43', '04:18:43', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('71', '1', '', '', 'localhost', 'localhost:17790', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:21:10', '04:21:10', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('72', '90', '', '', 'localhost', 'localhost:17974', '2015-02-05', '2015-02-05', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:28:31', '04:28:31', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('73', '1', '', '', 'localhost', 'localhost:18143', '2015-02-05', '2015-02-05', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '04:37:49', '04:37:49', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('74', '46', '', '', 'localhost', 'localhost:19438', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '05:58:02', '05:58:02', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('75', '45', '', '', 'localhost', 'localhost:19469', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '05:59:05', '05:59:05', '1', '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES ('76', '1', '', '', 'localhost', 'localhost:19506', '2017-06-26', '2017-06-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', '06:00:13', '06:00:13', '1', '0', '0', '', '', '', '', '');

-- ----------------------------
-- Table structure for site_tour
-- ----------------------------
DROP TABLE IF EXISTS `site_tour`;
CREATE TABLE `site_tour` (
  `ID_SITE_TOUR` int(11) NOT NULL AUTO_INCREMENT,
  `ADDRESS_GPS_X_SITE_TOUR` float NOT NULL,
  `ADDRESS_GPS_Y_SITE_TOUR` float NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `NAME_SITE_TOUR` varchar(100) NOT NULL,
  `DESCRIPTION_SITE_TOUR` varchar(500) NOT NULL,
  `ADDRESS_SITE_TOUR` varchar(250) NOT NULL,
  `STATE_SITE_TOUR` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_SITE_TOUR`),
  KEY `FK_RELATIONSHIP_101` (`ID_HOTEL`),
  CONSTRAINT `FK_RELATIONSHIP_101` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site_tour
-- ----------------------------
INSERT INTO `site_tour` VALUES ('1', '-17.4015', '-66.1749', '1', 'Mariscal Santa Cruz', 'atractivo turistico<br>', 'Hernan Morales, Cochabamba, Bolivia', '1');
INSERT INTO `site_tour` VALUES ('2', '-17.3881', '-66.1581', '1', 'Plaza colon', '<span class=\"r-i11saKUU0mbo\">Una plaza agradable del centro de la ciudad de cochabamba, comerciales alrededor buen lugar para pasar el dÃ­a de compras o comiendo</span>', 'av venezuela', '1');

-- ----------------------------
-- Table structure for state_activity
-- ----------------------------
DROP TABLE IF EXISTS `state_activity`;
CREATE TABLE `state_activity` (
  `ID_STATE_ACTIVITY` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_ACTIVITY` char(25) NOT NULL,
  `DESCRIPTION_STATE_ACTIVITY` varchar(150) NOT NULL,
  `VALUE_STATE_ACTIVITY` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_ACTIVITY`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state_activity
-- ----------------------------
INSERT INTO `state_activity` VALUES ('1', 'eliminado', 'la actividad ha sido eliminada', '-1');
INSERT INTO `state_activity` VALUES ('2', 'Activo', 'Actividad programada<br>', '1');
INSERT INTO `state_activity` VALUES ('3', 'No activo', 'Actividad no programada', '0');

-- ----------------------------
-- Table structure for state_article
-- ----------------------------
DROP TABLE IF EXISTS `state_article`;
CREATE TABLE `state_article` (
  `ID_STATE_ARTICLE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_ARTICLE` char(15) NOT NULL,
  `DESCRIPTION_STATE_ARTICLE` varchar(50) NOT NULL,
  `VALUE_STATE_ARTICLE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_ARTICLE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state_article
-- ----------------------------
INSERT INTO `state_article` VALUES ('1', 'prestado', 'el articulo se puede prestar', '1');
INSERT INTO `state_article` VALUES ('2', 'devuelto', 'el rticulo no se puede prestar', '0');
INSERT INTO `state_article` VALUES ('3', 'perdido', 'el articulo no se puede prestar', '2');
INSERT INTO `state_article` VALUES ('4', 'cancelado', 'el articulo no se puede prestar', '-1');

-- ----------------------------
-- Table structure for state_check
-- ----------------------------
DROP TABLE IF EXISTS `state_check`;
CREATE TABLE `state_check` (
  `ID_STATE_CHECK` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_CHECK` char(25) NOT NULL,
  `DESCRIPTION_STATE_CHECK` char(75) NOT NULL,
  `VALUE_STATE_CHECK` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_CHECK`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state_check
-- ----------------------------
INSERT INTO `state_check` VALUES ('1', 'activo', 'registro valido', '1');
INSERT INTO `state_check` VALUES ('2', 'cancelado', 'registro cancelado', '-1');
INSERT INTO `state_check` VALUES ('3', 'pendiente', 'falta verificar por recepcion', '0');
INSERT INTO `state_check` VALUES ('4', 'negado', 'solicitud de registro negado', '-1');
INSERT INTO `state_check` VALUES ('5', 'proceso', 'registro en proceso con titular registrado', '0');
INSERT INTO `state_check` VALUES ('6', 'terminado', 'el huesped registro su salida del hotel', '1');
INSERT INTO `state_check` VALUES ('7', 'proceso', 'el titular de la reserva no esta registrado todavia', '0');
INSERT INTO `state_check` VALUES ('8', 'Eliminado automatico', 'reserva eliminada en caso de q tarde mas del tiempo requerido para la reser', '-1');

-- ----------------------------
-- Table structure for state_food
-- ----------------------------
DROP TABLE IF EXISTS `state_food`;
CREATE TABLE `state_food` (
  `ID_STATE_FOOD` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_FOOD` char(25) NOT NULL,
  `DESCRIPTION_STATE_FOOD` varchar(150) NOT NULL,
  `VALUE_STATE_FOOD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_FOOD`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state_food
-- ----------------------------
INSERT INTO `state_food` VALUES ('1', 'disponible', 'se puede realizar la solicitud', '1');
INSERT INTO `state_food` VALUES ('2', 'no diponible', 'ya no se prepara esa comida', '0');
INSERT INTO `state_food` VALUES ('3', 'eliminado', 'alimento eliminado', '-1');

-- ----------------------------
-- Table structure for state_inquest
-- ----------------------------
DROP TABLE IF EXISTS `state_inquest`;
CREATE TABLE `state_inquest` (
  `ID_STATE_INQUEST` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_INQUEST` char(25) NOT NULL,
  `DESCRIPTION_STATE_INQUEST` varchar(150) NOT NULL,
  `VALUE_STATE_INQUEST` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_INQUEST`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state_inquest
-- ----------------------------
INSERT INTO `state_inquest` VALUES ('1', 'activo', 'la escuenta esta disponible', '1');
INSERT INTO `state_inquest` VALUES ('2', 'no activo', 'la encuesta no esta activo', '0');
INSERT INTO `state_inquest` VALUES ('3', 'espera', 'la encuesta todavia no se ha habilitado', '0');
INSERT INTO `state_inquest` VALUES ('4', 'permanente', 'encuesta siempre esta activo', '2');
INSERT INTO `state_inquest` VALUES ('5', 'frequente', 'preguntas frequentes', '-2');
INSERT INTO `state_inquest` VALUES ('6', 'eliminado', 'Encuesta eliminada', '-1');

-- ----------------------------
-- Table structure for state_service
-- ----------------------------
DROP TABLE IF EXISTS `state_service`;
CREATE TABLE `state_service` (
  `ID_STATE_SERVICE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_SERVICE` char(25) NOT NULL,
  `DESCRIPTION_STATE_SERVICE` varchar(150) NOT NULL,
  `VALUE_STATE_SERVICE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_SERVICE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state_service
-- ----------------------------
INSERT INTO `state_service` VALUES ('1', 'disponible', 'servicio disponible', '1');
INSERT INTO `state_service` VALUES ('2', 'fuera de servicio', 'el servicio esta fuera de funcionamiento', '0');
INSERT INTO `state_service` VALUES ('3', 'eliminado', 'servicio eliminado', '-1');
INSERT INTO `state_service` VALUES ('4', 'mantenimiento', 'servicio e mantenimiento', '0');

-- ----------------------------
-- Table structure for state_user
-- ----------------------------
DROP TABLE IF EXISTS `state_user`;
CREATE TABLE `state_user` (
  `ID_STATE_USER` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_USER` char(25) NOT NULL,
  `DESCRIPTION_STATE_USER` varchar(150) NOT NULL,
  `VALUE_STATE_USER` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state_user
-- ----------------------------
INSERT INTO `state_user` VALUES ('1', 'activo', 'esta activo en el sistema', '1');
INSERT INTO `state_user` VALUES ('2', 'bloqueado', 'se ha cancelado su cuenta', '0');
INSERT INTO `state_user` VALUES ('3', 'cancelado', 'el usuario ha cancelado su cuenta', '1');
INSERT INTO `state_user` VALUES ('4', 'registrado', 'se acaba de crear la cuenta de usuario', '1');

-- ----------------------------
-- Table structure for type_activity
-- ----------------------------
DROP TABLE IF EXISTS `type_activity`;
CREATE TABLE `type_activity` (
  `ID_TYPE_ACTIVITY` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_ACTIVITY` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_ACTIVITY` varchar(500) NOT NULL,
  `DATE_TYPE_ACTIVITY` date NOT NULL,
  `TIME_TYPE_ACTIVITY` time NOT NULL,
  `IMAGE_TYPE_ACTIVITY` varchar(200) NOT NULL,
  `VALUE_TYPE_ACTIVITY` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_ACTIVITY`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_activity
-- ----------------------------
INSERT INTO `type_activity` VALUES ('1', 'Empresarial', 'Actividad para los empleados del hotel<br>', '2017-06-17', '23:55:13', 'img/activity/20170617235513.png', '1');
INSERT INTO `type_activity` VALUES ('2', 'Salida turistica', 'Paseo turistico guiado por los alrrededores del lugar<br>', '2017-06-17', '23:56:32', 'img/activity/20170617235632.jpg', '1');
INSERT INTO `type_activity` VALUES ('3', 'Matrimonio', 'Fiesta de matrimonio en el salon de fista del hotel<br>', '2017-06-17', '23:57:15', 'img/activity/20170617235715.jpg', '1');
INSERT INTO `type_activity` VALUES ('4', 'Fiesta', 'Festejo', '2017-06-17', '23:58:03', 'img/activity/20170617235803.jpg', '1');
INSERT INTO `type_activity` VALUES ('5', 'Concierto', 'Concierto de algun grupo<br>', '2017-06-17', '23:58:47', 'img/activity/20170617235847.jpg', '1');

-- ----------------------------
-- Table structure for type_card
-- ----------------------------
DROP TABLE IF EXISTS `type_card`;
CREATE TABLE `type_card` (
  `ID_TYPE_CARD` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_CARD` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_CARD` varchar(500) NOT NULL,
  `DATE_TYPE_CARD` date NOT NULL,
  `TIME_TYPE_CARD` time NOT NULL,
  `IMAGE_TYPE_CARD` varchar(200) NOT NULL,
  `VALUE_TYPE_CARD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_CARD`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_card
-- ----------------------------
INSERT INTO `type_card` VALUES ('1', 'Bisa', 'Targeta de banco bisa', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_card` VALUES ('2', 'MasterCard', 'Tarjeta MaserCard', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_card` VALUES ('3', 'PayPal', 'Targetas PayPal', '0000-00-00', '00:00:00', '', '1');

-- ----------------------------
-- Table structure for type_check
-- ----------------------------
DROP TABLE IF EXISTS `type_check`;
CREATE TABLE `type_check` (
  `ID_TYPE_CHECK` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_CHECK` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_CHECK` varchar(500) NOT NULL,
  `DATE_TYPE_CHECK` date NOT NULL,
  `TIME_TYPE_CHECK` time NOT NULL,
  `IMAGE_TYPE_CHECK` varchar(200) NOT NULL,
  `VALUE_TYPE_CHECK` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_CHECK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_check
-- ----------------------------
INSERT INTO `type_check` VALUES ('1', 'reserve', 'Pedido de reserva', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_check` VALUES ('2', 'check In', 'Registrar ingreso de un huesped', '0000-00-00', '00:00:00', '', '2');
INSERT INTO `type_check` VALUES ('3', 'checck Out', 'Registrar salida de un huesped', '0000-00-00', '00:00:00', '', '3');

-- ----------------------------
-- Table structure for type_consume
-- ----------------------------
DROP TABLE IF EXISTS `type_consume`;
CREATE TABLE `type_consume` (
  `ID_TYPE_CONSUME` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_CONSUME` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_CONSUME` varchar(500) NOT NULL,
  `DATE_TYPE_CONSUME` date NOT NULL,
  `TIME_TYPE_CONSUME` time NOT NULL,
  `IMAGE_TYPE_CONSUME` varchar(200) NOT NULL,
  `VALUE_TYPE_CONSUME` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_CONSUME`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_consume
-- ----------------------------
INSERT INTO `type_consume` VALUES ('1', 'Check in', 'consumo del registro de ingreso de un huesped', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_consume` VALUES ('2', 'Check out', 'consumo del registro de la salida de un husped', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_consume` VALUES ('3', 'Consumo', 'consumo de un huesped cuando esta hospedado en el hotel', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_consume` VALUES ('4', 'Solicitud de servicio', 'Realiza el pedido para consumo de un servicio', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_consume` VALUES ('5', 'Reserva', 'Monto depositado para la reserva', '0000-00-00', '00:00:00', '', '2');
INSERT INTO `type_consume` VALUES ('6', 'Deposito', 'Deposito de efectivo a caja', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_consume` VALUES ('7', 'Cancelado', 'Transaccion de consumo eliminada', '0000-00-00', '00:00:00', '', '-1');
INSERT INTO `type_consume` VALUES ('8', 'Gasto', 'Gasto de dinero de la caja', '0000-00-00', '00:00:00', '', '3');

-- ----------------------------
-- Table structure for type_document
-- ----------------------------
DROP TABLE IF EXISTS `type_document`;
CREATE TABLE `type_document` (
  `ID_TYPE_DOCUMENT` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_DOCUMENT` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_DOCUMENT` varchar(500) NOT NULL,
  `DATE_TYPE_DOCUMENT` date NOT NULL,
  `TIME_TYPE_DOCUMENT` time NOT NULL,
  `IMAGE_TYPE_DOCUMENT` varchar(200) NOT NULL,
  `VALUE_TYPE_DOCUMENT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_DOCUMENT`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_document
-- ----------------------------
INSERT INTO `type_document` VALUES ('1', 'dni', 'dni', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_document` VALUES ('2', 'ci', 'carnet de identidad', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_document` VALUES ('3', 'pasaporte', 'para los estranjeros', '0000-00-00', '00:00:00', '', '1');

-- ----------------------------
-- Table structure for type_food
-- ----------------------------
DROP TABLE IF EXISTS `type_food`;
CREATE TABLE `type_food` (
  `ID_TYPE_FOOD` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_FOOD` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_FOOD` varchar(500) NOT NULL,
  `DATE_TYPE_FOOD` date NOT NULL,
  `TIME_TYPE_FOOD` time NOT NULL,
  `IMAGE_TYPE_FOOD` varchar(200) NOT NULL,
  `VALUE_TYPE_FOOD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_FOOD`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_food
-- ----------------------------
INSERT INTO `type_food` VALUES ('1', 'desayuno', 'se sirve en la ma&ntilde;ana', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_food` VALUES ('2', 'almuerzo', 'se sirve al medio d&iacute;a', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_food` VALUES ('3', 'cena', 'se sirve en la noche', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_food` VALUES ('5', 'postres', 'se sirve despues de la comida', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_food` VALUES ('6', 'refrescos', 'gaseosas y jugos', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_food` VALUES ('7', 'bebidas', 'bebidas con alchol', '0000-00-00', '00:00:00', '', '1');

-- ----------------------------
-- Table structure for type_hotel
-- ----------------------------
DROP TABLE IF EXISTS `type_hotel`;
CREATE TABLE `type_hotel` (
  `ID_TYPE_HOTEL` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_HOTEL` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_HOTEL` varchar(500) NOT NULL,
  `DATE_TYPE_HOTEL` date NOT NULL,
  `TIME_TYPE_HOTEL` time NOT NULL,
  `IMAGE_TYPE_HOTEL` varchar(200) NOT NULL,
  `VALUE_TYPE_HOTEL` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_HOTEL`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_hotel
-- ----------------------------
INSERT INTO `type_hotel` VALUES ('1', 'T&uacute;ristico', 'Establecimiento especialmente para turistas', '2016-04-20', '17:45:22', '', '1');
INSERT INTO `type_hotel` VALUES ('2', 'presidencial', 'para personas muy importantes', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_hotel` VALUES ('3', '1 estrella', 'categoria de 1 estrella', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_hotel` VALUES ('4', '2 estrellas', 'con categoria de 2 estrellas', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_hotel` VALUES ('5', '3 estrellas', 'con 3 estrellas', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_hotel` VALUES ('6', '4 estrellas', 'con 4 estrellas', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_hotel` VALUES ('7', '5 estrellas', 'con 5 estrellas', '2016-04-17', '13:07:06', '', '1');

-- ----------------------------
-- Table structure for type_log
-- ----------------------------
DROP TABLE IF EXISTS `type_log`;
CREATE TABLE `type_log` (
  `ID_TYPE_LOG` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_LOG` varchar(50) NOT NULL,
  `DESCR_TYPE_LOG` varchar(500) NOT NULL,
  `DATE_TYPE_LOG` date NOT NULL,
  `TIME_TYPE_LOG` time NOT NULL,
  `IMAGE_TYPE_LOG` varchar(200) NOT NULL,
  `VALUE_TYPE_LOG` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_LOG`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_log
-- ----------------------------
INSERT INTO `type_log` VALUES ('1', 'delete', 'eliminacion de tuplas, entodades o atributos', '2016-02-08', '21:40:09', '', '1');
INSERT INTO `type_log` VALUES ('2', 'insert', 'agregar tuplas, entidades o atributos en la base de datos', '2016-02-08', '21:40:56', '', '1');
INSERT INTO `type_log` VALUES ('3', 'update', 'modificar algun atributo, tupla o entidad en la basee de datos', '2016-02-08', '21:41:45', '', '1');
INSERT INTO `type_log` VALUES ('4', 'watch', 'registra todas las solicitudes de conexion a la base de datos', '2016-02-08', '21:42:37', '', '1');

-- ----------------------------
-- Table structure for type_message
-- ----------------------------
DROP TABLE IF EXISTS `type_message`;
CREATE TABLE `type_message` (
  `ID_TYPE_MESSAGE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_MESSAGE` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_MESSAGE` varchar(500) NOT NULL,
  `DATE_TYPE_MESSAGE` date NOT NULL,
  `TIME_TYPE_MESSAGE` time NOT NULL,
  `IMAGE_TYPE_MESSAGE` varchar(200) NOT NULL,
  `VALUE_TYPE_MESSAGE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_MESSAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_message
-- ----------------------------
INSERT INTO `type_message` VALUES ('1', 'mensaje', 'envio de mensajes', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('2', 'llegada de huespedes', 'notificacion cuando un cliente se registra', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('3', 'salida de huespedes', 'notificacion cuando un cliente se registra para salir del hotel', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('4', 'alerta', 'recordatorio de un evento', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('5', 'alerta importante', 'recordatorio de un evento importante en el hotel', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('6', 'notoficacion solicitud reserva', 'solicitud de reserva de un cliente', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('7', 'validacion reserva', 'confirmacion de reserva de la reserva', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('8', 'usuario nuevo registrado en e hotel', 'cuando es registro del usuairo se ha realizado por el administrador o la recepcionista', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('9', 'alerta reserva', 'reserva de una persona importante en el hotel', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('10', 'observacion', 'observaciones del cliente', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('11', 'sugerencias', 'sugerencias del cliente', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('12', 'notas', 'recordatorios ', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('13', 'quejas', 'nota de quejas de los clientes', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('14', 'usuario nuevo', 'notificacion de nuevo usuario', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_message` VALUES ('15', 'preguntas de usuario', 'recibe las preguntas de los usuario', '0000-00-00', '00:00:00', '', '1');

-- ----------------------------
-- Table structure for type_money
-- ----------------------------
DROP TABLE IF EXISTS `type_money`;
CREATE TABLE `type_money` (
  `ID_TYPE_MONEY` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_MONEY` varchar(10) NOT NULL,
  `DESCRIPTION_TYPE_MONEY` varchar(75) NOT NULL,
  `DATE_TYPE_MONEY` date NOT NULL,
  `TIME_TYPE_MONEY` time NOT NULL,
  `IMAGE_TYPE_MONEY` varchar(200) NOT NULL,
  `VALUE_TYPE_MONEY` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_MONEY`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_money
-- ----------------------------
INSERT INTO `type_money` VALUES ('1', 'Bs', 'Boliviano', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_money` VALUES ('2', '$', 'Dolar', '0000-00-00', '00:00:00', '', '1');

-- ----------------------------
-- Table structure for type_phone
-- ----------------------------
DROP TABLE IF EXISTS `type_phone`;
CREATE TABLE `type_phone` (
  `ID_TYPE_PHONE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_PHONE` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_PHONE` varchar(500) NOT NULL,
  `DATE_TYPE_PHONE` date NOT NULL,
  `TIME_TYPE_PHONE` time NOT NULL,
  `IMAGE_TYPE_PHONE` varchar(200) NOT NULL,
  `VALUE_TYPE_PHONE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_PHONE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_phone
-- ----------------------------
INSERT INTO `type_phone` VALUES ('1', 'celular', 'dispositivo movil', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_phone` VALUES ('2', 'telefono', 'fijo', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_phone` VALUES ('3', 'telefono empresarial', 'telefono de una empresa', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_phone` VALUES ('4', 'celular empresarial', 'celular de una empresa', '0000-00-00', '00:00:00', '', '1');

-- ----------------------------
-- Table structure for type_rule
-- ----------------------------
DROP TABLE IF EXISTS `type_rule`;
CREATE TABLE `type_rule` (
  `ID_TYPE_RULE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_RULE` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_RULE` varchar(500) NOT NULL,
  `DATE_TYPE_RULE` date NOT NULL,
  `TIME_TYPE_RULE` time NOT NULL,
  `IMAGE_TYPE_RULE` varchar(200) NOT NULL,
  `VALUE_TYPE_RULE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_RULE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_rule
-- ----------------------------
INSERT INTO `type_rule` VALUES ('1', 'habitacion', 'reglas que se aplican a la estancia de la habitacion', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_rule` VALUES ('2', 'piscina', 'reglas para las piscinas', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_rule` VALUES ('3', 'comedor', 'reglas para el comedor', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_rule` VALUES ('4', 'reservas', 'reglas para solicitar reservas', '0000-00-00', '00:00:00', '', '1');

-- ----------------------------
-- Table structure for type_service
-- ----------------------------
DROP TABLE IF EXISTS `type_service`;
CREATE TABLE `type_service` (
  `ID_TYPE_SERVICE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_SERVICE` varchar(50) NOT NULL,
  `DESCRIPTION_TYPE_SERVICE` varchar(500) NOT NULL,
  `DATE_TYPE_SERVICE` date NOT NULL,
  `TIME_TYPE_SERVICE` time NOT NULL,
  `IMAGE_TYPE_SERVICE` varchar(200) NOT NULL,
  `VALUE_TYPE_SERVICE` decimal(2,0) NOT NULL,
  PRIMARY KEY (`ID_TYPE_SERVICE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_service
-- ----------------------------
INSERT INTO `type_service` VALUES ('1', 'consumo', 'consumo de servicios dentro del establecimiento', '0000-00-00', '00:00:00', '', '1');
INSERT INTO `type_service` VALUES ('2', 'hospedaje', 'registro de habitaciones que no permiten reservas', '0000-00-00', '00:00:00', '', '2');
INSERT INTO `type_service` VALUES ('3', 'oferta', 'oferta de servicios por tiempo limitado', '0000-00-00', '00:00:00', '', '-2');
INSERT INTO `type_service` VALUES ('4', 'registro', 'registro de un huesped en el establecimiento', '0000-00-00', '00:00:00', '', '3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_PERSON` int(11) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL,
  `ID_STATE_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERSON`),
  KEY `FK_RELATIONSHIP_71` (`ID_STATE_USER`),
  CONSTRAINT `FK_RELATIONSHIP_31` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_71` FOREIGN KEY (`ID_STATE_USER`) REFERENCES `state_user` (`ID_STATE_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', '1');
INSERT INTO `user` VALUES ('2', '$2y$10$.olQpR1a38IbLPY../D/CO69SvzimgOyIUKVEfABg9XyXxvKcZlN.', '1');
INSERT INTO `user` VALUES ('3', '$2y$10$grmVN3jUpNDS5Yx8/reqx.CCvY4jk2lpaIAgmuvDhTJd0ynZzSX5i', '1');
INSERT INTO `user` VALUES ('36', '$2y$10$wkXac49oLmB/XoWZVspJQ.0rhQcBOD/drhZWq4Wa2i3e3sVcTT35q', '1');
INSERT INTO `user` VALUES ('37', '$2y$10$N1cxqu8OOKwCtHlkxsprmu3fQGt7bdmwCX0SRH5WTQzXhksB7GP9K', '1');
INSERT INTO `user` VALUES ('38', '$2y$10$O1NZ9rfEa8Wh9Hqosxird.N2kFnG/WtrcoqT8ZkRQstDsUsFCObEW', '1');
INSERT INTO `user` VALUES ('39', '$2y$10$NzPEURRJzEdGdcNUqM/bWuhh0QNAsbWLAOpmjvuvloeGpJ5qnQ3dG', '1');
INSERT INTO `user` VALUES ('40', '$2y$10$Y2emfSOiaCjUMoXP0M8htOU7cWb8DWVdYmu72BbQkx2WjRYnSk/b6', '1');
INSERT INTO `user` VALUES ('41', '$2y$10$MuHLzOLrp68JJ0OvYo94VuqXzJ/1gNeBNOaIOnNiL5tzS1Mpx8XJO', '1');
INSERT INTO `user` VALUES ('42', '$2y$10$wG081wGfdiELXxWsy5AtP.S6oJX72qlcNg03WqlXkM8aVA0C8mO7u', '1');
INSERT INTO `user` VALUES ('43', '$2y$10$wkquhfjnypWzCxGr0gdpgeTstDBRxFKrZ0px/gVy3P0iNsDviYZe6', '1');
INSERT INTO `user` VALUES ('44', '$2y$10$HEbX5SwmtMnsEQyFVLCX/ODK0XxEjoHfL/pUPlNvkCqS0wzvv1No6', '1');
INSERT INTO `user` VALUES ('45', '$2y$10$MoDDZAiOB7sgLiyfAt13o.b9QfsGzUa19aseAaAabuydlNjyHP1LG', '1');
INSERT INTO `user` VALUES ('46', '$2y$10$cPxUKUbiGppdZwji7Ow2zu/D8NGpwD6nsi9cpDcvtLJ/DtF/aU5Qa', '1');
INSERT INTO `user` VALUES ('47', '$2y$10$oCfktPzsQWphG52CGAWlhOFInX.zXbiTtHo9Q1IPAOBmcW5qQvJT.', '1');
INSERT INTO `user` VALUES ('48', '$2y$10$n5WeMnn80ptm6hajs3EZJO.8VqCOPdET31yQ.A6oxTJXXcjB3E5du', '1');
INSERT INTO `user` VALUES ('49', '$2y$10$icY3fn3cdgjh7DK3661baumaCoCRcPVuCS8hMsiCCaN0TLaIFcpI6', '1');
INSERT INTO `user` VALUES ('50', '$2y$10$3tWsYPyBipVejJFR2VyMmeukSQ7NCWLcR2WLfZFmtYBTDXgPPjxGW', '1');
INSERT INTO `user` VALUES ('51', '$2y$10$KFU.b48nB38EnJ2gcQcC/.qxotjw1UP0Ya4RA8Ry24tSVZokarYea', '1');
INSERT INTO `user` VALUES ('52', '$2y$10$tImipbl/NXz7rsbt9QRPROA7qiA4TNJxAzTPheEEYMpkQjwF3z5H.', '1');
INSERT INTO `user` VALUES ('53', '$2y$10$osmRv7qEpZlS3kQxdMjXIuz/FrSGvIPmo68wcf01qa0ga9C.tp0SW', '1');
INSERT INTO `user` VALUES ('54', '$2y$10$YVk5wpuG5IfSksRDv6nn5eFZsxQ8jTFrNi/crBFdJ9aBD8ktOKnn2', '1');
INSERT INTO `user` VALUES ('55', '$2y$10$uIKkBiEjGhgbdgpH9c/Qruu8tCZUP1JuQ5Z9Hh4PwcPlIr9nfa7DG', '1');
INSERT INTO `user` VALUES ('56', '$2y$10$jRCTCgiLZGEsYC9uQ5WhPu7UMyqbOS4DjvVxKHsR9aaXXUjvGUACC', '1');
INSERT INTO `user` VALUES ('57', '$2y$10$pb8fhqA9h.ykAjY31q7xauX8oAyU6p/aYqinQ2eVYLXlIUSEMyMca', '1');
INSERT INTO `user` VALUES ('58', '$2y$10$BxQ.3Ka9z.KW7n7J6hMBh.Gmb8ZxlXote8RSEZyYWUN3zgPcpS8wm', '1');
INSERT INTO `user` VALUES ('59', '$2y$10$aiw1RPLKdL5rKRdgsWjlpe.drVYC/kpqXIWWxH.5ogvOo8UaB610C', '1');
INSERT INTO `user` VALUES ('60', '$2y$10$y22/sD/OUeWVXs1glwTOOusJyCbKZFWmuTnNE.jotFA7A7b5d1CQW', '1');
INSERT INTO `user` VALUES ('61', '$2y$10$tnFmwHOpH.oOmv38jPot.OZgzN.2M6VUycitt5tn5hYRx68otmcJ.', '1');
INSERT INTO `user` VALUES ('62', '$2y$10$aWVGUtq01QqlXWoip/YazOhDFw.7ktlOnXUkFPz7uoR8qSdblRGey', '1');
INSERT INTO `user` VALUES ('63', '$2y$10$CgDJHi3sAK6DB457uaHqc.CuhzvqUQ5JKCkfNS2CFB8oszq2H3U3e', '1');
INSERT INTO `user` VALUES ('64', '$2y$10$bjnFj81bcN7X7jBIDzhUtOU2jhENU/5JBbVe89L4gqdwQxJB/t7D.', '1');
INSERT INTO `user` VALUES ('65', '$2y$10$qMFikpRig2CATRG/l3ab7eFQM/1ClhKDV.EIm4pp4FGXRLpeVIAWy', '1');
INSERT INTO `user` VALUES ('66', '$2y$10$qskj7smDPFudskoafHzUw.INEKvzYwxj8HPu5BACADcfE4//KylG2', '1');
INSERT INTO `user` VALUES ('67', '$2y$10$ZIzyR.bVTzd9cA1RPAi90u2tCF1/mb6YEVQDn3fuzwj1MSMn2a.oa', '1');
INSERT INTO `user` VALUES ('68', '$2y$10$PGI4Z/wdAZjaR97UYkAPUuwtvu1q.bPGZmhYKTw9o7bFqv.fjlEaG', '1');
INSERT INTO `user` VALUES ('69', '$2y$10$z4HHCQpYp/X0EY53NgmbJe5L/jboYhn3I4qZAA.ae5iyRTYOXFodi', '1');
INSERT INTO `user` VALUES ('70', '$2y$10$92y5qB8p7SGnNbY/LYd//.GfslcUsHduXu4EEeObPB9kodUNePSzm', '1');
INSERT INTO `user` VALUES ('71', '$2y$10$Y/OiUbyjzobYJQhPjr7ZZuZbWVHTDe0PX/5CdqdJFmQJ02vvjv6z6', '1');
INSERT INTO `user` VALUES ('72', '$2y$10$gUBXYasECgD/BWmVykjM.ewQBbZ2edq07o7i3Nz69eKptjDBt8hUm', '1');
INSERT INTO `user` VALUES ('73', '$2y$10$/va2QgWvYj6LD0rYSrHskeTfI4HVKw6G5vs7WGOxnEhjYW5MoF96.', '1');
INSERT INTO `user` VALUES ('74', '$2y$10$fsnOKaHYgajXxMRKvlvrTORM4hqTDMmC5VOkI5iblYBYRzF/0jq/a', '1');
INSERT INTO `user` VALUES ('75', '$2y$10$p/Il47K/gZTbMqs0fCAzAuRchp97YMPgLVcCUZ.Q3jmP3BuBZqU7e', '1');
INSERT INTO `user` VALUES ('76', '$2y$10$IeEWO8mDA.3GfDhhD3JhTuWVC1jRvXiiBI5p5x2O8EpY/gKYPQXfq', '1');
INSERT INTO `user` VALUES ('77', '$2y$10$SHwGAa0jaN9jMSv8UJmJZutB8AZnGLLWtbasG9lylOmnOB8P7sDnS', '1');
INSERT INTO `user` VALUES ('78', '$2y$10$p9hvEOIMtrMvEPMiGcF/EONxjhkFLIiuNt0VE8/B018ZFuFvVB8FW', '1');
INSERT INTO `user` VALUES ('79', '$2y$10$KlIh.yULa3pSS0BjYtVvmuPRyf.rGhzTq9RC.L8oILPNnszftG0qm', '1');
INSERT INTO `user` VALUES ('80', '$2y$10$QFqbrMovguUVn30aWq3.Wu3qbOe6trHv1IsD.UOW9Pf4TNVVzYeb6', '1');
INSERT INTO `user` VALUES ('81', '$2y$10$gsGHpg4XW4HB7i5artEYquGg58EsXoKObR6jIIyfl.Jj1xMRvNsA6', '1');
INSERT INTO `user` VALUES ('82', '$2y$10$yeRHte3fJSkKrQY7eWvYleYXHKFJ9eRfDCTajrcpKu4B8nlW0L9Pq', '1');
INSERT INTO `user` VALUES ('83', '$2y$10$b7355mS2fzxpoWVzEugnW.0RTJTtWn0m0X3y0QTbDGgTSO45Dru0O', '1');
INSERT INTO `user` VALUES ('84', '$2y$10$MMoQa0pgvOiHj3q1w8rhJ.iHfhJCK/gD.ZpL6N8rfyvoWnFDhK0Me', '1');
INSERT INTO `user` VALUES ('85', '$2y$10$gx1J.POgmd4eVMvgbG.0Guvhcdd7KrjzonQFSDsvmT/Sq8812pUwy', '1');
INSERT INTO `user` VALUES ('86', '$2y$10$PL86V2AVHELhV/LHI17tpeP66CMjUDh7b2FZo23Zq/jSsXZS6tesm', '1');
INSERT INTO `user` VALUES ('87', '$2y$10$.1q1DKxaV6BkPR6CLmSBV.9qEB6G8ZlSFpbOth63xcOAlyyxpRWO2', '1');
INSERT INTO `user` VALUES ('88', '$2y$10$oJ/ow8qzZp8I6LaaRM.PHOVSqF7PEV2db6isgwGSDu8iPk/0tyiyK', '1');
INSERT INTO `user` VALUES ('89', '$2y$10$daWCxQO.z86TssDUmSCfj.q5wmO3MUN2371n9XQszUs53kgGjB96C', '1');
INSERT INTO `user` VALUES ('90', '$2y$10$HNu.FIzWYV5/h4kLGKcb5uHVVxkaM.MCyE.u6nJaNjg6.ZMKnr1X2', '1');
INSERT INTO `user` VALUES ('91', '$2y$10$5v9I/kzwD.mrqDOPRgDwq.rm4y95SXRzY2B2r9tinrVYG6izc6Jn6', '1');
INSERT INTO `user` VALUES ('92', '$2y$10$W/o75WljcliGXx6E9X.3f.p2QaGO9XH2SC0C3al.cniaUwK9Co3Cu', '1');
INSERT INTO `user` VALUES ('93', '$2y$10$MX7Lx1nP/H4J8TdH6f8Y/OaForrpwvFvSK4S4Fe2/7I9xsQrbRyLW', '1');
INSERT INTO `user` VALUES ('94', '$2y$10$vYfWj6gqVW7i6MNRwVbLnuONjynEMvHM.HEahKv/gCSL.YWVmQoCO', '1');
INSERT INTO `user` VALUES ('95', '$2y$10$DGvDPx.UR0DRFLSGxSOrTupZAVvKA6Ejy3iPCKcA0G8/B9PAJ1e9y', '1');
INSERT INTO `user` VALUES ('96', '$2y$10$nO4mBusZYuwXSkpoI4bK.eG/9WOrdxxrgppw5K8fWGY8obcFD1fG6', '1');
INSERT INTO `user` VALUES ('97', '$2y$10$//VkutttTDt13VO6gv5mWee4vagw1Oiuq1UUQ5F7whp5e471wjhdm', '1');
INSERT INTO `user` VALUES ('98', '$2y$10$TPIzQi7pCOcCArh8kvF3MOQNf39AFZ30z5eJFhD.KSoqoj/OCKVcS', '1');
INSERT INTO `user` VALUES ('99', '$2y$10$28vG6hcPwduWfYlxPa8ZNOq2qfU2wLwCS589cyX7NsD9BpAl5MfqW', '1');
INSERT INTO `user` VALUES ('100', '$2y$10$9jYVpZ0MsFW6BlVn0O5em.T8dVGz5GaSEgy/eHo3hAywDyQSka3bW', '1');
INSERT INTO `user` VALUES ('101', '$2y$10$nl9HhF.LCRQHsWVVn0y7We55r9X2/GOfqKoeZxkwXlHE7HI3pLTya', '1');
INSERT INTO `user` VALUES ('102', '$2y$10$7HAbTKm4552I7S7U74FmJuEkejNGRW2DRpznF2DTjPR3kGRdzcrZW', '1');
INSERT INTO `user` VALUES ('103', '$2y$10$lKPuvdJvBsK6tS0dhpdxFu7exxyiSIdViDm.7HJAU7XjK3.Z2g1sG', '1');
INSERT INTO `user` VALUES ('104', '$2y$10$5cdcavdlfDQdzmDKkc9f/eAwfbIVVjQTGZwBoRXnyME.S/sdsvHwa', '1');
INSERT INTO `user` VALUES ('105', '$2y$10$Uhjs27UL5h5i0X4WbSEndOuI8.RzS84PsEpDZHhqtg0T2lIM.yS0.', '1');
INSERT INTO `user` VALUES ('106', '$2y$10$z1kL2aEetcjuZXqiykL33uTQ01vUqqM7T4eHg3/i7/NfgUp6AMbeq', '1');
INSERT INTO `user` VALUES ('107', '$2y$10$2gnIcEAk6xOZVUoxnqZtpuEacyuWQ5gNJfP/Qq0Eh7XBX1jeS1vSO', '1');
INSERT INTO `user` VALUES ('108', '$2y$10$da.SnyQL.Grj14tEEeXqUOMVLrmwZcnGvbWKOt4oZS9tIv208NX.K', '1');
INSERT INTO `user` VALUES ('109', '$2y$10$YKXAiEtkQpvek6zBCkJDguuKpVbkg2IRa.0COMsIODXlPHjhOJ0IC', '1');
INSERT INTO `user` VALUES ('110', '$2y$10$vbLL8MnaSYlaCTvPRq07.OVJfLpoDEEsNNCG01Wl/G7KbwmIUw/3q', '1');
INSERT INTO `user` VALUES ('111', '$2y$10$gzt5H9CtlKy7/ArGicN4seOrouyfZYlzk.8Lbt.AmhVYuxhVIiHk.', '1');
INSERT INTO `user` VALUES ('112', '$2y$10$8vnpjPTsOkIw6Vp.etf36e0rSCdyLqp16ZjVz4oNN08ZhrHQ/lFdm', '1');
INSERT INTO `user` VALUES ('113', '$2y$10$bQvOnLnEnV2V40zKB654.ee3gtQzjXRtXLsKBSVe72slYUIpI5xB2', '1');
INSERT INTO `user` VALUES ('114', '$2y$10$Hkz7ez4MIH4OxOd1KqdH0OPm1Iy1luewljVaTl3FtnUaMJA3lsz5q', '1');
INSERT INTO `user` VALUES ('115', '$2y$10$4ULgQPzJCpOTpfPlSQYefOjG3Pyk3hsweR216Ya3DU46sSvG2w6e2', '1');
INSERT INTO `user` VALUES ('116', '$2y$10$7MgG0whj1OlyXyTaDQDbleLJRY2YyOdD/n6kzUfciHO1GoLfSEj1O', '1');
INSERT INTO `user` VALUES ('117', '$2y$10$i.lSXIMi7.0AZgYEwBKz4ORMa5KW3wFZO3/Sf51ILZMr1v0GyKPFy', '1');
INSERT INTO `user` VALUES ('118', '$2y$10$cAbLnVaSzk/CBxSssb08eOlqyik2Q3pD7YYrR2CyswlyYaBOW6oMq', '1');
INSERT INTO `user` VALUES ('119', '$2y$10$t9ax2S4njo7Aks1Ovsyxp.030KQHcGIPPk8bJDUUJOEg3nbfd3/0a', '1');
INSERT INTO `user` VALUES ('120', '$2y$10$avs41DVgTKnhpIxPdx3r6uCUpiXZw6wcIY3pIen4qLMJdcR4Jwyp6', '1');
INSERT INTO `user` VALUES ('121', '$2y$10$rJT8KazhYA1kOYlL.waTKeFfST9HVmTW/ickGK.IqnDsnNm0naz.m', '1');
INSERT INTO `user` VALUES ('122', '$2y$10$d.mbbKIP67GU49zNpEoEmuV38zdP.tcADpxAh2yzjB9qrzYcP/SlK', '1');
INSERT INTO `user` VALUES ('123', '$2y$10$eVangCAh2CczvlX65A7Dke2fRIOFTRc7eIALvVdEHrbsWzYs8LCNm', '1');
INSERT INTO `user` VALUES ('124', '$2y$10$tHNm26ui8nCrLRPBiCl5Ue.DcVtkTTBVXK0VwdL.MXRHfWqYCsvN2', '1');
INSERT INTO `user` VALUES ('125', '$2y$10$t3kwRhcVygCwV.mCtwROAO9zH0jtgck4.bINOJtzXz4.ZAobdgqnW', '1');
INSERT INTO `user` VALUES ('126', '$2y$10$k9sQj27RmhNltt6WxfR1XOhHFKUO9I.ApK6yoy7fgYHBCIFdUMOYa', '1');
INSERT INTO `user` VALUES ('127', '$2y$10$9FAORH5nW1eR8DBmWiRdH.lRxRrcHe/z5chBtbk2JfqSuT81l2oqS', '1');
INSERT INTO `user` VALUES ('128', '$2y$10$3dsDzIoSAvNDQ.KVihxjBuvy9dH4YFJk//FyYoz.OUVyn92yGS1wq', '1');
INSERT INTO `user` VALUES ('129', '$2y$10$m8kgCSUiL9ECImx2585mGuCt/B8.ykv8xZXTy5.zCp.pcnA2rx3LG', '1');
INSERT INTO `user` VALUES ('130', '$2y$10$9qTpfdQlaxerqeU0UcAnveaL.HwVkLSoEB.zAC/LXT3c99iWQ16zu', '1');
INSERT INTO `user` VALUES ('131', '$2y$10$hL1.s5BOouo.1PdPxSOdZuZaiHS3AUrQAMYJBRTB/FXwT4KOShsHe', '1');
INSERT INTO `user` VALUES ('132', '$2y$10$.9G9AXq4wxWVmk5X3O5a.OHYC5VAC.IWM34ChLwPXf5fOHHKtpwDG', '1');
INSERT INTO `user` VALUES ('133', '$2y$10$2NOnb0vVj6fR/gEZ5WmQY.JGLm.2AlaWhgcfszPdPjChTUtAFqgVa', '1');
INSERT INTO `user` VALUES ('134', '$2y$10$qsUxzGyCybrQeFpLz2ezNeaKBXQoe0LGDhVztaup1xLSgYPDc9Ofq', '1');
INSERT INTO `user` VALUES ('135', '$2y$10$tbbslfPhvQ13bnXfzTtgK.3Zgw3Gusv2ElMO6kujq4Vn0ddDwEct.', '1');

-- ----------------------------
-- Table structure for user_name
-- ----------------------------
DROP TABLE IF EXISTS `user_name`;
CREATE TABLE `user_name` (
  `ID_PERSON` int(11) NOT NULL,
  `NAME_USER` varchar(50) NOT NULL,
  `ACTIVE_USER` tinyint(1) NOT NULL,
  `DATE_REGISTER_NAME_USER` date NOT NULL,
  `TIME_REGISTER_NAME_USER` time NOT NULL,
  PRIMARY KEY (`NAME_USER`),
  KEY `FK_RELATIONSHIP_80` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_80` FOREIGN KEY (`ID_PERSON`) REFERENCES `user` (`ID_PERSON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_name
-- ----------------------------
INSERT INTO `user_name` VALUES ('36', '072660251', '1', '2017-06-25', '16:27:34');
INSERT INTO `user_name` VALUES ('54', '12334565', '1', '2015-01-04', '07:06:04');
INSERT INTO `user_name` VALUES ('40', '1235345665', '1', '2017-06-25', '16:46:44');
INSERT INTO `user_name` VALUES ('41', '128753665', '1', '2017-06-25', '16:49:09');
INSERT INTO `user_name` VALUES ('43', '1324564534', '1', '2017-06-25', '16:52:15');
INSERT INTO `user_name` VALUES ('119', '13256465', '1', '2017-06-19', '10:05:14');
INSERT INTO `user_name` VALUES ('120', '13546494', '1', '2017-06-19', '10:05:53');
INSERT INTO `user_name` VALUES ('114', '1356564', '1', '2017-05-19', '10:01:38');
INSERT INTO `user_name` VALUES ('115', '15648666', '1', '2017-05-19', '10:03:13');
INSERT INTO `user_name` VALUES ('114', '16554645', '1', '2017-05-19', '10:01:38');
INSERT INTO `user_name` VALUES ('87', '212344656', '1', '2015-01-10', '07:21:42');
INSERT INTO `user_name` VALUES ('3', '2134654986', '1', '2017-06-17', '23:48:11');
INSERT INTO `user_name` VALUES ('45', '2135453564', '1', '2017-06-25', '16:56:17');
INSERT INTO `user_name` VALUES ('43', '2436456564', '1', '2017-06-25', '16:52:15');
INSERT INTO `user_name` VALUES ('69', '24542755', '1', '2015-01-06', '08:24:28');
INSERT INTO `user_name` VALUES ('105', '2455454', '1', '2015-03-05', '09:20:32');
INSERT INTO `user_name` VALUES ('57', '3131235', '1', '2015-01-04', '07:00:11');
INSERT INTO `user_name` VALUES ('3', '314654662', '1', '2017-06-17', '23:48:11');
INSERT INTO `user_name` VALUES ('50', '321324534', '1', '2015-01-02', '08:55:07');
INSERT INTO `user_name` VALUES ('48', '32135456', '1', '2015-01-02', '08:43:13');
INSERT INTO `user_name` VALUES ('42', '321354634', '1', '2017-06-25', '16:50:42');
INSERT INTO `user_name` VALUES ('2', '32154653', '1', '2017-06-17', '23:46:32');
INSERT INTO `user_name` VALUES ('2', '32165465', '1', '2017-06-17', '23:46:32');
INSERT INTO `user_name` VALUES ('1', '32165699', '1', '2017-06-17', '21:39:05');
INSERT INTO `user_name` VALUES ('39', '3254654536', '1', '2017-06-25', '16:44:30');
INSERT INTO `user_name` VALUES ('73', '326546', '1', '2015-01-08', '00:20:19');
INSERT INTO `user_name` VALUES ('44', '3421234655', '1', '2017-06-25', '16:54:17');
INSERT INTO `user_name` VALUES ('45', '345213466', '1', '2017-06-25', '16:56:18');
INSERT INTO `user_name` VALUES ('89', '34556546', '1', '2017-06-26', '03:41:03');
INSERT INTO `user_name` VALUES ('95', '3543546', '1', '2015-02-05', '04:27:26');
INSERT INTO `user_name` VALUES ('81', '41345354', '1', '2015-01-10', '06:34:02');
INSERT INTO `user_name` VALUES ('72', '42354566', '1', '2015-01-08', '00:21:00');
INSERT INTO `user_name` VALUES ('53', '42453445', '1', '2015-01-04', '07:05:26');
INSERT INTO `user_name` VALUES ('44', '42454686', '1', '2017-06-25', '16:54:17');
INSERT INTO `user_name` VALUES ('41', '42654535654', '1', '2017-06-25', '16:49:09');
INSERT INTO `user_name` VALUES ('49', '43534355437', '1', '2015-01-02', '08:55:07');
INSERT INTO `user_name` VALUES ('86', '43545343', '1', '2015-01-10', '07:21:12');
INSERT INTO `user_name` VALUES ('97', '435465456', '1', '2015-02-26', '08:59:57');
INSERT INTO `user_name` VALUES ('38', '4356554654', '1', '2017-06-25', '16:42:27');
INSERT INTO `user_name` VALUES ('77', '45343456', '1', '2015-01-08', '00:44:04');
INSERT INTO `user_name` VALUES ('89', '4534354354', '1', '2017-06-26', '03:41:03');
INSERT INTO `user_name` VALUES ('81', '453465656', '1', '2015-01-10', '06:34:02');
INSERT INTO `user_name` VALUES ('84', '4543456', '1', '2015-01-10', '07:18:52');
INSERT INTO `user_name` VALUES ('55', '4553343', '1', '2015-01-04', '07:01:51');
INSERT INTO `user_name` VALUES ('106', '456', '1', '2015-03-31', '09:27:06');
INSERT INTO `user_name` VALUES ('90', '45644564', '1', '2017-06-26', '03:46:07');
INSERT INTO `user_name` VALUES ('113', '456456', '1', '2017-04-18', '09:38:28');
INSERT INTO `user_name` VALUES ('84', '4564564', '1', '2015-01-10', '07:18:52');
INSERT INTO `user_name` VALUES ('103', '456456454', '1', '2015-03-05', '09:19:53');
INSERT INTO `user_name` VALUES ('96', '45645656', '1', '2015-02-05', '04:27:26');
INSERT INTO `user_name` VALUES ('100', '456464564', '1', '2015-02-26', '09:12:24');
INSERT INTO `user_name` VALUES ('90', '456464565', '1', '2017-06-26', '03:46:07');
INSERT INTO `user_name` VALUES ('103', '456465456', '1', '2015-03-05', '09:20:54');
INSERT INTO `user_name` VALUES ('109', '456468', '1', '2015-05-15', '09:30:06');
INSERT INTO `user_name` VALUES ('128', '456489', '1', '2017-06-18', '10:19:55');
INSERT INTO `user_name` VALUES ('129', '4564898', '1', '2017-06-18', '10:20:26');
INSERT INTO `user_name` VALUES ('116', '45649', '1', '2017-05-19', '10:03:13');
INSERT INTO `user_name` VALUES ('51', '4565349', '1', '2015-01-04', '07:02:57');
INSERT INTO `user_name` VALUES ('52', '4565434', '1', '2015-01-04', '07:04:46');
INSERT INTO `user_name` VALUES ('100', '456546', '1', '2015-02-26', '09:12:24');
INSERT INTO `user_name` VALUES ('123', '4566489', '1', '2017-06-20', '10:11:20');
INSERT INTO `user_name` VALUES ('108', '464565', '1', '2015-03-31', '09:27:47');
INSERT INTO `user_name` VALUES ('110', '464566', '1', '2015-05-15', '09:30:33');
INSERT INTO `user_name` VALUES ('124', '46468998', '1', '2017-06-20', '10:11:21');
INSERT INTO `user_name` VALUES ('118', '46489465', '1', '2017-05-19', '10:02:26');
INSERT INTO `user_name` VALUES ('135', '464897', '1', '2017-06-18', '10:22:24');
INSERT INTO `user_name` VALUES ('133', '464989', '1', '2017-06-18', '10:21:49');
INSERT INTO `user_name` VALUES ('68', '46543465', '1', '2015-01-06', '08:24:28');
INSERT INTO `user_name` VALUES ('121', '465456', '1', '2017-06-19', '10:05:53');
INSERT INTO `user_name` VALUES ('109', '465456456', '1', '2015-05-15', '09:30:06');
INSERT INTO `user_name` VALUES ('102', '46546464', '1', '2015-02-26', '09:15:02');
INSERT INTO `user_name` VALUES ('112', '465465', '1', '2017-04-18', '09:38:28');
INSERT INTO `user_name` VALUES ('75', '46546596', '1', '2015-01-08', '00:42:52');
INSERT INTO `user_name` VALUES ('127', '465469459', '1', '2017-06-18', '10:19:26');
INSERT INTO `user_name` VALUES ('88', '465486', '1', '2015-01-10', '07:22:34');
INSERT INTO `user_name` VALUES ('126', '466546', '1', '2017-06-18', '10:19:05');
INSERT INTO `user_name` VALUES ('83', '5', '1', '2015-01-10', '06:54:30');
INSERT INTO `user_name` VALUES ('46', '53434544', '1', '2017-06-25', '16:58:06');
INSERT INTO `user_name` VALUES ('82', '53446632', '1', '2015-01-10', '06:53:22');
INSERT INTO `user_name` VALUES ('71', '53464565', '1', '2015-01-08', '00:29:52');
INSERT INTO `user_name` VALUES ('119', '534659', '1', '2017-06-19', '10:05:14');
INSERT INTO `user_name` VALUES ('67', '54224575', '1', '2015-01-06', '08:23:04');
INSERT INTO `user_name` VALUES ('104', '54343', '1', '2015-03-05', '09:20:32');
INSERT INTO `user_name` VALUES ('42', '54346343546', '1', '2017-06-25', '16:50:41');
INSERT INTO `user_name` VALUES ('56', '54354546', '1', '2015-01-04', '07:01:03');
INSERT INTO `user_name` VALUES ('85', '543546', '1', '2015-01-10', '07:20:31');
INSERT INTO `user_name` VALUES ('76', '543649', '1', '2015-01-08', '00:43:28');
INSERT INTO `user_name` VALUES ('106', '54456', '1', '2015-03-31', '09:27:06');
INSERT INTO `user_name` VALUES ('101', '545345653', '1', '2015-02-26', '09:15:02');
INSERT INTO `user_name` VALUES ('130', '545649', '1', '2017-06-18', '10:21:07');
INSERT INTO `user_name` VALUES ('117', '546456456', '1', '2017-05-19', '10:02:26');
INSERT INTO `user_name` VALUES ('97', '5464565', '1', '2015-02-26', '08:59:57');
INSERT INTO `user_name` VALUES ('107', '546456546', '1', '2015-03-31', '09:27:47');
INSERT INTO `user_name` VALUES ('132', '546546', '1', '2017-06-18', '10:21:49');
INSERT INTO `user_name` VALUES ('46', '5646455346', '1', '2017-06-25', '16:58:05');
INSERT INTO `user_name` VALUES ('1', '7654321', '1', '2017-06-17', '20:30:33');
INSERT INTO `user_name` VALUES ('36', '77266025', '1', '2017-06-25', '16:27:34');
INSERT INTO `user_name` VALUES ('37', '912872781', '1', '2017-06-25', '16:36:20');
INSERT INTO `user_name` VALUES ('38', '9128750017', '1', '2017-06-25', '16:42:27');
INSERT INTO `user_name` VALUES ('37', '9128752781', '1', '2017-06-25', '16:36:20');
INSERT INTO `user_name` VALUES ('40', '9128753932', '1', '2017-06-25', '16:46:44');
INSERT INTO `user_name` VALUES ('39', '912875427354499', '1', '2017-06-25', '16:44:30');
INSERT INTO `user_name` VALUES ('1', 'admin@gmail.com', '1', '2017-06-17', '20:30:33');
INSERT INTO `user_name` VALUES ('100', 'blalbla@gmail.com', '1', '2015-02-26', '09:12:24');
INSERT INTO `user_name` VALUES ('40', 'camilo@gmai.com', '1', '2017-06-25', '16:46:44');
INSERT INTO `user_name` VALUES ('3', 'cliente@gmail.com', '1', '2017-06-17', '23:48:11');
INSERT INTO `user_name` VALUES ('89', 'cocina@gmail.com', '1', '2017-06-26', '03:41:03');
INSERT INTO `user_name` VALUES ('106', 'dodo@gmail.com', '1', '2015-03-31', '09:27:06');
INSERT INTO `user_name` VALUES ('44', 'DONACIANO@gmail.com', '1', '2017-06-25', '16:54:17');
INSERT INTO `user_name` VALUES ('119', 'dsdf@gmail.com', '1', '2017-06-19', '10:05:14');
INSERT INTO `user_name` VALUES ('109', 'dsdf@gmial.com', '1', '2015-05-15', '09:30:06');
INSERT INTO `user_name` VALUES ('43', 'HECTOR@gmail.com', '1', '2017-06-25', '16:52:15');
INSERT INTO `user_name` VALUES ('36', 'hugo@gmail.com', '1', '2017-06-25', '16:27:34');
INSERT INTO `user_name` VALUES ('42', 'IBIS@gmail.com', '1', '2017-06-25', '16:50:41');
INSERT INTO `user_name` VALUES ('41', 'isidro@gmail.com', '1', '2017-06-25', '16:49:08');
INSERT INTO `user_name` VALUES ('38', 'josefina@gmail.com', '1', '2017-06-25', '16:42:26');
INSERT INTO `user_name` VALUES ('45', 'JUAN@gmail.com', '1', '2017-06-25', '16:56:17');
INSERT INTO `user_name` VALUES ('81', 'kenji@gmail.com', '1', '2015-01-10', '06:34:02');
INSERT INTO `user_name` VALUES ('37', 'maria@gmail.com', '1', '2017-06-25', '16:36:20');
INSERT INTO `user_name` VALUES ('78', 'marial@gmail.com', '1', '2015-01-10', '06:28:36');
INSERT INTO `user_name` VALUES ('97', 'pericope@gmail.com', '1', '2015-02-26', '08:59:57');
INSERT INTO `user_name` VALUES ('2', 'recepcion@gmail.com', '1', '2017-06-17', '23:46:32');
INSERT INTO `user_name` VALUES ('46', 'regina@gmail.com', '1', '2017-06-25', '16:58:05');
INSERT INTO `user_name` VALUES ('114', 'sdsf@gmail.com', '1', '2017-05-19', '10:01:38');
INSERT INTO `user_name` VALUES ('103', 'sdssdf@gmail.com', '1', '2015-03-05', '09:19:52');
INSERT INTO `user_name` VALUES ('90', 'servicio@gmail.com', '1', '2017-06-26', '03:46:07');
INSERT INTO `user_name` VALUES ('84', 'silope@gmail.com', '1', '2015-01-10', '07:18:52');
INSERT INTO `user_name` VALUES ('39', 'VICTORIA@gmail.com', '1', '2017-06-25', '16:44:30');

-- ----------------------------
-- Table structure for user_rol
-- ----------------------------
DROP TABLE IF EXISTS `user_rol`;
CREATE TABLE `user_rol` (
  `ID_PERSON` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `DATE_CREATED_ROL` date NOT NULL,
  `TIME_CREATED_ROL` time NOT NULL,
  PRIMARY KEY (`ID_PERSON`,`ID_ROL`),
  KEY `FK_RELATIONSHIP_6` (`ID_ROL`),
  CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_PERSON`) REFERENCES `user` (`ID_PERSON`),
  CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_rol
-- ----------------------------
INSERT INTO `user_rol` VALUES ('1', '1', '2017-06-17', '20:30:34');
INSERT INTO `user_rol` VALUES ('2', '2', '2017-06-17', '23:46:33');
INSERT INTO `user_rol` VALUES ('3', '3', '2017-06-17', '23:48:11');
INSERT INTO `user_rol` VALUES ('36', '3', '2017-06-25', '16:27:35');
INSERT INTO `user_rol` VALUES ('37', '3', '2017-06-25', '16:36:20');
INSERT INTO `user_rol` VALUES ('38', '3', '2017-06-25', '16:42:28');
INSERT INTO `user_rol` VALUES ('39', '3', '2017-06-25', '16:44:30');
INSERT INTO `user_rol` VALUES ('40', '3', '2017-06-25', '16:46:44');
INSERT INTO `user_rol` VALUES ('41', '3', '2017-06-25', '16:49:09');
INSERT INTO `user_rol` VALUES ('42', '3', '2017-06-25', '16:50:42');
INSERT INTO `user_rol` VALUES ('43', '3', '2017-06-25', '16:52:15');
INSERT INTO `user_rol` VALUES ('44', '3', '2017-06-25', '16:54:18');
INSERT INTO `user_rol` VALUES ('45', '3', '2017-06-25', '16:56:18');
INSERT INTO `user_rol` VALUES ('46', '2', '2017-06-25', '16:58:06');
INSERT INTO `user_rol` VALUES ('47', '3', '2015-01-02', '06:30:31');
INSERT INTO `user_rol` VALUES ('48', '3', '2015-01-02', '08:41:15');
INSERT INTO `user_rol` VALUES ('49', '3', '2015-01-02', '08:41:16');
INSERT INTO `user_rol` VALUES ('50', '3', '2015-01-02', '08:41:16');
INSERT INTO `user_rol` VALUES ('51', '3', '2015-01-04', '06:51:53');
INSERT INTO `user_rol` VALUES ('52', '3', '2015-01-04', '06:51:53');
INSERT INTO `user_rol` VALUES ('53', '3', '2015-01-04', '06:51:53');
INSERT INTO `user_rol` VALUES ('54', '3', '2015-01-04', '06:51:54');
INSERT INTO `user_rol` VALUES ('55', '3', '2015-01-04', '06:51:54');
INSERT INTO `user_rol` VALUES ('56', '3', '2015-01-04', '06:51:55');
INSERT INTO `user_rol` VALUES ('57', '3', '2015-01-04', '06:51:55');
INSERT INTO `user_rol` VALUES ('58', '3', '2015-01-06', '08:04:04');
INSERT INTO `user_rol` VALUES ('59', '3', '2015-01-06', '08:04:04');
INSERT INTO `user_rol` VALUES ('60', '3', '2015-01-06', '08:04:05');
INSERT INTO `user_rol` VALUES ('61', '3', '2015-01-06', '08:04:05');
INSERT INTO `user_rol` VALUES ('62', '3', '2015-01-06', '08:04:05');
INSERT INTO `user_rol` VALUES ('63', '3', '2015-01-06', '08:04:06');
INSERT INTO `user_rol` VALUES ('64', '3', '2015-01-06', '08:04:06');
INSERT INTO `user_rol` VALUES ('65', '3', '2015-01-06', '08:04:06');
INSERT INTO `user_rol` VALUES ('66', '3', '2015-01-06', '08:04:07');
INSERT INTO `user_rol` VALUES ('67', '3', '2015-01-06', '08:20:12');
INSERT INTO `user_rol` VALUES ('68', '3', '2015-01-06', '08:20:12');
INSERT INTO `user_rol` VALUES ('69', '3', '2015-01-06', '08:20:13');
INSERT INTO `user_rol` VALUES ('70', '3', '2017-06-26', '00:06:59');
INSERT INTO `user_rol` VALUES ('71', '3', '2017-06-26', '00:07:00');
INSERT INTO `user_rol` VALUES ('72', '3', '2017-06-26', '00:07:00');
INSERT INTO `user_rol` VALUES ('73', '3', '2017-06-26', '00:07:00');
INSERT INTO `user_rol` VALUES ('74', '3', '2015-01-08', '00:34:08');
INSERT INTO `user_rol` VALUES ('75', '3', '2015-01-08', '00:34:08');
INSERT INTO `user_rol` VALUES ('76', '3', '2015-01-08', '00:34:09');
INSERT INTO `user_rol` VALUES ('77', '3', '2015-01-08', '00:34:09');
INSERT INTO `user_rol` VALUES ('78', '3', '2015-01-10', '06:28:02');
INSERT INTO `user_rol` VALUES ('79', '3', '2015-01-10', '06:28:02');
INSERT INTO `user_rol` VALUES ('80', '3', '2015-01-10', '06:28:02');
INSERT INTO `user_rol` VALUES ('81', '3', '2015-01-10', '06:32:54');
INSERT INTO `user_rol` VALUES ('82', '3', '2015-01-10', '06:32:54');
INSERT INTO `user_rol` VALUES ('83', '3', '2015-01-10', '06:32:54');
INSERT INTO `user_rol` VALUES ('84', '3', '2015-01-10', '07:17:46');
INSERT INTO `user_rol` VALUES ('85', '3', '2015-01-10', '07:17:46');
INSERT INTO `user_rol` VALUES ('86', '3', '2015-01-10', '07:17:47');
INSERT INTO `user_rol` VALUES ('87', '3', '2015-01-10', '07:17:47');
INSERT INTO `user_rol` VALUES ('88', '3', '2015-01-10', '07:17:47');
INSERT INTO `user_rol` VALUES ('89', '4', '2017-06-26', '03:41:03');
INSERT INTO `user_rol` VALUES ('90', '5', '2017-06-26', '03:46:07');
INSERT INTO `user_rol` VALUES ('91', '3', '2017-06-26', '04:21:32');
INSERT INTO `user_rol` VALUES ('92', '3', '2017-06-26', '04:21:32');
INSERT INTO `user_rol` VALUES ('93', '3', '2017-06-26', '04:21:33');
INSERT INTO `user_rol` VALUES ('94', '3', '2015-02-05', '04:22:47');
INSERT INTO `user_rol` VALUES ('95', '3', '2015-02-05', '04:22:48');
INSERT INTO `user_rol` VALUES ('96', '3', '2015-02-05', '04:22:48');
INSERT INTO `user_rol` VALUES ('97', '3', '2015-02-26', '08:58:55');
INSERT INTO `user_rol` VALUES ('98', '3', '2015-02-26', '08:58:55');
INSERT INTO `user_rol` VALUES ('99', '3', '2015-02-26', '08:58:55');
INSERT INTO `user_rol` VALUES ('100', '3', '2015-02-26', '09:07:54');
INSERT INTO `user_rol` VALUES ('101', '3', '2015-02-26', '09:07:55');
INSERT INTO `user_rol` VALUES ('102', '3', '2015-02-26', '09:07:55');
INSERT INTO `user_rol` VALUES ('103', '3', '2015-03-05', '09:16:58');
INSERT INTO `user_rol` VALUES ('104', '3', '2015-03-05', '09:16:58');
INSERT INTO `user_rol` VALUES ('105', '3', '2015-03-05', '09:16:58');
INSERT INTO `user_rol` VALUES ('106', '3', '2015-03-31', '09:26:08');
INSERT INTO `user_rol` VALUES ('107', '3', '2015-03-31', '09:26:08');
INSERT INTO `user_rol` VALUES ('108', '3', '2015-03-31', '09:26:09');
INSERT INTO `user_rol` VALUES ('109', '3', '2015-05-15', '09:29:31');
INSERT INTO `user_rol` VALUES ('110', '3', '2015-05-15', '09:29:32');
INSERT INTO `user_rol` VALUES ('111', '3', '2017-04-18', '09:37:31');
INSERT INTO `user_rol` VALUES ('112', '3', '2017-04-18', '09:37:31');
INSERT INTO `user_rol` VALUES ('113', '3', '2017-04-18', '09:37:31');
INSERT INTO `user_rol` VALUES ('114', '3', '2017-05-19', '10:00:48');
INSERT INTO `user_rol` VALUES ('115', '3', '2017-05-19', '10:00:49');
INSERT INTO `user_rol` VALUES ('116', '3', '2017-05-19', '10:00:49');
INSERT INTO `user_rol` VALUES ('117', '3', '2017-05-19', '10:00:50');
INSERT INTO `user_rol` VALUES ('118', '3', '2017-05-19', '10:00:50');
INSERT INTO `user_rol` VALUES ('119', '3', '2017-06-19', '10:04:39');
INSERT INTO `user_rol` VALUES ('120', '3', '2017-06-19', '10:04:39');
INSERT INTO `user_rol` VALUES ('121', '3', '2017-06-19', '10:04:39');
INSERT INTO `user_rol` VALUES ('122', '3', '2017-06-20', '10:09:29');
INSERT INTO `user_rol` VALUES ('123', '3', '2017-06-20', '10:09:29');
INSERT INTO `user_rol` VALUES ('124', '3', '2017-06-20', '10:09:29');
INSERT INTO `user_rol` VALUES ('125', '3', '2017-06-18', '10:17:56');
INSERT INTO `user_rol` VALUES ('126', '3', '2017-06-18', '10:17:57');
INSERT INTO `user_rol` VALUES ('127', '3', '2017-06-18', '10:17:57');
INSERT INTO `user_rol` VALUES ('128', '3', '2017-06-18', '10:17:58');
INSERT INTO `user_rol` VALUES ('129', '3', '2017-06-18', '10:17:58');
INSERT INTO `user_rol` VALUES ('130', '3', '2017-06-18', '10:17:59');
INSERT INTO `user_rol` VALUES ('131', '3', '2017-06-18', '10:17:59');
INSERT INTO `user_rol` VALUES ('132', '3', '2017-06-18', '10:17:59');
INSERT INTO `user_rol` VALUES ('133', '3', '2017-06-18', '10:18:00');
INSERT INTO `user_rol` VALUES ('134', '3', '2017-06-18', '10:18:00');
INSERT INTO `user_rol` VALUES ('135', '3', '2017-06-18', '10:18:00');

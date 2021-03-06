/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100124
 Source Host           : localhost:3306
 Source Schema         : hotel

 Target Server Type    : MySQL
 Target Server Version : 100124
 File Encoding         : 65001

 Date: 15/09/2018 16:11:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity`  (
  `ID_ACTIVITY` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_ACTIVITY` int(11) NOT NULL,
  `ID_STATE_ACTIVITY` int(11) NOT NULL,
  `NAME_ACTIVITY` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_ACTIVITY` varchar(350) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_START_ACTIVITY` date NOT NULL,
  `TIME_START_ACTIVITY` time(0) NOT NULL,
  `DATE_END_ACTIVITY` date NOT NULL,
  `TIME_END_ACTIVITY` time(0) NOT NULL,
  `IMAGE_ACTIVITY` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_ACTIVITY`) USING BTREE,
  INDEX `FK_RELATIONSHIP_92`(`ID_TYPE_ACTIVITY`) USING BTREE,
  INDEX `FK_RELATIONSHIP_93`(`ID_STATE_ACTIVITY`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_92` FOREIGN KEY (`ID_TYPE_ACTIVITY`) REFERENCES `type_activity` (`ID_TYPE_ACTIVITY`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_93` FOREIGN KEY (`ID_STATE_ACTIVITY`) REFERENCES `state_activity` (`ID_STATE_ACTIVITY`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES (1, 3, 2, 'Matrimonio de special', 'recepcion de la boda en el auditorio. las entradas tienen un pase ', '2018-10-30', '09:30:00', '2018-10-30', '18:00:00', 'img/activity/20170618000142.jpg');
INSERT INTO `activity` VALUES (2, 5, 2, 'Concierto de grupo internacional en el auditorio', 'presentacion del grupo aroesmit festejando su aniversario. buscar<br>entradas en recepcion', '2018-11-04', '16:00:00', '2018-11-04', '22:30:00', 'img/activity/20170618000324.jpg');
INSERT INTO `activity` VALUES (3, 4, 2, 'Recepcion de aÃ±o nuevo', 'se celebrara la llegada del aÃ±o nuevo', '2018-12-31', '18:00:00', '2019-01-01', '06:00:00', 'img/activity/20170618001354.jpg');
INSERT INTO `activity` VALUES (4, 4, 2, 'Navidad', 'Recepcion a la nohce buena', '2018-12-24', '00:00:00', '2018-12-25', '00:00:00', 'img/activity/20170618000733.jpg');
INSERT INTO `activity` VALUES (5, 3, 1, 'Fiesta privada', 'fiesta privada', '2018-11-13', '17:00:00', '2018-11-13', '23:59:59', 'img/activity/20180513193455.jpg');
INSERT INTO `activity` VALUES (6, 1, 1, 'Cumpleaños', 'Cumpleaños', '2018-12-13', '14:00:00', '2018-12-13', '20:00:00', '');
INSERT INTO `activity` VALUES (7, 2, 1, 'Matrimonio de juan', 'matrimonio', '2018-11-21', '15:00:00', '2018-11-21', '21:00:00', 'img/activity/20180513193554.jpg');
INSERT INTO `activity` VALUES (8, 1, 2, 'Matrimonio', 'Matrimonio', '2018-11-30', '11:00:00', '2018-11-30', '22:00:00', 'img/activity/20180513204827.jpg');
INSERT INTO `activity` VALUES (9, 2, 2, 'Fiesta de graduacion', 'Fiesta de graduacion', '2018-09-30', '10:00:00', '2018-09-30', '23:59:00', 'img/activity/20180604002859.jpg');
INSERT INTO `activity` VALUES (10, 4, 2, 'Fiesta de bienvenida', 'Fiesta de graduacion', '2018-12-28', '17:00:00', '2018-12-28', '22:00:00', 'img/activity/20180604003056.jpg');
INSERT INTO `activity` VALUES (11, 4, 2, 'Recepcion de graduacion', 'Recepcion de graduacion', '2018-09-29', '16:00:00', '2018-09-29', '20:00:00', 'img/activity/20180604003223.jpg');
INSERT INTO `activity` VALUES (12, 4, 2, 'Matrimonio', 'Matrimonio', '2018-12-01', '14:00:00', '2018-12-02', '14:00:00', 'img/activity/20180604003342.jpg');
INSERT INTO `activity` VALUES (13, 4, 2, 'DÃ­a del Bolivia', 'DÃ­a del Estado Plurinacional', '2019-08-06', '00:00:00', '2019-08-06', '23:59:00', 'img/activity/20180604004407.jpg');
INSERT INTO `activity` VALUES (14, 4, 2, 'Carnaval', 'Carnaval', '2019-02-12', '00:00:00', '2019-02-13', '23:59:00', 'img/activity/20180604004602.jpg');
INSERT INTO `activity` VALUES (15, 4, 2, 'Viernes Santo', 'Viernes Santo', '2019-03-30', '00:00:00', '2019-03-30', '23:59:00', 'img/activity/20180604004718.jpg');
INSERT INTO `activity` VALUES (16, 4, 2, 'Dia del trabajo', 'Dia del trabajo', '2019-05-01', '00:00:00', '2019-05-01', '23:59:00', 'img/activity/20180604004849.jpg');
INSERT INTO `activity` VALUES (17, 4, 2, 'Corpus Christi', 'Corpus Christi', '2019-05-31', '00:00:00', '2019-05-31', '23:59:00', 'img/activity/20180604005037.jpg');
INSERT INTO `activity` VALUES (18, 4, 2, 'AÃ±o Nuevo Aymara', 'AÃ±o Nuevo Aymara', '2019-06-21', '00:00:00', '2019-06-21', '23:59:00', 'img/activity/20180604005137.jpg');
INSERT INTO `activity` VALUES (19, 4, 2, 'DÃ­a de la Independencia', 'DÃ­a de la Independencia', '2019-08-06', '00:00:00', '2019-08-06', '23:59:00', 'img/activity/20180604005243.jpg');
INSERT INTO `activity` VALUES (20, 4, 2, 'DÃ­a de Todos los Difuntos', 'DÃ­a de Todos los Difuntos', '2018-11-02', '00:00:00', '2018-11-02', '23:59:00', 'img/activity/20180604005345.jpg');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `ID_ARTICLE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_ARTICLE` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_ARTICLE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STATE_ARTICLE` decimal(1, 0) NOT NULL,
  `UNIT_ARTICLE` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, 'Llave de habitacion', 'Llaves de ingreso a l habitacion', 1, 1);
INSERT INTO `article` VALUES (2, 'Control remoto', 'Control de la televicion', 1, 1);
INSERT INTO `article` VALUES (3, '1 Toalla', 'toallas', 1, 20);
INSERT INTO `article` VALUES (4, '2 Toallas', 'toallas', 1, 50);
INSERT INTO `article` VALUES (5, '3 Toallas', 'toallas', 1, 20);
INSERT INTO `article` VALUES (6, '1 zapatillas', 'zapatos', 1, 20);
INSERT INTO `article` VALUES (7, '2 zapatillas', 'zapatos', 1, 20);

-- ----------------------------
-- Table structure for article_consum
-- ----------------------------
DROP TABLE IF EXISTS `article_consum`;
CREATE TABLE `article_consum`  (
  `ID_ARTICLE` int(11) NOT NULL,
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ID_STATE_ARTICLE` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`, `ID_CONSUME_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_105`(`ID_CONSUME_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_109`(`ID_STATE_ARTICLE`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_102` FOREIGN KEY (`ID_ARTICLE`) REFERENCES `article` (`ID_ARTICLE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_105` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_109` FOREIGN KEY (`ID_STATE_ARTICLE`) REFERENCES `state_article` (`ID_STATE_ARTICLE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of article_consum
-- ----------------------------
INSERT INTO `article_consum` VALUES (1, 2, 2);
INSERT INTO `article_consum` VALUES (1, 3, 2);
INSERT INTO `article_consum` VALUES (1, 6, 2);
INSERT INTO `article_consum` VALUES (1, 7, 2);
INSERT INTO `article_consum` VALUES (1, 10, 2);
INSERT INTO `article_consum` VALUES (1, 11, 2);
INSERT INTO `article_consum` VALUES (1, 15, 2);
INSERT INTO `article_consum` VALUES (1, 19, 2);
INSERT INTO `article_consum` VALUES (1, 23, 2);
INSERT INTO `article_consum` VALUES (1, 27, 2);
INSERT INTO `article_consum` VALUES (2, 2, 2);
INSERT INTO `article_consum` VALUES (2, 3, 2);
INSERT INTO `article_consum` VALUES (2, 6, 2);
INSERT INTO `article_consum` VALUES (2, 7, 2);
INSERT INTO `article_consum` VALUES (2, 10, 2);
INSERT INTO `article_consum` VALUES (2, 11, 2);
INSERT INTO `article_consum` VALUES (2, 15, 2);
INSERT INTO `article_consum` VALUES (2, 19, 2);
INSERT INTO `article_consum` VALUES (2, 23, 2);
INSERT INTO `article_consum` VALUES (2, 27, 2);
INSERT INTO `article_consum` VALUES (3, 2, 2);
INSERT INTO `article_consum` VALUES (3, 3, 2);
INSERT INTO `article_consum` VALUES (3, 6, 2);
INSERT INTO `article_consum` VALUES (3, 7, 2);
INSERT INTO `article_consum` VALUES (3, 10, 2);
INSERT INTO `article_consum` VALUES (3, 11, 2);
INSERT INTO `article_consum` VALUES (3, 15, 2);
INSERT INTO `article_consum` VALUES (3, 19, 2);
INSERT INTO `article_consum` VALUES (3, 23, 2);
INSERT INTO `article_consum` VALUES (3, 27, 2);

-- ----------------------------
-- Table structure for bill
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill`  (
  `ID_BILL` int(11) NOT NULL AUTO_INCREMENT,
  `CODE_BILL` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `ID_PERSON_SENDER` int(11) NOT NULL,
  `ID_CHECK` int(11) NOT NULL,
  `CONSUME_BILL` float(8, 2) NOT NULL,
  `DATE_BILL` date NOT NULL,
  `TIME_BILL` time(0) NOT NULL,
  PRIMARY KEY (`ID_BILL`) USING BTREE,
  INDEX `FK_RELATIONSHIP_59`(`ID_PERSON`) USING BTREE,
  INDEX `FK_RELATIONSHIP_89`(`ID_CHECK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_90`(`ID_PERSON_SENDER`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_59` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_89` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_90` FOREIGN KEY (`ID_PERSON_SENDER`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for card
-- ----------------------------
DROP TABLE IF EXISTS `card`;
CREATE TABLE `card`  (
  `ID_CARD` int(8) NOT NULL AUTO_INCREMENT,
  `ID_CHECK` int(11) NOT NULL,
  `NUMBER_CARD` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_TYPE_CARD` int(11) NOT NULL,
  `MONTH_CARD` decimal(2, 0) NOT NULL,
  `YEAR_CARD` decimal(4, 0) NOT NULL,
  `CCV_CARD` decimal(3, 0) NOT NULL,
  `VALID_CARD` tinyint(1) NOT NULL,
  `TYPE_MONEY_CARD` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DEPOSIT_CARD` float(8, 2) NOT NULL,
  PRIMARY KEY (`ID_CARD`) USING BTREE,
  INDEX `FK_RELATIONSHIP_86`(`ID_CHECK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_87`(`ID_TYPE_CARD`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_86` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_87` FOREIGN KEY (`ID_TYPE_CARD`) REFERENCES `type_card` (`ID_TYPE_CARD`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of card
-- ----------------------------
INSERT INTO `card` VALUES (1, 3, '2235789652214', 1, 1, 2019, 135, 1, 'Bs', 800.00);

-- ----------------------------
-- Table structure for check_person
-- ----------------------------
DROP TABLE IF EXISTS `check_person`;
CREATE TABLE `check_person`  (
  `ID_CHECK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSON_TITULAR` int(11) NOT NULL,
  `ID_PERSON_RECEPTION` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_STATE_CHECK` int(11) NOT NULL,
  `DATE_START_CHECK` date NOT NULL,
  `TIME_START_CHECK` time(0) NOT NULL,
  `DATE_END_CHECK` date NOT NULL,
  `TIME_END_CHECK` time(0) NOT NULL,
  `OBSERVATIONS_CHECK` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_TYPE_CHECK` int(11) NOT NULL,
  `DATE_CREATED_CHECK` date NOT NULL,
  `TIME_CREATED_CHECK` time(0) NOT NULL,
  `DATE_UPDATE_CHECK` date NOT NULL,
  `TIME_UPDATE_CHECK` time(0) NOT NULL,
  PRIMARY KEY (`ID_CHECK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_100`(`ID_PERSON_TITULAR`) USING BTREE,
  INDEX `FK_RELATIONSHIP_110`(`ID_HOTEL`) USING BTREE,
  INDEX `FK_RELATIONSHIP_123`(`ID_PERSON_RECEPTION`) USING BTREE,
  INDEX `FK_RELATIONSHIP_85`(`ID_STATE_CHECK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_88`(`ID_TYPE_CHECK`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_100` FOREIGN KEY (`ID_PERSON_TITULAR`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_110` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_123` FOREIGN KEY (`ID_PERSON_RECEPTION`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_85` FOREIGN KEY (`ID_STATE_CHECK`) REFERENCES `state_check` (`ID_STATE_CHECK`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_88` FOREIGN KEY (`ID_TYPE_CHECK`) REFERENCES `type_check` (`ID_TYPE_CHECK`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of check_person
-- ----------------------------
INSERT INTO `check_person` VALUES (1, 33, 2, 1, 6, '2015-06-04', '20:30:00', '2015-06-05', '20:30:00', '', 2, '2015-06-04', '20:31:43', '2015-06-04', '20:31:43');
INSERT INTO `check_person` VALUES (2, 35, 2, 1, 6, '2015-06-07', '06:00:00', '2015-06-10', '06:00:00', '', 2, '2018-06-05', '06:28:14', '2018-06-05', '06:28:14');
INSERT INTO `check_person` VALUES (3, 3, 2, 1, 6, '2015-07-11', '06:00:00', '2015-07-15', '06:00:00', '', 2, '2015-07-15', '06:00:00', '2015-07-15', '06:00:00');
INSERT INTO `check_person` VALUES (4, 38, 2, 1, 6, '2015-12-03', '06:00:00', '2015-12-04', '06:00:00', '', 1, '2015-12-03', '06:00:00', '2015-12-03', '06:00:00');
INSERT INTO `check_person` VALUES (5, 40, 2, 1, 6, '2016-01-16', '06:00:00', '2016-01-18', '06:00:00', '', 2, '2017-07-15', '21:06:49', '2017-09-08', '22:38:30');
INSERT INTO `check_person` VALUES (6, 41, 2, 1, 6, '2016-02-10', '06:00:00', '2016-02-11', '06:00:00', '', 1, '2016-02-10', '06:00:00', '2016-02-10', '06:00:00');

-- ----------------------------
-- Table structure for consume_food
-- ----------------------------
DROP TABLE IF EXISTS `consume_food`;
CREATE TABLE `consume_food`  (
  `ID_CONSUME_FOOD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CHECK` int(11) NOT NULL,
  `ID_FOOD` int(11) NOT NULL,
  `ID_TYPE_MONEY` int(11) NOT NULL,
  `UNIT_COST_FOOD` decimal(3, 0) NOT NULL,
  `PRICE_CONSUME_FOOD` float(8, 2) NOT NULL,
  `PAY_CONSUME_FOOD` float(8, 2) NOT NULL,
  `TIME_CONSUME_FOOD` time(0) NOT NULL,
  `DATE_CONSUME_FOOD` date NOT NULL,
  `UNIT_CONSUME_FOOD` decimal(5, 0) NOT NULL,
  `STATE_CONSUME_FOOD` decimal(1, 0) NOT NULL,
  `SITE_CONSUME_FOOD` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_CONSUME_FOOD`, `ID_CHECK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_106`(`ID_CHECK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_98`(`ID_FOOD`, `ID_TYPE_MONEY`, `UNIT_COST_FOOD`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_106` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_98` FOREIGN KEY (`ID_FOOD`, `ID_TYPE_MONEY`, `UNIT_COST_FOOD`) REFERENCES `cost_food` (`ID_FOOD`, `ID_TYPE_MONEY`, `UNIT_COST_FOOD`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for consume_service
-- ----------------------------
DROP TABLE IF EXISTS `consume_service`;
CREATE TABLE `consume_service`  (
  `ID_CONSUME_SERVICE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CHECK` int(11) NOT NULL,
  `ID_TYPE_CONSUME` int(11) NOT NULL,
  `ID_COST_SERVICE` int(11) NOT NULL,
  `DATE_START_CONSUME_SERVICE` date NOT NULL,
  `TIME_START_CONSUME_SERVICE` time(0) NOT NULL,
  `DATE_END_CONSUME_SERVICE` date NOT NULL,
  `TIME_END_CONSUME_SERVICE` time(0) NOT NULL,
  `PAY_CONSUME_SERVICE` float(8, 2) NOT NULL,
  `PRICE_CONSUME_SERVICE` float(8, 2) NOT NULL,
  `DETAIL_CONSUME_SERVICE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ACTIVE_CONSUME_SERVICE` tinyint(1) NOT NULL,
  `UNIT_CONSUME_SERVICE` int(11) NOT NULL,
  `IMAGE_DEPOSIT` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TYPE_PAY` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_CONSUME_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_108`(`ID_COST_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_111`(`ID_CHECK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_84`(`ID_TYPE_CONSUME`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_108` FOREIGN KEY (`ID_COST_SERVICE`) REFERENCES `cost_service` (`ID_COST_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_111` FOREIGN KEY (`ID_CHECK`) REFERENCES `check_person` (`ID_CHECK`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_84` FOREIGN KEY (`ID_TYPE_CONSUME`) REFERENCES `type_consume` (`ID_TYPE_CONSUME`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of consume_service
-- ----------------------------
INSERT INTO `consume_service` VALUES (1, 1, 1, 21, '2015-06-04', '20:30:00', '2015-06-04', '20:30:00', 0.00, 0.00, 'Check in', 1, 2, '', 'effective');
INSERT INTO `consume_service` VALUES (2, 1, 3, 1, '2015-06-04', '20:30:00', '2015-06-05', '20:30:00', 100.00, 100.00, 'Consumo habitacion', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (3, 1, 3, 1, '2015-06-04', '20:30:00', '2015-06-05', '20:30:00', 100.00, 100.00, 'Consumo habitacion', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (4, 1, 2, 22, '2015-06-04', '20:30:00', '2015-06-04', '20:30:00', 0.00, 0.00, 'Check out', 1, 2, '', 'effective');
INSERT INTO `consume_service` VALUES (5, 2, 1, 21, '2015-06-07', '06:00:00', '2015-06-07', '06:00:00', 0.00, 0.00, 'Check in', 1, 2, '', 'effective');
INSERT INTO `consume_service` VALUES (6, 2, 3, 1, '2015-06-07', '06:00:00', '2015-06-10', '06:00:00', 300.00, 300.00, 'Consumo habitacion', 0, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (7, 2, 3, 1, '2015-06-07', '06:00:00', '2015-06-10', '06:00:00', 300.00, 300.00, 'Consumo habitacion', 0, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (8, 2, 2, 22, '2015-06-10', '06:00:00', '2015-06-10', '06:00:00', 0.00, 0.00, 'Check out', 1, 2, '', 'effective');
INSERT INTO `consume_service` VALUES (9, 3, 1, 21, '2015-07-11', '06:00:00', '2015-07-15', '06:00:00', 0.00, 0.00, 'Check in', 1, 2, '', 'effective');
INSERT INTO `consume_service` VALUES (10, 3, 3, 1, '2015-07-11', '06:00:00', '2015-07-15', '06:00:00', 400.00, 400.00, 'Consumo habitacion', 0, 1, '', 'card');
INSERT INTO `consume_service` VALUES (11, 3, 3, 1, '2015-07-11', '06:00:00', '2015-07-15', '06:00:00', 400.00, 400.00, 'Consumo habitacion', 0, 1, '', 'card');
INSERT INTO `consume_service` VALUES (12, 3, 2, 22, '2015-07-11', '06:00:00', '2015-07-15', '06:00:00', 0.00, 0.00, 'Check out', 1, 2, '', 'effective');
INSERT INTO `consume_service` VALUES (13, 4, 5, 4, '2015-12-03', '06:00:00', '2015-12-04', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', 'deposit');
INSERT INTO `consume_service` VALUES (14, 4, 1, 21, '2015-12-03', '06:00:00', '2015-12-04', '06:00:00', 0.00, 0.00, 'Check in', 1, 2, '', 'effective');
INSERT INTO `consume_service` VALUES (15, 4, 3, 1, '2015-07-11', '06:00:00', '2015-07-15', '06:00:00', 300.00, 300.00, 'Consumo habitacion', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (16, 4, 2, 22, '2015-07-11', '06:00:00', '2015-07-15', '06:00:00', 0.00, 0.00, 'Check out', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (17, 5, 5, 4, '2016-01-16', '06:00:00', '2016-01-18', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (18, 5, 1, 21, '2016-01-16', '06:00:00', '2016-01-18', '06:00:00', 0.00, 0.00, 'Check in', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (19, 5, 3, 1, '2016-01-16', '06:00:00', '2016-01-18', '06:00:00', 300.00, 300.00, 'Consumo habitacion', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (20, 5, 2, 22, '2016-01-18', '06:00:00', '2016-01-18', '06:00:00', 0.00, 0.00, 'Check out', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (21, 6, 5, 1, '2016-02-10', '06:00:00', '2016-02-11', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (22, 6, 1, 21, '2016-02-10', '06:00:00', '2016-02-10', '06:00:00', 0.00, 0.00, 'Check in', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (23, 6, 3, 1, '2016-02-10', '06:00:00', '2016-02-11', '06:00:00', 300.00, 300.00, 'Consumo habitacion', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (24, 6, 2, 22, '2016-02-10', '06:00:00', '2016-02-11', '06:00:00', 0.00, 0.00, 'Check out', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (25, 6, 5, 4, '2016-02-10', '06:00:00', '2016-02-11', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (26, 6, 1, 21, '2016-02-10', '06:00:00', '2016-02-10', '06:00:00', 0.00, 0.00, 'Check in', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (27, 6, 2, 4, '2016-02-10', '06:00:00', '2016-02-11', '06:00:00', 0.00, 300.00, 'Consumo habitacion', 1, 1, '', 'effective');
INSERT INTO `consume_service` VALUES (28, 6, 3, 22, '2016-02-10', '06:00:00', '2016-02-11', '06:00:00', 0.00, 0.00, 'Check out', 1, 1, '', 'effective');

-- ----------------------------
-- Table structure for cost_food
-- ----------------------------
DROP TABLE IF EXISTS `cost_food`;
CREATE TABLE `cost_food`  (
  `ID_FOOD` int(11) NOT NULL,
  `ID_TYPE_MONEY` int(11) NOT NULL,
  `UNIT_COST_FOOD` decimal(3, 0) NOT NULL,
  `PRICE_COST_FOOD` float(8, 2) NOT NULL,
  `POINT_OBTAIN_COST_FOOD` decimal(6, 0) NOT NULL,
  `POINT_REQUIRED_COST_FOOD` decimal(6, 0) NOT NULL,
  `TIME_CREATED_COST_FOOD` time(0) NOT NULL,
  `DATE_CREATED_COST_FOOD` date NOT NULL,
  `ACTIVE_COST_FOOD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_FOOD`, `ID_TYPE_MONEY`, `UNIT_COST_FOOD`) USING BTREE,
  INDEX `FK_RELATIONSHIP_96`(`ID_TYPE_MONEY`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_95` FOREIGN KEY (`ID_FOOD`) REFERENCES `food` (`ID_FOOD`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_96` FOREIGN KEY (`ID_TYPE_MONEY`) REFERENCES `type_money` (`ID_TYPE_MONEY`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cost_food
-- ----------------------------
INSERT INTO `cost_food` VALUES (1, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (1, 1, 2, 37.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (2, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (2, 1, 2, 36.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (3, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (3, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (3, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (4, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (4, 1, 2, 96.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (5, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (5, 1, 2, 65.90, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (6, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (6, 1, 2, 45.50, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (7, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (7, 1, 2, 28.80, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (8, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (8, 1, 2, 44.60, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (9, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (9, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (10, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (10, 1, 2, 28.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (11, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (11, 1, 2, 38.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (11, 1, 3, 50.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (12, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (12, 1, 2, 38.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (13, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (13, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (13, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (14, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (14, 1, 2, 90.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (15, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (15, 1, 2, 60.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (16, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (16, 1, 2, 40.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (17, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (17, 1, 2, 25.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (18, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (18, 1, 2, 40.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (19, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (19, 1, 2, 20.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (20, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (20, 1, 2, 30.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (21, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (21, 1, 2, 25.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (22, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (22, 1, 2, 29.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (23, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (23, 1, 2, 70.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (24, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (24, 1, 2, 99.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (25, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (25, 1, 2, 65.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (26, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (26, 1, 2, 40.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (27, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (27, 1, 2, 30.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (28, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (28, 1, 2, 49.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (29, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (29, 1, 2, 22.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (30, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (30, 1, 2, 28.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (31, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (31, 1, 2, 35.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (32, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (32, 1, 2, 38.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (33, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (33, 1, 2, 78.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (34, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (34, 1, 2, 90.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (35, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (35, 1, 2, 68.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (36, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (36, 1, 2, 40.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (37, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (37, 1, 2, 28.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (38, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (38, 1, 2, 30.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (39, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (39, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (40, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (40, 1, 2, 38.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (41, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (41, 1, 2, 37.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (42, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (42, 1, 2, 36.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (43, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (43, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (43, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (44, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (44, 1, 2, 96.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (45, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (45, 1, 2, 65.90, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (46, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (46, 1, 2, 45.50, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (47, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (47, 1, 2, 28.80, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (48, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (48, 1, 2, 44.60, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (49, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (49, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (50, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (50, 1, 2, 38.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (51, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (51, 1, 2, 37.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (52, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (52, 1, 2, 36.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (53, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (53, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (53, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (54, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (54, 1, 2, 96.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (55, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (55, 1, 2, 65.90, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (56, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (56, 1, 2, 45.50, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (57, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (57, 1, 2, 28.80, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (58, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (58, 1, 2, 44.60, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (59, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (59, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (60, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (60, 1, 2, 38.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (61, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (61, 1, 2, 37.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (62, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (62, 1, 2, 36.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (63, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (63, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (63, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (64, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (64, 1, 2, 96.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (65, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (65, 1, 2, 65.90, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (66, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (66, 1, 2, 45.50, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (67, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (67, 1, 2, 28.80, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (68, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (68, 1, 2, 44.60, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (69, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (69, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (70, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (70, 1, 2, 38.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (71, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (71, 1, 2, 37.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (72, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (72, 1, 2, 36.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (73, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (73, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (73, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (74, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (74, 1, 2, 96.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (75, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (75, 1, 2, 65.90, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (76, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (76, 1, 2, 45.50, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (77, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (77, 1, 2, 28.80, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (78, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (78, 1, 2, 44.60, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (79, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (79, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (80, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (80, 1, 2, 38.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (81, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (81, 1, 2, 37.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (82, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (82, 1, 2, 36.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (83, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (83, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (83, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (84, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (84, 1, 2, 96.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (85, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (85, 1, 2, 65.90, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (86, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (86, 1, 2, 45.50, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (87, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (87, 1, 2, 28.80, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (88, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (88, 1, 2, 44.60, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (89, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (89, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (90, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (90, 1, 2, 38.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (91, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (91, 1, 2, 37.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (92, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (92, 1, 2, 36.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (93, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (93, 1, 2, 76.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (93, 1, 3, 100.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (94, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (94, 1, 2, 96.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (95, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (95, 1, 2, 65.90, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (96, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (96, 1, 2, 45.50, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (97, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (97, 1, 2, 28.80, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (98, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (98, 1, 2, 44.60, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (99, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (99, 1, 2, 21.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (100, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (100, 1, 2, 25.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (101, 1, 1, 20.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (101, 1, 2, 35.00, 0, 10, '22:28:27', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (102, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (102, 1, 2, 35.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (103, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (103, 1, 2, 75.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (104, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (104, 1, 2, 70.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (105, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (105, 1, 2, 65.50, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (106, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (106, 1, 2, 45.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (107, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (107, 1, 2, 28.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (108, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (108, 1, 2, 27.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (109, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (109, 1, 2, 18.70, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (110, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (110, 1, 2, 28.40, 0, 0, '23:42:53', '2017-06-17', 1);

-- ----------------------------
-- Table structure for cost_service
-- ----------------------------
DROP TABLE IF EXISTS `cost_service`;
CREATE TABLE `cost_service`  (
  `ID_COST_SERVICE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SERVICE` int(11) NOT NULL,
  `ID_TYPE_MONEY` int(11) NOT NULL,
  `UNIT_COST_SERVICE` decimal(3, 0) NOT NULL,
  `UNIT_DAY_COST_SERVICE` decimal(2, 0) NOT NULL,
  `UNIT_HOUR_COST_SERVICE` decimal(2, 0) NOT NULL,
  `PRICE_COST_SERVICE` float(8, 2) NOT NULL,
  `POINT_OBTAIN_COST_SERVICE` decimal(6, 0) NOT NULL,
  `POINT_REQUIRED_COST_SERVICE` decimal(6, 0) NOT NULL,
  `ACTIVE_COST_SERVICE` tinyint(1) NOT NULL,
  `TIME_CREATED_COST_SERVICE` time(0) NOT NULL,
  `DATE_CREATED_COST_SERVICE` date NOT NULL,
  PRIMARY KEY (`ID_COST_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_112`(`ID_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_94`(`ID_TYPE_MONEY`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_112` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_94` FOREIGN KEY (`ID_TYPE_MONEY`) REFERENCES `type_money` (`ID_TYPE_MONEY`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cost_service
-- ----------------------------
INSERT INTO `cost_service` VALUES (1, 1, 1, 1, 1, 0, 100.00, 50, 0, 1, '21:54:48', '2017-06-17');
INSERT INTO `cost_service` VALUES (2, 2, 1, 1, 1, 0, 180.00, 20, 0, 1, '21:55:44', '2017-06-17');
INSERT INTO `cost_service` VALUES (3, 3, 1, 1, 0, 1, 15.00, 100, 0, 1, '21:58:56', '2017-06-17');
INSERT INTO `cost_service` VALUES (4, 4, 1, 1, 1, 0, 300.00, 10, 0, 1, '22:00:00', '2017-06-17');
INSERT INTO `cost_service` VALUES (5, 5, 1, 1, 1, 0, 500.00, 10, 0, 1, '22:01:11', '2017-06-17');
INSERT INTO `cost_service` VALUES (6, 6, 1, 1, 0, 1, 0.00, 0, 0, 1, '22:02:12', '2017-06-17');
INSERT INTO `cost_service` VALUES (7, 7, 1, 1, 1, 0, 0.00, 0, 0, 1, '22:03:44', '2017-06-17');
INSERT INTO `cost_service` VALUES (8, 8, 1, 1, 0, 1, 40.00, 0, 1000, 0, '00:22:03', '2017-06-18');
INSERT INTO `cost_service` VALUES (9, 8, 1, 1, 0, 2, 50.00, 0, 3000, 1, '00:22:18', '2017-06-18');
INSERT INTO `cost_service` VALUES (10, 9, 1, 1, 1, 0, 80.00, 10, 0, 1, '17:58:33', '2017-10-15');
INSERT INTO `cost_service` VALUES (11, 10, 1, 1, 1, 0, 40.00, 0, 0, 1, '18:00:14', '2017-10-15');
INSERT INTO `cost_service` VALUES (12, 11, 1, 1, 1, 0, 100.00, 0, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (13, 11, 1, 1, 2, 0, 190.00, 10, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (14, 11, 1, 1, 3, 0, 250.00, 20, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (15, 11, 1, 1, 5, 0, 300.00, 0, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (16, 12, 1, 3, 0, 0, 100.00, 0, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (17, 13, 1, 3, 0, 0, 100.00, 0, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (18, 14, 1, 1, 1, 0, 150.00, 50, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (19, 14, 1, 2, 1, 0, 250.00, 40, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (20, 14, 1, 3, 1, 0, 300.00, 0, 40000, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (21, 15, 1, 3, 1, 0, 0.00, 0, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (22, 16, 1, 3, 1, 0, 0.00, 0, 0, 1, '18:01:16', '2017-10-15');
INSERT INTO `cost_service` VALUES (23, 17, 1, 3, 1, 0, 0.00, 0, 0, 1, '18:01:16', '2017-10-15');

-- ----------------------------
-- Table structure for food
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food`  (
  `ID_FOOD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_FOOD` int(11) NOT NULL,
  `ID_STATE_FOOD` int(11) NOT NULL,
  `NAME_FOOD` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_FOOD` varchar(350) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IMAGE_FOOD` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_FOOD`) USING BTREE,
  INDEX `FK_RELATIONSHIP_60`(`ID_TYPE_FOOD`) USING BTREE,
  INDEX `FK_RELATIONSHIP_83`(`ID_STATE_FOOD`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_60` FOREIGN KEY (`ID_TYPE_FOOD`) REFERENCES `type_food` (`ID_TYPE_FOOD`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_83` FOREIGN KEY (`ID_STATE_FOOD`) REFERENCES `state_food` (`ID_STATE_FOOD`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES (1, 1, 1, 'Cafe', 'cafe con pan', 'img/food/20170617222827.png');
INSERT INTO `food` VALUES (2, 1, 1, 'Hamburguesa', '<span>Comida que se prepara con carne picada de animales vacunos, cerdo o aves, generalmente condimentada con sal, pimienta, ajo y perejil, y forma redonda y plana; suele asarse a la plancha o freÃ­rse</span>', 'img/food/20170617222913.jpg');
INSERT INTO `food` VALUES (3, 2, 1, 'Pollo al horno', '<span class=\"st\"> la cocinamos a menudo, como es tan sencilla de hacer, y econÃ³mica, la Receta de <i>Pollo al Horno</i> es una buena Comida<br></span>', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (4, 5, 1, 'Pizza', '<span>Comida que consiste en una base de masa de pan, generalmente delgada y redonda, que se recubre con salsa de tomate, queso mozzarella o similar y diversos ingredientes troceados y se cuece al horno; es de origen italiano.</span>', 'img/food/20170617233608.jpg');
INSERT INTO `food` VALUES (5, 2, 1, 'Espagueti', '<span>Pasta italiana de forma alargada, fina y cilÃ­ndrica</span>', 'img/food/20170617233734.jpg');
INSERT INTO `food` VALUES (6, 2, 1, 'Sopa de zapallo', '<span class=\"st\">La <i>sopa</i> de calabaza es una especie de purÃ© elaborado con calabaza. Este tipo de <i>sopa</i> se elabora de diferentes formas a lo largo de las diversas cocinas del mundo<br></span>', 'img/food/20170617233842.jpg');
INSERT INTO `food` VALUES (7, 5, 1, 'Tucumana', '<span>Pasta o masa en forma de media luna rellena de ingredientes dulces o salados que se frÃ­e en abundante aceite o se cuece al horno.</span>', 'img/food/20170617234012.jpg');
INSERT INTO `food` VALUES (8, 5, 1, 'ensalada de frutas', '<span>Plato que se prepara mezclando distintos alimentos, crudos o cocidos, principalmente hortalizas troceadas, y se sirve frÃ­o o tibio, y aliÃ±ado o aderezado con alguna salsa.</span>', 'img/food/20170617234115.jpg');
INSERT INTO `food` VALUES (9, 6, 1, 'Vaso de coca cola', 'REfresco refrescante', 'img/food/20170617234212.jpg');
INSERT INTO `food` VALUES (10, 6, 1, 'Coca cola 1/2 litro', 'Coca cola gaseosa', 'img/food/20170617234253.jpg');
INSERT INTO `food` VALUES (11, 2, 1, 'Pescado frito entero', 'con ensaladas, patatas fritas o tostones (platano verde frito) en alguna playa del Caribe', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (12, 2, 1, 'Ceviche de pescado', 'Si es en las costas de Perú, mejor', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (13, 2, 1, 'Asado', 'n buen asado de tira en Buenos Aires', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (14, 2, 1, 'Shawarma', 'En gran cantidad de ciudades del mundo puedes conseguirlo', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (15, 2, 1, 'Paella valenciana', 'Aunque es necesario que vayas a Valencia a por una, comerla allá tiene un valor agregado', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (16, 2, 1, 'Huevos fritos', 'Huevos fritos con tocineta', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (17, 2, 1, 'Pad Thai', 'Tallarines tailandeses hechos con una salsa a base de pulpa de tamarindo', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (18, 2, 1, 'Pizza', 'No conozco a nadie que no haya comido pizza alguna vez. Procura que sea de horno de leña. Si no sabes cómo hacer pizza, aquí te lo explico', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (19, 2, 1, 'Carpaccio de lomito', 'Carpaccio de lomito', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (20, 2, 1, 'Pulpo a la gallega', 'Por favor, el plato insignia de Galicia es maravilloso', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (21, 2, 1, 'plato mexicano0', 'Mole poblano (plato mexicano)', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (22, 2, 1, 'Jamón de pata negra con una botella de vino tinto', 'Posiblemente la mejor comida existente en el planeta tierra', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (23, 2, 1, 'Sopa de pollo', 'Preparada por una figura maternal. Comerla en un restaurant es una herejía', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (24, 2, 1, 'Empanadas de cazón', 'Empanadas de cazón (tiburón) en la Isla Margarita, Venezuela', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (25, 2, 1, 'Causa limeña', 'La clásica, rellena de atún', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (26, 2, 1, 'Calamares en su tinta', 'Con un poco de arroz blanco para que aprovechas la salsa', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (27, 2, 1, 'Pato Pekín', 'Delicia de China. Otrora comida de emperadores', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (28, 2, 1, 'Pho', 'sopa vietnamita', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (29, 2, 1, 'Una barra de chocolate venezolano', 'Si crees que los chocolates suizos son  los mejores, estás equivocado', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (30, 2, 1, 'Anticuchos (corazón de res)', 'hechos en un puesto de calle en Lima, Perú', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (31, 2, 1, 'Lomo saltado', 'Este es un plato que mezcla comida china y peruana', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (32, 2, 1, 'Choripan', 'Si lo puedes comer en los puestos de comida en Puerto Madero en Buenos Aires, perfecto', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (33, 2, 1, 'Cocido madrileño', 'Este plato lleva garbanzos, repollo, chorizo español, tocineta carne de res y patatas. Debería estar en el top 10', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (34, 2, 1, 'Tortilla de patatas española', 'Este plato también debería estar en el top 10', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (35, 2, 1, 'Tarta de galletas María', 'Uno de los postres más sencillos y deliciosos sobre la faz de la tierr', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (36, 2, 1, 'Bacalao a la vizcaína', 'Los vascos saben muy bien lo que hacen', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (37, 2, 1, 'Cordero libanés', 'Acompañado con cous-cous', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (38, 2, 1, 'Tarta de profiteroles', 'Tarta de profiteroles', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (39, 2, 1, 'Risotto de calabaza', 'Aquí tienes la receta', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (40, 2, 1, 'Crepes rellenas de nutella', 'Crepes rellenas de nutella', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (41, 2, 1, 'Perros calientes', 'hot dogs, perritos, panchos, como quieras llamarlos', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (42, 2, 1, 'Chuletas de cerdo', 'Chuletas de cerdo ahumadas acompañadas de puré de patatas', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (43, 2, 1, 'Tostadas mexicanas', 'Con mucha salsa picante por encima y una bebida refrescante al lado', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (44, 2, 1, 'Chuletas de cordero', 'Chuletas de cordero a la plancha con pimientos de piquillo (las que salen en la foto de este post)', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (45, 2, 1, 'Sopa mongolesa ó Hot Pot', 'Aquí te cuento mi experiencia comiendo Hot Pot en Madrid', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (46, 2, 1, 'Penne all arrabbiata', 'Un plato de pasta de vez en cuando no está mal, y si es picante mejor', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (47, 2, 1, 'Sopa de cebolla', 'La clásica, francesa', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (48, 2, 1, 'Hamburguesas', 'Desde la más tradicional hasta las súper elaboradas que se consiguen en los carritos de “street food”, que pueden incluir incluyen huevo, bacon, aguacate y mil salsas distintas', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (49, 2, 1, 'Arroz caldoso de mariscos', 'Para algunas personas este plato supera a la paella valenciana', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (50, 2, 1, 'Pie de limón', 'Pie de limón', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (51, 2, 1, 'Kibbe crudo', 'Delicia árabe, existe la versión frita y la horneada, pero la cruda va más allá', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (52, 2, 1, 'Ensalada César', 'Un clásico que si no lo saben preparar, puede ser la peor ensalada del mundo', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (53, 2, 1, 'Sopa de costilla de res', 'En los puestos de comida de los mercados municipales están los mejores', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (54, 2, 1, 'Fajitas de pollo', 'Aquí hay una receta', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (55, 2, 1, 'Una buena ración de patatas fritas', 'Una buena ración de patatas fritas', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (56, 2, 1, 'Risotto nero (negro)', 'Hecho con calamares y su tinta, es de otro mundo. Mira la receta acá', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (57, 2, 1, 'Chili con carne', 'En Comedera.Com he hablado de lo increíble que es este plato', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (58, 2, 1, 'Costillas de cerdo en salsa BBQ0', 'Costillas de cerdo en salsa BBQ', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (59, 2, 1, 'Minestrone de lentejas', 'Minestrone de lentejas', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (60, 2, 1, 'Pollo Tikka Masala', 'Delicioso curry de origen hindú-inglés. Picant', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (61, 2, 1, 'Bento Box', 'Es una caja que contiene porciones variadas de comida japonesa. Puede incluir arroz, sushi, tempuras y vegetales', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (62, 2, 1, 'Dim Sum', 'El clásico desayuno chino', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (63, 2, 1, 'Fideos Singapur', 'Delicioso plato de tallarines de arroz con curry que, a pesar de su nombre, no son de Singapur. Es una receta chino-estadounidense', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (64, 2, 1, 'Congri', 'Famoso plato cubano de arroz con cerdo y frijoles negros', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (65, 2, 1, 'Pimientos de piquillo rellenos de pescado', 'Preferiblemente bacalao', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (66, 2, 1, 'Tom Yum Goong', 'Sopa tailandesa de camarones, picante', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (67, 2, 1, 'Pabellón criollo', 'Plato venezolano de carne mechada guisada, arroz, frijoles negros y plátano frito', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (68, 2, 1, 'Chupe de camarones peruano', 'Chupe de camarones peruano', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (69, 2, 1, 'Helado Banana Split', 'Esas bolas de fresa, chocolate y vainilla, con trozos de banana, crema, sirope y cerezas de adorno', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (70, 2, 1, 'Cochinillo segoviano', 'Si vives en España, deberías haberlo comido en la misma Segovia, si no lo hiciste, deja de leer este post y ve. Si no vives allá, ahorra, vale la pena', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (71, 2, 1, 'Cocido montañés', 'Delicioso plato del norte de España, ideal para días fríos y lluviosos. Muy similar al cocido madrileño pero se hace con alubias rojas en vez de garbanzo', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (72, 2, 1, 'Arroz chino, ', 'Ese mismo, el que no existe en China', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (73, 2, 1, 'Pollo al horno con patatas', 'Otro clásico casero que nuestras madres saben hacer mejor que nadie', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (74, 2, 1, 'Croissant relleno de chocolate', 'Carbohidratos que dan placer', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (75, 2, 1, 'Barbacoa de salchichas alemanas', 'Los alemanes saben lo que hacen', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (76, 2, 1, 'Lasaña', 'Pero sin jamón, eso de ponerle jamón es traición a la humanidad', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (77, 2, 1, 'Gambas al ajillo', 'Son increíbles, inigualables, maravillosas. Cepíllate los dientes durante media hora seguida luego de comerlos', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (78, 2, 1, 'Paticas de calamares', 'Paticas de calamares rebozadas, bañadas en limón', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (79, 2, 1, 'Lonjas finas de salmón ahumado', 'acompañadas de. de nada, así mismas son perfectas', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (80, 2, 1, 'Sashimi variado', 'Es más delicioso y auténtico que un “california roll”', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (81, 2, 1, 'Milanesa de pollo a la parmesana', 'Quien haya inventado este plato merece una estatua', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (82, 2, 1, 'Langosta al Termidor', 'Personalmente no soy fan de este animal, pero hay que probarlo alguna vez. Prefiero el cangrejo y por cierto', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (83, 2, 1, 'Croquetas de cangrejo', 'Incluso las que venden pre-empacadas, listas para cocinar, son deliciosa', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (84, 2, 1, 'Patatas bravas', 'Este plato español de patatas con salsa picante es muy común que te lo sirvan de tapa en un bar. Acompáñalas con una copa de vino tinto, felicidad pura', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (85, 2, 1, 'Brownies de chocolate', 'Y si le pones arriba una bola de helado de vainilla y bañas todo con sirope de chocolate, mucho mejor', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (86, 2, 1, 'Pollo asado', 'De esos que dan vueltas y vueltas en grandes asadores hasta que alguien los reclama', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (87, 2, 1, 'Albóndigas de carne en salsa de tomate', 'Las puedes acompañar con arroz o con puré de patatas', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (88, 2, 1, 'Pollo Biryani', 'Es la versión hindú del arroz con pollo, sólo que muy especiado y picante. Delicioso', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (89, 2, 1, 'Ñoquis', 'con salsa napolitana y mucho queso', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (90, 2, 1, 'berenjenas chinas', 'Estas berenjenas chinas con ajo y cilantro', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (91, 2, 1, 'Arroz Chaufa', 'La versión peruana del arroz chino. Ligeramente picante', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (92, 2, 1, 'Bacalao a la portuguesa', 'Otra manera de comer este increíble pescado. En este caso con mucha cebolla, papas y pimiento picante', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (93, 2, 1, 'Bun Rieu', 'Otra sopa vietnamita, hecha con caldo de carne y tallarines de arroz', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (94, 2, 1, 'Huevos rancheros', 'Tienen salsa picante y están acompañados de tortillas mexicanas y frijoles fritos. Nada puede salir mal', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (95, 2, 1, 'Cus-cus al estilo marroquí', 'Se hace con vegetales guisados y carne (opcional). Se come con la mano. Los platos que se comen con las manos siempre son deliciosos, por ejemplo.', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (96, 2, 1, 'Pollo frito', 'No importa si es casero o en la calle. Lo que importa es que su piel esté empanizada y al morderla sea crujiente, gotee grasa por montón y tengas que usar 40 servilletas para limpiarte las mano', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (97, 2, 1, 'Goulash', 'Plato húngaro de carne guisada con paprika. Picante', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (98, 2, 1, 'Codillo de cerdo al horno', 'Es tan, pero tan gustoso, que puedes comerlo sólo con sal y aceite de oliva', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (99, 2, 1, 'Alitas de pollo0', 'Alitas de pollo con ajo, miel y salsa de soja', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (100, 2, 1, 'Pinchos de pollo en salsa satay', 'Es mandatorio que comas este plato. ¿Por qué? ¡La salsa es con maní y leche de coco!', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (101, 2, 1, 'Asado negro venezolano', 'Una pieza entera de redondo cocinado a fuego lento. Acompañado de una salsa ligeramente dulce. Imposible resistirse', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (102, 2, 1, 'Tarta de fresas', 'Porque está hecha con fresas pues', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (103, 2, 1, 'Gazpacho', 'La famosa sopa de tomate fría. Originaria de España', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (104, 2, 1, 'Ensalada caprese', 'En la sencillez está el gusto', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (105, 2, 1, 'Fideuá', 'Parecida a la paella pero en vez de arroz, con pasta', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (106, 2, 1, 'Tortitas americanas', 'Con pedacitos de fresas y bañadas con sirope de maple', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (107, 2, 1, 'Wontones rellenos de camarones', 'Wontones rellenos de camarones', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (108, 2, 1, 'Tacos mexicanos al pastor', 'Hay muchos tipos de tacos, pero esta versión resalta', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (109, 2, 1, 'Una bolsita de chapulines (saltamontes) salados', 'En México es totalmente normal comer este diminuto insecto como si fuera un snack. La verdad sabe bien', 'img/food/20170617233509.jpg');
INSERT INTO `food` VALUES (110, 2, 1, 'steak de carne', 'Un enorme pedazo de steak de carne hecho al carbón, cocinado término medio, acompañado con ensalada de tomate y aguacate (palta), unas patatas fritas y una salsa picante hecha en casa', 'img/food/20170617233509.jpg');

-- ----------------------------
-- Table structure for form
-- ----------------------------
DROP TABLE IF EXISTS `form`;
CREATE TABLE `form`  (
  `ID_FORM` decimal(3, 0) NOT NULL,
  `NAME_FORM` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_FORM` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_FORM`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for func_form
-- ----------------------------
DROP TABLE IF EXISTS `func_form`;
CREATE TABLE `func_form`  (
  `ID_FORM` decimal(3, 0) NOT NULL,
  `ID_FUNCTION` decimal(3, 0) NOT NULL,
  `DATE_FUNCTION_FORM` date NOT NULL,
  `TIME_FUNCTION_FORM` time(0) NOT NULL,
  PRIMARY KEY (`ID_FORM`, `ID_FUNCTION`) USING BTREE,
  INDEX `FK_RELATIONSHIP_10`(`ID_FUNCTION`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_FUNCTION`) REFERENCES `function` (`ID_FUNCTION`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_FORM`) REFERENCES `form` (`ID_FORM`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for function
-- ----------------------------
DROP TABLE IF EXISTS `function`;
CREATE TABLE `function`  (
  `ID_FUNCTION` decimal(3, 0) NOT NULL,
  `NAME_FUNCTION` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_FUNCTION` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IMAGE_FUNCTION` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_FUNCTION`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel`  (
  `ID_HOTEL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_HOTEL` int(11) NOT NULL,
  `NAME_HOTEL` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DOMINIO_HOTEL` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_FOUNDATION_HOTEL` date NOT NULL,
  `LOGO_HOTEL` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADDRESS_HOTEL` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADDRESS_GPS_X_HOTEL` float NOT NULL,
  `ADDRESS_GPS_Y_HOTEL` float NOT NULL,
  `ADDRESS_IMAGE_HOTEL` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HISTORY_HOTEL` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MISSION_HOTEL` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VISION_HOTEL` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SCOPE_HOTEL` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `OBJECTIVE_HOTEL` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `WATCHWORD_HOTEL` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_HOTEL` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EMAIL_HOTEL` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PHONE_HOTEL` decimal(15, 0) NOT NULL,
  PRIMARY KEY (`ID_HOTEL`) USING BTREE,
  INDEX `FK_RELATIONSHIP_46`(`ID_TYPE_HOTEL`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_46` FOREIGN KEY (`ID_TYPE_HOTEL`) REFERENCES `type_hotel` (`ID_TYPE_HOTEL`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES (1, 7, 'Hotel', 'www.hoteltesis.esy.es', '2017-06-01', 'img/system/logo.png', 'Av. siempre viva Nro355', -17.3934, -66.1472, 'img/system/hotel_font.jpg', '<h6>En una bella casona a unos pasos de la catedral con estacionamiento, pensiÃ³n de mascotas, wifi, niÃ±era.</h6>                            <p>Hotel en el centro histÃ³rico, ubicado en una casona de finales del siglo XVIII pero con el confort, servicios y atenciÃ³n del siglo XXI. Rodeado de importantes construcciones arquitectÃ³nicas tales como Museo Regional Michoacano, La Catedral, Centro Cultural Clavijero, Centro Cultural Universitario, Mercado del Dulce, entre otros; a tan solo 10 min. del Ceconexpo, y 30 minutos del aeropuerto.</p>              <p>En  su prÃ³ximo viaje a la ciudad de Morelia ya sea de trabajo, placer o negocios brÃ­ndenos la oportunidad de ofrecerle nuestro servicio de hospitalidad ya que aparte de su excelente ubicaciÃ³n cuenta con el personal capacitado para darle a usted un servicio personalizado y de calidad.</p>              <p>El concepto de nuestro Hotel es de carÃ¡cter TemÃ¡tico  ya que cuenta con 12 habitaciones estÃ¡ndar finamente decoradas con rÃ©plicas de edificaciones, arquitectura e incluso artesanÃ­as caracterÃ­sticas de la regiÃ³n, dÃ¡ndonos la sensaciÃ³n de<br></p>', 'omos una empresa familiar comprometida con la satisfacciÃ³n de nuestros clientes, ofreciÃ©ndoles una experiencia Ãºnica y siendo la excelencia nuestra carta de presentaciÃ³n. Desarrollamos nuestra actividad en un marco de compromiso con la sociedad y respeto al Medio Ambiente.', 'Trabajamos para posicionarnos como una organizaciÃ³n lÃ­der en el negocio de la hotelerÃ­a, siendo reconocidos por la calidad de nuestro servicio y la orientaciÃ³n a la satisfacciÃ³n de las necesidades y expectativas de nuestros huÃ©spedes, siempre bajo estrictos criterios de rentabilidad, transparencia, protecciÃ³n del Medio Ambiente y compromiso social.', 'Desarrollar una importante labor de opiniÃ³n, interlocuciÃ³n y comunicaciÃ³n entre los actores de la comunidad receptora, los consumidores, los empresarios, el gobierno a todos sus niveles y con el poder legislativo, para conformar polÃ­ticas pÃºblicas y programas empresariales que fortalezcan la industria turÃ­stica, la protecciÃ³n de los consumidores de servicios turÃ­sticos, la conservaciÃ³n y cuidado de los recursos naturales y el desarrollo comunitario. Actividades alineadas para consolidar al Turismo como prioridad nacional y regional.', '<ol><li>. Mantener el liderazgo de la Industria TurÃ­stica</li><li>. Unificar la fuerza de los Asociados</li><li>. Representar y proteger los intereses de sus afiliados</li><li>. Impulsar y fomentar las acciones de promociÃ³n de la industria turÃ­stica hacia el desarrollo del destino.</li><li>. Elevar los estÃ¡ndares de calidad de los servicios que se ofrecen al turismo a travÃ©s de programas de capacitaciÃ³n.</li><li>. Fomentar el trabajo en equipo con otras asociaciones y Â organizaciones afines para lograr objetivos comunes.</li><li>. Trabajar para renovar y mejorar la atenciÃ³n y el servicio, para mantener al destino en los primeros lugares turÃ­sticos del mundo.</li></ol>', '<p>Cumplir integralmente en sus dimensiones econÃ³mica, social y ambiental, en sus contextos externo e interno. La AsociaciÃ³n de Hoteles de CancÃºn y Puerto Morelos adopta una actitud Ã©tica en todas sus acciones, buscando por igual:</p><p>1.-El desarrollo de sus agremiados y empleados</p><p>2.-El desarrollo de la comunidad</p><p>3.-El cuidado y preservaciÃ³n del medio ambiente</p>', 'El Hotel Cellai es un hotel boutique situado en el corazÃ³n del centro histÃ³rico de Florencia, rodeado de la extraordinaria belleza de iglesias, palacios y monumentos Ãºnicos en el mundo. El Duomo y la Galeria de la Accademia estÃ¡n a solo 5 minutos a pie.Ya en el umbral de este exclusivo hotel de Florencia se percibe claramente un ambiente particular, cÃ¡lido e Ã­ntimo, relajante y ecojedor. Una atmÃ³sfera que transmite la sensaciÃ³n de encontrarse en una casa, donde cada detalle estÃ¡ cuidado con pasiÃ³n, donde cada espacio merece ser descubierto.Muebles de Ã©poca, toques contemporÃ¡neos y preciosos complementos de decoraciÃ³n artÃ­stica caracterizan las muchas salas donde dedicarse a la lectura, al descanso o a la conversaciÃ³n.WIFIAcceso a Internet WIFI en todas las habitaciones, salas de reuniones y en el Roof Garden.BUSINESS CORNERNuestro staff estÃ¡ a su disposiciÃ³n para ayudarle a imprimir y enviar por fax sus documentos.Caja de seguridadEn el servicio de recepciÃ³n estÃ¡ disponib', 'hotel@gmail.com', 78965432);

-- ----------------------------
-- Table structure for image_site_tour
-- ----------------------------
DROP TABLE IF EXISTS `image_site_tour`;
CREATE TABLE `image_site_tour`  (
  `ID_IMAGE_SITE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SITE_TOUR` int(11) NOT NULL,
  `IMAGE_SITE` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NAME_IMAGE_SITE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_IMAGE_SITE` varchar(750) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STATE_IMAGE_SITE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_IMAGE_SITE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_44`(`ID_SITE_TOUR`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_44` FOREIGN KEY (`ID_SITE_TOUR`) REFERENCES `site_tour` (`ID_SITE_TOUR`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of image_site_tour
-- ----------------------------
INSERT INTO `image_site_tour` VALUES (1, 1, 'img/site/201706180033561.jpeg', 'entrada', 'Paisaje de entrada', 1);
INSERT INTO `image_site_tour` VALUES (2, 1, 'img/site/201706180034271.jpeg', 'Contenido', 'Paisaje de adentro del lugar', 1);
INSERT INTO `image_site_tour` VALUES (3, 2, 'img/site/201706180038441.png', 'esntrad', 'fahcada de enfrente', 1);
INSERT INTO `image_site_tour` VALUES (4, 2, 'img/site/201706180038442.jpeg', 'detras', 'fachada de aras del edificio', 1);
INSERT INTO `image_site_tour` VALUES (5, 2, 'img/site/201706180038443.jpeg', 'interior', 'adentro fachada interior dl edificio', 1);
INSERT INTO `image_site_tour` VALUES (6, 3, 'img/site/201710151717391.jpeg', 'frontal', 'Av de la Concordia, Cochabamba, Bolivia', 1);
INSERT INTO `image_site_tour` VALUES (7, 3, 'img/site/201710151717392.jpeg', 'De frente', 'Av de la Concordia, Cochabamba, Bolivia', 1);
INSERT INTO `image_site_tour` VALUES (8, 3, 'img/site/201710151717393.jpeg', 'Grante', 'Av de la Concordia, Cochabamba, Bolivia', 1);
INSERT INTO `image_site_tour` VALUES (9, 3, 'img/site/201710151717394.jpeg', 'Desde lejos', 'Av de la Concordia, Cochabamba, Bolivia', 1);
INSERT INTO `image_site_tour` VALUES (10, 4, 'img/site/201710151725311.jpeg', 'Coronilla', ' es el coliseo la coronilla', 1);
INSERT INTO `image_site_tour` VALUES (11, 4, 'img/site/201710151725312.jpeg', 'Entrada', 'Entrada hacia la coronilla', 1);
INSERT INTO `image_site_tour` VALUES (12, 4, 'img/site/201710151725313.jpeg', 'Estatua', 'Heroes de la coronilla', 1);
INSERT INTO `image_site_tour` VALUES (13, 4, 'img/site/201710151725314.jpeg', 'Otra foto', 'Otra foto de la coronilla', 1);
INSERT INTO `image_site_tour` VALUES (14, 5, 'img/site/201710151729551.jpeg', 'Piscina', 'Vista de la pisnicna', 1);
INSERT INTO `image_site_tour` VALUES (15, 5, 'img/site/201710151729552.jpeg', 'Lago ', 'Vista leteral del lago', 1);
INSERT INTO `image_site_tour` VALUES (16, 5, 'img/site/201710151729553.jpeg', 'molino', 'Vista forntal del molino', 1);
INSERT INTO `image_site_tour` VALUES (17, 5, 'img/site/201710151729554.jpeg', 'Jardin ', 'Acumualacion de platnas', 1);
INSERT INTO `image_site_tour` VALUES (18, 6, 'img/site/201710151733461.jpeg', 'TRencito', 'tren en fincionamiento para la educacion vial', 1);
INSERT INTO `image_site_tour` VALUES (19, 6, 'img/site/201710151733462.jpeg', 'esntrada', 'Fila para ingresar al parque', 1);
INSERT INTO `image_site_tour` VALUES (20, 6, 'img/site/201710151733463.jpeg', 'jardin', 'Lugar recreativo', 1);
INSERT INTO `image_site_tour` VALUES (21, 6, 'img/site/201710151733464.jpeg', 'Juegos', 'Parque de entretenimiento para niÃ±os', 1);
INSERT INTO `image_site_tour` VALUES (22, 6, 'img/site/201710151733465.jpeg', 'Puente', 'Lugar para cruzar de un punto a otro', 1);
INSERT INTO `image_site_tour` VALUES (23, 7, 'img/site/201710151737541.jpeg', 'Piscina', 'Lugar de recreaciÃ³n ', 1);
INSERT INTO `image_site_tour` VALUES (24, 7, 'img/site/201710151737542.jpeg', 'Piscina', 'Lugar de recreacion', 1);
INSERT INTO `image_site_tour` VALUES (25, 7, 'img/site/201710151737543.jpeg', 'Canchas', 'Frontis de las canchas', 1);
INSERT INTO `image_site_tour` VALUES (26, 7, 'img/site/201710151737544.jpeg', 'Entrada', 'lugar de ingreso al parque', 1);
INSERT INTO `image_site_tour` VALUES (27, 7, 'img/site/201710151737545.jpeg', 'Piscina', 'Lugar de recreacion acuatico', 1);
INSERT INTO `image_site_tour` VALUES (28, 7, 'img/site/201710151737546.jpeg', 'Aguas dancantes', 'entretenimiento', 1);
INSERT INTO `image_site_tour` VALUES (29, 7, 'img/site/201710151737547.jpeg', 'Acuerio', 'Lugar de ingreso al acuario', 1);
INSERT INTO `image_site_tour` VALUES (30, 8, 'img/site/201710151742151.jpeg', 'carrera', 'ciclistas compitiendo', 1);
INSERT INTO `image_site_tour` VALUES (31, 8, 'img/site/201710151742152.jpeg', 'Paseo', 'cilcista paseando', 1);
INSERT INTO `image_site_tour` VALUES (32, 8, 'img/site/201710151742153.jpeg', 'sombrero de chola', 'sombrero de chola', 1);
INSERT INTO `image_site_tour` VALUES (33, 8, 'img/site/201710151742154.jpeg', 'via espedita', 'ciclovia libre para el transito', 1);
INSERT INTO `image_site_tour` VALUES (34, 8, 'img/site/201710151742155.jpeg', 'Paso por la ciudad', 'recorrido de la ciclovia por la ciudad', 1);
INSERT INTO `image_site_tour` VALUES (35, 9, 'img/site/201710151745521.jpeg', 'Parbulario', 'Lugar de recreacion para niÃ±os', 1);
INSERT INTO `image_site_tour` VALUES (36, 9, 'img/site/201710151745522.jpeg', 'parque', 'Lugar de entretenimiento para niÃ±os', 1);
INSERT INTO `image_site_tour` VALUES (37, 10, 'img/site/201710151750021.jpeg', '2 cabinas', 'Cabinas en pleno recorrido', 1);
INSERT INTO `image_site_tour` VALUES (38, 10, 'img/site/201710151750022.jpeg', '3 cabinas', 'cabinas del teleferico subiendo al cristo de la concordia', 1);
INSERT INTO `image_site_tour` VALUES (39, 10, 'img/site/201710151750023.jpeg', 'cabinas en bajada', 'cabinas del teleferico de regreso a la parte inferior del cerro', 1);
INSERT INTO `image_site_tour` VALUES (40, 10, 'img/site/201710151750024.jpeg', 'parada', 'Lugar de parada del teleferico', 1);
INSERT INTO `image_site_tour` VALUES (41, 10, 'img/site/201710151750025.jpeg', 'Paseo', 'recorrido del teleferico', 1);

-- ----------------------------
-- Table structure for inquest
-- ----------------------------
DROP TABLE IF EXISTS `inquest`;
CREATE TABLE `inquest`  (
  `ID_INQUEST` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSON` int(11) NOT NULL,
  `ID_STATE_INQUEST` int(11) NOT NULL,
  `NAME_INQUEST` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_INQUEST` varchar(750) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_START_INQUEST` date NOT NULL,
  `TIME_START_INQUEST` time(0) NOT NULL,
  `DATE_END_INQUEST` date DEFAULT NULL,
  `TIME_END_INQUEST` time(0) DEFAULT NULL,
  PRIMARY KEY (`ID_INQUEST`) USING BTREE,
  INDEX `FK_RELATIONSHIP_50`(`ID_PERSON`) USING BTREE,
  INDEX `FK_RELATIONSHIP_82`(`ID_STATE_INQUEST`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_50` FOREIGN KEY (`ID_PERSON`) REFERENCES `user_hotel` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_82` FOREIGN KEY (`ID_STATE_INQUEST`) REFERENCES `state_inquest` (`ID_STATE_INQUEST`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of inquest
-- ----------------------------
INSERT INTO `inquest` VALUES (1, 1, 5, 'Preguntas frecuentes', 'Preguntas realizadas por los clientes', '2017-06-17', '22:06:13', '2018-01-01', '23:59:59');
INSERT INTO `inquest` VALUES (2, 1, 1, 'Encuesta de satisfaccion', 'Estimado cliente.<br>Con el fin de mejorar la calidad de nuestros servicios y asegurar la satisfacciÃ³n de todos nuestros visitantes, agradecerÃ­amos respondiera a este cuestionario. PuntuÃ© del 1 (Muy mal) al 5 (muy bien) los siguientes aspectos de este establecimiento.', '2017-06-18', '00:00:00', '2017-07-31', '23:59:59');
INSERT INTO `inquest` VALUES (3, 1, 1, 'Encuesta decalidad de la comida', 'Estimado cliente.<br>Con el fin de mejorar la calidad de nuestros servicios y asegurar la satisfacciÃ³n de todos nuestros visitantes, agradecerÃ­amos respondiera a este cuestionario. ', '2017-06-18', '00:00:00', '2017-12-08', '23:59:59');
INSERT INTO `inquest` VALUES (4, 1, 1, 'Preguntas de fidelizacion', 'Preguntas sobre el estado del hotel y los servicios', '2017-06-26', '00:00:00', '2018-02-28', '23:59:59');
INSERT INTO `inquest` VALUES (5, 1, 6, 'boormae', 'llamame', '2017-08-24', '02:00:00', '2017-08-24', '02:00:00');
INSERT INTO `inquest` VALUES (6, 1, 6, 'soy nuevo', 'esescandelbros', '2017-08-25', '01:30:00', '2017-08-31', '01:30:00');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `ID_LOG` int(15) NOT NULL AUTO_INCREMENT,
  `ID_TYPE_LOG` int(11) NOT NULL,
  `ENTITY` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATA_NEW` varchar(350) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATA_OLD` varchar(350) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_CREATED_LOG` date NOT NULL,
  `TIME_CREATED_LOG` time(0) NOT NULL,
  `IP_LOG` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `BROWSER_LOG` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SESSION_LOG` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_LOG`) USING BTREE,
  INDEX `FK_RELATIONSHIP_67`(`ID_TYPE_LOG`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_67` FOREIGN KEY (`ID_TYPE_LOG`) REFERENCES `type_log` (`ID_TYPE_LOG`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for member_check
-- ----------------------------
DROP TABLE IF EXISTS `member_check`;
CREATE TABLE `member_check`  (
  `ID_PERSON` int(11) NOT NULL,
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ACTIVE_MEMBER` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_PERSON`, `ID_CONSUME_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_115`(`ID_CONSUME_SERVICE`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_114` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_115` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of member_check
-- ----------------------------
INSERT INTO `member_check` VALUES (3, 9, 1);
INSERT INTO `member_check` VALUES (3, 10, 1);
INSERT INTO `member_check` VALUES (33, 2, 1);
INSERT INTO `member_check` VALUES (34, 3, 1);
INSERT INTO `member_check` VALUES (35, 6, 1);
INSERT INTO `member_check` VALUES (36, 7, 1);
INSERT INTO `member_check` VALUES (36, 11, 1);
INSERT INTO `member_check` VALUES (38, 15, 1);
INSERT INTO `member_check` VALUES (40, 19, 1);
INSERT INTO `member_check` VALUES (41, 23, 1);
INSERT INTO `member_check` VALUES (41, 27, 1);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `ID_MENU` int(11) NOT NULL AUTO_INCREMENT,
  `ACTIVE_MENU` tinyint(1) NOT NULL,
  `TIME_UPDATE_MENU` time(0) NOT NULL,
  `DATE_UPDATE_MENU` date NOT NULL,
  `TIME_CREATED_MENU` time(0) NOT NULL,
  `DATE_CREATED_MENU` date NOT NULL,
  `DATE_START_MENU` date NOT NULL,
  `DATE_END_MENU` date NOT NULL,
  `NAME_MENU` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_MENU`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 1, '23:43:33', '2018-01-01', '23:43:33', '2019-12-31', '2014-06-17', '2019-10-31', 'menu desayuno');
INSERT INTO `menu` VALUES (2, 1, '23:44:21', '2017-06-17', '23:44:21', '2019-12-31', '2014-06-18', '2019-06-23', 'Almuerzo');
INSERT INTO `menu` VALUES (3, 1, '23:44:21', '2017-06-17', '23:44:21', '2019-12-31', '2014-06-18', '2019-06-23', 'Infantil');
INSERT INTO `menu` VALUES (4, 1, '23:44:21', '2017-06-17', '23:44:21', '2019-12-31', '2014-06-18', '2019-06-23', 'Especial');
INSERT INTO `menu` VALUES (5, 1, '23:44:21', '2017-06-17', '23:44:21', '2019-12-31', '2014-06-18', '2019-06-23', 'Temporada primavera');
INSERT INTO `menu` VALUES (6, 1, '23:44:21', '2017-06-17', '23:44:21', '2019-12-31', '2014-06-18', '2019-06-23', 'Temporada verano');
INSERT INTO `menu` VALUES (7, 1, '23:44:21', '2017-06-17', '23:44:21', '2019-12-31', '2014-06-18', '2019-06-23', 'Temporada invierno');
INSERT INTO `menu` VALUES (8, 1, '23:44:21', '2017-06-17', '23:44:21', '2019-12-31', '2014-06-18', '2019-06-23', 'Temporada otoño');

-- ----------------------------
-- Table structure for menu_food
-- ----------------------------
DROP TABLE IF EXISTS `menu_food`;
CREATE TABLE `menu_food`  (
  `ID_FOOD` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  PRIMARY KEY (`ID_FOOD`, `ID_MENU`) USING BTREE,
  INDEX `FK_RELATIONSHIP_81`(`ID_MENU`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_117` FOREIGN KEY (`ID_FOOD`) REFERENCES `food` (`ID_FOOD`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_81` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu_food
-- ----------------------------
INSERT INTO `menu_food` VALUES (1, 1);
INSERT INTO `menu_food` VALUES (1, 3);
INSERT INTO `menu_food` VALUES (1, 4);
INSERT INTO `menu_food` VALUES (1, 5);
INSERT INTO `menu_food` VALUES (2, 1);
INSERT INTO `menu_food` VALUES (2, 3);
INSERT INTO `menu_food` VALUES (2, 4);
INSERT INTO `menu_food` VALUES (2, 5);
INSERT INTO `menu_food` VALUES (3, 1);
INSERT INTO `menu_food` VALUES (3, 3);
INSERT INTO `menu_food` VALUES (3, 4);
INSERT INTO `menu_food` VALUES (3, 5);
INSERT INTO `menu_food` VALUES (4, 1);
INSERT INTO `menu_food` VALUES (4, 3);
INSERT INTO `menu_food` VALUES (4, 4);
INSERT INTO `menu_food` VALUES (4, 5);
INSERT INTO `menu_food` VALUES (5, 1);
INSERT INTO `menu_food` VALUES (5, 3);
INSERT INTO `menu_food` VALUES (5, 4);
INSERT INTO `menu_food` VALUES (5, 5);
INSERT INTO `menu_food` VALUES (6, 1);
INSERT INTO `menu_food` VALUES (6, 3);
INSERT INTO `menu_food` VALUES (6, 4);
INSERT INTO `menu_food` VALUES (6, 5);
INSERT INTO `menu_food` VALUES (7, 1);
INSERT INTO `menu_food` VALUES (7, 3);
INSERT INTO `menu_food` VALUES (7, 4);
INSERT INTO `menu_food` VALUES (7, 5);
INSERT INTO `menu_food` VALUES (8, 1);
INSERT INTO `menu_food` VALUES (8, 3);
INSERT INTO `menu_food` VALUES (8, 4);
INSERT INTO `menu_food` VALUES (8, 5);
INSERT INTO `menu_food` VALUES (9, 1);
INSERT INTO `menu_food` VALUES (9, 3);
INSERT INTO `menu_food` VALUES (9, 4);
INSERT INTO `menu_food` VALUES (9, 5);
INSERT INTO `menu_food` VALUES (10, 1);
INSERT INTO `menu_food` VALUES (10, 3);
INSERT INTO `menu_food` VALUES (10, 4);
INSERT INTO `menu_food` VALUES (11, 1);
INSERT INTO `menu_food` VALUES (11, 4);
INSERT INTO `menu_food` VALUES (12, 1);
INSERT INTO `menu_food` VALUES (12, 4);
INSERT INTO `menu_food` VALUES (13, 1);
INSERT INTO `menu_food` VALUES (13, 4);
INSERT INTO `menu_food` VALUES (14, 1);
INSERT INTO `menu_food` VALUES (14, 4);
INSERT INTO `menu_food` VALUES (15, 1);
INSERT INTO `menu_food` VALUES (15, 4);
INSERT INTO `menu_food` VALUES (16, 1);
INSERT INTO `menu_food` VALUES (16, 4);
INSERT INTO `menu_food` VALUES (17, 1);
INSERT INTO `menu_food` VALUES (17, 4);
INSERT INTO `menu_food` VALUES (18, 1);
INSERT INTO `menu_food` VALUES (18, 4);
INSERT INTO `menu_food` VALUES (19, 1);
INSERT INTO `menu_food` VALUES (19, 4);
INSERT INTO `menu_food` VALUES (20, 1);
INSERT INTO `menu_food` VALUES (20, 3);
INSERT INTO `menu_food` VALUES (20, 4);
INSERT INTO `menu_food` VALUES (21, 1);
INSERT INTO `menu_food` VALUES (21, 3);
INSERT INTO `menu_food` VALUES (21, 4);
INSERT INTO `menu_food` VALUES (22, 1);
INSERT INTO `menu_food` VALUES (22, 3);
INSERT INTO `menu_food` VALUES (22, 4);
INSERT INTO `menu_food` VALUES (23, 1);
INSERT INTO `menu_food` VALUES (23, 3);
INSERT INTO `menu_food` VALUES (23, 4);
INSERT INTO `menu_food` VALUES (24, 1);
INSERT INTO `menu_food` VALUES (24, 3);
INSERT INTO `menu_food` VALUES (24, 4);
INSERT INTO `menu_food` VALUES (25, 1);
INSERT INTO `menu_food` VALUES (25, 3);
INSERT INTO `menu_food` VALUES (25, 4);
INSERT INTO `menu_food` VALUES (26, 1);
INSERT INTO `menu_food` VALUES (26, 3);
INSERT INTO `menu_food` VALUES (26, 4);
INSERT INTO `menu_food` VALUES (27, 1);
INSERT INTO `menu_food` VALUES (27, 3);
INSERT INTO `menu_food` VALUES (27, 4);
INSERT INTO `menu_food` VALUES (28, 1);
INSERT INTO `menu_food` VALUES (28, 3);
INSERT INTO `menu_food` VALUES (28, 4);
INSERT INTO `menu_food` VALUES (29, 1);
INSERT INTO `menu_food` VALUES (29, 3);
INSERT INTO `menu_food` VALUES (29, 4);
INSERT INTO `menu_food` VALUES (30, 1);
INSERT INTO `menu_food` VALUES (30, 4);
INSERT INTO `menu_food` VALUES (31, 1);
INSERT INTO `menu_food` VALUES (31, 4);
INSERT INTO `menu_food` VALUES (32, 1);
INSERT INTO `menu_food` VALUES (32, 4);
INSERT INTO `menu_food` VALUES (33, 1);
INSERT INTO `menu_food` VALUES (33, 4);
INSERT INTO `menu_food` VALUES (34, 1);
INSERT INTO `menu_food` VALUES (34, 4);
INSERT INTO `menu_food` VALUES (35, 1);
INSERT INTO `menu_food` VALUES (35, 4);
INSERT INTO `menu_food` VALUES (36, 1);
INSERT INTO `menu_food` VALUES (36, 4);
INSERT INTO `menu_food` VALUES (37, 1);
INSERT INTO `menu_food` VALUES (37, 4);
INSERT INTO `menu_food` VALUES (38, 1);
INSERT INTO `menu_food` VALUES (38, 4);
INSERT INTO `menu_food` VALUES (39, 1);
INSERT INTO `menu_food` VALUES (39, 4);
INSERT INTO `menu_food` VALUES (40, 1);
INSERT INTO `menu_food` VALUES (40, 3);
INSERT INTO `menu_food` VALUES (41, 1);
INSERT INTO `menu_food` VALUES (41, 3);
INSERT INTO `menu_food` VALUES (42, 1);
INSERT INTO `menu_food` VALUES (42, 3);
INSERT INTO `menu_food` VALUES (43, 1);
INSERT INTO `menu_food` VALUES (43, 3);
INSERT INTO `menu_food` VALUES (44, 1);
INSERT INTO `menu_food` VALUES (44, 3);
INSERT INTO `menu_food` VALUES (45, 1);
INSERT INTO `menu_food` VALUES (45, 3);
INSERT INTO `menu_food` VALUES (46, 1);
INSERT INTO `menu_food` VALUES (46, 3);
INSERT INTO `menu_food` VALUES (47, 1);
INSERT INTO `menu_food` VALUES (47, 3);
INSERT INTO `menu_food` VALUES (48, 1);
INSERT INTO `menu_food` VALUES (48, 3);
INSERT INTO `menu_food` VALUES (49, 1);
INSERT INTO `menu_food` VALUES (49, 3);
INSERT INTO `menu_food` VALUES (50, 1);
INSERT INTO `menu_food` VALUES (50, 2);
INSERT INTO `menu_food` VALUES (50, 3);
INSERT INTO `menu_food` VALUES (51, 2);
INSERT INTO `menu_food` VALUES (51, 3);
INSERT INTO `menu_food` VALUES (52, 2);
INSERT INTO `menu_food` VALUES (52, 3);
INSERT INTO `menu_food` VALUES (53, 2);
INSERT INTO `menu_food` VALUES (53, 3);
INSERT INTO `menu_food` VALUES (54, 2);
INSERT INTO `menu_food` VALUES (54, 3);
INSERT INTO `menu_food` VALUES (55, 2);
INSERT INTO `menu_food` VALUES (55, 3);
INSERT INTO `menu_food` VALUES (56, 2);
INSERT INTO `menu_food` VALUES (56, 3);
INSERT INTO `menu_food` VALUES (57, 2);
INSERT INTO `menu_food` VALUES (57, 3);
INSERT INTO `menu_food` VALUES (58, 2);
INSERT INTO `menu_food` VALUES (58, 3);
INSERT INTO `menu_food` VALUES (59, 2);
INSERT INTO `menu_food` VALUES (59, 3);
INSERT INTO `menu_food` VALUES (60, 2);
INSERT INTO `menu_food` VALUES (60, 3);
INSERT INTO `menu_food` VALUES (61, 2);
INSERT INTO `menu_food` VALUES (61, 3);
INSERT INTO `menu_food` VALUES (62, 2);
INSERT INTO `menu_food` VALUES (62, 3);
INSERT INTO `menu_food` VALUES (63, 2);
INSERT INTO `menu_food` VALUES (63, 3);
INSERT INTO `menu_food` VALUES (64, 2);
INSERT INTO `menu_food` VALUES (64, 3);
INSERT INTO `menu_food` VALUES (65, 2);
INSERT INTO `menu_food` VALUES (65, 3);
INSERT INTO `menu_food` VALUES (66, 2);
INSERT INTO `menu_food` VALUES (66, 3);
INSERT INTO `menu_food` VALUES (67, 2);
INSERT INTO `menu_food` VALUES (67, 3);
INSERT INTO `menu_food` VALUES (68, 2);
INSERT INTO `menu_food` VALUES (68, 3);
INSERT INTO `menu_food` VALUES (69, 2);
INSERT INTO `menu_food` VALUES (69, 3);
INSERT INTO `menu_food` VALUES (70, 2);
INSERT INTO `menu_food` VALUES (70, 3);
INSERT INTO `menu_food` VALUES (71, 2);
INSERT INTO `menu_food` VALUES (71, 3);
INSERT INTO `menu_food` VALUES (72, 2);
INSERT INTO `menu_food` VALUES (72, 3);
INSERT INTO `menu_food` VALUES (73, 2);
INSERT INTO `menu_food` VALUES (73, 3);
INSERT INTO `menu_food` VALUES (74, 2);
INSERT INTO `menu_food` VALUES (74, 3);
INSERT INTO `menu_food` VALUES (75, 2);
INSERT INTO `menu_food` VALUES (75, 3);
INSERT INTO `menu_food` VALUES (76, 2);
INSERT INTO `menu_food` VALUES (76, 3);
INSERT INTO `menu_food` VALUES (77, 2);
INSERT INTO `menu_food` VALUES (77, 3);
INSERT INTO `menu_food` VALUES (77, 5);
INSERT INTO `menu_food` VALUES (78, 2);
INSERT INTO `menu_food` VALUES (78, 3);
INSERT INTO `menu_food` VALUES (78, 5);
INSERT INTO `menu_food` VALUES (79, 2);
INSERT INTO `menu_food` VALUES (79, 3);
INSERT INTO `menu_food` VALUES (79, 5);
INSERT INTO `menu_food` VALUES (80, 2);
INSERT INTO `menu_food` VALUES (80, 3);
INSERT INTO `menu_food` VALUES (80, 5);
INSERT INTO `menu_food` VALUES (81, 2);
INSERT INTO `menu_food` VALUES (81, 3);
INSERT INTO `menu_food` VALUES (81, 5);
INSERT INTO `menu_food` VALUES (82, 2);
INSERT INTO `menu_food` VALUES (82, 3);
INSERT INTO `menu_food` VALUES (82, 5);
INSERT INTO `menu_food` VALUES (83, 2);
INSERT INTO `menu_food` VALUES (83, 3);
INSERT INTO `menu_food` VALUES (83, 5);
INSERT INTO `menu_food` VALUES (84, 2);
INSERT INTO `menu_food` VALUES (84, 3);
INSERT INTO `menu_food` VALUES (84, 5);
INSERT INTO `menu_food` VALUES (85, 2);
INSERT INTO `menu_food` VALUES (85, 3);
INSERT INTO `menu_food` VALUES (85, 5);
INSERT INTO `menu_food` VALUES (86, 2);
INSERT INTO `menu_food` VALUES (86, 3);
INSERT INTO `menu_food` VALUES (86, 5);
INSERT INTO `menu_food` VALUES (87, 2);
INSERT INTO `menu_food` VALUES (87, 3);
INSERT INTO `menu_food` VALUES (87, 5);
INSERT INTO `menu_food` VALUES (88, 2);
INSERT INTO `menu_food` VALUES (88, 3);
INSERT INTO `menu_food` VALUES (88, 5);
INSERT INTO `menu_food` VALUES (89, 2);
INSERT INTO `menu_food` VALUES (89, 3);
INSERT INTO `menu_food` VALUES (89, 5);
INSERT INTO `menu_food` VALUES (90, 2);
INSERT INTO `menu_food` VALUES (90, 3);
INSERT INTO `menu_food` VALUES (90, 5);
INSERT INTO `menu_food` VALUES (91, 2);
INSERT INTO `menu_food` VALUES (91, 3);
INSERT INTO `menu_food` VALUES (91, 5);
INSERT INTO `menu_food` VALUES (92, 2);
INSERT INTO `menu_food` VALUES (92, 3);
INSERT INTO `menu_food` VALUES (92, 5);
INSERT INTO `menu_food` VALUES (93, 2);
INSERT INTO `menu_food` VALUES (93, 3);
INSERT INTO `menu_food` VALUES (93, 5);
INSERT INTO `menu_food` VALUES (94, 2);
INSERT INTO `menu_food` VALUES (94, 3);
INSERT INTO `menu_food` VALUES (94, 5);
INSERT INTO `menu_food` VALUES (95, 2);
INSERT INTO `menu_food` VALUES (95, 3);
INSERT INTO `menu_food` VALUES (95, 5);
INSERT INTO `menu_food` VALUES (96, 2);
INSERT INTO `menu_food` VALUES (96, 3);
INSERT INTO `menu_food` VALUES (96, 5);
INSERT INTO `menu_food` VALUES (97, 2);
INSERT INTO `menu_food` VALUES (97, 3);
INSERT INTO `menu_food` VALUES (97, 5);
INSERT INTO `menu_food` VALUES (98, 2);
INSERT INTO `menu_food` VALUES (98, 3);
INSERT INTO `menu_food` VALUES (98, 5);
INSERT INTO `menu_food` VALUES (99, 2);
INSERT INTO `menu_food` VALUES (99, 3);
INSERT INTO `menu_food` VALUES (99, 5);
INSERT INTO `menu_food` VALUES (100, 2);
INSERT INTO `menu_food` VALUES (100, 4);
INSERT INTO `menu_food` VALUES (100, 5);
INSERT INTO `menu_food` VALUES (101, 2);
INSERT INTO `menu_food` VALUES (101, 4);
INSERT INTO `menu_food` VALUES (101, 5);
INSERT INTO `menu_food` VALUES (102, 2);
INSERT INTO `menu_food` VALUES (102, 4);
INSERT INTO `menu_food` VALUES (102, 5);
INSERT INTO `menu_food` VALUES (103, 2);
INSERT INTO `menu_food` VALUES (103, 4);
INSERT INTO `menu_food` VALUES (103, 5);
INSERT INTO `menu_food` VALUES (104, 2);
INSERT INTO `menu_food` VALUES (104, 4);
INSERT INTO `menu_food` VALUES (104, 5);
INSERT INTO `menu_food` VALUES (105, 2);
INSERT INTO `menu_food` VALUES (105, 4);
INSERT INTO `menu_food` VALUES (105, 5);
INSERT INTO `menu_food` VALUES (106, 2);
INSERT INTO `menu_food` VALUES (106, 4);
INSERT INTO `menu_food` VALUES (106, 5);
INSERT INTO `menu_food` VALUES (107, 2);
INSERT INTO `menu_food` VALUES (107, 4);
INSERT INTO `menu_food` VALUES (107, 5);
INSERT INTO `menu_food` VALUES (108, 2);
INSERT INTO `menu_food` VALUES (108, 4);
INSERT INTO `menu_food` VALUES (108, 5);
INSERT INTO `menu_food` VALUES (109, 2);
INSERT INTO `menu_food` VALUES (109, 4);
INSERT INTO `menu_food` VALUES (109, 5);
INSERT INTO `menu_food` VALUES (110, 2);
INSERT INTO `menu_food` VALUES (110, 4);
INSERT INTO `menu_food` VALUES (110, 5);

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `ID_MESSAGE` int(7) NOT NULL AUTO_INCREMENT,
  `SENDER_MESSAGE` int(11) NOT NULL,
  `RECEIVER_MESSAGE` int(11) NOT NULL,
  `ID_TYPE_MESSAGE` int(11) NOT NULL,
  `DATE_MESSAGE` date NOT NULL,
  `TIME_MESSAGE` time(0) NOT NULL,
  `STATE_MESSAGE` tinyint(1) NOT NULL,
  `TITTLE_MESSAGE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CONTAINER_MESSAGE` varchar(750) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IMAGE_MESSAGE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_MESSAGE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_55`(`SENDER_MESSAGE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_79`(`RECEIVER_MESSAGE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_99`(`ID_TYPE_MESSAGE`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_55` FOREIGN KEY (`SENDER_MESSAGE`) REFERENCES `user_hotel` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_79` FOREIGN KEY (`RECEIVER_MESSAGE`) REFERENCES `user_hotel` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_99` FOREIGN KEY (`ID_TYPE_MESSAGE`) REFERENCES `type_message` (`ID_TYPE_MESSAGE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 651 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for occupation
-- ----------------------------
DROP TABLE IF EXISTS `occupation`;
CREATE TABLE `occupation`  (
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONSUME_SERVICE`, `ID_ROOM`) USING BTREE,
  INDEX `FK_RELATIONSHIP_113`(`ID_ROOM`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_113` FOREIGN KEY (`ID_ROOM`) REFERENCES `room` (`ID_ROOM`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_116` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of occupation
-- ----------------------------
INSERT INTO `occupation` VALUES (2, 2);
INSERT INTO `occupation` VALUES (3, 3);
INSERT INTO `occupation` VALUES (6, 4);
INSERT INTO `occupation` VALUES (7, 4);
INSERT INTO `occupation` VALUES (10, 1);
INSERT INTO `occupation` VALUES (11, 3);
INSERT INTO `occupation` VALUES (15, 1);
INSERT INTO `occupation` VALUES (18, 1);
INSERT INTO `occupation` VALUES (23, 1);
INSERT INTO `occupation` VALUES (27, 10);

-- ----------------------------
-- Table structure for offer
-- ----------------------------
DROP TABLE IF EXISTS `offer`;
CREATE TABLE `offer`  (
  `ID_OFFER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SERVICE` int(11) NOT NULL,
  `DATE_INI_OFFER` date NOT NULL,
  `TIME_INI_OFFER` time(0) NOT NULL,
  `DATE_FIN_OFFER` date NOT NULL,
  `TIME_FIN_OFFER` time(0) NOT NULL,
  `ACTIVE_OFFER` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_OFFER`) USING BTREE,
  INDEX `FK_RELATIONSHIP_74`(`ID_SERVICE`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_74` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of offer
-- ----------------------------
INSERT INTO `offer` VALUES (1, 8, '2018-10-15', '00:00:00', '2018-12-31', '23:59:59', 1);
INSERT INTO `offer` VALUES (2, 9, '2018-11-15', '00:00:00', '2018-12-20', '23:59:59', 1);
INSERT INTO `offer` VALUES (3, 10, '2018-10-15', '00:00:00', '2018-11-20', '23:59:59', 1);
INSERT INTO `offer` VALUES (4, 11, '2018-10-01', '00:00:00', '2018-12-31', '23:59:59', 1);

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person`  (
  `ID_PERSON` int(7) NOT NULL AUTO_INCREMENT,
  `NAME_PERSON` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LAST_NAME_PERSON` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LAST_NAME_PERSON2` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SEX_PERSON` tinyint(1) NOT NULL,
  `DATE_BORN_PERSON` date NOT NULL,
  `EMAIL_PERSON` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CITY_PERSON` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `COUNTRY_PERSON` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADDRESS_PERSON` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_REGISTER_PERSON` date NOT NULL,
  `IMAGE_PROFILE` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `POINT_PERSON` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERSON`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 114 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES (1, 'admin', 'administrador', '', 1, '2017-06-17', 'admin@gmail.com', 'Cochabamba', 'Bolivia', 'Mimar Mehmet Aga Cad. Amiral Tafdil Sok. No:23 | Sultanahmet, Fatih, Estambul 34400, TurquÃ­a', '2017-06-17', 'img/profile/20171015181413.jpg', 0);
INSERT INTO `person` VALUES (2, 'recepcion', 'recepcion', '', 0, '1997-06-01', 'recepcion@gmail.com', 'Cochabamba', 'Bolivia', 'avenida siempre viva calle Nro5356', '2017-06-17', 'img/perfil/20170617234632.jpg', 0);
INSERT INTO `person` VALUES (3, 'cliente', 'apellido', '', 0, '2017-06-17', 'cliente@gmail.com', 'Cochabamba', 'Argentina', 'urbanuzacion el buen lugar', '2017-06-17', 'img/profile/20171013130137.jpg', 65696000);
INSERT INTO `person` VALUES (4, 'servicio', 'servicio', '', 0, '2007-10-03', 'servicio@gmail.com', '', 'Bahamas', 'Av. siempre viva', '2017-10-17', '', 0);
INSERT INTO `person` VALUES (5, 'cocinero', 'peralta', '', 1, '2007-10-02', 'pepe@gmail.com', 'City', 'Chile', 'la paz', '2017-10-17', 'img/profile/20171017121612.jpg', 0);
INSERT INTO `person` VALUES (6, 'Juan', 'Roman Gallardo', '', 1, '2007-10-02', 'bernarda@gmail.com', 'Cbba', 'Peru', 'Circunvaacion', '2017-10-17', 'img/profile/20171017121828.jpg', 0);
INSERT INTO `person` VALUES (7, 'Jose Luis', 'Madrid Miranda', '', 1, '2018-05-15', 'email@gmail.com', 'city', 'Albania', 'address', '2018-05-15', '', 40);
INSERT INTO `person` VALUES (8, 'Manuel', 'mamani mamani', '', 1, '2008-05-01', 'mamanuel@gmail.com', '', 'Albania', 'av. siempre viva', '2018-05-15', '', 0);
INSERT INTO `person` VALUES (9, 'Jose', 'Sanhez Rodriguez', '', 1, '2018-05-15', 'manuel1@gmail.com', 'hjghhjgjh', 'American Samoa', 'gfgggg', '2018-05-15', '', 70);
INSERT INTO `person` VALUES (10, 'Francisco', 'Rey Fernandez', '', 1, '2008-05-01', 'cocina@gmail.com', 'cbba', 'Bhutan', 'av siempre viva', '2018-05-20', 'img/profile/20180520002410.jpg', 0);
INSERT INTO `person` VALUES (11, 'Guadalupe', 'Fernandez Sanchez', '', 0, '2018-01-01', 'luis@gmail.com', '', '', '', '2018-05-20', '', 0);
INSERT INTO `person` VALUES (12, 'Maria', 'Pardo Perez', '', 0, '2008-05-08', 'mariap@gmail.com', 'city', 'Aland Islands', 'av siempre viva', '2018-05-20', 'img/profile/20180520014314.jpg', 0);
INSERT INTO `person` VALUES (13, 'JUAN', 'Garcia Morrell', '', 1, '2008-05-08', 'juan_garcia_morrell@gmail.com', 'Tokio', 'Japón', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (14, 'JOSÃ‰ LUIS', ' Lopez Garcia sanchez', '', 1, '2015-10-10', 'jose_luis_lopez_garcia_sanchez@gmail.com', 'Nueva York', 'Afghanistan', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (15, 'Jose Perez', 'Garcia fernandez', '', 1, '2015-10-10', 'jose_perez_garcia_fernandez@gmail.com', 'Los Ãngeles', 'Afghanistan', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (16, 'MARÃA GUADALUPE', ' Gonzalez Delgado', '', 0, '2015-10-10', 'maria_guadalupe_gonzalez_delgado@gmail.com', 'SeÃºl', 'Afghanistan', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (17, 'FRANCISCO', ' Sanchez Mendez', '', 1, '2008-05-08', 'francisco_sanchez_mendez@gmail.com', 'Londres', 'Reino Unido', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (18, 'GUADALUPE', ' Martinez Castillo', '', 1, '2008-05-08', 'guadalupe_martinez_castillo@gmail.com', 'París', 'Francia', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (19, 'MARÃAA', 'Rodriguez Garcia gonzalez', '', 1, '2008-05-08', 'maria_rodriguez_garcia_gonzalez@gmail.com', 'Osaka', 'Japón Japón', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (20, 'JUANA', ' Fernandez Marquez', '', 1, '2008-05-08', 'juana_fernandez_marquez@gmail.com', 'Shanghái', 'la República Popular China', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (21, 'ANTONIO', ' Gomez Martinez garcia', '', 1, '2008-05-08', 'antonio_gomez_martinez_garcia@gmail.com', 'Chicago', 'Estados Unidos', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (22, 'JESÚS', ' Martin Fernandez garcia', '', 1, '2008-05-08', 'jesus_martin_fernandez_garcia@gmail.com', 'Moscú', 'Rusia Rusia', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (23, 'MIGUEL ÃANGEL', 'Garcia garcia Cruz', '', 1, '2008-05-08', 'miguel_angel_garcia_garcia_cruz@gmail.com', 'Pekín', 'la República Popular China', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (24, 'PEDRO', ' Hernandez Martin martin', '', 1, '2008-05-08', 'pedro_hernandez_martin_martin@gmail.com', 'Colonia', 'Alemania Alemania', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (25, 'ALEJANDRO', 'Ruiz Gonzalez garcia', '', 1, '2008-05-08', 'alejandro_ruiz_gonzalez_garcia@gmail.com', 'Houston', 'Estados Unidos', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (26, 'MANUEL', 'Diaz Medina', '', 1, '2008-05-08', 'manuel_diaz_medina@gmail.com', 'Washington D. C.', 'Estados Unidos', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (27, 'MARGARITA', ' Alvarez Lopez perez', '', 0, '2008-05-08', 'margarita_alvarez_lopez_perez@gmail.com', 'São Paulo', 'Brasil', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (28, 'MARIA DEL CARMEN', 'Jimenez Herrera', '', 0, '2015-10-10', 'maria_del_carmen_jimenez_herrera@gmail.com', 'Hong Kong', 'Afghanistan', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (29, 'JUAN CARLOS', 'Lopez Sanchez garcia', '', 1, '2008-05-08', 'juan_carlos_lopez_lopez_sanchez_garcia@gmail.com', 'Dallas', 'Estados Unidos', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (30, 'ROBERTO', ' Moreno Marin', '', 1, '2008-05-08', 'roberto_moreno_marin@gmail.com', 'Ciudad de México', 'México México', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (31, 'FERNANDO', 'Perez Rodriguez rodriguez', '', 1, '2008-05-08', 'fernando_perez_perez_rodriguez_rodriguez@gmail.com', 'Cantón', 'la República Popular China', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (32, 'DANIEL', 'Munoz Nunez', '', 1, '2008-05-08', 'daniel_munoz_nunez@gmail.com', 'Tianjin', 'la República Popular China', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (33, 'CARLOS', 'Alonso Sanchez lopez', '', 1, '2008-05-08', 'carlos_alonso_sanchez_lopez@gmail.com', 'Singapur', 'Singapur Singapur', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (34, 'JORGE', ' Gutierrez Vega', '', 1, '2008-05-08', 'jorge_gutierrez_vega@gmail.com', 'Nagoya', 'Japón Japón', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (35, 'RICARDO', ' Romero Iglesias', '', 1, '2008-05-08', 'ricardo_romero_iglesias@gmail.com', 'Shenzhen', 'la República Popular China', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (36, 'MIGUEL', 'Sanz Gomez gomez', '', 1, '2008-05-08', 'miguel_sanz_gomez_gomez@gmail.com', 'Boston', 'Estados Unidos', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (37, 'EDUARDO', ' Torres Rojas', '', 1, '2008-05-08', 'eduardo_torres_rojas@gmail.com', 'Estambul', 'Turquía Turquía', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (38, 'JAVIER', 'Suarez Reyes', '', 1, '2008-05-08', 'javier_suarez_reyes@gmail.com', 'Filadelfia', 'Estados Unidos', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (39, 'RAFAEL', 'Ramirez Luna', '', 1, '2008-05-08', 'rafael_ramirez_luna@gmail.com', 'Suzhou', 'la República Popular China', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (40, 'MARTÍN', 'Vazquez Campos', '', 1, '2008-05-08', 'martin_vazquez_campos@gmail.com', 'San Francisco', 'Estados Unidos', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (41, 'RAÚL', 'Navarro Martinez lopez', '', 1, '2008-05-08', 'raul_navarro_martinez_lopez@gmail.com', 'Taipei', 'Taiwán Taiwán', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (42, 'DAVID', ' Lopez garcia Rubio', '', 1, '2008-05-08', 'david_lopez_garcia_rubio@gmail.com', 'Yakarta', 'Indonesia Indonesia', '', '2015-10-10', '', 0);
INSERT INTO `person` VALUES (43, 'JOSEFINA', 'Dominguez Garcia martinez', '', 1, '1990-01-13', 'josefina_dominguez_garcia_martinez@gmail.com', 'Ámsterdam', 'los Países Bajos Países Bajos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (44, 'JOSÉ ANTONIO', ' Ramos Pena', '', 1, '1990-01-13', 'jose_antonio_ramos_pena@gmail.com', 'Buenos Aires', 'Argentina Argentina', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (45, 'ARTURO', 'Garcia lopez Gonzalez perez', '', 1, '1990-01-13', 'arturo_garcia_lopez_gonzalez_perez@gmail.com', 'Chongqing', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (46, 'MARCO ANTONIO', 'Garcia perez Ferrer', '', 1, '1990-01-13', 'marco_antonio_garcia_perez_ferrer@gmail.com', 'Milán', 'Italia Italia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (47, 'JOSÉ MANUEL', ' Castro Lozano', '', 1, '1990-01-13', 'jose_manuel_castro_lozano@gmail.com', 'Bangkok', 'Tailandia Tailandia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (48, 'FRANCISCO JAVIER', 'Gil Garrido', '', 1, '1990-01-13', 'francisco_javier_gil_garrido@gmail.com', 'Busan', 'Corea del Sur Corea del Sur', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (49, 'ENRIQUE', ' Flores Rodriguez garcia', '', 1, '1990-01-13', 'enrique_flores_rodriguez_garcia@gmail.com', 'Atlanta', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (50, 'VERÓNICA', 'Morales Leon', '', 0, '1990-01-13', 'veronica_morales_leon@gmail.com', 'Delhi', 'India India', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (51, 'GERARDO', ' Blanco Aguilar', '', 1, '1990-01-13', 'gerardo_blanco_aguilar@gmail.com', 'Toronto', 'Canadá Canadá', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (52, 'MARÍA ELENA', 'Sanchez Garcia rodriguez', '', 0, '1990-01-13', 'maria_elena_sanchez_garcia_rodriguez@gmail.com', 'Seattle', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (53, 'LETICIA', 'Fernandez Sanchez perez', '', 0, '1990-01-13', 'leticia_fernandez_sanchez_perez@gmail.com', 'Miami', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (54, 'ROSA', 'Serrano Cano', '', 0, '1990-01-13', 'rosa_serrano_cano@gmail.com', 'Madrid', 'España España', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (55, 'MARIO', ' Molina Gonzalez fernandez', '', 1, '1990-01-13', 'mario_molina_gonzalez_fernandez@gmail.com', 'Bruselas', 'Bélgica Bélgica', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (56, 'FRANCISCA', 'Martinez martinez Arias', '', 0, '1990-01-13', 'francisca_martinez_martinez_arias@gmail.com', 'Chengdu', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (57, 'ALFREDO', ' Ortiz Perez gonzalez', '', 1, '1990-01-13', 'alfredo_ortiz_perez_gonzalez@gmail.com', 'Wuhan', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (58, 'TERESA', 'Perez lopez Rodriguez lopez', '', 0, '1990-01-13', 'teresa_perez_lopez_rodriguez_lopez@gmail.com', 'Frankfurt', 'Alemania Alemania', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (59, 'ALICIA', 'Gonzalez gonzalez Herrero', '', 0, '1990-01-13', 'alicia_gonzalez_gonzalez_herrero@gmail.com', 'Sídney', 'Australia Australia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (60, 'MARÍA FERNANDA', 'Santos Gimenez', '', 0, '1990-01-13', 'maria_fernanda_santos_gimenez@gmail.com', 'Múnich', 'Alemania Alemania', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (61, 'SERGIO', 'Perez garcia Fuentes', '', 1, '1990-01-13', 'sergio_perez_garcia_fuentes@gmail.com', 'Hangzhou', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (62, 'ALBERTO', ' Ortega Vidal', '', 1, '1990-01-13', 'alberto_ortega_vidal@gmail.com', 'Wuxi', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (63, 'LUIS', 'Prieto', '', 1, '1990-01-13', 'luis_prieto@gmail.com', 'Minneapolis', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (64, 'ARMANDO', 'Guerrero', '', 1, '1990-01-13', 'armando_guerrero@gmail.com', 'Qingdao', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (65, 'ALEJANDRA', 'Montero', '', 0, '1990-01-13', 'alejandra_montero@gmail.com', 'Rio de Janeiro', 'Brasil', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (66, 'MARTHA', 'Cortes', '', 0, '1990-01-13', 'martha_cortes@gmail.com', 'Phoenix', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (67, 'SANTIAGO', ' Ruiz ruiz', '', 1, '1990-01-13', 'santiago_ruiz_ruiz@gmail.com', 'Nanjing', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (68, 'YOLANDA', ' Santana', '', 0, '1990-01-13', 'yolanda_santana@gmail.com', 'San Diego', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (69, 'PATRICIA', 'Soto', '', 0, '1990-01-13', 'patricia_soto@gmail.com', 'Dalian', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (70, 'MARÍA DE LOS ÁNGELES', 'Vargas', '', 0, '1990-01-13', 'maria_de_los_angeles_vargas@gmail.com', 'Fukuoka', 'Japón Japón', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (71, 'JUAN MANUEL', 'Fernandez lopez', '', 1, '1990-01-13', 'juan_manuel_fernandez_lopez@gmail.com', 'Shenyang', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (72, 'ROSA MARÍA', 'Lopez fernandez', '', 0, '1990-01-13', 'rosa_maria_lopez_fernandez@gmail.com', 'Changsha', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (73, 'ELIZABETH', 'Mendoza', '', 0, '1990-01-13', 'elizabeth_mendoza@gmail.com', 'Foshan', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (74, 'GLORIA', 'Lopez sanchez', '', 0, '1990-01-13', 'gloria_lopez_sanchez@gmail.com', 'Viena', 'Austria Austria', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (75, 'ÁNGEL', ' Martinez perez', '', 1, '1990-01-13', 'angel_martinez_perez@gmail.com', 'Manila', 'Filipinas Filipinas', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (76, 'GABRIELA', 'Perez sanchez', '', 0, '1990-01-13', 'gabriela_perez_sanchez@gmail.com', 'Lima', ' Perú Perú', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (77, 'SALVADOR', ' Lopez martinez', '', 1, '1990-01-13', 'salvador_lopez_martinez@gmail.com', 'Melbourne', 'Australia Australia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (78, 'VÍCTOR', 'MANUEL Guzman', '', 1, '1990-01-13', 'victor_manuel_guzman@gmail.com', 'Abu Dhabi', 'Emiratos Árabes Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (79, 'SILVIA', ' Saez', '', 0, '1990-01-13', 'silvia_saez@gmail.com', 'Detroit', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (80, 'MARÍA DE GUADALUPE', ' Rios', '', 0, '1990-01-13', 'maria_de_guadalupe_rios@gmail.com', 'Ningbo', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (81, 'MARÍA DE JESÚS', 'Carrasco', '', 0, '1990-01-13', 'maria_de_jesus_carrasco@gmail.com', 'Baltimore', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (82, 'GABRIEL', ' Duran', '', 1, '1990-01-13', 'gabriel_duran@gmail.com', 'Kuala Lumpur', 'Malasia Malasia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (83, 'ANDRÉS', 'Rodriguez perez', '', 1, '1990-01-13', 'andres_rodriguez_perez@gmail.com', 'Santiago de Chile', 'Chile', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (84, 'ÓSCAR', ' Garcia gomez', '', 1, '1990-01-13', 'oscar_garcia_gomez@gmail.com', 'Barcelona', 'España España', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (85, 'GUILLERMO', 'Cabrera', '', 1, '1990-01-13', 'guillermo_cabrera@gmail.com', 'Denver', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (86, 'ANA MARÍA', ' Lopez gonzalez', '', 0, '1990-01-13', 'ana_maria_lopez_gonzalez@gmail.com', 'Kuwait', 'Flag of Kuwait.svg Kuwait', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (87, 'RAMÓN', ' Martin garcia', '', 1, '1990-01-13', 'ramon_martin_garcia@gmail.com', 'Riad', 'Arabia Saudita Arabia Saudita', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (88, 'MARÍA ISABEL', ' Salazar', '', 0, '1990-01-13', 'maria_isabel_salazar@gmail.com', 'Roma', 'Italia Italia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (89, 'PABLO', 'Rivera', '', 1, '1990-01-13', 'pablo_rivera@gmail.com', 'Tangshan', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (90, 'RUBEN', ' Garcia martin', '', 1, '1990-01-13', 'ruben_garcia_martin@gmail.com', 'Hamburgo', 'Alemania Alemania', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (91, 'ANTONIA', ' Lorenzo', '', 0, '1990-01-13', 'antonia_lorenzo@gmail.com', 'Jeddah', 'Arabia Saudita Arabia Saudita', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (92, 'MARÍA LUISA', ' Perez martinez', '', 0, '1990-01-13', 'maria_luisa_perez_martinez@gmail.com', 'San José', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (93, 'LUIS ÁNGEL', 'Gracia', '', 1, '1990-01-13', 'luis_angel_gracia@gmail.com', 'Bogotá', 'Colombia Colombia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (94, 'MARÍA DEL ROSARIO', 'Caballero', '', 0, '1990-01-13', 'maria_del_rosario_caballero@gmail.com', 'Portland', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (95, 'FELIPE', 'Robles', '', 1, '1990-01-13', 'felipe_robles@gmail.com', 'Stuttgart', 'Alemania Alemania', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (96, 'JORGE JESÚS', 'Mora', '', 1, '1990-01-13', 'jorge_jesus_mora@gmail.com', 'Berlín', 'Alemania Alemania', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (97, 'JAIME Perez', ' gomez', '', 1, '1990-01-13', 'jaime_perez_gomez@gmail.com', 'Zhengzhou', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (98, 'JOSÉ GUADALUPE', 'Gonzales', '', 1, '1990-01-13', 'jose_guadalupe_gonzales@gmail.com', 'Montreal', 'Canadá Canadá', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (99, 'JULIO CESAR', ' Perez rodriguez', '', 1, '1990-01-13', 'julio_cesar_perez_rodriguez@gmail.com', 'Riverside', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (100, 'JOSÉ DE JESÚS', ' Hidalgo', '', 1, '1990-01-13', 'jose_de_jesus_hidalgo@gmail.com', 'Tel Aviv', 'Israel Israel', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (101, 'DIEGO', ' Calvo', '', 1, '1990-01-13', 'diego_calvo@gmail.com', 'Mumbai', 'India India', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (102, 'ARACELI', ' Fernandez gonzalez', '', 1, '1990-01-13', 'araceli_fernandez_gonzalez@gmail.com', 'Yantai', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (103, 'ANDREA', 'Fernandez rodriguez', '', 0, '1990-01-13', 'andrea_fernandez_rodriguez@gmail.com', 'Estocolmo', 'Suecia Suecia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (104, 'ISABEL', 'Merino', '', 0, '1990-01-13', 'isabel_merino@gmail.com', 'Brasilia', 'Brasil', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (105, 'MARÍA TERESA', ' Martinez sanchez', '', 0, '1990-01-13', 'maria_teresa_martinez_sanchez@gmail.com', 'Caracas', 'Venezuela Venezuela', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (106, 'IRMA', 'Pascual', '', 0, '1990-01-13', 'irma_pascual@gmail.com', 'Dongguan', 'la República Popular China', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (107, 'CARMEN', ' Gallego', '', 0, '1990-01-13', 'carmen_gallego@gmail.com', 'Varsovia', 'Polonia Polonia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (108, 'LUCÍA', ' Marti', '', 0, '1990-01-13', 'lucia_marti@gmail.com', 'San Luis', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (109, 'ADRIANA', ' Rodriguez fernandez', '', 0, '1990-01-13', 'adriana_rodriguez_fernandez@gmail.com', 'Pittsburgh', 'Estados Unidos', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (110, 'AGUSTÍN', ' Gonzalez lopez', '', 1, '1990-01-13', 'agustin_gonzalez_lopez@gmail.com', 'Karlsruhe', 'Alemania Alemania', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (111, 'MARÃA DE LA LUZ', ' Gomez perez', '', 0, '2017-09-10', 'maria_de_la_luz_gomez_perez@gmail.com', 'Jinan', 'Afghanistan', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (112, 'GUSTAVO', ' Ventura', '', 1, '1990-01-13', 'gustavo_ventura@gmail.com', 'Perth', 'Australia Australia', '', '2017-09-10', '', 0);
INSERT INTO `person` VALUES (113, 'Mario', 'Garnica Cruz', '', 1, '1990-01-13', 'mariogarnica@gmail.com', 'Shijiazhuang', 'la República Popular China', '', '2017-09-10', '', 0);

-- ----------------------------
-- Table structure for person_document
-- ----------------------------
DROP TABLE IF EXISTS `person_document`;
CREATE TABLE `person_document`  (
  `NUMBER_DOCUMENT` decimal(25, 0) NOT NULL,
  `ID_TYPE_DOCUMENT` int(11) NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `DATE_REGISTER_DOCUMENT` date NOT NULL,
  `TIME_REGISTER_DOCUMENT` time(0) NOT NULL,
  PRIMARY KEY (`NUMBER_DOCUMENT`) USING BTREE,
  INDEX `FK_RELATIONSHIP_3`(`ID_TYPE_DOCUMENT`) USING BTREE,
  INDEX `FK_TIENE`(`ID_PERSON`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_TYPE_DOCUMENT`) REFERENCES `type_document` (`ID_TYPE_DOCUMENT`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_TIENE` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of person_document
-- ----------------------------
INSERT INTO `person_document` VALUES (11232454746, 4, 25, '2018-05-20', '14:18:57');
INSERT INTO `person_document` VALUES (11235456765, 3, 32, '2018-05-20', '14:31:48');
INSERT INTO `person_document` VALUES (11235645754, 4, 29, '2018-05-15', '13:44:43');
INSERT INTO `person_document` VALUES (11236454755, 4, 24, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (11236454765, 2, 23, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (11237469755, 1, 30, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (13245445134, 4, 97, '2018-05-15', '13:44:43');
INSERT INTO `person_document` VALUES (13245645454, 4, 12, '2018-05-15', '13:44:43');
INSERT INTO `person_document` VALUES (13456454015, 2, 91, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (13456454565, 2, 6, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (13457469005, 1, 98, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (13457469655, 1, 13, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (14546454135, 4, 92, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (14546454555, 4, 7, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (15465456145, 3, 100, '2018-05-20', '14:31:48');
INSERT INTO `person_document` VALUES (15465456465, 3, 15, '2018-09-15', '15:37:26');
INSERT INTO `person_document` VALUES (16532454146, 4, 93, '2018-05-20', '14:18:57');
INSERT INTO `person_document` VALUES (16532454546, 4, 8, '2018-05-20', '14:18:57');
INSERT INTO `person_document` VALUES (19856445144, 1, 111, '2018-09-15', '16:01:31');
INSERT INTO `person_document` VALUES (19856454043, 2, 105, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (19856454118, 4, 107, '2018-05-20', '14:18:57');
INSERT INTO `person_document` VALUES (19856454138, 4, 106, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (19856469024, 1, 112, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (21764455555, 1, 69, '2017-10-17', '12:16:13');
INSERT INTO `person_document` VALUES (21764555465, 1, 77, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (21764656959, 4, 84, '2017-10-17', '12:06:30');
INSERT INTO `person_document` VALUES (21765446554, 1, 73, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (21766846888, 2, 82, '2017-10-17', '12:14:50');
INSERT INTO `person_document` VALUES (21769585988, 3, 79, '2017-10-17', '12:18:28');
INSERT INTO `person_document` VALUES (21861145511, 3, 71, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (21863254546, 4, 76, '2018-05-20', '14:18:57');
INSERT INTO `person_document` VALUES (21864444194, 1, 85, '2018-06-04', '19:55:11');
INSERT INTO `person_document` VALUES (21864545454, 4, 80, '2018-05-15', '13:44:43');
INSERT INTO `person_document` VALUES (21864654555, 4, 75, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (21865445681, 2, 70, '2018-05-15', '14:45:47');
INSERT INTO `person_document` VALUES (21865464656, 4, 72, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (21865554545, 2, 78, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (21865654565, 2, 74, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (21865769655, 1, 81, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (21866556465, 3, 83, '2018-05-20', '14:31:48');
INSERT INTO `person_document` VALUES (31235455765, 1, 26, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (31645455105, 1, 94, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (31645455465, 1, 9, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (39856455123, 1, 108, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (41231545711, 3, 20, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (41233244744, 1, 34, '2018-06-04', '19:55:11');
INSERT INTO `person_document` VALUES (41234545781, 2, 19, '2018-05-15', '14:45:47');
INSERT INTO `person_document` VALUES (41234546754, 1, 22, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (41234555755, 1, 18, '2017-10-17', '12:16:13');
INSERT INTO `person_document` VALUES (41234564756, 4, 21, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (41235454745, 2, 27, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (41235485788, 3, 28, '2018-09-15', '16:07:39');
INSERT INTO `person_document` VALUES (41236456759, 4, 33, '2017-10-17', '12:06:30');
INSERT INTO `person_document` VALUES (44111445141, 3, 88, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (44111545511, 3, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (44544455125, 1, 86, '2017-10-17', '12:16:13');
INSERT INTO `person_document` VALUES (44544555555, 1, 1, '2017-10-17', '12:16:13');
INSERT INTO `person_document` VALUES (44554445141, 2, 87, '2018-05-15', '14:45:47');
INSERT INTO `person_document` VALUES (44554464226, 4, 89, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (44554545681, 2, 2, '2018-05-15', '14:45:47');
INSERT INTO `person_document` VALUES (44554564656, 4, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (45455454195, 2, 95, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (45455454545, 2, 10, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (45543244444, 1, 17, '2018-06-04', '19:55:11');
INSERT INTO `person_document` VALUES (45695485128, 3, 96, '2017-10-17', '12:18:28');
INSERT INTO `person_document` VALUES (45695485988, 3, 11, '2017-10-17', '12:18:28');
INSERT INTO `person_document` VALUES (46454446124, 1, 90, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (46454546554, 1, 5, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (46546456129, 4, 101, '2017-10-17', '12:06:30');
INSERT INTO `person_document` VALUES (46546456959, 1, 16, '2018-09-15', '16:00:54');
INSERT INTO `person_document` VALUES (49856445133, 3, 102, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (49856446120, 1, 104, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (49856454134, 2, 109, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (49856464228, 4, 103, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (49856485118, 3, 110, '2017-10-17', '12:18:28');
INSERT INTO `person_document` VALUES (51665235465, 1, 60, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (53265445454, 4, 63, '2018-05-15', '13:44:43');
INSERT INTO `person_document` VALUES (53466434565, 2, 57, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (53467249655, 1, 64, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (54161335511, 3, 54, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (54564165555, 1, 52, '2017-10-17', '12:16:13');
INSERT INTO `person_document` VALUES (54564284656, 4, 55, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (54564455681, 2, 53, '2018-05-15', '14:45:47');
INSERT INTO `person_document` VALUES (54566384555, 4, 58, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (55465316465, 3, 66, '2018-05-20', '14:31:48');
INSERT INTO `person_document` VALUES (55465344545, 2, 61, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (55468146888, 2, 65, '2017-10-17', '12:14:50');
INSERT INTO `person_document` VALUES (55563554444, 1, 68, '2018-06-04', '19:55:11');
INSERT INTO `person_document` VALUES (55665185988, 3, 62, '2017-10-17', '12:18:28');
INSERT INTO `person_document` VALUES (56464206554, 1, 56, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (56562184546, 4, 59, '2018-05-20', '14:18:57');
INSERT INTO `person_document` VALUES (56566066959, 4, 67, '2017-10-17', '12:06:30');
INSERT INTO `person_document` VALUES (61238946788, 2, 31, '2017-10-17', '12:14:50');
INSERT INTO `person_document` VALUES (65468446128, 2, 99, '2017-10-17', '12:14:50');
INSERT INTO `person_document` VALUES (65468946888, 2, 14, '2018-09-15', '15:31:40');
INSERT INTO `person_document` VALUES (69856446114, 2, 113, '2017-10-17', '12:14:50');
INSERT INTO `person_document` VALUES (71684759465, 1, 43, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (73284349454, 4, 46, '2018-05-15', '13:44:43');
INSERT INTO `person_document` VALUES (73481069655, 1, 47, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (73481459565, 2, 40, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (74183149511, 3, 37, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (74581359555, 1, 35, '2017-10-17', '12:16:13');
INSERT INTO `person_document` VALUES (74581959555, 4, 41, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (74584749681, 2, 36, '2018-05-15', '14:45:47');
INSERT INTO `person_document` VALUES (74585869656, 4, 38, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (75481359545, 2, 44, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (75484859465, 3, 49, '2018-05-20', '14:31:48');
INSERT INTO `person_document` VALUES (75485049888, 2, 48, '2017-10-17', '12:14:50');
INSERT INTO `person_document` VALUES (75581149444, 1, 51, '2018-06-04', '19:55:11');
INSERT INTO `person_document` VALUES (75682889988, 3, 45, '2017-10-17', '12:18:28');
INSERT INTO `person_document` VALUES (76480249554, 1, 39, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (76583059959, 4, 50, '2017-10-17', '12:06:30');
INSERT INTO `person_document` VALUES (76585759546, 4, 42, '2018-05-20', '14:18:57');

-- ----------------------------
-- Table structure for person_phone
-- ----------------------------
DROP TABLE IF EXISTS `person_phone`;
CREATE TABLE `person_phone`  (
  `NUMBER_PHONE` decimal(10, 0) NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `ID_TYPE_PHONE` int(11) NOT NULL,
  `DATE_REGISTER_PHONE` date NOT NULL,
  `TIME_REGISTER_PHONE` time(0) NOT NULL,
  PRIMARY KEY (`NUMBER_PHONE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_126`(`ID_TYPE_PHONE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_62`(`ID_PERSON`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_126` FOREIGN KEY (`ID_TYPE_PHONE`) REFERENCES `type_phone` (`ID_TYPE_PHONE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_62` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of person_phone
-- ----------------------------
INSERT INTO `person_phone` VALUES (7111445141, 88, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_phone` VALUES (7111545511, 3, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_phone` VALUES (7161335511, 54, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_phone` VALUES (7183149511, 37, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_phone` VALUES (7231545711, 20, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_phone` VALUES (7232454746, 25, 4, '2018-05-20', '14:18:57');
INSERT INTO `person_phone` VALUES (7233244744, 34, 1, '2018-06-04', '19:55:11');
INSERT INTO `person_phone` VALUES (7234545781, 19, 2, '2018-05-15', '14:45:47');
INSERT INTO `person_phone` VALUES (7234546754, 22, 1, '2017-10-17', '12:20:02');
INSERT INTO `person_phone` VALUES (7234555755, 18, 1, '2017-10-17', '12:16:13');
INSERT INTO `person_phone` VALUES (7234564756, 21, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (7235454745, 27, 2, '2018-08-26', '19:34:13');
INSERT INTO `person_phone` VALUES (7235455765, 26, 1, '2017-10-17', '10:23:47');
INSERT INTO `person_phone` VALUES (7235456765, 32, 3, '2018-05-20', '14:31:48');
INSERT INTO `person_phone` VALUES (7235485788, 28, 3, '2018-09-15', '16:07:40');
INSERT INTO `person_phone` VALUES (7235645754, 29, 4, '2018-05-15', '13:44:43');
INSERT INTO `person_phone` VALUES (7236454755, 24, 4, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (7236454765, 23, 2, '2018-05-20', '01:43:14');
INSERT INTO `person_phone` VALUES (7236456759, 33, 4, '2017-10-17', '12:06:30');
INSERT INTO `person_phone` VALUES (7237469755, 30, 1, '2018-05-20', '00:24:10');
INSERT INTO `person_phone` VALUES (7238946788, 31, 2, '2017-10-17', '12:14:50');
INSERT INTO `person_phone` VALUES (7245445134, 97, 4, '2018-05-15', '13:44:43');
INSERT INTO `person_phone` VALUES (7245645454, 12, 4, '2018-05-15', '13:44:43');
INSERT INTO `person_phone` VALUES (7265445454, 63, 4, '2018-05-15', '13:44:43');
INSERT INTO `person_phone` VALUES (7284349454, 46, 4, '2018-05-15', '13:44:43');
INSERT INTO `person_phone` VALUES (7454446124, 90, 1, '2017-10-17', '12:20:02');
INSERT INTO `person_phone` VALUES (7454546554, 5, 1, '2017-10-17', '12:20:02');
INSERT INTO `person_phone` VALUES (7455454195, 95, 2, '2018-08-26', '19:34:13');
INSERT INTO `person_phone` VALUES (7455454545, 10, 2, '2018-08-26', '19:34:13');
INSERT INTO `person_phone` VALUES (7456454015, 91, 2, '2018-05-20', '01:43:14');
INSERT INTO `person_phone` VALUES (7456454565, 6, 2, '2018-05-20', '01:43:14');
INSERT INTO `person_phone` VALUES (7457469005, 98, 1, '2018-05-20', '00:24:10');
INSERT INTO `person_phone` VALUES (7457469655, 13, 1, '2018-05-20', '00:24:10');
INSERT INTO `person_phone` VALUES (7464206554, 56, 1, '2017-10-17', '12:20:02');
INSERT INTO `person_phone` VALUES (7465316465, 66, 3, '2018-05-20', '14:31:48');
INSERT INTO `person_phone` VALUES (7465344545, 61, 2, '2018-08-26', '19:34:13');
INSERT INTO `person_phone` VALUES (7465456145, 100, 3, '2018-05-20', '14:31:48');
INSERT INTO `person_phone` VALUES (7465456465, 15, 3, '2018-09-15', '15:37:26');
INSERT INTO `person_phone` VALUES (7466434565, 57, 2, '2018-05-20', '01:43:14');
INSERT INTO `person_phone` VALUES (7467249655, 64, 1, '2018-05-20', '00:24:10');
INSERT INTO `person_phone` VALUES (7468146888, 65, 2, '2017-10-17', '12:14:50');
INSERT INTO `person_phone` VALUES (7468446128, 99, 2, '2017-10-17', '12:14:50');
INSERT INTO `person_phone` VALUES (7468946888, 14, 2, '2018-09-15', '15:31:40');
INSERT INTO `person_phone` VALUES (7480249554, 39, 1, '2017-10-17', '12:20:02');
INSERT INTO `person_phone` VALUES (7481069655, 47, 1, '2018-05-20', '00:24:10');
INSERT INTO `person_phone` VALUES (7481359545, 44, 2, '2018-08-26', '19:34:13');
INSERT INTO `person_phone` VALUES (7481459565, 40, 2, '2018-05-20', '01:43:14');
INSERT INTO `person_phone` VALUES (7484859465, 49, 3, '2018-05-20', '14:31:48');
INSERT INTO `person_phone` VALUES (7485049888, 48, 2, '2017-10-17', '12:14:50');
INSERT INTO `person_phone` VALUES (7532454146, 93, 4, '2018-05-20', '14:18:57');
INSERT INTO `person_phone` VALUES (7532454546, 8, 4, '2018-05-20', '14:18:57');
INSERT INTO `person_phone` VALUES (7543244444, 17, 1, '2018-06-04', '19:55:11');
INSERT INTO `person_phone` VALUES (7544455125, 86, 1, '2017-10-17', '12:16:13');
INSERT INTO `person_phone` VALUES (7544555555, 1, 1, '2017-10-17', '12:16:13');
INSERT INTO `person_phone` VALUES (7546454135, 92, 4, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (7546454555, 7, 4, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (7546456129, 101, 4, '2017-10-17', '12:06:30');
INSERT INTO `person_phone` VALUES (7546456959, 16, 4, '2018-09-15', '16:00:54');
INSERT INTO `person_phone` VALUES (7554445141, 87, 2, '2018-05-15', '14:45:47');
INSERT INTO `person_phone` VALUES (7554464226, 89, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (7554545681, 2, 2, '2018-05-15', '14:45:47');
INSERT INTO `person_phone` VALUES (7554564656, 4, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (7562184546, 59, 4, '2018-05-20', '14:18:57');
INSERT INTO `person_phone` VALUES (7563554444, 68, 1, '2018-06-04', '19:55:11');
INSERT INTO `person_phone` VALUES (7564165555, 52, 1, '2017-10-17', '12:16:13');
INSERT INTO `person_phone` VALUES (7564284656, 55, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (7564455681, 53, 2, '2018-05-15', '14:45:47');
INSERT INTO `person_phone` VALUES (7566066959, 67, 4, '2017-10-17', '12:06:30');
INSERT INTO `person_phone` VALUES (7566384555, 58, 4, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (7581149444, 51, 1, '2018-06-04', '19:55:11');
INSERT INTO `person_phone` VALUES (7581359555, 35, 1, '2017-10-17', '12:16:13');
INSERT INTO `person_phone` VALUES (7581959555, 41, 4, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (7583059959, 50, 4, '2017-10-17', '12:06:30');
INSERT INTO `person_phone` VALUES (7584749681, 36, 2, '2018-05-15', '14:45:47');
INSERT INTO `person_phone` VALUES (7585759546, 42, 4, '2018-05-20', '14:18:57');
INSERT INTO `person_phone` VALUES (7585869656, 38, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (7645455105, 94, 1, '2017-10-17', '10:23:47');
INSERT INTO `person_phone` VALUES (7645455465, 9, 1, '2017-10-17', '10:23:47');
INSERT INTO `person_phone` VALUES (7665185988, 62, 3, '2017-10-17', '12:18:28');
INSERT INTO `person_phone` VALUES (7665235465, 60, 1, '2017-10-17', '10:23:47');
INSERT INTO `person_phone` VALUES (7682889988, 45, 3, '2017-10-17', '12:18:28');
INSERT INTO `person_phone` VALUES (7684759465, 43, 1, '2017-10-17', '10:23:47');
INSERT INTO `person_phone` VALUES (7695485128, 96, 3, '2017-10-17', '12:18:28');
INSERT INTO `person_phone` VALUES (7695485988, 11, 3, '2017-10-17', '12:18:28');
INSERT INTO `person_phone` VALUES (7764455555, 69, 1, '2017-10-17', '12:16:13');
INSERT INTO `person_phone` VALUES (7764555465, 77, 1, '2017-10-17', '10:23:47');
INSERT INTO `person_phone` VALUES (7764656959, 84, 4, '2017-10-17', '12:06:30');
INSERT INTO `person_phone` VALUES (7765446554, 73, 1, '2017-10-17', '12:20:02');
INSERT INTO `person_phone` VALUES (7766846888, 82, 2, '2017-10-17', '12:14:50');
INSERT INTO `person_phone` VALUES (7769585988, 79, 3, '2017-10-17', '12:18:28');
INSERT INTO `person_phone` VALUES (7856445133, 102, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_phone` VALUES (7856445144, 111, 4, '2018-09-15', '16:01:31');
INSERT INTO `person_phone` VALUES (7856446114, 113, 2, '2017-10-17', '12:14:50');
INSERT INTO `person_phone` VALUES (7856446120, 104, 1, '2017-10-17', '12:20:02');
INSERT INTO `person_phone` VALUES (7856454043, 105, 2, '2018-05-20', '01:43:14');
INSERT INTO `person_phone` VALUES (7856454118, 107, 4, '2018-05-20', '14:18:57');
INSERT INTO `person_phone` VALUES (7856454134, 109, 2, '2018-08-26', '19:34:13');
INSERT INTO `person_phone` VALUES (7856454138, 106, 4, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (7856455123, 108, 1, '2017-10-17', '10:23:47');
INSERT INTO `person_phone` VALUES (7856464228, 103, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (7856469024, 112, 1, '2018-05-20', '00:24:10');
INSERT INTO `person_phone` VALUES (7856485118, 110, 3, '2017-10-17', '12:18:28');
INSERT INTO `person_phone` VALUES (7861145511, 71, 3, '2018-05-15', '14:33:31');
INSERT INTO `person_phone` VALUES (7863254546, 76, 4, '2018-05-20', '14:18:57');
INSERT INTO `person_phone` VALUES (7864444194, 85, 1, '2018-06-04', '19:55:11');
INSERT INTO `person_phone` VALUES (7864545454, 80, 4, '2018-05-15', '13:44:43');
INSERT INTO `person_phone` VALUES (7864654555, 75, 4, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (7865445681, 70, 2, '2018-05-15', '14:45:47');
INSERT INTO `person_phone` VALUES (7865464656, 72, 4, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (7865554545, 78, 2, '2018-08-26', '19:34:13');
INSERT INTO `person_phone` VALUES (7865654565, 74, 2, '2018-05-20', '01:43:14');
INSERT INTO `person_phone` VALUES (7865769655, 81, 1, '2018-05-20', '00:24:10');
INSERT INTO `person_phone` VALUES (7866556465, 83, 3, '2018-05-20', '14:31:48');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question`  (
  `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INQUEST` int(11) NOT NULL,
  `DESCRIPTION_QUESTION` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ACTIVE_QUESTION` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_QUESTION`) USING BTREE,
  INDEX `FK_RELATIONSHIP_49`(`ID_INQUEST`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_49` FOREIGN KEY (`ID_INQUEST`) REFERENCES `inquest` (`ID_INQUEST`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES (1, 1, 'Â¿Hasta quÃ© edad los niÃ±os no pagan?', 1);
INSERT INTO `question` VALUES (2, 1, 'Â¿La cuenta se puede pagar al llegar?', 1);
INSERT INTO `question` VALUES (3, 1, 'Â¿CuÃ¡les son las tarjetas de crÃ©dito aceptadas?', 1);
INSERT INTO `question` VALUES (4, 1, 'Â¿Las habitaciones tienen aire acondicionado?', 1);
INSERT INTO `question` VALUES (5, 1, 'Â¿El hotel tiene ascensor?', 1);
INSERT INTO `question` VALUES (6, 1, 'Â¿QuÃ© idiomas se hablan en la recepciÃ³n?', 1);
INSERT INTO `question` VALUES (7, 1, 'Â¿CuÃ¡l es el horario del restaurante del hotel?', 1);
INSERT INTO `question` VALUES (8, 1, 'Â¿A partir de quÃ© hora se sirve el desayuno?', 1);
INSERT INTO `question` VALUES (9, 1, 'Â¿CuÃ¡l es el horario de apertura del gimnasio?', 1);
INSERT INTO `question` VALUES (10, 1, 'Â¿CÃ³mo hago para reservar en el sito web? ', 1);
INSERT INTO `question` VALUES (11, 2, 'AtenciÃ³n al realizar su ReservaciÃ³n ', 1);
INSERT INTO `question` VALUES (12, 2, 'AtenciÃ³n al registrarse en el Hotel (Check-in)', 1);
INSERT INTO `question` VALUES (13, 2, 'AtenciÃ³n durante su salida del Hotel (Check-out) ', 1);
INSERT INTO `question` VALUES (14, 2, 'Limpieza y condiciones de habitaciÃ³n ', 1);
INSERT INTO `question` VALUES (15, 2, 'Limpieza y condiciones de baÃ±os ', 1);
INSERT INTO `question` VALUES (16, 2, 'Limpieza y condiciones de instalaciones exteriores ', 1);
INSERT INTO `question` VALUES (17, 2, 'Comodidad en su habitaciÃ³n ', 1);
INSERT INTO `question` VALUES (18, 3, 'En general, Â¿cÃ³mo calificarÃ­a la hospitalidad de nuestro personal?', 1);
INSERT INTO `question` VALUES (19, 3, 'cÃ³mo calificarÃ­a las zonas comunes de nuestro centro vacacional? ', 1);
INSERT INTO `question` VALUES (20, 3, 'Â¿cÃ³mo calificarÃ­a el valor por el precio pagado?', 1);
INSERT INTO `question` VALUES (21, 3, 'Â¿cÃ³mo calificarÃ­a la capacidad del complejo para proporcionar un ambiente relajante?', 1);
INSERT INTO `question` VALUES (22, 2, 'Â¿Se siente comodo?', 2);
INSERT INTO `question` VALUES (23, 2, 'Â¿El gimnasio es bueno?', 2);
INSERT INTO `question` VALUES (24, 2, 'Â¿Como califica la recepcion?', 2);
INSERT INTO `question` VALUES (25, 4, 'Como califica el ambiente?', 2);
INSERT INTO `question` VALUES (26, 4, 'que le parce la DecoraciÃ³n?', 2);
INSERT INTO `question` VALUES (27, 4, 'se siente comodo en el hotel?', 2);
INSERT INTO `question` VALUES (28, 4, 'como califica las instalaciones?', 2);
INSERT INTO `question` VALUES (29, 4, 'que le parece la recepcion?', 2);
INSERT INTO `question` VALUES (30, 4, 'qye le parece el precio?', 2);
INSERT INTO `question` VALUES (31, 4, 'como califica la hospitalidad?', 2);
INSERT INTO `question` VALUES (32, 4, 'le gusto el desayuno?', 2);
INSERT INTO `question` VALUES (33, 4, 'esta intersado en nuestras ofertas', 2);
INSERT INTO `question` VALUES (34, 4, 'la limpieza como lo califica?', 2);
INSERT INTO `question` VALUES (35, 4, 'la calefaccion fue de su agrado?', 2);
INSERT INTO `question` VALUES (36, 4, 'las bebidas fueron de su agrado', 2);
INSERT INTO `question` VALUES (37, 5, '', 2);
INSERT INTO `question` VALUES (38, 6, 'juan', 1);
INSERT INTO `question` VALUES (39, 6, 'juana', 2);
INSERT INTO `question` VALUES (40, 6, 'bana', 2);
INSERT INTO `question` VALUES (41, 6, 'como estas?', -1);
INSERT INTO `question` VALUES (42, 1, 'como estas', -1);

-- ----------------------------
-- Table structure for reserve
-- ----------------------------
DROP TABLE IF EXISTS `reserve`;
CREATE TABLE `reserve`  (
  `ID_CONSUME_SERVICE` int(11) NOT NULL,
  `ID_ROOM_MODEL` int(11) NOT NULL,
  `UNIT_RESERVED` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONSUME_SERVICE`, `ID_ROOM_MODEL`) USING BTREE,
  INDEX `FK_RELATIONSHIP_118`(`ID_ROOM_MODEL`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_118` FOREIGN KEY (`ID_ROOM_MODEL`) REFERENCES `room_model` (`ID_ROOM_MODEL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_119` FOREIGN KEY (`ID_CONSUME_SERVICE`) REFERENCES `consume_service` (`ID_CONSUME_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reserve
-- ----------------------------
INSERT INTO `reserve` VALUES (4, 4, 1);
INSERT INTO `reserve` VALUES (17, 4, 1);
INSERT INTO `reserve` VALUES (21, 1, 1);
INSERT INTO `reserve` VALUES (25, 4, 1);

-- ----------------------------
-- Table structure for response
-- ----------------------------
DROP TABLE IF EXISTS `response`;
CREATE TABLE `response`  (
  `ID_PERSON` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `DESCRIPTION_RESPONSE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_RESPONSE` date NOT NULL,
  `TIME_RESPONSE` time(0) NOT NULL,
  PRIMARY KEY (`ID_PERSON`, `ID_QUESTION`) USING BTREE,
  INDEX `FK_RELATIONSHIP_65`(`ID_QUESTION`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_64` FOREIGN KEY (`ID_PERSON`) REFERENCES `user_hotel` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_65` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of response
-- ----------------------------
INSERT INTO `response` VALUES (1, 1, 'El niÃ±o menor de 12 aÃ±os, aÃºn no cumplidos, puede hospedarse gratuitamente en la habitaciÃ³n con sus padres, desayuno incluido.', '2017-06-17', '22:22:14');
INSERT INTO `response` VALUES (1, 2, 'SÃ­, la cuenta puede pagarse en cualquier momento del dÃ­a.', '2017-06-17', '22:22:56');
INSERT INTO `response` VALUES (1, 3, 'Aceptamos las principales tarjetas de crÃ©dito: American Express - CartaSÃ¬ - Diners - Visa - Master Card - Tarjeta de debito.', '2017-06-17', '22:23:15');
INSERT INTO `response` VALUES (1, 4, 'SÃ­, todas las habitaciones tienen aire acondicionado con temperatura regulable en la habitaciÃ³n.', '2017-06-17', '22:23:40');
INSERT INTO `response` VALUES (1, 5, 'A las cinco plantas se accede con dos modernos ascensores', '2017-06-17', '22:24:15');
INSERT INTO `response` VALUES (1, 6, 'InglÃ©s, francÃ©s, espaÃ±ol y alemÃ¡n.', '2017-06-17', '22:24:35');
INSERT INTO `response` VALUES (1, 7, 'El restaurante panorÃ¡mico \"Sala delle Nuvoleâ€ estÃ¡ abierto desde las 12:00 hasta las 15:00 horas, mientras que el restaurante y vinoteca â€œPandiaâ€ estÃ¡ abierto desde las 17:00 hasta la mediano', '2017-06-17', '22:25:20');
INSERT INTO `response` VALUES (1, 8, 'Los esperamos desde las 7:00 hasta las 11:00 con nuestros croissants reciÃ©n horneados y con un delicioso buffet caliente y frÃ­o. Pero desde la medianoche hasta las 7:00 tambiÃ©n le ofrecemos el serv', '2017-06-17', '22:25:41');
INSERT INTO `response` VALUES (1, 9, 'El gimnasio del hotel estÃ¡ abierto desde las 6:00 hasta las 22:00 horas.', '2017-06-17', '22:25:59');
INSERT INTO `response` VALUES (1, 10, 'Controle la disponibilidad y los precios y luego siga las instrucciones.<br>Para poder acceder a la confirmaciÃ³n de las reservas se le pedirÃ¡ el nÃºmero y la fecha de caducidad de su tarjeta de crÃ©', '2017-06-17', '22:26:43');
INSERT INTO `response` VALUES (1, 11, 'hola mundo', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES (1, 12, 'muy bueba', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES (1, 13, 'la atncio', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES (1, 14, 'en este hotel', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES (1, 15, 'es buena la limpieza', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES (1, 16, 'con condiciones favotrables', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES (1, 17, 'muy comodo', '2017-06-18', '00:58:05');
INSERT INTO `response` VALUES (1, 18, 'habl', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES (1, 19, 'aqui', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES (1, 20, 'estoy', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES (1, 21, 'muy ', '2017-06-18', '00:57:20');
INSERT INTO `response` VALUES (1, 25, '1', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 26, '2', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 27, '3', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 28, '3', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 29, '2', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 30, '4', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 31, '4', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 32, '4', '2017-06-26', '05:17:23');
INSERT INTO `response` VALUES (1, 33, '4', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES (1, 34, '4', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES (1, 35, '3', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES (1, 36, '5', '2017-06-26', '05:17:24');
INSERT INTO `response` VALUES (1, 42, 'presente', '2017-08-21', '14:51:38');
INSERT INTO `response` VALUES (2, 11, 'buena', '2017-08-22', '09:58:20');
INSERT INTO `response` VALUES (2, 12, 'normal', '2017-08-22', '09:58:20');
INSERT INTO `response` VALUES (2, 13, 'cool', '2017-08-22', '09:58:20');
INSERT INTO `response` VALUES (2, 14, 'muy limpio', '2017-08-22', '09:58:21');
INSERT INTO `response` VALUES (2, 15, 'limpiado', '2017-08-22', '09:58:21');
INSERT INTO `response` VALUES (2, 16, 'normal', '2017-08-22', '09:58:21');
INSERT INTO `response` VALUES (2, 17, 'comod', '2017-08-22', '09:58:21');
INSERT INTO `response` VALUES (2, 22, '3', '2017-08-22', '09:58:21');
INSERT INTO `response` VALUES (2, 23, '3', '2017-08-22', '09:58:21');
INSERT INTO `response` VALUES (2, 24, '3', '2017-08-22', '09:58:21');
INSERT INTO `response` VALUES (3, 11, 'esa es mi pregunta', '2017-09-04', '09:19:21');
INSERT INTO `response` VALUES (3, 12, 'cip', '2017-09-04', '09:19:21');
INSERT INTO `response` VALUES (3, 13, 'regultar', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (3, 14, 'muy limpia', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (3, 15, 'tambina', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (3, 16, 'asasd', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (3, 17, 'comodo', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (3, 22, '2', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (3, 23, '3', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (3, 24, '4', '2017-09-04', '09:19:22');
INSERT INTO `response` VALUES (24, 18, 'juan', '2018-06-04', '16:22:30');
INSERT INTO `response` VALUES (24, 19, 'muy bien', '2018-06-04', '16:22:31');
INSERT INTO `response` VALUES (24, 20, 'app ivnetor', '2018-06-04', '16:22:31');
INSERT INTO `response` VALUES (24, 21, 'relajante', '2018-06-04', '16:22:31');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `ID_ROL` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_ROL` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_ROL` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IMAGE_ROL` longblob,
  PRIMARY KEY (`ID_ROL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'admin', 'Gerente del hotel', NULL);
INSERT INTO `rol` VALUES (2, 'recepcion', 'resliza las reservas', NULL);
INSERT INTO `rol` VALUES (3, 'cliente', 'Huesped del hotel', NULL);
INSERT INTO `rol` VALUES (4, 'cocina', 'Envia pedidos de alimentos y registra consumo', NULL);
INSERT INTO `rol` VALUES (5, 'servicio', 'Registra consumo de servicios', NULL);

-- ----------------------------
-- Table structure for rol_function
-- ----------------------------
DROP TABLE IF EXISTS `rol_function`;
CREATE TABLE `rol_function`  (
  `ID_ROL` int(11) NOT NULL,
  `ID_FUNCTION` decimal(3, 0) NOT NULL,
  `DATE_CREATED_ROL_FUNCTION` date NOT NULL,
  `TIME_CREATED_ROL_FUNCTION` time(0) NOT NULL,
  PRIMARY KEY (`ID_ROL`, `ID_FUNCTION`) USING BTREE,
  INDEX `FK_RELATIONSHIP_9`(`ID_FUNCTION`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_FUNCTION`) REFERENCES `function` (`ID_FUNCTION`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for rol_inquest
-- ----------------------------
DROP TABLE IF EXISTS `rol_inquest`;
CREATE TABLE `rol_inquest`  (
  `ID_ROL` int(11) NOT NULL,
  `ID_INQUEST` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`, `ID_INQUEST`) USING BTREE,
  INDEX `FK_RELATIONSHIP_53`(`ID_INQUEST`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_52` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_53` FOREIGN KEY (`ID_INQUEST`) REFERENCES `inquest` (`ID_INQUEST`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room`  (
  `ID_ROOM` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_ROOM` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_ROOM_MODEL` int(11) NOT NULL,
  `IMAGE_ROOM` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STATE_ROOM` decimal(1, 0) NOT NULL,
  `DATE_CREATED_ROOM` date NOT NULL,
  `TIME_CREATED_ROOM` time(0) NOT NULL,
  `DATE_CHECK_OUT_ROOM` date NOT NULL,
  `TIME_CHECK_OUT_ROOM` time(0) NOT NULL,
  `DATE_CHECK_IN_ROOM` date NOT NULL,
  `TIME_CHECK_IN_ROOM` time(0) NOT NULL,
  PRIMARY KEY (`ID_ROOM`) USING BTREE,
  INDEX `FK_RELATIONSHIP_107`(`ID_HOTEL`) USING BTREE,
  INDEX `FK_RELATIONSHIP_43`(`ID_ROOM_MODEL`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_107` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_43` FOREIGN KEY (`ID_ROOM_MODEL`) REFERENCES `room_model` (`ID_ROOM_MODEL`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 93 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES (1, 'S1', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (2, 'S2', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (3, 'S3', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-06-12', '04:44:49', '2018-06-11', '04:44:49');
INSERT INTO `room` VALUES (4, 'S4', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (5, 'S5', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (6, 'S6', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (7, 'S7', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (8, 'S8', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (9, 'S9', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-06-12', '04:44:49', '2018-06-11', '04:44:49');
INSERT INTO `room` VALUES (10, 'S10', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (11, 'S11', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (12, 'S12', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (13, 'S13', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (14, 'S14', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (15, 'S15', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-06-12', '04:44:49', '2018-06-11', '04:44:49');
INSERT INTO `room` VALUES (16, 'S16', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (17, 'S17', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (18, 'S18', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (19, 'D1', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (20, 'D2', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (21, 'D3', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (22, 'D4', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (23, 'D5', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (24, 'D6', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (25, 'D7', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (26, 'D8', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (27, 'D9', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (28, 'D10', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (29, 'C1', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (30, 'C2', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (31, 'C3', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (32, 'C4', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (33, 'C5', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (34, 'C6', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (35, 'C7', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (36, 'C8', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (37, 'C9', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (38, 'C10', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (39, 'C11', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (40, 'C12', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (41, 'C13', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (42, 'C14', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (43, 'C15', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (44, 'C16', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (45, 'C17', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (46, 'C18', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (47, 'C19', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (48, 'C20', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (49, 'C21', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (50, 'C22', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (51, 'C23', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (52, 'C24', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (53, 'M1', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (54, 'M2', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (55, 'M2', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (56, 'M3', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (57, 'M4', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (58, 'M5', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (59, 'M6', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (60, 'M7', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (61, 'M8', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (62, 'M9', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (63, 'Gim1', 1, 5, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (64, 'Gim2', 1, 5, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (65, 'Piscina1', 1, 6, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (66, 'Comedor General', 1, 7, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (67, 'Comedor VIP', 1, 7, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (68, 'SN1', 1, 8, '', 1, '2015-01-01', '15:16:18', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (69, 'SN2', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (70, 'SN3', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (71, 'SN4', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (72, 'SN5', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (73, 'SN6', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (74, 'SN7', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (75, 'SN8', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (76, 'SN9', 1, 8, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (77, 'SS1', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (78, 'SS2', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (79, 'SS3', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (80, 'SS4', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (81, 'SS5', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (82, 'SS6', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (83, 'SS7', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (84, 'SS8', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (85, 'SS9', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (86, 'SS10', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (87, 'SS11', 1, 9, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (88, 'T1', 1, 10, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (89, 'T2', 1, 10, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (90, 'T3', 1, 10, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (91, 'T4', 1, 10, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (92, 'T5', 1, 10, '', 1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');

-- ----------------------------
-- Table structure for room_model
-- ----------------------------
DROP TABLE IF EXISTS `room_model`;
CREATE TABLE `room_model`  (
  `ID_ROOM_MODEL` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_ROOM_MODEL` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_ROOM_MODEL` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_CREATED_ROOM_MODEL` date NOT NULL,
  `TIME_CREATED_ROOM_MODEL` time(0) NOT NULL,
  `IMAGE_ROOM_MODEL` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UNIT_ADULT_ROOM_MODEL` decimal(2, 0) NOT NULL,
  `UNIT_BOY_ROOM_MODEL` decimal(2, 0) NOT NULL,
  `UNIT_PET_ROOM_MODEL` decimal(2, 0) NOT NULL,
  `VALUE_TYPE_ROOM_MODEL` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_ROOM_MODEL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of room_model
-- ----------------------------
INSERT INTO `room_model` VALUES (1, 'HabitaciÃ²n Individual', 'Cama de 100-120cm/Aire acondiciondo<br>BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n/Doble almohada<br>Telvisor LCD/TV satelital /&nbsp;HabitaciÃ²n insonorizad<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar/Internet WI Fi/Linea cortesÃ¬a', '2017-06-17', '21:43:04', 'img/room/20170617214304.jpg', 1, 0, 0, 1);
INSERT INTO `room_model` VALUES (2, 'HabitaciÃ²n Doble', 'Cama matrimonial/Aire acondiciondo<br>BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n/Doble almohada<br>Telvisor LCD/TV satelital/HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar/Internet WI Fi/Linea cortesÃ¬a baÃ±o', '2017-06-17', '21:44:01', 'img/room/20170617214401.jpg', 2, 0, 0, 1);
INSERT INTO `room_model` VALUES (3, 'Clasico', 'Cama matrimonial o dos camas a pedido<br>Aire acondiciondo/BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n/Doble almohada<br>Telvisor LCD/TV satelital/HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar/Internet WI Fi/Linea cortesÃ¬a baÃ±o', '2017-06-17', '21:44:52', 'img/room/20170617214452.jpg', 1, 0, 0, 1);
INSERT INTO `room_model` VALUES (4, 'Matrimonial', 'Cama matrimonial o dos camas a pedido<br>Aire acondiciondo/BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n/Doble almohada<br>Telvisor LCD/TV satelital/HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar/Internet WI Fi/Linea cortesÃ¬a baÃ±o<br>Desayuno servido en la habitaciÃ²n a pedido<br>Salida de baÃ±o/Pantuflas<br>Una botellita de Chianti de bienvenida<br>Una cesta de frutas frescas', '2017-06-17', '21:46:02', 'img/room/20170617214602.jpg', 2, 0, 0, 1);
INSERT INTO `room_model` VALUES (5, 'Gimnasio', 'lugar que permite practicar deportes o hacer ejercicio en un recinto cerrado con varias maquinas y artÃ­culos deportivos a disposiciÃ³n de quienes lo visiten', '2017-06-17', '21:47:35', 'img/room/20170617214735.jpg', 99, 20, 0, 2);
INSERT INTO `room_model` VALUES (6, 'Piscina', 'espacio que se destina al <b>acto de comer</b> (ingerir alimentos). En las viviendas, el comedor puede ser una habitaciÃ³n dedicada exclusivamente a esta acciÃ³n o un sector integrado a otro ambiente (como la <b>cocina-comedor</b> o el <b>living-comedor</b>).', '2017-06-17', '21:52:41', 'img/room/20170617215042.jpg', 99, 99, 0, 2);
INSERT INTO `room_model` VALUES (7, 'Comedor', 'espacio que se destina al <b>acto de comer</b> (ingerir alimentos). En las viviendas, el comedor puede ser una habitaciÃ³n dedicada exclusivamente a esta acciÃ³n o un sector integrado a otro ambiente (como la <b>cocina-comedor</b> o el <b>living-comedor</b>).', '2017-06-17', '21:52:22', 'img/room/20170617215222.jpg', 99, 99, 0, 2);
INSERT INTO `room_model` VALUES (8, 'Suite', 'La habitacion mas lujosa del hotel', '2017-08-21', '15:03:34', 'img/room/20170821150334.jpg', 2, 1, 0, -1);
INSERT INTO `room_model` VALUES (9, 'Suite Nupcial', 'habitaiones para reien casados', '2017-08-21', '15:04:14', 'img/room/20170821150414.jpeg', 1, 0, 0, -1);
INSERT INTO `room_model` VALUES (10, 'HabitaciÃ²n Triple', 'Cama matrimonial/Aire acondiciondo<br>BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n/Doble almohada<br>Telvisor LCD/TV satelital/HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar/Internet WI Fi/Linea cortesÃ¬a baÃ±o', '2017-06-17', '21:44:01', 'img/room/20170617214401.jpg', 2, 0, 0, 1);

-- ----------------------------
-- Table structure for rule
-- ----------------------------
DROP TABLE IF EXISTS `rule`;
CREATE TABLE `rule`  (
  `ID_TYPE_RULE` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `NAME_RULE` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_RULE` varchar(750) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STATE_RULE` decimal(1, 0) NOT NULL,
  PRIMARY KEY (`ID_TYPE_RULE`, `ID_HOTEL`, `NAME_RULE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_47`(`ID_HOTEL`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_47` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_48` FOREIGN KEY (`ID_TYPE_RULE`) REFERENCES `type_rule` (`ID_TYPE_RULE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rule
-- ----------------------------
INSERT INTO `rule` VALUES (1, 1, 'DaÃ±os', 'Cualquier <b>daÃ±o causado</b> por los huÃ©spedes a los objetos, bienes muebles o al inmueble de propiedad del hotel, serÃ¡ de su exclusiva responsabilidad, debiendo abonar la reparaciÃ³n de los mismos.', 1);
INSERT INTO `rule` VALUES (1, 1, 'DERECHO DE ADMISION', 'El hotel se reserva el derecho de admisiÃ³n de visitas ocasionales y en ningÃºn caso se permitirÃ¡ el acceso de las mismas a las habitaciones. En caso de incumplimiento la gerencia se reserva el derecho de ordenar la salida inmediata del visitante', 1);
INSERT INTO `rule` VALUES (1, 1, 'HORA DE ENTRADA Y SALIDA', 'El horario de ingreso a las habitaciones se fija a las 13 Hs. y deberÃ¡n ser desocupadas a las 10 Hs. del dÃ­a siguiente; despuÃ©s de esa hora, el hotel tendrÃ¡ derecho a efectuar un cargo extra segÃºn la tarifa vigente.', 1);
INSERT INTO `rule` VALUES (1, 1, 'Llaves', 'En todas las oportunidades en que los huÃ©spedes abandonen el hotel, deberÃ¡n entregar las llaves en recepciÃ³n sin excepciÃ³n. Para la limpieza de la habitaciÃ³n, deben dejarse las llaves antes de las 13 Hs. de lo contrario la limpieza se realizarÃ¡ despuÃ©s de las 17 hrs.', 1);
INSERT INTO `rule` VALUES (1, 1, 'Registro', 'Todas las personas hospedadas deberÃ¡n registrarse antes de ingresar al hotel.', 1);
INSERT INTO `rule` VALUES (1, 1, 'Toallas', 'Esta totalmente prohibido (sin ninguna excepciÃ³n) retirar toallas de la habitaciÃ³n. Para la piscina puede solicitar toallas en el Snack.', 1);
INSERT INTO `rule` VALUES (1, 1, 'Transferencia', 'el registro es intransferiable<br>', 1);
INSERT INTO `rule` VALUES (3, 1, 'Alimentos y bebidas', 'No se permite la introducciÃ³n de los mismos en las habitaciones o Ã¡reas pÃºblicas del hotel, salvo que fueran adquiridos en el bar o restaurante del mismo; caso contrario el hotel podrÃ¡ exigir el retiro de los mismos.', 1);
INSERT INTO `rule` VALUES (3, 1, 'no caminar descalso', 'en este hotel el caminar descalso es de mala educacion, no lo hagais editado mucho<br>', 1);

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service`  (
  `ID_SERVICE` int(2) NOT NULL AUTO_INCREMENT,
  `ID_STATE_SERVICE` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_TYPE_SERVICE` int(11) NOT NULL,
  `NAME_SERVICE` char(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_SERVICE` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IMAGE_SERVICE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `RESERVED_SERVICE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_23`(`ID_TYPE_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_66`(`ID_HOTEL`) USING BTREE,
  INDEX `FK_RELATIONSHIP_97`(`ID_STATE_SERVICE`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`ID_TYPE_SERVICE`) REFERENCES `type_service` (`ID_TYPE_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_66` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_97` FOREIGN KEY (`ID_STATE_SERVICE`) REFERENCES `state_service` (`ID_STATE_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES (1, 1, 1, 2, 'Habitacion Simple', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215448.jpg', 1);
INSERT INTO `service` VALUES (2, 1, 1, 2, 'Habitacion Doble', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215544.jpg', 1);
INSERT INTO `service` VALUES (3, 1, 1, 1, 'Gimnasio', 'Sala de fitness equipada con aparatos de Ãºltima generaciÃ³n con Internet y TV individual', 'img/service/20170617215856.jpg', 1);
INSERT INTO `service` VALUES (4, 1, 1, 2, 'Habitacion Matrimonial', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617220000.jpg', 1);
INSERT INTO `service` VALUES (5, 1, 1, 2, 'Habitacon Suit', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br><br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje</p>', 'img/service/20170617220110.jpg', 1);
INSERT INTO `service` VALUES (6, 1, 1, 1, 'Servicio de piscina', 'Perfecciona tu estilo de nataciÃ³n en nuestra piscina climatizada.', 'img/service/20170617220211.jpg', 1);
INSERT INTO `service` VALUES (7, 1, 1, 1, 'Comedor', 'Nuestro restaurante resulta el lugar idÃ³neo para reunirte con tus amigos o con otros socios y disfrutar de una comida saludable.', 'img/service/20170617220343.jpg', 0);
INSERT INTO `service` VALUES (8, 1, 1, 3, 'Gimnasio temporadas', 'El gimansio estara a mitad de precio por fin de mes', 'img/offers/20170618002203.jpg', 0);
INSERT INTO `service` VALUES (9, 1, 1, 3, 'Park, sleep and fly', '<p class=\"intro\" style=\"margin-bottom: 0px; padding: 0px 0px 11px; border: 0px; font-stretch: normal; font-size: 12px; line-height: 14px; font-family: FuturaCom-Medium, arial; vertical-align: baseline; text-transform: uppercase;\">VIAJAR SIN COCHE NUNCA HA SIDO MÃS FÃCIL<br></p><span style=\"color: rgb(101, 101, 101); font-family: arial; font-size: 12px;\">Al marcharse de viaje, dejar el coche atrÃ¡s puede resultar un problema. Con Park, Sleep and Fly, le guardamos el coche. Porque la comodidad r', 'img/offers/20171015175833.jpg', 1);
INSERT INTO `service` VALUES (10, 1, 1, 3, 'Oferta Fin de semana', '<h6 style=\"margin-bottom: 0px; padding: 0px 0px 20px; border: 0px; font-weight: bold; font-stretch: normal; line-height: 24px; font-family: Georgia; vertical-align: baseline; color: rgb(0, 0, 0); font-size: 24px;\"><p style=\"margin-bottom: 0px; padding: 0px 0px 11px; border: 0px; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: 14px; font-family: arial; vertical-align: baseline; color: rgb(101, 101, 101);\">Pullman inventa Business Playground: un lugar donde trabajar, un pa', 'img/offers/20171015180013.jpg', 1);
INSERT INTO `service` VALUES (11, 1, 1, 3, 'Guia turistico', 'Guia por lugares turisticos', 'img/offers/20171015180116.jpg', 1);
INSERT INTO `service` VALUES (12, 1, 1, 2, 'Habitacion Triple', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215544.jpg', 1);
INSERT INTO `service` VALUES (13, 1, 1, 2, 'Habitacion Suite', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215544.jpg', 1);
INSERT INTO `service` VALUES (14, 1, 1, 2, 'Habitacion Suite nupcial', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215544.jpg', 1);
INSERT INTO `service` VALUES (15, 1, 1, 4, 'Check In', 'Registrar ingreso', '', 0);
INSERT INTO `service` VALUES (16, 1, 1, 4, 'Check Out', 'Registrar ingreso', '', 0);
INSERT INTO `service` VALUES (17, 1, 1, 4, 'Check Reserve', 'Registrar ingreso', '', 0);

-- ----------------------------
-- Table structure for service_activity
-- ----------------------------
DROP TABLE IF EXISTS `service_activity`;
CREATE TABLE `service_activity`  (
  `ID_SERVICE` int(11) NOT NULL,
  `ID_ACTIVITY` int(11) NOT NULL,
  `DATE_INI_ACTIVITY` datetime(0) NOT NULL,
  `DATE_FIN_ACTIVITY` datetime(0) NOT NULL,
  PRIMARY KEY (`ID_SERVICE`, `ID_ACTIVITY`) USING BTREE,
  INDEX `FK_RELATIONSHIP_40`(`ID_ACTIVITY`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_40` FOREIGN KEY (`ID_ACTIVITY`) REFERENCES `activity` (`ID_ACTIVITY`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_41` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_function
-- ----------------------------
DROP TABLE IF EXISTS `service_function`;
CREATE TABLE `service_function`  (
  `ID_SERVICE` int(11) NOT NULL,
  `ID_FUNCTION` decimal(3, 0) NOT NULL,
  PRIMARY KEY (`ID_SERVICE`, `ID_FUNCTION`) USING BTREE,
  INDEX `FK_RELATIONSHIP_75`(`ID_FUNCTION`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_75` FOREIGN KEY (`ID_FUNCTION`) REFERENCES `function` (`ID_FUNCTION`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_76` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_incharge
-- ----------------------------
DROP TABLE IF EXISTS `service_incharge`;
CREATE TABLE `service_incharge`  (
  `ID_PERSON` int(11) NOT NULL,
  `ID_SERVICE` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERSON`, `ID_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_103`(`ID_SERVICE`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_103` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_104` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_room_model
-- ----------------------------
DROP TABLE IF EXISTS `service_room_model`;
CREATE TABLE `service_room_model`  (
  `ID_ROOM_MODEL` int(11) NOT NULL,
  `ID_SERVICE` int(11) NOT NULL,
  `UNIT_ROOM_MODEL` decimal(3, 0) NOT NULL,
  `DATE_CREATED_SERVICE_ROOM_MODEL` date NOT NULL,
  `TIME_CREAED_SERVICE_ROOM_MODEL` time(0) NOT NULL,
  PRIMARY KEY (`ID_ROOM_MODEL`, `ID_SERVICE`) USING BTREE,
  INDEX `FK_RELATIONSHIP_78`(`ID_SERVICE`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_78` FOREIGN KEY (`ID_SERVICE`) REFERENCES `service` (`ID_SERVICE`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_91` FOREIGN KEY (`ID_ROOM_MODEL`) REFERENCES `room_model` (`ID_ROOM_MODEL`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of service_room_model
-- ----------------------------
INSERT INTO `service_room_model` VALUES (1, 1, 1, '2017-06-17', '21:54:48');
INSERT INTO `service_room_model` VALUES (2, 2, 1, '2017-06-17', '21:55:44');
INSERT INTO `service_room_model` VALUES (4, 4, 1, '2017-06-17', '22:00:00');
INSERT INTO `service_room_model` VALUES (5, 3, 1, '2017-06-17', '21:58:56');
INSERT INTO `service_room_model` VALUES (5, 5, 1, '2017-06-17', '22:01:10');
INSERT INTO `service_room_model` VALUES (5, 8, 1, '2017-06-18', '00:22:03');
INSERT INTO `service_room_model` VALUES (6, 5, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (6, 6, 1, '2017-06-17', '22:02:11');
INSERT INTO `service_room_model` VALUES (6, 12, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (7, 1, 1, '2017-06-17', '22:03:43');
INSERT INTO `service_room_model` VALUES (7, 2, 1, '2017-06-17', '22:03:43');
INSERT INTO `service_room_model` VALUES (7, 4, 1, '2017-06-17', '22:03:43');
INSERT INTO `service_room_model` VALUES (7, 5, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (7, 7, 1, '2017-06-17', '22:03:43');
INSERT INTO `service_room_model` VALUES (7, 11, 1, '2017-10-15', '18:01:16');
INSERT INTO `service_room_model` VALUES (7, 12, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (8, 5, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (8, 13, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (9, 14, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (10, 12, 1, '2017-06-17', '22:04:04');

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session`  (
  `ID_SESSION` int(15) NOT NULL AUTO_INCREMENT,
  `ID_PERSON` int(11) DEFAULT NULL,
  `IP_PROXI` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IP_MULTIUSER` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IP_CLIENT` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PID` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_END` date NOT NULL,
  `BROWSER` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TIME_START` time(0) NOT NULL,
  `TIME_END` time(0) NOT NULL,
  `ACTIVED` tinyint(1) NOT NULL,
  `LATITUD` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LONGITUD` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CITY` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `REGION` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `AREA_CODE` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `COUNTRY` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `REGION_CODE` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_SESSION`) USING BTREE,
  INDEX `FK_RELATIONSHIP_20`(`ID_PERSON`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`ID_PERSON`) REFERENCES `user_hotel` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES (48, 1, '', '', 'localhost', 'localhost:53593', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '13:49:16', '13:49:16', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (49, 1, '', '', 'localhost', 'localhost:50760', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:44:26', '15:44:26', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (50, 1, '', '', 'localhost', 'localhost:50829', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:44:48', '15:44:48', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (51, 1, '', '', 'localhost', 'localhost:50864', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:44:57', '15:44:57', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (52, 1, '', '', 'localhost', 'localhost:50896', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:45:06', '15:45:06', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (53, 1, '', '', 'localhost', 'localhost:50966', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:45:25', '15:45:25', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (54, 1, '', '', 'localhost', 'localhost:50999', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:45:34', '15:45:34', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (55, 1, '', '', 'localhost', 'localhost:51166', '2018-09-15', '2018-09-15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:46:06', '15:46:06', 1, '0', '0', '', '', '', '', '');

-- ----------------------------
-- Table structure for site_tour
-- ----------------------------
DROP TABLE IF EXISTS `site_tour`;
CREATE TABLE `site_tour`  (
  `ID_SITE_TOUR` int(11) NOT NULL AUTO_INCREMENT,
  `ADDRESS_GPS_X_SITE_TOUR` float NOT NULL,
  `ADDRESS_GPS_Y_SITE_TOUR` float NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `NAME_SITE_TOUR` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_SITE_TOUR` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADDRESS_SITE_TOUR` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STATE_SITE_TOUR` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_SITE_TOUR`) USING BTREE,
  INDEX `FK_RELATIONSHIP_101`(`ID_HOTEL`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_101` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of site_tour
-- ----------------------------
INSERT INTO `site_tour` VALUES (1, -17.4015, -66.1749, 1, 'Mariscal Santa Cruz', 'atractivo turistico', 'Hernan Morales, Cochabamba, Bolivia', 1);
INSERT INTO `site_tour` VALUES (2, -17.3881, -66.1581, 1, 'Plaza colon', '<span class=\"r-i11saKUU0mbo\">Una plaza agradable del centro de la ciudad de cochabamba, comerciales alrededor buen lugar para pasar el dÃ­a de compras o comiendo</span>', 'av venezuela', 1);
INSERT INTO `site_tour` VALUES (3, -17.3844, -66.135, 1, 'Cristo de la Concordia', '<p>Situado sobre el cerro San Pedro, El Cristo tiene el denominativo de la â€œConcordiaâ€, significando el carÃ¡cter integrador geogrÃ¡fico, polÃ­tico y social que tiene la ciudad y el departamento de Cochabamba, ademÃ¡s de representar la hospitalidad del pueblo cochabambino.</p><p>Â Para perpetuar el recuerdo de la visita del Papa Juan Pablo II y la enseÃ±anza de paz, entendimiento y concordia impartida en esa ocasiÃ³n por el Vicario de Cristo, a iniciativa del dirigente obrero fabril Luci', 'Av de la Concordia, Cochabamba, Bolivia', 1);
INSERT INTO `site_tour` VALUES (4, -17.4047, -66.1605, 1, 'Colina de San SebastiÃ¡n La Coronilla', '<p>Jaya-Uma es el nombre indÃ­gena y primitivo del cerro o colina de San SebastiÃ¡n. A su vez en otro tiempo obtuvo el denominativo de cerro de â€œKanataâ€, siendo identificada como la zona honda, anegada, en cuyas orillas crecÃ­an hierbas amargas. En esta colina se han encontrado restos arqueolÃ³gicos, lo que demuestra que Cochabamba desde la prehistoria, ha sido cuna de asentamientos de diversa procedencia. Son dos los hallazgos importantes en la Colina de San SebastiÃ¡n; un enterratorio y pi', 'Cochabamba, Bolivia', 1);
INSERT INTO `site_tour` VALUES (5, -17.3773, -66.1398, 1, 'JardÃ­n BotÃ¡nico', '<p>El JardÃ­n BotÃ¡nico MartÃ­n CÃ¡rdenas surgiÃ³ como un homenaje al mÃ¡s grande de los botÃ¡nicos bolivianos MartÃ­n CÃ¡rdenas Hermosa, nacido en Cochabamba, gran investigador de campo, y fundador de la Facultad de BiologÃ­a de la Universidad Mayor de San SimÃ³n y rector de la misma durante dos gestiones. Entre los objetivos del jardÃ­n botÃ¡nico se encuentran el de promover la investigaciÃ³n, la enseÃ±anza y el de exhibiciÃ³n de la flora de la provincia de Cochabamba, asÃ­ como la conservaciï', 'Raul Rivero Torres, Cochabamba, Bolivia', 1);
INSERT INTO `site_tour` VALUES (6, -17.3811, -66.1551, 1, 'Parque de EducaciÃ³n Vial', '<p>Ãrea recreacional de educaciÃ³n vial, donde los mÃ¡s pequeÃ±os pueden aprender sobre la seguridad vial, a travÃ©s de un pequeÃ±o circuito y recorridos divertidos, en el cual podrÃ¡n identificar las diferentes seÃ±alizaciones viales. Dentro esta Ã¡rea se puede apreciar igualmente diferentes juegos recreacionales, paseos a travÃ©s del trencito en las diferentes calles creadas dentro el parque y diversiÃ³n con cochecitos chocadores ademÃ¡s de diferentes Ã¡reas verdes.</p>', 'Av.RamÃ³n Rivero, Cochabamba, Bolivia', 1);
INSERT INTO `site_tour` VALUES (7, -17.4006, -66.1742, 1, 'Parque Mariscal Santa Cruz', '<p>Ãrea recreacional de educaciÃ³n vial, donde los mÃ¡s pequeÃ±os pueden aprender sobre la seguridad vial, a travÃ©s de un pequeÃ±o circuito y recorridos divertidos, en el cual podrÃ¡n identificar las diferentes seÃ±alizaciones viales. Dentro esta Ã¡rea se puede apreciar igualmente diferentes juegos recreacionales, paseos a travÃ©s del trencito en las diferentes calles creadas dentro el parque y diversiÃ³n con cochecitos chocadores ademÃ¡s de diferentes Ã¡reas verdes.</p>', 'Hernan Morales, zona Chimba Cochabamba, Bolivia', 1);
INSERT INTO `site_tour` VALUES (8, -17.4025, -66.1324, 1, 'La Ciclo VÃ­a', '<p>La ciudad cuenta con una CiclovÃ­a principal que recorre parte de la ciudad, iniciÃ¡ndose en el llamado Circuito Bolivia, al sudoeste de la ciudad, en el perÃ­metro de la Laguna Alalay, siguiendo hacia el norte por la avenida RubÃ©n DarÃ­o, bordeando la colina San Pedro. En seguida cruza la avenida VillazÃ³n, entrando por la avenida Florentino Mendieta hasta la Plaza Tarija, de ahÃ­ sigue su largo recorrido por la avenida RodrÃ­guez Morales, para finalizar su tramo entre la avenida SimÃ³n LÃ³', 'Circuito Bolivia- bordea la colina San Pedro, Cochabamba, Bolivia', 1);
INSERT INTO `site_tour` VALUES (9, -17.4126, -66.1584, 1, 'Parque Kanata', '<p>Este renovado parque al sur de la ciudad posee juegos infantiles: sube y bajas, resbalines, tÃºneles, paralelas, etc. TambiÃ©n tiene canchas de fulbito y de basket con graderÃ­as de cemento. Para los niÃ±os estÃ¡ el moderno â€˜Chapoteadorâ€™ que es una piscina de poca altura para que caminen descalzos y se refresquen. El parque cuenta ademÃ¡s con parvulario, destinado a bebÃ©s desde los 6 meses hasta los 5 aÃ±os de edad con columpios, casitas diminutas para bebÃ©s gateadores, resbalines y cor', 'Av. 6 de Agosto y El Cabildo, Cochabamba,Bolivia', 1);
INSERT INTO `site_tour` VALUES (10, -17.3849, -66.1356, 1, 'TelefÃ©rico', '<p>El TelefÃ©rico, una obra que es orgullo de los cochabambinos, permite subir y bajar en pocos minutos la cima de San Pedro. Parte del Parque de La AutonomÃ­a hasta la cima. Permite gozar una bella vista panorÃ¡mica de la ciudad.</p>', 'Luis Castel Quiroga,Cochabamba, Bolivia', 1);

-- ----------------------------
-- Table structure for state_activity
-- ----------------------------
DROP TABLE IF EXISTS `state_activity`;
CREATE TABLE `state_activity`  (
  `ID_STATE_ACTIVITY` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_ACTIVITY` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_STATE_ACTIVITY` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_STATE_ACTIVITY` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_ACTIVITY`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of state_activity
-- ----------------------------
INSERT INTO `state_activity` VALUES (1, 'eliminado', 'la actividad ha sido eliminada', -1);
INSERT INTO `state_activity` VALUES (2, 'Activo', 'Actividad programada<br>', 1);
INSERT INTO `state_activity` VALUES (3, 'No activo', 'Actividad no programada', 0);

-- ----------------------------
-- Table structure for state_article
-- ----------------------------
DROP TABLE IF EXISTS `state_article`;
CREATE TABLE `state_article`  (
  `ID_STATE_ARTICLE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_ARTICLE` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_STATE_ARTICLE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_STATE_ARTICLE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_ARTICLE`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of state_article
-- ----------------------------
INSERT INTO `state_article` VALUES (1, 'prestado', 'el articulo se puede prestar', 1);
INSERT INTO `state_article` VALUES (2, 'devuelto', 'el rticulo no se puede prestar', 0);
INSERT INTO `state_article` VALUES (3, 'perdido', 'el articulo no se puede prestar', 2);
INSERT INTO `state_article` VALUES (4, 'cancelado', 'el articulo no se puede prestar', -1);

-- ----------------------------
-- Table structure for state_check
-- ----------------------------
DROP TABLE IF EXISTS `state_check`;
CREATE TABLE `state_check`  (
  `ID_STATE_CHECK` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_CHECK` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_STATE_CHECK` char(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_STATE_CHECK` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_CHECK`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of state_check
-- ----------------------------
INSERT INTO `state_check` VALUES (1, 'activo', 'registro valido', 1);
INSERT INTO `state_check` VALUES (2, 'cancelado', 'registro cancelado', -1);
INSERT INTO `state_check` VALUES (3, 'pendiente', 'falta verificar por recepcion', 0);
INSERT INTO `state_check` VALUES (4, 'negado', 'solicitud de registro negado', -1);
INSERT INTO `state_check` VALUES (5, 'proceso', 'registro en proceso con titular registrado', 0);
INSERT INTO `state_check` VALUES (6, 'terminado', 'el huesped registro su salida del hotel', 1);
INSERT INTO `state_check` VALUES (7, 'proceso', 'el titular de la reserva no esta registrado todavia', 0);
INSERT INTO `state_check` VALUES (8, 'Eliminado automatico', 'Eliminada de automatica para los que sobrepasan el tiempo maximo requerido', -1);

-- ----------------------------
-- Table structure for state_food
-- ----------------------------
DROP TABLE IF EXISTS `state_food`;
CREATE TABLE `state_food`  (
  `ID_STATE_FOOD` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_FOOD` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_STATE_FOOD` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_STATE_FOOD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_FOOD`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of state_food
-- ----------------------------
INSERT INTO `state_food` VALUES (1, 'disponible', 'se puede realizar la solicitud', 1);
INSERT INTO `state_food` VALUES (2, 'no diponible', 'ya no se prepara esa comida', 0);
INSERT INTO `state_food` VALUES (3, 'eliminado', 'alimento eliminado', -1);

-- ----------------------------
-- Table structure for state_inquest
-- ----------------------------
DROP TABLE IF EXISTS `state_inquest`;
CREATE TABLE `state_inquest`  (
  `ID_STATE_INQUEST` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_INQUEST` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_STATE_INQUEST` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_STATE_INQUEST` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_INQUEST`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of state_inquest
-- ----------------------------
INSERT INTO `state_inquest` VALUES (1, 'activo', 'la escuenta esta disponible', 1);
INSERT INTO `state_inquest` VALUES (2, 'no activo', 'la encuesta no esta activo', 0);
INSERT INTO `state_inquest` VALUES (3, 'espera', 'la encuesta todavia no se ha habilitado', 0);
INSERT INTO `state_inquest` VALUES (4, 'permanente', 'encuesta siempre esta activo', 2);
INSERT INTO `state_inquest` VALUES (5, 'frequente', 'preguntas frequentes', -2);
INSERT INTO `state_inquest` VALUES (6, 'eliminado', 'Encuesta eliminada', -1);

-- ----------------------------
-- Table structure for state_service
-- ----------------------------
DROP TABLE IF EXISTS `state_service`;
CREATE TABLE `state_service`  (
  `ID_STATE_SERVICE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_SERVICE` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_STATE_SERVICE` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_STATE_SERVICE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_SERVICE`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of state_service
-- ----------------------------
INSERT INTO `state_service` VALUES (1, 'disponible', 'servicio disponible', 1);
INSERT INTO `state_service` VALUES (2, 'fuera de servicio', 'el servicio esta fuera de funcionamiento', 0);
INSERT INTO `state_service` VALUES (3, 'eliminado', 'servicio eliminado', -1);
INSERT INTO `state_service` VALUES (4, 'mantenimiento', 'servicio e mantenimiento', 0);

-- ----------------------------
-- Table structure for state_user
-- ----------------------------
DROP TABLE IF EXISTS `state_user`;
CREATE TABLE `state_user`  (
  `ID_STATE_USER` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_STATE_USER` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_STATE_USER` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_STATE_USER` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_STATE_USER`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of state_user
-- ----------------------------
INSERT INTO `state_user` VALUES (1, 'activo', 'esta activo en el sistema', 1);
INSERT INTO `state_user` VALUES (2, 'bloqueado', 'se ha cancelado su cuenta', 0);
INSERT INTO `state_user` VALUES (3, 'cancelado', 'el usuario ha cancelado su cuenta', 1);
INSERT INTO `state_user` VALUES (4, 'registrado', 'se acaba de crear la cuenta de usuario', 1);

-- ----------------------------
-- Table structure for type_activity
-- ----------------------------
DROP TABLE IF EXISTS `type_activity`;
CREATE TABLE `type_activity`  (
  `ID_TYPE_ACTIVITY` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_ACTIVITY` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_ACTIVITY` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_ACTIVITY` date NOT NULL,
  `TIME_TYPE_ACTIVITY` time(0) NOT NULL,
  `IMAGE_TYPE_ACTIVITY` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_ACTIVITY` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_ACTIVITY`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_activity
-- ----------------------------
INSERT INTO `type_activity` VALUES (1, 'Empresarial', 'Actividad para los empleados del hotel', '2017-06-17', '23:55:13', 'img/activity/20170617235513.png', 1);
INSERT INTO `type_activity` VALUES (2, 'Salida turistica', 'Paseo turistico guiado por los alrrededores del lugar', '2017-06-17', '23:56:32', 'img/activity/20170617235632.jpg', 1);
INSERT INTO `type_activity` VALUES (3, 'Matrimonio', 'Fiesta de matrimonio en el salon de fista del hotel', '2017-06-17', '23:57:15', 'img/activity/20170617235715.jpg', 1);
INSERT INTO `type_activity` VALUES (4, 'Fiesta', 'Festejo', '2017-06-17', '23:58:03', 'img/activity/20170617235803.jpg', 1);
INSERT INTO `type_activity` VALUES (5, 'Concierto', 'Concierto de algun grupo', '2017-06-17', '23:58:47', 'img/activity/20170617235847.jpg', 1);

-- ----------------------------
-- Table structure for type_card
-- ----------------------------
DROP TABLE IF EXISTS `type_card`;
CREATE TABLE `type_card`  (
  `ID_TYPE_CARD` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_CARD` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_CARD` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_CARD` date NOT NULL,
  `TIME_TYPE_CARD` time(0) NOT NULL,
  `IMAGE_TYPE_CARD` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_CARD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_CARD`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_card
-- ----------------------------
INSERT INTO `type_card` VALUES (1, 'Bisa', 'Targeta de banco bisa', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_card` VALUES (2, 'MasterCard', 'Tarjeta MaserCard', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_card` VALUES (3, 'PayPal', 'Targetas PayPal', '2018-01-01', '00:00:00', '', 1);

-- ----------------------------
-- Table structure for type_check
-- ----------------------------
DROP TABLE IF EXISTS `type_check`;
CREATE TABLE `type_check`  (
  `ID_TYPE_CHECK` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_CHECK` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_CHECK` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_CHECK` date NOT NULL,
  `TIME_TYPE_CHECK` time(0) NOT NULL,
  `IMAGE_TYPE_CHECK` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_CHECK` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_CHECK`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_check
-- ----------------------------
INSERT INTO `type_check` VALUES (1, 'reserve', 'Pedido de reserva', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_check` VALUES (2, 'check In', 'Registrar ingreso de un huesped', '2018-01-01', '00:00:00', '', 2);
INSERT INTO `type_check` VALUES (3, 'check Out', 'Registrar salida de un huesped', '2018-01-01', '00:00:00', '', 3);

-- ----------------------------
-- Table structure for type_consume
-- ----------------------------
DROP TABLE IF EXISTS `type_consume`;
CREATE TABLE `type_consume`  (
  `ID_TYPE_CONSUME` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_CONSUME` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_CONSUME` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_CONSUME` date NOT NULL,
  `TIME_TYPE_CONSUME` time(0) NOT NULL,
  `IMAGE_TYPE_CONSUME` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_CONSUME` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_CONSUME`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_consume
-- ----------------------------
INSERT INTO `type_consume` VALUES (1, 'Check in', 'consumo del registro de ingreso de un huesped', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_consume` VALUES (2, 'Check out', 'consumo del registro de la salida de un husped', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_consume` VALUES (3, 'Consumo', 'consumo de un huesped cuando esta hospedado en el hotel', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_consume` VALUES (4, 'Solicitud de servicio', 'Realiza el pedido para consumo de un servicio', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_consume` VALUES (5, 'Reserva', 'Monto depositado para la reserva', '2018-01-01', '00:00:00', '', 2);
INSERT INTO `type_consume` VALUES (6, 'Deposito', 'Deposito de efectivo a caja', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_consume` VALUES (7, 'Cancelado', 'Transaccion de consumo eliminada', '2018-01-01', '00:00:00', '', -1);
INSERT INTO `type_consume` VALUES (8, 'Gasto', 'Gasto de dinero de la caja', '2018-01-01', '00:00:00', '', 3);

-- ----------------------------
-- Table structure for type_document
-- ----------------------------
DROP TABLE IF EXISTS `type_document`;
CREATE TABLE `type_document`  (
  `ID_TYPE_DOCUMENT` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_DOCUMENT` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_DOCUMENT` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_DOCUMENT` date NOT NULL,
  `TIME_TYPE_DOCUMENT` time(0) NOT NULL,
  `IMAGE_TYPE_DOCUMENT` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_DOCUMENT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_DOCUMENT`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_document
-- ----------------------------
INSERT INTO `type_document` VALUES (1, 'dni', 'dni', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_document` VALUES (2, 'ci', 'carnet de identidad', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_document` VALUES (3, 'pasaporte', 'para los estranjeros', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_document` VALUES (4, 'nit', 'documento pra abionar', '2017-09-03', '16:20:04', 'img/document/20170903162004.jpg', -1);

-- ----------------------------
-- Table structure for type_food
-- ----------------------------
DROP TABLE IF EXISTS `type_food`;
CREATE TABLE `type_food`  (
  `ID_TYPE_FOOD` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_FOOD` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_FOOD` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_FOOD` date NOT NULL,
  `TIME_TYPE_FOOD` time(0) NOT NULL,
  `IMAGE_TYPE_FOOD` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_FOOD` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_FOOD`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_food
-- ----------------------------
INSERT INTO `type_food` VALUES (1, 'desayuno', 'se sirve en la ma&ntilde;ana', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (2, 'almuerzo', 'se sirve al medio d&iacute;a', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (3, 'cena', 'se sirve en la noche', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (5, 'postre', 'se sirve despues de la comida', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (6, 'refresco', 'gaseosas y jugos', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (7, 'bebida', 'bebidas con alcohol', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (8, 'fruta', 'Fruto comestible de ciertas plantas y árboles, en especial cuando tiene mucha agua y es de sabor dulce', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (9, 'verdura', 'Las verduras son hortalizas cuyo color predominante es el verde', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (10, 'leche y derivados', 'Sustancia líquida y blanca que segregan las mamas de las hembras de los mamíferos para alimentar a sus crías y que está constituida por caseína, lactosa, sales inorgánicas, glóbulos de grasa suspendidos y otras sustancias', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (11, 'cereal', 'Los cereales son plantas de la familia de las poáceas cultivadas por su grano. Incluyen cereales mayores como el trigo, el arroz, el maíz, la cebada, la avena y el centeno, y cereales', '2018-01-01', '00:00:00', '', 1);

-- ----------------------------
-- Table structure for type_hotel
-- ----------------------------
DROP TABLE IF EXISTS `type_hotel`;
CREATE TABLE `type_hotel`  (
  `ID_TYPE_HOTEL` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_HOTEL` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_HOTEL` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_HOTEL` date NOT NULL,
  `TIME_TYPE_HOTEL` time(0) NOT NULL,
  `IMAGE_TYPE_HOTEL` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_HOTEL` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_HOTEL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_hotel
-- ----------------------------
INSERT INTO `type_hotel` VALUES (1, 'Túristico', 'Establecimiento especialmente para turistas', '2016-04-20', '17:45:22', '', 1);
INSERT INTO `type_hotel` VALUES (2, 'presidencial', 'para personas muy importantes', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (3, 'Comercial', 'Aquel se lleva con el fin de llevar a cabo un negocio o acuerdo comercial', '2016-04-17', '13:07:06', '', 1);
INSERT INTO `type_hotel` VALUES (4, 'Vacacional', 'Hotel para ir de vacaciones', '2016-04-17', '13:07:06', '', 1);
INSERT INTO `type_hotel` VALUES (5, 'Ecoturistico', 'Hotel para hacer viajes responsables que conservan el entorno y sostienen el bienestar de la comunidad', '2016-04-17', '13:07:06', '', 1);
INSERT INTO `type_hotel` VALUES (6, '1 estrella', 'categoria de 1 estrella', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (7, '2 estrellas', 'con categoria de 2 estrellas', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (8, '3 estrellas', 'con 3 estrellas', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (9, '4 estrellas', 'con 4 estrellas', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (10, '5 estrellas', 'con 5 estrellas', '2016-04-17', '13:07:06', '', 1);

-- ----------------------------
-- Table structure for type_log
-- ----------------------------
DROP TABLE IF EXISTS `type_log`;
CREATE TABLE `type_log`  (
  `ID_TYPE_LOG` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_LOG` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCR_TYPE_LOG` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_LOG` date NOT NULL,
  `TIME_TYPE_LOG` time(0) NOT NULL,
  `IMAGE_TYPE_LOG` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_LOG` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_LOG`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_log
-- ----------------------------
INSERT INTO `type_log` VALUES (1, 'delete', 'eliminacion de tuplas, entodades o atributos', '2016-02-08', '21:40:09', '', 1);
INSERT INTO `type_log` VALUES (2, 'insert', 'agregar tuplas, entidades o atributos en la base de datos', '2016-02-08', '21:40:56', '', 1);
INSERT INTO `type_log` VALUES (3, 'update', 'modificar algun atributo, tupla o entidad en la basee de datos', '2016-02-08', '21:41:45', '', 1);
INSERT INTO `type_log` VALUES (4, 'watch', 'registra todas las solicitudes de conexion a la base de datos', '2016-02-08', '21:42:37', '', 1);

-- ----------------------------
-- Table structure for type_message
-- ----------------------------
DROP TABLE IF EXISTS `type_message`;
CREATE TABLE `type_message`  (
  `ID_TYPE_MESSAGE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_MESSAGE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_MESSAGE` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_MESSAGE` date NOT NULL,
  `TIME_TYPE_MESSAGE` time(0) NOT NULL,
  `IMAGE_TYPE_MESSAGE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_MESSAGE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_MESSAGE`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_message
-- ----------------------------
INSERT INTO `type_message` VALUES (1, 'mensaje', 'envio de mensajes', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (2, 'llegada de huespedes', 'notificacion cuando un cliente se registra', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (3, 'salida de huespedes', 'notificacion cuando un cliente se registra para salir del hotel', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (4, 'alerta', 'recordatorio de un evento', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (5, 'alerta importante', 'recordatorio de un evento importante en el hotel', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (6, 'notificacion solicitud reserva', 'solicitud de reserva de un cliente', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (7, 'validacion reserva', 'confirmacion de reserva de la reserva', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (8, 'usuario nuevo registrado en e hotel', 'cuando es registro del usuairo se ha realizado por el administrador o la recepcionista', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (9, 'alerta reserva', 'reserva de una persona importante en el hotel', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (10, 'observacion', 'observaciones del cliente', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (11, 'sugerencias', 'sugerencias del cliente', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (12, 'notas', 'recordatorios ', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (13, 'quejas', 'nota de quejas de los clientes', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (14, 'usuario nuevo', 'notificacion de nuevo usuario', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (15, 'preguntas de usuario', 'recibe las preguntas de los usuario', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_message` VALUES (16, 'chat', 'chat de usuarios', '2018-01-01', '00:00:00', '', 1);

-- ----------------------------
-- Table structure for type_money
-- ----------------------------
DROP TABLE IF EXISTS `type_money`;
CREATE TABLE `type_money`  (
  `ID_TYPE_MONEY` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_MONEY` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_MONEY` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_MONEY` date NOT NULL,
  `TIME_TYPE_MONEY` time(0) NOT NULL,
  `IMAGE_TYPE_MONEY` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_MONEY` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_MONEY`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_money
-- ----------------------------
INSERT INTO `type_money` VALUES (1, 'Bs', 'Boliviano', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_money` VALUES (2, '$', 'Dolar', '2018-01-01', '00:00:00', '', 1);

-- ----------------------------
-- Table structure for type_phone
-- ----------------------------
DROP TABLE IF EXISTS `type_phone`;
CREATE TABLE `type_phone`  (
  `ID_TYPE_PHONE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_PHONE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_PHONE` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_PHONE` date NOT NULL,
  `TIME_TYPE_PHONE` time(0) NOT NULL,
  `IMAGE_TYPE_PHONE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_PHONE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_PHONE`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_phone
-- ----------------------------
INSERT INTO `type_phone` VALUES (1, 'celular', 'dispositivo movil', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_phone` VALUES (2, 'telefono', 'fijo', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_phone` VALUES (3, 'telefono empresarial', 'telefono de una empresa', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_phone` VALUES (4, 'celular empresarial', 'celular de una empresa', '2018-01-01', '00:00:00', '', 1);

-- ----------------------------
-- Table structure for type_rule
-- ----------------------------
DROP TABLE IF EXISTS `type_rule`;
CREATE TABLE `type_rule`  (
  `ID_TYPE_RULE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_RULE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_RULE` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_RULE` date NOT NULL,
  `TIME_TYPE_RULE` time(0) NOT NULL,
  `IMAGE_TYPE_RULE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_RULE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TYPE_RULE`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_rule
-- ----------------------------
INSERT INTO `type_rule` VALUES (1, 'habitacion', 'reglas que se aplican a la estancia de la habitacion', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_rule` VALUES (2, 'piscina', 'reglas para las piscinas', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_rule` VALUES (3, 'comedor', 'reglas para el comedor', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_rule` VALUES (4, 'reservas', 'reglas para solicitar reservas', '2018-01-01', '00:00:00', '', 1);

-- ----------------------------
-- Table structure for type_service
-- ----------------------------
DROP TABLE IF EXISTS `type_service`;
CREATE TABLE `type_service`  (
  `ID_TYPE_SERVICE` int(2) NOT NULL AUTO_INCREMENT,
  `NAME_TYPE_SERVICE` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION_TYPE_SERVICE` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DATE_TYPE_SERVICE` date NOT NULL,
  `TIME_TYPE_SERVICE` time(0) NOT NULL,
  `IMAGE_TYPE_SERVICE` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `VALUE_TYPE_SERVICE` decimal(2, 0) NOT NULL,
  PRIMARY KEY (`ID_TYPE_SERVICE`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_service
-- ----------------------------
INSERT INTO `type_service` VALUES (1, 'consumo', 'consumo de servicios dentro del establecimiento', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_service` VALUES (2, 'hospedaje', 'registro de habitaciones que no permiten reservas', '2018-01-01', '00:00:00', '', 2);
INSERT INTO `type_service` VALUES (3, 'oferta', 'oferta de servicios por tiempo limitado', '2018-01-01', '00:00:00', '', -2);
INSERT INTO `type_service` VALUES (4, 'registro', 'registro de un huesped en el establecimiento', '2018-01-01', '00:00:00', '', 0);

-- ----------------------------
-- Table structure for user_hotel
-- ----------------------------
DROP TABLE IF EXISTS `user_hotel`;
CREATE TABLE `user_hotel`  (
  `ID_PERSON` int(11) NOT NULL,
  `PASSWORD` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_STATE_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERSON`) USING BTREE,
  INDEX `FK_RELATIONSHIP_71`(`ID_STATE_USER`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_31` FOREIGN KEY (`ID_PERSON`) REFERENCES `person` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_71` FOREIGN KEY (`ID_STATE_USER`) REFERENCES `state_user` (`ID_STATE_USER`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_hotel
-- ----------------------------
INSERT INTO `user_hotel` VALUES (1, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (2, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (3, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (4, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (5, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (6, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (7, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (8, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (9, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (10, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (11, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (12, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (13, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (14, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (15, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (16, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (17, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (18, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (19, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (20, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (21, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (22, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (23, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (24, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (25, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (26, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (27, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (28, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (29, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (30, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (31, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (32, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (33, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (34, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (35, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (36, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (37, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (38, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (39, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (40, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (41, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (42, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (43, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (44, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (45, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (46, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (47, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (48, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (49, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (50, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (51, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (52, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (53, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (54, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (55, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (56, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (57, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (58, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (59, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (60, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (61, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (62, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (63, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (64, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (65, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (66, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (67, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (68, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (69, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (70, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (71, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (72, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (73, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (74, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (75, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (76, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (77, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (78, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (79, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (80, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (81, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (82, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (83, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (84, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (85, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (86, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (87, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (88, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (89, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (90, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (91, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (92, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (93, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (94, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (95, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (96, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (97, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (98, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (99, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (100, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (101, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (102, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (103, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (104, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (105, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (106, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (107, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (108, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (109, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (110, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (111, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (112, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);
INSERT INTO `user_hotel` VALUES (113, '$2y$10$NrzX2e6ez7dtoM92DZG0eOEvxrXRwB8TMzc3aD6CSaTJB79hOan0u', 1);

-- ----------------------------
-- Table structure for user_name
-- ----------------------------
DROP TABLE IF EXISTS `user_name`;
CREATE TABLE `user_name`  (
  `ID_PERSON` int(11) NOT NULL,
  `NAME_USER` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ACTIVE_USER` tinyint(1) NOT NULL,
  `DATE_REGISTER_NAME_USER` date NOT NULL,
  `TIME_REGISTER_NAME_USER` time(0) NOT NULL,
  PRIMARY KEY (`NAME_USER`) USING BTREE,
  INDEX `FK_RELATIONSHIP_80`(`ID_PERSON`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_80` FOREIGN KEY (`ID_PERSON`) REFERENCES `user_hotel` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_name
-- ----------------------------
INSERT INTO `user_name` VALUES (25, '11232454746', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (32, '11235456765', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (29, '11235645754', 1, '2018-09-10', '22:28:58');
INSERT INTO `user_name` VALUES (24, '11236454755', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (23, '11236454765', 1, '2018-07-02', '06:57:32');
INSERT INTO `user_name` VALUES (30, '11237469755', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (97, '13245445134', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (12, '13245645454', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (91, '13456454015', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (6, '13456454565', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (98, '13457469005', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (13, '13457469655', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (92, '14546454135', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (7, '14546454555', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (100, '15465456145', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (15, '15465456465', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (93, '16532454146', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (8, '16532454546', 1, '2018-05-20', '14:31:48');
INSERT INTO `user_name` VALUES (111, '19856445144', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (105, '19856454043', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (107, '19856454118', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (106, '19856454138', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (112, '19856469024', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (69, '21764455555', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (77, '21764555465', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (84, '21764656959', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (73, '21765446554', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (82, '21766846888', 1, '2018-05-15', '13:38:20');
INSERT INTO `user_name` VALUES (79, '21769585988', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (71, '21861145511', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (76, '21863254546', 1, '2018-09-10', '22:28:58');
INSERT INTO `user_name` VALUES (85, '21864444194', 1, '2018-06-04', '19:55:11');
INSERT INTO `user_name` VALUES (80, '21864545454', 1, '2018-07-02', '07:22:32');
INSERT INTO `user_name` VALUES (75, '21864654555', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (70, '21865445681', 1, '2018-07-02', '06:57:32');
INSERT INTO `user_name` VALUES (72, '21865464656', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (78, '21865554545', 1, '2018-05-20', '14:18:56');
INSERT INTO `user_name` VALUES (74, '21865654565', 1, '2018-06-04', '06:02:39');
INSERT INTO `user_name` VALUES (81, '21865769655', 1, '2018-05-15', '14:46:24');
INSERT INTO `user_name` VALUES (83, '21866556465', 1, '2018-07-15', '21:06:49');
INSERT INTO `user_name` VALUES (26, '31235455765', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (94, '31645455105', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (9, '31645455465', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (108, '39856455123', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (20, '41231545711', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (34, '41233244744', 1, '2018-05-15', '14:46:24');
INSERT INTO `user_name` VALUES (19, '41234545781', 1, '2018-06-04', '17:33:26');
INSERT INTO `user_name` VALUES (22, '41234546754', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (18, '41234555755', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (21, '41234564756', 1, '2017-10-17', '12:14:51');
INSERT INTO `user_name` VALUES (27, '41235454745', 1, '2018-06-04', '06:02:39');
INSERT INTO `user_name` VALUES (28, '41235485788', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (33, '41236456759', 1, '2018-07-02', '07:22:32');
INSERT INTO `user_name` VALUES (88, '44111445141', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (3, '44111545511', 1, '2018-05-15', '13:44:43');
INSERT INTO `user_name` VALUES (86, '44544455125', 1, '2018-05-20', '01:21:52');
INSERT INTO `user_name` VALUES (1, '44544555555', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (87, '44554445141', 1, '2018-08-26', '19:34:13');
INSERT INTO `user_name` VALUES (89, '44554464226', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (2, '44554545681', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (4, '44554564656', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (95, '45455454195', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (10, '45455454545', 1, '2017-10-17', '10:23:47');
INSERT INTO `user_name` VALUES (17, '45543244444', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (96, '45695485128', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (11, '45695485988', 1, '2018-05-15', '14:33:31');
INSERT INTO `user_name` VALUES (90, '46454446124', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (5, '46454546554', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (101, '46546456129', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (16, '46546456959', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (102, '49856445133', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (104, '49856446120', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (109, '49856454134', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (103, '49856464228', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (110, '49856485118', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (60, '51665235465', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (63, '53265445454', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (57, '53466434565', 1, '2017-10-17', '10:23:47');
INSERT INTO `user_name` VALUES (64, '53467249655', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (54, '54161335511', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (52, '54564165555', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (55, '54564284656', 1, '2018-05-20', '14:31:48');
INSERT INTO `user_name` VALUES (53, '54564455681', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (58, '54566384555', 1, '2018-05-15', '14:33:31');
INSERT INTO `user_name` VALUES (66, '55465316465', 1, '2018-06-04', '17:33:26');
INSERT INTO `user_name` VALUES (61, '55465344545', 1, '2018-06-04', '17:17:49');
INSERT INTO `user_name` VALUES (65, '55468146888', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (68, '55563554444', 1, '2017-10-17', '12:14:51');
INSERT INTO `user_name` VALUES (62, '55665185988', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (56, '56464206554', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (59, '56562184546', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (67, '56566066959', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (31, '61238946788', 1, '2018-05-20', '14:18:56');
INSERT INTO `user_name` VALUES (99, '65468446128', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (14, '65468946888', 1, '2018-06-04', '17:17:49');
INSERT INTO `user_name` VALUES (113, '69856446114', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (88, '7111445141', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (3, '7111545511', 1, '2018-05-15', '13:44:43');
INSERT INTO `user_name` VALUES (54, '7161335511', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (43, '71684759465', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (20, '7231545711', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (25, '7232454746', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (34, '7233244744', 1, '2018-05-15', '14:46:24');
INSERT INTO `user_name` VALUES (19, '7234545781', 1, '2018-06-04', '17:33:26');
INSERT INTO `user_name` VALUES (22, '7234546754', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (18, '7234555755', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (21, '7234564756', 1, '2017-10-17', '12:14:51');
INSERT INTO `user_name` VALUES (27, '7235454745', 1, '2018-06-04', '06:02:39');
INSERT INTO `user_name` VALUES (26, '7235455765', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (32, '7235456765', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (28, '7235485788', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (29, '7235645754', 1, '2018-09-10', '22:28:58');
INSERT INTO `user_name` VALUES (24, '7236454755', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (23, '7236454765', 1, '2018-07-02', '06:57:32');
INSERT INTO `user_name` VALUES (33, '7236456759', 1, '2018-07-02', '07:22:32');
INSERT INTO `user_name` VALUES (30, '7237469755', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (31, '7238946788', 1, '2018-05-20', '14:18:56');
INSERT INTO `user_name` VALUES (97, '7245445134', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (12, '7245645454', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (63, '7265445454', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (46, '7284349454', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (46, '73284349454', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (47, '73481069655', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (40, '73481459565', 1, '2018-08-26', '19:34:13');
INSERT INTO `user_name` VALUES (37, '74183149511', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (90, '7454446124', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (5, '7454546554', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (95, '7455454195', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (10, '7455454545', 1, '2017-10-17', '10:23:47');
INSERT INTO `user_name` VALUES (91, '7456454015', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (6, '7456454565', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (98, '7457469005', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (13, '7457469655', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (35, '74581359555', 1, '2018-05-15', '13:38:20');
INSERT INTO `user_name` VALUES (41, '74581959555', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (36, '74584749681', 1, '2018-07-15', '21:06:49');
INSERT INTO `user_name` VALUES (38, '74585869656', 1, '2018-06-04', '19:55:11');
INSERT INTO `user_name` VALUES (56, '7464206554', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (66, '7465316465', 1, '2018-06-04', '17:33:26');
INSERT INTO `user_name` VALUES (61, '7465344545', 1, '2018-06-04', '17:17:49');
INSERT INTO `user_name` VALUES (100, '7465456145', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (15, '7465456465', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (57, '7466434565', 1, '2017-10-17', '10:23:47');
INSERT INTO `user_name` VALUES (64, '7467249655', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (65, '7468146888', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (99, '7468446128', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (14, '7468946888', 1, '2018-06-04', '17:17:49');
INSERT INTO `user_name` VALUES (39, '7480249554', 1, '2018-05-20', '01:21:52');
INSERT INTO `user_name` VALUES (47, '7481069655', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (44, '7481359545', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (40, '7481459565', 1, '2018-08-26', '19:34:13');
INSERT INTO `user_name` VALUES (49, '7484859465', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (48, '7485049888', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (93, '7532454146', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (8, '7532454546', 1, '2018-05-20', '14:31:48');
INSERT INTO `user_name` VALUES (17, '7543244444', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (86, '7544455125', 1, '2018-05-20', '01:21:52');
INSERT INTO `user_name` VALUES (1, '7544555555', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (92, '7546454135', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (7, '7546454555', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (101, '7546456129', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (16, '7546456959', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (44, '75481359545', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (49, '75484859465', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (48, '75485049888', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (87, '7554445141', 1, '2018-08-26', '19:34:13');
INSERT INTO `user_name` VALUES (89, '7554464226', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (2, '7554545681', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (4, '7554564656', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (51, '75581149444', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (59, '7562184546', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (68, '7563554444', 1, '2017-10-17', '12:14:51');
INSERT INTO `user_name` VALUES (52, '7564165555', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (55, '7564284656', 1, '2018-05-20', '14:31:48');
INSERT INTO `user_name` VALUES (53, '7564455681', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (67, '7566066959', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (58, '7566384555', 1, '2018-05-15', '14:33:31');
INSERT INTO `user_name` VALUES (45, '75682889988', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (51, '7581149444', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (35, '7581359555', 1, '2018-05-15', '13:38:20');
INSERT INTO `user_name` VALUES (41, '7581959555', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (50, '7583059959', 1, '2018-05-15', '13:44:43');
INSERT INTO `user_name` VALUES (42, '7585759546', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (38, '7585869656', 1, '2018-06-04', '19:55:11');
INSERT INTO `user_name` VALUES (94, '7645455105', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (9, '7645455465', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (39, '76480249554', 1, '2018-05-20', '01:21:52');
INSERT INTO `user_name` VALUES (50, '76583059959', 1, '2018-05-15', '13:44:43');
INSERT INTO `user_name` VALUES (42, '76585759546', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (62, '7665185988', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (60, '7665235465', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (45, '7682889988', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (43, '7684759465', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (96, '7695485128', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (11, '7695485988', 1, '2018-05-15', '14:33:31');
INSERT INTO `user_name` VALUES (37, '77183149511', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (36, '77584749681', 1, '2018-07-15', '21:06:49');
INSERT INTO `user_name` VALUES (69, '7764455555', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (77, '7764555465', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (84, '7764656959', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (73, '7765446554', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (82, '7766846888', 1, '2018-05-15', '13:38:20');
INSERT INTO `user_name` VALUES (79, '7769585988', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (102, '7856445133', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (111, '7856445144', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (113, '7856446114', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (104, '7856446120', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (105, '7856454043', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (107, '7856454118', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (109, '7856454134', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (106, '7856454138', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (108, '7856455123', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (103, '7856464228', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (112, '7856469024', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (110, '7856485118', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (71, '7861145511', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (76, '7863254546', 1, '2018-09-10', '22:28:58');
INSERT INTO `user_name` VALUES (85, '7864444194', 1, '2018-06-04', '19:55:11');
INSERT INTO `user_name` VALUES (80, '7864545454', 1, '2018-07-02', '07:22:32');
INSERT INTO `user_name` VALUES (75, '7864654555', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (70, '7865445681', 1, '2018-07-02', '06:57:32');
INSERT INTO `user_name` VALUES (72, '7865464656', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (78, '7865554545', 1, '2018-05-20', '14:18:56');
INSERT INTO `user_name` VALUES (74, '7865654565', 1, '2018-06-04', '06:02:39');
INSERT INTO `user_name` VALUES (81, '7865769655', 1, '2018-05-15', '14:46:24');
INSERT INTO `user_name` VALUES (83, '7866556465', 1, '2018-07-15', '21:06:49');
INSERT INTO `user_name` VALUES (1, 'admin@gmail.com', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (109, 'adriana_rodriguez_fernandez@gmail.com', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (110, 'agustin_gonzalez_lopez@gmail.com', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (62, 'alberto_ortega_vidal@gmail.com', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (65, 'alejandra_montero@gmail.com', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (25, 'alejandro_ruiz_gonzalez_garcia@gmail.com', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (57, 'alfredo_ortiz_perez_gonzalez@gmail.com', 1, '2017-10-17', '10:23:47');
INSERT INTO `user_name` VALUES (59, 'alicia_gonzalez_gonzalez_herrero@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (86, 'ana_maria_lopez_gonzalez@gmail.com', 1, '2018-05-20', '01:21:52');
INSERT INTO `user_name` VALUES (103, 'andrea_fernandez_rodriguez@gmail.com', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (83, 'andres_rodriguez_perez@gmail.com', 1, '2018-07-15', '21:06:49');
INSERT INTO `user_name` VALUES (75, 'angel_martinez_perez@gmail.com', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (91, 'antonia_lorenzo@gmail.com', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (21, 'antonio_gomez_martinez_garcia@gmail.com', 1, '2017-10-17', '12:14:51');
INSERT INTO `user_name` VALUES (102, 'araceli_fernandez_gonzalez@gmail.com', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (64, 'armando_guerrero@gmail.com', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (45, 'arturo_garcia_lopez_gonzalez_perez@gmail.com', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (6, 'bernarda@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (33, 'carlos_alonso_sanchez_lopez@gmail.com', 1, '2018-07-02', '07:22:32');
INSERT INTO `user_name` VALUES (107, 'carmen_gallego@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (3, 'cliente@gmail.com', 1, '2018-05-15', '13:44:43');
INSERT INTO `user_name` VALUES (10, 'cocina@gmail.com', 1, '2017-10-17', '10:23:47');
INSERT INTO `user_name` VALUES (32, 'daniel_munoz_nunez@gmail.com', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (42, 'david_lopez_garcia_rubio@gmail.com', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (101, 'diego_calvo@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (37, 'eduardo_torres_rojas@gmail.com', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (73, 'elizabeth_mendoza@gmail.com', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (7, 'email@gmail.com', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (49, 'enrique_flores_rodriguez_garcia@gmail.com', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (95, 'felipe_robles@gmail.com', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (31, 'fernando_perez_perez_rodriguez_rodriguez@gmail.com', 1, '2018-05-20', '14:18:56');
INSERT INTO `user_name` VALUES (56, 'francisca_martinez_martinez_arias@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (48, 'francisco_javier_gil_garrido@gmail.com', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (17, 'francisco_sanchez_mendez@gmail.com', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (76, 'gabriela_perez_sanchez@gmail.com', 1, '2018-09-10', '22:28:58');
INSERT INTO `user_name` VALUES (82, 'gabriel_duran@gmail.com', 1, '2018-05-15', '13:38:20');
INSERT INTO `user_name` VALUES (51, 'gerardo_blanco_aguilar@gmail.com', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (74, 'gloria_lopez_sanchez@gmail.com', 1, '2018-06-04', '06:02:39');
INSERT INTO `user_name` VALUES (18, 'guadalupe_martinez_castillo@gmail.com', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (85, 'guillermo_cabrera@gmail.com', 1, '2018-06-04', '19:55:11');
INSERT INTO `user_name` VALUES (112, 'gustavo_ventura@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (106, 'irma_pascual@gmail.com', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (104, 'isabel_merino@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (97, 'jaime_perez_gomez@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (38, 'javier_suarez_reyes@gmail.com', 1, '2018-06-04', '19:55:11');
INSERT INTO `user_name` VALUES (22, 'jesus_martin_fernandez_garcia@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (34, 'jorge_gutierrez_vega@gmail.com', 1, '2018-05-15', '14:46:24');
INSERT INTO `user_name` VALUES (96, 'jorge_jesus_mora@gmail.com', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (43, 'josefina_dominguez_garcia_martinez@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (44, 'jose_antonio_ramos_pena@gmail.com', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (100, 'jose_de_jesus_hidalgo@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (98, 'jose_guadalupe_gonzales@gmail.com', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (14, 'jose_luis_lopez_garcia_sanchez@gmail.com', 1, '2018-09-15', '15:31:39');
INSERT INTO `user_name` VALUES (47, 'jose_manuel_castro_lozano@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (15, 'jose_perez_garcia_fernandez@gmail.com', 1, '2018-09-15', '15:37:26');
INSERT INTO `user_name` VALUES (20, 'juana_fernandez_marquez@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (29, 'juan_carlos_lopez_lopez_sanchez_garcia@gmail.com', 1, '2018-09-10', '22:28:58');
INSERT INTO `user_name` VALUES (13, 'juan_garcia_morrell@gmail.com', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (71, 'juan_manuel_fernandez_lopez@gmail.com', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (99, 'julio_cesar_perez_rodriguez@gmail.com', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (53, 'leticia_fernandez_sanchez_perez@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (108, 'lucia_marti@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (11, 'luis@gmail.com', 1, '2018-05-15', '14:33:31');
INSERT INTO `user_name` VALUES (93, 'luis_angel_gracia@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (63, 'luis_prieto@gmail.com', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (8, 'mamanuel@gmail.com', 1, '2018-05-20', '14:31:48');
INSERT INTO `user_name` VALUES (9, 'manuel1@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (26, 'manuel_diaz_medina@gmail.com', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (46, 'marco_antonio_garcia_perez_ferrer@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (27, 'margarita_alvarez_lopez_perez@gmail.com', 1, '2018-06-04', '06:02:39');
INSERT INTO `user_name` VALUES (12, 'mariap@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (28, 'maria_del_carmen_jimenez_herrera@gmail.com', 1, '2018-09-15', '16:07:39');
INSERT INTO `user_name` VALUES (94, 'maria_del_rosario_caballero@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (80, 'maria_de_guadalupe_rios@gmail.com', 1, '2018-07-02', '07:22:32');
INSERT INTO `user_name` VALUES (81, 'maria_de_jesus_carrasco@gmail.com', 1, '2018-05-15', '14:46:24');
INSERT INTO `user_name` VALUES (111, 'maria_de_la_luz_gomez_perez@gmail.com', 1, '2018-09-15', '16:01:31');
INSERT INTO `user_name` VALUES (70, 'maria_de_los_angeles_vargas@gmail.com', 1, '2018-07-02', '06:57:32');
INSERT INTO `user_name` VALUES (52, 'maria_elena_sanchez_garcia_rodriguez@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (60, 'maria_fernanda_santos_gimenez@gmail.com', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (16, 'maria_guadalupe_gonzalez_delgado@gmail.com', 1, '2018-09-15', '16:00:54');
INSERT INTO `user_name` VALUES (88, 'maria_isabel_salazar@gmail.com', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (92, 'maria_luisa_perez_martinez@gmail.com', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (19, 'maria_rodriguez_garcia_gonzalez@gmail.com', 1, '2018-06-04', '17:33:26');
INSERT INTO `user_name` VALUES (105, 'maria_teresa_martinez_sanchez@gmail.com', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (113, 'mariogarnica@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (55, 'mario_molina_gonzalez_fernandez@gmail.com', 1, '2018-05-20', '14:31:48');
INSERT INTO `user_name` VALUES (66, 'martha_cortes@gmail.com', 1, '2018-06-04', '17:33:26');
INSERT INTO `user_name` VALUES (40, 'martin_vazquez_campos@gmail.com', 1, '2018-08-26', '19:34:13');
INSERT INTO `user_name` VALUES (23, 'miguel_angel_garcia_garcia_cruz@gmail.com', 1, '2018-07-02', '06:57:32');
INSERT INTO `user_name` VALUES (36, 'miguel_sanz_gomez_gomez@gmail.com', 1, '2018-07-15', '21:06:49');
INSERT INTO `user_name` VALUES (84, 'oscar_garcia_gomez@gmail.com', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (89, 'pablo_rivera@gmail.com', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (69, 'patricia_soto@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (24, 'pedro_hernandez_martin_martin@gmail.com', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (5, 'pepe@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (39, 'rafael_ramirez_luna@gmail.com', 1, '2018-05-20', '01:21:52');
INSERT INTO `user_name` VALUES (87, 'ramon_martin_garcia@gmail.com', 1, '2018-08-26', '19:34:13');
INSERT INTO `user_name` VALUES (41, 'raul_navarro_martinez_lopez@gmail.com', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (2, 'recepcion@gmail.com', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (35, 'ricardo_romero_iglesias@gmail.com', 1, '2018-05-15', '13:38:20');
INSERT INTO `user_name` VALUES (30, 'roberto_moreno_marin@gmail.com', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (72, 'rosa_maria_lopez_fernandez@gmail.com', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (54, 'rosa_serrano_cano@gmail.com', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (90, 'ruben_garcia_martin@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (77, 'salvador_lopez_martinez@gmail.com', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (67, 'santiago_ruiz_ruiz@gmail.com', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (61, 'sergio_perez_garcia_fuentes@gmail.com', 1, '2018-06-04', '17:17:49');
INSERT INTO `user_name` VALUES (4, 'servicio@gmail.com', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (79, 'silvia_saez@gmail.com', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (58, 'teresa_perez_lopez_rodriguez_lopez@gmail.com', 1, '2018-05-15', '14:33:31');
INSERT INTO `user_name` VALUES (50, 'veronica_morales_leon@gmail.com', 1, '2018-05-15', '13:44:43');
INSERT INTO `user_name` VALUES (78, 'victor_manuel_guzman@gmail.com', 1, '2018-05-20', '14:18:56');
INSERT INTO `user_name` VALUES (68, 'yolanda_santana@gmail.com', 1, '2017-10-17', '12:14:51');

-- ----------------------------
-- Table structure for user_rol
-- ----------------------------
DROP TABLE IF EXISTS `user_rol`;
CREATE TABLE `user_rol`  (
  `ID_PERSON` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `DATE_CREATED_ROL` date NOT NULL,
  `TIME_CREATED_ROL` time(0) NOT NULL,
  PRIMARY KEY (`ID_PERSON`, `ID_ROL`) USING BTREE,
  INDEX `FK_RELATIONSHIP_6`(`ID_ROL`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_PERSON`) REFERENCES `user_hotel` (`ID_PERSON`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_rol
-- ----------------------------
INSERT INTO `user_rol` VALUES (1, 1, '2018-06-04', '06:02:39');
INSERT INTO `user_rol` VALUES (2, 2, '2017-06-17', '23:46:33');
INSERT INTO `user_rol` VALUES (3, 3, '2017-06-17', '23:48:11');
INSERT INTO `user_rol` VALUES (4, 4, '2017-10-17', '10:21:58');
INSERT INTO `user_rol` VALUES (5, 5, '2017-10-17', '12:06:30');
INSERT INTO `user_rol` VALUES (6, 1, '2017-10-17', '12:14:50');
INSERT INTO `user_rol` VALUES (7, 2, '2017-10-17', '12:16:13');
INSERT INTO `user_rol` VALUES (8, 3, '2017-10-17', '12:18:28');
INSERT INTO `user_rol` VALUES (9, 4, '2017-10-17', '12:20:02');
INSERT INTO `user_rol` VALUES (10, 5, '2018-05-31', '22:31:25');
INSERT INTO `user_rol` VALUES (11, 3, '2018-05-15', '13:44:43');
INSERT INTO `user_rol` VALUES (12, 3, '2018-05-15', '14:29:20');
INSERT INTO `user_rol` VALUES (13, 3, '2018-05-20', '00:24:10');
INSERT INTO `user_rol` VALUES (14, 3, '2018-05-20', '01:21:52');
INSERT INTO `user_rol` VALUES (15, 3, '2018-05-20', '01:43:14');
INSERT INTO `user_rol` VALUES (16, 3, '2018-05-20', '14:18:08');
INSERT INTO `user_rol` VALUES (17, 3, '2018-05-31', '22:31:18');
INSERT INTO `user_rol` VALUES (18, 3, '2018-06-04', '19:55:11');
INSERT INTO `user_rol` VALUES (19, 3, '2017-06-04', '20:31:43');
INSERT INTO `user_rol` VALUES (20, 3, '2018-06-05', '06:28:14');
INSERT INTO `user_rol` VALUES (21, 3, '2018-06-11', '04:45:10');
INSERT INTO `user_rol` VALUES (22, 3, '2018-09-09', '18:42:36');
INSERT INTO `user_rol` VALUES (23, 3, '2018-09-09', '19:05:35');
INSERT INTO `user_rol` VALUES (24, 3, '2018-09-09', '20:23:50');
INSERT INTO `user_rol` VALUES (25, 3, '2018-09-10', '22:16:50');
INSERT INTO `user_rol` VALUES (26, 3, '2017-06-17', '20:30:34');
INSERT INTO `user_rol` VALUES (27, 3, '2018-06-04', '06:02:39');
INSERT INTO `user_rol` VALUES (28, 3, '2017-06-17', '23:46:33');
INSERT INTO `user_rol` VALUES (29, 3, '2017-06-17', '23:48:11');
INSERT INTO `user_rol` VALUES (30, 3, '2017-10-17', '10:21:58');
INSERT INTO `user_rol` VALUES (31, 3, '2017-10-17', '12:06:30');
INSERT INTO `user_rol` VALUES (32, 3, '2017-10-17', '12:14:50');
INSERT INTO `user_rol` VALUES (33, 3, '2017-10-17', '12:16:13');
INSERT INTO `user_rol` VALUES (34, 3, '2017-10-17', '12:18:28');
INSERT INTO `user_rol` VALUES (35, 3, '2017-10-17', '12:20:02');
INSERT INTO `user_rol` VALUES (36, 3, '2018-05-31', '22:31:25');
INSERT INTO `user_rol` VALUES (37, 3, '2018-05-15', '13:44:43');
INSERT INTO `user_rol` VALUES (38, 3, '2018-05-15', '14:29:20');
INSERT INTO `user_rol` VALUES (39, 3, '2018-05-20', '00:24:10');
INSERT INTO `user_rol` VALUES (40, 3, '2018-05-20', '01:21:52');
INSERT INTO `user_rol` VALUES (41, 3, '2018-05-20', '01:43:14');
INSERT INTO `user_rol` VALUES (42, 3, '2018-05-20', '14:18:08');
INSERT INTO `user_rol` VALUES (43, 3, '2018-05-31', '22:31:18');
INSERT INTO `user_rol` VALUES (44, 3, '2018-06-04', '19:55:11');
INSERT INTO `user_rol` VALUES (45, 3, '2017-06-04', '20:31:43');
INSERT INTO `user_rol` VALUES (46, 3, '2018-06-05', '06:28:14');
INSERT INTO `user_rol` VALUES (47, 3, '2018-06-11', '04:45:10');
INSERT INTO `user_rol` VALUES (48, 3, '2018-09-09', '18:42:36');
INSERT INTO `user_rol` VALUES (49, 3, '2018-09-09', '19:05:35');
INSERT INTO `user_rol` VALUES (50, 3, '2018-09-09', '20:23:50');
INSERT INTO `user_rol` VALUES (51, 3, '2018-09-10', '22:16:50');
INSERT INTO `user_rol` VALUES (52, 3, '2017-06-17', '20:30:34');
INSERT INTO `user_rol` VALUES (53, 3, '2018-06-04', '06:02:39');
INSERT INTO `user_rol` VALUES (54, 3, '2017-06-17', '23:46:33');
INSERT INTO `user_rol` VALUES (55, 3, '2017-06-17', '23:48:11');
INSERT INTO `user_rol` VALUES (56, 3, '2017-10-17', '10:21:58');
INSERT INTO `user_rol` VALUES (57, 3, '2017-10-17', '12:06:30');
INSERT INTO `user_rol` VALUES (58, 3, '2017-10-17', '12:14:50');
INSERT INTO `user_rol` VALUES (59, 3, '2017-10-17', '12:16:13');
INSERT INTO `user_rol` VALUES (60, 3, '2017-10-17', '12:18:28');
INSERT INTO `user_rol` VALUES (61, 3, '2017-10-17', '12:20:02');
INSERT INTO `user_rol` VALUES (62, 3, '2018-05-31', '22:31:25');
INSERT INTO `user_rol` VALUES (63, 3, '2018-05-15', '13:44:43');
INSERT INTO `user_rol` VALUES (64, 3, '2018-05-15', '14:29:20');
INSERT INTO `user_rol` VALUES (65, 3, '2018-05-20', '00:24:10');
INSERT INTO `user_rol` VALUES (66, 3, '2018-05-20', '01:21:52');
INSERT INTO `user_rol` VALUES (67, 3, '2018-05-20', '01:43:14');
INSERT INTO `user_rol` VALUES (68, 3, '2018-05-20', '14:18:08');
INSERT INTO `user_rol` VALUES (69, 3, '2018-05-31', '22:31:18');
INSERT INTO `user_rol` VALUES (70, 3, '2018-06-04', '19:55:11');
INSERT INTO `user_rol` VALUES (71, 3, '2017-06-04', '20:31:43');
INSERT INTO `user_rol` VALUES (72, 3, '2018-06-05', '06:28:14');
INSERT INTO `user_rol` VALUES (73, 3, '2018-06-11', '04:45:10');
INSERT INTO `user_rol` VALUES (74, 3, '2018-09-09', '18:42:36');
INSERT INTO `user_rol` VALUES (75, 3, '2018-09-09', '19:05:35');
INSERT INTO `user_rol` VALUES (76, 3, '2018-09-09', '20:23:50');
INSERT INTO `user_rol` VALUES (77, 3, '2018-09-10', '22:16:50');
INSERT INTO `user_rol` VALUES (78, 3, '2017-06-17', '20:30:34');
INSERT INTO `user_rol` VALUES (79, 3, '2018-06-04', '06:02:39');
INSERT INTO `user_rol` VALUES (80, 3, '2017-06-17', '23:46:33');
INSERT INTO `user_rol` VALUES (81, 3, '2017-06-17', '23:48:11');
INSERT INTO `user_rol` VALUES (82, 3, '2017-10-17', '10:21:58');
INSERT INTO `user_rol` VALUES (83, 3, '2017-10-17', '12:06:30');
INSERT INTO `user_rol` VALUES (84, 3, '2017-10-17', '12:14:50');
INSERT INTO `user_rol` VALUES (85, 3, '2017-10-17', '12:16:13');
INSERT INTO `user_rol` VALUES (86, 3, '2017-10-17', '12:18:28');
INSERT INTO `user_rol` VALUES (87, 3, '2017-10-17', '12:20:02');
INSERT INTO `user_rol` VALUES (88, 3, '2018-05-31', '22:31:25');
INSERT INTO `user_rol` VALUES (89, 3, '2018-05-15', '13:44:43');
INSERT INTO `user_rol` VALUES (90, 3, '2018-05-15', '14:29:20');
INSERT INTO `user_rol` VALUES (91, 3, '2018-05-20', '00:24:10');
INSERT INTO `user_rol` VALUES (92, 3, '2018-05-20', '01:21:52');
INSERT INTO `user_rol` VALUES (93, 3, '2018-05-20', '01:43:14');
INSERT INTO `user_rol` VALUES (94, 3, '2018-05-20', '14:18:08');
INSERT INTO `user_rol` VALUES (95, 3, '2018-05-31', '22:31:18');
INSERT INTO `user_rol` VALUES (96, 3, '2018-06-04', '19:55:11');
INSERT INTO `user_rol` VALUES (97, 3, '2017-06-04', '20:31:43');
INSERT INTO `user_rol` VALUES (98, 3, '2018-06-05', '06:28:14');
INSERT INTO `user_rol` VALUES (99, 3, '2018-06-11', '04:45:10');
INSERT INTO `user_rol` VALUES (100, 3, '2018-09-09', '18:42:36');
INSERT INTO `user_rol` VALUES (101, 3, '2018-09-09', '19:05:35');
INSERT INTO `user_rol` VALUES (102, 3, '2018-09-09', '20:23:50');
INSERT INTO `user_rol` VALUES (103, 3, '2018-09-10', '22:16:50');
INSERT INTO `user_rol` VALUES (104, 3, '2017-06-17', '20:30:34');
INSERT INTO `user_rol` VALUES (105, 3, '2018-06-04', '06:02:39');
INSERT INTO `user_rol` VALUES (106, 3, '2017-06-17', '23:46:33');
INSERT INTO `user_rol` VALUES (107, 3, '2017-06-17', '23:48:11');
INSERT INTO `user_rol` VALUES (108, 3, '2017-10-17', '10:21:58');
INSERT INTO `user_rol` VALUES (109, 3, '2017-10-17', '12:06:30');
INSERT INTO `user_rol` VALUES (110, 3, '2017-10-17', '12:14:50');
INSERT INTO `user_rol` VALUES (111, 3, '2017-10-17', '12:16:13');
INSERT INTO `user_rol` VALUES (112, 3, '2017-10-17', '12:18:28');
INSERT INTO `user_rol` VALUES (113, 3, '2017-10-17', '12:20:02');

SET FOREIGN_KEY_CHECKS = 1;

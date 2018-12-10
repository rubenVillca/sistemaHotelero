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

 Date: 15/09/2018 12:16:14
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
INSERT INTO `activity` VALUES (1, 3, 2, 'Matrimonio de juan con juana', 'recepcion de la boda en el auditorio. las entradas tienen un pase ', '2017-06-30', '09:30:00', '2017-06-30', '18:00:00', 'img/activity/20170618000142.jpg');
INSERT INTO `activity` VALUES (2, 5, 2, 'Concierto de aeroesmith en el auditorio', 'presentacion del grupo aroesmit festejando su aniversario. buscar<br>entradas en recepcion', '2017-07-04', '12:00:00', '2017-07-04', '22:30:00', 'img/activity/20170618000324.jpg');
INSERT INTO `activity` VALUES (3, 4, 2, 'Recepcion de aÃ±o nuevo', 'se celebrara la llegada del aÃ±o nuevo', '2017-08-06', '17:00:00', '2017-08-07', '04:00:00', 'img/activity/20170618001354.jpg');
INSERT INTO `activity` VALUES (4, 4, 2, 'Navidad', 'Recepcion a la nohce buena', '2017-12-24', '00:00:00', '2017-12-25', '00:00:00', 'img/activity/20170618000733.jpg');
INSERT INTO `activity` VALUES (5, 3, 1, 'fgdf', 'gdggf', '2018-05-13', '00:00:00', '2018-05-13', '00:00:00', 'img/activity/20180513193455.jpg');
INSERT INTO `activity` VALUES (6, 1, 1, 'fgdg', 'ffgdfg', '2018-05-13', '00:00:00', '2018-05-24', '00:00:00', '');
INSERT INTO `activity` VALUES (7, 2, 1, 'fgff', 'dgdfgf', '2018-05-13', '00:00:00', '2018-05-25', '00:00:00', 'img/activity/20180513193554.jpg');
INSERT INTO `activity` VALUES (8, 1, 2, 'sdf', 'dfdd', '2018-05-13', '00:00:00', '2018-06-01', '00:00:00', 'img/activity/20180513204827.jpg');
INSERT INTO `activity` VALUES (9, 2, 2, 'navidad', 'esta es la navidad', '2018-12-25', '00:00:00', '2018-12-25', '23:59:00', 'img/activity/20180604002859.jpg');
INSERT INTO `activity` VALUES (10, 4, 2, 'AÃ±o nuevo', 'inicio del nuevo aÃ±o', '2017-12-31', '17:00:00', '2018-01-01', '05:00:00', 'img/activity/20180604003056.jpg');
INSERT INTO `activity` VALUES (11, 4, 2, 'AÃ±o nuevo', 'AÃ±o nuevo', '2017-01-31', '00:00:00', '2018-01-01', '00:00:00', 'img/activity/20180604003223.jpg');
INSERT INTO `activity` VALUES (12, 4, 2, 'AÃ±o nuevo', 'AÃ±o nuevo', '2018-12-31', '00:00:00', '2019-01-01', '00:00:00', 'img/activity/20180604003342.jpg');
INSERT INTO `activity` VALUES (13, 4, 2, 'DÃ­a del Estado Plurinacional', 'DÃ­a del Estado Plurinacional', '2019-01-22', '00:00:00', '2019-01-22', '23:59:00', 'img/activity/20180604004407.jpg');
INSERT INTO `activity` VALUES (14, 4, 2, 'Carnaval', 'Carnaval', '2019-02-12', '00:00:00', '2019-02-13', '23:59:00', 'img/activity/20180604004602.jpg');
INSERT INTO `activity` VALUES (15, 4, 2, 'Viernes Santo', 'Viernes Santo', '2019-03-30', '00:00:00', '2019-03-30', '23:59:00', 'img/activity/20180604004718.jpg');
INSERT INTO `activity` VALUES (16, 4, 2, 'Dia del trabajo', 'Dia del trabajo', '2019-05-01', '00:00:00', '2019-05-01', '23:59:00', 'img/activity/20180604004849.jpg');
INSERT INTO `activity` VALUES (17, 4, 2, 'Corpus Christi', 'Corpus Christi', '2019-05-31', '00:00:00', '2019-05-31', '23:59:00', 'img/activity/20180604005037.jpg');
INSERT INTO `activity` VALUES (18, 4, 2, 'AÃ±o Nuevo Aymara', 'AÃ±o Nuevo Aymara', '2018-06-21', '00:00:00', '2018-06-21', '23:59:00', 'img/activity/20180604005137.jpg');
INSERT INTO `activity` VALUES (19, 4, 2, 'DÃ­a de la Independencia', 'DÃ­a de la Independencia', '2018-08-06', '00:00:00', '2018-08-06', '23:59:00', 'img/activity/20180604005243.jpg');
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, 'Llaves de la habitac', 'Llaves de ingreso a l habitacion<br>', 1, 1);
INSERT INTO `article` VALUES (2, 'Control remoto', 'Control de la televicion<br>', 1, 1);
INSERT INTO `article` VALUES (3, 'Toallas', 'toallas', 1, 2);
INSERT INTO `article` VALUES (4, 'articulo nuvo', 'soy nuvodddddd<br>', -1, 10);

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
INSERT INTO `article_consum` VALUES (1, 60, 2);
INSERT INTO `article_consum` VALUES (2, 60, 2);
INSERT INTO `article_consum` VALUES (3, 60, 2);

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
INSERT INTO `card` VALUES (1, 24, '2444455555555555', 1, 1, 2019, 135, 0, '$', 200.00);

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
INSERT INTO `check_person` VALUES (22, 33, 2, 1, 2, '2017-06-04', '20:31:23', '2017-06-05', '20:31:23', '', 2, '2017-06-04', '20:31:43', '2017-06-04', '20:31:43');
INSERT INTO `check_person` VALUES (23, 34, 2, 1, 6, '2018-06-05', '06:27:45', '2018-06-11', '04:38:43', '', 3, '2018-06-05', '06:28:14', '2018-06-05', '06:28:14');
INSERT INTO `check_person` VALUES (24, 3, 2, 1, 6, '2018-06-11', '04:44:49', '2018-09-10', '21:57:29', '', 3, '2018-06-11', '04:45:10', '2018-06-11', '04:45:10');
INSERT INTO `check_person` VALUES (25, 38, 38, 1, 8, '2018-07-03', '06:00:00', '2018-07-04', '06:00:00', '', 1, '2018-07-02', '07:22:32', '2018-07-15', '19:20:51');
INSERT INTO `check_person` VALUES (26, 39, 39, 1, 8, '2018-07-16', '06:00:00', '2018-07-17', '06:00:00', '', 1, '2018-07-15', '21:06:49', '2018-09-08', '22:38:30');
INSERT INTO `check_person` VALUES (27, 40, 1, 1, 8, '2018-09-10', '06:00:00', '2018-09-11', '06:00:00', '', 1, '2018-09-09', '18:40:57', '2018-09-10', '21:57:01');
INSERT INTO `check_person` VALUES (28, 3, 1, 1, 2, '2018-09-09', '18:41:21', '2018-09-10', '18:41:21', '', 2, '2018-09-09', '18:42:36', '2018-09-09', '18:42:36');
INSERT INTO `check_person` VALUES (29, 3, 1, 1, 2, '2018-09-09', '19:05:26', '2018-09-10', '19:05:26', '', 2, '2018-09-09', '19:05:35', '2018-09-09', '19:05:35');
INSERT INTO `check_person` VALUES (30, 3, 1, 1, 8, '2018-09-09', '20:16:50', '2018-09-10', '20:16:50', '', 2, '2018-09-09', '20:23:50', '2018-09-10', '21:57:01');
INSERT INTO `check_person` VALUES (31, 3, 1, 1, 5, '2018-09-10', '22:16:27', '2018-09-11', '22:16:27', '', 2, '2018-09-10', '22:16:51', '2018-09-10', '22:16:51');

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
INSERT INTO `consume_service` VALUES (59, 22, 3, 1, '2017-06-04', '20:31:23', '2017-06-05', '20:31:23', 0.00, 100.00, 'Consumo habitacion', -1, 1, '', '');
INSERT INTO `consume_service` VALUES (60, 23, 3, 1, '2018-06-05', '06:27:45', '2018-06-06', '06:27:45', 100.00, 100.00, 'Consumo habitacion', 0, 1, '', '');
INSERT INTO `consume_service` VALUES (61, 24, 3, 1, '2018-06-11', '04:44:49', '2018-06-12', '04:44:49', 100.00, 100.00, 'Consumo habitacion', 0, 1, '', '');
INSERT INTO `consume_service` VALUES (62, 24, 3, 1, '2018-06-11', '04:44:49', '2018-06-12', '04:44:49', 100.00, 100.00, 'Consumo habitacion', 0, 1, '', '');
INSERT INTO `consume_service` VALUES (63, 25, 3, 4, '2018-07-03', '06:00:00', '2018-07-04', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', '');
INSERT INTO `consume_service` VALUES (64, 26, 3, 4, '2018-07-16', '06:00:00', '2018-07-17', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', '');
INSERT INTO `consume_service` VALUES (65, 26, 3, 4, '2018-07-16', '06:00:00', '2018-07-17', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', '');
INSERT INTO `consume_service` VALUES (66, 27, 3, 1, '2018-09-10', '06:00:00', '2018-09-11', '06:00:00', 0.00, 100.00, 'Reserva', 1, 1, '', '');
INSERT INTO `consume_service` VALUES (67, 27, 3, 4, '2018-09-10', '06:00:00', '2018-09-11', '06:00:00', 0.00, 300.00, 'Reserva', 1, 1, '', '');
INSERT INTO `consume_service` VALUES (68, 28, 3, 1, '2018-09-09', '18:41:21', '2018-09-10', '18:41:21', 100.00, 100.00, 'Consumo habitacion', -1, 1, '', '');
INSERT INTO `consume_service` VALUES (69, 28, 3, 4, '2018-09-09', '18:41:21', '2018-09-10', '18:41:21', 500.00, 300.00, 'Consumo habitacion', -1, 1, '', '');
INSERT INTO `consume_service` VALUES (70, 29, 3, 1, '2018-09-09', '19:05:26', '2018-09-10', '19:05:26', 100.00, 100.00, 'Consumo habitacion', -1, 1, '', '');
INSERT INTO `consume_service` VALUES (71, 29, 3, 1, '2018-09-09', '19:05:26', '2018-09-10', '19:05:26', 200.00, 100.00, 'Consumo habitacion', -1, 1, '', '');
INSERT INTO `consume_service` VALUES (72, 30, 3, 5, '2018-09-09', '20:16:50', '2018-09-10', '20:16:50', 500.00, 500.00, 'Consumo habitacion', 0, 1, '', '');
INSERT INTO `consume_service` VALUES (73, 30, 3, 4, '2018-09-09', '20:16:50', '2018-09-10', '20:16:50', 301.00, 300.00, 'Consumo habitacion', 0, 1, '', '');
INSERT INTO `consume_service` VALUES (74, 31, 3, 1, '2018-09-10', '22:16:27', '2018-09-11', '22:16:27', 100.00, 100.00, 'Consumo habitacion', 0, 1, '', '');
INSERT INTO `consume_service` VALUES (75, 31, 3, 1, '2018-09-10', '22:16:27', '2018-09-11', '22:16:27', 100.00, 100.00, 'Consumo habitacion', 0, 1, '', '');

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
INSERT INTO `cost_food` VALUES (2, 1, 1, 20.00, 0, 5, '22:29:13', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (3, 1, 1, 40.00, 0, 0, '23:35:09', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (4, 1, 1, 50.00, 0, 0, '23:36:08', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (5, 1, 1, 35.00, 0, 0, '23:37:34', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (6, 1, 1, 25.00, 0, 10, '23:38:42', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (7, 1, 1, 15.00, 0, 3, '23:40:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (8, 1, 1, 25.00, 0, 12, '23:41:15', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (9, 1, 1, 12.00, 0, 0, '23:42:12', '2017-06-17', 1);
INSERT INTO `cost_food` VALUES (10, 1, 1, 15.00, 0, 0, '23:42:53', '2017-06-17', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cost_service
-- ----------------------------
INSERT INTO `cost_service` VALUES (1, 1, 1, 1, 1, 0, 100.00, 50, 0, 1, '21:54:48', '2017-06-17');
INSERT INTO `cost_service` VALUES (2, 2, 1, 1, 1, 0, 180.00, 20, 0, 1, '21:55:44', '2017-06-17');
INSERT INTO `cost_service` VALUES (3, 3, 1, 1, 0, 1, 15.00, 100, 0, 1, '21:58:56', '2017-06-17');
INSERT INTO `cost_service` VALUES (4, 4, 1, 1, 1, 0, 300.00, 10, 0, 1, '22:00:00', '2017-06-17');
INSERT INTO `cost_service` VALUES (5, 5, 1, 1, 1, 0, 500.00, 0, 0, 1, '22:01:11', '2017-06-17');
INSERT INTO `cost_service` VALUES (6, 6, 1, 1, 0, 1, 0.00, 0, 0, 1, '22:02:12', '2017-06-17');
INSERT INTO `cost_service` VALUES (7, 7, 1, 1, 1, 0, 0.00, 0, 0, 1, '22:03:44', '2017-06-17');
INSERT INTO `cost_service` VALUES (8, 8, 1, 1, 0, 0, 40.00, 0, 0, 0, '00:22:03', '2017-06-18');
INSERT INTO `cost_service` VALUES (9, 8, 1, 1, 0, 1, 40.00, 0, 0, 1, '00:22:18', '2017-06-18');
INSERT INTO `cost_service` VALUES (10, 9, 1, 1, 1, 0, 80.00, 10, 0, 1, '17:58:33', '2017-10-15');
INSERT INTO `cost_service` VALUES (11, 10, 1, 1, 1, 0, 40.00, 0, 0, 1, '18:00:14', '2017-10-15');
INSERT INTO `cost_service` VALUES (12, 11, 1, 3, 0, 0, 100.00, 0, 0, 1, '18:01:16', '2017-10-15');

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

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
INSERT INTO `inquest` VALUES (1, 1, 5, 'Preguntas frecuentes', 'Preguntas realizadas por los clientes', '2017-06-17', '22:06:13', '2018-01-01', '00:00:00');
INSERT INTO `inquest` VALUES (2, 1, 1, 'Encuesta de satisfaccion', 'Estimado cliente.<br>Con el fin de mejorar la calidad de nuestros servicios y asegurar la satisfacciÃ³n de todos nuestros visitantes, agradecerÃ­amos respondiera a este cuestionario. PuntuÃ© del 1 (Muy mal) al 5 (muy bien) los siguientes aspectos de este establecimiento.', '2017-06-18', '00:00:00', '2017-07-31', '00:00:00');
INSERT INTO `inquest` VALUES (3, 1, 1, 'Encuesta decalidad de la comida', 'Estimado cliente.<br>Con el fin de mejorar la calidad de nuestros servicios y asegurar la satisfacciÃ³n de todos nuestros visitantes, agradecerÃ­amos respondiera a este cuestionario. ', '2017-06-18', '00:00:00', '2017-12-08', '00:00:00');
INSERT INTO `inquest` VALUES (4, 1, 1, 'Preguntas de fidelizacion', 'Preguntas sobre el estado del hotel y los servicios', '2017-06-26', '00:00:00', '2018-02-28', '00:00:00');
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
INSERT INTO `member_check` VALUES (3, 60, 1);
INSERT INTO `member_check` VALUES (3, 61, 1);
INSERT INTO `member_check` VALUES (3, 62, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 1, '23:43:33', '2017-06-17', '23:43:33', '2017-06-17', '2014-06-17', '2019-10-31', 'menu desayuno');
INSERT INTO `menu` VALUES (2, 1, '23:44:21', '2017-06-17', '23:44:21', '2017-06-17', '2014-06-18', '2019-06-23', 'Almuerzo');

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
INSERT INTO `menu_food` VALUES (2, 1);
INSERT INTO `menu_food` VALUES (3, 2);
INSERT INTO `menu_food` VALUES (4, 2);
INSERT INTO `menu_food` VALUES (5, 2);
INSERT INTO `menu_food` VALUES (6, 2);
INSERT INTO `menu_food` VALUES (7, 2);
INSERT INTO `menu_food` VALUES (8, 2);
INSERT INTO `menu_food` VALUES (9, 2);
INSERT INTO `menu_food` VALUES (10, 2);

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
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES (634, 1, 1, 14, '2018-06-04', '19:55:11', 1, 'Registro de nuevo usuario: 4', 'Nuevo Usuario Registrado: con  nombre: linguini gustov, Sexo: 1, Correo: linguini!@gmail.com, Telefono: 45626851', NULL);
INSERT INTO `message` VALUES (635, 1, 1, 16, '2018-06-04', '19:58:56', 1, 'chat', 'cocina', NULL);
INSERT INTO `message` VALUES (636, 1, 1, 16, '2018-06-04', '19:59:05', 1, 'chat', 'super cocina', NULL);
INSERT INTO `message` VALUES (637, 1, 1, 16, '2018-06-04', '19:59:12', 1, 'chat', 'oyemw', NULL);
INSERT INTO `message` VALUES (638, 1, 1, 16, '2018-06-04', '19:59:20', 1, 'chat', 'saludos', NULL);
INSERT INTO `message` VALUES (639, 1, 1, 16, '2018-06-04', '19:59:36', 1, 'chat', 'Helllo world', NULL);
INSERT INTO `message` VALUES (640, 32, 32, 16, '2018-06-04', '20:03:17', 1, 'chat', 'Hi admin', NULL);
INSERT INTO `message` VALUES (641, 32, 32, 16, '2018-06-04', '20:03:18', 1, 'chat', 'Hi admin', NULL);
INSERT INTO `message` VALUES (642, 34, 1, 2, '2018-06-05', '07:02:36', 1, 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2018-06-05 por el usuario mario mamanicon el correo electronico: mamani@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2018-06-05 a 2018-06-06 con n&uacute;mero de reserva23, n&uacute;mero de tarjeta 0, tipo de tarjeta</p>', NULL);
INSERT INTO `message` VALUES (643, 34, 2, 2, '2018-06-05', '07:02:36', 0, 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2018-06-05 por el usuario mario mamanicon el correo electronico: mamani@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2018-06-05 a 2018-06-06 con n&uacute;mero de reserva23, n&uacute;mero de tarjeta 0, tipo de tarjeta</p>', NULL);
INSERT INTO `message` VALUES (644, 2, 2, 16, '2018-06-09', '22:22:25', 1, 'chat', 'bla\r\n', NULL);
INSERT INTO `message` VALUES (645, 34, 1, 3, '2018-06-11', '04:38:44', 1, 'Salida de un Huesped: mamani@gmail.com', 'El h&uacute;esped: mario mamani  con n&uacute;mero de registro: 23 \r\n                    con correo Electronico: mamani@gmail.com nacido en: 2018-06-05<br>', NULL);
INSERT INTO `message` VALUES (646, 3, 1, 2, '2018-06-11', '05:03:17', 1, 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2018-06-11 por el usuario cliente apellidoacon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2018-06-11 a 2018-06-12 con n&uacute;mero de reserva24, n&uacute;mero de tarjeta 0, tipo de tarjeta</p>', NULL);
INSERT INTO `message` VALUES (647, 3, 2, 2, '2018-06-11', '05:03:17', 1, 'Huesped registrado en el hotel', '<p>Huesped registrado en fecha 2018-06-11 por el usuario cliente apellidoacon el correo electronico: cliente@gmail.com.</p><p>Las fechas de la reserva son en fechas del:2018-06-11 a 2018-06-12 con n&uacute;mero de reserva24, n&uacute;mero de tarjeta 0, tipo de tarjeta</p>', NULL);
INSERT INTO `message` VALUES (648, 2, 2, 16, '2018-06-11', '05:06:02', 1, 'chat', 'hi\r\n', NULL);
INSERT INTO `message` VALUES (649, 34, 34, 16, '2018-08-26', '19:36:32', 1, 'chat', 'pass\r\n', NULL);
INSERT INTO `message` VALUES (650, 3, 1, 3, '2018-09-10', '21:57:29', 1, 'Salida de un Huesped: cliente@gmail.com', 'El h&uacute;esped: cliente apellidoa  con n&uacute;mero de registro: 24 \r\n                    con correo Electronico: cliente@gmail.com nacido en: 2017-06-17<br>', NULL);

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
INSERT INTO `occupation` VALUES (59, 2);
INSERT INTO `occupation` VALUES (60, 4);
INSERT INTO `occupation` VALUES (61, 1);
INSERT INTO `occupation` VALUES (62, 3);
INSERT INTO `occupation` VALUES (68, 1);
INSERT INTO `occupation` VALUES (69, 15);
INSERT INTO `occupation` VALUES (70, 5);
INSERT INTO `occupation` VALUES (71, 6);
INSERT INTO `occupation` VALUES (72, 14);
INSERT INTO `occupation` VALUES (73, 16);
INSERT INTO `occupation` VALUES (74, 2);
INSERT INTO `occupation` VALUES (75, 4);

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
INSERT INTO `offer` VALUES (2, 9, '2017-10-15', '00:00:00', '2019-10-31', '23:59:59', 1);
INSERT INTO `offer` VALUES (3, 10, '2017-10-15', '00:00:00', '2019-10-15', '23:59:59', 1);
INSERT INTO `offer` VALUES (4, 11, '2017-10-15', '00:00:00', '0209-10-15', '23:59:59', 1);

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person`  (
  `ID_PERSON` int(7) NOT NULL AUTO_INCREMENT,
  `NAME_PERSON` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LAST_NAME_PERSON` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES (1, 'admin', 'administrador', '', 0, '2017-06-17', 'admin@gmail.com', 'Cochabamba', 'Bolivia', 'Mimar Mehmet Aga Cad. Amiral Tafdil Sok. No:23 | Sultanahmet, Fatih, Estambul 34400, TurquÃ­a', '2017-06-17', 'img/profile/20171015181413.jpg', 0);
INSERT INTO `person` VALUES (2, 'recepcionista', 'cepscionista', '', 0, '1997-06-01', 'recepcion@gmail.com', 'Cochabamba', 'Bolivia', 'avenida siempre viva calle Nro5356', '2017-06-17', 'img/perfil/20170617234632.jpg', 0);
INSERT INTO `person` VALUES (3, 'cliente', 'apellidoa', '', 0, '2017-06-17', 'cliente@gmail.com', 'Cochabamba', 'Argentina', 'urbanuzacion el buen lugar', '2017-06-17', 'img/profile/20171013130137.jpg', 65696000);
INSERT INTO `person` VALUES (6, 'Manuel dario', 'esterpiscore gongazel', '', 1, '2007-10-03', '', '', 'Bahamas', 'Av. siempre viva', '2017-10-17', '', 0);
INSERT INTO `person` VALUES (7, 'dario', 'manuel', '', 1, '2007-10-03', 'user@gmail.com', 'Ciudad', 'Afghanistan', 'app inventor', '2017-10-17', 'img/profile/20171017120630.jpg', 0);
INSERT INTO `person` VALUES (8, 'App inventor', 'inventorial', '', 0, '2007-10-01', 'juaniro@gmail.com', 'cbba', 'Bolivia', 'juanito@gmail.com', '2017-10-17', 'img/profile/20171017121450.jpg', 0);
INSERT INTO `person` VALUES (9, 'pepe', 'peralta', '', 1, '2007-10-02', 'pepe@gmail.com', 'City', 'Chile', 'la paz', '2017-10-17', 'img/profile/20171017121612.jpg', 0);
INSERT INTO `person` VALUES (10, 'bernarda', 'ballesteros', '', 0, '2007-10-02', 'bernarda@gmail.com', 'Cbba', 'Peru', 'Circunvaacion', '2017-10-17', 'img/profile/20171017121828.jpg', 0);
INSERT INTO `person` VALUES (11, 'nami', 'mendieta', '', 0, '2007-10-01', 'nami@gmail.com', 'cbba', 'Bolivia', 'blue all', '2017-10-17', 'img/profile/20171017122002.jpg', 0);
INSERT INTO `person` VALUES (19, 'maria elena', 'apellido', '', 1, '2018-05-15', 'email@gmail.com', 'city', 'Albania', 'address', '2018-05-15', '', 40);
INSERT INTO `person` VALUES (21, 'manuel', 'mamani', '', 1, '2008-05-01', '', '', 'Albania', 'av. siempre viva', '2018-05-15', '', 0);
INSERT INTO `person` VALUES (22, 'juan', 'mamani', '', 1, '2018-05-15', 'manuel1@gmail.com', 'hjghhjgjh', 'American Samoa', 'gfgggg', '2018-05-15', '', 70);
INSERT INTO `person` VALUES (23, 'fdfdf', 'dfdfdf', '', 1, '2018-05-15', 'dfsdfdf@gmmial.com', 'fdsdd', 'Bahrain', 'd45d4d5', '2018-05-15', '', 20);
INSERT INTO `person` VALUES (24, 'cocinero', 'cocinero', '', 0, '2008-05-01', 'cocina@gmail.com', 'cbba', 'Bhutan', 'av siempre viva', '2018-05-20', 'img/profile/20180520002410.jpg', 0);
INSERT INTO `person` VALUES (25, 'homero', 'thompon', '', 1, '2018-01-01', 'luis@gmail.com', '', '', '', '2018-05-20', '', 0);
INSERT INTO `person` VALUES (26, 'servicio', 'servicio', '', 1, '2008-05-08', 'servicio@gmail.com', 'city', 'Aland Islands', 'av siempre viva', '2018-05-20', 'img/profile/20180520014314.jpg', 100);
INSERT INTO `person` VALUES (27, 'sericiosa aa', 'apellido', '', 0, '2018-05-20', 'cocina2@gmail.com', '', 'Afghanistan', '', '2018-05-20', '', 0);
INSERT INTO `person` VALUES (28, 'clientes', 'clientes', '', 1, '2018-05-20', 'clientes@gmail.com', 'cbba', 'Afghanistan', 'av. siempre viva', '2018-05-20', '', 20);
INSERT INTO `person` VALUES (32, 'linguini', 'gustov', '', 1, '1990-01-01', 'linguini!@gmail.com', 'cbba', 'Bolivia', 'av. siempre viva', '2018-06-04', 'img/profile/20180604195511.jpg', 50);
INSERT INTO `person` VALUES (33, '', '', '', -1, '0000-00-00', '', '', '', '', '2017-06-04', '', 0);
INSERT INTO `person` VALUES (34, 'mariana', 'mamani', '', 0, '2018-06-05', 'mamani@gmail.com', 'cbba', 'Afghanistan', 'av. siempre viva', '2018-06-05', '', 0);
INSERT INTO `person` VALUES (35, '', '', '', -1, '0000-00-00', '', '', '', '', '2018-06-11', '', 0);
INSERT INTO `person` VALUES (36, 'fdfdf', 'fjskjsdfhkdjh', '', 1, '0000-00-00', 'sdddd2@gmail.com', '', '', '', '2018-07-02', '', 0);
INSERT INTO `person` VALUES (37, 'dfsdsdf', 'sdfsdff', '', 1, '0000-00-00', '4s5ssds@gmail.com', '', '', '', '2018-07-02', '', 0);
INSERT INTO `person` VALUES (38, 'sdfddfdff', 'dfdgfg', '', 1, '0000-00-00', 'dfdsddddd@gmail.com', '', '', '', '2018-07-02', '', 0);
INSERT INTO `person` VALUES (39, 'app inventor', 'loarce', '', 0, '0000-00-00', 'gmail@gmai.com', '', '', '', '2018-07-15', '', 0);
INSERT INTO `person` VALUES (40, '', '', '', -1, '0000-00-00', '', '', '', '', '2018-09-09', '', 0);
INSERT INTO `person` VALUES (41, '', '', '', -1, '0000-00-00', '', '', '', '', '2018-09-09', '', 0);
INSERT INTO `person` VALUES (42, '', '', '', -1, '0000-00-00', '', '', '', '', '2018-09-09', '', 0);
INSERT INTO `person` VALUES (43, '', '', '', -1, '0000-00-00', '', '', '', '', '2018-09-09', '', 0);
INSERT INTO `person` VALUES (44, '', '', '', -1, '0000-00-00', '', '', '', '', '2018-09-10', '', 0);

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
INSERT INTO `person_document` VALUES (4454555, 1, 9, '2017-10-17', '12:16:13');
INSERT INTO `person_document` VALUES (4545456, 1, 23, '2018-05-15', '14:45:47');
INSERT INTO `person_document` VALUES (44111511, 1, 22, '2018-05-15', '14:33:31');
INSERT INTO `person_document` VALUES (44564656, 1, 3, '2018-09-10', '22:28:58');
INSERT INTO `person_document` VALUES (46456554, 1, 11, '2017-10-17', '12:20:02');
INSERT INTO `person_document` VALUES (134564565, 1, 26, '2018-05-20', '01:43:14');
INSERT INTO `person_document` VALUES (145464555, 1, 19, '2018-05-15', '13:38:19');
INSERT INTO `person_document` VALUES (165324546, 1, 27, '2018-05-20', '14:18:57');
INSERT INTO `person_document` VALUES (316455465, 1, 6, '2017-10-17', '10:23:47');
INSERT INTO `person_document` VALUES (454554545, 2, 34, '2018-08-26', '19:34:13');
INSERT INTO `person_document` VALUES (456985988, 1, 10, '2017-10-17', '12:18:28');
INSERT INTO `person_document` VALUES (1324565454, 1, 21, '2018-05-15', '13:44:43');
INSERT INTO `person_document` VALUES (1345469655, 1, 24, '2018-05-20', '00:24:10');
INSERT INTO `person_document` VALUES (6546546888, 1, 8, '2017-10-17', '12:14:50');
INSERT INTO `person_document` VALUES (15465456465, 1, 28, '2018-05-20', '14:31:48');
INSERT INTO `person_document` VALUES (46546456959, 1, 7, '2017-10-17', '12:06:30');
INSERT INTO `person_document` VALUES (455432444444444, 1, 32, '2018-06-04', '19:55:11');

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
INSERT INTO `person_phone` VALUES (4565, 23, 1, '2018-05-15', '14:45:47');
INSERT INTO `person_phone` VALUES (456456, 3, 1, '2018-09-10', '22:28:58');
INSERT INTO `person_phone` VALUES (3135655, 7, 1, '2017-10-17', '12:06:30');
INSERT INTO `person_phone` VALUES (4645655, 10, 1, '2017-10-17', '12:18:28');
INSERT INTO `person_phone` VALUES (4654654, 8, 1, '2017-10-17', '12:14:51');
INSERT INTO `person_phone` VALUES (6545454, 19, 1, '2018-05-15', '13:38:19');
INSERT INTO `person_phone` VALUES (45626851, 32, 1, '2018-06-04', '19:55:11');

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
INSERT INTO `reserve` VALUES (63, 4, 1);
INSERT INTO `reserve` VALUES (64, 4, 1);
INSERT INTO `reserve` VALUES (65, 4, 1);
INSERT INTO `reserve` VALUES (66, 1, 1);
INSERT INTO `reserve` VALUES (67, 4, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES (1, 'S1', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (2, 'S2', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (3, 'S3', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-06-12', '04:44:49', '2018-06-11', '04:44:49');
INSERT INTO `room` VALUES (4, 'S4', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-11', '22:16:27', '2018-09-10', '22:16:27');
INSERT INTO `room` VALUES (5, 'S5', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (6, 'S6', 1, 1, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '19:05:26', '2018-09-09', '19:05:26');
INSERT INTO `room` VALUES (7, 'D1', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (8, 'D2', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (9, 'D3', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (10, 'D4', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (11, 'D5', 1, 2, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (12, 'C1', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '09:56:26', '2015-01-01', '09:56:26');
INSERT INTO `room` VALUES (13, 'C2', 1, 3, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '08:47:49', '2015-01-01', '08:47:49');
INSERT INTO `room` VALUES (14, 'C3', 1, 3, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (15, 'M1', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '18:41:21', '2018-09-09', '18:41:21');
INSERT INTO `room` VALUES (16, 'M2', 1, 4, '', 1, '2015-01-01', '00:00:00', '2018-09-10', '20:16:50', '2018-09-09', '20:16:50');
INSERT INTO `room` VALUES (17, 'Gim1', 1, 5, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (18, 'Gim2', 1, 5, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (19, 'Piscina1', 1, 6, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (20, 'Comedor General', 1, 7, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (21, 'Comedor VIP', 1, 7, '', 1, '2015-01-01', '00:00:00', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (22, 'P15ff', 1, 2, '', -1, '2015-01-01', '15:16:18', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');
INSERT INTO `room` VALUES (23, 'q12', 1, 1, '', -1, '2015-01-01', '15:18:14', '2015-01-01', '15:50:24', '2015-01-01', '15:50:24');

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
INSERT INTO `room_model` VALUES (1, 'HabitaciÃ²n Individual', 'Cama de 100-120cm / Aire acondiciondo<br>BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital /&nbsp;HabitaciÃ²n insonorizad<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a', '2017-06-17', '21:43:04', 'img/room/20170617214304.jpg', 1, 0, 0, 1);
INSERT INTO `room_model` VALUES (2, 'HabitaciÃ²n Doble', 'Cama matrimonial / Aire acondiciondo<br>BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital / HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a baÃ±o', '2017-06-17', '21:44:01', 'img/room/20170617214401.jpg', 2, 0, 0, 1);
INSERT INTO `room_model` VALUES (3, 'Clasico', 'Cama matrimonial o dos camas a pedido<br>Aire acondiciondo / BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital / HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a baÃ±o', '2017-06-17', '21:44:52', 'img/room/20170617214452.jpg', 1, 0, 0, 1);
INSERT INTO `room_model` VALUES (4, 'Matrimonial', 'Cama matrimonial o dos camas a pedido<br>Aire acondiciondo / BaÃ±o privado con ducha o tina<br>SÃ banas en raso de algodÃ²n / Doble almohada<br>Telvisor LCD / TV satelital / HabitaciÃ²n insonorizada<br>Telefono directo en la habitaciÃ²n y en el baÃ±o<br>Minibar / Internet WI Fi / Linea cortesÃ¬a baÃ±o<br>Desayuno servido en la habitaciÃ²n a pedido<br>Salida de baÃ±o / Pantuflas<br>Una botellita de Chianti de bienvenida<br>Una cesta de frutas frescas', '2017-06-17', '21:46:02', 'img/room/20170617214602.jpg', 2, 0, 0, 1);
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
INSERT INTO `rule` VALUES (3, 1, 'no caminar descalso', 'en este hotel el caminar descalso es de mala educacion, no lo hagais editado mucho<br>', -1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

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
INSERT INTO `service` VALUES (11, 1, 1, 3, 'Business Playground by Pullman', '<p style=\"margin-bottom: 0px; padding: 0px 0px 11px; border: 0px; font-stretch: normal; font-size: 12px; line-height: 14px; font-family: arial; vertical-align: baseline; color: rgb(101, 101, 101);\">Pullman inventa Business Playground: un lugar donde trabajar, un patio de recreo para las ideas. DiseÃ±ada por Mathieu Lehanneur, la mesa de conferencias se convierte en una mesa de pÃ³quer. Entre reuniones, los asistentes pueden relajarse bajo un Pullman Canopy BreakÂ© y las Pullman Curiosity BoxesÂ©', 'img/offers/20171015180116.jpg', 1);
INSERT INTO `service` VALUES (12, 1, 1, 2, 'Habitacion Triple', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215544.jpg', 1);
INSERT INTO `service` VALUES (13, 1, 1, 2, 'Habitacion Suite', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215544.jpg', 1);
INSERT INTO `service` VALUES (14, 1, 1, 2, 'Habitacion Suite nupcial', '<p>Nuestras habitaciones estÃ¡n equipadas con  telÃ©fono privado, baÃ±o privado con ducha o baÃ±era, TV a color provisto de  sistema de cable, toma telefÃ³nica y conexiÃ³n Wi-Fi gratuita en todos los  ambientes para su computadora o telÃ©fono inteligente.<br>El  Hotel tambiÃ©n ofrece servicio de traslado gratis compartido aeropuerto - hotel,  llamadas telefÃ³nicas locales a telÃ©fono fijo, cafeterÃ­a bar al serviciÃ³ de  usted, sala de conferencias o eventos, custodia de equipaje y ademÃ¡s </p>', 'img/service/20170617215544.jpg', 1);

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
INSERT INTO `service_room_model` VALUES (1, 9, 1, '2017-10-15', '17:58:33');
INSERT INTO `service_room_model` VALUES (2, 2, 1, '2017-06-17', '21:55:44');
INSERT INTO `service_room_model` VALUES (3, 5, 1, '2017-06-17', '22:01:10');
INSERT INTO `service_room_model` VALUES (4, 4, 1, '2017-06-17', '22:00:00');
INSERT INTO `service_room_model` VALUES (5, 3, 1, '2017-06-17', '21:58:56');
INSERT INTO `service_room_model` VALUES (5, 5, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (5, 8, 1, '2017-06-18', '00:22:03');
INSERT INTO `service_room_model` VALUES (5, 10, 1, '2017-10-15', '18:00:14');
INSERT INTO `service_room_model` VALUES (6, 5, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (6, 6, 1, '2017-06-17', '22:02:11');
INSERT INTO `service_room_model` VALUES (7, 5, 1, '2017-06-17', '22:04:04');
INSERT INTO `service_room_model` VALUES (7, 7, 1, '2017-06-17', '22:03:43');
INSERT INTO `service_room_model` VALUES (7, 11, 1, '2017-10-15', '18:01:16');

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
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES (1, 1, '', '', 'localhost', 'localhost:58159', '2018-08-26', '2018-08-26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '19:42:58', '19:42:58', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (2, 1, '', '', 'localhost', 'localhost:50231', '2018-09-08', '2018-09-08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '20:48:10', '20:48:10', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (3, 1, '', '', 'localhost', 'localhost:50498', '2018-09-08', '2018-09-08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '20:55:08', '20:55:08', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (4, 1, '', '', 'localhost', 'localhost:51319', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '09:23:37', '09:23:37', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (5, 1, '', '', 'localhost', 'localhost:54081', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '09:41:32', '09:41:32', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (6, 1, '', '', 'localhost', 'localhost:60674', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '10:15:27', '10:15:27', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (7, 1, '', '', 'localhost', 'localhost:60680', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '10:15:28', '10:15:28', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (8, 1, '', '', 'localhost', 'localhost:65007', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:00:57', '12:00:57', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (9, 1, '', '', 'localhost', 'localhost:49208', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:04:08', '12:04:08', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (10, 1, '', '', 'localhost', 'localhost:49406', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:04:41', '12:04:41', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (11, 1, '', '', 'localhost', 'localhost:51208', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:11:42', '12:11:42', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (12, 1, '', '', 'localhost', 'localhost:51919', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:14:43', '12:14:43', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (13, 1, '', '', 'localhost', 'localhost:52327', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:16:13', '12:16:13', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (14, 1, '', '', 'localhost', 'localhost:52429', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:16:22', '12:16:22', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (15, 1, '', '', 'localhost', 'localhost:52515', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:16:48', '12:16:48', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (16, 1, '', '', 'localhost', 'localhost:52600', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:17:13', '12:17:13', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (17, 1, '', '', 'localhost', 'localhost:52751', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:17:51', '12:17:51', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (18, 1, '', '', 'localhost', 'localhost:59048', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '14:05:57', '14:05:57', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (19, 1, '', '', 'localhost', 'localhost:55209', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:07:46', '15:07:46', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (20, 1, '', '', 'localhost', 'localhost:58706', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:21:31', '15:21:31', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (21, 1, '', '', 'localhost', 'localhost:59107', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:23:22', '15:23:22', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (22, 1, '', '', 'localhost', 'localhost:59431', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:25:04', '15:25:04', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (23, 1, '', '', 'localhost', 'localhost:59448', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:25:09', '15:25:09', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (24, 1, '', '', 'localhost', 'localhost:59500', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:25:23', '15:25:23', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (25, 1, '', '', 'localhost', 'localhost:61788', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:37:22', '15:37:22', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (26, 1, '', '', 'localhost', 'localhost:63329', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:45:49', '15:45:49', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (27, 1, '', '', 'localhost', 'localhost:63441', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:46:23', '15:46:23', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (28, 1, '', '', 'localhost', 'localhost:63552', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:46:52', '15:46:52', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (29, 1, '', '', 'localhost', 'localhost:64008', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:49:02', '15:49:02', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (30, 1, '', '', 'localhost', 'localhost:64111', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:49:25', '15:49:25', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (31, 1, '', '', 'localhost', 'localhost:64184', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:49:44', '15:49:44', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (32, 32, '', '', 'localhost', 'localhost:64249', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:49:59', '15:49:59', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (33, 32, '', '', 'localhost', 'localhost:64500', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:50:51', '15:50:51', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (34, 32, '', '', 'localhost', 'localhost:64547', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:51:02', '15:51:02', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (35, 32, '', '', 'localhost', 'localhost:64679', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:51:29', '15:51:29', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (36, 32, '', '', 'localhost', 'localhost:64845', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:52:01', '15:52:01', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (37, 32, '', '', 'localhost', 'localhost:49275', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:55:17', '15:55:17', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (38, 32, '', '', 'localhost', 'localhost:49334', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '15:55:26', '15:55:26', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (39, 32, '', '', 'localhost', 'localhost:51403', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '16:02:20', '16:02:20', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (40, 32, '', '', 'localhost', 'localhost:59156', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '17:48:16', '17:48:16', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (41, 1, '', '', 'localhost', 'localhost:59342', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '17:49:02', '17:49:02', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (42, 1, '', '', 'localhost', 'localhost:59638', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '17:50:32', '17:50:32', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (43, 1, '', '', 'localhost', 'localhost:59694', '2018-09-09', '2018-09-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '17:50:50', '17:50:50', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (44, 1, '', '', 'localhost', 'localhost:64958', '2018-09-10', '2018-09-10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '22:12:35', '22:12:35', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (45, 1, '', '', 'localhost', 'localhost:58203', '2018-09-12', '2018-09-12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '22:36:58', '22:36:58', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (46, 1, '', '', 'localhost', 'localhost:62575', '2018-09-14', '2018-09-14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '11:41:40', '11:41:40', 1, '0', '0', '', '', '', '', '');
INSERT INTO `session` VALUES (47, 1, '', '', 'localhost', 'localhost:50097', '2018-09-14', '2018-09-14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '12:57:09', '12:57:09', 1, '0', '0', '', '', '', '', '');

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
INSERT INTO `state_article` VALUES (5, 'nuevo', 'boorame', -1);
INSERT INTO `state_article` VALUES (6, 'ddf', 'fdf ediatado', -1);
INSERT INTO `state_article` VALUES (7, 'dfgd', 'dfgdfgd', -1);
INSERT INTO `state_article` VALUES (8, 'sdfg', 'dfgdfg', -1);
INSERT INTO `state_article` VALUES (9, 'dfgdfg editado', 'fgdfdgfg', -1);
INSERT INTO `state_article` VALUES (10, 'ddddddddddd', 'fddffgd', -1);
INSERT INTO `state_article` VALUES (11, 'articulosssssss', 'soy esditado', -1);
INSERT INTO `state_article` VALUES (12, 'soy nuevo', 'llamame sip nuevo', -1);

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
INSERT INTO `state_check` VALUES (8, 'Eliminado automatico', 'reserva eliminada en caso de q tarde mas del tiempo requerido para la reser', -1);
INSERT INTO `state_check` VALUES (9, 'nuevo editado', 'esto es nuevo<br>', -1);
INSERT INTO `state_check` VALUES (10, 'ddf', 'dff', -1);
INSERT INTO `state_check` VALUES (11, 'nuevo', 'sdsdfsdfsd', -1);
INSERT INTO `state_check` VALUES (12, 'nuevo estado', 'este estado es nuevo', -1);

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
INSERT INTO `state_inquest` VALUES (7, 'asddddddddd editddo', 'fffffff', -1);
INSERT INTO `state_inquest` VALUES (8, 'encuestassss', 'esto es una encuestad', -1);

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
INSERT INTO `type_card` VALUES (4, 'dfeditado', 'gfgg', '2017-08-21', '11:32:46', '', -1);
INSERT INTO `type_card` VALUES (5, 'new Type', 'este es unnuevo tipo de targeta permitido editado', '2017-09-03', '16:10:05', 'img/card/20170903161107.jpg', -1);
INSERT INTO `type_card` VALUES (6, 'dfg', 'fgfgdf', '2017-09-03', '16:11:34', 'img/card/20170903161134.jpg', -1);

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
INSERT INTO `type_check` VALUES (3, 'checck Out', 'Registrar salida de un huesped', '2018-01-01', '00:00:00', '', 3);

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
INSERT INTO `type_consume` VALUES (9, 'nuevo es casi nuevo', 'esto es nuevo', '2017-08-21', '11:46:22', '', -1);
INSERT INTO `type_consume` VALUES (10, 'new', 'esto es nubo', '2017-09-03', '16:19:18', 'img/consume/20170903161918.jpg', -1);

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
INSERT INTO `type_document` VALUES (4, 'ninisd editado', 'dkdl', '2017-08-21', '11:47:30', '', -1);
INSERT INTO `type_document` VALUES (5, 'nit', 'documento pra abionar', '2017-09-03', '16:20:04', 'img/document/20170903162004.jpg', -1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type_food
-- ----------------------------
INSERT INTO `type_food` VALUES (1, 'desayuno', 'se sirve en la ma&ntilde;ana', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (2, 'almuerzo', 'se sirve al medio d&iacute;a', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (3, 'cena', 'se sirve en la noche', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (5, 'postres', 'se sirve despues de la comida', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (6, 'refrescos', 'gaseosas y jugos', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_food` VALUES (7, 'bebidas', 'bebidas con alchol', '2018-01-01', '00:00:00', '', 1);

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
INSERT INTO `type_hotel` VALUES (1, 'T&uacute;ristico', 'Establecimiento especialmente para turistas', '2016-04-20', '17:45:22', '', 1);
INSERT INTO `type_hotel` VALUES (2, 'presidencial', 'para personas muy importantes', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (3, '1 estrella', 'categoria de 1 estrella', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (4, '2 estrellas', 'con categoria de 2 estrellas', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (5, '3 estrellas', 'con 3 estrellas', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (6, '4 estrellas', 'con 4 estrellas', '2018-01-01', '00:00:00', '', 1);
INSERT INTO `type_hotel` VALUES (7, '5 estrellas', 'con 5 estrellas', '2016-04-17', '13:07:06', '', 1);
INSERT INTO `type_hotel` VALUES (8, '14 estrellas', 'tipo de prueba editado', '2017-08-20', '13:00:02', '', -1);
INSERT INTO `type_hotel` VALUES (9, 'nuebvo editado', 'esto es nuvo', '2017-08-21', '10:37:37', '', -1);
INSERT INTO `type_hotel` VALUES (10, 'dffd', 'dfdfg', '2017-08-21', '10:37:56', '', -1);
INSERT INTO `type_hotel` VALUES (11, 'sddsf editado2', 'fsd', '2017-08-21', '11:07:21', '', -1);
INSERT INTO `type_hotel` VALUES (12, 'nevo', 'esotneuvso', '2017-08-21', '13:54:08', '', -1);

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
INSERT INTO `type_money` VALUES (3, 'ee', 'euro', '2017-08-21', '11:46:59', '', -1);

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
INSERT INTO `type_phone` VALUES (5, 'celulartes', 'estelular dfffffffffffffffff', '2017-08-21', '11:48:01', '', -1);

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
INSERT INTO `type_rule` VALUES (5, 'nombre editado', 'sdsf', '2017-08-21', '13:48:02', '', -1);

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
INSERT INTO `type_service` VALUES (4, 'registro', 'registro de un huesped en el establecimiento', '2018-01-01', '00:00:00', '', 3);
INSERT INTO `type_service` VALUES (5, 'nuevo', 'este es nuevo editado', '2017-08-20', '13:49:58', '', -1);
INSERT INTO `type_service` VALUES (6, 'nuevo', 'seminuevoddddddddddddd', '2017-08-20', '14:10:28', '', -1);

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
INSERT INTO `user_hotel` VALUES (2, '$2y$10$.olQpR1a38IbLPY../D/CO69SvzimgOyIUKVEfABg9XyXxvKcZlN.', 1);
INSERT INTO `user_hotel` VALUES (3, '$2y$10$A5fTK4u49jEF2wsG7vVyzufex7PEo.PXWut7AHbk/sNZXW9dd6LAC', 1);
INSERT INTO `user_hotel` VALUES (6, '$2y$10$Lhty1Syb35uYuVMYIEPRE.gjENmp3UqsEZKTxIaZNWbuHuh5VXPUu', 1);
INSERT INTO `user_hotel` VALUES (7, '$2y$10$t97oMTn4WcVi1ysY37riDOX06eEdD5i7q6ks2HuP.yR5AbBdWvsTi', 1);
INSERT INTO `user_hotel` VALUES (8, '$2y$10$FFg6l/mhlJLESuYYYP6IketyqCttiCXsG2cmbUbE4OxitamEStBSq', 1);
INSERT INTO `user_hotel` VALUES (9, '$2y$10$6p0q91tvDnBEGSiL9DPYIOzexr6uCKhSvcDUuaZFoBQ5Lu9TdfuUW', 1);
INSERT INTO `user_hotel` VALUES (10, '$2y$10$.I6InJSYZKeu2nv1zdQOTuC5pRELTozVwJ3e.PG3ccMfjdHumBXAa', 1);
INSERT INTO `user_hotel` VALUES (11, '$2y$10$TCUqlNmD7yltX56BYRLDHefxoHZIA0xdSCzQVITO3RCYvdD9PgCDe', 1);
INSERT INTO `user_hotel` VALUES (19, '$2y$10$QsTpRniYc1TtfGjb40RHV.w089gJK63XLV6HCjqsEgj5v/ZMDFCKy', 1);
INSERT INTO `user_hotel` VALUES (21, '$2y$10$u.NDSSMwbU05BS/jPBV3meSh/wUpm1f5L0FLCa.UALpIYkpdPGkNW', 1);
INSERT INTO `user_hotel` VALUES (22, '$2y$10$XagYkSbMqNhB6E0qUSR9vO4okPNqMtAk0kFcxM6CX58QriPMkh5uO', 1);
INSERT INTO `user_hotel` VALUES (23, '$2y$10$LwT9ZLED5taHsDzNJ6tU7eubs5GS8pwUqI4qwiEUYtiEc5rQIsuwW', 1);
INSERT INTO `user_hotel` VALUES (24, '$2y$10$TbOKrJGxgBF.CVLaTtL9Pe2dbMrBkQ1tk.fJqkdqICZ4UBQqhte/u', 1);
INSERT INTO `user_hotel` VALUES (25, '$2y$10$RnyEuAx7CG5hc5wOdKgkAu/zr/U0U73NTuqJLUQez3e1pNf0YjuIm', 1);
INSERT INTO `user_hotel` VALUES (26, '$2y$10$EKgtBOxPxb2/20H787lcW.8qCcoqzJqNOqbVSrLhZ.DnG674.JYL6', 1);
INSERT INTO `user_hotel` VALUES (27, '$2y$10$PpnHH5QsKVlnP0j0Ycq2tevyNcaYMHMhy6n3OJluGP6IjIkBoVsPu', 1);
INSERT INTO `user_hotel` VALUES (28, '$2y$10$p8zjIdZkiOyfrkBt67siWuW66WZi9s7BE0ai8G6/236Nf2MpQEooO', 1);
INSERT INTO `user_hotel` VALUES (32, '$2y$10$ZiTsvNvru/ehGvvUaCrecewQp3yWTpZ0sW09HfUQ7OalwiH3tJhP6', 1);
INSERT INTO `user_hotel` VALUES (33, '$2y$10$LukOcuh0.irVav26TbyhZu4DIkMBUQaiO8o25OVX7Mu41Va5JX7ie', 1);
INSERT INTO `user_hotel` VALUES (34, '$2y$10$hFMcCcaulpP1sNOiaZ4THuLTPngJRqptvcjpgz55XiwUjCMDWhq9C', 1);
INSERT INTO `user_hotel` VALUES (35, '$2y$10$R2ZpgUvZ.dX28giGLi/jXenDM1ELEgflDBrMG4Y6SN0T0GxeFopIK', 1);
INSERT INTO `user_hotel` VALUES (36, '$2y$10$Mz4V0rZcY1.qJxRbC1gvZOSNGQQWmj4pUUI3DdeaELkSRrLvAN1DW', 1);
INSERT INTO `user_hotel` VALUES (37, '$2y$10$dgs7B4NBbgOLZiP2wc5hBecUN0cMNS/W10fdVe9eFQxwHk3f35rlC', 1);
INSERT INTO `user_hotel` VALUES (38, '$2y$10$cA6AJtHewlB2bOXydzTIieMmMObrFX0Zhb8LqZxTksX8DSLuJYa2O', 1);
INSERT INTO `user_hotel` VALUES (39, '$2y$10$bvuiIzgnwb6iw8uXreszO.ECnzXMCuD2nPSfikhLrr.aw9L0m9lHm', 1);
INSERT INTO `user_hotel` VALUES (40, '$2y$10$mmyzw/6emSilxddwLpaaauuOGp1H46tHDSnzo4tCQFE1HtdHTgbM.', 1);
INSERT INTO `user_hotel` VALUES (41, '$2y$10$URHWBTQHcAT9ynBSB5PxOekI9QEtDhooh3Wb8eUQQAjCo/AQL0TBK', 1);
INSERT INTO `user_hotel` VALUES (42, '$2y$10$3mqHQOCqP5OsSlH/ZIHHLeV1kk5SkthKP4wWQ4k4IHTpCOdDlbVmK', 1);
INSERT INTO `user_hotel` VALUES (43, '$2y$10$R/N564BUFwsBQCdJ5Criiev7pnxU5YQe8eaJLoOdcbNfeTlOg2x.C', 1);
INSERT INTO `user_hotel` VALUES (44, '$2y$10$/okOVyRcT0pvLIZ0Czix2ub/se2SHXdEOB7dfD3Ac7qexk41GxOCm', 1);

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
INSERT INTO `user_name` VALUES (27, '132454545', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (27, '1324546', 1, '2018-05-20', '14:18:57');
INSERT INTO `user_name` VALUES (21, '13245654', 1, '2018-05-15', '13:44:43');
INSERT INTO `user_name` VALUES (24, '1345464655', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (26, '1345645645', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (26, '13456465', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (19, '145464655', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (28, '15465456465', 1, '2018-05-20', '14:31:48');
INSERT INTO `user_name` VALUES (7, '3135655', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (6, '3165465', 1, '2017-10-17', '10:23:47');
INSERT INTO `user_name` VALUES (22, '4411111', 1, '2018-05-15', '14:33:31');
INSERT INTO `user_name` VALUES (9, '44545655', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (23, '45456', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (3, '456456', 1, '2018-06-04', '17:17:49');
INSERT INTO `user_name` VALUES (23, '4565', 1, '2018-05-15', '14:45:47');
INSERT INTO `user_name` VALUES (10, '45698988', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (10, '4645655', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (11, '46456654', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (3, '464656', 1, '2018-06-04', '17:33:26');
INSERT INTO `user_name` VALUES (7, '46546456959', 1, '2017-10-17', '12:06:30');
INSERT INTO `user_name` VALUES (8, '4654654', 1, '2017-10-17', '12:14:51');
INSERT INTO `user_name` VALUES (9, '46564888', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (37, '4s5ssds@gmail.com', 1, '2018-07-02', '06:57:32');
INSERT INTO `user_name` VALUES (28, '546465487', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (19, '6545454', 1, '2018-05-15', '13:38:19');
INSERT INTO `user_name` VALUES (8, '6546546888', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (1, 'admin@gmail.com', 1, '2018-06-04', '06:02:39');
INSERT INTO `user_name` VALUES (10, 'bernarda@gmail.com', 1, '2017-10-17', '12:18:28');
INSERT INTO `user_name` VALUES (3, 'cliente@gmail.com', 1, '2018-09-10', '22:28:58');
INSERT INTO `user_name` VALUES (28, 'clientes@gmail.com', 1, '2018-05-20', '14:31:49');
INSERT INTO `user_name` VALUES (27, 'cocina2@gmail.com', 1, '2018-05-20', '14:18:56');
INSERT INTO `user_name` VALUES (24, 'cocina@gmail.com', 1, '2018-05-20', '00:24:10');
INSERT INTO `user_name` VALUES (38, 'dfdsddddd@gmail.com', 1, '2018-07-02', '07:22:32');
INSERT INTO `user_name` VALUES (23, 'dfsdfdf@gmmial.com', 1, '2018-05-15', '14:46:24');
INSERT INTO `user_name` VALUES (19, 'email@gmail.com', 1, '2018-05-15', '13:38:20');
INSERT INTO `user_name` VALUES (39, 'gmail@gmai.com', 1, '2018-07-15', '21:06:49');
INSERT INTO `user_name` VALUES (8, 'juaniro@gmail.com', 1, '2017-10-17', '12:14:50');
INSERT INTO `user_name` VALUES (32, 'linguini!@gmail.com', 1, '2018-06-04', '19:55:11');
INSERT INTO `user_name` VALUES (25, 'luis@gmail.com', 1, '2018-05-20', '01:21:52');
INSERT INTO `user_name` VALUES (34, 'mamani@gmail.com', 1, '2018-08-26', '19:34:13');
INSERT INTO `user_name` VALUES (22, 'manuel1@gmail.com', 1, '2018-05-15', '14:33:32');
INSERT INTO `user_name` VALUES (11, 'nami@gmail.com', 1, '2017-10-17', '12:20:02');
INSERT INTO `user_name` VALUES (9, 'pepe@gmail.com', 1, '2017-10-17', '12:16:13');
INSERT INTO `user_name` VALUES (2, 'recepcion@gmail.com', 1, '2017-10-15', '18:19:34');
INSERT INTO `user_name` VALUES (36, 'sdddd2@gmail.com', 1, '2018-07-02', '06:56:30');
INSERT INTO `user_name` VALUES (26, 'servicio@gmail.com', 1, '2018-05-20', '01:43:14');
INSERT INTO `user_name` VALUES (7, 'user@gmail.com', 1, '2017-10-17', '12:06:30');

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
INSERT INTO `user_rol` VALUES (1, 1, '2017-06-17', '20:30:34');
INSERT INTO `user_rol` VALUES (1, 3, '2018-06-04', '06:02:39');
INSERT INTO `user_rol` VALUES (2, 2, '2017-06-17', '23:46:33');
INSERT INTO `user_rol` VALUES (3, 3, '2017-06-17', '23:48:11');
INSERT INTO `user_rol` VALUES (6, 3, '2017-10-17', '10:21:58');
INSERT INTO `user_rol` VALUES (7, 3, '2017-10-17', '12:06:30');
INSERT INTO `user_rol` VALUES (8, 3, '2017-10-17', '12:14:50');
INSERT INTO `user_rol` VALUES (9, 3, '2017-10-17', '12:16:13');
INSERT INTO `user_rol` VALUES (10, 3, '2017-10-17', '12:18:28');
INSERT INTO `user_rol` VALUES (11, 3, '2017-10-17', '12:20:02');
INSERT INTO `user_rol` VALUES (19, 3, '2018-05-31', '22:31:25');
INSERT INTO `user_rol` VALUES (21, 3, '2018-05-15', '13:44:43');
INSERT INTO `user_rol` VALUES (22, 3, '2018-05-15', '14:29:20');
INSERT INTO `user_rol` VALUES (24, 4, '2018-05-20', '00:24:10');
INSERT INTO `user_rol` VALUES (25, 3, '2018-05-20', '01:21:52');
INSERT INTO `user_rol` VALUES (26, 5, '2018-05-20', '01:43:14');
INSERT INTO `user_rol` VALUES (27, 5, '2018-05-20', '14:18:08');
INSERT INTO `user_rol` VALUES (28, 3, '2018-05-31', '22:31:18');
INSERT INTO `user_rol` VALUES (32, 4, '2018-06-04', '19:55:11');
INSERT INTO `user_rol` VALUES (33, 3, '2017-06-04', '20:31:43');
INSERT INTO `user_rol` VALUES (34, 3, '2018-06-05', '06:28:14');
INSERT INTO `user_rol` VALUES (35, 3, '2018-06-11', '04:45:10');
INSERT INTO `user_rol` VALUES (41, 3, '2018-09-09', '18:42:36');
INSERT INTO `user_rol` VALUES (42, 3, '2018-09-09', '19:05:35');
INSERT INTO `user_rol` VALUES (43, 3, '2018-09-09', '20:23:50');
INSERT INTO `user_rol` VALUES (44, 3, '2018-09-10', '22:16:50');

SET FOREIGN_KEY_CHECKS = 1;

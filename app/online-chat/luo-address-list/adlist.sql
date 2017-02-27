/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : adlist

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-05-23 21:41:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_Id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_Name` varchar(20) NOT NULL,
  `admin_Pwd` varchar(10) NOT NULL,
  `isuse` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2014211117 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2014200000', 'zjvivi', '123456', '1');
INSERT INTO `admin` VALUES ('2014211116', 'luo', '123456', '1');

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `class_Id` int(9) NOT NULL AUTO_INCREMENT,
  `class_Name` varchar(20) NOT NULL,
  `speciality_Id` int(6) NOT NULL,
  `isuse` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`class_Id`),
  KEY `speciality_Id` (`speciality_Id`),
  CONSTRAINT `speciality_Id` FOREIGN KEY (`speciality_Id`) REFERENCES `speciality` (`speciality_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=200301142 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('200101143', '计143', '200101', '1');
INSERT INTO `class` VALUES ('200101144', '计144', '200101', '1');
INSERT INTO `class` VALUES ('200102141', '软工141', '200102', '1');
INSERT INTO `class` VALUES ('200201141', '诗歌141', '200201', '1');
INSERT INTO `class` VALUES ('200301141', '英语141', '200301', '1');

-- ----------------------------
-- Table structure for `college`
-- ----------------------------
DROP TABLE IF EXISTS `college`;
CREATE TABLE `college` (
  `college_Id` int(4) NOT NULL AUTO_INCREMENT,
  `college_Name` varchar(20) NOT NULL,
  `isuse` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`college_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2004 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of college
-- ----------------------------
INSERT INTO `college` VALUES ('2001', '杭州国际服务工程学院', '1');
INSERT INTO `college` VALUES ('2002', '人文学院', '1');
INSERT INTO `college` VALUES ('2003', '外国语学院', '1');

-- ----------------------------
-- Table structure for `speciality`
-- ----------------------------
DROP TABLE IF EXISTS `speciality`;
CREATE TABLE `speciality` (
  `speciality_Id` int(6) NOT NULL AUTO_INCREMENT,
  `speciality_Name` varchar(20) NOT NULL,
  `college_Id` int(4) NOT NULL,
  `isuse` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`speciality_Id`),
  KEY `college_Id` (`college_Id`),
  CONSTRAINT `college_Id` FOREIGN KEY (`college_Id`) REFERENCES `college` (`college_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=200302 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of speciality
-- ----------------------------
INSERT INTO `speciality` VALUES ('200101', '计算机科学与技术', '2001', '1');
INSERT INTO `speciality` VALUES ('200102', '软件工程', '2001', '1');
INSERT INTO `speciality` VALUES ('200201', '古代诗歌', '2002', '1');
INSERT INTO `speciality` VALUES ('200301', '英语', '2003', '1');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_Id` int(11) NOT NULL AUTO_INCREMENT,
  `student_Name` varchar(20) NOT NULL,
  `student_Pwd` varchar(10) NOT NULL,
  `real_Name` varchar(10) NOT NULL,
  `card_No` int(10) NOT NULL,
  `business` varchar(30) DEFAULT NULL,
  `enter_Year` int(4) NOT NULL,
  `class_Id` int(9) NOT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `zipcode` int(6) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `isuse` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`student_Id`),
  KEY `class_Id` (`class_Id`),
  CONSTRAINT `class_Id` FOREIGN KEY (`class_Id`) REFERENCES `class` (`class_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2014211170 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('2014211158', 'Luo_0412', '123', '骆金参', '2014211116', '前端工程师', '2014', '200101144', '17816869505', '宁波  宁海 强蛟', null, 'upload/2016051219443144.jpg', '0');
INSERT INTO `student` VALUES ('2014211159', 'Wang_0527', '123', '黄煜鑫', '2014211117', '大神', '2015', '200101144', '17816869555', '', null, 'upload/2016051218553151.jpg', '0');
INSERT INTO `student` VALUES ('2014211160', 'firefox', '123', '狐狸', '234', '女主播', '2015', '200101143', '178', '', null, 'upload/2016052315093129.png', '1');
INSERT INTO `student` VALUES ('2014211162', 'google', '123', '谷歌ge', '20142777', '浏览器', '2014', '200301141', '1781686950', '美国 加利福尼亚', null, 'upload/2016051318023134.jpg', '1');
INSERT INTO `student` VALUES ('2014211163', 'Yu_567', '123', '俞俊杰', '455566', '大神', '2017', '200201141', '677777', '7899', null, 'upload/2016051219353147.jpg', '0');
INSERT INTO `student` VALUES ('2014211164', 'Zhou_0913', '123', '周展翅', '49999', '', '2017', '200301141', '17816865555', '', null, 'upload/2016051219233138.jpg', '0');
INSERT INTO `student` VALUES ('2014211165', 'Yu_7890', '123', '俞梦', '23456', '长腿欧巴', '2014', '200102141', '4567', '525', null, 'upload/2016051302463110.jpg', '0');
INSERT INTO `student` VALUES ('2014211166', '56', '123', '56视频', '234', '', '2015', '200201141', '123', '', null, 'upload/2016051302453100.jpg', '1');
INSERT INTO `student` VALUES ('2014211167', 'huangs', '123', '黄益华', '330226', '学生', '2014', '200101144', '17816869504', '义乌', null, 'upload/2016051305063127.jpg', '1');
INSERT INTO `student` VALUES ('2014211168', 'luoooooo', '123', '骆帅', '3367230', '学生', '2014', '200101144', '17816869504', '宁波  宁海', null, 'upload/2016051318043102.jpg', '1');
INSERT INTO `student` VALUES ('2014211169', 'LUO', '123', '骆金参', '330226', '学生', '2014', '200101144', '699505', '宁波  宁海', null, '', '0');

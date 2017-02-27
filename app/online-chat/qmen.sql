/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : qmen

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-05-18 15:06:40
*/

CREATE DATABASE qmen;

USE qmen;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `board`
-- ----------------------------
DROP TABLE IF EXISTS `board`;
CREATE TABLE `board` (
  `board_no` int(10) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(140) NOT NULL,
  `from` int(3) NOT NULL,
  PRIMARY KEY (`board_no`),
  KEY `from` (`from`),
  CONSTRAINT `from` FOREIGN KEY (`from`) REFERENCES `teacher` (`tch_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of board
-- ----------------------------

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `class_id` int(3) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(10) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('141', '水浒');
INSERT INTO `class` VALUES ('142', '西游');
INSERT INTO `class` VALUES ('143', '三国');
INSERT INTO `class` VALUES ('144', '红楼');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `stu_id` int(10) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(10) NOT NULL,
  `stu_pwd` varchar(10) NOT NULL DEFAULT '123',
  `class_id` int(3) NOT NULL,
  `business` varchar(20) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`stu_id`),
  KEY `class_id_stu` (`class_id`),
  CONSTRAINT `class_id_stu` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2014213117 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '刘备', '123456', '143', null, null, null, null);
INSERT INTO `student` VALUES ('2', '曹冲', '123456', '143', null, null, null, null);
INSERT INTO `student` VALUES ('5', '貂蝉', '123456', '143', null, null, null, null);
INSERT INTO `student` VALUES ('15', '黄盖', '123456', '143', null, null, null, null);
INSERT INTO `student` VALUES ('2014201116', '卢俊义', '123456', '141', null, null, null, null);
INSERT INTO `student` VALUES ('2014211116', '骆金参', '123456', '144', '前端工程', '17816869505', '宁波  宁海', 'upload/2016051611323157.jpg');
INSERT INTO `student` VALUES ('2014211118', '林冲', '123456', '141', '', '17816869505', '杭州师范大学', null);
INSERT INTO `student` VALUES ('2014211119', '林黛玉', '123', '144', null, null, null, null);
INSERT INTO `student` VALUES ('2014211120', '薛宝钗', '123', '144', null, null, null, null);
INSERT INTO `student` VALUES ('2014211121', '嫦娥', '123', '142', null, null, null, null);
INSERT INTO `student` VALUES ('2014211122', '吴刚', '123', '142', null, null, null, null);
INSERT INTO `student` VALUES ('2014211123', '八戒', '123', '142', null, null, null, null);
INSERT INTO `student` VALUES ('2014211124', '武松', '123', '141', null, null, null, null);
INSERT INTO `student` VALUES ('2014211125', '西门庆', '123', '141', null, null, null, null);
INSERT INTO `student` VALUES ('2014211126', '潘金莲', '123', '141', null, null, null, null);
INSERT INTO `student` VALUES ('2014211136', '李逵', '123456', '141', null, null, null, null);
INSERT INTO `student` VALUES ('2014211176', '王熙凤', '123', '144', null, null, null, null);
INSERT INTO `student` VALUES ('2014211178', '诸葛亮', '123', '143', null, null, null, null);
INSERT INTO `student` VALUES ('2014211179', '周瑜', '123', '143', null, null, null, null);
INSERT INTO `student` VALUES ('2014211180', '曹操', '123', '143', null, null, null, null);
INSERT INTO `student` VALUES ('2014211186', '凤雏', '123456', '143', '计谋', '17816869505', '广州', null);
INSERT INTO `student` VALUES ('2014211196', '宋江', '123456', '141', null, null, null, null);
INSERT INTO `student` VALUES ('2014211716', '孙权', '123456', '143', null, null, null, null);
INSERT INTO `student` VALUES ('2014213116', '孙二娘', '123456', '141', '前端工程师', '17816869505', '宁波  宁海', 'upload/2016051706013133.jpg');

-- ----------------------------
-- Table structure for `stumessage`
-- ----------------------------
DROP TABLE IF EXISTS `stumessage`;
CREATE TABLE `stumessage` (
  `message_no` int(10) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(50) NOT NULL,
  `fromStu` int(10) NOT NULL,
  `toTch` int(3) NOT NULL,
  `isRead` int(1) NOT NULL DEFAULT '0',
  `isCollected` int(1) NOT NULL DEFAULT '0',
  `isDelete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_no`),
  KEY `fromStu` (`fromStu`),
  KEY `toTch` (`toTch`),
  CONSTRAINT `fromStu` FOREIGN KEY (`fromStu`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `toTch` FOREIGN KEY (`toTch`) REFERENCES `teacher` (`tch_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stumessage
-- ----------------------------
INSERT INTO `stumessage` VALUES ('218', '2016-05-16 22:12:24', '张佳老师，我是贾宝玉', '2014211116', '101', '1', '1', '0');
INSERT INTO `stumessage` VALUES ('219', '2016-05-16 22:12:57', 'Canvas课程主要讲什么？？', '2014211116', '101', '1', '1', '0');
INSERT INTO `stumessage` VALUES ('220', '2016-05-17 11:44:45', '张佳老师', '2014211116', '101', '1', '0', '1');
INSERT INTO `stumessage` VALUES ('221', '2016-05-17 11:45:06', ' 老师', '2014211116', '102', '1', '1', '0');
INSERT INTO `stumessage` VALUES ('222', '2016-05-17 12:00:53', ' 张佳老师好', '2014213116', '101', '1', '0', '0');
INSERT INTO `stumessage` VALUES ('223', '2016-05-17 20:45:27', ' 老师', '2014211116', '101', '1', '0', '0');
INSERT INTO `stumessage` VALUES ('224', '2016-05-17 20:46:53', ' 老师', '2014211116', '101', '1', '0', '0');
INSERT INTO `stumessage` VALUES ('225', '2016-05-17 20:47:36', '张佳老师', '2014211116', '101', '1', '0', '0');
INSERT INTO `stumessage` VALUES ('226', '2016-05-17 20:47:58', ' 老师', '2014211116', '102', '1', '1', '0');
INSERT INTO `stumessage` VALUES ('227', '2016-05-17 20:48:10', '徐舒畅老师', '2014211116', '102', '1', '1', '0');
INSERT INTO `stumessage` VALUES ('228', '2016-05-17 20:49:30', '  序数', '2014211116', '102', '1', '1', '0');

-- ----------------------------
-- Table structure for `tchmessage`
-- ----------------------------
DROP TABLE IF EXISTS `tchmessage`;
CREATE TABLE `tchmessage` (
  `message_no` int(10) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(50) NOT NULL,
  `fromTch` int(3) NOT NULL,
  `toStu` int(10) NOT NULL,
  `isRead` int(1) NOT NULL DEFAULT '0',
  `isCollected` int(1) NOT NULL DEFAULT '0',
  `isDelete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_no`),
  KEY `fromTch` (`fromTch`),
  KEY `toStu` (`toStu`),
  CONSTRAINT `fromTch` FOREIGN KEY (`fromTch`) REFERENCES `teacher` (`tch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `toStu` FOREIGN KEY (`toStu`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tchmessage
-- ----------------------------
INSERT INTO `tchmessage` VALUES ('349', '2016-05-16 22:14:06', ' 贾宝玉同学，就是绘画，画布。。你不知道吗？', '101', '2014211116', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('350', '2016-05-16 22:14:24', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('351', '2016-05-16 22:14:44', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('352', '2016-05-16 22:16:22', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('353', '2016-05-16 22:16:41', ' 同学', '101', '2', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('354', '2016-05-16 22:16:42', ' 同学', '101', '2', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('355', '2016-05-16 22:16:43', ' 同学', '101', '2', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('356', '2016-05-16 22:16:44', ' 同学', '101', '2', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('357', '2016-05-16 22:16:45', ' 同学', '101', '2', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('358', '2016-05-16 22:16:45', ' 同学', '101', '2', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('359', '2016-05-16 22:16:51', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('362', '2016-05-16 22:17:41', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('363', '2016-05-16 22:21:12', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('364', '2016-05-16 22:21:54', ' 同学', '101', '2014201116', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('365', '2016-05-16 22:21:56', ' 同学', '101', '2014201116', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('366', '2016-05-16 22:21:57', ' 同学', '101', '2014201116', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('367', '2016-05-16 22:21:58', ' 同学', '101', '2014201116', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('368', '2016-05-16 22:25:06', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('369', '2016-05-16 22:25:49', ' 同学', '101', '2014211186', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('370', '2016-05-16 22:26:16', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('371', '2016-05-16 22:27:40', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('373', '2016-05-16 22:29:17', ' 同学', '101', '2014201116', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('374', '2016-05-16 22:29:26', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('377', '2016-05-16 22:30:27', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('378', '2016-05-16 22:30:28', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('379', '2016-05-16 22:30:30', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('380', '2016-05-16 22:30:41', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('381', '2016-05-16 22:30:43', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('382', '2016-05-16 22:30:53', ' 甲同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('383', '2016-05-16 22:31:23', ' 甲同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('384', '2016-05-16 22:31:24', ' 甲同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('385', '2016-05-16 22:31:36', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('386', '2016-05-16 22:31:47', ' hello同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('387', '2016-05-16 22:34:31', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('388', '2016-05-16 22:34:32', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('389', '2016-05-16 22:34:39', ' 怎么样同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('390', '2016-05-16 22:34:46', '怎么办', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('391', '2016-05-16 22:39:05', '再见', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('392', '2016-05-16 22:40:16', '再见', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('393', '2016-05-16 22:40:21', '再见', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('394', '2016-05-16 22:40:43', '赋值了', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('395', '2016-05-16 22:40:50', '赋值', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('396', '2016-05-16 22:40:53', '赋值啊', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('397', '2016-05-16 22:41:08', '赋值', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('398', '2016-05-16 22:41:10', '赋值是', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('399', '2016-05-16 22:41:14', '赋值了', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('400', '2016-05-16 22:41:23', '赋值是', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('401', '2016-05-16 22:41:26', '赋值了', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('402', '2016-05-16 22:41:32', '赋值了得', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('403', '2016-05-16 22:41:49', '赋值', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('404', '2016-05-16 22:42:50', '赋值', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('405', '2016-05-16 22:43:16', '赋值', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('406', '2016-05-16 22:43:49', '赋值', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('407', '2016-05-16 22:43:59', '赋值', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('408', '2016-05-16 22:44:01', '赋值阿德', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('409', '2016-05-16 22:44:02', '赋值阿德是', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('410', '2016-05-16 22:44:41', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('411', '2016-05-16 22:45:49', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('412', '2016-05-16 22:46:26', '再见', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('413', '2016-05-16 22:46:29', '再见阿萨', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('414', '2016-05-16 22:47:26', '再见', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('415', '2016-05-16 22:47:54', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('416', '2016-05-16 22:48:14', '再见', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('417', '2016-05-16 22:48:16', '再见的v', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('418', '2016-05-16 22:50:05', ' 同学', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('419', '2016-05-16 22:50:10', ' 同学再见', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('420', '2016-05-16 22:50:14', '就是', '101', '2014211116', '1', '0', '1');
INSERT INTO `tchmessage` VALUES ('421', '2016-05-17 11:53:50', ' 诸葛亮同学，你在哪里？？', '101', '2014211178', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('422', '2016-05-17 12:00:30', '孙二娘同学好，我是张佳老师，欢迎来到我的课堂。', '101', '2014213116', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('423', '2016-04-17 12:02:42', '孙权同学好，我是张佳老师，欢迎来到我的课堂。', '101', '2014211716', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('424', '2016-05-17 12:02:42', '孙权同学好，我是徐舒畅老师，欢迎来到我的课堂。', '102', '2014211716', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('425', '2016-05-17 20:50:15', '你好', '102', '2014211116', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('426', '2016-05-17 20:50:19', '好的', '102', '2014211116', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('427', '2016-05-17 20:50:30', '嗯嗯', '102', '2014211116', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('428', '2016-05-17 20:50:37', '嗯呢', '102', '2014211180', '0', '0', '0');
INSERT INTO `tchmessage` VALUES ('429', '2016-05-17 20:50:43', '好的', '102', '2014211116', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('430', '2016-05-18 10:11:06', '序数', '102', '2014211116', '1', '0', '0');
INSERT INTO `tchmessage` VALUES ('431', '2016-05-18 10:11:13', '1nd', '102', '2014211116', '1', '0', '0');

-- ----------------------------
-- Table structure for `teach`
-- ----------------------------
DROP TABLE IF EXISTS `teach`;
CREATE TABLE `teach` (
  `teach_no` int(3) NOT NULL AUTO_INCREMENT,
  `tch_id` int(3) NOT NULL,
  `class_id` int(3) NOT NULL,
  PRIMARY KEY (`teach_no`),
  KEY `tch_id` (`tch_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tch_id` FOREIGN KEY (`tch_id`) REFERENCES `teacher` (`tch_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teach
-- ----------------------------
INSERT INTO `teach` VALUES ('1', '101', '141');
INSERT INTO `teach` VALUES ('2', '101', '142');
INSERT INTO `teach` VALUES ('4', '102', '143');
INSERT INTO `teach` VALUES ('5', '102', '144');
INSERT INTO `teach` VALUES ('6', '101', '143');
INSERT INTO `teach` VALUES ('7', '101', '144');

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tch_id` int(3) NOT NULL AUTO_INCREMENT,
  `tch_name` varchar(10) NOT NULL,
  `tch_pwd` varchar(10) NOT NULL DEFAULT '123456',
  `business` varchar(20) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`tch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('101', '张佳', '123456', '前端开发', '17816869505', '杭师大', 'upload/2016051615203105.jpg');
INSERT INTO `teacher` VALUES ('102', '徐舒畅', '123456', '数据库', '17816869505', '杭州', 'upload/2016051714503159.jpg');

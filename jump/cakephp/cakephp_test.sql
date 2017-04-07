/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : cakephp_test

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-07 21:01:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `age` varchar(2) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `class` varchar(2) DEFAULT NULL,
  `favorite` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('2', '传说', '$2y$10$VnTGjybId/RnB5LuUGWcd.xXbHT.3K0Faa/dVsdi8uHiL4DonEk.e', '男', '12', '男', '', '', '2017-04-07 11:05:31', '2017-04-07 11:05:31');
INSERT INTO `students` VALUES ('3', '哥只是个传说', '$2y$10$yPdc6KuILzdXA2F1yXPRpuViQ5y2JbDbBvSt3G6KQ.uQUWZAO9MFq', '帅哥', '20', '99', '4', '爬山', '2017-04-07 11:56:33', '2017-04-07 11:56:33');
INSERT INTO `students` VALUES ('4', 'tom', '$2y$10$K7eJI1nzS/6VJEHbjtzdj.x5flfXvNqmd5RatiIvKV.XRuSeJ/zL2', '男', '89', '', '', '', '2017-04-07 12:48:32', '2017-04-07 12:48:32');

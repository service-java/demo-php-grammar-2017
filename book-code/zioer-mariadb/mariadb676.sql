/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : mariadb676

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-06 20:08:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agenda`
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `content` text,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `allday` int(1) DEFAULT NULL,
  `end` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agenda
-- ----------------------------

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(100) DEFAULT NULL,
  `article_content` text,
  `createtime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_url` varchar(300) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_layer` int(11) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '日程管理', 'index.php', '0', '0', '0');
INSERT INTO `menu` VALUES ('2', '文章管理', '', '0', '0', '0');
INSERT INTO `menu` VALUES ('3', '图库管理', '', '0', '0', '0');
INSERT INTO `menu` VALUES ('4', '用户管理', 'users.php', '0', '0', '0');
INSERT INTO `menu` VALUES ('5', '新增文章', 'articleadd.php', '2', '1', '1');
INSERT INTO `menu` VALUES ('6', '文章列表', 'articles.php', '2', '1', '2');
INSERT INTO `menu` VALUES ('7', '上传图片', 'picupload.php', '3', '1', '0');
INSERT INTO `menu` VALUES ('8', '图片列表', 'pics.php', '3', '1', '1');

-- ----------------------------
-- Table structure for `pics`
-- ----------------------------
DROP TABLE IF EXISTS `pics`;
CREATE TABLE `pics` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(100) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pics
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(60) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------

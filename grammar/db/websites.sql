/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : mydbpdo2wr

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-04 19:26:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'æ–°é—»ç¼–å·',
  `title` varchar(60) NOT NULL COMMENT 'æ–°é—»æ ‡é¢˜',
  `content` text NOT NULL COMMENT 'æ–°é—»å†…å®¹',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'å‘å¸ƒæ—¶é—´',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Doe', 'john@example.com', '2017-04-03 22:42:44');
INSERT INTO `news` VALUES ('2', 'Moe', 'mary@example.com', '2017-04-03 22:42:44');
INSERT INTO `news` VALUES ('3', 'Dooley', 'julie@example.com', '2017-04-03 22:42:44');
INSERT INTO `news` VALUES ('4', 'John', 'john@example.com', '2017-04-04 19:24:28');
INSERT INTO `news` VALUES ('5', 'Julie', 'julie@example.com', '2017-04-04 19:24:29');
INSERT INTO `news` VALUES ('6', 'John', 'john@example.com', '2017-04-04 19:26:25');
INSERT INTO `news` VALUES ('7', 'Julie', 'julie@example.com', '2017-04-04 19:26:25');
INSERT INTO `news` VALUES ('8', 'Doe', 'john@example.com', '2017-04-04 19:26:26');

/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : weibo

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-10-09 19:22:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for weibo_user_extend
-- ----------------------------
DROP TABLE IF EXISTS `weibo_user_extend`;
CREATE TABLE `weibo_user_extend` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intro` varchar(255) DEFAULT NULL,
  UNIQUE KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weibo_user_extend
-- ----------------------------

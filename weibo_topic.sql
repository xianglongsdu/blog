/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : weibo

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-11-19 15:34:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for weibo_topic
-- ----------------------------
DROP TABLE IF EXISTS `weibo_topic`;
CREATE TABLE `weibo_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `content` char(255) NOT NULL COMMENT '微博内容',
  `content_over` char(25) DEFAULT '' COMMENT '微博溢出内容',
  `ip` int(10) unsigned NOT NULL COMMENT 'IP',
  `create` int(10) unsigned NOT NULL COMMENT '发表时间',
  `uid` int(10) unsigned NOT NULL COMMENT '发表用户',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weibo_topic
-- ----------------------------
INSERT INTO `weibo_topic` VALUES ('32', '12344543334434334', '', '2130706433', '1479540686', '15');

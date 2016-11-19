/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : weibo

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-11-19 15:35:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for weibo_user
-- ----------------------------
DROP TABLE IF EXISTS `weibo_user`;
CREATE TABLE `weibo_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(40) NOT NULL COMMENT '密码',
  `email` varchar(50) NOT NULL COMMENT '电子邮件',
  `create` int(10) NOT NULL COMMENT '创建时间',
  `last_login` int(10) NOT NULL COMMENT '最后登录时间',
  `last_ip` int(10) NOT NULL COMMENT '最后登录IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weibo_user
-- ----------------------------
INSERT INTO `weibo_user` VALUES ('15', 'juedi', 'juedi01', 'juedi@qq.com', '1477911168', '1479536892', '2130706433');
INSERT INTO `weibo_user` VALUES ('16', 'juedi01', 'juedi01', 'juedi01@163.com', '1478169922', '0', '0');

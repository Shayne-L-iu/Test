/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : mydatabase

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-29 06:14:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cates`
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cates
-- ----------------------------
INSERT INTO `cates` VALUES ('1', '美味糕点');
INSERT INTO `cates` VALUES ('2', '坚果食品');
INSERT INTO `cates` VALUES ('3', '服装类');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `good_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `coverpic` varchar(255) NOT NULL,
  PRIMARY KEY (`good_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '雪麸蛋糕', '29.9', '1', '/img/g1.png');
INSERT INTO `goods` VALUES ('2', '天然酵母面包', '14.5', '1', '/img/g2.png');
INSERT INTO `goods` VALUES ('3', '柔风黄油曲奇', '78', '1', '/img/g3.png');
INSERT INTO `goods` VALUES ('4', '绿茶蛋黄酥 50克*4枚', '22.5', '1', '/img/g4.png');
INSERT INTO `goods` VALUES ('5', '法式松饼 20克*8枚', '28', '1', '/img/g5.png');
INSERT INTO `goods` VALUES ('6', '茶香酥 10克*20枚', '25', '1', '/img/g6.png');
INSERT INTO `goods` VALUES ('7', '苏打夹心饼干 24克*10袋', '15.8', '1', '/img/g7.png');
INSERT INTO `goods` VALUES ('8', '姜汁薄脆 130克（8袋入）', '15', '1', '/img/g8.png');
INSERT INTO `goods` VALUES ('9', '碧根果仁 128克', '28.8', '2', '/img/j1.png');
INSERT INTO `goods` VALUES ('10', '原香味巴旦木 168克', '28', '2', '/img/j2.png');
INSERT INTO `goods` VALUES ('11', '盐焗腰果 158克', '32', '2', '/img/j3.png');
INSERT INTO `goods` VALUES ('12', '原味葵花籽 185克', '9.6', '2', '/img/j4.png');
INSERT INTO `goods` VALUES ('13', '麻辣花生 110克', '6', '2', '/img/j5.png');
INSERT INTO `goods` VALUES ('14', '蚕豆瓣 240克', '16', '2', '/img/j6.png');
INSERT INTO `goods` VALUES ('15', '混合腰果 30克*7袋', '52', '2', '/img/j7.png');
INSERT INTO `goods` VALUES ('16', '瓜子仁 240克', '16', '2', '/img/j8.png');
INSERT INTO `goods` VALUES ('17', '100%羊毛男士简约呢大衣', '1299', '3', '/img/y1.png');
INSERT INTO `goods` VALUES ('18', '男式经典呢大衣', '1599', '3', '/img/y2.png');
INSERT INTO `goods` VALUES ('19', '男式防风工装外套', '599', '3', '/img/y3.png');
INSERT INTO `goods` VALUES ('20', '男式潮流侧带装饰卫衣', '269', '3', '/img/y4.png');
INSERT INTO `goods` VALUES ('21', '女式金丝撒粉花呢外套', '285', '3', '/img/y5.png');
INSERT INTO `goods` VALUES ('22', '女式真皮基础夹克', '1299', '3', '/img/y6.png');
INSERT INTO `goods` VALUES ('23', '女式优雅拼接西装套裙', '1299', '3', '/img/y7.png');
INSERT INTO `goods` VALUES ('24', '女式超轻连帽长款羽绒服', '799', '3', '/img/y8.png');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `num` double NOT NULL,
  `name` varchar(20) NOT NULL,
  `tel` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detail` text,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '2', '30', 'LC', '2147483647', '福建省厦门市', '2018-12-28 23:56:29', 'a:2:{i:0;i:2;i:1;i:7;}');
INSERT INTO `orders` VALUES ('2', '2', '44.4', 'LC', '2147483647', '福建省厦门市', '2018-12-28 23:58:39', 'a:2:{i:0;i:2;i:1;i:1;}');
INSERT INTO `orders` VALUES ('3', '2', '92.5', 'LC', '2147483647', '福建省厦门市', '2018-12-29 01:39:07', 'a:2:{i:0;i:3;i:1;i:2;}');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `psd` char(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'u_test', '123456', '789456123@163.com', '福建省厦门市', '2018-12-26 18:02:17', '0');
INSERT INTO `users` VALUES ('2', 'Admin', 'qweqwe', '56489491@qq.com', '海南省三亚市', '2018-12-26 18:18:54', '1');
INSERT INTO `users` VALUES ('3', 'test', '123456', 'der789789@163.com', '黑龙江省', '2018-12-27 22:28:46', '0');
INSERT INTO `users` VALUES ('4', 'xiaoming', '123456', 'wobuhsixiaoming@163.com', '海南省三亚市', '2018-12-27 22:32:51', '0');
INSERT INTO `users` VALUES ('5', 'wsdsg', '789789', '456789123@qq.com', '美国拉斯维加斯', '2018-12-27 22:39:28', '0');
INSERT INTO `users` VALUES ('6', 'Fine', 'okfine', 'iamgood@163.com', '地球村', '2018-12-27 22:46:09', '0');

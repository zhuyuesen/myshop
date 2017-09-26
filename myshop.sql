-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2016 广01 朿08 旿11:04
-- 服务器版本: 5.6.17
-- PHP 版本: 5.6.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `myshop15`
-- 
CREATE DATABASE `myshop15` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `myshop15`;

-- --------------------------------------------------------

-- 
-- 表的结构 `advert`
-- 

CREATE TABLE `advert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `pos` tinyint(4) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `advert`
-- 

INSERT INTO `advert` VALUES (5, '14519674771654552059.jpg', 1, 'http://www.baidu.com');
INSERT INTO `advert` VALUES (6, '14519674881925629022.jpg', 0, 'http://www.qq.com');

-- --------------------------------------------------------

-- 
-- 表的结构 `brand`
-- 

CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- 导出表中的数据 `brand`
-- 

INSERT INTO `brand` VALUES (7, '联想', 1);
INSERT INTO `brand` VALUES (8, 'DELL', 1);
INSERT INTO `brand` VALUES (9, '三星', 3);
INSERT INTO `brand` VALUES (10, '苹果', 3);
INSERT INTO `brand` VALUES (11, '雷蛇', 4);

-- --------------------------------------------------------

-- 
-- 表的结构 `class`
-- 

CREATE TABLE `class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `class`
-- 

INSERT INTO `class` VALUES (1, '电脑');
INSERT INTO `class` VALUES (3, '手机');
INSERT INTO `class` VALUES (4, '鼠标');

-- --------------------------------------------------------

-- 
-- 表的结构 `comment`
-- 

CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text,
  `shop_id` int(11) NOT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `comment`
-- 

INSERT INTO `comment` VALUES (1, 14, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 12, 1452221961);
INSERT INTO `comment` VALUES (2, 14, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 31, 1452221971);
INSERT INTO `comment` VALUES (3, 14, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 12, 1452221984);

-- --------------------------------------------------------

-- 
-- 表的结构 `indent`
-- 

CREATE TABLE `indent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `touch_id` int(11) NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `price` float unsigned NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `confirm` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `indent`
-- 

INSERT INTO `indent` VALUES (1, '1452216457178734098', 14, 1452216457, 5, 3, 12, 100, 10, 1);
INSERT INTO `indent` VALUES (2, '1452216457178734098', 14, 1452216457, 5, 3, 15, 400, 5, 1);
INSERT INTO `indent` VALUES (3, '1452216457178734098', 14, 1452216457, 5, 3, 30, 400, 5, 1);
INSERT INTO `indent` VALUES (4, '1452218728837569957', 14, 1452218728, 3, 5, 31, 500, 3, 1);
INSERT INTO `indent` VALUES (5, '1452218728837569957', 14, 1452218728, 3, 5, 19, 300, 3, 1);
INSERT INTO `indent` VALUES (6, '1452220713692073358', 14, 1452220713, 1, 6, 10, 400, 2, 1);
INSERT INTO `indent` VALUES (7, '1452220786885334336', 14, 1452220786, 1, 3, 25, 400, 3, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `shop`
-- 

CREATE TABLE `shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `shelf` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- 
-- 导出表中的数据 `shop`
-- 

INSERT INTO `shop` VALUES (7, '联想-1', '14520633451347695388.jpg', 1001, 100, 7, 1);
INSERT INTO `shop` VALUES (8, '联想-2', '1452049548213063468.jpg', 200, 10, 7, 1);
INSERT INTO `shop` VALUES (9, '联想-3', '1452049560654634541.jpg', 300, 10, 7, 1);
INSERT INTO `shop` VALUES (10, '联想-4', '1452049587785546704.jpg', 400, 8, 7, 1);
INSERT INTO `shop` VALUES (11, '联想-5', '14520495961653442515.jpg', 500, 10, 7, 1);
INSERT INTO `shop` VALUES (12, 'DELL-1', '14520496101564326695.jpg', 100, 10, 8, 1);
INSERT INTO `shop` VALUES (13, 'DELL-2', '14520496221421192279.jpg', 200, 10, 8, 1);
INSERT INTO `shop` VALUES (14, 'DELL-3', '1452049634324930230.jpg', 300, 10, 8, 1);
INSERT INTO `shop` VALUES (15, 'DELL-4', '14520496501917620655.jpg', 400, 5, 8, 1);
INSERT INTO `shop` VALUES (16, 'DELL-5', '14520496631614631964.jpg', 500, 10, 8, 1);
INSERT INTO `shop` VALUES (17, '三星-1', '14520496781551893387.jpg', 100, 10, 9, 1);
INSERT INTO `shop` VALUES (18, '三星-2', '1452049689602514996.jpg', 200, 10, 9, 1);
INSERT INTO `shop` VALUES (19, '三星-3', '14520497001386168760.jpg', 300, 7, 9, 1);
INSERT INTO `shop` VALUES (20, '三星-4', '1452049709102494745.jpg', 400, 10, 9, 1);
INSERT INTO `shop` VALUES (21, '三星-5', '14520497182059454006.jpg', 500, 10, 9, 1);
INSERT INTO `shop` VALUES (22, '苹果-1', '14520497361989953450.jpg', 100, 10, 10, 1);
INSERT INTO `shop` VALUES (23, '苹果-2', '14520497501558029486.jpg', 200, 10, 10, 1);
INSERT INTO `shop` VALUES (24, '苹果-3', '14520497611723339328.jpg', 300, 10, 10, 1);
INSERT INTO `shop` VALUES (25, '苹果-4', '14520497701236655768.jpg', 400, 7, 10, 1);
INSERT INTO `shop` VALUES (26, '苹果-5', '1452049780331245533.jpg', 50, 10, 10, 1);
INSERT INTO `shop` VALUES (27, '雷蛇-1', '1452053140381209942.jpg', 100, 10, 11, 1);
INSERT INTO `shop` VALUES (28, '雷蛇-2', '1452053159667678475.jpg', 200, 10, 11, 1);
INSERT INTO `shop` VALUES (29, '雷蛇-3', '1452053170824507242.jpg', 300, 10, 11, 1);
INSERT INTO `shop` VALUES (30, '雷蛇-4', '14520531781358169586.jpg', 400, 5, 11, 1);
INSERT INTO `shop` VALUES (31, '雷蛇-5', '14520531901916772613.jpg', 500, 7, 11, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `status`
-- 

CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `status`
-- 

INSERT INTO `status` VALUES (1, '未发货');
INSERT INTO `status` VALUES (2, '已发货');
INSERT INTO `status` VALUES (3, '未付款');
INSERT INTO `status` VALUES (5, '已付款');

-- --------------------------------------------------------

-- 
-- 表的结构 `touch`
-- 

CREATE TABLE `touch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `touch`
-- 

INSERT INTO `touch` VALUES (3, '金龙2', '月球2', '1102', 'jing@qq.com2', 14);
INSERT INTO `touch` VALUES (5, '帅华2', '地球2', '1192', 'huq@qq.com2', 14);
INSERT INTO `touch` VALUES (6, '文科', '110号', '110', 'wen@qq.com', 14);

-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` VALUES (10, 'admin', '202cb962ac59075b964b07152d234b70', 1);
INSERT INTO `user` VALUES (14, 'user1', '202cb962ac59075b964b07152d234b70', 0);

-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?06 �?30 �?01:58
-- 服务器版本: 5.5.53
-- PHP 版本: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `huacha`
--

-- --------------------------------------------------------

--
-- 表的结构 `kind_click`
--

CREATE TABLE IF NOT EXISTS `kind_click` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gstart` int(11) DEFAULT NULL COMMENT '一分钟解锁广漂档案',
  `goutput` int(11) DEFAULT NULL COMMENT 'output',
  `gend` int(11) DEFAULT NULL COMMENT '最后一题',
  `gyouhui` int(11) DEFAULT NULL COMMENT '优惠劵',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `kind_click`
--

INSERT INTO `kind_click` (`id`, `gstart`, `goutput`, `gend`, `gyouhui`) VALUES
(1, 686, 310, 118, 95);

-- --------------------------------------------------------

--
-- 表的结构 `option6case`
--

CREATE TABLE IF NOT EXISTS `option6case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opname` char(250) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `option6case`
--

INSERT INTO `option6case` (`id`, `opname`, `num`) VALUES
(1, 'A', 36),
(2, 'B', 23),
(3, 'C', 48),
(4, 'D', 13),
(5, 'E', 57),
(6, 'F', 27),
(7, 'G', 61);

-- --------------------------------------------------------

--
-- 表的结构 `option7case`
--

CREATE TABLE IF NOT EXISTS `option7case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opname` char(250) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `option7case`
--

INSERT INTO `option7case` (`id`, `opname`, `num`) VALUES
(1, 'A', 20),
(2, 'B', 36),
(3, 'C', 119),
(4, 'D', 90);

-- --------------------------------------------------------

--
-- 表的结构 `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workname` char(250) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `work`
--

INSERT INTO `work` (`id`, `workname`, `num`) VALUES
(1, '设计狮', 17),
(2, '策划', 14),
(3, '程序猿', 20),
(4, '行政', 2),
(5, '财务', 9),
(6, '公职员', 7),
(7, '产品汪', 15),
(8, 'HR', 5),
(9, '运营', 36),
(10, '销售人', 25),
(11, '老板', 31),
(12, '商务', 15),
(13, '文案', 6),
(14, '我就是我', 63);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

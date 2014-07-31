-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2014 年 01 月 13 日 10:28
-- 伺服器版本: 5.5.34
-- PHP 版本: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `treasure`
--

-- --------------------------------------------------------

--
-- 表的結構 `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `record_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(30) NOT NULL COMMENT '校務系統帳號',
  `dep` varchar(10) NOT NULL COMMENT '系所',
  `edo` char(1) NOT NULL DEFAULT '0' COMMENT '各系系辦',
  `swn` char(1) NOT NULL DEFAULT '0' COMMENT '總務處文書組',
  `cgcs` char(1) NOT NULL DEFAULT '0' COMMENT '教務處課務組',
  `health` char(1) NOT NULL DEFAULT '0' COMMENT '學務處健康促進中心',
  `cgrs` char(1) NOT NULL DEFAULT '0' COMMENT '教務處註冊組',
  `obsce` char(1) NOT NULL DEFAULT '0' COMMENT '兩岸合作交流處',
  `mid` char(1) NOT NULL DEFAULT '0' COMMENT '校安中心',
  `life` char(1) NOT NULL DEFAULT '0' COMMENT '學務處生活輔導組',
  `ecc` char(1) NOT NULL DEFAULT '0' COMMENT '電算中心',
  `activity` char(1) NOT NULL DEFAULT '0' COMMENT '學務處課外活動指導組',
  `alumnus` char(1) NOT NULL DEFAULT '0' COMMENT '學務處(職發暨)校友中心',
  `ccdc` char(1) NOT NULL DEFAULT '0' COMMENT '學務處諮商與生涯發展中心',
  `scs` char(1) NOT NULL DEFAULT '0' COMMENT '總務處出納組',
  `pam` char(1) NOT NULL DEFAULT '0' COMMENT '公共事務室',
  `sgas` char(1) NOT NULL DEFAULT '0' COMMENT '總務處事務組',
  `seass` char(1) NOT NULL DEFAULT '0' COMMENT '總務處環安組',
  `scams` char(1) NOT NULL DEFAULT '0' COMMENT '總務處營繕組',
  `lib` char(1) NOT NULL DEFAULT '0' COMMENT '圖書館',
  `nac` char(1) NOT NULL DEFAULT '0' COMMENT '進修推廣部',
  `tlrc` char(1) NOT NULL DEFAULT '0' COMMENT '教學與學習資源中心',
  `iad` char(1) NOT NULL DEFAULT '0' COMMENT '國際事務處',
  `upr` char(1) NOT NULL DEFAULT '0' COMMENT '統一美食廣場',
  `peo` char(1) NOT NULL DEFAULT '0' COMMENT '體育室',
  `lcc` char(1) NOT NULL DEFAULT '0' COMMENT '語文中心',
  `mac` char(1) NOT NULL DEFAULT '0' COMMENT '藝文中心',
  `year` char(3) NOT NULL COMMENT '學年',
  PRIMARY KEY (`record_id`),
  KEY `account` (`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

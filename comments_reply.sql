-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 09 月 10 日 06:40
-- 伺服器版本: 5.6.35
-- PHP 版本： 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `scsrc2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comments_reply`
--

CREATE TABLE `comments_reply` (
  `DB_MadID` int(12) UNSIGNED NOT NULL,
  `DB_MesID` int(11) NOT NULL DEFAULT '0',
  `reply_name` varchar(10) NOT NULL,
  `DB_MadBack` text NOT NULL,
  `DB_MadTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pass` tinyint(4) NOT NULL DEFAULT '-1',
  `manager` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `comments_reply`
--

INSERT INTO `comments_reply` (`DB_MadID`, `DB_MesID`, `reply_name`, `DB_MadBack`, `DB_MadTime`, `pass`, `manager`) VALUES
(61, 49, '管理員', '加油', '2017-09-09 22:05:17', 1, 1),
(67, 51, '管理員', 'ＣＣＣＣＡＡＡ', '2017-09-09 23:51:34', 1, 1),
(68, 49, 'WIlson', 'I am Wilson', '2017-09-09 23:59:15', 1, 0),
(69, 58, 'E1', 'E1', '2017-09-10 12:18:30', 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `comments_reply`
--
ALTER TABLE `comments_reply`
  ADD PRIMARY KEY (`DB_MadID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `comments_reply`
--
ALTER TABLE `comments_reply`
  MODIFY `DB_MadID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

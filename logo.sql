-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 09 月 25 日 17:09
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
-- 資料表結構 `logo`
--

CREATE TABLE `logo` (
  `DB_LogID` int(11) NOT NULL,
  `DB_LogExp` varchar(255) NOT NULL DEFAULT '',
  `DB_LogImg` varchar(255) NOT NULL DEFAULT '',
  `DB_LogFileName` varchar(255) NOT NULL DEFAULT '',
  `DB_LogAnnounce` int(11) NOT NULL DEFAULT '0',
  `DB_AddTime` date NOT NULL DEFAULT '0000-00-00',
  `DB_EndTime` date NOT NULL DEFAULT '0000-00-00',
  `DB_EditUser` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上方LOGO管理';

--
-- 資料表的匯出資料 `logo`
--

INSERT INTO `logo` (`DB_LogID`, `DB_LogExp`, `DB_LogImg`, `DB_LogFileName`, `DB_LogAnnounce`, `DB_AddTime`, `DB_EndTime`, `DB_EditUser`) VALUES
(1, '網站所屬單位名稱及嗨嗨圖', '1506317346.jpg', 'MainLogo.jpg', 0, '2010-05-13', '2017-09-25', 'okder');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`DB_LogID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `logo`
--
ALTER TABLE `logo`
  MODIFY `DB_LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

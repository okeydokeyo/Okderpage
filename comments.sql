-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 09 月 09 日 17:28
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
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `DB_MesID` int(12) UNSIGNED NOT NULL,
  `DB_MesContent` text NOT NULL,
  `DB_MesName` varchar(255) NOT NULL DEFAULT '',
  `DB_MesSubject` varchar(255) NOT NULL DEFAULT '',
  `category` varchar(6) NOT NULL,
  `DB_MesTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DB_MesEmail` varchar(255) NOT NULL DEFAULT '',
  `pass` tinyint(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言板資料庫';

--
-- 資料表的匯出資料 `comments`
--

INSERT INTO `comments` (`DB_MesID`, `DB_MesContent`, `DB_MesName`, `DB_MesSubject`, `category`, `DB_MesTime`, `DB_MesEmail`, `pass`) VALUES
(49, 'AAA', 'AAA', 'AAA', '捐款', '2017-09-08 18:11:54', 'AAA', 1),
(50, 'BBB', 'BBB', 'BBBB', '捐款', '2017-09-09 16:10:03', 'BBB', 1),
(51, 'CCC', 'CCC', 'CCC', '通報', '2017-09-09 21:13:10', 'CCC', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`DB_MesID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `DB_MesID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

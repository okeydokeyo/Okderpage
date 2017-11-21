-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-11-21 03:24:29
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- 資料表結構 `left`
--

CREATE TABLE `left` (
  `DB_LefID` int(11) NOT NULL,
  `DB_LefTagID` int(11) NOT NULL DEFAULT '0',
  `DB_LefSort` int(11) NOT NULL DEFAULT '0',
  `DB_LefAnnounce` int(11) NOT NULL DEFAULT '0',
  `DB_LefSubject` varchar(255) NOT NULL DEFAULT '',
  `DB_LefClass` int(11) NOT NULL DEFAULT '0',
  `DB_LefBasis` int(11) NOT NULL DEFAULT '0',
  `DB_LefNumID` int(11) NOT NULL DEFAULT '0',
  `DB_LefUrl` varchar(255) NOT NULL DEFAULT '',
  `DB_LefUrlName` varchar(255) NOT NULL DEFAULT '',
  `DB_LefArchive` varchar(255) NOT NULL DEFAULT '',
  `DB_LefName` varchar(255) NOT NULL DEFAULT '',
  `DB_AddTime` date NOT NULL DEFAULT '0000-00-00',
  `DB_EndTime` date NOT NULL DEFAULT '0000-00-00',
  `DB_EditUser` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='網頁首頁管理-左側選單管理';

--
-- 資料表的匯出資料 `left`
--

INSERT INTO `left` (`DB_LefID`, `DB_LefTagID`, `DB_LefSort`, `DB_LefAnnounce`, `DB_LefSubject`, `DB_LefClass`, `DB_LefBasis`, `DB_LefNumID`, `DB_LefUrl`, `DB_LefUrlName`, `DB_LefArchive`, `DB_LefName`, `DB_AddTime`, `DB_EndTime`, `DB_EditUser`) VALUES
(60, 34, 3, 0, '作業訓練', 0, 2, 45, '', '', '', '', '2010-10-15', '2017-07-18', 'mezu'),
(61, 34, 4, 0, '職業訓練', 0, 2, 44, '', '', '', '', '2010-10-15', '2011-02-25', 'admin'),
(63, 34, 2, 0, '社區居住服務', 0, 2, 47, '', '', '', '', '2010-10-15', '2011-02-25', 'admin'),
(59, 34, 1, 0, '生活重建訓練', 0, 2, 42, '', '', '', '', '2010-10-15', '2011-02-08', 'admin'),
(96, 34, 5, 0, '生命教育宣導', 0, 2, 63, '', '', '', '', '2012-02-10', '0000-00-00', 'pocheng'),
(97, 34, 6, 0, '居家就業', 0, 2, 64, '', '', '', '', '2012-02-13', '0000-00-00', 'pocheng'),
(98, 35, 3, 0, '服務成果報告書', 0, 0, 123, '', '', '', '', '0000-00-00', '0000-00-00', ''),
(99, 35, 2, 0, '超人之友', 0, 0, 124, '', '', '', '', '0000-00-00', '0000-00-00', ''),
(100, 35, 1, 0, '友善新世界', 0, 0, 125, '', '', '', '', '0000-00-00', '0000-00-00', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `left`
--
ALTER TABLE `left`
  ADD PRIMARY KEY (`DB_LefID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `left`
--
ALTER TABLE `left`
  MODIFY `DB_LefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

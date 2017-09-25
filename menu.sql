-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 09 月 25 日 17:39
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
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `DB_MenID` int(11) NOT NULL,
  `DB_MenContent` text NOT NULL,
  `DB_EndTime` date NOT NULL DEFAULT '0000-00-00',
  `DB_EditUser` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='下方選單';

--
-- 資料表的匯出資料 `menu`
--

INSERT INTO `menu` (`DB_MenID`, `DB_MenContent`, `DB_EndTime`, `DB_EditUser`) VALUES
(1, '    <h4 id=\"contactUs\">聯絡我們 </h4>\r\n    <a href=\"https://www.facebook.com/SCSRC.ORG.TW/\"><img class=\" img-circle\" src=\"images/Facebook.png\"  id=\"Facebook\"/></a>\r\n    <h4 id=\"address\">脊髓損傷協同團隊-財團法人脊髓損傷潛能發展中心</h4>\r\n    <h4 id=\"address\">32661桃園市楊梅區高榮里快速路五段701號</h4>\r\n    <h4 id=\"address\" style=\"padding-bottom:20px\">(03)490-9001</h4>', '2017-09-25', 'okder');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`DB_MenID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `DB_MenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

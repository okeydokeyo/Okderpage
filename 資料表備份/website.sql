-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-09-18 15:58:54
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
-- 資料表結構 `website`
--

CREATE TABLE `website` (
  `DB_WebID` int(11) NOT NULL,
  `DB_WebTagID` int(11) NOT NULL DEFAULT '0',
  `DB_WebSort` int(11) NOT NULL DEFAULT '0',
  `DB_WebSubject` varchar(255) NOT NULL DEFAULT '',
  `DB_WebUrl` varchar(255) NOT NULL DEFAULT '',
  `DB_WebImg` varchar(255) NOT NULL DEFAULT '',
  `DB_WebFileName` varchar(255) NOT NULL DEFAULT '',
  `DB_WebAnnounce` int(11) NOT NULL DEFAULT '0',
  `DB_AddTime` date NOT NULL DEFAULT '0000-00-00',
  `DB_EndTime` date NOT NULL DEFAULT '0000-00-00',
  `DB_EditUser` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='網站連結管理';

--
-- 資料表的匯出資料 `website`
--

INSERT INTO `website` (`DB_WebID`, `DB_WebTagID`, `DB_WebSort`, `DB_WebSubject`, `DB_WebUrl`, `DB_WebImg`, `DB_WebFileName`, `DB_WebAnnounce`, `DB_AddTime`, `DB_EndTime`, `DB_EditUser`) VALUES
(45, 16, 4, '台灣大哥大', 'http://www.taiwanmobile.com/index.html', 'taiwanmobilelogo.png', 'TWM_142x48.jpg', 0, '2011-11-23', '2015-06-02', 'adam'),
(46, 16, 2, '台灣大哥大基金會', 'http://www.twmf.org.tw/', 'twmflogo.png', 'TWMF_142x48.jpg', 0, '2011-11-23', '0000-00-00', 'adam'),
(47, 15, 3, 'e碼網路工作室', 'http://emaster.scsrc.org.tw', '1354157603.gif', 'embarnner.gif', 1, '2012-02-17', '2015-06-02', 'adam'),
(48, 16, 3, '雅博客二手書店', 'http://www.yabook.com.tw', 'yabooklogo.gif', 'MsgImg_20090531180918.gif', 0, '2012-04-20', '0000-00-00', 'adam'),
(42, 15, 5, '新生命資訊服務股份有限公司', 'http://www.nlis.com.tw/', 'newlifelogo.png', '新生命資訊股份有限公司.png', 0, '2011-08-09', '0000-00-00', 'adam'),
(43, 15, 6, '菲亞國際股份有限公司', 'http://www.wheelchair.tw/index.php', 'VIYAlogo.png', '菲亞國際股份有限公司.gif', 0, '2011-08-09', '2014-01-21', 'pocheng'),
(44, 15, 7, '通用無障礙股份有限公司', 'http://www.barrierfree.com.tw/', 'barrierfreelogo.gif', '通用無障礙股份有限公司.gif', 0, '2011-08-09', '0000-00-00', 'adam'),
(54, 16, 5, '中華社會福利聯合勸募協會', 'https://www.unitedway.org.tw/', 'unitedwaylogo.png', 'LOGO-png.png', 0, '2015-06-08', '0000-00-00', 'pocheng'),
(38, 15, 2, '綠色資源工作室', 'http://www.webdo.com.tw/scsrcgreen/', '1312851018.gif', '綠色資源工作室.gif', 1, '2011-08-09', '2013-02-27', 'admin'),
(39, 15, 3, '舊物回收綠色系統', 'http://www.scsrc.org.tw/gs/', '1312851077.jpg', '綠色系統工作室.jpg', 1, '2011-08-09', '2011-09-22', 'adam'),
(40, 15, 4, '優先採購網路資訊平台', 'https://ptp.sfaa.gov.tw/internet/disability/index.aspx', 'shoplogo.gif', '優先採購網路資訊平台.gif', 0, '2011-08-09', '0000-00-00', 'adam'),
(49, 16, 2, '林堉琪先生紀念基金會', 'http://www.yuhchi.org.tw/', 'yuhchiorglogo.gif', '林堉琪基金會Banner.gif', 0, '2012-08-06', '2015-06-02', 'adam'),
(53, 15, 1, '脊髓損傷社會福利基金會', 'http://www.scif.org.tw/', 'spinallogo.png', '-1.jpg', 0, '2013-12-10', '2015-06-02', 'adam');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`DB_WebID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `website`
--
ALTER TABLE `website`
  MODIFY `DB_WebID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

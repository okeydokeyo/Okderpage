-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 07 月 20 日 05:36
-- 伺服器版本: 5.6.35
-- PHP 版本： 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `billboard`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `content` varchar(300) NOT NULL,
  `name` varchar(10) NOT NULL,
  `topic` varchar(20) NOT NULL,
  `category` varchar(5) NOT NULL,
  `time` datetime NOT NULL,
  `pass` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言板資料庫';

--
-- 資料表的匯出資料 `comments`
--

INSERT INTO `comments` (`ID`, `content`, `name`, `topic`, `category`, `time`, `pass`) VALUES
(1, '我是OkeyOkey', '劉昌平', '嗨嗨', '認識', '2017-07-12 00:00:00', 0),
(2, '我是資料二', 'winnie', '二二二', '認識', '2017-07-27 00:00:00', 0),
(3, 'How are you', 'mandy', 'I am Mandy', '', '2017-07-20 05:27:25', 0),
(4, '我是資料', 'Wilson', 'HIHI', '', '2017-07-20 05:28:18', 0),
(5, 'zxc', 'mandy', 'xad', '', '2017-07-20 05:35:49', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

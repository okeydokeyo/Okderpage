-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 09 月 17 日 17:20
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
(1, 25, '管理員', '黃小姐您好:\r\n關於捐款事宜請電03-490-9001轉115', '2011-12-05 18:53:51', 1, 1),
(2, 28, '管理員', '謝謝您的來信:\r\n我們將為您取消超人之友期刊訂戶寄送\r\n\r\n敬祝 平安', '2011-12-29 08:23:22', 1, 1),
(3, 29, '管理員', 'PURPLE您好:\r\n中心目前的微坡爐數量尚堪用，\r\n非常感謝您的愛心，\r\n\r\n並祝您新年快樂!!', '2012-01-18 22:01:46', 1, 1),
(4, 30, '管理員', '小落您好:\r\n請問您的居住地是在台灣嗎?\r\n是否方便讓我們知道您居住哪個縣市呢?', '2012-01-18 22:02:49', 1, 1),
(5, 31, '管理員', '謝函廷您好：\r\n感謝您對脊髓損傷潛能發展中心愛心二手書的支持，\r\n新的愛心二手書捐贈服務會在2月底前重新與大家見面，\r\n屆時再請您繼續支持。\r\n\r\n並祝 新春愉快', '2012-02-02 13:19:45', 1, 1),
(6, 34, '管理員', '您好:\r\n將由一位劉先生與您聯絡\r\n敬祝 平安', '2012-03-02 13:44:12', 1, 1),
(7, 33, '管理員', '杜小姐您好:\r\n關於生活重建業務請洽 03-490991#223 劉先生', '2012-02-15 13:41:03', 1, 1),
(8, 36, '管理員', '您好:\r\n您可以直接撥打電話與劉老師聯絡\r\n03-4909001#233\r\n\r\n謝謝', '2012-03-15 12:12:58', 1, 1),
(9, 13, '管理員', '您好:\r\n非常感謝您的來信告知，因網站變更所造成連結錯誤已經更正，\r\n您已可以直接透過線上完成捐款作業，\r\n感謝您的來信 並祝平安。', '2011-08-08 11:04:45', 1, 1),
(10, 14, '管理員', '親愛的阿尼色弗兒童之家您好:\r\n非常感謝您的來信，\r\n我們將為您取消超人之友寄送名單，\r\n同時更是感謝您長期對脊髓損傷傷友的支持與關愛，\r\n\r\n敬祝  平安。\r\n', '2011-08-15 08:00:17', 1, 1),
(11, 15, '管理員', '親愛的傅文欽您好:\r\n非常感謝您的來信，\r\n我們將為您取消超人之友寄送名單，\r\n同時更是感謝您長期對脊髓損傷傷友的支持與關愛，\r\n敬祝 平安。', '2011-09-09 09:02:38', 1, 1),
(12, 16, '管理員', '姚小姐您好:\r\n捐款及捐物都有收據,並可供年底申報所得稅使用。\r\n\r\n謝謝您的來信。', '2011-09-13 09:52:35', 1, 1),
(13, 16, '管理員', '姚小姐您好:\r\n捐款及捐物都有收據,並可供年底申報所得稅使用。\r\n\r\n謝謝您的來信。', '2011-09-13 09:52:43', 1, 1),
(14, 17, '管理員', 'Dear Libraice:\r\n依據美國醫學統計，脊髓損傷患者佔總人口1/1000，\r\n以目前台灣總人口數2,300萬人推算，\r\n國內脊髓損傷傷友約有2萬多人。', '2011-09-29 15:34:02', 1, 1),
(15, 18, '管理員', '黃小姐您好:\r\n非常感謝您的來信告知，\r\n我們將取消編號14666及14779之郵寄名單，\r\n造成您的不便敬請見諒。\r\n\r\n脊髓損傷潛能發展中心祝您平安喜樂!!', '2011-10-12 08:23:17', 1, 1),
(16, 19, '管理員', '朱屏三您好:\r\n輪椅人生攝影比賽舉辦以來受到許多朋友的支持與關愛,\r\n但是輪椅人生攝影比賽在2010年舉辦時即以最後一屆活動畫下句點,\r\n感謝您過去對輪椅人生攝影比賽的支持,\r\n今年12月我們將舉辦一系列的聖誕紅義賣活動,\r\n也是非常歡迎您一起共襄盛舉!!\r\n\r\n脊髓損傷潛能發展中心 祝您 平安喜樂!!!', '2011-10-13 15:43:34', 1, 1),
(17, 20, '管理員', '洪小姐您好:\r\n非常感謝您的來信，\r\n我們將為您取消超人之友期刊訂戶名單。\r\n\r\n感謝您長期以來對脊髓損傷傷友的支持與關懷，\r\n敬祝   平安喜樂 !!', '2011-10-31 08:17:41', 1, 1),
(18, 37, '宋靜美', '我也想參加但怕媽媽不想 讓我參加也我想去學會以些電腦', '2012-03-26 23:04:24', 1, 0),
(19, 37, '輪椅上ㄟ郎', '雖我不是會員,但我一樣是坐在輪椅上的人,對自己要有信心勇於去做\r\n就不管成功還是失敗,至少妳己有做了', '2012-05-16 10:59:38', 1, 0),
(20, 24, '管理員', '親愛的李小姐您好:\r\n感謝您熱愛公益支持環保,\r\n我們將為您取消紙本雜誌訂單,\r\n謝謝', '2011-12-05 18:54:48', 1, 1),
(21, 23, '管理員', '親愛的陳小姐您好:\r\n感謝您熱愛公益支持環保,\r\n我們將為您取消紙本雜誌訂單,\r\n謝謝', '2011-12-05 18:54:59', 1, 1),
(22, 22, '管理員', '親愛的PAR您好:\r\n感謝您熱愛公益支持環保,\r\n我們將為您取消紙本雜誌訂單,\r\n謝謝', '2011-12-05 18:55:15', 1, 1),
(23, 27, '管理員', '黃仕齊您好:\r\n非常感謝您對脊髓損傷潛能發展中心綠色系統的支持與關愛,\r\n綠色系統將在明年重新與大家見面,\r\n敬請期待!!', '2011-12-23 22:27:07', 1, 1),
(24, 23, '陳慧君', '編號13454\r\n編號20721\r\n還是有收到紙本發行的超人之友,再取消一下.謝謝.', '2012-06-27 17:16:00', 1, 0),
(25, 54, '劉文正', '目前電腦作業班於10月份中旬會開設班別！到時候會通知您的！我有請彰化縣脊髓損傷重建協會前往田中鎮關懷及了解您目前的狀況，如有開設班別時會與您聯絡的！您也可以來電詢問相關事宜。電話：03-4909001分機223劉文正洽談，謝謝！', '2012-08-23 16:50:29', 1, 0),
(26, 56, '劉文正', '關於撞球運動所使用的撞球台也和一般人所使用的撞球是一樣的，輪椅族朋友先要考量環境無障礙的設施為主，但很多撞球場地大部份設置於地下室或二樓(有階梯、無電梯、無障礙環境不足)，不過還是以您所居住的地區性尋找適合的撞球場地，才能符合您想運動的理想及目標。以上是個人小小意見交流！', '2012-09-10 11:04:46', 1, 0),
(27, 59, '劉文正', '目前電腦作業班開課日期：101.10.23\r\n歡迎報名參加訓練！\r\n', '2012-10-01 18:37:44', 1, 0),
(28, 63, '雅華', '麗明您好!\r\n當然可以呀！日後如果有任何問題，只要我們幫得上忙的，歡迎妳跟我們聯絡喔！\r\n本身我是胸髓的傷友，目前在本中心服務，但我很樂意將我的經驗與妳分享。', '2012-11-13 09:22:47', 1, 0),
(29, 59, '蔡銘哲', '請問今年的作業班何時開課?電腦網站上的報名表是在哪裡?', '2014-02-27 16:47:42', 1, 0),
(30, 81, '春卷', '您好~\r\n可否有此機會呢？\r\n謝謝。', '2014-07-31 19:08:59', 1, 0),
(31, 37, '管理員', '宋小姐您好:\r\n如果您也是脊髓損傷者 也可以到中心參加免費的訓練\r\n脊髓損傷潛能發展中心的服務對象是全國性的', '2012-03-26 16:40:57', 1, 1),
(32, 102, 'YUKI', '荷蘭有，你去搜搜，但困難可能只是一時的，過了這段日子就好了，加油', '2015-09-24 13:12:34', 1, 0),
(33, 75, 'Lilly', '請問楊梅哪裡有身障汽車駕訓班?', '2016-02-19 05:00:46', 1, 0),
(34, 94, '羅先生', '你好  需要影像紀錄人員  在家即可工作  需備網路  詳賴aa7291536  謝謝。', '2016-08-31 05:43:00', 1, 0),
(35, 40, '管理員', '張先生您好:\r\n感謝您的來信，\r\n我們將會代為轉達。\r\n\r\n並祝 平安快樂。', '2012-05-08 08:59:47', 1, 1),
(36, 41, '管理員', '賴坤圻您好:\r\n關於網路作業班及職業訓練班，\r\n報名洽詢 03-4909001#223 劉先生\r\n\r\n感謝您的來信\r\n並祝 平安', '2012-05-08 09:01:02', 1, 1),
(37, 42, '管理員', 'Ted您好:\r\n環島計畫的輪椅自行車是由國內業者開發的\r\n目前我們正在進行測試階段\r\n也期待未來是能夠量產\r\n用低於國外的價錢 讓大家能夠擁有休閒生活運動', '2012-05-17 11:44:29', 1, 1),
(38, 43, '管理員', '許同學您好:\r\n機構的志工多數為平日志工,\r\n因為假日行政人員都是休假的,\r\n且傷友們假日也都會返家,\r\n\r\n若您需要志工服務\r\n建議可安排平日時間\r\n\r\n志工服務業務洽詢 03-490-9001#115 李小姐', '2012-05-22 08:42:12', 1, 1),
(39, 44, '管理員', '呂同學您好:\r\n我們收到您的來信後,\r\n已將信件資料轉給相關部門,\r\n將由相關部門進行安排\r\n\r\n若有相關疑問 歡迎來電03-4909001', '2012-05-22 17:32:44', 1, 1),
(40, 45, '管理員', '陳先生您好:\r\n關於報名業務\r\n請電洽 03-4909001#223 劉先生\r\n\r\n感謝您的來信 並祝平安', '2012-05-25 08:08:22', 1, 1),
(41, 46, '管理員', '您好:\r\n中心內設有生活重建教室及職業訓練教室\r\n生活重建教室內包含了體能訓練及重力訓練器材等', '2012-05-30 08:09:56', 1, 1),
(42, 37, '管理員', '也許您可以找家人一起到中心看看\r\n當他們看到這裡有這麼多受傷的朋友一起努力\r\n也許他們就會很放心的讓你來這邊訓練', '2012-03-27 12:03:05', 1, 1),
(43, 51, '管理員', '您好:\r\n提供您桃園監理所網站\r\nhttp://www.hmv.gov.tw/SCH_guide_2_1.aspx\r\n\r\n請參考相關資訊 或電洽該所查詢', '2012-06-18 14:04:51', 1, 1),
(44, 52, '管理員', '留言回覆測試', '2012-06-18 14:32:57', 1, 1),
(45, 23, '管理員', '非常抱歉\r\n我們作業上的疏失', '2012-06-28 12:25:44', 1, 1),
(46, 54, '管理員', '您好:\r\n關於重建訓練報名\r\n請電03-4909001#223 劉先生\r\n', '2012-08-28 15:04:18', 1, 1),
(47, 55, '管理員', '您好:\r\n這次脊髓損傷者環島的手搖自行車是委託國內廠商特別開發的,\r\n費用10萬元/輛\r\n', '2012-08-28 15:05:31', 1, 1),
(48, 56, '管理員', '關於撞球運動所使用的撞球台也和一般人所使用的撞球是一樣的，輪椅族朋友先要考量環境無障礙的設施為主，但很多撞球場地大部份設置於地下室或二樓(有階梯、無電梯、無障礙環境不足)，不過還是以您所居住的地區性尋找適合的撞球場地，才能符合您想運動的理想及目標。以上是小小意見交流！ ', '2012-09-21 16:15:29', 1, 1),
(49, 57, '管理員', '關於身障的相關福利與權益是我們共同努力的目標\r\n大家一起加油', '2012-09-21 16:16:02', 1, 1),
(50, 58, '管理員', '您好:\r\n這部手搖車是由中心委託廠商進行研發的，係屬電動手動雙用型，同時亦備有變速裝置，目前手搖車是以車頭與車身一組為單位，尚無法提供每種款式輪椅配置。', '2012-09-21 16:18:28', 1, 1),
(51, 59, '管理員', '請電洽03-4909001#223', '2012-10-01 08:17:08', 1, 1),
(52, 60, '管理員', '您好:\r\n關於輔具的需求\r\n可電洽 本中心社會企業\r\n03-4398159 菲亞輔具公司\r\n\r\n謝謝', '2012-10-23 09:18:50', 1, 1),
(53, 63, '管理員', '王先生您好:\r\n歡迎您將問題email至sci@scsrc.org.tw\r\n我們將由專人為您服務\r\n也祝福您順心', '2012-11-21 12:04:49', 1, 1),
(54, 64, '管理員', '陳小姐您好:\r\n由於機構的位置距離桃園市區偏遠\r\n且無大眾運輸工具可到達\r\n建議您搭乘火車至中壢或埔心站\r\n再搭乘計程車至本中心\r\n或搭乘高鐵至桃園青埔站\r\n再轉計程車至本中心\r\n\r\n若有相關疑問\r\n亦可電洽本中心\r\n03-4909001\r\n', '2012-12-10 08:28:04', 1, 1),
(55, 66, '管理員', '您好:\r\n可以電洽菲亞輔具03-4396997\r\n', '2013-01-18 08:02:48', 1, 1),
(56, 67, '管理員', '晟凱您好:\r\n可以電話洽詢03-4909001轉職業訓練課', '2013-02-05 13:47:22', 1, 1),
(57, 69, '管理員', '柯先生您好:\r\n您可以來電03-4909001轉222\r\n生活重建課將了解您的狀況\r\n並提供您相關建議與服務\r\n', '2013-03-11 08:24:48', 1, 1),
(58, 71, '管理員', '子揚加油:\r\n您可以來電洽詢\r\n03-4909001轉222個案管理課\r\n', '2013-03-27 10:44:13', 1, 1),
(59, 72, '管理員', '李先生您好:\r\n關於生活重建技能請電本中心生活重建課\r\n03-4909001#215\r\n將由專人為您服務\r\n\r\n感謝您的來信 並祝平安', '2013-06-14 08:23:07', 1, 1),
(60, 73, '管理員', '您好,\r\n\r\n因系統中通報資料並無您的e-mail\r\n請您留下您的e-mail,個管課會再以電子郵件的方式回覆', '2013-07-24 09:28:19', 1, 1),
(61, 74, '管理員', '胡先生您好\r\n\r\n同儕支持員證明已於上週寄出,\r\n關於印章部份會再以電話與您聯繫領回方式\r\n', '2013-09-04 18:48:33', 1, 1),
(62, 75, '管理員', '您好\r\n\r\n台北巿現代汽車駕駛人訓練班\r\n02-2858-6006\r\n台北巿大度路三段163號\r\nhttp://www.smile-drive.com.tw/tier/front/bin/home.phtml\r\n\r\n', '2013-09-13 09:40:47', 1, 1),
(63, 76, '管理員', '您好\r\n請來電洽詢\r\n聯絡人：林洋彬　先生\r\n聯絡電話：03-4909001分機216 ', '2013-10-04 08:16:48', 1, 1),
(64, 77, '管理員', '賴先生您好:\r\n您可洽詢桃園縣輔具資源中心\r\n03-3732028', '2013-10-23 11:28:02', 1, 1),
(65, 79, '管理員', '林先生您好,\r\n\r\n明年度頸髓及胸腰髓班第一期皆於2月10日開班\r\n請您留下您的聯絡方式\r\n我們將會請中心招生窗口持續與您保持聯絡', '2013-12-31 09:14:04', 1, 1),
(66, 81, '管理員', '徐先生您好:\r\n感謝提供就業機會\r\n您可撥打電話與本中心就業服務課聯繫\r\n我們將為您推薦合適傷友\r\n03-4909001#220蔡小姐', '2014-01-13 09:03:40', 1, 1),
(67, 83, '管理員', '謝謝您的資訊', '2014-02-24 16:48:52', 1, 1),
(68, 82, '管理員', '您好:\r\n其實這樣小量的貼紙\r\n只需要自己購買貼紙專用紙 就能列印出來了喔', '2014-02-24 16:49:53', 1, 1),
(69, 84, '管理員', '劉先生您好,\r\n\r\n我們在人生的過程中遭逢意外造成身體的功能喪失,無法自我照顧自己\r\n這的確是件令人難過的事\r\n\r\n對於未來感到茫然沒有方向感，這種感受我們也能有所體會\r\n因此中心成立的主要目的就是在提供生活自理、 社會適應、就業及職業\r\n訓練與輔導，讓中途致殘的朋友能減少對他人的依賴\r\n\r\n在4月28日我們的訪視員曾經去訪視過一名朋友跟您同名同姓，不知是否是您本人呢？\r\n\r\n如果您有想要前來中心參加生活自理的訓練，請至電03-4909001分機223與黃承皇先生\r\n進行聯繫', '2014-05-09 16:21:40', 1, 1),
(70, 85, '管理員', '感謝您的提供', '2014-05-12 08:39:02', 1, 1),
(71, 86, '管理員', '感謝您的幫忙', '2014-05-12 08:39:17', 1, 1),
(72, 87, '管理員', '感謝您的提供', '2014-05-12 08:39:37', 1, 1),
(73, 88, '管理員', '謝謝資訊分享', '2014-05-23 10:23:09', 1, 1),
(74, 91, '管理員', '您好,\r\n\r\n今年度的職業訓練已經報名結束,並於本週已開訓\r\n如您有想要參加職業訓練,可在年底注意我們官網的招生訊息\r\n\r\n不過,我們的客戶服務班仍在招生中,如您有想要瞭解客服班的相關訓息\r\n其報名資訊如下:\r\nhttp://www.scsrc.org.tw/news_com.php?no=664\r\n\r\n或至電本中心03-4909001轉222彭小姐', '2014-08-13 08:57:27', 1, 1),
(75, 92, '管理員', '靜怡您好,\r\n\r\n桃園楊梅地目前有身障汽車之駕訓班資訊如下：\r\n\r\n駕訓班名稱：大眾汽車駕駛訓練班\r\n地址： 桃園縣楊梅市和平路365號 \r\n電話： 03-478-1445\r\n網址：https://www.facebook.com/TWTDS\r\n\r\n如有考照之問題，可與該駕訓班聯繫！\r\n\r\n在此，祝您順利考取駕照～\r\n', '2014-10-22 16:56:50', 1, 1),
(76, 94, '管理員', '郭先生您好,\r\n\r\n不好意思直到今日才回覆,在此致上誠致的歉意\r\n\r\n關於居家就業之工作機會可您致電本中心就服員詢問相關資訊\r\n\r\n電話:03-4909001分機116邱先生、118唐小姐\r\n\r\n或留下您的聯繫方法,以便我您進行聯繫,謝謝!!', '2015-03-27 18:10:09', 1, 1),
(77, 38, '管理員', '志偉你好:\r\n可以寫信給脊髓張老師\r\nhttp://www.sci.org.tw/teacher_chang.php', '2012-04-13 13:03:34', 1, 1),
(78, 97, '管理員', '您好\r\n請電洽03-4909001#68\r\n將由專人為您服務', '2015-05-22 09:43:22', 1, 1),
(79, 96, '管理員', '您好\r\n機構目前沒有使用內地通訊軟體\r\n非常抱歉', '2015-05-22 09:43:45', 1, 1),
(80, 93, '管理員', '您好\r\n為您取消編號0027689訂閱', '2015-05-22 09:44:06', 1, 1),
(81, 89, '管理員', '謝謝提供', '2015-05-22 09:45:02', 1, 1),
(82, 101, '管理員', 'Lucy您好\r\n\r\n中心目前並未進行回收衣服的服務\r\n目前有回收的物品為二手書籍及碳粉夾,\r\n二手書回收詳情可見以下網址\r\nhttp://www.scsrc.org.tw/art.php?no=66\r\n碳粉夾回收詳情可見以下網址\r\nhttp://www.scsrc.org.tw/art.php?no=52\r\n\r\n祝福您順心 平安！', '2015-07-28 14:21:29', 1, 1),
(83, 100, '管理員', '您好,\r\n\r\n關於相關參加生活重建訓練及職業訓練等課程,可洽以下電話\r\n03-4909001轉分機223黃先生\r\n\r\n祝福您順心 平安！', '2015-07-28 14:27:14', 1, 1),
(84, 100, '管理員', '您好,\r\n\r\n關於相關參加生活重建訓練及職業訓練等課程,可洽以下電話\r\n03-4909001轉分機223黃先生\r\n\r\n祝福您順心 平安！', '2015-07-28 14:27:22', 1, 1),
(85, 103, '管理員', '您好\r\n關於職訓課程\r\n請洽\r\n03-490-9001#108蔡課長\r\n謝謝您', '2015-10-28 10:30:15', 1, 1),
(86, 104, '管理員', '您好\r\n請電洽03-4909001#123林小姐', '2015-12-01 09:00:23', 1, 1),
(87, 107, '管理員', '您好\r\n歡迎來電洽詢 03-4909001轉職業訓練課', '2016-02-22 13:23:20', 1, 1),
(88, 106, '管理員', '您好\r\n歡迎來電洽詢 03-4909001轉公共事務課', '2016-02-22 13:23:47', 1, 1),
(89, 105, '管理員', '您好\r\n歡迎來電洽詢 03-4909001轉生活重建課', '2016-02-22 13:24:14', 1, 1),
(90, 102, '管理員', '加油 活下去\r\n', '2016-02-22 13:24:32', 1, 1),
(91, 99, '管理員', '謝謝分享', '2016-02-22 13:24:45', 1, 1),
(92, 98, '管理員', '謝謝分享', '2016-02-22 13:24:51', 1, 1),
(93, 108, '管理員', '加油', '2016-04-13 13:49:03', 1, 1),
(94, 109, '管理員', '歡迎你\r\n', '2016-05-25 08:35:28', 1, 1),
(95, 110, '管理員', '您好\r\n相關服務歡迎來電洽詢03-4909001#223\r\n我們將安排相關人員前往訪視', '2016-05-27 11:27:27', 1, 1),
(96, 111, '管理員', '你好 中心沒有販售喔\r\n您可以上網查詢相關資料', '2016-07-27 08:39:30', 1, 1),
(97, 112, '管理員', '您好\r\n若有相關需要服務事項請來電03-4909001', '2016-07-27 08:40:08', 1, 1),
(98, 113, '管理員', '謝謝您的提供', '2017-01-04 16:23:43', 1, 1),
(99, 114, '管理員', '您好,\r\n\r\n目前全年度依統計學的數字而言,推估一年有1200名脊髓傷者產生\r\n但暫無正確的數據及明確的比例去推估,特定節段受傷的人數為何\r\n而以政府的官方資料亦無正確的數據,相的數據未來有賴政府單位來主導統計\r\n在此祝您新年快樂！', '2017-01-26 12:26:23', 1, 1),
(100, 116, '管理員', '林先生，對於您的遭遇我們感到惋惜\r\n對於您在小便失禁的問題可以尋求泌尿科醫師的協助\r\n在生活自理上有問題，亦可參加生活自理訓練，學習二便處理的方法\r\n請洽03-4909001分機223周先生\r\n', '2017-04-19 10:03:46', 1, 1),
(101, 39, '管理員', '蔡先生您好:\r\n關於職業訓練課程業務\r\n請電洽 03-4909001#118 職訓中心林主任', '2012-04-16 09:35:02', 1, 1),
(102, 118, 'hihi', 'hihi', '2017-09-11 08:29:34', 1, 0),
(103, 118, '管理員', 'hihihi', '2017-09-11 08:30:09', 1, 1),
(104, 119, 'AA', 'AAAA', '2017-09-11 23:19:07', 0, 0),
(106, 119, '管理員', 'BBB', '2017-09-11 23:22:36', 1, 1),
(107, 119, 'ccc`', 'CCC', '2017-09-11 23:23:38', 1, 0),
(108, 122, '管理員', 'HIHI我是管理員', '2017-09-12 10:33:00', 1, 1),
(109, 123, 'AAA', 'AAA', '2017-09-14 14:54:36', -1, 0);

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
  MODIFY `DB_MadID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
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
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `DB_MesID` int(12) UNSIGNED NOT NULL,
  `DB_MesContent` text NOT NULL,
  `DB_MesName` varchar(255) NOT NULL DEFAULT '',
  `DB_MesSubject` varchar(8) NOT NULL DEFAULT '',
  `category` varchar(6) NOT NULL,
  `DB_MesTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DB_MesEmail` varchar(255) NOT NULL DEFAULT '',
  `pass` tinyint(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言板資料庫';

--
-- 資料表的匯出資料 `comments`
--

INSERT INTO `comments` (`DB_MesID`, `DB_MesContent`, `DB_MesName`, `DB_MesSubject`, `category`, `DB_MesTime`, `DB_MesEmail`, `pass`) VALUES
(13, '您好：連結『http://www.scsrc.org.tw/collection04.php』是否出現問題，無法線上捐款。', 'lesfourmis', '無法線上捐款', '', '2011-08-08 09:47:32', 'lesfourmis@gmail.com', 1),
(14, '林先生：\r\n煩請不再寄送 超人之友 編號：6808 阿尼色弗兒童之家\r\n聖經說：「所以，我們不喪膽，外體雖然毀壞，內心卻一天新似一天。」（林後四16）\r\n「我們這至暫至輕的苦楚，要為我們成就極重無比、永遠的榮耀。原來我們不是顧念所見的，乃是顧念所不見的；因為所見的是暫時的，所不見的是永遠的。」（林後四17-18）\r\n願上帝賜福貴機構', '阿尼色弗兒童之家', '煩請不再寄送 超', '', '2011-08-11 08:56:23', 'clairehung2004@yahoo.com.tw', 1),
(15, '超人之友下期2100.8月起不需再寄送,謝謝\r\n\r\n９７５４５花蓮縣鳳林鎮中正路2段132號', '傅文欽', '超人之友下期起不', '', '2011-08-19 09:44:27', 'fu0706@ms22.hinet.net', 1),
(16, '請問捐款會有收據嗎?', '姚秀燕', '捐款收據', '', '2011-09-12 14:45:23', 'yao8916295@yahoo.com.tw', 1),
(17, '您好：\r\n想請問現在台灣脊髓損傷人數有多少人呢？謝謝。', 'Libraice', '脊髓損傷人數', '', '2011-09-29 14:57:49', 'm9601202@mail.ntust.edu.tw', 1),
(18, '人員已離職 煩請不再寄送 超人之友 編號：14666 石炫堯 及編號：14779 蔡淑鳳', '黃小姐', '煩請不再寄送 超', '', '2011-10-11 12:20:07', 'lichu@cto.doh.gov.tw', 1),
(19, '今年已將近尾聲了為何沒有 聽聞要辦輪椅人生 攝影比賽，是停辦了嗎？', '朱屏三', '今年會辦 輪椅人', '', '2011-10-12 23:56:03', 'chusan11@yahoo.com.tw', 1),
(20, '請不要在寄月刊了.謝謝.no:21665', '洪嘉惠', '請不要在寄月刊了', '', '2011-10-28 15:01:15', 'a688958@yahoo.com.tw', 1),
(22, '如主題, 謝謝~', 'PAR表演藝術', '不需要寄送雜誌', '', '2011-11-29 10:07:01', 'parmag@mail.ntch.edu.tw', 1),
(23, '編號13454\r\n編號20721\r\n直接線上閱讀即可,紙本發行的超人之友不需再寄送了,謝謝', '陳慧君', '紙本超人之友不需', '', '2011-11-29 13:54:10', 'rom.daphny@msa.hinet.net', 1),
(24, '李威萱、李國瑋、李乾龍、高綺帛\r\n\r\n地址：116台北市文山區萬寧街165號8樓\r\n\r\n再麻煩幫我們取消寄件~謝謝', '李小姐', '使用線上閱讀，取', '', '2011-12-01 14:56:45', 'annielee1978@yahoo.com.tw', 1),
(25, '您好\r\n請問\r\n我想用家人的名義捐款\r\n但扣款是我的帳戶\r\n請問\r\n這樣可以嗎', '黃靜慧', '請問捐款問題', '', '2011-12-01 22:39:10', 'hello_pool@yahoo.com.tw', 1),
(27, '如題', '黃仕齊', '請問綠色系統資源', '', '2011-12-22 16:51:24', 'schelvin@gmail.com', 1),
(28, '我的地址為台北市長春路258巷15號4樓之3,謝謝貴會過去定期寄送雜誌,麻煩以後不用再寄給我', '魏忻華', '請不用再寄送雜誌', '', '2011-12-28 16:34:22', 'hsinhua258@hotmail.com', 1),
(29, '您好~\r\n\r\n            有一台微波爐只有轉盤不能轉其他部分都沒有壞..如中心可以接受嗎?\r\n            如可以請回覆..屆時在前來提取', 'PURPLE', '堪用微波爐是否接', '', '2012-01-16 12:39:11', 'procherry@hotmail.com', 1),
(30, '想要买一辆可供轮椅直接上车的三轮子母摩托车，不知道在哪里可以订做，麻烦管理员帮我打听一下价格和厂家，赞在这里谢谢了。', '小落', '想要买一辆可供轮', '', '2012-01-16 20:13:59', 'wsxas12ly@163.com', 1),
(31, '您好:在網路上看到貴單位有在回收舊書，家裡有童書(ex.故事書.科學教育...等等)，請問目前仍有此回收服務嗎?請問相關流程?謝謝!(在台中)', '謝函廷', '書籍回收事宜詢問', '', '2012-01-19 19:16:50', 'renee0715@gmail.com', 1),
(33, '我想請教一下喔 .我有一個小朋友今年暑假過後要升國一是女生我有聽人說妳們有在幫人服務教生活訓練所以我想問看看不知道我小朋友可不可加入因為他傷的是T1.T2是意外', '杜宣媚', '我想幫小朋友加入', '', '2012-02-14 15:32:56', 'hedy5463@hotmail.com', 1),
(34, '可以麻煩寄簡章跟報告表給我嗎?我是胸腰第五節受傷.住址是台東市落陽街219巷6號,張君名收電話:0937559170麻煩謝謝', '張君名', '請問一下', '', '2012-03-02 10:11:59', 'wfe886@yahoo.com.tw', 1),
(36, '敬啟者你好~ 4年多前曾到桃園中心住過，當初跟我接洽的是劉文正老師~\r\n想請問中心有賣大腸水療器嗎?? 那個需要自己找水電買材料跟接合我不會做....\r\n如有代製並販售給脊損之友的話麻煩寫E-mail回覆給我~ 萬分感謝~!!', '徐思穎', '我是曾去過脊損中', '', '2012-03-13 23:00:46', 'guimau41@yahoo.com.tw', 1),
(37, '你好        看到許多脊髓損傷的朋友這們高興真羨慕他們好 希望能跟他們一樣', '宋靜美', '好朋友', '', '2012-03-24 23:05:44', 'love.680817@yhoo.com.tw', 1),
(38, '我寄人籬下看人臉色過日子天天被罵還常常用三字經.好在有一位叔叔幫我但是他自己壓力也很大.本來報名四月但還是來不及.就改成六月我很怕敖不過去.我真的很想很想快重回社會自己獨立生活.就怕沒機會了.講這些不是要妳們擔心不說我越難過抱歉', '陳志偉', '我快走不過心裡那', '', '2012-04-13 12:16:23', 'gttg1688@yahoo.com.tw', 1),
(39, '請問一下我報名電腦機械輔助繪圖班不知道有沒有錄取ㄚ', '蔡國誌', '請問一下我報名的', '', '2012-04-15 15:11:30', 'tasi5812@kimo.com', 1),
(40, '雷處長：你好\r\n我是張金清，感謝你的來電給予我有就業的機會及認識此團體。只因個人因素無法勝任\r\n敬請見諒\r\n祝全體工作人員身心愉快', '張金清', '無法勝任駕駛人', '', '2012-05-04 13:32:56', 'frank..999@yahoo.com.tw', 1),
(41, '    我哥是脊髓損傷第5節頸脊重殘想學習上網,但他是全身癱瘓請問協會有此服務嗎?謝謝.', '賴坤圻', '想上網', '', '2012-05-06 10:41:24', 'pin_0409@yahoo.com.tw', 1),
(42, '您好！\r\n請問：脊髓損傷者手搖輪椅自行車環島計畫中，所使用的手搖輪椅是自國外進口還是國內生產的？售價貴不貴？', 'Ted', '請問', '', '2012-05-17 09:42:22', 'jenken84086@yahoo.com.tw', 1),
(43, '你好 我是中原大學的學生 是這樣的 我在學校有修課 需要做志工服務 請問有假日志工的缺嗎?', '許格銓', '詢問志工事項', '', '2012-05-18 23:26:44', 'godjackhsu@hotmail.com', 1),
(44, '我是那天有打電話詢問貴單位是否能幫助發放問卷的大學生，\r\n然後我已經把我們的研究企劃書寄信給貴單位，\r\n不知道是否能幫助我們發放呢？\r\n真不好意思打擾了！', '呂安琪', '關於問卷發放', '', '2012-05-22 10:43:03', 's98241007@mail1.ncnu.edu.tw', 1),
(45, '請問一下,下一次開課正確ㄖ是不 是6月16ㄖ,可否幫忙查我是不是已經報上名,我是由彰化脊髓損傷協會報名,在此謝 謝幫忙', '陳志偉', '報名', '', '2012-05-23 15:32:20', 'gttg1688@yahoo.com.tw', 1),
(46, '可有备有各种器材的健身室？', '伦', '健身室', '', '2012-05-29 17:23:25', 'zaizai_boyboy@yahoo.com', 1),
(51, '我要考機車駕照，\r\n但是所在地的監理站，\r\n只能用三輪的殘障車者試，\r\n請問桃園那個監理站，\r\n可以使用直上式的機車來考試呢？\r\n還有那些問題須要注意的？', '機車駕照', '考機車駕照相闗問', '', '2012-06-18 09:37:26', 'aaaaaaaaaaaaa@aaaaaaaaaaaa.com', 1),
(54, '我想報名作訓練.之前彰化脊髓協會有幫我報過的樣子.但因為當時還有傷口所以一直延誤.現在傷口身體方面都好了.所以我想請問一下下一梯次甚麼時候可以開始報名??', '魏筱茵', '我想報名', '', '2012-08-23 15:40:15', 'nn1479@yahoo.com.tw', 1),
(55, '請問在YouTube約珥騎的手搖車那裡可以買到?是國內還是國外的產品?價格大約多少錢?', '勝達', '請問手搖車', '', '2012-08-24 01:08:47', 'kujira.2012@m2k.com.tw', 1),
(56, '台灣有可以讓我坐輪椅打撞球的台桌跟場所嗎?', '崔振沛', '我想打撞球', '', '2012-09-06 23:13:05', 'io5656789@hotmail.com', 1),
(57, '情何以堪呢?難道重度身心障礙人士,也要熬到65歲才能領勞保退休年金\r\n \r\n最近看到報載,勞保原本55歲可以辦理退休,從104年起要逐年遞增到65歲才\r\n \r\n可辦理退休,此項對身心障礙人士極不友善的修法,真有如晴天霹靂心都碎了.\r\n \r\n試問?重度身心障礙人士能活到65歲,究竟是少數,身心障礙人士的壽命,原本就\r\n \r\n比一般人短很多,一些重度身心障礙人士,辛辛苦苦工作一二十年,那時身體也快\r\n \r\n不行了,好不容易挨到快55歲準備退休,可以領年金維持最低生活所需,現在要改成65歲,真是情何以堪呢?試問有幾個人能領到呢?\r\n \r\n個人淺見應該修改：\r\n \r\n(一) 重度身心障礙人士→50歲即能辦理勞保退休\r\n \r\n(二) 中度身心障礙人士→55歲即能辦理勞保退休\r\n \r\n(三) 輕度身心障礙人士→60歲即能辦理勞保退休\r\n \r\n \r\n大多數的身心障礙人士,只看到這塊餅,卻大多數人吃不到,還活不到65歲就掛了,怎會吃得到呢?\r\n', '尋夢人', '情何以堪呢?難道', '', '2012-09-10 15:20:57', 'howard09332008@yahoo.com.tw', 1),
(58, '請問：影片中的車頭是由貴中心所研發的嗎？（http://www.youtube.com/watch?v=U1weCUjcvs4&feature=channel&list=UL）售價約是多少？影片中的車頭是手動、電動兩用型，是否有純粹是手動的？是否有變速裝置？純手動車頭售價約多少？是否市面上任何一款式的輪椅皆可裝配使用？敬請告知，謝謝！！', 'Ted', '手搖車頭', '', '2012-09-18 16:38:42', 'jenken84086@yahoo.com.tw', 1),
(59, '我想請教作業訓練何時開課', '胡長紹', '作業訓練', '', '2012-09-26 21:27:49', 'huchangshao@yahoo.com.tw', 1),
(60, '請教一下,\r\n若腰椎滑脫或是脊椎移位等,\r\n坐雙背椅較適合還是後者的人體工學椅??(腰部、背部和頸部都各有支撐的椅子)\r\n謝謝\r\n\r\n', '林小姐', '請問雙背椅和 E', '', '2012-10-12 23:09:05', 'february6224@gmail.com', 1),
(63, '潜能发展中心的朋友们，你们好！我是来自东北的王丽明。15年前因车祸颈椎损伤致高位截瘫。经7个月住院治疗和2年康复治疗后恢复了正常生活和工作，但身体和以前已大不同，至今仍有后遗症。这17年生理和心理都在不间断的治疗，但大陆没有类似的专业信息。在网上偶然搜索到我们这个中心的信息，所以很期待能够建立联系，也期能和同样经历的朋友交流。', '王丽明', '17年前意外颈椎', '', '2012-11-10 07:56:56', 'wlmpcs2007@163.com', 1),
(64, '您好~我是傷友的家屬.請問 如果我要從桃園火車站到貴中心.是否有大眾運輸工具可到達.\r\n麻煩告知.謝謝', '陳小姐', '如何從桃園火車站', '', '2012-12-08 09:08:15', 'asoa07@hotmail.com', 1),
(66, '請問輪椅底下的網子去哪裡買的  密的那種網狀  不要那種不密的網子  謝謝\r\n', '小樂', '輪椅下方網子', '', '2013-01-17 19:53:30', 'ck005@gmail.com', 1),
(67, '請問網頁程式設計班的甄試結果出來了嗎', '廖晟凱', '請問', '', '2013-02-05 10:34:50', 'f748195311@gmail.com', 1),
(69, '您們好!!我是一位高三的學生，去年8月底車禍，造成胸椎嚴重受損，從受傷到現在，從沒放棄復建\r\n。住院當中有脊髓損傷的朋友前來關心，從他們得知有脊髓損傷遣能發展中心，目前需仰賴家人的協助，希望透過協會來幫助我生活能過自理，讓家人能夠安心。如何加入你們的行列呢', '柯騰皓', '我是一脊髓損傷者', '', '2013-03-06 20:28:39', 'mike7564123@yahoo.com.tw', 1),
(71, '大家好,我是一個22歲車禍的病人,我在民國99年4月7日發生車禍,當時我19歲\r\n我只知道當時我昏迷不醒,昏迷指數3,瞳孔放大,在醫院躺了1個多月才醒來\r\n醫生說我神經4.5.6.7節有斷掉的痕跡,第4節斷一半第5第6截快斷光了第7節是已經找不到了\r\n我只記得剛開始只能坐輪椅,無法自己走動,還插著鼻餵管,車禍撞到右腦,所以身體左半邊失調\r\n過了半年開刀,做神經修復手術,因為聽醫生說第7節神經是控制右手的功能,導致我右手無法抬起\r\n所以就注入神經,那時候就只能躺在床上,過了1個月才能下床,語言能力也有很大的問題\r\n一直到現在,進步到可以自己走路,有一隻手能使用,語言能力就沒什麼變,還是一樣\r\n講話無法大聲說,還不清楚,氣都從鼻子跑出去,所以想請問你們,\r\n像我這樣也能參加你們這個損傷的潛能發展嗎?', '徐子揚', '我不知道我是哪裡', '', '2013-03-26 15:25:28', 'vm6y3u6boy@yahoo.com.tw', 1),
(72, '我的女朋友胸10脊髓損傷已9年，肚臍以下沒感覺。當初受傷後就沒再做檢查治療，只做過B超檢驗。 \r\n目前因為約每隔兩小時就會滲尿，嚴重影響生活品質，雖有尿意但無法抑制，想請問是否有方法治療? 台灣哪家醫院較有經驗?\r\n', '李先生', '滲尿', '', '2013-06-14 01:50:23', 'stevelee@taitra.org.tw', 1),
(73, '你好:我是雙連基金會的推廣員.我曾通報一位需要關懷的個案.居住在大同區太原路的高柏仁.不知後續的進展如何?因為好久未與他聯絡.想請問你們他的現況.如果方便請回我mail.謝謝!!\r\n\r\n                     呂映昭     敬上\r\n', '呂映昭', '脊髓損傷通報', '', '2013-07-09 11:01:59', 'ab594168@yahoo.com.tw', 1),
(74, '我的同儕支持員證明和印章什麼時候可以給我', '胡長紹', '同儕支持員證明和', '', '2013-08-25 17:14:26', 'huchangshao@yahoo.com.tw', 1),
(75, '大家好：\r\n 　　本人將要學習開身障特製汽車，請問台北市、新北市地區有哪一家駕訓班有開立殘障汽車駕訓班呢？煩請告知，謝謝！', '損友', '身障汽車駕訓班', '', '2013-09-10 21:52:43', 'rose28910893@yahoo.com.tw', 1),
(76, '請問以下條件是要兩項都符合還是只要符合一項就可以，謝謝~~~~~\r\n只要您符合以下條件皆可提出索取，以索取的優先順序為主。 \r\n1. 中低收入戶 \r\n2. 限脊髓損傷傷友 \r\n', 'kkk', '請問(輪椅雨衣)', '', '2013-10-02 16:08:16', 'ksz011563@yahoo.com.tw', 1),
(77, '你好 \r\n  請問中心有利於移位的輪椅可以租借嗎，去年老婆剛受傷時幾呼全癱那時只能申請高背輪椅。之後慢慢進步復健老師建議更換輪椅，在這裡輔具中心借了一台。之後又慢慢進步復健老師要訓練移位，可是現在這台扶手沒辦法上掀踏角版無法移開沒辦法作移位的動作。偏偏這裡的輔具中心沒有那種型式的輪椅可借，想買新的又沒補助而且那麼貴，所以想問問中心是否有可以租借讓我們減輕負擔。  謝謝', '賴承志', '租借輪椅', '', '2013-10-15 22:50:53', 'pass12030@gmail.com', 1),
(79, '想請問102年度的課什麼時候開班', '林裕翔', '請問電動輪椅課程', '', '2013-11-12 15:22:58', 'Popostay@gmail.com', 1),
(81, '要接的人，e-mail給我，純打字，1000字40元，文言文居多，字跡清楚，要求:正確率高，每天交12000字，長期工作，e-mail圖檔給你，不需要出門，需要1人。', '徐先生', '提供打字工作', '', '2014-01-10 14:19:31', 'hn84236.a411@msa.hinet.net', 1),
(82, '大家好：\r\n　　本人為了行的自由學習汽車駕駛，目前是位新手駕駛，由於安全駕馭非常重要，雖然領的是身障車牌；但仍感到不夠醒目，因此想在汽車車身貼上身障輪椅LOGO，請問這種貼紙要在哪兒買呢？請提供我訊息，謝謝你們！感恩～\r\n\r\n祝福大家\r\n　　平安、喜樂。　　\r\n　　　　　　　　　　　　　　　　　　　　　　　　　損友　敬謝\r\n', '損友', '請問車體貼紙如何', '', '2014-01-18 09:26:53', 'rose28910893@yahoo.com.tw', 1),
(83, '從媒體關於方羚的報導我才了解貴單位默默在做的事, 甚感欽佩.\r\n透過親友我認識了李鳳山師父帶領的梅門公益團體, 他們也同你們一般在從事社會公益活動. 李鳳山師父跟梅門推廣的平甩功幫助了許多人, 甚至有小兒麻痺的人都練得行走一如平常人. 針對中風等年紀大的國人還開辦創建班針對各種狀況教授養生功法以改善其身體. 至少不會因受傷之身體以致其他功能快速退化. 建議貴單位可與梅門聯絡, 長期合作以協助脊髓損傷的復原.\r\n\r\n梅門電話 : 02-23216677\r\n地址 : 10644 台北市大安區麗水街38號\r\n網址 : www.meimen.org', '劉元德', '建議脊髓損傷的復', '', '2014-02-17 22:41:44', 'yt_liu@yahoo.com', 1),
(84, '脊損！約莫五年了，每天都在床上，也無法自理，未來在哪？\r\n\r\n不如回歸大地……\r\n\r\n人生還有希望的路途，可為行之否？？？', '劉佳榮', '茫然的未來', '', '2014-04-27 02:51:14', 'a920387992@gmail.com', 1),
(85, '招生目的：為促進就業，增進工作能力及條件，提供就業弱勢者學習電腦技能。\r\n上課時間：預定開課時間八月一日（週二）  講師：蔡峰州老師\r\n報名請請寄E-mail報名，資料不全者不予受理。\r\nE-mail：job.org.tw@gmail.com  聯絡人：葛先生\r\n1.	上課地點：台北市信義區基隆路1段432號1111室\r\n2.	身心障礙者免學費。\r\n3.	所需教材：一．每位學員自備有USB隨身碟。\r\n二．筆記本及筆（必備）※為使學員有參與感，故本課程僅做講師稿，學員不發講義，由學員在操作中增加記憶。\r\n電話：0986-161-118\r\nＥ-mail：job.org.tw@gmail.com\r\n課程表：\r\n堂數	時數	課程內容\r\n第一堂	兩小時	自我介紹及AutoDsek簡介\r\n第二堂	兩小時	AutoCAD程度確認及\r\n教授\r\n第三堂	兩小時	Revit軟體工作介面及功能介紹\r\n第四堂	兩小時	專案製作\r\n第五堂	兩小時	建立門窗、牆體修改\r\n第六堂	兩小時	專案複習\r\n第七堂	兩小時	樓板、樓梯、扶手建立、尺寸修改\r\n第八堂	兩小時	工作視圖彩顯功能\r\n專案存檔功能\r\n檔案匯出\r\n第九堂	兩小時	第二階段課程皆學\r\nCAD圖面匯入Revit前準備工作及注意事項\r\n第十堂	兩小時	牆體及帷幕牆建立及修改練習\r\n第十一堂	兩小時	樓板建立修改，特殊造型物件建立\r\n第十二堂	兩小時	樓板建立修改，特殊造型物件建立\r\n第十三堂	兩小時	課程回顧複習\r\n\r\n\r\n台灣障礙者就業服務協會AutoDesk-Revit電腦就業班招生報名表\r\n姓名：	性別：\r\n□男　□女	生日：　年　　月　　日\r\n身份證字號：\r\n地址：　　　　縣（市）　　　　鄉（鎮、區）　　　　村（里）　　　鄰\r\n　　　　　　　路（街）　　　　巷　　　　弄　　　　　號　　　　樓\r\n電話（O）：    　　　　 (H)：　　　　　　　　　傳真：\r\n手機：　　　　　　　　E-mail：\r\n　註１：個人資料請確實填寫，謝謝！\r\n註２：筆記本及筆（必備）※為使學員有參與感，故本課程僅做講師稿，學員不發講義，由學員在操作中增加記憶。\r\n註３：請利E-mail報名，資料不全者不予受理。\r\n      E-mail：job.org.tw@gmail.com\r\n    \r\n      \r\n', '台灣障礙者就業服務協會', 'AutoDesk', '', '2014-05-06 17:41:12', 'job.org.tw@gmail.com', 1),
(86, '您好，敝姓蔡。\r\n\r\n透過上週日花蓮路跑活動，及與蔡素芬主人及林進興董事長的語談，讓我更加認識基金會。\r\n\r\n我也進而透過脊髓損傷潛能發展中心的網頁，更加了解您們「超人工作室」。\r\n\r\n我們公司對於中心輔導學員所創的「網路工作室」，在程式系統及美工設計上非常欣賞，\r\n\r\n希望能與貴基金會合作，讓更多有專業及興趣的同仁能加入我們 :)\r\n\r\n以下提供您更多關於我們公司的資訊：\r\n\r\n【公司介紹】\r\n1. 文件說明：http://ppt.cc/q432\r\n2. 官網說明：http://chenghsi.com\r\n3. 公司PPT：http://ppt.cc/QGR-\r\n4. 丞希技術課程：http://ppt.cc/csWg\r\n\r\n【相關報導】\r\n1. 媒體報導：http://ppt.cc/V9UF（工商時報：《e世代達人》高子漢默默為台灣科技業努力採訪後記：年輕應做最好的投資，立下目標，堅持理想。）\r\n2. 電台採訪：http://ppt.cc/jmUB （交大幫幫忙：科技人如何結合IT與社區營造）', '蔡綰嫻', '您好，透過花蓮路', '', '2014-05-07 01:29:28', 'onehsien@gmail.com', 1),
(87, '很多人修煉法輪功後身心受益\r\n我的脊損也好了\r\n有空到我的fb上看看\r\n\r\n究竟被廂型車輾過有多痛？\r\n我最近才又體會到許多\r\n\r\n十幾年前的一場車禍被輾到到的當時並沒以任何的痛苦\r\n直到救護車快到台大醫院時才覺得路面有些顛簸感到一陣強大的痛苦\r\n到院後要做檢查時因為要移動身體這時又痛的大叫\r\n但並沒有太長時間\r\n\r\n最近幾年身體常常覺得受到巨大沉重的壓力\r\n腰部常常覺得快被壓斷的感覺\r\n我悟到原來是李洪志師父幫我把痛苦分散了\r\n\r\n如果早知道是這麼的痛苦我就不會這麼輕易的和對方和解\r\n這也是師父的善解吧\r\n對方一直沒有跟我道歉\r\n只有跟我懺悔\r\n她說她太愛自己的孩子了\r\n同時後來談和解時也不承認自己錯\r\n還提出很多照片來辯解\r\n\r\n我現在還是有些後悔\r\n太輕易和解了\r\n\r\n有誰可以幫我打聽到一般的和解行情價\r\n病名是腰部脊髓損傷且運動障礙不能蹲下和跑步\r\n嚴重頻尿\r\n借廁所時借不到的痛苦常常讓我心有怨念\r\n幸好現在修煉法輪功後都好了\r\n出門不再不敢喝水\r\n\r\n法輪功常用網址連結\r\nhttp://big5.minghui.org\r\nhttp://www.falundafa.org.tw/index.html\r\n其中我挑選出一些文章可以在我的fb上看\r\n\r\n歡迎脊損朋友和我多交流\r\n', '郭冬賢', '健康活力的人生', '', '2014-05-09 10:02:08', 'dunghshien@gmail.com', 1),
(88, '桃園拆除路阻進度嚴重落後，無所作為。桃園的夥伴家幗說，曾多次向民代反映，但縣府都不處理；小藍說，桃園縣府周圍就有很多路阻，輪椅族被迫走到人行道，非常危險!\r\n\r\n各位夥伴\r\n\r\n桃園縣需要全台障礙者持續關注，大力督促，敬邀各位夥伴於5月31日上午10時在桃園火車站集合，一起前往桃園縣政府之文化局旁路阻公園，於10時30分舉行「531路過桃園，去除路阻」記者會，台北與桃園障礙者大會師串聯路過桃園，共同推動桃園去除路阻活動!\r\n\r\n', 'ted', '串連路過桃園', '', '2014-05-22 19:17:49', 'ted0119@gmail.com', 1),
(89, '理身心障礙射擊推廣訓練營\r\n\r\n邀請貴會手部功能尚可、及有興趣的成員參與，敬請協助週知~~\r\n\r\n名額有限 (每班7名)，含子彈及靶紙使用 (免費)\r\n\r\n每班保證金800元，全勤退還。\r\n\r\n課程體驗及訓練地點：台北市南港運動中心\r\n\r\n活動訊息網址：http://blog.yam.com/bin2337/article/75857874\r\n\r\n一、主　　旨：射擊為適合平穩、修練、不急躁，具有訓練肌耐力、自我挑戰，\r\n　　　　　　　及協調身心靈之優質運動。藉由此推廣、訓練為國家培育具潛\r\n　　　　　　　能及優秀之身障選手，投入嚴格的運動訓練，提升其競技實力，\r\n　　　　　　　並期於國際競賽中為國爭光。\r\n二、指導單位：教育部體育署。\r\n三、主辦單位：臺北市體育局。\r\n四、承辦單位：台北市身心障礙射擊協會。\r\n五、協辦單位：臺北市南港運動中心。\r\n　　　　　　　臺北市正義射擊協會。\r\n七、活動時間、班別：(2014年)\r\n月份	班別	日　期	時間	\r\n七月	空氣手槍	7/5、7/12\r\n7/19、7/26	14:00~16：00\r\n(星期六)	保證金800元\r\n（全勤即退還，缺席一次扣200元）\r\n空氣步槍	7/6、7/13\r\n7/20、7/27	14:00~16：00\r\n(星期日)\r\n八月	空氣手槍	8/2、8/9\r\n8/16、8/23	14:00~16：00\r\n(星期六)\r\n空氣步槍	8/3、8/17\r\n8/24、8/31	14:00~16：00\r\n(星期日)\r\n \r\n八、參加資格：凡年滿12歲以上之身心障礙者。\r\n\r\n十、報名方式：\r\n　　請下載報名表並填妥後，以下列任何一種方式擲回：\r\n　　(一)以e-mail傳送到hua2801@gmail.com\r\n　　(二)拍下填妥的報名表，用Line傳送到hua2801（Line ID）。\r\n　　(三)將報名表郵寄到：11082臺北市信義區忠孝東路五段790巷59弄2號\r\n　　如有疑問請洽0937-100-339總幹事黃淑華\r\n    註：1.所填報名表之個人資料，僅供本活動相關用途使用。\r\n          2.本活動參加人員及工作人員投保人身保險（含死亡、傷殘及醫療給付）\r\n　　　　　　但亦要以政府規定保險公司投保額度為準。\r\n\r\n十一、報名截止日期：即日起額滿截止(名額有限，欲報從速)。\r\n　　　　　　　　　　額滿與否，請逕上本會網頁查看\r\n　　　　　　　　　　（網址：http://blog.yam.com/bin2337）\r\n\r\n十二、費　　用：保證金800元（全勤即退還，缺席一次扣200元）\r\n\r\n十三、活動人數：每班7人。\r\n\r\n十四、課程內容：射擊知識、射擊技術、實彈射擊訓練…等。\r\n\r\n十五、其　　他：本活動若有修正，將另行通知。\r\n\r\n==================================================================\r\n \r\n　　　　　　　　　　　台北市身心障礙射擊協會\r\n　　　　　　身心障礙射擊運動推廣訓練班【報名表】\r\n姓名	 	性別	 \r\n身分證字號	 	生日	民國　　年　　月　　日\r\n服務(就讀)單　　位	 	職稱	 \r\n連絡電話\r\n 	 	E-mail\r\n 	 \r\n聯絡地址\r\n 	 \r\n身心方面\r\n特殊需求	 \r\n緊急聯絡人	姓名：	電話：	關係：\r\n七月射擊班	□空氣手槍	□空氣步槍\r\n八月射擊班	□空氣手槍	□空氣步槍\r\n備註	一、請用正楷書寫以免辨識錯誤，所填之個人資料僅供本活動相關用途使用。\r\n二、以上資料同意台北市身心障礙射擊協會辦理此項活動及有關相關機構業務使用(如保險公司等)，本會將遵守個人資料保護法，善盡保密之責。\r\n \r\n簽名：                 (未成年者須由監護人簽名)\r\n', 'Lydia', '身心障礙射擊運動', '', '2014-06-27 11:41:30', 'lydia722@gmail.com', 1),
(91, '您好~\r\n我是一位脊髓損傷重度身心障礙人士，需以輪椅代行，\r\n從台中搬來桃園三年多，想參與職訓課程和認識新朋友促其與人群互動。\r\n\r\n', '春卷', '想參與職訓課程。', '', '2014-07-31 19:20:45', 'linpochen33@gmail.com', 1),
(92, 'hi\r\n我想問一下要學習開身障特製汽車，請問桃園楊梅地區有哪一家駕訓班有開立身障者汽車駕訓班呢？\r\n煩請告知，謝謝！', '靜怡', '身障汽車駕訓班', '', '2014-10-06 12:35:01', 'bkinhmis@yahoo.com.tw', 1),
(93, '(編號:0027689) 可使用e-mail,謝謝!', '陳素蓉', '請停寄紙本郵件', '', '2014-12-16 17:05:47', 'abcdef41967915@yahoo.com.tw', 1),
(94, '督導安安，中心各位大大安安，我是郭文憲，從去年十一月底在縣府的工作結束之後，就無業至今，也開始重新去醫院安排復健的療程了，一 三 五 要去，其餘在家，但是，沒復健時就成天在家沒事。沒幫上家裡的忙，討厭自己像個米蟲般的生活~!想請問是否還有文字輸入的接案工作可做，督導燒給我的軟體我還留著，我想再挑戰一次，這一次我一定能做的很完好，願貴單位協助。\r\n郭文憲敬上 .', '郭文憲', '想請問?', '', '2015-02-06 21:40:52', 'abc04248@gmaiil.com', 1),
(96, '你好！我是一名残疾人，我想认识你们一下，可以吗？你们有QQ号码不？这是我的手机号18269933129，我的QQ号747743801，可以给我回复吗？谢谢', '乔治', '请问', '', '2015-05-15 11:58:58', '747743801@qq.com', 1),
(97, '你好~~~我是李佳樺~~~目前有各式的碳粉匣~~~屬於新的~~~請問有回收碳粉匣~~~\r\n如果沒有回收的話~~~有其他的中心會回收嗎\r\n我的電話0980597884\r\n謝謝了', '李佳樺', '請問有回收碳粉匣', '', '2015-05-18 15:05:29', 'chocolate02040204@yahoo.com.tw', 1),
(98, '一、活動時間、班別：(2015年)\r\n代號	活動項目	日　期	活動時間\r\nA班	手槍推廣培訓	7/19、7/26、8/2、8/9	18:00~21：00\r\n(星期日)\r\n\r\nB班	步槍推廣培訓	7/11、7/12、7/18、7/19	10:00~13：00\r\n(星期六、日)\r\n\r\nC班	手槍推廣培訓\r\n(五連發)	7/9、7/16、7/23、7/30	18:00～21:00\r\n(星期四)\r\n\r\nD班	步槍推廣培訓	8/6、8/13、8/20、8/27	18:00～21:00\r\n(星期四)\r\n\r\nE班	手槍推廣培訓	7/22、7/24、7/29、7/31	18:00～21:00\r\n(星期三、五)\r\n\r\nF班	手槍推廣培訓	8/5、8/7、8/12、8/14	18:00～21:00\r\n(星期三、五)\r\n\r\n二、參加資格：凡中華民國國民15歲以上，持有身心障礙手冊。\r\n三、活動地點：臺北市文山運動中心（台北市文山區興隆路三段222號五樓）\r\n捷運木柵線〈棕線〉：至萬芳醫院站下車，出站後往左邊走，步行約5-6分鐘。\r\n四、報名方式：\r\n請下載報名表並填妥後（網址：http://tdsa2003.pixnet.net/blog），拍下填妥的報名表、身心障礙手冊、體位分級卡（參加射擊班免付），以e-mail傳送到tdsa2003@gmail.com　　如有疑問請洽總幹事黃淑華\r\n\r\n五、報名截止日期：即日起額滿截止(名額有限，欲報從速)。\r\n六、費用：保證金800元（全勤即退還，缺席一次扣200元）\r\n七、射擊班人數：每班6人。\r\n八、課程內容：射擊知識、射擊技術、實彈射擊訓練…等。\r\n九、其他：本活動若有修正，將另行通知。\r\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\r\n台北市身心障礙射擊協會射擊推廣培訓班【報名表】\r\n姓名		性別		障別	　　障　　度\r\n身分證字號		生日	民國　　年　　月　　日\r\n服務(就讀)單　　位		職稱	\r\n連絡電話		E-mail	\r\n聯絡地址	\r\n身心方面\r\n特殊需求	\r\n緊急聯絡人	姓名：	電話：	關係：\r\n報名班別	□Ａ班	□Ｂ班	□Ｃ班	□Ｄ班	□Ｅ班	□Ｆ班\r\n備註	一、請用正楷書寫以免辨識錯誤，所填之個人資料僅供本活動相關用途使用。\r\n二、以上資料同意台北市身心障礙射擊協會辦理此項活動及有關相關機構業務使用(如保險公司等)，本會將遵守個人資料保護法，善盡保密之責。\r\n三、請檢附身心障礙手冊影本1份\r\n四、拍下填妥的報名表、身心障礙手冊，e-mail到tdsa2003@gmail.com\r\n', '台北市身心障礙射擊協會', '身心障礙射擊運動', '', '2015-06-10 16:09:25', 'tdsa2003@gmail.com', 1),
(99, '一、活動時間、班別：(2015年)\r\n代號	活動項目	日　期	活動時間\r\nA班	手槍推廣培訓	7/19、7/26、8/2、8/9	18:00~21：00\r\n(星期日)\r\n\r\nB班	步槍推廣培訓	7/11、7/12、7/18、7/19	10:00~13：00\r\n(星期六、日)\r\n\r\nC班	手槍推廣培訓\r\n(五連發)	7/9、7/16、7/23、7/30	18:00～21:00\r\n(星期四)\r\n\r\nD班	步槍推廣培訓	8/6、8/13、8/20、8/27	18:00～21:00\r\n(星期四)\r\n\r\nE班	手槍推廣培訓	7/22、7/24、7/29、7/31	18:00～21:00\r\n(星期三、五)\r\n\r\nF班	手槍推廣培訓	8/5、8/7、8/12、8/14	18:00～21:00\r\n(星期三、五)\r\n\r\n二、參加資格：凡中華民國國民15歲以上，持有身心障礙手冊。\r\n三、活動地點：臺北市文山運動中心（台北市文山區興隆路三段222號五樓）\r\n捷運木柵線〈棕線〉：至萬芳醫院站下車，出站後往左邊走，步行約5-6分鐘。\r\n四、報名方式：\r\n請下載報名表並填妥後（網址：http://tdsa2003.pixnet.net/blog），拍下填妥的報名表、身心障礙手冊、體位分級卡（參加射擊班免付），以e-mail傳送到tdsa2003@gmail.com　　如有疑問請洽總幹事黃淑華\r\n\r\n五、報名截止日期：即日起額滿截止(名額有限，欲報從速)。\r\n六、費用：保證金800元（全勤即退還，缺席一次扣200元）\r\n七、射擊班人數：每班6人。\r\n八、課程內容：射擊知識、射擊技術、實彈射擊訓練…等。\r\n九、其他：本活動若有修正，將另行通知。\r\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\r\n台北市身心障礙射擊協會射擊推廣培訓班【報名表】\r\n姓名		性別		障別	　　障　　度\r\n身分證字號		生日	民國　　年　　月　　日\r\n服務(就讀)單　　位		職稱	\r\n連絡電話		E-mail	\r\n聯絡地址	\r\n身心方面\r\n特殊需求	\r\n緊急聯絡人	姓名：	電話：	關係：\r\n報名班別	□Ａ班	□Ｂ班	□Ｃ班	□Ｄ班	□Ｅ班	□Ｆ班\r\n備註	一、請用正楷書寫以免辨識錯誤，所填之個人資料僅供本活動相關用途使用。\r\n二、以上資料同意台北市身心障礙射擊協會辦理此項活動及有關相關機構業務使用(如保險公司等)，本會將遵守個人資料保護法，善盡保密之責。\r\n三、請檢附身心障礙手冊影本1份\r\n四、拍下填妥的報名表、身心障礙手冊，e-mail到tdsa2003@gmail.com\r\n', '台北市身心障礙射擊協會', '身心障礙射擊運動', '', '2015-06-10 16:12:37', 'tdsa2003@gmail.com', 1),
(101, '請問: 有在回收衣服嗎?', 'Lucy', '衣服回收', '', '2015-07-19 22:04:42', 'n0922989020@yahoo.com.tw', 1),
(102, '這有沒有安排安樂死的 在國外', '李鋐道', '這有沒有安排安樂', '', '2015-09-18 23:10:30', 'lwrnc.l@gmail.com', 1),
(103, '請問105年有職訓課程嗎??\r\n大概開哪些類別什麼時候開呢?\r\n謝謝', '劉思瑩', '請問開課日期', '', '2015-10-06 16:24:28', 'lu23339@yahoo.com.tw', 1),
(104, '您好，我有購買徐懷鈺義賣單曲，\r\n11/13已匯款，請問何時會寄出呢？\r\n單號：ssrc00000080338', '張羅許', '徐懷鈺義賣單曲', '', '2015-11-21 15:22:32', 'highway_feel@hotmail.com', 1),
(105, '您好..我是新屋清華高中汽車科老師，同時也在新屋的社大授課薩克斯風初級體驗班。有意到貴單位義演同時亦可針對有興趣的園生進行免費授課。', '曾進生', '薩克斯風義演', '', '2016-01-15 14:47:42', 'h8978.h8978@msa.hinet.net', 1),
(106, '我從網路上得知想請問是否可去貴中心買易眠枕嗎？謝謝', '陳雅慧', '購買', '', '2016-01-19 16:21:03', 'renee_chen31@yahoo.com.tw', 1),
(107, '請問105年度的基礎電腦招生班報名表要怎麼給?是用Email寄還是有其他方式?', 'Lilly', '請問105年度的', '', '2016-02-19 20:07:34', 'bkinhmis@yahoo.com.tw', 1),
(108, '我腳撞到我很傷心', '許秀萍', '傷害', '', '2016-04-04 03:19:02', 'adc@adc.com.tw', 1),
(109, '我已報名5/16日上課學員,當天如何前往報到,如何預交通工具', '張惟傑', '我家住新北市中和', '', '2016-05-03 08:24:45', 'free@tfri.gov.tw', 1),
(110, '您好！我住在中和區，過年期間爸爸騎車跌倒，頸椎開刀，現在是有意識但是癱瘓狀態。現在我很無助，不知道該怎麼幫爸爸快點好起來，可以給我一些建議嗎？感恩您了。', '劉昀隄', '脊髓損傷者', '', '2016-05-25 23:27:14', 'Kiki718@yahoo.com.tw', 1),
(111, '請問有在賣身障子母機車嗎?', '王士毓', '身障子母機車', '', '2016-05-27 17:35:08', 'tom1786yuki@gmail.com', 1),
(112, '不好意思,我有一些問題想私下請教你們\r\n可是我不管私訊官方FB 或Email到sci@scsrc.org.tw\r\n都沒有任何回應ㄟ! 該如何聯繫你們呢?', 'albee', '請問一下', '', '2016-06-14 12:57:01', 'xun@yahoo.com.tw', 1),
(113, '脊髓損傷傷友的機車東拼西湊,既不美觀而安全性堪慮,而且不合乎脊損者人體功學,中心有考慮引進此款車嗎?或是找合作廠商以OEM方式在台生產呢?\r\nhttps://www.youtube.com/watch?v=8tDpRzUsO04\r\n\r\n另外一款有配合一些輔具,低位頸髓損傷者應該也可以使用,中心這邊也可以考慮引進.\r\nhttps://www.youtube.com/watch?v=NnajnOGkdsw\r\n', '來一客', '堅決捍衛行動不便', '', '2017-01-01 23:02:14', 'howard96@yahoo.com.tw', 1),
(114, '104年因車禍第3、4頸椎椎脊椎損傷台灣人數有多少人\r\n\r\n謝謝\r\n', 'cat', '車禍脊椎損傷台灣', '', '2017-01-16 12:46:32', 'snbaby711@yahoo.com.tw', 1),
(115, '我的雙腿變得完全無力,從輪椅要上床很困難,在無人協助下要如何上床睡覺避免跌倒?', '簡文華', '下肢無法站立,要', '', '2017-03-29 15:39:49', 'asdd231@yahoo.com.tw', 1),
(116, '請問我因意外墬樓送至醫院後院方在我無攜帶證明身分證件敬請社工呼叫計程車將我送回家中，因此導ˋ一年多來無法自理生活，大小便失禁，也因此無法工作，從3歲時父母離婚均由母親扶養，成年後因母親罹患慢性重大疾病便各自在外居住，發生意外時由母親擔起一切照料，磁振造影檢驗報告為˙第一腰椎爆裂性骨折，未求基本開之所需之困明知送至醫院的醫療權益有極大的受損，在受傷期間曾經無法進食，發燒，雙腳萎縮，再送至急診時醫師告知須輸血因發燒無法進行，無法進食唯用插管但我拒絕，在母親卻解下要我逼自己吞下食物就算一小口也必須做到，因此逐漸改善，目前我還是要靠紙尿褲並生活均需仰賴母親，我想請教對於我發生從四樓意外墬樓時醫院無按病人權益在第一時間進行手術而影響目前的我，現在已換至台大醫院我該如何求助就診關於小便失禁的問題', '林邵圜', '求助', '', '2017-04-06 07:54:19', 'you65316@yahoo.com', 1),
(119, 'FFF', 'FFF', 'FFF', '捐款', '2017-09-11 23:18:31', 'FFF', 1),
(120, 'CC', 'CC`CC', 'SS`', '通報', '2017-09-11 23:25:10', 'DD', 1),
(121, 'SSS', 'SSS', 'SSS', '脊髓損傷', '2017-09-11 23:25:24', 'SSS', 1),
(122, 'DDD', 'SSS', 'SSS', '中心相關問題', '2017-09-11 23:25:35', 'DDD', 1),
(123, 'FFF', 'FFF', 'FFF', '捐款', '2017-09-14 14:53:38', 'FF', 1);

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
  MODIFY `DB_MesID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
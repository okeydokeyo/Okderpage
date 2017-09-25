<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


</head>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();//初始化session,就是開始要始用session
include "config.php";
include "function.php";

chk_IP($_SERVER['REMOTE_ADDR']);
chk_data($_GET['page'],5);//檢查字元長度後過長退回上一頁
chk_data($_GET['no'],"5");  //檢查數值是否大於5個字元
$arry1=SoloSql("ordi"," `DB_OrdID`='".$_GET['no']."'");
$arry=SoloSql("ordi_tags"," `DB_OrdTagID`='".$arry1['DB_OrdTagID']."'");
?>
<header>
    <?php 
    include("top_menu.php");
    ?>
</header>
   <body>
<script language="javascript">
	function print_job( ){
		window.open("news_print.php?Id=<?php echo $_GET['no']; ?>","print_job",'height=570,width=775,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,status=no,titlebar=no');
	}
</script><noscript>
  <p>很抱歉，本網頁使用script可是您的瀏覽器並不支援，請改用支援 JavaScript 的瀏覽器，謝謝!</p>  
</noscript>
<!--top_end-->
  <tr>
    <td align="left" valign="top">
<!--left_menu-->

	<div id="content">
	  <table style="margin-top:5%; margin-left:16%;" width="84%" border="0" cellspacing="0" cellpadding="0" id="margin_01" class="text_12px_01" summary="最新消息文字表格">
	    <tr>
		  <th align="left" valign="middle" class="th2-end"><?php echo $arry1['DB_OrdSubject'];?></th>
	    </tr>
		<tr>
	      <td align="left" id="padding_12" class="text_12px_01"><span class="text_12px_03">公告日期 │ </span><?php echo $arry1['DB_OrdTime'];?></td>
	    </tr>
		<tr>
		  <td align="left" valign="middle" class="border_02 text_12px_01-2">
			<p>
			   <?php if ( $arry1['DB_OrdImg_1'] != "" && $arry1['DB_OrdLocation_1'] == "1"){?>
				   <img src="file/<?php echo $arry1['DB_OrdImg_1']?>" alt="<?php echo $arry1['DB_OrdFileName_1'];?>" width="400" />
			   <?php }?>
			   <?php if ($arry1['DB_OrdImg_2'] != "" && $arry1['DB_OrdLocation_2'] == "1"){?>
				   <img src="file/<?php echo $arry1['DB_OrdImg_2']?>" alt="<?php echo $arry1['DB_OrdFileName_2'];?>" width="400" />
			   <?php }?>
			   <?php if ($arry1['DB_OrdImg_3'] != "" && $arry1['DB_OrdLocation_3'] == "1"){?>
				   <img src="file/<?php echo $arry1['DB_OrdImg_3']?>" alt="<?php echo $arry1['DB_OrdFileName_3'];?>" width="400" />
			   <?php }?>
			</p>
			<p>
			   <?php if ( $arry1['DB_OrdYou_1'] != "" && $arry1['DB_OrdYouLocation_1'] == "1"){?>
				   <?php echo $arry1['DB_OrdYou_1'];?>
			   <?php }?>
			   <?php if ($arry1['DB_OrdYou_2'] != "" && $arry1['DB_OrdYouLocation_2'] == "1"){?>
				   <?php echo $arry1['DB_OrdYou_2'];?>
			   <?php }?>
			   <?php if ($arry1['DB_OrdYou_3'] != "" && $arry1['DB_OrdYouLocation_3'] == "1"){?>
				   <?php echo $arry1['DB_OrdYou_3'];?>
			   <?php }?>
			</p>
			<p><?php echo re_change_size($arry1['DB_OrdContent']);?></p>
			<p>
			   <?php if ($arry1['DB_OrdImg_1'] != "" && $arry1['DB_OrdLocation_1'] == "2"){?>
				   <img src="file/<?php echo $arry1['DB_OrdImg_1']?>" alt="<?php echo $arry1['DB_OrdFileName_1'];?>" width="400" />
			   <?php }?>
			   <?php if ($arry1['DB_OrdImg_2'] != "" && $arry1['DB_OrdLocation_2'] == "2"){?>
				   <img src="file/<?php echo $arry1['DB_OrdImg_2']?>" alt="<?php echo $arry1['DB_OrdFileName_2'];?>" width="400" />
			   <?php }?>
			   <?php if ($arry1['DB_OrdImg_3'] != "" && $arry1['DB_OrdLocation_3'] == "2"){?>
				   <img src="file/<?php echo $arry1['DB_OrdImg_3']?>" alt="<?php echo $arry1['DB_OrdFileName_3'];?>" width="400" />
			   <?php }?>
			</p>
			<p>
			   <?php if ( $arry1['DB_OrdYou_1'] != "" && $arry1['DB_OrdYouLocation_1'] == "2"){?>
				   <?php echo $arry1['DB_OrdYou_1'];?>
			   <?php }?>
			   <?php if ($arry1['DB_OrdYou_2'] != "" && $arry1['DB_OrdYouLocation_2'] == "2"){?>
				   <?php echo $arry1['DB_OrdYou_2'];?>
			   <?php }?>
			   <?php if ($arry1['DB_OrdYou_3'] != "" && $arry1['DB_OrdYouLocation_3'] == "2"){?>
				   <?php echo $arry1['DB_OrdYou_3'];?>
			   <?php }?>
			</p>
		  </td>
		</tr>
		<tr>
		  <td class="h5"></td>
		</tr>
		<tr>
		  <td align="left" valign="middle" class="text_12px_01 border_02">
			  <?php if ($arry1['DB_OrdUrl_1'] != "http://" && $arry1['DB_OrdUrl_1'] != "" && $arry1['DB_OrdUrlName_1'] != ""){?>
			     <span  class="text_12px_02">相關網站連結(1)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關網站連結(1)" align="absmiddle" />&nbsp;<a href="<?php echo $arry1['DB_OrdUrl_1'];?>" class="link_01" target="_blank" title="<?php echo $arry1['DB_OrdUrlName_1'];?>(另開啟新視窗)"><?php echo $arry1['DB_OrdUrlName_1'];?></a><br />
			  <?php }?>
			  <?php if ($arry1['DB_OrdUrl_2'] != "http://" && $arry1['DB_OrdUrl_2'] != "" && $arry1['DB_OrdUrlName_2'] != ""){?>
			     <span  class="text_12px_02">相關網站連結(2)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關網站連結(2)" align="absmiddle" />&nbsp;<a href="<?php echo $arry1['DB_OrdUrl_2'];?>" class="link_01" target="_blank" title="<?php echo $arry1['DB_OrdUrlName_2'];?>(另開啟新視窗)"><?php echo $arry1['DB_OrdUrlName_2'];?></a><br />
			  <?php }?>
			  <?php if ($arry1['DB_OrdUrl_3'] != "http://" && $arry1['DB_OrdUrl_3'] != "" && $arry1['DB_OrdUrlName_3'] != ""){?>
			     <span  class="text_12px_02">相關網站連結(3)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關網站連結(3)" align="absmiddle" />&nbsp;<a href="<?php echo $arry1['DB_OrdUrl_3'];?>" class="link_01" target="_blank" title="<?php echo $arry1['DB_OrdUrlName_3'];?>(另開啟新視窗)"><?php echo $arry1['DB_OrdUrlName_3'];?></a><br />
			  <?php }?>
			  <?php if ($arry1['DB_OrdName_1'] != "" && $arry1['DB_OrdArchive_1'] != ""){?>
			     <span  class="text_12px_02">相關檔案下載(1)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關檔案下載(1)" align="absmiddle" />&nbsp;<a href="download.php?DB_FileTitle=<?php echo urlencode($arry1['DB_OrdName_1']);?>&DB_FileName=<?php echo $arry1['DB_OrdArchive_1'];?>" class="link_01" title="<?php echo $arry1['DB_OrdName_1'];?>(開啟新視窗-附件下載)"><?php echo $arry1['DB_OrdName_1'];?></a><br />
			  <?php }?>
			  <?php if ($arry1['DB_OrdName_2'] != "" && $arry1['DB_OrdArchive_2'] != ""){?>
			     <span  class="text_12px_02">相關檔案下載(2)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關檔案下載(2)" align="absmiddle" />&nbsp;<a href="download.php?DB_FileTitle=<?php echo urlencode($arry1['DB_OrdName_2']);?>&DB_FileName=<?php echo $arry1['DB_OrdArchive_2'];?>" class="link_01" title="<?php echo $arry1['DB_OrdName_2'];?>(開啟新視窗-附件下載)"><?php echo $arry1['DB_OrdName_2'];?></a><br />
			  <?php }?>
			  <?php if ($arry1['DB_OrdName_3'] != "" && $arry1['DB_OrdArchive_3'] != ""){?>
			     <span  class="text_12px_02">相關檔案下載(3)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關檔案下載(3)" align="absmiddle" />&nbsp;<a href="download.php?DB_FileTitle=<?php echo urlencode($arry1['DB_OrdName_3']);?>&DB_FileName=<?php echo $arry1['DB_OrdArchive_3'];?>" class="link_01" title="<?php echo $arry1['DB_OrdName_3'];?>(開啟新視窗-附件下載)"><?php echo $arry1['DB_OrdName_3'];?></a><br />
			  <?php }?>
		  </td>
		</tr>
	  </table>
	  <div align="right" style="padding:5px;margin:5px" class="text_12px_01b"><!--<img src="images/icon_top.png" alt="*" width="13" height="13" border="0" align="middle" /> <a href="#" title="友善列印" class="link_03">友善列印</a> │ --><img src="images/icon_top.png" alt="*" width="13" height="13" border="0" align="middle" /> <a href="news_list.php?no=<?php echo $arry1['DB_OrdTagID'];?>" title="回列表頁" class="link_03">回列表頁</a> │ <img src="images/icon_top.png" alt="*" width="13" height="13" border="0" align="middle" /> <a href="#top" title="連結往頁面上方" class="link_03">TOP</a></div>
	  <br />
	  <!--01_end-->
	  <!--con_end-->
	</div>
	</td>
  </tr>
<!--bottom-->

<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
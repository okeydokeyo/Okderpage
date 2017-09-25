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
$no=$_GET['no'];
$arry=SoloSql("article"," `DB_ArtID`='$no'");

?>
<header>
    <?php 
    include("top_menu.php");
    ?>
</header>
   <body>
       <tr>
    <td align="left" valign="top">

	<div id="content">

	  <!--01-->

	  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="margin_01" class="text_12px_01" summary="">
		      <tr>
			    <td class="h5"></td>
		      </tr>
		      <tr>
			    <td align="left" valign="middle" class="border_02 text_12px_01-2">
<!--<p><img src="file/images/ING.jpg" alt="成員合照" width="400" height="300" /></p>-->
<p>
<!--FCK-->
			<p>
			   <?php if ( $arry['DB_ArtImg_1'] != "" && $arry['DB_ArtLocation_1'] == "1"){?>
				   <img src="file/<?php echo $arry['DB_ArtImg_1']?>" alt="<?php echo $arry['DB_ArtFileName_1'];?>" width="400" height="300" />
			   <?php }?>
			   <?php if ($arry['DB_ArtImg_2'] != "" && $arry['DB_ArtLocation_2'] == "1"){?>
				   <img src="file/<?php echo $arry['DB_ArtImg_2']?>" alt="<?php echo $arry['DB_ArtFileName_2'];?>" width="400" height="300" />
			   <?php }?>
			   <?php if ($arry['DB_ArtImg_3'] != "" && $arry['DB_ArtLocation_3'] == "1"){?>
				   <img src="file/<?php echo $arry['DB_ArtImg_3']?>" alt="<?php echo $arry['DB_ArtFileName_3'];?>" width="400" height="300" />
			   <?php }?>
			</p>
			<p>
			   <?php if ( $arry['DB_ArtYou_1'] != "" && $arry['DB_ArtYouLocation_1'] == "1"){?>
				   <?php echo $arry['DB_ArtYou_1'];?>
			   <?php }?>
			   <?php if ($arry['DB_ArtYou_2'] != "" && $arry['DB_ArtYouLocation_2'] == "1"){?>
				   <?php echo $arry['DB_ArtYou_2'];?>
			   <?php }?>
			   <?php if ($arry['DB_ArtYou_3'] != "" && $arry['DB_ArtYouLocation_3'] == "1"){?>
				   <?php echo $arry['DB_ArtYou_3'];?>
			   <?php }?>
			</p>
			<p><?php echo re_change_size($arry['DB_ArtContent']);?></p>
			<p>
			   <?php if ($arry['DB_ArtImg_1'] != "" && $arry['DB_ArtLocation_1'] == "2"){?>
				   <img src="file/<?php echo $arry['DB_ArtImg_1']?>" alt="<?php echo $arry['DB_ArtFileName_1'];?>" width="400" height="300" />
			   <?php }?>
			   <?php if ($arry['DB_ArtImg_2'] != "" && $arry['DB_ArtLocation_2'] == "2"){?>
				   <img src="file/<?php echo $arry['DB_ArtImg_2']?>" alt="<?php echo $arry['DB_ArtFileName_2'];?>" width="400" height="300" />
			   <?php }?>
			   <?php if ($arry['DB_ArtImg_3'] != "" && $arry['DB_ArtLocation_3'] == "2"){?>
				   <img src="file/<?php echo $arry['DB_ArtImg_3']?>" alt="<?php echo $arry['DB_ArtFileName_3'];?>" width="400" height="300" />
			   <?php }?>
			</p>
			<p>
			   <?php if ( $arry['DB_ArtYou_1'] != "" && $arry['DB_ArtYouLocation_1'] == "2"){?>
				   <?php echo $arry['DB_ArtYou_1'];?>
			   <?php }?>
			   <?php if ($arry['DB_ArtYou_2'] != "" && $arry['DB_ArtYouLocation_2'] == "2"){?>
				   <?php echo $arry['DB_ArtYou_2'];?>
			   <?php }?>
			   <?php if ($arry['DB_ArtYou_3'] != "" && $arry['DB_ArtYouLocation_3'] == "2"){?>
				   <?php echo $arry['DB_ArtYou_3'];?>
			   <?php }?>
			</p>
<!--FCK_end-->
</p>
<!--<p><img src="file/images/ING.jpg" alt="成員合照" width="400" height="300" /></p>-->
			</td>
		  </tr>
		  <tr>
			<td class="h5"></td>
		  </tr>
		  <tr>
			<td valign="middle" class="text_12px_01 border_02">
			  <?php if ($arry['DB_ArtUrl_1'] != "http://" && $arry['DB_ArtUrl_1'] != "" && $arry['DB_ArtUrlName_1'] != ""){?>
			     <span  class="text_12px_02">相關網站連結(1)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關網站連結(1)" align="absmiddle" />&nbsp;<a href="<?php echo $arry['DB_ArtUrl_1'];?>" class="link_01" target="_blank" title="<?php echo $arry['DB_ArtUrlName_1'];?>(另開啟新視窗)"><?php echo $arry['DB_ArtUrlName_1'];?></a><br />
			  <?php }?>
			  <?php if ($arry['DB_ArtUrl_2'] != "http://" && $arry['DB_ArtUrl_2'] != "" && $arry['DB_ArtUrlName_2'] != ""){?>
			     <span class="text_12px_02">相關網站連結(2)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關網站連結(2)" align="absmiddle" />&nbsp;<a href="<?php echo $arry['DB_ArtUrl_2'];?>" class="link_01" target="_blank" title="<?php echo $arry['DB_ArtUrlName_2'];?>(另開啟新視窗)"><?php echo $arry['DB_ArtUrlName_2'];?></a><br />
			  <?php }?>
			  <?php if ($arry['DB_ArtUrl_3'] != "http://" && $arry['DB_ArtUrl_3'] != "" && $arry['DB_ArtUrlName_3'] != ""){?>
			     <span class="text_12px_02">相關網站連結(3)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關網站連結(3)" align="absmiddle" />&nbsp;<a href="<?php echo $arry['DB_ArtUrl_3'];?>" class="link_01" target="_blank" title="<?php echo $arry['DB_ArtUrlName_3'];?>(另開啟新視窗)"><?php echo $arry['DB_ArtUrlName_3'];?></a><br />
			  <?php }?>
			  <?php if ($arry['DB_ArtName_1'] != "" && $arry['DB_ArtArchive_1'] != ""){?>
			     <span style="margin-left:16%;" class="text_12px_02">相關檔案下載(1)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關檔案下載(1)" align="absmiddle" />&nbsp;<a href="download.php?DB_FileTitle=<?php echo urlencode($arry['DB_ArtName_1']);?>&DB_FileName=<?php echo $arry['DB_ArtArchive_1'];?>" class="link_01" title="<?php echo $arry['DB_ArtName_1'];?>(開啟新視窗-附件下載)"><?php echo $arry['DB_ArtName_1'];?></a><br />
			  <?php }?>
			  <?php if ($arry['DB_ArtName_2'] != "" && $arry['DB_ArtArchive_2'] != ""){?>
			     <span style="margin-left:16%;" class="text_12px_02">相關檔案下載(2)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關檔案下載(2)" align="absmiddle" />&nbsp;<a href="download.php?DB_FileTitle=<?php echo urlencode($arry['DB_ArtName_2']);?>&DB_FileName=<?php echo $arry['DB_ArtArchive_2'];?>" class="link_01" title="<?php echo $arry['DB_ArtName_2'];?>(開啟新視窗-附件下載)"><?php echo $arry['DB_ArtName_2'];?></a><br />
			  <?php }?>
			  <?php if ($arry['DB_ArtName_3'] != "" && $arry['DB_ArtArchive_3'] != ""){?>
			     <span style="margin-left:16%;" class="text_12px_02">相關檔案下載(3)</span>&nbsp;<img src="images/icon_01.png" width="11" height="11" alt="相關檔案下載(3)" align="absmiddle" />&nbsp;<a href="download.php?DB_FileTitle=<?php echo urlencode($arry['DB_ArtName_3']);?>&DB_FileName=<?php echo $arry['DB_ArtArchive_3'];?>" class="link_01" title="<?php echo $arry['DB_ArtName_3'];?>(開啟新視窗-附件下載)"><?php echo $arry['DB_ArtName_3'];?></a><br />
			  <?php }?>
			</td>
		  </tr>
		</table>
		<div align="right" style="padding:5px;margin:5px" class="text_12px_01b"><!--<img src="images/icon_top.png" alt="*" width="13" height="13" border="0" align="middle" /> <a href="#" title="友善列印" class="link_03">友善列印</a> │ --><img src="images/icon_top.png" alt="*" width="13" height="13" border="0" align="middle" /> <a href="#top" title="連結往頁面上方" class="link_03">TOP</a></div>
		<br />
	  <!--01_end-->
		<!--con_end-->
	</div>
	</td>
  </tr>
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
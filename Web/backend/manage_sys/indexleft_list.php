<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁


//左側選單標籤管理查詢
$DB_LefTagID = $_GET['DB_LefTagID'];
$ary = SoloSql("left_tags","`DB_LefTagID`='$DB_LefTagID'");

$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//網頁首頁管理-左側選單管理查詢
$sql = "select * from `left` where `DB_LefTagID`='$DB_LefTagID' ORDER BY `DB_LefSort` ASC";	
$return = iron_page( $sql, 1000, 10, $page, 10 ); //iron分頁程式
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$url = "indexleft_list.php"; //本頁的網址 & 使用的 get變數
?>


<? 
include_once ("top.php");
?>

<script language="javascript">
<!--
//換頁Script
function GoPage(page){
   location.href="<? echo $url ?>?page="+page;
}
//選擇是否刪除
function  Delete(id){
  if ( confirm("是否刪除此筆紀錄") ){
      location.href='indexleft_del.php?DB_LefID='+id;
  }
}
-->
</script>

<!--top_end-->
<table width="955" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="203" align="left" valign="top">
<!--menu-->
<? 
include_once ("left_menu.php");
?>
<!--menu_end-->
	</td>
    <td width="752" align="left" valign="top">
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" valign="middle"><img src="images/gray_01.gif" width="10" height="20" /></td>
		<td align="left" valign="middle"><img src="images/icon_a1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;<strong><? echo $userauth['DB_ManName'];?></strong> 歡迎登入!!&nbsp;&nbsp;</td>
		<td align="left" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 導覽列管理 >> 第二排選單管理 >> <span class="text_12px_02"><strong><? echo $ary['DB_LefTagSubject'];?></strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong><? echo $ary['DB_LefTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top">
		<div align="right" style="padding:5px;margin:5px"><a href="indexleft_calss.php" class="button_04">◎回標籤列表</a>&nbsp;<a href="indexleft_add.php?DB_LefTagID=<? echo $_GET['DB_LefTagID'];?>" class="button_04">+新增資料</a></div>
		</td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top" class="text_12px_01">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc">
		  <tr bgcolor="#f1f1f1">
			<td width="12%" align="center">序號</td>
			<td width="25%" align="center">選單名稱</td>
			<!--<td width="12%" align="center">連結方式</td>-->
			<td width="34%" align="center">連結位置</td>
			<td width="29%" align="center">功能</td>
		  </tr>
		<?
  if($return){
		$i = 0;
		while( $return[$i] ){
		
		           /*if ($return[$i]['DB_LefClass'] == "1"){
				           $Lclass = "網頁選單功能";
				   }else if ($return[$i]['DB_LefClass'] == "2"){
				           $Lclass = "附件網址";				   
				   }else if ($return[$i]['DB_LefClass'] == "3"){
				           $Lclass = "附件檔案";				   
				   }*/
				   				   
				   if (/*$return[$i]['DB_LefClass'] == "1" &&*/ $return[$i]['DB_LefBasis'] == "1"){
				           //條例式訊息標籤管理查詢
                           $ordt_result = mysql_query("select * from `ordi_tags` where `DB_OrdTagID`='".$return[$i]['DB_LefNumID']."'") or die("查詢失敗b1");
				           $ordt_ary = mysql_fetch_array($ordt_result);
				           $LBasis = "條例式訊息管理-".$ordt_ary['DB_OrdTagSubject']."";
				   }else if (/*$return[$i]['DB_LefClass'] == "1" &&*/ $return[$i]['DB_LefBasis'] == "2"){
				           //說明文章類別查詢
                           $artc_result = mysql_query("select * from `article` where `DB_ArtID`='".$return[$i]['DB_LefNumID']."'") or die("查詢失敗b2");
				           $artc_ary = mysql_fetch_array($artc_result);
				           $LBasis = "說明文章管理-".$artc_ary['DB_ArtSubject']."";				   
				   }else if (/*$return[$i]['DB_LefClass'] == "1" &&*/ $return[$i]['DB_LefBasis'] == "3"){
				           //行事曆管理查詢                          
                           $calt_result = mysql_query("select * from `calendar_tags` where `DB_CalTagID`='".$return[$i]['DB_LefNumID']."'") or die("查詢失敗b3");
				           $calt_ary = mysql_fetch_array($calt_result);
				           $LBasis = "行事曆管理-".$calt_ary['DB_CalTagSubject']."";				   
				   }else if (/*$return[$i]['DB_LefClass'] == "1" &&*/ $return[$i]['DB_LefBasis'] == "4"){
				           //檔案下載類別查詢
                           $dowc_result = mysql_query("select * from `download_tags` where `DB_DowTagID`='".$return[$i]['DB_LefNumID']."'") or die("查詢失敗b4");
				           $dowc_ary = mysql_fetch_array($dowc_result);
				           $LBasis = "檔案下載管理-".$dowc_ary['DB_DowTagSubject']."";				   
				   }else if (/*$return[$i]['DB_LefClass'] == "1" &&*/ $return[$i]['DB_LefBasis'] == "7"){
				           //網站連結查詢
                           /*$webt_result = mysql_query("select * from `website_tags` where `DB_WebTagID`='".$return[$i]['DB_LefNumID']."'") or die("查詢失敗b7");
				           $webt_ary = mysql_fetch_array($webt_result);*/
				           $LBasis = "網站連結";				   
				   }else if (/*$return[$i]['DB_LefClass'] == "1" &&*/ $return[$i]['DB_LefBasis'] == "8"){
				           //參訪紀錄查詢
                           /*$visi_result = mysql_query("select * from `visit` where `DB_VisID`='".$return[$i]['DB_LefNumID']."'") or die("查詢失敗b8");
				           $visi_ary = mysql_fetch_array($visi_result);*/
				           $LBasis = "參訪紀錄";				   
				   }/*else if ($return[$i]['DB_LefClass'] == "2"){
				           $LBasis = "網址";				   
				   }else if ($return[$i]['DB_LefClass'] == "3"){
				           $LBasis = "檔案";				   
				   }*/
		?>			  
		  <tr bgcolor="#ffffff">
			<td align="center"><? echo $return[$i]['DB_LefSort'];?></td>
			<td align="center"><? echo $return[$i]['DB_LefSubject'];?></td>
			<!--<td align="center" class="text_12px_03"><? //echo $Lclass;?></td>-->
			<td align="center" class="text_12px_03"><? echo $LBasis;?></td>
			<td align="center">
			    <a href="indexleft_edit.php?DB_LefID=<? echo $return[$i]['DB_LefID'];?>" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;
				<a href="javascript:Delete(<? echo $return[$i]['DB_LefID']; ?>);" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a>			
			</td>
		  </tr>
		<?
		   $i++;
		}
   }		
		?>		  
		</table>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="left" valign="top"><img src="images/com_bottom_L.gif" width="5" height="5" /></td>
		<td align="left" valign="top" background="images/com_bottom.gif"></td>
		<td align="left" valign="top"><img src="images/com_bottom_R.gif" width="5" height="5" /></td>
	  </tr>
	</table>

	</td>
  </tr>
  <tr>
    <td height="10" colspan="2" align="left" valign="top"></td>
  </tr>
</table>

</body>
</html>
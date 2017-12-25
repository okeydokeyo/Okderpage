<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_10"); //檢查是否功能權限,否回首頁

//行事曆標籤管理查詢
$DB_CalTagID = $_GET['DB_CalTagID'];
$ary2 = SoloSql("calendar_tags","`DB_CalTagID`='$DB_CalTagID'");
?>

<? 
include_once ("top.php");
?>
<script language="javascript">
<!--
//選擇是否刪除
function  Delete(id){
  if ( confirm("是否刪除此筆紀錄") ){
      location.href='calendar_del.php?DB_CalID='+id;
  }
}
//-->
</Script>

<?
//行事曆查詢
$DB_CalID = $_GET['id_no'];
$ary = SoloSql("calendar","`DB_CalID`='$DB_CalID'");
?>
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 行事曆管理 >> <? echo $ary2['DB_CalTagSubject'];?> >> <span class="text_12px_02"><strong>行事曆內容</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong><? echo $ary2['DB_CalTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="calendar_list.php?DB_CalTagID=<? echo $_GET['DB_CalTagID'];?>" class="button_01">◎回列表頁</a></div></td>
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
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 日 期<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <? 
			     //查詢行事曆管理群組的最新時間
                 $calendar_result = mysql_query("select * from `calendar` where `DB_CalGroup`='".$ary['DB_CalGroup']."' ORDER BY `DB_CalStartTime` DESC") or die("查詢失敗ca");
                 $calendar_ary = mysql_fetch_array($calendar_result);
				 
				 //查詢行事曆管理群組的最舊時間
                 $calendar2_result = mysql_query("select * from `calendar` where `DB_CalGroup`='".$ary['DB_CalGroup']."' ORDER BY `DB_CalStartTime` ASC") or die("查詢失敗ca");
                 $calendar2_ary = mysql_fetch_array($calendar2_result);    
					 
					 echo $calendar2_ary['DB_CalStartTime']."～".$calendar_ary['DB_CalStartTime'];
			  ?>
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 廠 商 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><? echo $ary['DB_CalCompany'];?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 施 作 功 能<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><? echo $ary['DB_CalFacilities'];?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 題<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><? echo $ary['DB_CalTitle'];?></td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 內 容<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><? echo nl2br($ary['DB_CalContent']);?></td>
		  </tr>
		</table>		
		<div align="center" style="padding:5px;margin:5px">
		   <a href="calendar_edit.php?DB_CalTagID=<? echo $_GET['DB_CalTagID'];?>&id_no=<? echo $ary['DB_CalID'];?>" class="button_01">修改資料</a>
		   <a href="javascript:Delete(<? echo $ary['DB_CalID']; ?>);" class="button_01">刪除資料</a>
		</div>
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
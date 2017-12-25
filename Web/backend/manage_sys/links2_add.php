<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_14"); //檢查是否功能權限,否回首頁

$arry=SoloSql("website"," 1 order by `DB_WebSort` desc");

$DB_WebTagID_no=$_POST['DB_WebTagID_no'];
$DB_WebTagID=$_POST['DB_WebTagID'];
$DB_WebSort=$_POST['DB_WebSort'];
$DB_WebSubject=ereg_replace("'","\'",$_POST['DB_WebSubject']);
$DB_WebUrl=$_POST['DB_WebUrl'];
$DB_WebAnnounce=$_POST['DB_WebAnnounce'];



$return=iron_upload("DB_WebImg", time(), "", "../file", "gif,jpg,jpeg,png", "16677216" );
if(!empty($DB_WebSort) && !empty($DB_WebSubject) ){

	//ChangeSortAdd("website","$DB_WebSort","DB_WebSort"," && `DB_WebTagID`='$DB_WebTagID_no'");

	$UpStr=" `DB_WebTagID`,`DB_WebSort`,`DB_WebSubject`,`DB_WebUrl`,`DB_WebImg`,`DB_WebFileName`,`DB_WebAnnounce`,`DB_AddTime`,`DB_EditUser`";
	$UpStr2=" '$DB_WebTagID','$DB_WebSort','$DB_WebSubject','$DB_WebUrl','".$return['new_file']."','".$return['old_file_name']."','$DB_WebAnnounce',NOW(),'".$_SESSION['ManUser']."'";
	AddSql("website","links2_list.php","新增成功!!",$UpStr,$UpStr2);

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','網站連結','".$DB_WebSubject."','add',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);
}


?>
<? 
include_once ("top.php");
?>
<script language="javascript">
function checklat(){
	var ErrString = "" ;
	if (document.form1.DB_WebTagID.value == ""){ErrString = ErrString + "類別" + unescape('%0D%0A')}
	if (document.form1.DB_WebSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_WebSubject.value == ""){ErrString = ErrString + "網站名稱" + unescape('%0D%0A')}
	if (document.form1.DB_WebUrl.value == "" || document.form1.DB_WebUrl.value == "http://"){ErrString = ErrString + "網址" + unescape('%0D%0A')}
	//if (document.form1.DB_WebImg.value == ""){ErrString = ErrString + "上傳圖片" + unescape('%0D%0A')}
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	return true;
}

//-->
</Script>
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 網站連結 >> <span class="text_12px_02"><strong>新增資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網站連結</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="links2_list.php" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="links2_add.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 類 別<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			<select id="DB_WebTagID" name="DB_WebTagID" class="text_12px_01" >
			<option value="" >請選擇類別</option>
			<?
			//查詢網站連結類別資料
			$website_tags_result = mysql_query("select * from `website_tags` where 1 ORDER BY `DB_WebTagSort` ASC") or die("查詢失敗");
			for ($a=1 ;$a<=$website_tags_ary = mysql_fetch_array($website_tags_result) ;$a++){
			?>			
			<option value="<? echo $website_tags_ary['DB_WebTagID'];?>" ><? echo $website_tags_ary['DB_WebTagSubject'];?></option>
			<? } ?>		
			</select>
			  </td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_WebSort"  type="text" class="text_12px_01" id="DB_WebSort" size="3" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 網 站 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_WebSubject"  type="text" class="text_12px_01" id="DB_WebSubject" size="50" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 網 址<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_WebUrl"  type="text" class="text_12px_01" id="DB_WebUrl" value="http://" size="50" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片</td>
			<td align="left" valign="top" class="border_02"><input name="DB_WebImg" type="file" class="text_12px_01" id="DB_WebImg" size="40" /><br />(圖片會依比例自動縮到 寬 142px，<span class="text_12px_03">建議尺寸為：寬142px&nbsp;高42px</span>)</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <input name="DB_WebAnnounce" type="radio" value="0" checked="checked" />顯示
			  <input name="DB_WebAnnounce" type="radio" value="1" />不顯示</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" class="button_01">新增資料</a></div>
		<input  type="hidden" name="DB_WebTagID_no" value="<? echo $arry['DB_WebTagID'];?>">
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
	  </form>
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

<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
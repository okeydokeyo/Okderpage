<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_17"); //檢查是否功能權限,否回首頁

$ary = SoloSql("top_tags","`DB_TopTagID`='".$_GET['DB_TopTagID']."'");

$TopTagID = $_POST['TopTagID'];
$DB_TopTagEmail = ereg_replace("'","\'",$_POST['DB_TopTagEmail']);



if( !empty($DB_TopTagEmail) ){
	                
					//修改
					$UpStr = "`DB_TopTagEmail`='$DB_TopTagEmail',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
					EditSql("top_tags",$TopTagID,"DB_TopTagID","indextop_calss.php","修改成功!!",$UpStr);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','上方選單管理','聯絡我們','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);

   
}
?>

<? 
include_once ("top.php");
?>

<script language="javascript">
<!--


function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_TopTagSubject.value == ""){ErrString = ErrString + "E-mail設定" + unescape('%0D%0A')}
	
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	

	return true;
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理>> 上方選單管理 >> 聯絡我們 >> <span class="text_12px_02"><strong>編輯資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>聯絡我們</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="indextop_calss.php" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form action="indextop_contact.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">	  
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		  <!--<span class="text_12px_01">●使用說明：<br /> 
		  選單名稱將會出現在首頁的左側，您可以選擇選單連結方式的任一種。<br />
		  (1)連結網頁選單功能將會直接連接到系統內所建置的功能頁面，當前台點選連結會直接連結到您指定功能頁面。<br />
		  (2)連結到網址請您輸入網址以及網址名稱，當前台點選連結會直接連結到您指定網址。<br />
		  (3)連結到附件請您上傳一個不超過2M檔案，當前台點選連結會直接連結到您指定文件。</span>-->
		  <table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> E-mail設定<font color="red">*</font></td>
			<td width="82%" align="left" valign="top" class="border_02">
			    <input name="DB_TopTagEmail" value="<? echo $ary['DB_TopTagEmail'];?>" type="text" class="text_12px_01" size="60" />
				<input name="TopTagID" value="<? echo $ary['DB_TopTagID'];?>" type="hidden" />
			</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a></div>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="left" valign="top"><img src="images/com_bottom_L.gif" width="5" height="5" /></td>
		<td align="left" valign="top" background="images/com_bottom.gif"></td>
		<td align="left" valign="top"><img src="images/com_bottom_R.gif" width="5" height="5" /></td>
	  </tr>
</form>	  
	</table>

	</td>
  </tr>
  <tr>
    <td height="10" colspan="2" align="left" valign="top"></td>
  </tr>
</table>
<!--bottom-->
<? 
include_once ("bottom.php");
?>
<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
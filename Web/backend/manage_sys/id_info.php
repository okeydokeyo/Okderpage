<?/* 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁

if( !empty($_POST['DB_ManName']) && !empty($_POST['DB_ManEmail']) ){
     
	 $DB_ManPwd = md5($_POST['passwd']);
	 $DB_ManName = $_POST['DB_ManName'];
	 $DB_ManSex = $_POST['DB_ManSex'];
	 $DB_ManEmail = $_POST['DB_ManEmail'];
	 
     if ( !empty($_POST['passwd']) ){			   
			   mysql_query("update `manager` set `DB_ManPwd`='$DB_ManPwd',`DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail' where `DB_ManID`='".$_POST['DB_ManID']."'") or die("更新失敗a!"); 
			   
			   //紀錄使用者資訊	
			   $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			   $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','修改個人基本資料','".$DB_ManName."','edit',NOW()";
			   Recording_Add("recording",$UpStr,$UpStr2);	           
			   
			   echo "<script language='javascript'>alert('修改成功!');parent.location.href='id_info.php';</script>";
	 }else{
			   mysql_query("update `manager` set `DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail' where `DB_ManID`='".$_POST['DB_ManID']."'") or die("更新失敗b!"); 
	           
			   //紀錄使用者資訊	
			   $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			   $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','修改個人基本資料','".$DB_ManName."','edit',NOW()";
			   Recording_Add("recording",$UpStr,$UpStr2);
			   			   
			   echo "<script language='javascript'>alert('修改成功!');parent.location.href='id_info.php';</script>";	          
	 }

}
*/
?>

<?
include_once ("top.php");
?>

<html>
<body>
<script language="javascript">
<!--
function checkinput(){
	var ErrString = "" ;
	/*if (document.form1.id.value == ""){ErrString = ErrString + "帳號" + unescape('%0D%0A')}
	if(document.form1.id.value != ""){
		if(document.form1.id.value.length < 4){ErrString = ErrString + "帳號長度必須超過4碼" + unescape('%0D%0A')}
	}
	if (document.form1.passwd.value == ""){ErrString = ErrString + "密碼" + unescape('%0D%0A')}*/
	if (document.form1.DB_ManName.value == ""){ErrString = ErrString + "管理者姓名" + unescape('%0D%0A')}
	if (document.form1.DB_ManEmail.value == ""){ErrString = ErrString + "電 子 信 箱" + unescape('%0D%0A')}
	if(document.form1.passwd.value != ""){
		if(document.form1.passwd.value.length < 4){ErrString = ErrString + "密碼長度必須超過4碼" + unescape('%0D%0A')}
		if(document.form1.passwd.value != document.form1.Repasswd.value){ErrString = ErrString + "密碼前後輸入不一致" + unescape('%0D%0A')}
	}
	
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 帳號權限管理 >> <span class="text_12px_02"><strong>修改基本資料或密碼</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>修改基本資料或密碼</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form name="form1" action="id_info.php" method="POST" target="FormFrame">	  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="middle" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="middle" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 管理者帳號</td>
			<td width="85%" align="left" valign="middle" class="border_02"><? echo $userauth['DB_ManUser'];?>&nbsp;</td>
		  </tr>
		  <tr>
			<td align="left" valign="middle" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 修 改 密 碼</td>
			<td align="left" valign="middle" class="border_02"><input name="passwd"  type="password" class="text_12px_01" maxlength="12" /> (英文字母或數字4~12個)</td>
		  </tr>
		  <tr>
			<td align="left" valign="middle" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 確  認  密 碼</td>
			<td align="left" valign="middle" class="border_02"><input name="Repasswd"  type="password" class="text_12px_01" maxlength="12" /> (英文字母或數字4~12個)</td>
		  </tr>
		  <tr>
			<td align="left" valign="middle" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 管理者姓名<font color="red">*</font></td>
			<td align="left" valign="middle" class="border_02">
			<input name="DB_ManName" value="<? echo $userauth['DB_ManName'];?>" type="text" class="text_12px_01" />
			<input name="DB_ManID" value="<? echo $userauth['DB_ManID'];?>" type="hidden"/>
              <input name="DB_ManSex" type="radio" value="0" <? if ($userauth['DB_ManSex'] == "0"){echo "checked";}?> />
              <span class="text_12px_03">先生</span>
              <input name="DB_ManSex" type="radio" value="1" <? if ($userauth['DB_ManSex'] == "1"){echo "checked";}?>/>
              <span class="text_12px_03">小姐</span></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 電 子 信 箱<font color="red">*</font></td>
			<td align="left" valign="middle" class="border_02"><input name="DB_ManEmail" value="<? echo $userauth['DB_ManEmail'];?>" type="text" class="text_12px_01" size="50"/></td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a></div>
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
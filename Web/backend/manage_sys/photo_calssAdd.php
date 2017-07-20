<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁


$DB_LifTagSort = $_POST['DB_LifTagSort'];
$DB_LifTagSubject = ereg_replace("'","\'",$_POST['DB_LifTagSubject']);
$DB_LifTagAnnounce = $_POST['DB_LifTagAnnounce'];


if( !empty($DB_LifTagSort) && !empty($DB_LifTagSubject) ){
     
	                ChangeSortAdd("life_tags",$DB_LifTagSort,"DB_LifTagSort",""); //修改排序
	    
				    //新增
					$UpStr = "`DB_LifTagSort`,`DB_LifTagSubject`,`DB_LifTagAnnounce`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$DB_LifTagSort','$DB_LifTagSubject','$DB_LifTagAnnounce',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("life_tags","photo_calss.php","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','網路相簿','".$DB_LifTagSubject."','add',NOW()";
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
	if (document.form1.DB_LifTagSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_LifTagSubject.value == ""){ErrString = ErrString + "標籤名稱" + unescape('%0D%0A')}
	
	
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> <a href="photo_calss.php" class="link_01">網路相簿</a> >> <span class="text_12px_02"><strong>新增標籤</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網路相簿</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="photo_calss.php" class="button_04">◎回標籤列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form action="photo_calssAdd.php" method="POST" name="form1" target="FormFrame">	  
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top" class="text_12px_01">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
<?
//網路相簿標籤管理查詢
$lifta_result = mysql_query("select * from `life_tags` where 1") or die("查詢失敗li");
$lifta_num = mysql_num_rows($lifta_result);
?>			
			  <input name="DB_LifTagSort" value="<? if ($lifta_num == "0"){echo "1";}else{echo $lifta_num+1;}?>" type="text" class="text_12px_01" size="3" />
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 籤 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_LifTagSubject" value="" type="text" class="text_12px_01" size="50" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <input name="DB_LifTagAnnounce" type="radio" value="0" />是
			  <input name="DB_LifTagAnnounce" type="radio" value="1" checked="checked" />否</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px">
		  <a href="javascript:document.form1.submit();" onClick="return checkinput();" class="button_01">新增</a>&nbsp;
		  <a href="javascript:document.form1.reset();" class="button_01">取消</a>
		</div>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;
		</td>
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
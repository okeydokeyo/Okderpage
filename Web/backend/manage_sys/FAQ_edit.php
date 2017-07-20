<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_13"); //檢查是否功能權限,否回首頁

$DB_FaqID=$_GET['DB_FaqID'];
$arry=SoloSql("faq"," `DB_FaqID`='$DB_FaqID'");
$arry1=SoloSql("faq_tags"," `DB_FaqTagID`='".$arry['DB_FaqTagID']."'");

$DB_FaqTagSubject_no=$_POST['DB_FaqTagSubject_no'];
$DB_FaqTagID_no=$_POST['DB_FaqTagID_no'];
$DB_FaqID_no=$_POST['DB_FaqID_no'];
$page_no=$_POST['page_no'];
$DB_FaqSort_no=$_POST['DB_FaqSort_no'];
$DB_FaqSort=$_POST['DB_FaqSort'];
$DB_FaqSubject=ereg_replace("'","\'",$_POST['DB_FaqSubject']);
$DB_FaqContent=nl2br(ereg_replace("'","\'",$_POST['DB_FaqContent']));
$DB_FaqAnnounce=$_POST['DB_FaqAnnounce'];


if(!empty($DB_FaqSort) && !empty($DB_FaqSubject) && !empty($DB_FaqContent) ){

	ChangeSortEdit("faq","$DB_FaqSort","DB_FaqSort","$DB_FaqSort_no"," && `DB_FaqTagID`='$DB_FaqTagID_no'");
	

	$UpStr=" `DB_FaqSort`='$DB_FaqSort',`DB_FaqSubject`='$DB_FaqSubject',`DB_FaqContent`='$DB_FaqContent',`DB_FaqAnnounce`='$DB_FaqAnnounce',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
	EditSql("faq","$DB_FaqID_no","DB_FaqID","FAQ_list.php?DB_FaqTagID=$DB_FaqTagID_no&page=$page_no","修改成功!!",$UpStr);

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','常見問題管理-".$DB_FaqTagSubject_no."','".$DB_FaqSubject."','edit',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);
}

?>
<? 
include_once ("top.php");
?>
<script language="javascript">
function checklat(){
	var ErrString = "" ;
	if (document.form1.DB_FaqSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_FaqSubject.value == ""){ErrString = ErrString + "問題" + unescape('%0D%0A')}
	if (document.form1.DB_FaqContent.value == ""){ErrString = ErrString + "回答" + unescape('%0D%0A')}
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 常見問題 >> <? echo $arry1['DB_FaqTagSubject'];?> >> <span class="text_12px_02"><strong>修改資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>常見問題 - <? echo $arry1['DB_FaqTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="FAQ_list.php?DB_FaqTagID=<? echo $arry1['DB_FaqTagID'];?>" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="FAQ_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_FaqSort"  type="text" class="text_12px_01" id="DB_FaqSort" value="<? echo $arry['DB_FaqSort'];?>" size="3" />
			<input  type="hidden" name="DB_FaqSort_no" value="<? echo $arry['DB_FaqSort'];?>"></td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <input name="DB_FaqAnnounce" type="radio" value="0" <? if($arry['DB_FaqAnnounce']=="0"){echo "checked";}?>/>顯示
			  <input name="DB_FaqAnnounce" type="radio" value="1" <? if($arry['DB_FaqAnnounce']=="1"){echo "checked";}?>/>不顯示</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 問 題<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_FaqSubject"  type="text" class="text_12px_01" id="DB_FaqSubject" size="100" value="<? echo $arry['DB_FaqSubject'];?>"/></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 回 答<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><textarea name="DB_FaqContent" cols="100" rows="5" class="text_12px_01" id="DB_FaqContent"><? echo ereg_replace("<[^>]*>","",$arry['DB_FaqContent']);?></textarea></td>
		  </tr>
		</table>
		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" class="button_01">修改資料</a></div>
		<input  type="hidden" name="DB_FaqTagID_no" value="<? echo $arry1['DB_FaqTagID'];?>">
		<input  type="hidden" name="DB_FaqTagSubject_no" value="<? echo $arry1['DB_FaqTagSubject'];?>">
		<input  type="hidden" name="DB_FaqID_no" value="<? echo $arry['DB_FaqID'];?>">
		<input  type="hidden" name="page_no" value="<? echo $_GET['page'];?>">
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
<!--bottom-->
<? 
include_once ("bottom.php");
?>
<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_6"); //檢查是否功能權限,否回首頁

$arry=SoloSql("banner"," `DB_BanID`='".$_GET['DB_BanID']."'");

$page=$_POST['page'];
$DB_BanID_no=$_POST['DB_BanID_no'];
$DB_BanSort=$_POST['DB_BanSort'];
$DB_BanSort_no=$_POST['DB_BanSort_no'];
$DB_BanSubject=ereg_replace("'","\'",$_POST['DB_BanSubject']);
$DB_BanUrl=$_POST['DB_BanUrl'];


if(!empty($DB_BanSort) && !empty($DB_BanSubject) ){

	ChangeSortEdit("banner","$DB_BanSort","DB_BanSort","$DB_BanSort_no","");

	if(!empty($_FILES['DB_BanImg']['name'])){
	$return=iron_upload("DB_BanImg", time(), "", "../file", "gif,jpg,jpeg,png", "16677216" );
	$UpStr=" `DB_BanSort`='$DB_BanSort',`DB_BanSubject`='$DB_BanSubject',`DB_BanUrl`='$DB_BanUrl',`DB_BanImg`='".$return['new_file']."',`DB_BanFileName`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
	}else{
	$UpStr=" `DB_BanSort`='$DB_BanSort',`DB_BanSubject`='$DB_BanSubject',`DB_BanUrl`='$DB_BanUrl',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
	}
	EditSql("banner","$DB_BanID_no","DB_BanID","links_list.php?page=$page","修改成功!!",$UpStr);

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','相關連結','".$DB_BanSubject."','edit',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);
}
?>
<? 
include_once ("top.php");
?>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
function checklat(){
	var ErrString = "" ;
	if (document.form1.DB_BanSort.value == ""){ErrString = ErrString + "序號" + unescape('%0D%0A')}
	if (document.form1.DB_BanSubject.value == ""){ErrString = ErrString + "網站名稱" + unescape('%0D%0A')}
	if (document.form1.DB_BanUrl.value == "" || document.form1.DB_BanUrl.value == "http://"){ErrString = ErrString + "網址" + unescape('%0D%0A')}
	if (document.form1.DB_BanImg.value == ""){ErrString = ErrString + "上傳圖片" + unescape('%0D%0A')}
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	return true;
}

//更換文件上傳資料
function change1( num,DB_FileName ){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('file1').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "links_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理 >> 相關連結 >> 連結列表 >> <span class="text_12px_02"><strong>修改資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>相關連結</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="links_list.php?page=<? echo $_GET['page'];?>" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="links_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_BanSort"  type="text" class="text_12px_01" id="DB_BanSort" value="<? echo $arry['DB_BanSort'];?>" size="3" />
			<input  type="hidden" name="DB_BanSort_no" value="<? echo $arry['DB_BanSort'];?>"></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 網 站 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_BanSubject"  type="text" class="text_12px_01" id="DB_BanSubject" value="<? echo $arry['DB_BanSubject'];?>" size="50" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 網 址<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_BanUrl"  type="text" class="text_12px_01" id="DB_BanUrl" value="<? echo $arry['DB_BanUrl'];?>" size="50" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
	<span id="file1">
	<?
	if(!empty($arry['DB_BanImg']) && !empty($arry['DB_BanFileName'])){
	?>
	<a href="../file/<? echo $arry['DB_BanImg'];?>" target="_blank"><img src="../file/<? echo $arry['DB_BanImg'];?>" width="142" height="48" border="0" align="top" id="border_02" /></a>&nbsp;<span style="vertical-align: bottom;"><a href="javascript:change1(<? echo $arry['DB_BanID'];?>,'DB_BanImg');" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></span>
	<? 
	}elseif(empty($arry['DB_BanImg']) && empty($arry['DB_BanFileName'])){
	?>
	<input name="DB_BanImg" type="file" class="text_12px_01" size="40" /><br />(圖片會依比例自動縮到 寬 142px，<span class="text_12px_03">建議尺寸為：寬142px&nbsp;高42px</span>)
	<? }?>
	</span>			</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" title="修改資料" class="button_01">修改資料</a></div>
	  <input  type="hidden" name="DB_BanID_no" value="<? echo $_GET['DB_BanID'];?>">
	  <input type="hidden" name="page" value="<? echo $_GET['page'];?>">
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
</body>
</html>
<iframe width="0" height="0" name="FormFrame"></iframe>

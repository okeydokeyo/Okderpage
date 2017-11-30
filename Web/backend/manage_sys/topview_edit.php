<?php
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_16"); //檢查是否功能權限,否回首頁

$arry=SoloSql("animation","`DB_AniID`='".$_GET['DB_AniID']."'");
$page=$_POST['page'];
$DB_AniID_no=$_POST['DB_AniID_no'];
$DB_LogAnnounce=$_POST['DB_LogAnnounce'];
$DB_LogExp=ereg_replace("'","\'",$_POST['DB_LogExp']);

if(!empty($DB_LogExp) ){	
    if(!empty($_FILES['DB_LogImg']['name'])){   
        $return=iron_upload("DB_LogImg", time(), "", "../../videos/", "mp4", "16677216" );		
        $UpStr=" `DB_LogAnnounce`='$DB_LogAnnounce',`DB_LogExp`='$DB_LogExp',`DB_LogImg`='".$return['new_file']."',`DB_LogFileName`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
            else{
                $UpStr=" `DB_LogAnnounce`='$DB_LogAnnounce',`DB_LogExp`='$DB_LogExp',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("animation","$DB_AniID_no","DB_AniID","topview_edit.php?DB_AniID=1&page=1","修改成功!!",$UpStr);
	
			//紀錄使用者資訊	
 $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','主要影片管理','".$DB_LogExp."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
}
include_once ("top.php");
?>

<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_LogExp.value == ""){ErrString = ErrString + "主要影片說明" + unescape('%0D%0A')}
	if (document.form1.DB_LogImg.value == ""){ErrString = ErrString + "上傳影片" + unescape('%0D%0A')}
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
	oHttpReq.open( "GET", "topview_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}
</script>

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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 導覽列管理 >> 主要影片管理 >> <span class="text_12px_02"><strong>修改資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
        
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>主要影片管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	</table>
        
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form action="topview_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">	  
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
			<td align="left" valign="top" class="border_02">
                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 主要影片說明<font color="red">*</font>
            </td>
			<td align="left" valign="top" class="border_02">
                <input name="DB_LogExp" value="<? echo $arry['DB_LogExp'];?>" type="text" class="text_12px_01" size="80" />
              </td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02">
                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 影 片<font color="red">*</font>
            </td>
			<td width="85%" align="left" valign="top" class="border_02">
	           <span id="file1">
                <?php
                if(!empty($arry['DB_LogImg']) && !empty($arry['DB_LogFileName'])){
                ?>
                   <a href="../../videos/<? echo $arry['DB_LogImg'];?>" target="_blank">
                    <? echo $arry['DB_LogFileName'];?>
                   </a> 
                   <a href="javascript:change1(<? echo $arry['DB_AniID'];?>,'DB_LogImg');">
                       <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />
                   </a>
                   <?php
                }
                   else if(empty($arry['DB_LogImg']) && empty($arry['DB_LogFileName'])){
                   ?>
                   <input name="DB_LogImg" type="file" id="DB_LogImg" class="text_12px_01"/>
                   <?php 
                   }?>
                </span>
                <br />
              </td>
            </tr>
		</table> 		
		<div align="center" style="padding:5px;margin:5px">
            <a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a></div>
	  <input  type="hidden" name="DB_AniID_no" value="<? echo $arry['DB_AniID'];?>">
	  <input type="hidden" name="page" value="<? echo $_GET['page'];?>">		
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
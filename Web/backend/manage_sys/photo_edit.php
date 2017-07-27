<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁

$DB_LifID=$_GET['DB_LifID'];
$arry=SoloSql("life"," `DB_LifID`='".$_GET['DB_LifID']."'");
$arry1=SoloSql("life_album"," `DB_LifAlbID`='".$arry['DB_LifAlbID']."'");
$arry2=SoloSql("life_tags"," `DB_LifTagID`='".$arry['DB_LifTagID']."'");


$DB_LifID=$_POST['DB_LifID'];
$DB_LifTagID=$_POST['DB_LifTagID'];
$DB_LifAlbID = $_POST['DB_LifAlbID'];
/*$Language=$_POST['Language'];
$page=$_POST['page'];
$page_no=$_POST['page_no'];*/
$DB_LifSort=$_POST['DB_LifSort'];
$DB_LifSort_no=$_POST['DB_LifSort_no'];
$DB_LifAlbTitle=ereg_replace("'","\'",$_POST['DB_LifAlbTitle']);
$DB_LifContent=nl2br(ereg_replace("'","\'",$_POST['DB_LifContent']));
$DB_LifMode=$_POST['DB_LifMode'];
$DB_LifCover=$_POST['DB_LifCover'];


		if(!empty($DB_LifSort)){

			//ChangeSortEdit("life","$DB_LifSort","DB_LifSort","$DB_LifSort_no"," && `DB_LifAlbID`='".$DB_LifAlbID_no."'");
            
			$file_type = "jpeg,jpg,gif,png";
			
			for ($a2=1 ;$a2<=1 ;$a2++){	
        		    
					$fsNum += FiSy_Num("DB_LifName" ,"1024" ,"1");
			        $fNum += FiTy_Num($file_type ,"DB_LifName");	
								 	
			}
			
			if( $fsNum > 0 ){
							$error = "請上傳寬1024像素以下的圖片！！";
							SHOWTEST($error);
							exit();
			}
			
			if( $fNum > 0 ){
							$error = "檔案類型需為：『".$file_type."』圖檔！！";
							SHOWTEST($error);
							exit();
			}
			
			if(!empty($_FILES['DB_LifName']['name'])){
				//$return=iron_upload("DB_LifName", time(), "", "../photo", "gif,jpg,jpeg,png", "16677216" );
				$return = upload_photo( "DB_LifName", time(), "../photo/", "../photo/small/", "600", "150");						
						
				$UpStr=" `DB_LifSort`='$DB_LifSort',`DB_LifContent`='$DB_LifContent',`DB_LifMode`='$DB_LifMode',`DB_LifCover`='$DB_LifCover',`DB_LifName`='".$return['new_file']."',`DB_LifFileName`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}else{
				$UpStr=" `DB_LifSort`='$DB_LifSort',`DB_LifContent`='$DB_LifContent',`DB_LifMode`='$DB_LifMode',`DB_LifCover`='$DB_LifCover',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("life","$DB_LifID","DB_LifID","photo_list.php?DB_LifTagID=".$DB_LifTagID."&LifAlbID=".$DB_LifAlbID."","修改成功!!",$UpStr);
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','網路相簿-".$DB_LifAlbTitle."','".$DB_LifContent."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}

?>

<? 
include_once ("top.php");
?>
<!--top_end-->
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_LifSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	//if (document.form1.DB_LifName_1.value == ""){ErrString = ErrString + "上傳照片" + unescape('%0D%0A')}
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
	oHttpReq.open( "GET", "photo_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}

//-->
</Script>

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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 網路相簿 >> <? echo $arry2['DB_LifTagSubject']." >> ".$arry1['DB_LifAlbTitle'];?> >> <span class="text_12px_02"><strong>修改照片</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網路相簿 - <? echo $arry2['DB_LifTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="photo_list.php?DB_LifTagID=<? echo $arry['DB_LifTagID'];?>&LifAlbID=<? echo $arry['DB_LifAlbID'];?>" class="button_01">◎回照片列表</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr><!---->
	  <form action="photo_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="text_12px_04"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 相簿名稱：<strong><? echo $arry1['DB_LifAlbTitle'];?></strong><span class="text_12px_01"></span></td>
		  </tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_LifSort"  type="text" class="text_12px_01" id="DB_LifSort" size="3" value="<? echo $arry['DB_LifSort'];?>" />
			<input  type="hidden" name="DB_LifSort_no" value="<? echo $arry['DB_LifSort'];?>"></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 照 片 簡 述</td>
			<td align="left" valign="top" class="border_02"><textarea name="DB_LifContent" cols="100" rows="3" class="text_12px_01" id="DB_LifContent"><? echo ereg_replace("<[^>]*>","",$arry['DB_LifContent']);?></textarea></td>
		  </tr>
		  <!--<tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 型 式<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <input name="DB_LifMode" type="radio" value="1" <? //if($arry['DB_LifMode']=="1"){echo "checked";}?> />
			  直式
			  <input name="DB_LifMode" type="radio" value="0" <? //if($arry['DB_LifMode']=="0"){echo "checked";}?> />
			  橫式</td>
		  </tr>-->
		  <tr>
		    <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 封 面<font color="red">*</font></td>
		    <td align="left" valign="top" class="border_02">
			<input name="DB_LifCover" type="radio" value="0" <? if($arry['DB_LifCover']=="0"){echo "checked";}?> />
			否
			<input name="DB_LifCover" type="radio" value="1" <? if($arry['DB_LifCover']=="1"){echo "checked";}?> />
			是</td>
		    </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 照 片<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
		<span id="file1">
		<?
		if(!empty($arry['DB_LifName']) && !empty($arry['DB_LifFileName'])){
		?>
		<a href="../photo/<? echo $arry['DB_LifName'];?>" target="_blank"><? echo $arry['DB_LifFileName'];?></a> <a href="javascript:change1(<? echo $arry['DB_LifID'];?>,'DB_LifName');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
		<? 
		}elseif(empty($arry['DB_LifName']) && empty($arry['DB_LifFileName'])){
		?>
		<input name="DB_LifName" type="file" class="text_12px_01" id="DB_LifName" size="40" />
		<? }?>
		</span>
			<br />(<span class="text_12px_03">建議尺寸為：600 x400 像素</span>，如長或寬超過600像素會自動依比例縮小。)</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a></div>
	  
	  <input  type="hidden" name="DB_LifID" value="<? echo $_GET['DB_LifID'];?>">
	  <input  type="hidden" name="DB_LifTagID" value="<? echo $arry['DB_LifTagID'];?>">
	  <input  type="hidden" name="DB_LifAlbID" value="<? echo $arry['DB_LifAlbID'];?>">
	  <input  type="hidden" name="DB_LifAlbTitle" value="<? echo $arry1['DB_LifAlbTitle'];?>">
	  <!--<input  type="hidden" name="Language" value="<? //echo $_GET['Language'];?>">
	  <input type="hidden" name="page" value="<? //echo $_GET['page'];?>">
	  <input type="hidden" name="page_no" value="<? //echo $_GET['page_no'];?>">-->
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
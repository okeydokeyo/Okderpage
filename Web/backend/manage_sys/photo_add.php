<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁


//網路相簿標籤管理查詢
$LifTagID = $_GET['DB_LifTagID'];
$ary = SoloSql("life_tags","`DB_LifTagID`='$LifTagID'");


//$page=$_POST['page'];
//$page_no=$_POST['page_no'];
$DB_LifTagID = $_POST['DB_LifTagID'];
$DB_LifAlbID = $_POST['DB_LifAlbID'];
/*
$DB_LifSort=$_POST['DB_LifSort'];
$DB_LifContent=nl2br(ereg_replace("'","\'",$_POST['DB_LifContent']));
$DB_LifMode=$_POST['DB_LifMode'];
$DB_LifCover=$_POST['DB_LifCover'];*/


if(!empty($_POST['DB_LifSort_1']) && !empty($DB_LifAlbID)){

			//ChangeSortAdd("life","$DB_LifSort","DB_LifSort"," && `DB_LifAlbID`='".$DB_LifAlbID_no."'");
			$file_type = "jpeg,jpg,gif,png";
			
			for ($a2=1 ;$a2<=2 ;$a2++){	
        		    
					$fsNum += FiSy_Num("DB_LifName_".$a2."" ,"1024" ,"1");
			        $fNum += FiTy_Num($file_type ,"DB_LifName_".$a2."");	
								 	
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
			
			
            for ($a=1 ;$a<=2 ;$a++){
				  if( !empty($_POST['DB_LifSort_'.$a]) && !empty($_FILES['DB_LifName_'.$a]['name']) ){		
						//$return=iron_upload("DB_LifName_".$a."", time().$a, "", "../photo", "gif,jpg,jpeg,png", "16677216" );
			            $return = upload_photo( "DB_LifName_".$a."", time().$a, "../photo/", "../photo/small/", "600", "150");						
						
						$UpStr=" `DB_LifTagID`,`DB_LifAlbID`,`DB_LifSort`,`DB_LifContent`,`DB_LifName`,`DB_LifFileName`,`DB_LifMode`,`DB_LifCover`,`DB_AddTime`,`DB_EditUser`";
						$UpStr2=" '$DB_LifTagID','$DB_LifAlbID','".$_POST['DB_LifSort_'.$a]."','".nl2br(ereg_replace("'","\'",$_POST['DB_LifContent_'.$a]))."','".$return['new_file']."','".$return['old_file_name']."','".$_POST['DB_LifMode_'.$a]."','".$_POST['DB_LifCover_'.$a]."',NOW(),'".$_SESSION['ManUser']."'";
						
						mysql_query("insert into `life` (".$UpStr.") values (".$UpStr2.")") or die("新增失敗$a");
						/*//紀錄使用者資訊	
						$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
						$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','生活剪影相片','".$DB_LifContent."','add',NOW()";
						Recording_Add("recording",$UpStr,$UpStr2);*/
						
				   }		
			}
			
			parent_url_msg("新增成功!!","photo_list.php?DB_LifTagID=".$DB_LifTagID."&LifAlbID=".$DB_LifAlbID."");
			
}

?>

<? 
include_once ("top.php");
?>
<!--top_end-->
<script language="javascript">
function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_LifAlbID.value == ""){ErrString = ErrString + "請編輯相簿" + unescape('%0D%0A')}
	if (document.form1.DB_LifSort_1.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_LifName_1.value == ""){ErrString = ErrString + "上傳照片" + unescape('%0D%0A')}
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	return true;
}


function  addupload(){

   var total_upload = document.form1.total_upload.value ;
   total_upload = parseInt(total_upload) + 1;
   if (total_upload > 2) { total_upload = 2; }
   document.form1.total_upload.value = total_upload;
   for(i=1;i<=total_upload;i++){ 
       uploadfile(i,true);
   }
   for(i=total_upload+1;i<=2;i++){ 
       uploadfile(i,false);
   }
   

}

function  decupload(){

   var total_upload = document.form1.total_upload.value ;
   total_upload = parseInt(total_upload) - 1;
   if (total_upload < 1) { total_upload = 1; }
   document.form1.total_upload.value = total_upload;
   for(i=1;i<=total_upload;i++){ 
       uploadfile(i,true);
   }
   for(i=total_upload+1;i<=2;i++){ 
       uploadfile(i,false);
   }
   

}


//新增照片
function  uploadfile(id,show){
switch (id){
	case 1:
	if (show == true){
	   document.getElementById('upload1').style.display = 'block';
	}else{
	   document.getElementById('upload1').style.display = 'none';
	}
	break;
	case 2:
	if (show == true){
	   document.getElementById('upload2').style.display = 'block';
	}else{
	   document.getElementById('upload2').style.display = 'none';
	}
	break;
	case 3:
	if (show == true){
	   document.getElementById('upload3').style.display = 'block';
	}else{
	   document.getElementById('upload3').style.display = 'none';
	}
	break;
	case 4:
	if (show == true){
	   document.getElementById('upload4').style.display = 'block';
	}else{
	   document.getElementById('upload4').style.display = 'none';
	}
	break;
	case 5:
	if (show == true){
	   document.getElementById('upload5').style.display = 'block';
	}else{
	   document.getElementById('upload5').style.display = 'none';
	}
	break;
	case 6:
	if (show == true){
	   document.getElementById('upload6').style.display = 'block';
	}else{
	   document.getElementById('upload6').style.display = 'none';
	}
	break;
	case 7:
	if (show == true){
	   document.getElementById('upload7').style.display = 'block';
	}else{
	   document.getElementById('upload7').style.display = 'none';
	}
	break;
	case 8:
	if (show == true){
	   document.getElementById('upload8').style.display = 'block';
	}else{
	   document.getElementById('upload8').style.display = 'none';
	}
	break;
	case 9:
	if (show == true){
	   document.getElementById('upload9').style.display = 'block';
	}else{
	   document.getElementById('upload9').style.display = 'none';
	}
	break;
	case 10:
	if (show == true){
	   document.getElementById('upload10').style.display = 'block';
	}else{
	   document.getElementById('upload10').style.display = 'none';
	}
	break;
}		
}


function  resubmit(id){
     location.href = "photo_add.php?DB_LifTagID=<? echo $_GET['DB_LifTagID'];?>&LifAlbID="+id;
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 網路相簿 >> <? echo $ary['DB_LifTagSubject'];?> >> <span class="text_12px_02"><strong>新增照片</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網路相簿 - <? echo $ary['DB_LifTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="photo_list.php?DB_LifTagID=<? echo $_GET['DB_LifTagID'];?>" class="button_01">◎回照片列表</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form action="photo_add.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">	  
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
			<td align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			
		  </tr>
		</table>
	
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 簿 名 稱<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <select name="DB_LifAlbID" class="text_12px_01" onChange="resubmit(this.value);">
<?
  //查詢網路相簿資料
  $lifeAl_result = mysql_query("select * from `life_album` where `DB_LifTagID`='".$_GET['DB_LifTagID']."' ORDER BY `DB_LifAlbSort` ASC") or die("查詢失敗la-1");
  $lifeAl_num = mysql_num_rows($lifeAl_result);
  
  for ($a=1 ;$a<=$lifeAl_ary = mysql_fetch_array($lifeAl_result) ;$a++){
   
?> 	
                <option value="<? echo $lifeAl_ary['DB_LifAlbID'];?>" <? if ($_GET['LifAlbID'] == $lifeAl_ary['DB_LifAlbID']){echo "selected";}?>><? echo $lifeAl_ary['DB_LifAlbTitle'];?></option>
<? } ?>
              </select></td>
		  </tr>
		</table>
<? 
  
   for($i=1;$i<=2;$i++){ 
             
?>	
<span id="upload<? echo $i;?>"  style="display:<? if($i!=1){ echo "none";}else{ echo "block";} ?>;">		
		
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td width="36%" align="left" valign="top" class="border_02">
<?
  //查詢網路相簿資料
  $lifeAl2_result = mysql_query("select * from `life_album` where `DB_LifTagID`='".$_GET['DB_LifTagID']."' ORDER BY `DB_LifAlbSort` ASC") or die("查詢失敗la-2");
  $lifeAl2_ary = mysql_fetch_array($lifeAl2_result);
  
   if ($_GET['LifAlbID'] != ""){
      $LifAlbID = "&& `DB_LifAlbID`='".$_GET['LifAlbID']."'";
   }else{
      $LifAlbID = "&& `DB_LifAlbID`='".$lifeAl2_ary['DB_LifAlbID']."'";
   }

  //查詢網路相片資料
  $life_result = mysql_query("select * from `life` where `DB_LifTagID`='".$_GET['DB_LifTagID']."' ".$LifAlbID."") or die("查詢失敗le");
  $life_num = mysql_num_rows($life_result);
   
?>			    
				<input name="DB_LifSort_<? echo $i;?>" value="<? echo $life_num+$i;?>" type="text" class="text_12px_01" size="3"  maxlength="3"/></td>
		    <td width="51%" align="right" valign="top" class="border_02 text_12px_04">
			   <a href="javascript:addupload();" class="button_02">增加</a>&nbsp;
			   <a href="javascript:decupload();" class="button_03">減少</a>			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 照 片 簡 述</td>
			<td colspan="2" align="left" valign="top" class="border_02"><textarea name="DB_LifContent_<? echo $i;?>" cols="100" rows="3" class="text_12px_01" id="DB_LifContent_<? echo $i;?>"></textarea></td>
		  </tr>
		  
		  <!--<tr>
			<td width="13%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 型 式<font color="red">*</font></td>
			<td colspan="2" align="left" valign="top" class="border_02">
			  <input name="DB_LifMode_<? //echo $i;?>" type="radio" value="1" checked="checked" />
			  直式
			  <input name="DB_LifMode_<? //echo $i;?>" type="radio" value="0" />
			  橫式</td>
		  </tr>-->
		  
		  <tr>
		    <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 封 面<font color="red">*</font></td>
		    <td colspan="2" align="left" valign="top" class="border_02">
			<input name="DB_LifCover_<? echo $i;?>" type="radio" value="0" checked="checked"  />
			否
			<input name="DB_LifCover_<? echo $i;?>" type="radio" value="1"  />
			是</td>
		    </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 照 片<font color="red">*</font></td>
			<td colspan="2" align="left" valign="top" class="border_02"><input name="DB_LifName_<? echo $i;?>" type="file" class="text_12px_01" id="DB_LifName_<? echo $i;?>" size="40" />
			<br />(<span class="text_12px_03">建議尺寸為：600 x400 像素</span>，如長或寬超過600像素會自動依比例縮小。)</td>
		  </tr>
		</table>
  </span>					
<? 
    
   } 
?>	
<input  type="hidden" name="total_upload" value="1">
<!--upload end-->
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" class="button_01">新增資料</a></div>
	  <input  type="hidden" name="DB_LifTagID" value="<? echo $_GET['DB_LifTagID'];?>">
	  <!--<input type="hidden" name="page" value="<? //echo $_GET['page'];?>">
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
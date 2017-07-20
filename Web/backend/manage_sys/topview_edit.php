<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_2"); //檢查是否功能權限,否回首頁


$arry=SoloSql("animation","`DB_AniID`='".$_GET['DB_AniID']."'");

$DB_AniPicID_no=$_POST['DB_AniPicID_no'];
$DB_AniID_no=$_POST['DB_AniID_no'];

$DB_AniAnnounce=$_POST['DB_AniAnnounce'];
$DB_AniBasis=$_POST['DB_AniBasis'];
$DB_AniDescription=ereg_replace("'","\'",$_POST['DB_AniDescription']);

if($DB_AniBasis=="1"){
		if(!empty($DB_AniDescription) ){
			if(!empty($_FILES['DB_AniArchive_1']['name'])){
				$return=iron_upload("DB_AniArchive_1", time(), "", "../file", "", "16677216" );
				$UpStr=" `DB_AniAnnounce`='$DB_AniAnnounce',`DB_AniBasis`='$DB_AniBasis',`DB_AniDescription`='$DB_AniDescription',`DB_AniArchive_1`='".$return['new_file']."',`DB_AniName_1`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}else{
				$UpStr=" `DB_AniAnnounce`='$DB_AniAnnounce',`DB_AniBasis`='$DB_AniBasis',`DB_AniDescription`='$DB_AniDescription',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("animation","$DB_AniID_no","DB_AniID","topview_list.php?page=$page","修改成功!!",$UpStr);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','形象動畫管理','".$DB_AniDescription."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_AniBasis=="2"){
		if(!empty($DB_AniDescription) ){
			if(!empty($_FILES['DB_AniArchive_2']['name'])){
				$return=iron_upload("DB_AniArchive_2", time(), "", "../file", "", "16677216" );
				$UpStr=" `DB_AniAnnounce`='$DB_AniAnnounce',`DB_AniBasis`='$DB_AniBasis',`DB_AniDescription`='$DB_AniDescription',`DB_AniArchive_2`='".$return['new_file']."',`DB_AniName_2`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}else{
				$UpStr=" `DB_AniAnnounce`='$DB_AniAnnounce',`DB_AniBasis`='$DB_AniBasis',`DB_AniDescription`='$DB_AniDescription',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("animation","$DB_AniID_no","DB_AniID","topview_list.php?page=$page","修改成功!!",$UpStr);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','形象動畫管理','".$DB_AniDescription."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_AniBasis=="3"){

		if(!empty($DB_AniDescription) ){
			$UpStr=" `DB_AniAnnounce`='$DB_AniAnnounce',`DB_AniBasis`='$DB_AniBasis',`DB_AniDescription`='$DB_AniDescription',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			EditSql("animation","$DB_AniID_no","DB_AniID","topview_list.php?page=$page","修改成功!!",$UpStr);
			
			//$New_ID = mysql_insert_id();//最新一筆資料的no

				//上傳檔案
			for($e=1; $e<=10; $e++ ){
			     if(!empty($_FILES['DB_AniPicArchive_'.$e]['name'])){      
					   //$p=$e+2;
			           $return=iron_upload("DB_AniPicArchive_$e", time()."$e", "", "../file", "", "16677216" );
			           $DB_AniPicArchive[$e] = "'".$return['new_file']."'";
			           $DB_AniPicName[$e] = "'".$return['old_file_name']."'";
					  
			     }		
			}
			//新增上傳檔案
			for ($a8=1 ;$a8<=10 ;$a8++){
			         $FileName = $DB_AniPicArchive[$a8];
					 $Name = $DB_AniPicName[$a8];
				 if ($FileName != ""){			
					  mysql_query("insert into `animation_picture` (`DB_AniID`,`DB_AniPicArchive`,`DB_AniPicName`) values ('$DB_AniID_no',$FileName,$Name)") or die("新增失敗8!!");
				 }
			 }

	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','形象動畫管理','".$DB_AniDescription."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}
?>

<? 
include_once ("top.php");
?>

<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_AniDescription.value == ""){ErrString = ErrString + "形象圖片說明" + unescape('%0D%0A')}
	if(form1.DB_AniBasis.value ==1){
		if (document.form1.DB_AniArchive_1.value == ""){ErrString = ErrString + "上傳動畫" + unescape('%0D%0A')}
	}
	if(form1.DB_AniBasis.value ==2){
		if (document.form1.DB_AniArchive_2.value == ""){ErrString = ErrString + "上傳圖片" + unescape('%0D%0A')}
	}/*else if(form1.DB_AniBasis.value ==3){
		if (document.form1.DB_AniPicArchive_1.value == ""){ErrString = ErrString + "上傳圖片" + unescape('%0D%0A')}
	}*/
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	return true;
}

function Op_1(Chkid){
	if(Chkid==1){
	document.getElementById('OpenDIV_1').style.display = 'block';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	}else if(Chkid==2){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'block';
	document.getElementById('OpenDIV_3').style.display = 'none';
	}else if(Chkid==3){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'block';
	}
}

function  addupload(){

   var total_upload = document.form1.total_upload.value ;
   total_upload = parseInt(total_upload) + 1;
   if (total_upload > 10) { total_upload = 10; }
   document.form1.total_upload.value = total_upload;
   for(i=1;i<=total_upload;i++){ 
       uploadfile(i,true);
   }
   for(i=total_upload+1;i<=10;i++){ 
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
   for(i=total_upload+1;i<=10;i++){ 
       uploadfile(i,false);
   }
   

}

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

//更換文件上傳資料
function change2( num,DB_FileName ){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('file2').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "topview_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}

//更換文件上傳資料
function change3( num,DB_FileName ){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('file3').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "topview_file2_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁風格管理 >> 形象動畫管理 >> <span class="text_12px_02"><strong>修改資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>形象動畫管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="topview_list.php?page=<? echo $_GET['page'];?>" class="button_01">◎回列表頁</a></div></td>
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
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <input name="DB_AniAnnounce" type="radio" value="0" <? if($arry['DB_AniAnnounce']=="0"){echo "checked";}?> />顯示
			  <input name="DB_AniAnnounce" type="radio" value="1" <? if($arry['DB_AniAnnounce']=="1"){echo "checked";}?> />不顯示</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示 方 式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <select name="DB_AniBasis" id="DB_AniBasis" class="text_12px_01" onChange="Op_1(this.value)">
                <option value="1" <? if($arry['DB_AniBasis']=="1"){echo "selected";}?>>FLASH動畫</option>
                <option value="2" <? if($arry['DB_AniBasis']=="2"){echo "selected";}?>>單一張圖片</option>
                <option value="3" <? if($arry['DB_AniBasis']=="3"){echo "selected";}?>>多張圖片輪替</option>
              </select></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 形象圖片說明<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_AniDescription" value="<? echo $arry['DB_AniDescription'];?>" type="text" class="text_12px_01" size="80" /></td>
		  </tr>
		</table>
			<span id="OpenDIV_1" style="display:<? if($arry['DB_AniBasis']=="1"){echo "block";}else{echo "none";}?>">		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 動 畫<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
	<span id="file1">
	<?
	if(!empty($arry['DB_AniArchive_1']) && !empty($arry['DB_AniName_1'])){
	?>
	<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_AniName_1']);?>&DB_FileName=<? echo $arry['DB_AniArchive_1'];?>"><? echo $arry['DB_AniName_1'];?></a> <a href="javascript:change1(<? echo $arry['DB_AniID'];?>,'DB_AniArchive_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
	<? 
	}elseif(empty($arry['DB_AniArchive_1']) && empty($arry['DB_AniName_1'])){
	?>
	<input name="DB_AniArchive_1" type="file" id="DB_AniArchive_1" class="text_12px_01"/>
	<? }?>
	</span>
				
				(動畫會依比例自動縮到 寬 705PX 高170px)
				</td>
		      </tr>
			  
		  	</table>
			</span>
			<span id="OpenDIV_2" style="display:<? if($arry['DB_AniBasis']=="2"){echo "block";}else{echo "none";}?>">  		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
	<span id="file2">
	<?
	if(!empty($arry['DB_AniArchive_2']) && !empty($arry['DB_AniName_2'])){
	?>
	<a href="../file/<? echo $arry['DB_AniArchive_2'];?>" target="_blank"><? echo $arry['DB_AniName_2'];?></a> <a href="javascript:change2(<? echo $arry['DB_AniID'];?>,'DB_AniArchive_2');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
	<? 
	}elseif(empty($arry['DB_AniArchive_2']) && empty($arry['DB_AniName_2'])){
	?>
	<input name="DB_AniArchive_2" type="file" id="DB_AniArchive_2" class="text_12px_01" />
	<? }?>
	</span>
				
				(圖片會依比例自動縮到 寬 705PX 高170px)
				</td>
		      </tr>
			</table>
			</span>
			<span id="OpenDIV_3" style="display:<? if($arry['DB_AniBasis']=="3"){echo "block";}else{echo "none";}?>">   		
   <table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
      <tr>
			      <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片<font color="red">*</font></td>
			      <td width="85%" align="left" valign="top" class="border_02">
		  	<span id="file3">
			<? 
			   $animation_picture_result = mysql_query("select * from `animation_picture` where `DB_AniID`='".$arry['DB_AniID']."' ORDER BY `DB_AniPicID` ASC");
			   for($i=1;$i<=$animation_picture_ary = mysql_fetch_array($animation_picture_result);$i++){ 
			?>	
					  
				 &nbsp;&nbsp;<a href="../file/<? echo $animation_picture_ary['DB_AniPicArchive'];?>" target="_blank"><? echo $animation_picture_ary['DB_AniPicName'];?></a>
				             <a href="javascript:change3(<? echo $animation_picture_ary['DB_AniPicID'];?>,<? echo $arry['DB_AniID'];?>);">
		                     <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a><br />
			<? } ?>				
			</span>            
			<? for($j=1;$j<=10;$j++){ ?>		
              <span id="upload<? echo $j;?>"  style="display:<? if($j!=1){ echo "none";}else{ echo "block";} ?>;">   		
			  <table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
                <tr>
			      
			      <td align="left" valign="top" class="border_02">
				  <input name="DB_AniPicArchive_<? echo $j;?>" type="file" id="DB_AniPicArchive_<? echo $j;?>" />&nbsp;<a href="javascript:addupload();" class="button_02">增加</a><a href="javascript:decupload();" class="button_03">減少</a>(圖片會依比例自動縮到 寬 705PX 高170px)</td>
			    </tr>
			  </table>
			  </span>
			<? }?>	<input  type="hidden" name="total_upload" value="1">
         </td>
      </tr>
   </table>			
			
			</span>
		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a></div>
	  <input  type="hidden" name="DB_AniID_no" value="<? echo $_GET['DB_AniID'];?>">
	  <input  type="hidden" name="DB_AniPicID_no" value="<? echo $arry['DB_AniPicID'];?>">
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
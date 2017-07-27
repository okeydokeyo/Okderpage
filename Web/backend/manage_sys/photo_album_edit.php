<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁


if ( !empty($_POST['DB_LifAlbSort_1']) || !empty($_POST['DB_LifAlbID_1']) ){
			
			for ($b=1 ;$b<=10 ;$b++){
			    if ( !empty($_POST['DB_LifAlbSort_'.$b]) && !empty($_POST['DB_LifAlbTitle_'.$b]) ){
							    
					$DB_LifAlbTitle = htmlspecialchars(ereg_replace("'","\'",$_POST['DB_LifAlbTitle_'.$b]));
					
					/*//紀錄使用者資訊	
			        $UpStr = "`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			        $UpStr2 = "'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-類別編輯','".$DB_LifAlbTitle."','add',NOW()";
			        Recording_Add("recording",$UpStr,$UpStr2);*/
					
			        //新增
					mysql_query("insert into `life_album` (`DB_LifTagID`,`DB_LifAlbSort`,`DB_LifAlbTitle`,`DB_LifExp`,`DB_LifAlbAnnounce`,`DB_AddTime`,`DB_EditUser`) values ('".$_POST['DB_LifTagID']."','".$_POST['DB_LifAlbSort_'.$b]."','$DB_LifAlbTitle','".$_POST['DB_LifExp_'.$b]."','".$_POST['DB_LifAlbAnnounce_'.$b]."',NOW(),'".$_SESSION['ManUser']."')") or die("新增失敗");
			    
				}
			}
			
			//修改
            if ( $_POST['DB_LifAlbID_1'] != "" ){	
						     
				 for ($c=1 ;$c<$_POST['ckall'] ;$c++){
			          if ( !empty($_POST['DB_LifAlbID_'.$c]) ){
				
				           $DB_LifAlbTitle = htmlspecialchars(ereg_replace("'","\'",$_POST['LifAlbTitle_'.$c]));
			               
						   /*//紀錄使用者資訊	
			               $UpStr = "`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			               $UpStr2 = "'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-類別編輯','".$DB_LifAlbTitle."','edit',NOW()";
			               Recording_Add("recording",$UpStr,$UpStr2);*/
						   
						   //修改
					       mysql_query("update `life_album` set `DB_LifAlbSort`='".$_POST['LifAlbSort_'.$c]."',`DB_LifAlbTitle`='$DB_LifAlbTitle',`DB_LifExp`='".$_POST['LifExp_'.$c]."',`DB_LifAlbAnnounce`='".$_POST['LifAlbAnnounce_'.$c]."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."' where `DB_LifAlbID`='".$_POST['DB_LifAlbID_'.$c]."'") or die("修改失敗");
			    
				       }
			      }
            }
			
            parent_url_msg("修改成功!!","photo_album_edit.php?DB_LifTagID=".$_POST['DB_LifTagID']."");
}

?>

<? 
include_once ("top.php");
?>
<script language="javascript">

//新增單位
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



//選擇是否刪除
function  Delete(id,Language){
   if ( confirm("是否刪除此筆紀錄") ){
       location.href='photo_album_del.php?ckdel=YES&DB_LifAlbID='+id;
   }
}
</script>
<?
//網路相簿標籤管理查詢
$DB_LifTagID = $_GET['DB_LifTagID'];
$ary = SoloSql("life_tags","`DB_LifTagID`='$DB_LifTagID'");
?>
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 網路相簿 >> <? echo $ary['DB_LifTagSubject'];?> >> <span class="text_12px_02"><strong>修改相簿資料</strong></span></td>
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
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="photo_list.php?DB_LifTagID=<? echo $_GET['DB_LifTagID'];?>" class="button_01">◎回相片列表</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form name="form1" action="photo_album_edit.php" method="POST" target="FormFrame">	  
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top" class="text_12px_01">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc">
		  <tr bgcolor="#f1f1f1">
			<td width="10%" align="center">排序</td>
			<td width="75%" align="center">相簿名稱</td>
			<td width="15%" align="center">功能</td>
		  </tr>
<?
  //查詢網路相簿資料
  $lifeAl_result = mysql_query("select * from `life_album` where `DB_LifTagID`='".$_GET['DB_LifTagID']."' ORDER BY `DB_LifAlbSort` ASC") or die("查詢失敗");
  $lifeAl_num = mysql_num_rows($lifeAl_result);
  for ($a=1 ;$a<=$lifeAl_ary = mysql_fetch_array($lifeAl_result) ;$a++){
   
?>  		  
		  <tr bgcolor="#ffffff">
			<td align="center">
			<input name="LifAlbSort_<? echo $a;?>" value="<? echo $lifeAl_ary['DB_LifAlbSort'];?>" type="text" class="text_12px_01" size="2" maxlength="3" />
			<input type="hidden" name="DB_LifAlbID_<? echo $a;?>" value="<? echo $lifeAl_ary['DB_LifAlbID'];?>"/>
			</td>
			<td align="left">
			相簿名稱：<input name="LifAlbTitle_<? echo $a;?>" value="<? echo $lifeAl_ary['DB_LifAlbTitle'];?>"  type="text" class="text_12px_01" size="40" />
			  <input name="LifAlbAnnounce_<? echo $a;?>" type="radio" value="0" <? if ($lifeAl_ary['DB_LifAlbAnnounce'] == "0"){echo "checked";}?>/>顯示
			  <input name="LifAlbAnnounce_<? echo $a;?>" type="radio" value="1" <? if ($lifeAl_ary['DB_LifAlbAnnounce'] == "1"){echo "checked";}?>/>不顯示<br>
			相簿簡述：<textarea name="LifExp_<? echo $a;?>" cols="80" rows="3" class="text_12px_01"><? echo $lifeAl_ary['DB_LifExp'];?></textarea></td>
			<td align="center"><a href="javascript:Delete(<? echo $lifeAl_ary['DB_LifAlbID'];?>)" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
		  </tr>
<? } ?>		  
		  
		</table>
<input type="hidden" name="DB_LifTagID" value="<? echo $_GET['DB_LifTagID'];?>"/>		
<input type="hidden" name="ckall" value="<? echo $a;?>"/>		
<? 
  
   for($i=1;$i<=10;$i++){ 
             
?>	
<span id="upload<? echo $i;?>"  style="display:<? if($i!=1){ echo "none";}else{ echo "block";} ?>;">		
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc" style=" margin-top:10px;">
		<tr bgcolor="#ffffff">
			<td width="10%" align="center"><input name="DB_LifAlbSort_<? echo $i;?>" value="<? if ($lifeAl_num == "0"){echo $i;}else{echo $lifeAl_num+$i;}?>" type="text" class="text_12px_01" size="2" maxlength="3" /></td>
			<td width="75%" align="left">
			相簿名稱：<input name="DB_LifAlbTitle_<? echo $i;?>" value="" type="text" class="text_12px_01" size="40" />
			  <input name="DB_LifAlbAnnounce_<? echo $i;?>" type="radio" value="0" checked="checked" />顯示
			  <input name="DB_LifAlbAnnounce_<? echo $i;?>" type="radio" value="1" />不顯示<br>
			相簿簡述：<textarea name="DB_LifExp_<? echo $i;?>" cols="80" rows="3" class="text_12px_01"></textarea></td>
			<td width="15%" align="center">
			  <a href="javascript:addupload();" class="button_02">增加</a>&nbsp;
			  <a href="javascript:decupload();" class="button_03">減少</a>
			</td>
		  </tr>
		</table>
  </span>					
<? 
    
   } 
?>	
<input  type="hidden" name="total_upload" value="1">		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" class="button_01">修改資料</a></div>
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
<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁

$DB_DowTagID=$_GET['DB_DowTagID'];
$arry=SoloSql("download_tags"," `DB_DowTagID`='$DB_DowTagID'");


if ( !empty($_POST['DB_DowUnitSort_1']) || !empty($_POST['DB_DowUnitID_1']) ){
			
			for ($b=1 ;$b<=10 ;$b++){
			    if ( !empty($_POST['DB_DowUnitSort_'.$b]) && !empty($_POST['DB_DowUnitName_'.$b]) ){
							    
					$DB_DowUnitName = htmlspecialchars(ereg_replace("'","\'",$_POST['DB_DowUnitName_'.$b]));
					
					/*//紀錄使用者資訊	
			        $UpStr = "`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			        $UpStr2 = "'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-類別編輯','".$DB_DowUnitName."','add',NOW()";
			        Recording_Add("recording",$UpStr,$UpStr2);*/
					
			        //新增
					mysql_query("insert into `download_unit` (`DB_DowTagID`,`DB_DowUnitSort`,`DB_DowUnitName`,`DB_AddTime`,`DB_EditUser`) values ('".$_POST['DB_DowTagID_no']."','".$_POST['DB_DowUnitSort_'.$b]."','$DB_DowUnitName',NOW(),'".$_SESSION['ManUser']."')") or die("新增失敗");
			    
				}
			}
			
			//修改
            if ( $_POST['DB_DowUnitID_1'] != "" ){	
						     
				 for ($c=1 ;$c<$_POST['ckall'] ;$c++){
			          if ( !empty($_POST['DB_DowUnitID_'.$c]) ){
				
				           $DB_DowUnitName = htmlspecialchars(ereg_replace("'","\'",$_POST['DowUnitName_'.$c]));
			               
						   /*//紀錄使用者資訊	
			               $UpStr = "`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			               $UpStr2 = "'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-類別編輯','".$DB_DowUnitName."','edit',NOW()";
			               Recording_Add("recording",$UpStr,$UpStr2);*/
						   
						   //修改
					       mysql_query("update `download_unit` set `DB_DowUnitSort`='".$_POST['DowUnitSort_'.$c]."',`DB_DowUnitName`='$DB_DowUnitName',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."' where `DB_DowUnitID`='".$_POST['DB_DowUnitID_'.$c]."'") or die("修改失敗");
			    
				       }
			      }
            }
			
            parent_url_msg("修改成功!!","download_type_edit.php?DB_DowTagID=".$_POST['DB_DowTagID_no']."");
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
       location.href='download_type_del.php?ckdel=YES&DB_DowUnitID='+id;
   }
}
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 檔案下載 >> <? echo $arry['DB_DowTagSubject'];?> >> <span class="text_12px_02"><strong>編輯類別</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>檔案下載 - <? echo $arry['DB_DowTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		  <a href="download_list.php?DB_DowTagID=<? echo $DB_DowTagID;?>" class="button_04">◎回上層列表</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form name="form1" action="download_type_edit.php" method="POST" target="FormFrame">	  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top" class="text_12px_01">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc">
		  <tr bgcolor="#f1f1f1">
			<td width="10%" align="center">排序</td>
			<td width="75%" align="center">類別</td>
			<td width="15%" align="center">功能</td>
		  </tr>
<?
  //查詢檔案下載類別資料
  $downUn_result = mysql_query("select * from `download_unit` where `DB_DowTagID`='".$_GET['DB_DowTagID']."' ORDER BY `DB_DowUnitSort` ASC") or die("查詢失敗");
  $downUn_num = mysql_num_rows($downUn_result);
  for ($a=1 ;$a<=$downUn_ary = mysql_fetch_array($downUn_result) ;$a++){
   
?>  		  
		  <tr bgcolor="#ffffff">
			<td align="center">
			<input name="DowUnitSort_<? echo $a;?>" type="text" class="text_12px_01" value="<? echo $downUn_ary['DB_DowUnitSort'];?>" size="2" maxlength="3" />
			<input type="hidden" name="DB_DowUnitID_<? echo $a;?>" value="<? echo $downUn_ary['DB_DowUnitID'];?>"/>
			</td>
			<td align="left"><input name="DowUnitName_<? echo $a;?>" type="text" class="text_12px_01" value="<? echo $downUn_ary['DB_DowUnitName'];?>" size="40" /></td>
			<td align="center"><a href="javascript:Delete(<? echo $downUn_ary['DB_DowUnitID'];?>)" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
		  </tr>
<? } ?>		  
		</table>
<input type="hidden" name="ckall" value="<? echo $a;?>"/>		
<? 
  
   for($i=1;$i<=10;$i++){ 
             
?>	
<span id="upload<? echo $i;?>"  style="display:<? if($i!=1){ echo "none";}else{ echo "block";} ?>;">		
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc" style=" margin-top:10px;">
		<tr bgcolor="#ffffff">
			<td width="10%" align="center"><input name="DB_DowUnitSort_<? echo $i;?>" type="text" class="text_12px_01" value="<? if ($downUn_num == "0"){echo $i;}else{echo $downUn_num+$i;}?>" size="2" maxlength="3" /></td>
			<td width="75%" align="left"><input name="DB_DowUnitName_<? echo $i;?>" type="text" class="text_12px_01" value="" size="40" /></td>
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
<input  type="hidden" name="DB_DowTagID_no" value="<? echo $DB_DowTagID;?>">
<input  type="hidden" name="total_upload" value="1">
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" class="button_01">修改資料</a></div>
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
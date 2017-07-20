<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_14"); //檢查是否功能權限,否回首頁


if ( !empty($_POST['DB_WebTagSort_1']) || !empty($_POST['DB_WebTagSubject_1']) ){
			
			for ($b=1 ;$b<=10 ;$b++){
			    if ( !empty($_POST['DB_WebTagSort_'.$b]) && !empty($_POST['DB_WebTagSubject_'.$b]) ){
							    
					$DB_WebTagSubject = htmlspecialchars(ereg_replace("'","\'",$_POST['DB_WebTagSubject_'.$b]));
					
					/*//紀錄使用者資訊	
			        $UpStr = "`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			        $UpStr2 = "'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-類別編輯','".$DB_WebTagSubject."','add',NOW()";
			        Recording_Add("recording",$UpStr,$UpStr2);*/
					
			        //新增
					mysql_query("insert into `website_tags` (`DB_WebTagSort`,`DB_WebTagSubject`,`DB_AddTime`,`DB_EditUser`) values ('".$_POST['DB_WebTagSort_'.$b]."','$DB_WebTagSubject',NOW(),'".$_SESSION['ManUser']."')") or die("新增失敗");
			    
				}
			}
			
			//修改
            if ( $_POST['WebTagID_1'] != "" ){	
						     
				 for ($c=1 ;$c<$_POST['ckall'] ;$c++){
			          if ( !empty($_POST['WebTagID_'.$c]) ){
				
				           $WebTagSubject = htmlspecialchars(ereg_replace("'","\'",$_POST['WebTagSubject_'.$c]));
			               
						   /*//紀錄使用者資訊	
			               $UpStr = "`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			               $UpStr2 = "'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-類別編輯','".$DB_DowUnitName."','edit',NOW()";
			               Recording_Add("recording",$UpStr,$UpStr2);*/
						   
						   //修改
					       mysql_query("update `website_tags` set `DB_WebTagSort`='".$_POST['WebTagSort_'.$c]."',`DB_WebTagSubject`='$WebTagSubject',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."' where `DB_WebTagID`='".$_POST['WebTagID_'.$c]."'") or die("修改失敗");
			    
				       }
			      }
            }
			
            parent_url_msg("修改成功!!","links2_type_edit.php");
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
function  Delete(id){
   if ( confirm("是否刪除此筆紀錄") ){
       location.href='links2_type_del.php?ckdel=YES&DB_WebTagID='+id;
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 網站連結 >> <span class="text_12px_02"><strong>編輯類別</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網站連結 - 編輯類別</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		  <a href="links2_list.php" class="button_04">◎回連結列表</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form name="form1" action="links2_type_edit.php" method="POST" target="FormFrame">	  
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
  //查詢網站連結類別資料
  $website_tags_result = mysql_query("select * from `website_tags` where 1 ORDER BY `DB_WebTagSort` ASC") or die("查詢失敗");
  $website_tags_num = mysql_num_rows($website_tags_result);
  for ($a=1 ;$a<=$website_tags_ary = mysql_fetch_array($website_tags_result) ;$a++){
   
?>  		  
		  <tr bgcolor="#ffffff">
			<td align="center">
			<input name="WebTagSort_<? echo $a;?>" type="text" class="text_12px_01" value="<? echo $website_tags_ary['DB_WebTagSort'];?>" size="2" maxlength="3" />
			<input type="hidden" name="WebTagID_<? echo $a;?>" value="<? echo $website_tags_ary['DB_WebTagID'];?>"/>
			</td>
			<td align="left"><input name="WebTagSubject_<? echo $a;?>" type="text" class="text_12px_01" value="<? echo $website_tags_ary['DB_WebTagSubject'];?>" size="40" /></td>
			<td align="center"><a href="javascript:Delete(<? echo $website_tags_ary['DB_WebTagID'];?>)" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
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
			<td width="10%" align="center"><input name="DB_WebTagSort_<? echo $i;?>" type="text" class="text_12px_01" value="<? if ($website_tags_num == "0"){echo $i;}else{echo $website_tags_num+$i;}?>" size="2" maxlength="3" /></td>
			<td width="75%" align="left"><input name="DB_WebTagSubject_<? echo $i;?>" type="text" class="text_12px_01" value="" size="40" /></td>
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
</form>	  <tr>
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
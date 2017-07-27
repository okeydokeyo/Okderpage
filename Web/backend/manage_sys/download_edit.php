<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁

$DB_DowTagID=$_GET['DB_DowTagID'];
$arry=SoloSql("download_tags"," `DB_DowTagID`='$DB_DowTagID'");
$DB_DowID=$_GET['DB_DowID'];
$arry1 = SoloSql("download","`DB_DowID`='$DB_DowID'");

$DB_DowID_no=$_POST['DB_DowID_no'];
$page_no=$_POST['page_no'];
$DB_DowTagID_no=$_POST['DB_DowTagID_no'];
$DB_DowUnitID = $_POST['DB_DowUnitID'];
$DB_DowSort = $_POST['DB_DowSort'];
$DB_DowTime=$_POST['DB_DowTime'];
$DB_DowAnnounce=$_POST['DB_DowAnnounce'];
$DB_DowSubject = ereg_replace("'","\'",$_POST['DB_DowSubject']);

if ( !empty($DB_DowSubject) && !empty($DB_DowSort) ){
			
				   if(!empty($_FILES['DB_DowName']['name'])){
					        $return=iron_upload("DB_DowName", time(), "", "../file", "", "16677216" );
					        $DB_DowFileName = "`DB_DowFileName`='".$return['new_file']."',";
					        $DB_DowName = "`DB_DowName`='".$return['old_file_name']."',";
					}

		            //更新排序
		            //ChangeSortEdit("download",$DB_DowSort,"DB_DowSort",$DowSort," && `DB_DowUnitID`='$DB_DowUnitID'");
					
					$UpStr = "`DB_DowUnitID`='$DB_DowUnitID',`DB_DowSort`='$DB_DowSort',`DB_DowTime`='$DB_DowTime',`DB_DowAnnounce`='$DB_DowAnnounce',`DB_DowSubject`='$DB_DowSubject',$DB_DowName $DB_DowFileName `DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
                    mysql_query("update `download` set ".$UpStr." where `DB_DowID`='$DB_DowID_no'") or die("修改失敗1!!");
					
					$row2 = SoloSql('download_unit',"`DB_DowUnitID` = '".$DB_DowUnitID."'");
					
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-".$row2['DB_DowUnitName']."','".$DB_DowSubject."','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
					
					parent_url_msg("修改成功!!","download_list.php?DB_DowTagID=".$DB_DowTagID_no."&page=$page_no");
			

				
}

?>
<? 
include_once ("top.php");
?>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
<!--
function checklat(){
	var ErrString = "" ;
	if(document.form1.DB_DowUnitID.value == ""){ErrString = ErrString + "類 別" + unescape('%0D%0A')}
	if(document.form1.DB_DowSort.value == ""){ErrString = ErrString + "排 序" + unescape('%0D%0A')}
	if(document.form1.DB_DowSubject.value == ""){ErrString = ErrString + "檔 案 名 稱" + unescape('%0D%0A')}
	if(document.form1.DB_DowName.value == ""){ErrString = ErrString + "檔 案 上 傳" + unescape('%0D%0A')}
	
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	

	return true;
}

//更換檔案資料
function change_file1( num,DB_FileName ){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('file_show1').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "download_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}

//萬年歷
function calendar(x){
	var d = window.open("calendar.php?items="+x,"calendar",'height=230,width=400,top=300,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');
	d.focus();
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 檔案下載 >> <? echo $arry['DB_DowTagSubject'];?> >> <span class="text_12px_02"><strong>修改資料</strong></span></td>
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
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="download_list.php?DB_DowTagID=<? echo $DB_DowTagID;?>" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="download_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">	  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 類 別<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			<select id="DB_DowUnitID" name="DB_DowUnitID" class="text_12px_01">
			<?
			//查詢檔案下載類別資料
			$dowun_result = mysql_query("select * from `download_unit` where `DB_DowTagID`='$DB_DowTagID' ORDER BY `DB_DowUnitSort` ASC") or die("查詢失敗");
			for ($a=1 ;$a<=$dowun_ary = mysql_fetch_array($dowun_result) ;$a++){
			?>			
			<option value="<? echo $dowun_ary['DB_DowUnitID'];?>" <? if ($arry1['DB_DowUnitID'] == $dowun_ary['DB_DowUnitID']){echo "selected";}?>><? echo $dowun_ary['DB_DowUnitName'];?></option>
			<? } ?>		
			</select>
              </td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_DowSort"  type="text" class="text_12px_01" id="DB_DowSort"  size="3" value="<? echo $arry1['DB_DowSort'];?>" /></td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 發 佈 時 間<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_DowTime"  type="text" class="text_12px_01" id="DB_DowTime" maxlength="12" value="<? echo $arry1['DB_DowTime'];?>" readonly /> 
			<a href="javascript:calendar('DB_DowTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			  <input name="DB_DowAnnounce" type="radio" value="0" <? if($arry1['DB_DowAnnounce']=="0"){echo "checked";}?> />顯示
			  <input name="DB_DowAnnounce" type="radio" value="1" <? if($arry1['DB_DowAnnounce']=="1"){echo "checked";}?> />
			  不顯示</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 檔 案 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_DowSubject"  type="text" class="text_12px_01" id="DB_DowSubject" value="<? echo $arry1['DB_DowSubject'];?>" size="50" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 檔 案 上 傳<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			<span id="file_show1">		    
			<? if ($arry1['DB_DowName'] != "" && $arry1['DB_DowFileName'] != ""){?> 			     
			                 <a href="download.php?DB_FileTitle=<? echo $arry1['DB_DowName'];?>&DB_FileName=<? echo $arry1['DB_DowFileName'];?>"><? echo $arry1['DB_DowName'];?></a> 
							 <a href="javascript:change_file1(<? echo $arry1['DB_DowID'];?>,'DB_DowFileName');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? }else{?>			    
				   <input name="DB_DowName" type="file" class="text_12px_01" size="40" />
			<? } ?>	
	     </span>	
			</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" title="修改資料" class="button_01">修改資料</a></div>
		<input  type="hidden" name="DB_DowTagID_no" value="<? echo $DB_DowTagID;?>">
		<input  type="hidden" name="page_no" value="<? echo $_GET['page'];?>">
		<input  type="hidden" name="DB_DowID_no" value="<? echo $_GET['DB_DowID'];?>">
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
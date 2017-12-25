<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_8"); //檢查是否功能權限,否回首頁

$DB_OrdTagID=$_GET['DB_OrdTagID'];
$arry1=SoloSql("ordi_tags"," `DB_OrdTagID`='$DB_OrdTagID'");

$DB_OrdTagSubject_no=$_POST['DB_OrdTagSubject_no'];
$DB_OrdTagID_no=$_POST['DB_OrdTagID_no'];
$DB_OrdNewTime=$_POST['DB_OrdNewTime'];
$DB_OrdTime=$_POST['DB_OrdTime'];
$DB_OrdStart_Time=$_POST['DB_OrdStart_Time'];
$DB_OrdEnd_Time=$_POST['DB_OrdEnd_Time'];
$DB_OrdPermanent=$_POST['DB_OrdPermanent'];
$DB_OrdBasis=$_POST['DB_OrdBasis'];
$DB_OrdSubject = ereg_replace("'","\'",$_POST['DB_OrdSubject']);
$DB_OrdAnnounce=$_POST['DB_OrdAnnounce'];

if($DB_OrdBasis=="1"){
		$DB_OrdContent=change_size(ereg_replace("'","\'",$_POST['DB_OrdContent']));

		$DB_OrdYou_1=$_POST['DB_OrdYou_1'];
		$DB_OrdYouLocation_1=$_POST['DB_OrdYouLocation_1'];
		$DB_OrdYou_2=$_POST['DB_OrdYou_2'];
		$DB_OrdYouLocation_2=$_POST['DB_OrdYouLocation_2'];
		$DB_OrdYou_3=$_POST['DB_OrdYou_3'];
		$DB_OrdYouLocation_3=$_POST['DB_OrdYouLocation_3'];

		$DB_OrdFileName_1=$_POST['DB_OrdFileName_1'];
		$DB_OrdFileName_2=$_POST['DB_OrdFileName_2'];
		$DB_OrdFileName_3=$_POST['DB_OrdFileName_3'];
		$DB_OrdLocation_1=$_POST['DB_OrdLocation_1'];
		$DB_OrdLocation_2=$_POST['DB_OrdLocation_2'];
		$DB_OrdLocation_3=$_POST['DB_OrdLocation_3'];				
		$DB_OrdUrl_1=$_POST['DB_OrdUrl_1'];
		$DB_OrdUrlName_1=ereg_replace("'","\'",$_POST['DB_OrdUrlName_1']);
		$DB_OrdUrl_2=$_POST['DB_OrdUrl_2'];
		$DB_OrdUrlName_2=ereg_replace("'","\'",$_POST['DB_OrdUrlName_2']);
		$DB_OrdUrl_3=$_POST['DB_OrdUrl_3'];
		$DB_OrdUrlName_3=ereg_replace("'","\'",$_POST['DB_OrdUrlName_3']);
    
		if(!empty($DB_OrdTime) && !empty($DB_OrdSubject) ){
			for($i=1; $i<=3; $i++ ){
			$return=iron_upload("DB_OrdImg_$i", time()."$i", "", "../file", "gif,jpg,jpeg,png", "16677216" );
			$DB_OrdImg.= " '".$return['new_file']."',";
			$DB_OrdFileName.= " '".$return['old_file_name']."',";
			}
			for($e=1; $e<=3; $e++ ){
			$p=$e+3;
			$return=iron_upload("DB_OrdArchive_$e", time()."$p", "", "../file", "", "16677216" );
			$DB_OrdArchive.= " '".$return['new_file']."',";
			$DB_OrdName.= " '".$return['old_file_name']."',";
			}
			$UpStr=" `DB_OrdTagID`,`DB_OrdNewTime`,`DB_OrdTime`,`DB_OrdStart_Time`,`DB_OrdEnd_Time`,`DB_OrdPermanent`,`DB_OrdBasis`,`DB_OrdSubject`,`DB_OrdContent`,`DB_OrdYou_1`,`DB_OrdYou_2`,`DB_OrdYou_3`,`DB_OrdYouLocation_1`,`DB_OrdYouLocation_2`,`DB_OrdYouLocation_3`,`DB_OrdImg_1`,`DB_OrdImg_2`,`DB_OrdImg_3`,`DB_OrdFileName_1`,`DB_OrdFileName_2`,`DB_OrdFileName_3`,`DB_OrdLocation_1`,`DB_OrdLocation_2`,`DB_OrdLocation_3`,`DB_OrdUrl_1`,`DB_OrdUrlName_1`,`DB_OrdUrl_2`,`DB_OrdUrlName_2`,`DB_OrdUrl_3`,`DB_OrdUrlName_3`,`DB_OrdArchive_1`,`DB_OrdArchive_2`,`DB_OrdArchive_3`,`DB_OrdName_1`,`DB_OrdName_2`,`DB_OrdName_3`,`DB_OrdAnnounce`,`DB_AddTime`,`DB_EditUser`";
			$UpStr2=" '$DB_OrdTagID_no','$DB_OrdNewTime','$DB_OrdTime','$DB_OrdStart_Time','$DB_OrdEnd_Time','$DB_OrdPermanent','$DB_OrdBasis','$DB_OrdSubject','$DB_OrdContent','$DB_OrdYou_1','$DB_OrdYou_2','$DB_OrdYou_3','$DB_OrdYouLocation_1','$DB_OrdYouLocation_2','$DB_OrdYouLocation_3',$DB_OrdImg $DB_OrdFileName '$DB_OrdLocation_1','$DB_OrdLocation_2','$DB_OrdLocation_3','$DB_OrdUrl_1','$DB_OrdUrlName_1','$DB_OrdUrl_2','$DB_OrdUrlName_2','$DB_OrdUrl_3','$DB_OrdUrlName_3', $DB_OrdArchive $DB_OrdName '$DB_OrdAnnounce',NOW(),'".$_SESSION['ManUser']."'";
			AddSql("ordi","sections_list.php?DB_OrdTagID=$DB_OrdTagID_no","新增成功!!",$UpStr,$UpStr2);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','條列式訊息管理-".$DB_OrdTagSubject_no."','".$DB_OrdSubject."','add',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}

elseif($DB_OrdBasis=="2"){
		$return=iron_upload("DB_OrdArchive2_1", time(), "", "../file", "", "16677216" );
		if(!empty($DB_OrdTime) && !empty($DB_OrdSubject) ){
			$UpStr=" `DB_OrdTagID`,`DB_OrdTime`,`DB_OrdStart_Time`,`DB_OrdEnd_Time`,`DB_OrdBasis`,`DB_OrdSubject`,`DB_OrdArchive2_1`,`DB_OrdName2_1`,`DB_OrdAnnounce`,`DB_AddTime`,`DB_EditUser`";
			$UpStr2=" '$DB_OrdTagID_no','$DB_OrdTime','$DB_OrdStart_Time','$DB_OrdEnd_Time','$DB_OrdBasis','$DB_OrdSubject','".$return['new_file']."','".$return['old_file_name']."','$DB_OrdAnnounce',NOW(),'".$_SESSION['ManUser']."'";
			AddSql("ordi","sections_list.php?DB_OrdTagID=$DB_OrdTagID_no","新增成功!!",$UpStr,$UpStr2);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','條列式訊息管理-".$DB_OrdTagSubject_no."','".$DB_OrdSubject."','add',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}

elseif($DB_OrdBasis=="3"){
		$DB_OrdUrl3_1=$_POST['DB_OrdUrl3_1'];
		if(!empty($DB_OrdTime) && !empty($DB_OrdSubject) ){
			$UpStr=" `DB_OrdTagID`,`DB_OrdTime`,`DB_OrdStart_Time`,`DB_OrdEnd_Time`,`DB_OrdBasis`,`DB_OrdSubject`,`DB_OrdUrl3_1`,`DB_OrdAnnounce`,`DB_AddTime`,`DB_EditUser`";
			$UpStr2=" '$DB_OrdTagID_no','$DB_OrdTime','$DB_OrdStart_Time','$DB_OrdEnd_Time','$DB_OrdBasis','$DB_OrdSubject','$DB_OrdUrl3_1','$DB_OrdAnnounce',NOW(),'".$_SESSION['ManUser']."'";
			AddSql("ordi","sections_list.php?DB_OrdTagID=$DB_OrdTagID_no","新增成功!!",$UpStr,$UpStr2);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','條列式訊息管理-".$DB_OrdTagSubject_no."','".$DB_OrdSubject."','add',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}



?>
<? 
include_once ("top.php");
?>
<script language="javascript">
function checklat(){
	var ErrString = "" ;
	if (document.form1.DB_OrdTime.value == ""){ErrString = ErrString + "發佈日期" + unescape('%0D%0A')}
	if (document.form1.DB_OrdPermanent.checked == false){
	      if (document.form1.DB_OrdStart_Time.value == ""){ErrString = ErrString + "上線開始時間" + unescape('%0D%0A')}
	      if (document.form1.DB_OrdEnd_Time.value == ""){ErrString = ErrString + "下線結束時間" + unescape('%0D%0A')}
	}
	if (document.form1.DB_OrdSubject.value == ""){ErrString = ErrString + "標題" + unescape('%0D%0A')}

	if(document.form1.DB_OrdUrl_1.value != "" && document.form1.DB_OrdUrl_1.value != "http://"){
		if(document.form1.DB_OrdUrlName_1.value == ""){ErrString = ErrString + "網址名稱01" + unescape('%0D%0A')}
	}

	if(document.form1.DB_OrdUrl_2.value != "" && document.form1.DB_OrdUrl_2.value != "http://"){
		if(document.form1.DB_OrdUrlName_2.value == ""){ErrString = ErrString + "網址名稱02" + unescape('%0D%0A')}
	}

	if(document.form1.DB_OrdUrl_3.value != "" && document.form1.DB_OrdUrl_3.value != "http://"){
		if(document.form1.DB_OrdUrlName_3.value == ""){ErrString = ErrString + "網址名稱03" + unescape('%0D%0A')}
	}

	if(form1.DB_OrdBasis.value ==2){
		if (document.form1.DB_OrdArchive2_1.value == ""){ErrString = ErrString + "上傳檔案" + unescape('%0D%0A')}
	}else if(form1.DB_OrdBasis.value ==3){
		if (document.form1.DB_OrdUrl3_1.value == "" || document.form1.DB_OrdUrl3_1.value == "http://"){ErrString = ErrString + "連結網址" + unescape('%0D%0A')}
	}
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	return true;
}

//萬年歷
function calendar(x){
	var d = window.open("calendar.php?items="+x,"calendar",'height=200,width=400,top=300,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');
	d.focus();
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

//-->
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理 >> <a href="sections_calss.php" class="link_01">條列式訊息管理</a> >> <a href="sections_list.php?DB_OrdTagID=<? echo $DB_OrdTagID;?>" class="link_01"><? echo $arry1['DB_OrdTagSubject'];?></a> >> <span class="text_12px_02"><strong>新增資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong><? echo $arry1['DB_OrdTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="sections_list.php?DB_OrdTagID=<? echo $DB_OrdTagID;?>" class="button_04">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="sections_add.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 發 佈 時 間<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdTime"  type="text" class="text_12px_01" id="DB_OrdTime" maxlength="12" readonly /> 
			<a href="javascript:calendar('DB_OrdTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			  <input name="DB_OrdAnnounce" type="radio" value="0" checked="checked" />顯示
			  <input name="DB_OrdAnnounce" type="radio" value="1" />
			  不顯示</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 線 時 間<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			開始：<input name="DB_OrdStart_Time"  type="text" class="text_12px_01" id="DB_OrdStart_Time" maxlength="12" readonly /> <a href="javascript:calendar('DB_OrdStart_Time');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>&nbsp;～&nbsp;
			結束：<input name="DB_OrdEnd_Time"  type="text" class="text_12px_01" id="DB_OrdEnd_Time" maxlength="12" readonly /> <a href="javascript:calendar('DB_OrdEnd_Time');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			<input name="DB_OrdPermanent" type="checkbox" id="DB_OrdPermanent" value="1" />永久
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 現 方 式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <select name="DB_OrdBasis" id="DB_OrdBasis" class="text_12px_01" onChange="Op_1(this.value)">
                <option value="1">內容頁面</option>
                <option value="2">連結檔案</option>
                <option value="3">連結網址</option>
              </select></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 題<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_OrdSubject"  type="text" class="text_12px_01" id="DB_OrdSubject" size="80" /></td>
		  </tr>
		</table>
			<span id="OpenDIV_1" style="display:block">		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 見 報 日 期<!--<font color="red">*</font>--></td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdNewTime"  type="text" class="text_12px_01" id="DB_OrdNewTime" maxlength="12" readonly /> 
			       <a href="javascript:calendar('DB_OrdNewTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			    </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 內 容<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
	<?php
				
				include("../FCKeditor/fckeditor.php") ; 
				$sBasePath = '../FCKeditor/' ;
				$oFCKeditor = new FCKeditor('DB_OrdContent') ;//表單名稱
				$oFCKeditor->BasePath	= $sBasePath ; 
				$oFCKeditor->Config['CustomConfigurationsPath'] = '../../FCKeditor/custom.js' ;
				$oFCKeditor->ToolbarSet =  "my1";
				$oFCKeditor->Width  = '96%' ;
				$oFCKeditor->Height = '500' ;
				$oFCKeditor->Value		= ""  ;//預設值
				$oFCKeditor->Create() ; 
	?>
				</td>
		      </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(1)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_OrdYou_1" cols="50" rows="5" class="text_12px_01" id="DB_OrdYou_1"></textarea>
					<input name="DB_OrdYouLocation_1" type="radio" value="1" />
					放置內容上方
					<input name="DB_OrdYouLocation_1" type="radio" value="2" checked="checked" />
					放置內容下方
                </td>
              </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(2)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_OrdYou_2" cols="50" rows="5" class="text_12px_01" id="DB_OrdYou_2"></textarea>
					<input name="DB_OrdYouLocation_2" type="radio" value="1" />
					放置內容上方
					<input name="DB_OrdYouLocation_2" type="radio" value="2" checked="checked" />
					放置內容下方</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(3)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_OrdYou_3" cols="50" rows="5" class="text_12px_01" id="DB_OrdYou_3"></textarea>
					<input name="DB_OrdYouLocation_3" type="radio" value="1" />
					放置內容上方
					<input name="DB_OrdYouLocation_3" type="radio" value="2" checked="checked" />
					放置內容下方</td>
              </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdImg_1" type="file" class="text_12px_01" id="DB_OrdImg_1" size="30" />
					<input name="DB_OrdLocation_1" type="radio" value="1" />
					放置內容上方
					<input name="DB_OrdLocation_1" type="radio" value="2" checked="checked" />
					放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdImg_2" type="file" class="text_12px_01" id="DB_OrdImg_2" size="30" />
					<input name="DB_OrdLocation_2" type="radio" value="1" />
					放置內容上方
					<input name="DB_OrdLocation_2" type="radio" value="2" checked="checked" />
					放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdImg_3" type="file" class="text_12px_01" id="DB_OrdImg_3" size="30" />
					<input name="DB_OrdLocation_3" type="radio" value="1" />
					放置內容上方
					<input name="DB_OrdLocation_3" type="radio" value="2" checked="checked" />
					放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl_1" type="text" class="text_12px_01" id="DB_OrdUrl_1" value="http://" size="40" />
			      名稱：
		          <input name="DB_OrdUrlName_1" type="text" class="text_12px_01" id="DB_OrdUrlName_1" value="" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl_2" type="text" class="text_12px_01" id="DB_OrdUrl_2" value="http://" size="40" />
			      名稱：
		          <input name="DB_OrdUrlName_2" type="text" class="text_12px_01" id="DB_OrdUrlName_2" value="" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl_3" type="text" class="text_12px_01" id="DB_OrdUrl_3" value="http://" size="40" />
			      名稱：
		          <input name="DB_OrdUrlName_3" type="text" class="text_12px_01" id="DB_OrdUrlName_3" value="" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdArchive_1" type="file" class="text_12px_01" id="DB_OrdArchive_1" size="30" />
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdArchive_2" type="file" class="text_12px_01" id="DB_OrdArchive_2" size="30" />
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdArchive_3" type="file" class="text_12px_01" id="DB_OrdArchive_3" size="30" />
				  </td>
		      </tr>
		  	</table>
			</span>
			<span id="OpenDIV_2" style="display:none">  		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdArchive2_1" type="file" class="text_12px_01" id="DB_OrdArchive2_1" size="30" />
				  </td>
		      </tr>
			</table>
			</span>
			<span id="OpenDIV_3" style="display:none">   		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連 結 網 址<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl3_1" type="text" class="text_12px_01" id="DB_OrdUrl3_1" value="http://" size="40" />
			      </td>
			  </tr>
			</table>
			</span>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" class="button_01">送出新增</a></div>
		<input  type="hidden" name="DB_OrdTagID_no" value="<? echo $DB_OrdTagID;?>">
		<input  type="hidden" name="DB_OrdTagSubject_no" value="<? echo $arry1['DB_OrdTagSubject'];?>">
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

<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>

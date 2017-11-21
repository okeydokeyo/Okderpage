<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_8"); //檢查是否功能權限,否回首頁

$DB_OrdID=$_GET['DB_OrdID'];
$arry=SoloSql("ordi"," `DB_OrdID`='$DB_OrdID'");
$arry1=SoloSql("ordi_tags"," `DB_OrdTagID`='".$arry['DB_OrdTagID']."'");

$DB_OrdTagID_no=$_POST['DB_OrdTagID_no'];
$DB_OrdTagSubject_no=$_POST['DB_OrdTagSubject_no'];
$page=$_POST['page'];
$DB_OrdID_no=$_POST['DB_OrdID_no'];
$DB_OrdAnnounce=$_POST['DB_OrdAnnounce'];
$DB_OrdNewTime=$_POST['DB_OrdNewTime'];
$DB_OrdTime=$_POST['DB_OrdTime'];
$DB_OrdStart_Time=$_POST['DB_OrdStart_Time'];
$DB_OrdEnd_Time=$_POST['DB_OrdEnd_Time'];
$DB_OrdPermanent=$_POST['DB_OrdPermanent'];
$DB_OrdBasis=$_POST['DB_OrdBasis'];
$DB_OrdSubject = ereg_replace("'","\'",$_POST['DB_OrdSubject']);

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
				if(!empty($_FILES['DB_OrdImg_'.$i]['name'])){
				$return=iron_upload("DB_OrdImg_$i", time()."$i", "", "../file", "gif,jpg,jpeg,png", "16677216" );
				$DB_OrdImg.= " `DB_OrdImg_".$i."`='".$return['new_file']."',";
				$DB_OrdFileName.= " `DB_OrdFileName_".$i."`='".$return['old_file_name']."',";
				}
			 }
			for($e=1; $e<=3; $e++ ){
				$p=$e+3;
				if(!empty($_FILES['DB_OrdArchive_'.$e]['name'])){
				$return=iron_upload("DB_OrdArchive_$e", time()."$p", "", "../file", "", "16677216" );
				$DB_OrdArchive.= " `DB_OrdArchive_".$e."`='".$return['new_file']."',";
				$DB_OrdName.= "`DB_OrdName_".$e."`='".$return['old_file_name']."',";
				}
			}
			$UpStr=" `DB_OrdAnnounce`='$DB_OrdAnnounce',`DB_OrdNewTime`='$DB_OrdNewTime',`DB_OrdTime`='$DB_OrdTime',`DB_OrdStart_Time`='$DB_OrdStart_Time',`DB_OrdEnd_Time`='$DB_OrdEnd_Time',`DB_OrdPermanent`='$DB_OrdPermanent',`DB_OrdBasis`='$DB_OrdBasis',`DB_OrdSubject`='$DB_OrdSubject',`DB_OrdContent`='$DB_OrdContent',`DB_OrdYou_1`='$DB_OrdYou_1',`DB_OrdYou_2`='$DB_OrdYou_2',`DB_OrdYou_3`='$DB_OrdYou_3',`DB_OrdYouLocation_1`='$DB_OrdYouLocation_1',`DB_OrdYouLocation_2`='$DB_OrdYouLocation_2',`DB_OrdYouLocation_3`='$DB_OrdYouLocation_3',$DB_OrdImg $DB_OrdFileName $DB_OrdArchive $DB_OrdName `DB_OrdLocation_1`='$DB_OrdLocation_1',`DB_OrdLocation_2`='$DB_OrdLocation_2',`DB_OrdLocation_3`='$DB_OrdLocation_3',`DB_OrdUrl_1`='$DB_OrdUrl_1',`DB_OrdUrl_2`='$DB_OrdUrl_2',`DB_OrdUrl_3`='$DB_OrdUrl_3',`DB_OrdUrlName_1`='$DB_OrdUrlName_1',`DB_OrdUrlName_2`='$DB_OrdUrlName_2',`DB_OrdUrlName_3`='$DB_OrdUrlName_3',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			EditSql("ordi","$DB_OrdID_no","DB_OrdID","sections_list.php?DB_OrdTagID=$DB_OrdTagID_no&page=$page","修改成功!!",$UpStr);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','條列式訊息管理-".$DB_OrdTagSubject_no."','".$DB_OrdSubject."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_OrdBasis=="2"){
		if(!empty($DB_OrdTime) && !empty($DB_OrdSubject) ){
			if(!empty($_FILES['DB_OrdArchive2_1']['name'])){
				$return=iron_upload("DB_OrdArchive2_1", time(), "", "../file", "", "16677216" );
				$UpStr=" `DB_OrdAnnounce`='$DB_OrdAnnounce',`DB_OrdTime`='$DB_OrdTime',`DB_OrdStart_Time`='$DB_OrdStart_Time',`DB_OrdEnd_Time`='$DB_OrdEnd_Time',`DB_OrdPermanent`='$DB_OrdPermanent',`DB_OrdBasis`='$DB_OrdBasis',`DB_OrdSubject`='$DB_OrdSubject',`DB_OrdArchive2_1`='".$return['new_file']."',`DB_OrdName2_1`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}else{
				$UpStr=" `DB_OrdAnnounce`='$DB_OrdAnnounce',`DB_OrdTime`='$DB_OrdTime',`DB_OrdStart_Time`='$DB_OrdStart_Time',`DB_OrdEnd_Time`='$DB_OrdEnd_Time',`DB_OrdPermanent`='$DB_OrdPermanent',`DB_OrdBasis`='$DB_OrdBasis',`DB_OrdSubject`='$DB_OrdSubject',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("ordi","$DB_OrdID_no","DB_OrdID","sections_list.php?DB_OrdTagID=$DB_OrdTagID_no&page=$page","修改成功!!",$UpStr);
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','條列式訊息管理-".$DB_OrdTagSubject_no."','".$DB_OrdSubject."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_OrdBasis=="3"){
		$DB_OrdUrl3_1=$_POST['DB_OrdUrl3_1'];
		if(!empty($DB_OrdTime) && !empty($DB_OrdSubject) ){
			$UpStr=" `DB_OrdAnnounce`='$DB_OrdAnnounce',`DB_OrdTime`='$DB_OrdTime',`DB_OrdStart_Time`='$DB_OrdStart_Time',`DB_OrdEnd_Time`='$DB_OrdEnd_Time',`DB_OrdPermanent`='$DB_OrdPermanent',`DB_OrdBasis`='$DB_OrdBasis',`DB_OrdSubject`='$DB_OrdSubject',`DB_OrdUrl3_1`='$DB_OrdUrl3_1',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			EditSql("ordi","$DB_OrdID_no","DB_OrdID","sections_list.php?DB_OrdTagID=$DB_OrdTagID_no&page=$page","修改成功!!",$UpStr);
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','條列式訊息管理-".$DB_OrdTagSubject_no."','".$DB_OrdSubject."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}


?>
<? 
include_once ("top.php");
?>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
function checklat(){
	var ErrString = "" ;
	if (document.form1.DB_OrdTime.value == ""){ErrString = ErrString + "發佈日期" + unescape('%0D%0A')}
	if (document.form1.DB_OrdPermanent.checked == false){
	      if (document.form1.DB_OrdStart_Time.value == ""){ErrString = ErrString + "上線開始時間" + unescape('%0D%0A')}
	      if (document.form1.DB_OrdEnd_Time.value == ""){ErrString = ErrString + "下線結束時間" + unescape('%0D%0A')}
	}
	if (document.form1.DB_OrdSubject.value == ""){ErrString = ErrString + "標題" + unescape('%0D%0A')}
	if(form1.DB_OrdBasis.value ==1){

	if(document.form1.DB_OrdUrl_1.value != "" && document.form1.DB_OrdUrl_1.value != "http://"){
		if(document.form1.DB_OrdUrlName_1.value == ""){ErrString = ErrString + "網址名稱01" + unescape('%0D%0A')}
	}

	if(document.form1.DB_OrdUrl_2.value != "" && document.form1.DB_OrdUrl_2.value != "http://"){
		if(document.form1.DB_OrdUrlName_2.value == ""){ErrString = ErrString + "網址名稱02" + unescape('%0D%0A')}
	}

	if(document.form1.DB_OrdUrl_3.value != "" && document.form1.DB_OrdUrl_3.value != "http://"){
		if(document.form1.DB_OrdUrlName_3.value == ""){ErrString = ErrString + "網址名稱03" + unescape('%0D%0A')}
	}


	}else if(form1.DB_OrdBasis.value ==2){
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

<? for($l=1;$l<=6;$l++){ ?>
//更換圖片資料
function change_file<? echo $l;?>( num,DB_FileName ){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('file_show<? echo $l;?>').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "sections_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}
<? }?>


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
	oHttpReq.open( "GET", "sections_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理 >> <a href="sections_calss.php" class="link_01">條列式訊息管理</a> >> <a href="sections_list.php?DB_OrdTagID=<? echo $arry1['DB_OrdTagID'];?>" class="link_01"><? echo $arry1['DB_OrdTagSubject'];?></a> >> <span class="text_12px_02"><strong>修改資料  </strong></span></td>
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
		  <a href="sections_list.php?DB_OrdTagID=<? echo $arry1['DB_OrdTagID'];?>" class="button_04">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="sections_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame"> 
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 發 佈 時 間<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdTime"  type="text" class="text_12px_01" id="DB_OrdTime" value="<? echo $arry['DB_OrdTime'];?>" maxlength="12" readonly /> 
			<a href="javascript:calendar('DB_OrdTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			  <input name="DB_OrdAnnounce" type="radio" value="0" <? if($arry['DB_OrdAnnounce']=="0"){echo "checked";}?> />顯示
			  <input name="DB_OrdAnnounce" type="radio" value="1" <? if($arry['DB_OrdAnnounce']=="1"){echo "checked";}?> />
			  不顯示</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 線 時 間<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			開始：<input name="DB_OrdStart_Time"  type="text" class="text_12px_01" id="DB_OrdStart_Time" value="<? if ($arry['DB_OrdStart_Time'] != "0000-00-00"){echo $arry['DB_OrdStart_Time'];}?>" maxlength="12" readonly /> 
			<a href="javascript:calendar('DB_OrdStart_Time');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>&nbsp;～&nbsp;
			結束：<input name="DB_OrdEnd_Time"  type="text" class="text_12px_01" id="DB_OrdEnd_Time" value="<? if ($arry['DB_OrdEnd_Time'] != "0000-00-00"){echo $arry['DB_OrdEnd_Time'];}?>" maxlength="12" readonly /> 
			<a href="javascript:calendar('DB_OrdEnd_Time');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			<input name="DB_OrdPermanent" type="checkbox" id="DB_OrdPermanent" value="1" <? if($arry['DB_OrdPermanent']=="1"){echo "checked";}?> />
			永久
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 現 方 式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <select name="DB_OrdBasis" id="DB_OrdBasis" class="text_12px_01" onChange="Op_1(this.value)">
              <option value="1" <? if($arry['DB_OrdBasis']=="1"){echo "selected";}?>>內容頁面</option>
              <option value="2" <? if($arry['DB_OrdBasis']=="2"){echo "selected";}?>>連結附件</option>
              <option value="3" <? if($arry['DB_OrdBasis']=="3"){echo "selected";}?>>連結網址</option>
              </select></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 題<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_OrdSubject"  type="text" class="text_12px_01" id="DB_OrdSubject" value="<? echo $arry['DB_OrdSubject'];?>" size="80" /></td>
		  </tr>
		</table>
			<span id="OpenDIV_1" style="display:<? if($arry['DB_OrdBasis']=="1"){echo "block";}else{echo "none";}?>">		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 見 報 日 期<!--<font color="red">*</font>--></td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_OrdNewTime" value="<? echo $arry['DB_OrdNewTime'];?>" type="text" class="text_12px_01" id="DB_OrdNewTime" maxlength="12" readonly /> 
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
				$oFCKeditor->Value		= "".re_change_size($arry['DB_OrdContent']).""  ;//預設值
				$oFCKeditor->Create() ; 
		  ?>
				</td>
		      </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(1)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_OrdYou_1" cols="50" rows="5" class="text_12px_01" id="DB_OrdYou_1"><? echo $arry['DB_OrdYou_1'];?></textarea>
					<input name="DB_OrdYouLocation_1" type="radio" value="1" <? if($arry['DB_OrdYouLocation_1']=="1"){echo "checked";}?> />
					放置內容上方
					<input name="DB_OrdYouLocation_1" type="radio" value="2" <? if($arry['DB_OrdYouLocation_1']=="2"){echo "checked";}?> />
					放置內容下方
                </td>
              </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(2)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_OrdYou_2" cols="50" rows="5" class="text_12px_01" id="DB_OrdYou_2"><? echo $arry['DB_OrdYou_2'];?></textarea>
					<input name="DB_OrdYouLocation_2" type="radio" value="1" <? if($arry['DB_OrdYouLocation_2']=="1"){echo "checked";}?> />
					放置內容上方
					<input name="DB_OrdYouLocation_2" type="radio" value="2" <? if($arry['DB_OrdYouLocation_2']=="2"){echo "checked";}?> />
					放置內容下方</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(3)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_OrdYou_3" cols="50" rows="5" class="text_12px_01" id="DB_OrdYou_3"><? echo $arry['DB_OrdYou_3'];?></textarea>
					<input name="DB_OrdYouLocation_3" type="radio" value="1" <? if($arry['DB_OrdYouLocation_3']=="1"){echo "checked";}?> />
					放置內容上方
					<input name="DB_OrdYouLocation_3" type="radio" value="2" <? if($arry['DB_OrdYouLocation_3']=="2"){echo "checked";}?> />
					放置內容下方</td>
              </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show1">
			<?
			if(!empty($arry['DB_OrdImg_1']) && !empty($arry['DB_OrdFileName_1'])){
			?>
			<a href="../file/<? echo $arry['DB_OrdImg_1'];?>" target="_blank"><? echo $arry['DB_OrdFileName_1'];?></a> <a href="javascript:change_file1(<? echo $arry['DB_OrdID'];?>,'DB_OrdImg_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_OrdImg_1']) && empty($arry['DB_OrdFileName_1'])){
			?>
			<input name="DB_OrdImg_1" type="file" id="DB_OrdImg_1" />  
			<? }?>
			</span>
			<input name="DB_OrdLocation_1" type="radio" value="1" <? if($arry['DB_OrdLocation_1']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_OrdLocation_1" type="radio" value="2" <? if($arry['DB_OrdLocation_1']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show2">
			<?
			if(!empty($arry['DB_OrdImg_2']) && !empty($arry['DB_OrdFileName_2'])){
			?>
			<a href="../file/<? echo $arry['DB_OrdImg_2'];?>" target="_blank"><? echo $arry['DB_OrdFileName_2'];?></a> <a href="javascript:change_file2(<? echo $arry['DB_OrdID'];?>,'DB_OrdImg_2');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_OrdImg_2']) && empty($arry['DB_OrdFileName_2'])){
			?>
			<input name="DB_OrdImg_2" type="file" id="DB_OrdImg_2" />  
			<? }?>
			</span>
			<input name="DB_OrdLocation_2" type="radio" value="1" <? if($arry['DB_OrdLocation_2']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_OrdLocation_2" type="radio" value="2" <? if($arry['DB_OrdLocation_2']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show3">
			<?
			if(!empty($arry['DB_OrdImg_3']) && !empty($arry['DB_OrdFileName_3'])){
			?>
			<a href="../file/<? echo $arry['DB_OrdImg_3'];?>" target="_blank"><? echo $arry['DB_OrdFileName_3'];?></a> <a href="javascript:change_file3(<? echo $arry['DB_OrdID'];?>,'DB_OrdImg_3');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_OrdImg_3']) && empty($arry['DB_OrdFileName_3'])){
			?>
			<input name="DB_OrdImg_3" type="file" id="DB_OrdImg_3" />  
			<? }?>
			</span>
			<input name="DB_OrdLocation_3" type="radio" value="1" <? if($arry['DB_OrdLocation_3']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_OrdLocation_3" type="radio" value="2" <? if($arry['DB_OrdLocation_3']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl_1" type="text" class="text_12px_01" id="DB_OrdUrl_1" value="<? echo $arry['DB_OrdUrl_1'];?>" size="40" />
			      名稱：
		          <input name="DB_OrdUrlName_1" type="text" class="text_12px_01" id="DB_OrdUrlName_1" value="<? echo $arry['DB_OrdUrlName_1'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl_2" type="text" class="text_12px_01" id="DB_OrdUrl_2" value="<? echo $arry['DB_OrdUrl_2'];?>" size="40" />
			      名稱：
		          <input name="DB_OrdUrlName_2" type="text" class="text_12px_01" id="DB_OrdUrlName_2" value="<? echo $arry['DB_OrdUrlName_2'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl_3" type="text" class="text_12px_01" id="DB_OrdUrl_3" value="<? echo $arry['DB_OrdUrl_3'];?>" size="40" />
			      名稱：
		          <input name="DB_OrdUrlName_3" type="text" class="text_12px_01" id="DB_OrdUrlName_3" value="<? echo $arry['DB_OrdUrlName_3'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show4">
			<?
			if(!empty($arry['DB_OrdArchive_1']) && !empty($arry['DB_OrdName_1'])){
			?>
			<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_OrdName_1']);?>&DB_FileName=<? echo $arry['DB_OrdArchive_1'];?>"><? echo $arry['DB_OrdName_1'];?></a> <a href="javascript:change_file4(<? echo $arry['DB_OrdID'];?>,'DB_OrdArchive_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_OrdArchive_1']) && empty($arry['DB_OrdName_1'])){
			?>
			<input name="DB_OrdArchive_1" type="file" id="DB_OrdArchive_1" />
			<? }?>
			</span>
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show5">
			<?
			if(!empty($arry['DB_OrdArchive_2']) && !empty($arry['DB_OrdName_2'])){
			?>
			<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_OrdName_2']);?>&DB_FileName=<? echo $arry['DB_OrdArchive_2'];?>"><? echo $arry['DB_OrdName_2'];?></a> <a href="javascript:change_file5(<? echo $arry['DB_OrdID'];?>,'DB_OrdArchive_2');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_OrdArchive_2']) && empty($arry['DB_OrdName_2'])){
			?>
			<input name="DB_OrdArchive_2" type="file" id="DB_OrdArchive_2" />
			<? }?>
			</span>
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show6">
			<?
			if(!empty($arry['DB_OrdArchive_3']) && !empty($arry['DB_OrdName_3'])){
			?>
			<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_OrdName_3']);?>&DB_FileName=<? echo $arry['DB_OrdArchive_3'];?>"><? echo $arry['DB_OrdName_3'];?></a> <a href="javascript:change_file6(<? echo $arry['DB_OrdID'];?>,'DB_OrdArchive_3');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_OrdArchive_3']) && empty($arry['DB_OrdName_3'])){
			?>
			<input name="DB_OrdArchive_3" type="file" id="DB_OrdArchive_3" />
			<? }?>
			</span>
				  </td>
		      </tr>
		  	</table>
			</span>
			<span id="OpenDIV_2" style="display:<? if($arry['DB_OrdBasis']=="2"){echo "block";}else{echo "none";}?>">  		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
		<span id="file1">
		<?
		if(!empty($arry['DB_OrdArchive2_1']) && !empty($arry['DB_OrdName2_1'])){
		?>
		<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_OrdName2_1']);?>&DB_FileName=<? echo $arry['DB_OrdArchive2_1'];?>"><? echo $arry['DB_OrdName2_1'];?></a> <a href="javascript:change1(<? echo $arry['DB_OrdID'];?>,'DB_OrdArchive2_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
		<? 
		}elseif(empty($arry['DB_OrdArchive2_1']) && empty($arry['DB_OrdName2_1'])){
		?>
		<input name="DB_OrdArchive2_1" type="file" id="DB_OrdArchive2_1" />
		<? }?>
		</span>
				  </td>
		      </tr>
			</table>
			</span>
			<span id="OpenDIV_3" style="display:<? if($arry['DB_OrdBasis']=="3"){echo "block";}else{echo "none";}?>">   		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連 結 網 址<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_OrdUrl3_1" type="text" class="text_12px_01" id="DB_OrdUrl3_1" value="<? echo $arry['DB_OrdUrl3_1'];?>" size="40" />
			      </td>
			  </tr>
			</table>
			</span>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" title="修改資料" class="button_01">送出修改</a></div>
		<input  type="hidden" name="DB_OrdTagID_no" value="<? echo $arry1['DB_OrdTagID'];?>">
		<input  type="hidden" name="DB_OrdTagSubject_no" value="<? echo $arry1['DB_OrdTagSubject'];?>">
	    <input  type="hidden" name="page" value="<? echo $_GET['page'];?>">	 
	    <input  type="hidden" name="DB_OrdID_no" value="<? echo $_GET['DB_OrdID'];?>">
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
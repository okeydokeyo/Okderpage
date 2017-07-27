<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_15"); //檢查是否功能權限,否回首頁

$DB_VisID=$_GET['DB_VisID'];
$arry=SoloSql("visit","`DB_VisID`='".$_GET['DB_VisID']."'");


$page_no=$_POST['page_no'];
$DB_VisID_no=$_POST['DB_VisID_no'];
$DB_VisUnit=$_POST['DB_VisUnit'];
$DB_VisNum=$_POST['DB_VisNum'];
$DB_VisTime=$_POST['DB_VisTime'];
$DB_VisHour=$_POST['DB_VisHour'];
$DB_VisMinute=$_POST['DB_VisMinute'];
$DB_VisAnnounce=$_POST['DB_VisAnnounce'];
$DB_VisBasis=$_POST['DB_VisBasis'];


if($DB_VisBasis=="1"){
		$DB_VisContent=change_size(ereg_replace("'","\'",$_POST['DB_VisContent']));
		$DB_VisFileName_1=$_POST['DB_VisFileName_1'];
		$DB_VisFileName_2=$_POST['DB_VisFileName_2'];
		$DB_VisFileName_3=$_POST['DB_VisFileName_3'];
		$DB_VisLocation_1=$_POST['DB_VisLocation_1'];
		$DB_VisLocation_2=$_POST['DB_VisLocation_2'];
		$DB_VisLocation_3=$_POST['DB_VisLocation_3'];				
		$DB_VisUrl_1=$_POST['DB_VisUrl_1'];
		$DB_VisUrlName_1=ereg_replace("'","\'",$_POST['DB_VisUrlName_1']);
		$DB_VisUrl_2=$_POST['DB_VisUrl_2'];
		$DB_VisUrlName_2=ereg_replace("'","\'",$_POST['DB_VisUrlName_2']);
		$DB_VisUrl_3=$_POST['DB_VisUrl_3'];
		$DB_VisUrlName_3=ereg_replace("'","\'",$_POST['DB_VisUrlName_3']);
		if(!empty($DB_VisUnit) && !empty($DB_VisNum) && !empty($DB_VisTime) ){


			for($i=1; $i<=3; $i++ ){
				if(!empty($_FILES['DB_VisImg_'.$i]['name'])){
				$return=iron_upload("DB_VisImg_$i", time()."$i", "", "../file", "gif,jpg,jpeg,png", "16677216" );
				$DB_VisImg.= " `DB_VisImg_".$i."`='".$return['new_file']."',";
				$DB_VisFileName.= " `DB_VisFileName_".$i."`='".$return['old_file_name']."',";
				}
			 }
			for($e=1; $e<=3; $e++ ){
				$p=$e+3;
				if(!empty($_FILES['DB_VisArchive_'.$e]['name'])){
				$return=iron_upload("DB_VisArchive_$e", time()."$p", "", "../file", "", "16677216" );
				$DB_VisArchive.= " `DB_VisArchive_".$e."`='".$return['new_file']."',";
				$DB_VisName.= "`DB_VisName_".$e."`='".$return['old_file_name']."',";
				}
			}
			$UpStr=" `DB_VisAnnounce`='$DB_VisAnnounce',`DB_VisUnit`='$DB_VisUnit',`DB_VisNum`='$DB_VisNum',`DB_VisTime`='$DB_VisTime',`DB_VisHour`='$DB_VisHour',`DB_VisMinute`='$DB_VisMinute',`DB_VisBasis`='$DB_VisBasis',`DB_VisContent`='$DB_VisContent',$DB_VisImg $DB_VisFileName $DB_VisArchive $DB_VisName `DB_VisLocation_1`='$DB_VisLocation_1',`DB_VisLocation_2`='$DB_VisLocation_2',`DB_VisLocation_3`='$DB_VisLocation_3',`DB_VisUrl_1`='$DB_VisUrl_1',`DB_VisUrl_2`='$DB_VisUrl_2',`DB_VisUrl_3`='$DB_VisUrl_3',`DB_VisUrlName_1`='$DB_VisUrlName_1',`DB_VisUrlName_2`='$DB_VisUrlName_2',`DB_VisUrlName_3`='$DB_VisUrlName_3',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			EditSql("visit","$DB_VisID_no","DB_VisID","visit_list.php?page=$page","修改成功!!",$UpStr);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','參訪紀錄','".$DB_VisUnit."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_VisBasis=="2"){
			if(!empty($DB_VisUnit) && !empty($DB_VisNum) && !empty($DB_VisTime) ){


			if(!empty($_FILES['DB_VisArchive2_1']['name'])){
				$return=iron_upload("DB_VisArchive2_1", time(), "", "../file", "", "16677216" );
				$UpStr=" `DB_VisAnnounce`='$DB_VisAnnounce',`DB_VisUnit`='$DB_VisUnit',`DB_VisNum`='$DB_VisNum',`DB_VisTime`='$DB_VisTime',`DB_VisHour`='$DB_VisHour',`DB_VisMinute`='$DB_VisMinute',`DB_VisBasis`='$DB_VisBasis',`DB_VisArchive2_1`='".$return['new_file']."',`DB_VisName2_1`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}else{
				$UpStr=" `DB_VisAnnounce`='$DB_VisAnnounce',`DB_VisSort`='$DB_VisSort',`DB_VisBasis`='$DB_VisBasis',`DB_VisSubject`='$DB_VisSubject',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("visit","$DB_VisID_no","DB_VisID","visit_list.php?page=$page","修改成功!!",$UpStr);
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','參訪紀錄','".$DB_VisUnit."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_VisBasis=="3"){
		$DB_VisUrl3_1=$_POST['DB_VisUrl3_1'];
		if(!empty($DB_VisUnit) && !empty($DB_VisNum) && !empty($DB_VisTime) ){


			$UpStr=" `DB_VisAnnounce`='$DB_VisAnnounce',`DB_VisUnit`='$DB_VisUnit',`DB_VisNum`='$DB_VisNum',`DB_VisTime`='$DB_VisTime',`DB_VisHour`='$DB_VisHour',`DB_VisMinute`='$DB_VisMinute',`DB_VisBasis`='$DB_VisBasis',`DB_VisUrl3_1`='$DB_VisUrl3_1',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			EditSql("visit","$DB_VisID_no","DB_VisID","visit_list.php?page=$page","修改成功!!",$UpStr);
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','參訪紀錄','".$DB_VisUnit."','edit',NOW()";
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
	if (document.form1.DB_VisUnit.value == ""){ErrString = ErrString + "參訪單位" + unescape('%0D%0A')}
	if (document.form1.DB_VisNum.value == ""){ErrString = ErrString + "人數" + unescape('%0D%0A')}
	if (document.form1.DB_VisTime.value == ""){ErrString = ErrString + "時間" + unescape('%0D%0A')}

	if(document.form1.DB_VistUrl_1.value != "" && document.form1.DB_VistUrl_1.value != "http://"){
		if(document.form1.DB_VistUrlName_1.value == ""){ErrString = ErrString + "網址名稱01" + unescape('%0D%0A')}
	}

	if(document.form1.DB_VistUrl_2.value != "" && document.form1.DB_VistUrl_2.value != "http://"){
		if(document.form1.DB_VistUrlName_2.value == ""){ErrString = ErrString + "網址名稱02" + unescape('%0D%0A')}
	}

	if(document.form1.DB_VistUrl_3.value != "" && document.form1.DB_VistUrl_3.value != "http://"){
		if(document.form1.DB_VistUrlName_3.value == ""){ErrString = ErrString + "網址名稱03" + unescape('%0D%0A')}
	}

	if(form1.DB_VistBasis.value ==2){
		if (document.form1.DB_VistArchive2_1.value == ""){ErrString = ErrString + "上傳檔案" + unescape('%0D%0A')}
	}else if(form1.DB_VistBasis.value ==3){
		if (document.form1.DB_VistUrl3_1.value == "" || document.form1.DB_VistUrl3_1.value == "http://"){ErrString = ErrString + "連結網址" + unescape('%0D%0A')}
	}
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
	oHttpReq.open( "GET", "visit_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
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
	oHttpReq.open( "GET", "visit_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}


//萬年歷
function calendar(x){
	var d = window.open("calendar.php?items="+x,"calendar",'height=200,width=400,top=300,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> <a href="visit_list.php" class="link_01">參訪紀錄</a> >> <span class="text_12px_02"><strong>編輯資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>參訪紀錄</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="visit_list.php" class="button_04">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="visit_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 參 訪 單 位<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisUnit"  type="text" class="text_12px_01" id="DB_VisUnit" value="<? echo $arry['DB_VisUnit'];?>" size="80" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 人 數<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_VisNum"  type="text" class="text_12px_01" id="DB_VisNum" value="<? echo $arry['DB_VisNum'];?>" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 時 間<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <input name="DB_VisTime"  type="text" class="text_12px_01" id="DB_VisTime" value="<? echo $arry['DB_VisTime'];?>" maxlength="12" /> 
			  <a href="javascript:calendar('DB_VisTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			  <select name="DB_VisHour" class="text_12px_01" id="DB_VisHour">
			  <? for($h_start=0;$h_start<=24;$h_start++){?>
			  <option value="<? echo iron_give_zero(2,$h_start);?>" <? if($arry['DB_VisHour']== iron_give_zero(2,$h_start)){echo "selected";}?>><? echo iron_give_zero(2,$h_start);?></option>
			  <? }?>
			  </select> 點
			  <select name="DB_VisMinute" class="text_12px_01" id="DB_VisMinute">
                <option value="00" <? if($arry['DB_VisMinute']== "00"){echo "selected";}?>>00</option>
				<option value="10" <? if($arry['DB_VisMinute']== "10"){echo "selected";}?>>10</option>
                <option value="20" <? if($arry['DB_VisMinute']== "20"){echo "selected";}?>>20</option>
				<option value="30" <? if($arry['DB_VisMinute']== "30"){echo "selected";}?>>30</option>
				<option value="40" <? if($arry['DB_VisMinute']== "40"){echo "selected";}?>>40</option>
				<option value="50" <? if($arry['DB_VisMinute']== "50"){echo "selected";}?>>50</option>
              </select> 分</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <input name="DB_VisAnnounce" type="radio" value="0" <? if($arry['DB_VisAnnounce']== "0"){echo "checked";}?> />
			  顯示
			  <input name="DB_VisAnnounce" type="radio" value="1" <? if($arry['DB_VisAnnounce']== "1"){echo "checked";}?> />
			  不顯示</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 現 方 式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <select name="DB_VisBasis" id="DB_VisBasis" class="text_12px_01" onChange="Op_1(this.value)">
              <option value="1" <? if($arry['DB_VisBasis']=="1"){echo "selected";}?>>內容頁面</option>
              <option value="2" <? if($arry['DB_VisBasis']=="2"){echo "selected";}?>>連結附件</option>
              <option value="3" <? if($arry['DB_VisBasis']=="3"){echo "selected";}?>>連結網址</option>
              </select></td>
		  </tr>
		</table>
			<span id="OpenDIV_1" style="display:<? if($arry['DB_VisBasis']=="1"){echo "block";}else{echo "none";}?>">		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 內 容<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
		  <?php
				
				include("../FCKeditor/fckeditor.php") ; 
				$sBasePath = '../FCKeditor/' ;
				$oFCKeditor = new FCKeditor('DB_VisContent') ;//表單名稱
				$oFCKeditor->BasePath	= $sBasePath ; 
				$oFCKeditor->Config['CustomConfigurationsPath'] = '../../FCKeditor/custom.js' ;
				$oFCKeditor->ToolbarSet =  "my1";
				$oFCKeditor->Width  = '96%' ;
				$oFCKeditor->Height = '500' ;
				$oFCKeditor->Value		= "".re_change_size($arry['DB_VisContent']).""  ;//預設值
				$oFCKeditor->Create() ; 
		  ?>
				</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show1">
			<?
			if(!empty($arry['DB_VisImg_1']) && !empty($arry['DB_VisFileName_1'])){
			?>
			<a href="../file/<? echo $arry['DB_VisImg_1'];?>" target="_blank"><? echo $arry['DB_VisFileName_1'];?></a> <a href="javascript:change_file1(<? echo $arry['DB_VisID'];?>,'DB_VisImg_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_VisImg_1']) && empty($arry['DB_VisFileName_1'])){
			?>
			<input name="DB_VisImg_1" type="file" id="DB_VisImg_1" />  
			<? }?>
			</span>
			<input name="DB_VisLocation_1" type="radio" value="1" <? if($arry['DB_VisLocation_1']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_VisLocation_1" type="radio" value="2" <? if($arry['DB_VisLocation_1']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show2">
			<?
			if(!empty($arry['DB_VisImg_2']) && !empty($arry['DB_VisFileName_2'])){
			?>
			<a href="../file/<? echo $arry['DB_VisImg_2'];?>" target="_blank"><? echo $arry['DB_VisFileName_2'];?></a> <a href="javascript:change_file2(<? echo $arry['DB_VisID'];?>,'DB_VisImg_2');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_VisImg_2']) && empty($arry['DB_VisFileName_2'])){
			?>
			<input name="DB_VisImg_2" type="file" id="DB_VisImg_2" />  
			<? }?>
			</span>
			<input name="DB_VisLocation_2" type="radio" value="1" <? if($arry['DB_VisLocation_2']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_VisLocation_2" type="radio" value="2" <? if($arry['DB_VisLocation_2']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show3">
			<?
			if(!empty($arry['DB_VisImg_3']) && !empty($arry['DB_VisFileName_3'])){
			?>
			<a href="../file/<? echo $arry['DB_VisImg_3'];?>" target="_blank"><? echo $arry['DB_VisFileName_3'];?></a> <a href="javascript:change_file3(<? echo $arry['DB_VisID'];?>,'DB_VisImg_3');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_VisImg_3']) && empty($arry['DB_VisFileName_3'])){
			?>
			<input name="DB_VisImg_3" type="file" id="DB_VisImg_3" />  
			<? }?>
			</span>
			<input name="DB_VisLocation_3" type="radio" value="1" <? if($arry['DB_VisLocation_3']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_VisLocation_3" type="radio" value="2" <? if($arry['DB_VisLocation_3']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_VisUrl_1" type="text" class="text_12px_01" id="DB_VisUrl_1" value="<? echo $arry['DB_VisUrl_1'];?>" size="40" />
			      名稱：
		          <input name="DB_VisUrlName_1" type="text" class="text_12px_01" id="DB_VisUrlName_1" value="<? echo $arry['DB_VisUrlName_1'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_VisUrl_2" type="text" class="text_12px_01" id="DB_VisUrl_2" value="<? echo $arry['DB_VisUrl_2'];?>" size="40" />
			      名稱：
		          <input name="DB_VisUrlName_2" type="text" class="text_12px_01" id="DB_VisUrlName_2" value="<? echo $arry['DB_VisUrlName_2'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_VisUrl_3" type="text" class="text_12px_01" id="DB_VisUrl_3" value="<? echo $arry['DB_VisUrl_3'];?>" size="40" />
			      名稱：
		          <input name="DB_VisUrlName_3" type="text" class="text_12px_01" id="DB_VisUrlName_3" value="<? echo $arry['DB_VisUrlName_3'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show4">
			<?
			if(!empty($arry['DB_VisArchive_1']) && !empty($arry['DB_VisName_1'])){
			?>
			<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_VisName_1']);?>&DB_FileName=<? echo $arry['DB_VisArchive_1'];?>"><? echo $arry['DB_VisName_1'];?></a> <a href="javascript:change_file4(<? echo $arry['DB_VisID'];?>,'DB_VisArchive_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_VisArchive_1']) && empty($arry['DB_VisName_1'])){
			?>
			<input name="DB_VisArchive_1" type="file" id="DB_VisArchive_1" />
			<? }?>
			</span>
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show5">
			<?
			if(!empty($arry['DB_VisArchive_2']) && !empty($arry['DB_VisName_2'])){
			?>
			<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_VisName_2']);?>&DB_FileName=<? echo $arry['DB_VisArchive_2'];?>"><? echo $arry['DB_VisName_2'];?></a> <a href="javascript:change_file5(<? echo $arry['DB_VisID'];?>,'DB_VisArchive_2');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_VisArchive_2']) && empty($arry['DB_VisName_2'])){
			?>
			<input name="DB_VisArchive_2" type="file" id="DB_VisArchive_2" />
			<? }?>
			</span>
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show6">
			<?
			if(!empty($arry['DB_VisArchive_3']) && !empty($arry['DB_VisName_3'])){
			?>
			<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_VisName_3']);?>&DB_FileName=<? echo $arry['DB_VisArchive_3'];?>"><? echo $arry['DB_VisName_3'];?></a> <a href="javascript:change_file6(<? echo $arry['DB_VisID'];?>,'DB_VisArchive_3');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<? 
			}elseif(empty($arry['DB_VisArchive_3']) && empty($arry['DB_VisName_3'])){
			?>
			<input name="DB_VisArchive_3" type="file" id="DB_VisArchive_3" />
			<? }?>
			</span>
				  </td>
		      </tr>
		  	</table>
			</span>
			<span id="OpenDIV_2" style="display:<? if($arry['DB_VisBasis']=="2"){echo "block";}else{echo "none";}?>">  		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
		<span id="file1">
		<?
		if(!empty($arry['DB_VisArchive2_1']) && !empty($arry['DB_VisName2_1'])){
		?>
		<a href="download.php?DB_FileTitle=<? echo urlencode($arry['DB_VisName2_1']);?>&DB_FileName=<? echo $arry['DB_VisArchive2_1'];?>"><? echo $arry['DB_VisName2_1'];?></a> <a href="javascript:change1(<? echo $arry['DB_VisID'];?>,'DB_VisArchive2_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
		<? 
		}elseif(empty($arry['DB_VisArchive2_1']) && empty($arry['DB_VisName2_1'])){
		?>
		<input name="DB_VisArchive2_1" type="file" id="DB_VisArchive2_1" />
		<? }?>
		</span>
				  </td>
		      </tr>
			</table>
			</span>
			<span id="OpenDIV_3" style="display:<? if($arry['DB_VisBasis']=="3"){echo "block";}else{echo "none";}?>">   		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連 結 網 址<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
				<input name="DB_VisUrl3_1" type="text" class="text_12px_01" id="DB_VisUrl3_1" value="<? echo $arry['DB_VisUrl3_1'];?>" size="40" />
				  </td>
			  </tr>
			</table>
			</span>
		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" class="button_01">修改資料</a></div>
	  <input  type="hidden" name="DB_VisID_no" value="<? echo $_GET['DB_VisID'];?>">
	  <input type="hidden" name="page_no" value="<? echo $_GET['page'];?>">		
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
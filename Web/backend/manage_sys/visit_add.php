<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_15"); //檢查是否功能權限,否回首頁


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
			$return=iron_upload("DB_VisImg_$i", time()."$i", "", "../file", "gif,jpg,jpeg,png", "16677216" );
			$DB_VisImg.= " '".$return['new_file']."',";
			$DB_VisFileName.= " '".$return['old_file_name']."',";
			}
			for($e=1; $e<=3; $e++ ){
			$p=$e+3;
			$return=iron_upload("DB_VisArchive_$e", time()."$p", "", "../file", "", "16677216" );
			$DB_VisArchive.= " '".$return['new_file']."',";
			$DB_VisName.= " '".$return['old_file_name']."',";
			}
			$UpStr=" `DB_VisUnit`,`DB_VisNum`,`DB_VisTime`,`DB_VisHour`,`DB_VisMinute`,`DB_VisBasis`,`DB_VisContent`,`DB_VisImg_1`,`DB_VisImg_2`,`DB_VisImg_3`,`DB_VisFileName_1`,`DB_VisFileName_2`,`DB_VisFileName_3`,`DB_VisLocation_1`,`DB_VisLocation_2`,`DB_VisLocation_3`,`DB_VisUrl_1`,`DB_VisUrlName_1`,`DB_VisUrl_2`,`DB_VisUrlName_2`,`DB_VisUrl_3`,`DB_VisUrlName_3`,`DB_VisArchive_1`,`DB_VisArchive_2`,`DB_VisArchive_3`,`DB_VisName_1`,`DB_VisName_2`,`DB_VisName_3`,`DB_VisAnnounce`,`DB_AddTime`,`DB_EditUser`";
			$UpStr2=" '$DB_VisUnit','$DB_VisNum','$DB_VisTime','$DB_VisHour','$DB_VisMinute','$DB_VisBasis','$DB_VisContent',$DB_VisImg $DB_VisFileName '$DB_VisLocation_1','$DB_VisLocation_2','$DB_VisLocation_3','$DB_VisUrl_1','$DB_VisUrlName_1','$DB_VisUrl_2','$DB_VisUrlName_2','$DB_VisUrl_3','$DB_VisUrlName_3', $DB_VisArchive $DB_VisName '$DB_VisAnnounce',NOW(),'".$_SESSION['ManUser']."'";
			AddSql("visit","visit_list.php","新增成功!!",$UpStr,$UpStr2);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','參訪紀錄','".$DB_VisUnit."','add',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_VisBasis=="2"){
		$return=iron_upload("DB_VisArchive2_1", time(), "", "../file", "", "16677216" );
if(!empty($DB_VisUnit) && !empty($DB_VisNum) && !empty($DB_VisTime) ){


			$UpStr=" `DB_VisUnit`,`DB_VisNum`,`DB_VisTime`,`DB_VisHour`,`DB_VisMinute`,`DB_VisBasis`,`DB_VisArchive2_1`,`DB_VisName2_1`,`DB_VisAnnounce`,`DB_AddTime`,`DB_EditUser`";
			$UpStr2=" '$DB_VisUnit','$DB_VisNum','$DB_VisTime','$DB_VisHour','$DB_VisMinute','$DB_VisBasis','".$return['new_file']."','".$return['old_file_name']."','$DB_VisAnnounce',NOW(),'".$_SESSION['ManUser']."'";
			AddSql("visit","visit_list.php","新增成功!!",$UpStr,$UpStr2);
			
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','參訪紀錄','".$DB_VisUnit."','add',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_VisBasis=="3"){
		$DB_VisUrl3_1=$_POST['DB_VisUrl3_1'];
if(!empty($DB_VisUnit) && !empty($DB_VisNum) && !empty($DB_VisTime) ){


			$UpStr=" `DB_VisUnit`,`DB_VisNum`,`DB_VisTime`,`DB_VisHour`,`DB_VisMinute`,`DB_VisBasis`,`DB_VisUrl3_1`,`DB_VisAnnounce`,`DB_AddTime`,`DB_EditUser`";
			$UpStr2=" '$DB_VisUnit','$DB_VisNum','$DB_VisTime','$DB_VisHour','$DB_VisMinute','$DB_VisBasis','$DB_VisUrl3_1','$DB_VisAnnounce',NOW(),'".$_SESSION['ManUser']."'";
			AddSql("visit","visit_list.php","新增成功!!",$UpStr,$UpStr2);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','參訪紀錄','".$DB_VisUnit."','add',NOW()";
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
	if (document.form1.DB_VisUnit.value == ""){ErrString = ErrString + "參訪單位" + unescape('%0D%0A')}
	if (document.form1.DB_VisNum.value == ""){ErrString = ErrString + "人數" + unescape('%0D%0A')}
	if (document.form1.DB_VisTime.value == ""){ErrString = ErrString + "時間" + unescape('%0D%0A')}

	if(document.form1.DB_VisUrl_1.value != "" && document.form1.DB_VisUrl_1.value != "http://"){
		if(document.form1.DB_VisUrlName_1.value == ""){ErrString = ErrString + "網址名稱01" + unescape('%0D%0A')}
	}

	if(document.form1.DB_VisUrl_2.value != "" && document.form1.DB_VisUrl_2.value != "http://"){
		if(document.form1.DB_VisUrlName_2.value == ""){ErrString = ErrString + "網址名稱02" + unescape('%0D%0A')}
	}

	if(document.form1.DB_VisUrl_3.value != "" && document.form1.DB_VisUrl_3.value != "http://"){
		if(document.form1.DB_VisUrlName_3.value == ""){ErrString = ErrString + "網址名稱03" + unescape('%0D%0A')}
	}

	if(form1.DB_VisBasis.value ==2){
		if (document.form1.DB_VisArchive2_1.value == ""){ErrString = ErrString + "上傳檔案" + unescape('%0D%0A')}
	}else if(form1.DB_VisBasis.value ==3){
		if (document.form1.DB_VisUrl3_1.value == "" || document.form1.DB_VisUrl3_1.value == "http://"){ErrString = ErrString + "連結網址" + unescape('%0D%0A')}
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> <a href="visit_list.php" class="link_01">參訪紀錄</a> >> <span class="text_12px_02"><strong>新增資料</strong></span></td>
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
<form action="visit_add.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 參 訪 單 位<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisUnit"  type="text" class="text_12px_01" id="DB_VisUnit" size="80" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 人 數<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_VisNum"  type="text" class="text_12px_01" id="DB_VisNum" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 時 間<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <input name="DB_VisTime"  type="text" class="text_12px_01" id="DB_VisTime" maxlength="12" /> 
			  <a href="javascript:calendar('DB_VisTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			  <select name="DB_VisHour" class="text_12px_01" id="DB_VisHour">
			  <? for($h_start=0;$h_start<=24;$h_start++){?>
			  <option value="<? echo iron_give_zero(2,$h_start);?>"><? echo iron_give_zero(2,$h_start);?></option>
			  <? }?>
			  </select> 點
			  <select name="DB_VisMinute" class="text_12px_01" id="DB_VisMinute">
                <option>00</option>
				<option>10</option>
                <option>20</option>
				<option>30</option>
				<option>40</option>
				<option>50</option>
              </select> 分</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <input name="DB_VisAnnounce" type="radio" value="0" checked="checked" />
			  顯示
			  <input name="DB_VisAnnounce" type="radio" value="1" />
			  不顯示</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 現 方 式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <select name="DB_VisBasis" id="DB_VisBasis" class="text_12px_01" onChange="Op_1(this.value)">
                <option value="1">內容頁面</option>
                <option value="2">連結檔案</option>
                <option value="3">連結網址</option>
              </select></td>
		  </tr>
		</table>
			<span id="OpenDIV_1" style="display:block">		
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
				$oFCKeditor->Value		= ""  ;//預設值
				$oFCKeditor->Create() ; 
	?>
				</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisImg_1" type="file" class="text_12px_01" id="DB_VisImg_1" size="30" />
					<input name="DB_VisLocation_1" type="radio" value="1" />
					放置內容上方
					<input name="DB_VisLocation_1" type="radio" value="2" checked="checked" />
					放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisImg_2" type="file" class="text_12px_01" id="DB_VisImg_2" size="30" />
					<input name="DB_VisLocation_2" type="radio" value="1" />
					放置內容上方
					<input name="DB_VisLocation_2" type="radio" value="2" checked="checked" />
					放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisImg_3" type="file" class="text_12px_01" id="DB_VisImg_3" size="30" />
					<input name="DB_VisLocation_3" type="radio" value="1" />
					放置內容上方
					<input name="DB_VisLocation_3" type="radio" value="2" checked="checked" />
					放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_VisUrl_1" type="text" class="text_12px_01" id="DB_VisUrl_1" value="http://" size="40" />
			      名稱：
		          <input name="DB_VisUrlName_1" type="text" class="text_12px_01" id="DB_VisUrlName_1" value="" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_VisUrl_2" type="text" class="text_12px_01" id="DB_VisUrl_2" value="http://" size="40" />
			      名稱：
		          <input name="DB_VisUrlName_2" type="text" class="text_12px_01" id="DB_VisUrlName_2" value="" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_VisUrl_3" type="text" class="text_12px_01" id="DB_VisUrl_3" value="http://" size="40" />
			      名稱：
		          <input name="DB_VisUrlName_3" type="text" class="text_12px_01" id="DB_VisUrlName_3" value="" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisArchive_1" type="file" class="text_12px_01" id="DB_VisArchive_1" size="30" />
				  <!--名稱：
		          <input name="" type="text" class="text_12px_01" value="" size="40" />--></td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisArchive_2" type="file" class="text_12px_01" id="DB_VisArchive_2" size="30" />
				  <!--名稱：
		          <input name="" type="text" class="text_12px_01" value="" size="40" />--></td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisArchive_3" type="file" class="text_12px_01" id="DB_VisArchive_3" size="30" />
				  <!--名稱：
		          <input name="" type="text" class="text_12px_01" value="" size="40" />--></td>
		      </tr>
		  	</table>
			</span>
			<span id="OpenDIV_2" style="display:none">  		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02"><input name="DB_VisArchive2_1" type="file" class="text_12px_01" id="DB_VisArchive2_1" size="30" />
				  <!--名稱：
		          <input name="" type="text" class="text_12px_01" value="" size="40" />--></td>
		      </tr>
			</table>
			</span>
			<span id="OpenDIV_3" style="display:none">   		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連 結 網 址<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_VisUrl3_1" type="text" class="text_12px_01" id="DB_VisUrl3_1" value="http://" size="40" />
			      <!--名稱：
		          <input name="" type="text" class="text_12px_01" value="" size="40" />--></td>
			  </tr>
			</table>
			</span>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" title="新增資料" class="button_01">新增資料</a></div>
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
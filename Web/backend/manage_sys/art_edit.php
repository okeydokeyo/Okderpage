<?php
error_reporting(E_ALL ^ E_DEPRECATED);
/*include "cksession.php";*/
include "../config.php";
include "../function.php";
/*chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_9"); //檢查是否功能權限,否回首頁*/

$DB_ArtID=$_GET['DB_ArtID'];
$arry=SoloSql("article"," `DB_ArtID`='$DB_ArtID'");

$page=$_POST['page'];
$DB_ArtID_no=$_POST['DB_ArtID_no'];
$DB_ArtSort=$_POST['DB_ArtSort'];
$DB_ArtSort_no=$_POST['DB_ArtSort_no'];
$DB_ArtAnnounce=$_POST['DB_ArtAnnounce'];
$DB_ArtBasis=$_POST['DB_ArtBasis'];
$DB_ArtSubject = ereg_replace("'","\'",$_POST['DB_ArtSubject']);

if($DB_ArtBasis=="1"){
		$DB_ArtContent=change_size(ereg_replace("'","\'",$_POST['DB_ArtContent']));

		$DB_ArtYou_1=$_POST['DB_ArtYou_1'];
		$DB_ArtYouLocation_1=$_POST['DB_ArtYouLocation_1'];
		$DB_ArtYou_2=$_POST['DB_ArtYou_2'];
		$DB_ArtYouLocation_2=$_POST['DB_ArtYouLocation_2'];
		$DB_ArtYou_3=$_POST['DB_ArtYou_3'];
		$DB_ArtYouLocation_3=$_POST['DB_ArtYouLocation_3'];

		$DB_ArtFileName_1=$_POST['DB_ArtFileName_1'];
		$DB_ArtFileName_2=$_POST['DB_ArtFileName_2'];
		$DB_ArtFileName_3=$_POST['DB_ArtFileName_3'];
		$DB_ArtLocation_1=$_POST['DB_ArtLocation_1'];
		$DB_ArtLocation_2=$_POST['DB_ArtLocation_2'];
		$DB_ArtLocation_3=$_POST['DB_ArtLocation_3'];				
		$DB_ArtUrl_1=$_POST['DB_ArtUrl_1'];
		$DB_ArtUrlName_1=ereg_replace("'","\'",$_POST['DB_ArtUrlName_1']);
		$DB_ArtUrl_2=$_POST['DB_ArtUrl_2'];
		$DB_ArtUrlName_2=ereg_replace("'","\'",$_POST['DB_ArtUrlName_2']);
		$DB_ArtUrl_3=$_POST['DB_ArtUrl_3'];
		$DB_ArtUrlName_3=ereg_replace("'","\'",$_POST['DB_ArtUrlName_3']);
		if(!empty($DB_ArtSort) && !empty($DB_ArtSubject) ){

	ChangeSortEdit("article","$DB_ArtSort","DB_ArtSort","$DB_ArtSort_no","");

			for($i=1; $i<=3; $i++ ){
				if(!empty($_FILES['DB_ArtImg_'.$i]['name'])){
				$return=iron_upload("DB_ArtImg_$i", time()."$i", "", "../file", "gif,jpg,jpeg,png", "16677216" );
				$DB_ArtImg.= " `DB_ArtImg_".$i."`='".$return['new_file']."',";
				$DB_ArtFileName.= " `DB_ArtFileName_".$i."`='".$return['old_file_name']."',";
				}
			 }
			for($e=1; $e<=3; $e++ ){
				$p=$e+3;
				if(!empty($_FILES['DB_ArtArchive_'.$e]['name'])){
				$return=iron_upload("DB_ArtArchive_$e", time()."$p", "", "../file", "", "16677216" );
				$DB_ArtArchive.= " `DB_ArtArchive_".$e."`='".$return['new_file']."',";
				$DB_ArtName.= "`DB_ArtName_".$e."`='".$return['old_file_name']."',";
				}
			}
			$UpStr=" `DB_ArtAnnounce`='$DB_ArtAnnounce',`DB_ArtSort`='$DB_ArtSort',`DB_ArtBasis`='$DB_ArtBasis',`DB_ArtSubject`='$DB_ArtSubject',`DB_ArtContent`='$DB_ArtContent',`DB_ArtYou_1`='$DB_ArtYou_1',`DB_ArtYou_2`='$DB_ArtYou_2',`DB_ArtYou_3`='$DB_ArtYou_3',`DB_ArtYouLocation_1`='$DB_ArtYouLocation_1',`DB_ArtYouLocation_2`='$DB_ArtYouLocation_2',`DB_ArtYouLocation_3`='$DB_ArtYouLocation_3',$DB_ArtImg $DB_ArtFileName $DB_ArtArchive $DB_ArtName `DB_ArtLocation_1`='$DB_ArtLocation_1',`DB_ArtLocation_2`='$DB_ArtLocation_2',`DB_ArtLocation_3`='$DB_ArtLocation_3',`DB_ArtUrl_1`='$DB_ArtUrl_1',`DB_ArtUrl_2`='$DB_ArtUrl_2',`DB_ArtUrl_3`='$DB_ArtUrl_3',`DB_ArtUrlName_1`='$DB_ArtUrlName_1',`DB_ArtUrlName_2`='$DB_ArtUrlName_2',`DB_ArtUrlName_3`='$DB_ArtUrlName_3',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			EditSql("article","$DB_ArtID_no","DB_ArtID","art_list.php?page=$page","修改成功!!",$UpStr);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','說明文章管理','".$DB_ArtSubject."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_ArtBasis=="2"){
		if(!empty($DB_ArtSort) && !empty($DB_ArtSubject) ){

	ChangeSortEdit("article","$DB_ArtSort","DB_ArtSort","$DB_ArtSort_no","");

			if(!empty($_FILES['DB_ArtArchive2_1']['name'])){
				$return=iron_upload("DB_ArtArchive2_1", time(), "", "../file", "", "16677216" );
				$UpStr=" `DB_ArtAnnounce`='$DB_ArtAnnounce',`DB_ArtSort`='$DB_ArtSort',`DB_ArtBasis`='$DB_ArtBasis',`DB_ArtSubject`='$DB_ArtSubject',`DB_ArtArchive2_1`='".$return['new_file']."',`DB_ArtName2_1`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}else{
				$UpStr=" `DB_ArtAnnounce`='$DB_ArtAnnounce',`DB_ArtSort`='$DB_ArtSort',`DB_ArtBasis`='$DB_ArtBasis',`DB_ArtSubject`='$DB_ArtSubject',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("article","$DB_ArtID_no","DB_ArtID","art_list.php?page=$page","修改成功!!",$UpStr);
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','說明文章管理','".$DB_ArtSubject."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}elseif($DB_ArtBasis=="3"){
		$DB_ArtUrl3_1=$_POST['DB_ArtUrl3_1'];
		if(!empty($DB_ArtSort) && !empty($DB_ArtSubject) ){

	ChangeSortEdit("article","$DB_ArtSort","DB_ArtSort","$DB_ArtSort_no","");

			$UpStr=" `DB_ArtAnnounce`='$DB_ArtAnnounce',`DB_ArtSort`='$DB_ArtSort',`DB_ArtBasis`='$DB_ArtBasis',`DB_ArtSubject`='$DB_ArtSubject',`DB_ArtUrl3_1`='$DB_ArtUrl3_1',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			EditSql("article","$DB_ArtID_no","DB_ArtID","art_list.php?page=$page","修改成功!!",$UpStr);
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','說明文章管理','".$DB_ArtSubject."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
		}
}


?>
<?php 
include_once ("top.php");
?>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
function checklat(){
	var ErrString = "" ;
	if (document.form1.DB_ArtSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_ArtSubject.value == ""){ErrString = ErrString + "標籤名稱" + unescape('%0D%0A')}

	if(document.form1.DB_ArtUrl_1.value != "" && document.form1.DB_ArtUrl_1.value != "http://"){
		if(document.form1.DB_ArtUrlName_1.value == ""){ErrString = ErrString + "網址名稱01" + unescape('%0D%0A')}
	}

	if(document.form1.DB_ArtUrl_2.value != "" && document.form1.DB_ArtUrl_2.value != "http://"){
		if(document.form1.DB_ArtUrlName_2.value == ""){ErrString = ErrString + "網址名稱02" + unescape('%0D%0A')}
	}

	if(document.form1.DB_ArtUrl_3.value != "" && document.form1.DB_ArtUrl_3.value != "http://"){
		if(document.form1.DB_ArtUrlName_3.value == ""){ErrString = ErrString + "網址名稱03" + unescape('%0D%0A')}
	}

	if(form1.DB_ArtBasis.value ==2){
		if (document.form1.DB_ArtArchive2_1.value == ""){ErrString = ErrString + "上傳檔案" + unescape('%0D%0A')}
	}else if(form1.DB_ArtBasis.value ==3){
		if (document.form1.DB_ArtUrl3_1.value == "" || document.form1.DB_ArtUrl3_1.value == "http://"){ErrString = ErrString + "連結網址" + unescape('%0D%0A')}
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

<?php for($l=1;$l<=6;$l++){ ?>
//更換圖片資料
function change_file<?php echo $l;?>( num,DB_FileName ){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('file_show<?php echo $l;?>').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "art_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}
<?php }?>


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
	oHttpReq.open( "GET", "art_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}


//-->
</Script>

<!--top_end-->
<table width="955" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="203" align="left" valign="top">
<!--menu-->
<?php 
include_once ("left_menu.php");
?>
<!--menu_end-->
	</td>
    <td width="752" align="left" valign="top">
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" valign="middle"><img src="images/gray_01.gif" width="10" height="20" /></td>
		<td align="left" valign="middle"><img src="images/icon_a1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;<strong><?php echo $userauth['DB_ManName'];?></strong> 歡迎登入!!&nbsp;&nbsp;</td>
		<td align="left" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理 >> <a href="art_list.php" class="link_01">說明文章管理</a> >> <span class="text_12px_02"><strong>編輯資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>說明文章管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="art_list.php" class="button_04">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="art_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><input name="DB_ArtSort"  type="text" class="text_12px_01" id="DB_ArtSort" value="<?php echo $arry['DB_ArtSort'];?>" size="3" />
			<input  type="hidden" name="DB_ArtSort_no" value="<?php echo $arry['DB_ArtSort'];?>"></td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <input name="DB_ArtAnnounce" type="radio" value="0" <?php if($arry['DB_ArtAnnounce']=="0"){echo "checked";}?>/>顯示
			  <input name="DB_ArtAnnounce" type="radio" value="1" <?php if($arry['DB_ArtAnnounce']=="1"){echo "checked";}?> />不顯示</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 籤 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_ArtSubject"  type="text" class="text_12px_01" id="DB_ArtSubject" value="<?php echo $arry['DB_ArtSubject'];?>" size="80" maxlength="12" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 現 方 式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <select name="DB_ArtBasis" id="DB_ArtBasis" class="text_12px_01" onChange="Op_1(this.value)">
              <option value="1" <?php if($arry['DB_ArtBasis']=="1"){echo "selected";}?>>內容頁面</option>
              <option value="2" <?php if($arry['DB_ArtBasis']=="2"){echo "selected";}?>>連結附件</option>
              <option value="3" <?php if($arry['DB_ArtBasis']=="3"){echo "selected";}?>>連結網址</option>
              </select></td>
		  </tr>
		</table>
			<span id="OpenDIV_1" style="display:<?php if($arry['DB_ArtBasis']=="1"){echo "block";}else{echo "none";}?>">		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 內 容<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
		  <?php
				
				include("../FCKeditor/fckeditor.php") ; 
				$sBasePath = '../FCKeditor/' ;
				$oFCKeditor = new FCKeditor('DB_ArtContent') ;//表單名稱
				$oFCKeditor->BasePath	= $sBasePath ; 
				$oFCKeditor->Config['CustomConfigurationsPath'] = '../../FCKeditor/custom.js' ;
				$oFCKeditor->ToolbarSet =  "my1";
				$oFCKeditor->Width  = '96%' ;
				$oFCKeditor->Height = '500' ;
				$oFCKeditor->Value		= "".re_change_size($arry['DB_ArtContent']).""  ;//預設值
				$oFCKeditor->Create() ; 
		  ?>
				</td>
		      </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(1)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_ArtYou_1" cols="50" rows="5" class="text_12px_01" id="DB_ArtYou_1"><?php echo $arry['DB_ArtYou_1'];?></textarea>
					<input name="DB_ArtYouLocation_1" type="radio" value="1" <?php if($arry['DB_ArtYouLocation_1']=="1"){echo "checked";}?> />
					放置內容上方
					<input name="DB_ArtYouLocation_1" type="radio" value="2" <?php if($arry['DB_ArtYouLocation_1']=="2"){echo "checked";}?> />
					放置內容下方
                </td>
              </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(2)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_ArtYou_2" cols="50" rows="5" class="text_12px_01" id="DB_ArtYou_2"><?php echo $arry['DB_ArtYou_2'];?></textarea>
					<input name="DB_ArtYouLocation_2" type="radio" value="1" <?php if($arry['DB_ArtYouLocation_2']=="1"){echo "checked";}?> />
					放置內容上方
					<input name="DB_ArtYouLocation_2" type="radio" value="2" <?php if($arry['DB_ArtYouLocation_2']=="2"){echo "checked";}?> />
					放置內容下方</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 嵌入YouTube(3)</td>
                <td align="left" valign="top" class="border_02"><textarea name="DB_ArtYou_3" cols="50" rows="5" class="text_12px_01" id="DB_ArtYou_3"><?php echo $arry['DB_ArtYou_3'];?></textarea>
					<input name="DB_ArtYouLocation_3" type="radio" value="1" <?php if($arry['DB_ArtYouLocation_3']=="1"){echo "checked";}?> />
					放置內容上方
					<input name="DB_ArtYouLocation_3" type="radio" value="2" <?php if($arry['DB_ArtYouLocation_3']=="2"){echo "checked";}?> />
					放置內容下方</td>
              </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show1">
			<?php
			if(!empty($arry['DB_ArtImg_1']) && !empty($arry['DB_ArtFileName_1'])){
			?>
			<a href="../file/<?php echo $arry['DB_ArtImg_1'];?>" target="_blank"><?php echo $arry['DB_ArtFileName_1'];?></a> <a href="javascript:change_file1(<?php echo $arry['DB_ArtID'];?>,'DB_ArtImg_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<?php 
			}elseif(empty($arry['DB_ArtImg_1']) && empty($arry['DB_ArtFileName_1'])){
			?>
			<input name="DB_ArtImg_1" type="file" id="DB_ArtImg_1" />  
			<?php }?>
			</span>
			<input name="DB_ArtLocation_1" type="radio" value="1" <?php if($arry['DB_ArtLocation_1']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_ArtLocation_1" type="radio" value="2" <?php if($arry['DB_ArtLocation_1']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show2">
			<?php
			if(!empty($arry['DB_ArtImg_2']) && !empty($arry['DB_ArtFileName_2'])){
			?>
			<a href="../file/<?php echo $arry['DB_ArtImg_2'];?>" target="_blank"><?php echo $arry['DB_ArtFileName_2'];?></a> <a href="javascript:change_file2(<?php echo $arry['DB_ArtID'];?>,'DB_ArtImg_2');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<?php 
			}elseif(empty($arry['DB_ArtImg_2']) && empty($arry['DB_ArtFileName_2'])){
			?>
			<input name="DB_ArtImg_2" type="file" id="DB_ArtImg_2" />  
			<?php }?>
			</span>
			<input name="DB_ArtLocation_2" type="radio" value="1" <?php if($arry['DB_ArtLocation_2']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_ArtLocation_2" type="radio" value="2" <?php if($arry['DB_ArtLocation_2']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show3">
			<?php
			if(!empty($arry['DB_ArtImg_3']) && !empty($arry['DB_ArtFileName_3'])){
			?>
			<a href="../file/<?php echo $arry['DB_ArtImg_3'];?>" target="_blank"><?php echo $arry['DB_ArtFileName_3'];?></a> <a href="javascript:change_file3(<?php echo $arry['DB_ArtID'];?>,'DB_ArtImg_3');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<?php 
			}elseif(empty($arry['DB_ArtImg_3']) && empty($arry['DB_ArtFileName_3'])){
			?>
			<input name="DB_ArtImg_3" type="file" id="DB_ArtImg_3" />  
			<?php }?>
			</span>
			<input name="DB_ArtLocation_3" type="radio" value="1" <?php if($arry['DB_ArtLocation_3']=="1"){echo "checked";}?>/>
			放置內容上方
			<input name="DB_ArtLocation_3" type="radio" value="2" <?php if($arry['DB_ArtLocation_3']=="2"){echo "checked";}?>/>
			放置內容下方</td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_ArtUrl_1" type="text" class="text_12px_01" id="DB_ArtUrl_1" value="<?php echo $arry['DB_ArtUrl_1'];?>" size="40" />
			      名稱：
		          <input name="DB_ArtUrlName_1" type="text" class="text_12px_01" id="DB_ArtUrlName_1" value="<?php echo $arry['DB_ArtUrlName_1'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_ArtUrl_2" type="text" class="text_12px_01" id="DB_ArtUrl_2" value="<?php echo $arry['DB_ArtUrl_2'];?>" size="40" />
			      名稱：
		          <input name="DB_ArtUrlName_2" type="text" class="text_12px_01" id="DB_ArtUrlName_2" value="<?php echo $arry['DB_ArtUrlName_2'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 相 關 網 站(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
				  <input name="DB_ArtUrl_3" type="text" class="text_12px_01" id="DB_ArtUrl_3" value="<?php echo $arry['DB_ArtUrl_3'];?>" size="40" />
			      名稱：
		          <input name="DB_ArtUrlName_3" type="text" class="text_12px_01" id="DB_ArtUrlName_3" value="<?php echo $arry['DB_ArtUrlName_3'];?>" size="40" /></td>
			  </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(1)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show4">
			<?php
			if(!empty($arry['DB_ArtArchive_1']) && !empty($arry['DB_ArtName_1'])){
			?>
			<a href="download.php?DB_FileTitle=<?php echo urlencode($arry['DB_ArtName_1']);?>&DB_FileName=<?php echo $arry['DB_ArtArchive_1'];?>"><?php echo $arry['DB_ArtName_1'];?></a> <a href="javascript:change_file4(<?php echo $arry['DB_ArtID'];?>,'DB_ArtArchive_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<?php 
			}elseif(empty($arry['DB_ArtArchive_1']) && empty($arry['DB_ArtName_1'])){
			?>
			<input name="DB_ArtArchive_1" type="file" id="DB_ArtArchive_1" />
			<?php }?>
			</span>
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(2)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show5">
			<?php
			if(!empty($arry['DB_ArtArchive_2']) && !empty($arry['DB_ArtName_2'])){
			?>
			<a href="download.php?DB_FileTitle=<?php echo urlencode($arry['DB_ArtName_2']);?>&DB_FileName=<?php echo $arry['DB_ArtArchive_2'];?>"><?php echo $arry['DB_ArtName_2'];?></a> <a href="javascript:change_file5(<?php echo $arry['DB_ArtID'];?>,'DB_ArtArchive_2');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<?php 
			}elseif(empty($arry['DB_ArtArchive_2']) && empty($arry['DB_ArtName_2'])){
			?>
			<input name="DB_ArtArchive_2" type="file" id="DB_ArtArchive_2" />
			<?php }?>
			</span>
				  </td>
		      </tr>
			  <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案(3)</td>
			    <td width="85%" align="left" valign="top" class="border_02">
			<span id="file_show6">
			<?php
			if(!empty($arry['DB_ArtArchive_3']) && !empty($arry['DB_ArtName_3'])){
			?>
			<a href="download.php?DB_FileTitle=<?php echo urlencode($arry['DB_ArtName_3']);?>&DB_FileName=<?php echo $arry['DB_ArtArchive_3'];?>"><?php echo $arry['DB_ArtName_3'];?></a> <a href="javascript:change_file6(<?php echo $arry['DB_ArtID'];?>,'DB_ArtArchive_3');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
			<?php 
			}elseif(empty($arry['DB_ArtArchive_3']) && empty($arry['DB_ArtName_3'])){
			?>
			<input name="DB_ArtArchive_3" type="file" id="DB_ArtArchive_3" />
			<?php }?>
			</span>
				  </td>
		      </tr>
		  	</table>
			</span>
			<span id="OpenDIV_2" style="display:<?php if($arry['DB_ArtBasis']=="2"){echo "block";}else{echo "none";}?>">  		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 檔 案<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
		<span id="file1">
		<?php
		if(!empty($arry['DB_ArtArchive2_1']) && !empty($arry['DB_ArtName2_1'])){
		?>
		<a href="download.php?DB_FileTitle=<?php echo urlencode($arry['DB_ArtName2_1']);?>&DB_FileName=<?php echo $arry['DB_ArtArchive2_1'];?>"><?php echo $arry['DB_ArtName2_1'];?></a> <a href="javascript:change1(<?php echo $arry['DB_ArtID'];?>,'DB_ArtArchive2_1');"><img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" /></a>
		<?php 
		}elseif(empty($arry['DB_ArtArchive2_1']) && empty($arry['DB_ArtName2_1'])){
		?>
		<input name="DB_ArtArchive2_1" type="file" id="DB_ArtArchive2_1" />
		<?php }?>
		</span>
				  </td>
		      </tr>
			</table>
			</span>
			<span id="OpenDIV_3" style="display:<?php if($arry['DB_ArtBasis']=="3"){echo "block";}else{echo "none";}?>">   		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
			    <td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連 結 網 址<font color="red">*</font></td>
			    <td width="85%" align="left" valign="top" class="border_02">
				<input name="DB_ArtUrl3_1" type="text" class="text_12px_01" id="DB_ArtUrl3_1" value="<?php echo $arry['DB_ArtUrl3_1'];?>" size="40" />
				  </td>
			  </tr>
			</table>
			</span>
		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checklat();" class="button_01">修改資料</a></div>
	    <input  type="hidden" name="page" value="<?php echo $_GET['page'];?>">	 
	    <input  type="hidden" name="DB_ArtID_no" value="<?php echo $_GET['DB_ArtID'];?>">
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
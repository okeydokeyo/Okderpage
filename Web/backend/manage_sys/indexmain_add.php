<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_5"); //檢查是否功能權限,否回首頁



$DB_IntSort = $_POST['DB_IntSort'];
$DB_IntSubject = ereg_replace("'","\'",$_POST['DB_IntSubject']);
$DB_IntBasis = $_POST['DB_IntBasis'];
$DB_IntNumID = $_POST['DB_IntNumID'];
$DB_IntOrdi = $_POST['DB_IntOrdi'];
$DB_IntArticle = $_POST['DB_IntArticle'];
$DB_IntDownload = $_POST['DB_IntDownload'];
$DB_IntFaq = $_POST['DB_IntFaq'];
$DB_IntWebsite = $_POST['DB_IntWebsite'];
$DB_IntVisit = $_POST['DB_IntVisit'];


if( !empty($DB_IntSort) && !empty($DB_IntSubject) && !empty($DB_IntBasis) ){
     
	                ChangeSortAdd("inter",$DB_IntSort,"DB_IntSort",""); //修改排序	
	                
					//新增
					$UpStr = "`DB_IntSort`,`DB_IntSubject`,`DB_IntBasis`,`DB_IntNumID`,`DB_IntOrdi`,`DB_IntArticle`,`DB_IntDownload`,`DB_IntFaq`,`DB_IntWebsite`,`DB_IntVisit`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$DB_IntSort','$DB_IntSubject','$DB_IntBasis','$DB_IntNumID','$DB_IntOrdi','$DB_IntArticle','$DB_IntDownload','$DB_IntFaq','$DB_IntWebsite','$DB_IntVisit',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("inter","indexmain_list.php","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','中間選單管理','".$DB_IntSubject."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
}     
?>

<? 
include_once ("top.php");
?>

<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
<!--



//更換文件資料
function change1( num ){

	if(num==1){
	document.getElementById('OpenDIV_1').style.display = 'block';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.getElementById('OpenDIV_5').style.display = 'none';
	document.getElementById('OpenDIV_6').style.display = 'none';
	/*document.getElementById('Cs_1').style.borderBottom = '1px solid #e7e7e7';
	document.getElementById('Cs_2').style.borderBottom = '';
	document.getElementById('Cs_3').style.borderBottom = '';
	document.getElementById('Cs_4').style.borderBottom = '';
	document.getElementById('Cs_5').style.borderBottom = '';
	document.getElementById('Cs_6').style.borderBottom = '';
    document.form1.check1.value = "yes";
    document.form1.check2.value = "";
    document.form1.check3.value = "";*/	
	}else if(num==2){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'block';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.getElementById('OpenDIV_5').style.display = 'none';
	document.getElementById('OpenDIV_6').style.display = 'none';
	/*document.getElementById('Cs_1').style.borderBottom = '';
	document.getElementById('Cs_2').style.borderBottom = '1px solid #e7e7e7';	
	document.getElementById('Cs_3').style.borderBottom = '';
	document.getElementById('Cs_4').style.borderBottom = '';
	document.getElementById('Cs_5').style.borderBottom = '';
	document.getElementById('Cs_6').style.borderBottom = '';
	document.form1.check1.value = "";
    document.form1.check2.value = "yes";
    document.form1.check3.value = "";*/
	}else if(num==4){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'block';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.getElementById('OpenDIV_5').style.display = 'none';
	document.getElementById('OpenDIV_6').style.display = 'none';
	/*document.getElementById('Cs_1').style.borderBottom = '';
	document.getElementById('Cs_2').style.borderBottom = '';
	document.getElementById('Cs_3').style.borderBottom = '1px solid #e7e7e7';
	document.getElementById('Cs_4').style.borderBottom = '';
	document.getElementById('Cs_5').style.borderBottom = '';
	document.getElementById('Cs_6').style.borderBottom = '';
    document.form1.check1.value = "";
    document.form1.check2.value = "";
    document.form1.check3.value = "yes";*/	
	}else if(num==6){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'block';
	document.getElementById('OpenDIV_5').style.display = 'none';
	document.getElementById('OpenDIV_6').style.display = 'none';
	/*document.getElementById('Cs_1').style.borderBottom = '';
	document.getElementById('Cs_2').style.borderBottom = '';
	document.getElementById('Cs_3').style.borderBottom = '';
	document.getElementById('Cs_4').style.borderBottom = '1px solid #e7e7e7';
	document.getElementById('Cs_5').style.borderBottom = '';
	document.getElementById('Cs_6').style.borderBottom = '';
    document.form1.check1.value = "";
    document.form1.check2.value = "";
    document.form1.check3.value = "yes";*/	
	}else if(num==7){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.getElementById('OpenDIV_5').style.display = 'block';
	document.getElementById('OpenDIV_6').style.display = 'none';
	/*document.getElementById('Cs_1').style.borderBottom = '';
	document.getElementById('Cs_2').style.borderBottom = '';
	document.getElementById('Cs_3').style.borderBottom = '';
	document.getElementById('Cs_4').style.borderBottom = '';
	document.getElementById('Cs_5').style.borderBottom = '1px solid #e7e7e7';
	document.getElementById('Cs_6').style.borderBottom = '';
    document.form1.check1.value = "";
    document.form1.check2.value = "";
    document.form1.check3.value = "yes";*/	
	}else if(num==8){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.getElementById('OpenDIV_5').style.display = 'none';
	document.getElementById('OpenDIV_6').style.display = 'block';
	/*document.getElementById('Cs_1').style.borderBottom = '';
	document.getElementById('Cs_2').style.borderBottom = '';
	document.getElementById('Cs_3').style.borderBottom = '';
	document.getElementById('Cs_4').style.borderBottom = '';
	document.getElementById('Cs_5').style.borderBottom = '';
	document.getElementById('Cs_6').style.borderBottom = '1px solid #e7e7e7';
    document.form1.check1.value = "";
    document.form1.check2.value = "";
    document.form1.check3.value = "yes";*/	
	}else{
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.getElementById('OpenDIV_5').style.display = 'none';
	document.getElementById('OpenDIV_6').style.display = 'none';
	/*document.getElementById('Cs_1').style.borderBottom = '';
	document.getElementById('Cs_2').style.borderBottom = '';
	document.getElementById('Cs_3').style.borderBottom = '';
	document.getElementById('Cs_4').style.borderBottom = '';
	document.getElementById('Cs_5').style.borderBottom = '';
	document.getElementById('Cs_6').style.borderBottom = '';
    document.form1.check1.value = "";
    document.form1.check2.value = "";
    document.form1.check3.value = "yes";*/	
	}


	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('show1').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "indexmain_file.php?num="+num+"&rand="+rand(), true );  
	oHttpReq.send(null);
}


function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_IntSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_IntSubject.value == ""){ErrString = ErrString + "選單名稱" + unescape('%0D%0A')}
	if (document.form1.DB_IntBasis.value == ""){ErrString = ErrString + "網頁選單功能" + unescape('%0D%0A')}
    
	
	/*if(document.form1.check2.value == "yes"){
		if(document.form1.DB_LefUrl.value == ""){ErrString = ErrString + "附件網址" + unescape('%0D%0A')}
	}

	if(document.form1.check3.value == "yes"){
		if (document.form1.DB_LefName.value == ""){ErrString = ErrString + "附件檔案" + unescape('%0D%0A')}
	}*/
	
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	

	return true;
}



-->
</script>
<form action="indexmain_add.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理>> 中間選單管理 >> <span class="text_12px_02"><strong>新增資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>中間選單管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="indexmain_list.php" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排序<font color="red">*</font></td>
			<td width="82%" align="left" valign="top" class="border_02">
<?
//左側選單管理查詢
$inter_result = mysql_query("select * from `inter` where 1") or die("查詢失敗in");
$inter_num = mysql_num_rows($inter_result);
?>			  
			  <input name="DB_IntSort" value="<? if ($inter_num == "0"){echo "1";}else{echo $inter_num+1;}?>" type="text" class="text_12px_01"  size="3" maxlength="3" />
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 選單名稱 <font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_IntSubject" value="" type="text" class="text_12px_01"/></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 選單連結方式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  
			  <select name="DB_IntBasis" onChange="change1(this.value);">
			  <option value="">請選擇</option>
			  <option value="1">條列式訊息管理</option>
			  <option value="2">說明文章管理</option>
			  <option value="3">行事曆</option>
			  <option value="4">檔案下載</option>
			  <option value="5">網路相簿</option>
			  <option value="6">常見問題</option>
			  <option value="7">網站連結</option>
			  <option value="8">參訪紀錄</option>
			  </select>
		<span id="show1">
			  <select name="DB_IntNumID">
			    <option value=""></option>
			  </select>
	    </span>
			</td>
		  </tr>
		</table>

<span id="OpenDIV_1" style="display:none">			    
				<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
				   <tr>
			          <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 條列式管理<font color="red">&nbsp;</font></td>
			          <td width="82%" align="left" valign="top" class="border_02">顯示			    
			                 <input name="DB_IntOrdi" value="" type="text" class="text_12px_01" size="3" maxlength="3" />則，其餘要點選更多才能看到。
			          </td>
		           </tr>
				</table>
</span>				

<span id="OpenDIV_2" style="display:none">			    
				<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
				   <tr>
			          <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 說明文章管理<font color="red">&nbsp;</font></td>
			          <td width="82%" align="left" valign="top" class="border_02">顯示文字內容到			    
			                 <input name="DB_IntArticle" value="" type="text" class="text_12px_01" size="3" maxlength="3" />行
			          </td>
		           </tr>
				</table>
</span>							

<span id="OpenDIV_3" style="display:none">			    
				<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
				   <tr>
			          <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 檔案下載<font color="red">&nbsp;</font></td>
			          <td width="82%" align="left" valign="top" class="border_02">顯示			    
			                 <input name="DB_IntDownload" value="" type="text" class="text_12px_01" size="3" maxlength="3" />則，其餘要點選更多才能看到。
			          </td>
		           </tr>
				</table>
</span>			

<span id="OpenDIV_4" style="display:none">			    
				<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
				   <tr>
			          <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 常見問題<font color="red">&nbsp;</font></td>
			          <td width="82%" align="left" valign="top" class="border_02">顯示			    
			                 <input name="DB_IntFaq" value="" type="text" class="text_12px_01" size="3" maxlength="3" />本，其餘要點選更多才能看到。
			          </td>
		           </tr>
				</table>
</span>			

<span id="OpenDIV_5" style="display:none">			    
				<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
				   <tr>
			          <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 網站連結<font color="red">&nbsp;</font></td>
			          <td width="82%" align="left" valign="top" class="border_02">顯示			    
			                 <input name="DB_IntWebsite" value="" type="text" class="text_12px_01" size="3" maxlength="3" />則，其餘要點選更多才能看到。
			          </td>
		           </tr>
				</table>
</span>			

<span id="OpenDIV_6" style="display:none">			    
				<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
				   <tr>
			          <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 參訪紀錄<font color="red">&nbsp;</font></td>
			          <td width="82%" align="left" valign="top" class="border_02">顯示			    
			                 <input name="DB_IntVisit" value="" type="text" class="text_12px_01" size="3" maxlength="3" />則，其餘要點選更多才能看到。
			          </td>
		           </tr>
				</table>
</span>				

		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" title="新增資料" class="button_01">新增資料</a></div>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
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
</form>	
<!--bottom-->
<? 
include_once ("bottom.php");
?>
<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
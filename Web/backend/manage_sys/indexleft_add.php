<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁


//左側選單標籤管理查詢
$DB_LefTagID = $_GET['DB_LefTagID'];
$ary = SoloSql("left_tags","`DB_LefTagID`='$DB_LefTagID'");

$LefTagID = $_POST['LefTagID'];
$DB_LefSort = $_POST['DB_LefSort'];
$DB_LefSubject = ereg_replace("'","\'",$_POST['DB_LefSubject']);
$DB_LefClass = $_POST['DB_LefClass'];
$DB_LefBasis = $_POST['DB_LefBasis'];
$DB_LefNumID = $_POST['DB_LefNumID'];
//$DB_LefUrl = ereg_replace("'","\'",$_POST['DB_LefUrl']);


if( !empty($DB_LefSort) && !empty($DB_LefSubject) ){
     
	 ChangeSortAdd("left",$DB_LefSort,"DB_LefSort"," && `DB_LefTagID`='".$LefTagID."'"); //修改排序
	 $arry2 = SoloSql("left_tags","`DB_LefTagID`='".$LefTagID."'");
	    
	 //if ($DB_LefClass == "1"){
	                
					//新增
					$UpStr = "`DB_LefTagID`,`DB_LefSort`,`DB_LefSubject`,`DB_LefClass`,`DB_LefBasis`,`DB_LefNumID`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$LefTagID','$DB_LefSort','$DB_LefSubject','$DB_LefClass','$DB_LefBasis','$DB_LefNumID',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("left","indexleft_list.php?DB_LefTagID=$LefTagID","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理-".ereg_replace("'","\'",$arry2['DB_LefTagSubject'])."','".ereg_replace("'","\'",$DB_LefSubject)."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);

     /*}else if ($DB_LefClass == "2"){
	 
					//新增
					$UpStr = "`DB_LefTagID`,`DB_LefSort`,`DB_LefSubject`,`DB_LefClass`,`DB_LefUrl`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$LefTagID','$DB_LefSort','$DB_LefSubject','$DB_LefClass','$DB_LefUrl',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("left","indexleft_list.php?DB_LefTagID=$LefTagID","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理-".ereg_replace("'","\'",$arry2['DB_LefTagSubject'])."','".ereg_replace("'","\'",$DB_LefSubject)."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
				 
	 }else if ($DB_LefClass == "3"){
	                
					$return = iron_upload("DB_LefName", time(), "", "../file", "", "16677216" );
					
					//新增
					$UpStr = "`DB_LefTagID`,`DB_LefSort`,`DB_LefSubject`,`DB_LefClass`,`DB_LefName`,`DB_LefArchive`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$LefTagID','$DB_LefSort','$DB_LefSubject','$DB_LefClass','".$return['old_file_name']."','".$return['new_file']."',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("left","indexleft_list.php?DB_LefTagID=$LefTagID","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理-".ereg_replace("'","\'",$arry2['DB_LefTagSubject'])."','".ereg_replace("'","\'",$DB_LefSubject)."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
				 
	 }*/
}
?>

<? 
include_once ("top.php");
?>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
<!--
/*function Op_1(Chkid){
	if(Chkid==1){
	document.getElementById('OpenDIV_1').style.display = 'block';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
    document.form1.check1.value = "yes";
    document.form1.check2.value = "";
    document.form1.check3.value = "";	
	}else if(Chkid==2){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'block';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.form1.check1.value = "";
    document.form1.check2.value = "yes";
    document.form1.check3.value = "";
	}else if(Chkid==3){
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'block';
    document.form1.check1.value = "";
    document.form1.check2.value = "";
    document.form1.check3.value = "yes";	
	}
}*/


//更換文件資料
function change1( num ){
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
	oHttpReq.open( "GET", "indexleft_file.php?num="+num+"&rand="+rand(), true );  
	oHttpReq.send(null);
}


function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_LefSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_LefSubject.value == ""){ErrString = ErrString + "選單名稱" + unescape('%0D%0A')}
	//if(document.form1.check1.value == "yes"){
		if(document.form1.DB_LefBasis.value == ""){ErrString = ErrString + "網頁選單功能" + unescape('%0D%0A')}
    //}
	
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
<form action="indexleft_add.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理>> 左側選單管理 >> <? echo $ary['DB_LefTagSubject'];?> >> <span class="text_12px_02"><strong>新增資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong><? echo $ary['DB_LefTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="indexleft_list.php?DB_LefTagID=<? echo $_GET['DB_LefTagID'];?>" class="button_01">◎回列表頁</a></div></td>
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
		<td align="left" valign="top">
		  <!--<span class="text_12px_01">●使用說明：<br /> 
		  選單名稱將會出現在首頁的左側，您可以選擇選單連結方式的任一種。<br />
		  (1)連結網頁選單功能將會直接連接到系統內所建置的功能頁面，當前台點選連結會直接連結到您指定功能頁面。<br />
		  (2)連結到網址請您輸入網址以及網址名稱，當前台點選連結會直接連結到您指定網址。<br />
		  (3)連結到附件請您上傳一個不超過2M檔案，當前台點選連結會直接連結到您指定文件。</span>-->
		  <table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排序<font color="red">*</font></td>
			<td width="82%" align="left" valign="top" class="border_02">
<?
//左側選單管理查詢
$left_result = mysql_query("select * from `left` where `DB_LefTagID`='$DB_LefTagID'") or die("查詢失敗le");
$left_num = mysql_num_rows($left_result);
?>			  
			  <input name="DB_LefSort" value="<? if ($left_num == "0"){echo "1";}else{echo $left_num+1;}?>" type="text" class="text_12px_01" size="3" maxlength="3" />
			  <input type="hidden" name="LefTagID" value="<? echo $_GET['DB_LefTagID'];?>" />
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 選單名稱 <font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_LefSubject" value="" type="text" class="text_12px_01" size="30" /></td>
		  </tr>
		  <!--<tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 選單連結方式<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			<select name="DB_LefClass" onChange="Op_1(this.value)">
			  <option value="1">連結網頁選單功能</option>
			  <option value="2">連結附件網址</option>
			  <option value="3">連結附件檔案</option>
			  
			</select>
			  <input type="hidden" name="check1" value="yes">
			  <input type="hidden" name="check2" value="">
			  <input type="hidden" name="check3" value="">
			</td>
		  </tr>-->
		</table>

<!--<span id="OpenDIV_1" style="display:block">	-->		
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>			
			   <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連結網頁選單功能<font color="red">&nbsp;</font></td>
			   <td width="82%" align="left" valign="top" class="border_02">
			  <select name="DB_LefBasis" onChange="change1(this.value);">
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
			  <select name="DB_LefNumID">
			    <option value=""></option>
			  </select>
	    </span>		
                </td>
              </tr>
            </table>
<!--</span>-->						  

<!--<span id="OpenDIV_2" style="display:none">			
			<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
              <tr>
                <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連結到附件網址<font color="red">&nbsp;</font></td>
				<td width="82%" class="border_02">網址：
                  <input name="DB_LefUrl" value="" type="text" class="text_12px_01" size="50"/>
(例如：http://www.abri.gov.tw)</td>
              </tr>
              
            </table>
</span>			

<span id="OpenDIV_3" style="display:none">			  
			  <table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
                <tr>
                  <td width="18%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連結到附件檔案</td>
				  <td width="82%" class="border_02">上傳檔案：                    
                    <input type="file" name="DB_LefName" /></td>
                </tr>
               
              </table>
</span>-->			
		
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

<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
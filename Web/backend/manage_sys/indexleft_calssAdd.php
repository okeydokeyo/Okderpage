<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁


$DB_LefTagSort = $_POST['DB_LefTagSort'];
$DB_LefTagSubject = ereg_replace("'","\'",$_POST['DB_LefTagSubject']);
$DB_LefTagLayer = $_POST['DB_LefTagLayer'];
$DB_LefTagClass = $_POST['DB_LefTagClass'];
$DB_LefTagBasis = $_POST['DB_LefTagBasis'];
$DB_LefTagNumID = $_POST['DB_LefTagNumID'];
$DB_LefTagUrl = ereg_replace("'","\'",$_POST['DB_LefTagUrl']);
$DB_LefTagAnnounce = $_POST['DB_LefTagAnnounce'];


if( !empty($DB_LefTagSort) && !empty($DB_LefTagSubject) ){
    ChangeSortAdd("left_tags",$DB_LefTagSort,"DB_LefTagSort",""); //修改排序    
	if ($DB_LefTagLayer == "2"){  //第二層
        //新增
        $UpStr = "`DB_LefTagSort`,`DB_LefTagSubject`,`DB_LefTagLayer`,`DB_LefTagAnnounce`,`DB_AddTime`,`DB_EditUser`";		
        $UpStr2 = "'$DB_LefTagSort','$DB_LefTagSubject','$DB_LefTagLayer','$DB_LefTagAnnounce',NOW(),'".$_SESSION['ManUser']."'";		
        AddSql("left_tags","indexleft_calss.php","新增成功!!",$UpStr,$UpStr2);			
        //紀錄使用者資訊				
        $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";				
        $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理','".$DB_LefTagSubject."','add',NOW()";		
        Recording_Add("recording",$UpStr,$UpStr2);				
	}
    else if ($DB_LefTagLayer == "1"){ //第一層	 
        if ($DB_LefTagClass == "1"){														
            //新增				            
            $UpStr = "`DB_LefTagSort`,`DB_LefTagSubject`,`DB_LefTagLayer`,`DB_LefTagClass`,`DB_LefTagBasis`,`DB_LefTagNumID`,`DB_LefTagAnnounce`,`DB_AddTime`,`DB_EditUser`, `row`";				            
            $UpStr2 = "'$DB_LefTagSort','$DB_LefTagSubject','$DB_LefTagLayer','$DB_LefTagClass','$DB_LefTagBasis','$DB_LefTagNumID','$DB_LefTagAnnounce',NOW(),'".$_SESSION['ManUser']."', 2";			            
            AddSql("left_tags","indexleft_calss.php","新增成功!!",$UpStr,$UpStr2);										
            //紀錄使用者資訊				            
            $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";			            
            $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理','".$DB_LefTagSubject."','add',NOW()";
            Recording_Add("recording",$UpStr,$UpStr2);
        }
        else if ($DB_LefTagClass == "2"){
				 
								//新增
					            $UpStr = "`DB_LefTagSort`,`DB_LefTagSubject`,`DB_LefTagLayer`,`DB_LefTagClass`,`DB_LefTagUrl`,`DB_LefTagAnnounce`,`DB_AddTime`,`DB_EditUser`";
					            $UpStr2 = "'$DB_LefTagSort','$DB_LefTagSubject','$DB_LefTagLayer','$DB_LefTagClass','$DB_LefTagUrl','$DB_LefTagAnnounce',NOW(),'".$_SESSION['ManUser']."'";
					            AddSql("left_tags","indexleft_calss.php","新增成功!!",$UpStr,$UpStr2);
						
								//紀錄使用者資訊	
					            $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					            $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理','".$DB_LefTagSubject."','add',NOW()";
					            Recording_Add("recording",$UpStr,$UpStr2);
							 
				 }else if ($DB_LefTagClass == "3"){
								
								$return = iron_upload("DB_LefTagName", time(), "", "../file", "", "16677216" );
								
								//新增
					            $UpStr = "`DB_LefTagSort`,`DB_LefTagSubject`,`DB_LefTagLayer`,`DB_LefTagClass`,`DB_LefTagName`,`DB_LefTagArchive`,`DB_LefTagAnnounce`,`DB_AddTime`,`DB_EditUser`";
					            $UpStr2 = "'$DB_LefTagSort','$DB_LefTagSubject','$DB_LefTagLayer','$DB_LefTagClass','".$return['old_file_name']."','".$return['new_file']."','$DB_LefTagAnnounce',NOW(),'".$_SESSION['ManUser']."'";
					            AddSql("left_tags","indexleft_calss.php","新增成功!!",$UpStr,$UpStr2);
						
								//紀錄使用者資訊	
					            $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					            $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理','".$DB_LefTagSubject."','add',NOW()";
					            Recording_Add("recording",$UpStr,$UpStr2);
							 
				 }
	} 					
   
}
?>

<? 
include_once ("top.php");
?>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
<!--

function Op_1(Chkid){
	if(Chkid==1){
	document.getElementById('OpenDIV_1').style.display = 'block';
    document.form1.check1.value = "yes";
	
	}else{
	document.getElementById('OpenDIV_1').style.display = 'none';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.form1.check1.value = "";
    document.form1.check2.value = "";
	document.form1.check3.value = "";
	document.form1.check4.value = "";
	
	}
}


function Op_2(Chkid){
	if(Chkid==1){
	document.getElementById('OpenDIV_1').style.display = 'block';
    document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'block';
	document.form1.check1.value = "yes";
    document.form1.check2.value = "";
	document.form1.check3.value = "";
	document.form1.check4.value = "yes";
	
	}else if(Chkid==2){
	document.getElementById('OpenDIV_1').style.display = 'block';
	document.getElementById('OpenDIV_2').style.display = 'block';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.form1.check1.value = "";
    document.form1.check2.value = "yes";
	document.form1.check3.value = "";
	document.form1.check4.value = "";
	
	}else if(Chkid==3){
	document.getElementById('OpenDIV_1').style.display = 'block';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'block';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.form1.check1.value = "";
    document.form1.check2.value = "";
	document.form1.check3.value = "yes";
	document.form1.check4.value = "";
	
	}else{
	document.getElementById('OpenDIV_1').style.display = 'block';
	document.getElementById('OpenDIV_2').style.display = 'none';
	document.getElementById('OpenDIV_3').style.display = 'none';
	document.getElementById('OpenDIV_4').style.display = 'none';
	document.form1.check1.value = "yes";
    document.form1.check2.value = "";
	document.form1.check3.value = "";
	document.form1.check4.value = "";
	
	}

}


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
	oHttpReq.open( "GET", "indexleft_class_file.php?num="+num+"&rand="+rand(), true );  
	oHttpReq.send(null);
}


function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_LefTagSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
	if (document.form1.DB_LefTagSubject.value == ""){ErrString = ErrString + "標籤名稱" + unescape('%0D%0A')}
	if(document.form1.check1.value == "yes"){
		if(document.form1.DB_LefTagClass.value == ""){ErrString = ErrString + "請選擇連結方式" + unescape('%0D%0A')}
    }
	
	if(document.form1.check4.value == "yes"){
		if(document.form1.DB_LefTagBasis.value == ""){ErrString = ErrString + "請選擇位置" + unescape('%0D%0A')}
    }
	
	if(document.form1.check2.value == "yes"){
		if(document.form1.DB_LefTagUrl.value == ""){ErrString = ErrString + "網址" + unescape('%0D%0A')}
	}

	if(document.form1.check3.value == "yes"){
		if (document.form1.DB_LefTagName.value == ""){ErrString = ErrString + "上傳檔案" + unescape('%0D%0A')}
	}
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	

	return true;
}
-->
</script>
<form action="indexleft_calssAdd.php" enctype="multipart/form-data" method="POST" name="form1" target="FormFrame">
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 導覽列管理 >> <a href="indexleft_calss.php" class="link_01">第二排導覽列管理</a> >> <span class="text_12px_02"><strong>新增標籤</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>第二排導覽列管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="indexleft_calss.php" class="button_04">◎回標籤列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0"><!--target="FormFrame"-->
	  
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top" class="text_12px_01">
		<span class="text_12px_01">●使用說明：<br /> 
		  選單名稱將會出現在首頁的左側，您可以選擇層次及一層選單連結方式的任一種。<br />
		  (1)連結網頁選單功能將會直接連接到系統內所建置的功能頁面，當前台點選連結會直接連結到您指定功能頁面。<br />
		  (2)連結到網址請您輸入網址以及網址名稱，當前台點選連結會直接連結到您指定網址。<br />
		  (3)連結到附件請您上傳一個不超過2M檔案，當前台點選連結會直接連結到您指定文件。</span>
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排 序<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
<?
//左側選單標籤管理查詢
$lefta_result = mysql_query("select * from `left_tags` where 1") or die("查詢失敗lt");
$lefta_num = mysql_num_rows($lefta_result);
?>			
			  <input name="DB_LefTagSort" value="<? if ($lefta_num == "0"){echo "1";}else{echo $lefta_num+1;}?>" type="text" class="text_12px_01" size="3" />
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 籤 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_LefTagSubject" value="" type="text" class="text_12px_01" size="50" /></td>
		  </tr>


		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 選 單 層 次<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			  <input type="hidden" name="check1" value="yes">
			  <input type="hidden" name="check2" value="">
			  <input type="hidden" name="check3" value="">
			  <input type="hidden" name="check4" value="">
			  
			  <select name="DB_LefTagLayer" onChange="Op_1(this.value)" class="text_12px_01">
			  <option value="1">僅一層選單</option>
			  <option value="2">有二層選單</option>
			  </select>
		<span id="OpenDIV_1" style="display:block">	
			  <select name="DB_LefTagClass" onChange="Op_2(this.value)" class="text_12px_01">
			    <option value="">請選擇連結方式</option>
			  <option value="1">連結網頁選單功能</option>
			  <option value="2">連結附件網址</option>
			  <option value="3">連結附件檔案</option>
			  </select>
	    </span>
<span id="OpenDIV_4" style="display:none">			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="text_12px_01">
              <tr>			
			   
			   <td width="82%" align="left" valign="top">
			  <select name="DB_LefTagBasis" onChange="change1(this.value);" class="text_12px_01">
			  <option value="">請選擇位置</option>
			  <option value="1">最新消息管理</option>
			  <option value="2">分頁內容管理</option>
			  <option value="3">行事曆管理</option>
			  <option value="4">檔案下載管理</option>
			  <option value="7">好站連結管理</option>
			  <option value="8">參訪紀錄</option>
              <option value="8">留言板管理</option>
			  </select>
		<span id="show1">
			  <select name="DB_LefTagNumID" class="text_12px_01">
			    <option value=""></option>
			  </select>
	    </span>		
                </td>
              </tr>
            </table>
</span>

<span id="OpenDIV_2" style="display:none">			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="text_12px_01">
              <tr>
                <td width="82%" >網址：
                  <input name="DB_LefTagUrl" value="" type="text" class="text_12px_01" size="50"/>
(例如：http://www.abri.gov.tw)</td>
              </tr>
              <!--<tr>
                <td>網站名稱：
                  <input name="DB_ManEmail2" value="" type="text" class="text_12px_01" size="50"/>
(例如：內政部建築研究所)</td>
              </tr>-->
            </table>
</span>			

<span id="OpenDIV_3" style="display:none">			  
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="text_12px_01">
                <tr>
                  <td width="82%" >上傳檔案：                    
                    <input type="file" name="DB_LefTagName" /></td>
                </tr>
                <!--<tr>
                  <td>檔案名稱：
                    <input name="DB_ManEmail22" value="" type="text" class="text_12px_01" size="50"/>
                    (例如：本所參觀手冊)</td>
                </tr>-->
              </table>
</span>
			</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 顯 示<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <input name="DB_LefTagAnnounce" type="radio" value="0" />是
			  <input name="DB_LefTagAnnounce" type="radio" value="1" checked="checked" />否</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px">
		  <a href="javascript:document.form1.submit();" onClick="return checkinput();" class="button_01">新增</a>&nbsp;
		  <a href="javascript:document.form1.reset();" class="button_01">取消</a>
		</div>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;
		</td>
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
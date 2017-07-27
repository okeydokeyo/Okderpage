<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_10"); //檢查是否功能權限,否回首頁

//行事曆標籤管理查詢
$DB_CalTagID = $_GET['DB_CalTagID'];
$ary = SoloSql("calendar_tags","`DB_CalTagID`='$DB_CalTagID'");

$CalTagID = $_POST['CalTagID'];
$DB_CalGroup = $_POST['DB_CalGroup'];
$DB_CalStartTime = $_POST['DB_CalStartTime'];
$DB_CalEndTime = $_POST['DB_CalEndTime'];
$DB_CalCompany = ereg_replace("'","\'",$_POST['DB_CalCompany']);
$DB_CalFacilities = ereg_replace("'","\'",$_POST['DB_CalFacilities']);
$DB_CalCross = $_POST['DB_CalCross'];
$DB_CalTitle = ereg_replace("'","\'",$_POST['DB_CalTitle']);
$DB_CalContent = ereg_replace("'","\'",$_POST['DB_CalContent']);
$DB_CalAnnounce = $_POST['DB_CalAnnounce'];


if ( !empty($DB_CalEndTime) && !empty($DB_CalStartTime) && !empty($DB_CalTitle) && !empty($DB_CalContent) ){				

				  			  
				  /*$subject = iconv("UTF-8", "Big5","$DB_CalTitle");
				  $message = iconv("UTF-8", "Big5","======================&lt;內政部建築研究所 風雨風洞實驗室-行事曆&gt;====================<br>
	
						以下是行事曆資訊：<br><br>
						標題： ".$DB_CalTitle."<br><br>
						內容：<br>".nl2br($DB_CalContent)."<br><br>
						管理中心 敬上<br>
						================================================================<br>");
				   
				  
					require("class.phpmailer.php");
					$mail = new phpmailer();
					
					$mail->From     = "scottlee@abri.gov.tw";
					$mail->FromName = iconv("UTF-8", "Big5","內政部建築研究所 風雨風洞實驗室");
					$mail->Host     = "msa.hinet.net";
					$mail->Mailer   = "smtp";
					$mail->CharSet="utf8";  
					$mail->IsHTML(true);  
					$mail->Subject ="$subject";
					
					//寄信給所有人員
					$Manager_result = mysql_query("select * from `manager` where 1") or die("查詢失敗3");
					
					while( $Manager_ary = mysql_fetch_array($Manager_result) ){
					
							$to = $Manager_ary['DB_ManEmail'];
							
							// HTML body
							$body = str_replace('="/','="http://'.$_SERVER['SERVER_NAME'].'/',$message);
						
							// Plain text body (for mail clients that cannot read HTML)
											
							//$mail->AddBCC("$arr_add[email]", "");//密件副本
							$mail->Body= $body;
							
						
							//如果要寄多人就多加$mail->AddAddress("寄件者", "");
							$mail->AddAddress("$to", "");
							
							if(!$mail->Send())
								//echo "There has been a mail error sending to " . $to . "<br>";
							// Clear all addresses and attachments for next loop
							$mail->ClearAddresses();
							$mail->ClearAttachments();
					}*/	
					
					//行事曆標籤管理查詢
                    $ary2 = SoloSql("calendar_tags","`DB_CalTagID`='$CalTagID'");						
					$day = date("z",strtotime($DB_CalEndTime)-strtotime($DB_CalStartTime)); //轉成天數
					
					for ($a=0 ;$a<=$day ;$a++){	
					    $ckW = date("w",strtotime($DB_CalStartTime)+($a*86400));        //轉成星期
						$ckDate = date("Y-m-d",strtotime($DB_CalStartTime)+($a*86400)); //轉成日期
						
						if ($DB_CalCross == "0" && $ckW == "6" || $DB_CalCross == "0" && $ckW == "0"){
						}else{					
					       $UpStr = "`DB_CalTagID`,`DB_CalGroup`,`DB_CalStartTime`,`DB_CalCross`,`DB_CalCompany`,`DB_CalFacilities`,`DB_CalTitle`,`DB_CalContent`,`DB_CalAnnounce`,`DB_AddTime`,`DB_EditUser`";
					       $UpStr2 = "'$CalTagID','$DB_CalGroup','$ckDate','$DB_CalCross','$DB_CalCompany','$DB_CalFacilities','$DB_CalTitle','$DB_CalContent','$DB_CalAnnounce',NOW(),'".$_SESSION['ManUser']."'";
			        					
					        mysql_query("insert into `calendar` (".$UpStr.") values (".$UpStr2.")") or die("新增失敗1!!");
						}
					}
					
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','行事曆管理-".ereg_replace("'","\'",$ary2['DB_CalTagSubject'])."','".$DB_CalTitle."','add',NOW()";					
					Recording_Add("recording",$UpStr,$UpStr2);
					
					parent_url_msg("新增成功!!","calendar_list.php?DB_CalTagID=$CalTagID");
							
}
?>

<? 
include_once ("top.php");
?>
<script language="javascript">
//萬年歷
function calendar(x){
	var d = window.open("calendar.php?items="+x,"calendar",'height=230,width=400,top=300,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');
	d.focus();
}



function checkinput(){
	var ErrString = "" ;
	if(document.form1.DB_CalStartTime.value == "" && document.form1.DB_CalEndTime.value == ""){ErrString = ErrString + "日 期" + unescape('%0D%0A')}
	if(document.form1.DB_CalCompany.value == ""){ErrString = ErrString + "廠 商 名 稱" + unescape('%0D%0A')}
	if(document.form1.DB_CalFacilities.value == ""){ErrString = ErrString + "施 作 功 能" + unescape('%0D%0A')}
	if(document.form1.DB_CalTitle.value == ""){ErrString = ErrString + "標 題" + unescape('%0D%0A')}
	if(document.form1.DB_CalContent.value == ""){ErrString = ErrString + "內 容" + unescape('%0D%0A')}
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	

	return true;
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 行事曆管理 >> <? echo $ary['DB_CalTagSubject'];?> >> <span class="text_12px_02"><strong>新增行事曆</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong><? echo $ary['DB_CalTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="calendar_list.php?DB_CalTagID=<? echo $_GET['DB_CalTagID'];?>" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0"><!--target="FormFrame"-->
<form action="calendar_add.php" method="POST" name="form1" target="FormFrame">	 
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 日 期<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02">
<?
//查詢最新行事曆管理群組
$calendar_result = mysql_query("select * from `calendar` where 1 ORDER BY `DB_CalGroup` DESC") or die("查詢失敗ca");
$calendar_ary = mysql_fetch_array($calendar_result);

?>			  
			  <input id="StartTime" name="DB_CalStartTime" value="<? echo date("Y-m-d");?>" type="text" class="text_12px_01"  readonly=""/> 
			  <a href="javascript:calendar('StartTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a> ～
			  <input id="EndTime" name="DB_CalEndTime" value="<? echo date("Y-m-d");?>" type="text" class="text_12px_01" readonly=""/> 
			  <a href="javascript:calendar('EndTime');" class="link_02"><img src="images/icon_calendar.gif" width="28" height="19" border="0" align="top" /></a>
			  <input name="DB_CalAnnounce" type="radio" value="0" />顯示
			  <input name="DB_CalAnnounce" type="radio" value="1"  checked="checked"/>不顯示
			  <input type="hidden" name="CalTagID" value="<? echo $_GET['DB_CalTagID'];?>">
			  <input type="hidden" name="DB_CalGroup" value="<? echo $calendar_ary['DB_CalGroup']+1;?>">
			  
		    </td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 部 門 名 稱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_CalCompany" value="" type="text" class="text_12px_01" size="80" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 施 作 功 能<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_CalFacilities" value="" type="text" class="text_12px_01" size="80" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 跨 六 日<font color="red">*</font></td>
			<td align=" left" valign="top" class="border_02">
			     <input name="DB_CalCross" type="radio" value="0" />是
			     <input name="DB_CalCross" type="radio" value="1"  checked="checked"/>否
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 題<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_CalTitle" value="" type="text" class="text_12px_01" size="80" /></td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 內 容<font color="red">*</font></td>
			<td width="85%" align="left" valign="top" class="border_02"><textarea name="DB_CalContent" cols="110" rows="5" class="text_12px_01"></textarea></td>
		  </tr>
		</table>		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" class="button_01">新增資料</a></div>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="left" valign="top"><img src="images/com_bottom_L.gif" width="5" height="5" /></td>
		<td align="left" valign="top" background="images/com_bottom.gif"></td>
		<td align="left" valign="top"><img src="images/com_bottom_R.gif" width="5" height="5" /></td>
	  </tr>
</form>	  
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
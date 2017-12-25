<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_1"); //檢查是否功能權限,否回首頁


$DB_ManID=$_POST['DB_ManID'];
$page=$_POST['page'];
//$DB_ManUser = ereg_replace("'","\'",$_POST['DB_ManUser']);
$DB_ManPwd = md5($_POST['DB_ManPwd']);
$DB_ManName = ereg_replace("'","\'",$_POST['DB_ManName']);
$DB_ManSex = $_POST['DB_ManSex'];
$DB_ManEmail = $_POST['DB_ManEmail'];
$DB_ManNum = $_POST['DB_ManNum'];
$DB_ManP_1 = $_POST['DB_ManP_1'];
$DB_ManP_2 = $_POST['DB_ManP_2'];
$DB_ManP_3 = $_POST['DB_ManP_3'];
$DB_ManP_4 = $_POST['DB_ManP_4'];
$DB_ManP_5 = $_POST['DB_ManP_5'];
$DB_ManP_6 = $_POST['DB_ManP_6'];
$DB_ManP_7 = $_POST['DB_ManP_7'];
$DB_ManP_8 = $_POST['DB_ManP_8'];
$DB_ManP_9 = $_POST['DB_ManP_9'];
$DB_ManP_10 = $_POST['DB_ManP_10'];
$DB_ManP_11 = $_POST['DB_ManP_11'];
$DB_ManP_12 = $_POST['DB_ManP_12'];
$DB_ManP_13 = $_POST['DB_ManP_13'];
$DB_ManP_14 = $_POST['DB_ManP_14'];
$DB_ManP_15 = $_POST['DB_ManP_15'];
$DB_ManP_16 = $_POST['DB_ManP_16'];
$DB_ManP_17 = $_POST['DB_ManP_17'];
$DB_ManP_18 = $_POST['DB_ManP_18'];
$DB_ManP_19 = $_POST['DB_ManP_19'];
$DB_ManP_20 = $_POST['DB_ManP_20'];
$DB_ManP_21 = $_POST['DB_ManP_21'];

if( !empty($DB_ManName) && !empty($DB_ManEmail) ){
     

     if ($_POST['DB_ManPwd'] != ""){ 
			
			if ($DB_ManNum == "all"){		
			
					//修改
					$UpStr = "`DB_ManPwd`='$DB_ManPwd',`DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail',`DB_ManNum`='$DB_ManNum',`DB_ManP_1`='1',`DB_ManP_2`='1',`DB_ManP_3`='1',`DB_ManP_4`='1',`DB_ManP_5`='1',`DB_ManP_6`='1',`DB_ManP_7`='1',`DB_ManP_8`='1',`DB_ManP_9`='1',`DB_ManP_10`='1',`DB_ManP_11`='1',`DB_ManP_12`='1',`DB_ManP_13`='1',`DB_ManP_14`='1',`DB_ManP_15`='1',`DB_ManP_16`='1',`DB_ManP_17`='1',`DB_ManP_18`='1',`DB_ManP_19`='1',`DB_ManP_20`='1',`DB_ManP_21`='1',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
					EditSql("manager","$DB_ManID","DB_ManID","id_list.php?page=$page","修改成功!!",$UpStr);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
	
            }else if ($DB_ManNum == "part"){
			
					//修改
					$UpStr = "`DB_ManPwd`='$DB_ManPwd',`DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail',`DB_ManNum`='$DB_ManNum',`DB_ManP_1`='$DB_ManP_1',`DB_ManP_2`='$DB_ManP_2',`DB_ManP_3`='$DB_ManP_3',`DB_ManP_4`='$DB_ManP_4',`DB_ManP_5`='$DB_ManP_5',`DB_ManP_6`='$DB_ManP_6',`DB_ManP_7`='$DB_ManP_7',`DB_ManP_8`='$DB_ManP_8',`DB_ManP_9`='$DB_ManP_9',`DB_ManP_10`='$DB_ManP_10',`DB_ManP_11`='$DB_ManP_11',`DB_ManP_12`='$DB_ManP_12',`DB_ManP_13`='$DB_ManP_13',`DB_ManP_14`='$DB_ManP_14',`DB_ManP_15`='$DB_ManP_15',`DB_ManP_16`='$DB_ManP_16',`DB_ManP_17`='$DB_ManP_17',`DB_ManP_18`='$DB_ManP_18',`DB_ManP_19`='$DB_ManP_19',`DB_ManP_20`='$DB_ManP_20',`DB_ManP_21`='$DB_ManP_21',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
					EditSql("manager","$DB_ManID","DB_ManID","id_list.php?page=$page","修改成功!!",$UpStr);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);			
			
			}else{
			
					//修改
					$UpStr = "`DB_ManPwd`='$DB_ManPwd',`DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail',`DB_ManNum`='$DB_ManNum',`DB_ManP_1`='0',`DB_ManP_2`='0',`DB_ManP_3`='0',`DB_ManP_4`='0',`DB_ManP_5`='0',`DB_ManP_6`='0',`DB_ManP_7`='0',`DB_ManP_8`='0',`DB_ManP_9`='0',`DB_ManP_10`='0',`DB_ManP_11`='0',`DB_ManP_12`='0',`DB_ManP_13`='0',`DB_ManP_14`='0',`DB_ManP_15`='0',`DB_ManP_16`='0',`DB_ManP_17`='0',`DB_ManP_18`='0',`DB_ManP_19`='0',`DB_ManP_20`='0',`DB_ManP_21`='0',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
					EditSql("manager","$DB_ManID","DB_ManID","id_list.php?page=$page","修改成功!!",$UpStr);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
								
		    }
			
     }else{  
	 
			if ($DB_ManNum == "all"){		
			
					//修改
					$UpStr = "`DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail',`DB_ManNum`='$DB_ManNum',`DB_ManP_1`='1',`DB_ManP_2`='1',`DB_ManP_3`='1',`DB_ManP_4`='1',`DB_ManP_5`='1',`DB_ManP_6`='1',`DB_ManP_7`='1',`DB_ManP_8`='1',`DB_ManP_9`='1',`DB_ManP_10`='1',`DB_ManP_11`='1',`DB_ManP_12`='1',`DB_ManP_13`='1',`DB_ManP_14`='1',`DB_ManP_15`='1',`DB_ManP_16`='1',`DB_ManP_17`='1',`DB_ManP_18`='1',`DB_ManP_19`='1',`DB_ManP_20`='1',`DB_ManP_21`='1',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
					EditSql("manager","$DB_ManID","DB_ManID","id_list.php?page=$page","修改成功!!",$UpStr);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
	
            }else if ($DB_ManNum == "part"){
			
					//修改
					$UpStr = "`DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail',`DB_ManNum`='$DB_ManNum',`DB_ManP_1`='$DB_ManP_1',`DB_ManP_2`='$DB_ManP_2',`DB_ManP_3`='$DB_ManP_3',`DB_ManP_4`='$DB_ManP_4',`DB_ManP_5`='$DB_ManP_5',`DB_ManP_6`='$DB_ManP_6',`DB_ManP_7`='$DB_ManP_7',`DB_ManP_8`='$DB_ManP_8',`DB_ManP_9`='$DB_ManP_9',`DB_ManP_10`='$DB_ManP_10',`DB_ManP_11`='$DB_ManP_11',`DB_ManP_12`='$DB_ManP_12',`DB_ManP_13`='$DB_ManP_13',`DB_ManP_14`='$DB_ManP_14',`DB_ManP_15`='$DB_ManP_15',`DB_ManP_16`='$DB_ManP_16',`DB_ManP_17`='$DB_ManP_17',`DB_ManP_18`='$DB_ManP_18',`DB_ManP_19`='$DB_ManP_19',`DB_ManP_20`='$DB_ManP_20',`DB_ManP_21`='$DB_ManP_21',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
					EditSql("manager","$DB_ManID","DB_ManID","id_list.php?page=$page","修改成功!!",$UpStr);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);			
			
			}else{
			
					//修改
					$UpStr = "`DB_ManName`='$DB_ManName',`DB_ManSex`='$DB_ManSex',`DB_ManEmail`='$DB_ManEmail',`DB_ManNum`='$DB_ManNum',`DB_ManP_1`='0',`DB_ManP_2`='0',`DB_ManP_3`='0',`DB_ManP_4`='0',`DB_ManP_5`='0',`DB_ManP_6`='0',`DB_ManP_7`='0',`DB_ManP_8`='0',`DB_ManP_9`='0',`DB_ManP_10`='0',`DB_ManP_11`='0',`DB_ManP_12`='0',`DB_ManP_13`='0',`DB_ManP_14`='0',`DB_ManP_15`='0',`DB_ManP_16`='0',`DB_ManP_17`='0',`DB_ManP_18`='0',`DB_ManP_19`='0',`DB_ManP_20`='0',`DB_ManP_21`='0',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
					EditSql("manager","$DB_ManID","DB_ManID","id_list.php?page=$page","修改成功!!",$UpStr);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','edit',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
								
		    }	 
	 
	 }
}
?>

<? 
include_once ("top.php");
?>

<script language="javascript">
<!--
function checkinput(){
	var ErrString = "" ;
	var rege = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/;
	
	if(document.form1.DB_ManPwd.value != ""){
		if(document.form1.DB_ManPwd.value.length < 4){ErrString = ErrString + "密碼長度必須超過4碼" + unescape('%0D%0A')}
		if(document.form1.DB_ManPwd.value != document.form1.ReManPwd.value){ErrString = ErrString + "密碼輸入前後不一致" + unescape('%0D%0A')}
	}
	if (document.form1.DB_ManName.value == ""){ErrString = ErrString + "管理者姓名" + unescape('%0D%0A')}
    if (document.form1.DB_ManEmail.value == ""){ErrString = ErrString + "電子信箱" + unescape('%0D%0A')}
	if(document.form1.DB_ManEmail.value != ""){
		if (rege.exec(document.form1.DB_ManEmail.value) == null){ErrString = ErrString + "請填寫正確的E-mail" + unescape('%0D%0A')}
	}
	
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	

	return true;
}


function all_choose(Chkid){
	
	if (Chkid == "all" || Chkid == "no"){		
					document.getElementById('look').style.display = 'none';
	}else{
                    document.getElementById('look').style.display = 'block';
	}		
		
}
-->
</script>

<?
$DB_ManID = $_GET['DB_ManID'];
$ary = SoloSql("manager","`DB_ManID`='$DB_ManID'");

?>
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 帳號權限管理 >> 帳號管理 >> <span class="text_12px_02"><strong>修改資料資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>帳號管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="id_list.php?page=<? echo $_GET['page'];?>" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form action="id_edit.php" method="POST" name="form1" target="FormFrame">	  
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
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 管理者帳號</td>
			<td width="85%" align="left" valign="top" class="border_02">
			  <? echo $ary['DB_ManUser'];?>&nbsp;
			  <input type="hidden" name="DB_ManID" value="<? echo $ary['DB_ManID'];?>" />
			  <input type="hidden" name="page" value="<? echo $_GET['page'];?>">
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 修 改 密 碼</td>
			<td align="left" valign="top" class="border_02"><input name="DB_ManPwd"  type="password" class="text_12px_01" maxlength="12" /> (英文字母或數字4~12個)</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 確  認  密 碼</td>
			<td align="left" valign="top" class="border_02"><input name="ReManPwd"  type="password" class="text_12px_01" maxlength="12" /> (英文字母或數字4~12個)</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 管理者姓名<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			<input name="DB_ManName" value="<? echo $ary['DB_ManName'];?>" type="text" class="text_12px_01"/>
              <input name="DB_ManSex" type="radio" value="0" <? if ($ary['DB_ManSex'] == "0"){echo "checked";}?> />
              <span class="text_12px_03">先生</span>
              <input name="DB_ManSex" type="radio" value="1" <? if ($ary['DB_ManSex'] == "1"){echo "checked";}?> />
              <span class="text_12px_03">小姐</span></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 電 子 信 箱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_ManEmail" value="<? echo $ary['DB_ManEmail'];?>" type="text" class="text_12px_01" size="50"/></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 權 限 管 理<font color="red">*</font></td>
			<td align="left" valign="middle" class="border_02">
			<table width="100%" border="0" cellpadding="2" cellspacing="0" class="text_03_13px_na">
            <tr>
              <td bgcolor="#f1f1f1">
				  <input name="DB_ManNum" type="radio" value="all" onClick="javascript:onclick:all_choose(this.value);" <? if ($ary['DB_ManNum'] == "all"){echo "checked";}?>/>
                  全部權限
				  <input name="DB_ManNum" type="radio" value="part" onClick="javascript:onclick:all_choose(this.value);" <? if ($ary['DB_ManNum'] == "part"){echo "checked";}?>/>
                  部分權限
                  <input name="DB_ManNum" type="radio" value="no" onClick="javascript:onclick:all_choose(this.value);" <? if ($ary['DB_ManNum'] == "no"){echo "checked";}?>/>
                  無權限者 
			  </td>
            </tr>
            </table>
<span id="look" style="display:<? if ($ary['DB_ManNum'] == "all" || $ary['DB_ManNum'] == "no"){echo "none";}else{echo "block";}?>;">			
			<table width="100%" border="0" cellpadding="2" cellspacing="0" class="text_03_13px_na">
            <tr>
              <td><br />
				<!--01-->
				<div class="border_01">
				<span class="m-title_01">帳號權限管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_1" name="DB_ManP_1" value="1" <? if ($ary['DB_ManP_1'] == "1"){echo "checked";}?>/>
				帳號管理
				</p>
				</div><br />
				<!--02-->
				<div class="border_01">
				<span class="m-title_01">網頁風格管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_2" value="1" <? if ($ary['DB_ManP_2'] == "1"){echo "checked";}?>/>
				形象圖管理				
				<input type="checkbox" id="check_16" name="DB_ManP_16" value="1" <? if ($ary['DB_ManP_16'] == "1"){echo "checked";}?>/>
				 LOGO圖管理
				<input type="checkbox" id="check_3" name="DB_ManP_3" value="1" <? if ($ary['DB_ManP_3'] == "1"){echo "checked";}?>/>
				下方選單管理
				</p>
				</div><br />
				<!--03-->
				<div class="border_01">
				<span class="m-title_01">網頁首頁管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_17" value="1" <? if ($ary['DB_ManP_17'] == "1"){echo "checked";}?>/>
				上方選單管理
				<input type="checkbox" id="check_2" name="DB_ManP_4" value="1" <? if ($ary['DB_ManP_4'] == "1"){echo "checked";}?>/>
				左側選單管理				
				<input type="checkbox" id="check_3" name="DB_ManP_5" value="1" <? if ($ary['DB_ManP_5'] == "1"){echo "checked";}?>/>
				中間選單管理
<!--				<input type="checkbox" id="check_4" name="DB_ManP_6" value="1" <? if ($ary['DB_ManP_6'] == "1"){echo "checked";}?>/>
				相關連結-->
				<input type="checkbox" id="check_7" name="DB_ManP_7" value="1" <? if ($ary['DB_ManP_7'] == "1"){echo "checked";}?>/>
				網站使用率
				</p>
				</div><br />
				<!--04-->
				<div class="border_01">
				<span class="m-title_01">網頁選單管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_8" value="1" <? if ($ary['DB_ManP_8'] == "1"){echo "checked";}?>/>
				條列式訊息管理				
				<input type="checkbox" id="check_3" name="DB_ManP_9" value="1" <? if ($ary['DB_ManP_9'] == "1"){echo "checked";}?>/>
				說明文章管理
				<input type="checkbox" id="check_4" name="DB_ManP_10" value="1" <? if ($ary['DB_ManP_10'] == "1"){echo "checked";}?>/>
				行事曆管理
				<input type="checkbox" id="check_7" name="DB_ManP_11" value="1" <? if ($ary['DB_ManP_11'] == "1"){echo "checked";}?>/>
				檔案下載
				<input type="checkbox" id="check_5" name="DB_ManP_12" value="1" <? if ($ary['DB_ManP_12'] == "1"){echo "checked";}?>/>
				網路相簿
				<input type="checkbox" id="check_6" name="DB_ManP_13" value="1" <? if ($ary['DB_ManP_13'] == "1"){echo "checked";}?>/>
				常見問題
				<input type="checkbox" id="check_6" name="DB_ManP_14" value="1" <? if ($ary['DB_ManP_14'] == "1"){echo "checked";}?>/>
				網站連結
				<input type="checkbox" id="check_6" name="DB_ManP_15" value="1" <? if ($ary['DB_ManP_15'] == "1"){echo "checked";}?>/>
				參訪紀錄<br>
				<input type="checkbox" id="check_6" name="DB_ManP_18" value="1" <? if ($ary['DB_ManP_18'] == "1"){echo "checked";}?>/>
				留言版
				</p>
				</div>
				<br />
				<!--05-->
				<div class="border_01">
				<span class="m-title_01">我要捐款管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_19" value="1" <? if ($ary['DB_ManP_19'] == "1"){echo "checked";}?>/>
				線上ATM捐款管理				
				<input type="checkbox" id="check_3" name="DB_ManP_20" value="1" <? if ($ary['DB_ManP_20'] == "1"){echo "checked";}?>/>
				超商條碼捐款管理
				<input type="checkbox" id="check_4" name="DB_ManP_21" value="1" <? if ($ary['DB_ManP_21'] == "1"){echo "checked";}?>/>
				線上信用卡、郵局轉帳捐款管理
				</p>
				</div>
				<br />
				</td>
              </tr>
            </table>
</span>			
			</td>
		  </tr>
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a></div>
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

<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_1"); //檢查是否功能權限,否回首頁


$DB_ManUser = ereg_replace("'","\'",$_POST['account']);
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

if( !empty($DB_ManUser) && !empty($_POST['DB_ManPwd']) && !empty($DB_ManName) && !empty($DB_ManEmail) ){
     
	
	 //查詢帳號管理 
	 $Manager_result =mysql_query("select * from `manager` where `DB_ManUser`='$DB_ManUser'") or die("查詢失敗m");
     $Manager_num = mysql_num_rows($Manager_result);
		   
	 if ($DB_ManNum == "all"){
	         
		   if ($Manager_num == "0"){ 
					//新增
					$UpStr = "`DB_ManUser`,`DB_ManPwd`,`DB_ManName`,`DB_ManSex`,`DB_ManEmail`,`DB_ManNum`,`DB_ManP_1`,`DB_ManP_2`,`DB_ManP_3`,`DB_ManP_4`,`DB_ManP_5`,`DB_ManP_6`,`DB_ManP_7`,`DB_ManP_8`,`DB_ManP_9`,`DB_ManP_10`,`DB_ManP_11`,`DB_ManP_12`,`DB_ManP_13`,`DB_ManP_14`,`DB_ManP_15`,`DB_ManP_16`,`DB_ManP_17`,`DB_ManP_18`,`DB_ManP_19`,`DB_ManP_20`,`DB_ManP_21`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$DB_ManUser','$DB_ManPwd','$DB_ManName','$DB_ManSex','$DB_ManEmail','$DB_ManNum','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("manager","id_list.php","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
			}else{
			        SHOWTEST("此一帳號已經有人使用了！");
			}
	
     }else if ($DB_ManNum == "part"){
	 
		   if ($Manager_num == "0"){ 
					//新增
					$UpStr = "`DB_ManUser`,`DB_ManPwd`,`DB_ManName`,`DB_ManSex`,`DB_ManEmail`,`DB_ManNum`,`DB_ManP_1`,`DB_ManP_2`,`DB_ManP_3`,`DB_ManP_4`,`DB_ManP_5`,`DB_ManP_6`,`DB_ManP_7`,`DB_ManP_8`,`DB_ManP_9`,`DB_ManP_10`,`DB_ManP_11`,`DB_ManP_12`,`DB_ManP_13`,`DB_ManP_14`,`DB_ManP_15`,`DB_ManP_16`,`DB_ManP_17`,`DB_ManP_18`,`DB_ManP_19`,`DB_ManP_20`,`DB_ManP_21`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$DB_ManUser','$DB_ManPwd','$DB_ManName','$DB_ManSex','$DB_ManEmail','$DB_ManNum','$DB_ManP_1','$DB_ManP_2','$DB_ManP_3','$DB_ManP_4','$DB_ManP_5','$DB_ManP_6','$DB_ManP_7','$DB_ManP_8','$DB_ManP_9','$DB_ManP_10','$DB_ManP_11','$DB_ManP_12','$DB_ManP_13','$DB_ManP_14','$DB_ManP_15','$DB_ManP_16','$DB_ManP_17','$DB_ManP_18','$DB_ManP_19','$DB_ManP_20','$DB_ManP_21',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("manager","id_list.php","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
			}else{
			        SHOWTEST("此一帳號已經有人使用了！");
			}
				 
	 }else{
	 
		   if ($Manager_num == "0"){ 
					//新增
					$UpStr = "`DB_ManUser`,`DB_ManPwd`,`DB_ManName`,`DB_ManSex`,`DB_ManEmail`,`DB_ManNum`,`DB_ManP_1`,`DB_ManP_2`,`DB_ManP_3`,`DB_ManP_4`,`DB_ManP_5`,`DB_ManP_6`,`DB_ManP_7`,`DB_ManP_8`,`DB_ManP_9`,`DB_ManP_10`,`DB_ManP_11`,`DB_ManP_12`,`DB_ManP_13`,`DB_ManP_14`,`DB_ManP_15`,`DB_ManP_16`,`DB_ManP_17`,`DB_ManP_18`,`DB_ManP_19`,`DB_ManP_20`,`DB_ManP_21`,`DB_AddTime`,`DB_EditUser`";
					$UpStr2 = "'$DB_ManUser','$DB_ManPwd','$DB_ManName','$DB_ManSex','$DB_ManEmail','$DB_ManNum','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',NOW(),'".$_SESSION['ManUser']."'";
					AddSql("manager","id_list.php","新增成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".$DB_ManName."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
			}else{
			        SHOWTEST("此一帳號已經有人使用了！");
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
	if (document.form1.account.value == ""){ErrString = ErrString + "管理者帳號" + unescape('%0D%0A')}
	if(document.form1.account.value != ""){
		if(document.form1.account.value.length < 4){ErrString = ErrString + "帳號長度必須超過4碼" + unescape('%0D%0A')}
    }
	if (document.form1.DB_ManPwd.value == ""){ErrString = ErrString + "輸入密碼" + unescape('%0D%0A')}
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 帳號權限管理 >> 帳號管理 >> <span class="text_12px_02"><strong>新增資料</strong></span></td>
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
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="id_list.php" class="button_01">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form action="id_add.php" method="POST" name="form1" target="FormFrame">	  
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
			<td width="85%" align="left" valign="top" class="border_02"><input name="account" value="" type="text" class="text_12px_01" maxlength="12" /> (英文字母或數字4~12個)</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 修 改 密 碼</td>
			<td align="left" valign="top" class="border_02"><input name="DB_ManPwd" value="" type="password" class="text_12px_01" maxlength="12" /> (英文字母或數字4~12個)</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 確  認  密 碼</td>
			<td align="left" valign="top" class="border_02"><input name="ReManPwd" value="" type="password" class="text_12px_01" maxlength="12" /> (英文字母或數字4~12個)</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 管理者姓名<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02">
			<input name="DB_ManName" value="" type="text" class="text_12px_01" />
              <input name="DB_ManSex" type="radio" value="0" checked />
              <span class="text_12px_03">先生</span>
              <input name="DB_ManSex" type="radio" value="1" />
              <span class="text_12px_03">小姐</span></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 電 子 信 箱<font color="red">*</font></td>
			<td align="left" valign="top" class="border_02"><input name="DB_ManEmail" value="" type="text" class="text_12px_01" size="50"/></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 權 限 管 理<font color="red">*</font></td>
			<td align="left" valign="middle" class="border_02">
			<table width="100%" border="0" cellpadding="2" cellspacing="0" class="text_03_13px_na">
            <tr>
              <td bgcolor="#f1f1f1">
				  <input name="DB_ManNum" type="radio" value="all" onClick="javascript:onclick:all_choose(this.value);"/>
                  全部權限
				  <input name="DB_ManNum" type="radio" value="part" onClick="javascript:onclick:all_choose(this.value);"/>
                  部分權限
                  <input name="DB_ManNum" type="radio" value="no" onClick="javascript:onclick:all_choose(this.value);" checked="checked" />
                  無權限者 
			  </td>
            </tr>
            </table>
<span id="look" style="display:none;">			
			<table width="100%" border="0" cellpadding="2" cellspacing="0" class="text_03_13px_na">
            <tr>
              <td><br />
				<!--01-->
				<div class="border_01">
				<span class="m-title_01">帳號權限管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_1" name="DB_ManP_1" value="1" />
				帳號管理
				</p>
				</div><br />
				<!--02-->
				<div class="border_01">
				<span class="m-title_01">網頁風格管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_2" value="1" />
				形象動畫管理				
				<input type="checkbox" id="check_16" name="DB_ManP_16" value="1" />
				 LOGO圖管理
				<input type="checkbox" id="check_3" name="DB_ManP_3" value="1" />
				下方選單管理
				</p>
				</div><br />
				<!--03-->
				<div class="border_01">
				<span class="m-title_01">網頁首頁管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_17" value="1" />
				上方選單管理
				<input type="checkbox" id="check_2" name="DB_ManP_4" value="1" />
				左側選單管理				
				<input type="checkbox" id="check_3" name="DB_ManP_5" value="1" />
				中間選單管理
<!--				<input type="checkbox" id="check_4" name="DB_ManP_6" value="1" />
				相關連結-->
				<input type="checkbox" id="check_7" name="DB_ManP_7" value="1" />
				網站使用率
				</p>
				</div><br />
				<!--04-->
				<div class="border_01">
				<span class="m-title_01">網頁選單管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_8" value="1" />
				條列式訊息管理				
				<input type="checkbox" id="check_3" name="DB_ManP_9" value="1" />
				說明文章管理
				<input type="checkbox" id="check_4" name="DB_ManP_10" value="1" />
				行事曆管理
				<input type="checkbox" id="check_7" name="DB_ManP_11" value="1" />
				檔案下載
				<input type="checkbox" id="check_5" name="DB_ManP_12" value="1" />
				網路相簿
				<input type="checkbox" id="check_6" name="DB_ManP_13" value="1" />
				常見問題
				<input type="checkbox" id="check_6" name="DB_ManP_14" value="1" />
				網站連結
				<input type="checkbox" id="check_6" name="DB_ManP_15" value="1" />
				參訪紀錄<br>
				<input type="checkbox" id="check_6" name="DB_ManP_18" value="1" />
				留言版
				</p>
				</div>
				<br />
				<!--05-->
				<div class="border_01">
				<span class="m-title_01">我要捐款管理</span>
				<p class="margin_01">
				<input type="checkbox" id="check_2" name="DB_ManP_19" value="1" />
				線上ATM捐款管理				
				<input type="checkbox" id="check_3" name="DB_ManP_20" value="1" />
				超商條碼捐款管理
				<input type="checkbox" id="check_4" name="DB_ManP_21" value="1" />
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
		
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">新增資料</a></div>
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
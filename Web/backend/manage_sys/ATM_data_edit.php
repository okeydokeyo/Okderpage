<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁

$no=$_GET['no'];

if(!empty($_POST['name_2'])){
	$name_2=$_POST['name_2'];
}else{
	$name_2="同上";
}

if(!empty($_POST['Id_2'])){
	$Id_2=$_POST['Id_2'];
}else{
	$Id_2="同上";
}

$num=$_POST['num'];
$kind=$_POST['kind'];
$name_1=$_POST['name_1'];
$Id_1=$_POST['Id_1'];
$birth_y_1=$_POST['birth_y_1'];
$birth_m_1=$_POST['birth_m_1'];
$birth_d_1=$_POST['birth_d_1'];
$TEL_1=$_POST['TEL_1'];
$cell_1=$_POST['cell_1'];
$birth_y_2=$_POST['birth_y_2'];
$birth_m_2=$_POST['birth_m_2'];
$birth_d_2=$_POST['birth_d_2'];
$TEL_2=$_POST['TEL_2'];
$cell_2=$_POST['cell_2'];
$Add=$_POST['Add'];
$money=$_POST['money'];
$cash_1=$_POST['cash_1'];
$cash_2=$_POST['cash_2'];
$receipt=$_POST['receipt'];
$periodical=$_POST['periodical'];
$chk_data=$_POST['chk_data'];
$notice_num=$_POST['notice_num'];

if(!empty($name_1) || !empty($Id_1) || !empty($birth_y_1) || !empty($birth_m_1) || !empty($birth_d_1) || !empty($TEL_1) || !empty($Add)){



$sql="update `atm_data` set `notice_num`='$notice_num',`name_1`='$name_1',`Id_1`='$Id_1',`birth_y_1`='$birth_y_1',`birth_m_1`='$birth_m_1',`birth_d_1`='$birth_d_1',`TEL_1`='$TEL_1',`cell_1`='$cell_1',`name_2`='$name_2',`Id_2`='$Id_2',`birth_y_2`='$birth_y_2',`birth_m_2`='$birth_m_2',`birth_d_2`='$birth_d_2',`TEL_2`='$TEL_2',`cell_2`='$cell_2',`Add`='$Add',`money`='$money',`kind`='$kind',`receipt`='$receipt',`periodical`='$periodical',`chk_data`='$chk_data' where `num`='$num'";
mysql_query($sql) or die("新增失敗！");


	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','線上ATM捐款管理','".ereg_replace("'","\'",$name_1)."','edit',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

?>
<script language="javascript">
alert("更新成功！");
parent.location.href="ATM_data_list.php";
</script>
<?
}

$arr=mysql_fetch_array(mysql_query("select * from `atm_data` where `num`='$no'"));
?>

<? 
include_once ("top.php");
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 我要捐款管理 >> <a href="ATM_data_list.php" class="link_01">線上ATM捐款管理</a> >> <span class="text_12px_02"><strong>編輯資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>線上ATM捐款管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="ATM_data_list.php?page=<? $_GET['page'];?>" class="button_04">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="ATM_data_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" bgcolor="#f1f1f1" align="left" valign="top" class="border_02"><strong>ATM 捐 款 資 訊</strong></td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 捐 款 人</td>
			<td width="85%" align="left" valign="top" class="border_02 text_12px_01form">
			  姓名：<input name="name_1" type="text" class="text_12px_01" id="name_1" value="<? echo $arr['name_1'];?>" />
			  <br />
			  身份證號碼：<input name="Id_1" type="text" class="text_12px_01" id="Id_1" value="<? echo $arr['Id_1'];?>" />
			  <br />
			  出生年月日：<input name="birth_y_1" type="text" class="text_12px_01" id="birth_y_1" value="<? echo $arr['birth_y_1'];?>" size="4" /> 
			  年 
			  <select name="birth_m_1" class="text_12px_01">
                <?
			  	for($i=0;$i<=12;$i++){
					if($i == $arr['birth_m_1']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
            </select>
			  <select name="birth_d_1" class="text_12px_01">
              <?
			  	for($i=0;$i<=31;$i++){
					if($i == $arr['birth_d_1']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
			  </select> 日
			  <br />
			  聯絡電話：(公司) <input name="TEL_1" type="text" class="text_12px_01" id="TEL_1" value="<? echo $arr['TEL_1'];?>" /> 
			  (行動) <input name="cell_1" type="text" class="text_12px_01" id="cell_1" value="<? echo $arr['cell_1'];?>" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 收 據 抬 頭</td>
			<td align="left" valign="top" class="border_02 text_12px_01form">
			  姓名：<input name="name_2" type="text" class="text_12px_01" id="name_2" value="<? echo $arr['name_2'];?>" />
			  <br />
			  身份證號碼 / 統一編號：
			  <input name="Id_2" type="text" class="text_12px_01" id="Id_2" value="<? echo $arr['Id_2'];?>" />
			  <br />
			  出生年月日：<input name="birth_y_2" type="text" class="text_12px_01" id="birth_y_2" value="<? echo $arr['birth_y_2'];?>" size="4" /> 
			  年 
			  <select name="birth_m_2" class="text_12px_01">
            <?
			  	for($i=0;$i<=12;$i++){
					if($i == $arr['birth_m_2']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
			  </select> 月 
			  <select name="birth_d_2" class="text_12px_01">
              <?
			  	for($i=0;$i<=31;$i++){
					if($i == $arr['birth_d_2']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
			  </select> 日
			  <br />
			  聯絡電話：(公司) <input name="TEL_2" type="text" class="text_12px_01" id="TEL_2" value="<? echo $arr['TEL_2'];?>" /> 
			  (行動) <input name="cell_2" type="text" class="text_12px_01" id="cell_2" value="<? echo $arr['cell_2'];?>" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 收據寄發</td>
			<td align="left" valign="top" class="border_02 text_12px_01form">
			  方式：<input type="text" name="receipt" value="<? echo $arr['receipt'];?>" class="text_12px_01" /><br />
			  地址：<input name="Add" type="text" class="text_12px_01" id="Add" value="<? echo $arr['Add'];?>" size="80" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 捐 款 選 項</td>
			<td align="left" valign="top" class="border_02">
			金額：<input name="money" type="text" class="text_12px_01" id="money" value="<? echo $arr['money'];?>" /> 
			元<br />
			種類：<input type="text" name="kind" value="<? echo $arr['kind'];?>" class="text_12px_01"/>
            
            </td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 刊 物</td>
			<td align="left" valign="top" class="border_02">
			<input type="text" name="periodical" value="<? echo $arr['periodical'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 銷帳編號</td>
			<td align="left" valign="top" class="border_02"><? echo $arr['notice_num'];?><input name="notice_num" type="hidden" value="<? echo $arr['notice_num'];?>" /></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 委託單位代號</td>
			<td align="left" valign="top" class="border_02">10000950</td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 費用代號</td>
			<td align="left" valign="top" class="border_02">001</td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 繳費(稅)類別</td>
			<td align="left" valign="top" class="border_02">55555</td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 損款日期</td>
			<td align="left" valign="top" class="border_02"><? echo $arr['time'];?></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 稽徵機關代號</td>
			<td align="left" valign="top" class="border_02">
			  <select name="chk_data" class="text_12px_01">
            <? 
					if($arr['chk_data'] == 0){
						$sel_1="selected";
						}
				?>
            <option value="0" <? echo $sel_1;?>>待處理</option>
            <? 
					if($arr['chk_data'] == 1){
						$sel_2="selected";
						}
				?>
            <option value="1" <? echo $sel_2;?>>已回傳文件</option>
            <? 
					if($arr['chk_data'] == 2){
						$sel_3="selected";
						}
				?>
            <option value="2" <? echo $sel_3;?>>完成捐款</option>
            <? 
					if($arr['chk_data'] == 3){
						$sel_4="selected";
						}
				?>
            <option value="3" <? echo $sel_4;?>>捐款失敗</option>
          </select>
			 </td>
		  </tr>
		  <tr>
			<td colspan="2" bgcolor="#f1f1f1" align="left" valign="top" class="border_02"><strong>交 易 結 果</strong></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 跨行文易序號</td>
			<td align="left" valign="top" class="border_02"><? echo $row['stan'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 委託單位代號</td>
			<td align="left" valign="top" class="border_02"><? echo $row['billerid'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 費用代號</td>
			<td align="left" valign="top" class="border_02"><? echo $row['feetype'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 繳費(稅)類別</td>
			<td align="left" valign="top" class="border_02"><? echo $row['payment_type'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 銷帳編號</td>
			<td align="left" valign="top" class="border_02"><? echo $row['notice_no'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 交易金額</td>
			<td align="left" valign="top" class="border_02"><? echo $row['amount'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 繳款期限</td>
			<td align="left" valign="top" class="border_02"><? echo $row['payment_deadline'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 稽徵機關代號</td>
			<td align="left" valign="top" class="border_02"><? echo $row['levying_office'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 回應代碼</td>
			<td align="left" valign="top" class="border_02"><? echo $row['rcode'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 使用者繳費日期</td>
			<td align="left" valign="top" class="border_02"><? echo $row['business_date'];?></td>
		  </tr>
		  <tr bgcolor="#FEE9F5">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 捐款狀態</td>
			<td align="left" valign="top" class="border_02">&nbsp;</td>
		  </tr>
		  
		</table>
        <input type="hidden" name="num" value="<? echo $no?>">
		<div align="center" style="padding:5px;margin:5px">
		<a href="javascript:document.form1.submit();" class="button_01">修改資料</a>
		</div>
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
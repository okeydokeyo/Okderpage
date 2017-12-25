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
$donation_y_1=$_POST['donation_y_1'];
$donation_m_1=$_POST['donation_m_1'];
$donation_y_end=$_POST['donation_y_end'];
$donation_m_end=$_POST['donation_m_end'];
$cash_1=$_POST['cash_1'];
$donation_y_2=$_POST['donation_y_2'];
$donation_m_2=$_POST['donation_m_2'];
$cash_2=$_POST['cash_2'];
$receipt=$_POST['receipt'];
$periodical=$_POST['periodical'];
$bank=$_POST['bank'];
$card=$_POST['card'];
$card_num=$_POST['card_num'];
$card_doa_y=$_POST['card_doa_y'];
$card_doa_m=$_POST['card_doa_m'];
$post_num=$_POST['post_num'];
$post_ID=$_POST['post_ID'];
$chk_data=$_POST['chk_data'];

if(!empty($name_1) || !empty($Id_1) || !empty($birth_y_1) || !empty($birth_m_1) || !empty($birth_d_1) || !empty($TEL_1) || !empty($Add)){
$sql="update `authority` set `name_1`='$name_1',`Id_1`='$Id_1',`birth_y_1`='$birth_y_1',`birth_m_1`='$birth_m_1',`birth_d_1`='$birth_d_1',`TEL_1`='$TEL_1',`cell_1`='$cell_1',`name_2`='$name_2',`Id_2`='$Id_2',`birth_y_2`='$birth_y_2',`birth_m_2`='$birth_m_2',`birth_d_2`='$birth_d_2' ,`TEL_2`='$TEL_2',`cell_2`='$cell_2',`Add`='$Add',`donation_y_1`='$donation_y_1',`donation_m_1`='$donation_m_1',`donation_y_end`='$donation_y_end',`donation_m_end`='$donation_m_end',`cash_1`='$cash_1',`donation_y_2`='$donation_y_2',`donation_m_2`='$donation_m_2',`cash_2`='$cash_2',`kind`='$kind',`receipt`='$receipt',`periodical`='$periodical',`bank`='$bank',`card`='$card',`card_num`='$card_num',`card_doa_y`='$card_doa_y',`card_doa_m`='$card_doa_m',`post_num`='$post_num',`post_ID`='$post_ID',`chk_data`='$chk_data',`time`=NOW() where `num`='$num'";
mysql_query($sql) or die("新增失敗！");

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','線上信用卡、郵局轉帳捐款管理','".ereg_replace("'","\'",$name_1)."','edit',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

?>
<script language="javascript">
alert("更新成功！");
parent.location.href="authority_list.php";
</script>
<?
}

$arr=mysql_fetch_array(mysql_query("select * from `authority` where `num`='$no'"));
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 我要捐款管理 >> <a href="authority_list.php" class="link_01">線上信用卡、郵局轉帳捐款管理</a> >> <span class="text_12px_02"><strong>編輯資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>線上信用卡、郵局轉帳捐款管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="authority_list.php" class="button_04">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="authority_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" bgcolor="#f1f1f1" align="left" valign="top" class="border_02"><strong>捐 款 資 訊</strong></td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 捐 款 人</td>
			<td width="85%" align="left" valign="top" class="border_02 text_12px_01form">
			  姓名：<input name="name_1" type="text" class="text_12px_01" id="name_1" value="<? echo $arr['name_1'];?>" />
			  <br />
			  身份證號碼<input type="text" name="Id_1" value="<? echo $arr['Id_1'];?>" class="text_12px_01" /><br />
			  出生年月日<input type="text" name="birth_y_1" value="<? echo $arr['birth_y_1'];?>" class="text_12px_01" size="4" /> 年 
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
			  </select> 月 
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
			  聯絡電話：(公司) <input type="text" name="TEL_1" value="<? echo $arr['TEL_1'];?>" class="text_12px_01" /> (行動) <input type="text" name="cell_1" value="<? echo $arr['cell_1'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 收 據 抬 頭</td>
			<td align="left" valign="top" class="border_02 text_12px_01form">
			  姓名：<input type="text" name="name_2" value="<? echo $arr['name_2'];?>" class="text_12px_01" /><br />
			  身份證號碼 / 統一編號：
			  <input type="text" name="Id_2" value="<? echo $arr['Id_2'];?>" class="text_12px_01" /><br />
			  出生年月日：<input type="text" name="birth_y_2" value="<? echo $arr['birth_y_2'];?>" class="text_12px_01" size="4" /> 年 
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
			  聯絡電話：(公司<input type="text" name="TEL_2" value="<? echo $arr['TEL_2'];?>" class="text_12px_01" /> (行動) <input type="text" name="cell_2" value="<? echo $arr['cell_2'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 收據寄發</td>
			<td align="left" valign="top" class="border_02 text_12px_01form">
			  方式：<input type="text" name="receipt" value="<? echo $arr['receipt'];?>" class="text_12px_01" /><br />
			  地址：<input type="text" name="Add" value="<? echo $arr['Add'];?>" class="text_12px_01" size="80" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 捐 款 選 項</td>
			<td align="left" valign="top" class="border_02">
            <? if($arr['donation_y_1'] <> 0){?>
            我願意從西元
            <select name="donation_y_1" class="text_12px_01">
              <?
			  	$n_year = $arr['donation_y_1'];
				for($i=($n_year-10);$i<($n_year+10);$i++){
					if($i == $n_year){
						echo "<option value=\"".($i)."\" selected>$i</option>\n";
					}else{
						echo "<option value=\"".($i)."\">$i</option>\n";
					}
			  	}
			  ?>
            </select>
            年
            <select name="donation_m_1" class="text_12px_01">
              <?
			  	for($i=0;$i<=12;$i++){
					if($i == $arr['donation_m_1']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
            </select>
            月至
            <select name="donation_y_end" class="text_12px_01">
              <?
			  	$n_year = $arr['donation_y_end'];
				for($i=($n_year-10);$i<($n_year+10);$i++){
					if($i == $n_year){
						echo "<option value=\"".($i)."\" selected>$i</option>\n";
					}else{
						echo "<option value=\"".($i)."\">$i</option>\n";
					}
			  	}
			  ?>
            </select>
            年
            <select name="donation_m_end" class="text_12px_01">
              <?
			  	for($i=0;$i<=12;$i++){
					if($i == $arr['donation_m_end']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
            </select>
            月止，每月固定扣
            <input type="text" name="cash_1" value="<? echo $arr['cash_1'];?>" size="8" class="text_12px_01" />
            元。
            <? }else{?>
            我願意在西元
            <select name="donation_y_2" class="text_12px_01">
              <?
			  	$n_year = $arr['donation_y_2'];
				for($i=($n_year-10);$i<($n_year+10);$i++){
					if($i == $n_year){
						echo "<option value=\"".($i)."\" selected>$i</option>\n";
					}else{
						echo "<option value=\"".($i)."\">$i</option>\n";
					}
			  	}
			  ?>
            </select>
            年
            <select name="donation_m_2" class="text_12px_01">
              <?
			  	for($i=0;$i<=12;$i++){
					if($i == $arr['donation_m_2']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
            </select>
            月捐
            <input type="text" name="cash_2" value="<? echo $arr['cash_2'];?>" size="8" class="text_12px_01" />
            元。
            <? }?>
			  <!--我願意在西元
			  <select name="" class="text_12px_01">
				<option>2011</option><option>2012</option><option>2013</option><option>2014</option>
			    <option>2015</option><option>2016</option>
			  </select> 年 
			  <select name="" class="text_12px_01">
				<option>1</option><option>2</option><option>3</option><option>4</option>
			    <option>5</option><option>6</option><option>7</option><option>8</option>
			    <option>9</option><option>10</option><option>11</option><option>12</option>
			  </select> 月捐<input type="text" class="text_12px_01" size="8" /> 元。--><br />
			種類：<input type="text" name="kind" value="<? echo $arr['kind'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 刊 物</td>
			<td align="left" valign="top" class="border_02">
			<input type="text" name="periodical" value="<? echo $arr['periodical'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr>
			<td colspan="2" bgcolor="#f1f1f1" align="left" valign="top" class="border_02"><strong>捐 款 方 式</strong></td>
		  </tr>
		  <? if(!empty($arr['bank'])){?>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 發卡銀行</td>
			<td align="left" valign="top" class="border_02"><input type="text" name="bank" value="<? echo $arr['bank'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 信用卡別</td>
			<td align="left" valign="top" class="border_02">
			 <input type="text" name="card" value="<? echo $arr['card'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 信用卡號</td>
			<td align="left" valign="top" class="border_02"><input type="text" name="card_num" value="<? echo $arr['card_num'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 卡片有效日期</td>
			<td align="left" valign="top" class="border_02">
			<select name="card_doa_y" class="text_12px_01">
              <?
			  	$n_year = $arr['card_doa_y'];
				for($i=($n_year-10);$i<($n_year+10);$i++){
					if($i == $n_year){
						echo "<option value=\"".($i)."\" selected>$i</option>\n";
					}else{
						echo "<option value=\"".($i)."\">$i</option>\n";
					}
			  	}
			  ?>
            </select>
			 年 
            <select name="card_doa_m" class="text_12px_01">
              <?
			  	for($i=0;$i<=12;$i++){
					if($i == $arr['card_doa_m']){
						echo "<option value=\"$i\" selected>$i</option>\n";
					}else{
						echo "<option value=\"$i\">$i</option>\n";
					}
				}
			  ?>
			  </select> 月至</td>
		  </tr>
        <? }else{?>
		  <tr bgcolor="#ccffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 存簿儲金局號</td>
			<td align="left" valign="top" class="border_02"><input type="text" name="post_num" value="<? echo $arr['post_num'];?>" class="text_12px_01" /></td>
		  </tr>
		  <tr bgcolor="#ccffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 存簿儲金帳號</td>
			<td align="left" valign="top" class="border_02"><input type="text" name="post_ID" value="<? echo $arr['post_ID'];?>" class="text_12px_01" /></td>
		  </tr>
		<? }?>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 捐款狀態</td>
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
				<option value="1" <? echo $sel_2;?>>未收到文件</option>
				<? 
					if($arr['chk_data'] == 2){
						$sel_3="selected";
						}
				?>
 				<option value="2" <? echo $sel_3;?>>完成捐款</option>
			  </select></td>
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
<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
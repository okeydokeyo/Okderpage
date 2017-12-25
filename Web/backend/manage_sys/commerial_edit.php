<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁

$no=$_GET['no'];
$arr=mysql_fetch_array(mysql_query("select * from `commerial_code` where `number`='$no'"));


/****************************************************積數位總和***********************************************/

$Y=substr($arr['time'],0,4);
$m=substr($arr['time'],5,2);
$d=substr($arr['time'],8,2);


/****************************************************積數位總和***********************************************/

$Barcode_1="50123162G"; //條碼1
$Barcode_1_no="501231627";


$Barcode_1_num = substr($Barcode_1_no, 0, 1);
$Barcode_1_num_1 = substr($Barcode_1_no, 2, 1);
$Barcode_1_num_2 = substr($Barcode_1_no, 4, 1);
$Barcode_1_num_3 = substr($Barcode_1_no, 6, 1);
$Barcode_1_num_4 = substr($Barcode_1_no, 8, 1);

$Barcode_1_num_no=$Barcode_1_num+$Barcode_1_num_1+$Barcode_1_num_2+$Barcode_1_num_3+$Barcode_1_num_4."<BR>"; //條碼1總和

$number=iron_give_zero(7,$arr['number']);
$Barcode_2="DCI".($Y-1911).$m.$d.$number; //條碼2
$Barcode_2_no="439".($Y-1911).$m.$d.$number;

$Barcode_2_num = substr($Barcode_2_no, 0, 1);
$Barcode_2_num_1 = substr($Barcode_2_no, 2, 1);
$Barcode_2_num_2 = substr($Barcode_2_no, 4, 1);
$Barcode_2_num_3 = substr($Barcode_2_no, 6, 1);
$Barcode_2_num_4 = substr($Barcode_2_no, 8, 1);
$Barcode_2_num_5 = substr($Barcode_2_no, 10, 1);
$Barcode_2_num_6 = substr($Barcode_2_no, 12, 1);
$Barcode_2_num_7 = substr($Barcode_2_no, 14, 1);

$Barcode_2_num_no=$Barcode_2_num+$Barcode_2_num_1+$Barcode_2_num_2+$Barcode_2_num_3+$Barcode_2_num_4+$Barcode_2_num_5+$Barcode_2_num_6+$Barcode_2_num_7."<BR>";//條碼2總和


$number_1=iron_give_zero(9,100);
$number_2=iron_give_zero(9,500);
$number_3=iron_give_zero(9,1000);


$Barcode_3_1=($Y-1911).$m.$number_1;
$Barcode_3_2=($Y-1911).$m.$number_2;
$Barcode_3_3=($Y-1911).$m.$number_3;



$Barcode_3_1_num = substr($Barcode_3_1, 0, 1);
$Barcode_3_1_num_1 = substr($Barcode_3_1, 2, 1);
$Barcode_3_1_num_2 = substr($Barcode_3_1, 4, 1);
$Barcode_3_1_num_3 = substr($Barcode_3_1, 6, 1);
$Barcode_3_1_num_4 = substr($Barcode_3_1, 8, 1);
$Barcode_3_1_num_5 = substr($Barcode_3_1, 10, 1);
$Barcode_3_1_num_6 = substr($Barcode_3_1, 12, 1);

$Barcode_3_1_num_no=$Barcode_3_1_num+$Barcode_3_1_num_1+$Barcode_3_1_num_2+$Barcode_3_1_num_3+$Barcode_3_1_num_4+$Barcode_3_1_num_5+$Barcode_3_1_num_6."<BR>";//條碼3捐款100總和

$Barcode_3_2_num = substr($Barcode_3_2, 0, 1);
$Barcode_3_2_num_1 = substr($Barcode_3_2, 2, 1);
$Barcode_3_2_num_2 = substr($Barcode_3_2, 4, 1);
$Barcode_3_2_num_3 = substr($Barcode_3_2, 6, 1);
$Barcode_3_2_num_4 = substr($Barcode_3_2, 8, 1);
$Barcode_3_2_num_5 = substr($Barcode_3_2, 10, 1);
$Barcode_3_2_num_6 = substr($Barcode_3_2, 12, 1);

$Barcode_3_2_num_no=$Barcode_3_2_num+$Barcode_3_2_num_1+$Barcode_3_2_num_2+$Barcode_3_2_num_3+$Barcode_3_2_num_4+$Barcode_3_2_num_5+$Barcode_3_2_num_6;//條碼3捐款500總和

$Barcode_3_3_num = substr($Barcode_3_3, 0, 1);
$Barcode_3_3_num_1 = substr($Barcode_3_3, 2, 1);
$Barcode_3_3_num_2 = substr($Barcode_3_3, 4, 1);
$Barcode_3_3_num_3 = substr($Barcode_3_3, 6, 1);
$Barcode_3_3_num_4 = substr($Barcode_3_3, 8, 1);
$Barcode_3_3_num_5 = substr($Barcode_3_3, 10, 1);
$Barcode_3_3_num_6 = substr($Barcode_3_3, 12, 1);
$Barcode_3_3_num_7 = substr($Barcode_3_3, 14, 1);


$Barcode_3_3_num_no=$Barcode_3_3_num+$Barcode_3_3_num_1+$Barcode_3_3_num_3+$Barcode_3_3_num_3+$Barcode_3_3_num_4+$Barcode_3_3_num_5+$Barcode_3_3_num_6+$Barcode_3_3_num_7;//條碼3捐款1000總和


if($arr['assess']=="No" && $arr['besides']!=""){
$number_4=iron_give_zero(9,$arr['besides']);

$Barcode_3_4=($Y-1911).$m.$number_4;

$Barcode_3_4_num = substr($Barcode_3_4, 0, 1);
$Barcode_3_4_num_1 = substr($Barcode_3_4, 2, 1);
$Barcode_3_4_num_2 = substr($Barcode_3_4, 4, 1);
$Barcode_3_4_num_3 = substr($Barcode_3_4, 6, 1);
$Barcode_3_4_num_4 = substr($Barcode_3_4, 8, 1);
$Barcode_3_4_num_5 = substr($Barcode_3_4, 10, 1);
$Barcode_3_4_num_6 = substr($Barcode_3_4, 12, 1);

$Barcode_3_4_num_no=$Barcode_3_4_num+$Barcode_3_4_num_1+$Barcode_3_4_num_2+$Barcode_3_4_num_3+$Barcode_3_4_num_4+$Barcode_3_4_num_5+$Barcode_3_4_num_6;//條碼3捐款其他總和

}

$summation=($Barcode_1_num_no+$Barcode_2_num_no+$Barcode_3_1_num_no)%11;//條碼3捐款100總和檢碼
$summation_1=($Barcode_1_num_no+$Barcode_2_num_no+$Barcode_3_2_num_no)%11;//條碼3捐款500總和檢碼
$summation_2=($Barcode_1_num_no+$Barcode_2_num_no+$Barcode_3_3_num_no)%11;//條碼3捐款1000總和檢碼
if($arr['assess']=="No" && $arr['besides']!=""){
$summation_3=($Barcode_1_num_no+$Barcode_2_num_no+$Barcode_3_4_num_no)%11;//條碼3捐款其他總和檢碼
}

if($summation=="0"){
$summation=="A";
}elseif($summation=="10"){
$summation=="B";
}



/******************************************************************************************************************************************************/

/*************************************************************偶數總和****************************************************************************/

$even_1="50123162G"; //條碼1
$even_1_no="501231627";


$even_1_num = substr($even_1_no, 1, 1);
$even_1_num_1 = substr($even_1_no, 3, 1);
$even_1_num_2 = substr($even_1_no, 5, 1);
$even_1_num_3 = substr($even_1_no, 7, 1);
$even_1_num_4 = substr($even_1_no, 9, 1);

$even_1_num_no=$even_1_num+$even_1_num_1+$even_1_num_2+$even_1_num_3+$even_1_num_4."<BR>"; //條碼1總和

$number=iron_give_zero(7,$arr['number']);
$even_2="DCI".($Y-1911).$m.$d.$number; //條碼2
$even_2_no="439".($Y-1911).$m.$d.$number;

$even_2_num = substr($even_2_no, 1, 1);
$even_2_num_1 = substr($even_2_no, 3, 1);
$even_2_num_2 = substr($even_2_no, 5, 1);
$even_2_num_3 = substr($even_2_no, 7, 1);
$even_2_num_4 = substr($even_2_no, 9, 1);
$even_2_num_5 = substr($even_2_no, 11, 1);
$even_2_num_6 = substr($even_2_no, 13, 1);
$even_2_num_7 = substr($even_2_no, 15, 1);

$even_2_num_no=$even_2_num+$even_2_num_1+$even_2_num_2+$even_2_num_3+$even_2_num_4+$even_2_num_5+$even_2_num_6+$even_2_num_7."<BR>";//條碼2總和


$number_1=iron_give_zero(9,100);
$number_2=iron_give_zero(9,500);
$number_3=iron_give_zero(9,1000);


$even_3_1=($Y-1911).$m.$number_1;
$even_3_2=($Y-1911).$m.$number_2;
$even_3_3=($Y-1911).$m.$number_3;



$even_3_1_num = substr($even_3_1, 1, 1);
$even_3_1_num_1 = substr($even_3_1, 3, 1);
$even_3_1_num_2 = substr($even_3_1, 5, 1);
$even_3_1_num_3 = substr($even_3_1, 7, 1);
$even_3_1_num_4 = substr($even_3_1, 9, 1);
$even_3_1_num_5 = substr($even_3_1, 11, 1);
$even_3_1_num_6 = substr($even_3_1, 13, 1);

$even_3_1_num_no=$even_3_1_num+$even_3_1_num_1+$even_3_1_num_2+$even_3_1_num_3+$even_3_1_num_4+$even_3_1_num_5+$even_3_1_num_6."<BR>";//條碼3捐款100總和

$even_3_2_num = substr($even_3_2, 1, 1);
$even_3_2_num_1 = substr($even_3_2, 3, 1);
$even_3_2_num_2 = substr($even_3_2, 5, 1);
$even_3_2_num_3 = substr($even_3_2, 7, 1);
$even_3_2_num_4 = substr($even_3_2, 9, 1);
$even_3_2_num_5 = substr($even_3_2, 11, 1);
$even_3_2_num_6 = substr($even_3_2, 13, 1);


$even_3_2_num_no=$even_3_2_num+$even_3_2_num_1+$even_3_2_num_2+$even_3_2_num_3+$even_3_2_num_4+$even_3_2_num_5+$even_3_2_num_6;//條碼3捐款500總和

$even_3_3_num = substr($even_3_3, 1, 1);
$even_3_3_num_1 = substr($even_3_3, 3, 1);
$even_3_3_num_2 = substr($even_3_3, 5, 1);
$even_3_3_num_3 = substr($even_3_3, 7, 1);
$even_3_3_num_4 = substr($even_3_3, 9, 1);
$even_3_3_num_5 = substr($even_3_3, 11, 1);
$even_3_3_num_6 = substr($even_3_3, 13, 1);
$even_3_3_num_7 = substr($even_3_3, 15, 1);


$even_3_3_num_no=$even_3_3_num+$even_3_3_num_1+$even_3_3_num_2+$even_3_3_num_3+$even_3_3_num_4+$even_3_3_num_5+$even_3_3_num_6+$even_3_3_num_7;//條碼3捐款1000總和


if($arr['assess']=="No" && $arr['besides']!=""){
$number_4=iron_give_zero(9,$arr['besides']);

$even_3_4=($Y-1911).$m.$number_4;

$even_3_4_num = substr($even_3_4, 1, 1);
$even_3_4_num_1 = substr($even_3_4, 3, 1);
$even_3_4_num_2 = substr($even_3_4, 5, 1);
$even_3_4_num_3 = substr($even_3_4, 7, 1);
$even_3_4_num_4 = substr($even_3_4, 9, 1);
$even_3_4_num_5 = substr($even_3_4, 11, 1);
$even_3_4_num_6 = substr($even_3_4, 13, 1);

$even_3_4_num_no=$even_3_4_num+$even_3_4_num_1+$even_3_4_num_2+$even_3_4_num_3+$even_3_4_num_4+$even_3_4_num_5+$even_3_4_num_6;//條碼3捐款其他總和

}

$summation_even=($even_1_num_no+$even_2_num_no+$even_3_1_num_no)%11;//條碼3捐款100總和檢碼
$summation_even_1=($even_1_num_no+$even_2_num_no+$even_3_2_num_no)%11;//條碼3捐款500總和檢碼

$summation_even_2=($even_1_num_no+$even_2_num_no+$even_3_3_num_no)%11;//條碼3捐款1000總和檢碼
if($arr['assess']=="No" && $arr['besides']!=""){
$summation_even_3=($even_1_num_no+$even_2_num_no+$even_3_4_num_no)%11;//條碼3捐款其他總和檢碼
}
/************************************************************************************************************************************/
/******************************************************檢碼**************************************************************/
if($summation=="0"){  //積數的檢碼100
$summation_id="A";
}elseif($summation=="10"){
$summation_id="B";
}else{
$summation_id=$summation;
}

if($summation_1=="0"){  //積數的檢碼500
$summation_id_1="A";
}elseif($summation_1=="10"){
$summation_id_1="B";
}else{
$summation_id_1=$summation_1;
}

if($summation_2=="0"){  //積數的檢碼1000
$summation_id_2="A";
}elseif($summation_2=="10"){
$summation_id_2="B";
}else{
 $summation_id_2=$summation_2;
}

if($summation_3=="0"){  //積數的檢碼其他
$summation_id_3="A";
}elseif($summation_3=="10"){
$summation_id_3="B";
}else{
$summation_id_3=$summation_3;
}


if($summation_even=="0"){  //偶數的檢碼100
$summation_even_id="X";
}elseif($summation_even=="10"){
$summation_even_id="y";
}else{
$summation_even_id=$summation_even;
}

if($summation_even_1=="0"){  //偶數的檢碼500
$summation_even_id_1="X";
}elseif($summation_even_1=="10"){
$summation_even_id_1="y";
}else{
$summation_even_id_1=$summation_even_1;
}

if($summation_even_2=="0"){  //偶數的檢碼1000
$summation_even_id_2="X";
}elseif($summation_even_2=="10"){
$summation_even_id_2="y";
}else{
$summation_even_id_2=$summation_even_2;
}

if($summation_even_3=="0"){  //偶數的檢碼其他
$summation_even_id_3="X";
}elseif($summation_even_3=="10"){
$summation_even_id_3="y";
}else{
$summation_even_id_3=$summation_even_3;
}
/********************************************************************************************************************/
$barcode1="50123162G"; //條碼1

$number_barcode=iron_give_zero(7,$arr['number']);

$barcode2="DCI".($Y-1911).$m.$d.$number_barcode; //條碼2

$number_barcode_1=iron_give_zero(9,100);
$number_barcode_2=iron_give_zero(9,500);
$number_barcode_3=iron_give_zero(9,1000);

//條碼3
$barcode_3_1=($Y-1911).$m.$summation_id.$summation_even_id.$number_barcode_1;
$barcode_3_2=($Y-1911).$m.$summation_id_1.$summation_even_id_1.$number_barcode_2;
$barcode_3_3=($Y-1911).$m.$summation_id_2.$summation_even_id_2.$number_barcode_3;
//其他條碼3
if($arr['assess']=="No" && $arr['besides']!=""){
$number_barcode_4=iron_give_zero(9,$arr['besides']);
$barcode_3_4=($Y-1911).$m.$summation_id_3.$summation_even_id_3.$number_barcode_4;
}


$num=$_POST['num'];
$billhead=$_POST['billhead'];
$address=$_POST['address'];
$tel=$_POST['tel'];
$assess=$_POST['assess'];
$besides=$_POST['besides'];
$anlage=$_POST['anlage'];
$chk_data=$_POST['chk_data'];





if(!empty($billhead) || !empty($address) || !empty($tel)){
$sql="update `commerial_code` set `billhead`='$billhead',`address`='$address',`tel`='$tel',`assess`='$assess',`besides`='$besides',`anlage`='$anlage',`chk_data`='$chk_data' where `number`='$num'";
mysql_query($sql) or die("新增失敗！");

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','超商條碼捐款管理','".ereg_replace("'","\'",$billhead)."','edit',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

?>
<script language="javascript">
alert("更新成功！");
parent.location.href="commerial_list.php";
</script>
<?
}

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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 我要捐款管理 >> <a href="commerial_list.php" class="link_01">超商條碼捐款管理</a> >> <span class="text_12px_02"><strong>編輯資料</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>超商條碼捐款管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="commerial_list.php" class="button_04">◎回列表頁</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
<form action="commerial_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">  
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 收 據 抬 頭</td>
			<td width="85%" align="left" valign="top" class="border_02 text_12px_01form"><input name="billhead" type="text" class="text_12px_01" id="billhead" value="<? echo $arr['billhead'];?>" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 收據寄發地址</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><input name="address" type="text" class="text_12px_01" id="address" value="<? echo $arr['address'];?>" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 聯絡電話</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><input name="tel" type="text" class="text_12px_01" id="tel" value="<? echo $arr['tel'];?>" /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 捐款金額</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><input name="assess" type="radio" value="Yes" <? if($arr['assess']=="Yes"){echo "checked";}?> />
			預設金額(100,500,1000元)  <input name="assess" type="radio" value="No" <? if($arr['assess']=="No"){echo "checked";}?>/>其他 <? if($arr['assess']=="No"){?> <input name="besides" type="text" id="besides" value="<? echo $arr['besides'];?>" class="text_12px_01" /> 元<? }?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 收據原則</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><input name="anlage" type="radio" value="Yes"  <? if($arr['anlage']=="Yes"){echo "checked";}?>/>年度彙整寄發  <input name="anlage" type="radio" value="No"  <? if($arr['anlage']=="No"){echo "checked";}?> />捐款後立即寄發收據</td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 條碼一</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><? echo $barcode1;?></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 條碼二</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><? echo $barcode2;?></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 條碼三</td>
			<td align="left" valign="top" class="border_02 text_12px_01form">&nbsp;</td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 預設捐款金額100元</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><? echo $barcode_3_1;?></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 預設捐款金額500元</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><? echo $barcode_3_2;?></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 預設捐款金額1000元</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><? echo $barcode_3_3;?></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 其他金額</td>
			<td align="left" valign="top" class="border_02 text_12px_01form"><? if($arr['assess']=="No" && $arr['besides']!=""){echo "$barcode_3_4";}?></td>
		  </tr>
		  <tr bgcolor="#ffffcc">
			<td align="left" valign="top" class="border_02">&nbsp;</td>
			<td align="left" valign="top" class="border_02 text_12px_01form">
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
            <option value="1" <? echo $sel_2;?>>完成捐款</option>
            <? 
					if($arr['chk_data'] == 2){
						$sel_3="selected";
						}
				?>
            <option value="2" <? echo $sel_3;?>>捐款失敗</option>
          </select>
			</td>
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
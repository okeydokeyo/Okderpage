<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁

$num=$_GET['num'];
$chkdel= $_GET['chkdel'];

if($chkdel=="YES"){

$arr=mysql_fetch_array(mysql_query("select * from `atm_data` where `num` = '".$num."'"));
	
	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','線上ATM捐款管理','".ereg_replace("'","\'",$arr['name_1'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

mysql_query("delete from `atm_data` where `num`='$num'");

mysql_query("delete from `reatm_data` where `notice_no`='".$arr['notice_num']."'");

	echo "<script language='javascript'>alert('刪除成功!');location.href='ATM_data_list.php?page=".$_GET['page']."';</script>";

}	  
?>
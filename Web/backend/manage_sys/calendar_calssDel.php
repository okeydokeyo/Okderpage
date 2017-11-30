<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_10"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_CalTagID=$_GET['DB_CalTagID'];
//$page=$_GET['page'];

$arry=SoloSql("calendar_tags","`DB_CalTagID`='".$DB_CalTagID."'");

$DB_CalTagSort_no=$arry['DB_CalTagSort'];

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','行事曆管理','".ereg_replace("'","\'",$arry['DB_CalTagSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){

ChangeSortDel("calendar_tags","$DB_CalTagSort_no","DB_CalTagSort","");


mysql_query("delete from `calendar` where `DB_CalTagID`='$DB_CalTagID'");
mysql_query("delete from `calendar_tags` where `DB_CalTagID`='$DB_CalTagID'");


parent_url_msg("刪除成功!!","calendar_calss.php");

}
?>
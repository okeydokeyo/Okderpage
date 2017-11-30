<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_16"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_LogID=$_GET['DB_LogID'];
$page=$_GET['page'];

$arry=SoloSql("logo","`DB_LogID`='".$DB_LogID."'");


//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','LOGO圖管理','".ereg_replace("'","\'",$arry['DB_LogExp'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file1="../../images/";
$file_ad01=mysql_query("select * from `logo` where `DB_LogID`='$DB_LogID'");
while($file_arry01=mysql_fetch_array($file_ad01)){
$fileadd1=$file1.$file_arry01['DB_LogImg'];
@unlink($fileadd1);
}
//********************************************************************


mysql_query("delete from `logo` where `DB_LogID`='$DB_LogID'");


parent_url_msg("刪除成功!!","toplogo_list.php?page=$page");

}
?>
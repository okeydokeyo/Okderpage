<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_6"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_BanID=$_GET['DB_BanID'];
$page=$_GET['page'];

$arry=SoloSql("banner","`DB_BanID`='".$DB_BanID."'");

$DB_BanSort_no=$arry['DB_BanSort'];

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','相關連結','".$arry['DB_BanSubject']."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file1="../file/";
$file_ad01=mysql_query("select * from `banner` where `DB_BanID`='$DB_BanID'");
while($file_arry01=mysql_fetch_array($file_ad01)){
$fileadd1=$file1.$file_arry01['DB_BanImg'];
@unlink($fileadd1);
}
//********************************************************************

ChangeSortDel("banner","$DB_BanSort_no","DB_BanSort","");

mysql_query("delete from `banner` where `DB_BanID`='$DB_BanID'");


parent_url_msg("刪除成功!!","links_list.php?page=$page");

}
?>
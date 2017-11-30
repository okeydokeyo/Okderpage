<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_14"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_WebID=$_GET['DB_WebID'];
$page=$_GET['page'];

$arry=SoloSql("website","`DB_WebID`='".$DB_WebID."'");

$DB_WebSort_no=$arry['DB_WebSort'];

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','網站連結','".ereg_replace("'","\'",$arry['DB_WebSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file1="../file/";
$file_ad01=mysql_query("select * from `website` where `DB_WebID`='$DB_WebID'");
while($file_arry01=mysql_fetch_array($file_ad01)){
$fileadd1=$file1.$file_arry01['DB_WebImg'];
@unlink($fileadd1);
}
//********************************************************************

ChangeSortDel("website","$DB_WebSort_no","DB_WebSort"," && `DB_WebTagID`='".$arry['DB_WebTagID']."'");

mysql_query("delete from `website` where `DB_WebID`='$DB_WebID'");


parent_url_msg("刪除成功!!","links2_list.php?page=$page");

}
?>
<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_DowTagID=$_GET['DB_DowTagID'];
$page=$_GET['page'];

$arry=SoloSql("download_tags","`DB_DowTagID`='".$DB_DowTagID."'");

$DB_DowTagSort_no=$arry['DB_DowTagSort'];

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','檔案下載標籤','".ereg_replace("'","\'",$arry['DB_DowTagSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){

ChangeSortDel("download_tags","$DB_DowTagSort_no","DB_DowTagSort","");

//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file1="../file/";
$file_ad01=mysql_query("select * from `download` where `DB_DowTagID`='$DB_DowTagID'");
while($file_arry01=mysql_fetch_array($file_ad01)){
$fileadd1=$file1.$file_arry01['DB_DowFileName'];
@unlink($fileadd1);
}
//********************************************************************


mysql_query("delete from `download` where `DB_DowTagID`='$DB_DowTagID'");

mysql_query("delete from `download_unit` where `DB_DowTagID`='$DB_DowTagID'");

mysql_query("delete from `download_tags` where `DB_DowTagID`='$DB_DowTagID'");


parent_url_msg("刪除成功!!","download_calss.php");

}
?>
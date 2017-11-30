<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_2"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_AniID=$_GET['DB_AniID'];
$page=$_GET['page'];

$arry=SoloSql("animation","`DB_AniID`='".$DB_AniID."'");


//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','形象動畫管理','".ereg_replace("'","\'",$arry['DB_AniDescription'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file1="../file/";
$file_ad01=mysql_query("select * from `animation` where `DB_AniID`='$DB_AniID'");
while($file_arry01=mysql_fetch_array($file_ad01)){
$fileadd1=$file1.$file_arry01['DB_AniArchive_1'];
@unlink($fileadd1);
}
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file2="../file/";
$file_ad02=mysql_query("select * from `animation` where `DB_AniID`='$DB_AniID'");
while($file_arry02=mysql_fetch_array($file_ad02)){
$fileadd2=$file2.$file_arry02['DB_AniArchive_2'];
@unlink($fileadd2);

}
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file3="../file/";
$file_ad03=mysql_query("select * from `animation_picture` where `DB_AniID`='$DB_AniID'");
while($file_arry03=mysql_fetch_array($file_ad03)){
$fileadd3=$file3.$file_arry03['DB_AniPicArchive'];
@unlink($fileadd3);
}
//********************************************************************

mysql_query("delete from `animation_picture` where `DB_AniID`='$DB_AniID'");

mysql_query("delete from `animation` where `DB_AniID`='$DB_AniID'");


parent_url_msg("刪除成功!!","topview_list.php?page=$page");

}
?>
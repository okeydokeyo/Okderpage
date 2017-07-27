<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_9"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_ArtID=$_GET['DB_ArtID'];
$page=$_GET['page'];

$arry=SoloSql("article","`DB_ArtID`='".$DB_ArtID."'");
$DB_ArtSort_no=$arry['DB_ArtSort'];

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','說明文章管理','".ereg_replace("'","\'",$arry['DB_ArtSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){

ChangeSortDel("article","$DB_ArtSort_no","DB_ArtSort","");

//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file1="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$DB_ArtID'");
while($file_arry01=mysql_fetch_array($file_ad01)){
$fileadd1=$file1.$file_arry01['DB_ArtImg_1'];
@unlink($fileadd1);
}
//********************************************************************
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_2
$file2="../file/";
$file_ad02=mysql_query("select * from `article` where `DB_ArtID`='$DB_ArtID'");
while($file_arry02=mysql_fetch_array($file_ad02)){
$fileadd2=$file2.$file_arry02['DB_ArtImg_2'];
@unlink($fileadd2);
}
//********************************************************************
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_3
$file3="../file/";
$file_ad03=mysql_query("select * from `article` where `DB_ArtID`='$DB_ArtID'");
while($file_arry03=mysql_fetch_array($file_ad03)){
$fileadd3=$file3.$file_arry03['DB_ArtImg_3'];
@unlink($fileadd3);
}
//********************************************************************
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file4="../file/";
$file_ad04=mysql_query("select * from `article` where `DB_ArtID`='$DB_ArtID'");
while($file_arry04=mysql_fetch_array($file_ad04)){
$fileadd4=$file4.$file_arry04['DB_ArtArchive_1'];
@unlink($fileadd4);
}
//********************************************************************
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file5="../file/";
$file_ad05=mysql_query("select * from `article` where `DB_ArtID`='$DB_ArtID'");
while($file_arry05=mysql_fetch_array($file_ad05)){
$fileadd5=$file5.$file_arry05['DB_ArtArchive_2'];
@unlink($fileadd5);
}
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file6="../file/";
$file_ad06=mysql_query("select * from `article` where `DB_ArtID`='$DB_ArtID'");
while($file_arry6=mysql_fetch_array($file_ad06)){
$fileadd6=$file6.$file_arry6['DB_ArtArchive_3'];
@unlink($fileadd6);
}
//********************************************************************
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file7="../file/";
$file_ad07=mysql_query("select * from `article` where `DB_ArtID`='$DB_ArtID'");
while($file_arry7=mysql_fetch_array($file_ad07)){
$fileadd7=$file7.$file_arry7['DB_ArtArchive2_1'];
@unlink($fileadd7);
}
//********************************************************************

mysql_query("delete from `article` where `DB_ArtID`='$DB_ArtID'");


parent_url_msg("刪除成功!!","art_list.php?page=$page");

}
?>
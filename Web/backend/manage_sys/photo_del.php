<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_LifID=$_GET['DB_LifID'];
//$page=$_GET['page'];
//$page_no=$_GET['page_no'];


$arry=SoloSql("life"," `DB_LifID`='".$_GET['DB_LifID']."'");
$arry1=SoloSql("life_album"," `DB_LifAlbID`='".$arry['DB_LifAlbID']."'");
$arry2=SoloSql("life_tags","`DB_LifTagID`='".$arry['DB_LifTagID']."'");
$DB_LifSort_no=$arry['DB_LifSort'];

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','網路相簿-".ereg_replace("'","\'",$arry2['DB_LifTagSubject'])."-".ereg_replace("'","\'",$arry1['DB_LifAlbTitle'])."','".ereg_replace("'","\'",$arry['DB_LifContent'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){
//********************************************************************
//刪除掉網路上的資料夾的檔案
//文件上傳_1
$file1="../photo/";
$file2="../photo/small/";
$file_ad01=mysql_query("select * from `life` where `DB_LifID`='$DB_LifID'");
while($file_arry01=mysql_fetch_array($file_ad01)){
$fileadd1=$file1.$file_arry01['DB_LifName'];
$fileadd2=$file2.$file_arry01['DB_LifName'];
@unlink($fileadd1);
@unlink($fileadd2);
}
//********************************************************************

//ChangeSortDel("life","$DB_LifSort_no","DB_LifSort"," && `DB_LifAlbID`='".$arry['DB_LifAlbID']."'");

mysql_query("delete from `life` where `DB_LifID`='$DB_LifID'");


parent_url_msg("刪除成功!!","photo_list.php?DB_LifTagID=".$arry['DB_LifTagID']."&LifAlbID=".$arry['DB_LifAlbID']."");

}
?>
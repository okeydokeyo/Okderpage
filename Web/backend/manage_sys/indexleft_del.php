<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_LefID = $_GET['DB_LefID'];
//$page=$_GET['page'];

$arry = SoloSql("left","`DB_LefID`='".$DB_LefID."'");
$arry2 = SoloSql("left_tags","`DB_LefTagID`='".$arry['DB_LefTagID']."'");

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."',' 左側選單管理-".ereg_replace("'","\'",$arry2['DB_LefTagSubject'])."','".ereg_replace("'","\'",$arry['DB_LefSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if(DB_LefID != ""){
//********************************************************************
//刪除掉網路上的資料夾的檔案
/*$file1 = "../file/";
$file_ad01 = mysql_query("select * from `left` where `DB_LefID`='$DB_LefID'");
$file_arry01 = mysql_fetch_array($file_ad01);
$fileadd1 = $file1.$file_arry01['DB_LefArchive'];
@unlink($fileadd1);*/

ChangeSortDel("left",$arry['DB_LefSort'],"DB_LefSort"," && `DB_LefTagID`='".$arry['DB_LefTagID']."'"); //修改排序

mysql_query("delete from `left` where `DB_LefID`='$DB_LefID'");

parent_url_msg("刪除成功!!","indexleft_list.php?DB_LefTagID=".$arry['DB_LefTagID']."");

}
?>
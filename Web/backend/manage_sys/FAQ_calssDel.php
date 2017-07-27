<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_13"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_FaqTagID=$_GET['DB_FaqTagID'];

$arry=SoloSql("faq_tags","`DB_FaqTagID`='".$DB_FaqTagID."'");

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','常見問題管理標籤','".ereg_replace("'","\'",$arry['DB_FaqTagSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){

//更新排序
ChangeSortDel("faq_tags",$arry['DB_FaqTagSort'],"DB_FaqTagSort","");

mysql_query("delete from `faq` where `DB_FaqTagID`='$DB_FaqTagID'");

mysql_query("delete from `faq_tags` where `DB_FaqTagID`='$DB_FaqTagID'");


parent_url_msg("刪除成功!!","FAQ_calss.php");

}
?>
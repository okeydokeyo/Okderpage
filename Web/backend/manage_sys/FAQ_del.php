<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_13"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_FaqID=$_GET['DB_FaqID'];
$page=$_GET['page'];

$arry=SoloSql("faq","`DB_FaqID`='".$DB_FaqID."'");
$arry1=SoloSql("faq_tags"," `DB_FaqTagID`='".$arry['DB_FaqTagID']."'");

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','常見問題管理-".$arry1['DB_FaqTagSubject']."','".ereg_replace("'","\'",$arry['DB_FaqSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if($_GET['chkdel']="YES"){

//更新排序
ChangeSortDel("faq",$arry['DB_FaqSort'],"DB_FaqSort"," && `DB_FaqTagID`='".$arry['DB_FaqTagID']."'");

mysql_query("delete from `faq` where `DB_FaqID`='$DB_FaqID'");


parent_url_msg("刪除成功!!","FAQ_list.php?DB_FaqTagID=$arry[DB_FaqTagID]&page=$page");

}
?>
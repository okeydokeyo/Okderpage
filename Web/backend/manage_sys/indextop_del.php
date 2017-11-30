<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_17"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_TopID = $_GET['DB_TopID'];
//$page=$_GET['page'];

$ary = SoloSql("top","`DB_TopID`='".$DB_TopID."'");
$ary2 = SoloSql("top_tags","`DB_TopTagID`='".$ary['DB_TopTagID']."'");

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."',' 上方選單管理-".ereg_replace("'","\'",$ary2['DB_TopTagSubject'])."','".ereg_replace("'","\'",$ary['DB_TopSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if(DB_TopID != ""){

ChangeSortDel("top",$ary['DB_TopSort'],"DB_TopSort"," && `DB_TopTagID`='".$ary['DB_TopTagID']."'"); //修改排序

mysql_query("delete from `top` where `DB_TopID`='$DB_TopID'");

parent_url_msg("刪除成功!!","indextop_list.php?DB_TopTagID=".$ary['DB_TopTagID']."");

}
?>
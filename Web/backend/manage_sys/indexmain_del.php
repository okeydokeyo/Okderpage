<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_5"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_IntID = $_GET['DB_IntID'];
//$page=$_GET['page'];

$arry = SoloSql("inter","`DB_IntID`='".$DB_IntID."'");


//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."',' 中間選單管理','".ereg_replace("'","\'",$arry['DB_IntSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if(DB_IntID != ""){


ChangeSortDel("inter",$arry['DB_IntSort'],"DB_IntSort",""); //修改排序

mysql_query("delete from `inter` where `DB_IntID`='$DB_IntID'");

parent_url_msg("刪除成功!!","indexmain_list.php");

}
?>
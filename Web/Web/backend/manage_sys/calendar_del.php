<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_10"); //檢查是否功能權限,否回首頁


$id = $_GET['DB_CalID'];  //主鍵

if($id!=""){

	$row = SoloSql('calendar',"`DB_CalID` = '$id'");
    //行事曆標籤管理查詢
    $ary = SoloSql("calendar_tags","`DB_CalTagID`='".$row['DB_CalTagID']."'");

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','行事曆管理-".ereg_replace("'","\'",$ary['DB_CalTagSubject'])."','".ereg_replace("'","\'",$row['DB_CalTitle'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

	mysql_query("delete from `calendar` where `DB_CalGroup`='".$row['DB_CalGroup']."'") or die("刪除失敗3");
	
	
	echo "<script language='javascript'>alert('刪除成功!');location.href='calendar_list.php?DB_CalTagID=".$row['DB_CalTagID']."';</script>";
}	  
?>


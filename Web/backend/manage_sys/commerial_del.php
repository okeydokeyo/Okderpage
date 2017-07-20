<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁

$id = $_GET['number'];  //主鍵
$chkdel= $_GET['chkdel'];
if($chkdel=="YES"){

	$row = SoloSql('commerial_code',"`number` = '$id'");

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','超商條碼捐款管理','".ereg_replace("'","\'",$row['billhead'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

	mysql_query("delete from `commerial_code` where `number`='$id'") or die("刪除失敗4");
	
	
	echo "<script language='javascript'>alert('刪除成功!');location.href='commerial_list.php?page=".$_GET['page']."';</script>";
}	  
?>


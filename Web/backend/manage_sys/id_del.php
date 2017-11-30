<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_1"); //檢查是否功能權限,否回首頁

$id = $_GET['DB_ManID'];  //主鍵

if($id!=""){

	$row = SoloSql('manager',"`DB_ManID` = '$id'");

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','帳號管理','".ereg_replace("'","\'",$row['DB_ManName'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

  	DelSql("manager",$id,"DB_ManID","id_list.php?page=".$_GET['page']."");
}	  
?>


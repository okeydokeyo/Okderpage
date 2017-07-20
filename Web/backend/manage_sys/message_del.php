<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_18"); //檢查是否功能權限,否回首頁

$id = $_GET['DB_MbkID'];  //主鍵

if($id!=""){

	$row = SoloSql('message_back',"`DB_MbkID`='$id'");

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','留言版-回應列表','".ereg_replace("'","\'",$row['DB_MbkName'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

	//刪除留言版回應
  	DelSql("message_back",$id,"DB_MbkID","message_list.php?DB_MesID=".$row['DB_MesID']."&pg=".$_GET['pg']."&page=".$_GET['page']."");
}	  
?>


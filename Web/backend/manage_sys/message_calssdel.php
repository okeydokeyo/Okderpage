<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_18"); //檢查是否功能權限,否回首頁

$id = $_GET['DB_MesID'];  //主鍵

if($id!=""){

	$row = SoloSql('comments',"`DB_MesID`='$id'");

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','留言版','".ereg_replace("'","\'",$row['DB_MesSubject'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);
    
	//留言版管理
  	DelSql("comments",$id,"DB_MesID","message_calss.php?page=".$_GET['page']."");
}	  
?>


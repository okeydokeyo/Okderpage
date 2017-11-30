<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_14"); //檢查是否功能權限,否回首頁


$id = $_GET['DB_WebTagID'];  //主鍵

if($id!=""){

	$row = SoloSql('website_tags',"`DB_WebTagID` = '$id'");	

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','網站連結-類別','".ereg_replace("'","\'",$row['DB_WebTagSubject'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

	$file = "../file/";
	//刪除上傳檔案
	$website_result = mysql_query("select * from `website` where `DB_WebTagID`='".$id."'");
    while ($website_ary = mysql_fetch_array($website_result)  ){
	
		$file1 = $file.$website_ary['DB_WebImg'];
		@unlink($file1);
    }
	//更新排序
	ChangeSortDel("website_tags",$row['DB_WebTagSort'],"DB_WebTagSort","");
	
	mysql_query("delete from `website_tags` where `DB_WebTagID`='$id'") or die("刪除失敗3");
	mysql_query("delete from `website` where `DB_WebTagID`='$id'") or die("刪除失敗4");
	
	
	echo "<script language='javascript'>alert('刪除成功!');location.href='links2_type_edit.php';</script>";
}	  
?>


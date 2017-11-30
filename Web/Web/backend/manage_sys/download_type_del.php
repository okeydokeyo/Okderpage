<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁


$id = $_GET['DB_DowUnitID'];  //主鍵

if($id!=""){

	$row = SoloSql('download_unit',"`DB_DowUnitID` = '$id'");	

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-類別','".ereg_replace("'","\'",$row['DB_DowUnitName'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

	$file = "../file/";
	//刪除上傳檔案
	$download_result = mysql_query("select * from `download` where `DB_DowUnitID`='".$id."'");
    while ($download_ary = mysql_fetch_array($download_result)  ){
	
		$file1 = $file.$download_ary['DB_DowFileName'];
		@unlink($file1);
    }
	//更新排序
	ChangeSortDel("download_unit",$row['DB_DowUnitSort'],"DB_DowUnitSort"," && `DB_DowTagID`='".$row['DB_DowTagID']."'");
	
	mysql_query("delete from `download_unit` where `DB_DowUnitID`='$id'") or die("刪除失敗3");
	mysql_query("delete from `download` where `DB_DowUnitID`='$id'") or die("刪除失敗4");
	
	
	echo "<script language='javascript'>alert('刪除成功!');location.href='download_type_edit.php?DB_DowTagID=".$row['DB_DowTagID']."';</script>";
}	  
?>


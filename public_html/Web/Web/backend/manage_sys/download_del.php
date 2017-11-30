<? 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁

$DB_DowTagID=$_GET['DB_DowTagID'];
$id = $_GET['DB_DowID'];  //主鍵

if($id!=""){

	$row = SoloSql('download',"`DB_DowID` = '$id'");
	$row2 = SoloSql('download_unit',"`DB_DowUnitID` = '".$row['DB_DowUnitID']."'");	

	//紀錄使用者資訊	
	$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
	$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','資料下載-".$row2['DB_DowUnitName']."','".ereg_replace("'","\'",$row['DB_DowSubject'])."','del',NOW()";
	Recording_Add("recording",$UpStr,$UpStr2);

	$file = "../file/";
	//刪除上傳檔案
	$download_result = mysql_query("select * from `download` where `DB_DowID`='".$id."'");
    $download_ary = mysql_fetch_array($download_result);
	$file1 = $file.$download_ary['DB_DowFileName'];
	@unlink($file1);
    
	//更新排序
	//ChangeSortDel("download",$row['DB_DowSort'],"DB_DowSort"," && `DB_DowUnitID`='".$row['DB_DowUnitID']."'");
	
	mysql_query("delete from `download` where `DB_DowID`='$id'") or die("刪除失敗4");
	
	
	echo "<script language='javascript'>alert('刪除成功!');location.href='download_list.php?DB_DowTagID=".$DB_DowTagID."&page=".$_GET['page']."';</script>";
}	  
?>


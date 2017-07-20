<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_LifTagID = $_GET['DB_LifTagID'];
//$page=$_GET['page'];

$arry = SoloSql("life_tags","`DB_LifTagID`='".$DB_LifTagID."'");

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."',' 網路相簿','".ereg_replace("'","\'",$arry['DB_LifTagSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if(DB_LifTagID != ""){

		ChangeSortDel("life_tags","".$arry['DB_LifTagSort']."","DB_LifTagSort","");
		
		//********************************************************************
		//刪除掉網路上的資料夾的檔案
		$file1="../photo/";
		$file_ad01=mysql_query("select * from `life` where `DB_LifTagID`='$DB_LifTagID'");
		while($file_arry01=mysql_fetch_array($file_ad01)){
		  $fileadd1=$file1.$file_arry01['DB_LifName'];
		  @unlink($fileadd1);
		}
		
		mysql_query("delete from `life` where `DB_LifTagID`='$DB_LifTagID'");
		mysql_query("delete from `life_album` where `DB_LifTagID`='$DB_LifTagID'");
		mysql_query("delete from `life_tags` where `DB_LifTagID`='$DB_LifTagID'");
				
		parent_url_msg("刪除成功!!","photo_calss.php");
}
?>
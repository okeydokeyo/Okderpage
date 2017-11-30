<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$DB_LefTagID = $_GET['DB_LefTagID'];
//$page=$_GET['page'];

$arry = SoloSql("left_tags","`DB_LefTagID`='".$DB_LefTagID."'");

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','左側選單管理','".ereg_replace("'","\'",$arry['DB_LifTagSubject'])."','del',NOW()";
Recording_Add("recording",$UpStr,$UpStr2);


if(DB_LifTagID != ""){
       
		ChangeSortDel("left_tags","".$arry['DB_LefTagSort']."","DB_LefTagSort","");
		
		//********************************************************************
		//刪除掉網路上的資料夾的檔案
		$file1="../file/";
		$file_ad01=mysql_query("select * from `left_tags` where `DB_LefTagID`='$DB_LefTagID'");
		$file_arry01=mysql_fetch_array($file_ad01);
		$fileadd1=$file1.$file_arry01['DB_LefTagArchive'];
		@unlink($fileadd1);
		
		mysql_query("delete from `left` where `DB_LefTagID`='$DB_LefTagID'");
		mysql_query("delete from `left_tags` where `DB_LefTagID`='$DB_LefTagID'");
				
		parent_url_msg("刪除成功!!","indexleft_calss.php");
}
?>
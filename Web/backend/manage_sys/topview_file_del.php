<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_2"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num=$_GET['num'];
$del=$_GET['del'];
$DB_FileName=$_GET['DB_FileName'];


if($DB_FileName=="DB_AniArchive_1"){
	$DB_FileTitle="DB_AniName_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `animation` where `DB_AniID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_AniArchive_1'];
@unlink($fileadd);
}
//********************************************************************
}elseif($DB_FileName=="DB_AniArchive_2"){
	$DB_FileTitle="DB_AniName_2";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad02=mysql_query("select * from `animation` where `DB_AniID`='$num'");
while($file_arry=mysql_fetch_array($file_ad02)){
$fileadd=$file.$file_arry['DB_AniArchive_2'];
@unlink($fileadd);
}
//********************************************************************
}




if($_GET['del'] == "Yes"){
  $NewsStr="update `animation` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_AniID`='$num'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

if($DB_FileName=="DB_AniArchive_1"){
	echo "<input name=\"DB_AniArchive_1\" type=\"file\" id=\"DB_AniArchive_1\" class=\"text_12px_01\" />";
}elseif($DB_FileName=="DB_AniArchive_2"){
	echo "<input name=\"DB_AniArchive_2\" type=\"file\" id=\"DB_AniArchive_2\" class=\"text_12px_01\" />";
}


?>


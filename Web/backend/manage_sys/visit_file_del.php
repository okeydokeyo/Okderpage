<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_15"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num=$_GET['num'];
$del=$_GET['del'];
$DB_FileName=$_GET['DB_FileName'];

if($DB_FileName=="DB_VisImg_1"){
	$DB_FileTitle="DB_VisFileName_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `visit` where `DB_VisID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_VisImg_1'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_VisImg_2"){
	$DB_FileTitle="DB_VisFileName_2";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `visit` where `DB_VisID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_VisImg_2'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_VisImg_3"){
	$DB_FileTitle="DB_VisFileName_3";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `visit` where `DB_VisID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_VisImg_3'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_VisArchive_1"){
	$DB_FileTitle="DB_VisName_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `visit` where `DB_VisID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_VisArchive_1'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_VisArchive_2"){
	$DB_FileTitle="DB_VisName_2";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `visit` where `DB_VisID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_VisArchive_2'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_VisArchive_3"){
	$DB_FileTitle="DB_VisName_3";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `visit` where `DB_VisID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_VisArchive_3'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_VisArchive2_1"){
	$DB_FileTitle="DB_VisName2_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `visit` where `DB_VisID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_VisArchive2_1'];
@unlink($fileadd);
}
//********************************************************************
}





if($_GET['del'] == "Yes"){
  $NewsStr="update `visit` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_VisID`='$num'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

if($DB_FileName=="DB_VisImg_1"){
	echo "<input name=\"DB_VisImg_1\" type=\"file\" id=\"DB_VisImg_1\" />";
}else if($DB_FileName=="DB_VisImg_2"){
	echo "<input name=\"DB_VisImg_2\" type=\"file\" id=\"DB_VisImg_2\" />";
}else if($DB_FileName=="DB_VisImg_3"){
	echo "<input name=\"DB_VisImg_3\" type=\"file\" id=\"DB_VisImg_3\" />";
}else if($DB_FileName=="DB_VisArchive_1"){
	echo "<input name=\"DB_VisArchive_1\" type=\"file\" id=\"DB_VisArchive_1\" />";
}else if($DB_FileName=="DB_VisArchive_2"){
	echo "<input name=\"DB_VisArchive_2\" type=\"file\" id=\"DB_VisArchive_2\" />";
}else if($DB_FileName=="DB_VisArchive_3"){
	echo "<input name=\"DB_VisArchive_3\" type=\"file\" id=\"DB_VisArchive_3\" />";
}else if($DB_FileName=="DB_VisArchive2_1"){
	echo "<input name=\"DB_VisArchive2_1\" type=\"file\" id=\"DB_VisArchive2_1\" />";
}


?>


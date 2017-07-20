<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_9"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num=$_GET['num'];
$del=$_GET['del'];
$DB_FileName=$_GET['DB_FileName'];

if($DB_FileName=="DB_ArtImg_1"){
	$DB_FileTitle="DB_ArtFileName_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_ArtImg_1'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_ArtImg_2"){
	$DB_FileTitle="DB_ArtFileName_2";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_ArtImg_2'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_ArtImg_3"){
	$DB_FileTitle="DB_ArtFileName_3";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_ArtImg_3'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_ArtArchive_1"){
	$DB_FileTitle="DB_ArtName_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_ArtArchive_1'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_ArtArchive_2"){
	$DB_FileTitle="DB_ArtName_2";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_ArtArchive_2'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_ArtArchive_3"){
	$DB_FileTitle="DB_ArtName_3";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_ArtArchive_3'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_ArtArchive2_1"){
	$DB_FileTitle="DB_ArtName2_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `article` where `DB_ArtID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_ArtArchive2_1'];
@unlink($fileadd);
}
//********************************************************************
}





if($_GET['del'] == "Yes"){
  $NewsStr="update `article` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_ArtID`='$num'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

if($DB_FileName=="DB_ArtImg_1"){
	echo "<input name=\"DB_ArtImg_1\" type=\"file\" id=\"DB_ArtImg_1\" />";
}else if($DB_FileName=="DB_ArtImg_2"){
	echo "<input name=\"DB_ArtImg_2\" type=\"file\" id=\"DB_ArtImg_2\" />";
}else if($DB_FileName=="DB_ArtImg_3"){
	echo "<input name=\"DB_ArtImg_3\" type=\"file\" id=\"DB_ArtImg_3\" />";
}else if($DB_FileName=="DB_ArtArchive_1"){
	echo "<input name=\"DB_ArtArchive_1\" type=\"file\" id=\"DB_ArtArchive_1\" />";
}else if($DB_FileName=="DB_ArtArchive_2"){
	echo "<input name=\"DB_ArtArchive_2\" type=\"file\" id=\"DB_ArtArchive_2\" />";
}else if($DB_FileName=="DB_ArtArchive_3"){
	echo "<input name=\"DB_ArtArchive_3\" type=\"file\" id=\"DB_ArtArchive_3\" />";
}else if($DB_FileName=="DB_ArtArchive2_1"){
	echo "<input name=\"DB_ArtArchive2_1\" type=\"file\" id=\"DB_ArtArchive2_1\" />";
}


?>


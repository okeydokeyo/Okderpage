<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_8"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num=$_GET['num'];
$del=$_GET['del'];
$DB_FileName=$_GET['DB_FileName'];

if($DB_FileName=="DB_OrdImg_1"){
	$DB_FileTitle="DB_OrdFileName_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `ordi` where `DB_OrdID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_OrdImg_1'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_OrdImg_2"){
	$DB_FileTitle="DB_OrdFileName_2";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `ordi` where `DB_OrdID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_OrdImg_2'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_OrdImg_3"){
	$DB_FileTitle="DB_OrdFileName_3";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `ordi` where `DB_OrdID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_OrdImg_3'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_OrdArchive_1"){
	$DB_FileTitle="DB_OrdName_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `ordi` where `DB_OrdID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_OrdArchive_1'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_OrdArchive_2"){
	$DB_FileTitle="DB_OrdName_2";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `ordi` where `DB_OrdID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_OrdArchive_2'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_OrdArchive_3"){
	$DB_FileTitle="DB_OrdName_3";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `ordi` where `DB_OrdID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_OrdArchive_3'];
@unlink($fileadd);
}
//********************************************************************
}else if($DB_FileName=="DB_OrdArchive2_1"){
	$DB_FileTitle="DB_OrdName2_1";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `ordi` where `DB_OrdID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_OrdArchive2_1'];
@unlink($fileadd);
}
//********************************************************************
}





if($_GET['del'] == "Yes"){
  $NewsStr="update `ordi` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_OrdID`='$num'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

if($DB_FileName=="DB_OrdImg_1"){
	echo "<input name=\"DB_OrdImg_1\" type=\"file\" id=\"DB_OrdImg_1\" />";
}else if($DB_FileName=="DB_OrdImg_2"){
	echo "<input name=\"DB_OrdImg_2\" type=\"file\" id=\"DB_OrdImg_2\" />";
}else if($DB_FileName=="DB_OrdImg_3"){
	echo "<input name=\"DB_OrdImg_3\" type=\"file\" id=\"DB_OrdImg_3\" />";
}else if($DB_FileName=="DB_OrdArchive_1"){
	echo "<input name=\"DB_OrdArchive_1\" type=\"file\" id=\"DB_OrdArchive_1\" />";
}else if($DB_FileName=="DB_OrdArchive_2"){
	echo "<input name=\"DB_OrdArchive_2\" type=\"file\" id=\"DB_OrdArchive_2\" />";
}else if($DB_FileName=="DB_OrdArchive_3"){
	echo "<input name=\"DB_OrdArchive_3\" type=\"file\" id=\"DB_OrdArchive_3\" />";
}else if($DB_FileName=="DB_OrdArchive2_1"){
	echo "<input name=\"DB_OrdArchive2_1\" type=\"file\" id=\"DB_OrdArchive2_1\" />";
}


?>


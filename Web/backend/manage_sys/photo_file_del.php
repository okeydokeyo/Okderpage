<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num=$_GET['num'];
$del=$_GET['del'];
$DB_FileName=$_GET['DB_FileName'];

if($DB_FileName=="DB_LifName"){
	$DB_FileTitle="DB_LifFileName";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../photo/";
$file2="../photo/small/";
$file_ad01=mysql_query("select * from `life` where `DB_LifID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_LifName'];
$fileadd2=$file2.$file_arry['DB_LifName'];
@unlink($fileadd);
@unlink($fileadd2);
}
//********************************************************************
}




if($_GET['del'] == "Yes"){
  $NewsStr="update `life` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_LifID`='$num'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

if($DB_FileName=="DB_LifName"){
	echo "<input name=\"DB_LifName\" type=\"file\" class=\"text_12px_01\" id=\"DB_LifName\" size=\"40\" />";
}


?>


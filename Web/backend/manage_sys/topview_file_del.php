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
$DB_FileTitle="DB_LogFileName";
//********************************************************************刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `animation` where `DB_AniID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_LogFileName'];
@unlink($fileadd);
}

if($_GET['del'] == "Yes"){
  $NewsStr="update `animation` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_AniID`='$num'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

echo "<input name=\"DB_LogFileName\" type=\"file\" id=\"DB_LogFileName\" class=\"text_12px_01\" />";
?>


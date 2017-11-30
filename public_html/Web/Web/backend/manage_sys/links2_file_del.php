<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_14"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num=$_GET['num'];
$del=$_GET['del'];
$DB_FileName=$_GET['DB_FileName'];


if($DB_FileName=="DB_WebImg"){
	$DB_FileTitle="DB_WebFileName";
//********************************************************************
//刪除掉網路上的資料夾的檔案
$file="../file/";
$file_ad01=mysql_query("select * from `website` where `DB_WebID`='$num'");
while($file_arry=mysql_fetch_array($file_ad01)){
$fileadd=$file.$file_arry['DB_WebImg'];
@unlink($fileadd);
}
//********************************************************************
}




if($_GET['del'] == "Yes"){
  $NewsStr="update `website` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_WebID`='$num'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

if($DB_FileName=="DB_WebImg"){
	echo "<input name=\"DB_WebImg\" type=\"file\" class=\"text_12px_01\" size=\"40\" /><br />(圖片會依比例自動縮到 寬 142px，<span class=\"text_12px_03\">建議尺寸為：寬142px&nbsp;高42px</span>)";
}


?>


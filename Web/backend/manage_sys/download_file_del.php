<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_11"); //檢查是否功能權限,否回首頁
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num = $_GET['num'];
$DB_FileName = $_GET['DB_FileName'];
$file = "../file/";

//查詢資料
$arry = SoloSql("download","`DB_DowID`='".$num."'");

if ($DB_FileName == "DB_DowFileName"){
	$DB_FileTitle = "DB_DowName";

    $fileimg1 = $file.$arry['DB_DowFileName'];
    @unlink($fileimg1);
	echo "<input name='DB_DowName' type='file' class='text_12px_01' size='40' />";
}

if($_GET['del'] == "Yes"){
   $introStr = "update `download` set `".$DB_FileTitle."`='',`".$DB_FileName."`='' where `DB_DowID`='$num'";
   mysql_query($introStr) or die("更新失敗1！");
}

?>


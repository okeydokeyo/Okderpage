<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁



$num = $_GET['num'];

if ($num != ""){
     //查詢資料
     $arry = SoloSql("left_tags","`DB_LefTagID`='".$num."'");
	 
	 $file="../file/";
     $fileArc = $file.$arry['DB_LefTagArchive'];
     @unlink($fileArc);
     mysql_query("update `left_tags` set `DB_LefTagName`='',`DB_LefTagArchive`='' where `DB_LefTagID`='".$num."'") or die("修改失敗！");
?>	 
	 上傳檔案：<input type="file" name="DB_LefTagName" />
<?
}
?>
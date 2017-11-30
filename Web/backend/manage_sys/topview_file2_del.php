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

$DB_AniPicID = $_GET['num'];
$DB_AniID=$_GET['DB_FileName'];
$del = $_GET['del'];
$file = "../file/";

//查詢資料
$arry2 = SoloSql("animation_picture","`DB_AniPicID`='".$DB_AniPicID."'");

if ($del == "Yes"){
    $filearc1 = $file.$arry2['DB_AniPicArchive'];
    @unlink($filearc1);
    mysql_query("delete from `animation_picture` where `DB_AniPicID`='".$DB_AniPicID."'") or die("刪除失敗2！");
}
			   $animation_picture_result = mysql_query("select * from `animation_picture` where `DB_AniID`='".$DB_AniID."' ORDER BY `DB_AniPicID` ASC");
			   for($i=1;$i<=$animation_picture_ary = mysql_fetch_array($animation_picture_result);$i++){ 
			?>	
					  
				 <a href="../file/<? echo $animation_picture_ary['DB_AniPicArchive'];?>" target="_blank"><? echo $animation_picture_ary['DB_AniPicName'];?></a>
				 <a href="javascript:change3(<? echo $animation_picture_ary['DB_AniPicID'];?>,<? echo $DB_AniID;?>);">
		            <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />				 
				 </a><br />

<? }?>
<?
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_16"); //檢查是否功能權限,否回首頁
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$DB_LogID = $_GET['DB_LogID'];
$del = $_GET['del'];
$DB_LogImg=$_GET['DB_LogImg'];


if($DB_LogImg=="DB_LogImg1" || $DB_LogImg=="DB_LogImg2" || $DB_LogImg=="DB_LogImg3" || $DB_LogImg=="DB_LogImg4" || $DB_LogImg=="DB_LogImg5"){
	$DB_FileTitle="DB_LogFileName";
//********************************************************************
//刪除掉網路上的資料夾的檔案
    $file="../../carouselPicture/";
    $file_ad01=mysql_query("select * from `carousel` where `DB_LogID`='$DB_LogID'");
    while($file_arry = mysql_fetch_array($file_ad01)){
        $fileadd = $file . $file_arry['DB_LogImg'];
        @unlink($fileadd);
    }
//********************************************************************
}


if($_GET['del'] == "Yes"){
  $NewsStr="update `carousel` set `".$DB_FileTitle."`='',`DB_LogImg`='' where `DB_LogID`='$DB_LogID'";
  mysql_query($NewsStr) or die("更新失敗1！");
}

if($DB_FileName=="DB_LogImg1"){
	echo "<input name=\"DB_LogImg1\" type=\"file\" id=\"DB_LogImg1\" />";
}
else if($DB_FileName=="DB_LogImg2"){
	echo "<input name=\"DB_LogImg2\" type=\"file\" id=\"DB_LogImg2\" />";
} 
else if($DB_FileName=="DB_LogImg3"){
	echo "<input name=\"DB_LogImg3\" type=\"file\" id=\"DB_LogImg3\" />";
} 
else if($DB_FileName=="DB_LogImg2"){
	echo "<input name=\"DB_LogImg4\" type=\"file\" id=\"DB_LogImg4\" />";
} 
else if($DB_FileName=="DB_LogImg5"){
	echo "<input name=\"DB_LogImg5\" type=\"file\" id=\"DB_LogImg5\" />";
} 
?>

<?
/*$DB_LogID = $_GET['DB_LogID'];
$DB_LogImg = $_GET['DB_LogImg'];

//********************************************************************
//刪除掉網路上的資料夾的檔案    
$file="../../carouselPicture/";
$file_ad01 = mysql_query("select * from `carousel` where `DB_LogID`='$DB_LogID'");
while($file_arry=mysql_fetch_array($file_ad01)){
    $fileadd = $file . $file_arry['DB_LogImg'];
    @unlink($fileadd);
}
//********************************************************************

$NewsStr="update `carousel` set `DB_LogImg`='',`DB_LogFileName`='' where `DB_LogID`= '.$DB_LogID.' ";
mysql_query($NewsStr) or die("更新失敗1！");

if($DB_LogID == 1){
    echo "<input name=\"DB_LogImg1\" type=\"file\" id=\"DB_LogImg1\" />";
}
else if($DB_LogID == 2){
    echo "<input name=\"DB_LogImg2\" type=\"file\" id=\"DB_LogImg2\" />";
}
else if($DB_LogID == 3){
    echo "<input name=\"DB_LogImg3\" type=\"file\" id=\"DB_LogImg3\" />";
}
else if($DB_LogID == 4){
    echo "<input name=\"DB_LogImg4\" type=\"file\" id=\"DB_LogImg4\" />";
}
else if($DB_LogID == 5){
    echo "<input name=\"DB_LogImg5\" type=\"file\" id=\"DB_LogImg5\" />";
} */
?>


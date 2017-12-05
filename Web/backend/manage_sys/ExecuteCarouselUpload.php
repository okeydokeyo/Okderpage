<?php 
include "cksession.php";
include "../config.php";
include "../function.php";

$DB_LogID = $_POST['DB_LogID'];
$DB_LogExp = basename($_FILES["DB_LogImg"]["name"]);
$target_dir = "../../carouselPicture/";
$location = $target_dir . $DB_LogExp;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);
if($DB_LogID == 1){
    $target_file = $target_dir . "1." . $imageFileType;
}
else if($DB_LogID == 2){
    $target_file = $target_dir . "2." . $imageFileType;
}
else if($DB_LogID == 3){
    $target_file = $target_dir . "3." . $imageFileType;
}
else if($DB_LogID == 4){
    $target_file = $target_dir . "4." . $imageFileType;
}
else if($DB_LogID == 5){
    $target_file = $target_dir . "5." . $imageFileType;
}
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["DB_LogImg"]["tmp_name"]);
    if($check !== false) {
        $error = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else {
        $error = "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["DB_LogImg"]["size"] > 16677216) {
    $error = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    $error = "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["DB_LogImg"]["tmp_name"], $target_file)) {
        $sql = "UPDATE `carousel` SET `DB_LogExp`='".$DB_LogExp."', `DB_LogImg`='".$DB_LogID."',`DB_LogFileName`= '".$DB_LogID."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."' WHERE `DB_LogID` ='".$DB_LogID."'";	
        mysql_query($sql);
        $error = "上傳成功！";
    } 
    else {
        $error = "Sorry, there was an error uploading your file.";
    }
}

//紀錄使用者資訊	
$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','輪播圖片管理','".$DB_LogExp."','edit',NOW()";	
Recording_Add("recording",$UpStr,$UpStr2);

echo '<script> alert("'.$error.'"); parent.location.href="carousel_edit.php"; </script>';
?>
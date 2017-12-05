<?php 
include "cksession.php";
include "../config.php";
include "../function.php";
$DB_MesID = $_POST['DB_MesID']; 
$DB_MadBack = ereg_replace("'","\'",$_POST['DB_MadBack']);    
$DB_MadBack = trim($DB_MadBack);
//新增
$UpSQL="UPDATE comments SET `note`= '".$DB_MadBack."' WHERE `DB_MesID`=$DB_MesID"; 
mysql_query($UpSQL) or die("更新失敗!"); 
?>
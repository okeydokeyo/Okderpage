<?php
    include "../config.php";
    $id = intval($_GET['DB_MesID']);
    $passNum = intval($_GET['passNum']);
    $sql = "UPDATE `comments` SET `pass`='$passNum' WHERE `DB_MesID`='$id'";
    mysql_query($sql);
?>
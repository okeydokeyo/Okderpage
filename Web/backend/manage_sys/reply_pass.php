<?php
    include "../config.php";
    $id = intval($_GET['DB_MadID']);
    $passNum = intval($_GET['passNum']);
    $sql = "UPDATE `comments_reply` SET `pass`='$passNum' WHERE `DB_MadID`='$id'";
    mysql_query($sql);
?>
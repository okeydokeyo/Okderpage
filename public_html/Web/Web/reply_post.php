<?php
    require_once("dbtools.inc.php");

    $ReplyID = $_POST["reply_num"];
    if($ReplyID == "")
        $ReplyID = "-1";
    $name = $_POST["reply_name"];
    $content = $_POST["reply_content"];
    date_default_timezone_set('Asia/Taipei');   
    $current_time = date("Y-m-d H:i:s");
    
    $link = create_connection();
    $sql = "INSERT INTO comments_reply(DB_MesID, reply_name, DB_MadBack, DB_MadTime) VALUES('$ReplyID', '$name', '$content', '$current_time')";
    $result = execute_sql("scsrc2", $sql, $link);
    mysql_close($link);
    header("location:billboard.php");
    exit(); 
?>
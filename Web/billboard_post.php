<?php
    require_once("dbtools.inc.php");
    
    $name = $_POST["name"];
    $topic = $_POST["topic"];
    $content = $_POST["content"];
    $current_time = date("Y-m-d H:i:s");

    $link = create_connection();
    $sql = "INSERT INTO comments(name, topic, content, time) VALUES('$name', '$topic', '$content', '$current_time')";
    $result = execute_sql("scsrc", $sql, $link);
    
    mysqli_close($link);
    header("location:billboard.php");
    exit(); 
?>
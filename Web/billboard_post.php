<?php
    require_once("dbtools.inc.php");
    
    $content = $_POST["content"];
    $name = $_POST["name"];
    $topic = $_POST["topic"];
    switch($_POST["category"]){
        case "donation":
            $category = "捐款";
            break;
        case "report":
            $category = "通報";
            break;
        case "injury":
            $category = "脊髓損傷";
            break;
        case "information":
            $category = "中心相關問題";
            break;
    }
    date_default_timezone_set('Asia/Taipei');   
    $current_time = date("Y-m-d H:i:s");

    $link = create_connection();
    $sql = "INSERT INTO comments(name, topic, content, category, time) VALUES('$name', '$topic', '$content', '$category', '$current_time')";
    $result = execute_sql("scsrc", $sql, $link);
    
    mysqli_close($link);
    header("location:billboard.php");
    exit(); 
?>
<?php
  function create_connection(){
    $link = mysqli_connect("localhost", "root", "okderrr") or die("無法建立資料連接<br><br>" . mysqli_error());
    mysqli_query("SET NAMES utf8");
    return $link;
  }
	
  function execute_sql($database, $sql, $link){
    $db_selected = mysqli_select_db($link, $database) or die("開啟資料庫失敗<br><br>".mysqli_error($link));	 
    $result = mysqli_query($link, $sql);
    return $result;
  }
?>
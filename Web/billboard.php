<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    //用戶端判斷是否有輸入留言
        function check_data(){
            if(document.myForm.name.value.length == 0)
                alert("請填寫姓名欄！");
            else if(document.myForm.topic.value.length == 0)
                alert("請填寫留言主題！");
            else if(document.myForm.content.value.length == 0)
                alert("請填寫留言內容！");
            else
                myForm.submit();
        }
    </script>
</head>
<header>
    <?php
        include("top_menu.php");
    ?>
</header>
<body>    
    <form name="myForm" method="post" action="billboard_post.php" style="margin-top:200px">
        <table border=0 width="800" align="center" cellspacing="0">
            <tr>
                <td width="15%">姓名</td>
                <td width="85%"><input name="name" type=text size="50"></td>
            </tr>
            <tr>
                <td width="15%">主題</td>
                <td width="85%"><input name="topic" type=text size="50"></td>
            </tr>
            <tr>
                <td width="15%">內容</td>
                <td width="85%"><textarea name="content" cols="50" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" algn="center">
                    <input type="button" value="發布" onClick="check_data()">
                </td>
            </tr>
        </table>
    </form>
    
    <?php
        require_once("dbtools.inc.php");
        $link = create_connection();
        $sql = "SELECT*FROM comments ORDER BY time DESC";
        $result = execute_sql("scsrc", $sql, $link);    
        
        /* 
        
        
        前端顯示留言的UI
        
        
        */
        mysql_free_result($result);
        mysql_close($link);
    ?>
    
    <footer>
        <?php
            include("footer.php");
        ?>
    </footer>
</body>
</html>
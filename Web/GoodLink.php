<html>
<head>
    <title>好站連結</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="GoodLink.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>    
    <header>
        <?php 
        include("top_menu.php");
        ?>
    </header>
    
    <table cellspacing="1" cellpadding="1" border="0" id="table">
        <?php
        require_once("dbtools.inc.php");
        $link = create_connection();        
        mysql_select_db("scsrc2", $link);
        $result = mysql_query("SELECT * FROM website_tags ORDER BY DB_WebTagID ASC");
        while($row = mysql_fetch_array($result))
        {
            echo "<tr><td><h1>".$row['DB_WebTagSubject']."</h1><br></td></tr>";
            $result2 = mysql_query("SELECT * FROM website WHERE DB_WebTagID = '".$row['DB_WebTagID']."' AND DB_WebAnnounce='0' ORDER BY DB_WebID DESC");
            while($row2 = mysql_fetch_array($result2))
            {
                echo "<tr><td><a href='".$row2['DB_WebUrl']."' target='_blank' title='".$row2['DB_WebSubject']."'><img src='images/GoodLink/".$row2['DB_WebImg']."' alt='".$row2['DB_WebSubject']."'></a>&nbsp;&nbsp;&nbsp;";
                echo "<a href='".$row2['DB_WebUrl']."' target='_blank'>".$row2['DB_WebSubject']."</a><br><br><br></td></tr>";
            }
            echo "<tr><td><br><br><br><br></td></tr>";
        }
        mysql_close($link);
        ?>
    </table> 

    <footer>
        <?php
        include("footer.php");
        ?>
    </footer>
</body>
</html>
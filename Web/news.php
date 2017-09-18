<html>
<head>
    <title>相關雜誌</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="news.css">
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


    
<form id="newsForm" method="get" action="news.php"><font id="newsSubject">雜誌分類：</font>
    <select name="mag" onchange="window.location='news.php?mag='+this.value">
        <option value="">-請選擇-</option>
        <option value="1">友善新世界</option>
        <option value="2">超人之友</option>
        <option value="3">服務成果報告書</option>
    </select><br>

    <?php  
        require_once("dbtools.inc.php");
        $link = create_connection();        
        mysql_select_db("scsrc2", $link);
        
        if(@$_GET["mag"]==1)
        {
            $result = mysql_query("SELECT * FROM ordi WHERE DB_OrdBasis='3' AND DB_OrdKind ='1'");
            echo '<h1>友善新世界</h1><br>';
            while($row = mysql_fetch_array($result))
            {
              echo "<a href='".$row['DB_OrdUrl3_1']."' target='_blank' class='magslink'>".$row['DB_OrdSubject'];
              echo "<br><br>";
            }

        }
        else if(@$_GET["mag"]==2)
        {
            $result = mysql_query("SELECT * FROM ordi WHERE DB_OrdBasis='3' AND DB_OrdKind ='2'");
            echo '<h1>超人之友</h1><br>';
            while($row = mysql_fetch_array($result))
            {
              echo "<a href='".$row['DB_OrdUrl3_1']."' target='_blank' class='magslink'>".$row['DB_OrdSubject'];
              echo "<br><br>";
            }

        }
        else if(@$_GET["mag"]==3)
        {
            $result = mysql_query("SELECT * FROM ordi WHERE DB_OrdBasis='3' AND DB_OrdKind ='3'");
            echo '<h1>服務成果報告書</h1><br>';
            while($row = mysql_fetch_array($result))
            {
              echo "<a href='".$row['DB_OrdUrl3_1']."' target='_blank' class='magslink'>".$row['DB_OrdSubject'];
              echo "<br><br>";
            }

        }

        mysql_close($link);
    ?>
</form>

    
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
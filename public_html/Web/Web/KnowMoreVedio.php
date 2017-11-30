<html>
<head>
    <title>認識脊髓損傷</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="KnowMore.css">
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
    

    <form id="vedioForm" method="get" action="KnowMoreVedio.php"><font id="vedioSubject">影片：</font>
        <select name="vedio" onchange="window.location='KnowMoreVedio.php?vedio='+this.value">
            <option value="">-請選擇-</option>
            <?php
            $result = mysql_query("SELECT * FROM ordi WHERE DB_OrdTagID='29'");
            while($row = mysql_fetch_array($result))
            {
                echo "<option value='".$row['DB_OrdID']."'>".$row['DB_OrdSubject']."</option>";
            }
            ?>
        </select><br>
        <?php
        $result = mysql_query("SELECT * FROM ordi WHERE DB_OrdTagID='29'");
        while($row = mysql_fetch_array($result))
        {
            if($row['DB_OrdID'] == @$_GET["vedio"])
            {
                echo "<h1>".$row['DB_OrdSubject']."</h1>";
                echo $row['DB_OrdYou_1'];
            }
        }
        ?>
        
    </form>
    
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
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
    
    <?php
    $result = mysql_query("SELECT * FROM article WHERE DB_ArtID = '".$_GET[artID]."'");
    while($row = mysql_fetch_array($result))
    {
        echo "<table class='artTitle'><tr><td><h1>".$row['DB_ArtSubject']."</h1></td></tr></table>";
        echo $row['DB_ArtContent'];
    }
    ?>
    
    <footer>
    <?php
    include("footer.php");
    ?>
    </footer>
</body>
</html>
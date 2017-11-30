<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="about_3.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="content.css">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


</head>
    
    <header>
        <?php 
        include("top_menu.php");
        ?>
    </header>
    
    <body>
        <div class="header-image">
            <img src="train4.jpg" alt="" class="img-full">
        </div> 
    
        <?php 
        $result = mysql_query("SELECT * FROM article WHERE DB_ArtID='48'") or die("查詢失敗");;
        while($row = mysql_fetch_array($result)){   
            echo $row['DB_ArtContent'];
        }
        ?>  
        
        <div style="text-align:center;"><IFRAME SRC="https://www.beclass.com/showregist.php?regist_id=MjAzYzZhNjU4ZTVhMmQ1OTM2ZDc6U2hvd0Zvcm0=" FRAMEBORDER="0" height="1120" width="700" marginwidth="0" marginheight="0" align="center"></IFRAME></div>
        
        <footer>
        <?php
        include("footer.php");
        ?>
        </footer>
    </body>
</html>
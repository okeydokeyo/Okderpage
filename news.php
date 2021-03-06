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

    <form id="newsForm" method="get" action="news.php"><font id="newsSubject">刊物分類：</font>
        <select name="mag" onchange="window.location='news.php?mag='+this.value">
            <option value="">-請選擇-</option>
            <?php
            $result = mysql_query("SELECT * FROM `left` WHERE `DB_LefTagID`='35' ORDER BY `DB_LefSort` ASC");
            while($row = mysql_fetch_array($result)){
                echo "<option value='".$row['DB_LefNumID']."'>".$row['DB_LefSubject']."</option>";
            }
            ?>
        </select><br><br>
        
        <?php
        $result1 = mysql_query("SELECT * FROM `ordi` WHERE `DB_OrdKind`='".@$_GET["mag"]."' ORDER BY `DB_OrdID` ASC");
        $result2 = mysql_query("SELECT * FROM `left` WHERE `DB_LefTagID`='35' ORDER BY `DB_LefSort` ASC");
        
        while($row = mysql_fetch_array($result2)){  //取大標題
            if($row['DB_LefNumID']==@$_GET["mag"]){
                echo "<h1>".$row['DB_LefSubject']."</h1><br><br>";
            }
        }
        while($row = mysql_fetch_array($result1)){
            if($row['DB_OrdTagID']==11){            //超人之友第一層
                echo "<a href='".$row['DB_OrdUrl3_1']."' class='magslink'>".$row['DB_OrdSubject'];
                echo "<br><br>";
            }
            else{
                echo "<a href='".$row['DB_OrdUrl3_1']."' target='_blank' class='magslink'>".$row['DB_OrdSubject'];
                echo "<br><br>";
            }
        }

        if(@$_GET["{124}"] != null){                //超人之友第二層
            $result3 = mysql_query("SELECT * FROM `publication_tags` WHERE `DB_OrdTagID`='".@$_GET["{124}"]."'");
            while($row3 = mysql_fetch_array($result3))echo "<br><h1>".$row3['DB_OrdTagSubject']."</h1><br><br>";
            
            $result4 = mysql_query("SELECT * FROM `ordi` WHERE `DB_OrdTagID`='".@$_GET["{124}"]."' ORDER BY `DB_OrdID` ASC");
            while($row4 = mysql_fetch_array($result4)){
                echo "●&nbsp;&nbsp;&nbsp;&nbsp;<a href='news.php?magArt=".$row4['DB_OrdID']."' class='magslink'>".$row4['DB_OrdSubject']."</a><br><br>";
            }
            
            echo "<br><br><a href='news.php?mag=124' class='magslink'>-回上頁-</a>";
        }

        if(@$_GET["magArt"] != null){               //超人之友第三層
            $result5 = mysql_query("SELECT * FROM `ordi` WHERE `DB_OrdID`='".@$_GET["magArt"]."'");
            while($row5 = mysql_fetch_array($result5))
            {
                echo "<br><h1>".$row5['DB_OrdSubject']."</h1><br><br>";
                echo $row5['DB_OrdContent'];
                echo "<br><br><br><a href='news.php?{124}=".$row5['DB_OrdTagID']."' class='magslink'>-回上頁-</a>";
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
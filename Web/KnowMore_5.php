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
    

    <form name="form1" method="get" action="KnowMore_5.php">影片：
        <select name="vedio" onchange="window.location='KnowMore_5.php?vedio='+this.value">
            <option value="">-請選擇-</option>
            <?php
            $con = mysql_connect("localhost","root","");
            if (!$con)
            {
              die('Could not connect: ' . mysql_error());
            }

            mysql_select_db("scsrc2", $con);
            mysql_query("SET NAMES utf8"); 
            $result = mysql_query("SELECT * FROM ordi WHERE DB_OrdTagID='29'");
            while($row = mysql_fetch_array($result))
            {
                echo "<option value='".$row['DB_OrdID']."'>".$row['DB_OrdSubject']."</option>";
            }
            mysql_close($con);
            ?>
        </select><br>
        <?php
        $con = mysql_connect("localhost","root","");
        if (!$con)
        {
          die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("scsrc2", $con);
        mysql_query("SET NAMES utf8"); 
        $result = mysql_query("SELECT * FROM ordi WHERE DB_OrdTagID='29'");
        while($row = mysql_fetch_array($result))
        {
            if($row['DB_OrdID'] == @$_GET["vedio"])
            {
                echo "<h1>".$row['DB_OrdSubject']."</h1>";
                echo $row['DB_OrdYou_1'];
            }
        }

        mysql_close($con);
        ?>
        
    </form>
<!--    
<table cellspacing="1" cellpadding="2" border="0" id="table">
    <tbody>
        <tr>
		  <td colspan="2" align="left" valign="middle"><h1>脊髓損傷衛教影片</h1><br><br></td>
		</tr>
        <tr>
            <td align="center">公告日期<br><br></td>
            <td align="center">標題<br><br></td>
        </tr>
        
        
        <tr>
            <td>2013-03-14&nbsp;&nbsp;&nbsp;<br><br></td>
            <td class="href"><a href="https://www.youtube.com/watch?v=73F4SvBTkLs" target="_blank">脊髓損傷者常用輔具介紹</a><br><br></td>
        </tr>
        <tr>
            <td>2013-03-14<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=uWfdtSx_MIk" target="_blank">脊髓損傷者居家環境改造</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=4JrGHKJ_UOQ" target="_blank">脊髓損傷者的泌尿系統</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=FVEheiKFx90" target="_blank">認識脊髓損傷 生理篇</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=G1Ajxdip6mM" target="_blank">認識脊髓損傷 後遺症篇</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=2xYgD5rNSpY" target="_blank">排尿障礙及泌尿系統重建</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=UoHejPpTOvA" target="_blank">脊髓損傷之排尿訓練</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=U94-XYGSnFc" target="_blank">脊髓損傷之性功能及生育</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=Cdp147hr6A8" target="_blank">泌尿併發症之篩檢及處理</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=7ytpIa9iSog" target="_blank">排便障礙護理</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=50rRu93G3CE" target="_blank">排便障礙的復健</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=hIvq8Kj94zQ" target="_blank">日常身體的自我照護</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=GgzhE81ER8M" target="_blank">皮膚照護與傷口護理</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=YGXQSzgJi_0" target="_blank">管路的照護</a><br><br></td>
        </tr>
        <tr>
            <td>2013-01-07<br><br></td>
            <td><a href="https://www.youtube.com/watch?v=n4scbZWcyXQ" target="_blank">汽機車改裝介紹</a><br><br></td>
        </tr>
        -->
    </tbody>
</table>
    
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
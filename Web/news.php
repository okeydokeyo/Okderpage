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

<select name="mag" onChange="">
    <option value="mag">-請選擇-</option>
    <option value="mag1">第一期</option>
    <option value="mag2">第二期</option>
    <option value="mag3">第三期</option>
    <option value="mag4">第四期</option>
    <option value="mag5">第五期</option>
    <option value="mag6">第六期</option>
    <option value="mag7">第七期</option>
    <option value="mag8">第八期</option>
    <option value="mag9">第九期</option>
    <option value="mag10">第十期</option>
</select>

    
    
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
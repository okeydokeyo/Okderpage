<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
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
    
<div class="video-container"> 
    <video autoplay loop poster="images/video.png" plays-inline id="index-video" muted>
        <source src="videos/index-video.mp4" type="video/mp4">
    </video>
     <h1>邀您一起<br/>
    推動希望之輪</h1>
</div>   
    
<div id="myCarousel" class="container carousel slide" dataride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/Banner-01.jpg">
        </div>
        <div class="item"><img src="images/Banner-01.jpg"></div>
        <div class="item"><img src="images/Banner-01.jpg"></div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    
<div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        
    <div class="col-md-4">
    <div class="flip-container col-xs-4 col-md-10 col-md-offset-1">
        <div class="flipper">
            <div class="front">
                <img src="images/關於我們.png" class="img-responsive" alt="關於我們">
            </div>
            <div class="back">
                <img src="images/點我查看_灰.png" class="img-responsive" alt="點我查看">
            </div>
        </div>
    </div>
    </div>
        
    <div class="col-md-4">
    <div class="flip-container col-xs-4 col-md-10 col-md-offset-1">
        <a href="https://scsrc.eoffering.org.tw/contents/project_ct?p_id=13">
        <div class="flipper">
            <div class="front">
                <img src="images/個案故事_紅.png" class="img-responsive" alt="個案故事">
            </div>
            <div class="back">
                <img src="images/點我查看_紅.png" class="img-responsive" alt="點我查看">
            </div>
        </div>
        </a>
    </div>
    </div>
        
    <div class="col-md-4">
    <div class="flip-container col-xs-4 col-md-10 col-md-offset-1">
       <a href="KnowMore_1.php"> 
       <div class="flipper">
            <div class="front">
                <img src="images/認識脊髓損傷.png" class="img-responsive" alt="認識脊髓損傷">
            </div>
            <div class="back">
                <img src="images/點我查看_灰.png" class="img-responsive" alt="點我查看">
            </div>
        </div>
       </a>
    </div>
    </div>
        
    </div>
</div>
    

<div>
    <a href="http://www.scidps.org.tw/a1.asp">
        <img src="images/BB1.png" title="我要通報" id="BB1" />
	</a>
</div>
<div>
    <a href="https://scsrc.eoffering.org.tw/contents/project_ct?p_id=1">
        <img src="images/BB2.png" title="我要捐款" id="BB2" />
	</a>
</div>
    
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
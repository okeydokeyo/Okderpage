<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<<<<<<< HEAD
||||||| merged common ancestors
    
    
    
    <script>
    $( function(){
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            name = $( "#name" ),
            email = $( "#email" ),
        password = $( "#password" ),
        allFields = $( [] ).add( name ).add( email ).add( password ),
        tips = $( ".validateTips" );
 
        function updateTips( t ) {
        tips.text( t ).addClass( "ui-state-highlight" );
        setTimeout(function() {
            tips.removeClass( "ui-state-highlight", 1500 );}, 500 );
        }
 
        function checkLength( o, n, min, max ) {
            if ( o.val().length > max || o.val().length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( "Length of " + n + " must be between " +
                    min + " and " + max + "." );
                return false;
            }  
            else {
                return true;
            }
        }
 
        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } 
            else {
                return true;
            } 
        }
 
        dialog = $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
                "確定": addUser,
                "取消": function() {
                    dialog.dialog( "close" );
                }
            },
            close: function() {
                form[ 0 ].reset();
                allFields.removeClass( "ui-state-error" );
            }
        });
 
        form = dialog.find( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            addUser();
        });
      
        $( "#BB1" ).button().on( "click", function() {
        dialog.dialog( "open" );});
      
        function addUser() {
          var valid = true;
          allFields.removeClass( "ui-state-error" );
          valid = valid && checkLength( name, "username", 3, 16 );
          valid = valid && checkLength( email, "email", 6, 80 );
          valid = valid && checkLength( password, "password", 5, 16 );
          valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
          valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
          valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
          if ( valid ) {
            dialog.dialog( "close" );
          }
          return valid;
        }
      } );
  </script>
    
    <style type="text/css">
	#abgne_float_ad {
		display: none;
		position: absolute;
	}
	#abgne_float_ad .abgne_close_ad {
		display: block;
		text-align: right;
		cursor: pointer;
		font-size: 12px;
	}
	#abgne_float_ad a img {
		border: none;
	}
	div.bigDiv {
		height: 3000px;
	}
</style>
    
<script type="text/javascript">
	// 當網頁載入完
	$(window).load(function(){
		var $win = $(window),
			$ad = $('#abgne_float_ad').css('opacity', 0).show(),	// 讓廣告區塊變透明且顯示出來
			_width = $ad.width(),
			_height = $ad.height(),
			_diffY = -95, _diffX = 750,	// 距離右及下方邊距
			_moveSpeed = 400;	// 移動的速度
		
		// 先把 #abgne_float_ad 移動到定點
		$ad.css({
			top: $(document).height(),
			left: $win.width() - _width - _diffX,
			opacity: 1
		});
		
		// 幫網頁加上 scroll 及 resize 事件
		$win.bind('scroll resize', function(){
			var $this = $(this);
			
			// 控制 #abgne_float_ad 的移動
			$ad.stop().animate({
				top: $this.scrollTop() + $this.height() - _height - _diffY,
				left: $this.scrollLeft() + $this.width() - _width - _diffX
			}, _moveSpeed);
		}).scroll();	// 觸發一次 scroll()
		
		// 關閉廣告
		$('#abgne_float_ad .abgne_close_ad').click(function(){
			$ad.hide();
		});
	});
</script>
=======
    
    
    
    <script>
		
		
    $( function(){
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            name = $( "#name" ),
            email = $( "#email" ),
        password = $( "#password" ),
        allFields = $( [] ).add( name ).add( email ).add( password ),
        tips = $( ".validateTips" );
 
        function updateTips( t ) {
        tips.text( t ).addClass( "ui-state-highlight" );
        setTimeout(function() {
            tips.removeClass( "ui-state-highlight", 1500 );}, 500 );
        }
 
        function checkLength( o, n, min, max ) {
            if ( o.val().length > max || o.val().length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( "Length of " + n + " must be between " +
                    min + " and " + max + "." );
                return false;
            }  
            else {
                return true;
            }
        }
 
        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } 
            else {
                return true;
            } 
        }
 
        dialog = $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
                "確定": addUser,
                "取消": function() {
                    dialog.dialog( "close" );
                }
            },
            close: function() {
                form[ 0 ].reset();
                allFields.removeClass( "ui-state-error" );
            }
        });
 
        form = dialog.find( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            addUser();
        });
      
        $( "#BB1" ).button().on( "click", function() {
        dialog.dialog( "open" );});
      
        function addUser() {
          var valid = true;
          allFields.removeClass( "ui-state-error" );
          valid = valid && checkLength( name, "username", 3, 16 );
          valid = valid && checkLength( email, "email", 6, 80 );
          valid = valid && checkLength( password, "password", 5, 16 );
          valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
          valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
          valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
          if ( valid ) {
            dialog.dialog( "close" );
          }
          return valid;
        }
      } );
  </script>
    
    <style type="text/css">
	#abgne_float_ad {
		display: none;
		position: absolute;
	}
	#abgne_float_ad .abgne_close_ad {
		display: block;
		text-align: right;
		cursor: pointer;
		font-size: 12px;
	}
	#abgne_float_ad a img {
		border: none;
	}
	div.bigDiv {
		height: 3000px;
	}
</style>
    
<script type="text/javascript">
	// 當網頁載入完
	$(window).load(function(){
		var $win = $(window),
			$ad = $('#abgne_float_ad').css('opacity', 0).show(),	// 讓廣告區塊變透明且顯示出來
			_width = $ad.width(),
			_height = $ad.height(),
			_diffY = -95, _diffX = 750,	// 距離右及下方邊距
			_moveSpeed = 400;	// 移動的速度
		
		// 先把 #abgne_float_ad 移動到定點
		$ad.css({
			top: $(document).height(),
			left: $win.width() - _width - _diffX,
			opacity: 1
		});
		
		// 幫網頁加上 scroll 及 resize 事件
		$win.bind('scroll resize', function(){
			var $this = $(this);
			
			// 控制 #abgne_float_ad 的移動
			$ad.stop().animate({
				top: $this.scrollTop() + $this.height() - _height - _diffY,
				left: $this.scrollLeft() + $this.width() - _width - _diffX
			}, _moveSpeed);
		}).scroll();	// 觸發一次 scroll()
		
		// 關閉廣告
		$('#abgne_float_ad .abgne_close_ad').click(function(){
			$ad.hide();
		});
	});
</script>
>>>>>>> 9e7f0b895588e0a04d60b419c9f399056b1f897a
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
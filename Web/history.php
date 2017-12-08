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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
	<div id="content">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="margin_01" class="text_12px_01" summary="">
		      <tr><td class="h5"></td></tr>
		      <tr>
			    <td align="left" valign="middle" class="border_02 text_12px_01-2">
                    <script src="jquery.min.js" language="javascript"></script>
                    <script language="javascript">
                        window.onload=RollDown;
                        function RollDown(){
                            $('html,body').animate({scrollTop:$('#time').offset().top}, 2500);
                        }
                    </script>
                    <link rel="stylesheet" type="text/css" href="about_2.css">
                    <div class="header-image">
                        <img src="images/banner/中心歷史.jpg" onerror="javascript:this.src='/images/banner/na.png'" class="img-full">
                    </div>

<div  id="time" class="timeline">
    <div class="timeline-target clearfix" data-max-items="42" data-limit="5">                  
        <?php                
        $result = mysql_query("SELECT * FROM history");              
        while($row = mysql_fetch_array($result)){         
            if($row['DB_HistoryID'] % 2 === 0){
                echo "        
                <div class='timeline-item even'>   
                    <div class='timeline-badge bg-default'><em class='fa fa-calendar'></em></div>
                        <div class='timeline-panel' data image='http://image.redbull.com/rbx00725/0001/0/1180/890/479/uploads/images/news/P-20160507-00049_News.jpg'>
                            <div class='box'>
                                <div class='timeline-heading'>
                                    <div class='timeline-social'>
                                        <i class='fa fa-yelp fa-2x' herf='http://news.ltn.com.tw/news/life/breakingnews/2081236'></i> 
                                    </div>
                                <div class='timeline-date font-cond'><span class='timeline-day'>".$row['DB_Year']."</span>
                                    <div class='timeline-date-right'>
                                        <span class='timeline-month'>".$row['DB_Month']."</span><br><br>
                                    </div>
                                </div>
                            </div>
                    ";
                if($row['DB_ImgNum'] === ""){
                    echo "
                            <h4 class='timeline-title'>".$row['DB_Title']."<br></h4>
                        <div class='timeline-body'><p class='body'></p></div>
                        </div>
                    </div>
                </div>";
                }
                else{
                    echo "
                            <h4 class='timeline-title'>".$row['DB_Title']."<br>
                            <img src='images/".$row['DB_ImgNum'].".jpg' width='600'>
                            </h4>
                            <div class='timeline-body'><p class='body'></p></div>
                        </div>
                    </div>
                </div>";
                } 
            }
            else{ 
                echo "        
            <div class='timeline-item odd'>
            <div class='timeline-badge bg-default'><em class='fa fa-calendar'></em></div>
            <div class='timeline-panel' data-image='http://image.redbull.com/rbx00725/0001/0/1180/890/479/uploads/images/news/P-20170507-02160_News_01.jpg'>
                <div class='box'>
                    <div class='timeline-heading'>
                        <div class='timeline-social'><em class='fa fa-yelp fa-2x' herf='http://health.cna.com.tw/sport/20151108s012.aspx'></em> </div>
                        <div class='timeline-date font-cond'><span class='timeline-day'>".$row['DB_Year']."</span>
                            <div class='timeline-date-right'><span class='timeline-month'>".$row['DB_Month']."</span><br>
                            </div>
                        </div>
                    </div>";                 
                if($row['DB_ImgNum'] === ""){
                    echo "
                    <h4 class='timeline-title'>".$row['DB_Title']."<br></h4>
                    <div class='timeline-body'><p class='body'></p></div>
                </div>
            </div>
        </div>";
                }
                else{
                    echo "
                    <h4 class='timeline-title'>".$row['DB_Title']."<br><img src='images/".$row['DB_ImgNum'].".jpg' width='600'></h4>
                    <div class='timeline-body'><p class='body'></p></div>
                </div>
            </div>
        </div>";
                }
            } 
            }       
        ?> 
    </div>
</div>		
                  </td>
          </tr>
		  <tr><td class="h5"></td></tr>
        </table>
        </div>
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
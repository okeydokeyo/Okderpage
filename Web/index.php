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
                <?php
                $Logo_result = mysql_query("select * from `animation` where `DB_AniID`='1' && `DB_LogAnnounce`='0'") or die("查詢失敗lo");
                $Logo_num = mysql_num_rows($Logo_result);
                if ($Logo_num <> 0){
                    $Logo_ary = mysql_fetch_array($Logo_result);
                }
                else{
                    $Logo2_result = mysql_query("select * from `animation` where `DB_LogAnnounce`='0' ORDER BY `DB_AniID` ASC") or die("查詢失敗lo2");
                    $Logo_ary = mysql_fetch_array($Logo2_result);
                }
                ?>	
                <source src="videos/<?php echo $Logo_ary['DB_LogImg'];?>" type="video/mp4">
            </video>
            <h1>邀您一起<br>推動希望之輪</h1>
        </div>   

        <div class="wrapper"> 
            <div class="box-a"><br>
                <div id="myCarousel" class="container carousel slide" dataride="carousel">  
                    <ol class="carousel-indicators">
                        <?php 
                        $carousel_result = mysql_query("select * from `carousel` where `DB_LogImg`!=''") or die("查詢失敗lo");
                        $carousel_num = mysql_num_rows($carousel_result);
                        $i = 0;
                        while($i < $carousel_num){
                            if($i == 0){
                                echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
                            }
                            else{    
                                echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
                            }
                            $i++;
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner" >
                        <?php  
                        $i=0;
                        while($i < $carousel_num){       
                            $location = "../../carouselPicture/" . mysql_result($carousel_result,$i,1);
                            $imageFileType = pathinfo($location, PATHINFO_EXTENSION);                       
                            $j = $i + 1;
                            $name = $j . "." . $imageFileType;
                            if($i == 0){            
                                echo '<div class="item active"><img src="carouselPicture/'.$name.'"></div>';
                            }
                            else{  
                                echo '<div class="item"><img src="carouselPicture/'.$name.'"></div>';
                            }
                            $i++;
                        }
                        ?>
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
            </div> 
            <div class="box-b">
                <?php 
                if(isset($_GET['show']))  $show=$_GET['show']; 
                else $show = '0';
                $Inter_result = mysql_query("select * from `inter` ORDER BY `DB_IntSort` ASC") or die("查詢失敗n3");		     
                while ($Inter_ary = mysql_fetch_array($Inter_result)){           
                    if($Inter_ary['DB_IntBasis']=="1"){	      
                        $ordt_result = mysql_query("select * from `ordi_tags` where `DB_OrdTagID`='".$Inter_ary['DB_IntNumID']."' && `DB_OrdTagAnnounce`='0'") or die("查詢失敗b1");	      
                        $ordt_ary = mysql_fetch_array($ordt_result);
                ?>                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>		    
                        <div style="width:13%; float:left;">  
                            <? if ($ordt_ary['DB_OrdTagID'] != ""){?>
                            <a href="news_list.php?no=<? echo $Inter_ary['DB_IntNumID'];?>" title="更多(<? echo $Inter_ary['DB_IntSubject'];?>)" class="link_03">
                                <img src="images/news.png" alt="more" width="80" border="0" />
                            </a>
                            <? }?>
                        </div>
                    </tr>  
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="margin_01" summary="<?php echo $Inter_ary['DB_IntSubject'];?>文字表格">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="margin_01" summary="<?php echo $Inter_ary['DB_IntSubject'];?>文字表格">  
                        <?php //查詢條例式訊息管理資料
                        $time = date("Y-m-d"); //時間		   
                        $Ordi_result = mysql_query("select * from `ordi` where `DB_OrdTagID`='".$Inter_ary['DB_IntNumID']."' && `DB_OrdAnnounce`='0' && (`DB_OrdStart_Time`<='$time' && `DB_OrdEnd_Time`>='$time' || `DB_OrdPermanent`='1')  ORDER BY `DB_OrdTime` DESC LIMIT 0,".$Inter_ary['DB_IntOrdi']."");	   
                        $Ordi_num = mysql_num_rows($Ordi_result);		   
                        if ($Ordi_num <> 0 && $ordt_ary['DB_OrdTagID'] != ""){			
                            while ( $Ordi_ary = mysql_fetch_array($Ordi_result) ){	         
                                if ($Ordi_ary['DB_OrdBasis'] == "1"){			             
                                    $newClass = "news_com.php?no=".$Ordi_ary['DB_OrdID']."";						 
                                    $newName = $Ordi_ary['DB_OrdSubject'];						 
                                    $newOpen = "";			 
                                }
                                else if ($Ordi_ary['DB_OrdBasis'] == "2"){			             
                                    $newClass = "download.php?DB_FileTitle=".$Ordi_ary['DB_OrdName2_1']."&DB_FileName=".$Ordi_ary['DB_OrdArchive2_1']."";		$newName = "".$Ordi_ary['DB_OrdName2_1']."(點擊下載)";					 
                                    $newOpen = "";		 
                                }
                                else if ($Ordi_ary['DB_OrdBasis'] == "3"){	             
                                    $newClass = $Ordi_ary['DB_OrdUrl3_1'];	 
                                    $newName = "".$Ordi_ary['DB_OrdSubject']."(另開新視窗)";			 
                                    $newOpen = "target='_blank'";
                                }
                        ?>
                        <tr>
                            <td width="1%" align="center" valign="top" id="padding_07" class="border_02">
                                <img src="images/icon_point.gif" alt="*" width="3" height="3" />
                            </td>
                            <td width="12%" align="left" valign="top" class="text_12px_06 border_02">
                                <?php echo $Ordi_ary['DB_OrdTime'];?>
                            </td>
                            <td align="left" valign="middle" class="border_02">
                                <a href="<?php echo $newClass;?>" class="link_03" title="<?php echo $newName;?>" <?php echo $newOpen;?>>
                                <?php echo $Ordi_ary['DB_OrdSubject'];?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="h5"></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table><br/>
                </table>
                <?php
                    }
                }
                ?>
            </div>    
        </div> 
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="col-md-4">
                    <div class="flip-container col-xs-4 col-md-10 col-md-offset-1">
                        <a href="about_1.php"> 
                            <div class="flipper">
                                <div class="front">
                                    <img src="images/關於我們.png" class="img-responsive" alt="關於我們">
                                </div>
                                <div class="back">
                                    <img src="images/點我查看_灰.png" class="img-responsive" alt="點我查看">
                                </div>
                            </div>
                        </a>
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
        <?php 
        include("footer.php");          
        ?>
        <script src="http://download.arefly.com/chinese_convert.js"></script>
        <script>
            var defaultEncoding = 1; // 預設語言：1-繁體中文 | 2-简体中文
            var translateDelay = 0;
            var cookieDomain = "http://web.cc.ncu.edu.tw/~103403519/";	// 修改爲你的部落格地址
            var msgToTraditionalChinese = "繁簡轉換";	// 簡轉繁時所顯示的文字
            var msgToSimplifiedChinese = "繁简转换"; 	// 繁转简时所显示的文字
            var translateButtonId = "translateLink";	// 「轉換」<A>鏈接標籤ID
            translateInitilization();
        </script>       
    </body>
</html>
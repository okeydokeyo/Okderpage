<link rel="stylesheet" type="text/css" href="BasicStyle.css">
<script type="text/javascript" src="js/dd.js"></script>
<script language="javascript">

    function check(){
        if(document.searchform.name.value == "站內搜尋"){
            alert('標題搜尋未正確填寫，請確認');
            document.searchform.name.focus();
            return;
        }
        else if(document.searchform.name.value == ""){
            alert('標題搜尋未正確填寫，請確認');
            document.searchform.name.focus();
            return;
        }
        else{
            document.searchform.submit();
        }
    }

</script>
<nav class="navbar navbar-fixed-top" id="nav">
        <nav class="navbar" id="top-navbar"> 
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myTopNavBar" id="top-navbar-button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>    
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="myTopNavBar">
                    <ul class="nav navbar-nav navbar-right a" id="top-list">
                       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">關於我們<span class="caret"></span></a>
                                                        <ul class="dropdown-menu" id="dropdown-menu">
                                        <li><a href="art.php?no=25">中心簡介</a></li>
                                        <li><a href="art.php?no=26">中心歷史</a></li>
                                        <li><a href="art.php?no=29">新生命之家</a></li>
                                        <li><a href="art.php?no=68">職業訓練中心願景</a></li><br>
                       <li class="main-menu" onmouseover="switchMenu( this, 'SubMenu3' )" onmouseout="hideMenu()" onclick="switchMenu( this, 'SubMenu3' )"><a>超人工作室 </a><ul id="SubMenu3" class="sub-menu" style="display:none;">
                                        <li><a href="art.php?no=33">客服工作室</a></li>
                                        <li><a href="art.php?no=34">網路工作室</a></li>
                                        <li><a href="art.php?no=52">綠色資源工作室</a></li></ul></li>  
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">服務內容<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                        <li><a href="art.php?no=42">生活重建訓練</a></li>
                                        <li><a href="art.php?no=47">社區居住服務</a></li>
                                        <li><a href="art.php?no=45">作業訓練</a></li>
                                        <li><a href="art.php?no=44">職業訓練</a></li>
                                        <li><a href="art.php?no=63">生命教育宣導</a></li>
                                        <li><a href="art.php?no=64">居家就業</a></li>
                                </ul>
                        </li>
                        <li><a href="https://scsrc.eoffering.org.tw/" target="_blank">我要捐款</a></li>
                         <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">捐贈資訊<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                        <li><a href="art.php?no=69">愛心電子發票捐贈</a></li>
                                        <li><a href="art.php?no=36">物資募集</a></li>
                                        <li><a href="donate2.php">捐款捐物徵信</a></li>
                                        <li><a href="donate3.php">統一勸募徵信</a></li>
                                        <li><a href="donate4.php">年度收支表</a></li>
                                        <li><a href="donate5.php">會計師查核報告書</a></li>
                                </ul></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">認識脊髓損傷<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                    <?php
                                    error_reporting(E_ALL ^ E_DEPRECATED);
                                    include "config.php";
                                    include "function.php";
                                    $result = mysql_query("SELECT * FROM top WHERE DB_TopTagID='4' ORDER BY DB_TopSort ASC");
                                    while($row = mysql_fetch_array($result)){
                                        echo "<li><a href='KnowMore.php?artID=".$row['DB_TopNumID']."'>".$row['DB_TopSubject']."</a></li>";
                                    }
                                    ?>
                                    <li><a href="KnowMoreVedio.php">脊髓損傷衛教影片</a></li>
                                    <!--
                                    <li><a href="KnowMore_1.php">什麼是脊髓損傷</a></li>
                                    <li><a href="KnowMore_2.php">造成脊髓損傷的原因</a></li>
                                    <li><a href="KnowMore_3.php">台灣脊髓損傷者概況</a></li>
                                    <li><a href="KnowMore_4.php">脊髓損傷的急救處理</a></li>
                                    <li><a href="KnowMore_5.php">脊髓損傷衛教影片</a></li>
                                    -->
                                </ul>
                        </li>
                        <li><a href="http://www.sci.org.tw/" target="blank">脊髓新樂園</a></li>
                        <li>
                            <a href="javascript:translatePage();" id="translateLink"></a>
                        </li>
                        <li>
                        <form action="search.php" method="post" name="searchform">
                            <tr>
                                <td><input name="name" type="text" onblur="if(this.value=='')this.value='站內搜尋'" onfocus="if(this.value.indexOf('站')!=-1)this.value=''" value="站內搜尋" size="10" id="KeyWord"/>
                                </td>
                            </tr>
                            <tr>
                              <td><input type="button" value="站內搜尋" onclick="return check()" id="search_button"></td>
                            </tr>
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
       </nav>
        <nav class="navbar" id="bottom-menu">
            <div class="container-fluid">
            <? 
            $Logo_result = mysql_query("select * from `logo` where `DB_LogID`='1' && `DB_LogAnnounce`='0'") or die("查詢失敗lo");
            $Logo_num = mysql_num_rows($Logo_result);
            if ($Logo_num <> 0){
                $Logo_ary = mysql_fetch_array($Logo_result);
            }
            else{
                $Logo2_result = mysql_query("select * from `logo` where `DB_LogAnnounce`='0' ORDER BY `DB_LogID` ASC") or die("查詢失敗lo2");
                $Logo_ary = mysql_fetch_array($Logo2_result);
            }
            ?>	
                <a href="index.php"><img src="images/<? echo $Logo_ary['DB_LogImg'];?>" alt="網站所屬單位名稱及商標圖" id="logo"/></a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myBottomNavBar" id="bottom-navbar-button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myBottomNavBar">
                    <ul class="nav navbar-nav navbar-right b" id="bottom-list">
                        <li class="active"><a href="news.php">
                            友善新世界雜誌<span class="sr-only">(current)
                            </span></a>
                        </li>
                        <li><a href="news_list.php?no=13">媒體報導</a></li>
                        <li><a href="volunteer.php">志工園地</a></li>
                        <li><a href="GoodLink.php">好站連結</a></li>
                        <li><a href="billboard.php">留言板</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>
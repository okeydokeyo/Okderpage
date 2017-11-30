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
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">關於我們<span class="caret"></span></a>
                            <ul class="dropdown-menu" id="dropdown-menu">
                            <?php
                                error_reporting(E_ALL ^ E_DEPRECATED);
                                include "config.php";
                                include "function.php";
                                $result = mysql_query("SELECT * FROM top WHERE DB_TopTagID='2' ORDER BY DB_TopSort ASC");
                                while($row = mysql_fetch_array($result)){
                                    echo "<li><a href='art.php?no=".$row['DB_TopNumID']."'>".$row['DB_TopSubject']."</a></li>";
                                }
                            ?>           
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">服務內容<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                    <?php
                                    $result = mysql_query("SELECT * FROM `left` WHERE `DB_LefTagID` = 34 ORDER BY DB_LefSort ASC");
                                    while($row = mysql_fetch_array($result)){
                                        echo "<li><a href='art.php?no=".$row['DB_LefNumID']."'>".$row['DB_LefSubject']."</a></li>";
                                    }
                                    ?>
                                </ul>
                        </li>
                        <li><a href="https://scsrc.eoffering.org.tw/" target="_blank">我要捐款</a></li>
                         <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">捐贈資訊<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                    <?php
                                    $result = mysql_query("SELECT * FROM `top` WHERE `DB_TopTagID` = 3 ORDER BY DB_TopSort ASC");
                                    while($row = mysql_fetch_array($result)){
                                        if($row['DB_TopNumID'] == 12){
                                            echo "<li><a href='download_list.php?no=12'>".$row['DB_TopSubject']."</a></li>";    
                                        }
                                        else if($row['DB_TopNumID'] == 13){
                                            echo "<li><a href='download_list.php?no=13'>".$row['DB_TopSubject']."</a></li>";    
                                        }
                                        else if($row['DB_TopNumID'] == 14){
                                            echo "<li><a href='download_list.php?no=14'>".$row['DB_TopSubject']."</a></li>";    
                                        }
                                        else if($row['DB_TopNumID'] == 15){
                                            echo "<li><a href='download_list.php?no=15'>".$row['DB_TopSubject']."</a></li>";    
                                        }
                                        else{
                                            echo "<li><a href='art.php?no=".$row['DB_TopNumID']."'>".$row['DB_TopSubject']."</a></li>";
                                        }
                                    }
                                    ?>   
                                </ul></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">認識脊髓損傷<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                    <?php
                                    $result = mysql_query("SELECT * FROM top WHERE DB_TopTagID='4' ORDER BY DB_TopSort ASC");
                                    while($row = mysql_fetch_array($result)){
                                        echo "<li><a href='art.php?no=".$row['DB_TopNumID']."'>".$row['DB_TopSubject']."</a></li>";
                                    }
                                    ?>
                                    <li><a href="KnowMoreVedio.php">脊髓損傷衛教影片</a></li>
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
            <?php
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
                <a href="index.php"><img src="images/<?php echo $Logo_ary['DB_LogImg'];?>" alt="網站所屬單位名稱及商標圖" id="logo"/></a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myBottomNavBar" id="bottom-navbar-button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myBottomNavBar">
                    <ul class="nav navbar-nav navbar-right b" id="bottom-list">
                    <?php
                        $result = mysql_query("SELECT * FROM `left_tags` WHERE `row` = 2 AND `DB_LefTagAnnounce` = 0 ORDER BY DB_LefTagSort ASC");
                        while($row = mysql_fetch_array($result)){
                            echo "<li><a href='".$row['DB_LefTagUrl']."'>".$row['DB_LefTagSubject']."</a></li>";
                        }
                    ?>  
                    </ul>
                </div>
            </div>
        </nav>
    </nav>
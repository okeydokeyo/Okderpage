<!DOCTYPE html>
<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="billboard_style.css">
    
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function showReply(ID_in){
               if (ID_in == "") {
                    document.getElementById("dialog-form").innerHTML = "";
                    return;
                } 
                else { 
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
                    } 
                    else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   // code for IE6, IE5
                    }

                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("dialog-form").innerHTML = this.responseText;
                            $(function() {
                            var w = $(window).width() * 0.5;
                            var h = $(window).height() * 0.5;
                            var dialog = $("#dialog-form").dialog({
                                autoOpen: false,
                                draggable: false,
                                resizable: false,
                                height: h,
                                width: w,
                                modal: true,
                                position: { my: 'center', at: 'center'}
                            });
                                dialog.dialog( "open" );
                            });
                            $('#sendreply_button').click(function(){
                                $("#dialog-form").submit();
                                alert("您的回覆已提交，審核後即會顯示於下方回覆區");
                            });

                        }
                    };
                    xmlhttp.open("GET","dialog.php?q="+ID_in,true);
                    xmlhttp.send();
                }  
            }  
    </script>
</head>
<body>    
<header>
    <?php 
        include("top_menu.php");
    ?>
</header>
    <form id="dialog-form" method="post" title="回覆留言" style="display:none" action="reply_post.php">
    </form>
   <div class="myDiv" style="margin-top:180px">
       <ul>
            <?php
            $num = $_GET['num'];
            require_once("dbtools.inc.php");
            $link = create_connection();
            if($num == 1)
                $sql = "SELECT*FROM comments WHERE category='捐款' AND pass=1 ORDER BY time DESC";
            else if($num == 2)
                $sql = "SELECT*FROM comments WHERE category='通報' AND pass=1 ORDER BY time DESC";
            else if($num == 3)
                $sql = "SELECT*FROM comments WHERE category='脊髓損傷' AND pass=1 ORDER BY time DESC";
            else
                $sql = "SELECT*FROM comments WHERE category='中心相關問題' AND pass=1 ORDER BY time DESC";
            $result = execute_sql("scsrc", $sql, $link);    
            $num_rows = mysql_num_rows($result);
           class Message{
                var $ID, $category, $topic, $name, $current_time, $content;
                function __construct($ID_in, $category_in, $topic_in, $name_in, $time_in, $content_in){
                    $this->ID = $ID_in;
                    $this->category = $category_in;
                    $this->topic = $topic_in;
                    $this->name = $name_in;
                    $this->current_time = $time_in;
                    $this->content = $content_in;
                }
                function displayMessage(){
                    echo '
                        <li>
                    <table id="message_table" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <input type="button" value="'.$this->category.'" id="category" onclick="link_category(\''.$this->category.'\')">
                            </td>
                        </tr>
                        <tr class="message_row">
                            <td id="td_1"><label id="topic_label">'.$this->topic.'</label></td>
                            <td id="td_2" rowspan="2">
                                <label class="name_label">'.$this->name.'</label>
                            </td>
                        </tr>
                        <tr class="message_row tr_2">
                            <td><label id="time_label">'.$this->current_time.'</label></td>
                        </tr>
                        <tr class="message_row tr_2">
                            <td width="100%" colspan="2">
                                <textarea readonly="readonly" class="form-control content_area" rows=6 style="background-color: white;">'.$this->content.'</textarea>
                            </td>
                        </tr>
                        <tr class="message_row" align="right">
                            <td id="td_3" colspan="2">
                                <input type="button" value="回覆" id="replybutton" onClick="showReply('.$this->ID.')">
                            </td>
                        </tr>
                    </table>
                        </li>';
                }
            }
            $message_count=0;
            $i=0;
            while($i < $num_rows){
                $Obj = new Message(mysql_result($result,$i,0), mysql_result($result,$i,4), mysql_result($result,$i,3), mysql_result($result,$i,2), mysql_result($result,$i,5), mysql_result($result,$i,1));
                if($message_count >= 3){
                    echo '
                        </ul>
                        </div>
                        <div class="myDiv">
                        <ul>'; 
                    $Obj -> displayMessage();
                    $i++;
                    $message_count = 1;
                }
                else{
                    $Obj -> displayMessage();
                    $i++;
                    $message_count++;
               }  
            }
            mysql_free_result($result);
            mysql_close($link);
        ?>
    </ul>   
    </div>
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
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
    //用戶端判斷是否有輸入留言
        function check_data(){
            if(document.myForm.content.value.length == 0)
                alert("請填寫留言內容！");
            else if(document.myForm.name.value.length == 0)
                alert("請填寫姓名欄！");
            else if(document.myForm.topic.value.length == 0)
                alert("請填寫留言主旨！");
            else if($('input[name=category]:checked').length <= 0)
                alert("請選擇留言類別！");
            else{
                myForm.submit();
                alert("您的留言已提交，審核後即會顯示於下方留言區");
            }
        }
        
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
                            var dialog = $("#dialog-form").dialog({
                                autoOpen: false,
                                height: 600,
                                width: 1000,
                                modal: true,
                                position: { my: 'center bottom', at: 'center center'}
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
<header>
    <?php
        include("top_menu.php");
    ?>
</header>
<body>  
    <?php
        require_once("dbtools.inc.php");
        $link = create_connection();
    ?>  
    <form id="dialog-form" method="post" title="回覆留言" style="display:none" action="reply_post.php">
    </form>
    
    <form name="myForm" method="post" action="billboard_post.php">
        <table width="80%" align="center" cellspacing="0" id="input_table">
            <tr>
                <td width="100%" colspan="3">
                    <textarea class="form-control" rows="4" name="content" placeholder="留言內容" id="input_area"></textarea>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <input type="text" class="form-control Input" name="name" placeholder="姓名：">
                </td>
                <td width="40%">
                    <input type="text" class="form-control Input" name="topic" placeholder="主旨：">
                </td>
                <td valign="center" >
                    <label class="radio-inline" style="margin-left:15px"><input type="radio" name="category" value="donation" id="A">捐款</label>
                    <label class="radio-inline"><input type="radio" name="category" value="report">通報</label>
                    <label class="radio-inline"><input type="radio" name="category" value="injury">脊髓損傷</label>
                    <label class="radio-inline"><input type="radio" name="category" value="information">中心相關問題</label>
                </td>
            </tr>
            <tr align="right">
                <td colspan="3">
                    <input type="button" value="發布" class="sendbutton" onClick="check_data()">
                </td>
            </tr>
        </table>
    </form>
    
    <div class="myDiv">
        <ul>
            <?php
            $sql = "SELECT*FROM comments WHERE pass=1 ORDER BY time DESC";
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
                    <table id="message_table"  cellspacing="0">
                        <tr>
                            <td><label id="category">'.$this->category.'</label></td>
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
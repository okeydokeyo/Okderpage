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
            else if(document.myForm.email.value.length == 0)
                alert("請填寫聯絡信箱！");
            else{
                showConfirmDialog("1");
            }
        }
        
        function showConfirmDialog(type){
            $(function(){
                var w = $(window).width() * 0.5;
                var h = $(window).height() * 0.35;
                var dialog = $("#confirm-dialog-form").dialog({
                    autoOpen: false,
                    draggable: false,
                    resizable: false,
                    modal: true,
                    height: h,
                    width: w,
                    position: { my: 'center', at: 'center'}
                });
                dialog.dialog( "open" );
            });
            $('#submitMessage').click(function(){
                if(type == "1"){
                    if(document.getElementById("IHaveReadTheRules").checked == true){
                        $(function(){
                            $("#messageSuccess").dialog({
                                modal: true,
                                buttons:{
                                    Ok:function(){
                                        myForm.submit();
                                        $(this).dialog("close");
                                    }
                                }
                            });
                        }); 
                    }
                    else{
                        $(function(){
                            $("#readTheRulesFirst").dialog({
                                modal: true,
                                buttons: {
                                    Ok: function() {
                                        $( this ).dialog( "close" );
                                    }
                                }
                            });
                        });
                    }    
                }
                else if(type == "2"){
                    if(document.getElementById("IHaveReadTheRules").checked == true){
                        $( function(){
                            $("#replySuccess").dialog({
                                modal: true,
                                buttons:{
                                    Ok: function(){
                                        $( this ).dialog( "close" );
                                         $("#dialog-form").submit();
                                    }
                                }
                            });
                        });
                    }
                    else{
                        $( function(){
                            $("#readTheRulesFirst").dialog({
                                modal: true,
                                buttons:{
                                    Ok:function() {
                                        $( this ).dialog( "close" );
                                    }
                                }
                            });
                        });
                    }   
                }
            }); 
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
                            var w = $(window).width() * 0.5;
                            var h = $(window).height() * 0.5;
                            var dialog = $("#dialog-form").dialog({
                                autoOpen: false,
                                draggable: false,
                                resizable: false,
                                modal: false,
                                height: h,
                                width: w,
                                position: { my: 'center', at: 'center'}
                            });
                            dialog.dialog( "open" );
                        });
                        $('#sendreply_button').click(function(){
                            showConfirmDialog("2");
                        });
                    }
                };
                xmlhttp.open("GET","dialog.php?q="+ID_in,true);
                xmlhttp.send();
            }  
        }  
        
        function link_category(category){
            var num;
            if(category == "捐款")
                num = 1;
            else if(category == "通報")
                num = 2;
            else if(category == "脊髓損傷")
                num = 3;
            else 
                num = 4;
            window.location = ("billboard_sort.php?num=" + num);
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
    
    <form id="confirm-dialog-form" title="留言板注意事項" style="display:none">
        <p>(1)本留言版僅供留言，任何與本網頁或脊髓損傷無關的內容或宣傳活動皆會被刪除，且不會另行通知。</p>
        <p>(2)請不要留一切有可能展開罵戰, 人身攻擊或惡意性批評任何人的留言。</p>
        <p>(3)請勿在留言版上留粗口、污穢性及侮辱性等字眼。</p>
        <p>(4)請清楚瀏覽本網站的資料內容後再行留言發問，本網站涵括了許多實用的資訊。</p>
        <p>(5)如果有任何問題，可以透過寄送電子郵件至 sci@scsrc.org.tw 聯絡我們！</p>
        <p>(6)本網保留一切刪除留言且不另行通知的權利, 敬請配合。</p>
        <input type="checkbox" id="IHaveReadTheRules"> 我已詳讀並同意留言板使用規則<br><br>
        <input type="button" id="submitMessage" value="提交審核留言">
    </form>
    
    <div id="messageSuccess">
        <p>您的留言已提交，審核後即會顯示於下方留言區</p>
    </div>
    
    <div id="replySuccess">
        <p>您的回覆已提交，審核後即會顯示於下方留言區</p>
    </div>
    
    <div id="readTheRulesFirst">
        <p>請確認回覆規則！</p>
    </div>
    
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
                    <input type="text" class="form-control Input" name="topic" placeholder="主旨：（八字以內）">
                </td>
                <td valign="center" >
                    <label class="radio-inline" style="margin-left:15px"><input type="radio" name="category" value="donation" id="A">捐款</label>
                    <label class="radio-inline"><input type="radio" name="category" value="report">通報</label>
                    <label class="radio-inline"><input type="radio" name="category" value="injury">脊髓損傷</label>
                    <label class="radio-inline"><input type="radio" name="category" value="information">中心相關問題</label>
                </td>
            </tr>
            <tr align="right">
                <td colspan="2">
                    <input type="text" class="form-control Input" name="email" placeholder="連絡信箱：">
                </td>
                <td>
                    <input type="button" value="發布" class="sendbutton" onClick="check_data()">
                </td>
            </tr>
        </table>
    </form>
    
    <div class="myDiv">
        <ul>
            <?php
            $sql = "SELECT*FROM comments WHERE pass=1 ORDER BY DB_MesTime DESC";
            $result = execute_sql("scsrc2", $sql, $link);    
            $num_rows = mysql_num_rows($result);
            class Message{
                var $ID, $category, $topic, $name, $current_time, $content, $reply_num, $button, $name_style;
                function __construct($ID_in, $category_in, $topic_in, $name_in, $time_in, $content_in){
                    $this->ID = $ID_in;
                    
                    $this->category = $category_in;
                    if($this->category ===  "捐款"){
                        $this->button = "button1";
                    }
                    else if($this->category === "通報"){
                        $this->button = "button2";
                    }
                    else if($this->category === "脊髓損傷"){
                        $this->button = "button3";
                    }
                    else if($this->category === "中心相關問題"){
                        $this->button = "button4";
                    }
                    
                    $this->topic = $topic_in;
                    
                    $length = mb_strlen($name_in, 'utf-8');
                    if($length>5){
                        $arr1 = str_split($name_in);
                        
                        for($i=0; $i < $length; $i+=5){
                            $name_in = substr_replace($name_in, "<br>", $i+5, 0);
                        }
                        
                        $this->name_style = "name_style_2";
                    }
                    else{
                        $this->name_style = "name_style_1";
                    }
                    
                    $this->name = $name_in;
                    
                    $this->current_time = $time_in;
                    $this->content = $content_in;
                    
                    $link2 = create_connection();
                    $reply_sql = "SELECT*FROM comments_reply WHERE DB_MesID=".$this->ID." AND pass=1";
                    $reply_result = execute_sql("scsrc2", $reply_sql, $link2); 
                    $reply_num_in = mysql_num_rows($reply_result);
                    
                    $this->reply_num = $reply_num_in;
                }
                function displayMessage(){
                    echo '
                        <li>
                    <table id="message_table" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <input type="button" value="'.$this->category.'" id="category" class="'.$this->button.'" onclick="link_category(\''.$this->category.'\')">
                            </td>
                        </tr>
                        <tr class="message_row">
                            <td id="td_1"><label id="topic_label">'.$this->topic.'</label></td>
                            <td id="td_2" rowspan="2">
                                <label class="'.$this->name_style.'">'.$this->name.'</label>
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
                            <td id="td_4" colspan="2">
                                <p id="showReplyNum">'.$this->reply_num.'則留言</p>
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
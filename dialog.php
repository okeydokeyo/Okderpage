<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="billboard_style.css">

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script><meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="billboard_style.css">

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    
<body>
    <?php
        include "config.php";
        include "function.php";
        $q = intval($_GET['q']);
        $comment_result = mysql_query("SELECT*FROM comments WHERE DB_MesID='".$q."'") or die("查詢失敗n3"); 
        $ID = mysql_result($comment_result,0,0);
        $name = mysql_result($comment_result,0,2);
        $name_style;
        if(mb_strlen($name, 'utf-8')>5){
            $name_style = "name_style_2";
        }
        else{
            $name_style = "name_style_1";
        }
        $topic = mysql_result($comment_result,0,3);
        $content = mysql_result($comment_result,0,1);
        echo '
            <input type="hidden" name="reply_num" value="'.$q.'">
            <table width="80%" align="center" cellspacing="0" border=0>
            <tr>
                <td colspan="1">
                    <label class="'.$name_style.'">'.$name.'</label>
                </td>
                <td colspan="2">
                    <label id="reply_topic">'.$topic.'</label>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="3">
                <p id="reply_content_area">'.$content.'</p>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <input type="text" class="form-control Input" name="reply_name" placeholder="姓名...">
                </td>
                <td width="60%">
                    <input type="text" class="form-control Input" name="reply_content" placeholder="寫個回覆...">
                </td>
                <td align="center">
                    <input type="button" class="sendbutton" id="sendreply_button" value="回覆">
                </td>
            </tr>
            </table>'; 
        $reply_result = mysql_query("SELECT*FROM comments_reply WHERE DB_MesID=".$q." AND pass=1") or die("查詢失敗n3");; 
        $num_rows = mysql_num_rows($reply_result);
        $i=0;
        while($i<$num_rows){
            $reply_name = mysql_result($reply_result,$i,2);
            $reply_content = mysql_result($reply_result,$i,3);
            $reply_time = mysql_result($reply_result,$i,4);
            $reply_manager = mysql_result($reply_result,$i,6);
            if($reply_manager == 1){
                echo '<table width="80%" align="center" cellspacing="0" border=0 style="margin-top:10px">
                        <tr>
                            <td rowspan="2" width="15%" align="center">
                                <label class="reply_name_label2">'.$reply_name.'</label>
                            </td>
                            <td width="75%" align="left" valign="bottom">
                                <label>'.$reply_content.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <label>'.$reply_time.'</label>
                            </td>
                        </tr>
                    </table>';
            }
            else{
                echo '<table width="80%" align="center" cellspacing="0" border=0 style="margin-top:10px">
                        <tr>
                            <td rowspan="2" width="15%" align="center">
                                <label class="reply_name_label">'.$reply_name.'</label>
                            </td>
                            <td width="75%" align="left" valign="bottom">
                                <label>'.$reply_content.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <label>'.$reply_time.'</label>
                            </td>
                        </tr>
                    </table>';
            }
            $i++;   
        }
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
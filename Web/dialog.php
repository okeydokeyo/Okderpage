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
        $q = intval($_GET['q']);
        require_once("dbtools.inc.php");
        $link = create_connection();
        $sql = "SELECT*FROM comments WHERE ID='".$q."'";
        $comment_result = execute_sql("scsrc", $sql, $link); 
        $ID = mysql_result($comment_result,0,0);
        $name = mysql_result($comment_result,0,2);
        $topic = mysql_result($comment_result,0,3);
        $content = mysql_result($comment_result,0,1);
        echo '
            <input type="hidden" name="reply_num" value="'.$q.'">
            <table width="80%" align="center" cellspacing="0" border=0>
            <tr>
                <td colspan="1">
                    <label class="name_label">'.$name.'</label>
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
    
        $reply_sql = "SELECT*FROM comments_reply WHERE comment_num=".$q."";
        $reply_result = execute_sql("scsrc", $reply_sql, $link); 
        $num_rows = mysql_num_rows($reply_result);
        $i=0;
        while($i<$num_rows){
            $reply_name = mysql_result($reply_result,$i,2);
            $reply_content = mysql_result($reply_result,$i,3);
            $reply_time = mysql_result($reply_result,$i,4);
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
            $i++;   
        }
        mysql_free_result($comments_result);
        mysql_free_result($reply_result);
        mysql_close($link);
    ?>
</body>
</html>
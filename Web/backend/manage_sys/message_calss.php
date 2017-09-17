<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_18"); //檢查是否功能權限,否回首頁


$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//留言版管理查詢
$sql = "SELECT * FROM `comments` ORDER BY DB_MesTime DESC";	
$return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$url = "message_calss.php"; //本頁的網址 & 使用的 get變數
?>

<? 
include_once ("top.php");
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script language="javascript">
    <!--
        //換頁Script
        function GoPage(page){
            location.href="<? echo $url ?>?page="+page;
        }
        //選擇是否刪除
        function Delete(id,page){
            if ( confirm("是否刪除此筆紀錄") ){
                location.href='message_calssdel.php?chkdel=YES&DB_MesID='+id+'&page='+page;
            }
        }
        
function Message_Pass(id){
        $(function() {
            $( "#comment_pass" ).dialog({
                resizable: false,
                height: "auto",
                width: 500,
                modal: true,
                buttons: {
                    確認審核通過: function() {
                        $.ajax({
                                method: "GET",
                                url: "message_pass.php",
                                data:{DB_MesID:id, passNum:1},
                                success: function(data){
                                    $("#comment_pass").dialog( "close" );
                                    location.reload();
                                },
                                error: function(ts) {
                                    alert(ts.responseText);
                                }
                            });  
                    },
                    確認審核未過: function() {
                            $.ajax({
                                method: "GET",
                                url: "message_pass.php",
                                data:{DB_MesID:id, passNum:0},
                                success: function(data){
                                    $("#comment_pass").dialog( "close" );
                                    location.reload();
                                },
                                error: function(ts) {
                                    alert(ts.responseText);
                                }
                            }); 
                    },
                    取消: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });
}
    -->
</script>
<!--top_end-->
<html>
<body>
<div id="comment_pass" title="留言審核" style="display: none;">
    <p>提醒：審核通過後即會公開顯示</p> 
    <p>提醒：審核確認後只能刪除留言，無法將審核未過之留言改為通過</p> 
</div>
    
<table width="955" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="203" align="left" valign="top">
<!--menu-->
    <? include_once ("left_menu.php");?>
<!--menu_end-->
	</td>
    <td width="752" align="left" valign="top">
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" valign="middle"><img src="images/gray_01.gif" width="10" height="20" /></td>
		<td align="left" valign="middle"><img src="images/icon_a1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;
            <strong><? echo $userauth['DB_ManName'];?></strong> 
            歡迎登入!!&nbsp;&nbsp;
        </td>
		<td align="left" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">
            <a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >>
            <span class="text_12px_02"><strong>留言版</strong></span>
        </td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>留言版</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top">&nbsp;</td>
	  </tr>
	</table>
	<table width="900" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top" class="text_12px_01">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc">
		  <tr bgcolor="#f1f1f1">
              <td width="8%" align="center">留言編號</td>
              <td width="12%" align="center">日 期</td>
              <td width="36%" align="center">標 題 (請點選標題文字進入回應審核及管理)</td>
              <td width="10%" align="center">留言者</td>
              <td width="8%" align="center">留言審核</td>
              <td width="8%" align="center">回覆審核</td>
              <td width="18%" align="center">功 能</td>
		  </tr>
            <?
            if($return){
                $i = 0;
                while( $return[$i] ){
                    $MeTi = explode(" ",$return[$i]['DB_MesTime']); //解析留言時間
                    //留言版管理者回覆
                    $mAbk_result = mysql_query("select * from `comments_reply` where `DB_MesID`='".$return[$i]['DB_MesID']."' AND pass=-1") or die("mabk");
                    $mAbk_num = mysql_num_rows($mAbk_result);        
            ?>		  
            <tr bgcolor="#ffffff">
                <td align="center" class="text_12px_03">
                    <? echo $return[$i]['DB_MesID'];?>
                </td>
                <td align="left"><span class="text_12px_04">
                    <? echo $MeTi[0];?>
                    </span><br/>
                    <? echo $MeTi[1];?>
                </td>
                <td align="left" style="word-break:break-all;">
                    <a href="message_list.php?DB_MesID=<? echo $return[$i]['DB_MesID'];?>&pg=<? echo $page;?>" class="link_04">
                        <? echo $return[$i]['DB_MesSubject'];?>
                    </a>
                </td>
                <td align="center" style="word-break:break-all;">
                    <? echo $return[$i]['DB_MesName'];?>
                </td>
                <td align="center">
                    <?php
                    $pass = $return[$i]['pass'];
                    if($pass == -1){
                        echo '<input type="submit" class="button_02" onClick="Message_Pass('.$return[$i]['DB_MesID'].')" value="留言審核">';
                    }
                    else if($pass == 1){
                        echo "<span class='state_del'>審核通過</span>";
                    }
                    else if($pass == 0){
                        echo "<span class='state_del'>審核未通過</span>";
                    }
                    ?>
                </td>
                <td align="center" class="state_del">
                    <? 
                    if ($mAbk_num <> 0){
                        echo "<span class='state_add'>".$mAbk_num."則未審核</span>";
                    }
                    else{
                        echo "<span class='state_del'>皆已審核</span>";
                    }
                    ?>
                </td>
                
                <td align="center">
                    <a href="message_calssReply.php?DB_MesID=<? echo $return[$i]['DB_MesID'];?>&page=<? echo $page;?>" class="button_02">
                        <img src="images/icon_massage2.gif" border="0" align="absmiddle" /> 查看留言/進行回覆
                    </a>&nbsp;
                    <br><br>
                    <a href="javascript:Delete(<? echo $return[$i]['DB_MesID'];?>,<? echo $page;?>);" class="button_03">
                        <img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除
                    </a>
                </td>
            </tr>
            <?
            $i++;
                    }
            }		
		      ?>		  
		</table>
            
		<div align="left" style="padding:5px;margin:5px"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">每頁10筆，共<? echo $number;?>筆資料</span>
<?  if ( $return['total_page'] > 1) { ?>		
		　|　
		  <a href="javascript:GoPage(1)" title="最前頁" class="button_05">|<</a>
		  <a href="javascript:GoPage(<? echo $return['f']; ?>)" title="上一頁" class="button_05"><<</a>
		  <? for($i=$return[ 'show_start' ];$i<$return['show_start']+$return['show_page'];$i++){ ?>		  
		       <? if ($i!=$page){?>　<a href="javascript:GoPage(<? echo $i;?>)" class="link_02"><? }?><? if ($i==$page){?>　<span class="text_12px_03b"><? }?><? echo $i;?><? if ($i==$page){?></span><? }?><? if ($i!=$page){?></a><? }?>
		  <?   }   ?>　		  
		  <a href="javascript:GoPage(<? echo $return['b']; ?>)" title="下一頁" class="button_05">>></a>
		  <a href="javascript:GoPage(<? echo $return['total_page']; ?>)" title="最後頁" class="button_05">>|</a>
<?   }   ?>			
		</div>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="left" valign="top"><img src="images/com_bottom_L.gif" width="5" height="5" /></td>
		<td align="left" valign="top" background="images/com_bottom.gif"></td>
		<td align="left" valign="top"><img src="images/com_bottom_R.gif" width="5" height="5" /></td>
	  </tr>
	</table>

	</td>
  </tr>
  <tr>
    <td height="10" colspan="2" align="left" valign="top"></td>
  </tr>
</table>
<!--bottom-->
<? 
include_once ("bottom.php");
?>
</body>
</html>
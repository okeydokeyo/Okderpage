<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_18"); //檢查是否功能權限,否回首頁

//留言版管理查詢
$ary = SoloSql("comments","`DB_MesID`='".$_GET['DB_MesID']."'");


$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//留言版回應查詢
$sql = "select * from `comments_reply` where `DB_MesID`='".$_GET['DB_MesID']."' ORDER BY `DB_MadTime` DESC";	
$return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$url = "message_list.php"; //本頁的網址 & 使用的 get變數
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
   location.href="<? echo $url ?>?DB_MesID=<? echo $_GET['DB_MesID'];?>&pg=<? echo $_GET['pg'];?>&page="+page;
}
//選擇是否刪除
function  Delete(id,page){
    if ( confirm("是否刪除此筆紀錄") ){
        location.href='message_del.php?chkdel=YES&DB_MadID='+id+'&pg=<? echo $_GET['pg'];?>&page='+page;
    }
}
function review(id){
        $(function() {
            $( "#comment_review" ).dialog({
                resizable: false,
                height: "auto",
                width: 500,
                modal: true,
                buttons: {
                    確認審核通過: function() {
                        $.ajax({
                            method: "GET",
                            url: "reply_pass.php",
                            data:{DB_MadID:id, passNum:1},
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
                            url: "reply_pass.php",
                            data:{DB_MadID:id, passNum:0},
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
<table width="955" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="203" align="left" valign="top">
<!--menu-->
<? 
include_once ("left_menu.php");
?>
<!--menu_end-->
	</td>
    <td width="752" align="left" valign="top">
        
    <div id="comment_review" title="審核回覆" style="display: none;">
        <p>提醒：審核通過後即會公開顯示</p> 
        <p>提醒：審核確認後即無法修改，僅能刪除審核通過之留言</p> 
    </div>
        
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" valign="middle"><img src="images/gray_01.gif" width="10" height="20" /></td>
		<td align="left" valign="middle"><img src="images/icon_a1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;<strong><? echo $userauth['DB_ManName'];?></strong> 歡迎登入!!&nbsp;&nbsp;</td>
		<td align="left" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 留言版 >> <span class="text_12px_02"><strong>回應列表</strong></span></td>
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
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="message_calss.php?page=<? echo $_GET['pg'];?>" class="button_04">回留言列表</a></div></td>
	  </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top" class="text_12px_01">
		<div>
		<img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> <span class="text_12px_03">留言編號【<? echo $ary['DB_MesID'];?>】</span>由 <? echo $ary['DB_MesName'];?> 於 <? echo $ary['DB_MesTime'];?> 留言<br />
		<img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> <span class="text_12px_04" style="word-break:break-all;"><? echo $ary['DB_MesSubject'];?></span>
		</div>
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc">
		  <tr bgcolor="#f1f1f1">
			<td width="8%" align="center">回應排序</td>
			<td width="12%" align="center">日 期</td>
			<td width="15%" align="center">回應者</td>
			<td width="55%" align="center">回應內容</td>
			<td width="10%" align="center">功 能</td>
		  </tr>
		<?
  if($return){
		$i = 0;
		while( $return[$i] ){
		
		    $MbTi = explode(" ",$return[$i]['DB_MadTime']);   //解析回應時間
			
			//計算回應排序
			if ($number > 10){
			    $sn = $number-(($page*10)-10)-$i; 
			}else{
			    $sn = $number-$i; 			
			}
		?>			  
		  <tr bgcolor="#ffffff">
			<td align="center" valign="top" class="text_12px_03"><? echo $sn;?></td>
			<td align="left" valign="top"><span class="text_12px_04"><? echo $MbTi[0];?></span><br />
			  <? echo $MbTi[1];?></td>
			<td align="left" valign="top" class="text_12px_03" style="word-break:break-all;"><? echo $return[$i]['reply_name'];?></td>
			<td align="left" valign="top" style="word-break:break-all;">
			<? echo nl2br($return[$i]['DB_MadBack']);?>
			</td>
			<td align="center">
                <?php
                    $pass = $return[$i]['pass'];
                    if($pass == -1){      
                        echo '<input type="submit" class="button_02" onClick="review('.$return[$i]['DB_MadID'].')" value="審核"> <br>';
                    }
                    else{
                        echo "<span class='state_del'>回覆已審核</span>";
                    }
                ?>
                <a href="javascript:Delete(<? echo $return[$i]['DB_MadID'];?>,<? echo $page;?>);" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
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
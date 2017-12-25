<?
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_15"); //檢查是否功能權限,否回首頁


$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//參訪紀錄管理查詢
$sql = "select * from `visit` where 1 ORDER BY `DB_VisTime` DESC";	
$return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$url = "visit_list.php"; //本頁的網址 & 使用的 get變數
?>
<? 
include_once ("top.php");
?>
<script language="javascript">
<!--
//換頁Script
function GoPage(page){
   location.href="<? echo $url ?>?page="+page;
}
//選擇是否刪除
function  Delete(id,page){
if ( confirm("是否刪除此筆紀錄") ){
    location.href='visit_del.php?chkdel=YES&DB_VisID='+id+'&page='+page;
}
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
	<table border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" valign="middle"><img src="images/gray_01.gif" width="10" height="20" /></td>
		<td align="left" valign="middle"><img src="images/icon_a1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;<strong><? echo $userauth['DB_ManName'];?></strong> 歡迎登入!!&nbsp;&nbsp;</td>
		<td align="left" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> <span class="text_12px_02"><strong>參訪紀錄</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>參訪紀錄</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="visit_add.php" class="button_04">+新增資料</a></div></td>
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
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc">
		  <tr bgcolor="#f1f1f1">
			<td width="45%" align="center">參 訪 單 位</td>
			<td width="7%" align="center">人 數</td>
			<td width="18%" align="center">日 期</td>
			<td width="8%" align="center">狀 態</td>
			<td width="18%" align="center">功 能</td>
		  </tr>
		<?
		if($return){
		$i = 0;
		$c = ($page - 1) * 10;
		while( $return[$i] ){
		$c++;
		
		if($return[$i]['DB_VisAnnounce']=="1"){
		$DB_VisAnnounce="<span class=\"state_del\">不顯示</span>";
		}else{
		$DB_VisAnnounce="<span class=\"state_edit\">顯示</span>";
		}

		?>
		  <tr bgcolor="#ffffff">
			<td align="left" class="text_12px_03"><? echo $return[$i]['DB_VisUnit'];?></td>
			<td align="center"><? echo $return[$i]['DB_VisNum'];?></td>
			<td align="center"><span class="text_12px_04"><? echo FormatDate($return[$i]['DB_VisTime'],"ymd5");?></span>&nbsp;&nbsp;<? echo $return[$i]['DB_VisHour'];?>:<? echo $return[$i]['DB_VisMinute'];?></td>
			<td align="center"><? echo $DB_VisAnnounce;?></td>
			<td align="center"><a href="visit_edit.php?DB_VisID=<? echo $return[$i]['DB_VisID'];?>&page=<? echo $page;?>" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;<a href="javascript:Delete(<? echo $return[$i]['DB_VisID'];?>,<? echo $page;?>);" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
		  </tr>
		<? $i++;
		}
		}else{
		?>
		  <tr bgcolor="#ffffff">
			<td colspan="5" align="center">目前沒有資料</td>
			</tr>
		<? }?>
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

</body>
</html>
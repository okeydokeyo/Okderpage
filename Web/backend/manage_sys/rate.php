<? 
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_7"); //檢查是否功能權限,否回首頁


if($_GET['del']=="YES"){

	if ($_GET['year'] != "" && $_GET['month'] != ""){            //年、月
			$delYM = "`DB_Time` LIKE '%".$_GET['year']."-".$_GET['month']."%'";
	}else if ($_GET['year'] != "" && $_GET['month'] == ""){      //年
			$delYM = "`DB_Time` LIKE '%".$_GET['year']."-%'";
	}else if ($_GET['year'] == "" && $_GET['month'] != ""){      //月
			$delYM = "`DB_Time` LIKE '%-".$_GET['month']."-%'";
	}else{
			$delYM = "1";
	}	
	
	mysql_query("delete from `counter` where ".$delYM."");

	echo '<script> alert("清空資訊成功!"); location.href="rate.php?year='.$_GET['year'].'&month='.$_GET['month'].'"; </script>';
	
}


$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//查詢
if ($_GET['year'] != "" && $_GET['month'] != ""){            //年、月
        $key = "`DB_Time` LIKE '%".$_GET['year']."-".$_GET['month']."%'";
}else if ($_GET['year'] != "" && $_GET['month'] == ""){      //年
        $key = "`DB_Time` LIKE '%".$_GET['year']."-%'";
}else if ($_GET['year'] == "" && $_GET['month'] != ""){      //月
        $key = "`DB_Time` LIKE '%-".$_GET['month']."-%'";
}else{
        $key = "1";
}


//拜訪人數查詢(只顯示不同日期)
$sql = "select DISTINCT `DB_Time` from `counter` where ".$key." ORDER BY `DB_Time` DESC";	
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$url = "rate.php"; //本頁的網址 & 使用的 get變數

$return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
?>

<? 
include_once ("top.php");
?>

<script language="javascript">
<!--
//換頁Script
function GoPage(page){
   location.href="<? echo $url ?>?year=<? echo $_GET['year'];?>&month=<? echo $_GET['month'];?>&page="+page;
}

function resubmit1(y){
   location.href="<? echo $url ?>?year="+y+"&month=<? echo $_GET['month'];?>";
}

function resubmit2(m){
   location.href="<? echo $url ?>?year=<? echo $_GET['year'];?>&month="+m;
}
-->
</script>
<html>
<body>
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 帳號首頁管理 >> <span class="text_12px_02"><strong>網站使用率</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網站使用率</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 顯示選擇</span>
		  <select name="year" class="text_12px_01" onChange="resubmit1(this.value);">
		     <option value="" >全部</option>
		  <?
		     for ($y=date("Y") ;$y>=date("Y")-5 ;$y--){
		  ?>	
			<option value="<? echo $y;?>" <? if ($_GET['year'] == $y){echo "selected";}?>><? echo $y;?></option>
		   <? } ?>	
	      </select><span class="text_12px_01">年</span>
		  <select name="month" class="text_12px_01" onChange="resubmit2(this.value);">
			<option value="" >全部</option>
			<option value="01" <? if ($_GET['month'] == "01"){echo "selected";}?>>1</option>
			<option value="02" <? if ($_GET['month'] == "02"){echo "selected";}?>>2</option>
			<option value="03" <? if ($_GET['month'] == "03"){echo "selected";}?>>3</option>
			<option value="04" <? if ($_GET['month'] == "04"){echo "selected";}?>>4</option>
			<option value="05" <? if ($_GET['month'] == "05"){echo "selected";}?>>5</option>
			<option value="06" <? if ($_GET['month'] == "06"){echo "selected";}?>>6</option>
			<option value="07" <? if ($_GET['month'] == "07"){echo "selected";}?>>7</option>
			<option value="08" <? if ($_GET['month'] == "08"){echo "selected";}?>>8</option>
			<option value="09" <? if ($_GET['month'] == "09"){echo "selected";}?>>9</option>
			<option value="10" <? if ($_GET['month'] == "10"){echo "selected";}?>>10</option>
			<option value="11" <? if ($_GET['month'] == "11"){echo "selected";}?>>11</option>
			<option value="12" <? if ($_GET['month'] == "12"){echo "selected";}?>>12</option>
	      </select><span class="text_12px_01">月</span>

		<a href="javascript:if(confirm('是否清空資訊!!')) location.href='rate.php?del=YES&year=<? echo $_GET['year'];?>&month=<? echo $_GET['month'];?>'" class="button_03">
            <img src="images/icon_del2.gif" border="0" align="absmiddle" /> 清 空 資 訊
        </a>
        </div>
        </td>
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
			<td width="20%" align="center">日期</td>
			<td width="40%" align="center">當日拜訪人數</td>
			<td width="40%" align="center">累計瀏覽人次</td>
		  </tr>
		<?
  if($return){
		$i = 0;
		while( $return[$i] ){
		
				 $date2 = $date1;
				 $date1 = $return[$i]['DB_Time'];
				 
				 //計算當日拜訪人數
                 $date_result = mysql_query("select * from `counter` where `DB_Time`='".$return[$i]['DB_Time']."'") or die("查詢失敗2");
                 $date_num = mysql_num_rows($date_result); 
				 
				 //計算到這日累計瀏覽人次
                 $dateAll_result = mysql_query("select * from `counter` where `DB_Time`<='".$return[$i]['DB_Time']."'") or die("查詢失敗3");
                 $dateAll_num = mysql_num_rows($dateAll_result); 			 
				 
				
		?>		  
		  <tr bgcolor="#ffffff">
			<td align="center"><? echo substr($return[$i]['DB_Time'],0 ,10);?></td>
			<td align="center"><span class="state_edit"><? echo $date_num;?></span></td>
			<td align="center" class="text_12px_04"><? echo $dateAll_num?></td>
		  </tr>
		<?   
		   $i++;
		}
   }		
		?>	
		</table>
		<div align="left" style="padding:5px;margin:5px">
            <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">每頁10筆，共<? echo $number;?>筆資料</span>
<?  if ( $return['total_page'] > 1) { ?>		
		　|　
		  <a href="javascript:GoPage(1)" title="最前頁" class="button_05">|</a>
		  <a href="javascript:GoPage(<? echo $return['f']; ?>)" title="上一頁" class="button_05"></a> 
		  <?   for($i=$return[ 'show_start' ];$i<$return['show_start']+$return['show_page'];$i++){ ?>		  
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
<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁


$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//左側選單標籤管理查詢
$sql = "select * from `left_tags` where `row` = 2 ORDER BY `DB_LefTagSort` ASC";	
$return = iron_page( $sql, 1000, 10, $page, 10 ); //iron分頁程式
$result = mysql_query($sql) or die("查詢失敗let");
$number = mysql_num_rows($result); //全部資料的總數
$url = "indexleft_calss.php"; //本頁的網址 & 使用的 get變數
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
function  Delete(id){
  if ( confirm("是否刪除此筆紀錄") ){
      location.href='indexleft_calssDel.php?DB_LefTagID='+id;
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理 >> <span class="text_12px_02"><strong>第二排選單管理</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>第二排選單管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="indexleft_calssAdd.php" class="button_04">◎新增標籤</a></div></td>
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
			<td width="5%" align="center">排序</td>
			<td width="22%" align="center">標籤標題</td>
			<td width="5%" align="center">層次</td>
			<td width="12%" align="center">連結方式</td>
			<td width="26%" align="center">管理位置</td>
			<td width="10%" align="center">顯示</td>
			<td width="20%" align="center">功能</td>
		  </tr>
<?
  if($return){
      $i = 0;
      while( $return[$i] ){
          if ($return[$i]['DB_LefTagAnnounce'] == "0"){
              $LefTagAnnounce = "<span class='state_edit'>顯示</span>";
          }
          else{
              $LefTagAnnounce = "<span class='state_del'>不顯示</span>";
          }
				   
          if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1"){
              $Lclass = "網頁選單功能";
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "2"){
              $Lclass = "附件網址";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "3"){
              $Lclass = "附件檔案";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "2"){
              $Lclass = "";				   
          }
				   				   
          if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "1"){
              //條例式訊息標籤管理查詢
              $ordt_result = mysql_query("select * from `ordi_tags` where `DB_OrdTagID`='".$return[$i]['DB_LefTagNumID']."'") or die("查詢失敗b1");
              $ordt_ary = mysql_fetch_array($ordt_result);
              $LBasis = "條例式訊息管理-".$ordt_ary['DB_OrdTagSubject']."";
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "2"){
              //說明文章類別查詢
              $artc_result = mysql_query("select * from `article` where `DB_ArtID`='".$return[$i]['DB_LefTagNumID']."'") or die("查詢失敗b2");
              $artc_ary = mysql_fetch_array($artc_result);
              $LBasis = "說明文章管理-".$artc_ary['DB_ArtSubject']."";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "3"){
              //行事曆管理查詢                          
              $calt_result = mysql_query("select * from `calendar_tags` where `DB_CalTagID`='".$return[$i]['DB_LefTagNumID']."'") or die("查詢失敗b3");
              $calt_ary = mysql_fetch_array($calt_result);
              $LBasis = "行事曆管理-".$calt_ary['DB_CalTagSubject']."";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "4"){
              //檔案下載類別查詢
              $dowc_result = mysql_query("select * from `download_tags` where `DB_DowTagID`='".$return[$i]['DB_LefTagNumID']."'") or die("查詢失敗b4");
              $dowc_ary = mysql_fetch_array($dowc_result);
              $LBasis = "檔案下載管理-".$dowc_ary['DB_DowTagSubject']."";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "5"){
              //網路相簿查詢
              $lifa_result = mysql_query("select * from `life_tags` where `DB_LifTagID`='".$return[$i]['DB_LefTagNumID']."'") or die("查詢失敗b5");
              $lifa_ary = mysql_fetch_array($lifa_result);
              $LBasis = "網路相簿管理-".$lifa_ary['DB_LifTagSubject']."";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "6"){
              //常見問題管理查詢
              $fqa_result = mysql_query("select * from `faq_tags` where `DB_FaqTagID`='".$return[$i]['DB_LefTagNumID']."'") or die("查詢失敗b6");
              $fqa_ary = mysql_fetch_array($fqa_result);
              $LBasis = "常見問題管理-".$fqa_ary['DB_FaqTagSubject']."";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "7"){
              $LBasis = "好站連結管理";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "8"){
              $LBasis = "參訪紀錄";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "1" && $return[$i]['DB_LefTagBasis'] == "9"){
              $LBasis = "留言板管理";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "2"){
              $LBasis = "網址";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "1" && $return[$i]['DB_LefTagClass'] == "3"){
              $LBasis = "檔案";				   
          }
          else if ($return[$i]['DB_LefTagLayer'] == "2"){
              $LBasis = "";				   
          }
                    
?>				  
		  <tr bgcolor="#ffffff">
			<td align="center">
                <? echo $return[$i]['DB_LefTagSort'];?>
            </td>
			<td align="left">
			   <?php 
                if ($return[$i]['DB_LefTagLayer'] == "2"){
                ?>
			   <a href="indexleft_list.php?DB_LefTagID=<? echo $return[$i]['DB_LefTagID'];?>" class="link_04">
                <? echo $return[$i]['DB_LefTagSubject'];?>
                </a>
			   <? }
                else{?>
			            <span class="link_04"><? echo $return[$i]['DB_LefTagSubject'];?></span>
			   <? }?>
			</td>
			<td align="center"><? echo $return[$i]['DB_LefTagLayer'];?></td>
			<td align="center" class="state_add"><? echo $Lclass;?>&nbsp;</td>
			<td align="center" class="text_12px_03"><? echo $LBasis;?>&nbsp;</td>
			
            <td align="center"><? echo $LefTagAnnounce;?></td>
			
            <td align="center">
			    <a href="indexleft_calssEdit.php?DB_LefTagID=<? echo $return[$i]['DB_LefTagID'];?>" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;
			    <a href="javascript:Delete(<? echo $return[$i]['DB_LefTagID']; ?>);" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a>
			</td>

		  </tr>
		<?
		   $i++;
		}
   }		
		?>		  
		  
		</table>
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
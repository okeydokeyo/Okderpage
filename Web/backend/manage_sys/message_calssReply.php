<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_18"); //檢查是否功能權限,否回首頁



//留言版管理查詢
$ary = SoloSql("comments","`DB_MesID`='".$_GET['DB_MesID']."'");

$MesID = $_POST['MesID'];
$DB_MesSubject = ereg_replace("'","\'",$_POST['DB_MesSubject']);
$DB_MadBack = ereg_replace("'","\'",$_POST['DB_MadBack']);


if( !empty($DB_MadBack) ){
					//新增
					$UpStr = "`DB_MesID`,`DB_MadTime`,`DB_MadBack`, `reply_name`, `pass`";
					$UpStr2 = "'$MesID',NOW(),'$DB_MadBack', '管理員', '1'";
					AddSql("comments_reply","message_calss.php?page=".$_POST['page']."","回覆成功!!",$UpStr,$UpStr2);
			
					//紀錄使用者資訊	
					$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
					$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','留言版-回覆','".$DB_MesSubject."','add',NOW()";
					Recording_Add("recording",$UpStr,$UpStr2);
}
?>
<? 
include_once ("top.php");
?>
<script language="javascript">
<!--
function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_MadBack.value == ""){ErrString = ErrString + "回覆內容" + unescape('%0D%0A')}
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	

	return true;
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 留言版 >> <span class="text_12px_02"><strong>回覆</strong></span></td>
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
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px"><a href="message_calss.php?page=<? echo $_GET['page'];?>" class="button_04">回上層列表</a></div></td>
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
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
		  </tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 留言編號</td>
			<td width="85%" align="left" valign="top" class="border_02"><font color="red">59</font> </td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 留言日期</td>
			<td align="left" valign="top" class="border_02">
			<?
			   $MeTi = explode(" ",$ary['DB_MesTime']); //解析留言時間
			?>
			   <span class="text_12px_04"><? echo $MeTi[0];?></span>　<? echo $MeTi[1];?>
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 留言者</td>
			<td align="left" valign="top" class="border_02" style="word-break:break-all;"><? echo $ary['DB_MesName'];?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 標 題</td>
			<td align="left" valign="top" class="border_02" style="word-break:break-all;"><? echo $ary['DB_MesSubject'];?></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 留言內容</td>
			<td align="left" valign="top" class="border_02" style="word-break:break-all;"><? echo nl2br($ary['DB_MesContent']);?>
            </td>
		  </tr>
<form action="message_calssReply.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">		  
		  <tr>
			<td align="left" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 回 覆</td>
			<td align="left" valign="top" class="border_02">
<?
       //留言版管理者回覆
       $mAbk_result = mysql_query("select * from `comments_reply` where `DB_MesID`='".$ary['DB_MesID']."' ORDER BY `DB_MadID` DESC") or die("mabk");
	   $mAbk_num = mysql_num_rows($mAbk_result);
	   
	   for ($a1=1 ;$a1<=$mAbk_ary = mysql_fetch_array($mAbk_result) ;$a1++){
	          
			  $MaTi = explode(" ",$mAbk_ary['DB_MadTime']); //解析管理者回復時間			  
?>			  
			  回覆 <font color="red">
            <?php 
                if ($mAbk_num > 1){
                    echo $mAbk_num-($a1-1);
                }
                else{
                    echo $mAbk_num;
                }
            ?></font> 於 
                <span class="text_12px_04"><? echo $MaTi[0];?></span>　
                <? echo $MaTi[1];?><br />
                <div style="background-color:#f1f1f2; padding:5px;word-break:break-all;">
                    <? echo ereg_replace("<br />","<p>",nl2br($mAbk_ary['DB_MadBack']));?>
                </div>
				<br />
<?     } ?>					
			  回覆 <font color="red"><? echo $mAbk_num+1;?></font>
			  <textarea name="DB_MadBack" cols="100" rows="10" class="text_12px_01" id=""></textarea>
			  <input type="hidden" name="MesID" value="<? echo $_GET['DB_MesID'];?>" />
			  <input type="hidden" name="DB_MesSubject" value="<? echo $ary['DB_MesSubject'];?>" />
			  <input type="hidden" name="page" value="<? echo $_GET['page'];?>" />
			</td>
		  </tr>
</form>		  
		</table>
		<div align="center" style="padding:5px;margin:5px"><a href="javascript:document.form1.submit();" onClick="return checkinput();" class="button_01">送出回覆</a></div>
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
<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
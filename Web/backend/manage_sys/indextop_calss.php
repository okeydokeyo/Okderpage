<? 
include_once ("top.php");
?>
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁首頁管理 >> <span class="text_12px_02"><strong>第一排選單管理</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>第一排選單管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">&nbsp;</div></td>
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
			<td width="22%" align="center">標籤標題 (點選進入)</td>
			<td width="5%" align="center">層次</td>
			<td width="12%" align="center">連結方式</td>
			<td width="10%" align="center">顯示</td>
			<td width="20%" align="center">功能</td>
		  </tr> 
		  <tr bgcolor="#ffffff">
			<td align="center">1</td>
			<td align="left"><a href="indextop_list.php?DB_TopTagID=2" class="link_04">關於我們</a></td>
			<td align="center">2</td>
			<td align="center" class="state_add">網頁選單功能&nbsp;</td>
			<td align="center"><span class="state_edit">顯示</span></td>
			<td align="center">系統預設</td>
		  </tr>
		  <tr bgcolor="#ffffff">
			<td align="center">2</td>
			<td align="left"><a href="indextop_list.php?DB_TopTagID=34" class="link_04">服務內容</a></td>
			<td align="center">2</td>
			<td align="center" class="state_add">網頁選單功能&nbsp;</td>
			<td align="center"><span class="state_edit">顯示</span></td>
			<td align="center">系統預設</td>
		  </tr>
		  <tr bgcolor="#ffffff">
			<td align="center">3</td>
			<td align="left"><a href="indextop_list.php?DB_TopTagID=3" class="link_04">捐贈資訊</a></td>
			<td align="center">2</td>
			<td align="center" class="state_add">網頁選單功能&nbsp;</td>
			<td align="center"><span class="state_edit">顯示</span></td>
			<td align="center">系統預設</td>
		  </tr>
		  <tr bgcolor="#ffffff">
			<td align="center">4</td>
			<td align="left"><a href="indextop_list.php?DB_TopTagID=4" class="link_04">認識脊髓損傷</a></td>
			<td align="center">2</td>
			<td align="center" class="state_add">網頁選單功能&nbsp;</td>
			<td align="center"><span class="state_edit">顯示</span></td>
			<td align="center">系統預設</td>
		  </tr>
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
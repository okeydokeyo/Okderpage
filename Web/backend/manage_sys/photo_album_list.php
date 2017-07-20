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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;<strong>最高管理者</strong> 歡迎登入!!&nbsp;&nbsp;</td>
		<td align="left" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 網路相簿 >> <span class="text_12px_02"><strong>標籤_01</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網路相簿 - 標籤_01</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		  <!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="photo_calss.php" class="button_04">◎回上層列表頁</a>&nbsp;<a href="photo_album_add.php" class="button_04">+新增相簿</a></div></td>
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
			<td width="22%" align="center">相簿封面</td>
			<td width="43%" align="center">相簿標題 / 張數(點選標題進入相簿)</td>
			<td width="10%" align="center">狀態</td>
			<td width="20%" align="center">功能</td>
		  </tr>
		  <tr bgcolor="#ffffff">
			<td align="center">01</td>
			<td align="center"><img src="../photo/xxx1.jpg" width="75" height="100" id="border_02" /></td>
			<td align="left"><a href="photo_list.php" class="link_03">2008ING 台北馬拉松花絮集錦01</a><br />(共9張相片)</td>
			<td align="center">顯示</td>
			<td align="center"><a href="photo_album_edit.php" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;<a href="photo_album_del.php" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
		  </tr>
		  <tr bgcolor="#ffffff">
			<td align="center">02</td>
			<td align="center"><img src="../photo/xxx2.jpg" width="100" height="75" id="border_02" /></td>
			<td align="left"><a href="photo_list.php" class="link_03">2008ING 台北馬拉松花絮集錦02</a><br />(共13張相片)</td>
			<td align="center">顯示</td>
			<td align="center"><a href="photo_album_edit.php" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;<a href="photo_album_del.php" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
		  </tr>
		  <tr bgcolor="#ffffff">
			<td align="center">03</td>
			<td align="center"><img src="../photo/xxx3.jpg" width="75" height="100" id="border_02" /></td>
			<td align="left"><a href="photo_list.php" class="link_03">2008ING 台北馬拉松花絮集錦03</a><br />(共25張相片)</td>
			<td align="center">不顯示</td>
			<td align="center"><a href="photo_album_edit.php" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;<a href="photo_album_del.php" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
		  </tr>
		</table>
		<div align="left" style="padding:5px;margin:5px"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">每頁10筆，共3筆資料</span>　|　
		  <a href="#" title="最前頁" class="button_05">|<</a><a href="#" title="上一頁" class="button_05"><<</a>
		  　<span class="text_12px_03b">1</span>　<a href="#" class="link_02">2</a>　<a href="#" class="link_02">3</a>　<a href="#" class="link_02">4</a>　<a href="#" class="link_02">5</a>　<a href="#" class="link_02">6</a>　<a href="#" class="link_02">7</a>　<a href="#" class="link_02">8</a>　<a href="#" class="link_02">9</a>　
		  <a href="#" title="下一頁" class="button_05">>></a><a href="#" title="最後頁" class="button_05">>|</a>
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
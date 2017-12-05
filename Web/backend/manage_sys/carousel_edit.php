<? 
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_8"); //檢查是否功能權限,否回首頁

$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;<strong><?// echo $userauth['DB_ManName'];?></strong> 歡迎登入!!&nbsp;&nbsp;</td>
		<td align="left" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁風格管理 >> <span class="text_12px_02"><strong>輪播圖片管理</strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>輪播圖片管理</strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
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
			<td width="60%" align="center">標籤標題 (請點選標籤文字進入管理)</td>
            </tr>
            <tr bgcolor="#ffffff">
              <td align="center">
                <a href="carousel_list.php?DB_LogID=1" class="link_04">圖片一</a>
              </td>  
            </tr>
            <tr  bgcolor="#ffffff">  
            <td align="center">
                <a href="carousel_list.php?DB_LogID=2" class="link_04">圖片二</a>
              </td>
            </tr>
            <tr  bgcolor="#ffffff">
              <td align="center">
                <a href="carousel_list.php?DB_LogID=3" class="link_04">圖片三</a>
              </td>
                </tr>
            <tr  bgcolor="#ffffff">
              <td align="center">
                <a href="carousel_list.php?DB_LogID=4" class="link_04">圖片四</a>
              </td>
                </tr>
            <tr  bgcolor="#ffffff">  
            <td align="center">
                <a href="carousel_list.php?DB_LogID=5" class="link_04">圖片五</a>
              </td>
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
</body>
</html>
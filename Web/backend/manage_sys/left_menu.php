	<table width="193" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" valign="middle"><img src="images/menu_bg01.gif" width="193" height="5" /></td>
	  </tr>
	  <tr>
		<td align="center" valign="middle" background="images/menu_bg02.gif">
        <table width="183" border="0" cellspacing="0" cellpadding="0">
		  <!--01-->
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg01">帳號權限管理</td>
		  </tr>
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="id_info.php" class="m01">修改個人基本資料或密碼</a></td>
		  </tr>
<? //if ( $userauth['DB_ManP_1'] == "1" ){?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="id_list.php" class="m01">權限管理</a></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="login_info.php" class="m01">登入資訊</a></td>
		  </tr>
<? //}?>		  
		  <tr>
			<td height="5" align="left" valign="middle"></td>
		  </tr>
		  <!--02-->
<? //if ( $userauth['DB_ManP_2'] == "1" || $userauth['DB_ManP_3'] || $userauth['DB_ManP_16'] ){?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg01">網頁風格管理</td>
		  </tr>
	<?// if ( $userauth['DB_ManP_2'] == "1" ){?>	  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="topview_list.php" class="m01">主要影片管理</a></td>
		  </tr>
	<? 
	 //  }
	 //  if ( $userauth['DB_ManP_16'] == "1" ){
	?>	  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="toplogo_list.php" class="m01">第二排中心LOGO圖管理</a></td>
		  </tr>
	<? 
	  // }
      //if ( $userauth['DB_ManP_3'] == "1" ){
	?>	  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="bottom_info.php" class="m01">下方聯絡資訊管理</a></td>
		  </tr>
	<? //} ?>	  
		  <tr>
			<td height="5" align="left" valign="middle"></td>
	      </tr>
			  
<?// }?>		  
		  <!--03-->
<? //if ( $userauth['DB_ManP_4'] == "1" || $userauth['DB_ManP_5'] || $userauth['DB_ManP_6'] || $userauth['DB_ManP_7'] || $userauth['DB_ManP_17'] ){?>	
            <tr>
			<td align="left" valign="middle" class="menutitle_bg01">網頁首頁管理</td>
		  </tr>
	<? //if ( $userauth['DB_ManP_17'] == "1" ){?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="indextop_calss.php" class="m01">第一排選單管理</a></td>
		  </tr>
	<? 
	   //}
	   //if ( $userauth['DB_ManP_4'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="indexleft_calss.php" class="m01">第二排選單管理</a></td>
		  </tr>
	<? 
	   //}
	   //if ( $userauth['DB_ManP_5'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="indexmain_list.php" class="m01">中間功能管理</a></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg01">網頁流量分析</td>
		  </tr>
	<? 
	   //if ( $userauth['DB_ManP_6'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="links_list.php" class="m01">相關連結</a></td>
		  </tr>
	<? 
	  // }
	   //if ( $userauth['DB_ManP_7'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="rate.php" class="m01">網站使用率</a></td>
		  </tr>
	<? //}?>		  
		  <tr>
			<td height="5" align="left" valign="middle"></td>
		  </tr>
<? //}?>		  
		  <!--04-->
<?// if ( $userauth['DB_ManP_8'] == "1" || $userauth['DB_ManP_9'] || $userauth['DB_ManP_10'] || $userauth['DB_ManP_11'] || 
       // $userauth['DB_ManP_12'] == "1" || $userauth['DB_ManP_13'] || $userauth['DB_ManP_14'] || $userauth['DB_ManP_15'] || $userauth['DB_ManP_18'] ){?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg01">網頁選單管理</td>
		  </tr>
	<? //if ( $userauth['DB_ManP_8'] == "1" ){?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="sections_calss.php" class="m01">條列式訊息管理</a></td>
		  </tr>
	<? 
	 //  }
	   //if ( $userauth['DB_ManP_9'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="art_list.php" class="m01">說明文章管理</a></td>
		  </tr>
	<? 
	  // }
	   //if ( $userauth['DB_ManP_10'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="calendar_calss.php" class="m01">行事曆管理</a></td>
		  </tr>
	<? 
	   //}
	   //if ( $userauth['DB_ManP_11'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="download_calss.php" class="m01">檔案下載</a></td>
		  </tr>
	<? 
	   //}
	  // if ( $userauth['DB_ManP_12'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="photo_calss.php" class="m01">網路相簿</a></td>
		  </tr>
	<? 
	   //}
	  // if ( $userauth['DB_ManP_13'] == "1" ){
	?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="FAQ_calss.php" class="m01">常見問題</a></td>
		  </tr>
	<? 
	 //  }
    //if ( $userauth['DB_ManP_14'] == "1" ){
	?>		  
		  <tr>
		    <td align="left" valign="middle" class="menutitle_bg"><a href="links2_list.php" class="m01">好站連結管理</a></td>
	      </tr>
	<? 
	  // }
	 //  if ( $userauth['DB_ManP_15'] == "1" ){
	?>		  
		  <tr>
		    <td align="left" valign="middle" class="menutitle_bg"><a href="visit_list.php" class="m01">參訪紀錄</a></td>
	      </tr>
	<? 
	 //  }
	 //  if ( $userauth['DB_ManP_18'] == "1" ){
	?>			  

	      <tr>
		    <td align="left" valign="middle" class="menutitle_bg"><a href="message_calss.php" class="m01">留言版管理</a></td>
	      </tr>	
	<?// }?>		  	  
		  <tr>
			<td height="5" align="left" valign="middle"></td>
		  </tr>
<?// }?>		  
		  <!--05-->			  

<? //if ( $userauth['DB_ManP_19'] == "1" || $userauth['DB_ManP_20'] || $userauth['DB_ManP_21'] ){?>			  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg01">我要捐款管理</td>
		  </tr>  
	<? 
	  // if ( $userauth['DB_ManP_19'] == "1" ){
	?>			  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="ATM_data_list.php" class="m01">線上ATM捐款管理</a></td>
		  </tr>	  
	<? 
	  // }
	   //if ( $userauth['DB_ManP_20'] == "1" ){
	?>			  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="commerial_list.php" class="m01">超商條碼捐款管理</a></td>
		  </tr>	  
	<? 
	  // }
	   //if ( $userauth['DB_ManP_21'] == "1" ){
	?>			  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg"><a href="authority_list.php" class="m01">線上信用卡、郵局轉帳捐款管理</a></td>
		  </tr>	  
	<? 
	  // }
	?>			  
		  <tr>
			<td height="5" align="left" valign="middle"></td>
		  </tr>
<?// }?>		  
		  <tr>
			<td align="left" valign="middle" class="menutitle_bg02"><a href="../logout.php?out=1" class="m02">登出系統</a></td>
		  </tr>
		</table>
		</td>
	  </tr>
	  <tr>
		<td align="left" valign="middle"><img src="images/menu_bg03.gif" width="193" height="5" /></td>
	  </tr>
	</table>

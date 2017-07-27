<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_12"); //檢查是否功能權限,否回首頁


//網路相簿標籤管理查詢
$DB_LifTagID = $_GET['DB_LifTagID'];
$ary = SoloSql("life_tags","`DB_LifTagID`='$DB_LifTagID'");

$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//查詢
if ( $_GET['LifAlbID'] != ""){
    $key = "&& `DB_LifAlbID`='".$_GET['LifAlbID']."'";
}else{
    $key = "";
}


//網路相片查詢
$sql = "select * from `life` where `DB_LifTagID`='$DB_LifTagID' $key ORDER BY `DB_LifAlbID` ASC,`DB_LifSort` ASC";	
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$return = iron_page( $sql, $number, 10, $page, 10 ); //iron分頁程式

$url = "photo_list.php"; //本頁的網址 & 使用的 get變數
?>

<? 
include_once ("top.php");
?>

<script language="javascript">

function resubmit(fa){
  location.href="<? echo $url ?>?DB_LifTagID=<? echo $DB_LifTagID;?>&LifAlbID="+fa;
}


//選擇是否刪除
function  Delete(id){
if ( confirm("是否刪除此筆紀錄") ){
    location.href='photo_del.php?chkdel=YES&DB_LifID='+id;
}
}

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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 網路相簿 >> <span class="text_12px_02"><strong><? echo $ary['DB_LifTagSubject'];?></strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong>網路相簿 - <? echo $ary['DB_LifTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		  <a href="photo_calss.php" class="button_04">◎返回標籤列表</a>&nbsp;<a href="photo_album_edit.php?DB_LifTagID=<? echo $DB_LifTagID;?>" class="button_04">◎編輯相簿</a>&nbsp;<a href="photo_add.php?DB_LifTagID=<? echo $DB_LifTagID;?>" class="button_04">+新增照片</a></div></td>
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
			<td colspan="2" align="left" valign="top" class="text_12px_04">
			<img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 相簿名稱：
			<select name="DB_LifAlbID" class="text_12px_01" onChange="resubmit(this.value);">
			    <option value="">不分類</option>
<?
  //查詢網路相簿資料
  $lifeAl_result = mysql_query("select * from `life_album` where `DB_LifTagID`='".$_GET['DB_LifTagID']."' ORDER BY `DB_LifAlbSort` ASC") or die("查詢失敗la-1");
  $lifeAl_num = mysql_num_rows($lifeAl_result);
  //查詢網路相簿資料
  $lifeAl2_result = mysql_query("select * from `life_album` where `DB_LifAlbID`='".$_GET['LifAlbID']."'") or die("查詢失敗la-2");
  $lifeAl2_ary = mysql_fetch_array($lifeAl2_result);
  
  for ($a=1 ;$a<=$lifeAl_ary = mysql_fetch_array($lifeAl_result) ;$a++){
   
?> 	
                <option value="<? echo $lifeAl_ary['DB_LifAlbID'];?>" <? if ($_GET['LifAlbID'] == $lifeAl_ary['DB_LifAlbID']){echo "selected";}?>><? echo $lifeAl_ary['DB_LifAlbTitle'];?></option>
<? } ?>				
                
              </select> <span class="text_12px_01">(共<? echo $number;?>張相片)</span><br />
		<? if ($lifeAl2_ary['DB_LifExp'] != ""){?>	  
			<img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 相簿簡述：<? echo $lifeAl2_ary['DB_LifExp'];?></td>
		<? }?>
		  </tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#cccccc">
		  <tr bgcolor="#f1f1f1">
			<td width="5%" align="center">排序</td>
			<td width="22%" align="center">照片縮圖</td>
			<td width="43%" align="center">照片簡述</td>
			<td width="10%" align="center">封面</td>
			<td width="20%" align="center">功能</td>
		  </tr>
		<?
		if($return){
		$i = 0;	
		while( $return[$i] ){
		
		
		if ($return[$i]['DB_LifName']!="" && $return[$i]['DB_LifFileName']!=""){
		
		    $ckImg = "../photo/small/".$return[$i]['DB_LifName']."";
		     //解析圖片
            $Img =  getimagesize($ckImg);
		    
			//辨別直橫式
	        if ($Img[0] < $Img[1]){		   
		        $width = "";
		        $height = "height='75'";
		    }else{
		        $width = "width='100'";
		        $height = "";
		    }
			
		}else{
		    $ckImg = "../photo/001.gif";
			$width = "width='100'";
		    $height = "height='75'";
		}
		
		if ($_GET['LifAlbID'] != ""){ //辨別類別排序
		      $ckSort = $return[$i]['DB_LifSort'];
		}else{
		      $ckSort = $i+1;
		}
		?>		  
		  <tr bgcolor="#ffffff">
			<td align="center"><? echo iron_give_zero(2,$ckSort);?></td>
			<td align="center"><img src="<? echo $ckImg;?>" <? echo $width;?> <? echo $height;?> id="border_02" /></td>
			<td align="left"><? echo $return[$i]['DB_LifContent'];?></td>
			<td align="center"><? if($return[$i]['DB_LifCover']=="0"){echo "否";}else{echo "是";}?></td>
			<td align="center">
			  <a href="photo_edit.php?DB_LifID=<? echo $return[$i]['DB_LifID'];?>" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;
			  <a href="javascript:Delete(<? echo $return[$i]['DB_LifID'];?>);" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a>
			</td>
		  </tr>
		<? $i++;
		}
		}
		?>		  
		 
		</table>
		<div align="left" style="padding:5px;margin:5px">
		  <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">建議每本相簿勿超過32張照片，以獲得較佳瀏覽效率。</span><!--　|　
		  <span class="text_12px_03">如果有更改封面，請點此送出設定。</span>&nbsp;<a href="#" class="button_04">+更新封面</a>-->
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
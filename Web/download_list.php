<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="content.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<?php 
    session_start();//初始化session,就是開始要始用session
    include("top_menu.php");
chk_IP($_SERVER['REMOTE_ADDR']);
chk_data($_GET['page'],5);//檢查字元長度後過長退回上一頁
chk_data($_GET['no'],"5");  //檢查數值是否大於5個字元
chk_data($_GET['DB_DowUnitID'],"5");  //檢查數值是否大於5個字元

$no=$_GET['no'];
$arry=SoloSql("download_tags"," `DB_DowTagID`='$no'");
    		
        if($_GET['DB_DowUnitID']!=""){
$DB_DowUnitID=" && `DB_DowUnitID`='".$_GET['DB_DowUnitID']."'";
}
    
$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//********************************************************************************************************

//檔案下載標籤管理查詢
$sql = "select * from `download` where `DB_DowTagID`='$no' $DB_DowUnitID && `DB_DowAnnounce`='0' ORDER BY `DB_DowSort` ASC";	
$return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$url = "download_list.php"; //本頁的網址 & 使用的 get變數
$abri = $arry['DB_DowTagSubject']; //top標題
?>

<script language="javascript">
//換頁Script
function GoPage(page){
location.href="<? echo $url ?>?DB_DowUnitID=<? echo $_GET['DB_DowUnitID'];?>&no=<? echo $_GET['no'];?>&page="+page;
}

</script><noscript>
  <p>很抱歉，本網頁使用script可是您的瀏覽器並不支援，請改用支援 JavaScript 的瀏覽器，謝謝!</p>  
</noscript>
   <body>
       <tr>   
    <td align="left" valign="top">
        <div class="r" id="ct" style="margin-left:20%"><h1>
               <? echo $arry['DB_DowTagSubject'];?>
            </h1></div>
<form action="download_list.php" method="GET" name="form1" > 
		<div align="left" style="margin-left:20%;" class="text_12px_01b border_02">
		<img src="images/arrow_blue01.gif" alt="*" width="10" height="11" align="absmiddle" /> 選擇檔案類別：
	<select id="DB_DowUnitID" name="DB_DowUnitID" class="text_12px_01b">
		<option value="" >不分類</option>
<?
		//查詢檔案下載類別資料
		$dowun_result = mysql_query("select * from `download_unit` where `DB_DowTagID`='$no' ORDER BY `DB_DowUnitSort` ASC") or die("查詢失敗");
		for ($a=1 ;$a<=$dowun_ary = mysql_fetch_array($dowun_result) ;$a++){
		?>			
		<option value="<? echo $dowun_ary['DB_DowUnitID'];?>" <? if ($_GET['DB_DowUnitID'] == $dowun_ary['DB_DowUnitID']){echo "selected";}?>><? echo $dowun_ary['DB_DowUnitName'];?></option>
		<? } ?>		
	</select>
	<input name="no" type="hidden" value="<? echo $_GET['no'];?>" />
		<input type="submit" name="name" value="送出" id="name" class="text_12px_01b" />
	    </div>
</form>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="margin_01" class="text_12px_01" summary="<? echo $arry['DB_DowTagSubject'];?>表格"  style="width:50%; margin-left:20%; margin-top:2%">
		  <caption align="left" class="hidden"><? echo $arry['DB_DowTagSubject'];?>列表</caption>
		  <tr>
            <th width="10%" align="center" class="th2">序號</th>
            <th width="75%" align="center" class="th2">檔案名稱</th>
            <th width="15%" align="center" class="th2-end">檔案</th>
          </tr>
		  <tr>
			<td colspan="3" class="h5"></td>
		  </tr>
		<?
		if($return){
		$i = 0;
		$c = ($page - 1) * 10;
		while( $return[$i] ){
		$c++;
		?>
		  <tr>
			<td align="center" valign="middle" class="border_02"><? if($_GET['DB_DowUnitID']==""){echo $c;}else{echo $return[$i]['DB_DowSort'];}?></td>
			<td align="center" valign="middle" class="text_12px_01 border_02"><a href="download.php?DB_FileTitle=<? echo urlencode($return[$i]['DB_DowName']);?>&DB_FileName=<? echo $return[$i]['DB_DowFileName'];?>" class="link_01" title="<? echo $return[$i]['DB_DowName'];?>(另開視窗下載)"><? echo $return[$i]['DB_DowSubject'];?></a></td>
			<td align="left" valign="middle" class="border_02"><a href="download.php?DB_FileTitle=<? echo urlencode($return[$i]['DB_DowName']);?>&DB_FileName=<? echo $return[$i]['DB_DowFileName'];?>" class="link_01" title="<? echo $return[$i]['DB_DowName'];?>(另開視窗下載)"><? echo strtoupper(substr($return[$i]['DB_DowFileName'],-3));?></a></td>
		  </tr>
		  <tr>
			<td colspan="3" class="h5"></td>
		  </tr>
		<? $i++;
		}
		}else{
		?>
		  <tr>
			<td colspan="3" align="center" valign="middle" class="border_02">目前沒有資料</td>
			</tr>
		  <tr>
			<td colspan="3" class="h5"></td>
		  </tr>
		<? }?>
		</table>
		<br />
		<div align="left" style="margin-left:20%"><img src="images/icon_g.gif" alt="*" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">資料筆數：<? echo $number;?>　　
		<?  if ( $return['total_page'] > 1) { ?>		
		頁數：<? echo $return[ 'now_page' ];?> / <? echo  $return[ 'total_page' ];?></span>
		　|　
		  <a href="javascript:GoPage(1)" title="最前頁" class="button_05">|＜<</a>
		  <a href="javascript:GoPage(<? echo $return['f']; ?>)" title="上一頁" class="button_05">＜＜</a>
		  <? for($i=$return[ 'show_start' ];$i<$return['show_start']+$return['show_page'];$i++){ ?>		  
		       <? if ($i!=$page){?>　<a href="javascript:GoPage(<? echo $i;?>)" class="link_05" title="第<? echo $i;?>頁" ><? }?><? if ($i==$page){?>　<span class="text_12px_03b"><? }?><? echo $i;?><? if ($i==$page){?></span><? }?><? if ($i!=$page){?></a><? }?>
		  <?   }   ?>　		  
		  <a href="javascript:GoPage(<? echo $return['b']; ?>)" title="下一頁" class="button_05">＞＞</a>
		  <a href="javascript:GoPage(<? echo $return['total_page']; ?>)" title="最後頁" class="button_05">＞|</a>
		<?   }   ?>			
		</div>

	</td>
  </tr>
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
<?php
session_start();//初始化session,就是開始要始用session
    /*if(empty($_SERVER["HTTPS"])) {
        $https = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location:".$https);
        exit();
    }
    // 調整網頁語系
    @header('Content-Type: text/html; charset=utf-8'); 

    // mb編碼設定
    mb_internal_encoding("UTF-8");

    //session_register('http_url');
    $url_file="/ioth";*/

    /****************************************************
    功能：得知使用者的所有資訊
    ****************************************************/
    /*function get_user_info( $DB_ManUser ){	
        $result_a = mysql_query("select * from `manager` where `DB_ManUser` = '$DB_ManUser'");
        $num_a=mysql_num_rows($result_a);
        if($num_a<>0){
            $arr_a = mysql_fetch_array( $result_a );
            return $arr_a;
        }
    }

    //修正新版php不支援問題
    if (!function_exists('session_register')) {
        function session_register(){
            $args = func_get_args();
            foreach ($args as $key){
                $_SESSION[ $key ] = $GLOBALS[ $key ];
            }
        }
    }
    if (!function_exists('session_is_registered')) {
        function session_is_registered( $key ){
            return isset( $_SESSION[ $key ] );
        }
    }
    if (!function_exists('session_unregister')) {
        function session_unregister( $key ){
            unset( $_SESSION[ $key ] );
        }
    }
    $userauth = get_user_info( $_SESSION['ManUser'] ); */
?>

<script language="javascript">//換頁Script
    function GoPage(page){
        location.href="<? echo $url ?>?DB_DowUnitID=<? echo $_GET['DB_DowUnitID'];?>&no=12&page="+page;
    }
</script>

<noscript>
  <p>很抱歉，本網頁使用script可是您的瀏覽器並不支援，請改用支援 JavaScript 的瀏覽器，謝謝!</p>  
</noscript>

<html>
<head>
    <title>桃園市私立脊髓損傷潛能發展中心</title>
    <link href="images/favicon.ico" rel="SHORTCUT ICON">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="content.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
    
<header>
    <?php 
    include("top_menu.php");
    ?>
</header>
    
<body>
    <?php 
    mysql_query("set names utf8") or die("err_1");
    mysql_query("set character_set_client=utf8") or die("err_2");
    mysql_query("set character_set_results=utf8") or die("err_3");
    //chk_IP($_SERVER['REMOTE_ADDR']);
    if($_GET['DB_DowUnitID']!=""){
    $DB_DowUnitID=" && `DB_DowUnitID`='".$_GET['DB_DowUnitID']."'"; //22是捐款 25是徵信
    }
    $page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
    //********************************************************************************************************
    //檔案下載標籤管理查詢
    $sql = "select * from `download` where `DB_DowTagID`=12 $DB_DowUnitID ORDER BY `DB_DowSort` ASC";	
    $return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
    $result = mysql_query($sql) or die("查詢失敗");
    $number = mysql_num_rows($result); //全部資料的總數
    $url = "donate_2.php"; //本頁的網址 & 使用的 get變數
    
    ?>
    <form action="donate2.php" method="GET" name="form1" style="margin-top:12em; margin-left:6em;" > 
		  <div align="left"> 選擇檔案類別：         
	           <select id="DB_DowUnitID" name="DB_DowUnitID" class="text_12px_01b">
		          <option value="" >不分類</option>
		          <?//查詢檔案下載類別資料
		          $dowun_result = mysql_query("select * from `download_unit` where `DB_DowTagID`=12 ORDER BY `DB_DowUnitSort` ASC") or die("查詢失敗");
		          for ($a=1 ;$a<=$dowun_ary = mysql_fetch_array($dowun_result) ;$a++){
		          ?>			
		          <option value="<? echo $dowun_ary['DB_DowUnitID'];?>" 
                  <? if ($_GET['DB_DowUnitID'] == $dowun_ary['DB_DowUnitID']){echo "selected";}?>>       
                  <? echo $dowun_ary['DB_DowUnitName'];?>
                  </option>
                  <? } ?>		
	           </select>
	           <input name="no" type="hidden" value="12" />
		       <input type="submit" name="name" value="送出" id="search_button" class="text_12px_01b" />
	    </div>
        </form>
        
		<table width="50%" border="0" cellspacing="0" cellpadding="0" id="margin_01" class="text_12px_01" summary="捐款捐物徵信表格" align="center">
		  <caption align="left" class="hidden">捐款捐物徵信列表</caption>
		  <tr>
            <th width="10%" align="center" class="th2">序號</th>
            <th width="75%" align="center" class="th2">檔案名稱</th>
            <th width="15%" align="center" class="th2">下載</th>
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
			<td align="center" valign="middle" class="border_02">
                <? if($_GET['DB_DowUnitID']==""){
                        echo $c;
                    }
                    else{
                        echo $return[$i]['DB_DowSort'];
                    }
                ?>
            </td>
              
			<td align="left" valign="middle" class="text_12px_01 border_02 th2">
                <? echo $return[$i]['DB_DowSubject'];?>
            </td>
              
			<td align="center" valign="middle" class="border_02">
                <a href="download.php?DB_FileTitle=<? echo urlencode($return[$i]['DB_DowName']);?>&DB_FileName=<? echo $return[$i]['DB_DowFileName'];?>" class="link_01" title="<? echo $return[$i]['DB_DowName'];?>(另開視窗下載)">
                    <? echo strtoupper(substr($return[$i]['DB_DowFileName'],-3));?>
                </a>
            </td>
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
        
		<br/>  
        
		<div align="left" style="padding:5px;margin:5px"><img src="images/icon_g.gif" alt="*" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">資料筆數：<? echo $number;?>　　
		<?  if ( $return['total_page'] > 1) { ?>		
		頁數：<? echo $return[ 'now_page' ];?> / <? echo  $return[ 'total_page' ];?></span>
		　|　
		  <a href="javascript:GoPage(1)" title="最前頁" class="button_05">|</a>
		  <a href="javascript:GoPage(<? echo $return['f']; ?>)" title="上一頁" class="button_05"></a>
		  <? for($i=$return[ 'show_start' ];$i<$return['show_start']+$return['show_page'];$i++){ ?>		  
		       <? if ($i!=$page){?>　<a href="javascript:GoPage(<? echo $i;?>)" class="link_05" title="第<? echo $i;?>頁" ><? }?><? if ($i==$page){?>　<span class="text_12px_03b"><? }?><? echo $i;?><? if ($i==$page){?></span><? }?><? if ($i!=$page){?></a><? }?>
		  <?   }   ?>　		  
		  <a href="javascript:GoPage(<? echo $return['b']; ?>)" title="下一頁" class="button_05">>></a>
		  <a href="javascript:GoPage(<? echo $return['total_page']; ?>)" title="最後頁" class="button_05">>|</a>
		<?   }   ?>			
		</div>   
<footer>
    <?php
    include("footer.php");
    ?>
</footer>
</body>
</html>
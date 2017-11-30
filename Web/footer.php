<?php $arry = SoloSql("menu","`DB_MenID`='1'");?>
<div class="footer">
    <?php echo $arry['DB_MenContent'];?>
</div>
<?php
if ( empty($_SESSION['ckIP']) ){
      
	  session_register("ckIP");
	  $_SESSION['ckIP'] = $_SERVER['REMOTE_ADDR'];
	  //新增瀏覽紀錄 
	  mysql_query("insert into `counter` (`DB_CouIp`,`DB_Time`) values ('".$_SERVER['REMOTE_ADDR']."',NOW())")or die("新增失敗ip");  
}
?>
<iframe width="0" height="0" name="FormFrame2"></iframe>
<script src="http://download.arefly.com/chinese_convert.js"></script>
<script>
var defaultEncoding = 1; // 預設語言：1-繁體中文 | 2-简体中文
var translateDelay = 0;
var cookieDomain = "http://web.cc.ncu.edu.tw/~103403519/";	// 修改爲你的部落格地址
var msgToTraditionalChinese = "繁簡轉換";	// 簡轉繁時所顯示的文字
var msgToSimplifiedChinese = "繁简转换"; 	// 繁转简时所显示的文字
var translateButtonId = "translateLink";	// 「轉換」<A>鏈接標籤ID
translateInitilization();
</script>
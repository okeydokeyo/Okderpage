<?php
$key =urlencode($_POST['name']);

if ($key=="站內搜尋"){
echo <<<EOD
<!-- Search Google -->
<center>
<h1>站內搜尋</h1>
請在以空格輸入搜尋關鍵字：<br>
<form method="post" action="search.php">
<table bgcolor="#FFFFFF"><tr><td>
<a href="http://www.google.com">
<img src="http://www.google.com/logos/Logo_40wht.gif" border="0" 
alt="Google" align="absmiddle"></a>
<input type=text name="key" size=31 maxlength=255 value="">
<input type=submit name=btnG value="Google搜尋">
</td></tr></table>
</form><br>
<a href="index.php">財團法人桃園縣私立脊髓損傷潛能發展中心</a>
</center>
<!-- Search Google -->

EOD;
} 
else {
    header("Location: http://www.google.com.tw/search?as_q=$key&ie=utf8&oe=utf8&hl=zh-TW&as_sitesearch=www.scsrc.org.tw/");
}
?>

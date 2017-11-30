<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_4"); //檢查是否功能權限,否回首頁

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@header('Content-Type: text/html; charset=utf-8'); 

$num = $_GET['num'];

if ($num == "1"){
      //條例式訊息標籤管理查詢
      $ordt_result = mysql_query("select * from `ordi_tags` where 1 ORDER BY `DB_OrdTagSort` ASC") or die("查詢失敗b1");  
?>	
      <select name="DB_TopNumID" class="text_12px_01">
	       <? while ( $ordt_ary = mysql_fetch_array($ordt_result) ){?>
			    <option value="<? echo $ordt_ary['DB_OrdTagID'];?>"><? echo $ordt_ary['DB_OrdTagSubject'];?></option>
		   <? } ?>
	  </select>
<? 
}
if ($num == "2"){
      //說明文章管理查詢
      $article_result = mysql_query("select * from `article` where 1 ORDER BY `DB_ArtSort` ASC") or die("查詢失敗b2");
?>
      <select name="DB_TopNumID" class="text_12px_01">
	       <? while ( $article_ary = mysql_fetch_array($article_result) ){?>
			    <option value="<? echo $article_ary['DB_ArtID'];?>"><? echo $article_ary['DB_ArtSubject'];?></option>
		   <? } ?>
	  </select>

<? 
}
if ($num == "3"){
      //行事曆管理查詢
      $calt_result = mysql_query("select * from `calendar_tags` where 1 ORDER BY `DB_CalTagSort` ASC") or die("查詢失敗b3");
?>
      <select name="DB_TopNumID" class="text_12px_01">
	       <? while ( $calt_ary = mysql_fetch_array($calt_result) ){?>
			    <option value="<? echo $calt_ary['DB_CalTagID'];?>"><? echo $calt_ary['DB_CalTagSubject'];?></option>
		   <? } ?>
	  </select>
	  
<? 
}
if ($num == "4"){
      //檔案下載類別查詢
      $dowc_result = mysql_query("select * from `download_tags` where 1 ORDER BY `DB_DowTagSort` ASC") or die("查詢失敗b4");
?>
      <select name="DB_TopNumID" class="text_12px_01">
	       <? while ( $dowc_ary = mysql_fetch_array($dowc_result) ){?>
			    <option value="<? echo $dowc_ary['DB_DowTagID'];?>"><? echo $dowc_ary['DB_DowTagSubject'];?></option>
		   <? } ?>
	  </select>

<? 
}
?>

<?php
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_8"); //檢查是否功能權限,否回首頁

$DB_OrdTagID=$_GET['DB_OrdTagID'];
$arry1=SoloSql("ordi_tags"," `DB_OrdTagID`='$DB_OrdTagID'");
$page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
//條列式訊息管理查詢
$sql = "select * from `ordi` where `DB_OrdTagID`='$DB_OrdTagID' ORDER BY `DB_OrdTime` DESC";	
$return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
$result = mysql_query($sql) or die("查詢失敗");
$number = mysql_num_rows($result); //全部資料的總數
$url = "sections_list.php"; //本頁的網址 & 使用的 get變數

$arry=SoloSql("logo","`DB_LogID`='".$_GET['DB_LogID']."'");
$page2=$_POST['page'];
$DB_LogID_no=$_POST['DB_LogID_no'];
$DB_LogAnnounce=$_POST['DB_LogAnnounce'];
$DB_LogExp=ereg_replace("'","\'",$_POST['DB_LogExp']);
if(!empty($DB_LogExp) ){
			if(!empty($_FILES['DB_LogImg']['name'])){
				/*
                輸入：
                $file_var			表單中input type='file'的物件的name屬性值	ex: 'myfile'
                $new_file_name		欲新命名的變數名(不加檔案型態) ex: 'photo'
                $old_file_name		欲蓋過的舊檔案(需加檔案型態)(可為空字串) ex: 'old.jpg'
                $upload_dest		欲上傳之資料夾(權限需777)(結尾沒有/) ex: '.'   ex: './images'
                $accepted_file_type 允許的檔案類型(小寫以,區隔)(可為空字串) ex: 'gif,jpg,jpeg'
                $max_size 			允許上傳的最大容量(數字, 單位為bit) ex: 32000000        
                */
                $return=iron_upload("DB_LogImg", time(), "", "../../images/", "gif,jpg,jpeg,png", "16677216" );
				$UpStr=" `DB_LogAnnounce`='$DB_LogAnnounce',`DB_LogExp`='$DB_LogExp',`DB_LogImg`='".$return['new_file']."',`DB_LogFileName`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
            else{
				$UpStr=" `DB_LogAnnounce`='$DB_LogAnnounce',`DB_LogExp`='$DB_LogExp',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
			}
			EditSql("logo","$DB_LogID_no","DB_LogID","toplogo_list.php?page=$page2","修改成功!!",$UpStr);
	
			//紀錄使用者資訊	
			$UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
			$UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','LOGO圖管理','".$DB_LogExp."','edit',NOW()";
			Recording_Add("recording",$UpStr,$UpStr2);
}

include_once ("top.php");
?>
<script language="javascript">
//換頁Script
function GoPage(page){
   location.href="<?php echo $url ?>?DB_OrdTagID=<?php echo $DB_OrdTagID;?>&page="+page;
}
//選擇是否刪除
function  Delete(id,page){
    if ( confirm("是否刪除此筆紀錄") ){
        location.href='sections_del.php?chkdel=YES&DB_OrdID='+id+'&page='+page;
    }
}
function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_LogExp.value == ""){ErrString = ErrString + "LOGO圖片說明" + unescape('%0D%0A')}
	if (document.form1.DB_LogImg.value == ""){ErrString = ErrString + "上傳圖片" + unescape('%0D%0A')}
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	return true;
}

//更換文件上傳資料
function change1( num,DB_FileName ){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				$('file1').innerHTML = oHttpReq.responseText;
			}
		}
	}
	oHttpReq.open( "GET", "toplogo_file_del.php?num="+num+"&del=Yes&DB_FileName="+DB_FileName+"&rand="+rand(), true );  
	oHttpReq.send(null);
}
</script>
<!--top_end-->
<table width="955" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="203" align="left" valign="top">
<!--menu-->
<?php
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> <a href="sections_calss.php" class="link_01">條列式訊息管理</a> >> <span class="text_12px_02"><strong><? echo $arry1['DB_OrdTagSubject'];?></strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong><? echo $arry1['DB_OrdTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		<!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select class="text_12px_01">
			<option value="c" >中文</option>
			<option value="e" >英文</option>
	      </select>-->
		  <a href="sections_calss.php" class="button_04">◎回標籤列表</a>&nbsp;
            <a href="sections_add.php?DB_OrdTagID=<? echo $DB_OrdTagID;?>" class="button_04">◎新增資料</a></div></td>
	  </tr>
	</table>
        
        
        
    <?php   
    if($DB_OrdTagID != 48){ 
    ?>    
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
			<td width="10%" align="center">發佈時間</td>
			<td width="12%" align="center">發佈人</td>
			<td width="42%" align="center">標題</td>
			<td width="6%" align="center">狀態</td>
			<td width="14%" align="center">功能</td>
		  </tr>
		<?
		if($return){
		$i = 0;
		$c = ($page - 1) * 10;
		while( $return[$i] ){
		$c++;
		
		if($return[$i]['DB_OrdAnnounce']=="1"){
		$DB_OrdAnnounce="<span class=\"state_del\">不顯示</span>";
		}else{
		$DB_OrdAnnounce="<span class=\"state_edit\">顯示</span>";
		}

		$arry=SoloSql("manager","`DB_ManUser`='".$return[$i]['DB_EditUser']."'");

		?>
		  <tr bgcolor="#ffffff">
			<td align="center"><? echo $return[$i]['DB_OrdTime'];?></td>
			<td align="center"><? echo $arry['DB_ManName'];?></td>
			<td align="left" class="text_12px_03"><? echo $return[$i]['DB_OrdSubject'];?></td>
			<td align="center"><? echo $DB_OrdAnnounce;?></td>
			<td align="center"><a href="sections_edit.php?DB_OrdID=<? echo $return[$i]['DB_OrdID'];?>&page=<? echo $page;?>" class="button_02"><img src="images/icon_edit.gif" border="0" align="absmiddle" /> 編輯</a>&nbsp;<a href="javascript:Delete(<? echo $return[$i]['DB_OrdID'];?>,<? echo $page;?>);" class="button_03"><img src="images/icon_del2.gif" border="0" align="absmiddle" /> 刪除</a></td>
		  </tr>
		<? $i++;
		}
		}else{
		?>
		  <tr bgcolor="#ffffff">
			<td colspan="5" align="center">目前沒有資料<a href="sections_del.php" class="button_03"></a></td>
			</tr>
		<? }?>
		</table>
		<div align="left" style="padding:5px;margin:5px"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">每頁10筆，共<? echo $number;?>筆資料</span>
<?php  if ( $return['total_page'] > 1) { ?>		
		　|　
		  <a href="javascript:GoPage(1)" title="最前頁" class="button_05">|<</a>
		  <a href="javascript:GoPage(<? echo $return['f']; ?>)" title="上一頁" class="button_05"><<</a>
		  <? for($i=$return[ 'show_start' ];$i<$return['show_start']+$return['show_page'];$i++){ ?>		  
		       <? if ($i!=$page){?>　<a href="javascript:GoPage(<? echo $i;?>)" class="link_02"><? }?><? if ($i==$page){?>　<span class="text_12px_03b"><? }?><? echo $i;?><? if ($i==$page){?></span><? }?><? if ($i!=$page){?></a><? }?>
		  <?   }   ?>　		  
		  <a href="javascript:GoPage(<? echo $return['b']; ?>)" title="下一頁" class="button_05">>></a>
		  <a href="javascript:GoPage(<? echo $return['total_page']; ?>)" title="最後頁" class="button_05">>|</a>
<?php   }   ?>			
		</div>
		</td>
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
    <?php
    }
    else{
    ?>	
	<table width="752" border="0" cellspacing="0" cellpadding="0">
<form action="sections_list.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">	  
	  <tr>
		<td width="5" align="left" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
		<td width="742" align="left" valign="top" background="images/com_top.gif"></td>
		<td width="5" align="left" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
	  </tr>
	  <tr>
		<td align="left" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">&nbsp;</td>
		<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
		  <tr>
			<td colspan="2" align="left" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
			</tr>
		  <tr>
			<td width="15%" align="left" valign="top" class="border_02">
                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片<font color="red">*</font>
            </td>
			<td width="85%" align="left" valign="top" class="border_02">
	           <span id="file1">
                <?
                if(!empty($arry['DB_LogImg']) && !empty($arry['DB_LogFileName'])){
                ?>
                <a href="../../carouselPicture/<? echo $arry['DB_LogImg'];?>" target="_blank"><? echo $arry['DB_LogFileName'];?></a> 
                <a href="javascript:change1(<? echo $arry['DB_LogID'];?>,'DB_LogImg');">
                    <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />
                </a>
                <? 
                }
                elseif(empty($arry['DB_LogImg']) && empty($arry['DB_LogFileName'])){
                ?>
                <input name="DB_LogImg" type="file" id="DB_LogImg" class="text_12px_01"/>
                <? }?>
                </span>
			<br />
			(圖片會依比例自動縮到　寬190px　高65px<!--　　<font color="red">*</font>建議以透明背景24位元png檔為佳-->)
            </td>
		  </tr>
            
		</table> 		
		<div align="center" style="padding:5px;margin:5px">
            <a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a></div>
	  <input  type="hidden" name="DB_LogID_no" value="<? echo $arry['DB_LogID'];?>">
	  <input type="hidden" name="page" value="<? echo $_GET['page'];?>">		
		</td>
          
		<td align="left" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="left" valign="top"><img src="images/com_bottom_L.gif" width="5" height="5" /></td>
		<td align="left" valign="top" background="images/com_bottom.gif"></td>
		<td align="left" valign="top"><img src="images/com_bottom_R.gif" width="5" height="5" /></td>
	  </tr>
</form>	  
	</table>
        
    <?php
    }    
    ?>
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
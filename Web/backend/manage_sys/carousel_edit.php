<?php
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_16"); //檢查是否功能權限,否回首頁

$DB_LogID_no=$_POST['DB_LogID_no'];
$DB_LogAnnounce=$_POST['DB_LogAnnounce'];
$DB_LogExp=ereg_replace("'","\'",$_POST['DB_LogExp']);

if(!empty($DB_LogExp) ){	
    if(!empty($_FILES['DB_LogImg']['name'])){   
        $return=iron_upload("DB_LogImg", time(), "", "../../carouselPicture/", "gif,jpg,jpeg,png", "16677216" );		
        $UpStr=" `DB_LogAnnounce`='$DB_LogAnnounce',`DB_LogExp`='$DB_LogExp',`DB_LogImg`='".$return['new_file']."',`DB_LogFileName`='".$return['old_file_name']."',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";	
    }
    else{        
        $UpStr=" `DB_LogAnnounce`='$DB_LogAnnounce',`DB_LogExp`='$DB_LogExp',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";	
    }	
    EditSql("carousel","$DB_LogID_no","DB_LogID","carousel_edit.php","修改成功!!",$UpStr);
		
    //紀錄使用者資訊	
    $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
    $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','輪播圖片管理','".$DB_LogExp."','edit',NOW()";	
    Recording_Add("recording",$UpStr,$UpStr2);
}
include_once ("top.php");
?>

<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
function checkinput(){
	var ErrString = "" ;
	if (document.form1.DB_LogExp.value == ""){ErrString = ErrString + "圖片說明" + unescape('%0D%0A')}
	if (document.form1.DB_LogImg1.value == ""){ErrString = ErrString + "上傳圖片1" + unescape('%0D%0A')}
    if (document.form1.DB_LogImg2.value == ""){ErrString = ErrString + "上傳圖片2" + unescape('%0D%0A')}
    if (document.form1.DB_LogImg3.value == ""){ErrString = ErrString + "上傳圖片3" + unescape('%0D%0A')}
    if (document.form1.DB_LogImg4.value == ""){ErrString = ErrString + "上傳圖片4" + unescape('%0D%0A')}
    if (document.form1.DB_LogImg5.value == ""){ErrString = ErrString + "上傳圖片5" + unescape('%0D%0A')}
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}
	return true;
}
    
//更換文件上傳資料
function change1(DB_LogID,DB_LogImg){
	var oHttpReq = new createXMLHttpRequest();
	oHttpReq.onreadystatechange = function(){
		if (oHttpReq.readyState != 4 ){
			//$('station_show').innerHTML = '資料載入中, 請稍候'; 	
		}
		else{  
			if(oHttpReq.status == 200){   
				//$('station_show').innerHTML= '321';
				if(DB_LogID == 1){
                    $('file1').innerHTML = oHttpReq.responseText;
                }
                else if(DB_LogID == 2){
                    $('file2').innerHTML = oHttpReq.responseText;
                }
                else if(DB_LogID == 3){
                    $('file3').innerHTML = oHttpReq.responseText;
                }
                else if(DB_LogID == 4){
                    $('file4').innerHTML = oHttpReq.responseText;
                }
                else if(DB_LogID == 5){
                    $('file5').innerHTML = oHttpReq.responseText;
                }
			}
		}
	}
	oHttpReq.open("GET", "carousel_file_del.php?DB_LogID="+DB_LogID+"&del=Yes&DB_LogImg="+DB_LogImg+"&rand="+rand(), true);  
	oHttpReq.send(null);
}
</script>

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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁風格管理 >> 輪播圖片管理 >> <span class="text_12px_02"><strong>修改資料</strong></span></td>
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
        <form action="carousel_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">	  
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
                            <td width="15%" align="left" valign="top" class="border_02">
                                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片 1
                            </td>
                            
                            <td width="85%" align="left" valign="top" class="border_02">
                                <span id="file1">
                                    <?php
                                    $arry=SoloSql("carousel","`DB_LogID`='1'");
                                    
                                    if(!empty($arry['DB_LogImg']) && !empty($arry['DB_LogFileName'])){
                                    ?>
                                    <a href="../../carouselPicture/<? echo $arry['DB_LogImg'];?>" target="_blank">
                                        <? echo $arry['DB_LogFileName'];?>
                                    </a> 
                                    <a href="javascript:change1(1,DB_LogImg1);">
                                        <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />
                                    </a>
                                    <?php
                                    }
                                    
                                    else if(empty($arry['DB_LogImg']) && empty($arry['DB_LogFileName'])){
                                    ?>
                                    <input name="DB_LogImg1" type="file" id="DB_LogImg1" class="text_12px_01"/>
                                    <? }?>
                                </span><br />
                            </td>
                        </tr>
                        
                        <tr>                           
                            <td width="15%" align="left" valign="top" class="border_02">
                                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片 2
                            </td>
                            <td width="85%" align="left" valign="top" class="border_02">
                                <span id="file2">
                                    <?php             
                                    $arry=SoloSql("carousel","`DB_LogID`='2'");
                                    if(!empty($arry['DB_LogImg']) && !empty($arry['DB_LogFileName'])){
                                    ?>
                   <a href="../../carouselPicture/<? echo $arry['DB_LogImg'];?>" target="_blank">
                    <? echo $arry['DB_LogFileName'];?>
                   </a> 
                   <a href="javascript:change1(2,DB_LogImg2);">
                       <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />
                   </a>
                   <?php
                }
                   elseif(empty($arry['DB_LogImg']) && empty($arry['DB_LogFileName'])){
                   ?>
                   <input name="DB_LogImg2" type="file" id="DB_LogImg2" class="text_12px_01"/>
                   <? }?>
                </span>
                <br />
              </td>
            </tr>
		  
            <tr>
			<td width="15%" align="left" valign="top" class="border_02">
                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片 3
            </td>
			<td width="85%" align="left" valign="top" class="border_02">
	           <span id="file3">
                <?php     
                   $arry=SoloSql("carousel","`DB_LogID`='3'");
                   if(!empty($arry['DB_LogImg']) && !empty($arry['DB_LogFileName'])){
                ?>
                   <a href="../../carouselPicture/<? echo $arry['DB_LogImg'];?>" target="_blank">
                    <? echo $arry['DB_LogFileName'];?>
                   </a> 
                   <a href="javascript:change1(3,DB_LogImg3);">
                       <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />
                   </a>
                   <?php
                }
                   elseif(empty($arry['DB_LogImg']) && empty($arry['DB_LogFileName'])){
                   ?>
                   <input name="DB_LogImg3" type="file" id="DB_LogImg3" class="text_12px_01"/>
                   <? }?>
                </span>
                <br />
              </td>
            </tr>
            
            <tr>
			<td width="15%" align="left" valign="top" class="border_02">
                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片 4
            </td>
			<td width="85%" align="left" valign="top" class="border_02">
	           <span id="file4">
                <?php          
                   $arry=SoloSql("carousel","`DB_LogID`='4'");
                   if(!empty($arry['DB_LogImg']) && !empty($arry['DB_LogFileName'])){
                ?>
                   <a href="../../carouselPicture/<? echo $arry['DB_LogImg'];?>" target="_blank">
                    <? echo $arry['DB_LogFileName'];?>
                   </a> 
                   <a href="javascript:change1(4,DB_LogImg4);">
                       <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />
                   </a>
                   <?php
                }
                   elseif(empty($arry['DB_LogImg']) && empty($arry['DB_LogFileName'])){
                   ?>
                   <input name="DB_LogImg4" type="file" id="DB_LogImg4" class="text_12px_01"/>
                   <? }?>
                </span>
                <br />
              </td>
            </tr>
            
            <tr>
			<td width="15%" align="left" valign="top" class="border_02">
                <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 上 傳 圖 片 5
            </td>
			<td width="85%" align="left" valign="top" class="border_02">
	           <span id="file5">
                <?php
                   $arry=SoloSql("carousel","`DB_LogID`='5'");
                   if(!empty($arry['DB_LogImg']) && !empty($arry['DB_LogFileName'])){
                ?>
                   <a href="../../carouselPicture/<? echo $arry['DB_LogImg'];?>" target="_blank">
                    <? echo $arry['DB_LogFileName'];?>
                   </a> 
                   <a href="javascript:change1(5,DB_LogImg5);">
                       <img src="images/icon_del.gif" width="16" height="16" border="0" align="absmiddle" />
                   </a>
                   <?php
                }
                   else if(empty($arry['DB_LogImg']) && empty($arry['DB_LogFileName'])){
                   ?>
                   <input name="DB_LogImg5" type="file" id="DB_LogImg5" class="text_12px_01"/>
                   <? }?>
                </span>
                <br />
              </td>
            </tr>
		</table> 		
		
            <div align="center" style="padding:5px;margin:5px">
                <a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a>
            </div>
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

	</td>
  </tr>
  <tr>
    <td height="10" colspan="2" align="left" valign="top"></td>
  </tr>
</table>
<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
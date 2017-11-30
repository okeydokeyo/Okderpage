<?
include "cksession.php";
include "../config.php";
include "../function.php";
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_17"); //檢查是否功能權限,否回首頁

//上方選單標籤管理查詢
$DB_TopTagID = $_GET['DB_TopTagID'];
$ary2 = SoloSql("top_tags","`DB_TopTagID`='$DB_TopTagID'");

$TopID = $_POST['TopID'];
$TopTagID = $_POST['TopTagID'];
$DB_TopSort = $_POST['DB_TopSort'];
$TopSort = $_POST['TopSort'];
$DB_TopSubject = ereg_replace("'","\'",$_POST['DB_TopSubject']);
$DB_TopBasis = $_POST['DB_TopBasis'];
$DB_TopNumID = $_POST['DB_TopNumID'];

if( !empty($DB_TopSort) && !empty($DB_TopSubject) ){
	 ChangeSortEdit("top",$DB_TopSort,"DB_TopSort",$TopSort," && `DB_TopTagID`='".$TopTagID."'"); //修改排序
	 $arry2 = SoloSql("top_tags","`DB_TopTagID`='".$TopTagID."'");      
    //修改
    $UpStr = "`DB_TopSort`='$DB_TopSort',`DB_TopSubject`='$DB_TopSubject',`DB_TopBasis`='$DB_TopBasis',`DB_TopNumID`='$DB_TopNumID',`DB_EndTime`=NOW(),`DB_EditUser`='".$_SESSION['ManUser']."'";
    EditSql("top",$TopID,"DB_TopID","indextop_list.php?DB_TopTagID=$TopTagID","修改成功!!",$UpStr);
    //紀錄使用者資訊	
    $UpStr="`DB_RecUser`,`DB_RecIp`,`DB_RecSubject`,`DB_RecAccess`,`DB_RecAction`,`DB_RecTime`";
    $UpStr2="'".$_SESSION['ManUser']."','".$_SERVER['REMOTE_ADDR']."','上方選單管理-".ereg_replace("'","\'",$arry2['DB_TopTagSubject'])."','".$DB_TopSubject."','edit',NOW()";
    Recording_Add("recording",$UpStr,$UpStr2);
}

include_once ("top.php");
?>

<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
<script language="javascript">
    //更換文件資料
    function change1( num ){
        var oHttpReq = new createXMLHttpRequest();
        oHttpReq.onreadystatechange = function(){
            if (oHttpReq.readyState != 4 ){
                //$('station_show').innerHTML = '資料載入中, 請稍候'; 	
            }
            else{  
                if(oHttpReq.status == 200){   
                    //$('station_show').innerHTML= '321';
                    $('show1').innerHTML = oHttpReq.responseText;
                }
            }
        }
        oHttpReq.open( "GET", "indextop_file.php?num="+num+"&rand="+rand(), true );  
        oHttpReq.send(null);
    }

    function checkinput(){
        var ErrString = "" ;
        if (document.form1.DB_TopSort.value == ""){ErrString = ErrString + "排序" + unescape('%0D%0A')}
        if (document.form1.DB_TopSubject.value == ""){ErrString = ErrString + "選單名稱" + unescape('%0D%0A')}
        //if(document.form1.check1.value == "yes"){
            if(document.form1.DB_TopBasis.value == ""){ErrString = ErrString + "網頁選單功能" + unescape('%0D%0A')}
        //}

        if (ErrString != "") {
            alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
        return false;
        }
        return true;
    }
</script>

<?php
$DB_TopID = $_GET['DB_TopID'];
$ary = SoloSql("top","`DB_TopID`='$DB_TopID'");
?>
<!--top_end-->
<table width="955" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="203" align="top" valign="top">
            <!--leftmenu-->
            <?php
            include_once ("left_menu.php");
            ?>
            <!--leftmenu_end-->
        </td>
      <td width="752" align="top" valign="top">
<!--target="FormFrame"-->	
          <form action="indextop_edit.php" method="POST" enctype="multipart/form-data" name="form1" target="FormFrame">	
              <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                      <td align="top" valign="middle"><img src="images/gray_01.gif" width="10" height="20" /></td>
                      <td align="top" valign="middle"><img src="images/icon_a1.gif" width="15" height="20" /></td>
                      <td align="top" valign="middle" background="images/gray_02.gif" class="text_12px_01">&nbsp;
                          <strong><? echo $userauth['DB_ManName'];?></strong> 歡迎登入!!&nbsp;&nbsp;
                      </td>
                      <td align="top" valign="middle"><img src="images/icon_q1.gif" width="15" height="20" /></td>
                      <td align="top" valign="middle" background="images/gray_02.gif" class="text_12px_01">
                          <a href="id_info.php" class="link_01">首頁</a> >> 導覽列管理>> 第一排導覽列管理 >> <? echo $ary2['DB_TopTagSubject'];?> >> 
                          <span class="text_12px_02"><strong>編輯資料</strong></span>
                      </td>
                      <td align="top" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
                  </tr>
              </table>
              <table width="752" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                      <td height="10" colspan="3" align="top" valign="top"></td>
                  </tr>
                  <tr>
                      <td width="5" align="top" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
                      <td width="742" align="top" valign="middle" class="title_bg">
                          <strong><? echo $ary2['DB_TopTagSubject'];?></strong>
                      </td>
                      <td width="5" align="top" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
                  </tr>
                  <tr>
                      <td height="10" colspan="3" align="top" valign="top">
                          <div align="right" style="padding:5px;margin:5px">
                              <a href="indextop_list.php?DB_TopTagID=<? echo $_GET['DB_TopTagID'];?>" class="button_01">◎回列表頁
                              </a>
                          </div>
                      </td>
                  </tr>
              </table>

              <table width="752" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                      <td width="5" align="top" valign="top"><img src="images/com_top_L.gif" width="5" height="5" /></td>
                      <td width="742" align="top" valign="top" background="images/com_top.gif"></td>
                      <td width="5" align="top" valign="top"><img src="images/com_top_R.gif" width="5" height="5" /></td>
                  </tr>
                  <tr>
                      <td align="top" valign="top" style="background-image:url(images/com_L.gif); background-repeat:repeat-y;">
                          &nbsp;
                      </td>
                      <td align="top" valign="top">
                          <table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
                              <tr>
                                  <td colspan="2" align="top" valign="top" class="border_02">請注意標<font color="red">*</font>為必填資料</td>
                              </tr>
                              <tr>
                                  <td width="18%" align="top" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 排序<font color="red">*</font></td>
                                  <td width="82%" align="top" valign="top" class="border_02">
                                      <input name="DB_TopSort" value="<? echo $ary['DB_TopSort'];?>" type="text" class="text_12px_01" size="3" maxlength="3" />
                                      <input type="hidden" name="TopSort" value="<? echo $ary['DB_TopSort'];?>" />
                                      <input type="hidden" name="TopID" value="<? echo $ary['DB_TopID'];?>" />
                                      <input type="hidden" name="TopTagID" value="<? echo $ary['DB_TopTagID'];?>" />
                                  </td>
                              </tr>
                              <tr>
                                  <td align="top" valign="top" class="border_02"><img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 選單名稱 <font color="red">*</font></td>
                                  <td align="top" valign="top" class="border_02">
                                      <input name="DB_TopSubject" value="<? echo $ary['DB_TopSubject'];?>" type="text" class="text_12px_01" size="30" />
                                  </td>
                              </tr>
                          </table> 
            
                          <table width="100%" border="0" cellspacing="1" cellpadding="5" class="text_12px_01">
                              <tr>			
                                  <td width="18%" align="top" valign="top" class="border_02">
                                      <img src="images/icon_g.gif" width="5" height="5" align="absmiddle" /> 連結網頁選單功能
                                      <font color="red">&nbsp;</font>
                                  </td>
                                  <td width="82%" align="top" valign="top" class="border_02">
                                      <select name="DB_TopBasis" onChange="change1(this.value);" class="text_12px_01">  
                                          <option value="">請選擇</option>
                                          <option value="1" <? if ($ary['DB_TopBasis'] == "1"){echo "selected";}?>>條列式訊息管理</option>
                                          <option value="2" <? if ($ary['DB_TopBasis'] == "2"){echo "selected";}?>>分頁內容管理</option>
                                          <option value="4" <? if ($ary['DB_TopBasis'] == "4"){echo "selected";}?>>檔案下載管理</option>
                                          <option value="7" <? if ($ary['DB_TopBasis'] == "7"){echo "selected";}?>>好站連結管理</option>
                                          <option value="9" <? if ($ary['DB_TopBasis'] == "9"){echo "selected";}?>>留言板管理</option>
                                          <option value="3" <? if ($ary['DB_TopBasis'] == "3"){echo "selected";}?>>行事曆管理</option>
                                          <option value="8" <? if ($ary['DB_TopBasis'] == "8"){echo "selected";}?>>參訪紀錄</option>
                                      </select>
                                      
                                      <span id="show1">
                                          <?php 
                                          if ($ary['DB_TopBasis'] != "7" && $ary['DB_TopBasis'] != "8"){
                                          ?>
                                          <select name="DB_TopNumID" class="text_12px_01">
                                              <?php
                                              if ($ary['DB_TopBasis'] == "1"){                                       
                                                  $BaSql = "ordi_tags";                                  
                                                  $BaSort = "DB_OrdTagSort";                                   
                                                  $BaID = "DB_OrdTagID";                                  
                                                  $BaName = "DB_OrdTagSubject";                            
                                              }
                                              else if ($ary['DB_TopBasis'] == "2"){
                                                  $BaSql = "article";
                                                  $BaSort = "DB_ArtSort";
                                                  $BaID = "DB_ArtID";
                                                  $BaName = "DB_ArtSubject";	
                                              }
                                else if ($ary['DB_TopBasis'] == "3"){
                                    $BaSql = "calendar_tags";
                                    $BaSort = "DB_CalTagSort";
                                    $BaID = "DB_CalTagID";
                                    $BaName = "DB_CalTagSubject";
                               }
                                else if ($ary['DB_TopBasis'] == "4"){
                                    $BaSql = "download_tags";
                                    $BaSort = "DB_DowTagSort";
                                    $BaID = "DB_DowTagID";
                                    $BaName = "DB_DowTagSubject";
                               }
                                $BaSq_result = mysql_query("SELECT * FROM `".$BaSql."` where 1 ORDER BY ".$BaSort." ASC");
                                while ( $BaSq_ary = mysql_fetch_array($BaSq_result) ){ 
                                ?>
                                <option value="<?php 
                                    echo $BaSq_ary[''.$BaID.''];
                                               ?>" 
                                        <? if ($ary['DB_TopNumID'] == $BaSq_ary[''.$BaID.'']){echo "selected";}
                                        ?>>
                                    <?php echo $BaSq_ary[''.$BaName.''];?>
                                </option>
                                <?php } ?>
                            </select>
                            <? } ?>			  
                                      </span>		
                                  </td>
                              </tr>
                          </table>
                      </td>   
                  </tr>
              </table>
          </form>	
		
          <div align="center" style="padding:5px;margin:5px">        
              <a href="javascript:document.form1.submit();" onClick="return checkinput();" title="修改資料" class="button_01">修改資料</a>
          </div>
		</td>
		<td align="top" valign="top" style="background-image:url(images/com_R.gif); background-repeat:repeat-y;">&nbsp;</td>
    </tr>
	  <tr>
		<td align="top" valign="top"><img src="images/com_bottom_L.gif" width="5" height="5" /></td>
		<td align="top" valign="top" background="images/com_bottom.gif"></td>
		<td align="top" valign="top"><img src="images/com_bottom_R.gif" width="5" height="5" /></td>
	  </tr>
</table>

	
<!--bottom-->
<? 
include_once ("bottom.php");
?>
<iframe width="0" height="0" name="FormFrame"></iframe>
</body>
</html>
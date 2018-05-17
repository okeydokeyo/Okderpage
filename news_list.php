<?php 
session_start();//初始化session,就是開始要始用session 
?>
<html>
    <head>
        <title>桃園市私立脊髓損傷潛能發展中心</title>
        <link href="images/favicon.ico" rel="SHORTCUT ICON">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="indexStyle.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="content.css">

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <header>
        <?php 
        include("top_menu.php");
        chk_IP($_SERVER['REMOTE_ADDR']);
        chk_data($_GET['page'],5);//檢查字元長度後過長退回上一頁
        chk_data($_GET['no'],"5");  //檢查數值是否大於5個字元
        $no=$_GET['no'];
        $arry=SoloSql("ordi_tags"," `DB_OrdTagID`='$no' && `DB_OrdTagAnnounce`='0'");
        $time = date("Y-m-d"); //時間
        $page = (empty($_GET['page']))?1:$_GET['page']; //現在頁面
        //條列式訊息管理查詢
        $sql = "select * from `ordi` where `DB_OrdTagID`='$no' && `DB_OrdAnnounce`='0' && (`DB_OrdStart_Time`<='$time' && `DB_OrdEnd_Time`>='$time' || `DB_OrdPermanent`='1') ORDER BY `DB_OrdTime` DESC";	
        $return = iron_page( $sql, 10, 10, $page, 10 ); //iron分頁程式
        $result = mysql_query($sql) or die("查詢失敗");
        $number = mysql_num_rows($result); //全部資料的總數
        $url = "news_list.php"; //本頁的網址 & 使用的 get變數
        $abri = $arry['DB_OrdTagSubject']; //top標題
        ?>
    </header>
    <body>
        <script language="javascript">
            //換頁Script
            function GoPage(page){
                location.href="<?php echo $url ?>?no=<?php echo $no;?>&page="+page;
            }
        </script>
        <noscript>
            <p>很抱歉，本網頁使用script可是您的瀏覽器並不支援，請改用支援 JavaScript 的瀏覽器，謝謝!</p>  
        </noscript>
        <!--top_end-->
        <tr>
            <td align="left" valign="top">
                <!--left_menu-->
                <div id="ct">
                    <table style="margin-left:10%;"  width="70%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" valign="middle" id="title_01"><h1><?php echo $arry['DB_OrdTagSubject'];?><br><input type="button" id="l" value="新聞中心" 
                            onclick="location.href='news_list.php?no=23'">
                                <input type="button" id="r" value="媒體報導"
                                       onclick="location.href='news_list.php?no=13'"></h1>
                            </td>
                        </tr>
                    </table>
                    <table style="margin-top:1%; margin-left:10%;" width="70%" border="0" cellspacing="0" cellpadding="0" id="margin_01" class="text_12px_01">
                        <caption align="left" class="hidden"><?php echo $arry['DB_OrdTagSubject'];?>列表</caption>
                        <?php
                        $ordi_result = mysql_query("select * from `ordi` where `DB_OrdTagID`='$no' && `DB_OrdAnnounce`='0' && `DB_OrdNewTime`!='0000-00-00'&& (`DB_OrdStart_Time`<='$time' && `DB_OrdEnd_Time`>='$time' || `DB_OrdPermanent`='1')") or die("查詢失敗OrNum");
                        $ordi_num = mysql_num_rows($ordi_result);
                        ?>		
                        <tr>
                            <th width="8%" align="center" class="th2">序號</th>
                            <?php if ($ordi_num <> 0){?> 
                            <th width="12%" align="center" class="th2">見報日期</th>
                            <?php }?>  		  
                            <th width="12%" align="center" class="th2">公告日期</th>
                            <th width="68%" align="center" class="th2-end">標 題</th>
                        </tr>
                        <tr>
                            <td colspan="3" class="h5"></td>
                        </tr>
                        <?php
                        if($return){
                            $i = 0;
                            $c = ($page - 1) * 10;
                            while( $return[$i] ){
                                $c++;
                                if ($return[$i]['DB_OrdBasis'] == "1"){
                                    $newClass = "news_com.php?no=".$return[$i]['DB_OrdID']."&page=$page";
                                    $newName = $return[$i]['DB_OrdSubject'];
                                    $newOpen = "";
                                }
                                else if ($return[$i]['DB_OrdBasis'] == "2"){
				                    $newClass = "download.php?DB_FileTitle=".$return[$i]['DB_OrdName2_1']."&DB_FileName=".$return[$i]['DB_OrdArchive2_1']."";
                                    $newName = "".$return[$i]['DB_OrdName2_1']."(點擊下載)";
                                    $newOpen = "";
                                }
                                else if ($return[$i]['DB_OrdBasis'] == "3"){
                                    $newClass = $return[$i]['DB_OrdUrl3_1'];
                                    $newName = "".$return[$i]['DB_OrdSubject']."(另開新視窗)";
                                    $newOpen = "target='_blank'";
                                }	
                        ?>
                        <tr>
                            <td width="8%" align="center" valign="top" class="border_02"><?php echo $c;?></td>
                            <?php if ($ordi_num <> 0){?> 
                            <td width="12%" align="center" valign="top" class="text_12px_06  border_02">
                                <?php 
                                                      if ($return[$i]['DB_OrdNewTime'] != "0000-00-00"){
                                                          echo $return[$i]['DB_OrdNewTime'];
                                                      }
                                                      else{echo "&nbsp;";}?>
                            </td>
                            <?php } ?>		  
                            <td width="12%" align="center" valign="top" class="text_12px_06  border_02">
                                <?php echo $return[$i]['DB_OrdTime'];?>
                            </td>
                            <td width="68%" align="left" valign="middle" class="border_02">
                                <a href="<?php echo $newClass;?>" class="link_03" title="<?php echo $newName;?>" 
                                   <?php echo $newOpen;?>><?php echo $return[$i]['DB_OrdSubject'];?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="h5"></td>
                        </tr>
                        <?php $i++;
                            }
                        }
                        else{
                        ?>
		<tr>
		  <td colspan="4" align="center" valign="top" class="border_02">目前沒有資料</td>
		  </tr>
		<?php }?>
		<tr>
		  <td colspan="4" class="h5"></td>
		</tr>
	  </table>
	  <br />
		<div style="margin-left:10%;" align="left" style="padding:5px;margin:5px"><img src="images/icon_g.gif" alt="*" width="5" height="5" align="absmiddle" /> <span class="text_12px_04">資料筆數：<?php echo $number;?>　　
		<?php  if ( $return['total_page'] > 1) { ?>		
		頁數：<?php echo $return[ 'now_page' ];?> / <?php echo  $return[ 'total_page' ];?></span>
		　|　
		  <a href="javascript:GoPage(1)" title="最前頁" class="button_05">|＜</a>
		  <a href="javascript:GoPage(<?php echo $return['f']; ?>)" title="上一頁" class="button_05">＜＜</a>
		  <?php for($i=$return[ 'show_start' ];$i<$return['show_start']+$return['show_page'];$i++){ ?>		  
		       <?php if ($i!=$page){?>　<a href="javascript:GoPage(<?php echo $i;?>)" class="link_05" title="第<?php echo $i;?>頁" ><?php }?><?php if ($i==$page){?>　<span class="text_12px_03b"><?php }?><?php echo $i;?><?php if ($i==$page){?></span><?php }?><?php if ($i!=$page){?></a><?php }?>
		  <?php   }   ?>　		  
		  <a href="javascript:GoPage(<?php echo $return['b']; ?>)" title="下一頁" class="button_05">＞＞</a>
		  <a href="javascript:GoPage(<?php echo $return['total_page']; ?>)" title="最後頁" class="button_05">＞|</a>
		<?php   }   ?>			
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
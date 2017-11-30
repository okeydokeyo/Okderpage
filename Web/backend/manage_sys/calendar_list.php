<?
include "cksession.php";
include "../config.php";
include "../function.php";
//chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
//chk_Power("DB_ManP_10"); //檢查是否功能權限,否回首頁


//行事曆標籤管理查詢
$DB_CalTagID = $_GET['DB_CalTagID'];
$ary = SoloSql("calendar_tags","`DB_CalTagID`='$DB_CalTagID'");

if(isset($_GET['show']))  $show=$_GET['show']; 
else $show =  '0' ;
?>

<? 
include_once ("top.php");
?>
<script language="javascript">
<!--

function resubmit(Language){
	location.href='<? echo $url ?>?Language='+Language;
}
-->
</script>

<script language="javascript">
var preImg1 = new Image();
preImg1.src = 'images/ajax1.gif';
var dates=new Array();
var today = new Date();
//年月日初始化 
<? if(isset($_GET['date'])){ 
$date=$_GET['date']; ?>

	tmp='<? echo $_GET['date'] ?>' ;
	var year_index = tmp.substring(0,4);	
	var month_index = tmp.substring(5,7)-1;
<? }else{
$date=date('Y-m'); ?>
	var year_index = <? echo date('Y') ?>;
	var month_index = <? echo ((int)date('m'))-1; ?>;
<? } ?>	 
//前次月
var prev_date;
var next_date;
if(month_index!=0) 
{
if(month_index<10)
prev_date=year_index+'-0'+month_index;
else
prev_date=year_index+'-'+month_index;
}
else prev_date=(eval(year_index)-1)+'-12';
if(month_index!=11) 
{
if((month_index+2)<10)
next_date=year_index+'-0'+(month_index+2);
else
next_date=year_index+'-'+(month_index+2);
}
else next_date=(eval(year_index)+1)+'-01';
//每月中的日期
var day_of_month = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
var month_show = new Array('一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二');
var wday_show = new Array('', '日','一', '二', '三', '四', '五', '六');
 
//檢查年份中的2月
function Header() {
	if(month_index == 1){
		if ((year_index % 400 == 0) || ((year_index % 4 == 0) && (year_index % 100 != 0))) {
			day_of_month[1] = 29;
		}
	}
}
function calendar(){
var dates=new Array(); 
	Header();//改變2月日期
	var now_day = (year_index ==<? echo date('Y') ?> && month_index == <? echo ((int)date('m'))-1; ?>)?true:false;
	firstDay = new Date(year_index,month_index,1);
	startDay = firstDay.getDay()+1;
	$('calendar').innerHTML = "";
	var str= "",str2="";  //<img src="images/icon_x5.gif" width="12" height="12" align="absmiddle" alt="指標圖(行事曆)"/> 行事曆&nbsp;&nbsp;<img src="images/icon_x4.gif" width="12" height="12" align="absmiddle" alt="指標圖(課程)"/> 課程&nbsp;&nbsp;<img src="images/icon_x6.gif" width="12" height="12" align="absmiddle" alt="指標圖(參訪)"/> 參訪&nbsp;&nbsp;<img src="images/icon_x1.gif" width="12" height="12" align="absmiddle" alt="指標圖(所內活動)"/> 所內活動&nbsp;&nbsp;<img src="images/icon_x2.gif" alt="指標圖(學術活動)"  width="12" height="12" align="absmiddle" > 學術活動</td></tr></tbody></table>';//文字圖型解說&nbsp;&nbsp;<img src="images/icon_search.gif"alt="指標圖(會議室申請狀況)"  width="10" height="11" border="0" align="absmiddle" /> 會議室申請狀況&nbsp;&nbsp;<img src="images/icon_x6.gif" alt="指標圖(參訪)" width="12" height="12" align="absmiddle" /> 參訪&nbsp;&nbsp;<img src="images/icon_x1.gif"alt="指標圖(出國)"  width="12" height="12" align="absmiddle" /> 出國
	str +='<table width="96%" border="0" class="calendar_02"><tbody><tr><td valign="center" align="left" width="20%"><img height="11" src="images/arrow_orange_p.gif" alt="指標圖"  width="10" align="absmiddle" /> <a href="<? echo $_SERVER['PHP_SELF']; ?>?DB_CalTagID=<? echo $_GET['DB_CalTagID'];?>&date='+prev_date+'" class="link_01 button">前月</a></td><td valign="center" align="middle" width="60%" class="link_05 button" style="font-size:100%"><div id="y-m" align="center"><strong>'+year_index+'年'+(month_index+1)+'月</strong></div></td><td valign="center" align="right" width="20%"><a href="<? echo $_SERVER['PHP_SELF']; ?>?DB_CalTagID=<? echo $_GET['DB_CalTagID'];?>&date='+next_date+'" class="link_01 button">次月</a> <img height="11" src="images/arrow_orange_n.gif" alt="指標圖"  width="10" align="absmiddle" /></td></tr></tbody></table><br />';// 年月份tile
	str +='<table width="96%" height="30" align="center" border="0"><tbody><tr><td valign="center" align="left">';
	str +='<table cellspacing="0" bordercolordark="#ffffff" cellpadding="3" width="96%" bgcolor="#ffffff" bordercolorlight="#cbcbcb" border="1"><tbody><tr bgcolor="#49a3fc" class="text_12px_05" ><td align="middle" class="h20">日 Sun</td><td align="middle">一 Mon</td><td align="middle">二 Tue</td><td align="middle">三 Wed</td><td align="middle">四 Thu</td><td align="middle">五 Fri</td><td align="middle">六 Sat</td></tr><tr>';
	str2+='<table cellspacing="0" bordercolordark="#ffffff" cellpadding="3" width="96%" align="center" bgcolor="#ffffff" bordercolorlight="#cbcbcb" border="1" class="link_01c"><tbody>';//表2的設定
	var day_count=1,wday_count=1;
	var day_str='',bg='';
	var show = '<? echo $show ?>' ;
	var today_count = 0 ;
	var month=((month_index+1)<10)?'0'+(month_index+1):month_index+1;
	for(i=1;i<startDay+day_of_month[month_index];i++)
	{
		if(i<startDay){
			str+='<td width="14%" align="center" class="link_01c">&nbsp;</td>'; //補表1的空格
		}else{
		if(day_count<10)day_str='0'+day_count;else day_str=day_count
		dates.push(year_index+'-'+month+'-'+day_str);	
			if(now_day && day_count == <? echo date('d'); ?>){ 
			today_count++;
				str+= '<td width="14%" height="50" align="left" valign="top" bgcolor="#DCF87C" onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#DCF87C\';" onfocusOver="this.style.backgroundColor=\'#FFCCBD\';" onfocusOut="this.style.backgroundColor=\'#DCF87C\';">'+(day_count)+'<br><div id="'+year_index+'-'+month+'-'+day_str+'-1"></div></td>';
				str2+='<tr bgColor="#49A3FC"><td width="14%" height="25" align="center" bgcolor="#DCF87C" class="link_01c">'+month+'/'+day_count+' ('+wday_show[wday_count]+')</td><td bgcolor="#F3FDD5" align="left" onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#F3FDD5\';" onfocusOver="this.style.backgroundColor=\'#FFCCBD\';" onfocusOut="this.style.backgroundColor=\'#F3FDD5\';">&nbsp;<span id="'+year_index+'-'+month+'-'+day_str+'-2"></span></td></tr>'; //表2
			}else{ 
			if(today_count!=0)today_count++
				str+= '<td width="14%" height="50" align="left" valign="top"  onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#F9F9F9\';" onfocusOver="this.style.backgroundColor=\'#FFCCBD\';" onfocusOut="this.style.backgroundColor=\'#F9F9F9\';">'+day_count+'<br><div id="'+year_index+'-'+month+'-'+day_str+'-1"></div></td>';
			if(wday_count==1 || wday_count== 7) bg ='#EABB5B'; else bg ='#49A3FC';
				switch(show)
				{
				case '0' :{str2+='<tr bgcolor="#F9F9F9"><td bgcolor="'+bg+'"><div align="center" class="link_01c"><font color="#ffffff">'+month+'/'+day_count+'('+wday_show[wday_count]+')</font></div></td><td onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onfocus="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#F9F9F9\';" onfocus="this.style.backgroundColor=\'#F9F9F9\';" align="left" width="86%">&nbsp;<span id="'+year_index+'-'+month+'-'+day_str+'-2"></span></td></tr>';	break ; }
				case '1' :{str2+='<tr style="display:none" bgcolor="#F9F9F9"><td bgcolor="'+bg+'"><div align="center" class="link_01c"><font color="#ffffff">'+month+'/'+day_count+'('+wday_show[wday_count]+')</font></div></td><td onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onfocus="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#F9F9F9\';" onfocus="this.style.backgroundColor=\'#F9F9F9\';" align="left" width="86%">&nbsp;<span id="'+year_index+'-'+month+'-'+day_str+'-2"></span></td></tr>';break;}
				case '10' :{if(today_count<=10 && today_count!=0)str2+='<tr bgcolor="#F9F9F9"><td bgcolor="'+bg+'"><div align="center" class="link_01c"><font color="#ffffff">'+month+'/'+day_count+'('+wday_show[wday_count]+')</font></div></td><td onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onfocus="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#F9F9F9\';" onfocus="this.style.backgroundColor=\'#F9F9F9\';" align="left" width="86%">&nbsp;<span id="'+year_index+'-'+month+'-'+day_str+'-2"></span></td></tr>';else str2+='<tr style="display:none" bgcolor="#F9F9F9"><td width="19%" bgcolor="'+bg+'"><div align="center"><font color="#ffffff">'+month+'/'+day_count+'('+wday_show[wday_count]+')</font></div></td><td  onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#F9F9F9\';">&nbsp;<span id="'+year_index+'-'+month+'-'+day_str+'-2"></span></td></tr>';  break;}
				} 
			}
		day_count++;
		}
	wday_count++;
	if(i%7 == 0) str+= '</tr><tr bgcolor="#F9F9F9">';
	if(wday_count%8 == 0) wday_count = 1;
		
	}
	str += '</tr></tbody></table>';
	str2 += '</tbody></table>';
	$('calendar').innerHTML = str;
	//$('calendar2').innerHTML = str2;
	
for(i=0;i<dates.length;i++){
 	get_today(dates[i],1) ;
 	//get_today(dates[i],2) ; 
 	}
}	

function redeta(){
    var year=document.from1.year.value;
	var month=document.from1.month.value;
	
	location.href='calendar_list.php?date='+year+'-'+month;
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
		<td align="left" valign="middle" background="images/gray_02.gif" class="text_12px_01"><a href="id_info.php" class="link_01">首頁</a> >> 網頁選單管理 >> 行事曆管理 >> <span class="text_12px_02"><strong><? echo $ary['DB_CalTagSubject'];?></strong></span></td>
		<td align="left" valign="middle"><img src="images/gray_03.gif" width="10" height="20" /></td>
      </tr>
	</table>
	<table width="752" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"></td>
	  </tr>
	  <tr>
	    <td width="5" align="left" valign="top"><img src="images/title_bg01.gif" width="5" height="28" /></td>
		<td width="742" align="left" valign="middle" class="title_bg"><strong><? echo $ary['DB_CalTagSubject'];?></strong></td>
		<td width="5" align="left" valign="top"><img src="images/title_bg03.gif" width="5" height="28" /></td>
	  </tr>
	  <tr>
		<td height="10" colspan="3" align="left" valign="top"><div align="right" style="padding:5px;margin:5px">
		  <!--<span class="text_12px_01"><img src="images/arrow_orange_n.gif" width="10" height="11" align="absmiddle" /> 版本選擇</span>
		  <select name="Language" onChange="resubmit(this.value);"class="text_12px_01">
			<option value="c" <? //if($_GET['Language']=="c"){echo "selected";}?>>中文</option>
			<option value="e" <? //if($_GET['Language']=="e"){echo "selected";}?>>英文</option>
	      </select>-->
		<a href="calendar_calss.php" class="button_04">◎回標籤列表</a>
		<a href="calendar_add.php?DB_CalTagID=<? echo $_GET['DB_CalTagID'];?>" class="button_04">+新增行事曆</a>
		</div>
		</td>
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
		<td align="center" valign="top" class="text_12px_01">
<div id="calendar" align="center"></div>
<br />
<!--<div style="width:95%;" class="calendar_01" align="left">
  <img height="11" src="images/arrow_orange_n.gif" alt="指標圖"  width="10" align="absmiddle" /> <a href="calendar_list.php?date=<? echo $date; ?>&show=0" class="link_01 button">顯示全月份</a> <img height="11" src="images/arrow_orange_n.gif" alt="指標圖" width="10" align="absmiddle" /> <a href="calendar_list.php?date=<? echo $date; ?>&show=1" class="link_01 button">顯示當日</a> <img height="11" src="images/arrow_orange_n.gif" alt="指標圖" width="10" align="absmiddle" /> <a href="calendar_list.php?date=<? echo $date; ?>&show=10" class="link_01 button">顯示10筆資訊</a>
</div><br />
<div id="calendar2" align="center"></div>-->
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
<script language="javascript" src="../ajax.js"></script>
<noscript>
  <p>很抱歉，本網頁使用script可是您的瀏覽器並不支援，請改用支援 JavaScript 的瀏覽器，謝謝!</p>  
</noscript>
<script>
calendar(); 

function get_today(day,i)
{ 
	    var oHttpReq = new createXMLHttpRequest();
  		oHttpReq.onreadystatechange =function()
		{
			if (oHttpReq.readyState != 4)
			 {
			  	  $(day+'-'+i).innerHTML='<div align="center"><img src="images/ajax1.gif" alt="指標圖" width="15" height="15" border="0"></div>';
			 }
			else
			{  
				if (oHttpReq.status == 200) 
				{ 
				if(oHttpReq.responseText!='' || oHttpReq.responseText!='<br>') $(day+'-'+i).innerHTML= oHttpReq.responseText ;
				else $(day+'-'+i).innerHTML='&nbsp;';
				}
		 	}	 
		
		} 
		oHttpReq.open("GET", "calendar_cal_func.php?DB_CalTagID=<? echo $_GET['DB_CalTagID'];?>&act=get_today&date="+day+"&i="+i+"&rand="+rand() ,true );  
		oHttpReq.send(null);
	
}

</script>
</body>
</html>
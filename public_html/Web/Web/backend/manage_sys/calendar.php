<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>日曆</title>

<script language="javascript">

var today = new Date();

//年月日初始化
if (navigator.appName == "Netscape"){
         var ckY = today.getYear()+1900;
	     var year_index = ckY;
		 var month_index = today.getMonth();
}else{
         var ckY = today.getFullYear(); //IE10以前的寫法:getYear   IE10的修正寫法:getFullYear
	     var year_index = ckY;
		 var month_index = today.getMonth();
}
	
//每月中的日期
var day_of_month = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
var month_show = new Array('一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二');
function returnDate(x){
	if(x<10){
		x = '0'+x;
	}
	if(month_index<9){
	    window.opener.document.getElementById("<? echo $_GET[items]; ?>").value = year_index+'-0'+(parseInt(month_index)+1)+'-'+x;
	}else{
	    window.opener.document.getElementById("<? echo $_GET[items]; ?>").value = year_index+'-'+(parseInt(month_index)+1)+'-'+x;
	}
	window.close();
}
//檢查年份中的2月
function Header() {
	if(month_index == 1){
		if ((year_index % 400 == 0) || ((year_index % 4 == 0) && (year_index % 100 != 0))) {
			day_of_month[1] = 29;
		}
	}
}
function calendar(){
	Header();//改變2月日期
	var now_day = (year_index == ckY && month_index == today.getMonth())?true:false;
	firstDay = new Date(year_index,month_index,1);
	startDay = firstDay.getDay()+1;
	if (navigator.appName == "Netscape"){
	    document.getElementById("calendar").innerHTML = "";
	}else{
	    document.all.calendar.innerHTML = "";
	}
	
	var str= "";
	str +='<table width="100%" border="0"><tr><td><table width="100%" border="0" class="text_12px_01"><tr><td align="center" bgcolor="#99CCFF"><select name="year" onChange="javascript:year_index=this.value; calendar();"  class="text_12px_01">';
	for(i=year_index-5;i<parseInt(year_index)+5;i++){
		if(i == year_index){
			str += '<option value="'+i+'" selected>'+i+'</option>';
		}else{
			str += '<option value="'+i+'">'+i+'</option>';
		}
	}
	str += '</select>年</td><td align="center" bgcolor="#99CCFF"><select name="month" onChange="month_index = this.value; calendar();"  class="text_12px_01">';
	for(i=0;i<12;i++){
		if(i == month_index){
			str += '<option value="'+i+'" selected>'+ month_show[i] +'</option>';
		}else{
			str += '<option value="'+i+'">'+ month_show[i] +'</option>';
		}
	}
	str += '</select>月';	
	str += '</td></tr></table>';
	str += '<table width="100%" border="0"><tr bgcolor="#99CCFF"><td align="center" class="text_12px_01"><font color="#0033CC">日</font></td><td align="center" class="text_12px_01"><font color="#0033CC">一</font></td><td align="center" class="text_12px_01"><font color="#0033CC">二</font></td><td align="center" class="text_12px_01"><font color="#0033CC">三</font></td><td align="center" class="text_12px_01"><font color="#0033CC">四</font></td><td align="center" class="text_12px_01"><font color="#0033CC">五</font></td><td align="center" class="text_12px_01"><font color="#0033CC">六</font></td></tr><tr>';
	var day_count=1;
	for(i=1;i<startDay+day_of_month[month_index];i++){
		if(i<startDay){
			str+='<td align="center">&nbsp;</td>';
		}else{
			if(now_day && day_count == today.getDate()){
				str+= '<td align="center" bgcolor="#FFFFCC" onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#FFFFCC\';"><a href="javascript:returnDate('+day_count+');" class="link_01">'+(day_count++)+'</a></td>';
			}else{
				str+= '<td align="center" bgcolor="#EEEEEE" onMouseOver="this.style.backgroundColor=\'#FFCCBD\';" onMouseOut="this.style.backgroundColor=\'#EEEEEE\';"><a href="javascript:returnDate('+day_count+');" class="link_01">'+(day_count++)+'</a></td>';
			}
		}
		if(i%7 == 0){
			str+= '</tr><tr>';
		}
	}
	str += '</tr></table>';
	if (navigator.appName == "Netscape"){
	    document.getElementById("calendar").innerHTML = str;
	}else{
	    document.all.calendar.innerHTML = str;
	}
	
}
</script>

<style type="text/css">
<!--
.text_12px_01 {
	font-family: Arial, sans-serif, 新細明體;
    color: #666666; font-size: 12px;
	letter-spacing: 0px; text-decoration: none;}
	
.link_01 {
	line-height: 150%; font-family: Arial, sans-serif, 新細明體;
	color: #666666; font-size: 12px; letter-spacing: 0px; text-decoration: none;}

.link_01:hover {
	line-height: 150%; font-family: Arial, sans-serif, 新細明體;
    color: #FF9933; font-size: 12px; letter-spacing: 0px; text-decoration: none;}	
-->
</style>
</head>

<body>
<div id="calendar"></div>
<span class="text_12px_01">*請由上方點選日期</span>
<script language="javascript">calendar();</script>

</body>
</html>

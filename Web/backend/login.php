<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>財團法人桃園縣私立脊髓損傷潛能發展中心</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script language="javascript" src="pngfix.js"></script>
<script language="javascript">
<!--
function checkinput(){
	var ErrString = "" ;
	if (document.form1.id.value == ""){ErrString = ErrString + "帳號" + unescape('%0D%0A')}
	if(document.form1.id.value != ""){
		if(document.form1.id.value.length < 4){ErrString = ErrString + "帳號長度必須超過4碼" + unescape('%0D%0A')}
	}
	if (document.form1.passwd.value == ""){ErrString = ErrString + "密碼" + unescape('%0D%0A')}
	if(document.form1.passwd.value != ""){
		if(document.form1.passwd.value.length < 4){ErrString = ErrString + "密碼長度必須超過4碼" + unescape('%0D%0A')}
	}
	
	if (ErrString != "") {
		alert("您有以下欄位未確實填寫：\n\n"+ErrString+"\n請檢查您所填寫的資料。");
	return false;
	}

	return true;
}

-->
</script>

<link href="scsrc2010.css" rel="stylesheet" type="text/css" />
</head>

<body background="images/top_bg02.gif" bgcolor="#ffffff" style="background-repeat: no-repeat; background-position: top center;">
	<table align="center" border="0"  cellpadding="0" cellspacing="0" id="margin_03" class="w650" summary="排版用">
        <tr>
            <td colspan="3" align="left" valign="top">
                <img src="images/login_table_top.png" alt="*" width="700" height="10" />
            </td>
        </tr>
        <tr>
		  <td align="left" valign="middle" background="images/login_table_con.gif" id="padding_03"><br />
		      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
		              <td align="left" valign="middle" id="title_01">後台管理
		                  <div style="width:18%; float:right; font-weight:100;">  
			                 <img src="images/icon_ask_01.gif" alt="*" width="16" height="16" align="middle" /> 
                                <a href="pw_lost.php" title="忘記密碼" class="link_02b">忘記密碼</a>
			             </div>
                    </td>
		          </tr>
	           </table>
		      <br />
                <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0" summary="排版用">
                        <form action="chkadmin.php" method="POST" name="form1" id="form1">		  
                          <tr>
                            <td width="1%"><img src="images/photobg_a1.gif" alt="*" width="9" height="151" /></td>
                            <td width="95%" align="right" background="images/photobg_a2.gif" class="text_12px_01">
                                <div align="left">
                                    <img src="images/icon_g.gif" alt="*" width="5" height="5" align="absmiddle" /> 
                                    <span class="text_12px_04"><strong>使用者登入</strong></span>　
                                |</div>
                                <div align="center" style=" background-color: #f1f1f2;" id="padding_06">
                                     帳號 / ID&nbsp;
                                         <input name="id" type="text" class="text_13px_01"  size="20" />&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                     密碼 / PW&nbsp;
                                    <input name="passwd" type="password" class="text_13px_01" size="20" />
                                </div><br />
                                <a href="javascript:document.form1.submit();" onclick="return checkinput();" onkeypress="return checkinput();" class="link_03">
                                     <img src="images/login.gif" alt="登入" width="69" height="28" border="0" />
                                </a>
                            </td>
                            <td width="4%"><img src="images/photobg_a3.gif" alt="*" width="16" height="151" /></td>
                          </tr>
                        </form>		  
                    </table>
		      <br />
		  </td>
	   </tr>
	   <tr>
            <td colspan="3" align="left" valign="top"><img src="images/login_table_bottom.png" alt="*" width="700" height="10" /></td>
        </tr>
	</table>
<div class="h180 bottom_bg" style="width:100%;"></div>
</body>
</html>

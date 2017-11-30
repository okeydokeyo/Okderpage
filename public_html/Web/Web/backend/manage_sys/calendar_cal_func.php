<?
include "cksession.php";    //檢查是否登入
include "../config.php";  //資料庫連結
include "../function.php";  //功能表
chk_account_id($_SESSION['ManUser']); //檢查帳號是否符合後,否回首頁
chk_Power("DB_ManP_10"); //檢查是否功能權限,否回首頁



if(isset($_GET['act'])){ // ajax
	switch($_GET['act'])
	{
	case 'get_today':
		{
		$i=$_GET['i'];
		$date=$_GET['date'];
		//$Language=$_GET['Language'];
		$sql="select * from `calendar` where `DB_CalTagID`='".$_GET['DB_CalTagID']."' and TO_DAYS(`DB_CalStartTime`) <= TO_DAYS('$date') and TO_DAYS(`DB_CalStartTime`) >= TO_DAYS('$date') order by `DB_CalStartTime` asc;";
		$result = mysql_query($sql) or die('查詢失敗c'.$sql);
		
		
		if(mysql_num_rows($result)==0) die ('');
		//$str= ($i=='1')?'<br>':'';
		while($row=mysql_fetch_array($result))
		{

		
		/*if($row['DB_CalUserName']!=""){
		$DB_CalUserName= " 申請者：".stripslashes($row['DB_CalUserName']) ;  
		}
		$DB_CalStartTime= stripslashes($row['DB_CalStartTime']);  
		$DB_CalEndTime= stripslashes($row['DB_CalEndTime']); */  
		$DB_CalTitle= stripslashes($row['DB_CalTitle']) ;
		$DB_CalCompany= stripslashes($row['DB_CalCompany']) ;
		$DB_CalFacilities= stripslashes($row['DB_CalFacilities']) ;
		
		
		//$content= mb_substr( stripslashes($row['Content']) , 0  , 20 , 'utf-8' ) ;
			if($i=='1'){
				
					/*if($row['DB_AppCondition']==3){//檢查狀態
						$str.= '<a href="calendar_look.php?id_no='.$row['DB_CalID'].'" class="link_01c"><img src="images/icon_search.gif" title="'.$DB_CalTitle.$DB_BoaName." ".$DB_CalStartTime." ～ ".$DB_CalEndTime.$DB_CalUserName.'" width="10" height="11" border="0"></a>&nbsp;';
					}else{
						if($row['DB_AppUserClass']==1){//檢查使用類別*/
							$str.= '<a href="calendar_look.php?DB_CalTagID='.$_GET['DB_CalTagID'].'&id_no='.$row['DB_CalID'].'" title="'.$DB_CalFacilities.'" class="text_12px_01"><span style="color:#0078F0;">'.$DB_CalCompany.'</span></a><br>';
						/*}else if($row['DB_AppUserClass']==2){
							$str.= '<a href="calendar_look.php?id_no='.$row['DB_CalID'].'" class="link_01c"><img src="images/icon_x4.gif" title="'.$DB_CalTitle."【".$DB_BoaName."會議室】 ".$DB_CalStartTime." ～ ".$DB_CalEndTime.$DB_CalUserName.'" width="12" height="12" border="0"></a>&nbsp;';
						}
					}
				}else if($row['DB_AppDetaClass']=="0"){			
					if($row['DB_AppUserClass']==1){
						$str.= '<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" class="link_01c"><img src="images/icon_x5.gif" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" width="12" height="12" border="0"></a>&nbsp;';
					}else if($row['DB_AppUserClass']==2){
						$str.= '<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" class="link_01c"><img src="images/icon_x4.gif" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" width="12" height="12" border="0"></a>&nbsp;';
					}else if($row['DB_AppUserClass']==3){
						$str.= '<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" class="link_01c"><img src="images/icon_x6.gif" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" width="12" height="12" border="0"></a>&nbsp;';
					}else if($row['DB_AppUserClass']==4){
						$str.= '<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" class="link_01c"><img src="images/icon_x1.gif" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" width="12" height="12" border="0"></a>&nbsp;';
					}else if($row['DB_AppUserClass']==5 && $academia_ary['DB_Acacalendar'] == "0"){
						$str.= '<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" class="link_01c"><img src="images/icon_x2.gif" title="'.$DB_CalTitle." ".$DB_CalStartTime.$DB_CalEndTime.'" width="12" height="12" border="0"></a>&nbsp;';
					}
				}*/
			  
			}else{
				/*if($row['DB_AppDetaClass']=="1"){
					if($row['DB_AppCondition']==3){
						$str.= '<img src="images/icon_search.gif" title="指標圖示" width="10" height="11" border="0">&nbsp;<a href="calendar_look.php?id_no='.$row['DB_CalID'].'" title="'.$DB_CalTitle.$DB_BoaName." ".$DB_CalStartTime." ～ ".$DB_CalEndTime.$DB_CalUserName.'" class="link_01c">'.$DB_CalTitle.$DB_BoaName." ".$DB_CalStartTime." ～ ".$DB_CalEndTime.$DB_CalUserName.'</a><br>&nbsp;';
					}else{
						if($row['DB_AppUserClass']==1){*/
							$str.= '<img src="images/icon_x5.gif" title="指標圖示" width="12" height="12" border="0">&nbsp;<a href="calendar_look.php?id_no='.$row['DB_CalID'].'" title="'.$DB_CalTitle." ".$DB_CalStartTime." ～ ".$DB_CalEndTime.'" class="text_12px_01">'.$DB_CalTitle." ".$DB_CalStartTime." ～ ".$DB_CalEndTime.'</a><br>&nbsp;';
						/*}else if($row['DB_AppUserClass']==2){
							$str.= '<img src="images/icon_x4.gif" title="指標圖示" width="12" height="12" border="0">&nbsp;<a href="calendar_look.php?id_no='.$row['DB_CalID'].'" title="'.$DB_CalTitle."【".$DB_BoaName."會議室】 ".$DB_CalStartTime." ～ ".$DB_CalEndTime.$DB_CalUserName.'" class="link_01c">'.$DB_CalTitle."【".$DB_BoaName."會議室】 ".$DB_CalStartTime." ～ ".$DB_CalEndTime.$DB_CalUserName.'</a><br>&nbsp;';
						}
					}
				}else if($row['DB_AppDetaClass']=="0"){
					if($row['DB_AppUserClass']==1){
						$str.= '<img src="images/icon_x5.gif" title="指標圖示" width="12" height="12" border="0">&nbsp;<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" class="link_01c">'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'</a><br>&nbsp;';
					}else if($row['DB_AppUserClass']==2){
						$str.= '<img src="images/icon_x4.gif" title="指標圖示" width="12" height="12" border="0">&nbsp;<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" class="link_01c">'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'</a><br>&nbsp;';
					}else if($row['DB_AppUserClass']==3){
						$str.= '<img src="images/icon_x6.gif" title="指標圖示" width="12" height="12" border="0">&nbsp;<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" class="link_01c">'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'</a><br>&nbsp;';
					}else if($row['DB_AppUserClass']==4){
						$str.= '<img src="images/icon_x1.gif" title="指標圖示" width="12" height="12" border="0">&nbsp;<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" title="'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'" class="link_01c">'.$DB_CalTitle.$DB_BoaName2." ".$DB_CalStartTime." ～ ".$DB_CalEndTime2.$DB_CalUserName.'</a><br>&nbsp;';
					}else if($row['DB_AppUserClass']==5 && $academia_ary['DB_Acacalendar'] == "0"){
						$str.= '<img src="images/icon_x2.gif" title="指標圖示" width="12" height="12" border="0">&nbsp;<a href="internal_06_calender_look.php?id='.$row['DB_CalID'].'" title="'.$DB_CalTitle." ".$DB_CalStartTime.$DB_CalEndTime.'" class="link_01c">'.$DB_CalTitle." ".$DB_CalStartTime.$DB_CalEndTime.'</a><br>&nbsp;';
					}
				}*/
			}
			
		}
		if($i=='2'){$str=substr($str,0,strlen($str)-10);}
		echo $str;
		break;
		}
	case 'del_by_id':
		{
		$sql="update calendar set IsDel=1 where Id = '".$_GET['id']."'; ";
		mysql_query($sql) or die('刪除失敗'.$sql);
		exit ;
		break;
		}	
	}
}
?>
<?
function SHOWJAVA($MSG,$URL){
	echo "<script>alert('$MSG'); location.href='$URL';</script>";
}
function CK_SESSION($ckMain){
	echo "<script>location.href='home.php';</script>";
}
function CK_SESSION_1($ckMain){
	echo "<script>location.href='$ckMain';</script>";
}
function SHOWJAVA_BACK($MSG){
	echo "<script>alert('$MSG'); history.go(-1);</script>";
}
function LINK_OPEN($url){
	echo "<script>window.open('$url')</script>";
}
function SHOWTEST($MSG){
	echo "<script>alert('$MSG');</script>";
}
function parent_url_msg($msg,$url){ //使用iframe時alert訊息並跳頁
	echo '<script> alert("'.$msg.'"); parent.location.href="'.$url.'"; </script>';
}

/****************************************
功能：處理分頁的函式 ex:google

輸入：
$sql	完整的sql語法
$item 	ㄧ頁顯示幾項
$move 	快速往前後移動幾頁
$page 	現在要顯示第幾頁
$show	顯示幾頁可以點選

輸出：
false => 搜尋到 0 筆資料

sql語法 => $return['sql']
總共有幾頁 => $return[ 'total_page' ]
總共有幾筆資料 => $return[ 'total_num' ]
現在要顯示第幾頁 => $return[ 'now_page' ]
本分頁顯示的內容 => $return[ $i ][]
顯示幾頁可以點選 => $return[ 'show_page' ]
起始點選頁 => $return[ 'show_start' ]
前 $move 頁 => $return['front']
後 $move 頁 => $return[ 'back' ]
前一頁 => $return[ 'b' ];
後一頁 => $return[ 'f' ];

用法：ex:
$sql = "select from `user` where `age` > 19 ";
$MyPage = page( $sql, 10, 5, 1, 5 );
****************************************/
function iron_page( $sql, $item, $move, $page, $show ){		
	// 總共有幾頁 => $return[ 'total_page' ]
	$result = mysql_query( $sql );
	$num = mysql_num_rows( $result );
	if( $num < 1 ){
		return false; // 表示沒搜尋到任何一筆資料
		}
	$return[ 'total_num' ] = $num;										
  	$return[ 'total_page' ] = floor( ($num-1) / $item )+1;
	
	// sql
	$return[ 'sql' ] = $sql;
	
	// 現在要顯示第幾頁 => $return[ 'now_page' ]
	if( $page < 1 )
		$page = 1;
	if( $page > $return['total_page'] )
		$page = $return['total_page'];
	$return[ 'now_page' ] = $page;

	// 本分頁顯示的內容 => $return[ $i ]
  	$new_sql = $sql." limit ".(($page-1)*$item).", ".$item;	// 加入分頁處理後的新sql語法 
	$new_result = mysql_query( $new_sql )  ;
	$new_num = mysql_num_rows( $new_result );
	for( $i = 0; $i < $new_num; $i ++ ){
		$return[ $i ] = mysql_fetch_array( $new_result );
		}		
	
	//$return[ 'show_start' ] = floor(($page-1)/$show)*$show+1;	// 起始點選頁
	
	// 起始點選頁
	if(  $return['total_page'] >= $show ){	// 可點選頁數 大於 預設點選頁數		
	
		$half = floor($show/2);	// 理論上,現在觀看第幾頁 到 起始點選頁 之差(距離)
	
		if( $page - $half < 1 )	// 理論起始點選頁值 < 0 之例外 => 起始點選頁 = 1
			$return['show_start'] = 1;	
		else if( $page > $return['total_page'] - $half )	// 理論起始點選頁值+差值>最大頁數 => 起始點選頁 = 最大頁數-可點選頁數 
			$return['show_start'] = $return['total_page'] - $show+1;
		else			
			$return['show_start'] = $page - $half;	// 無例外, 起始點選頁
		}
	else{	// 可點選頁數 不足 預設點選頁數		
		$return['show_start'] = 1;
    }		
	
	// 顯示幾頁可以點選
	if( $return['total_page'] - $return['show_start'] >= $show )	
		$return['show_page'] = $show;	
	else
		$return['show_page'] = $return['total_page'] - $return['show_start']+1;
	
	
	// 前 $move 頁 => $return['front']
	if( $page - $move < 1 )
		$return['front'] = 1;
	else
		$return['front'] = $page - $move;
	
	// 後 $move 頁 => $return[ 'back' ]
	if( $page + $move > $return['total_page'] )
		$return[ 'back' ] = $return['total_page'];
	else
		$return[ 'back' ] = $page + $move; 
	
	// 前 1頁 => $return['f']
	if( $page - 1 < 1 )
		$return['f'] = 1;
	else
		$return['f'] = $page - 1;
	
	// 後 1頁 => $return[ 'b' ]
	if( $page + 1 > $return['total_page'] )
		$return[ 'b' ] = $return['total_page'];
	else
		$return[ 'b' ] = $page + 1;
	
	return $return;
	
	}

/****************************************
功能：查詢資料

$LookSQL：查詢的資料表
$Sql：查詢方試

總比數：$arry['numrows']
*****************************************/
function SoloSql($LookSQL,$Sql){

	$LookSql = "select * from `".$LookSQL."` where ".$Sql;
	$result = mysql_query($LookSql)or dir("查詢失敗");
	$arry = mysql_fetch_array($result);//資料的陣列
	$arry['numrows'] = mysql_num_rows($result); //資料的總數
	
	return $arry;
	
}

/****************************************
功能：查詢迴圈多筆資料

$LookSQL：查詢的資料表
$Sql：查詢方試

總比數：$return['numrows']
*****************************************/

function SoloSql2($LookSQL,$Sql){

	$LookSql = "select * from `".$LookSQL."` where ".$Sql;
	$result = mysql_query($LookSql)or dir("查詢失敗");
	$return['numrows'] = mysql_num_rows($result); //資料的總數
	for( $i = 0; $i < $return['numrows']; $i ++ ){
	$return[ $i ] = mysql_fetch_array( $result );	
	}		
		
	return $return;
}

/******************************************
功能：新增資料

$add_sql：新增資料表
$Url：回傳網址
$msg：新增跳出的文字
$UpStr：欄位
$UpStr2：存入的資料
******************************************/
function AddSql($add_sql,$Url,$msg,$UpStr,$UpStr2){
	$AddSQL = "INSERT INTO `".$add_sql."` (".$UpStr.") VALUES (".$UpStr2.")";
	mysql_query($AddSQL) or die("新增失敗!");
	$New_ID=mysql_insert_id();

	if($Url!=""){
		parent_url_msg($msg,$Url);
	}
	
return $New_ID;
}

/******************************************
功能：資料修改

$Edit_sql：修改資料表
$dataID：修改資料主鍵
$SqlID：對應資料表名
$Url=回傳網址
$msg：新增跳出的文字
$UpStr：要更新的欄位及資料
******************************************/
function EditSql($Edit_sql,$dataID,$SqlID,$Url,$msg,$UpStr){
	$UpSQL="UPDATE `".$Edit_sql."` SET ".$UpStr." WHERE `".$SqlID."`='".$dataID."' ";
	mysql_query($UpSQL) or die("更新失敗!");

	if($Url!=""){
		parent_url_msg($msg,$Url);
	}
}

/******************************************
功能：資料刪除

$Del_sql=刪除資料表
$dataID=刪除資料主鍵
$SqlID=對應資料庫名
$Url=回傳網址
******************************************/
function DelSql($Del_sql,$dataID,$SqlID,$Url){

	$DelSQL = "DELETE FROM `".$Del_sql."` WHERE `".$SqlID."`='".$dataID."'";
	mysql_query($DelSQL);
	
	SHOWJAVA("刪除成功！！",$Url);

}

function DelSql2($Del_sql1,$Del_sql2,$Del_sql3,$SqlID1,$SqlID2,$SqlID3,$dataID,$Url){
    
    if ($Del_sql1 != "" && $SqlID1 != "") { 
	    mysql_query("DELETE FROM `".$Del_sql1."` WHERE `".$SqlID1."`='".$dataID."'");
	}
    if ($Del_sql2 != "" && $SqlID2 != "") {
        mysql_query("DELETE FROM `".$Del_sql2."` WHERE `".$SqlID2."`='".$dataID."'");
	}
    if ($Del_sql3 != "" && $SqlID3 != "") {
        mysql_query("DELETE FROM `".$Del_sql3."` WHERE `".$SqlID3."`='".$dataID."'");
	}

	SHOWJAVA("刪除成功！！",$Url);

}

//************************************************************
//功能：排序
//
//新增
//$DataName：資料表名
//$Sort：排序數
//$Order：排序名額
//$Condition：其他查詢方試
//----------------------------------------------------------
//修改
//$DataName：資料表名
//$SortEdit：修改的排序數
//$Order_no：排序名額
//$SortOrigin：原排序數
//$Condition：其他查詢方試
//----------------------------------------------------------
//刪除
//$DataName：資料表名
//$SortDel：刪除的排序數
//$Order：排序名額
//$Condition：其他查詢方試
//************************************************************
//新增時用
function ChangeSortAdd($DataName,$Sort,$Order,$Condition){
	mysql_query("update `".$DataName."` set `".$Order."`=`".$Order."`+1 where `".$Order."`>='".$Sort."'".$Condition."")or die("修改".$DataName."排序失敗!!");
}

//修改時用
function ChangeSortEdit($DataName,$SortEdit,$Order_no,$SortOrigin,$Condition){
   mysql_query("update `".$DataName."` set `".$Order_no."`=".$Order_no."-1 where `".$Order_no."`>'".$SortOrigin."'".$Condition."") or die("修改".$DataName."排序失敗(1)!!");
   mysql_query("update `".$DataName."` set `".$Order_no."`=".$Order_no."+1 where `".$Order_no."`>='".$SortEdit."'".$Condition."") or die("修改".$DataName."排序失敗(2)!!");
}

//刪除時用
function ChangeSortDel($DataName,$SortDel,$Order,$Condition){
   mysql_query("update `".$DataName."` set `".$Order."`=".$Order."-1 where `".$Order."`>'".$SortDel."'".$Condition."") or die("刪除".$DataName."排序失敗!!");
}

/**************************************************************

輸入：
$Date：日期   ex：2005-12-15
$State：要輸出的方式   ex：ymd,md
輸出：
2005年12月15日
***************************************************************/
function FormatDate($Date,$State){	
	 $Time=split("-",$Date,5);//以正規表達式將字串切開
	 
	 if (($Time[0]-1911) > 99) {    //補零
	     $Year = ($Time[0]-1911);
	 }else{
	     $Year = "0".($Time[0]-1911);
	 }
	 
	 $Year2 = ($Time[0]-1911);
	 if ($Time[1] >= "10") {
	        $Time2_1 = $Time[1];
	 }else{
	        $Time2_1 = substr($Time[1], 1);
	 }
	 if ($Time[2] >= "10") {
			$Time2_2 = $Time[2];
	 }else{
			$Time2_2 = substr($Time[2], 1);
	 }
	  
	  
	 switch($State){
		 case 'ymd':return $Year."/".$Time[1]."/".$Time[2];break;
		 case 'ymd2':return $Year2.".".$Time2_1.".".$Time2_2;break;
		 case 'ymd3':return ($Time[0]-1911)."/".$Time[1]."/".$Time[2];break;
		 case 'ymd4':return $Time[0].".".$Time2_1.".".$Time2_2;break;
		 case 'ymd5':return ($Time[0])."/".$Time[1]."/".$Time[2];break;
		 case 'md':return $Time[1]."/".$Time[2]."/";break;
		 case '-':return $Time[1]."-".$Time[2];break;
	 }
}
/****************************************************
功能：不足$charnum位數的數字上0
輸入：數字(ex:3)
輸出：數字(ex:003)
****************************************************/
function iron_give_zero( $charnum ,$number ){
	return ($charnum>strlen($number))?sprintf( '%0'.$charnum.'d', $number ):$number;
	}
	

/****************************************************
功能：將數字(錢)每三位加入逗號 ex 15000 => 15,000
輸入：數字(錢) 	$money
輸出：字串		$return
****************************************************/
function money_mark( $money ){
	// 不足3位 => 不用加逗號, 直接回傳
	if( strlen($money) < 4 )
		return $money;	
	
	// 加逗號的迴圈
	while( strlen($money) > 3 ){
		$return = ','.substr($money,-3).$return;
		$money = substr($money,0,strlen($money)-3);
		}
	$return = $money.$return;
	return $return;
	}
	
	
	
/**************************************************************

輸入：
$ckCFile：檔案類型
$SeName：上傳的欄位名稱
$WS：上傳設定的照片寬或檔案大小
$CS：類型即照片寬(1)或檔案大小(2)
輸出：
不是設定的檔案則回傳1
***************************************************************/

function FiTy_Num($ckCFile,$SeName){

        $ckFile = explode(",","".$ckCFile."");
		$show = $_FILES[''.$SeName.'']['name'];
		$cktype = strtolower(substr(strrchr($show, "."), 1));
		//辨別檔案類型
	    if( !in_array($cktype, $ckFile) && !empty($show)){      				   
	          $ckTNum = 1;
		}
		
		return $ckTNum;
}	
	
function FiSy_Num($SeName,$WS,$CS){

		$imginfo = getimagesize($_FILES[''.$SeName.'']['tmp_name']);  //取得原始圖資訊 
		$fSize = $_FILES[''.$SeName.'']['size'];                      //取得圖片大小
		
		if ($CS ==  "1"){
		     $ckMS = $imginfo[0];
		}else if ($CS ==  "2"){
		     $ckMS = $fSize;
		}
		
		//辨別圖片寬及檔案大小
	    if( $ckMS > $WS ){      				   
	          $ckFSNum = 1;
		}
		
		return $ckFSNum;
}		
	
	
/****************************************************
功能：上傳檔案
限制：
	上傳之資料夾權限需為777
	送出表單需要格式<form enctype='multipart/form-data' ... >
輸入：
	$file_var			表單中input type='file'的物件的name屬性值	ex: 'myfile'
	$new_file_name		欲新命名的變數名(不加檔案型態) ex: 'photo'
	$old_file_name		欲蓋過的舊檔案(需加檔案型態)(可為空字串) ex: 'old.jpg'
	$upload_dest		欲上傳之資料夾(權限需777)(結尾沒有/) ex: '.'   ex: './images'
	$accepted_file_type 允許的檔案類型(小寫以,區隔)(可為空字串) ex: 'gif,jpg,jpeg'
	$max_size 			允許上傳的最大容量(數字, 單位為bit) ex: 32000000
輸出：
	$return['upload']	true >> 上傳成功 ; false >> 上傳失敗
	
	若上傳成功 >>
	$return['old_file_name']    原檔案名稱 
	$return['new_file_type']	新檔案檔案型態		ex: 'jpg'
	$return['new_file_name'] 	新檔案名(不含檔案型態)	ex: 'photo'
	$return['new_file']			新檔案名(含檔案型態)	ex: 'photo.jpg'
	
	若上傳失敗 >>
	$return['error']	上傳失敗原因 ex: 不被接受的檔案類型
****************************************************/
function iron_upload( $file_var, $new_file_name, $old_file_name, $upload_dest, $accepted_file_type, $max_size ){
	
	//存儲允許的檔案
	$type_name=$accepted_file_type;
	
	// 解決版本$_FILE變數問題
	if ( phpversion() > "4.0.6" ){
		$HTTP_POST_FILES = &$_FILES;
		}
	
	// 處理可接受檔案類型
	if( strlen( $accepted_file_type ) > 0 ){
		$accepted_file_type = @explode( ",", $accepted_file_type );
		} 
	else{
		$accepted_file_type = array();
		}
	
	// 捉 FILE 變數
	@$file = $HTTP_POST_FILES[ $file_var ];
	
	// 判斷是上傳的檔案且上傳成功
	if( is_uploaded_file ($file['tmp_name'] ) && $HTTP_POST_FILES[$file_var]['error'] == 0){
		$error = '沒有錯誤';	// 若錯誤時要回報的訊息
		
		// 判斷有無超過最大容量	
		if( $file['size'] > $max_size && $max_size > 0){
			$error = "檔案容量需為：『".$max_size."』以下！！";
			SHOWTEST($error);
			exit;
			}
		
		// 確認檔案類型是否可被接受
		$new_file_type = explode( ".", $file['name'] );
		$new_file_type = strtolower( $new_file_type[count($new_file_type)-1] );
		if( ! in_array( $new_file_type, $accepted_file_type ) && count( $accepted_file_type ) > 0){
			$error = "檔案類型需為：『".$type_name."』！！";
			SHOWTEST($error);
			exit;
			}
		
		// 判斷是否為正確的目的檔案夾路徑
		if( ! is_dir( $upload_dest ) && is_writable( $upload_dest ) ){
			$error = "目的檔案夾路徑錯誤";
			SHOWTEST($error);
			exit;
			}
		
		// 如果目前還沒有錯誤發生
		if( $error == '' ){
			// 欲上傳的路徑
			$new_file_path = $upload_dest.'/'.$new_file_name.'.'.$new_file_type;			
			
			// 備份原始檔案
			if( $old_file_name != '' ){
				@rename( $upload_dest.'/'.$old_file_name, $upload_dest.'/'.'iron_temp.tmp' );
				$old_file_backup = 'success';
				}
			
            if($file['tmp_name'] == ''){
                $filevalue = "檔案為空值";
            }
            else{
                $filevalue = "檔案不為空值";
            }
            
			// 複製暫存檔到上傳路徑
			if( @copy( $file['tmp_name'], $new_file_path ) ){	// 複製成功
				// 刪掉暫存檔
				if( $old_file_backup == 'success' ){
					@unlink($upload_dest.'/'.'iron_temp.tmp');
					}
				$return['old_file_name'] = $file['name'];
				$return['new_file_type'] = $new_file_type; 
				$return['new_file_name'] = $new_file_name;
				$return['new_file'] = $new_file_name.'.'.$new_file_type;
				$return['upload'] = true;
                $return['error'] = '沒有錯誤';
				return $return;
				}
			else{	// 複製失敗
				// 回覆暫存檔
				if( $old_file_backup == 'success' ){
					@rename( $upload_dest.'/'.'iron_temp.tmp', $upload_dest.'/'.$old_file_name );	
                }
				$return['upload'] = false;
				$return['error'] = '複製檔案失敗';
                $return['file[tmp_name]'] = $filevalue;
				return $return;
				}					
			}
		else{
			$return['upload'] = false;
			$return['error'] = $error;
			return $return;
			}		
		}	
	}
	
	
/****************************************************
功能：圖片縮圖功能2
限制：
	上傳之資料夾權限需為777
	送出表單需要格式<form enctype='multipart/form-data' ... >
輸入：
	$file_var			表單中input type='file'的物件的name屬性值	ex: 'myfile'
	$new_file_name		新的圖檔名稱
	$Bload_dir          縮圖的路徑(大)
	$Sload_dir          縮圖的路徑(小)
	$Bwh 			    設定縮圖比例(大)
	$Swh 			    設定縮圖比例(小)
輸出：
	
	若上傳成功 >>
	$return['old_file_name']    原檔案名稱 
	$return['new_file']	        新的圖檔名稱		ex: 123456.jpg
	
****************************************************/
function upload_photo( $file_var, $new_file_name, $Bload_dir, $Sload_dir, $Bwh, $Swh){
		
	// 解決版本$_FILE變數問題
	if ( phpversion() > "4.0.6" ){
		$HTTP_POST_FILES = &$_FILES;
	}
	
	// 捉 FILE 變數
	@$file = $HTTP_POST_FILES[$file_var];	
	$check_type = explode( ".", $file['name'] );                    //解析圖檔
	$fileType = strtolower( $check_type[count($check_type)-1] );    //計算鍵名及轉換小寫
	
	$imginfo = getimagesize($file['tmp_name']);         //取得原始圖資訊
    $Bdest = $Bload_dir.$new_file_name.".".$fileType;   //上傳的完整路徑(大)
	$Sdest = $Sload_dir.$new_file_name.".".$fileType;   //上傳的完整路徑(小)
	
	if ($Bload_dir != ""){
	    $Bfd =opendir($Bload_dir)or die("檔案夾開啟失敗B");
	}
	if ($Sload_dir != ""){
	    $Sfd =opendir($Sload_dir)or die("檔案夾開啟失敗S");
	}
	
	//辨別圖片橫直式
	if ($imginfo[0] > $imginfo[1]){
		$ckfMe = $imginfo[1]; 
		$ckfDe = $imginfo[0];
	}else{
		$ckfMe = $imginfo[0]; 
		$ckfDe = $imginfo[1];			
	}
	
	$pron = $ckfMe/$ckfDe; //計算圖片比例
	
	//計算要縮的橫式高及直式寬
	if ($Bwh != ""){
	   $ckBH = round($ckfMe-(($ckfDe-$Bwh)*$pron));
	}
    if ($Swh != ""){
       $ckSH = round($ckfMe-(($ckfDe-$Swh)*$pron));
	}
	
	//辨別橫直式縮圖比例
    if ($imginfo[0] < $imginfo[1]){
	
	      //辨別直式高度要與橫式相同(大)
		  if ($Bwh == "850"){
			  $ckD = 638;
		  }else if ($Bwh == "750"){
			  $ckD = 563;
		  }else if ($Bwh == "640"){
			  $ckD = 480;
		  }else if ($Bwh == "600"){
			  $ckD = 450;
		  }
		  
		  //辨別直式高度要與橫式相同(小)
		  if ($Swh == "150"){
			  $cksD = 113;
		  }else if ($Swh == "142"){
			  $cksD = 107;
		  }else if ($Swh == "130"){
			  $cksD = 98;
		  }else if ($Swh == "100"){
			  $cksD = 75;
		  }
  
          $cbHG = round($ckBH-(($Bwh-$ckD)*$pron));   //再計算直式的寬度(大)
		  $csHG = round($ckSH-(($Swh-$cksD)*$pron));  //再計算直式的寬度(小)
	  
	      $Btw = $cbHG;  //寬(大)
	      $Bth = $ckD;   //高(大)
	      $Stw = $csHG;  //寬(小)
	      $Sth = $cksD;	 //高(小)		  		  
	}else{
	      $Btw = $Bwh;   //寬(大)
	      $Bth = $ckBH;  //高(大)	
	      $Stw = $Swh;   //寬(小)
	      $Sth = $ckSH;  //高(小)		  
	}
	
	//判斷圖片是否超過設定的大小
	if( /*$imginfo[0] > $Btw &&*/ $Bwh != ""){
	            //讀入原始圖 imagecreatefromjpeg():讀jpg圖檔 window系統需像素在2510x1883,imagecreatefrompng():讀png圖檔 window系統需像素在2030x1523之內,imagecreatefromgif():讀gif圖檔 window系統需像素在2510x1883之內
				if ( strtolower($fileType) == "jpg" || strtolower($fileType) == "jpeg"){
					  $orgimg = imagecreatefromjpeg($file['tmp_name']); 
				}else if (strtolower($fileType) == "gif"){
					  $orgimg = imagecreatefromgif($file['tmp_name']); 
				}else if (strtolower($fileType) == "png"){
					  $orgimg = imagecreatefrompng($file['tmp_name']); 
				}
				
				// 建立縮圖
			    $thumb = imagecreatetruecolor($Btw,$Bth);
				// 開始縮圖
				imagecopyresampled($thumb, $orgimg, 0, 0, 0, 0, $Btw, $Bth, $imginfo[0], $imginfo[1]);
				
				// 儲存縮圖到指定 load_file 目錄,imagepng():輸出png圖示 ; imagegif():輸出gif圖示  ;  imagejpeg():輸出jpg圖示
				if ( strtolower($fileType) == "jpg" || strtolower($fileType) == "jpeg"){
					  imagejpeg($thumb, $Bdest); 
				}else if (strtolower($fileType) == "gif"){
					  imagegif($thumb, $Bdest); 
				}else if (strtolower($fileType) == "png"){
					  imagepng($thumb, $Bdest); 
				}
				
				imagedestroy($orgimg); //釋放任何和圖形 $orgimg關聯的記憶體
				imagedestroy($thumb);  //釋放任何和圖形 $thumb關聯所佔用儲存空間的記憶體
	}else{
	            @copy($file['tmp_name'] , $Bdest);
	}
	
	//辨別是否設定縮圖最小的比例(縮最小的圖)
	if( $Swh != ""){
	            
	            //讀入原始圖 imagecreatefromjpeg():讀jpg圖檔 window系統需像素在2510x1883,imagecreatefrompng():讀png圖檔 window系統需像素在2030x1523之內,imagecreatefromgif():讀gif圖檔 window系統需像素在2510x1883之內
				if ( strtolower($fileType) == "jpg" || strtolower($fileType) == "jpeg"){
					  $orgimg = imagecreatefromjpeg($file['tmp_name']); 
				}else if (strtolower($fileType) == "gif"){
					  $orgimg = imagecreatefromgif($file['tmp_name']); 
				}else if (strtolower($fileType) == "png"){
					  $orgimg = imagecreatefrompng($file['tmp_name']); 
				}
				
				// 建立縮圖
			    $thumb = imagecreatetruecolor($Stw,$Sth);
				// 開始縮圖
				imagecopyresampled($thumb, $orgimg, 0, 0, 0, 0, $Stw, $Sth, $imginfo[0], $imginfo[1]);
				
				// 儲存縮圖到指定 load_file 目錄,imagepng():輸出png圖示 ; imagegif():輸出gif圖示  ;  imagejpeg():輸出jpg圖示
				if ( strtolower($fileType) == "jpg" || strtolower($fileType) == "jpeg"){
					  imagejpeg($thumb, $Sdest); 
				}else if (strtolower($fileType) == "gif"){
					  imagegif($thumb, $Sdest); 
				}else if (strtolower($fileType) == "png"){
					  imagepng($thumb, $Sdest); 
				}
				
				imagedestroy($orgimg); //釋放任何和圖形 $orgimg關聯所佔用儲存空間的記憶體
				imagedestroy($thumb);  //釋放任何和圖形 $thumb關聯所佔用儲存空間的記憶體
	}
	
	$return['old_file_name'] = $file['name'];
	$return['new_file'] = $new_file_name.".".$fileType;
    return $return;
}			



	
/**************************************************************
輸入：
$chapter：章   ex：1
輸出：
第一章
***************************************************************/
function FormatChapter($chapter){
	  switch($chapter){
		case 1 ;$SChapter="第一章";break;
		case 2 ;$SChapter="第二章";break;
		case 3 ;$SChapter="第三章";break;
		case 4 ;$SChapter="第四章";break;
		case 5 ;$SChapter="第五章";break;
		case 6 ;$SChapter="第六章";break;
		case 7 ;$SChapter="第七章";break;
		case 8 ;$SChapter="第八章";break;
		case 9 ;$SChapter="第九章";break;
		case 10 ;$SChapter="第十章";break;
		case 11 ;$SChapter="第十一章";break;
		case 12 ;$SChapter="第十二章";break;
		case 13 ;$SChapter="第十三章";break;
		case 14 ;$SChapter="第十四章";break;
		case 15 ;$SChapter="第十五章";break;
		case 16 ;$SChapter="第十六章";break;
		case 17 ;$SChapter="第十七章";break;
		case 18 ;$SChapter="第十八章";break;
		case 19 ;$SChapter="第十九章";break;
		case 20 ;$SChapter="第二十章";break;
	  }
	  return $SChapter;
}
/******************************************
功能：新增使用者資訊

$add_sql：新增資料表
$UpStr：欄位
$UpStr2：存入的資料
******************************************/
function Recording_Add($add_sql,$UpStr,$UpStr2){
	$Recording_Add = "INSERT INTO `".$add_sql."` (".$UpStr.") VALUES (".$UpStr2.")";
	mysql_query($Recording_Add) or die("新增失敗!");
}

/**************************************************************

輸入：
$ChkKey：傳送的質
輸出：
檢查資料過濾後的總數，如有檢查字眼，回上一頁。
***************************************************************/
function chk_all($ChkKey){

$ChkKeyNum = $ChkKey;

if(substr_count($ChkKeyNum,"'") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}
if(substr_count($ChkKeyNum,"%") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}
if(substr_count($ChkKeyNum,"./") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}
if(substr_count($ChkKeyNum,"/passwd") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"/etc") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"/cat") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"printf(") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"md5(") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"exit;") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"Cookie") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"cookie") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"alert(") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,":injected") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"#") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"script") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"'='") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"\"") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"\'") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"'>") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"/some_inexistent_file_with_long_name") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"Some") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"some") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"alert(") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"+OR") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"+or") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"('") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"')") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"['") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"']") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"}") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"{") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"^") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"`") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"*") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"`@") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKeyNum,"+") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKey,">") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

if(substr_count($ChkKey,"<") <> 0){
	echo '<script>history.go(-1);</script>';
	exit;
}

return $ChkKeyNum;
}

/**************************************************************

輸入：
$ChkD：傳送的質
$ChkN：字元長度
輸出：
檢查字元長度後過長退回上一頁
檢查字元是否為數值，如不是退回上一頁
***************************************************************/

function chk_data($ChkD,$ChkN){
	
	if($ChkD!=""){
		if(ereg("^[0-9]+$",$ChkD)){ //檢查是否是數值 ereg_ ...
			if(strlen($ChkD) > $ChkN){
				echo '<script>history.go(-1);</script>';
				exit;
			}
			chk_all($ChkD);
		}else {
			echo '<script>history.go(-1);</script>';
			exit;
		}
	}
}

/**************************************************************

輸入：
$Account_ID：傳送的質
輸出：
檢查帳號是否符合後,否回首頁
***************************************************************/

function chk_account_id($Account_ID){

$Manager_SQL = "select * from `manager` where `DB_ManUser`='$Account_ID'";
$Manager_result = mysql_query($Manager_SQL);
$Manager_row = mysql_fetch_array($Manager_result);
$Manager_num = mysql_num_rows($Manager_result); //全部資料的總數


if($Manager_num==0){
echo "<script>location.href='../../index.php';</script>";
exit;
}
}

/**************************************************************

輸入：
$ManP：傳送的質
輸出：
檢查帳號是否有此權限,否回首頁
***************************************************************/

function chk_Power($ManP){
    
   $Manager_result = mysql_query("select * from `manager` where `DB_ManUser`='".$_SESSION['ManUser']."' && `$ManP`='1'");
   $Manager_num = mysql_num_rows($Manager_result);

   if($Manager_num == "0"){
      echo "<script>location.href='../../index.php';</script>";
      exit;
   }
}


/**************************************************************

輸入：
$ChkD：傳送的質
$ChkN：字元長度
輸出：
檢查字元長度後過長退回上一頁
檢查字元是否為數值，如不是退回上一頁
***************************************************************/
function chk_IP($ChkIP){
if($ChkIP == "210.69.35.10"){
echo "<script>location.href='id_info.php';</script>";
exit;
}
}
/**************************************************************/
function change_size($size){

$size_1=ereg_replace("size=\"1\"","class=\"size_1\"",$size);
$size_1=ereg_replace("size=\"2\"","class=\"size_2\"",$size_1);
$size_1=ereg_replace("size=\"3\"","class=\"size_3\"",$size_1);
$size_1=ereg_replace("size=\"4\"","class=\"size_4\"",$size_1);
$size_1=ereg_replace("size=\"5\"","class=\"size_5\"",$size_1);
$size_1=ereg_replace("size=\"6\"","class=\"size_6\"",$size_1);
$size_1=ereg_replace("size=\"7\"","class=\"size_7\"",$size_1);

return $size_1;
}

function re_change_size($size){

$size_1=ereg_replace("class=\"size_1\"","size=\"1\"",$size);
$size_1=ereg_replace("class=\"size_2\"","size=\"2\"",$size_1);
$size_1=ereg_replace("class=\"size_3\"","size=\"3\"",$size_1);
$size_1=ereg_replace("class=\"size_4\"","size=\"4\"",$size_1);
$size_1=ereg_replace("class=\"size_5\"","size=\"5\"",$size_1);
$size_1=ereg_replace("class=\"size_6\"","size=\"6\"",$size_1);
$size_1=ereg_replace("class=\"size_7\"","size=\"7\"",$size_1);

return $size_1;
}


/***********************************************************************/


?>
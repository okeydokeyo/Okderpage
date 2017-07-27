<?
    session_start();
    include "config.php";
    include "function.php";  //功能表

    chk_IP($_SERVER['REMOTE_ADDR']); //針對某人封鎖IP
    chk_all($_POST['id']);           //檢查是否有特殊字元
    //chk_all($_POST['passwd']);       //檢查是否有特殊字元

    $DB_ManUser = $_POST['id'];
    $DB_ManPwd=md5($_POST['passwd']);


    $SQL="select * from `manager` where `DB_ManUser`='$DB_ManUser' && `DB_ManPwd`='$DB_ManPwd'";
    $Manager_result = mysql_query($SQL) or die("查詢失敗");
    $Manager_ary = mysql_fetch_array($Manager_result);
    $Manager_num = mysql_num_rows($Manager_result);
    if ( $Manager_ary['DB_ManNum'] == "all" ){ 
        $power=" 最高管理者";
        $url="id_list.php";
    }
    else{ 
        $power=" 使用者";$url="id_info.php";  
    }

    //檢查ManUser這個session是否已經有值
    if( empty($_SESSION['ManUser']) ){
        //檢查帳號密碼是否存在
        if($Manager_num<>0){
            //註冊一個session名稱叫ManUser
            session_register("ManUser");
            //session_register("SNmain");
            //將資料庫DB_ManUser的資料放入$ary_Manager['DB_ManUser']這個session裡
            $_SESSION['ManUser'] = $Manager_ary['DB_ManUser'];	
            ?>
            <script language="javascript">
                alert("<? echo $Manager_ary['DB_ManName'].$power;?>歡迎您");
                location.href="<? echo "manage_sys/".$url;?>";
            </script>
            <?		 
        }
        else{  
            ?>
            <script language="javascript">
                alert("帳號密碼錯誤，請確認您的帳號及密碼!!");
                location.href="login.php";
            </script>				
            <?
        }
    }
    else if( !empty($_SESSION['ManUser']) ){
        ?>
        <script language="javascript">
            alert("<? echo $Manager_ary['DB_ManName'].$power;?>歡迎您");
            location.href="<? echo "manage_sys/".$url;?>";
        </script>
        <?
    }
?>

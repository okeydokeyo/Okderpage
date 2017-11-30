<?
    /*if(empty($_SERVER["HTTPS"])) {
        $https = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location:".$https);
        exit();
    }*/
    $host="localhost";    //主機名稱
    $user="root";         //登入者帳號
    $password="okderrr";     //登入者密碼 
    $selectdb="scsrc2";   //資料庫名稱
    //連結資料庫
    mysql_connect($host,$user,$password) or die("資料庫無法連線") ;
    mysql_select_db($selectdb);

    mysql_query("set names utf8") or die("err_1");
    mysql_query("set character_set_client=utf8") or die("err_2");
    mysql_query("set character_set_results=utf8") or die("err_3");

    // 調整網頁語系
    @header('Content-Type: text/html; charset=utf-8'); 

    // mb編碼設定
    mb_internal_encoding("UTF-8");

    //session_register('http_url');

    $url_file="/ioth";

    /****************************************************
    功能：得知使用者的所有資訊
    ****************************************************/
    function get_user_info( $DB_ManUser ){	
        $result_a = mysql_query("select * from `manager` where `DB_ManUser` = '$DB_ManUser'");
        $num_a=mysql_num_rows($result_a);
        if($num_a<>0){
            $arr_a = mysql_fetch_array( $result_a );
            return $arr_a;
        }
    }

    //修正新版php不支援問題
    if (!function_exists('session_register')) {
        function session_register(){
            $args = func_get_args();
            foreach ($args as $key){
                $_SESSION[ $key ] = $GLOBALS[ $key ];
            }
        }
    }
    if (!function_exists('session_is_registered')) {
        function session_is_registered( $key ){
            return isset( $_SESSION[ $key ] );
        }
    }
    if (!function_exists('session_unregister')) {
        function session_unregister( $key ){
            unset( $_SESSION[ $key ] );
        }
    }
?>
<? 
    //$userauth = get_user_info( $_SESSION['ManUser'] ); 
?>
<? 
//include "function.php";  //¥\¯àªí

$file_name=urlencode($_GET['DB_FileTitle']);
$d="file/".$_GET['DB_FileName'];

header("Content-type: application/download");
header("Content-Disposition: attachment; filename=".$file_name);
header("Content-Transfer-Encoding: binary");
readfile($d);
?>

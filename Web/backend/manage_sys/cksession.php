<? session_start();?>
<?
if(empty($_SESSION['ManUser'])){
?>
		<script language="javascript">
		location.href="../index.php";
	  </script>
<?
	exit;
}

?>

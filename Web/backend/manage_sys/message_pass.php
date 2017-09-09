<?php
    include "../config.php";
    $id = intval($_GET['id']);
    $sql = "UPDATE `comments` SET `pass`=-5 WHERE `DB_MesID`='$id'";
    mysql_query($sql);
?>

<script type="text/javascript">
    alert("hihihi");
</script>
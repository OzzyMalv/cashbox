<?php
include_once("db.php");
$id = $_GET['id'];

mysql_query("	DELETE FROM humans WHERE id='$id' ");
mysql_close();
echo "Удалено";
?>
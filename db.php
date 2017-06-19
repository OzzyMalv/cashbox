<?php
$connection = mysql_connect("localhost", "root");
$db = mysql_select_db("people");
mysql_query(" SET NAMES 'utf8' ");
if(!$connection || !$db)
{
       exit(mysql_error());
}


?>

<?php
$mysql_hostname = "localhost";
$mysql_user = "a16673ai_payamath";
$mysql_password = "Payamath@2016";
$mysql_database = "suguna1";
$prefix = "a16673ai_suguna";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($mysqli_database, $bd) or die("Could not select database");
error_reporting(0);
?>


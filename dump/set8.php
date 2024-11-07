<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct BillNo FROM  reportentry WHERE BillNo LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['BillNo'];
	echo "$cname\n";
}



?>
<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct DoctorName FROM  ddetails WHERE DoctorName LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['DoctorName'];
	echo "$cname\n";
}



?>
<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct DoctorName FROM  ddetails WHERE DoctorName LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs)or die(mysqli_error($link));
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['DoctorName'];
	echo "$cname\n";
}



?>
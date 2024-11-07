<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct Department FROM  testdetails WHERE Department LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs) or die(mysqli_error($link));
while($rs = mysqli_fetch_array($rsd)) {
	$cname = $rs['Department'];
	echo "$cname\n";
}



?>
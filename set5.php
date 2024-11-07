<?php
include("config.php");

$q = strtolower($_GET["q"]);
if (!$q) return;
$rs="SELECT  distinct pak_name FROM  package WHERE pak_name LIKE '%$q%'"; 
$rsd = mysql_query($rs);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['pak_name'];
	echo "$cname\n";
}



?>
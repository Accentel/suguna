<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM testdetails WHERE TestName = '$q'";
$result = mysql_query($sql);
if($result){
	$row = mysql_fetch_array($result);
	echo ":" . $row['Amount'];
	
	
}

?>	


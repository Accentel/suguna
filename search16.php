<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM testdetails WHERE TestName = '$q'";
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
if($result){
	$row = mysqli_fetch_array($result);
	echo ":" . $row['Amount'];
	
	
}

?>	


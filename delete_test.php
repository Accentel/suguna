<?php
include("config.php");

$dept = $_REQUEST['dept'];
$tname = $_REQUEST['tname'];

$sq=mysqli_query($link,"DELETE  FROM `testdetails` WHERE Department='$dept' and TestName='$tname'")or die(mysqli_error($link));
if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='new_test.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='new_test.php';";
	print "</script>";
}                         
?>
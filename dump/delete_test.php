<?php
include("config.php");

$dept = $_REQUEST['dept'];
$tname = $_REQUEST['tname'];

$sq=mysql_query("DELETE  FROM `testdetails` WHERE Department='$dept' and TestName='$tname'");
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
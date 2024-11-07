<?php
include("config.php");

$id=$_GET['dcode'];

$sq=mysql_query("DELETE  FROM `masterdept` WHERE deptcode='$id'");
if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='new_dept.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='new_dept.php';";
	print "</script>";
}                         
?>
<?php
include("config.php");

$id=$_GET['pn'];

$sq=mysql_query("DELETE  FROM `package` WHERE pak_name='$id'");
if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='new_package.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='new_package.php';";
	print "</script>";
}                         
?>
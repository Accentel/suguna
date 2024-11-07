<?php
include("config.php");

$id=$_GET['id'];

$sq=mysql_query("DELETE  FROM `expensemstr` WHERE id='$id'");
if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='new_expenses.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='new_expenses.php';";
	print "</script>";
}                         
?>
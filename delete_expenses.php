<?php
include("config.php");
$id=$_GET['id'];
$sq=mysqli_query($link,"DELETE  FROM `expensemstr` WHERE id='$id'") or die(mysqli_error($link));
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
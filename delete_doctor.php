<?php
include("config.php");

$id=$_GET['dn'];

$sq=mysqli_query($link,"DELETE  FROM `ddetails` WHERE DoctorName='$id'")or die(mysqli_error($link));
if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='new_doctor.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='new_doctor.php';";
	print "</script>";
}                         
?>
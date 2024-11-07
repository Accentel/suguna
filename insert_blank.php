<?php
include("config.php");
if(isset($_POST['submit'])){
$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname =$_POST['pname'];
$age =$_POST['age'];
$gender =$_POST['gender'];
$dname =$_POST['dname'];
$tdetails =($_POST['breport']);

$sql = mysqli_query($link,"select count(*) from blankreport where BILLNO='$bno'") or die(mysqli_error($link));
if($sql){
$row = mysqli_fetch_array($sql);
$cnt = $row[0];
if($cnt <= 0){
$sql1 = mysqli_query($link,"insert into blankreport(BILLNO, PATIENTNAME, DOCTORNAME, SEX,AGE,REPORTDATE,TESTDETAILS) values('$bno','$pname','$dname','$gender','$age','$bdate','$tdetails')") or die(mysqli_error($link));
if($sql1)
{
	print "<script>";
	print "alert('successfully saved. Take Print Out from Duplicate Reports.');";
	print "self.location='blank_report.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='blank_report.php';";
	print "</script>";
	}
}else{
	print "<script>";
	print "alert('report already generated with this bill no');";
	print "self.location='blank_report.php';";
	print "</script>";
	}
}
}
?>
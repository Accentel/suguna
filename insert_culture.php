<?php
include("config.php");
if(isset($_POST['submit'])){
$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname =$_POST['pname'];
$age =$_POST['age'];
$gender =$_POST['gender'];
$dname =$_POST['dname'];
$tname = $_POST['tname'];
$status = $_POST['status'];
if($status == "Positive"){
$origin = $_POST['origin'];
$ccount = $_POST['ccount'];
$sql = mysqli_query($link,"select count(*) from culture where ID='$bno'") or die(mysqli_error($link));
if($sql){
$row = mysqli_fetch_array($sql);
$cnt = $row[0];
if($cnt <= 0){
$rows  = count($_POST['sens']);
if($rows > 0){
for($i=0;$i<$rows;$i++){
if( $_POST['sens'][$i]!='' || $_POST['mode'][$i]!='' || $_POST['resi'][$i]!='' ){
$sens = addslashes($_POST['sens'][$i]);
$mode = addslashes($_POST['mode'][$i]);
$resi = addslashes($_POST['resi'][$i]);
$sql1 = mysqli_query($link,"insert into culture(ID, PATIENTNAME, DOCTORNAME, SEX,AGE,REPORTDATE,testname,possnage,orgiso,sensitivity,resistanct,moderate,ccount) values('$bno','$pname','$dname','$gender','$age','$bdate','$tname','$status','$origin','$sens','$resi','$mode','$ccount')") or die(mysqli_error($link));
}
}
}
}else{
	print "<script>";
	print "alert('report already generated with this bill no');";
	print "self.location='culture_report.php';";
	print "</script>";
	}
}}
if($status == "Negative"){

$creport =addslashes($_POST['creport']);

$sql = mysqli_query($link,"select count(*) from culture where ID='$bno'") or die(mysqli_error($link));
if($sql){
$row = mysqli_fetch_array($sql);
$cnt = $row[0];
if($cnt <= 0){
$sql1 = mysqli_query($link,"insert into culture(ID, PATIENTNAME, DOCTORNAME, SEX,AGE,REPORTDATE,testname,possnage,note) values('$bno','$pname','$dname','$gender','$age','$bdate','$tname','$status','$creport')") or die(mysqli_error($link));
}else{
	print "<script>";
	print "alert('report already generated with this bill no');";
	print "self.location='culture_report.php';";
	print "</script>";
	}
}
}
if($sql1)
{
	print "<script>";
	print "alert('successfully saved. Take Print Out from Duplicate Reports.');";
	print "self.location='culture_report.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='culture_report.php';";
	print "</script>";
	}

}
?>
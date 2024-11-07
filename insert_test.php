<?php
include("config.php");

if(isset($_POST['submit'])){

$depname =$_POST['depname'];
$testname = ($_POST['testname']);
$tprice = $_POST['tprice'];

$sql1 = mysqli_query($link,"insert into testdetails(Department, TestName, Amount) values('$depname','$testname','$tprice')")or die(mysqli_error($link));
if($sql1)
{
$sql2 = mysqli_query($link,"insert into testmstr(TestName, Department, Amount) values('$testname','$depname','$tprice')")or die(mysqli_error($link));

}
if($sql2)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_test.php';";
	print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_test.php';";
	print "</script>";
	}
}
?>
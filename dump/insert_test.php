<?php
include("config.php");

if(isset($_POST['submit'])){

$depname =$_POST['depname'];
$testname = mysql_real_escape_string($_POST['testname']);
$tprice = $_POST['tprice'];

$sql1 = mysql_query("insert into testdetails(Department, TestName, Amount) values('$depname','$testname','$tprice')");
if($sql1)
{
$sql2 = mysql_query("insert into testmstr(TestName, Department, Amount) values('$testname','$depname','$tprice')");

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
<?php
include("config.php");

if(isset($_POST['submit'])){

$rows = $_POST['rows'];
if($rows > 0){
$pakname =$_POST['pakname'];
$dis = $_POST['conamt'];
$price=$_POST['price'];
for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1 = mysql_query("insert into package(pak_name, testname, dis, amount) values('$pakname','$tname','$dis','$cost')");
}
}	
if($sql1)
{
	$sql2 = mysql_query("insert into testdetails(TestName, Amount) values('$pakname','$price')");
	if($sql2){
		print "<script>";
		print "alert('Successfully saved');";
		print "self.location='new_package.php';";
		print "</script>";
	}
	else{
		print "<script>";
		print "alert('unable to save');";
		print "self.location='add_package.php';";
		print "</script>";
		}
	}	
}
}
?>
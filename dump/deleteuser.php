<?php
include("config.php");

$id=$_GET['q'];
if($id!=''){
$pq=" DELETE   FROM hr_user WHERE ename='$id' ";
mysql_query($pq) or die(mysql_error());
echo $pq1=" DELETE   FROM login  WHERE ename='$id' ";
$sq=mysql_query($pq1) or die(mysql_error());

if($sq)
{
	print "<script>";
	print "alert('Successfully deleted ');";
	print "self.location='userview.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to delete');";
	print "self.location='userview.php';";
	print "</script>";
}      


}else{

print "<script>";
	print "alert('unable to delete');";
	print "self.location='userview.php';";
	print "</script>";

}                   
?>
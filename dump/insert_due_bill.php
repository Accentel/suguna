<?php
include("config.php");

if(isset($_POST['submit'])){
$user=$_POST['user'];
$bno =$_POST['bno'];
$pname = $_POST['pname'];
$paid =$_POST['paid'];
$bal = $_POST['bal'];
$cdue = $_POST['cdue'];
$rbal = $_POST['rbal'];
//$bdate = $_POST['bdate'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$tot = $_POST['price'];
$paid1 = ($paid+$cdue);
mysql_query("insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$cdue','$user')");
$sql1 = mysql_query("update bill1 set PaidAmount='$paid1',BalanceAmount='$rbal',BillDate='$bdate' where BillNO='$bno'");
	
if($sql1)
{
	/*print "<script>";
	print "alert('Successfully updated');";
	print "self.location='new_lab_bill.php';";
	print "</script>";*/
	header("Location:send_sms.php?bno=$bno&d=$cdue&rb=$rbal&pn=$pname&bd=$bdate&t=$tot&bal=$bal&user=$user");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='pay_due_bill.php';";
	print "</script>";
	}
}
?>
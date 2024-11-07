<?php
ob_start();
include("config.php");

if(isset($_POST['submit'])){

$rows = $_POST['rows'];
if($rows > 0){
$bno =$_POST['bno'];
$mno =$_POST['mno'];
$user =$_POST['user'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname1 = $_POST['pname'];
$pref = $_POST['pref'];
$pname = $pref." ".$pname1;
$suf = $_POST['suf'];
$age1 =$_POST['age'];
$age = $age1." ".$suf;
$gender = $_POST['gender'];
$dname = $_POST['dname'];
$total =$_POST['tot'];
$disc = $_POST['conamt'];
$namt = $_POST['price'];
$paid =$_POST['paid'];
$bal = $_POST['bal'];
$ctype = $_POST['ctype'];
$ptype = $_POST['ptype'];
$remarks=$_POST['remarks'];
$time=$_POST['time'];
mysqli_query($link,"insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')") or die(mysqli_error($link));
mysqli_query($link,"insert into ulogin(uname,pass) values ('$bno','$mno')") or die(mysqli_error($link));

//echo $q="insert into bill1(BillNO,PatientName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,user) values('$bno','$pname','$total','$disc','$namt','$paid','$bal')";
echo $q="insert into bill1(BillNO,  PatientName, Age, Sex, DoctorName,Total,Discount,NetAmount,PaidAmount,BalanceAmount,BillDate,user,time) values('$bno','$pname','$age','$gender','$dname','$total','$disc','$namt','$paid','$bal','$bdate','$user','$time')";
mysqli_query($link,$q) or die(mysqli_error($link));
for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql1 = mysqli_query($link,"insert into bill(BillNO, BillDate, PatientName, Age, Sex, DoctorName,TestName,Amount,Total,Discount,NetAmount,PaidAmount,BalanceAmount,conce_type,ptype,remarks,user,phoneno) values('$bno','$bdate','$pname','$age','$gender','$dname','$tname','$cost','$total','$disc','$namt','$paid','$bal','$ctype','$ptype','$remarks','$user','$mno')") or die(mysqli_error($link));
}

}

if($sql1)
{

	print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";
	//header("Location:new_lab_bill.php");
	//header("Location:bill_rec.php?bno=$bno");
	
	//print "<script>";
	//print "var r = confirm('want to take print?');";
	//print "if(r == true){self.location='bill_rec.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	//print "</script>";
}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='pay_bill.php';";
	print "</script>";
	}
}
}	
?>
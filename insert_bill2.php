<?php
ob_start();
include("config.php");

if(isset($_POST['submit'])){

$rows = $_POST['rows'];
if($rows > 0){
$bno =$_POST['bno'];
$user=$_POST['user'];
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
mysqli_query($link,"insert into duebill(billno,billdate,pname,paidamount,user1) values ('$bno','$bdate','$pname','$paid','$user')")or die(mysqli_error($link));;
//echo $q="insert into bill1(BillNO,PatientName,Total,Discount,NetAmount,PaidAmount,BalanceAmount) values('$bno','$pname','$total','$disc','$namt','$paid','$bal')";
$query="select * from bill1 where BillNO='$bno'";
$m=mysqli_query($link,$query) or die(mysqli_error($link));
$row=mysqli_fetch_array($m);
$bno1=$row['BillNO'];
//$pname1=$row['PatientName'];
$Total=$row['Total'];
$Discount1=$row['Discount'];
$NetAmount1=$row['NetAmount'];
$PaidAmount1=$row['PaidAmount'];
$BalanceAmount1=$row['BalanceAmount'];
$tt=$total+$Total;
$dd=$disc+$DoctorName1;
$nt=$namt+$NetAmount1;
$pt=$paid+$PaidAmount1;
$bt=$bal+$BalanceAmount1;
$q="update bill1 set PatientName='$pname', Age='$age', Sex='$gender', DoctorName='$dname',Total='$tt',Discount='$dd',NetAmount='$nt',PaidAmount='$pt',BalanceAmount='$bt' where BillNO='$bno1'";
//echo $q="insert into bill1(BillNO,  PatientName, Age, Sex, DoctorName,Total,Discount,NetAmount,PaidAmount,BalanceAmount) values('$bno','$pname','$age','$gender','$dname','$total','$disc','$namt','$paid','$bal')";
mysqli_query($link,$q) or die(mysqli_error($link));
for($i=0;$i<$rows;$i++)
{

$tname = $_POST['tname'][$i];
$cost = $_POST['cost'][$i];
if($tname != ""){
$sql3 = mysqli_query($link,"insert into bill2(BillNO, BillDate, PatientName, Age, Sex, DoctorName,TestName,Amount,Total,Discount,NetAmount,PaidAmount,BalanceAmount,conce_type,ptype,remarks,user) values('$bno','$bdate','$pname','$age','$gender','$dname','$tname','$cost','$total','$disc','$namt','$paid','$bal','$ctype','$ptype','$remarks','$user')")or die(mysqli_error($link));
$sql1 = mysqli_query($link,"insert into bill(BillNO, BillDate, PatientName, Age, Sex, DoctorName,TestName,Amount,Total,Discount,NetAmount,PaidAmount,BalanceAmount,conce_type,ptype,remarks,user) values('$bno','$bdate','$pname','$age','$gender','$dname','$tname','$cost','$total','$disc','$namt','$paid','$bal','$ctype','$ptype','$remarks','$user')")or die(mysqli_error($link));
}

}	
if($sql1)
{

	/*print "<script>";
	print "alert('Successfully added');";
	print "self.location='new_lab_bill.php';";
	print "</script>";*/
	print "<script>";
	print "var r = confirm('want to take print?');";
	print "if(r == true){self.location='bill_rec1.php?bno=$bno';}else{self.location='new_lab_bill.php';}";
	print "</script>";
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
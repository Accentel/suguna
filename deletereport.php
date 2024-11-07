<?php
ob_start();
include('config.php');
$bno=$_REQUEST['bno'];
$id=$_REQUEST['q'];
$p="select * from bill where id=$id";
$q=mysqli_query($link,$p)or die(mysqli_error($link));;
$row=mysqli_fetch_array($q);
echo $Amount=$row['Amount'];

//$pq=

$re=mysqli_query($link,"select * from bill1 where BillNO='$bno'")or die(mysqli_error($link));
$row1=mysqli_fetch_array($re);
echo $tot=$row1['NetAmount'];

$tt=$tot-$Amount;
echo $tt;

mysqli_query($link,"update bill1 set NetAmount='$tt',Total='$tt' where BillNO='$bno' ")or die(mysqli_error($link));



$query="delete from bill where id='$id'";
$res=mysqli_query($link,$query)or die(mysqli_error($link));

if($res){
header("Location:edit_lab_bill1.php?bno=$bno");
}
 ?>
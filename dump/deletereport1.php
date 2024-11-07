<?php
ob_start();
include('config.php');
$bno=$_REQUEST['bno'];
$id=$_REQUEST['q'];
$p="select * from outerbill where id=$id";
$q=mysql_query($p);
$row=mysql_fetch_array($q);
echo $Amount=$row['Amount'];

//$pq=

$re=mysql_query("select * from outerbill1 where BillNO='$bno'");
$row1=mysql_fetch_array($re);
echo $tot=$row1['NetAmount'];

$tt=$tot-$Amount;
echo $tt;

mysql_query("update outerbill1 set NetAmount='$tt',Total='$tt' where BillNO='$bno' ");



$query="delete from outerbill where id='$id'";
$res=mysql_query($query);

if($res){
header("Location:edit_lab_outerbill1.php?bno=$bno");
}
 ?>
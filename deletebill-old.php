<?php

include('config.php');
$bilno=$_REQUEST['q'];
//$query="delete from bill where BillNO='$bilno'";
$query="update bill set TestName='0',Amount='0', Total='0', Discount='0', NetAmount='0', PaidAmount='0',  BalanceAmount='0',remarks='this is updated by admin' where BillNO='$bilno' ";
mysql_query($query);
//$query1="delete from bill1 where BillNO='$bilno'";
$query1="update bill1 set  Total='0', Discount='0', NetAmount='0', PaidAmount='0',  BalanceAmount='0' where BillNO='$bilno' ";
mysql_query($query1);
$query2="update bill1 set  paidamount='0' where billno='$bilno' ";
$res=mysql_query($query2);
if($res){
header('Location:new_lab_bill.php');
}
 ?>
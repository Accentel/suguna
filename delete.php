<?php
include('config.php');

ob_start();
if (isset($_POST['delete'])){

$id=$_POST['selector'];
$date=date('Y-m-d');
$N = count($id);
for($i=0; $i < $N; $i++)
{

	//$result = mysql_query("DELETE FROM user_reg where id='$id[$i]'");
	//$result=mysql_query("update user_reg set acc_status='In Active',deldate='$date',payment_status='In Active',tt_count='0' where id='$id[$i]'") or die(mysql_error());
	
	
	 $kol="INSERT INTO bill1copy
SELECT *
FROM bill1
WHERE BillNO='$id[$i]'";
mysql_query($kol) or die(mysql_error());



$kol1="INSERT INTO billcopy
SELECT *
FROM bill
WHERE BillNO='$id[$i]'";
mysql_query($kol1) or die(mysql_error());


$kol9="INSERT INTO duebillcopy
SELECT *
FROM duebill
WHERE billno='$id[$i]'";
mysql_query($kol9) or die(mysql_error());


$kol14=" DELETE FROM duebill
WHERE billno='$id[$i]'";
mysql_query($kol14);

$kol4=" DELETE FROM bill
WHERE BillNO='$id[$i]'";
mysql_query($kol4);

$kol3=" DELETE FROM bill1
WHERE BillNO='$id[$i]'";
mysql_query($kol3);

	
}
header("location: deletedata.php");

}
?>
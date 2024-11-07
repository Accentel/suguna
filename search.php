<?php
include("config.php");

$q=$_GET["q"];
$sql="select BillNO,BillDate, PatientName,Age,Sex,DoctorName,conce_type,ptype,sum(Total) as Total,sum(Discount) as Discount,sum(NetAmount) as NetAmount,sum(PaidAmount) as PaidAmount, sum(BalanceAmount) as BalanceAmount FROM bill WHERE BillNO = '$q' ";
//$sql="SELECT * FROM bill WHERE BillNO = '$q'";
$result = mysqli_query($link,$sql)or die(mysqli_error($link));
if($result){
	$row = mysqli_fetch_array($result);
	echo ":" . date('d-m-Y',strtotime($row['BillDate']));
	echo ":" . $row['PatientName'];
	echo ":" . $row['Age'];
	echo ":" . $row['Sex'];
	echo ":" . $row['DoctorName'];
	echo ":" . $row['Total'];
	echo ":" . $row['Discount'];
	echo ":" . $row['NetAmount'];
	echo ":" . $row['PaidAmount'];
	echo ":" . $row['BalanceAmount'] . ":";
	
}
$sql1=mysqli_query($link,"SELECT * FROM bill WHERE BillNO = '$q'")or die(mysqli_error($link));
if($sql1){
while($row1 = mysqli_fetch_array($sql1)){
?>	
<table width="100%">
<tr><td width="50%"><?php echo $row1['TestName'] ?></td>
<td width="50%"><?php echo $row1['Amount'] ?></td></tr>
</table>
<?php } } ?>

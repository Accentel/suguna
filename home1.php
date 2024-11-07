<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{
$name=$_SESSION['suguna'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	</head>

	<body>

	
<?php
include("config.php");

?>
		  
			  <?php
				include("headertop.php");
			  ?>
			  <?php 
			   if($_SESSION['suguna'] != "admin"){
			   include("config.php");
$dt = date('Y-m-d');
$sql = mysql_query("select distinct BillNO,PaidAmount,BalanceAmount from bill1 where BillDate='$dt' and user='$name'");
if($sql){
$paid = 0;
$bal = 0;
while($row = mysql_fetch_array($sql)){
$pamt = $row[1];
$bamt = $row[2];
$paid = ($paid+$pamt);
$bal = ($bal+$bamt);
}
}
$sql2 = mysql_query("select amount from expensemstr where date='$dt'");
if($sql2){
$exp1 = 0;
while($row2 = mysql_fetch_array($sql2)){
$exp = $row2[0];
$exp1 = ($exp1+$exp);
}
}
			   ?>
			   <div style="overflow-x:auto;">
		<div id="centre" style="height:auto">
			<div style="width:200px;height:200px;margin-top:20px;margin-left:40px;float:left;">
		  <div style="width:200px;height:30px;font-size:16px;font-weight:bold;" align="center">Amount</div>
		  <div style="width:190px;height:140px;">
		  <div style="width:190px;height:30px;padding:5px;border:2px solid #9097A9;border-bottom:none;font-size:16px;">Paid Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $paid ?></div>
		  <div style="width:190px;height:30px;padding:5px;border:2px solid #9097A9;border-bottom:none;font-size:16px;">Balance Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $bal ?></div>
		  <div style="width:190px;height:30px;padding:5px;border:2px solid #9097A9;font-size:16px;">Expenses Amount&nbsp;&nbsp;&nbsp; <?php echo $exp1 ?></div>
		  </div>
		  </div>
		  <div style="width:600px;height:30px;margin-left:280px;font-size:16px;font-weight:bold;" align="center">Today Patient List</div>
			
		  <div style="width:600px;height:200px;margin-top:20px;margin-left:40px;border:1px solid black;float:left;overflow:auto;" >
			<table width="100%" id="expense_table" class="table" style="overflow: auto;" cellpadding="0" cellspacing="0">
			<tr><th>Bill Number</th><th>Patient Name</th></tr>
			<?php
				include("config.php");
				$dt1 = date('Y-m-d');
				$sql1 = mysql_query("select distinct BillNO,PatientName from bill1 where BillDate='$dt1' and user='$name' order by bid desc");
				if($sql1){
				while($row1 = mysql_fetch_array($sql1)){
			?>		
			<tr><td><?php echo $row1['BillNO'] ?></td><td><?php echo $row1['PatientName'] ?></td></tr>
			<?php } } ?>
			</table>
		  </div>
		  <div style="width:500px;font-size:16px;font-weight:bold;">
			&nbsp;<br>
			&nbsp;<br>
			&nbsp;<br>
			
		  </div>
			</div>
			</div>
			<?php 
			}else{
			
			include("config.php");
$dt = date('Y-m-d');
$sql = mysql_query("select distinct BillNO,PaidAmount,BalanceAmount from bill1 where BillDate='$dt' ");
if($sql){
$paid = 0;
$bal = 0;
while($row = mysql_fetch_array($sql)){
$pamt = $row[1];
$bamt = $row[2];
$paid = ($paid+$pamt);
$bal = ($bal+$bamt);
}
}

$sql11 = mysql_query("select distinct BillNO,PaidAmount,BalanceAmount from outerbill1 where BillDate='$dt' ");
if($sql){
$paid11 = 0;
$bal11 = 0;
while($row1 = mysql_fetch_array($sql11)){
$pamt11 = $row1[1];
$bamt11 = $row1[2];
$paid11 = ($paid11+$pamt11);
$bal11 = ($bal11+$bamt11);
}
}




$sql2 = mysql_query("select amount from expensemstr where date='$dt'");
if($sql2){
$exp1 = 0;
while($row2 = mysql_fetch_array($sql2)){
$exp = $row2[0];
$exp1 = ($exp1+$exp);
}
}
			?>
			 <div style="overflow-x:auto;">
			<div id="centre" style="height:auto">
			<div style="width:200px;height:200px;margin-top:20px;margin-left:40px;float:left;">
		  <div style="width:200px;height:30px;font-size:16px;font-weight:bold;" align="center">Amount</div>
		  <div style="width:190px;height:140px;">
		  <div style="width:190px;height:30px;padding:5px;border:2px solid #9097A9;border-bottom:none;font-size:16px;">Paid Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $paid+$paid11 ?></div>
		  <div style="width:190px;height:30px;padding:5px;border:2px solid #9097A9;border-bottom:none;font-size:16px;">Balance Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $bal+$bal11 ?></div>
		  <div style="width:190px;height:30px;padding:5px;border:2px solid #9097A9;font-size:16px;">Expenses Amount&nbsp;&nbsp;&nbsp; <?php echo $exp1 ?></div>
		  </div>
		  </div>
		  <div style="width:600px;height:30px;margin-left:280px;font-size:16px;font-weight:bold;" align="center">Today Patient List</div>
			
		  <div style="width:600px;height:200px;margin-top:20px;margin-left:40px;border:1px solid black;float:left;overflow:auto;" >
			<table width="100%" id="expense_table" style="overflow: auto;" cellpadding="0" cellspacing="0">
			<tr><th>Bill Number</th><th>Patient Name</th></tr>
			<?php
				include("config.php");
				$dt1 = date('Y-m-d');
				$sql1 = mysql_query("select distinct BillNO,PatientName from bill1 where BillDate='$dt1'  order by bid desc");
				if($sql1){
				while($row1 = mysql_fetch_array($sql1)){
			?>		
			<tr><td><?php echo $row1['BillNO'] ?></td><td><?php echo $row1['PatientName'] ?></td></tr>
			<?php } } ?>
			
			<?php
				include("config.php");
				$dt1 = date('Y-m-d');
				$sql1 = mysql_query("select distinct BillNO,PatientName from outerbill1 where BillDate='$dt1'  order by bid desc");
				if($sql1){
				while($row1 = mysql_fetch_array($sql1)){
			?>		
			<tr><td><?php echo $row1['BillNO'] ?></td><td><?php echo $row1['PatientName'] ?></td></tr>
			<?php } } ?>
			
			
			
			</table>
		  </div>
		  <div style="width:500px;font-size:16px;font-weight:bold;">
			&nbsp;<br>
			&nbsp;<br>
			&nbsp;<br>
			
		  </div>
			</div>
			</div>
			
			<?php }?>
		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
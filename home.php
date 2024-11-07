<?php 

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
				include("headertop.php");
			  ?>
			
			  <?php 
			   if($_SESSION['suguna'] != "admin"){
				   
				   
			   
$dt = date('Y-m-d');
$sql = mysqli_query($link,"select distinct BillNO,PaidAmount,BalanceAmount from bill1 where BillDate='$dt' and user='$name'") or die(mysqli_error($link));
if($sql){
$paid = 0;
$bal = 0;
while($row = mysqli_fetch_array($sql)){
$pamt = $row[1];
$bamt = $row[2];
$paid = ($paid+$pamt);
$bal = ($bal+$bamt);
}
}
$sql2 = mysqli_query($link,"select amount from expensemstr where date='$dt'") or die(mysqli_error($link));
if($sql2){
$exp1 = 0;
while($row2 = mysqli_fetch_array($sql2)){
$exp = $row2[0];
$exp1 = ($exp1+$exp);
}
}
			   ?>
			   <div id="centre" style="height:500px;">
			   
			   <h4 align="center">Today Patient List</h4>
			 <div class="col-md-4">
			 <h3>Amount</h3>
			<table class="table table-responsive table-striped table-bordered">
			<tr>
			<th>Paid Amount</th>
			<td><?php echo $paid ?></td>
			</tr>
			<tr>
			<th>Balance Amount</th>
			<td><?php echo $bal ?></td>
			</tr>
			<tr>
			<th>Expenses Amount</th>
			<td><?php echo $exp1 ?></td>
			</tr>
			</table>
			
		  </div>
			  
			
		  <div class="col-sm-8" >
		  <div style="height:250px;overflow: auto;">
			<table   class="table table-responsive" >
			<tr><th>Bill Number</th><th>Patient Name</th></tr>
			<?php
				//include("config.php");
				$dt1 = date('Y-m-d');
				$sql1 = mysqli_query($link,"select distinct BillNO,PatientName from bill1 where BillDate='$dt1' and user='$name' order by bid desc") or die(mysqli_error($link));
				if($sql1){
				while($row1 = mysqli_fetch_array($sql1)){
			?>		
			<tr><td><?php echo $row1['BillNO'] ?></td><td><?php echo $row1['PatientName'] ?></td></tr>
			<?php } } ?>
			</table>
			</div>
		  </div>
		
			</div>
			
			
			
			
			<?php 
			}else{
			
			//include("config.php");
$dt = date('Y-m-d');
$sql = mysqli_query($link,"select distinct BillNO,PaidAmount,BalanceAmount from bill1 where BillDate='$dt' ") or die(mysqli_error($link));
if($sql){
$paid = 0;
$bal = 0;
while($row = mysqli_fetch_array($sql)){
$pamt = $row[1];
$bamt = $row[2];
$paid = ($paid+$pamt);
$bal = ($bal+$bamt);
}
}

$sql11 = mysqli_query($link,"select distinct BillNO,PaidAmount,BalanceAmount from outerbill1 where BillDate='$dt' ") or die(mysqli_error($link));
if($sql){
$paid11 = 0;
$bal11 = 0;
while($row1 = mysqli_fetch_array($sql11)){
$pamt11 = $row1[1];
$bamt11 = $row1[2];
$paid11 = ($paid11+$pamt11);
$bal11 = ($bal11+$bamt11);
}
}




$sql2 = mysqli_query($link,"select amount from expensemstr where date='$dt'") or die(mysqli_error($link));
if($sql2){
$exp1 = 0;
while($row2 = mysqli_fetch_array($sql2)){
$exp = $row2[0];
$exp1 = ($exp1+$exp);
}
}
			?>
			<div id="centre" style="height:500px;">
			 <h4 align="center">Today Patient List</h4>
			 <div class="col-md-4">
			 <h3>Amount</h3>
			<table class="table table-responsive table-striped table-bordered">
			<tr>
			<th>Paid Amount</th>
			<td><?php echo $paid+$paid11 ?></td>
			</tr>
			<tr>
			<th>Balance Amount</th>
			<td><?php echo $bal+$bal11 ?></td>
			</tr>
			<tr>
			<th>Expenses Amount</th>
			<td><?php echo $exp1 ?></td>
			</tr>
			</table>
			
		  </div>
		   <div class="col-md-8">
		 
			<div style="height:250px;overflow: auto;">
		  
			<table class="table table-responsive table-striped table-bordered"   >
			<tr><th>Bill Number</th><th>Patient Name</th></tr>
			<?php
				//include("config.php");
				$dt1 = date('Y-m-d');
				$sql1 = mysqli_query($link,"select distinct BillNO,PatientName from bill1 where BillDate='$dt1'  order by bid desc") or die(mysqli_error($link));
				if($sql1){
				while($row1 = mysqli_fetch_array($sql1)){
			?>		
			<tr><td><?php echo $row1['BillNO'] ?></td><td><?php echo $row1['PatientName'] ?></td></tr>
			<?php } } ?>
			
			<?php
				//include("config.php");
				$dt1 = date('Y-m-d');
				$sql1 = mysqli_query($link,"select distinct BillNO,PatientName from outerbill1 where BillDate='$dt1'  order by bid desc") or die(mysqli_error($link));
				if($sql1){
				while($row1 = mysqli_fetch_array($sql1)){
			?>		
			<tr><td><?php echo $row1['BillNO'] ?></td><td><?php echo $row1['PatientName'] ?></td></tr>
			<?php } } ?>
			
			
			
			</table>
			</div>
		  </div>
		  
			
			
			
			<?php }?>
		
		</div>
		
		<?php include('footer.php'); ?>

	

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
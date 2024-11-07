<?php //include('config.php');
session_start();
include('config.php');
if($_SESSION['suguna'])
{
$name=$_SESSION['suguna'];
 ?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			include("header.php");
		?>
		<style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    
     border-top: 0px solid #ddd; 
}
		</style>
	</head>
<body>
  <div class="col-sm-1 col-xs-hidden"></div>
  <div class="col-sm-10 col-xs-12" >
	<div class=" container-fluid" style="background-color:#0f590b;">

		  <div class="header">
		  <div class="col-sm-8" >
		  <?php include("title.php"); ?>
		 </div>
		 <div class="col-sm-4">
		 <b id="logout">Welcome to <?php echo $_SESSION['suguna']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b>
		 </div>
		 </div>
			
			  
			 </div>  
			 <?php
				include("main_menu.php");
				$tdate=date('Y-m-d');
			  ?>
			  
		<div id="centre" style="height:auto;">
		<?php 
			   
			    if($_SESSION['suguna'] != "admin"){
				?>
				<!-- user list start -->
		<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Lab Bill Payment</div>
        <div align="left" style="margin-bottom:2px;float:left;"><a href="pay_bill.php"><input type="button" Class="btn btn-primary" style="width:120px;height:35px;" value="Add"/></a></div>
		<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="pay_due_bill.php"><input type="button" Class="btn btn-primary" style="width:120px;height:35px;" value="Pay Due Bill"/></a></div>
					
		 <form action="" autocomplete="off" method="post">
		<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
		</form>
		
		<table border="0" cellpadding="0" cellspacing="0" class="table  table-bordered" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  <th width="20%">Bill No.</th>
                              <th width="30%">Patient Name</th>
							    <th width="15%">C Type</th>
								  <th width="10%">P Tpe</th>
							  <th width="10%">Total</th>
							  <th width="10%">Paid</th>
							  <th width="10%">Due</th>
							  <!--<th>Edit</th>-->
							   <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                          <th width="10%">Result Entry</th>
							  <th width="10%">&nbsp;&nbsp;Edit&nbsp;&nbsp;</th>
							   <th width="10%">&nbsp;&nbsp;Add&nbsp;&nbsp;</th>
							   <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;Due&nbsp;&nbsp;&nbsp;&nbsp;</th>
							  <!-- <th width="10%">Delete</th>-->
                          </tr>
						  <?php
							//include("config.php");
							$results_per_page = 30;
							if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
							$start_from = ($page-1) * $results_per_page;

							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = trim($_REQUEST['pname']);
								
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' and PatientName='$pname' order by bid desc") or die(mysqli_error($link));
								}elseif($prdname != ""){
								 $s="select distinct BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' order by bid desc";
									$sql = mysqli_query($link,$s) or die(mysqli_error($link));
								
								}
								elseif($pname != ""){
								 $s1="select distinct BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' ";
								//echo $p="select distinct BillNO,PatientName,Total,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' order by bid desc";
									$sql = mysqli_query($link,$s1) or die(mysqli_error($link));
								
								}
							}else{
								$sql = mysqli_query($link,"select  a.BillNO,a.PatientName,a.NetAmount ,a.PaidAmount,a.BalanceAmount,b.ptype,b.conce_type,b.BillNO  from bill1 a,bill b where a.BillNO=b.BillNO and a.BillDate='$tdate' and a.user='$name'  GROUP BY  a.BillNO  order by a.bid desc LIMIT $start_from, ".$results_per_page);
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
								
								
							?>	
						   <tr>
							  
                              <td><?php echo $row['BillNO'] ?></td>
							  <td><?php echo $row['PatientName'] ?></td>
							
							   <td><?php if($row['conce_type'] == "General"){ ?>
							    <?php echo $row['conce_type'] ?>
									
								<?php }else{?>
							 <b style="color:red;"><?php echo $row['conce_type'] ?></b>
								<?php }?></td>
							   
							   
							  
							    <td><?php echo $row['ptype'] ?></td>
							  <td><?php echo $row['NetAmount'] ?></td>
							  <td><?php echo $row['PaidAmount'] ?></td>
							   <td><?php echo $row['BalanceAmount'] ?></td>
							   
							  <td><a href="#" onclick="window.open('bill_rec.php?bno=<?php echo $row['BillNO'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')" target="new"><img src="images/green.png" height="22"/></a></td>
                                                          <td><a href="add_result_entry.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/entry2.png" style="height:21px;width:80px;"/></a></td>
                                                          <td><a href="edit_lab_bill.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/edit1.jpg" style="height:21px;width:80px;"/></a></td>
														  <td><a href="add_lab_bill.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/add.png" height="21"/></a></td>
														  <td><a href="pay_due_bill.php?q=<?php echo $row['BillNO'] ?>"><img src="images/pay.png" style="height:21px;width:80px;"/></a></td>
														   <!--<td><a href="deletebill.php?q=<?php// echo $row['BillNO'] ?>"><img src="images/Icon_Delete.png" height="21"/></a></td>-->
                          
						  </tr>
						 <?php  } } } ?>
						 </tbody> 
						 
				</table>
	<!-- user list end -->

				<?php }else{ 
				
				$results_per_page = 30;
							if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
							$start_from = ($page-1) * $results_per_page;
				
				?>
					
					<!-- admin list  start-->
					
					 <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Lab Bill Payment</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="pay_bill.php"><input type="button" Class="btn btn-primary" style="width:120px;height:35px;" value="Add"/></a></div>
					<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="pay_due_bill.php"><input type="button" Class="btn btn-primary" style="width:120px;height:35px;" value="Pay Due Bill"/></a></div>
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
					<div class="table-responsive">
		          <table border="0" cellpadding="0" cellspacing="0" class="table table-bordered" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  <th width="25%">Bill No.</th>
                              <th width="30%">Patient Name</th>
							   <th width="15%">C Type</th>
							    <th width="10%">P Type</th>
							  <th width="10%">Total</th>
							  <th width="10%">Paid</th>
							  <th width="10%">Due</th>
							  <!--<th>Edit</th>-->
							  <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                          <th width="10%">Result Entry</th>
							  <th width="10%">&nbsp;&nbsp;Edit&nbsp;&nbsp;</th>
							   <th width="10%">&nbsp;&nbsp;Add&nbsp;&nbsp;</th>
							   <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;Due&nbsp;&nbsp;&nbsp;&nbsp;</th>
							   <th width="10%">Delete</th>
                          </tr>
						  <?php
							//include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = trim($_REQUEST['pname']);
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' and PatientName='$pname' order by bid desc") or die(mysqli_error($link));
								}elseif($prdname != ""){
								 $s="select distinct BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where BillNO='$prdname' order by bid desc";
									$sql = mysqli_query($link,$s) or die(mysqli_error($link));
								
								}
								elseif($pname != ""){
								 $s1="select distinct BillNO,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' ";
								//echo $p="select distinct BillNO,PatientName,Total,PaidAmount,BalanceAmount from bill1 where PatientName='$pname' order by bid desc";
									$sql = mysqli_query($link,$s1) or die(mysqli_error($link));
								
								}
							}else{
								$results_per_page = 30;
							if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
							$start_from = ($page-1) * $results_per_page;
								$sql = mysqli_query($link,"select  a.BillNO,a.PatientName,a.NetAmount ,a.PaidAmount,a.BalanceAmount,b.ptype,b.conce_type,b.BillNO  from bill1 a,bill b where a.BillNO=b.BillNO  and a.BillDate='$tdate'    GROUP BY  a.BillNO  order by a.bid desc LIMIT $start_from, ".$results_per_page);
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
								
								
							?>	
						   <tr>
							  
                              <td><?php echo $row['BillNO'] ?></td>
							  <td><?php echo $row['PatientName'] ?></td>
							 <td><?php if($row['conce_type'] == "General"){ ?>
							    <?php echo $row['conce_type'] ?>
									
								<?php }else{?>
							 <b style="color:red;"><?php echo $row['conce_type'] ?></b>
								<?php }?></td>
							  <td><?php echo $row['ptype'] ?></td>
							  <td><?php echo $row['NetAmount'] ?></td>
							  <td><?php echo $row['PaidAmount'] ?></td>
							   <td><?php echo $row['BalanceAmount'] ?></td>
							   
							  <td><a href="#" onclick="window.open('bill_rec2.php?bno=<?php echo $row['BillNO'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')" target="new"><img src="images/green.png" height="22"/></a></td>
                                                          <td><a href="add_result_entry.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/entry2.png" style="height:21px;width:80px;"/></a></td>
                                                          <td><a href="edit_lab_bill1.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/edit1.jpg" style="height:21px;width:80px;"/></a></td>
														  <td><a href="add_lab_bill.php?bno=<?php echo $row['BillNO'] ?>"><img src="images/add.png" style="height:21px;width:80px;"/></a></td>
														  <td><a href="pay_due_bill.php?q=<?php echo $row['BillNO'] ?>"><img src="images/pay.png" style="height:21px;width:80px;"/></a></td>
														   <td><a href="deletebill.php?q=<?php echo $row['BillNO'] ?>"><img src="images/Icon_Delete.png" height="21"/></a></td>
                          
						  </tr>
						 <?php  } } } ?>
						 </tbody> 
						 
				</table>
			   
				<div align="center">		
<?php 
$datatable="bill1";
$sql = "SELECT COUNT(bid) AS total FROM ".$datatable;
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='new_lab_bill.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='new_lab_bill.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
												
</div>
</div>		
					
					
					
					
					


<!-- admin list  end-->
			<?php	}?>

		</div>

		<?php include('footer.php'); ?>

	</div>
	<div class="col-sm-1 col-xs-hidden"></div>

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
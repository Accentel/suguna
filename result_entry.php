<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{
$name=$_SESSION['suguna'];
	$remainig_records = -1;//this is used from where the records should display
    $rowscounts = 0;        // if there is any records in next page it became >0 else rowscounts is 0 
    $tot=0;
    $m=0;
    $pagecount = 0;// it is used for page number
    $nd =10;//no of records per page
		/*view records*/
		//String no2=null;
    $no2=$_REQUEST['no'];
	if(!($no2==null) && !("0"==$no2)){$nd=$no2;}
		/*view records*/
    $pagecounter = "";
    $pagecounter = $_REQUEST['next'];
        if ($pagecounter != "") {
            $pagecount = $pagecounter;
        }
   
    $rowstart = ($pagecount * $nd);
    $rowend = ($rowstart + ($nd - 1));
    $records = 0;

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
 <script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#prd").autocomplete("set8.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>	
<script>
$().ready(function() {
	$("#pname").autocomplete("set08.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>	
	</head>

	<body>

	 <?php
				include("headertop.php");
			  ?>
			   <?php 
			   $tdate=date('Y-m-d');
			   if($_SESSION['suguna'] != "admin"){
			   
			   ?>
		<div id="centre" style="height:auto;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Result Entry</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="add_result_entry.php"><input type="button" class="btn btn-primary" style="width:120px;height:35px;" value="Add"/></a></div>
					<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="edit_result.php"><input type="button" class="btn btn-primary" style="width:120px;height:35px;" value="Edit"/></a></div>
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
					<div class="table-responsive">
		          <table border="0" cellpadding="0" cellspacing="0" class="table  table-bordered" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  <th>Bill No.</th>
                              <th>Patient Name</th>
							  <th>Age</th>
							  <th>Gender</th>
							  <th>Status</th>
							   <th>Edit</th>
							   <th>No of prints taken</th>
                          </tr>
						  <?php
							//include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = $_REQUEST['pname'];
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where BillNo='$prdname' and Pname='$pname' order by id desc") or die(mysqli_error($link));
								}elseif($prdname != ""){
									$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where BillNo='$prdname' order by id desc") or die(mysqli_error($link));
								
								}elseif($pname != ""){
									$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where Pname='$pname' order by id desc") or die(mysqli_error($link));
								
								}
							}else{
								$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where Date='$tdate' and user='$name' order by id desc");
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
									$blno = $row[0];
									$sql1 = mysqli_query($link,"select * from bill1 where BillNO='$blno'") or die(mysqli_error($link));
									if($sql1){
										$row1 = mysqli_fetch_array($sql1);
										$bamt = $row1['BalanceAmount'];
										$ctype = $row1['conce_type'];
									}
									$pq="select * from click_count where billno='$blno'";
									$sql1=mysqli_query($link,$pq)or die(mysqli_error($link));
									if($sql1){
									$r=mysqli_fetch_array($sql1);
									$count2=$r['count1'];
									$b=$r['billno'];
									}
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  
                              <td><?php echo $row[0] ?></td>
							  <td><?php echo $row[1] ?></td>
							  <td><?php echo $row[2] ?></td>
							  <td><?php echo $row[3] ?></td>
							 <td>
								<?php if($bamt <= 0 || $ctype == "Insurance"){ ?>
									<a href="#" onclick="window.open('sample2.php?bno=<?php echo $row['BillNo'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')"><img src="images/green.png" height="22"/></a>
								<?php }else{ ?>
									<a href="pay_due_bill.php?q=<?php echo $row['BillNo'] ?>" ><input type="button" value="Pay Due" style="color:#FFF;font-size:11px;font-weight:bold;width:70px;height:22px;background-image:url(images/red.jpg);border-style:none;" /></a>
								<?php } ?>
							 </td>
							 <td><a href="edit_result.php?bno=<?php echo $row['BillNo'] ?>"><img src="images/edit1.jpg" height="21"/></a></td>
							 <td><?php if($b == $blno){ ?>
									<?php echo $count2; ?>
								<?php }else{?>
							<?php 	echo "0"; ?>
								<?php }?></td>
                          </tr>
						 <?php } } } } ?>
						 </tbody> 
						 
				</table>
			
				<?php }else{?>
				
				<div id="centre" style="height:auto;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Result Entry</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="add_result_entry.php"><input type="button" class="btn btn-primary" style="width:120px;height:35px;" value="Add"/></a></div>
					<div align="left" style="margin-bottom:2px;float:left;margin-left:5px;"><a href="edit_result.php"><input type="button" class="btn btn-primary" style="width:120px;height:35px;" value="Edit"/></a></div>
					
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Patient Name : <input type="text" class="text" name="pname" id="pname"/> Search by Bill No. : <input type="text" class="text" name="prd" id="prd"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
					<div class="table-responsive">
		          <table border="0" cellpadding="0" cellspacing="0" class="table  table-bordered" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  <th>Bill No.</th>
                              <th>Patient Name</th>
							  <th>Age</th>
							  <th>Gender</th>
							  <th>Status</th>
							   <th>Edit</th>
							   <th>No of prints taken</th>
                          </tr>
						  <?php
							//include("config.php");
							if(isset($_REQUEST['submit'])){
								
								$prdname = $_REQUEST['prd'];
								$pname = $_REQUEST['pname'];
								if($prdname != "" & $pname != ""){
									$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where BillNo='$prdname' and Pname='$pname' order by id desc")or die(mysqli_error($link));
								}elseif($prdname != ""){
									$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where BillNo='$prdname' order by id desc")or die(mysqli_error($link));
								
								}elseif($pname != ""){
									$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where Pname='$pname' order by id desc")or die(mysqli_error($link));
								
								}
							}else{
								$sql = mysqli_query($link,"select distinct BillNo,Pname,Age,Sex from reportentry where Date='$tdate' order by id desc")or die(mysqli_error($link));
							}
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								while($row = mysqli_fetch_array($sql)){
									$blno = $row[0];
									$sql1 = mysqli_query($link,"select a.BillNo,a.conce_type,b.BalanceAmount from bill a,bill1 b where a.BillNo=b.BillNo and b.BillNO='$blno'")or die(mysqli_error($link));
									if($sql1){
										$row1 = mysqli_fetch_array($sql1);
										$bamt = $row1['BalanceAmount'];
										$ctype = $row1['conce_type'];
									}
									$pq="select * from click_count where billno='$blno'";
									$sql1=mysqli_query($link,$pq)or die(mysqli_error($link));
									if($sql1){
									$r=mysqli_fetch_array($sql1);
									$count2=$r['count1'];
									$b=$r['billno'];
									}
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  
                              <td><?php echo $row[0] ?></td>
							  <td><?php echo $row[1] ?></td>
							  <td><?php echo $row[2] ?></td>
							  <td><?php echo $row[3] ?></td>
							 <td>
								<?php if($bamt <= 0 || $ctype == "Insurance"){ ?>
									<a href="#" onclick="window.open('sample2.php?bno=<?php echo $row['BillNo'] ?>','mywindow','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')"><img src="images/green.png" height="22"/></a>
								<?php }else{ ?>
									<a href="pay_due_bill.php?q=<?php echo $row['BillNo'] ?>" ><input type="button" value="Pay Due" style="color:#FFF;font-size:11px;font-weight:bold;width:70px;height:22px;background-image:url(images/red.jpg);border-style:none;" /></a>
								<?php } ?>
							 </td>
							 <td><a href="edit_result.php?bno=<?php echo $row['BillNo'] ?>"><img src="images/edit1.jpg" height="21"/></a></td>
                          <td><?php if($b == $blno){ ?>
									<?php echo $count2; ?>
								<?php }else{?>
							<?php 	echo "0"; ?>
								<?php }?></td>
						  </tr>
						 <?php } } } } ?>
						 </tbody> 
						 
				</table>
				
				<?php }?>
				
				<table>
					<tr >
					   <td colspan="5"><?php if($rows<=0) {?><div align="right"><font color="#FF6600">No More Records</font> </div><?php }?>
					   </td>
					</tr> 
                   </table> 
				   <table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody><tr>
					<td width="813">&nbsp;</td>
					<td align="left" width="34"></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a href="result_entry.php?next=0" ><?php } ?><img src="images/first.gif" alt="First" border="0" ></a></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a  href="result_entry.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" border="0" ></a></td>
				   <td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="result_entry.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" alt="Next" border="0" ></a></td>
					<td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="result_entry.php?next=<?php echo (($records - 1) / $nd) ?>"><?php } ?><img src="images/last.gif" alt="Last" border="0" ></a></td>
				  </tr>
				</tbody>
				</table>
				<table>
				<?php if ($rowscounts == 0) { ?>
					   <div align="right"><font color="#FF6600">No More Records</font> </div>
						
				<?php } ?>
				</table>
</div>				
			</div>

		<?php include('footer.php'); ?>

<?php include('footer-bottom.php'); ?>

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
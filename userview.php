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

<!DOCTYPE html>

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
	$("#prd").autocomplete("set6.php", {
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
	$("#pname").autocomplete("set06.php", {
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
			  
		<div id="centre" style="height:420px;">
		  
			
         <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Users List</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="user.php"><input type="button" class="btn btn-primary" style="width:120px;height:35px;" value="Add"/></a></div>
					
					
					<div class="table-responsive">
		          <table border="0" cellpadding="0" cellspacing="0" class="table  table-bordered" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  <th width="20%">S No.</th>
                              <th width="30%">Employee Name</th>
							  <th width="10%">User Name</th>
							  
							   <th width="10%">Delete</th>
                          </tr>
						  <?php
							//include("config.php");
							
								
								$sql = mysqli_query($link,"select  * from login  ") or die(mysqli_error($link));
							
							if($sql){
								$rows=mysqli_num_rows($sql);
								if($rows > 0){
								$i=1;
								while($row = mysqli_fetch_array($sql)){
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  
                              <td><?php echo $i ?></td>
							  <td><?php echo $row['username'] ?></td>
							  <td><?php echo $row['ename'] ?></td>
							  
							   
							 
														   <td><a href="deleteuser.php?q=<?php echo $row['ename'] ?>"><img src="images/Icon_Delete.png" height="21"/></a></td>
                          
						  </tr>
						 <?php  $i++; } } } } ?>
						 </tbody> 
						 
				</table>
				
				
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
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a href="new_lab_bill.php?next=0" ><?php } ?><img src="images/first.gif" alt="First" border="0" ></a></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a  href="new_lab_bill.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" border="0" ></a></td>
				   <td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="new_lab_bill.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" alt="Next" border="0" ></a></td>
					<td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="new_lab_bill.php?next=<?php echo (($records - 1) / $nd) ?>"><?php } ?><img src="images/last.gif" alt="Last" border="0" ></a></td>
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

	<?php include("footer-bottom.php");	  ?>

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
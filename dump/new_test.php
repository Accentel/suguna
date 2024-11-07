<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{
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

<!DOCTYPE html >

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
	$("#prd").autocomplete("set3.php", {
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
	$("#prd1").autocomplete("set4.php", {
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

	<?php include('headertop.php'); ?>
		<div id="centre" style="height:auto;" >
		  
			
         <div align="centre" style="font-size:20px;color:red;font-weight:bold;margin-bottom:5px;">Lab Tests Details</div>
                
					<div align="left" style="margin-bottom:2px;float:left;"><a href="add_test.php"><input type="button" class="btn btn-primary" style="width:120px;height:35px;" value="Add"/></a></div>
					<form action="" autocomplete="off" method="post">
					<div align="right" style="margin-bottom:2px;">Search by Department Name : <input type="text" class="text" name="prd" id="prd"/> Test Name : <input type="text" class="text" name="prd1" id="prd1"/> <input type="submit" name="submit" class="butt" value="Go"/></div>
					</form>
					<div class="table-responsive">
		          <table border="0" cellpadding="0" cellspacing="0" class="table  table-bordered" id="expense_table" width="100%">
                  
                      <tbody>
                          
                          
                          <tr>
							  
                              <th>Department Name</th>
							  <th>Test Name</th>
							  <th>Amount</th>
                              <th>Edit</th>
							  <th>Delete</th>
                          </tr>
						  <?php
							include("config.php");
							if(isset($_REQUEST['submit'])){
								if($_REQUEST['prd'] != ""){
									$prdname = $_REQUEST['prd'];
									$sql = mysql_query("select distinct Department,TestName,Amount from testdetails where Department='$prdname' order by id desc");
								}
								if($_REQUEST['prd1'] != ""){
									$phone = $_REQUEST['prd1'];
									$sql = mysql_query("select distinct Department,TestName,Amount from testdetails where TestName='$phone' order by id desc");
								}
								if($_REQUEST['prd'] != "" && $_REQUEST['prd1'] != ""){
									$prdname = $_REQUEST['prd'];
									$phone = $_REQUEST['prd1'];
									$sql = mysql_query("select distinct Department,TestName,Amount from testdetails where Department='$prdname' and TestName='$phone' order by id desc");
								}
							}else{
								$sql = mysql_query("select distinct Department,TestName,Amount from testdetails order by id desc");
							}
							if($sql){
								$rows=mysql_num_rows($sql);
								if($rows > 0){
								while($row = mysql_fetch_array($sql)){
								$records++;
								$remainig_records = $remainig_records + 1;//0
								$rowscounts++;//1
								if ($rowstart <= $rowend && $remainig_records == $rowstart) {
									$rowstart++;
									$rowscounts = 0;
							?>	
						   <tr>
							  
                              <td><?php echo $row['Department'] ?></td>
							  <td><?php echo $row['TestName'] ?></td>
							  
							  <td><?php echo $row['Amount'] ?></td>
                              <td><a href="edit_test.php?dept=<?php echo $row['Department'] ?>&tname=<?php echo $row['TestName'] ?>"><img src="images/edit.gif"/></a></td>
							  <td><a href="delete_test.php?dept=<?php echo $row['Department'] ?>&tname=<?php echo $row['TestName'] ?>"><img src="images/Icon_Delete.png" height="18"/></a></td>
                          </tr>
						 <?php } } } } ?>
						</tbody>
						 
				</table>
				<table>
					<tr >
					   <td colspan="5"><?php if($rows<=0) {?><div align="right"><font color="#FF6600">No More Records</font> </div><?php }?>
					   </td>
					</tr> 
                   </table> 
				   <table border="0" cellpadding="0" cellspacing="0"  width="100%" >
					<tbody><tr>
					<td width="813">&nbsp;</td>
					<td align="left" width="34"></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a href="new_test.php?next=0" ><?php } ?><img src="images/first.gif" alt="First" border="0" ></a></td>
					<td align="right" width="25"><?php if (!($pagecount == 0)) { ?><a  href="new_test.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" border="0" ></a></td>
				   <td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="new_test.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" alt="Next" border="0" ></a></td>
					<td align="right" width="25"><?php if ($rowscounts > 0) { ?><a  href="new_test.php?next=<?php echo (($records - 1) / $nd) ?>"><?php } ?><img src="images/last.gif" alt="Last" border="0" ></a></td>
				  </tr>
				</tbody>
				</table>
				<table>
				<?php if ($rowscounts == 0) { ?>
					   <div align="right"><font color="#FF6600">No More Records</font> </div>
						
				<?php } ?>
				</table>		
			</div>

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
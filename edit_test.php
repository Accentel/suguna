<?php //include('config.php');
session_start();
include('config.php');
if($_SESSION['suguna'])
{
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
<?php
//include("config.php");

	$dept = $_REQUEST['dept'];
	$tname = $_REQUEST['tname'];
	
$sql=mysqli_query($link,"select * from testdetails where Department='$dept' and TestName='$tname'")or die(mysqli_error($link));
if($sql){
	$res = mysqli_fetch_array($sql);
	$depname = $res['Department'];
	$testname = $res['TestName'];
	$amt = $res['Amount'];
	
}

?>
  
  
<?php include('headertop.php'); ?>
		<div id="centre" style="height:auto;" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Edit Test Details</div>
		  <form name="frm" class="form-horizontal" method="post" action="update_test.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0" class="table">
                                
                        <tr >
                        <td width="40%" align="right" >Department Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="depname" id="depname" value="<?php echo $depname ?>" readonly class="text" required/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Test Name :</td>
                        <td align="left">
                            <input type="text" name="testname" id="testname" value="<?php echo $testname ?>" class="text"  required/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Price :</td>
                        <td align="left">
                            <input type="text" name="tamt" id="tamt" value="<?php echo $amt ?>"class="text"/>
                        </td>
                    </tr>
					<!--<tr >
					<td colspan="2">
					<?php if($units != Null && $nrange!=Null ){ ?>
					<table width="100%" align="center" cellpadding="0" cellspacing="0" id="expense_table">
					<tr><th>Child Test Name</th><th>Units</th><th>Normal Range</th></tr>
					<?php
					$sql1=mysqli_query($link,"select * from testdetails where Department='$dept' and TestName='$tname'")or die(mysqli_error($link));
					if($sql1){	
					while($res1 = mysqli_fetch_array($sql1)){
					$ctest1 = $res1['Ctest'];
					$units1 = $res1['Units'];
					$nrange1 = $res1['NormalRange'];
					?>
					<tr >
                        <td >
                            <input type="text" name="ctest[]" id="ctest" value="<?php echo $ctest1 ?>" class="text"/>
                        </td>
                    
                        <td >
                            <input type="text" name="units[]" id="units" value="<?php echo $units1 ?>" class="text"/>
                        </td>
                   
                        <td >
                            <input type="text" name="nrange[]" id="nrange" value="<?php echo $nrange1 ?>" class="text"/>
                        </td>
                    </tr>
					<?php } } ?>
					</table>
					<?php }else{ ?>
					<table width="100%" align="center" cellpadding="0" cellspacing="0" id="expense_table">
					<tr><th>Child Test Name</th></tr>
					<?php
					$sql2=mysqli_query($link,"select * from testdetails where Department='$dept' and TestName='$tname'")or die(mysqli_error($link));
					if($sql2){	
					while($res2 = mysqli_fetch_array($sql2)){
					$ctest2 = $res2['Ctest'];
					
					?>
					<tr >
                        <td >
                            <input type="text" name="ctest1[]" id="ctest1" value="<?php echo $ctest2 ?>" size="50" class="text"/>
                        </td>
                    
                        
                    </tr>
					<?php }} ?>
					</table>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">Interpretation : <textarea cols="170" rows="5" name="inter" id="inter"><?php echo $inter ?></textarea></td>
				</tr>-->	
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Update" Class="btn btn-primary"/> <input type="button" value="Close" Class="btn btn-danger" onclick="window.location.href='new_test.php'"/></td>
            </tr>
        </table>
		 </form>

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
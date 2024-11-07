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

	$dn = $_REQUEST['dn'];
	
$sql=mysqli_query($link,"select * from ddetails where DoctorName='$dn'")or die(mysqli_error($link));
if($sql){
	$res = mysqli_fetch_array($sql);
	$doname = $res['DoctorName'];
	$doaddr = $res['Address'];
	$dophno = $res['PhNo'];
	$doper = $res['Percentage'];
}

?>
  
  
	<?php include('headertop.php'); ?>
			   
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Edit Doctor Details</div>
		  <form name="frm" method="post" class="form-horizontal">
			<div class="table-responsive">
			<table width="100%" border="0" cellpadding="4" cellspacing="0" class="table">
                                
                            <tr >
                        <td width="40%" align="right" >Doctor Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="dname" id="dname" value="<?php echo $doname ?>" class="text" required/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Address :</td>
                        <td align="left">
                            <input type="text" name="daddr" id="daddr" value="<?php echo $doaddr ?>" class="text" required/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Phone No. :</td>
                        <td align="left">
                            <input type="text" name="dphno" id="dphno" value="<?php echo $dophno ?>"class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Percentage :</td>
                        <td align="left">
                            <input type="text" name="dper" id="dper" value="<?php echo $doper ?>" class="text"/>
                        </td>
                    </tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Update" Class="btn btn-primary"/> <input type="button" value="Close" Class="btn btn-danger" onclick="window.location.href='new_doctor.php'"/></td>
            </tr>
        </table>
		</div>
		 </form>
<?php
//include("config.php");
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	
	$dname=$_REQUEST['dname'];
	$daddr=$_REQUEST['daddr'];
	$dphno=$_REQUEST['dphno'];
	$dper=$_REQUEST['dper'];
	
	
$sq=mysqli_query($link,"update ddetails set DoctorName='$dname',Address='$daddr',PhNo='$dphno',Percentage='$dper' where DoctorName='$dn'")or die(mysqli_error($link));
if($sq){
	print "<script>";
	print "alert('Successfully updated ');";
	print "self.location='new_doctor.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('doctor name already exists');";
	print "self.location='edit_doctor.php?dn=$dn';";
	print "</script>";
}
}
?>		 
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
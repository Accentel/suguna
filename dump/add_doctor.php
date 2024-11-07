<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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
include("config.php");
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	
	$dname=$_REQUEST['dname'];
	$daddr=$_REQUEST['daddr'];
	$dphno=$_REQUEST['dphno'];
	$dper=$_REQUEST['dper'];
	
	
$sq=mysql_query("insert into ddetails(DoctorName,Address,PhNo,Percentage) values('$dname','$daddr','$dphno','$dper')");
if($sq){
	print "<script>";
	print "alert('Successfully saved ');";
	print "self.location='new_doctor.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('doctor name already exists');";
	print "self.location='new_doctor.php';";
	print "</script>";
}
}
?>
  
  
	<?php include('headertop.php'); ?>
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Add Doctor Details</div>
		  <form name="frm" method="post" class="form-horizontal">
			<table width="100%" border="0" cellpadding="4" cellspacing="0" class="table ">
                                
                            <tr >
                        <td width="40%" align="right" >Doctor Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="dname" id="dname" class="text" required/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Address :</td>
                        <td align="left">
                            <input type="text" name="daddr" id="daddr" class="text" required/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Phone No. :</td>
                        <td align="left">
                            <input type="text" name="dphno" id="dphno" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Percentage :</td>
                        <td align="left">
                            <input type="text" name="dper" id="dper" value="0" class="text"/>
                        </td>
                    </tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" Class="btn btn-primary"/> <input type="button" value="Close" class="btn btn-danger" onclick="window.location.href='new_doctor.php'"/></td>
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
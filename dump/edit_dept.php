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
include("config.php");


	$dcode=$_REQUEST['dcode'];

$sql=mysql_query("select * from masterdept where deptcode='$dcode'");
if($sql){
	$res = mysql_fetch_array($sql);
	$decode = $res['deptcode'];
	$dename = $res['deptname'];
}

?>
  
	<?php include('headertop.php');?>
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Edit Departments</div>
		  <form name="frm" class="form-horizontal" method="post" >
			<table width="100%" border="0" cellpadding="4" cellspacing="0" class="table">
                                
                            <tr >
                        <td width="40%" align="right" >Department Code :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="dcode1" id="dcode1" value="<?php echo $decode ?>" class="text" required/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Department Name :</td>
                        <td align="left">
                            <input type="text" name="dname" id="dname" value="<?php echo $dename ?>" class="text" required/>
                        </td>
                    </tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Update" Class="btn btn-primary"/> <input type="button" value="Close" Class="btn btn-danger" onclick="window.location.href='new_dept.php'"/></td>
            </tr>
        </table>
		 </form>
<?php
include("config.php");
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	$dcode1=$_REQUEST['dcode1'];
	$dname=$_REQUEST['dname'];
	
	
$sq=mysql_query("update masterdept set deptcode='$dcode1',deptname='$dname' where deptcode='$dcode'");
if($sq){
	print "<script>";
	print "alert('Successfully updated ');";
	print "self.location='new_dept.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('dept already exists');";
	print "self.location='edit_dept.php?dcode=$dcode';";
	print "</script>";
}
}
?>		 
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
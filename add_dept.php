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
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	$dcode=$_REQUEST['dcode'];
	$dname=$_REQUEST['dname'];
	
	
$sq=mysqli_query($link,"insert into masterdept(deptcode,deptname) values('$dcode','$dname')") or die(mysqli_error($link));
if($sq){
	print "<script>";
	print "alert('Successfully saved ');";
	print "self.location='new_dept.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('dept already exists');";
	print "self.location='add_dept.php';";
	print "</script>";
}
}
?>
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
			  ?>
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Add Departments</div>
		  <div class="table-responsive">
		  <form  class="form-horizontal" method="post">
			<table class="table table-responsive" align="center" >
                                
                            <tr >
                        <td width="40%" align="right" >Department Code :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="dcode" id="dcode" class="text" required/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Department Name :</td>
                        <td align="left">
                            <input type="text" name="dname" id="dname" class="text" required/>
                        </td>
                    </tr>
 
            <tr >
                <td colspan="2" align="center"><input  type="submit" name="submit" value="Save" Class="btn btn-primary"/> <input type="button" value="Close" Class="btn btn-danger" onclick="window.location.href='new_dept.php'"/></td>
            </tr>
        </table>
		 </form>
		 </div>
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
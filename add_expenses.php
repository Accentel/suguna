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
	$edate=date('Y-m-d',strtotime($_REQUEST['edate']));
	$ename=$_REQUEST['ename'];
	$amt=$_REQUEST['amt'];
	$purp=$_REQUEST['purpose'];
	
$sq=mysqli_query($link,"insert into expensemstr(date,name,amount,purpose) values('$edate','$ename',$amt,'$purp')") or die(mysqli_error($link));
if($sq){
	print "<script>";
	print "alert('Successfully saved ');";
	print "self.location='new_expenses.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_expenses.php';";
	print "</script>";
}
}
?>
  
	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['suguna']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Add Expenses</div>
		  <form name="frm" method="post" action="#">
			<table width="100%" border="0" cellpadding="4" cellspacing="0" class="table">
                                
                            <tr >
                        <td width="40%" align="right" >Date:</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="edate" id="edate" style="width:188px;height:20px;" value="<?php echo date('d-m-Y') ?>" class="tcal"/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" > Name :</td>
                        <td align="left">
                            <input type="text" name="ename" id="ename" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" > Amount :</td>
                        <td align="left">
                            <input type="text" name="amt" id="amt" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" > Purpose :</td>
                        <td align="left">
                            <textarea name="purpose" id="purpose" cols="28" rows="3"></textarea>
                        </td>
                    </tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" Class="btn btn-primary"/> <input type="button" value="Close" Class="btn btn-danger" onclick="window.location.href='new_expenses.php'"/></td>
            </tr>
        </table>
		 </form>
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
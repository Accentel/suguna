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
	
	</head>

	<body>
<?php
include("config.php");
$id = $_REQUEST['id'];
$sql=mysql_query("select * from expensemstr where id=$id");
if($sql){
	$row = mysql_fetch_array($sql);
	$date = date('d-m-Y',strtotime($row['date']));
	$name = $row['name'];
	$amt = $row['amount'];
	$purpose = $row['purpose'];
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
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                            <tr >
                        <td width="40%" align="right" >Date:</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="edate" id="edate" style="width:188px;height:20px;" value="<?php echo $date ?>" class="tcal"/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" > Name :</td>
                        <td align="left">
                            <input type="text" name="ename" value="<?php echo $name ?>" id="ename" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" > Amount :</td>
                        <td align="left">
                            <input type="text" name="amt" value="<?php echo $amt ?>" id="amt" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" > Purpose :</td>
                        <td align="left">
                            <textarea name="purpose" id="purpose" cols="28" rows="3"><?php echo $purpose ?></textarea>
                        </td>
                    </tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Update" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_expenses.php'"/></td>
            </tr>
        </table>
		 </form>
<?php
include("config.php");
if(isset($_REQUEST['submit'])){

	//error_reporting(E_ALL);
	$edate=date('Y-m-d',strtotime($_REQUEST['edate']));
	$ename=$_REQUEST['ename'];
	$eamt=$_REQUEST['amt'];
	$purp=$_REQUEST['purpose'];
	
$sq=mysql_query("update expensemstr set date='$edate',name='$ename',amount=$eamt,purpose='$purp' where id=$id");
if($sq){
	print "<script>";
	print "alert('Successfully updated ');";
	print "self.location='new_expenses.php';";
	print "</script>";

}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='edit_expenses.php?id=$id';";
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
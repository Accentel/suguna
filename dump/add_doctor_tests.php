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

  
	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['suguna']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Add Doctor Percentage Details</div>
		  <form name="frm" method="post">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                    <tr >
                        <td width="40%" align="right" >Doctor Name :</td>
                        <td width="60%"  align="left" >
                            <select name="user_id" id="user_id" style="width:230px;height:24px;">
							<option value=""> -- Select -- </option>
							<option value="Dr. Rajesh">Dr. Rajesh</option>
							<option value="Dr. Mahesh">Dr. Mahesh</option>
							<option value="Dr. Naresh">Dr. Naresh</option>
							<option value="Dr. Madhavi">Dr. Madhavi</option>
							</select>
                        </td>
                    </tr>
					<table width="100%" id="expense_table">
                    <tr>
					  <th>Test Name</th>
					  <th>Amount</th>
					  <th>Commission</th> 
					 </tr> 
					 <tr>
					  <td>CSF Bio</td>
					  <td>100.00</td>
					  <td><input type="text" class="text"/></td> 
					 </tr> 
					 <tr>
					  <td>Fibrinogen</td>
					  <td>100.00</td>
					  <td><input type="text" class="text"/></td> 
					 </tr>
					 <tr>
					  <td>LDH</td>
					  <td>100.00</td>
					  <td><input type="text" class="text"/></td> 
					 </tr>
					 <tr>
					  <td>CA125</td>
					  <td>100.00</td>
					  <td><input type="text" class="text"/></td> 
					 </tr>
					 </table>
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_doctor.php'"/></td>
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
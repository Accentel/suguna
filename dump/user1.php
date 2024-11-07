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
 if(isset($_REQUEST['submit'])){
 $abc1=$_POST['user_id'];
 $abc2=$_POST['pwd'];

 $qurey="insert into login(username,password) VALUES('$abc1','$abc2')";
 mysql_query($qurey)or die(mysql_error());
 if($qurey){
	 print"<script>";
	 print"alert('sucessfully Saved');";
	 print"</script>";

 }
 }
 ?>
	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['suguna']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Create User</div>
		  <form name="frm" method="post">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                            <tr >
                        <td width="40%" align="right" >User Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="user_id" id="user_id" class="home_textbox"/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >Password :</td>
                        <td align="left">
                            <input type="password" name="pwd" id="pwd" class="home_textbox"/>
                        </td>
                    </tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="submit" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='home.php'"/></td>
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
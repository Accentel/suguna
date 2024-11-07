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
//include("config.php");
 
if(isset($_POST['submit']))
{
$UserName=$_POST['uname'];
$Oldpassword=$_POST['cpass'];
$Newpassword=$_POST['npass'];
$Confpassword=$_POST['cnpass'];

$add="select * from login where username='$UserName'";
$res=mysqli_query($link,$add) or die("it is not connect to data base".mysqli_error($link));
$row=mysqli_fetch_array($res); 
$dbname=$row['username'];
$dbpass=$row['password'];
if('$dbpass==$Oldpassword' && '$Newpassword==$Confpassword')                     
{
$q="update login set password='$Newpassword' where username='$dbname'";
$rel=mysql_query($q);
if($rel)
{
print "<script>";
	print "alert('password changed successfylly');";
	print "self.location='changepassword.php';";
	print "</script>";
//header('location:Change-Pass.php');
}
else
{
echo "password not change";
}
}
else                  
{
echo "password not change";
}
}
?>
	
			  <?php
				include("headertop.php");
			  ?>
			   
		<div id="centre" >
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Change Password</div>
		  <form name="frm" method="post">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                 <tr >
                        <td width="40%" align="right" ></td>
                        <td width="60%"  align="left" >
                            <input type="hidden" name="uname"  value="<?php echo $_SESSION['suguna']; ?>"id="uname" class="text" required/>
                        </td>
                    </tr>
                            <tr >
                        <td width="40%" align="right" >Current Password :</td>
                        <td width="60%"  align="left" >
                            <input type="password" name="cpass" id="cpass" class="text" required/>
                        </td>
                    </tr>
                     <tr >
                        <td align="right" >New Password :</td>
                        <td align="left">
                            <input type="password" name="npass" id="npass" class="text" required/>
                        </td>
                    </tr>
 					<tr >
                        <td align="right" >Confirm Password :</td>
                        <td align="left">
                            <input type="password" name="cnpass" id="cnpass" class="text" required/>
                        </td>
                    </tr>
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_dept.php'"/></td>
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
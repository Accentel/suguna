<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna1'])
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
$sq=mysql_query("select * from org");
if($sq){
while($re=mysql_fetch_array($sq)){
	
$orgname=$re['org'];
$address=$re['address'];
$phone=$re['phno'];
$rphone = $re['rphone'];
$rname = $re['rname'];
$pstatus = $re['pstatus'];
$pstatus1 = $re['pstatus1'];
$s1 = $re['s1'];
$s2 = $re['s2'];
$sstatus = $re['sstatus'];
$sstatus1 = $re['sstatus1'];
$id = $re['id'];
}
}
?>


	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['suguna1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--<a href="logout1.php">Logout</a>--></b></div>
			
			  <?php
				include("main_menu.php");
			  ?>
			           
                              
			<div id="centre" >
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Organization Details</div>
                <form name="frm" method="post" onSubmit="return fun()">
				<table border="0" align="center" cellspacing="0" cellpadding="5" width="100%">
                 
                    <tbody>
                        
						<tr>
                            <td width="40%" align="right">Organization Name <font color="red">*</font> : </td>
                           <td><input type="text" class="text" name="cname" id="cname" value="<?php echo $orgname ?>"></td></tr>
					<tr>
                            <td align="right">Address <font color="red">*</font> : </td>
                            <td><textarea name="addr" class="textarea1" cols="28" rows="3"><?php echo $address?></textarea></td></tr>
					<tr>
                            <td align="right">Phone No. <font color="red">*</font> : </td>
                            <td><input type="text" class="text" value="<?php echo $phone ?>" name="phone" id="phone" /></td></tr>
					<tr>
                            <td align="right">Registration Name<font color="red">*</font> : </td>
                            <td><input type="text" class="text" value="<?php echo $rname ?>" name="rname" id="rname" /></td></tr>
					<tr>
                            <td align="right">Phone No. <font color="red">*</font> : </td>
                            <td><input type="text" class="text" value="<?php echo $rphone ?>" name="rphone" id="rname" /></td></tr>
					<tr>
                            
                            <td align="right">
							<?php if($pstatus == "T"){ ?>
							<input type="checkbox" name="det" id="det" checked /> Visible in Report Print Page
							<?php }if($pstatus == "F"){?>
							<input type="checkbox" name="det" id="det" /> Visible in Report Print Page
							<?php } ?>
							</td>
							
                            <td style="padding-left:70px;">
							<?php if($pstatus1 == "T"){ ?>
							<input type="checkbox" name="det3" id="det3" checked /> Visible in Bill Print Page
							<?php }if($pstatus1 == "F"){?>
							<input type="checkbox" name="det3" id="det3" /> Visible in Bill Print Page
							<?php } ?>
							</td>
					</tr>
					<tr>
                            <td align="right">Signature-1<font color="red">*</font> : </td>
                            <td><input type="text" class="text" value="<?php echo $s1 ?>" name="s1" id="s1" /></td></tr>
					<tr>
                            <td align="right"></td>
                            <td>
							<?php if($sstatus1 == "T"){ ?>
							<input type="checkbox" name="det2" id="det2" checked /> Signature-1 Visible in Print Page
							<?php }if($sstatus1 == "F"){?>
							<input type="checkbox" name="det2" id="det2" /> Signature-1 Visible in Print Page
							<?php } ?>
							</td></tr>
					<tr>
                            <td align="right">Signature-2<font color="red">*</font> : </td>
                            <td><input type="text" class="text" value="<?php echo $s2 ?>" name="s2" id="s2" /></td></tr>
					<tr>
                            <td align="right"></td>
                            <td>
							<?php if($sstatus == "T"){ ?>
							<input type="checkbox" name="det1" id="det1" checked /> Signature-2 Visible in Print Page
							<?php }if($sstatus == "F"){?>
							<input type="checkbox" name="det1" id="det1" /> Signature-2 Visible in Print Page
							<?php } ?>
							</td></tr>
					
					    <tr>
                            <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Save" class="butt">
                           <a href="home.php"><input type="button" name="submit" value="Close" class="butt"></td></tr>
				</table>
			   </form>

				</div>
<?php
if(isset($_POST['submit'])){

	error_reporting(E_ALL);
	$cname=$_POST['cname'];
	$addr=$_POST['addr'];
	$phone1=$_POST['phone'];
	$rname1 = $_POST['rname'];
	$rphone1 = $_POST['rphone'];
	if(isset($_POST['det'])){$det="T";}else{$det="F";}
	$sig1=$_POST['s1'];
	$sig2=$_POST['s2'];
	if(isset($_POST['det1'])){$det1 = "T";}else{$det1 = "F";}
	if(isset($_POST['det2'])){$det2 = "T";}else{$det2 = "F";}
	if(isset($_POST['det3'])){$det3 = "T";}else{$det3 = "F";}
	
	
	$sq=mysql_query("update org set org='$cname',address='$addr',phno='$phone1',rname='$rname1',rphone='$rphone1',pstatus='$det',pstatus1='$det3',s1='$sig1',s2='$sig2',sstatus='$det1',sstatus1='$det2' where id=$id");
	if($sq){
		print "<script>";
		print "alert('Successfully updated');";
		print "self.location='org.php';";
		print "</script>";
	
	}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='org.php';";
	print "</script>";
}
}
?>
		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else
{
session_destroy();

session_unset();

header('Location:orglogin1.php?authentication failed');

}

?>
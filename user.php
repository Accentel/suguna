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
 if(isset($_REQUEST['submit'])){
 $abc1=$_POST['user_id'];
 $abc2=$_POST['pwd'];

 $qurey="insert into login(username,password) VALUES('$abc1','$abc2')";
 mysqli_query($link,$qurey)or die(mysqli_error($link));
 if($qurey){
	 print"<script>";
	 print"alert('sucessfully Saved');";
	 print"</script>";

 }
 }
 ?>
	 <?php
				include("headertop.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">User Management</div>
		  <form name="frm" method="post" action="user_insert.php">
		  <div class="table-responsive">
			<table width="100%" border="0" cellpadding="2" cellspacing="0" class="table">
                    <tr >
                        <td width="40%" align="right" >Employee Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="ename" id="ename" class="home_textbox"/>
                        </td>
                    </tr>            
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
					<tr>
					<td align="left" colspan="2">
		<table width="100%" id="mainmenu" style="text-align:left;margin-left:20px;" cellpadding="0" cellspacing="0" border="0">
		<tr >
            <td colspan="8"><div align="center"><font color="#FF0000"><b>Main Menu</b></font></div></td>
            </tr>
		
		
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="2" />&nbsp;&nbsp; <b>SETTINGS</b>
        </div>
		<div class="checkcust" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="21" />&nbsp;&nbsp; Add Department<br>
			<input type="checkbox" name="menu[]" value="22" />&nbsp;&nbsp; Add Tests<br>
			<input type="checkbox" name="menu[]" value="23" />&nbsp;&nbsp; Add Doctor<br>
			<input type="checkbox" name="menu[]" value="24" />&nbsp;&nbsp; Create Package<br>
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="3" />&nbsp;&nbsp; <b>BILLING</b>
        </div>
		<div class="checkprd" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="31" />&nbsp;&nbsp; Lab Bill<br>
			
			<input type="checkbox" name="menu[]" value="33" />&nbsp;&nbsp; View Bill / Pay Balance<br>
			
			<input type="checkbox" name="menu[]" value="36" />&nbsp;&nbsp; Outer Lab Bill<br>
			
			<input type="checkbox" name="menu[]" value="37" />&nbsp;&nbsp; View Outer Bill / Pay Balance<br>
			
			
			
			<input type="checkbox" name="menu[]" value="34" />&nbsp;&nbsp; Result Entry List<br>
			<input type="checkbox" name="menu[]" value="35" />&nbsp;&nbsp; Select Report Test-wise<br>
			<input type="checkbox" name="menu[]" value="32" />&nbsp;&nbsp; Patient History<br>
		
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="4" />&nbsp;&nbsp; <b>REPORTS</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="41" />&nbsp;&nbsp; Management Info<br>
			<input type="checkbox" name="menu[]" value="42" />&nbsp;&nbsp; Duplicate Reports<br>
			<input type="checkbox" name="menu[]" value="43" />&nbsp;&nbsp; Biopsy Report<br>
			<input type="checkbox" name="menu[]" value="44" />&nbsp;&nbsp; Cytology / Fnac Report<br>
			<input type="checkbox" name="menu[]" value="45" />&nbsp;&nbsp; Blank Report<br>
			<input type="checkbox" name="menu[]" value="46" />&nbsp;&nbsp; Culture Report<br>
			<input type="checkbox" name="menu[]" value="47" />&nbsp;&nbsp; Tests Cost<br>
			<input type="checkbox" name="menu[]" value="48" />&nbsp;&nbsp; Expenses<br>
			<input type="checkbox" name="menu[]" value="49" />&nbsp;&nbsp; Emp Day Collection<br>
			
		</div>
		</td>
		
		  <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="8" />&nbsp;&nbsp; <b>REVIEW</b>
        </div>
		<div class="checkqut" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="81" />&nbsp;&nbsp; Reports<br>
		
			
		</div>
		</td>
        <td ></td>
        </tr>
		
        <tr >
        <td valign="top" class="label1" colspan="2">
		<div align="left">
            <input type="checkbox" name="menu[]" value="5" />&nbsp;&nbsp; <b>REGISTRATION</b>
        </div>
		<div class="checkpur" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="51" />&nbsp;&nbsp; Organization Details<br>
			<input type="checkbox" name="menu[]" value="52" />&nbsp;&nbsp; User Management<br>
			
		</div>
		</td>
        <td ></td>
        
        <td valign="top" class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="6" />&nbsp;&nbsp; <b>CASE SHEET</b>
        </div>
		<div class="checkinv" align="left" style="margin-top:10px;margin-bottom:10px;margin-left:10px;">
			<input type="checkbox" name="menu[]" value="61" />&nbsp;&nbsp; DAILY CASE SHEET<br>
			<input type="checkbox" name="menu[]" value="62" />&nbsp;&nbsp; Outer DAILY CASE SHEET<br>
		</div>
		</td>
        <td colspan="2" class="label1" ></td>
        
        <td class="label1" colspan="2" >
		<div align="left">
            <input type="checkbox" name="menu[]" value="7" />&nbsp;&nbsp; <b>Change Password</b>
        </div>
		
		</td>
        <td ></td>
        </tr>
  
       
                </table>
		</td>
		</tr>
 
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" class="btn btn-primary"/> <input type="button" value="Close" class="btn btn-danger" onclick="window.location.href='home.php'"/></td>
            </tr>
        </table>
		</div>
		 </form>
			</div>

		<?php include('footer.php'); ?>

	 <?php
				include("footer-bottom.php");
			  ?>
			   

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
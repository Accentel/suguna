<?php //include('config.php');
session_start();
if($_SESSION['suguna'])
{
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
	<?php
		include("header.php");
	?>
<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>


	</head>

	<body>

	
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
		   <?php
				include("config.php");
				
				$sql = mysqli_query($link,"select * from org");
				if($sql)
				{
					$row = mysqli_fetch_array($sql);
					$pstatus=$row['pstatus'];
					$orgname = $row['org'];
					$orgaddr = $row['address'];
					$orgphone = $row['phno'];
					$s1 = $row['s1'];
					$s2 = $row['s2'];
					$sstatus=$row['sstatus'];
					$sstatus1=$row['sstatus1'];
				}
		   ?>
            <td>
                <table width="100%" border="0" align="center"  cellpadding="5" cellspacing="0" >
                    <tr>
                        <td align="center" style="font-size:24px;" colspan="6"><?php if($pstatus=="T"){ echo $orgname; } ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php if($pstatus=="T"){ echo $orgaddr; } ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php if($pstatus=="T"){ echo "Phone : ".$orgphone; } ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
        </table>
            </td>
        </tr>
	<?php
			//include("config.php");

			$bno = $_REQUEST['bno'];
			
			$sql= mysqli_query($link,"select distinct ID,REPORTDATE,PATIENTNAME,AGE,SEX,DOCTORNAME,testname,possnage,note from culture where ID='$bno'");
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['REPORTDATE']));
				$patname = $row['PATIENTNAME'];
				
				$age = $row['AGE'];
				$gender = $row['SEX'];
				$dname = $row['DOCTORNAME'];
				$note =$row['note'];
				$tname =$row['testname'];
				$status =$row['possnage'];
				
				
				$note =$row['note'];
				
			}	
		?>
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top"  align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="90%" border="0" align="center" style="font-size:12px;" cellpadding="2" cellspacing="0" >
          
          <tr height="70">
            <td colspan="4"></td>
             </tr>
         <tr>
         
            <td width="20%"><div align="left">Bill No. </div></td>
			<td width="32%"> : <b><?php echo $bno ?></b></td>
            <td width="16%"><div align="left">Date </div></td>
			<td width="32%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
         
            <td width="20%"><div align="left">Patient Name </div></td>
			<td width="32%"> : <b><?php echo $patname ?></b></td>
           
            <td ><div align="left">Age / Sex </div></td>
			<td> : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
			
			  <tr>
           
            <td><div align="left">Ref. By </div></td>
			<td> : <b><?php echo $dname ?></b></td>
          
          </tr>
		    <tr>
           
            <td><div align="left">Test Name</div></td>
			<td> : <b><?php echo $tname ?></b></td>
          
          </tr>
		  <tr>
			<td colspan="4">
			<?php if($status == "Negative"){ ?>
			<table width="100%" style="border-bottom:1px solid #000000;border-top:1px solid #000000;" cellpadding="5" cellspacing="0">
				<tr >
					<td width="100%"><b><pre><?php echo $note ?></pre></b></td>
				
				</tr>
			</table>
			<?php }if($status == "Positive"){ 
			$sql1= mysql_query("select * from culture where ID='$bno'");
			if($sql1)
			{
			?>
			<table width="100%" style="border-top:1px solid #000000;" cellpadding="5" cellspacing="0">
			
			<tr >
					<td width="30%" align="center"><b>Sensitivity</b></td>
					<td width="30%" align="center"><b>Moderate</b></td>
					<td width="30%" align="center"><b>Resistant</b></td>
				
			</tr>
			<?php
				while($row1 = mysql_fetch_array($sql1)){
				$sens =$row1['sensitivity'];
				$mode =$row1['moderate'];
				$resi =$row1['resistanct'];
			?>
			<tr >
					<td width="30%" align="center"><?php echo $sens ?></td>
					<td width="30%" align="center"><?php echo $mode ?></td>
					<td width="30%" align="center"><?php echo $resi ?></td>
				
			</tr>
			
			<?php } } } ?>
			</table>
			</td>
		  </tr>
          
			<tr height="20"></tr>
        </table></td>
      </tr>
      <tr><td align="center" >
	  <table style="font-size:12px;" width="70%" cellpadding="0" cellspacing="0" >
        <tr height="70"></tr>
		<tr><td height="18"><b><?php if($sstatus1=="T"){ echo $s1; }?></b></td><td valign="top"><div align="right"><b><?php if($sstatus=="T"){ echo $s2; } ?></b></div></td>
      </tr>
	  </table>
	  </td></tr>
    </table>
	</tr>
	</td>
  </tr>
 
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
      </tr>
        </table>
		  

	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>
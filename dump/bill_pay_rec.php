<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])

{
$emp_id = $_SESSION['suguna'];
$r=mysql_query("select ename from login where username='$emp_id'");
$row=mysql_fetch_array($r);
$empname=$row['ename'];
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
				
				$sql = mysql_query("select * from org");
				if($sql)
				{
					$row = mysql_fetch_array($sql);
					$pstatus1=$row['pstatus1'];
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
                <table width="100%" border="0" align="center" style="border-bottom:1px solid #000000;" cellpadding="5" cellspacing="0" >
                    <tr>
                        <td align="center" style="font-size:24px;" colspan="6"><?php if($pstatus1=="T"){ echo $orgname; } ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php if($pstatus1=="T"){ echo $orgaddr; } ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php if($pstatus1=="T"){ echo "Phone : ".$orgphone;} ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
        </table>
            </td>
        </tr>
	<?php

			$bno = $_REQUEST['bno'];
			$pname = $_REQUEST['pn'];
			$cdue = $_REQUEST['cdue'];
			$rbal = $_REQUEST['rbal'];
			$bdate = $_REQUEST['bd'];
			$tot = $_REQUEST['t'];
		?>
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top"  align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td colspan="2" align="center" valign="top" >
		
		<table width="100%" border="0" align="center" style="vertical-align:text-top" cellpadding="4" cellspacing="0" >
          
          <tr>
            <td colspan="4" align="center"><b><u>Bill Payment Reciept</u></b></td>
             </tr>
			<tr height="10"></tr> 
         <tr>
         
            <td width="25%"><div align="left">Bill No. <?php echo $bno ?></div></td>
			<td width="25%"><div align="left"> : <b><?php echo $bno ?><b></div></td>
			
			<td width="25%"><div align="left">Paid Date</div></b></td>
			<td width="25%"><div align="left"> : <b><?php echo date('d-m-Y',strtotime($bdate)) ?></b></div></b></td>
         
		 </tr>
			<tr >   
			<td width="25%"><div align="left">Paid towards Lab Fee of</div></td>
			<td width="25%"><div align="left"> : <b> <?php echo $pname ?></b></div></td>
			
			<td width="25%"><div align="left">Total Amount </div></td>
			<td width="25%"><div align="left"> : <b>Rs. <?php echo $tot ?></b></div></td>
		
		</tr>
		<tr >  	
			<td width="25%"><div align="left">Paid Amount</div></td>
			<td width="25%"><div align="left"> : <b>Rs. <?php echo $cdue ?></b></div></td>
			
			<td width="25%"><div align="left">Balance Amount</div></td>
			<td width="25%"><div align="left"> : <b>Rs. <?php echo $rbal ?></b></div></td>
         
		 </tr>
       
          
			<tr height="20"></tr>
        </table></td>
      </tr>
      <tr><td align="center" >
		<table width="70%" cellpadding="0" cellspacing="0" >
        <tr height="70"></tr>
		<tr><td height="18"><b><?php if($sstatus1=="T"){ echo $s1; }?></b></td><td valign="top"><div align="right"><b><?php if($sstatus=="T"){ echo $s2; } ?></b></div></td>
      </tr>
	  <tr><td height="18"><?php if($sstatus1=="T"){ echo $s1; }?></b></td><td valign="top"><div align="right"><b><?php if($sstatus=="T"){ echo $empname; } ?></b></td>
      </tr>
	  </table>
	  </td></tr>
    </table>
	</tr>
	</td>
  </tr>
 
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="window.location.href='new_lab_bill.php'"/></td>
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
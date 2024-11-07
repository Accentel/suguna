<html>
<head>
<script type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
</script>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:120px;
	font:"Times New Roman", Times, serif;
	font-size:10px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}

</style>
</head>
<body>
<?php
include('config.php');
if(isset($_POST['submit'])){

$bno=$_POST['bno'];
$string=$bno[0];
				 if($string=="O"){
					$sql= mysqli_query($link,"select b.BillDate,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount from outerbill b,outerbill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
				 }else{
					 
					$sql= mysqli_query($link,"select b.BillDate,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
				 }
//$sql= mysql_query("select b.BillDate,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			if($sql)
			{
				$row = mysqli_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['BillDate']));
				$patname = $row['PatientName'];
				
				$age = $row['Age'];
				$gender = $row['Sex'];
				$dname = $row['DoctorName'];
				$total =$row['Total'];
				$consamt = $row['Discount'];
				$namt = $row['NetAmount'];
				$paid = $row['PaidAmount'];
				$bal = $row['BalanceAmount'];
				$ctype = $row['conce_type'];
				$ptype = $row['ptype'];
	
			}		

?>
	
	
<div class="page">
        <div class="subpage">
		<table>
			<tr height="20"></tr>
		<tr>
		  <td >Patient Name </td>
			<td > : <b><?php echo $patname ?></b></td>
           
            <td ><div align="right">Age / Sex </div></td>
			<td > : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
		   <tr>
         
            <td  >Bill No. </td>
			<td  width=""> :<b> <?php echo $bno ?></b></td>
            <td ><div align="right">Patient Type</div> </td>
			<td  > :<b> <?php echo $ptype; ?> / <?php echo $ctype ?></b></td>
            </tr> 
			<tr>
           
            <td colspan="4">Doctor  Name : <b><?php echo $dname ?></b></td>
			
			
          
          </tr>
		  <tr><td colspan="4"><hr></td></tr>
		<tr></tr>
		<tr >
					<td    style="color:red;"><b><u>SNO</u></b></td>
					<td    style="color:red;"><b><u>Date</u></b></td>
					<td    style="color:red;"><b><u>Test Name</u></b></td>
					<td style="color:red;"><b><u>Amount</u></b></td>
					
				</tr>
		<?php	
		
		
		if($string=="O"){
				$sql1=mysqli_query($link,"SELECT BillDate,TestName, Amount FROM outerbill WHERE BillNO = '$bno'");
				 }else{
					 
					$sql1=mysqli_query($link,"SELECT BillDate,TestName, Amount FROM bill WHERE BillNO = '$bno'");
				 }
		
		
		
				///$sql1=mysql_query("SELECT BillDate,TestName, Amount FROM bill WHERE BillNO = '$bno'");
				$p=0;
				$j=1;
				while($row1 = mysqli_fetch_array($sql1)){
				$bdate1 = date('d-m-Y',strtotime($row['BillDate']));
				$p=$p+$row1['Amount'];
				?>	
				<tr>
				<td  ><?php echo $j; ?></td>
				<td  ><?php echo $bdate1; ?></td>
				<td  ><?php echo $row1['TestName'] ?></td>
				<td   ><?php echo number_format($row1['Amount'],2) ?></td>
				</tr>
				
				<?php  $j++;} ?>
				 </tr>
				  <tr><td colspan="4"><hr></td></tr>
				  <tr>
				  <td colspan="3" align="center">Total Amount</td>
				    <td colspan="1" ><?php echo $p; ?></td>
				  </tr>
				  <tr>
				  <td colspan="3" align="center">Discount Amount</td>
				    <td colspan="1"><?php echo $consamt; ?></td>
				  </tr>
				  <tr>
				  <td colspan="3" align="center">Net Amount</td>
				    <td colspan="1" ><?php echo $p-$consamt; ?></td>
				  </tr>
				  <tr><td colspan="4"><hr></td></tr>
				 <tr>
				 <td colspan="4" align="center" style="color:#FF0000;"><b>Payment History</b></td>
				 </tr>
				  <tr><td colspan="4"><hr></td></tr>
				 <tr>
	  <td>SNo</td>
	  <td>Bill Date</td>
	  <td>Paid Amount</td>
	   <td>Payment Taken</td>
	  </tr>
				 <?php
	  
	  $r=mysqli_query($link,"select * from duebill where billno='$bno'") or die(mysql_error());
	  $i=1;
	  $t1="0";
	  while($s=mysqli_fetch_array($r)){
	  $paid=$s['paidamount'];
	  $billdate=$s['billdate'];
	  $billdate1 = date('d-m-Y',strtotime($billdate));
	  $user1=$s['user1'];
	  $billno=$s['billno'];
	  $t1=$t1+$paid;
	   ?>
	   <tr>
	   <td><?php echo $i; ?></td>
	  <td><?php echo $billdate1; ?></td>
	  <td><?php echo $paid; ?></td>
	   <td><?php echo $user1; ?></td>
	   </tr>
	  <?php  $i++; }?>
	    <tr><td colspan="4"><hr></td></tr>
	  <tr>
	  <td colspan="2">Total Paid Amount</td>
	  <td><?php echo $t1; ?></td></tr>
	   <tr><td colspan="4"><hr></td></tr>
				 

		<tr>
		<?php $q=$p-$consamt;?>
		<td colspan="2">Total Amount:<b style="color:red;"><?php echo $q; ?></b></td>
		<td>Paid Amount:<b style="color:red;"><?php echo $t1; ?></b></td>
		<td>Balance Amount:<b style="color:red;"><?php echo $q-$t1; ?></b></td>
		</tr>
		<tr>
		
		<tr height="30"></tr>
		<tr><td colspan="4" align="center"><input type="button" value="Print" id="prnt" class="butt" onClick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onClick="self.location='new_lab_bill.php'";"/></td></tr>
		</table>
		
		</div>    
    </div>
	<?php 
	}
	?>
	</body>
	</html>
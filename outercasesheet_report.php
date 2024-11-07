<?php
include("config.php");
 $sdate=$_GET['s_date'];
 $edate=$_GET['e_date'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Daily Case Sheet</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 
//include("config.php");
$sq=mysqli_query($link,"select * from org") or die(mysqli_error($link));
while($res=mysqli_fetch_array($sq)){
$oname=$res['org'];
$oaddr=$res['address'];
$ophone=$res['phno'];


 }
?>
<table align="center">
<tr><td style="text-align:center;font:24px Times New Roman;font-weight:bold;"><?php echo $oname?></td></tr>
<tr><td style="text-align:center;font:18px Times New Roman;"><?php echo $oaddr?></td></tr>
<tr><td style="text-align:center;font:18px Times New Roman;">PH.No. - <?php echo $ophone?></td></tr>
<tr height="10"></tr>
<tr><td style="text-align:center;font:18px Times New Roman;font-weight:bold;">FORM NO. 3C</td></tr>
<tr><td style="text-align:center;font:16px Times New Roman;">[See rule 6F(3)]</td></tr>
<tr><td style="text-align:center;font:16px Times New Roman;font-weight:bold;">Form Of Daily case register</td></tr>
<tr><td style="text-align:center;font:16px Times New Roman;">(to be maintained by practitioners of any system of medicine,<br>
I.E., Physicians, surgeons, Dentists, Pathologists, Radiologists,Vaids, Hakims, Etc.)
</td></tr>

</table>
<table width="100%" cellpadding="0" cellspacing="0" > 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" style="font-size:12px;" border="0">
            
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" >
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="3" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr style="outline:1px solid;">
                            <td align="left"><b>Date</b></td>
                            <td align="center"><b>Bill No.</b></td>
							<td align="center"><b>Patient's Name</b></td>
							<td align="center"><b>Doctor Name</b></td>
							<td align="center"><b>Nature of professional services rendered,<br>i.e, general<br>consultation, surgery, injection, visit, etc.</b></td>
                            <td align="center"><b>Fees Received</b></td>
							<td align="center"><b>Receipt Date</b></td>
						</tr>
						<?php
							//include("config.php");
							$sql1 = mysqli_query($link,"select distinct BillNO,PatientName,DoctorName,BillDate from outerbill1 where BillDate between '$sdate1' and '$edate1' order by bid asc") or die(mysqli_error($link));
							if($sql1){
							
							while($row1 = mysqli_fetch_array($sql1)){
							$bno = $row1['BillNO'];
							$bdate = $row1['BillDate'];
							$pname = $row1['PatientName'];
							$dname = $row1['DoctorName'];
							
							
						?>
						<tr >
                            <td valign="top" align="left"><?php echo $bdate ?></td>
                            <td valign="top" align="center"><?php echo $bno ?></td>
							<td valign="top" align="center"><?php echo $pname ?></td>
							<td valign="top" align="center"><?php echo $dname ?></td>
							<td valign="top" align="center" colspan="3">
							<table width="100%">
								<?php
									$sql2 = mysqli_query($link,"select distinct TestName,Amount,BillDate from outerbill where BillDate between '$sdate1' and '$edate1' and BillNO='$bno'") or die(mysqli_error($link));
									if($sql2){
									$sum = 0;
									
									while($row2 = mysqli_fetch_array($sql2)){
									$amt = $row2['Amount'];	
									$sum = ($sum+$amt);
									
								?>
								<tr>
								<td align="left" style="padding-left:20px;"><?php echo $row2['TestName'] ?></td>
								<td align="right" ><?php echo number_format($row2['Amount'],2) ?></td>
								<td align="right" style="padding-right:20px;"><?php echo $row2['BillDate'] ?></td>
								</tr>
								<?php } } ?>
							</table>
							
							</td>
                            </tr>
                        <?php } } ?>
						<tr >
						<?php 
						 $rr="select  sum(Amount) as Total1 from outerbill where BillDate between '$sdate1' and '$edate1' ";
						$sql3 = mysqli_query($link,$rr) or die(mysqli_error($link));
						
						$r=mysqli_fetch_array($sql3);
						{
						$total=$r['Total1'];
						}
						?>
                            <td valign="top" align="left"></td>
                            <td valign="top" align="center"></td>
							<td valign="top" align="center"></td>
							<td valign="top" align="center"></td>
							
							<td valign="top" align="center"><b>Grand Total</b></td>
							<td valign="top" align="center"><b><?php echo number_format($total,2) ?></b></td>
							<td valign="top" align="center" >
						
						</tr>	
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>

<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $dname = $_GET['dname'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Doctor Commission</title>
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
include("config.php");
$sq=mysql_query("select * from org");
while($res=mysql_fetch_array($sq)){
$oname=$res['org'];
$oaddr=$res['address'];
$ophone=$res['phno'];

 }
?>
<table align="center">
<tr><td style="text-align:center;color:#03C; font:32px Book Antiqua;font-weight:bold;"><?php echo $oname?></td></tr>
<tr><td style="text-align:center;font:18px Book Antiqua;"><?php echo $oaddr?></td></tr>

</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">X-RAY</td>
            </tr>
            <tr>
                <td>Doctor Name : <b><?php echo $dname ?></b></td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="2" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
						<?php
							$qry1=mysql_query("select Percentage from ddetails where DoctorName='$dname'");
							if($qry1){
								$row1 = mysql_fetch_array($qry1);
								$perc = $row1[0];
							}
						?>	
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Bill No.</b></td>
							<td align="center"><b>Date</b></td>
                            <td align="center"><b>Patient Name</b></td>
							<td align="center"><b>Tests</b></td>
							
							<!--<td align="center"><b>Total Amount</b></td>-->
							<td align="center"><b>Amount </b></td>
						</tr>
                        <?php
						
                     $tname=array('XRAY','SCANNING','Breast scan single','Breast scan both','X-RAY SHOULDER AP','X-RAY FOREARM AP & LAT','X-RAY HAND AP & LAT','x-ray erect abdomen','NT SCAN','X-RAY CHEST AP(RIBS)','X -RAY CHEST AP LAT','X-RAY CHEST PA','X-RAY CHEST AP','X-RAY PNS','X-RAY COCCYX AP & LAT','X-RAY ORBIT AP & LAT','X-RAY ZYGOMATIC BONE','X-RAY MANDIBLE','X-RAY ADENOIDS','X-RAY NASAL BONE BOTH LAT',
						'X-RAY MASTOID AP & LAT','X-RAY FOOT AP & LAT','X-RAY ANKLE JOINT AP & LAT','X-RAY LEG AP & LAT','X-RAY KNEE JOINT AP & LAT','X-RAY FEMUR JOINT AP & LAT','X-RAY HIP JOINT AP & LAT','X-RAY PELVIS AP','X-RAY DORSAL SPINE AP & LAT','X-RAY CERVICAL SPINE AP & LAT','X-RAY LS SPINE AP & LAT','X - RAY ELBOW AP & LAT','X-RAY FINGERS AP & LAT','X-RAY BONAGE WRIST','X-RAY WRIST AP & LAT','X-RAY SHOULDER AP & LAT',
						'X-RAY NECK TO ABDOMEN','X-RAY SKULL AP & LAT','CHEST AP & LAT','CHEST PA');
						$qry=mysql_query("select distinct BillNO,BillDate,PatientName,DoctorName,PaidAmount,TestName,NetAmount from bill where BillDate between '$sdate1' and '$edate1' and DoctorName='$dname' and TestName IN('" . implode("','",$tname) . "')");
						if($qry){
						
						$i=0;
						
						$grand = 0;
						$paid1 = 0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 $bno = $res['BillNO'];
							 $pname = $res['PatientName'];
							 $dname = $res['DoctorName'];
							 $paid = $res['NetAmount'];
							 $TestName= $res['TestName'];
							 $paid1 = ($paid1+$paid);
							if(($TestName=='XRAY')or  ($TestName=='X-RAY SHOULDER AP')or ($TestName=='CHEST PA')or ($TestName=='X-RAY HAND AP & LAT')or ($TestName=='x-ray erect abdomen')or ($TestName=='X-RAY CHEST AP(RIBS)')
or ($TestName=='X -RAY CHEST AP LAT')or ($TestName=='X-RAY CHEST PA')or ($TestName=='X-RAY CHEST AP')or ($TestName=='X-RAY PNS')or ($TestName=='X-RAY COCCYX AP & LAT')or ($TestName=='X-RAY ORBIT AP & LAT')or ($TestName=='X-RAY ZYGOMATIC BONE')or ($TestName=='X-RAY MANDIBLE')
or ($TestName=='X-RAY ADENOIDS')or ($TestName=='X-RAY NASAL BONE BOTH LAT')or ($TestName=='X-RAY MASTOID AP & LAT')or ($TestName=='X-RAY FOOT AP & LAT')or ($TestName=='X-RAY ANKLE JOINT AP & LAT')or ($TestName=='X-RAY LEG AP & LAT')or ($TestName=='X-RAY KNEE JOINT AP & LAT')
or ($TestName=='X-RAY FEMUR JOINT AP & LAT')or ($TestName=='X-RAY HIP JOINT AP & LAT')or ($TestName=='X-RAY PELVIS AP')or ($TestName=='X-RAY DORSAL SPINE AP & LAT')or ($TestName=='X-RAY CERVICAL SPINE AP & LAT')or ($TestName=='X-RAY LS SPINE AP & LAT')or ($TestName=='X - RAY ELBOW AP & LAT')
or ($TestName=='X-RAY FINGERS AP & LAT')or ($TestName=='X-RAY BONAGE WRIST')or ($TestName=='X-RAY WRIST AP & LAT')or ($TestName=='X-RAY SHOULDER AP & LAT')or ($TestName=='X-RAY NECK TO ABDOMEN')or ($TestName=='X-RAY SKULL AP & LAT')or ($TestName=='CHEST AP & LAT') ){
								$perc1 = "100"; 
							 } elseif(($TestName=='Breast scan single')or  ($TestName=='Breast scan both') or  ($TestName=='Breast scan both')or ($TestName=='SCANNING')){
								$perc1 = "200"; 
							 } else{
								 $perc1="0";
							 }
							 
							 
							 
							 $grand = ($grand+$perc1);
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                            <td align="center"><?php echo $bno ?></td>
                            <td align="center"><?php echo $bdate ?></td>
                            <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $TestName ?>
								
							</td>
                            
							<!--<td align="right" style="padding-right:20px;"><?php// echo number_format($paid,2) ?></td>-->
                            
							<td align="right" style="padding-right:20px;"><?php echo number_format($perc1,2) ?></td>
                            
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							<td align="center"></td>
							<td align="center"><b>Grand Total</b></td>
                            <!--<td align="right" style="padding-right:20px;"><b><?php// echo number_format($paid1,2) ?></b></td>-->
                            <td align="right" style="padding-right:20px;"><b><?php echo number_format($grand,2) ?></b></td>
                            
                        
						</tr>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>

<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Insurance Dues List</title>
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
                <td class="header">Insurance Due List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
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
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Bill No.</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Name</b></td>
							<td align="center"><b>Tests</b></td>
							<td align="center"><b>Due Amount</b></td>
						</tr>
                        <?php
						
                      $q="select distinct b.BillNO,b.BillDate,b.PatientName,b.NetAmount,b1.conce_type from bill1 b,bill b1 where b.BillNO=b1.BillNO and b.BillDate between '$sdate1' and '$edate1'  and b1.conce_type='Insurance'";
						$qry=mysql_query($q);
						if($qry){
						$i=0;
						
						$bal1 = 0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 $bno = $res['BillNO'];
							 $pname = $res['PatientName'];
							 
							 $bal = $res['NetAmount'];
							 
							 $bal1 = ($bal1+$bal);
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                            <td align="center"><?php echo $bno ?></td>
                            <td align="center"><?php echo $bdate ?></td>
                            <td align="center"><?php echo $pname ?></td>
                            <td align="center">
							<table width="100%">
							<?php
									$sql2 = mysql_query("select distinct TestName from bill where BillNO='$bno'");
									if($sql2){
									
									while($row2 = mysql_fetch_array($sql2)){
									
								?>
								<tr>
								<td align="left" style="padding-left:20px;"><?php echo $row2['TestName'] ?></td>
								</tr>
								<?php } } ?>
							</table>	
							</td>
							<td align="right" style="padding-right:20px;"><?php echo number_format($bal,2) ?></td>
                            
                        
						</tr>
                       <?php } }?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
							<td align="center"></td>
                            <td align="center"><b>Total Amount</b></td>
                            <td align="right" style="padding-right:20px;"><b><?php echo number_format($bal1,2) ?></b></td>
                            
                        
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

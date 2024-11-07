<?php
include("config.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $ename=$_GET['ename'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Amount Collection</title>
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
                <td class="header">Outer Amount Collection</td>
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
                            <td align="right" colspan="4" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Bill No.</b></td>
							<td align="center"><b>Bill Date</b></td>
                            <td align="center"><b>Patient Name</b></td>
							<td align="center"><b>Concession Type</b></td>
							<td align="center"><b>Total Amount</b></td>
							<td align="center"><b>Paid Amount</b></td>
							<td align="center"><b>Bal. Amount</b></td>
						</tr>
						<?php 
                         $qry1="select distinct a.BillNO,a.BillDate,a.PatientName,a.NetAmount,a.PaidAmount,a.BalanceAmount,b.conce_type from outerbill1 a,outerbill b  where  a.BillNO=b.BillNO and a.BillDate between '$sdate1' and '$edate1'";
						$qry=mysql_query($qry1);
						if($qry){
						$i=0;
						$total1 =0;
						$paid1 =0;
						$bal1 = 0;
					 	 while($res=mysql_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 $bno = $res['BillNO'];
							 $pname = $res['PatientName'];
							 $conce_type = $res['conce_type'];
							 $total = $res['NetAmount'];
							 $paid = $res['PaidAmount'];
							 $bal = $res['BalanceAmount'];
							 $total1 = ($total1+$total);
							 $paid1 = ($paid1+$paid);
							 $bal1 = ($bal1+$bal);
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                              <td align="center"><?php echo $bno ?></td>
                            <td align="center"><?php echo $bdate ?></td>
                            <td align="center"><?php echo $pname ?></td>
							 <td align="center"><?php echo $conce_type ?></td>
                            <td align="right" style="padding-right:20px;"><?php echo number_format($total,2) ?></td>
                            <td align="" style="padding-right:20px;">
							<table  width="150" cellpadding="0" cellspacing="0" align="center">
							<tr>
							<td>paid</td><td>user</td>
							</tr>
							<?php 
							$qry4="select  a.billno,a.billdate,a.paidamount,b.BillNO,a.user1 from duebill a,outerbill1 b where a.billdate between '$sdate1' and '$edate1' and   a.billno=b.BillNO and a.billno='$bno'";
							 $qry3=mysql_query($qry4);
							 while($res=mysql_fetch_array($qry3)){
								
							?>
							<tr>
							<td><?php echo $res['paidamount']; ?></td>
							<td><?php echo $res['user1']; ?></td>
							</tr>
							<?php  }?>
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
                            <td align="center"><b>Total</b></td>
                            <td align="center" ><b><?php echo number_format($total1,2) ?></b></td>
                          <td align="right" style="padding-right:20px;">
						  <?php
						  $qry5="select  sum(paidamount) as paid  from duebill  where  billdate between '$sdate1' and '$edate1' ";
							 $qry6=mysql_query($qry5);
							 while($r=mysql_fetch_array($qry6)){
							echo $r['paid'];
							}
						  ?>
						  </td>
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

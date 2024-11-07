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
        <title>Profit Report</title>
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
                <td class="header">PROFIT REPORT</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" style="outline:1px solid black;">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="2" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                       
                        <?php
							$qry=mysql_query("select * from expensemstr where date between '$sdate1' and '$edate1'");
							if($qry){
								$exp1 = 0;
								while($row = mysql_fetch_array($qry)){
									$exp = $row['amount'];
									$exp1 = ($exp1+$exp);
								}
							}
							$qry1=mysql_query("select distinct BillNO,PaidAmount from bill1 where BillDate between '$sdate1' and '$edate1'");
							if($qry1){
								$paid1 = 0;
								while($row1 = mysql_fetch_array($qry1)){
									$paid = $row1['PaidAmount'];
									$paid1 = ($paid1+$paid);
								}
							}
							
							
							
							$qry2=mysql_query("select distinct BillNO,PaidAmount from outerbill1 where BillDate between '$sdate1' and '$edate1'");
							if($qry1){
								$paid11 = 0;
								while($row11 = mysql_fetch_array($qry2)){
									$paid2= $row11['PaidAmount'];
									$paid11 = ($paid11+$paid2);
								}
							}
							
							$tpaid=$paid1+$paid11;
							
							
							
							
							
							
							
							
							$profit = ($tpaid-$exp1);
						?>
					   <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            
                            <td align="center"><b>Collection</b></td>
                            <td align="right" style="padding-right:20px;"><b><?php echo number_format($tpaid,2) ?></b></td>
                            <td align="center"></td>
							<td align="center"></td>
						</tr>
						<tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            
                            <td align="center"><b>Expenses</b></td>
                            <td align="right" style="padding-right:20px;"><b><?php echo number_format($exp1,2) ?></b></td>
                            <td align="center"></td>
							<td align="center"></td>
						</tr>
						<tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            
                            <td align="center"><b>Profit</b></td>
                            <td align="right" style="padding-right:20px;"><b><?php echo number_format($profit,2) ?></b></td>
                            <td align="center"></td>
							<td align="center"></td>
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

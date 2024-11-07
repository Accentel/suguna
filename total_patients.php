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
        <title>Patients Report</title>
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
<tr><td style="text-align:center;color:#03C; font:32px Book Antiqua;font-weight:bold;"><?php echo $oname?></td></tr>
<tr><td style="text-align:center;font:18px Book Antiqua;"><?php echo $oaddr?></td></tr>

</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Patients List</td>
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
							<td align="center"><b>Date</b></td>
                            <td align="center"><b>Patient Name</b></td>
							<td align="center"><b>Age</b></td>
							<td align="center"><b>Gender</b></td>
							
						</tr>
                        <?php
						
                     
						$qry=mysqli_query($link,"select distinct BillNO,BillDate,PatientName,Age,Sex from bill1 where BillDate between '$sdate1' and '$edate1'") or die(mysqli_error($link));
						if($qry){
						$i=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 $bdate = date('d-m-Y',strtotime($res['BillDate']));
							 
							 $bno = $res['BillNO'];
							 $pname = $res['PatientName'];
							 $age = $res['Age'];
							 $sex = $res['Sex'];
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                            <td align="center"><?php echo $bno ?></td>
                            <td align="center"><?php echo $bdate ?></td>
                            <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $age ?></td>
                            <td align="center"><?php echo $sex ?></td>
                            
                        
						</tr>
                       <?php } }?>
					   
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>

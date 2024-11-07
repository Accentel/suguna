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
<style>
hr.style-eight {
    padding: 0;
    border: none;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr.style-eight:after {
    
    display: inline-block;
    position: relative; 
    top: -0.7em;  
    font-size: 1.5em;
    padding: 0 0.25em;
    background: white;
}
td{
    font-size: 13px;
}
</style>

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
<!--                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
                    <tr>
                        <td align="center" style="font-size:24px;" colspan="6"><?php// if($pstatus=="T"){ echo $orgname; } ?></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php// if($pstatus=="T"){ echo $orgaddr; } ?>,</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size:18px;" colspan="6"><?php// if($pstatus=="T"){ echo "Phone : ".$orgphone; } ?></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            </td>
            </tr>
        </table>-->
            </td>
        </tr>
	<?php
			include("config.php");

			$bno = $_REQUEST['bno'];
			
			$sql= mysql_query("select * from bill where BillNO='$bno'");
			if($sql)
			{
				$row = mysql_fetch_array($sql);
				
				$bdate = date('d-m-Y',strtotime($row['BillDate']));
				$patname = $row['PatientName'];
				
				$age = $row['Age'];
				$gender = $row['Sex'];
				$dname = $row['DoctorName'];
				
	
			}		
				
		?>
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="60">
            <td colspan="4"></td>
             </tr>
         <tr>
         
            <td style="padding-left:20px;" width="15%"><div align="left">Bill No. </div></td>
			<td style="padding-left:20px;" width="35%"> : <b><?php echo $bno ?></b></td>
            <td style="padding-left:20px;" width="15%"><div align="left">Report Date </div></td>
			<td style="padding-left:20px;" width="35%"> : <b><?php echo $bdate ?></b></td>
            </tr>
          <tr>
         
            <td style="padding-left:20px;"><div align="left">Patient Name </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $patname ?></b></td>
           
            <td style="padding-left:20px;"><div align="left">Age / Sex </div></td>
			<td style="padding-left:20px;"> : <b><?php echo $age ?> / <?php echo $gender ?></b></td>
           </tr>
			
			  <tr>
           
            <td style="padding-left:20px;"><div align="left">Doctor  Name </div></td>
			<td style="padding-left:20px;" colspan="3"> : <b><?php echo $dname ?></b></td>
          
          </tr>
		  <tr height="10"></tr>
		  <tr>
			<td colspan="4">
			<table width="100%" style="font-size:11px;padding-left:20px;font-family:Calibri (Body);border-top:1px solid #000000;" cellpadding="1" cellspacing="0">
			<tr height="10px"></tr>
			<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 
	
			<?php	
				$cnt= $_REQUEST['emp'];
				$cnt1 = explode(",",$cnt);
				$rws = count($cnt1);
				
				for($i=0;$i<$rws;$i++){
				$emp_id1 = $cnt1[$i];
				$sql2 = mysql_query("select * from reportentry where BillNo='$bno' and Ptest='$emp_id1'");
				if($sql2){
				?>
				<tr><td align="left" colspan="4"></td></tr>
				<?php
				if($emp_id1 == "COMPLETE BLOOD  PICTURE (CBP)"){	
				$sql2 = mysql_query("select * from cbp where bill_no='$bno'");
				if($sql2){
				
				$row2 = mysql_fetch_array($sql2);
				$HAEMOGLOBIN = $row2['HAEMOGLOBIN'];
				$RBC = $row2['RBC'];
				$WBC_Count = $row2['WBC_Count'];
				$PLATELET_COUNT = $row2['PLATELET_COUNT'];
				$NEUTROPHILS = $row2['NEUTROPHILS'];
				$LYMPHOCYTES = $row2['LYMPHOCYTES'];
				$MONOCYTES = $row2['MONOCYTES'];
				$EOSINOPHILS = $row2['EOSINOPHILS'];
				$BASOPHILS = $row2['BASOPHILS'];
				$RBC1 = $row2['RBC1'];
				$WBC1 = $row2['WBC1'];
				$Platelets = $row2['Platelets'];
				
				}
				?>
<tr><td colspan="2" ><b><u>COMPLETE BLOOD  PICTURE (CBP)</u></b></tr>
				
<tr><td>HAEMOGLOBIN</td><td> : <?php echo $HAEMOGLOBIN ?> %</td><td colspan="2">Male : 13.0 - 18.0 g% , Female : 11.5 - 16.0 g%</td></tr>
<tr><td>RBC</td><td> : <?php echo $RBC ?> Mill/ cumm</td><td colspan="2">Male : 4.5 - 6.5 Mill/Cumm , Female : 3.5 - 5.5 Mill/Cumm</td></tr>
<tr><td>WBC Count</td><td> : <?php echo $WBC_Count ?> cells/cumm</td><td colspan="2">4,000 - 11,000/cumm</td></tr>        
<tr><td>PLATELET COUNT</td><td> : <?php echo $PLATELET_COUNT ?> lakhs /cumm</td><td colspan="2">1.5 - 4.5Lakhs/cumm</td></tr>        

<tr height="10px"></tr>
<tr><td colspan="2"><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <?php echo $NEUTROPHILS ?> %</td><td>40-75%</td><td>30 - 40%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <?php echo $LYMPHOCYTES ?> %</td><td>20-45%</td><td>40 - 60%</td></tr>
<tr><td>MONOCYTES</td><td> : <?php echo $MONOCYTES ?> %</td><td>02-10%</td><td>02 - 10%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <?php echo $EOSINOPHILS ?> %</td><td>01-06%</td><td>01 - 06%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <?php echo $BASOPHILS ?> %</td><td>00-01%</td><td>00 - 01%</td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td colspan="2"> : <?php echo $RBC1 ?></td></tr> 
<tr><td>WBC</td><td colspan="2"> : <?php echo $WBC1 ?></td></tr> 
<tr><td>Platelets</td><td colspan="2"> : <?php echo $Platelets ?></td></tr> 
<?php }if($emp_id1 == "COMPLETE URINE EXAMINATION(CUE)"){	
		$sql2 = mysql_query("select * from cue where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$CUECOLOUR = $row2['COLOUR'];
		$CUEAPPEARANCE = $row2['APPEARANCE'];
		$CUEREACTION = $row2['REACTION'];
		$CUESPECIFIC_GRAVITY = $row2['SPECIFIC_GRAVITY'];
		$CUESUGAR = $row2['SUGAR'];
		$CUEALBUMIN = $row2['ALBUMIN'];
		$CUEBILE_SALTS = $row2['BILE_SALTS'];
		$CUEBILE_PIGMENTS = $row2['BILE_PIGMENTS'];
		$CUEUROBILINOGEN = $row2['UROBILINOGEN'];
		$CUEKETONES = $row2['KETONES'];
		$CUERBC = $row2['RBC'];
		$CUEPUSCELLS = $row2['PUSCELLS'];
		$CUEEPITHELIAL_CELL = $row2['EPITHELIAL_CELL'];
		$CUECASTS = $row2['CASTS'];
		$CUECRYSTALS = $row2['CRYSTALS'];
		$CUEOTHERS = $row2['OTHERS'];
		
		}?>
<tr><td colspan="2" ><b><u>COMPLETE URINE EXAMINATION</u></b></tr>

<tr><td >COLOUR</td><td > : <?php echo $CUECOLOUR ?></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <?php echo $CUEAPPEARANCE ?></td></tr>
<tr><td>REACTION</td><td align="left"> : <?php echo $CUEREACTION ?></td></tr>        
<tr><td>SPECIFIC GRAVITY</td><td align="left"> : <?php echo $CUESPECIFIC_GRAVITY ?></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>SUGAR</td><td align="left"> : <?php echo $CUESUGAR ?></td></tr>
<tr><td>ALBUMIN</td><td align="left"> : <?php echo $CUEALBUMIN ?></td></tr>
<tr><td>BILE SALTS</td><td align="left"> : <?php echo $CUEBILE_SALTS ?></td></tr>		 		
<tr><td>BILE PIGMENTS</td><td> : <?php echo $CUEBILE_PIGMENTS ?></td></tr>	  				
<tr><td>UROBILINOGEN</td><td> : <?php echo $CUEUROBILINOGEN ?></td></tr>			
<tr><td>KETONES</td><td> : <?php echo $CUEKETONES ?></td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <?php echo $CUERBC ?>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <?php echo $CUEPUSCELLS ?>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <?php echo $CUEEPITHELIAL_CELL ?>  /HPF</td></tr> 
<tr><td>CASTS</td><td> : <?php echo $CUECASTS ?></td></tr> 
<tr><td>CRYSTALS</td><td> : <?php echo $CUECRYSTALS?></td></tr> 
<tr><td>OTHERS</td><td> : <?php echo $CUEOTHERS ?></td></tr> 

	<?php }if($emp_id1 == "MANTOUX TEST"){	
		$sql2 = mysql_query("select * from mantoux where bill_no='$bno'");
		if($sql2){
			
			$row2 = mysql_fetch_array($sql2);
			$MANTOUXGIVENON = date('d-m-Y',strtotime($row2['given_on']));
			$MANTOUXREPORTNON = date('d-m-Y',strtotime($row2['report_on']));
			$MANTOUXRESULT = $row2['result'];
			
			}
			?>
<tr><td colspan="2" ><b><u>MANTOUX TEST REPORT</u></b></tr>

<tr><td ><b>Given on</b></td><td > : <?php echo $MANTOUXGIVENON ?></td></tr>
<tr><td><b>Report on</b></td><td align="left"> : <?php echo $MANTOUXREPORTNON ?></td></tr>
<tr height="10px"></tr>
<tr><td><b>Result</b></td><td align="left"> : <?php echo $MANTOUXRESULT ?></td></tr>        
			
			<?php }if($emp_id1 == "C - Reactive Protein (CRP)"){	
		$sql2 = mysql_query("select * from crp where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$CRPRESULT = $row2['crp_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <?php echo $CRPRESULT ?> mg/dl</td><td><?php echo  "< 0.6 mg/dl"; ?></td></tr> 

		<?php }if($emp_id1 == "LIVER FUNCTION TEST"){	
		$sql2 = mysql_query("select * from lft where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$LFTTBILIRUBIN = $row2['TOTAL_BILIRUBIN'];
		$LFTDBILIRUBIN = $row2['DIRECT_BILIRUBIN'];
		$LFTIBILIRUBIN = $row2['INDIRECT_BILIRUBIN'];
		$LFTSGOT = $row2['SGOT'];
		$LFTSGPT = $row2['SGPT'];
		$LFTSAPHOSPHATE = $row2['S_ALKALINE_PHOSPHATE'];
		$LFTTPROTIENS = $row2['TOTAL_PROTIENS'];
		$LFTSALBUMIN = $row2['SERUM_ALBUMIN'];
		$LFTSGLOBULIN = $row2['SERUM_GLOBULIN'];
		$LFTAGRATIO = $row2['AG_Ratio'];
		
		}?>

<tr height="5px"></tr>
<tr><td colspan="2" ><b><u>LIVER FUNCTION TEST</u></b></tr>

<tr><td>TOTAL BILIRUBIN</td><td> : <?php echo $LFTTBILIRUBIN ?> mg/dl</td><td>0.2 - 1.0 mg/dl</td></tr> 
<tr><td>DIRECT BILIRUBIN</td><td> : <?php echo $LFTDBILIRUBIN ?> mg/dl</td><td>0.2 - 0.5 mg/dl</td></tr> 
<tr><td>INDIRECT BILIRUBIN</td><td> : <?php echo $LFTIBILIRUBIN ?> mg/dl</td><td></td></tr> 
<tr height="10px"></tr>
<tr><td>SGOT </td><td> : <?php echo $LFTSGOT ?> U/L</td><td>5 - 40 U/L</td></tr> 
<tr><td>SGPT</td><td> : <?php echo $LFTSGPT ?> U/L</td><td>UP TO 40 U/L</td></tr> 
<tr><td>S.ALKALINE PHOSPHATE</td><td> : <?php echo $LFTSAPHOSPHATE ?> U/L</td><td>0 - 5 Yrs : 60 - 321 IU/L</td></tr> 
<tr><td></td><td></td><td>5 - 10Yrs : 110 - 360 IU/L</td></tr> 
<tr><td></td><td></td><td>10 - 12Yrs : 103 - 373 IU/L</td></tr> 
<tr><td></td><td></td><td>12 - 16Yrs : 67 - 382 IU/L</td></tr> 
<tr><td></td><td></td><td>> = 16 Yrs : 36 - 113 IU/L</td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <?php echo $LFTTPROTIENS ?> g/dl</td><td>6.0 - 8.0 g/dl</td></tr> 
<tr><td>SERUM ALBUMIN</td><td> : <?php echo $LFTSALBUMIN ?> g/dl</td><td>3.5 - 5.5 g/dl</td></tr> 
<tr><td>SERUM GLOBULIN</td><td> : <?php echo $LFTSGLOBULIN ?></td><td></td></tr> 
<tr><td>A/G  Ratio</td><td> : <?php echo $LFTAGRATIO ?></td><td></td></tr> 

		<?php }if($emp_id1 == "Parasite F and V"){	
		$sql2 = mysql_query("select * from rmt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$RMTRESULT = $row2['rmt_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td>Parasite F & V  : </td><td><pre><?php echo $RMTRESULT ?></pre></td></tr> 
<tr><td colspan="2"><b>(Rapid Plasmodium falciparum & vivax test)</b></td></tr>
		
		<?php }if($emp_id1 == "Smear for Malarial Parasite"){	
		$sql2 = mysql_query("select * from smp where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$SMPRESULT = $row2['smp_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td>Smear for Malarial Parasite  : </td><td><?php echo $SMPRESULT ?></td></tr> 
		
		<?php }if($emp_id1 == "SERUM AMYLASE"){	
		$sql2 = mysql_query("select * from amylase where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$SMAMYLASE = $row2['amylase_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td>SERUM AMYLASE</td><td> : <?php echo $SMAMYLASE ?> U/L</td><td>up to 90 U/L</td></tr> 
		
		<?php }if($emp_id1 == "Absolute Eosinophil Count (AEC)"){	
		$sql2 = mysql_query("select * from aec where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aecresult = $row2['aec_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Absolute Eosinophil Count (AEC)</td><td> : <?php echo $aecresult ?> cells/cumm</td><td>40 - 440 cells/cumm</td></tr> 
		<?php }if($emp_id1 == "Erythrocyte Sedimentation Rate (ESR)"){	
		$sql2 = mysql_query("select * from esr where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$esrresult = $row2['esr_result'];
		
		}?>

<tr height="5px"></tr>
<tr><td>Erythrocyte Sedimentation Rate (ESR)</td><td> : <?php echo $esrresult ?>  mm/1st Hr</td><td>00 - 20 mm/1st Hr</td></tr> 
		<?php }if($emp_id1 == "Serum Electrolytes"){	
		$sql2 = mysql_query("select * from ele where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sodium = $row2['sodium'];
		$potash = $row2['potash'];
		$chloride = $row2['chloride'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="2" ><b><u>Serum Electrolytes</u></b></tr>
<tr><td width="30%">Sodium</td><td> : <?php echo $sodium ?> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Potassium</td><td> : <?php echo $potash ?> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Chloride</td><td> : <?php echo $chloride ?> mmol/l</td><td>95 - 105 mmol/l</td></tr> 
		<?php }if($emp_id1 == "Random Blood Sugar (RBS)"){	
		$sql2 = mysql_query("select * from rbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$rbs = $row2['rbs_result'];
		$rus = $row2['rus'];
		
		}?>
<tr height="5px"></tr>
<tr><td >Random Blood Sugar (RBS)</td><td> : <?php echo $rbs ?> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td >Random Urine Sugar</td><td> : <?php echo $rus ?></td></tr> 
		
		<?php }if($emp_id1 == "Blood Urea"){	
		$sql2 = mysql_query("select * from burea where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$burea = $row2['burea_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">Blood Urea</td><td> : <?php echo $burea ?> mg/dl</td><td>10 - 50 mg/dl</td></tr> 
		<?php }if($emp_id1 == "Serum Creatinine"){	
		$sql2 = mysql_query("select * from creati where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sresult = $row2['serum_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">Serum Creatinine</td><td> : <?php echo $sresult ?> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 
		<?php }if($emp_id1 == "SERUM CALCIUM"){	
		$sql2 = mysql_query("select * from calcium where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$calresult = $row2['cal_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">SERUM CALCIUM</td><td> : <?php echo $calresult ?> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 
		<?php }if($emp_id1 == "Prothrombin Time (PT)"){	
		$sql2 = mysql_query("select * from pt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$pttest = $row2['pt_time'];
		$ptcontrol = $row2['pt_control'];
		$ptinr = $row2['pt_inr'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 

<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <?php echo $pttest ?> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <?php echo $ptcontrol ?> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <?php echo $ptinr ?></td></tr> 
		<?php }if($emp_id1 == "Activated Partial Thromboplastin Time (APTT)"){	
		$sql2 = mysql_query("select * from aptt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aptttest = $row2['aptt_time'];
		$apttcontrol = $row2['aptt_control'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 

<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <?php echo $aptttest ?> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <?php echo $apttcontrol ?> seconds</td></tr> 
		<?php }if($emp_id1 == "Serum Uric Acid"){	
		$sql2 = mysql_query("select * from sua where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$suaresult = $row2['sua_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">Serum Uric Acid</td><td> : <?php echo $suaresult ?> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl</td></tr> 
		<?php }if($emp_id1 == "COMPLETE STOOL EXAMINATION"){	
		$sql2 = mysql_query("select * from cse where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$CSECOLOUR = $row2['COLOUR'];
		$CSECONSIST = $row2['CONSIST'];
		$CSEREACTION = $row2['REACTION'];
		$CSEMUCUS = $row2['MUCUS'];
		$CSEOCCULT_BLOOD = $row2['OCCULT_BLOOD'];
		$CSEREDUCING_SUBSTANCE = $row2['REDUCING_SUBSTANCE'];
		$CSERBC = $row2['RBC'];
		$CSEPUSCELLS = $row2['PUSCELLS'];
		$CSEEPITHELIAL = $row2['EPITHELIAL'];
		$CSEOVAS = $row2['OVAS'];
		$CSECYSTS = $row2['CYSTS'];
		$CSEOTHERS = $row2['OTHERS'];
		
		}?>
<tr><td colspan="2" ><b><u>COMPLETE STOOL EXAMINATION</u></b></tr>

<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr> 

<tr><td >COLOUR</td><td > : <?php echo $CSECOLOUR ?></td></tr>
<tr><td>CONSISTENCY</td><td align="left"> : <?php echo $CSECONSIST ?></td></tr>
<tr><td>REACTION</td><td align="left"> : <?php echo $CSEREACTION ?></td></tr>        
<tr><td>MUCUS</td><td align="left"> : <?php echo $CSEMUCUS ?></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>OCCULT BLOOD</td><td align="left"> : <?php echo $CSEOCCULT_BLOOD ?></td></tr>
<tr><td>REDUCING SUBSTANCE</td><td align="left"> : <?php echo $CSEREDUCING_SUBSTANCE ?></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <?php echo $CSERBC ?>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <?php echo $CSEPUSCELLS ?>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <?php echo $CSEEPITHELIAL ?>  /HPF</td></tr> 
<tr><td>OVAS</td><td> : <?php echo $CSEOVAS ?></td></tr> 
<tr><td>CYSTS</td><td> : <?php echo $CSECYSTS?></td></tr> 
<tr><td>OTHERS</td><td> : <?php echo $CSEOTHERS ?></td></tr> 
<?php }if($emp_id1 == "HBsAg"){	
		$sql2 = mysql_query("select * from hbsag where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hresult = $row2['hresult'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">HBsAg</td><td> : <?php echo $hresult ?></td></tr> 
<tr height="5px"></tr>

		<?php }if($emp_id1 == "WIDAL"){	
		$sql2 = mysql_query("select * from widal where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sto = $row2['sto'];
		$sth = $row2['sth'];
		$spah = $row2['spah'];
		$spbh = $row2['spbh'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b>WIDAL : </b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Salmonella Typhi "O"</td><td> : <?php echo $sto ?></td></tr> 
<tr><td width="30%">Salmonella Typhi "H"</td><td> : <?php echo $sth ?></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "AH"</td><td> : <?php echo $spah ?></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "BH"</td><td> : <?php echo $spbh ?></td></tr> 
		
		<?php }if($emp_id1 == "HAEMOGLOBIN"){	
		$sql2 = mysql_query("select * from haemo where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$haresult = $row2['haresult'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">HAEMOGLOBIN</td><td> : <?php echo $haresult ?> % </td><td>Male : 13.0 - 18.0 g%<br>Female : 11.5 - 16.0 g%</td></tr> 
		
		<?php }if($emp_id1 == "RFT"){	
		$sql2 = mysql_query("select * from rft where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$rftrbs = $row2['rft_rbs'];
		$rftbu = $row2['rft_bu'];
		$rftscr = $row2['rft_scr'];
		$rftsua = $row2['rft_sua'];
		$rftsc = $row2['rft_sc'];
		}?>
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>RFT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <?php echo $rftrbs ?> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td width="30%">Blood Urea</td><td> : <?php echo $rftbu ?> mg/dl</td><td>10 - 50 mg/dl</td></tr> 
<tr><td width="30%">Serum Creatinine</td><td> : <?php echo $rftscr ?> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 
<tr><td width="30%">Serum Uric Acid</td><td> : <?php echo $rftsua ?> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl </td></tr> 
<tr><td width="30%">Serum Calcium</td><td> : <?php echo $rftsc ?> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Electrolytes:</u></b></td></tr>

<tr><td width="30%">Serum Sodium</td><td> : <?php echo $rftsodium ?> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Serum Potassium</td><td> : <?php echo $rftpotash ?> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Serum Chloride</td><td> : <?php echo $rftchloride ?> mmol/l</td><td>95 - 105 mmol/l</td></tr> 
			
		<?php }if($emp_id1 == "Reducing Substance"){	
		$sql2 = mysql_query("select * from rsub where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$rsub = $row2['rsub'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Reducing Substance</td><td align="left"> : <?php echo $rsub ?></td></tr>
		
		<?php }if($emp_id1 == "SERUM BILIRUBIN"){	
		$sql2 = mysql_query("select * from sbil where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$tbil = $row2['tbil'];
		$dbil = $row2['dbil'];
		$ibil = $row2['ibil'];
		}?>
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Bilirubin : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Total Bilirubin</td><td> : <?php echo $tbil ?> mg/dl</td><td>infants: 0.0 - 10.0 mg/dl<br>adults: 0.0 - 1.0 mg/dl</td></tr> 
<tr><td>Direct Bilirubin</td><td> : <?php echo $dbil ?> mg/dl</td><td>infants: 0.0 - 1.0 mg/dl<br>adults: 0.0 - 0.2 mg/dl</td></tr> 
<tr><td>Indirect Bilirubin</td><td> : <?php echo $ibil ?> mg/dl</td><td></td></tr> 
		<?php }if($emp_id1 == "BLEEDING TIME AND CLOTTING TIME"){	
		$sql2 = mysql_query("select * from btct where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$bt = $row2['btime'];
		$ct = $row2['ctime'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Bleeding Time (BT)</td><td> : <?php echo $bt ?></td><td>01' Min 00'' Sec - 03' Min 00'' Sec</td></tr> 
<tr><td>Clotting Time (CT)</td><td> : <?php echo $ct ?></td><td>03' Min 00'' Sec - 07' Min 00'' Sec</td></tr> 
		<?php }if($emp_id1 == "BLOOD GROUP"){	
		$sql2 = mysql_query("select * from bgroup where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$bgroup = $row2['bgrp'];
		$rht = $row2['rhtype'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Blood Group </td><td> : <b>"<?php echo $bgroup ?>"</b></td></tr> 
<tr height="5px"></tr>
<tr><td>Rh Typing</td><td> : <b><?php echo $rht ?></b></td></tr> 
		<?php }if($emp_id1 == "BLOOD SUGAR(FBS,PLBS)"){	
		$sql2 = mysql_query("select * from bsugar where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$fbs = $row2['fbs'];
		$fus = $row2['fus'];
		$plbs = $row2['plbs'];
		$plus = $row2['plus'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Fasting Blood Sugar</td><td> : <b><?php echo $fbs ?></b> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td>Fasting Urine Sugar</td><td> : <b><?php echo $fus ?></b></td></tr> 
<tr><td>Post Lunch Bloob Sugar</td><td> : <b><?php echo $plbs ?></b> mg/dl</td><td>80 - 170 mg/dl</td></tr> 
<tr><td>Post Lunch Urine Sugar </td><td> : <b><?php echo $plus ?></b></td></tr> 
		<?php }if($emp_id1 == "HIV 1 AND 2"){	
		$sql2 = mysql_query("select * from hiv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hiv = $row2['hiv'];
		
		}?>
<tr height="5px"></tr>
<tr><td>HIV I & II</td><td> : <?php echo $hiv ?></td></tr> 
		<?php }if($emp_id1 == "HCV"){	
		$sql2 = mysql_query("select * from hcv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hcv = $row2['hcv'];
		
		}?>
<tr height="5px"></tr>
<tr><td>HCV</td><td> : <?php echo $hcv ?></td></tr> 
		<?php }if($emp_id1 == "VDRL"){	
		$sql2 = mysql_query("select * from vdrl where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$vdrl = $row2['vdrl'];
		
		}?>
<tr height="5px"></tr>
<tr><td>VDRL</td><td> : <?php echo $vdrl ?></td></tr> 
		<?php }if($emp_id1 == "LIPID PROFILE"){	
		$sql2 = mysql_query("select * from lprofile where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sch = $row2['sch'];
		$hch = $row2['hch'];
		$lch = $row2['lch'];
		$vch = $row2['vch'];
		$stri = $row2['stri'];
		$tch = $row2['tch'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%" valign="top">Serum Cholesterol</td><td valign="top"> : <?php echo $sch ?> mg/dl</td><td >Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" valign="top">HDL Cholesterol</td><td valign="top"> : <?php echo $hch ?> mg/dl</td><td>30 - 60 mgs/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" valign="top">LDL Cholesterol</td><td valign="top"> : <?php echo $lch ?> mg/dl</td><td>100 - 190 mg/dl<br>Elevated > 190 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" valign="top">VLDL Cholesterol</td><td valign="top"> : <?php echo $vch ?> mg/dl</td><td>05 - 35 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" valign="top">Serum Triglycerides</td><td valign="top"> : <?php echo $stri ?> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" valign="top">T.CHOL / HDL RATIO</td><td valign="top"> : <?php echo $tch ?></td><td>less than 4.0 Normal<br>4.0 - 6.0 Boderline<br> > 6.0 High Risk</td></tr> 
		<?php }if($emp_id1 == "SPUTUM FOR AFB"){	
		$sql2 = mysql_query("select * from safb where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$safb = $row2['safb'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Sputum for AFB</td><td> : <?php echo $safb ?></td></tr> 
		<?php }if($emp_id1 == "PLATELET COUNT"){	
		$sql2 = mysql_query("select * from pcount where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$pcount = $row2['pcount'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">PLATELET COUNT</td><td> : <?php echo $pcount ?> lakhs /cumm</td><td>1.5 - 4.5Lakhs/cumm</td></tr>
		<?php }if($emp_id1 == "SERUM CHOLESTEROL"){	
		$sql2 = mysql_query("select * from schole where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$schole = $row2['schole'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%" valign="top">Serum Cholesterol</td><td valign="top"> : <?php echo $schole ?> mg/dl</td><td>Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 
		<?php }if($emp_id1 == "SERUM TRYGLYCERIDES"){	
		$sql2 = mysql_query("select * from strig where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$strig = $row2['strig'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%" valign="top">Serum Triglycerides</td><td valign="top"> : <?php echo $strig ?> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 
		<?php }if($emp_id1 == "ALKALINE PHOSPHATE"){	
		$sql2 = mysql_query("select * from aphos where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aphos = $row2['aphos'];
		
		}?>
<tr height="5px"></tr>
<tr><td>ALKALINE PHOSPHATE</td><td> : <?php echo $aphos ?> U/L</td><td>0 - 5 Yrs : 60 - 321 IU/L</td></tr> 
		<?php }if($emp_id1 == "TOTAL PROTIENS"){	
		$sql2 = mysql_query("select * from tprt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$tprt = $row2['tprt'];
		
		}?>
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <?php echo $tprt ?> g/dl</td><td>6.0 - 8.0 g/dl</td></tr> 
		<?php }if($emp_id1 == "SERUM POTASSIUM"){	
		$sql2 = mysql_query("select * from spotash where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$spotash = $row2['spotash'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">Serum Potassium</td><td> : <?php echo $spotash ?> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
		<?php }if($emp_id1 == "Smear for Microfilaria"){	
		$sql2 = mysql_query("select * from smicro where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$smicro = $row2['smicro'];
		
		}?>
<tr height="5px"></tr>
<tr><td width="30%">Smear for Microfilaria</td><td colspan="2"> : <?php echo $smicro ?></td></tr> 
		<?php }if($emp_id1 == "WBC Count"){	
		$sql2 = mysql_query("select * from wbccount where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$wbccount = $row2['wbccount'];
		
		}?>
<tr height="5px"></tr>
<tr><td>WBC Count</td><td> : <?php echo $wbccount ?> cells/cumm</td><td>4,000 - 11,000/cumm</td></tr>        
		<?php }if($emp_id1 == "Peripheral Smear"){	
		$sql2 = mysql_query("select * from peri where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$psrbc = $row2['psrbc'];
		$pswbc = $row2['pswbc'];
		$psplatelets = $row2['psplatelets'];
		
		}?>
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Peripheral Smear : </u></b></td></tr>
<tr height="5px"></tr>
<tr><td>RBC</td><td> : <?php echo $psrbc ?></td></tr>        
<tr><td>WBC</td><td> : <?php echo $pswbc ?></td></tr>        
<tr><td>Platelets</td><td> : <?php echo $psplatelets ?></td></tr>        
		<?php }if($emp_id1 == "FBS"){	
		$sql2 = mysql_query("select * from fbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$fbss = $row2['fbss'];
		$fuss = $row2['fuss'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Fasting Blood Sugar</td><td> : <?php echo $fbss ?> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td>Fasting Urine Sugar</td><td> : <?php echo $fuss ?></td></tr> 
		<?php }if($emp_id1 == "PLBS"){	
		$sql2 = mysql_query("select * from plbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$plbss = $row2['plbss'];
		$pluss = $row2['pluss'];
		
		}?>
<tr height="5px"></tr>
<tr><td>Post Lunch Bloob Sugar</td><td> : <?php echo $plbss ?> mg/dl</td><td>80 - 170 mg/dl</td></tr> 
<tr><td>Post Lunch Urine Sugar </td><td> : <?php echo $pluss ?></td></tr> 
		<?php }if($emp_id1 == "ASO TITRE"){	
		$sql2 = mysql_query("select * from aso where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aso = $row2['aso'];
		
		}?>
<tr height="5px"></tr>
<tr><td >ASO TITRE</td><td> : <?php echo $aso ?></td></tr> 
		<?php }if($emp_id1 == "RA FACTOR"){	
		$sql2 = mysql_query("select * from raf where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$raf = $row2['raf'];
		
		}?>
<tr height="5px"></tr>
<tr><td>RA FACTOR</td><td> : <?php echo $raf ?></td></tr> 
		<?php }if($emp_id1 == "HBA1C"){	
		$sql2 = mysql_query("select * from hba where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hba = $row2['hba'];
		
		}?>
<tr height="5px"></tr>
<tr><td >HBA1C</td><td> : <?php echo $hba ?> %</td><td>6.5 to 7%</td></tr> 
		<?php }if($emp_id1 == "COOMBS TEST(DIRECT)"){	
		$sql2 = mysql_query("select * from ctd where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$ctd = $row2['ctd'];
		
		}?>
<tr height="5px"></tr>
<tr><td>COOMBS TEST (DIRECT)</td><td> : <?php echo $ctd ?></td></tr> 
		<?php }if($emp_id1 == "COOMBS TEST(INDIRECT)"){	
		$sql2 = mysql_query("select * from ctid where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$ctid = $row2['ctid'];
		
		}?>
<tr height="5px"></tr>
<tr><td>COOMBS TEST(INDIRECT)</td><td> : <?php echo $ctid ?></td></tr> 
		<?php }if($emp_id1 == "PACKED CELL VOLUME(PCV)"){	
		$sql2 = mysql_query("select * from pcv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$pcv = $row2['pcv'];
		
		}?>
<tr height="5px"></tr>
<tr><td >PACKED CELL VOLUME(PCV)</td><td> : <?php echo $pcv ?> %</td><td>Males : 40 to 45%<br>Females : 38 to 42%</td></tr> 
		<?php }if($emp_id1 == "DENGUE SEROLOGY"){	
		$sql2 = mysql_query("select * from dsr where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$dsrigg = $row2['dsrigg'];
		$dsrigm = $row2['dsrigm'];
		
		}?>
<tr height="5px"></tr>
<tr><td >IgG</td><td><?php echo $dsrigg ?></td><td> < 0.90 </td></tr> 
<tr><td >IgM</td><td><?php echo $dsrigm ?></td><td> < 0.90 </td></tr> 
		<?php } } ?>
				
				<?php } ?>
				</table>
			</td>
		  </tr>
            
          
			<tr height="20"></tr>
        </table></td>
      </tr>
      <tr><td align="center" >
	  
	  <table style="font-size:11px;font-family:Calibri (Body);" width="70%" cellpadding="0" cellspacing="0" >
        <tr height="50"></tr>
		<tr><td ><b><?php if($sstatus1=="T"){ echo $s1; }?></b></td><td valign="top"><div align="right"><b><?php if($sstatus=="T"){ echo $s2; }?></b></div></td>
      </tr>
	  </table>
	  
	  </td></tr>
    </table>
	</tr>
	</td>
  </tr>
 <tr>
	<td align="right"><img src="images/images.png"/></td>
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
<?php
include("config.php");

$q=$_GET["q"];
$b=$_GET["b"];
echo "@";
?>
<input type="hidden" name="tname[]" value="<?php echo $q ?>"/>

<?php
if($q == "COMPLETE BLOOD  PICTURE (CBP)"){
$sql4 = mysqli_query($link,"select count(*) from cbp where bill_no='$b'");
if($sql4){
	$row4 = mysqli_fetch_array($sql4);
	$cnt = $row4[0];
}
if($cnt <= 0){
?>

<?php
}else{
    
$sql5 = mysqli_query($link,"select * from cbp where bill_no='$b'");
if($sql5){
	$row5 = mysqli_fetch_array($sql5);
	$HAEMOGLOBIN = $row5['HAEMOGLOBIN'];
	$RBC = $row5['RBC'];
	$WBC_Count = $row5['WBC_Count'];
	$PLATELET_COUNT = $row5['PLATELET_COUNT'];
	$NEUTROPHILS = $row5['NEUTROPHILS'];
	$LYMPHOCYTES = $row5['LYMPHOCYTES'];
	$MONOCYTES = $row5['MONOCYTES'];
	$EOSINOPHILS = $row5['EOSINOPHILS'];
	$BASOPHILS = $row5['BASOPHILS'];
	$RBC1 = $row5['RBC1'];
	$WBC1 = $row5['WBC1'];
	$Platelets = $row5['Platelets'];
}
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="20px"></tr>
<tr><td style="color:red;"><b ><u>COMPLETE BLOOD PICTURE (CBP):</u></b></td></tr>
<tr><td>HAEMOGLOBIN</td><td> : <input type="text" value="<?php echo $HAEMOGLOBIN ?>" name="HAEMOGLOBIN" size="10"/> %</td><td colspan="2">Male : 13.0 – 18.0 g% , Female : 11.5 – 16.0 g%</td></tr>
<tr><td>RBC</td><td> : <input type="text" name="RBC" value="<?php echo $RBC ?>" size="10"/> Mill/ cumm</td><td colspan="2">Male : 4.5 – 6.5 Mill/Cumm , Female : 3.5 – 5.5 Mill/Cumm</td></tr>
<tr><td>WBC Count</td><td> : <input type="text" value="<?php echo $WBC_Count ?>" name="WBC" size="10"/> cells/cumm</td><td colspan="2">4,000 - 11,000/cumm</td></tr>        
<tr><td>PLATELET COUNT</td><td> : <input type="text" value="<?php echo $PLATELET_COUNT ?>" name="PLATELET" size="10"/> lakhs /cumm</td><td colspan="2">1.5 - 4.5Lakhs/cumm</td></tr>
<tr height="10px"></tr>
<tr><td><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <input type="text" value="<?php echo $NEUTROPHILS ?>" name="NEUTROPHILS" id="NEUTROPHILS" size="10"/> %</td><td>40-75%</td><td>30 - 40%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <input type="text" value="<?php echo $LYMPHOCYTES ?>" name="LYMPHOCYTES" id="LYMPHOCYTES" size="10"/> %</td><td>20-45%</td><td>40 - 60%</td></tr>
<tr><td>MONOCYTES</td><td> : <input type="text" value="<?php echo $MONOCYTES ?>" name="MONOCYTES" id="MONOCYTES" size="10"/> %</td><td>02-10%</td><td>02 - 10%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <input type="text" value="<?php echo $EOSINOPHILS ?>" name="EOSINOPHILS" id="EOSINOPHILS" size="10"/> %</td><td>01-06%</td><td>01 - 06%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <input type="text" value="<?php echo $BASOPHILS ?>" name="BASOPHILS" id="BASOPHILS" size="10" onblur="javascript:fun001();"/> %</td><td>00-01%</td><td>00 - 01%</td></tr>			
<tr height="10px"></tr>
<tr><td><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td colspan="3"> : <input type="text" name="RBC1" value="<?php echo $RBC1 ?>" size="60"/></td></tr> 
<tr><td>WBC</td><td colspan="3"> : <input type="text" name="WBC1" value="<?php echo $WBC1 ?>" size="60"/></td></tr> 
<tr><td>Platelets</td><td colspan="3"> : <input type="text" name="Platelets" value="<?php echo $Platelets ?>" size="60"/></td></tr> 
</table>
<?php
}
}else if($q == "COMPLETE URINE EXAMINATION(CUE)"){

$sql4 = mysqli_query($link,"select * from cue where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$COLOUR = $row5['COLOUR'];
	//$given_on =date('d-m-Y',strtotime($given_on1));
	$APPEARANCE = $row5['APPEARANCE'];
	//$report_on =date('d-m-Y',strtotime($report_on1));
	$REACTION = $row5['REACTION'];
	$RBC = $row5['RBC'];
	//$given_on =date('d-m-Y',strtotime($given_on1));
	$SPECIFIC_GRAVITY = $row5['SPECIFIC_GRAVITY'];
	//$report_on =date('d-m-Y',strtotime($report_on1));
	$SUGAR = $row5['SUGAR'];
	
	$ALBUMIN = $row5['ALBUMIN'];
	$BILE_SALTS = $row5['BILE_SALTS'];
	$BILE_PIGMENTS = $row5['BILE_PIGMENTS'];
	$UROBILINOGEN = $row5['UROBILINOGEN'];
	$KETONES = $row5['KETONES'];
	$PUSCELLS = $row5['PUSCELLS'];
	$EPITHELIAL_CELL = $row5['EPITHELIAL_CELL'];
	$CASTS = $row5['CASTS'];
	$CRYSTALS = $row5['CRYSTALS'];
	$OTHERS = $row5['OTHERS'];
	//$RBC = $row5['RBC'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>COMPLETE URINE EXAMINATION:</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CUECOLOUR" size="20" value="<?php echo $COLOUR ?>"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="CUEAPPEARANCE" size="20" value="<?php echo $APPEARANCE ?>"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CUEREACTION" size="20" value="<?php echo $REACTION ?>"/></td></tr>        
<tr><td>SPECIFIC GRAVITY</td><td align="left"> : <input type="text" name="CUESPECIFICGRAVITY" size="20" value="<?php echo $SPECIFIC_GRAVITY ?>"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>SUGAR</td><td align="left"> : <input type="text" name="CUESUGAR" size="20" value="<?php echo $SUGAR ?>"/></td></tr>
<tr><td>ALBUMIN</td><td align="left"> : <input type="text" name="CUEALBUMIN" size="20" value="<?php echo $ALBUMIN ?>"/></td></tr>
<tr><td>BILE SALTS</td><td align="left"> : <input type="text" name="CUEBILESALTS" size="20" value="<?php echo $BILE_SALTS ?>"/></td></tr>		 		
<tr><td>BILE PIGMENTS</td><td> : <input type="text" name="CUEBILEPIGMENTS" size="20" value="<?php echo $BILE_PIGMENTS ?>"/></td></tr>	  				
<tr><td>UROBILINOGEN</td><td> : <input type="text" name="CUEUROBILINOGEN" size="20" value="<?php echo  $UROBILINOGEN?>"/></td></tr>			
<tr><td>KETONES</td><td> : <input type="text" name="CUEKETONES" size="20" value="<?php echo $KETONES ?>"/></td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CUERBC" size="20" value="<?php echo $RBC ?>"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CUEPUSCELLS" size="20" value="<?php echo $PUSCELLS ?>"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CUEEPITHELIAL" size="20" value="<?php echo $EPITHELIAL_CELL  ?>"/>  /HPF</td></tr> 
<tr><td>CASTS</td><td> : <input type="text" name="CUECASTS" size="20" value="<?php echo $CASTS ?>"/></td></tr> 
<tr><td>CRYSTALS</td><td> : <input type="text" name="CUECRYSTALS" size="20" value="<?php echo $CRYSTALS ?>"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CUEOTHERS" size="20" value="<?php echo $OTHERS ?>"/></td></tr> 
</table>
<?php
}else if($q == "MANTOUX TEST"){
$sql4 = mysqli_query($link,"select * from mantoux where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$given_on1 = $row5['given_on'];
	$given_on =date('d-m-Y',strtotime($given_on1));
	$report_on1 = $row5['report_on'];
	$report_on =date('d-m-Y',strtotime($report_on1));
	$result = $row5['result'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>MANTOUX TEST:</u></b></td></tr>
<tr><td>GIVEN ON</td><td> : <input type="text" value="<?php echo $given_on; ?>" name="MANTOUXGIVENON"/></td></tr> 
<tr><td>REPORT ON</td><td> : <input type="text" value="<?php echo $report_on; ?>" name="MANTOUXREPORTNON"/></td></tr> 
<tr><td>RESULT</td><td> : <textarea type="text" name="MANTOUXRESULT" cols="35" rows="3" ><?php echo $result; ?></textarea></td></tr> 

</table>
<?php
}else if($q == "C - Reactive Protein (CRP)"){



$sql4 = mysqli_query($link,"select * from crp where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$crp_result = $row5['crp_result'];
?>	
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<?php
$mbs="select * from crprange where crpid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$crpid=$row['crpid'];

$value=$row['value'];
$type=$row['type'];

?>
<tr><td style="color:red;" colspan="2"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td><b><u>RESULT </u></td><td><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <input type="text" name="CRPRESULT" value ="<?php echo $crp_result?>"  size="20" /> mg/dl</td><td><input type="hidden" name="crpid" value="<?php echo $crpid; ?>" size="5"/><input size="5" type="text" name="res" value="<?php echo $value; ?>"/><input type="text" name="type" value="<?php echo $type; ?>" size="5"/></td></tr> 

</table>
<?php
}else if($q == "LIVER FUNCTION TEST"){

$sql4 = mysqli_query($link,"select * from lft where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$TOTAL_BILIRUBIN = $row5['TOTAL_BILIRUBIN'];
	$DIRECT_BILIRUBIN = $row5['DIRECT_BILIRUBIN'];
	$INDIRECT_BILIRUBIN = $row5['INDIRECT_BILIRUBIN'];
	$SGOT = $row5['SGOT'];
	$SGPT = $row5['SGPT'];
	$S_ALKALINE_PHOSPHATE = $row5['S_ALKALINE_PHOSPHATE'];
	$TOTAL_PROTIENS = $row5['TOTAL_PROTIENS'];
	$SERUM_ALBUMIN = $row5['SERUM_ALBUMIN'];
	$SERUM_GLOBULIN = $row5['SERUM_GLOBULIN'];
	$AG_Ratio = $row5['AG_Ratio'];
	



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>LIVER FUNCTION TEST:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL BILIRUBIN</td><td> : <input type="text" name="LFTTBILIRUBIN" size="10" value="<?php echo $TOTAL_BILIRUBIN ?>"/> mg/dl</td><td>0.2 - 1.0 mg/dl</td></tr> 
<tr><td>DIRECT BILIRUBIN</td><td> : <input type="text" name="LFTDBILIRUBIN" size="10" value="<?php echo $DIRECT_BILIRUBIN ?>"/> mg/dl</td><td>0.2 - 0.5 mg/dl</td></tr> 
<tr><td>INDIRECT BILIRUBIN</td><td> : <input type="text" name="LFTIBILIRUBIN" size="10" value="<?php echo $INDIRECT_BILIRUBIN ?>"/> mg/dl</td><td></td></tr> 
<tr height="10px"></tr>
<tr><td>SGOT </td><td> : <input type="text" name="LFTSGOT" size="10" value="<?php echo $SGOT ?>"/> U/L</td><td>5 - 40 U/L</td></tr> 
<tr><td>SGPT</td><td> : <input type="text" name="LFTSGPT" size="10" value="<?php echo $SGPT ?>"/> U/L</td><td>UP TO 40 U/L</td></tr> 
<tr><td>S.ALKALINE PHOSPHATE</td><td> : <input type="text" name="LFTSAPHOSPHATE" size="10" value="<?php echo $S_ALKALINE_PHOSPHATE ?>"/> U/L</td><td>0 - 5 Yrs : 60 - 321 IU/L</td></tr> 
<tr><td></td><td></td><td>5 - 10Yrs : 110 - 360 IU/L</td></tr> 
<tr><td></td><td></td><td>10 - 12Yrs : 103 - 373 IU/L</td></tr> 
<tr><td></td><td></td><td>12 - 16Yrs : 67 - 382 IU/L</td></tr> 
<tr><td></td><td></td><td>> = 16 Yrs : 36 - 113 IU/L</td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <input type="text" name="LFTTPROTIENS" size="10" value="<?php echo $TOTAL_PROTIENS ?>"/> g/dl</td><td>6.0 - 8.0 g/dl</td></tr> 
<tr><td>SERUM ALBUMIN</td><td> : <input type="text" name="LFTSALBUMIN" size="10" value="<?php echo  $SERUM_ALBUMIN?>"/> g/dl</td><td>3.5 - 5.5 g/dl</td></tr> 
<tr><td>SERUM GLOBULIN</td><td> : <input type="text" name="LFTSGLOBULIN" size="10" value="<?php echo  $SERUM_GLOBULIN?>"/></td><td></td></tr> 
<tr><td>A/G  Ratio</td><td> : <input type="text" name="LFTAGRATIO" size="10" value="<?php echo $AG_Ratio ?>"/></td><td></td></tr> 

</table>
<?php
}else if($q == "Parasite F and V"){
$sql4 = mysqli_query($link,"select * from rmt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rmt_result = $row5['rmt_result'];
	$rmt_result1 = $row5['rmt_result1'];
	
	


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Parasite F</td><td> : <input type="text" name="RMTRESULT" value="<?php echo $rmt_result ?>" /></td></tr> 
<tr><td>Parasite V</td><td> : <input type="text" name="RMTRESULT1" value="<?php echo $rmt_result1 ?>" /></td></tr> 

</table>
<?php
}else if($q == "Smear for Malarial Parasite"){

$sql4 = mysqli_query($link,"select * from smp where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$smp_result = $row5['smp_result'];
	




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Smear for Malarial Parasite</td><td> : <textarea name="SMPRESULT" cols="35" rows="3"><?php echo $smp_result; ?></textarea></td></tr> 
</table>
<?php
}else if($q == "SERUM AMYLASE"){

$sql4 = mysqli_query($link,"select * from amylase where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$amylase_result = $row5['amylase_result'];
	



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>BIO-CHEMISTRY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>SERUM AMYLASE</td><td> : <input type="text" name="SAMYLASE" value="<?php echo $amylase_result;  ?>"/> U/L</td><td>up to 90 U/L</td></tr> 

</table>

<?php
}else if($q == "BIO(Urea Creatinine)"){

$sql4 = mysqli_query($link,"select * from burea where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$burea_result = $row5['burea_result'];
	



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>BIO-CHEMISTRY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>

<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="burea"/> mg/dl</td><td><input type="hidden" name="buid" value="<?php echo $buid; ?>"/><input type="text" name="buvalue" value="<?php echo $buvalue; ?>"/><input type="text" name="butype" value="<?php echo $butype; ?>"/></td></tr> 
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="creati"/> mg/dl</td><td><input type="hidden" name="cid" value="<?php echo $cid; ?>"/><input type="text" name="cvalue" value="<?php echo $cvalue; ?>"/><input type="text" name="ctype" value="<?php echo $ctype; ?>"/></td></tr> 
</table>

<?php
}else if($q == "Absolute Eosinophil Count (AEC)"){
$sql4 = mysqli_query($link,"select * from aec where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$aec_result = $row5['aec_result'];
	


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Absolute Eosinophil Count (AEC)</td><td> : <input type="text" name="aecresult" value="<?php echo $aec_result;  ?>"/> cells/cumm</td><td>40 - 440 cells/cumm</td></tr> 

</table>
<?php
}else if($q == "Erythrocyte Sedimentation Rate (ESR)"){

$sql4 = mysqli_query($link,"select * from esr where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$esr_result = $row5['esr_result'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Erythrocyte Sedimentation Rate (ESR)</td><td> : <input type="text" name="esrresult" value="<?php echo $esr_result ?>"/> mm/1st Hr</td><td>00 - 20 mm/1st Hr</td></tr> 

</table>
<?php
}else if($q == "Serum Electrolytes"){

$sql4 = mysqli_query($link,"select * from ele where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sodium = $row5['sodium'];
	$potash = $row5['potash'];
	$chloride = $row5['chloride'];




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) Serum Electrolytes:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Sodium</td><td> : <input type="text" name="sodium" value="<?php echo $sodium ?>"/> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Potassium</td><td> : <input type="text" name="potash" value="<?php echo $potash ?>"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Chloride</td><td> : <input type="text" name="chloride" value="<?php echo $chloride ?>"/> mmol/l</td><td>95 - 105 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Random Blood Sugar (RBS)"){

$sql4 = mysqli_query($link,"select * from rbs where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rbs_result = $row5['rbs_result'];
	$rus = $row5['rus'];
	




?>



<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rbs" value="<?php echo $rbs_result ?>"/> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td width="30%">Random Urine Sugar</td><td> : <input type="text" name="rus" value="<?php echo $rus ?>"/></td></tr> 

</table>
<?php
}else if($q == "HB%"){

$sql4 = mysqli_query($link,"select * from hbper where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rbs_result = $row5['rbs_result'];
	$rus = $row5['rus'];
	




?>



<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">HB%</td><td> : <input type="text" name="rbs" value="<?php echo $rbs_result ?>"/> %</td><td>Normal :4.0 – 6.0%  <br> Good control: 6.0 – 7.0 % <br> Poor control: 7.0 – 8.0 % <br>Diabetic: > 8.0%</td></tr> 
<tr><td width="30%">Average Sugar</td><td> : <input type="text" name="rus" value="<?php echo $rus ?>"/></td></tr> 

</table>

<?php
}
else if($q == "Hemogram"){
$sql4 = mysqli_query($link,"select * from chemo where bill_no='$b'");

$row2 = mysqli_fetch_array($sql4);
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
				
				$pvc = $row2['pvc'];
				$mcv = $row2['mcv'];
				$mch = $row2['mch'];
				$mchc = $row2['mchc'];
				
				
?>
<?php
$mbs="select * from chnormal where id='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$id=$row['id'];
$hm=htmlspecialchars($row['hm']);
$hf=$row['hf'];
$rbcm=$row['rbcm'];
$rbcf=$row['rbcf'];
$webcount=$row['webcount'];
$plateletcount=$row['plateletcount'];
$na=$row['na'];
$nc=$row['nc'];
$la=$row['la'];
$lc=$row['lc'];
$ma=$row['ma'];
$mc=$row['mc'];
$ea=$row['ea'];
$ec=$row['ec'];
$baa=$row['baa'];
$bac=$row['bac'];
$hnormal=$row['hnormal'];
$rbcnormal=$row['rbcnormal'];
$webcountnormal=$row['webcountnormal'];
$plateletnormal=$row['plateletnormal'];
$pcvn=$row['pcvn'];
$mcvn=$row['mcvn'];
$mchn=$row['mchn'];
$mchcn=$row['mchcn'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td colspan="4"><hr></td></tr>
		  <tr><td colspan="4" ><b><u>HEMOGRAM</u></b></tr>
			<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 

				
<tr><td style="color:red;"><b><u>COMPLETE HEMOGRAM:</u></b></td></tr>
<tr><td>HAEMOGLOBIN</td><td> : <input type="text" name="HAEMOGLOBIN" size="10" value="<?php echo $HAEMOGLOBIN; ?>"/> %</td><td><input type="hidden" name="cbpid" value="<?php echo $id; ?>"/>Male : <input type="text" name="hm" value="<?php echo mysqli_real_escape_string($link,$hm); ?>"/> <input type="text" name="hnormal" size="5" value="<?php echo $hnormal; ?>" /> ,<br/> Female : <input type="text" name="hf" value="<?php echo $hf; ?>"/> <input type="text" name="hnormal" size="5" value="<?php echo $hnormal; ?>" /></td></tr>
<tr><td>RBC</td><td> : <input type="text" name="RBC" size="10" value="<?php echo $RBC ?>"/> Mill/ cumm</td><td>Male :<input type="text" name="rbcm" value="<?php echo $rbcm; ?>"/><input type="text" name="rbcnormal" size="5" value="<?php echo $rbcnormal; ?>" /> ,<br/> Female : <input type="text" name="rbcf" value="<?php echo $rbcf; ?>"/> <input type="text" name="rbcnormal" size="5" value="<?php echo $rbcnormal; ?>" /></td></tr>
<tr><td>WBC Count</td><td> : <input type="text" name="WBC_Count" size="10" value="<?php echo $WBC_Count ?>" /> cells/cumm</td><td><input type="text" name="webcount" value="<?php echo $webcount; ?>"/><input type="text" name="webcountnormal" size="5" value="<?php echo $webcountnormal; ?>" /></td></tr>        
<tr><td>PLATELET COUNT</td><td> : <input type="text" name="PLATELET_COUNT" size="10" value="<?php echo $PLATELET_COUNT ?>"/> lakhs /cumm</td><td><input type="text" name="plateletcount" value="<?php echo $plateletcount; ?>"/><input type="text" name="plateletnormal" size="5" value="<?php echo $plateletnormal; ?>" /></td></tr>        

<tr height="10px"></tr>
<tr><td ><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <input type="text" name="NEUTROPHILS" value="<?php echo $NEUTROPHILS ?>" size="10"/> %</td><td><input type="text" name="na" value="<?php echo $na; ?>"/>%</td><td><input type="text" name="nc" value="<?php echo $nc; ?>"/>%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <input type="text" name="LYMPHOCYTES" value="<?php echo $LYMPHOCYTES ?>" size="10"/> %</td><td><input type="text" name="la" value="<?php echo $la; ?>"/>%</td><td><input type="text" name="lc" value="<?php echo $lc; ?>"/>%</td></tr>
<tr><td>MONOCYTES</td><td> : <input type="text" name="MONOCYTES" value="<?php echo $MONOCYTES ?>" size="10"/> %</td><td><input type="text" name="ma" value="<?php echo $ma; ?>"/>%</td><td><input type="text" name="mc" value="<?php echo $mc; ?>"/>%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <input type="text" name="EOSINOPHILS" value="<?php echo $EOSINOPHILS ?>" size="10"/> %</td><td><input type="text" name="ea" value="<?php echo $ea; ?>"/>%</td><td><input type="text" name="ec" value="<?php echo $ec; ?>"/>%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <input type="text" name="BASOPHILS" value="<?php echo $BASOPHILS ?>" size="10"/> %</td><td><input type="text" name="baa" value="<?php echo $baa; ?>"/>%</td><td><input type="text" name="bac" value="<?php echo $bac; ?>"/>%</td></tr>
<tr><td>P.V.C</td><td> : <input type="text" name="pvc" value="<?php echo $pvc ?>" size="10"/> %</td><td><input type="text" name="pvcn" value="<?php echo $pcvn; ?>"/>%</td></tr>

<tr><td>M.C.V</td><td> : <input type="text" name="mcv" value="<?php echo $mcv ?>" size="10"/> %</td><td><input type="text" name="mcvn" value="<?php echo $mcvn; ?>"/>%</td></tr>

<tr><td>M.C.H</td><td> : <input type="text" name="mch" value="<?php echo $mch ?>" size="10"/> pg</td><td><input type="text" name="mchn" value="<?php echo $mchn; ?>"/>%</td></tr>

<tr><td>M.C.H.C</td><td> : <input type="text" name="mchc" value="<?php echo $mchc ?>" size="10"/> %</td><td><input type="text" name="mchcn" value="<?php echo $mchcn; ?>"/>%</td></tr>

<tr><td>BASOPHILS</td><td> : <input type="text" name="BASOPHILS" value="<?php echo $BASOPHILS ?>" size="10"/> %</td><td><input type="text" name="baa" value="<?php echo $baa; ?>"/>%</td><td><input type="text" name="bac" value="<?php echo $bac; ?>"/>%</td></tr>
<tr height="10px"></tr>
<tr><td><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="RBC1" value="<?php echo $RBC1 ?>" size="20"/></td><td>&nbsp;</td></tr> 
<tr><td>WBC</td><td> : <input type="text" name="WBC1" value="<?php echo $WBC1 ?>" size="20"/></td><td>&nbsp;</td></tr> 
<tr><td>Platelets</td><td> : <input type="text" name="Platelets" value="<?php echo $Platelets ?>" size="20"/></td><td>&nbsp;</td></tr> 
</table>

<?php
}else if($q == "Blood Urea"){
$sql4 = mysqli_query($link,"select * from burea where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$burea_result = $row5['burea_result'];
	
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="burea" value="<?php echo $burea_result; ?>"/> mg/dl</td><td>10 - 50 mg/dl</td></tr> 

</table>
<?php
}else if($q == "Serum Creatinine"){

$sql4 = mysqli_query($link,"select * from creati where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$serum_result = $row5['serum_result'];
	

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="creati" value="<?php echo $serum_result; ?>"/> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 

</table>
<?php
}else if($q == "SERUM CALCIUM"){
$sql4 = mysqli_query($link,"select * from calcium where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$cal_result = $row5['cal_result'];
	





?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">SERUM CALCIUM</td><td> : <input type="text" name="cal_result" value="<?php echo $cal_result;?>"/> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 

</table>
<?php
}
else if($q == "Prothrombin Time (PT)"){
$sql4 = mysqli_query($link,"select * from pt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$pt_time = $row5['pt_time'];
	$pt_control = $row5['pt_control'];
	$pt_inr = $row5['pt_inr'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="pttest" value="<?php echo $pt_time;?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="ptcontrol" value="<?php echo $pt_control;?>"/> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <input type="text" name="ptinr" value="<?php echo $pt_inr;?>"/></td></tr> 

</table>
<?php
}
else if($q == "Activated Partial Thromboplastin Time (APTT)"){

$sql4 = mysqli_query($link,"select * from aptt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$aptt_time = $row5['aptt_time'];
	$aptt_control = $row5['aptt_control'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="aptttest" value="<?php echo $aptt_time;?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="apttcontrol" value="<?php echo $aptt_control;?>"/> seconds</td></tr> 

</table>
<?php
}else if($q == "Serum Uric Acid"){

$sql4 = mysqli_query($link,"select * from sua where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sua_result = $row5['sua_result'];
	




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="sua_result" value="<?php echo $sua_result;?>"/> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl </td></tr> 

</table>
<?php
}else if($q == "COMPLETE STOOL EXAMINATION"){

$sql4 = mysqli_query($link,"select * from cse where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$COLOUR = $row5['COLOUR'];
	$CONSIST = $row5['CONSIST'];
	$REACTION = $row5['REACTION'];
	$MUCUS = $row5['MUCUS'];
	$OCCULT_BLOOD = $row5['OCCULT_BLOOD'];
	$REDUCING_SUBSTANCE = $row5['REDUCING_SUBSTANCE'];
	$RBC = $row5['RBC'];
	$PUSCELLS = $row5['PUSCELLS'];
	$EPITHELIAL = $row5['EPITHELIAL'];
	$OVAS = $row5['OVAS'];
	$CYSTS = $row5['CYSTS'];
	$OTHERS = $row5['OTHERS'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>COMPLETE STOOL EXAMINATION:</u></b></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr> 

<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CSECOLOUR" size="20" value="<?php echo $COLOUR;?>"/></td></tr>
<tr><td>CONSISTENCY </td><td align="left"> : <input type="text" name="CSECONSISTENCY" size="20" value="<?php echo $CONSIST;?>"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CSEREACTION" size="20" value="<?php echo $REACTION;?>"/></td></tr>        
<tr><td>MUCUS</td><td align="left"> : <input type="text" name="CSEMUCUS" size="20" value="<?php echo $MUCUS;?>"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>OCCULT BLOOD</td><td align="left"> : <input type="text" name="CSEOCCULT" size="20" value="<?php echo $OCCULT_BLOOD;?>"/></td></tr>
<tr><td>REDUCING SUBSTANCE</td><td align="left"> : <input type="text" name="CSESUBSTANCE" size="20" value="<?php echo $REDUCING_SUBSTANCE;?>"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CSERBC" size="20" value="<?php echo $RBC;?>"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CSEPUSCELLS" size="20" value="<?php echo $PUSCELLS;?>"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CSEEPITHELIAL" size="20" value="<?php echo $EPITHELIAL;?>"/>  /HPF</td></tr> 
<tr><td>OVAS</td><td> : <input type="text" name="CSEOVAS" size="20" value="<?php echo $OVAS;?>"/></td></tr> 
<tr><td>CYSTS</td><td> : <input type="text" name="CSECYSTS" size="20" value="<?php echo $CYSTS;?>"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CSEOTHERS" size="20" value="<?php echo $OTHERS;?>"/></td></tr> 
</table>
<?php
}else if($q == "HBsAg"){
$sql4 = mysqli_query($link,"select * from hbsag where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$hresult = $row5['hresult'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HBsAg</td><td> : <input type="text" name="hresult" value="<?php echo $hresult;?>"/></td></tr> 

</table>
<?php
}
else if($q == "WIDAL"){
$sql4 = mysqli_query($link,"select * from widal where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sto = $row5['sto'];
	$sth = $row5['sth'];
	$spah = $row5['spah'];
	$spbh = $row5['spbh'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b>Test</b></td><td><b>Result</b></td></tr>
<tr><td width="30%" colspan="2">WIDAL : </td></tr> 
<tr><td width="30%">Salmonella Typhi "O"</td><td> : <input type="text" name="sto" value="<?php echo $sto;?>"/></td></tr> 
<tr><td width="30%">Salmonella Typhi "H"</td><td> : <input type="text" name="sth" value="<?php echo $sth;?>"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "AH"</td><td> : <input type="text" name="spah" value="<?php echo $spah;?>"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "BH"</td><td> : <input type="text" name="spbh" value="<?php echo $spbh;?>"/></td></tr> 

</table>
<?php
}else if($q == "HAEMOGLOBIN"){
$sql4 = mysqli_query($link,"select * from haemo where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">HAEMOGLOBIN</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/> % </td><td>Male : 13.0 - 18.0 g%<br>Female : 11.5 - 16.0 g%</td></tr> 

</table>

<?php
}else if($q == "megnicium"){
$sql4 = mysqli_query($link,"select * from meg_range where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">MAGNESIUM</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/> mg/dL</td><td>1.3 - 2.5</td></tr> 

</table>

<?php
}else if($q == "Serum magnesium"){
$sql4 = mysqli_query($link,"select * from mag where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">MAGNESIUM</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/> mg/dL</td><td>1.3 - 2.5</td></tr> 

</table>


<?php
}else if($q == "D Dimar"){
$sql4 = mysqli_query($link,"select * from ddimar_range where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">D Dimer</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/> ng/mL</td><td>< 500 ng/mL  Negative <br>> 500  ng/mL  Positive </td></tr> 

</table>

<?php
}else if($q == "Beta HCG Hormones (Serum)"){
$sql4 = mysqli_query($link,"select * from hbcg_range where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">BETA HUMAN CHORIONIC 
GONADOTROPIN HORMONE (B-HCG)    
</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/> mIU/mL </td><td>< 5.3 : Non pregnant  <br> Pregnant Woman<br> Normal range : Gestational</td></tr> 

</table>

<?php
}else if($q == "ANGIOTENSIN CONVERTING ENZYME ACE"){
$sql4 = mysqli_query($link,"select * from ace_ranges where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">ACE COUNT Cells/cumm</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/> Cells/cumm </td><td>Range : 40 - 440</tr> 

</table>
<?php
}else if($q == "OGTT Test"){
$sql4 = mysqli_query($link,"select * from trop_values where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];
	$onehr = $row5['onehr'];
	$twohr = $row5['twohr'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Fasting Glucose</td><td> : <input type="text" name="haresult" value="<?php echo $haresult;?>"/>  </td><td> < 95 </tr> 
<tr><td width="30%">1 Hr. Glucose</td><td> : <input type="text" name="onehr" value="<?php echo $onehr;?>"/>  </td><td> < 180 </tr> 
<tr><td width="30%">2 Hr. Glucose</td><td> : <input type="text" name="twohr" value="<?php echo $twohr;?>"/>  </td><td> < 155 </tr> 

</table>

<?php
}else if($q == "GGT"){
$sql4 = mysqli_query($link,"select * from ogtt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
	$twohr = $row5['twohr'];



?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Fasting Glucose</td><td> : <input type="text" name="rsub" value="<?php echo $rsub;?>"/>  </td><td> < 95 </tr> 
<tr><td width="30%">2 Hr. Glucose</td><td> : <input type="text" name="twohr" value="<?php echo $twohr;?>"/>  </td><td> < 155 </tr> 

</table>

<?php
}else if($q == "RFT"){

$sql4 = mysqli_query($link,"select * from rft where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rft_rbs = $row5['rft_rbs'];
	$rft_bu = $row5['rft_bu'];
	$rft_scr = $row5['rft_scr'];
	$rft_sua = $row5['rft_sua'];
	$rft_sc = $row5['rft_sc'];
	$rft_sodium = $row5['rft_sodium'];
	$rft_potash = $row5['rft_potash'];
	$rft_chloride = $row5['rft_chloride'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>RFT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rftrbs" value="<?php echo $rft_rbs;?>"/> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="rftbu" value="<?php echo $rft_bu;?>"/> mg/dl</td><td>10 - 50 mg/dl</td></tr> 
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="rftscr" value="<?php echo $rft_scr;?>"/> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="rftsua" value="<?php echo $rft_sua;?>"/> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl </td></tr> 
<tr><td width="30%">Serum Calcium</td><td> : <input type="text" name="rftsc" value="<?php echo $rft_sc;?>"/> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Electrolytes:</u></b></td></tr>

<tr><td width="30%">Serum Sodium</td><td> : <input type="text" name="rftsodium" value="<?php echo $rft_sodium;?>"/> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="rftpotash" value="<?php echo $rft_potash;?>"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Serum Chloride</td><td> : <input type="text" name="rftchloride" value="<?php echo $rft_chloride;?>"/> mmol/l</td><td>95 - 105 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Reducing Substance"){

$sql4 = mysqli_query($link,"select * from redsub where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>

<?php
}else if($q == "HBA1C"){

$sql4 = mysqli_query($link,"select * from hba1c where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
	$rrub = $row5['rrub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HBA1C</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>
<tr><td width="30%">Average Sugar</td><td align="left"> : <input type="text" name="rrub" size="20" value="<?php echo $rrub;?>"/></td></tr>
</table>

<?php
}else if($q == "TROP -I"){

$sql4 = mysqli_query($link,"select * from tropo where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>

<?php
}else if($q == "Serum Beta levels"){

$sql4 = mysqli_query($link,"select * from sbl where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Beta levels</td><td align="left"> : <input type="text" name="haresult" size="20" value="<?php echo $haresult;?>"/></td></tr>

</table>

<?php
}else if($q == "Beta HCG 1st Day"){

$sql4 = mysqli_query($link,"select * from bhcgf where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$haresult = $row5['haresult'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="haresult" size="20" value="<?php echo $haresult;?>"/></td></tr>

</table>

<?php
}else if($q == "Chicken Gunya Serology"){

$sql4 = mysqli_query($link,"select * from chic where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Chicken Gunya Serology	</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>


<?php
}

else if($q == "NS1"){

	$sql4 = mysqli_query($link,"select * from ns1 where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
$ns1=$row['ns1'];
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>NS 1 : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">NS1</td><td><input type="text" name="ns1" size="20"  value="<?php echo $ns1 ?>"/></td>
</table>

<?php
}

else if($q == "DENGUE IGg"){

	$sql4 = mysqli_query($link,"select * from dsrigg where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
$dsrigg=$row['dsrigg'];
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>IGg : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">IGg</td><td><input type="text" name="dsrigg" size="20"  value="<?php echo $dsrigg ?>"/></td>
</table>

<?php
}

else if($q == "DENGUE IGm"){

	$sql4 = mysqli_query($link,"select * from dsrigm where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
$dsrigm=$row['dsrigm'];
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>IGm: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">IGm</td><td><input type="text" name="dsrigm" size="20"  value="<?php echo $dsrigm ?>"/></td>
</table>

<?php
}else if($q == "DENGUE NS1"){

$sql4 = mysqli_query($link,"select * from dsrns1 where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$dsrns1 = $row5['dsrns1'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">DENGUE NS1</td><td align="left"> : <input type="text" name="dsrns1" size="20" value="<?php echo $dsrns1;?>"/></td></tr>

</table>

<?php
}else if($q == "bsbp"){

$sql4 = mysqli_query($link,"select * from bsbp where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">BSBP</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>

<?php
}else if($q == "Total different cell count"){

$sql4 = mysqli_query($link,"select * from tdcc where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
	$rone = $row5['rone'];
	$rtwo = $row5['rtwo'];
	$rthree = $row5['rthree'];
	$rfour = $row5['rfour'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">NEUTROPHILS </td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>
<tr><td width="30%">LYMPHOCYTES </td><td align="left"> : <input type="text" name="rone" size="20" value="<?php echo $rsub;?>"/></td></tr>
<tr><td width="30%">MONOCYTES </td><td align="left"> : <input type="text" name="rtwo" size="20" value="<?php echo $rsub;?>"/></td></tr>
<tr><td width="30%">EOSINOPHILS </td><td align="left"> : <input type="text" name="rthree" size="20" value="<?php echo $rsub;?>"/></td></tr>
<tr><td width="30%">BASOPHILS </td><td align="left"> : <input type="text" name="rfour" size="20" value="<?php echo $rsub;?>"/></td></tr>
</table>

<?php
}else if($q == "Trop.T"){

$sql4 = mysqli_query($link,"select * from tropt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>

<?php
}else if($q == "Tropinium"){

$sql4 = mysqli_query($link,"select * from tropth where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>

<?php
}else if($q == "Urine for Pregnancy"){

$sql4 = mysqli_query($link,"select * from ufp where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>

<?php
}else if($q == "stool for occult blood"){

$sql4 = mysqli_query($link,"select * from sfob where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">stool for occult blood</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/></td></tr>

</table>

<?php
}else if($q == "SERUM TSH"){

$sql4 = mysqli_query($link,"select * from tsh where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">THYROID STIMULATING HORMONE (TSH)</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/> mIU/Ml</td></tr>

</table>

<?php
}else if($q == "SERUM LIPASE"){

$sql4 = mysqli_query($link,"select * from lip where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Lipase</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/> IU/L</td></tr>

</table>

<?php
}else if($q == "Lipase"){

$sql4 = mysqli_query($link,"select * from lipa where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rsub = $row5['rsub'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Lipase</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub;?>"/> IU/L</td></tr>

</table>

<?php
}else if($q == "semen analysis"){

$sql4 = mysqli_query($link,"select * from sam where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
$rsub = $row5['rsub'];
$rec = $row5['rec'];
$toc = $row5['toc'];
$lt = $row5['lt'];
$sv = $row5['sv'];
$tsc = $row5['tsc'];
$am = $row5['am'];
$sm = $row5['sm'];
$nm = $row5['nm'];
$nf = $row5['nf'];
$af = $row5['af'];
$rbc = $row5['rbc'];
$pcell = $row5['pcell'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>
<tr height="5px"></tr>
<tr ><td><b><u>Public Examination</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td align="left"> : <input type="text" name="rsub" size="20" value="<?php echo $rsub; ?>"/></td></tr>
<tr><td width="30%">REACTION</td><td align="left"> : <input type="text" name="rec" size="20" value="<?php echo $rec; ?>"/></td></tr>
<tr><td width="30%">TIME OF COLLECTION</td><td align="left"> : <input type="text" name="toc" size="20" value="<?php echo $toc; ?>" /></td></tr>
<tr><td width="30%">LIQUEFACTION TIME</td><td align="left"> : <input type="text" name="lt" size="20"  value="<?php echo $lt; ?>"/></td></tr>
<tr><td width="30%">SAMPLE   VOLUME</td><td align="left"> : <input type="text" name="sv" size="20" value="<?php echo $sv; ?>"/></td></tr>
<tr ><td><b><u>MICROSCOPIC EXAMINATION</u></b></td></tr>
<tr><td width="30%">TOTAL SPERM COUNT</td><td align="left"> : <input type="text" name="tsc" size="20" value="<?php echo $tsc; ?>"/></td></tr>
<tr><td width="30%">ACTIVE MOTILE</td><td align="left"> : <input type="text" name="am" size="20" value="<?php echo $am; ?>"/></td></tr>
<tr><td width="30%">SLUGGISH MOTILE</td><td align="left"> : <input type="text" name="sm" size="20" value="<?php echo $sm; ?>"/></td></tr>
<tr><td width="30%">NON MOTILE</td><td align="left"> : <input type="text" name="nm" size="20" value="<?php echo $nm; ?>"/></td></tr>
<tr><td width="30%">NORMAL FORMS</td><td align="left"> : <input type="text" name="nf" size="20" value="<?php echo $nf; ?>"/></td></tr>
<tr><td width="30%">ABNORMAL FORMS</td><td align="left"> : <input type="text" name="af" size="20" value="<?php echo $af; ?>"/></td></tr>
<tr><td width="30%">R.B.C</td><td align="left"> : <input type="text" name="rbc" size="20" value="<?php echo $rbc; ?>"/></td></tr>
<tr><td width="30%">PUSCELLS</td><td align="left"> : <input type="text" name="pcell" size="20" value="<?php echo $pcell; ?>"/></td></tr>
</table>

<?php
}else if($q == "SERUM BILIRUBIN"){
$sql4 = mysqli_query($link,"select * from sbil where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$tbil = $row5['tbil'];
	$dbil = $row5['dbil'];
	$ibil = $row5['ibil'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Serum Bilirubin : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Total Bilirubin</td><td> : <input type="text" name="tbil" size="10" value="<?php echo $tbil;?>"/> mg/dl</td><td>infants: 0.0 - 10.0 mg/dl<br>adults: 0.0 - 1.0 mg/dl</td></tr> 
<tr><td>Direct Bilirubin</td><td> : <input type="text" name="dbil" size="10" value="<?php echo $dbil;?>"/> mg/dl</td><td>infants: 0.0 - 1.0 mg/dl<br>adults: 0.0 - 0.2 mg/dl</td></tr> 
<tr><td>Indirect Bilirubin</td><td> : <input type="text" name="ibil" size="10" value="<?php echo $ibil;?>"/> mg/dl</td><td></td></tr> 

</table>
<?php
}else if($q == "BLEEDING TIME AND CLOTTING TIME"){
$sql4 = mysqli_query($link,"select * from btct where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$btime = $row5['btime'];
	$ctime = $row5['ctime'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Bleeding Time (BT)</td><td> : <input type="text" name="bt" value="<?php echo $btime;?>" size="20" /></td><td>01' Min 00'' Sec - 03' Min 00'' Sec</td></tr> 
<tr><td>Clotting Time (CT)</td><td> : <input type="text" name="ct" value="<?php echo $ctime;?>" size="20" /></td><td>03' Min 00'' Sec - 07' Min 00'' Sec</td></tr> 

</table>
<?php
}else if($q == "BLOOD GROUP"){
$sql4 = mysqli_query($link,"select * from bgroup where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$bgrp = $row5['bgrp'];
	$rhtype = $row5['rhtype'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Blood Group </td><td> : <input type="text" name="bgroup" size="20" value="<?php echo $bgrp;?>"/></td></tr> 
<tr><td>Rh Typing</td><td> : <input type="text" name="rht" size="20" value="<?php echo $rhtype;?>"/></td></tr> 

</table>
<?php
}else if($q == "BLOOD SUGAR(FBS,PLBS)"){
$sql4 = mysqli_query($link,"select * from bsugar where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$fbs = $row5['fbs'];
	$fus = $row5['fus'];
	$plbs = $row5['plbs'];
	$plus = $row5['plus'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Reference Range</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Fasting Blood Sugar</td><td> : <input type="text" name="fbs" size="20"  value="<?php echo $fbs;?>"/> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td>Fasting Urine Sugar</td><td> : <input type="text" name="fus" size="20"  value="<?php echo $fus;?>"/></td></tr> 
<tr><td>Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbs" size="20"  value="<?php echo $plbs;?>"/> mg/dl</td><td>80 – 170 mg/dl</td></tr> 
<tr><td>Post Lunch Urine Sugar </td><td> : <input type="text" name="plus" size="20"  value="<?php echo $plus;?>"/></td></tr> 

</table>
<?php
}else if($q == "HIV 1 AND 2"){
$sql4 = mysqli_query($link,"select * from hiv where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$hiv = $row5['hiv'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HIV I & II</td><td> : <input type="text" name="hiv" size="25"  value="<?php echo $hiv;?>"/></td></tr> 

</table>
<?php
}else if($q == "HCV"){
$sql4 = mysqli_query($link,"select * from hcv where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$hcv = $row5['hcv'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HCV</td><td> : <input type="text" name="hcv" size="25" value="<?php echo $hcv;?>" /></td></tr> 

</table>
<?php
}else if($q == "VDRL"){
$sql4 = mysqli_query($link,"select * from vdrl where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$vdrl = $row5['vdrl'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">VDRL</td><td> : <input type="text" name="vdrl" size="25" value="<?php echo $vdrl;?>" /></td></tr> 

</table>
<?php
}else if($q == "LIPID PROFILE"){
$sql4 = mysqli_query($link,"select * from lprofile where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sch = $row5['sch'];
	$hch = $row5['hch'];
	$lch = $row5['lch'];
	$vch = $row5['vch'];
	$stri = $row5['stri'];
	$tch = $row5['tch'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>LIPID PROFILE : </u></b></td></tr>

<tr height="5px"></tr>

<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="sch" size="20" value="<?php echo $sch;?>"/> mg/dl</td><td>Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">HDL Cholesterol</td><td> : <input type="text" name="hch" size="20" value="<?php echo $hch;?>"/> mg/dl</td><td>30 - 60 mgs/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">LDL Cholesterol</td><td> : <input type="text" name="lch" size="20" value="<?php echo $lch;?>"/> mg/dl</td><td>100 - 190 mg/dl<br>Elevated > 190 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">VLDL Cholesterol</td><td> : <input type="text" name="vch" size="20" value="<?php echo $vch;?>"/> mg/dl</td><td>05 - 35 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="stri" size="20" value="<?php echo $stri;?>"/> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">T.CHOL / HDL RATIO</td><td> : <input type="text" name="tch" size="20" value="<?php echo $tch;?>"/></td><td>less than 4.0 Normal<br>4.0 - 6.0 Boderline<br> > 6.0 High Risk</td></tr> 

</table>
<?php
}else if($q == "SPUTUM FOR AFB"){
$sql4 = mysqli_query($link,"select * from safb where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$safb = $row5['safb'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Sputum for AFB</td><td> : <input type="text" name="safb" size="25" value="<?php echo $safb;?>"/></td></tr> 

</table>
<?php
}else if($q == "PLATELET COUNT"){
$sql4 = mysqli_query($link,"select * from pcount where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$pcount = $row5['pcount'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">PLATELET COUNT</td><td> : <input type="text" name="pcount" size="10" value="<?php echo $pcount;?>"/> lakhs /cumm</td><td>1.5 - 4.5Lakhs/cumm</td></tr>

</table>
<?php
}else if($q == "SERUM CHOLESTEROL"){
$sql4 = mysqli_query($link,"select * from schole where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$schole = $row5['schole'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="schole" size="20" value="<?php echo $schole;?>"/> mg/dl</td><td>Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 

</table>
<?php
}else if($q == "SERUM TRYGLYCERIDES"){

$sql4 = mysqli_query($link,"select * from strig where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$strig = $row5['strig'];
	

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="strig" size="20" value="<?php echo $strig;?>"/> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 

</table>
<?php
}else if($q == "ALKALINE PHOSPHATE"){

$sql4 = mysqli_query($link,"select * from aphos where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$aphos = $row5['aphos'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">ALKALINE PHOSPHATE</td><td> : <input type="text" name="APHOSPHATE" size="10" value="<?php echo $aphos;?>"/> U/L</td><td>0 - 5 Yrs : 60 - 321 IU/L</td></tr> 

</table>
<?php
}else if($q == "TOTAL PROTIENS"){
$sql4 = mysqli_query($link,"select * from tprt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$tprt = $row5['tprt'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">TOTAL PROTIENS </td><td> : <input type="text" name="TPROTIENS" size="10" value="<?php echo $tprt;?>" /> g/dl</td><td>6.0 - 8.0 g/dl</td></tr> 

</table>
<?php
}else if($q == "SERUM POTASSIUM"){

$sql4 = mysqli_query($link,"select * from spotash where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$spotash = $row5['spotash'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="spotash" value="<?php echo $spotash;?>"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Smear for Microfilaria"){
$sql4 = mysqli_query($link,"select * from smicro where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$smicro = $row5['smicro'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Smear for Microfilaria</td><td> : <input type="text" name="smicro" size="25" value="<?php echo $smicro;?>"/></td></tr> 

</table>
<?php
}else if($q == "WBC Count"){
$sql4 = mysqli_query($link,"select * from wbccount where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$wbccount = $row5['wbccount'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">WBC Count</td><td> : <input type="text" name="wbccount" size="10" value="<?php echo $wbccount;?>"/> cells/cumm</td><td>4,000 - 11,000/cumm</td></tr>        

</table>
<?php
}else if($q == "Peripheral Smear"){
$sql4 = mysqli_query($link,"select * from peri where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$psrbc = $row5['psrbc'];
	$pswbc = $row5['pswbc'];
	$psplatelets = $row5['psplatelets'];
	$psres = $row5['psres'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Peripheral Smear : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>RBC</td><td> : <input type="text" name="psrbc" size="25" value="<?php echo $psrbc;?>"/></td></tr>        
<tr><td>WBC</td><td> : <input type="text" name="pswbc" size="25" value="<?php echo $pswbc;?>"/></td></tr>        
<tr><td>Platelets</td><td> : <input type="text" name="psplatelets" size="25" value="<?php echo $psplatelets;?>"/></td></tr>        
<tr><td>RESULT</td><td> : <textarea type="text" name="psres" cols="35" rows="3" value="<?php echo $psres;?>"><?php echo $psres;?></textarea></td></tr>      
</table>
<?php
}else if($q == "FBS"){
$sql4 = mysqli_query($link,"select * from fbs where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$fbss = $row5['fbss'];
	$fuss = $row5['fuss'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Fasting Blood Sugar</td><td> : <input type="text" name="fbss" size="20" value="<?php echo $fbss;?>"/> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td width="30%">Fasting Urine Sugar</td><td> : <input type="text" name="fuss" size="20" value="<?php echo $fuss;?>" /></td></tr> 

</table>
<?php
}else if($q == "PLBS"){
$sql4 = mysqli_query($link,"select * from plbs where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$plbss = $row5['plbss'];
	$pluss = $row5['pluss'];

?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbss" size="20" value="<?php echo $plbss;?>" /> mg/dl</td><td>80 – 170 mg/dl</td></tr> 
<tr><td width="30%">Post Lunch Urine Sugar </td><td> : <input type="text" name="pluss" size="20" value="<?php echo $pluss;?>"/></td></tr> 

</table>
<?php
}else if($q == "RETI COUNT"){

$sql4 = mysqli_query($link,"select * from reticount where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$rtvalue1 = $row5['rtvalue'];
	 $mbs="select * from retinormals where rtid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rtid=$row['rtid'];
$rtvalue=$row['rtvalue'];
$rttype=$row['rttype'];
$note=$row['note'];
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>HAEMOTOLOGY SEROLOGY : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">Reticulocyte Count </td><td><input type="text" name="Reticulocyte" size="10" value="<?php echo $rtvalue1; ?>"/></td><td><input type="hidden" name="rtid" value="<?php echo $rtid; ?>" size="4"/><input type="text" name="rtvalue" value="<?php echo $rtvalue; ?>" size="4"/> <input type="text" name="rttype" value="<?php echo $rttype; ?>" size="4"/> </td></tr> 
<tr><td colspan="2"> <textarea name="note" rows="3" cols="100"><?php echo $note; ?></textarea></td></tr>

</table>
<?php
}else if($q == "SGOT"){

$sql4 = mysqli_query($link,"select * from sgot where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sgotva = $row5['sgotva'];
	 $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgotv=$row['sgotv'];
$sgtt=$row['sgtt'];


?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGOT </td><td><input type="text" name="sgot" size="10" value="<?php echo $sgotva; ?>"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgotv" value="<?php echo $sgotv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 
</table>
<?php
}
else if($q == "SGPT"){

$sql4 = mysqli_query($link,"select * from sgpt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sgptva = $row5['sgptva'];
	  $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgtt=$row['sgtt'];

?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGPT </td><td><input type="text" name="sgpt" size="10" value="<?php  echo $sgptva;?>"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgptv" value="<?php echo $sgptv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 
</table>
<?php
}


else if($q == "LFT(SGOT SGPT)"){

$sql4 = mysqli_query($link,"select * from sgopt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$sgotva = $row5['sgotva'];
	$sgptva = $row5['sgptva'];
	   $mbs="select * from livernormal where lfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$lfid=$row['lfid'];
$sgptv=$row['sgptv'];
$sgotv=$row['sgotv'];
$sgtt=$row['sgtt'];




?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>BIOCHEMISTRY REPORT: </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">SGOT </td><td><input type="text" name="sgot" size="10" value="<?php echo $sgotva  ?>"/></td><td><input type="hidden" name="lfid" value="<?php echo $lfid; ?>" size="4"/><input type="text" name="sgotv" value="<?php echo $sgotv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr> 
<tr><td width="30%">SGPT </td><td><input type="text" name="sgpt" size="10" value="<?php echo $sgptva ?>"/></td><td><input type="text" name="sgptv" value="<?php echo $sgptv; ?>" size="4"/> <input type="text" name="sgtt" value="<?php echo $sgtt; ?>" size="4"/> </td></tr>

</table>
<?php
}
else if($q == "COAGGULATION(PT APTT)"){

$sql4 = mysqli_query($link,"select * from cptaptt where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$ptt = $row5['ptt'];
	$ptc = $row5['ptc'];
	  $pti = $row5['pti'];
	$apt = $row5['apt'];
	  $aptc = $row5['aptc'];
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="pttest" value="<?php echo $ptt; ?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="ptcontrol" value="<?php echo $ptc; ?>"/> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <input type="text" name="ptinr" value="<?php echo $pti; ?>"/></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="aptttest" value="<?php echo $apt; ?>"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="apttcontrol" value="<?php echo $aptc; ?>"/> seconds</td></tr> 


</table>
<?php
}
else if($q == "24 Hrs URINE PROTIEN"){

$sql4 = mysqli_query($link,"select * from urineprotinue where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$tv = $row5['tv'];
	$tp = $row5['tp'];
	  
	  
	  $mbs="select * from urinenormal where uid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$uid=$row['uid'];
$uvalue=$row['uvalue'];
$utype=$row['utype'];
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>24 Hrs URINE PROTIEN : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Total Volume</td><td> : <input type="text" name="tvolume" value="<?php echo $tv ?>"/> ml/day</td></tr> 
<tr><td width="30%">Total Protien </td><td> : <input type="text" name="tprotine" value="<?php echo $tp ?>"/> mg/day</td><td><input type="hidden" name="uid" size="3" value="<?php echo $uid; ?>"/><input type="text" name="urrange" value="<?php echo $uvalue; ?>" size="6"/><input type="text" name="utype" size="5" value="<?php echo $utype; ?>"/></td></tr> 
<tr height="5px"></tr>

</table>
<?php
}
else if($q == "BONE MARROW"){

$sql4 = mysqli_query($link,"select * from bone where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$done = $row5['done'];
	$site = $row5['site'];
	  $Cellularity = $row5['Cellularity'];
	$Ratio = $row5['Ratio'];
	$Erythropoiesis = $row5['Erythropoiesis'];
	$Myelopoiesis = $row5['Myelopoiesis'];
	$Megakaryocytes = $row5['Megakaryocytes'];
	$Lymphocytes = $row5['Lymphocytes'];
	$Plasma = $row5['Plasma'];
	$Others = $row5['Others'];
	$impression = $row5['impression'];

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>BONE MARROW ASPIRATION REPORT : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Done by </td><td> : <input type="text" name="done" value="<?php echo $done ?>"/> </td></tr> 
<tr><td width="30%">Site </td><td> : <input type="text" name="site" value="<?php echo $site ?>"/></td></tr> 
<tr><td width="30%">Cellularity </td><td> : <input type="text" name="Cellularity" value="<?php echo $Cellularity ?>"/> </td></tr> 
<tr><td width="30%">M.E. Ratio </td><td> : <input type="text" name="Ratio" value="<?php echo $Ratio ?>"/></td></tr> 
<tr><td width="30%">Erythropoiesis	 </td><td> : <input type="text" name="Erythropoiesis" value="<?php echo $Erythropoiesis ?>"/> </td></tr> 
<tr><td width="30%">Myelopoiesis </td><td> : <input type="text" name="Myelopoiesis" value="<?php echo $Myelopoiesis ?>"/></td></tr> 
<tr><td width="30%">Megakaryocytes </td><td> : <input type="text" name="Megakaryocytes" value="<?php echo $Megakaryocytes ?>"/> </td></tr> 
<tr><td width="30%">Lymphocytes </td><td> : <input type="text" name="Lymphocytes" value="<?php echo $Lymphocytes ?>"/></td></tr> 
<tr><td width="30%">Plasma cells </td><td> : <input type="text" name="Plasma" value="<?php echo $Plasma ?>"/> </td></tr> 
<tr><td width="30%">Others </td><td> : <input type="text" name="Others" value="<?php echo $Others ?>"/></td></tr> 
<tr><td width="30%">IMPRESSION   </td><td> : <textarea rows="5" name="impression" cols="50"><?php echo $impression ?></textarea></td></tr> 

</table>
<?php
}
else if($q == "Gram Stain"){

$sql4 = mysqli_query($link,"select * from gramstain where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$gs = $row5['gs'];
	$stime = $row5['stime'];
	  

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>MICRO BIOLOGY : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Gram Stain </td><td> : <input type="text" name="gram" value="<?php echo $gs ?>"/> </td></tr> 
<tr><td width="30%">Method:GRAM STAIN </td></tr>
<tr><td width="30%">Specimen Type </td><td> : <input type="text" name="Specimen" value="<?php echo $stime ?>"/></td></tr> 
</table>
<?php
}

else if($q == "FNAC"){

$sql4 = mysqli_query($link,"select * from fnac where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$test = $row5['test'];
	$site = $row5['site'];
	$microscope = $row5['microscope'];
	$impress = $row5['impress'];
	  

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>FINE NEEDLE ASPIRATION FOR CYTOLOGY : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Done by </td><td> : <input type="text" name="done" value="<?php echo $test ?>"/> </td></tr> 
<tr><td width="30%">Site </td><td> : <input type="text" name="site" value="<?php echo $site ?>"/></td></tr> 
<tr><td width="30%">Microscope    </td><td> : <textarea rows="5" cols="50" name="microscope" ><?php echo $microscope ?></textarea></td></tr> 
<tr><td width="30%">IMPRESSION   </td><td> : <textarea rows="5" cols="50" name="impression"><?php echo $impress ?></textarea></td></tr> 
</table>
<?php
}

else if($q == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){

$sql4 = mysqli_query($link,"select * from fluidexam where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$color = $row5['color'];
	$volume = $row5['volume'];
	$appearence = $row5['appearence'];
	$glouse = $row5['glouse'];
	  $protein = $row5['protein'];
	$totalcount = $row5['totalcount'];
	$polymarphs = $row5['polymarphs'];
	$lymphos = $row5['lymphos'];
	$mesoth = $row5['mesoth'];
	
	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u> Physical Examination::</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="COLOUR" size="20" value="<?php echo $color ?>"/></td></tr>
<tr><td>VOLUME</td><td align="left"> : <input type="text" name="Volume" size="20" value="<?php echo $volume ?>"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="APPEARANCE" size="20" value="<?php echo $appearence ?>"/></td></tr>

<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>GLUCOSE</td><td align="left"> : <input type="text" name="glucose" size="20" value="<?php echo $glouse ?>"/></td></tr>
<tr><td>PROTEIN</td><td align="left"> : <input type="text" name="protein" size="20" value="<?php echo $protein ?>"/></td></tr>
			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>Total Count</td><td> : <input type="text" name="totalcount" size="20" value="<?php echo $totalcount ?>"/>  cells/Cumm</td></tr> 
<tr><td>Differential Count</td><td> :Polymorphs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="Polymorphs" size="20" value="<?php echo $polymarphs ?>"/>% <br/>
Lymphocytes &nbsp;&nbsp;&nbsp; <input type="text" name="Lymphocytes" size="20" value="<?php echo $lymphos ?>"/>%<br/> 
 Mesothelial cells <input type="text" name="Mesothelial" size="20" value="<?php echo $mesoth ?>"/>%</td></tr> 

</table>
<?php
}

else if($q == "SEROLOGY(ASO RAF CRP)"){

$sql4 = mysqli_query($link,"select * from tft where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$crp = $row5['crp'];
	$raf = $row5['raf'];
	$aso = $row5['aso'];
	
	
	  $mbs="select * from crprange where crpid='1'";
$r=  mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$crpid=$row['crpid'];

$value=$row['value'];
$type=$row['type'];
       
$mbs="select * from rafnormals where rfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];


$mbs="select * from asonormals where aid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$aid=$row['aid'];
$avalue=$row['avalue'];
$atype=$row['atype'];
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td><b><u>RESULT </u></td><td><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <input type="text" name="CRPRESULT" size="20" value="<?php  echo $crp;?>"/> </td><td><input type="hidden" name="crpid" value="<?php echo $crpid; ?>" size="5"/><input size="5" type="text" name="res" value="<?php echo $value; ?>"/><input type="text" name="type" value="<?php echo $type; ?>" size="5"/></td></tr> 
<tr height="20"></tr>
<tr><td width="30%">RA FACTOR</td><td> :<input type="text" name="raf" size="20" value="<?php  echo $raf;?>"/></td><td><input type="hidden" type="rfid" name="aid" value="<?php echo $rfid; ?>" size="4"/><input type="text" name="rfvalue" value="<?php echo $rfvalue; ?>" size="10"/><input type="text" name="rftype" value="<?php echo $rftype; ?>" size="4"/></td></tr> 
<tr height="20"></tr>
<tr><td width="30%">ASO TITRE</td><td> : <input type="text" name="asot" size="20" value="<?php  echo $aso;?>"/></td><td><input type="hidden" name="aid" value="<?php echo $aid; ?>" size="4"/><input type="text" name="avalue" value="<?php echo $avalue; ?>" size="10"/><input type="text" name="atype" value="<?php echo $atype; ?>" size="4"/></td></tr> 
</table>
<?php
}

else if($q == "RA FACTOR"){

$sql4 = mysqli_query($link,"select * from raf where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$raf = $row5['raf'];
	
	$mbs="select * from rafnormals where rfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];
	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">RA FACTOR</td><td> : <input type="text" name="raf" size="20" value="<?php echo $raf; ?>"/></td><td><input type="hidden" type="rfid" name="aid" value="<?php echo $rfid; ?>" size="4"/><input type="text" name="rfvalue" value="<?php echo $rfvalue; ?>" size="10"/><input type="text" name="rftype" value="<?php echo $rftype; ?>" size="4"/></td></tr> 

</table>
<?php
}

else if($q == "BIO"){

$sql4 = mysqli_query($link,"select * from raf where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$raf = $row5['raf'];
	
	$mbs="select * from rafnormals where rfid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$rfid=$row['rfid'];
$rfvalue=$row['rfvalue'];
$rftype=$row['rftype'];
	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">RA FACTOR</td><td> : <input type="text" name="raf" size="20" value="<?php echo $raf; ?>"/></td><td><input type="hidden" type="rfid" name="aid" value="<?php echo $rfid; ?>" size="4"/><input type="text" name="rfvalue" value="<?php echo $rfvalue; ?>" size="10"/><input type="text" name="rftype" value="<?php echo $rftype; ?>" size="4"/></td></tr> 

</table>
<?php
}

else if($q == "DENGUE SEROLOGY"){

$sql4 = mysqli_query($link,"select * from dsr where bill_no='$b'");

$row5 = mysqli_fetch_array($sql4);
	$dsrigg = $row5['dsrigg'];
	$dsrigm = $row5['dsrigm'];
	$dsrns1 = $row5['dsrns1'];
	
	$mbs="select * from dsrnormal where dsid='1'";
$r=mysqli_query($link,$mbs) or die(mysqli_error($link));
$row=  mysqli_fetch_array($r);
$dsid=$row['dsid'];
$iggvalue=$row['iggvalue'];
$igmvalue=$row['igmvalue'];
$ns1value=$row['ns1value'];

	  
	  
	
	?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td style="color:red;"><b><u>DENGUE SEROLOGY : </u></b></td></tr>
<tr height="5px"></tr>

<tr><td width="30%">NS1</td><td><input type="text" name="dsrns1" size="20"  value="<?php echo $dsrns1 ?>"/></td><td>  </td></tr> 
<tr><td width="30%">IgM</td><td><input type="text" name="dsrigm" size="20"  value="<?php echo $dsrigm ?>"/></td><td>  </td></tr> 
<tr><td width="30%">IgG</td><td><input type="text" name="dsrigg" size="20" value="<?php echo $dsrigg ?>"/></td><td></td></tr> 
</table>


<?php
}


echo "@" . $r;
?>
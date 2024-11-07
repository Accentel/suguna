<?php
include("config.php");

$q=$_GET["q"];
$b=$_GET["b"];
echo "@";
?>
<input type="hidden" name="tname[]" value="<?php echo $q ?>"/>

<?php
if($q == "COMPLETE BLOOD  PICTURE (CBP)"){
$sql4 = mysql_query("select count(*) from cbp where bill_no='$b'");
if($sql4){
	$row4 = mysql_fetch_array($sql4);
	$cnt = $row4[0];
}
if($cnt <= 0){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;"><b><u>COMPLETE BLOOD PICTURE (CBP):</u></b></td></tr>
<tr><td>HAEMOGLOBIN</td><td> : <input type="text" name="HAEMOGLOBIN" size="10"/> %</td><td colspan="2">Male : 13.0 – 18.0 g% , Female : 11.5 – 16.0 g%</td></tr>
<tr><td>RBC</td><td> : <input type="text" name="RBC" size="10"/> Mill/ cumm</td><td colspan="2">Male : 4.5 – 6.5 Mill/Cumm , Female : 3.5 – 5.5 Mill/Cumm</td></tr>
<tr><td>WBC Count</td><td> : <input type="text" name="WBC" size="10"/> cells/cumm</td><td colspan="2">4,000 - 11,000/cumm</td></tr>        
<tr><td>PLATELET COUNT</td><td> : <input type="text" name="PLATELET" size="10"/> lakhs /cumm</td><td colspan="2">1.5 - 4.5Lakhs/cumm</td></tr>        

<tr height="10px"></tr>
<tr><td ><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <input type="text" name="NEUTROPHILS" size="10"/> %</td><td>40-75%</td><td>30 - 40%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <input type="text" name="LYMPHOCYTES" size="10"/> %</td><td>20-45%</td><td>40 - 60%</td></tr>
<tr><td>MONOCYTES</td><td> : <input type="text" name="MONOCYTES" size="10"/> %</td><td>02-10%</td><td>02 - 10%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <input type="text" name="EOSINOPHILS" size="10"/> %</td><td>01-06%</td><td>01 - 06%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <input type="text" name="BASOPHILS" size="10"/> %</td><td>00-01%</td><td>00 - 01%</td></tr>			
<tr height="10px"></tr>
<tr><td><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td colspan="3"> : <input type="text" name="RBC1" size="60"/></td></tr> 
<tr><td>WBC</td><td colspan="3"> : <input type="text" name="WBC1" size="60"/></td></tr> 
<tr><td>Platelets</td><td colspan="3"> : <input type="text" name="Platelets" size="60"/></td></tr> 
</table>
<?php
}else{
$sql5 = mysql_query("select * from cbp where bill_no='$b'");
if($sql5){
	$row5 = mysql_fetch_array($sql5);
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
<script>
function fun001(){
	var neutro = document.getElementById("NEUTROPHILS").value;
	var lympho = document.getElementById("LYMPHOCYTES").value;
	var mono = document.getElementById("MONOCYTES").value;
	var eosino = document.getElementById("EOSINOPHILS").value;
	var baso = document.getElementById("BASOPHILS").value;
	alert(baso);
	var sum = eval(neutro)+eval(lympho)+eval(mono)+eval(eosino)+eval(baso);
	if(sum < 100){
		alert("Please enter correct values");
		document.getElementById("BASOPHILS").focus();
	}
}
</script>
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
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>COMPLETE URINE EXAMINATION:</u></b></td></tr>
<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CUECOLOUR" size="20"/></td></tr>
<tr><td>APPEARANCE</td><td align="left"> : <input type="text" name="CUEAPPEARANCE" size="20"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CUEREACTION" size="20"/></td></tr>        
<tr><td>SPECIFIC GRAVITY</td><td align="left"> : <input type="text" name="CUESPECIFICGRAVITY" size="20"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>SUGAR</td><td align="left"> : <input type="text" name="CUESUGAR" size="20"/></td></tr>
<tr><td>ALBUMIN</td><td align="left"> : <input type="text" name="CUEALBUMIN" size="20"/></td></tr>
<tr><td>BILE SALTS</td><td align="left"> : <input type="text" name="CUEBILESALTS" size="20"/></td></tr>		 		
<tr><td>BILE PIGMENTS</td><td> : <input type="text" name="CUEBILEPIGMENTS" size="20"/></td></tr>	  				
<tr><td>UROBILINOGEN</td><td> : <input type="text" name="CUEUROBILINOGEN" size="20"/></td></tr>			
<tr><td>KETONES</td><td> : <input type="text" name="CUEKETONES" size="20"/></td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CUERBC" size="20"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CUEPUSCELLS" size="20"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CUEEPITHELIAL" size="20"/>  /HPF</td></tr> 
<tr><td>CASTS</td><td> : <input type="text" name="CUECASTS" size="20"/></td></tr> 
<tr><td>CRYSTALS</td><td> : <input type="text" name="CUECRYSTALS" size="20"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CUEOTHERS" size="20"/></td></tr> 
</table>
<?php
}else if($q == "MANTOUX TEST"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b color="red"><u>MANTOUX TEST:</u></b></td></tr>
<tr><td>GIVEN ON</td><td> : <input type="text" value="<?php echo date('d-m-Y') ?>" name="MANTOUXGIVENON"/></td></tr> 
<tr><td>REPORT ON</td><td> : <input type="text" value="<?php echo date('d-m-Y') ?>" name="MANTOUXREPORTNON"/></td></tr> 
<tr><td>RESULT</td><td> : <textarea type="text" name="MANTOUXRESULT" cols="35" rows="3" ></textarea></td></tr> 

</table>
<?php
}else if($q == "C - Reactive Protein (CRP)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td><b><u>RESULT </u></td><td><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <input type="text" name="CRPRESULT" size="20" /> mg/dl</td><td><?php echo  "< 0.6 mg/dl"; ?></td></tr> 

</table>
<?php
}else if($q == "LIVER FUNCTION TEST"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>LIVER FUNCTION TEST:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL BILIRUBIN</td><td> : <input type="text" name="LFTTBILIRUBIN" size="10" /> mg/dl</td><td>0.2 - 1.0 mg/dl</td></tr> 
<tr><td>DIRECT BILIRUBIN</td><td> : <input type="text" name="LFTDBILIRUBIN" size="10" /> mg/dl</td><td>0.2 - 0.5 mg/dl</td></tr> 
<tr><td>INDIRECT BILIRUBIN</td><td> : <input type="text" name="LFTIBILIRUBIN" size="10" /> mg/dl</td><td></td></tr> 
<tr height="10px"></tr>
<tr><td>SGOT </td><td> : <input type="text" name="LFTSGOT" size="10" /> U/L</td><td>5 - 40 U/L</td></tr> 
<tr><td>SGPT</td><td> : <input type="text" name="LFTSGPT" size="10" /> U/L</td><td>UP TO 40 U/L</td></tr> 
<tr><td>S.ALKALINE PHOSPHATE</td><td> : <input type="text" name="LFTSAPHOSPHATE" size="10" /> U/L</td><td>0 - 5 Yrs : 60 - 321 IU/L</td></tr> 
<tr><td></td><td></td><td>5 - 10Yrs : 110 - 360 IU/L</td></tr> 
<tr><td></td><td></td><td>10 - 12Yrs : 103 - 373 IU/L</td></tr> 
<tr><td></td><td></td><td>12 - 16Yrs : 67 - 382 IU/L</td></tr> 
<tr><td></td><td></td><td>> = 16 Yrs : 36 - 113 IU/L</td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <input type="text" name="LFTTPROTIENS" size="10" /> g/dl</td><td>6.0 - 8.0 g/dl</td></tr> 
<tr><td>SERUM ALBUMIN</td><td> : <input type="text" name="LFTSALBUMIN" size="10" /> g/dl</td><td>3.5 - 5.5 g/dl</td></tr> 
<tr><td>SERUM GLOBULIN</td><td> : <input type="text" name="LFTSGLOBULIN" size="10" /></td><td></td></tr> 
<tr><td>A/G  Ratio</td><td> : <input type="text" name="LFTAGRATIO" size="10" /></td><td></td></tr> 

</table>
<?php
}else if($q == "Parasite F and V"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Parasite F & V</td><td> : <textarea name="RMTRESULT" cols="35" rows="3"></textarea></td></tr> 

</table>
<?php
}else if($q == "Smear for Malarial Parasite"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td></tr> 
<tr height="5px"></tr>
<tr><td>Smear for Malarial Parasite</td><td> : <textarea name="SMPRESULT" cols="35" rows="3"></textarea></td></tr> 
</table>
<?php
}else if($q == "SERUM AMYLASE"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>BIO-CHEMISTRY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td>SERUM AMYLASE</td><td> : <input type="text" name="SAMYLASE"/> U/L</td><td>up to 90 U/L</td></tr> 

</table>
<?php
}else if($q == "Absolute Eosinophil Count (AEC)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Absolute Eosinophil Count (AEC)</td><td> : <input type="text" name="aecresult"/> cells/cumm</td><td>40 - 440 cells/cumm</td></tr> 

</table>
<?php
}else if($q == "Erythrocyte Sedimentation Rate (ESR)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Erythrocyte Sedimentation Rate (ESR)</td><td> : <input type="text" name="esrresult"/> mm/1st Hr</td><td>00 - 20 mm/1st Hr</td></tr> 

</table>
<?php
}else if($q == "Serum Electrolytes"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u><?php echo $i ?>) Serum Electrolytes:</u></b></td></tr>
<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULT </u></td><td ><b><u>NORMAL RANGE </u></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Sodium</td><td> : <input type="text" name="sodium"/> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Potassium</td><td> : <input type="text" name="potash"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Chloride</td><td> : <input type="text" name="chloride"/> mmol/l</td><td>95 - 105 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Random Blood Sugar (RBS)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rbs"/> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td width="30%">Random Urine Sugar</td><td> : <input type="text" name="rus"/></td></tr> 

</table>
<?php
}else if($q == "Blood Urea"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="burea"/> mg/dl</td><td>10 - 50 mg/dl</td></tr> 

</table>
<?php
}else if($q == "Serum Creatinine"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">

<tr height="5px"></tr>
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="creati"/> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 

</table>
<?php
}else if($q == "SERUM CALCIUM"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">SERUM CALCIUM</td><td> : <input type="text" name="cal_result"/> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 

</table>
<?php
}else if($q == "Prothrombin Time (PT)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="pttest"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="ptcontrol"/> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">INR</td><td> : <input type="text" name="ptinr"/></td></tr> 

</table>
<?php
}else if($q == "Activated Partial Thromboplastin Time (APTT)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td align="left"><b><u>TEST </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%" colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Test</td><td> : <input type="text" name="aptttest"/> seconds</td></tr> 
<tr><td width="30%">Control</td><td> : <input type="text" name="apttcontrol"/> seconds</td></tr> 

</table>
<?php
}else if($q == "Serum Uric Acid"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="sua_result"/> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl </td></tr> 

</table>
<?php
}else if($q == "COMPLETE STOOL EXAMINATION"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="20px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>COMPLETE STOOL EXAMINATION:</u></b></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr> 

<tr><td width="30%">COLOUR</td><td width="80%" align="left"> : <input type="text" name="CSECOLOUR" size="20"/></td></tr>
<tr><td>CONSISTENCY </td><td align="left"> : <input type="text" name="CSECONSISTENCY" size="20"/></td></tr>
<tr><td>REACTION</td><td align="left"> : <input type="text" name="CSEREACTION" size="20"/></td></tr>        
<tr><td>MUCUS</td><td align="left"> : <input type="text" name="CSEMUCUS" size="20"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>OCCULT BLOOD</td><td align="left"> : <input type="text" name="CSEOCCULT" size="20"/></td></tr>
<tr><td>REDUCING SUBSTANCE</td><td align="left"> : <input type="text" name="CSESUBSTANCE" size="20"/></td></tr>
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <input type="text" name="CSERBC" size="20"/>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <input type="text" name="CSEPUSCELLS" size="20"/>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <input type="text" name="CSEEPITHELIAL" size="20"/>  /HPF</td></tr> 
<tr><td>OVAS</td><td> : <input type="text" name="CSEOVAS" size="20"/></td></tr> 
<tr><td>CYSTS</td><td> : <input type="text" name="CSECYSTS" size="20"/></td></tr> 
<tr><td>OTHERS</td><td> : <input type="text" name="CSEOTHERS" size="20"/></td></tr> 
</table>
<?php
}else if($q == "HBsAg"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HBsAg</td><td> : <input type="text" name="hresult"/></td></tr> 

</table>
<?php
}else if($q == "WIDAL"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b>Test</b></td><td><b>Result</b></td></tr>
<tr><td width="30%" colspan="2">WIDAL : </td></tr> 
<tr><td width="30%">Salmonella Typhi "O"</td><td> : <input type="text" name="sto"/></td></tr> 
<tr><td width="30%">Salmonella Typhi "H"</td><td> : <input type="text" name="sth"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "AH"</td><td> : <input type="text" name="spah"/></td></tr> 
<tr><td width="30%">Salmonella Paratyphi "BH"</td><td> : <input type="text" name="spbh"/></td></tr> 

</table>
<?php
}else if($q == "HAEMOGLOBIN"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Normal Range</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">HAEMOGLOBIN</td><td> : <input type="text" name="haresult"/> % </td><td>Male : 13.0 - 18.0 g%<br>Female : 11.5 - 16.0 g%</td></tr> 

</table>
<?php
}else if($q == "RFT"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>RFT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td width="30%">Random Blood Sugar (RBS)</td><td> : <input type="text" name="rftrbs"/> mg/dl</td><td>60 - 160 mg/dl</td></tr> 
<tr><td width="30%">Blood Urea</td><td> : <input type="text" name="rftbu"/> mg/dl</td><td>10 - 50 mg/dl</td></tr> 
<tr><td width="30%">Serum Creatinine</td><td> : <input type="text" name="rftscr"/> mg/dl</td><td>0.6 - 1.5 mg/dl</td></tr> 
<tr><td width="30%">Serum Uric Acid</td><td> : <input type="text" name="rftsua"/> mg/dl</td><td>Male : 3.6 - 7.7 mg/dl<br>Female : 2.5 - 6.8 mg/dl </td></tr> 
<tr><td width="30%">Serum Calcium</td><td> : <input type="text" name="rftsc"/> mg/dl</td><td>8.5 - 10.5 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Electrolytes:</u></b></td></tr>

<tr><td width="30%">Serum Sodium</td><td> : <input type="text" name="rftsodium"/> mmol/l</td><td>135 - 155 mmol/l</td></tr> 
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="rftpotash"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 
<tr><td width="30%">Serum Chloride</td><td> : <input type="text" name="rftchloride"/> mmol/l</td><td>95 - 105 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Reducing Substance"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Reducing Substance</td><td align="left"> : <input type="text" name="rsub" size="20"/></td></tr>

</table>
<?php
}else if($q == "SERUM BILIRUBIN"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Serum Bilirubin : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Total Bilirubin</td><td> : <input type="text" name="tbil" size="10" /> mg/dl</td><td>infants: 0.0 - 10.0 mg/dl<br>adults: 0.0 - 1.0 mg/dl</td></tr> 
<tr><td>Direct Bilirubin</td><td> : <input type="text" name="dbil" size="10" /> mg/dl</td><td>infants: 0.0 - 1.0 mg/dl<br>adults: 0.0 - 0.2 mg/dl</td></tr> 
<tr><td>Indirect Bilirubin</td><td> : <input type="text" name="ibil" size="10" /> mg/dl</td><td></td></tr> 

</table>
<?php
}else if($q == "BLEEDING TIME AND CLOTTING TIME"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Bleeding Time (BT)</td><td> : <input type="text" name="bt" value="00' Min 00'' Sec" size="20" /></td><td>01' Min 00'' Sec - 03' Min 00'' Sec</td></tr> 
<tr><td>Clotting Time (CT)</td><td> : <input type="text" name="ct" value="00' Min 00'' Sec" size="20" /></td><td>03' Min 00'' Sec - 07' Min 00'' Sec</td></tr> 

</table>
<?php
}else if($q == "BLOOD GROUP"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Blood Group </td><td> : <input type="text" name="bgroup" size="20" /></td></tr> 
<tr><td>Rh Typing</td><td> : <input type="text" name="rht" size="20" /></td></tr> 

</table>
<?php
}else if($q == "BLOOD SUGAR(FBS,PLBS)"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr ><td><b><u>Test</u></b></td><td><b><u>Result</u></b></td><td><b><u>Reference Range</u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Fasting Blood Sugar</td><td> : <input type="text" name="fbs" size="20" /> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td>Fasting Urine Sugar</td><td> : <input type="text" name="fus" size="20" /></td></tr> 
<tr><td>Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbs" size="20" /> mg/dl</td><td>80 – 170 mg/dl</td></tr> 
<tr><td>Post Lunch Urine Sugar </td><td> : <input type="text" name="plus" size="20" /></td></tr> 

</table>
<?php
}else if($q == "HIV 1 AND 2"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HIV I & II</td><td> : <input type="text" name="hiv" size="25" /></td></tr> 

</table>
<?php
}else if($q == "HCV"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">HCV</td><td> : <input type="text" name="hcv" size="25" /></td></tr> 

</table>
<?php
}else if($q == "VDRL"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">VDRL</td><td> : <input type="text" name="vdrl" size="25" /></td></tr> 

</table>
<?php
}else if($q == "LIPID PROFILE"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>LIPID PROFILE : </u></b></td></tr>

<tr height="5px"></tr>

<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="sch" size="20" /> mg/dl</td><td>Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">HDL Cholesterol</td><td> : <input type="text" name="hch" size="20" /> mg/dl</td><td>30 - 60 mgs/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">LDL Cholesterol</td><td> : <input type="text" name="lch" size="20" /> mg/dl</td><td>100 - 190 mg/dl<br>Elevated > 190 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">VLDL Cholesterol</td><td> : <input type="text" name="vch" size="20" /> mg/dl</td><td>05 - 35 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="stri" size="20" /> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 
<tr height="5px"></tr>
<tr><td width="30%">T.CHOL / HDL RATIO</td><td> : <input type="text" name="tch" size="20" /></td><td>less than 4.0 Normal<br>4.0 - 6.0 Boderline<br> > 6.0 High Risk</td></tr> 

</table>
<?php
}else if($q == "SPUTUM FOR AFB"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Sputum for AFB</td><td> : <input type="text" name="safb" size="25" /></td></tr> 

</table>
<?php
}else if($q == "PLATELET COUNT"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">PLATELET COUNT</td><td> : <input type="text" name="pcount" size="10"/> lakhs /cumm</td><td>1.5 - 4.5Lakhs/cumm</td></tr>

</table>
<?php
}else if($q == "SERUM CHOLESTEROL"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Cholesterol</td><td> : <input type="text" name="schole" size="20" /> mg/dl</td><td>Normal upto 200 mgs/dl<br>Boderline Upto 239 mgs/dl<br>Elevated > 240 mgs/dl.</td></tr> 

</table>
<?php
}else if($q == "SERUM TRYGLYCERIDES"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Triglycerides</td><td> : <input type="text" name="strig" size="20" /> mg/dl</td><td>Normal less than 180 mg/dl<br>Boderline 180 - 220 mg/dl<br>High > 220 mg/dl</td></tr> 

</table>
<?php
}else if($q == "ALKALINE PHOSPHATE"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">ALKALINE PHOSPHATE</td><td> : <input type="text" name="APHOSPHATE" size="10" /> U/L</td><td>0 - 5 Yrs : 60 - 321 IU/L</td></tr> 

</table>
<?php
}else if($q == "TOTAL PROTIENS"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">TOTAL PROTIENS </td><td> : <input type="text" name="TPROTIENS" size="10" /> g/dl</td><td>6.0 - 8.0 g/dl</td></tr> 

</table>
<?php
}else if($q == "SERUM POTASSIUM"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Serum Potassium</td><td> : <input type="text" name="spotash"/> mmol/l</td><td>3.5 - 5.5 mmol/l</td></tr> 

</table>
<?php
}else if($q == "Smear for Microfilaria"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Smear for Microfilaria</td><td> : <input type="text" name="smicro" size="25"/></td></tr> 

</table>
<?php
}else if($q == "WBC Count"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">WBC Count</td><td> : <input type="text" name="wbccount" size="10"/> cells/cumm</td><td>4,000 - 11,000/cumm</td></tr>        

</table>
<?php
}else if($q == "Peripheral Smear"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr><td style="color:red;" colspan="2"><b><u>Peripheral Smear : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>RBC</td><td> : <input type="text" name="psrbc" size="25"/></td></tr>        
<tr><td>WBC</td><td> : <input type="text" name="pswbc" size="25"/></td></tr>        
<tr><td>Platelets</td><td> : <input type="text" name="psplatelets" size="25"/></td></tr>        

</table>
<?php
}else if($q == "FBS"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Fasting Blood Sugar</td><td> : <input type="text" name="fbss" size="20" /> mg/dl</td><td>70 - 110 mg/dl</td></tr> 
<tr><td width="30%">Fasting Urine Sugar</td><td> : <input type="text" name="fuss" size="20" /></td></tr> 

</table>
<?php
}else if($q == "PLBS"){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr height="5px"></tr>
<tr><td width="30%">Post Lunch Bloob Sugar</td><td> : <input type="text" name="plbss" size="20" /> mg/dl</td><td>80 – 170 mg/dl</td></tr> 
<tr><td width="30%">Post Lunch Urine Sugar </td><td> : <input type="text" name="pluss" size="20" /></td></tr> 

</table>
<?php
}


echo "@" . $r;
?>
<?php
include("config.php");

if(isset($_POST['submit'])){

$bno =$_POST['bno'];
$bdate = date('Y-m-d',strtotime($_POST['bdate']));
$pname = $_POST['pname'];
$age =$_POST['age'];
$gender = $_POST['gender'];
$dname = $_POST['dname'];
$cnt = count($_POST['tname']);
for($i=0;$i<$cnt;$i++){
	$tname = $_POST['tname'][$i];
	if($tname == "COMPLETE BLOOD  PICTURE (CBP)"){
		$HAEMOGLOBIN = $_REQUEST['HAEMOGLOBIN'];
		$RBC = $_REQUEST['RBC'];
		$WBC = $_REQUEST['WBC'];
		$PLATELET = $_REQUEST['PLATELET'];
		$NEUTROPHILS = $_REQUEST['NEUTROPHILS'];
		$LYMPHOCYTES = $_REQUEST['LYMPHOCYTES'];
		$MONOCYTES = $_REQUEST['MONOCYTES'];
		$EOSINOPHILS = $_REQUEST['EOSINOPHILS'];
		$BASOPHILS = $_REQUEST['BASOPHILS'];
		$RBC1 = $_REQUEST['RBC1'];
		$WBC1 = $_REQUEST['WBC1'];
		$Platelets = $_REQUEST['Platelets'];
		$sql3 = mysqli_query($link,"select count(*) from cbp where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into cbp(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets')");
		}else{
			$sql2 = mysqli_query($link,"update cbp set HAEMOGLOBIN='$HAEMOGLOBIN', RBC='$RBC', WBC_Count='$WBC', PLATELET_COUNT='$PLATELET', NEUTROPHILS='$NEUTROPHILS',LYMPHOCYTES='$LYMPHOCYTES',MONOCYTES='$MONOCYTES',EOSINOPHILS='$EOSINOPHILS',BASOPHILS='$BASOPHILS',RBC1='$RBC1',WBC1='$WBC1',Platelets='$Platelets' where bill_no = '$bno'");
		}
		}
	}
	
	
	
		if(($tname == "Complete hemogram")or ($tname == "Hemogram")){
		    
		$HAEMOGLOBIN = $_REQUEST['HAEMOGLOBIN'];
				$RBC = $_REQUEST['RBC'];
				$WBC_Count = $_REQUEST['WBC_Count'];
				$PLATELET_COUNT = $_REQUEST['PLATELET_COUNT'];
				$NEUTROPHILS = $_REQUEST['NEUTROPHILS'];
				$LYMPHOCYTES = $_REQUEST['LYMPHOCYTES'];
				$MONOCYTES = $_REQUEST['MONOCYTES'];
				$EOSINOPHILS = $_REQUEST['EOSINOPHILS'];
				$BASOPHILS = $_REQUEST['BASOPHILS'];
				$RBC1 = $_REQUEST['RBC1'];
				$WBC1 = $_REQUEST['WBC1'];
				$Platelets = $_REQUEST['Platelets'];
				$pvc = $_REQUEST['pvc'];
				$mcv = $_REQUEST['mcv'];
				$mch = $_REQUEST['mch'];
				$mchc = $_REQUEST['mchc'];
		$sql3 = mysqli_query($link,"select count(*) from chemo where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into chemo(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets,pvc,mcv,mch,mchc) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets','$pvc','$mcv','$mch','$mchc')");
		}else{
		    
			$sql2 = mysqli_query($link,"update chemo set HAEMOGLOBIN='$HAEMOGLOBIN', RBC='$RBC', WBC_Count='$WBC_Count', PLATELET_COUNT='$PLATELET_COUNT', NEUTROPHILS='$NEUTROPHILS',LYMPHOCYTES='$LYMPHOCYTES',MONOCYTES='$MONOCYTES',EOSINOPHILS='$EOSINOPHILS',BASOPHILS='$BASOPHILS',RBC1='$RBC1',WBC1='$WBC1',Platelets='$Platelets',pvc='$pvc',mcv='$mcv',mch='$mch',mchc='$mchc' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "C - Reactive Protein (CRP)"){
		$CRPRESULT = $_REQUEST['CRPRESULT'];
		
		$sql3 = mysqli_query($link,"select count(*) from crp where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into crp(bill_no, crp_result) values('$bno','$CRPRESULT')");
		}else{
			$sql2 = mysqli_query($link,"update crp set crp_result='$CRPRESULT' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SERUM AMYLASE"){
		$SAMYLASE = $_REQUEST['SAMYLASE'];
		
		$sql3 = mysqli_query($link,"select count(*) from amylase where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into amylase(bill_no, amylase_result) values('$bno','$SAMYLASE')");
		}else{
			$sql2 = mysqli_query($link,"update amylase set amylase_result='$SAMYLASE' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Absolute Eosinophil Count (AEC)"){
		$aecresult = $_REQUEST['aecresult'];
		
		$sql3 = mysqli_query($link,"select count(*) from aec where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into aec(bill_no, aec_result) values('$bno','$aecresult')");
		}else{
			$sql2 = mysqli_query($link,"update aec set aec_result='$aecresult' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "MANTOUX TEST"){
		$MANTOUXGIVENON = date('Y-m-d',strtotime($_REQUEST['MANTOUXGIVENON']));
		$MANTOUXREPORTNON = date('Y-m-d',strtotime($_REQUEST['MANTOUXREPORTNON']));
		$MANTOUXRESULT = mysqli_real_escape_string($link,$_REQUEST['MANTOUXRESULT']);
		
		
		//$sql2 = mysqli_query($link,"insert into mantoux(bill_no, given_on, report_on, result) values('$bno','$MANTOUXGIVENON','$MANTOUXREPORTNON','$MANTOUXRESULT')");

		
		$sql3 = mysqli_query($link,"select count(*) from mantoux where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into mantoux(bill_no, given_on, report_on, result) values('$bno','$MANTOUXGIVENON','$MANTOUXREPORTNON','$MANTOUXRESULT')");
		}else{
			$sql2 = mysqli_query($link,"update mantoux set given_on='$MANTOUXGIVENON',report_on='$MANTOUXREPORTNON',result='$MANTOUXRESULT' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Serum Creatinine"){
		$creati = mysqli_real_escape_string($link,$_REQUEST['creati']);
		
		$sql3 = mysqli_query($link,"select count(*) from creati where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into creati(bill_no, serum_result) values('$bno','$creati')");
		}else{
			$sql2 = mysqli_query($link,"update creati set serum_result='$creati' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM TRYGLYCERIDES"){
		$strig = mysqli_real_escape_string($link,$_REQUEST['strig']);
		
		$sql3 = mysqli_query($link,"select count(*) from strig where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into strig(bill_no, strig) values('$bno','$strig')");
		}else{
			$sql2 = mysqli_query($link,"update strig set strig='$strig' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Smear for Malarial Parasite"){
		
		$SMPRESULT = mysqli_real_escape_string($link,$_REQUEST['SMPRESULT']);
		
		$sql3 = mysqli_query($link,"select count(*) from smp where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into smp(bill_no, smp_result) values('$bno','$SMPRESULT')");
		}else{
			$sql2 = mysqli_query($link,"update smp set smp_result='$SMPRESULT' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Serum Uric Acid"){
		$suaresult = mysqli_real_escape_string($link,$_REQUEST['sua_result']);
		
		$sql3 = mysqli_query($link,"select count(*) from sua where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into sua(bill_no, sua_result) values('$bno','$suaresult')");
		}else{
			$sql2 = mysqli_query($link,"update sua set sua_result='$suaresult' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SERUM CALCIUM"){
		$calres = mysqli_real_escape_string($link,$_REQUEST['cal_result']);
		
		$sql3 = mysqli_query($link,"select count(*) from calcium where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into calcium(bill_no, cal_result) values('$bno','$calres')");
		}else{
			$sql2 = mysqli_query($link,"update calcium set cal_result='$calres' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "Serum Electrolytes"){
		$sodium = mysqli_real_escape_string($link,$_REQUEST['sodium']);
		$potash = mysqli_real_escape_string($link,$_REQUEST['potash']);
		$chloride = mysqli_real_escape_string($link,$_REQUEST['chloride']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from ele where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into ele(bill_no, sodium,potash,chloride) values('$bno','$sodium','$potash','$chloride')");
		}else{
			$sql2 = mysqli_query($link,"update ele set sodium='$sodium',potash='$potash',chloride='$chloride' where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "Random Blood Sugar (RBS)"){
		$rbs = mysqli_real_escape_string($link,$_REQUEST['rbs']);
		$rus = mysqli_real_escape_string($link,$_REQUEST['rus']);
		
		$sql3 = mysqli_query($link,"select count(*) from rbs where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into rbs(bill_no, rbs_result,rus) values('$bno','$rbs','$rus')");
		}else{
			$sql2 = mysqli_query($link,"update rbs set rbs_result='$rbs',rus='$rus' where bill_no = '$bno'");
		}
		}
	}
	if($tname == "HB%"){
		$rbs = mysqli_real_escape_string($link,$_REQUEST['rbs']);
		$rus = mysqli_real_escape_string($link,$_REQUEST['rus']);
		
		$sql3 = mysqli_query($link,"select count(*) from hbper where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into hbper(bill_no, rbs_result,rus) values('$bno','$rbs','$rus')");
		}else{
			$sql2 = mysqli_query($link,"update hbper set rbs_result='$rbs',rus='$rus' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Activated Partial Thromboplastin Time (APTT)"){
		$aptttest = mysqli_real_escape_string($link,$_REQUEST['aptttest']);
		$apttcontrol = mysqli_real_escape_string($link,$_REQUEST['apttcontrol']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from aptt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into aptt(bill_no, aptt_time,aptt_control) values('$bno','$aptttest','$apttcontrol')");
		}else{
			$sql2 = mysqli_query($link,"update aptt set aptt_time='$aptttest',aptt_control='$apttcontrol'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "LIVER FUNCTION TEST"){
		$LFTTBILIRUBIN = $_REQUEST['LFTTBILIRUBIN'];
		$LFTDBILIRUBIN = $_REQUEST['LFTDBILIRUBIN'];
		$LFTIBILIRUBIN = $_REQUEST['LFTIBILIRUBIN'];
		$LFTSGOT = $_REQUEST['LFTSGOT'];
		$LFTSGPT = $_REQUEST['LFTSGPT'];
		$LFTSAPHOSPHATE = $_REQUEST['LFTSAPHOSPHATE'];
		$LFTTPROTIENS = $_REQUEST['LFTTPROTIENS'];
		$LFTSALBUMIN = $_REQUEST['LFTSALBUMIN'];
		$LFTSGLOBULIN = $_REQUEST['LFTSGLOBULIN'];
		$LFTAGRATIO = $_REQUEST['LFTAGRATIO'];
		
		$sql3 = mysqli_query($link,"select count(*) from lft where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into lft(bill_no, TOTAL_BILIRUBIN,DIRECT_BILIRUBIN,INDIRECT_BILIRUBIN,SGOT,SGPT,S_ALKALINE_PHOSPHATE,TOTAL_PROTIENS,SERUM_ALBUMIN,SERUM_GLOBULIN,AG_Ratio) values('$bno','$LFTTBILIRUBIN','$LFTDBILIRUBIN','$LFTIBILIRUBIN','$LFTSGOT','$LFTSGPT','$LFTSAPHOSPHATE','$LFTTPROTIENS','$LFTSALBUMIN','$LFTSGLOBULIN','$LFTAGRATIO')");
		}else{
			$sql2 = mysqli_query($link,"update lft set TOTAL_BILIRUBIN='$LFTTBILIRUBIN',DIRECT_BILIRUBIN='$LFTDBILIRUBIN',INDIRECT_BILIRUBIN='$LFTIBILIRUBIN',SGOT='$LFTSGOT',SGPT='$LFTSGPT',S_ALKALINE_PHOSPHATE='$LFTSAPHOSPHATE',TOTAL_PROTIENS='$LFTTPROTIENS',SERUM_ALBUMIN='$LFTSALBUMIN',SERUM_GLOBULIN='$LFTSGLOBULIN',AG_Ratio='$LFTAGRATIO'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "COMPLETE URINE EXAMINATION(CUE)"){
		$CUECOLOUR = $_REQUEST['CUECOLOUR'];
		$CUEAPPEARANCE = $_REQUEST['CUEAPPEARANCE'];
		$CUEREACTION = $_REQUEST['CUEREACTION'];
		$CUESPECIFICGRAVITY = $_REQUEST['CUESPECIFICGRAVITY'];
		$CUESUGAR = $_REQUEST['CUESUGAR'];
		$CUEALBUMIN = $_REQUEST['CUEALBUMIN'];
		$CUEBILESALTS = $_REQUEST['CUEBILESALTS'];
		$CUEBILEPIGMENTS = $_REQUEST['CUEBILEPIGMENTS'];
		$CUEUROBILINOGEN = $_REQUEST['CUEUROBILINOGEN'];
		$CUEKETONES = $_REQUEST['CUEKETONES'];
		$CUERBC = $_REQUEST['CUERBC'];
		$CUEPUSCELLS = $_REQUEST['CUEPUSCELLS'];
		$CUEEPITHELIAL = $_REQUEST['CUEEPITHELIAL'];
		$CUECASTS = $_REQUEST['CUECASTS'];
		$CUECRYSTALS = $_REQUEST['CUECRYSTALS'];
		$CUEOTHERS = $_REQUEST['CUEOTHERS'];
		
		$sql3 = mysqli_query($link,"select count(*) from cue where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into cue(bill_no, COLOUR, APPEARANCE, REACTION, SPECIFIC_GRAVITY, SUGAR,ALBUMIN,BILE_SALTS,BILE_PIGMENTS,UROBILINOGEN,KETONES,RBC,PUSCELLS,EPITHELIAL_CELL,CASTS,CRYSTALS,OTHERS) values('$bno','$CUECOLOUR','$CUEAPPEARANCE','$CUEREACTION','$CUESPECIFICGRAVITY','$CUESUGAR','$CUEALBUMIN','$CUEBILESALTS','$CUEBILEPIGMENTS','$CUEUROBILINOGEN','$CUEKETONES','$CUERBC','$CUEPUSCELLS','$CUEEPITHELIAL','$CUECASTS','$CUECRYSTALS','$CUEOTHERS')");
		}else{
			$sql2 = mysqli_query($link,"update cue set COLOUR='$CUECOLOUR', APPEARANCE='$CUEAPPEARANCE', REACTION='$CUEREACTION', SPECIFIC_GRAVITY='$CUESPECIFICGRAVITY', SUGAR='$CUESUGAR',ALBUMIN='$CUEALBUMIN',BILE_SALTS='$CUEBILESALTS',BILE_PIGMENTS='$CUEBILEPIGMENTS',UROBILINOGEN='$CUEUROBILINOGEN',KETONES='$CUEKETONES',RBC='$CUERBC',PUSCELLS='$CUEPUSCELLS',EPITHELIAL_CELL='$CUEEPITHELIAL',CASTS='$CUECASTS',CRYSTALS='$CUECRYSTALS',OTHERS='$CUEOTHERS' where bill_no = '$bno'");
		}
		}
	}
	
	
	
	if($tname == "Parasite F and V"){
		$RMTRESULT = mysqli_real_escape_string($link,$_REQUEST['RMTRESULT']);
		$RMTRESULT1 = mysqli_real_escape_string($link,$_REQUEST['RMTRESULT1']);
		
		$sql3 = mysqli_query($link,"select count(*) from rmt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into rmt(bill_no, rmt_result,rmt_result1) values('$bno','$RMTRESULT','$RMTRESULT1')");

		}else{
			$sql2 = mysqli_query($link,"update rmt set rmt_result='$RMTRESULT',rmt_result1='$RMTRESULT1'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "RETI COUNT"){
		$Reticulocyte = mysqli_real_escape_string($link,$_REQUEST['Reticulocyte']);
		$rtid = mysqli_real_escape_string($link,$_REQUEST['rtid']);
		    $note= mysqli_real_escape_string($link,$_REQUEST['note']);
		mysqli_query($link,"update retinormals set note='$note' where rtid='$rtid'");
		
		$sql3 = mysqli_query($link,"select count(*) from reticount where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into reticount(bill_no, rtvalue) values('$bno','$Reticulocyte')");
		}else{
			$sql2 = mysqli_query($link,"update reticount set rtvalue='$Reticulocyte'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "PLBS"){
		$plbss = mysqli_real_escape_string($link,$_REQUEST['plbss']);
		$pluss = mysqli_real_escape_string($link,$_REQUEST['pluss']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from plbs where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into plbs(bill_no, plbss,pluss) values('$bno','$plbss','$pluss')");
		}else{
			$sql2 = mysqli_query($link,"update plbs set plbss='$plbss',pluss='$pluss'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "FBS"){
		$fbss = mysqli_real_escape_string($link,$_REQUEST['fbss']);
		$fuss = mysqli_real_escape_string($link,$_REQUEST['fuss']);
		
		$sql3 = mysqli_query($link,"select count(*) from fbs where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into fbs(bill_no, fbss,fuss) values('$bno','$fbss','$fuss')");
		}else{
			$sql2 = mysqli_query($link,"update fbs set fbss='$fbss',fuss='$fuss'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Peripheral Smear"){
		$psrbc = mysqli_real_escape_string($link,$_REQUEST['psrbc']);
		$pswbc = mysqli_real_escape_string($link,$_REQUEST['pswbc']);
		$psres = mysqli_real_escape_string($link,$_REQUEST['psres']);
		$psplatelets = mysqli_real_escape_string($link,$_REQUEST['psplatelets']);
		
		$sql3 = mysqli_query($link,"select count(*) from peri where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into peri(bill_no, psrbc,pswbc,psplatelets,psres) values('$bno','$psrbc','$pswbc','$psplatelets','$psres')");
		}else{
			$sql2 = mysqli_query($link,"update peri set psrbc='$psrbc',pswbc='$pswbc',psplatelets='$psplatelets',psres='$psres'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "WBC Count"){
		$wbccount = mysqli_real_escape_string($link,$_REQUEST['wbccount']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from wbccount where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into wbccount(bill_no, wbccount) values('$bno','$wbccount')");
		}else{
			$sql2 = mysqli_query($link,"update wbccount set wbccount='$wbccount'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Smear for Microfilaria"){
		$smicro = mysqli_real_escape_string($link,$_REQUEST['smicro']);
		
		$sql3 = mysqli_query($link,"select count(*) from smicro where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into smicro(bill_no, smicro) values('$bno','$smicro')");
		}else{
			$sql2 = mysqli_query($link,"update smicro set smicro='$smicro'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM POTASSIUM"){
		$spotash = mysqli_real_escape_string($link,$_REQUEST['spotash']);
		
		$sql3 = mysqli_query($link,"select count(*) from spotash where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into spotash(bill_no, spotash) values('$bno','$spotash')");
		}else{
			$sql2 = mysqli_query($link,"update spotash set spotash='$spotash'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "TOTAL PROTIENS"){
		$tprt = mysqli_real_escape_string($link,$_REQUEST['TPROTIENS']);
		
		$sql3 = mysqli_query($link,"select count(*) from tprt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into tprt(bill_no, tprt) values('$bno','$tprt')");
		}else{
			$sql2 = mysqli_query($link,"update tprt set tprt='$tprt' where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "ALKALINE PHOSPHATE"){
		$aphos = mysqli_real_escape_string($link,$_REQUEST['APHOSPHATE']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from aphos where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into aphos(bill_no, aphos) values('$bno','$aphos')");
		}else{
			$sql2 = mysqli_query($link,"update aphos set aphos='$aphos'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM CHOLESTEROL"){
		$schole = mysqli_real_escape_string($link,$_REQUEST['schole']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from schole where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =  mysqli_query($link,"insert into schole(bill_no, schole) values('$bno','$schole')");
		}else{
			$sql2 = mysqli_query($link,"update schole set schole='$schole'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "PLATELET COUNT"){
		$pcount = mysqli_real_escape_string($link,$_REQUEST['pcount']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from pcount where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =  mysqli_query($link,"insert into pcount(bill_no, pcount) values('$bno','$pcount')");
		}else{
			$sql2 = mysqli_query($link,"update pcount set pcount='$pcount'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SPUTUM FOR AFB"){
		$safb = mysqli_real_escape_string($link,$_REQUEST['safb']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from safb where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into safb(bill_no, safb) values('$bno','$safb')");
		}else{
			$sql2 = mysqli_query($link,"update safb set safb='$safb'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "LIPID PROFILE"){
		$sch = mysqli_real_escape_string($link,$_REQUEST['sch']);
		$hch = mysqli_real_escape_string($link,$_REQUEST['hch']);
		$lch = mysqli_real_escape_string($link,$_REQUEST['lch']);
		$vch = mysqli_real_escape_string($link,$_REQUEST['vch']);
		$stri = mysqli_real_escape_string($link,$_REQUEST['stri']);
		$tch = mysqli_real_escape_string($link,$_REQUEST['tch']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from lprofile where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into lprofile(bill_no, sch,hch,lch,vch,stri,tch) values('$bno','$sch','$hch','$lch','$vch','$stri','$tch')");
		}else{
			$sql2 = mysqli_query($link,"update lprofile set sch='$sch',hch='$hch',lch='$lch',vch='$vch',stri='$stri',tch='$tch'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "VDRL"){
		$vdrl = mysqli_real_escape_string($link,$_REQUEST['vdrl']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from vdrl where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into vdrl(bill_no, vdrl) values('$bno','$vdrl')");
		}else{
			$sql2 = mysqli_query($link,"update vdrl set vdrl='$vdrl'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "HCV"){
		$hcv = mysqli_real_escape_string($link,$_REQUEST['hcv']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from hcv where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into hcv(bill_no, hcv) values('$bno','$hcv')");
		}else{
			$sql2 = mysqli_query($link,"update hcv set hcv='$hcv'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "HIV 1 AND 2"){
		$hiv = mysqli_real_escape_string($link,$_REQUEST['hiv']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from hiv where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into hiv(bill_no, hiv) values('$bno','$hiv')");
		}else{
			$sql2 = mysqli_query($link,"update hiv set hiv='$hiv'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "BLOOD SUGAR(FBS,PLBS)"){
		$fbs = mysqli_real_escape_string($link,$_REQUEST['fbs']);
		$fus = mysqli_real_escape_string($link,$_REQUEST['fus']);
		$plbs = mysqli_real_escape_string($link,$_REQUEST['plbs']);
		$plus = mysqli_real_escape_string($link,$_REQUEST['plus']);
		
		$sql3 = mysqli_query($link,"select count(*) from bsugar where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into bsugar(bill_no, fbs,fus,plbs,plus) values('$bno','$fbs','$fus','$plbs','$plus')");
		}else{
			$sql2 = mysqli_query($link,"update bsugar set fbs='$fbs',fus='$fus',plbs='$plbs',plus='$plus'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "BLOOD GROUP"){
		$bgroup = mysqli_real_escape_string($link,$_REQUEST['bgroup']);
		$rht = mysqli_real_escape_string($link,$_REQUEST['rht']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from bgroup where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into bgroup(bill_no, bgrp,rhtype) values('$bno','$bgroup','$rht')");
		}else{
			$sql2 = mysqli_query($link,"update bgroup set bgrp='$bgroup',rhtype='$rht'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "BLEEDING TIME AND CLOTTING TIME"){
		$bt = mysqli_real_escape_string($link,$_REQUEST['bt']);
		$ct = mysqli_real_escape_string($link,$_REQUEST['ct']);
		
		$sql3 = mysqli_query($link,"select count(*) from btct where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into btct(bill_no, btime, ctime) values('$bno','$bt','$ct')");
		}else{
			$sql2 = mysqli_query($link,"update btct set btime='$bt',ctime='$ct'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "SERUM BILIRUBIN"){
		$tbil = mysqli_real_escape_string($link,$_REQUEST['tbil']);
		$dbil = mysqli_real_escape_string($link,$_REQUEST['dbil']);
		$ibil = mysqli_real_escape_string($link,$_REQUEST['ibil']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from sbil where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into sbil(bill_no, tbil,dbil,ibil) values('$bno','$tbil','$dbil','$ibil')");
		}else{
			$sql2 = mysqli_query($link,"update sbil set tbil='$tbil',dbil='$dbil',ibil='$ibil'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Reducing Substance"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from redsub where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into redsub(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update redsub set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "HBA1C"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		$rrub = mysqli_real_escape_string($link,$_REQUEST['rrub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from hba1c where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into hba1c(bill_no, rsub,rrub) values('$bno','$rsub','$rrub')");
		}else{
			$sql2 = mysqli_query($link,"update hba1c set rsub='$rsub',rrub='$rrub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "TROP -I"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from tropo where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into tropo(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update tropo set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Chicken Gunya Serology"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from chic where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into chic(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update chic set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}


	if($tname == "DENGUE NS1"){
		$dsrns1 = mysqli_real_escape_string($link,$_REQUEST['dsrns1']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from dsrns1 where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into dsrns1(bill_no, dsrns1) values('$bno','$dsrns1')");
		}else{
			$sql2 = mysqli_query($link,"update dsrns1 set dsrns1='$dsrns1'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "bsbp"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from bsbp where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into bsbp(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update bsbp set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Total different cell count"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		$rone = mysqli_real_escape_string($link,$_REQUEST['rone']);
		$rtwo = mysqli_real_escape_string($link,$_REQUEST['rtwo']);
		$rthree = mysqli_real_escape_string($link,$_REQUEST['rthree']);
		$rfour = mysqli_real_escape_string($link,$_REQUEST['rfour']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from tdcc where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into tdcc(bill_no, rsub,rone,rtwo,rthree,rfour) values('$bno','$rsub','$rone','$rtwo','$rthree','$rfour')");
		}else{
			$sql2 = mysqli_query($link,"update tdcc set rsub='$rsub',rone='$rone',rtwo='$rtwo',rthree='$rthree',rfour='$rfour'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "NS1"){
		$ns1 = mysqli_real_escape_string($link,$_REQUEST['ns1']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from ns1 where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into ns1(bill_no, ns1) values('$bno','$ns1')");
		}else{
			$sql2 = mysqli_query($link,"update ns1 set ns1='$ns1'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "DENGUE IGg"){
		$dsrigg = mysqli_real_escape_string($link,$_REQUEST['dsrigg']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from dsrigg where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into ns1dsrigg(bill_no, dsrigg) values('$bno','$dsrigg')");
		}else{
			$sql2 = mysqli_query($link,"update dsrigg set dsrigg='$dsrigg'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "DENGUE IGm"){
		$dsrigm = mysqli_real_escape_string($link,$_REQUEST['dsrigm']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from dsrigm where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into dsrigm(bill_no, dsrigm) values('$bno','$dsrigm')");
		}else{
			$sql2 = mysqli_query($link,"update dsrigm set dsrigm='$dsrigm'  where bill_no = '$bno'");
		}
		}
	}


	if($tname == "Trop.T"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from tropt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into tropt(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update tropt set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Tropinium"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from tropth where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into tropth(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update tropth set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Urine for Pregnancy"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from ufp where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into ufp(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update ufp set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "stool for occult blood"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from sfob where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into sfob(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update sfob set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}
	

	if($tname == "SERUM TSH"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from tsh where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into tsh (bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update tsh set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "SERUM LIPASE"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from lip where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into lip(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update lip set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Lipase"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from lipa where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into lipa(bill_no, rsub) values('$bno','$rsub')");
		}else{
			$sql2 = mysqli_query($link,"update lipa set rsub='$rsub'  where bill_no = '$bno'");
		}
		}
	}


	if($tname == "semen analysis"){
		$rsub = mysqli_real_escape_string($link, $_REQUEST['rsub']);
$rec = mysqli_real_escape_string($link, $_REQUEST['rec']);
$toc = mysqli_real_escape_string($link, $_REQUEST['toc']);
$lt = mysqli_real_escape_string($link, $_REQUEST['lt']);
$sv = mysqli_real_escape_string($link, $_REQUEST['sv']);
$tsc = mysqli_real_escape_string($link, $_REQUEST['tsc']);
$am = mysqli_real_escape_string($link, $_REQUEST['am']);
$sm = mysqli_real_escape_string($link, $_REQUEST['sm']);
$nm = mysqli_real_escape_string($link, $_REQUEST['nm']);
$nf = mysqli_real_escape_string($link, $_REQUEST['nf']);
$af = mysqli_real_escape_string($link, $_REQUEST['af']);
$rbc = mysqli_real_escape_string($link, $_REQUEST['rbc']);
$pcell = mysqli_real_escape_string($link, $_REQUEST['pcell']);

		
		
		$sql3 = mysqli_query($link,"select count(*) from sam where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into sam(rsub, rec, toc, lt, sv, tsc, am, sm, nm, nf, af, rbc, pcell)  values('$rsub', '$rec', '$toc', '$lt', '$sv', '$tsc', '$am', '$sm', '$nm', '$nf', '$af', '$rbc', '$pcell')");
		}else{
			$sql2 = mysqli_query($link,"update sam set rsub='$rsub', rec='$rec', toc='$toc', lt='$lt', sv='$sv', tsc='$tsc', am='$am', sm='$sm', nm='$nm', nf='$nf', af='$af', rbc='$rbc', pcell='$pcell'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "RFT"){
		$rftrbs = mysqli_real_escape_string($link,$_REQUEST['rftrbs']);
		$rftbu = mysqli_real_escape_string($link,$_REQUEST['rftbu']);
		$rftscr = mysqli_real_escape_string($link,$_REQUEST['rftscr']);
		$rftsua = mysqli_real_escape_string($link,$_REQUEST['rftsua']);
		$rftsc = mysqli_real_escape_string($link,$_REQUEST['rftsc']);
		$rftsodium = mysqli_real_escape_string($link,$_REQUEST['rftsodium']);
		$rftpotash = mysqli_real_escape_string($link,$_REQUEST['rftpotash']);
		$rftchloride = mysqli_real_escape_string($link,$_REQUEST['rftchloride']);
		
		
		
		$sql3 = mysqli_query($link,"select count(*) from rft where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into rft(bill_no, rft_rbs,rft_bu,rft_scr,rft_sua,rft_sc,rft_sodium,rft_potash,rft_chloride) values('$bno','$rftrbs','$rftbu','$rftscr','$rftsua','$rftsc','$rftsodium','$rftpotash','$rftchloride')");

		}else{
		//echo "hi";
			$sql2 = mysqli_query($link,"update rft set rft_rbs='$rftrbs',rft_bu='$rftbu',rft_scr='$rftscr',rft_sua='$rftsua',rft_sc='$rftsc',rft_sodium='$rftsodium',rft_potash='$rftpotash',rft_chloride='$rftchloride'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "HAEMOGLOBIN"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from haemo where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into haemo(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update haemo set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "megnicium"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from meg_range where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into meg_range(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update meg_range set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Serum magnesium"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from mag where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into mag(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update mag set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "D Dimar"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from ddimar_range where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into ddimar_range (bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update ddimar_range set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Beta HCG Hormones (Serum)"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from bhcg_range where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into bhcg_range(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update bhcg_range set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Serum Beta levels"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from sbl where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into sbl(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update sbl set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "Beta HCG 1st Day"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from bhcgf where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into bhcgf(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update bhcgf set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}


	if($tname == "ANGIOTENSIN CONVERTING ENZYME ACE"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from ace_ranges where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into ace_ranges(bill_no, haresult) values('$bno','$haresult')");
		}else{
			$sql2 = mysqli_query($link,"update ace_ranges set haresult='$haresult'  where bill_no = '$bno'");
		}
		}
	}
	if($tname == "OGTT Test"){
		$haresult = mysqli_real_escape_string($link,$_REQUEST['haresult']);
		$onehr = mysqli_real_escape_string($link,$_REQUEST['onehr']);
		$twohr = mysqli_real_escape_string($link,$_REQUEST['twohr']);
		
		$sql3 = mysqli_query($link,"select count(*) from trop_values where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into trop_values(bill_no, haresult, onehr, twohr) values('$bno','$haresult','$onehr','$twohr')");
		}else{
			$sql2 = mysqli_query($link,"update trop_values set haresult='$haresult',onehr='$onehr',twohr='$twohr'  where bill_no = '$bno'");
		}
		}
	}

	if($tname == "GGT"){
		$rsub = mysqli_real_escape_string($link,$_REQUEST['rsub']);
		$twohr = mysqli_real_escape_string($link,$_REQUEST['twohr']);
		
		$sql3 = mysqli_query($link,"select count(*) from ogtt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into ogtt(bill_no, rsub, twohr) values('$bno','$haresult','$twohr')");
		}else{
			$sql2 = mysqli_query($link,"update ogtt set rsub='$rsub',twohr='$twohr'  where bill_no = '$bno'");
		}
		}
	}

	
	if($tname == "WIDAL"){
		$sto = mysqli_real_escape_string($link,$_REQUEST['sto']);
		$sth = mysqli_real_escape_string($link,$_REQUEST['sth']);
		$spah = mysqli_real_escape_string($link,$_REQUEST['spah']);
		$spbh = mysqli_real_escape_string($link,$_REQUEST['spbh']);
		
		$sql3 = mysqli_query($link,"select count(*) from widal where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into widal(bill_no, sto,sth,spah,spbh) values('$bno','$sto','$sth','$spah','$spbh')");
		}else{
			$sql2 = mysqli_query($link,"update widal set sto='$sto',sth='$sth',spah='$spah',spbh='$spbh'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "HBsAg"){
		$hresult = mysqli_real_escape_string($link,$_REQUEST['hresult']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from hbsag where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into hbsag(bill_no, hresult) values('$bno','$hresult')");
		}else{
			$sql2 = mysqli_query($link,"update hbsag set hresult='$hresult'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "COMPLETE STOOL EXAMINATION"){
		$CSECOLOUR = $_REQUEST['CSECOLOUR'];
		$CSECONSISTENCY = $_REQUEST['CSECONSISTENCY'];
		$CSEREACTION = $_REQUEST['CSEREACTION'];
		$CSEMUCUS = $_REQUEST['CSEMUCUS'];
		$CSEOCCULT = $_REQUEST['CSEOCCULT'];
		$CSESUBSTANCE = $_REQUEST['CSESUBSTANCE'];
		$CSERBC = $_REQUEST['CSERBC'];
		$CSEPUSCELLS = $_REQUEST['CSEPUSCELLS'];
		$CSEEPITHELIAL = $_REQUEST['CSEEPITHELIAL'];
		$CSEOVAS = $_REQUEST['CSEOVAS'];
		$CSECYSTS = $_REQUEST['CSECYSTS'];
		$CSEOTHERS = $_REQUEST['CSEOTHERS'];
		
		$sql3 = mysqli_query($link,"select count(*) from cse where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into cse(bill_no, COLOUR, CONSIST, REACTION, MUCUS, OCCULT_BLOOD,REDUCING_SUBSTANCE,RBC,PUSCELLS,EPITHELIAL,OVAS,CYSTS,OTHERS) values('$bno','$CSECOLOUR','$CSECONSISTENCY','$CSEREACTION','$CSEMUCUS','$CSEOCCULT','$CSESUBSTANCE','$CSERBC','$CSEPUSCELLS','$CSEEPITHELIAL','$CSEOVAS','$CSECYSTS','$CSEOTHERS')");
		}else{
			$sql2 = mysqli_query($link,"update cse set  COLOUR='$CSECOLOUR', CONSIST='$CSECONSISTENCY', REACTION='$CSEREACTION', MUCUS='$CSEMUCUS', OCCULT_BLOOD='$CSEOCCULT',REDUCING_SUBSTANCE='$CSESUBSTANCE',RBC='$CSERBC',PUSCELLS='$CSEPUSCELLS',EPITHELIAL='$CSEEPITHELIAL',OVAS='$CSEOVAS',CYSTS='$CSECYSTS',OTHERS='$CSEOTHERS'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Prothrombin Time (PT)"){
		$pttest = mysqli_real_escape_string($link,$_REQUEST['pttest']);
		$ptcontrol = mysqli_real_escape_string($link,$_REQUEST['ptcontrol']);
		$ptinr = mysqli_real_escape_string($link,$_REQUEST['ptinr']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from pt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into pt(bill_no, pt_time,pt_control,pt_inr) values('$bno','$pttest','$ptcontrol','$ptinr')");
		}else{
			$sql2 = mysqli_query($link,"update pt set pt_time='$pttest',pt_control='$ptcontrol',pt_inr='$ptinr'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Blood Urea"){
		$burea = mysqli_real_escape_string($link,$_REQUEST['burea']);
		
		
		$sql3 = mysqli_query($link,"select count(*) from burea where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysqli_query($link,"insert into burea(bill_no, burea_result) values('$bno','$burea')");
		}else{
			$sql2 = mysqli_query($link,"update burea set burea_result='$burea'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "Erythrocyte Sedimentation Rate (ESR)"){
		$esrresult = mysqli_real_escape_string($link,$_REQUEST['esrresult']);
		
		$sql3 = mysqli_query($link,"select count(*) from esr where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into esr(bill_no, esr_result) values('$bno','$esrresult')");
		}else{
			$sql2 = mysqli_query($link,"update esr set esr_result='$esrresult'  where bill_no = '$bno'");
		}
		}
	}
	
	//
	
	if($tname == "SGOT"){
		$sgot = mysqli_real_escape_string($link,$_REQUEST['sgot']);
		$lfid = mysqli_real_escape_string($link,$_REQUEST['lfid']);
		
		$sgotv= mysqli_real_escape_string($link,$_REQUEST['sgotv']);
                $sgtt= mysqli_real_escape_string($link,$_REQUEST['sgtt']);
                
                
				mysqli_query($link,"update livernormal set sgotv='$sgotv',sgtt='$sgtt' where lfid='$rtid'");
		$sql3 = mysqli_query($link,"select count(*) from sgot where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into sgot(bill_no, sgotva) values('$bno','$sgot')");
		}else{
			$sql2 = mysqli_query($link,"update sgot set sgotva='$sgot'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SGPT"){
		$sgpt = mysqli_real_escape_string($link,$_REQUEST['sgpt']);
		$lfid = mysqli_real_escape_string($link,$_REQUEST['lfid']);
		
		$sgptv= mysqli_real_escape_string($link,$_REQUEST['sgptv']);
                $sgtt= mysqli_real_escape_string($link,$_REQUEST['sgtt']);
                
                
				mysqli_query($link,"update livernormal set sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		
		$sql3 = mysqli_query($link,"select count(*) from sgpt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into sgpt(bill_no, sgptva) values('$bno','$sgpt')");
		}else{
			$sql2 = mysqli_query($link,"update sgpt set sgptva='$sgpt'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "LFT(SGOT SGPT)"){
		$sgpt = mysqli_real_escape_string($link,$_REQUEST['sgpt']);
		$sgot = mysqli_real_escape_string($link,$_REQUEST['sgot']);
		$lfid = mysqli_real_escape_string($link,$_REQUEST['lfid']);
		
		$sgptv= mysqli_real_escape_string($link,$_REQUEST['sgptv']);
		$sgotv= mysqli_real_escape_string($link,$_REQUEST['sgotv']);
                $sgtt= mysqli_real_escape_string($link,$_REQUEST['sgtt']);
                
                
				mysqli_query($link,"update livernormal set sgotv='$sgotv', sgptv='$sgptv',sgtt='$sgtt' where lfid='$rtid'");
		
		$sql3 = mysqli_query($link,"select count(*) from sgopt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into sgopt(bill_no,sgotva,sgptva) values('$bno','$sgot','$sgpt')");
		}else{
			$sql2 = mysqli_query($link,"update sgopt set sgotva='$sgot',sgptva='$sgpt'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "COAGGULATION(PT APTT)"){
		$pttest = mysqli_real_escape_string($link,$_REQUEST['pttest']);
		$ptcontrol = mysqli_real_escape_string($link,$_REQUEST['ptcontrol']);
		$ptinr = mysqli_real_escape_string($link,$_REQUEST['ptinr']);
		
		
		$aptttest = mysqli_real_escape_string($link,$_REQUEST['aptttest']);
		$apttcontrol = mysqli_real_escape_string($link,$_REQUEST['apttcontrol']);
		
		$sql3 = mysqli_query($link,"select count(*) from cptaptt where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into cptaptt(bill_no, ptt,ptc,pti,apt,aptc) values('$bno','$pttest','$ptcontrol','$ptinr','$aptttest','$apttcontrol')");
		}else{
			$sql2 = mysqli_query($link,"update cptaptt set ptt='$pttest',ptc='$ptcontrol',pti='$ptinr',apt='$aptttest',aptc='$apttcontrol'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "24 Hrs URINE PROTIEN"){
		$tvolume = mysqli_real_escape_string($link,$_REQUEST['tvolume']);
		$tprotine = mysqli_real_escape_string($link,$_REQUEST['tprotine']);
		$uid = mysqli_real_escape_string($link,$_REQUEST['uid']);
		
		
		$urrange = mysqli_real_escape_string($link,$_REQUEST['urrange']);
		$utype = mysqli_real_escape_string($link,$_REQUEST['utype']);
		mysqli_query($link,"update set urinenormal uid='$uid',uvalue='$urrange',utype='$utype' where uid='1'");
		
		
		
		$sql3 = mysqli_query($link,"select count(*) from urineprotinue where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into urineprotinue(bill_no, tv,tp) values('$bno','$tvolume','$tprotine')");
		}else{
			$sql2 = mysqli_query($link,"update urineprotinue set tv='$tvolume',tp='$tprotine'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "BONE MARROW"){
		$done = mysqli_real_escape_string($link,$_REQUEST['done']);
		$site = mysqli_real_escape_string($link,$_REQUEST['site']);
		$Cellularity = mysqli_real_escape_string($link,$_REQUEST['Cellularity']);
		
		
		$Ratio = mysqli_real_escape_string($link,$_REQUEST['Ratio']);
		$Erythropoiesis = mysqli_real_escape_string($link,$_REQUEST['Erythropoiesis']);
		
		$Myelopoiesis = mysqli_real_escape_string($link,$_REQUEST['Myelopoiesis']);
		$Megakaryocytes = mysqli_real_escape_string($link,$_REQUEST['Megakaryocytes']);
		$Lymphocytes = mysqli_real_escape_string($link,$_REQUEST['Lymphocytes']);
		$Plasma = mysqli_real_escape_string($link,$_REQUEST['Plasma']);
		$Others = mysqli_real_escape_string($link,$_REQUEST['Others']);
		$impression = mysqli_real_escape_string($link,$_REQUEST['impression']);
		
		$sql3 = mysqli_query($link,"select count(*) from bone where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into bone(done,site,Cellularity,Ratio,Erythropoiesis,Myelopoiesis,Megakaryocytes,Lymphocytes,Plasma,Others,impression,bill_no) values('$done','$site','$Cellularity','$Ratio','$Erythropoiesis','$Myelopoiesis','$Megakaryocytes','$Lymphocytes','$Plasma','$Others','$impression','$bno')");
		}else{
			$sql2 = mysqli_query($link,"update bone set done='$done',site='$site',Cellularity='$Cellularity',Ratio='$Ratio',Erythropoiesis='$Erythropoiesis',Myelopoiesis='$Myelopoiesis',Megakaryocytes='$Megakaryocytes',Lymphocytes='$Lymphocytes',Plasma='$Plasma',Others='$Others',impression='$impression'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "Gram Stain"){
		$gram = mysqli_real_escape_string($link,$_REQUEST['gram']);
		$Specimen = mysqli_real_escape_string($link,$_REQUEST['Specimen']);
		
		$sql3 = mysqli_query($link,"select count(*) from gramstain where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into gramstain(bill_no,gs,stime) values('$bno','$gram','$Specimen')");

		}else{
			$sql2 = mysqli_query($link,"update gramstain set gs='$gram',stime='$Specimen'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "FNAC"){
		$done = mysqli_real_escape_string($link,$_REQUEST['done']);
		$site = mysqli_real_escape_string($link,$_REQUEST['site']); 
		$microscope = mysqli_real_escape_string($link,$_REQUEST['microscope']);
		$impression = mysqli_real_escape_string($link,$_REQUEST['impression']);
		
		$sql3 = mysqli_query($link,"select count(*) from fnac where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into fnac(bill_no,test,site,microscope,impress) values('$bno','$done','$site','$microscope','$impression')");
		}else{
			$sql2 = mysqli_query($link,"update fnac set test='$done',site='$site',microscope='$microscope',impress='$impression'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)"){
		$COLOUR = mysqli_real_escape_string($link,$_REQUEST['COLOUR']);
		$Volume = mysqli_real_escape_string($link,$_REQUEST['Volume']);
		$APPEARANCE = mysqli_real_escape_string($link,$_REQUEST['APPEARANCE']);
		
		$glucose= mysqli_real_escape_string($link,$_REQUEST['glucose']);
		$protein= mysqli_real_escape_string($link,$_REQUEST['protein']);
                $totalcount= mysqli_real_escape_string($link,$_REQUEST['totalcount']);
                
                $Polymorphs= mysqli_real_escape_string($link,$_REQUEST['Polymorphs']);
		$Lymphocytes= mysqli_real_escape_string($link,$_REQUEST['Lymphocytes']);
                $Mesothelial= mysqli_real_escape_string($link,$_REQUEST['Mesothelial']);
		
		$sql3 = mysqli_query($link,"select count(*) from fluidexam where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into fluidexam(color,volume,appearence,glouse,protein,totalcount,polymarphs,lymphos,mesoth,bill_no) values('$COLOUR','$Volume','$APPEARANCE','$glucose','$protein','$totalcount','$Polymorphs','$Lymphocytes','$Mesothelial','$bno')");

		}else{
			$sql2 = mysqli_query($link,"update fluidexam set color='$COLOUR',volume='$Volume',appearence='$APPEARANCE',glouse='$glucose',protein='$protein',totalcount='$totalcount',polymarphs='$Polymorphs',lymphos='$Lymphocytes',mesoth='$Mesothelial'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "SEROLOGY(ASO RAF CRP)"){
	
	$aid = mysqli_real_escape_string($link,$_REQUEST['aid']);
		$avalue = mysqli_real_escape_string($link,$_REQUEST['avalue']);
		$atype = mysqli_real_escape_string($link,$_REQUEST['atype']);
		
		mysqli_query($link,"update asonormals set avalue='$avalue',atype='$atype' where aid='$aid'");
		$rfid = mysqli_real_escape_string($link,$_REQUEST['rfid']);
		$rfvalue = mysqli_real_escape_string($link,$_REQUEST['rfvalue']);
		$rftype = mysqli_real_escape_string($link,$_REQUEST['rftype']);
		  mysqli_query($link,"update rafnormals set rfvalue='$rfvalue',rftype='$rftype' where rfid='$rfid'");
		  $valuea=$_REQUEST['res'];
                $type=$_REQUEST['type'];
                $crpid=$_REQUEST['crpid'];
                mysqli_query($link,"update crprange set value='$valuea',type='$type' where crpid='$crpid'");
		$CRPRESULT = mysqli_real_escape_string($link,$_REQUEST['CRPRESULT']);
				$raf = mysqli_real_escape_string($link,$_REQUEST['raf']);
				$asot = mysqli_real_escape_string($link,$_REQUEST['asot']);
		
		$sql3 = mysqli_query($link,"select count(*) from tft where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into tft(bill_no,crp,raf,aso) values('$bno','$CRPRESULT','$raf','$asot')");
		}else{
			$sql2 = mysqli_query($link,"update tft set crp='$CRPRESULT',raf='$raf',aso='$asot'  where bill_no = '$bno'");
		}
		}
	}
	
	
	if($tname == "RA FACTOR"){
	
	$raf = mysqli_real_escape_string($link,$_REQUEST['raf']);
		
		$rfid = mysqli_real_escape_string($link,$_REQUEST['rfid']);
		$rfvalue = mysqli_real_escape_string($link,$_REQUEST['rfvalue']);
		$rftype = mysqli_real_escape_string($link,$_REQUEST['rftype']);
		  mysqli_query($link,"update rafnormals set rfvalue='$rfvalue',rftype='$rftype' where rfid='$rfid'");
		
		$sql3 = mysqli_query($link,"select count(*) from raf where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into raf(bill_no, raf) values('$bno','$raf')");
		}else{
			$sql2 = mysqli_query($link,"update raf set raf='$raf'  where bill_no = '$bno'");
		}
		}
	}
	
	if($tname == "DENGUE SEROLOGY"){
	
	$dsrigg = mysqli_real_escape_string($link,$_REQUEST['dsrigg']);
		$dsrigm = mysqli_real_escape_string($link,$_REQUEST['dsrigm']);
		$dsrns1 = mysqli_real_escape_string($link,$_REQUEST['dsrns1']);
		
                $dsid= mysqli_real_escape_string($link,$_REQUEST['dsid']);
                $iggvalue= mysqli_real_escape_string($link,$_REQUEST['iggvalue']);
                $igmvalue= mysqli_real_escape_string($link,$_REQUEST['igmvalue']);
				$ns1value= mysqli_real_escape_string($link,$_REQUEST['ns1value']);
                mysqli_query($link,"update dsrnormal set iggvalue='$iggvalue', igmvalue='$igmvalue', ns1value='$ns1value'  where dsid='$dsid'");
		
		$sql3 = mysqli_query($link,"select count(*) from dsr where bill_no='$bno'");
		if($sql3){
		$row3 = mysqli_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 =mysqli_query($link,"insert into dsr(bill_no, dsrigg,dsrigm,ns1) values('$bno','$dsrigg','$dsrigm')");
		}else{
			$sql2 = mysqli_query($link,"update dsr set dsrigg='$dsrigg',dsrigm='$dsrigm',dsrns1='$dsrns1'  where bill_no = '$bno'");
		}
		}
	}
	
	
	
	
	
	
	
	
	
	}
if($sql2){
	print "<script>";
	print "alert('Successfully updated');";
	print "self.location='result_entry.php';";
	print "</script>";
	//header("Location:send_sms2.php?bno=$bno&pn=$pname&d=$bdate");
}
else{
	print "<script>";
	print "alert('unable to update');";
	print "self.location='result_entry.php';";
	print "</script>";
	}
}
?>
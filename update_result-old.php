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
		$sql3 = mysql_query("select count(*) from cbp where bill_no='$bno'");
		if($sql3){
		$row3 = mysql_fetch_array($sql3);
		$nrows = $row3[0];
		if($nrows <= 0){
			$sql2 = mysql_query("insert into cbp(bill_no, HAEMOGLOBIN, RBC, WBC_Count, PLATELET_COUNT, NEUTROPHILS,LYMPHOCYTES,MONOCYTES,EOSINOPHILS,BASOPHILS,RBC1,WBC1,Platelets) values('$bno','$HAEMOGLOBIN','$RBC','$WBC','$PLATELET','$NEUTROPHILS','$LYMPHOCYTES','$MONOCYTES','$EOSINOPHILS','$BASOPHILS','$RBC1','$WBC1','$Platelets')");
		}else{
			$sql2 = mysql_query("update cbp set HAEMOGLOBIN='$HAEMOGLOBIN', RBC='$RBC', WBC_Count='$WBC', PLATELET_COUNT='$PLATELET', NEUTROPHILS='$NEUTROPHILS',LYMPHOCYTES='$LYMPHOCYTES',MONOCYTES='$MONOCYTES',EOSINOPHILS='$EOSINOPHILS',BASOPHILS='$BASOPHILS',RBC1='$RBC1',WBC1='$WBC1',Platelets='$Platelets' where bill_no = '$bno'");
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
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
#dd{
/*margin-top:120px;*/
height: 950;
width: 100%;

margin-bottom:10px;
}
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
   /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);*/
}
.subpage {
    padding: 1cm;
  /*  border: 5px red solid;*/
    height: 245mm;
	/*padding-top:100px;*/
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}
</style>

	</head>

	<body>
	
            <?php
			include("config.php");
            $bno = $_REQUEST['bno'];
            $cnt= $_REQUEST['emp'];
				$cnt1 = explode(",",$cnt);
				$rws = count($cnt1);
				
				for($i=0;$i<$rws;$i++){
				$emp_id1 = $cnt1[$i];
				$sql2 = mysql_query("select * from reportentry where BillNo='$bno' and Ptest='$emp_id1'");
				if($sql2){
            
            
            
            ?>
            <div class="book">
    <div class="page">
	<div class="subpage">
               <table  border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
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
                                $mbss="select * from cbpnormal where id='1'";
$r=  mysql_query($mbss) or die(mysql_error());
$row=  mysql_fetch_array($r);
$id=$row['id'];
$hm=htmlspecialchars($row['hm']);
$hf=$row['hf'];
$rbcm=$row['rbcm'];
$rbcf=$row['rbcf'];
$webcount1=$row['webcount'];
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
                                
				?>
				<table  border="0" align="center" style="font-size:11px;font-family:Calibri (Body);"  >
          
          <tr height="100">
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
			<table  style="font-size:11px;padding-left:20px;font-family:Calibri (Body);border-top:1px solid #000000;" cellpadding="1" cellspacing="0">
			<tr height="10px"></tr>
			<tr><td colspan="2" ><b><u>COMPLETE BLOOD  PICTURE (CBP)</u></b></tr>
			<tr><td align="left"><b><u>TEST </u></b></td><td ><b><u>RESULTS </u></td><td><b><u>NORMAL RANGES </u></td></tr> 

				
<tr><td>HAEMOGLOBIN</td><td> : <?php echo $HAEMOGLOBIN ?> %</td><td colspan="2">Male :<?php echo $hm; ?> <?php echo $hnormal; ?> , Female : <?php echo $hf; ?> <?php echo $hnormal; ?></td></tr>
<tr><td>RBC</td><td> : <?php echo $RBC ?> Mill/ cumm</td><td colspan="2">Male : <?php echo $rbcm; ?> <?php echo $rbcnormal; ?>, Female : <?php echo $rbcf; ?> <?php echo $rbcnormal; ?></td></tr>
<tr><td>WBC Count</td><td> : <?php echo $WBC_Count ?> cells/cumm</td><td colspan="2"><?php echo $webcount1; ?> <?php echo $webcountnormal; ?></td></tr>        
<tr><td>PLATELET COUNT</td><td> : <?php echo $PLATELET_COUNT ?> lakhs /cumm</td><td colspan="2"><?php echo $plateletcount; ?> <?php echo $plateletnormal; ?></td></tr>        

<tr height="10px"></tr>
<tr><td colspan="2"><b><u>DIFFERENTIAL LEUCOCYTE COUNT:</u></b></td><td><b><u>ADULTS</u></b></td><td><b><u>CHILDRENS</u></b></td></tr> 
<tr><td>NEUTROPHILS</td><td> : <?php echo $NEUTROPHILS ?> %</td><td><?php echo $na; ?>%</td><td><?php echo $nc; ?>%</td></tr>
<tr><td>LYMPHOCYTES</td><td> : <?php echo $LYMPHOCYTES ?> %</td><td><?php echo $la; ?>%</td><td><?php echo $lc; ?>%</td></tr>
<tr><td>MONOCYTES</td><td> : <?php echo $MONOCYTES ?> %</td><td><?php echo $ma; ?>%</td><td><?php echo $mc; ?>%</td></tr>		 		
<tr><td>EOSINOPHILS</td><td> : <?php echo $EOSINOPHILS ?> %</td><td><?php echo $ea; ?>%</td><td><?php echo $ec; ?>%</td></tr>	  				
<tr><td>BASOPHILS</td><td> : <?php echo $BASOPHILS ?> %</td><td><?php echo $baa; ?>%</td><td><?php echo $bac; ?>%</td></tr>			
<tr height="10px"></tr>
<tr><td colspan="2"><b><u>PERIPHERAL SMEAR EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td colspan="2"> : <?php echo $RBC1 ?></td></tr> 
<tr><td>WBC</td><td colspan="2"> : <?php echo $WBC1 ?></td></tr> 
<tr><td>Platelets</td><td colspan="2"> : <?php echo $Platelets ?></td></tr> 
<tr><td colspan="3"><b>Method :Cell Counter/Microscope</b></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td><img src="images/images.png"/></td></tr>
<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>
<tr><td colspan="4"><b>Kindly Correlate Clinically,if there's a need discuss.</b></td></tr>
	
                        </table>
           </div>
		   </div>
		    </div>
<?php 

                                } if($emp_id1 == "MANTOUX TEST"){	
                                    
                                    ?>
                                    
                <table id="dd"  align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
			<td colspan="4" height="845">
			<table width="100%" style="font-size:11px;padding-left:20px;font-family:Calibri (Body);border-top:1px solid #000000;" cellpadding="1" cellspacing="0">
			<tr height="10px"></tr>
		
			<?php 
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
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
                        </table>
          
		
        
			
			<?php } 
                        if($emp_id1 == "COMPLETE URINE EXAMINATION(CUE)"){	
                                    
                                    ?>
									<div class="book">
                           <div class="page">
	<div class="subpage">         
                <table  style="margin-top:20px;" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
			<td colspan="4" height="845">
			<table width="100%" style="font-size:11px;padding-left:20px;font-family:Calibri (Body);border-top:1px solid #000000;" cellpadding="1" cellspacing="0">
			<tr height="10px"></tr>
		
			<?php 
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
		
		}
                
                
                
                
                
                
                
                
                ?>
			


                        <tr><td colspan="2" align="center"><b><u>COMPLETE URINE EXAMINATION</u></b></tr>
<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr>
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
<tr><td colspan="3"><img src="images/images.png" width="164" height="50"/></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>
                        </table>
           
		</div>
		</div>
        </div>
			
			<?php }
                        
                        /*
                         * crp report
                         */
                                if($emp_id1 == "C - Reactive Protein (CRP)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table id="dd" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from crp where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$CRPRESULT = $row2['crp_result'];
		
		}?>
		<?php
$mbs="select * from crprange where crpid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$crpid=$row['crpid'];

$value=$row['value'];
$type=$row['type'];
       

?>	


                        <tr><td style="color:red;" colspan="4" align="center"><b><u>SEROLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u style="font-size:15px;">TEST </u></b></td><td ><b><u style="font-size:15px;">RESULT </u></td><td><b><u style="font-size:15px;">REFERENCE RANGE </u></td></tr>
<tr height="5px"></tr>
<tr><td>C - Reactive Protein (CRP)</td><td> : <?php echo $CRPRESULT ."&nbsp;&nbsp;".$type; ?></td><td> <?php echo  $value."&nbsp;&nbsp;".$type; ?></td></tr> 
<tr><td colspan="3"><br/><br/></td></tr>
<tr><td colspan="3"><b>(Method:Immunoturbidimetric.)</b></td></tr>
<tr><td colspan="2"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*
                         * Liver Function Test
                         *                          */
                        if($emp_id1 == "LIVER FUNCTION TEST"){	
                                    
                                    ?>
									<div class="book">
                                   <div class="page">
	<div class="subpage">
                <table  style="margin-top:20px;" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
			<td colspan="4" height="845">
			<table width="100%" style="font-size:11px;padding-left:20px;font-family:Calibri (Body);border-top:1px solid #000000;" cellpadding="1" cellspacing="0">
			<tr height="10px"></tr>
		
			<?php 
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
		
		}
                
                
              $mbs="select * from livernormal where lfid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$lfid=$row['lfid'];
$ltbv=$row['ltbv'];
$ldbv=$row['ldbv'];
$ldbt=$row['ldbt'];
$sgotv=$row['sgotv'];
$sgptv=$row['sgptv'];
$sgtt=$row['sgtt'];
$slv1=$row['slv1'];
$slv2=$row['slv2'];
$slv3=$row['slv3'];
$slv4=$row['slv4'];
$slv5=$row['slv5'];
$slvt=$row['slvt'];
$tpv=$row['tpv'];
$sav=$row['sav'];
$tpt=$row['tpt'];

                
                
                
                
                ?>
			


                        <tr height="5px"></tr>

<tr><td colspan="3" align="center" ><b><u>BIOCHEMISTRY REPORT</u></b></tr>
<tr><td><br/></td></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2" ><b><u>LIVER FUNCTION TEST</u></b></tr>
<tr><td>TOTAL BILIRUBIN</td><td> : <?php echo $LFTTBILIRUBIN."&nbsp;&nbsp;".$ldbt  ?> </td><td><?php echo $ltbv."&nbsp;&nbsp;".$ldbt ?></td></tr> 
<tr><td>DIRECT BILIRUBIN</td><td> : <?php echo $LFTDBILIRUBIN ."&nbsp;&nbsp;".$ldbt?></td><td><?php echo $ldbv."&nbsp;&nbsp;".$ldbt ?></td></tr> 
<tr><td>INDIRECT BILIRUBIN</td><td> : <?php echo $LFTIBILIRUBIN ?> mg/dl</td><td></td></tr> 
<tr height="10px"></tr>
<tr><td>SGOT </td><td> : <?php echo $LFTSGOT."&nbsp;&nbsp;".$sgtt ?> </td><td><?php echo $sgotv."&nbsp;&nbsp;".$sgtt ?></td></tr> 
<tr><td>SGPT</td><td> : <?php echo $LFTSGPT ."&nbsp;&nbsp;".$sgtt?></td><td><?php echo $sgptv."&nbsp;&nbsp;".$sgtt ?></td></tr> 
<tr><td>S.ALKALINE PHOSPHATE</td><td> : <?php echo $LFTSAPHOSPHATE ?>U/L </td><td><?php echo $sav."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td></td><td></td><td><?php echo $slv2."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td></td><td></td><td><?php echo $slv3."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td></td><td></td><td><?php echo $slv4."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr><td></td><td></td><td><?php echo $slv5."&nbsp;&nbsp;".$slvt ?></td></tr> 
<tr height="5px"></tr>
<tr><td>TOTAL PROTIENS </td><td> : <?php echo $LFTTPROTIENS ?> g/dl</td><td><?php echo $tpv."&nbsp;&nbsp;".$tpt ?></td></tr> 
<tr><td>SERUM ALBUMIN</td><td> : <?php echo $LFTSALBUMIN ?> g/dl</td><td><?php echo $sav."&nbsp;&nbsp;".$tpt ?></td></tr> 
<tr><td>SERUM GLOBULIN</td><td> : <?php echo $LFTSGLOBULIN ?></td><td></td></tr> 
<tr><td>A/G  Ratio</td><td> : <?php echo $LFTAGRATIO ?></td><td></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>


                        </table>
           
        </div>
		</div>
			</div>
			<?php }
                        
                        
                        /*
                         * 
                         * Parasite F and V
                         *                          */
                        
                        if($emp_id1 == "Parasite F and V"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from rmt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$RMTRESULT = $row2['rmt_result'];
		
		}?>
			


                        <tr height="5px"></tr>
<tr><td style="color:red;" colspan="4" align="center"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td>Parasite F & V  : </td><td><pre><?php echo $RMTRESULT ?></pre></td></tr> 
<tr><td colspan="2"><b>(Rapid Plasmodium falciparum & vivax test)</b></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*
                         * Smear for Malarial Parasite
                         *                          */
                        
                        if($emp_id1 == "Smear for Malarial Parasite"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from smp where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$SMPRESULT = $row2['smp_result'];
		
		}?>
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="4" align="center"><b><u>HEMATOLOGY REPORT:</u></b></td></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr height="5px"></tr>
<tr><td>Smear for Malarial Parasite  : </td><td><?php echo $SMPRESULT ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*
                         * SERUM AMYLASE
                         *                          */
                        
                        if($emp_id1 == "SERUM AMYLASE"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from amylase where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$SMAMYLASE = $row2['amylase_result'];
		
		}
                
                 $mbq="select * from serumamynirmal where said='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$said=$row['said'];
$savalue=$row['savalue'];
$satype=$row['satype'];
                
                
                ?>

<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>SERUM AMYLASE</td><td> : <?php echo $SMAMYLASE."&nbsp;&nbsp;".$satype;  ?></td><td><?php echo $savalue."&nbsp;&nbsp;".$satype; ?></td></tr> 
<tr><td colspan="4"><br></br></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*
                         * Absolute Eosinophil Count (AEC)
                         */
                        
                        if($emp_id1 == "Absolute Eosinophil Count (AEC)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from aec where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aecresult = $row2['aec_result'];
		
		}
                
                
                
                $mbq="select * from aecrange where aecid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$aecid=$row['aecid'];
$aecvalue=$row['aecvalue'];
$aectype=$row['aectype'];
                
                
                
                ?>

<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr height="5px"></tr>
<tr><td>Absolute Eosinophil Count (AEC)</td><td> : <?php echo $aecresult."&nbsp;&nbsp;".$aectype; ?> </td><td><?php echo $aecvalue."&nbsp;&nbsp;".$aectype; ?></td></tr> 
<tr><td colspan="4"><br></br></td></tr>
<tr><td colspan="3"><img src="images/images.png" width="164" height="50"/></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*  Erythrocyte Sedimentation Rate (ESR)  */
                        
                        if($emp_id1 == "Erythrocyte Sedimentation Rate (ESR)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from esr where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$esrresult = $row2['esr_result'];
		
		}
                $mbq="select * from esrresult where esrid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$esrid=$row['esrid'];
$esrvalue=$row['esrvalue'];
$esrtype=$row['esrtype'];
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Erythrocyte Sedimentation Rate (ESR)</td><td> : <?php echo $esrresult."&nbsp;&nbsp;".$esrtype; ?>  </td><td><?php echo $esrvalue."&nbsp;&nbsp;".$esrtype; ?></td></tr> 
		<tr><td colspan="4"><br></br></td></tr>
    <tr><td colspan="3"><img src="images/images.png" width="164" height="50"/></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>
                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*   Serum Electrolytes   */
                        
                        if($emp_id1 == "Serum Electrolytes"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from ele where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sodium = $row2['sodium'];
		$potash = $row2['potash'];
		$chloride = $row2['chloride'];
		
		}
                 $mbq="select * from sele where seid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$seid=$row['seid'];
$svalue=$row['svalue'];
$pvalue=$row['pvalue']; 
$cvalue=$row['cvalue'];
$stype=$row['stype'];
                
                
                ?>

<tr height="5px"></tr>
<tr><td colspan="3" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td colspan="2" ><b><u>Serum Electrolytes</u></b></tr>
<tr><td >Sodium</td><td> : <?php echo $sodium ."&nbsp;&nbsp;".$stype;?> </td><td><?php echo $svalue."&nbsp;&nbsp;".$stype; ?></td></tr> 
<tr><td >Potassium</td><td> : <?php echo $potash ."&nbsp;&nbsp;".$stype;?></td><td><?php echo $pvalue."&nbsp;&nbsp;".$stype; ?></td></tr> 
<tr><td >Chloride</td><td> : <?php echo $chloride ."&nbsp;&nbsp;".$stype;?></td><td><?php echo $cvalue."&nbsp;&nbsp;".$stype; ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*  Random Blood Sugar (RBS)  */
                        
                        if($emp_id1 == "Random Blood Sugar (RBS)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from rbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$rbs = $row2['rbs_result'];
		$rus = $row2['rus'];
		
		}
                
               $mbq="select * from rbsrange where rbsid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$rbsid=$row['rbsid'];
$rbsvalue=$row['rbsvalue'];
$rbstype=$row['rbstype']; 
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td >Random Blood Sugar (RBS)</td><td> : <?php echo $rbs."&nbsp;&nbsp;".$rbstype; ?></td><td><?php echo $rbsvalue."&nbsp;&nbsp;".$rbstype; ?></td></tr> 
<tr><td >Random Urine Sugar</td><td> : <?php echo $rus ?></td></tr> 
		<tr><td colspan="4"><br></br></td></tr>
                <tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*   Blood Urea   */
                        
                        if($emp_id1 == "Blood Urea"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from burea where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$burea = $row2['burea_result'];
		
		}
                
                $mbq="select * from bunormals where buid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$buid=$row['buid'];
$buvalue=$row['buvalue'];
$butype=$row['butype'];
                
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>


<tr><td >Blood Urea</td><td> : <?php echo $burea."&nbsp;&nbsp;".$butype; ?></td><td><?php echo $buvalue."&nbsp;&nbsp;".$butype; ?></td></tr> 
<tr><td colspan="3"></td><td><BR/></td></tr>
 <tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*  Serum Creatinine  */
                        
                        if($emp_id1 == "Serum Creatinine"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from creati where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sresult = $row2['serum_result'];
		
		}
                
                $mbq="select * from creatinormals where cid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$cid=$row['cid'];
$cvalue=$row['cvalue'];
$ctype=$row['ctype'];
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td >Serum Creatinine</td><td> : <?php echo $sresult."&nbsp;&nbsp;".$ctype; ?> </td><td><?php echo $cvalue."&nbsp;&nbsp;".$ctype; ?></td></tr> 
		
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*  SERUM CALCIUM  */
                        
                        if($emp_id1 == "SERUM CALCIUM"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from calcium where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$calresult = $row2['cal_result'];
		
		}
                
                $mbq="select * from scnormal where scid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$scid=$row['scid'];
$scvalue=$row['scvalue'];
$sctype=$row['sctype'];
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td >SERUM CALCIUM</td><td> : <?php echo $calresult ."&nbsp;&nbsp;".$sctype ?></td><td><?php echo $scvalue."&nbsp;&nbsp;".$sctype ?></td></tr>
<tr><td colspan="3"></td><td><BR/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* Prothrombin Time (PT) */
                        
                        if($emp_id1 == "Prothrombin Time (PT)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from pt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$pttest = $row2['pt_time'];
		$ptcontrol = $row2['pt_control'];
		$ptinr = $row2['pt_inr'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td  colspan="2"><b><u>Prothrombin Time (PT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td >Test</td><td> : <?php echo $pttest ?> seconds</td></tr> 
<tr><td >Control</td><td> : <?php echo $ptcontrol ?> seconds</td></tr> 
<tr height="5px"></tr>
<tr><td >INR</td><td> : <?php echo $ptinr ?></td></tr> 
		
<tr><td colspan="3"><img src="images/images.png" width="164" height="50"/></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* Activated Partial Thromboplastin Time (APTT) */
                        
                        if($emp_id1 == "Activated Partial Thromboplastin Time (APTT)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from aptt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aptttest = $row2['aptt_time'];
		$apttcontrol = $row2['aptt_control'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td  colspan="2"><b><u>Activated Partial Thromboplastin Time (APTT) : </u></b></td></tr> 
<tr height="5px"></tr>
<tr><td >Test</td><td> : <?php echo $aptttest ?> seconds</td></tr> 
<tr><td >Control</td><td> : <?php echo $apttcontrol ?> seconds</td></tr> 
<tr><td colspan="4"><br/></td></tr>
				<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* Serum Uric Acid */
                        
                        if($emp_id1 == "Serum Uric Acid"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from sua where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$suaresult = $row2['sua_result'];
		
		}
                $sql21 = mysql_query("select * from serumuricacidnormals where suaid='1'");
		while($r=  mysql_fetch_array($sql21)){
                    
		$sum = $r['sum'];
                $sumv = $r['sumv'];
                $suf = $r['suf'];
                $sufv = $r['sufv'];
		$suaid = $r['suaid'];
		}
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Serum Uric Acid</td><td> : <?php echo $suaresult ."&nbsp;&nbsp;".$sumv;?> </td><td>Male ::<?php echo $sum."&nbsp;&nbsp;".$sumv;?><br>Female :<?php echo $suf."&nbsp;&nbsp;". $sufv;?></td></tr> 
<tr><td colspan="3"></td><td><b><BR/></b></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* COMPLETE STOOL EXAMINATION */
                        
                        if($emp_id1 == "COMPLETE STOOL EXAMINATION"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
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
<tr><td colspan="4" align="center" ><b><u>COMPLETE STOOL EXAMINATION</u></b></tr>

<tr><td colspan="2"><b><u>PHYSICAL EXAMINATION:</u></b></td></tr> 

<tr><td >COLOUR</td><td > : <?php echo $CSECOLOUR ?></td></tr>
<tr><td>CONSISTENCY</td><td align="left"> : <?php echo $CSECONSIST ?></td></tr>
<tr><td>REACTION</td><td align="left"> : <?php echo $CSEREACTION ?></td></tr>        
<tr><td>MUCUS</td><td align="left"> : <?php echo $CSEMUCUS ?></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2"><b><u>CHEMICAL EXAMINATION:</u></b></td></tr> 
<tr><td>OCCULT BLOOD</td><td align="left"> : <?php echo $CSEOCCULT_BLOOD ?></td></tr>
<tr><td>REDUCING SUBSTANCE</td><td align="left"> : <?php echo $CSEREDUCING_SUBSTANCE ?></td></tr>
<tr height="5px"></tr>
<tr><td colspan="2"><b><u>MICROSCOPIC EXAMINATION:</u></b></td></tr> 
<tr><td>RBC</td><td> : <?php echo $CSERBC ?>  /HPF</td></tr> 
<tr><td>PUSCELLS</td><td> : <?php echo $CSEPUSCELLS ?>  /HPF</td></tr> 
<tr><td>EPITHELIAL CELL</td><td> : <?php echo $CSEEPITHELIAL ?>  /HPF</td></tr> 
<tr><td>OVAS</td><td> : <?php echo $CSEOVAS ?></td></tr> 
<tr><td>CYSTS</td><td> : <?php echo $CSECYSTS?></td></tr> 
<tr><td>OTHERS</td><td> : <?php echo $CSEOTHERS ?></td></tr> 

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td><img src="images/images.png"/></td></tr>
<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* HBsAg */
                        
                        if($emp_id1 == "HBsAg"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from hbsag where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hresult = $row2['hresult'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td ><b><u>TEST</u></b></tr>
<tr><td colspan="2">HBsAg  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $hresult ?></td></tr>
<tr><td ><b>(Rapid Card Method)</b></tr>

<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /**/
                        
                        if($emp_id1 == "WIDAL"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from widal where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sto = $row2['sto'];
		$sth = $row2['sth'];
		$spah = $row2['spah'];
		$spbh = $row2['spbh'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:15px;">TEST </u></b></td><td ><b><u style="font-size:15px;">RESULT </u></td></tr>
<tr><td  colspan="4"><b>WIDAL TEST: </b></td></tr> 
<tr height="5px"></tr>
<tr><td >Salmonella Typhi "O"</td><td> : <?php echo $sto ?></td></tr> 
<tr><td >Salmonella Typhi "H"</td><td> : <?php echo $sth ?></td></tr> 
<tr><td >Salmonella Paratyphi "AH"</td><td> : <?php echo $spah ?></td></tr> 
<tr><td >Salmonella Paratyphi "BH"</td><td> : <?php echo $spbh ?></td></tr> 

<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* HAEMOGLOBIN */
                        
                        if($emp_id1 == "HAEMOGLOBIN"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from haemo where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$haresult = $row2['haresult'];
		
		}
                
                $mbs="select * from hemgnormals where hmgid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$hmgid=$row['hmgid'];
$hmdm=$row['hmdm'];
$hmdf=$row['hmdf'];
    $hmdtype=$row['hmdtype'];
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td >HAEMOGLOBIN</td><td> : <?php echo $haresult ?> % </td><td>Male : <?php echo $hmdm."&nbsp;&nbsp;".$hmdtype; ?><br>Female : <?php echo $hmdf."&nbsp;&nbsp;".$hmdtype; ?></td></tr> 
		
    <tr><td colspan="3"><img src="images/images.png" width="164" height="50"/></td><td><b><?php echo $s2; ?></b></td></tr>
<tr><td colspan="4"><b>Dr. Krishna Reddy MD,</b></td></tr>
<tr><td colspan="4"><b>Consultant Pathologist</b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* RFT */
                        
                        if($emp_id1 == "RFT"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from rft where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$rftrbs = $row2['rft_rbs'];
		$rftbu = $row2['rft_bu'];
		$rftscr = $row2['rft_scr'];
		$rftsua = $row2['rft_sua'];
		$rftsc = $row2['rft_sc'];
		$rftsodium = $row2['rft_sodium'];
		$rftpotash = $row2['rft_potash'];
		$rftchlodride = $row2['rft_chloride'];
		}
                
                
                
                
                
                
                $r1=  mysql_query("select * from rbsrange where rbsid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$rbsid1=$row['rbsid'];
$rbsvalue1=$row['rbsvalue'];
$rbstype1=$row['rbstype'];
    
$r1=  mysql_query("select * from bunormals where buid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$buid1=$row['buid'];
$buvalue1=$row['buvalue'];
$butype1=$row['butype'];

$r1=  mysql_query("select * from creatinormals where cid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$cid1=$row['cid'];
$cvalue1=$row['cvalue'];
$ctype1=$row['ctype'];

$sql21 = mysql_query("select * from serumuricacidnormals where suaid='1'");
		while($r=  mysql_fetch_array($sql21)){
                    
		$sum1 = $r['sum'];
                $sumv1 = $r['sumv'];
                $suf1 = $r['suf'];
                $sufv1 = $r['sufv'];
		$suaid1 = $r['suaid'];
		}
$r1=  mysql_query("select * from scnormal where scid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$scid1=$row['scid'];
$scvalue1=$row['scvalue'];
$sctype1=$row['sctype'];



$r1=  mysql_query("select * from sele where seid='1'") or die(mysql_error());
$row=  mysql_fetch_array($r1);
$seid1=$row['seid'];
$svalue1=$row['svalue'];
$pvalue1=$row['pvalue']; 
$cvalue1=$row['cvalue'];
$stype1=$row['stype'];
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td style="color:red;" colspan="2"><b><u>RFT:</u></b></td></tr>
<tr height="5px"></tr>
<tr><td >Random Blood Sugar (RBS)</td><td> : <?php echo $rftrbs."&nbsp;&nbsp;".$rbstype1; ?> </td><td><?php echo $rbsvalue1."&nbsp;&nbsp;".$rbstype1; ?></td></tr> 
<tr><td >Blood Urea</td><td> : <?php echo $rftbu."&nbsp;&nbsp;".$butype1; ?> </td><td><?php echo $buvalue1."&nbsp;&nbsp;".$butype1; ?></td></tr> 
<tr><td >Serum Creatinine</td><td> : <?php echo $rftscr ."&nbsp;&nbsp;".$ctype1;?> </td><td><?php echo $cvalue1."&nbsp;&nbsp;".$ctype1; ?></td></tr> 
<tr><td >Serum Uric Acid</td><td> : <?php echo $rftsua ."&nbsp;&nbsp;".$sumv1;?></td><td>Male : <?php echo $sum1."&nbsp;&nbsp;".$sumv1;?><br>Female :<?php echo $suf1."&nbsp;&nbsp;". $sufv1;?> </td></tr> 
<tr><td >Serum Calcium</td><td> : <?php echo $rftsc ."&nbsp;&nbsp;".$sctype1 ?> </td><td><?php echo $scvalue1."&nbsp;&nbsp;".$sctype1 ?></td></tr> 
<tr height="5px"></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Electrolytes:</u></b></td></tr>

<tr><td >Serum Sodium</td><td> : <?php echo $rftsodium ."&nbsp;&nbsp;".$stype1;?> </td><td><?php echo $svalue1."&nbsp;&nbsp;".$stype1; ?></td></tr> 
<tr><td >Serum Potassium</td><td> : <?php echo $rftpotash."&nbsp;&nbsp;".$stype1; ?> </td><td><?php echo $pvalue1."&nbsp;&nbsp;".$stype1; ?></td></tr> 
<tr><td >Serum Chloride</td><td> : <?php echo $rftchloride."&nbsp;&nbsp;".$stype1; ?> </td><td><?php echo $cvalue1."&nbsp;&nbsp;".$stype1; ?></td></tr> 
		
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* Reducing Substance */
                        
                        if($emp_id1 == "Reducing Substance"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from rsub where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$rsub = $row2['rsub'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td>Reducing Substance</td><td align="left"> : <?php echo $rsub ?></td></tr>
<tr><td colspan="3"></td><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /*  SERUM BILIRUBIN */
                        
                        if($emp_id1 == "SERUM BILIRUBIN"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from sbil where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$tbil = $row2['tbil'];
		$dbil = $row2['dbil'];
		$ibil = $row2['ibil'];
		}
                
                $mbs="select * from sbillnormal where sbid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$sbid=$row['sbid'];
$tbif=$row['tbif'];
$tbad=$row['tbad'];
    $dbif=$row['dbif'];
     $dbad=$row['dbad'];
     $sbtype=$row['sbtype'];
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td style="color:red;" colspan="2"><b><u>Serum Bilirubin : </u></b></td></tr>

<tr height="5px"></tr>
<tr><td>Total Bilirubin</td><td> : <?php echo $tbil."&nbsp;&nbsp;".$sbtype ?> </td><td>infants: <?php echo $tbif."&nbsp;&nbsp;".$sbtype ?><br>adults: <?php echo $tbad."&nbsp;&nbsp;".$sbtype ?></td></tr> 
<tr><td>Direct Bilirubin</td><td> : <?php echo $dbil."&nbsp;&nbsp;".$sbtype ?> </td><td>infants: <?php echo $dbif."&nbsp;&nbsp;".$sbtype ?><br>adults: <?php echo $dbad."&nbsp;&nbsp;".$sbtype ?></td></tr> 
<tr><td>Indirect Bilirubin</td><td> : <?php echo $ibil."&nbsp;&nbsp;".$sbtype ?> </td><td></td></tr> 

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* BLEEDING TIME AND CLOTTING TIME */
                        
                        if($emp_id1 == "BLEEDING TIME AND CLOTTING TIME"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from btct where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$bt = $row2['btime'];
		$ct = $row2['ctime'];
		
		}
                
                 $mbs="select * from bleedingnormal where bdlid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$bdlid=$row['bdlid'];
$btv=$row['btv'];
$ctv=$row['ctv']; 
                ?>
<tr height="5px"></tr>

<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Bleeding Time (BT)</td><td> : <?php echo $bt ?></td><td><?php echo $btv; ?></td></tr> 
<tr><td>Clotting Time (CT)</td><td> : <?php echo $ct ?></td><td><?php echo $ctv; ?></td></tr> 
	<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* BLOOD GROUP */
                        
                        if($emp_id1 == "BLOOD GROUP"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from bgroup where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$bgroup = $row2['bgrp'];
		$rht = $row2['rhtype'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>
<tr><td>Blood Group </td><td> : <b>"<?php echo $bgroup ?>"</b></td></tr> 
<tr height="5px"></tr>
<tr><td>Rh Typing</td><td> : <b><?php echo $rht ?></b></td></tr> 
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* BLOOD SUGAR(FBS,PLBS) */
                        
                        if($emp_id1 == "BLOOD SUGAR(FBS,PLBS)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from bsugar where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$fbs = $row2['fbs'];
		$fus = $row2['fus'];
		$plbs = $row2['plbs'];
		$plus = $row2['plus'];
		
		}
                
                $mbs="select * from bsugarnormals where bsid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$bsid=$row['bsid'];
$fbsvalue=$row['fbsvalue'];
$plbsvalue=$row['plbsvalue'];
$type=$row['type'];
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Fasting Blood Sugar</td><td> : <b><?php echo $fbs ."&nbsp;&nbsp;".$type;?></b> </td><td><?php echo $fbsvalue."&nbsp;&nbsp;".$type; ?></td></tr> 
<tr><td>Fasting Urine Sugar</td><td> : <b><?php echo $fus ?></b></td></tr> 
<tr><td>Post Lunch Bloob Sugar</td><td> : <b><?php echo $plbs ."&nbsp;&nbsp;".$type;?></b> </td><td><?php echo $plbsvalue."&nbsp;&nbsp;".$type; ?></td></tr> 
<tr><td>Post Lunch Urine Sugar </td><td> : <b><?php echo $plus ?></b></td></tr> 

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* HIV 1 AND 2 */
                        
                        if($emp_id1 == "HIV 1 AND 2"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from hiv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hiv = $row2['hiv'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>HIV I & II</td><td> : <?php echo $hiv ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* HCV */
                        
                        if($emp_id1 == "HCV"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from hcv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hcv = $row2['hcv'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>HCV</td><td> : <?php echo $hcv ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* VDRL */
                        
                        if($emp_id1 == "VDRL"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from vdrl where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$vdrl = $row2['vdrl'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>VDRL</td><td> : <?php echo $vdrl ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* LIPID PROFILE */
                        
                        if($emp_id1 == "LIPID PROFILE"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from lprofile where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$sch = $row2['sch'];
		$hch = $row2['hch'];
		$lch = $row2['lch'];
		$vch = $row2['vch'];
		$stri = $row2['stri'];
		$tch = $row2['tch'];
		
		}
                
                 $mbs="select * from lipidnormal where lpdid='1'";
$r=  mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$lpdid=$row['lpdid'];
$lpsn=$row['lpsn'];
$lpsb=$row['lpsb'];
$lpse=$row['lpse'];
$lpst=$row['lpst'];
$lphv=$row['lphv'];
$lpht=$row['lpht'];
$lpl1=$row['lpl1'];
$lpl2=$row['lpl2'];
$lplt=$row['lplt'];
$lpvv=$row['lpvv'];
$lpvt=$row['lpvt'];
$lpstn=$row['lpstn'];
$lpstb=$row['lpstb'];
$lpsth=$row['lpsth'];
$lpstt=$row['lpstt'];
$lplthn=$row['lplthn'];
$lplthb=$row['lplthb'];
$lpltht=$row['lpltht'];
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">NORMAL RANGE </u></td></tr>
<tr><td valign="top">Serum Cholesterol</td><td valign="top"> : <?php echo $sch ?> mg/dl</td><td ><?php echo $lpsn."&nbsp;&nbsp;".$lpst ?><br><?php echo $lpsb."&nbsp;&nbsp;".$lpst ?><br><?php echo $lpse."&nbsp;&nbsp;".$lpst ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top">HDL Cholesterol</td><td valign="top"> : <?php echo $hch ?> mg/dl</td><td><?php echo $lphv."&nbsp;&nbsp;".$lpht ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top">LDL Cholesterol</td><td valign="top"> : <?php echo $lch ?> mg/dl</td><td><?php echo $lpl1."&nbsp;&nbsp;".$lplt ?><br><?php echo $lpl2."&nbsp;&nbsp;".$lpst ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top">VLDL Cholesterol</td><td valign="top"> : <?php echo $vch ?> mg/dl</td><td><?php echo $lpvv."&nbsp;&nbsp;".$lpvt ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top">Serum Triglycerides</td><td valign="top"> : <?php echo $stri ?> mg/dl</td><td><?php echo $lpstn."&nbsp;&nbsp;".$lpstt ?><br><?php echo $lpstb."&nbsp;&nbsp;".$lpstt ?><br><?php echo $lpsth."&nbsp;&nbsp;".$lpstt ?></td></tr> 
<tr height="5px"></tr>
<tr><td valign="top">T.CHOL / HDL RATIO</td><td valign="top"> : <?php echo $tch ?></td><td><?php echo $lplthn ?></br><?php echo $lplthb ?><br> <?php echo $lpltht ?></td></tr> 
		
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* SPUTUM FOR AFB */
                        
                        if($emp_id1 == "SPUTUM FOR AFB"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from safb where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$safb = $row2['safb'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>MICROBIOLOGY REPORT</u></b></tr>
<tr><td  ><b><u>TEST</u></b></tr>
<tr><td>Sputum for AFB</td><td> : <?php echo $safb ?></td></tr> 


<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* PLATELET COUNT */
                        
                        if($emp_id1 == "PLATELET COUNT"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from pcount where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$pcount = $row2['pcount'];
		
		}
                
                $mbs="select * from plaeletnormals where plid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$plid=$row['plid'];
$plvalue=$row['plvalue'];
$pltype=$row['pltype'];
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>

<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>PLATELET COUNT</td><td> : <?php echo $pcount."&nbsp;&nbsp;".$pltype; ?> </td><td><?php echo $plvalue."&nbsp;&nbsp;".$pltype; ?></td></tr>
	<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* SERUM CHOLESTEROL */
                        
                        
                        if($emp_id1 == "SERUM CHOLESTEROL"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from schole where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$schole = $row2['schole'];
		
		}
                
                
                 $mbs="select * from schnormals where schid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$schid=$row['schid'];
$schnormal=$row['schnormal'];
$schborderline=$row['schborderline'];
    $schevelated=$row['schevelated'];
    $schtype=$row['schtype'];
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>SEROLOGY</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Serum Cholesterol</td><td> : <?php echo $schole ?> mg/dl</td><td><?php echo $schnormal."&nbsp;&nbsp;".$schtype ?><br/><?php echo $schborderline."&nbsp;&nbsp;".$schtype ?></td></tr> 
		
<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* SERUM TRYGLYCERIDES */
                        
                        
                        if($emp_id1 == "SERUM TRYGLYCERIDES"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from strig where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$strig = $row2['strig'];
		
		}
                
                $mbs="select * from strignormals where stid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$stid=$row['stid'];
$stn=$row['stn'];
$stb=$row['stb'];
    $sth=$row['sth'];
    $stt=$row['stt'];
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Serum Triglycerides</td><td> : <?php echo $strig."&nbsp;&nbsp;".$stt; ?> </td><td><?php echo $stn."&nbsp;&nbsp;".$stt; ?><br><?php echo $stb."&nbsp;&nbsp;".$stt; ?><br><?php echo $sth."&nbsp;&nbsp;".$stt; ?></td></tr> 
	<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* ALKALINE PHOSPHATE */
                        
                        if($emp_id1 == "ALKALINE PHOSPHATE"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from aphos where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aphos = $row2['aphos'];
		
		}
                 $mbs="select * from aphosnormals where apid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$apid=$row['apid'];
$apv=$row['apv'];
$apt=$row['apt'];
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>ALKALINE PHOSPHATE</td><td> : <?php echo $aphos ?> U/L</td><td><?php echo $apv."&nbsp;&nbsp;".$apt ?></td></tr> 



<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* TOTAL PROTIENS */
                        
                        
                        if($emp_id1 == "TOTAL PROTIENS"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from tprt where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$tprt = $row2['tprt'];
		
		}
                                
                 $mbs="select * from tprtnormal where tpid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$tpid=$row['tpid'];
$tpva=$row['tpva'];
$tpty=$row['tpty'];
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td>TOTAL PROTIENS </td><td> : <?php echo $tprt."&nbsp;&nbsp;".$tpty; ?> g/dl</td><td><?php echo $tpva."&nbsp;&nbsp;".$tpty; ?></td></tr> 


<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* Smear for Microfilaria */
                        
                         if($emp_id1 == "Smear for Microfilaria"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from smicro where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$smicro = $row2['smicro'];
		
		}
                
               
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr> <td colspan="2">TEST</td></tr>
<tr><td>Smear for Microfilaria</td><td colspan="2"> : <?php echo $smicro ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
			
			<?php }
                        
                        
                        /* WBC Count */
                        
                         if($emp_id1 == "WBC Count"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from wbccount where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$wbccount = $row2['wbccount'];
		
		}
                
$mbq="select * from wbccountrange where wbcid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$wbcid=$row['wbcid'];
$wbcvalue=$row['wbcvalue'];
$wbctype=$row['wbctype'];
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;" colspan="2">REFERENCE RANGE </u></td></tr>

<tr><td>WBC Count</td><td> : <?php echo $wbccount."&nbsp;&nbsp;".$wbctype ?> </td><td colspan="2"><?php echo $wbcvalue."&nbsp;&nbsp;".$wbctype ?></td></tr>  
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* Peripheral Smear */
                        
                         if($emp_id1 == "Peripheral Smear"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from peri where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$psrbc = $row2['psrbc'];
		$pswbc = $row2['pswbc'];
		$psplatelets = $row2['psplatelets'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>

<tr><td style="color:red;" colspan="2"><b><u>Peripheral Smear : </u></b></td></tr>
<tr height="5px"></tr>
<tr><td>RBC</td><td> : <?php echo $psrbc ?></td></tr>        
<tr><td>WBC</td><td> : <?php echo $pswbc ?></td></tr>        
<tr><td>Platelets</td><td> : <?php echo $psplatelets ?></td></tr>    

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* FBS */
                        
                         if($emp_id1 == "FBS"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from fbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$fbss = $row2['fbss'];
		$fuss = $row2['fuss'];
		
		}
                
                 $mbs="select * from fbsnormal where fbsid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$fbsid=$row['fbsid'];
$fbsvalue=$row['fbsvalue'];
$fbstype=$row['fbstype'];
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>HEMATOLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td>Fasting Blood Sugar</td><td> : <?php echo $fbss."&nbsp;&nbsp;".$fbstype  ?> </td><td><?php echo $fbsvalue."&nbsp;&nbsp;".$fbstype ?></td></tr> 
<tr><td>Fasting Urine Sugar</td><td> : <?php echo $fuss ?></td></tr> 
	<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* PLBS */
                        
                         if($emp_id1 == "PLBS"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from plbs where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$plbss = $row2['plbss'];
		$pluss = $row2['pluss'];
		
		}
                
                $mbq="select * from plbsnormals where plbsid='1'";
$r1=  mysql_query($mbq) or die(mysql_error());
$row=  mysql_fetch_array($r1);
$plbsid=$row['plbsid'];
$plbsvalue=$row['plbsvalue'];
$plbstype=$row['plbstype'];
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td>Post Lunch Bloob Sugar</td><td> : <?php echo $plbss."&nbsp;&nbsp;".$plbstype ?> </td><td><?php echo $plbsvalue."&nbsp;&nbsp;".$plbstype ?></td></tr> 
<tr><td>Post Lunch Urine Sugar </td><td> : <?php echo $pluss ?></td></tr> 
		<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* ASO TITRE */
                        
                         if($emp_id1 == "ASO TITRE"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from aso where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$aso = $row2['aso'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td >ASO TITRE</td><td> : <?php echo $aso ?></td></tr> 

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* RA FACTOR */
                        
                         if($emp_id1 == "RA FACTOR"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from raf where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$raf = $row2['raf'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td>RA FACTOR</td><td> : <?php echo $raf ?></td></tr> 

<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* HBA1C */
                        
                         if($emp_id1 == "HBA1C"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from hba where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$hba = $row2['hba'];
		
		}
                
                $mbs="select * from hbanormal where hbaid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$hbaid=$row['hbaid'];
$hbavalue=$row['hbavalue'];
$hbatype=$row['hbatype'];
                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td >HBA1C</td><td> : <?php echo $hba."&nbsp;&nbsp;".$hbatype; ?></td><td><?php echo $hbavalue."&nbsp;&nbsp;".$hbatype; ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* COOMBS TEST(DIRECT) */
                        
                         if($emp_id1 == "COOMBS TEST(DIRECT)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from ctd where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$ctd = $row2['ctd'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>

<tr><td>COOMBS TEST (DIRECT)</td><td> : <?php echo $ctd ?></td></tr> 
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* COOMBS TEST(INDIRECT)*/
                        
                         if($emp_id1 == "COOMBS TEST(INDIRECT)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from ctid where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$ctid = $row2['ctid'];
		
		}?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td></tr>

<tr><td>COOMBS TEST(INDIRECT)</td><td> : <?php echo $ctid ?></td></tr> 

<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			<?php }
                        
                        
                        /* PACKED CELL VOLUME(PCV) */
                        
                         if($emp_id1 == "PACKED CELL VOLUME(PCV)"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from pcv where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$pcv = $row2['pcv'];
		
		}
                
                $mbs="select * from pcvnormals where pcvid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$pcvid=$row['pcvid'];
$pcvm=$row['pcvm'];
$pcvf=$row['pcvf'];
$pcvtype=$row['pcvtype'];
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>

<tr><td >PACKED CELL VOLUME(PCV)</td><td> : <?php echo $pcv."&nbsp;&nbsp;".$pcvtype ?></td><td>Males :<?php echo $pcvm."&nbsp;&nbsp;".$pcvtype; ?><br>Females : <?php echo $pcvf."&nbsp;&nbsp;".$pcvtype; ?></td></tr> 
		<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		<?php }
                        
                        
                        /* SERUM POTASSIUM */
                        
                         if($emp_id1 == "SERUM POTASSIUM"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from spotash where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$spotash = $row2['spotash'];
		
		}
                
                
               $mbs="select * from spnormals where spid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$spid=$row['spid'];
$spvalue=$row['spvalue'];
$sptype=$row['sptype'];

                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>BIO-CHEMISTRY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td>Serum Potassium</td><td><?php echo $spotash."&nbsp;&nbsp;".$sptype; ?></td><td> <?php echo $spvalue."&nbsp;&nbsp;".$sptype; ?></td></tr> 


<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			
        
			
			
        
			
			<?php }
                        
                        
                        /* DENGUE SEROLOGY */
                        
                         if($emp_id1 == "DENGUE SEROLOGY"){	
                                    
                                    ?>
                                     <div id="dd">
                <table width="100%" height="900" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF">
  <tr>
      <td >
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
	
		
    <tr colspan="2"><td height="20">&nbsp;</td> </tr>
  <tr>
    <td colspan="2" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" valign="top" align="center">
           <table width="100%" border="0" cellspacing="0" cellpadding="0"> <!--style="border:1px #BDD9E1 solid">-->

      <tr>
	  
        <td  valign="top" >
		
		<table width="100%" border="0" align="center" style="font-size:11px;font-family:Calibri (Body);" cellpadding="2" cellspacing="0" >
          
          <tr height="100">
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
		
			<?php 
	$sql2 = mysql_query("select * from dsr where bill_no='$bno'");
		if($sql2){
		
		$row2 = mysql_fetch_array($sql2);
		$dsrigg = $row2['dsrigg'];
		$dsrigm = $row2['dsrigm'];
		
		}
                
                
                $mbs="select * from dsrnormal where dsid='1'";
$r=mysql_query($mbs) or die(mysql_error());
$row=  mysql_fetch_array($r);
$dsid=$row['dsid'];
$iggvalue=$row['iggvalue'];
$igmvalue=$row['igmvalue'];

                
                
                
                ?>
<tr height="5px"></tr>
<tr><td colspan="4" align="center" ><b><u>SEROLOGY REPORT</u></b></tr>
<tr><td align="left"><b><u style="font-size:12px;">TEST </u></b></td><td ><b><u style="font-size:12px;">RESULT </u></td><td><b><u style="font-size:12px;">REFERENCE RANGE </u></td></tr>
<tr><td >IgG</td><td><?php echo $dsrigg ?></td><td> <?php echo $iggvalue; ?></td></tr> 
<tr><td >IgM</td><td><?php echo $dsrigm ?></td><td> <?php echo $iggvalue; ?> </td></tr> 

<tr><td colspan="4"><br/><br/></td></tr>
<tr><td colspan="3"></td><td><b><?php echo $s2; ?></b></td></tr>

                        </table>
            </div>
		
        
			
			
        
			
			<?php }
                        
                        
                        
                                }
                                }
                                ?>
								<div>
								<tr><td colspan="4"><b>Kindly Correlate Clinically,if there's a need discuss.</b></td></tr>
	<tr>
          <td height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="closew();"/></td>
      </tr>
								</div>
								
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
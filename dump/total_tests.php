<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Total Tests</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.heading1 {	font-size:20px;
	text-align:center;
        font-family: "Lucida Calligraphy";
}
.heading2 {	font-size:14px;
	text-align:center;
        font-family: "Times New Roman";
}
.heading3 {	font-size:15px;
	text-align:center;
	
	text-decoration:underline;	
}
-->
</style>
<script type="text/javascript">
function prints(){
		browserVersion=parseInt(navigator.appVersion)
		if(browserVersion>=4)
			document.getElementById('prt').style.visibility='hidden';
			document.getElementById('cls').style.visibility='hidden';
         window.print();
	}
	function closs(){
	window.close();
	}
</script>

</head>
<body>


<?php
include('config.php');
$sql="select * from org";
$res=mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_array($res)){
	$orgname=$row['org'];
	$oaddr=$row['address'];
	$phone=$row['phno'];
}
?>
<div align="center" style="font-size:26px;font-weight:bold;"><?php echo $orgname ?></div>
<div align="center" style="font-size:18px;"><?php echo $oaddr ?></div>
<div align="center" style="font-size:18px;">Phone : <?php echo $phone ?></div>

<table width="80%" border="0" align="center" cellpadding="4" cellspacing="0" style="font-family: Courier New;font-size: 14px">
    <tr ><td colspan="3" style="padding-left:50px;"><div align="left"><strong><?php echo date('d-m-Y') ?></strong></div></td></tr>
  <?php
  include('config.php');
  $query1=mysql_query("select distinct Department from  testdetails");
  
  if($query1){
  while($row=mysql_fetch_array($query1)){
    $dname = $row[0];  
 
  ?>   
	<tr>
        <td colspan="3" style="padding-left:50px;"><strong>Department Name : <?php echo $dname; ?></strong></td>
    </tr>
<tr style="outline: thin solid">
  <td style="padding-left:50px;"><strong>Test Name</strong></td>
  <td><strong>Amount</strong></td>
  </tr>
 <?php
 $query2=mysql_query("select distinct TestName,Amount from  testdetails where Department = '$dname'");
  
  if($query2){
  while($row1=mysql_fetch_array($query2)){
	$tname = $row1['TestName'];
	$amt = $row1['Amount'];
  ?>   

<tr>
  <td style="padding-left:50px;"><?php echo $tname; ?></td>
  <td><?php echo $amt; ?></td>
  
  </tr>
 
<?php		

} } ?>
<tr height="15"></tr> 
<?php } } ?>

  </table>
   
    
    <div align="center"><input type="button" value="Print" id="prt" class="butt" onclick="prints()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butt" onclick="closs()"/>

</div>
</body>
</html>



	
	

	
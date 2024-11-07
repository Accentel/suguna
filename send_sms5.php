<?php
//print_r($_REQUEST);
$ch = curl_init();
$user1 = $_REQUEST['user'];
$bno = $_REQUEST['bno'];
$pname = $_REQUEST['pn'];
//$cdue = $_REQUEST['d'];
$paid = $_REQUEST['p'];
//$bdate = $_REQUEST['bd'];
$tot = $_REQUEST['t'];
$bal=$_REQUEST['bal'];
$user="SANTHIHS";
$password="ACCENTEL";
$receipientno="9502266143,9032220357,9959583024";
$senderID="SUGUNA"; 
$msgtxt="Dear Sir,\n Bill NO - $bno, $pname Total is - $tot and  paid amount Rs. $paid and Remaining balance is Rs. $bal and Bill Edited By $user1 "; 
$msg = urlencode($msgtxt);
curl_setopt($ch,CURLOPT_URL,  "http://trans.cssoftsolutions.in/reseller/sendsms.jsp");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&password=$password&senderid=$senderID&mobiles=$receipientno&sms=$msg");
$buffer = curl_exec($ch);
//header('Location:new_lab_bill.php');
	print "<script>";
	print "alert('successfullyupdated');";
	print "self.location='new_lab_bill.php'";
	print "</script>";

curl_close($ch);
?>
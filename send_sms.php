<?php
$ch = curl_init();
$user1 = $_REQUEST['user'];
$bno = $_REQUEST['bno'];
$pname = $_REQUEST['pn'];
$cdue = $_REQUEST['d'];
$rbal = $_REQUEST['rb'];
$bdate = $_REQUEST['bd'];
$tot = $_REQUEST['t'];
$bal=$_REQUEST['bal'];
$user="SANTHIHS";
$password="ACCENTEL";
$receipientno="9032220357,9502266143";
$senderID="SUGUNA"; 
$msgtxt="Dear Sir,\n Bill NO - $bno, $pname Balance is - $bal and  paid amount Rs. $cdue and Remaining balance is Rs. $rbal and payment taken by $user1 "; 
$msg = urlencode($msgtxt);
curl_setopt($ch,CURLOPT_URL,  "http://trans.cssoftsolutions.in/reseller/sendsms.jsp");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&password=$password&senderid=$senderID&mobiles=$receipientno&sms=$msg");
$buffer = curl_exec($ch);

	print "<script>";
	print "var r = confirm('want to take print?');";
	print "if(r == true){self.location='bill_pay_rec.php?bno=$bno&cdue=$cdue&rbal=$rbal&pn=$pname&bd=$bdate&t=$tot';}else{self.location='new_lab_bill.php';}";
	print "</script>";

curl_close($ch);
?>
<?php
$ch = curl_init();

$bno = $_REQUEST['bno'];
$pname = $_REQUEST['pn'];
$total = $_REQUEST['t'];
$disc = $_REQUEST['d'];
$namt = $_REQUEST['n'];
$paid = $_REQUEST['p'];
$bal = $_REQUEST['b'];

$user="SANTHIHS";
$password="ACCENTEL";
$receipientno="9959583024"; 
$senderID="SUGUNA"; 
$msgtxt="Dear Sir,\n Bill NO - $bno, $pname Lab Bill total amount is Rs. $total, Discount-Rs. $disc, Net Amount-Rs. $namt, Paid - Rs. $paid and balance is Rs. $bal"; 
$msg = urlencode($msgtxt);
curl_setopt($ch,CURLOPT_URL,  "http://trans.cssoftsolutions.in/reseller/sendsms.jsp");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&password=$password&senderid=$senderID&mobiles=$receipientno&sms=$msg");
$buffer = curl_exec($ch);

header("Location:new_lab_bill.php");	

curl_close($ch);
?>
<?php
$ch = curl_init();

$bno = $_REQUEST['bno'];
$pname = $_REQUEST['pn'];
$bdate = $_REQUEST['d'];
$test=$_REQUEST['test'];

$user="SANTHIHS";
$password="ACCENTEL";
$receipientno="9032220357"; 
$senderID="SUGUNA"; 
$msgtxt="Dear Sir,\n Bill NO - $bno, $pname Lab Result Report is generated with bill date-$bdate"; 
$msg = urlencode($msgtxt);
curl_setopt($ch,CURLOPT_URL,  "http://trans.cssoftsolutions.in/reseller/sendsms.jsp");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&password=$password&senderid=$senderID&mobiles=$receipientno&sms=$msg");
$buffer = curl_exec($ch);

header("Location:sample1.php?bno=$bno&test=$test");	

curl_close($ch);
?>
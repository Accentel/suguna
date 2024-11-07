<?php
ob_start();
$ch = curl_init();
print_r($_REQUEST);
//exit;
$bno = $_REQUEST['bno'];
$mno = $_REQUEST['mno'];
$pname = $_REQUEST['pn'];

$user="SANTHIHS";
$password="ACCENTEL";
$receipientno=$mno;
$senderID="SUGUNA"; 
$msgtxt="Dear $pname,\n Your User Name - $bno, Password - $mno, please click the below link and get the reports,\n www.soujanyadiagnostics.com/user.php "; 
$msg = urlencode($msgtxt);
curl_setopt($ch,CURLOPT_URL,  "http://trans.cssoftsolutions.in/reseller/sendsms.jsp");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&password=$password&senderid=$senderID&mobiles=$receipientno&sms=$msg");
$buffer = curl_exec($ch);
//echo "hi";
header("Location:new_lab_bill.php");	
curl_close($ch);



?>
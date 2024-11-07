<?php
include("config.php");

$emp_id = $_REQUEST['emp_id'];

$query = mysql_query("select TestName,Amount from testdetails  where TestName='$emp_id'");
if($query)
{
$row = mysql_fetch_array($query);
$tname=$row[0];
$amt=$row[1];
}

$data = ":".$tname.":".$amt;
echo $data;
?>
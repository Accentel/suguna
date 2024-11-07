<?php
ob_start();

include("config.php");

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=addslashes($_POST['name']);
$mypassword=addslashes($_POST['password']);
$sql="SELECT username,password FROM login WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
//$active=$row['active'];
$count=mysql_num_rows($result);
if($count==1)
{

$_SESSION['suguna']=$myusername;
$_SESSION['ename1']=$empname;
header("location:home.php");
}
else
{

header("location:index.php?valid=false");

}
}
?>
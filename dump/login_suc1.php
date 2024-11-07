<?php
ob_start();

include("config.php");

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

// username and password sent from Form
$myusername=addslashes($_POST['name']);
$mypassword=addslashes($_POST['password']);
 $sql="SELECT login,pass FROM org_login WHERE login='$myusername' and pass='$mypassword'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
//$active=$row['active'];
 $count=mysql_num_rows($result);

if($count==1)
{

$_SESSION['suguna1']=$myusername;
header("location:org.php");
}
else
{

header("location:orglogin1.php?valid=false");

}
}
?>
<?php
include("config.php");
if(isset($_REQUEST['submit'])){
 $ename = $_REQUEST['ename'];
$uname = $_REQUEST['user_id'];
$pwd = $_REQUEST['pwd'];

$menu=$_REQUEST['menu'];
$result = mysql_query("select * from login where username='$uname'");
$rows = mysql_num_rows($result);
if($rows <= 0){
 $query="insert into login(username,password,ename) values('$uname','$pwd','$ename')";
$query = mysql_query($query) or die(mysql_error());
if($query){
//$sql = mysql_query("update emp set user_name='$uname', password='$pwd' where id=$emp_id");

for($j = 0; $j < count($menu); $j++){
$menuname = $menu[$j];
$qry=mysql_query("insert into hr_user(ename, menus, currentdate) values('$ename','$menuname',now())");

 }
}		
if($qry){
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='userview.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to add');";
	print "self.location='user.php';";
	print "</script>";
}
}
else{
	print "<script>";
	print "alert('Username or password already exists');";
	print "self.location='user.php';";
	print "</script>";
}
}
?>
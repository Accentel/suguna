<?php
include("config.php");
if(isset($_REQUEST['submit'])){
 $ename = $_REQUEST['ename'];
$uname = $_REQUEST['user_id'];
$pwd = $_REQUEST['pwd'];

$menu=$_REQUEST['menu'];
$result = mysqli_query($link,"select * from login where username='$uname'") or die(mysqli_error($link));
$rows = mysqli_num_rows($result);
if($rows <= 0){
 $query="insert into login(username,password,ename) values('$uname','$pwd','$ename')";
$query = mysqli_query($link,$query) or die(mysqli_error($link));
if($query){
//$sql = mysql_query("update emp set user_name='$uname', password='$pwd' where id=$emp_id");

for($j = 0; $j < count($menu); $j++){
$menuname = $menu[$j];
$qry=mysqli_query($link,"insert into hr_user(ename, menus, currentdate) values('$ename','$menuname',now())") or die(mysqli_error($link));

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
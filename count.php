<?php
include('config.php');
echo $bno=$_REQUEST['bno'];
echo $test=$_REQUEST['test'];
$count="1";
echo $query="select * from click_count where  billno='$bno'";
$r=mysql_query($query)  or die(mysql_error());
$row=mysql_fetch_array($r);
echo $b1=$row['billno'];
if($b1==""){
	echo "hi";
	$res=mysql_query("insert into click_count (billno,count1) values('$bno','$count')");
	
}else{
	$query="select * from click_count where  billno='$b1'";
$res=mysql_query($query)  or die();
$row=mysql_fetch_array($res);
$c=$row['count1'];
$cc=$c+1;
$res=mysql_query("update click_count set count1='$cc' where billno='$b1'");

}

if($res){
	print "<script>";
	print "alert('successfully saved');";
	print "self.location='sample1.php?bno=$bno&test=$test';";
	print "</script>";
}
?>
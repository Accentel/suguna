<html>
<head>
<script>
function myFunction(){
	
	setTimeout(function () { win.close();}, 50000);
}
</script>
</head>
<?php
ob_start();
include('config.php');
echo $bno=$_GET['bno'];
echo $test=$_GET['test'];
$count="1";
echo $query="select * from click_count where  billno='$bno'";
$r=mysqli_query($link,$query)  or die(mysqli_error($link));
$row=mysqli_fetch_array($r);
echo $b1=$row['billno'];
if($b1==""){
	//echo "hi";
	$res=mysqli_query($link,"insert into click_count (billno,count1) values('$bno','$count')");
	//header('Location:result_entry.php');
	header("Location:result_entry.php");
}else{
	$query="select * from click_count where  billno='$b1'";
$res=mysqli_query($link,$query)  or die();
$row=mysqli_fetch_array($res);
$c=$row['count1'];
$cc=$c+1;
$res=mysqli_query($link,"update click_count set count1='$cc' where billno='$b1'");
header("Location:result_entry.php");

}

ob_flush();
?>

<body onLoad="myFunction()"></body>
</html>
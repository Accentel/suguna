<?php
include("config.php");
$sql = mysqli_query($link,"select * from org");
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$orgname = $row['org'];

}
?>
<h3><a href="home.php" style="color:#fff;"><?php echo $orgname; ?></a></h3>
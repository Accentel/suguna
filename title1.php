<?php
include("config.php");
$sql = mysqli_query($link,"select * from org") or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$orgname = $row['org'];

}
?>
<a href="#" style="color:#FFF;"><b id="logo"><?php echo $orgname; ?></b></a>
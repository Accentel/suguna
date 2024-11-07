<?php
include("config.php");
$sql = mysql_query("select * from org");
if($sql)
{
	$row = mysql_fetch_array($sql);
	$orgname = $row['org'];

}
?>
<h3><a href="home.php" style="color:#fff;"><?php echo $orgname; ?></a></h3>
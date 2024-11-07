<?php
include("config.php");
$sql = mysql_query("select * from org");
if($sql)
{
	$row = mysql_fetch_array($sql);
	$orgname = $row['org'];

}
?>
<a href="#" style="color:#FFF;"><b id="logo"><?php echo $orgname; ?></b></a>
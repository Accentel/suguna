<?php
include("config.php");

$emp_id1 = $_REQUEST['emp_id'];

$row =$_REQUEST['row'];

$query = mysql_query("select distinct TestName,Amount from testdetails  where TestName='$emp_id1' ");

while($res = mysql_fetch_array($query))
{
$row++;
$testname=$res[0];
$amt=$res[1];
}//while

?><table width="100%" border="0" id="invgtab<?php echo $row ?>">
<tr>

<td ><div align="center">
        <input  type="text" name="testname<?php echo $row ?>" id="testname<?php echo $row ?>"  class="text" value="<?php echo $testname ?>"  readonly />
</div></td>

<td ><div align="center">
  <input  type="text" name="cost<?php echo $row ?>" id="cost<?php echo $row ?>" class="text" readonly value="<?php echo $amt ?>" />
</div></td>

</tr></table>
<?php
//else
$data = "@".$row;
echo $data;

?>


<?php
include("config.php");

$cnt= $_REQUEST['empid'];

$cnt1 = explode(" * ",$cnt);
$rws = count($cnt1);
//print_r($rws);
print_r($cnt1);
$row =$_REQUEST['row'];
if($rws > 0){
?>
<table width="100%" border="0" >

<?php
$amt1=0;
for($i=0;$i<$rws;$i++){
$emp_id1 = $cnt1[$i];
$emp_id2 = mysql_real_escape_string($emp_id1);
echo $emp_id2;
$query = mysql_query("select distinct TestName,Amount from testdetails  where TestName='$emp_id2' ");
if($query){
$res = mysql_fetch_array($query);
$row++;
$testname=$res[0];
$amt=$res[1];
$amt1 =($amt1+$amt);
//while

?>
<tr>

<td ><div align="center">
        <input  type="text" name="testname<?php echo $row ?>" id="testname<?php echo $row ?>"  class="text" value="<?php echo $testname ?>"  readonly />
</div></td>

<td ><div align="center">
  <input  type="text" name="cost<?php echo $row ?>" id="cost<?php echo $row ?>" class="text" readonly value="<?php echo $amt ?>" />
</div></td>

</tr>
<?php
}
}//else
?>
</table>
<?php
}
$data = ":".$row.":".$amt1;
echo $data;

?>


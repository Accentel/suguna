<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{

 ?>

<!DOCTYPE html>

<html>

	<head>
		<?php
			include("header.php");
		?>
		<style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    
     border-top: 0px solid #ddd; 
}
		</style>
	<script>
		function fun(str){
			if(str == "Positive"){
				document.getElementById("posi").style.display="block";
				document.getElementById("oii").style.display="block";
				document.getElementById("cc").style.display="block";
				
				document.getElementById("creport").style.display="none";
			}
			if(str == "Negative"){
				document.getElementById("posi").style.display="none";
				document.getElementById("oii").style.display="none";
				document.getElementById("cc").style.display="none";
				document.getElementById("creport").style.display="block";
			}
		}
	</script>
	<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#bno").autocomplete("set6.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script>
<script>
function showHint(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	//alert(strar);
	document.getElementById("bdate").value=strar[1];
	document.getElementById("pname").value=strar[2];	
	document.getElementById("age").value=strar[3];
    document.getElementById("gender").value=strar[4];
	document.getElementById("dname").value=strar[5];
	
    }
  }
xmlhttp.open("GET","search.php?q="+str,true);
xmlhttp.send();
}
</script>	
	</head>

	<body>

  
	<?php
				include("headertop.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Culture Report</div>
		  <form name="frm" method="post" action="insert_culture.php">
			<div class="table-responsive">
			<table width="100%" border="0" cellpadding="4" cellspacing="0" class="table">
                                
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno"  class="text" onfocus="showHint(this.value)" />
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo date('d-m-Y') ?>" readonly class="tcal"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
                            <input type="text" name="pname" id="pname" class="text" readonly />
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" id="age" class="text" readonly />
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                            <input type="text" name="gender" id="gender" class="text" readonly />
								
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" name="dname" id="dname" class="text" readonly />
							
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Test Name :</td>
                        <td align="left" >
                            <select name="tname" id="tname" style="width:188px;height:24px;">
							<option value=""> -- Select -- </option>
							<?php
								include("config.php");
								$sql = mysql_query("select distinct TestName from testdetails where Department='MICRO-BIOLOGY'");
								if($sql){
								while($row = mysql_fetch_array($sql)){
							?>
							<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
							<?php } } ?>
							</select>
								
                        </td>
						 <td align="right" ></td>
                        <td align="left" >
                            <select name="status" id="status" onchange="fun(this.value);" style="width:188px;height:24px;">
							<option value="Positive">Positive</option>
							<option value="Negative">Negative</option>
							</select>
                        </td>
                    </tr>
                    
					<tr >
                        <td  align="right" style="padding-right:350px;" colspan="4">
                            <div id="oii" >Organation is Isolated :
                        
                            <input type="text" name="origin" id="origin" class="text"/></div>
								
                        </td>
					 </tr>
					 <tr >
                        <td align="right" style="padding-right:350px;" colspan="4" >
                            <div id="cc" >Colony Count : <input type="text" name="ccount" id="ccount" class="text"/></div>
								
                        </td>
					 </tr>
					 
					<tr >
                        <td colspan="4" align="center" >
							<div id="posi">
                            <table id="expense_table" width="100%">
							
							<tr><th>Sensitivity</th><th>Moderate</th><th>Resistant</th></tr>
							<tr><td ><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							<tr><td><input type="text" name="sens[]" class="text"/></td><td><input type="text" name="mode[]" class="text"/></td><td><input type="text" name="resi[]" class="text"/></td></tr>
							
							</table>
							</div>
							<textarea name="creport" id="creport" style="display:none;" cols="160" rows="10"></textarea>
								
                        </td>
					 </tr> 
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="btn btn-primary"/> <input type="button" value="Close" Class="btn btn-danger" onclick="window.location.href='home.php'"/></div>
        </div>
		 </form>
			</div>

		<?php include('footer.php'); ?>

	<?php include('footer-bottom.php'); ?>

	</body>

</html>

<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
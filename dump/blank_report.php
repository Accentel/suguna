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

  
	<?php include('headertop.php');?>
			   
		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Blank Report</div>
		  <form name="frm" method="post" action="insert_blank.php">
			<div class="table-responsible">
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
                        <td align="right" >Blank Report:</td>
                        
					 </tr>
					<tr >
                        <td colspan="4" align="right" >
                            <textarea name="breport" id="breport" cols="120" rows="40"></textarea>
								
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
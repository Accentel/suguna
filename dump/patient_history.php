<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#bno").autocomplete("set8.php", {
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
function reportxx(){
	var id=document.getElemtntByID('bno').value;
	window.open('patienthistory.php?bno='+bno,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	
}	
</script>

	</head>

	<body>

	
			  <?php
				include("headertop.php");
			  ?>
			           
                              
			<div id="centre" >
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Patient History</div>
                <form method="post" name="myform" action="patienthistory.php">
                  <table width="100%" cellpadding="4" cellspacing="0">
						
					<tr >
                        <td width="40%" align="right" > Enter Bill No. :</td>
                        <td align="left">
                            <input type="text" name="bno" id="bno" class="text" />
                        </td>
                    </tr>
					
                    <tr >
                        <td align="center" colspan="2" id="invgtable">
					</td>
                 
                    </tr> 
					
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" class="butt" value="Report" />&nbsp;&nbsp;&nbsp;&nbsp;
                        
						<input type="button" class="butt" value="Close" onclick="window.location.href='home.php'"/>
                    </td>
                </tr>
            </table>
              </form>
				</div>
		<?php include('footer.php'); ?>
	</div>
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
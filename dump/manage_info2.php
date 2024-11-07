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
<script>
function reportxx(rtype){
	
	var fdate = document.getElementById("fdate").value;
	var tdate = document.getElementById("tdate").value;
	//alert(rtype);
	if(fdate==""){
		alert("select From Date");
		document.getElementById("fdate").focus();
	}
	if(tdate==""){
		alert("select To Date");
		document.getElementById("tdate").focus();
	}
	
	
	if(rtype == "Outrer Patients List"){
		window.open('outertotal_patients.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	
	if(rtype == "Outer Amount Collection"){
		window.open('outer_amount_collection.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	
	if(rtype == "Outer Dues List"){
		window.open('outerdues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	
	
	
	
	
	if(rtype == "Outer Insurance Dues List"){
		window.open('outerinsdues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	
	
	
	
	if(rtype == "Outer Tests Report"){
		window.open('outertests.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	
	if(rtype == "Outer Amount Collection Details"){
		window.open('outeramount_collection3.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
}
</script>	
	</head>

	<body>

	
			  <?php
				include("headertop.php");
			  ?>
			           
                              
			<div id="centre" >
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">All Reports</div>
                <form method="get" name="myform" action="#" >
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                
				</tr>
                <tr>
                    <td colspan="2" align="center">
                        <table width="100%" cellpadding="4" cellspacing="0">
                            <tr>
                                <td class="tdname" align="right">From Date:</td>
                                <td align="left"><input name="fdate" type="text" class="tcal" id="fdate" value="<?php echo date('d-m-Y')?>"/>
                                </td>
                            
                                <td class="tdname" align="right">To Date:</td>
                                <td align="left"><input name="tdate" type="text" class="tcal" id="tdate" value="<?php echo date('d-m-Y')?>"/>
                                </td>
                            </tr>
							<tr>
							<td></td>
							<td>
							
							</td>
							<td>
							
							</td>
							</tr>
                        </table>
                    </td>
                </tr>
               
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td align="center">
                        
						
						
						
						
						
						
						<input type="button" id="submit" class="butt" value="Outrer Patients List" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" id="submit" class="butt" value="Outer Amount Collection" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" id="submit" class="butt" value="Outer Dues List" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" id="submit" class="butt" value="Outer Insurance Dues List" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" id="submit7" class="butt" value="Outer Tests Report" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/>
						<input type="button" id="submit" class="butt" value="Outer Amount Collection Details" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/>
						
						
						
                        
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

header('Location:login.php?authentication failed');

}

?>
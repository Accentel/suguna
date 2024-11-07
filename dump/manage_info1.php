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
	if(rtype == "Patients List"){
		window.open('total_patients.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	if(rtype == "Outrer Patients List"){
		window.open('outertotal_patients.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	if(rtype == "Amount Collection"){
		window.open('amount_collection.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	if(rtype == "Outer Amount Collection"){
		window.open('outer_amount_collection.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	if(rtype == "Dues List"){
		window.open('dues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	if(rtype == "Outer Dues List"){
		window.open('outerdues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	
	
	
	if(rtype == "Insurance Dues List"){
		window.open('insdues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	if(rtype == "Outer Insurance Dues List"){
		window.open('outerinsdues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	if(rtype == "Doctors Referal Amount"){
		document.getElementById('dname').style.display='block';
		var dname=document.getElementById('dname').value;
		if(dname==""){
			alert("select Doctor Name");
			document.getElementById('dname').focus();
		}else{
			window.open('doctor_comm.php?sdate='+fdate+'&edate='+tdate+'&dname='+dname,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
		}
	}
	if(rtype == "View Expenses"){
		window.open('expenses_report.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	if(rtype == "Profits Report"){
		window.open('profits.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	if(rtype == "Tests Report"){
		window.open('tests.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	if(rtype == "Outer Tests Report"){
		window.open('outertests.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	if(rtype == "Amount Collection Details"){
		window.open('amount_collection3.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	if(rtype == "Outer Amount Collection Details"){
		window.open('outeramount_collection3.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	
	if(rtype == "X-ray Doctors Referal Amount"){
		document.getElementById('dname1').style.display='block';
		var dname1=document.getElementById('dname1').value;
		if(dname1==""){
			alert("select Doctor Name");
			document.getElementById('dname1').focus();
		}else{
			window.open('doctor_comm1.php?sdate='+fdate+'&edate='+tdate+'&dname='+dname1,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
		}
	}
}
</script>	
	</head>

	<body>

	
			  <?php
				include("headertop.php");
			  ?>
			           
                              
			<div id="centre" style="height:auto;">
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
							<select name="dname" id="dname" style="width:188px;height:24px;margin-top:20px;display:none;">
								<option value=""> -- Select Doctor-- </option>
								<?php
									$sql2 = mysql_query("select DoctorName from ddetails");
									if($sql2){
									while($row2 = mysql_fetch_array($sql2)){
								?>
								<option value="<?php echo $row2[0] ?>"><?php echo $row2[0] ?></option>
								<?php } } ?>
							</select>
							</td>
							<td>
							<select name="dname1" id="dname1" style="width:188px;height:24px;margin-top:20px;display:none;">
								<option value=""> -- Select Doctor-- </option>
								<?php
									$sql2 = mysql_query("select DoctorName from ddetails");
									if($sql2){
									while($row2 = mysql_fetch_array($sql2)){
								?>
								<option value="<?php echo $row2[0] ?>"><?php echo $row2[0] ?></option>
								<?php } } ?>
							</select>
							</td>
							</tr>
                        </table>
                    </td>
                </tr>
               
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td align="center">
                        <input type="button" id="submit" class="butt" value="Patients List" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						
                        <input type="button" id="submit" class="butt" value="Amount Collection" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						 
                        <input type="button" id="submit" class="butt" value="Dues List" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						
                        <input type="button" id="submit" class="butt" value="Insurance Dues List" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" id="submit" class="butt" value="Doctors Referal Amount" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                        
						
						
						<input type="button" id="submit" class="butt" value="View Expenses" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" id="submit" class="butt" value="Profits Report" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" id="submit7" class="butt" value="Tests Report" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						
                        <input type="button" id="submit" class="butt" value="Amount Collection Details" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;
						
						<input type="button" id="submit" class="butt" value="X-ray Doctors Referal Amount" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
						
						
						
						
						
						
						
						
						
						
						
                        
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
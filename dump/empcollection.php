<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{
$name=$_SESSION['suguna'];

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
function reportxx(rtype){
	
	var fdate = document.getElementById("fdate").value;
	var tdate = document.getElementById("tdate").value;
	var name = document.getElementById("ename").value;
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
	if(rtype == "Amount Collection"){
		window.open('amount_collection2.php?sdate='+fdate+'&edate='+tdate+'&ename='+name,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	if(rtype == "Dues List"){
		window.open('dues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	if(rtype == "Insurance Dues List"){
		window.open('insdues_list.php?sdate='+fdate+'&edate='+tdate,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
	}
	
	if(rtype == "Doctors Commission"){
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
}
</script>	
	</head>

	<body>

	<?php include('headertop.php'); ?>
                              
			<div id="centre"  >
					<div align="center"  style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">All Reports</div>
                <div style="overflow-x:auto;">
				<form method="get" name="myform" action="#" >
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
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
                                <td align="left"><input name="tdate" type="text" class="tcal" id="tdate" value="<?php echo date('d-m-Y')?>"/><input type="hidden" name="ename" id="ename" value="<?php echo $name; ?>"
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
							</tr>
                        </table>
                    </td>
                </tr>
               
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td align="center">
                        <!--<input type="button" id="submit" class="butt" value="Patients List" onclick="javascript:reportxx(this.value)"/>-->&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" id="submit" Class="btn btn-primary" value="Amount Collection" onclick="javascript:reportxx(this.value)"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" Class="btn btn-danger" value="Close" onclick="window.location.href='home.php'"/>
                        <!--<input type="button" id="submit" class="butt" value="Dues List" onclick="javascript:reportxx(this.value)"/>-->&nbsp;&nbsp;&nbsp;&nbsp;
                       <!-- <input type="button" id="submit" class="butt" value="Insurance Dues List" onclick="javascript:reportxx(this.value)"/>-->&nbsp;&nbsp;&nbsp;&nbsp;
                        
						<!--<input type="button" id="submit" class="butt" value="Doctors Commission" onclick="javascript:reportxx(this.value)"/>-->&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                      <!--  <input type="button" id="submit" class="butt" value="View Expenses" onclick="javascript:reportxx(this.value)"/>-->&nbsp;&nbsp;&nbsp;&nbsp;
                      <!--  <input type="button" id="submit" class="butt" value="Profits Report" onclick="javascript:reportxx(this.value)"/>-->&nbsp;&nbsp;&nbsp;&nbsp;
                        <!--<input type="button" id="submit7" class="butt" value="Tests Report" onclick="javascript:reportxx(this.value)"/>-->&nbsp;&nbsp;&nbsp;&nbsp;
                        
						
                    </td>
                </tr>
            </table>
              </form>
			  </div>
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
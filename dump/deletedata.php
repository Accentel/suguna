<?php //include('config.php');

session_start();
include('config.php');
if($_SESSION['suguna'])
{
$name=$_SESSION['suguna'];

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<link rel="stylesheet" type="text/css" href="pagination.css" />
	<head>
		<?php
			include("header.php");
		?>
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

	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['suguna']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
			
			  <?php
				include("main_menu.php");
			  ?>
			           
                              
			<div id="centre" >
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Delete Reports</div>
                <form method="post" name="myform" action="deletedata1.php" >
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
                                <td align="left"><input name="tdate" type="text" class="tcal" id="tdate" value="<?php echo date('d-m-Y')?>"/><input type="hidden" name="ename" id="ename" value="<?php echo $name; ?>"
                                </td>
                            </tr>
							<tr>
							<td></td>
							<td>
						
							</td>
							</tr>
                        </table>
                    </td>
                </tr>
               
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td align="center">
                       <input type="submit" class="butt" name="submit" value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;
                       				
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
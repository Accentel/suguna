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
                <a href="manage_info1.php"><h1>Hospital Reports</h1></a>
				<a href="manage_info2.php"><h1>Outer Reports</h1></a>
				</tr>
                
               
                <tr><td height="20px;"></td></tr>
                
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
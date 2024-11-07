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
<script type="text/javascript">
function reportxx()
{
//alert("hai");
if (document.myform.fdate.value=="") {
        alert("Please enter From Date.");
        document.fdate.focus();
        return (false);
    }
    if (document.myform.tdate.value=="") {
        alert("Please enter To Date.");
        document.tdate.focus();
        return (false);
    }
    var s_date=document.myform.fdate.value;
    var e_date=document.myform.tdate.value;
	
	window.open('outercasesheet_report.php?s_date='+s_date+'&e_date='+e_date,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
}
</script>
	</head>

	<body>

	<?php
				include("headertop.php");
			  ?>    
			           
                              
			<div id="centre" >
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Outer Daily Case Sheet</div>
                <form method="get" name="myform" action="tot_students_report.php" target="new">
                   <div class="table-responsive">
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
                                <td align="left"><input name="tdate" type="text" class="tcal" id="tdate" value="<?php echo date('d-m-Y')?>"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
               
                <tr><td height="20px;"></td></tr>
                <tr>
                    <td align="center">
                        <input type="button" name="submit" class="btn btn-primary" value="Report" onclick="javascript:reportxx()"/>&nbsp;&nbsp;&nbsp;&nbsp;
                       
						<input type="button" class="btn btn-danger" value="Close" onclick="window.location.href='home.php'"/>
                    </td>
                </tr>
            </table>
			</div>
              </form>
				</div>

		<?php include('footer.php'); ?>

	<?php
				include("footer-bottom.php");
			  ?>    

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
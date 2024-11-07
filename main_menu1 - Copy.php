<?php
include("config.php");
if($_SESSION['suguna'] != "admin"){
$emp_id = $_SESSION['suguna'];
$r=mysql_query("select ename from login where username='$emp_id'");
$row=mysql_fetch_array($r);
$empname=$row['ename'];
 $p="SELECT D.menus FROM hr_user as D,login as M  WHERE D.ename=M.ename and D.ename='$empname' ";
$sql = mysql_query($p);
if($sql){
$i=0;
while($row = mysql_fetch_array($sql)){
$menu= $row[0];
	if($menu == "2"){$menu2="2";}
	if($menu == "21"){$menu21="21";}
	if($menu == "22"){$menu22="22";}
	if($menu == "23"){$menu23="23";}
	if($menu == "24"){$menu24="24";}
	if($menu == "3"){$menu3="3";}
	if($menu == "31"){$menu31="31";}
	if($menu == "32"){$menu32="32";}
	if($menu == "36"){$menu36="36";}
	if($menu == "37"){$menu37="37";}
	if($menu == "33"){$menu33="33";}
	if($menu == "34"){$menu34="34";}
	if($menu == "35"){$menu35="35";}
	if($menu == "4"){$menu4="4";}
	if($menu == "41"){$menu41="41";}
	if($menu == "42"){$menu42="42";}
	if($menu == "43"){$menu43="43";}
	if($menu == "44"){$menu44="44";}
	if($menu == "45"){$menu45="45";}
	if($menu == "46"){$menu46="46";}
	if($menu == "47"){$menu47="47";}
	if($menu == "48"){$menu48="48";}
	if($menu == "49"){$menu49="49";}
	if($menu == "5"){$menu5="5";}
	if($menu == "51"){$menu51="51";}
	if($menu == "52"){$menu52="52";}
	if($menu == "6"){$menu6="6";}
	if($menu == "61"){$menu61="61";}
	if($menu == "62"){$menu62="62";}
	
	if($menu == "7"){$menu7="7";}
	
}
}
?>

<ul id="menu2">
    <li><a href="index1.php">Home</a>
	<!--<div class="dropdown_1column align_right">
        <div class="col_1" >
		  <ul class="simple">
			<li><a href="#">Mail Box</a></li>
			<li><a href="#">ToDos</a></li>
			<li><a href="#">Chats</a></li>
			<li><a href="#">Notifications</a></li>
		  </ul>
		</div>
	</div>-->
    </li>
	<?php if($menu2 == "2"){ ?> <li><a href="#" class="drop"><img src="images/aa.png"/>&nbsp;Settings</a>
      <div class="dropdown_1column align_right">
        <div class="col_1">
		  <ul class="simple">
		  <?php if($menu21 == "21"){ ?><li><a href="new_dept.php">Add Department</a></li><?php } ?>
		  <?php if($menu22 == "22"){ ?><li><a href="new_test.php">Add Tests</a></li><?php } ?>
		  <?php if($menu23 == "23"){ ?><li><a href="new_doctor.php">Add Doctor</a></li><?php } ?>
		  <?php if($menu24 == "24"){ ?><a href="new_package.php">Create Package</a></li><?php } ?>
		 </ul>
		</div>
	</div>	  
    </li><?php } ?>
	
	<!--<li><a href="#" class="drop">Customer</a>
	<div class="dropdown_1column align_right">
        <div class="col_1">
		  <ul class="simple">
		  
			<li><a href="PlusCustomer.php">Add New Customer</a></li>
			<li><a href="CustomerList.php">List of Customers</a></li>
			<li><a href="PaidCustomer.php">Paid Customer</a></li>
			<li><a href="UnPaidCustomer.php">Unpaid Customer</a></li>
			<li><a href="#">Block Listed Customer</a></li>
		  </ul>
		</div>
      </div>  
    </li>-->
	
	<?php if($menu3 == "3"){ ?><li><a href="#" class="drop"><img src="images/fees.png"/>&nbsp;Billing</a>
      <div class="dropdown_1column align_right">
        <div class="col_1">
          <ul class="simple">
            <?php if($menu31 == "31"){ ?><li><a href="pay_bill.php">Lab Bill</a></li><?php } ?>
            
            <?php if($menu33 == "33"){ ?><li><a href="new_lab_bill.php">View Bill/Pay Balance</a></li><?php } ?>
			
			 <?php if($menu36 == "36"){ ?><li><a href="outerpay_bill.php">Outers Lab Bill</a></li><?php } ?>
            
            <?php if($menu37 == "37"){ ?><li><a href="new_lab_outerbill.php">View Outers Bill/Pay Balance</a></li><?php } ?>
			
			
			
			 <?php if($menu34 == "34"){ ?><li><a href="result_entry.php">Result Entry List</a></li><?php } ?>
            <?php if($menu35 == "35"){ ?><li><a href="report_result.php">Select Report Test-wise</a></li><?php } ?>
			<?php  if($menu32 == "32"){ ?><li><a href="patient_history.php">Patient History</a></li><?php } ?>
          </ul>
        </div>
      </div>
    </li><?php } ?>
	
	
	<?php if($menu4 == "4"){ ?><li><a href="#" class="drop"><img src="images/report.gif"/>&nbsp;Reports</a>
	<div class="dropdown_1column align_right">
        <div class="col_1">
		  <ul class="simple">
			<?php if($menu41 == "41"){ ?><li><a href="manage_info.php">Management Info</a></li><?php } ?>
			<?php if($menu42 == "42"){ ?><li><a href="duplicate_bills.php">Duplicate Reports</a></li><?php } ?>
			
			<?php if($menu43 == "43"){ ?><li><a href="biopsy.php">Biopsy Report</a></li><?php } ?>
			<?php if($menu44 == "44"){ ?><li><a href="cytology.php">Cytology / Fnac Report</a></li><?php } ?>
			
			<?php if($menu45 == "45"){ ?><li><a href="blank_report.php">Blank Report</a></li><?php } ?>
			<?php if($menu46 == "46"){ ?><li><a href="culture_report.php">Culture Report</a></li><?php } ?>
			
			<?php if($menu47 == "47"){ ?><li><a href="total_tests.php" target="_blank">Tests Cost</a></li><?php } ?>
			<?php if($menu48 == "48"){ ?><li><a href="new_expenses.php">Expenses</a></li><?php } ?>
			<?php if($menu49 == "49"){ ?><li><a href="empcollection.php">Emp Day Collection</a></li><?php } ?>
		  </ul>
		</div>
    </div>
    </li><?php } ?>
	
	
	<?php if($menu5 == "5"){ ?><li><a href="#" class="drop"><img src="images/aa.png"/>&nbsp;Registration</a>
	<div class="dropdown_1column align_right">
        <div class="col_1">
		  <ul class="simple">
			<?php if($menu51 == "51"){ ?><li><a href="orglogin1.php">Organization Details</a></li><?php } ?>
			<?php if($menu52 == "52"){ ?><li><a href="userview.php">User Management</a></li><?php } ?>
		  </ul>
		</div>
    </div>
    </li><?php } ?>
	
	<?php if($menu6 == "6"){ ?><li><a href="#" class="drop"><img src="images/student.png"/>&nbsp;Daily Casesheet</a>
	<div class="dropdown_1column align_right">
        <div class="col_1">
		  <ul class="simple">
			<?php if($menu61 == "61"){ ?><li><a href="case_sheet.php">Daily Casesheet</a></li><?php } ?>
			<?php if($menu62 == "62"){ ?><li><a href="outercase_sheet.php">Outer Daily Casesheet</a></li><?php } ?>
			
			
		  </ul>
		</div>
    </div>
    </li><?php } ?>
	
	<?php if($menu7 == "7"){ ?><li><a href="changepassword.php" class="drop"><img src="images/student.png"/>&nbsp;Change Password</a>
	
    </li><?php } ?>
	
	
</ul>
<?php } ?>
<?php
$myusername=$_SESSION['suguna'];
	if($myusername == "admin")
	{
	//echo "hi";
?>
<nav class="navbar navbar-inverse navbar-custom1">
  <div class="container">
    <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          </div>
		  <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       <li><a href="home.php"><b>HOME</b></a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>SETTINGS</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="new_dept.php">Add Department</a></li>
            <li><a href="new_test.php">Add Tests</a></li>
            <li><a href="new_doctor.php">Add Doctor</a></li>            
          </ul>
        </li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>BILLING</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="pay_bill.php">Lab Bill</a></li>
            <li><a href="new_lab_bill.php">View Bill/Pay Balance</a></li>
            <li><a href="outerpay_bill.php">Outers Lab Bill</a></li>
			<li><a href="new_lab_outerbill.php">View Outers Bill/Pay Balance</a></li>
			<li><a href="result_entry.php">Result Entry List</a></li>
			<li><a href="report_result.php">Select Report Test-wise</a></li>
			<li><a href="patient_history.php">Patient History</a></li>	
					
          </ul>
        </li>
		
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>REPORTS</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
              
            <li><a href="manage_info.php">Management Info</a></li>
            <li><a href="duplicate_bills.php">Duplicate Reports</a></li>
            <li><a href="biopsy.php">Biopsy Report</a></li>
			<li><a href="cytology.php">Cytology / Fnac Report</a></li>
			<li><a href="blank_report.php">Blank Report</a></li>
			<li><a href="culture_report.php">Culture Report</a></li>
			<li><a href="total_tests.php" target="_blank">Tests Cost</a></li>
			<li><a href="new_expenses.php">Expenses</a></li>
			<li><a href="empcollection.php">Emp Day Collection</a></li>	
					
          </ul>
        </li>
        <!--Super Admin Reports-->
        	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>REVIEW</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
              
            <li><a href="management_info.php">Reports</a></li>
            
					
          </ul>
        </li>
        
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>REGISTRATION</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="orglogin1.php">Organization Details</a></li>
            <li><a href="userview.php">User Management</a></li>
          </ul>
        </li>
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>DAILY CASESHEET</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="case_sheet.php">Daily Casesheet</a></li>
            <li><a href="outercase_sheet.php">Outer Daily Casesheet</a></li>
          </ul>
        </li>
		<li><a href="changepassword.php"><b>CHANGE PASSWORD</b></a></li>
		
      </ul>
	  </div>
    </div>
  
</nav>
<?php
	}
	else
	{
	//echo "welcome";
		include("main_menu1.php");
	}	
	?>
 
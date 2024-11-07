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
			           
                              
			<div id="centre" style="height:auto;">
					<div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">All Reports</div>

			  <div>
			  <script language='JavaScript'>

     checked = false;
      function checkedAll () {
						if (checked == false){checked = true}else{checked = false}
							for (var i = 0; i < document.getElementById('form_id').elements.length; i++) {
									document.getElementById('form_id').elements[i].checked = checked;
							}
							}


</script>
			  <?php
			  include('config.php');
			  if(isset($_POST['submit'])){
			  $fdate=$_POST['fdate'];
			  $tdate=$_POST['tdate'];
			 	$sdate1=date('Y-m-d',strtotime($fdate));
 				$edate1=date('Y-m-d',strtotime($tdate));
			  
			?>
			 <form method="post" action="delete.php" id="form_id" name="form_name">
  <table border='1' width="100%">
   
	<tr><th><input type="submit" class="btn btn-danger" value="Delete" name="delete"></th></tr>
	<tr><th>From Date</th><th><?php echo $sdate1 ?></th><th></th><th>To Date</th><th><?php echo $edate1 ?></th></tr>
      <tr>
	  <th><input type='checkbox' name='checkall' onclick='checkedAll();' />Check All </th>
        <th>S No</th>
        <th>BILLNO</th>
        <th>PATIENT NAME</th>
		<th>BILL DATE</th>
		
		
		
      </tr>
   	<?php

	/*

		Place code to connect to your DB here.

	*/

	include('config.php');	// include your code to connect to DB.



	$tbl_name="bill1";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 3;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	 $query = "SELECT COUNT(*) as num FROM $tbl_name Where BillDate between '$sdate1' and '$edate1' ";

//$p=mysql_query($query);
//echo $c=mysql_num_rows($p);
	 $total_pages = mysql_fetch_array(mysql_query($query));

	 $total_pages = $total_pages['num'];

	

	/* Setup vars for query. */

	$targetpage = "deletedata1.php"; 	//your file name  (the name of this file)

	$limit = 50; 								//how many items to show per page

	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0

	

	/* Get data. */

	$sql = "SELECT * FROM $tbl_name where BillDate between '$sdate1' and '$edate1'  order by bid  LIMIT $start, $limit";

	$result = mysql_query($sql);

	

	/* Setup page vars for display. */

	if ($page == 0) $page = 1;					//if no page var is given, default to 1.

	$prev = $page - 1;							//previous page is page - 1

	$next = $page + 1;							//next page is page + 1

	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.

	$lpm1 = $lastpage - 1;						//last page minus 1

	

	/* 

		Now we apply our rules and draw the pagination object. 

		We're actually saving the code to a variable in case we want to draw it more than once.

	*/

	$pagination = "";

	if($lastpage > 1)

	{	

		$pagination .= "<div class=\"pagination\">";

		//previous button

		if ($page > 1) 

			$pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";

		else

			$pagination.= "<span class=\"disabled\"><< previous</span>";	

		

		//pages	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up

		{	

			for ($counter = 1; $counter <= $lastpage; $counter++)

			{

				if ($counter == $page)

					$pagination.= "<span class=\"current\">$counter</span>";

				else

					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

			}

		}

		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some

		{

			//close to beginning; only hide later pages

			if($page < 1 + ($adjacents * 2))		

			{

				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		

			}

			//in middle; hide some front and some back

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

			{

				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";

				$pagination.= "...";

				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					

				}

			}

		}

		

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";

		else

			$pagination.= "<span class=\"disabled\">next >></span>";

		$pagination.= "</div>\n";		

	}

?>    
<?php
//include("config.php");
//$sq=mysql_query("select * from azure");
$row=mysql_num_rows($result);
////while($res=mysql_fetch_array($result)){
	//$a=$res['checkout'];
	//$b=$res['cid'];
	//$c=$res['cname'];
	//$d=$res['roomno'];
	//$e=$res['sno'];
	$i=1;
	while($rs1=mysql_fetch_array($result)){
						$BillNO=$rs1['BillNO'];
						$PatientName=$rs1['PatientName'];
						$BillDate=$rs1['BillDate'];
						
						
	?>   
                <tr>
				<td><input name="selector[]" type="checkbox" value="<?php  echo $BillNO;?>"/></td>
        <td><?php echo $i; ?></td>
        <td><?php echo $BillNO; ?></td>
        <td><?php echo $PatientName; ?></td>
		<td><?php echo $BillDate; ?></td>
		
      </tr>
	<?php
$i++;
	}
				?>
      
      <tr><td colspan="10"><?php echo $pagination; ?></td></tr>
   
	
  </table>
 </form>
	 <?php  }
			   ?>
			  
			  
			  
			  
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
<?php //include('config.php');

session_start();

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
	$("#name").autocomplete("set4.php", {
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
	</head>
<script type="text/javascript">

  function showDoc(){
 
	var row=document.frm.row.value;
	 var emp = [];
	var emp_id = frm.empid;
	alert(emp_id);
	for (var i=0, iLen=emp_id.length; i<iLen; i++) {
    if (emp_id[i].checked) {
      emp.push(emp_id[i].value);
    }
  }
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="lab_test_popup1.php"
			  url=url+"?empid="+emp+"&row="+row;
              url= encodeURI(url);
			  alert(url);
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("POST",url,true)
				  xmlHttp.send(null)
	 }
		
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
alert(showdata)
		  var strar = showdata.split(":");



		  if(strar.length>0){
			
			//  alert(opener.document.getElementById("t1").innerHTML);
                        opener.document.getElementById("invgtable").innerHTML+=strar[0];
						  opener.document.getElementById("rows").value=strar[1];
						opener.document.getElementById("tot").value=strar[2];
                        opener.document.getElementById("price").value=strar[2];
                          	
						  //alert(strar[1]);
						

   			   window.close();
		  }
	  }
  }
  


function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
  </script>
	<body>

	
          
          
<form name="docpat" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Test Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="Go" class="butt" /></td>
</tr>
</table>
</form>
<form name="frm" method="post" >
<table width="400px" class="sortable"  id="TABLE1" align="center">
  <thead>
  <tr>
	<td align="left"><input type="submit" value="Add" class="butt" onclick="showDoc();"/></td>
</tr>
    <tr>
      <th width="119" class="TH1"><div align="center">Test Name</div></th>
     
           
     
    </tr>
  </thead>
<?php 
			  include("config.php");
			 
			  $row = $_REQUEST['row'];
			   if(isset($_REQUEST['submit'])){
			   $row = $_REQUEST['row'];
			  $n=$_REQUEST['name'];
			 
			  if($n != ""){
			  $sq = mysql_query("SELECT distinct TestName FROM testdetails WHERE Upper(TestName) like Upper('%$n%') ");

			  }
			   }else{
			 
				 $sq = mysql_query("SELECT distinct TestName FROM testdetails ");
				}
			  
			  $records=mysql_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysql_fetch_array($sq)){
			 
			 ?>
             <tr height="25px"><td ><input type="checkbox" name="empid" value="<?php echo $res[0] ?>" /><?php echo $res[0] ?></td></tr>
             <?php $i++;}
			 }
			
			 ?></table>
			 <input type="hidden" name="c" value="<?php echo $records ?>">
              <?php if($records==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
    <input type="hidden" name="row" value="<?php echo $row ?>">

 </form>
</body>			

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>
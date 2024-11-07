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

  function showDoc(cc){
 
	var row=document.docpat.row.value;
	
	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="lab_invgitem_popup1.php"
			  url=url+"?emp_id="+cc+"&row="+row;
               //alert(url)
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("POST",url,true)
				  xmlHttp.send(null)
	 }
		
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
//alert(showdata)
		  var strar = showdata.split("@");



		  if(strar.length>0){
			
			//  alert(opener.document.getElementById("t1").innerHTML);
                        opener.document.getElementById("invgtable").innerHTML+=strar[0].trim();
						  opener.document.getElementById("rows").value=strar[1];
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
</table>


<table width="400px" class="sortable"  id="TABLE1" align="center">
  <thead>
    <tr>
      <th width="119" class="TH1"><div align="center">Test Name</div></th>
     
           
     
    </tr>
  </thead>
<?php 
			  include("config.php");
			 
			  $row = $_REQUEST['row'];
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			 
			  if($n != ""){
			  $sq = mysql_query("SELECT distinct TestName FROM testdetails WHERE Upper(TestName) like Upper('%$n%') ");

			  }
			  $records=mysql_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysql_fetch_array($sq)){
			 
			 ?>
             <tr height="25px"><td ><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc(this.value);"/><?php echo $res[0] ?></td></tr>
             <?php $i++;}
			 }
			 }else{ ?>
			 <?php
			 
			 $sq = mysql_query("SELECT distinct TestName FROM testdetails ");

			  
			  $i = 1;
			  if($sq){
			  $records=mysql_num_rows($sq);
			  while($res=mysql_fetch_array($sq)){
				
			 ?>
             <tr height="25px"><td ><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc(this.value);"/><?php echo $res[0] ?></td></tr>
             <?php $i++;}
			 }
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
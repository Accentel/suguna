<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	</head>
<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

  function showDoc(cc){
	 
		
		  xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="patient_oper_popup1.php"
			  url=url+"?emp_id="+cc;
     			//alert(url);
			  xmlHttp.onreadystatechange=stateChanged 

				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	  }
 
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
alert(showdata)
		  var strar = showdata.split(":");

		  if(strar.length>0){
			 // window.opener.location.reload();
			 //window.location.reload(); 
		//alert(strar[1]+"---"+strar[2]);
			  opener.document.getElementById("tname").value=strar[1];
			  opener.document.getElementById("amount").value=strar[2];
			  

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
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>


<table width="400px" class="sortable"  id="expense_table" align="center">
  <thead>
    <tr>
      <th class="TH1"><div align="center">Test Name</div></th>
      
<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  
			  $sq = mysql_query("select distinct TestName from testdetails WHERE TestName = '$n'");
				$records=mysql_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysql_fetch_array($sq)){
			 
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc();"/><?php echo $res[0] ;?></td></tr>
             <?php $i++;}
			 }
			 }else{ ?>
			 <?php
			 
			 $sq = mysql_query("select distinct TestName from testdetails ");
	
			  $records=mysql_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysql_fetch_array($sq)){

			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $res[0] ?>" onclick="javascript:showDoc(this.value);"/><?php echo $res[0] ;?></td></tr>
             <?php $i++;}
			 }
			 }
			 ?></table>
			 <input type="hidden" name="c" value="<?php echo $records ?>">
              <?php if($records==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>


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
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
function amt()
{
var cnt=document.myform.rows.value;
//alert(cnt);

var sum=0;
for( c=cnt; c!=0;c-- )
	{
	var rate1;
var rate='document.myform.'+'cost'+c+'.value';
//alert(eval(rate))
if(eval(rate) == 0 || eval(rate)=="" ||eval(rate)==null ){ rate1=0;}
else
 {
rate1=parseInt(eval(rate));
}//else
	 sum=eval(rate1)+eval(sum);
	}
var conamt=document.myform.conamt.value;
		document.myform.tot.value=eval(sum).toFixed(2);
		if(conamt>eval(sum)){
		alert("Please Enter Discount less than Total Amount");
		document.myform.conamt.value="";
		document.myform.conamt.focus();
		return false;
		}
var price=eval(sum)-eval(conamt);
document.myform.price.value=eval(price).toFixed(2)
}//amt()

function Addrow()
{
  
   if(document.getElementById("pakname").value==""){alert("Please Enter Package Name");
	document.getElementById("pakname").focus();return false;}
  
   var count=document.getElementById("rows").value
   
window.open('lab_test_popup.php?row='+count,'mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')
			
   }//add
function sameinvcode()
{

var rowcount=document.getElementById("rows").value;

    for(i=1;i<=rowcount;i++){//alert("in i for"+i);
	var invgcodei='document.myform.'+'tname'+i+'.value.toUpperCase()';
   for(j=rowcount;j!=i;j--)
  {//alert("in j for"+j);
var invgcodej='document.myform.'+'tname'+j+'.value';

if(eval(invgcodei)==eval(invgcodej)){	
			
alert("This Inestigation Name Already  Exist in Row " +i );
var rowss=document.getElementById("rows").value;
 //document.getElementById("invgtab"+rowss).removeNode(true);
 document.getElementById("invgtable").removeChild(document.getElementById("invgtab"+rowss));
document.getElementById("rows").value=eval(rowss)-1;
amt();
return false;
}
}//for1
}//for2
amt();
//action="Package Creation_Insert.jsp"
}//sameinvcode()
</script>   
	</head>

	<body>

  
	<div id="conteneur">

		  <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['suguna']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
			
			  <?php
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Create A Package</div>
		  <form name="myform" method="post" action="insert_package.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                            <tr >
                        <td width="40%" align="right" >Package Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="pakname" id="pakname" class="text"/> <input type="button" class="butt" onclick="Addrow()" value="Add Tests"/>
                        </td>
                    </tr>
                     <tr >
						<td colspan="2"><div id="invgtable" valign="top">
                       <table width="70%" align="center" id="expense_table">
                    <tr>
					  	
					  <th>Test Name</th>
					  <th>Amount</th>
					 
					 </tr> 
					 
					 </table>
					 <div>
					 </td>
                    </tr>
					<tr>
					 <td colspan="2" align="right">Number of Tests : <input type="text" name="rows" id="rows" value="0"  size="8" class="text" readonly="readonly"/></td>
				   </tr>
					 <tr >
                        <td colspan="2" align="right" >Total Amount :
                            <input type="text" name="tot" id="tot" readonly="readonly" value="0" onclick="amt()" class="text"/> 
                        </td>
                    </tr>
					<tr >
                        <td colspan="2" align="right" >Discount :
                            <input type="text" name="conamt" id="conamt" value="0" onkeyup="amt()" class="text"/> 
                        </td>
                    </tr>
					<tr >
                        <td colspan="2" align="right" >Net Amount :
                            <input type="text" name="price" id="price" value="0" class="text"/> 
                        </td>
                    </tr>
 
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_package.php'"/></div>
        
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

header('Location:index.php?authentication failed');

}

?>
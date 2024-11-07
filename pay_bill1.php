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

//////////////////////////addrow starts//////////
function Addrow()
{
   
   var count=document.getElementById("rows").value
    
window.open('lab_test_popup.php?row='+count,'mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')
			

   }//addrow()

///////////////end addrow//////////////////
   
   

/////////////////////deleterow()////////////////////////
function deleteRow()
{
  var tbl = document.getElementById('TABLE1');
  var lastRow = tbl.rows.length;
  if (lastRow > 1){ tbl.deleteRow(lastRow - 1);}
}

//////////////////deleterow()/////////////////


function amt()
{
var cnt=document.myform.rows.value


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
		alert("Please Enter Concession Amount less than Total Amount");
		document.myform.conamt.value="";
		document.myform.conamt.focus();
		return false;
		}
var price=eval(sum)-eval(conamt);
document.myform.price.value=eval(price).toFixed(2)
}//amt()




function sameinvcode()
{

var rowcount=document.getElementById("rows").value;

    for(i=1;i<=rowcount;i++){//alert("in i for"+i);
	var invgcodei='document.myform.'+'invgcode'+i+'.value.toUpperCase()';
   for(j=rowcount;j!=i;j--)
  {//alert("in j for"+j);
var invgcodej='document.myform.'+'invgcode'+j+'.value';

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

function delrow()
	{
var rowss=document.getElementById("rows").value;

if(rowss==0)
{
alert("Please select atleast one  Row " );
}
else
{
var aa= document.getElementById("cost"+rowss).value;
			 var amt2=eval(aa);
				var bb=document.myform.tot.value;
				  var sum=bb-amt2;
					  document.myform.tot.value = eval(sum); 
				    document.myform.price.value = eval(sum); 	
//document.getElementById("invgtab"+rowss).removeNode(true);
document.getElementById("invgtable").removeChild(document.getElementById("invgtab"+rowss));
document.getElementById("rows").value=eval(rowss)-1;
}
}
</script>
<script>
function paidamt(){
var namt = document.getElementById("price").value;
var paid = document.getElementById("paid").value;
var amt1 = parseFloat(namt)-parseFloat(paid);
document.getElementById("bal").value=amt1;
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
		<?php
			include("config.php");
			$dt = date('d-m-Y');
			$dt1 = explode("-",$dt);
			$dt2 = implode($dt1);
			$dt3 = ltrim($dt2, '0');
			$str = "BL-".$dt3."-";
			$sql = mysql_query("select count(distinct BillNO) from bill where BillNO like '$str%'");
			if($sql){
				$res = mysql_fetch_array($sql);
				$c = $res[0];
				$bno = $str.($c+1);
			}
		?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Lab Bill</div>
		  <form name="myform" method="post" action="insert_bill.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" id="bno" value="<?php echo $bno ?>" readonly class="text"/>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" id="bdate" style="width:188px;height:20px;" value="<?php echo date('d-m-Y') ?>" readonly class="tcal"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
                            <input type="text" name="pname" id="pname" class="text" required/>
                        </td>
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" id="age" class="text" required/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                            <select name="gender" required id="gender" style="width:188px;height:24px;">
								<option value=""> -- Select -- </option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <select required name="dname" id="dname" style="width:188px;height:24px;">
							<option value=""> -- Select -- </option>
							<?php
								include("config.php");
								$sql1 = mysql_query("select DoctorName from ddetails");
								if($sql1){
								while($row1 = mysql_fetch_array($sql1)){
							?>
							<option value="<?php echo $row1[0] ?>"><?php echo $row1[0] ?></option>
							<?php }} ?>
							</select>
                        </td>
                    </tr>
                     <tr >
					 <td colspan="4">
                       <table width="100%" id="expense_table">
                    <tr><td width="100%" align="center">
					<table width="100%" id="TABLE1">
					  <thead>
						 <tr>
					   
					   <th width="50%" class="TH1">Test Name </th>
					   <th width="50%" class="TH1">Cost</th>
					   </tr>
					   </thead>
					   <tr>
					   <td colspan="2" id="invgtable" valign="top">
						
						</td>
						</tr>
					 </table>
					 
					 </td>
					  <td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  +  " onClick="javascript:Addrow()"/></td>
					  <!--<td valign="top"><input name="new" type="button" height="30px" class="butnbg1" value="  -  " onClick="javascript:delrow()"/></td>-->
					  </tr>


					 </table>
					 </td>
                    </tr>
					<tr >
                        <td align="right" >Total Amount :</td>
                        <td align="left" >
                            <input type="text" name="tot" value="0" readonly="readonly" onclick="amt()" id="tot" class="text"/>
                        </td>
						 <td align="right" >Discount :</td>
                        <td align="left" >
                            <input type="text" name="conamt"  value="0" id="conamt" onkeyup="amt()" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Net Amount :</td>
                        <td align="left" >
                            <input type="text" name="price"  value="0" id="price" onclick="amt()" class="text"/>
                        </td>
						 <td align="right" >Paid Amount :</td>
                        <td align="left" >
                            <input type="text" name="paid"  value="0" onkeyup="paidamt()" id="paid" class="text"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Balance Amount :</td>
                        <td align="left" >
                            <input type="text" name="bal"  value="0" onkeyup="paidamt()" id="bal" class="text"/>
                        </td>
						<td align="right" ><div align="right">Number of Tests : </div></td>
						<td align="left"><input type="text" name="rows" id="rows" value="0"  size="8" class="text" readonly="readonly"/></td>
  
                    </tr>
           
        </table>
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='new_lab_bill.php'"/></div>
        
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
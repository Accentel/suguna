<?php //include('config.php');
session_start();
include('config.php');
if($_SESSION['suguna'])
{
 ?>
<!DOCTYPE html >

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
<script>
function fun1(){
	if(document.getElementById('rpt1').checked){
		document.getElementById('with').style.display='block';
		document.getElementById('without').style.display='none';
		document.getElementById('blank').style.display='none';
		document.getElementById('culture').style.display='none';
	}
}
function fun2(){
	if(document.getElementById('rpt2').checked){
		document.getElementById('with').style.display='none';
		document.getElementById('without').style.display='block';
		document.getElementById('blank').style.display='none';
		document.getElementById('culture').style.display='none';
	}
}

</script>
<script>
//////////////////////////addrow starts//////////
function Addrow()
{
	var newRow = document.getElementById("expense_table");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;
//alert(Row);
	 var oCell = document.createElement("TD");
    oCell.innerHTML= "<div align='center' ><input  type='text' class='text' name='tname"+Row+"' id='tname"+Row+"' /> </div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<div align='center' ><input  type='text' class='text' name='units"+Row+"' id='units"+Row+"'  /> </div>"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	 	 oCell.innerHTML = "<div align='center' ><input  type='text' class='text' name='nrange"+Row+"' id='nrange"+Row+"' /> </div>"; 
     row.appendChild(oCell);
	
 // document.getElementById("nitem").value=Row;

     document.getElementById("rows").value=Row;
	 //alert(Row);
//sameinvcodes(Row);
   }//addrow()


 function deleteRow(tableID) {  
    var tbl = document.getElementById('expense_table');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows").value;
  if (lastRow > 1){ 
				  
  tbl.deleteRow(lastRow - 1);
  document.getElementById("rows").value=eval(rowss)-1;

}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
//////////////////////////addrow starts//////////
function Addrow1()
{
	var newRow = document.getElementById("expense_table1");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	 var oCell1 = document.createElement("TD");
    oCell1.innerHTML= "<div align='center' ><input  type='text' class='text' name='tname1"+Row+"' id='tname1"+Row+"' /> </div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell1);

	
	
  //document.getElementById("nitem1").value=Row;

     document.getElementById("rows1").value=Row;
	 //alert(Row);
//sameinvcodes(Row);
   }//addrow()


 function deleteRow1(tableID) {  
    var tbl = document.getElementById('expense_table1');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows1").value;
  if (lastRow > 1){ 
				  
  tbl.deleteRow(lastRow - 1);
  document.getElementById("rows1").value=eval(rowss)-1;

}
  else{ alert('Please Select Row');return false;}
}

</script>
<script>
//////////////////////////addrow starts//////////
function Addrow2()
{
	var newRow = document.getElementById("expense_table2");
   var Row = newRow.rows.length;
   var row = newRow.insertRow(Row);
   var index=row.rowIndex;

	 var oCell2 = document.createElement("TD");
    oCell2.innerHTML= "<div align='center' ><input  type='text' class='text' name='sens"+Row+"' id='sens"+Row+"' /> </div>"; 
	<!------onblur='sameroomno("+Row+")'----->
	row.appendChild(oCell2);

	oCell2 = document.createElement("TD");
    oCell2.innerHTML = "<div align='center' ><input  type='text' class='text' name='mode"+Row+"' id='mode"+Row+"'  /> </div>"; 
    row.appendChild(oCell2);

    oCell2 = document.createElement("TD");
	 	 oCell2.innerHTML = "<div align='center' ><input  type='text' class='text' name='resis"+Row+"' id='resis"+Row+"' /> </div>"; 
     row.appendChild(oCell2);
	
  //document.getElementById("nitem2").value=Row;

     document.getElementById("rows2").value=Row;
//sameinvcodes(Row);
   }//addrow()


 function deleteRow2(tableID) {  
    var tbl = document.getElementById('expense_table2');
   var lastRow = tbl.rows.length;
    var rowss=document.getElementById("rows2").value;
  if (lastRow > 1){ 
				  
  tbl.deleteRow(lastRow - 1);
  document.getElementById("rows2").value=eval(rowss)-1;

}
  else{ alert('Please Select Row');return false;}
}

</script>		
	</head>

	<body>

  
	
<?php include('headertop.php'); ?>

		<div id="centre" style="height:auto;">
		
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Add Tests</div>
		  <form name="frm" class="form-horizontal" method="post" action="insert_test.php">
			<div class="table-responsive">
			<table width="100%" border="0" cellpadding="4" cellspacing="0" class="table ">
                                
                    
                     <tr >
                        <td align="right" >Department Name :</td>
                        <td align="left">
                            <select name="depname" id="depname" style="width:188px;height:24px;" required>
							<option value=""> -- Select -- </option>
							<?php
								//include("config.php");
								$sql = mysqli_query($link,"select deptname from masterdept") or die(mysqli_error($link));
								if($sql){
								while($res = mysqli_fetch_array($sql)){
								?>
							<option value="<?php echo $res['deptname'] ?>"><?php echo $res['deptname'] ?></option>
							<?php } } ?>
							</select>
                        </td>
                    </tr>
					        <tr >
                        <td width="40%" align="right" >Test Name :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="testname" id="testname" class="text" required/>
                        </td>
                    </tr>
					        <tr >
                        <td width="40%" align="right" >Price :</td>
                        <td width="60%"  align="left" >
                            <input type="text" name="tprice" id="tprice" class="text" required/>
                        </td>
                    </tr>
					 <!--<tr>
                    <td colspan="2" style="font-size:16px;">
				<fieldset>
                            <div align="center" >
							<input type="radio" onchange="fun1()" name="report" id="rpt1" value="with" checked /> With Units & Normal Range&nbsp; &nbsp;
                               <input type="radio" name="report" onchange="fun2()" id="rpt2" value="without"/> Without Units & Normal Range&nbsp; &nbsp;
                             
							 </div>
							 
                        </fieldset>
						
                             <div id="with" align="center" >
								<table width="100%" id="expense_table" cellpadding="0" cellspacing="0">
								
								<tr><th>Child Test Name</th><th>Units</th><th>Normal Range</th>
								<th>
								 <input name="new2" type="button" value=" + " onclick="javascript:Addrow()"/>
								 </th><th><input name="new" type="button" value=" - " onclick="javascript:deleteRow()"/>
								 </th>
								</tr>
								</table>
                             </div>
							 <input type="hidden" name="rows" id="rows" value="0" >

							 <div id="without" style="display:none;" talign="center" >
								<table width="100%" id="expense_table1" cellpadding="0" cellspacing="0">
								<tr><th>Child Test Name</th>
								<th>
								 <input type="button" value=" + " onclick="javascript:Addrow1()"/>
								 </th><th><input type="button" value=" - " onclick="javascript:deleteRow1()"/>
								 </th>
								</tr>
								</table>
                             </div>
							 <input type="hidden" name="rows1" id="rows1" value="0" >

							 
                             
                        
					 </td>
                </tr>
				<tr>
				<td colspan="2">Interpretation : <textarea cols="170" rows="5" name="inter" id="inter"></textarea></td>
				</tr>-->	
            <tr >
                <td colspan="2" align="center"><input type="submit" name="submit" value="Save" Class="btn btn-primary"/> <input type="button" value="Close" Class="btn btn-danger" onclick="window.location.href='new_test.php'"/></td>
            </tr>
        </table>
		</div>
		 </form>
			</div>

		<?php include('footer.php'); ?>

	<?php include('footer-bottom.php'); ?>

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
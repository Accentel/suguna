/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
rows="1";
        function addRow(tableID) {
               //alert("hai");
		var actb4=document.getElementById("actb").value;
		var actb5=eval(actb4)+1;
                 if(actb5>2){
                    document.getElementById("del_"+actb4).style.display="none";
                }
		document.getElementById("actb").value=actb5;
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			document.myform.rows.value=(rowCount);
                        
                     //alert("hai")
	           
           oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='part' id='part_"+actb5+"' class='text' style='width:250px;'> "; 
    row.appendChild(oCell);
                
    oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='cost' id='cost_"+actb5+"' class='text' onkeyup='tot()'>"; 
    row.appendChild(oCell);
    oCell = document.createElement("TD");
	oCell.innerHTML = "<div id='del_"+actb5+"'><input type='button' value='Delete' class='del_ExpenseRow' onclick='deleteRow("+actb5+")'/></div> "; 
    row.appendChild(oCell);
	   }   
		
        function deleteRow(id) {  
         try {  
	if (id>2){
            document.getElementById("del_"+(id-1)).style.display="";
        }
            var table = document.getElementById('expense_table');
			var mr="cost_"+id;
      var aa=document.getElementById(mr).value;
      if(aa==null || aa==""){aa=0;}
      var mrp=eval(aa);
      var bb=document.getElementById('tamt').value;
      if(bb==null || bb==""){bb=0;}
      var sum=eval(bb)-eval(mrp);
      document.myform.tamt.value=eval(sum);	  
                    table.deleteRow(id); 
                   // rowss1 --;   
                    //id--;
					document.myform.rows.value=(id-1);
                                        document.myform.actb.value=(id-1);	
                   
            }catch(e) {   
                
            }   
        } 
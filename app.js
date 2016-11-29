function addRow() {
    
    var mealno = document.getElementById("mealno");      
    var myFood = document.getElementById("food");
    var serving_size_unit = document.getElementById("serving_size_unit");
    var amount = document.getElementById("amount");
    var carbs = document.getElementById("carbs");
    var protein = document.getElementById("protein");
    var fat = document.getElementById("fat");
    var table = document.getElementById("myTableData");

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    console.log(row);
    row.insertCell(0).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
    row.insertCell(1).innerHTML= mealno.value;
    row.insertCell(2).innerHTML= myFood.value;
    row.insertCell(3).innerHTML= serving_size_unit.value;
    row.insertCell(4).innerHTML= amount.value;
    row.insertCell(5).innerHTML= carbs.value*amount.value;
    row.insertCell(6).innerHTML= protein.value*amount.value;
    row.insertCell(7).innerHTML= fat.value*amount.value;
    row.insertCell(8).innerHTML= (fat.value*9 + carbs.value*4 + protein.value*4)*amount.value;
    
    var macroTable = document.getElementById("macroTable");
    var macroRow = macroTable.insertRow(1);
    console.log(macroTable);
}

function addmacRow() {
    
    var carbs = document.getElementById("carbs");
    var protein = document.getElementById("protein");
    var fat = document.getElementById("fat");
    var amount = document.getElementById("amount");
    var table = document.getElementById("macroTable");
    try {
         var curCarbs = table.rows[1].cell[0].innerHTML;
         var curProtein = table.rows[1].cell[1].innerHTML;
         var curFat = table.rows[1].cell[2].innerHTML;
         var curCalories = table.rows[1].cell[3].innerHTML;
        
         var row = table.insertRow(1);
        
         row.insertCell(0).innerHTML= curCarbs.value + carbs.value*amount.value;
         row.insertCell(1).innerHTML= curProtein.value + protein.value*amount.value;
         row.insertCell(2).innerHTML= curFat.value + fat.value*amount.value;
         row.insertCell(3).innerHTML= curCalories.value +(fat.value*9 + carbs.value*4 + protein.value*4)*amount.value;
    } 
    catch (e) {
         var row = table.insertRow(1);
        
         row.insertCell(0).innerHTML= carbs.value*amount.value;
         row.insertCell(1).innerHTML= protein.value*amount.value;
         row.insertCell(2).innerHTML= fat.value*amount.value;
         row.insertCell(3).innerHTML= (fat.value*9 + carbs.value*4 + protein.value*4)*amount.value;
    }
    
    console.log(curCarbs.value);
    console.log(carbs.value);
}

function deleteRow(obj) {
      
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
    
}

function edit_row(no) {
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";

 var mealno = document.getElementById("mealno"+no);      
 var myFood = document.getElementById("food"+no);
 var serving_size_unit = document.getElementById("serving_size_unit"+no);
 var amount = document.getElementById("amount"+no);
 var carbs = document.getElementById("carbs"+no);
 var protein = document.getElementById("protein"+no);
 var fat = document.getElementById("fat"+no);
    
 var mealno_data = mealno.innerHTML;      
 var myFood_data = myFood.innerHTML;
 var serving_size_unit_data = serving_size_unit.innerHTML;
 var amount_data = amount.innerHTML;
 var carbs_data = carbs.innerHTML;
 var protein_data = protein.innerHTML;
 var fat_data = fat.innerHTML;
    
 mealno.innerHTML="<input type='text' id='mealno_text"+no+"' value='"+mealno_data+"'>";
 amount.innerHTML="<input type='text' id='amount_text"+no+"' value='"+amount_data+"'>";
}

function save_row(no) {
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;

 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 document.getElementById("age_row"+no).innerHTML=age_val;

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}


function addTable() {
      
    var myTableDiv = document.getElementById("myDynamicTable");
      
    var table = document.createElement('TABLE');
    table.border='1';
    
    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);
      
    for (var i=0; i<3; i++){
       var tr = document.createElement('TR');
       tableBody.appendChild(tr);
       
       for (var j=0; j<4; j++){
           var td = document.createElement('TD');
           td.width='75';
           td.appendChild(document.createTextNode("Cell " + i + "," + j));
           tr.appendChild(td);
       }
    }
    myTableDiv.appendChild(table);
    
}
 
function load() {
    
    console.log("Page load finished");
 
}

function addRow() {
    
    var mealno = document.getElementById("mealno");      
    var myFood = document.getElementById("food");
    var amount = document.getElementById("amount");
    var carbs = document.getElementById("carbs");
    var protein = document.getElementById("protein");
    var fat = document.getElementById("fat");
    var calories = document.getElementById("calories");
    var table = document.getElementById("myTableData");
 
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
 
    row.insertCell(0).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
    row.insertCell(1).innerHTML= mealno.value;
    row.insertCell(2).innerHTML= myFood.value;
    row.insertCell(3).innerHTML= amount.value;
    row.insertCell(4).innerHTML= carbs.value;
    row.insertCell(5).innerHTML= protein.value;
    row.insertCell(6).innerHTML= fat.value;
    row.insertCell(7).innerHTML= calories.value;
 
}
 
function deleteRow(obj) {
      
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
    
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
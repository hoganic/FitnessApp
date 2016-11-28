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
    
    row.insertCell(0).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
    row.insertCell(1).innerHTML= mealno.value;
    row.insertCell(2).innerHTML= myFood.value;
    row.insertCell(3).innerHTML= serving_size_unit.value;
    row.insertCell(4).innerHTML= amount.value;
    row.insertCell(5).innerHTML= carbs.value;
    row.insertCell(6).innerHTML= protein.value;
    row.insertCell(7).innerHTML= fat.value;
    row.insertCell(8).innerHTML= fat.value*9 + carbs.value*4 + protein.value*4;
}

function macros() {
    var carbsM = document.getElementsbyId("food").value + document.getElementsbyId("carbsM").value;
    var proteinM = document.getElementsbyId("protein").value + document.getElementsbyId("proteinM").value;
    var fatM = document.getElementsbyId("fat").value + document.getElementsbyId("fatM").value;
    var caloriesM = document.getElementsbyId("food").value + document.getElementsbyId("caloriesM").value;

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

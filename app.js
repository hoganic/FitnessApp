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
    
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
    var cell4 = row.insertCell(4);
    var cell5 = row.insertCell(5);
    var cell6 = row.insertCell(6);
    var cell7 = row.insertCell(7);
    var cell8 = row.insertCell(8);

    cell5.className = 'colTotal';
    cell6.className = 'colTotal';
    cell7.className = 'colTotal';
    cell8.className = 'colTotal';
	
    cell0.innerHTML= '<input type="button" value = "Delete" id="delete" onClick="Javacsript:deleteRow(this)">';
    cell1.innerHTML= mealno.value;
    cell2.innerHTML= myFood.value;
    cell3.innerHTML= serving_size_unit.value;
    cell4.innerHTML= amount.value;
    cell5.innerHTML= carbs.value*amount.value;
    cell6.innerHTML= protein.value*amount.value;
    cell7.innerHTML= fat.value*amount.value;
    cell8.innerHTML= (fat.value*9 + carbs.value*4 + protein.value*4)*amount.value;
}
function finishTable() {
    var tableElemName = "myTableData";
    
    var totalCarbs = computeTableColumnTotal(tableElemName, 5);
    var totalProtein = computeTableColumnTotal(tableElemName, 6);
    var totalFat = computeTableColumnTotal(tableElemName, 7);
    var totalCal = computeTableColumnTotal(tableElemName, 8);
	
    try {
         var totalCarbsElem = window.document.getElementById("totalCarbs");
         var totalProteinElem = window.document.getElementById("totalProtein");
         var totalFatElem = window.document.getElementById("totalFat");
         var totalCalElem = window.document.getElementById("totalCal");

         totalCarbsElem.innerHTML = totalCarbs;
         totalProteinElem.innerHTML = totalProtein;
         totalFatElem.innerHTML = totalFat;
         totalCalElem.innerHTML = totalCal;
    }
    catch (ex) {
     window.alert("Exception in function finishTable()\n" + ex);
   }
    return;
}

function computeTableColumnTotal(tableId, colNumber){
    var result = 0;
    
    try{
        var tableElem = window.document.getElementById(tableId);
        var tableBody = tableElem.getElementsByTagName("tbody").item(0);
        var i;
        var howManyRows = tableBody.rows.length;
        for (i=1; i<(howManyRows-1); i++) {
            var thisTrElem = tableBody.rows[i];
            var thisTextNode = thisTdElem.childNodes.item(0);

            // try to convert text to numeric
            var thisNumber = parseFloat(thisTextNode.data);
            // if you didn't get back the value NaN (i.e. not a number), add into result
            if (!isNaN(thisNumber))
                result += thisNumber;
	    } // end for
	} // end try
  catch (ex) {
     window.alert("Exception in function computeTableColumnTotal()\n" + ex);
     result = 0;
  }
  finally {
     return result;
  }  
}

function deleteRow(obj) {
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
    
}


function load() {
    
    console.log("Page load finished");
 
}

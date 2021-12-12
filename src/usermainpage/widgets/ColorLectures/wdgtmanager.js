var sortType = "";
var sortMode = "";

function setSortType(type){
    //console.log("SortType" + type);
    sortType = type;
}
function setSortMode(mode){
    sortMode = mode;
    //console.log("SortMode" + mode);
}

function sortSelect(){
    if (sortType == "Fecha" && sortMode == "asc"){
        //console.log("Sorting asc");
        sortByDate("asc");
    }
    else if (sortType == "Fecha" && sortMode == "desc"){
        //console.log("Sorting desc");
        sortByDate("desc");
    }
}

function sortByDate(mode) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("tblec");
    switching = true;
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[0];
        y = rows[i + 1].getElementsByTagName("TD")[0];
        // Check if the two rows should switch place:
        if (mode == "asc"){
            if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
        }
        else if (mode == "desc"){
            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }

function generateTableComp()
{
    /*
    Get html code for color comparisons table
    */
    //console.log("sending " + usern    ame); 
    var oReq = new XMLHttpRequest(); // New request object
    
    oReq.onload = function() {
        
        document.getElementById("table").innerHTML = "";
        
        var ans = this.responseText;

        //console.log("response " + ans);

        try{
            document.getElementById("table").innerHTML = this.responseText;
            //console.log(this.responseText);
        } catch (error){
            //console.log("Ocurrió un error en la comunicación");
        }
    };
    oReq.open("GET", "widgets/ColorLectures/TableLectures.php?", false);
    
    oReq.send();
}
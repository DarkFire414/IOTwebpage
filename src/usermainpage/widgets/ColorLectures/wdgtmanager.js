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
    oReq.open("GET", "widgets/ColorLectures/TableLectures.php?", true);
    
    oReq.send();
}
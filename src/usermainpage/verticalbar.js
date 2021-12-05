/*
    Generates the elements of verticar bar, depending of each user
*/
function getUserDevices(username)
{
    /*
    Get wich devices have each user from the DB
    */
    //console.log("sending " + usern    ame); 
    var oReq = new XMLHttpRequest(); // New request object
    
    oReq.onload = function() {
        // This is where you handle what to do with the response.
        // The actual data is found on this.responseText
        
        // Generate elements into the sidebar
        var ans = this.responseText;

        //console.log("response " + ans);

        const obj = JSON.parse(ans); //Converts JSON string into a object

        var vsidebar = $("#sidebar");

        var sdbarCode = "";

        for (const x in obj)
        {
            if (obj[x] != 0)
            {
                sdbarCode += `<a sdelement="true" id = "${x}" onclick="buttonId(this)" class="inactive">` + x + " (" + obj[x] + ")</a>";
            }
            //x = Comercial name of the device, obj[x] = Number of this devices
            //console.log(x + "," + obj[x]);
        }
        // append html code
        vsidebar.append(sdbarCode);
    };
    oReq.open("GET", "userdevices.php?user=" + username, true);
    //                                                     ^ Don't block the rest of the execution.
    //                                                       Don't wait until the request finishes to
    //                                                       continue.
    oReq.send();
}
function createSideBar()
{
    // Create the sidebar base
    var vsidebar = $("#sidebar");

    var sdbarCode = `
                    <a sdelement="true" id = "HOME" onclick="buttonId(this)" class="active">Home</a>
                    <p style="text-align:center; font-weight:bold;">Mis dispositivos</p>
                    <hr>
                    `;
    vsidebar.append(sdbarCode);
}

function buttonId(obj)
{
    // Identifies wich element in the sidebar was pressed
    const currentid = obj.id;
    //alert("You have pressed the button: " + currentid);

    var sideElements = document.querySelectorAll('[sdelement]');
    sideElements.forEach(function(sideItem){
        //console.log(sideItem.className);
        if (sideItem.id != currentid){
            sideItem.className = "inactive";
        }
        else{
            sideItem.className = "active";
        }
    });
    //console.log("Elements found: " + sideElements.length);
    redirect(currentid);
}

function redirect(sensorType)
{
    // Load the appropiate content in the div main
    switch (sensorType){
        case "COLORIMETRO":
            $(".main").load("widgets/ColorLectures/lectures.php");
            break;
        case "TEMPSENSOR":
            $(".main").load("widgets/Temperature/temp.php");
            break;
        default:
            $(".main").load("widgets/Home/home.php");
            break;
    }
}
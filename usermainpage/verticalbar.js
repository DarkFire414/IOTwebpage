function createSideBar(username)
{
    var vsidebar = $("#sidebar");
    
    //alert("sending " + username);
    var oReq = new XMLHttpRequest(); // New request object
    oReq.onload = function() {
        // This is where you handle what to do with the response.
        // The actual data is found on this.responseText
        //alert("Response" + this.responseText); // Will alert: 42
        console.log(this.responseText);
        const obj = JSON.parse(this.responseText);
    };
    oReq.open("GET", "userdevices.php?user=" + username);
    //oReq.open("GET", "userdevices.php?user=" + username, true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to
    //                                 continue.
    oReq.send();

    var sdbarCode = `
                    <p style="text-align:center; font-weight:bold;">Mis dispositivos</p>
                    <hr>
                    <a class="active" href="#home">Home</a>
                    <a href="#news">News</a>
                    <a href="#contact">Contact</a>  
                    <a href="#about">About</a>
                    `
    /*
    for (const x in userdevices)
    {
        sdbarCode += `<a href="#nothing">` + x + userdevices[x] + "</a>";
        console.log(x + userdevices[x]);
    }
    //alert(sdbarCode);
    */
    console.log("COLORIMETRO" + obj["COLORIMETRO"]);
    vsidebar.html(sdbarCode);
}

function getUserDevices(username)
{
    //alert("sending " + username);
    var oReq = new XMLHttpRequest(); // New request object
    const obj;
    oReq.onload = function() {
        // This is where you handle what to do with the response.
        // The actual data is found on this.responseText
        //alert("Response" + this.responseText); // Will alert: 42
        console.log(this.responseText);
        obj = JSON.parse(this.responseText);
    };
    oReq.open("GET", "userdevices.php?user=" + username, true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to
    //                                 continue.
    oReq.send();
    return obj;
}
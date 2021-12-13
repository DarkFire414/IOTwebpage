<?php
    session_start();
?>

<!-- Files in widgets will be inserted into userview.php dinamically so, files added here must be
     called with base userview.php location
-->

<div class="homeMain">

        <h1 style="text-align: center;">Panel principal</h1>
        <p style="text-align: center;">
            <img id="userimage" src="" alt="userimage" style="display:block; margin-left:auto; margin-right:auto; width:10%;">
            <br>
            <?php
                echo "Bienvenido " . $_SESSION["User"];
            ?>
        </p>

        <script>
            function getUserImg(username)
            {
                /*
                Get html code for color comparisons table
                */
                //console.log("sending " + username); 
                var oReq = new XMLHttpRequest(); // New request object
                
                oReq.onload = function() {
                    
                    var link = document.getElementById("userimage").src;
                    //console.log("current link " + link);
                    
                    var ans = this.responseText;
            
                    //console.log("response " + ans);

                    var host = "https://iotsoluciones.000webhostapp.com/Images/userimage/";
                    
                    try{
                        $("#userimage").attr("src", host + ans);
                        //console.log(this.responseText);
                    } catch (error){
                        //console.log("Ocurrió un error en la comunicación");
                    }
                };
                oReq.open("GET", "widgets/Home/userinfo.php?" + "user=" + username, false);
                
                oReq.send();
            }

            var username = '<?php echo $_SESSION["User"]; ?>';

            getUserImg(username);
        </script>

</div>
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--<link rel="stylesheet" type="text/css" href="loginStyle.css"/>-->

        <!--Navigation Bar-->
        <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Navigation Bar style sheet -->
        <link rel="stylesheet" href="../CSS/navigationbar.css">

        <title>Login</title>

    </head>
    <body>
        <div class="topnav" id="myTopnav">
            <a href="../index.html"><i class="fa fa-home"></i> Inicio</a>
            <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contacto</a>
            <a href="#about">Acerca de</a>
            <a class="active" href="#login"><i class="fa fa-user-circle-o"></i> Inicie sesión</a>

            <!--The link with class="icon" is used to open and close the topnav on small screens.-->
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>

            <script>
            /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
            </script>
        </div> 
        
        <div class="main">

            <div class="form">
                <form class="formContainer" action="loginControlAccess.php" method="post">
                    <h1>Soluciones IOT</h1>
                    
                    <?php
                        echo '<p style="text-align: center;">';
                        echo $_SESSION["status"];
                        echo '</p>';
                    ?>
                    
                    <label for="user">Usuario: </label><br><br>
                    <input type="text" id="user" name="user"><br><br>  
                    <label for="pass">Contraseña: </label><br><br>
                    <input type="password" id="pass" name="pass"><br><br>
                    <input class="submitButton" type="submit" value="Enviar"> 
                </form>
            </div>
            <style>
                /*Style for the form apearance*/
                body, html{
                    height: 100%;
                }
                *{
                    box-sizing: border-box;
                }
                div.main
                {
                    /* The image used */
                    background-image: url('../Images/mainBackground.jpg');

                    /* Control the height of the image */
                    height: 100%;

                    /* Center and scale the image nicely */
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    position: relative;

                    font-family: "Courier New", Courier, monospace;
                }
                form.formContainer
                {
                    position: absolute;
                    top: 10%;
                    right: 20%;
                    margin: 20px;
                    padding: 16px;
                    max-width: 380px;
                    background-color: white;
                }
                /* Full-width input fields */
                input[type=text], input[type=password] {
                    width: 100%;
                    padding: 15px;
                    margin: 5px 0 22px 0;
                    border: none;
                    background: #f1f1f1;
                }
                input[type=text]:focus, input[type=password]:focus {
                    background-color: #ddd;
                    outline: none;
                }
                /* Set a style for the submit button */
                input.submitButton {
                    background-color: #0066db;
                    color: white;
                    padding: 16px 20px;
                    border: none;
                    cursor: pointer;
                    width: 100%;
                    opacity: 0.9;
                }
                input.submitButton:hover {
                    opacity: 1;
                }
            </style>
            <br>
        </div>
    </body>
</html>
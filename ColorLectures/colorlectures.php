<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Navigation Bar-->
        <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body {margin:0;}
            /* Main content */
            .main {
                margin-top: 45px; /* Add a top margin to avoid content overlay */
            }
            .mainTittle{
                text-align: center;
            }
            .introText{
                text-align: center;
            }
            /* Add a black background color to the top navigation */
            .topnav {
                background-color: #333;
                overflow: hidden;
                position: fixed; /* Set the navbar to fixed position */
                top: 0; /* Position the navbar at the top of the page */
                width: 100%; /* Full width */

                font-family: "Courier New", Courier, monospace;
            }
      
            /* Style the links inside the navigation bar */
            .topnav a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }
      
            /* Change the color of links on hover */
            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }
      
            /* Add a color to the active/current link */
            .topnav a.active {
                background-color: #0066db;
                color: white;
            }
    
            
            /* Hide the link that should open and close the topnav on small screens */
            .topnav .icon {
                display: none;
            }
    
             /* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
            @media screen and (max-width: 600px) {
                .topnav a:not(:first-child) {display: none;}
                .topnav a.icon {
                    float: right;
                    display: block;
                }
            }
    
            /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
            @media screen and (max-width: 600px) {
                .topnav.responsive {position: relative;}
                .topnav.responsive a.icon {
                    position: absolute;
                    right: 0;
                    top: 0;
                }
                .topnav.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }
            } 
        </style>

        <title>Color Lectures</title>

        <link rel="stylesheet" type="text/css" href="styles.css"/>
    </head>

    <body>
        <div class="topnav" id="myTopnav">
            <a href="../index.html"><i class="fa fa-home"></i> Inicio</a>
            <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contacto</a>
            <a href="#about">Acerca de</a>
            <a class="active" href="#login"><i class="fa fa-user-circle-o"></i> 
                <?php
                    echo $_SESSION["User"];
                ?>
            </a>

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
            <h1>Comparaciones de color</h1>
            <p>
                <?php
                    echo "Bienvenido " . $_SESSION["User"];
                ?>
            </p>
            <div style="overflow-x:auto;">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Referencia 1 (H,S,L)</th>
                        <th>Referencia 2 (H,S,L)</th>
                        <th>Referencia 3 (H,S,L)</th>
                        <th>Muestra (H,S,L)</th>
                        <th>Diferencia</th>
                        <th>Tolerancia</th>
                        <th>Fecha</th>
                    </tr>
                
                    <?php 
                        include('TableLectures.php');
                        // require 'php/tableSqlPHP.php'; is also valid
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
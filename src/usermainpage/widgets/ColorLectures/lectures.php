<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Color Lectures</title>
        <!--
        <link rel="stylesheet" type="text/css" href="styles.css"/>
        -->
        <style>
            h1{
                text-align: center;
            }
            table, th, td {
                border: 1px solid black;
            }
            
            table {
                border-collapse: collapse;
                width: 100%;
                color: #586a8c;
                font-family: monospace;
                text-align: center;
            }
            th {
                background-color: #588c7e;
                color: white;
                height: 30px;
                font-size: 20px;
            }
            tr{
                font-size: 15px;
            }
            
            tr:nth-child(even) {background-color: #53ccc227}
            tr:hover {background-color: rgba(16, 206, 165, 0.486);}
            
            .Ref1{
                text-align: right;
            }
            
            .Ref2{
                text-align: right;
            }
            
            .Ref3{
                text-align: right;
            }
            
            .Muestra{
                text-align: right;
            }
        </style>
    </head>

    <body>
        <h1>Comparaciones de color</h1>
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
    </body>
</html>
<?php

//Database conection
$servername = "sql102.epizy.com";
$username = "epiz_30279333";
$password = "0rbzdnc6";
$database = "epiz_30279333_lecturas_color";

// Create conection
$conn = new mysqli($servername, $username, $password, $database);

//Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//Receive data, method get
$user = $_GET ['user'];
$result = $_GET ['result'];
$H_reference1 = $_GET ['H_reference1'];
$H_reference2 = $_GET ['H_reference2'];
$H_reference3 = $_GET ['H_reference3'];
$S_reference1 = $_GET ['S_reference1'];
$S_reference2 = $_GET ['S_reference2'];
$S_reference3 = $_GET ['S_reference3'];
$L_reference1 = $_GET ['L_reference1'];
$L_reference2 = $_GET ['L_reference2'];
$L_reference3 = $_GET ['L_reference3'];
$H_muestra = $_GET ['H_muestra'];
$S_muestra = $_GET ['S_muestra'];
$L_muestra = $_GET ['L_muestra'];
$difference = $_GET ['difference'];
$tolerance = $_GET ['tolerance'];

//Message to client
echo "  Data received from: "; echo $user;
echo "<br>";
echo "  Result: "; echo $result;
echo "<br>";
echo "  Diference: "; echo $difference;
echo "<br>";
echo "  Tolerance: "; echo $tolerance;
echo "<br>";

$sql = "INSERT INTO `informacion_lecturas$user` (`id`, `No_Orden`, `Estado`, `H_Referencia1`, `H_Referencia2`, `H_Referencia3`, `S_Referencia1`, `S_Referencia2`, `S_Referencia3`, `L_Referencia1`, `L_Referencia2`, `L_Referencia3`, `H_Muestra`, `S_Muestra`, `L_Muestra`, `Diferencia`, `Tolerancia`, `Fecha`) VALUES (NULL, '0', '$result', '$H_reference1', '$H_reference2', '$H_reference3', '$S_reference1', '$S_reference2', '$S_reference3', '$L_reference1', '$L_reference2', '$L_reference3', '$H_muestra', '$S_muestra', '$L_muestra', '$difference', '$tolerance', NULL)";
//echo $sql;
$conn->query($sql);
$conn->close();

?>
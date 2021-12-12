<?php

//Receive data from newUser.html
$device_name = $_POST["name"]; 
$device_user = $_POST["username"];
$device_id = $_POST["uniqueid"]; 
$clv = $_POST["clv"]; 

echo "  Device: "; echo $device_name;

$key = "@84ert543VM@#";

if ($clv != $key){
    die("<h1> Clave de seguridad incorrecta </h1>");
}

//Database conection
$servername = "localhost";
$username = "id18078501_iotsoluciones";
$password = "@84ert543VM@#";
$database = "id18078501_iotdb";

// Create conection
$conn = new mysqli($servername, $username, $password);
    
//Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//Select database
$conn->select_db($database);


$sql = "SELECT `device_uniqueid` FROM `devices`  WHERE `device_uniqueid` = '$device_id'";
$result = $conn->query($sql);

if ($result->num_rows == 1){
    //Username already used
    die("<h1> El id de dispositivo ya está en uso </h1>");
}

$sql = "INSERT INTO `devices` (`device_id`, `device_name`, `device_username`, `device_uniqueid`) VALUES (NULL, '$device_name', '$device_user', '$device_id')";

//echo $sql;

$conn->query($sql);

$sql = "SELECT `device_name`, `device_username`, `device_date` FROM `devices`  WHERE `device_uniqueid` = '$device_id'";
//echo $sql;

$result = $conn->query($sql);

$conn->close();

if ($result->num_rows == 1){
    //User registered
    $row = $result->fetch_assoc();

    echo "<h1> Dispositivo registrado correctamente </h1>";
    echo "<br>";
    echo "<p> Tipo: " . $row['device_name'] . "</p>";
    echo "<br>";
    echo "<p> Fecha: " . $row['device_date'] . "</p>";
}
else{
    echo "<h1> Ocurrió un error al hacer el registro </h1>";
}

?>
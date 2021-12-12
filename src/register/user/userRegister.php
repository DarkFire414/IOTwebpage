<?php

//Receive data from newUser.html
$user = $_POST["user"]; 
$pass = $_POST["pass"];
$email = $_POST["email"]; 
$img = $_POST["img"];
$clv = $_POST["clv"]; 

echo "  Data received from: "; echo $user;

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


$sql = "SELECT `user_name`, `user_date` FROM `users`  WHERE `user_name` = '$user'";
$result = $conn->query($sql);

if ($result->num_rows == 1){
    //Username already used
    die("<h1> El nombre de usuario está en uso </h1>");
}


if ($img == ""){
    $sql = "INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_date`) VALUES (NULL, '$user', '$pass', '$email', NULL)";
}
else{
    $sql = "INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_image`, `user_date`) VALUES (NULL, '$user', '$pass', '$email', '$img', NULL)";
}

//echo $sql;

$conn->query($sql);

$sql = "SELECT `user_name`, `user_date` FROM `users`  WHERE `user_name` = '$user' AND `user_password` = '$pass'";
//echo $sql;

$result = $conn->query($sql);

$conn->close();

if ($result->num_rows == 1){
    //User registered
    $row = $result->fetch_assoc();

    echo "<h1> Usuario registrado correctamente </h1>";
    echo "<br>";
    echo "<p> Nombre de usuario: " . $row['user_name'] . "</p>";
    echo "<br>";
    echo "<p> Fecha: " . $row['user_date'] . "</p>";
}
else{
    echo "<h1> Ocurrió un error al hacer el registro </h1>";
}

?>
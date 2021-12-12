<?php
//Receive data from device COLORIMETRO

//Receive data, method post
$user = $_REQUEST ['user'];
$result = $_REQUEST ['result'];
$h_ref1 = $_REQUEST ['h_ref1'];
$h_ref2 = $_REQUEST ['h_ref2'];
$h_ref3 = $_REQUEST ['h_ref3'];
$s_ref1 = $_REQUEST ['s_ref1'];
$s_ref2 = $_REQUEST ['s_ref2'];
$s_ref3 = $_REQUEST ['s_ref3'];
$l_ref1 = $_REQUEST ['l_ref1'];
$l_ref2 = $_REQUEST ['l_ref2'];
$l_ref3 = $_REQUEST ['l_ref3'];
$h_samp = $_REQUEST ['h_samp'];
$s_samp = $_REQUEST ['s_samp'];
$l_samp = $_REQUEST ['l_samp'];
$diff = $_REQUEST ['diff'];
$tol = $_REQUEST ['tol'];
$deviceid = $_REQUEST ['deviceid'];
$clv = $_REQUEST ['clv'];

echo "  User: "; echo $user;

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

$sql = "INSERT INTO `data_colorimeter` (`color_id`, `color_userid`, `color_result`, `h_ref1`, `s_ref1`, `l_ref1`, `h_ref2`, `s_ref2`, `l_ref2`, `h_ref3`, `s_ref3`, `l_ref3`, `h_samp`, `s_samp`, `l_samp`, `color_diff`, `color_tol`, `color_date`, `color_deviceUniqueId`, `color_username`) VALUES (NULL, '0', '$result', '$h_ref1', '$s_ref1', '$l_ref1', '$h_ref2', '$s_ref2', '$l_ref2', '$h_ref3', '$s_ref3', '$l_ref3', '$h_samp', '$s_samp', '$l_samp', '$diff', '$tol', NULL, '$deviceid', '$user')";
//echo $sql;

$conn->query($sql);
$conn->close();
?>
<?php
    session_start();
    //Database conection
    $servername = "sql102.epizy.com";
    $username = "epiz_30279333";
    $password = "0rbzdnc6";
    $database = "epiz_30279333_iotDB";

    // Create conection
    $conn = new mysqli($servername, $username, $password, $database);

    //Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $user = $_REQUEST["user"];

    $devicesav = array("COLORIMETRO", "TEMPSENSOR");
    $userdevices = array(0, 0);

    $sql = "SELECT `device_name` FROM `devices` WHERE `device_username` = '". $user . "'";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            switch ($row["device_name"])
            {
                case $devicesav[0]:
                    $userdevices[0] = $userdevices[0] + 1;
                    break;
                
                case $devicesav[1]:
                    $userdevices[1] = $userdevices[1] + 1;
                    break;
            }
        }
    }

    $conn->close();

    $assoc = array($devicesav[0]=>$userdevices[0], $devicesav[1]=>$userdevices[1]);
    echo json_encode($assoc);
?>
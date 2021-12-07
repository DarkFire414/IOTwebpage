<?php
    /*
        Search in DB for a devices that have one user
    */
    session_start();
    //Database conection
    $servername = "localhost";
    $username = "id18078501_iotsoluciones";
    $password = "@84ert543VM@#";
    $database = "id18078501_iotdb";

    // Create conection
    $conn = new mysqli($servername, $username, $password, $database);

    //Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $user = $_REQUEST["user"];

    //Comercial names of available devices
    //+++++ Change this when new device is added +++++++++++
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
                //+++++ Change this when new device is added +++++++++++
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

    //+++++ Change this when new device is added +++++++++++
    $assoc = array($devicesav[0]=>$userdevices[0], $devicesav[1]=>$userdevices[1]);
    echo json_encode($assoc);
?>
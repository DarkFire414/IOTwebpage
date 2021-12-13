<?php
    $user = $_REQUEST['user'];
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

    $sql = "SELECT `user_image` FROM `users` WHERE `user_name` = '". $user . "'";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows == 1)
    {
        //Output data of each row
        while($row = $result->fetch_assoc())
        {
            echo $row["user_image"];
        }
    }
    $conn->close();
?>
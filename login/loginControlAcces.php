<?php
    session_start();
    //Receive data from login.php
    $user = $_GET["user"]; //Name field on input elements in html file
    $pass = $_GET["pass"];

    $protocol = $_SERVER['HTTPS'] ? "https" : "http";
    $url = $protocol.'://'.$_SERVER['HTTP_HOST'];
    
    if (($user == "") || ($pass == ""))
    {
        //Data no received
        $url .= '/Practice/ColorSensorPage/login/login.php';
        $_SESSION["status"] = "Ocurrio un error al recibir la información";
        header("Location: $url");
        exit;
        //echo "Data no received";
    }

    /*
    echo "Welcome <br>";
    echo "Your username is: "; echo $user;
    echo "<br><br>";
    echo "Your password is: "; echo $pass;
    echo "<br><br>";
    */

    //Database conection
    $servername = "sql102.epizy.com";
    $username = "epiz_30279333";
    $password = "0rbzdnc6";
    $database = "epiz_30279333_testDataBaseUsers";
    
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
    //DarkSide	12345678
    $sql = "SELECT `User` FROM `Users`  WHERE `User` = \"$user\" AND `Password` = \"$pass\"";
    $result = $conn->query($sql);

    if ($result->num_rows == 1){
        //Match credentials
        //echo "Access";
        $row = $result->fetch_assoc();
        $_SESSION['User'] = $row['User'];

        $url.='/Practice/ColorSensorPage/ColorLectures/colorlectures.php';
        $_SESSION["status"] = "";
    }
    else{
        //echo "User not found" . $result->num_rows;
        //echo "<br>" . $sql;
        $url .= '/Practice/ColorSensorPage/login/login.php';
        $_SESSION["status"] = "Usuario o contraseña incorrectos";
    }

    $conn->close();

    header("Location: $url");
    //exit;
?>
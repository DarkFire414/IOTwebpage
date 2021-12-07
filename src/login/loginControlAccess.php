<?php
    session_start();
    //Receive data from login.php
    $user = $_POST["user"]; //Name field on input elements in html file
    $pass = $_POST["pass"];

    $protocol = $_SERVER['HTTPS'] ? "https" : "http";
    $url = $protocol.'://'.$_SERVER['HTTP_HOST'];
    
    if (($user == "") || ($pass == ""))
    {
        //Data no received
        $url .= '/login/login.php';
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
    
    $sql = "SELECT `user_name` FROM `users`  WHERE `user_name` = \"$user\" AND `user_password` = \"$pass\"";
    $result = $conn->query($sql);

    if ($result->num_rows == 1){
        //Match credentials
        //echo "Access";
        $row = $result->fetch_assoc();
        $_SESSION['User'] = $row['user_name'];

        $url.='/usermainpage/userview.php';
        $_SESSION["status"] = "";
    }
    else{
        //echo "User not found" . $result->num_rows;
        //echo "<br>" . $sql;
        $url .= '/login/login.php';
        $_SESSION["status"] = "Usuario o contraseña incorrectos";
    }

    $conn->close();

    header("Location: $url");
    //exit;
?>
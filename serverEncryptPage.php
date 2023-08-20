<?php
    //start session
    session_start();
    
    //connect to db
    require "databaseconnection.php";

    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $param = mysqli_real_escape_string($connection, $_POST["param"]);
    $session = $_SESSION['password'];
    if (!password_verify($password, $session)) {
        //throw error
        echo "Incorrect password.";
    }else {
        //continue
        if ($param === "AXY345") {
            //continue
            echo "editshopname.php";
        }elseif ($param === "AXY946") {
            //continue
            echo "editshoplogo.php";
        }elseif ($param === "AXY748") {
            //continue
            echo "editshopdes.php";
        }elseif ($param === "AXY34526") {
            //continue
            echo "profilesettings.php";
        }elseif ($param === "AXY34532") {
            //continue
            echo "emailsettings.php";
        }elseif ($param === "AXY34541") {
            //continue
            echo "passwordsettings.php";
        }elseif ($param === "AXY34550") {
            //continue
            echo "numbersettings.php";
        }else {
            //throw error
            echo "please try to login properly.";
        }         
    }



?>
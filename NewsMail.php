<?php
    //start session
    session_start();
    
    //connect to db
    require "databaseconnection.php";

    $to = mysqli_real_escape_string($connection, $_POST["email"]);
    //send email to the user
    $subject = "Shopweyla Newsletter.";
    $msg = "Thank you for subscribing to our Newsletter.";
    $header = "Subscription";
    //send email
    if(!mail($to, $subject, $msg, $header)){
        //throw error msg...
        echo "Mail Subscription Failed.";
    }else{
        //continue
        //throw success msg...
        echo "Subscription Successful.";
    }

?>
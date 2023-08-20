<?php
    //connect to db
    require "databaseconnection.php";

    //get user name, comment and useridkey
    $username = mysqli_real_escape_string($connection, $_POST["name"]);
    $usercomment = mysqli_real_escape_string($connection, $_POST["comment"]);
    $productkey = mysqli_real_escape_string($connection, $_POST["key"]);

    //create time
    $postTime = date('d/m/y h:i:sa');
    //insert to db
    $insert = "INSERT INTO productcomments (name, comment, productkey, time) VALUES ('$username', '$usercomment', '$productkey', '$postTime')";
    if (!mysqli_query($connection, $insert)) {
        //throw error
        echo "An error occur.";
    }else {
        //success msg
        echo "Thanks for your Comment.";
    }  

?>
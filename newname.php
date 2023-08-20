<?php
    //start session
    session_start();
    //database connection
    require 'databaseconnection.php';
    //get user input from the frontend
    $productNewName = mysqli_real_escape_string($connection, $_POST["productNewName"]);
    //get user auth key id
    $userkeyid = $_SESSION['userkeyid'];
    //validate user input
    if (empty($productNewName)) {
        # throw error
        echo "invalid input or empty string";
    }else {
        # continue
        if (is_numeric($productNewName)) {
            # throw error
            echo "numbers not allowed";
        }else {
            # continue
            $db = "UPDATE sellersproducts SET productname = '$productNewName' WHERE sellerkeyid = '$userkeyid'";
            $result = mysqli_query($connection, $db);
            if (!$result) {
                echo 'An error occured while trying to update product name.';
            } else {
                echo 'Product name updated.';
            }

        }
    }


?>
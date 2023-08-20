<?php
    //start session
    session_start();
    //database connection
    require 'databaseconnection.php';
    //get user input
    $productNewPrice = mysqli_real_escape_string($connection, $_POST["productNewPrice"]);
    //get user auth key id
    $userkeyid = $_SESSION['userkeyid'];
    //validate user input
    if (empty($productNewPrice)) {
        # throw error
        echo "invalid input or empty string";
    }else {
        # continue
        if (!is_numeric($productNewPrice)) {
            # throw error
            echo "numbers not allowed";
        }else {
            # continue
            $db = "UPDATE sellersproducts SET productprice = '$productNewPrice' WHERE sellerkeyid = '$userkeyid'";
            $result = mysqli_query($connection, $db);
            if (!$result) {
                echo 'An error occured while trying to update product price.';
            } else {
                echo 'Product price updated.';
            }

        }
    }


?>
<?php
    //start session
    session_start();
    //database connection
    require 'databaseconnection.php';
    //get user input
    $ProductNewDescription = mysqli_real_escape_string($connection, $_POST["ProductNewDescription"]);
    $userkeyid = $_SESSION['userkeyid'];
    //validate user input
    if (empty($ProductNewDescription)) {
        # throw error
        echo "invalid input or empty string";
    }else {
        # continue
        if (is_numeric($ProductNewDescription)) {
            # throw error
            echo "numbers not allowed";
        }else {
            # continue
            $db = "UPDATE sellersproducts SET productdetails = '$ProductNewDescription' WHERE sellerkeyid = '$userkeyid'";
            $result = mysqli_query($connection, $db);
            if (!$result) {
                echo 'An error occured while trying to update product description.';
            } else {
                echo 'Product description updated.';
            }

        }
    }


?>
?>
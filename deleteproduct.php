<?php
    //start session
    session_start();
    
    //check users log
    if (!isset($_SESSION['userEmailSession'])) {
        //redirect the user
        header("location: index.php");
    }

    //database connection
    require 'databaseconnection.php';

    //get seller id
    $productId = $_GET['url'];
    //get seller id
    $sellerkey = $_SESSION['userkeyid'];
    
    $db = "DELETE FROM sellersproducts WHERE id = '$productId' AND sellerkeyid = '$sellerkey'";
    $result = mysqli_query($connection, $db);
    if(!$result){
        echo "network error";
    }else{
        echo "Deleted Product Data";
        echo "
            <br/><br/>
            <a href='manageproducts.php'>
                <button style='padding: 1rem; backgroung-color: red: color: white;'>Go Back</button>
            </a>
        ";        
    }

?>
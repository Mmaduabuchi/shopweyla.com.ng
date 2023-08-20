<?php
    $userName = mysqli_real_escape_string($connection, $_POST["userName"]);
    $userEmail = mysqli_real_escape_string($connection, $_POST["userEmail"]);
    $to = mysqli_real_escape_string($connection, $_POST["sellerEmail"]);
    $userMesage = mysqli_real_escape_string($connection, $_POST["userMessage"]);
    $subject = "Customer FeedBack from your store";
    $header = "Shopweyla Feedback";
    $msg = $userMesage . "<br/> From " . $userName . "<br/> User Name " . $userEmail;

    
    if (!mail($to, $subject, $msg, $header)) {
        # send response to user...
        echo "Feedback sent successfully.";
    } else {
        # send response to user...
        echo "Sorry Feedback can not be sent, try again.";
    }
    

?>
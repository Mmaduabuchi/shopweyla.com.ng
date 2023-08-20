<?php
    //start session
    session_start();

    //check users log
    if (isset($_SESSION['userEmailSession']) && $_SESSION['userRoleSession'] == "001") {
       //do nothing
    }else {
       //redirect the user
       header("location: ../signin.php");
    }

?>
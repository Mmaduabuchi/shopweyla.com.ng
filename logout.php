<?php
    //start session
    session_start();
    
    //log user out
    if (session_destroy()) {
        header("location: signin.php");
    }
?>
<?php
    //authorise user
    include "logout.php";
    //database connection
    include 'databaseconnect.php';

    //get user key
    $userkey = $_GET['regno'];
    $msg = "";
    //get the user and suspend the user account
    $selectuser = "UPDATE sellerstable SET accounttype = 'suspended' WHERE userkey = '$userkey' ";
    $runquery = mysqli_query($connection, $selectuser);
    if (!$runquery) {
        echo "an error occur please try again later.";
    } else {
        $msg = "User account has been suspended";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suspend user</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <link rel="stylesheet" href="boxicons/js/boxicons.svg">
    
    <style>
        body{
            background: #9ccbe2;
        }
        img{
            width: 40%;
        }
        .backbutton{
            padding: 0.5rem;
            background: #0a2c3d;
            color: white;
            border-radius: 0.5rem;
            width: 40%;
        }
    </style>
</head>
<body>

    <div class="row text-light p-3" style="background-color: #0a2c3d;">
        <h2>Shopweyla</h2>
    </div>
    <br>
    <div class="row mt-5">
        <div class="col text-center">
            <img src="assets/images/done.gif" alt="gifimage">
        </div>
        <div class="col-12 m-4 text-center">
            <h3><?php echo $msg; ?></h3>
            <a href="edituser.php?regno=<?php echo $userkey;?>">
                <button class="backbutton">
                    <i class="bx bx-arrow-back"></i>
                    Goto Back
                </button>
            </a>
        </div>
    </div>
    
</body>
</html>
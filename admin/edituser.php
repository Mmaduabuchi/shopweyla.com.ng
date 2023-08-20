<?php

//authorise user
include "logout.php";

//database connection
include 'databaseconnect.php';

$userkey = $_GET['regno'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User portal</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <link rel="stylesheet" href="boxicons/js/boxicons.svg">
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body class="container-fluid">

    <div class="row text-light p-3" style="background-color: #0a2c3d;">
        <h2>Shopweyla</h2>
    </div>

    <br>
    <br>

    <?php
        $getuserid = $_GET['regno'];
        $selectuser = "SELECT * FROM sellerstable WHERE userkey = '$getuserid' ";
        $runquery = mysqli_query($connection, $selectuser);
        $userdate = mysqli_fetch_array($runquery);
        if (!$runquery) {
            echo "User not found.";
        } else {
            //display the user
            $userId = $userdate['id'];
            $userName = $userdate['username'];
            $userMiddlename = $userdate['middlename'];
            $userPhone = $userdate['phone'];
            $userEmail = $userdate['email'];
            
        }
    ?>
    <div class="row p-5 mb-3 boardDiv">
        <div class="col-12 fw-bold">
            <table border class="text-center">
                <tr>
                    <th class="deferChangeText">Reg No</th>
                    <th>User Name</th>
                    <th>Middle Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td class="deferChangeText"><?php echo $userId; ?></td>
                    <td><?php echo $userName; ?></td>
                    <td><?php echo $userMiddlename; ?></td>
                    <td><?php echo $userPhone; ?></td>
                    <td><?php echo $userEmail; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <br><br>

    <div class="row mb-5">
        <div class="col-12 col-md-6">
            <a href="activeate.php?regno=<?php echo $userkey;?>">
                <div class="menuContainer">
                    <div class="row">
                        <div class="col">Activate User</div>
                        <div class="col text-end"> <i class="bx bx-user-circle icon"></i> </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="suspend.php?regno=<?php echo $userkey;?>">
                <div class="menuContainer">
                    <div class="row">
                        <div class="col">Suspend User</div>
                        <div class="col text-end"> <i class="bx bx-block icon"></i> </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="delete.php?regno=<?php echo $userkey;?>">
                <div class="menuContainerDELETE">
                    <div class="row">
                        <div class="col">Delete User</div>
                        <div class="col text-end"> <i class="bx bxs-user-minus icon"></i> </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
            $msgText = "";
            $selectuser = "SELECT accounttype FROM sellerstable WHERE userkey = '$getuserid' ";
            $runquery = mysqli_query($connection, $selectuser);
            $dataAsArr = mysqli_fetch_assoc($runquery);
            if (!$runquery) {
                echo "an error occured.";
            } else {
                $accounttype = $dataAsArr['accounttype'];
                if ($accounttype == 'suspended') {
                    $msgText = "Account  not Active (suspended)";
                } else {
                    $msgText = "Account is Active";
                }
            }
        ?>
        <div class="col-12 col-md-6">
            <div class="menuContainer">
                <div class="row">
                    <div class="col-8"><?php echo $msgText; ?></div>
                    <div class="col text-end"> <i class="bx bx-bolt-circle icon"></i> </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col text-center">
            <a href="blocks.php">
                <button class="btnBackPage"> 
                    <i class="bx bx-arrow-back"></i> 
                    Go Back
                </button>
            </a>
        </div>
    </div>    



</body>
</html>
<?php
    //authorise user
    include "logout.php";
    //database connection
    include 'databaseconnect.php';

    $userInput = $_POST['usersearch'];
    $TextErr = $textMsg = $status = "";
    if (is_numeric($userInput) || !preg_match("/^[A-Z\d ]+$/i", $userInput)) {
         //throw error
         $TextErr = "Only Letters and white space allowed";
    }else{
        $dbSearch = "SELECT * FROM sellerstable WHERE username = '$userInput'";
        $result = mysqli_query($connection, $dbSearch);
        $checkresult = mysqli_num_rows($result);
        //echo print_r($result);
        if ( !$result) {
            # throw error
            $TextErr = "Network error.";
        } else {
            # display result
            if ($checkresult < 1) {
                # throw error
                $status = 404;
                $TextErr = "User not found.";
            } else {
                # throw result
                $status = 200;
                $textMsg = "User Found.";
                while ($resultData = mysqli_fetch_array($result)) {
                    $username = $resultData['username'];
                    $middlename = $resultData['middlename'];
                    $phone = $resultData['phone'];
                    $email = $resultData['email'];
                    $regNo = $resultData['date'];
                    $userkey = $resultData['userkey'];
                }
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <link rel="stylesheet" href="boxicons/js/boxicons.svg">
    <style>
        th{
            border: 2px solid #0a2c3d;
            text-align: center;
            color: white;
            background: #0a2c3d;
            padding: 0.5rem;
        }
        td{
            text-align: center;
            border: 2px solid;
        }
        img{
            width: 35%;
        }

    </style>
</head>
<body>
    <div class="row text-light p-3" style="background-color: #0a2c3d;">
        <h2>Shopweyla</h2>
    </div>
    <br>

    <div class="row">
        <div class="col-12">
            <?php
                if ($status == 404) {
                    # throw error
                    echo $TextErr;
                }
            
            ?>
        </div>  

        
        <?php
            if ($status == 200) {
                # display results.
        ?>

        <div class="col-12 text-center mb-5">
            <img src="assets/images/done.gif" alt="gifimage">
        </div>
        <div class="col-12 mb-5">
            <div class="row">
                <div class="col"></div>
                <div class="col-12 col-md-10">
                    <h3 class="text-center">
                        <?php echo $textMsg ?>
                    </h3>
                    <table border>
                        <tr>
                            <th>username</th>
                            <th>middlename</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>Reg/no</th>
                            <th>More</th>
                        </tr>
                        <tr>
                            <td><?php echo $username ?></td>
                            <td><?php echo $middlename ?></td>
                            <td><?php echo $phone ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $regNo ?></td>
                            <td class="text-center">
                                <a href="edituser.php?regno=<?php echo $userkey?>">
                                    <button class="btn btn-primary">Modify</button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <?php } ?>

        <div class="col mb-5 text-center">
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
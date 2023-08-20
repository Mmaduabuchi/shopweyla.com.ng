<?php

  include "logout.php";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Reports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <style>
        .innerDivHolder{
            border: solid #0a2c3d;
            padding: 1rem;
            border-radius: 0.5rem;
            color: white;
        }
        .one{
            background:  #0a2c3d;
        }
        .two{
            background:  #0a2c3d;
        }
        .three{
            background:  #0a2c3d;
        }
        .text{
            font-size: 60px;
            color: white;
        }
        a{
            text-decoration: none;
        }
        .trTable, .tdTable{
            background: #0a2c3d;
        }
    </style>
</head>
<body class="bg-light">
    <div class="row">
        <div class="col">
            <div class="text-light p-3" style="background-color: #0a2c3d;">
                <h2>
                    <a href="index.php" class="text-light">
                        <span class="fa fa-arrow-left"></span>
                    </a>
                    Shopweyla Report Page
                </h2>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-md-4 p-4">
            <div class="innerDivHolder one">
                <div class="row">
                    <div class="col-8">
                        <h1 class="text">1</h1>
                        <p class="fw-bold">
                            reviews
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </p>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>        
        <div class="col-12 col-md-4 p-4 bg-warning">
            <div class="innerDivHolder two">
                <div class="row">
                    <div class="col">
                        <h1 class="text">2</h1>
                        <p class="fw-bold">
                            Reports
                            <span class="fas fa-meh"></span>
                        </p>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>        
        <div class="col-12 col-md-4 p-4">
            <div class="innerDivHolder three">
                <div class="row">
                    <div class="col">
                        <h1 class="text">0</h1>
                        <p class="fw-bold">
                            Response
                            <span class="fa fa-phone"></span>
                        </p>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>        
    </div>
    <section class="mt-5">
            <div class="row text-center">
                <div class="col"></div>
                <div class="col-12 col-md-10">
                    <div class="row">
                        <?php
                            //database connection
                            include 'databaseconnect.php';

                            //get users
                            $db = "SELECT * FROM reports";
                            $result = mysqli_query($connection, $db);
                            if (!$result) {
                                # throw an error...
                                echo "<h3 class='text-center'>network error...</h3>";
                            }else {
                                # contiune...
                                if (mysqli_num_rows($result) > 0) {
                                    # display data...
                        ?>
                        
                                    <div class="col">
                                        <table class="w-100 mb-5" border=1>
                                            <tr class="trTable text-light">
                                                <th>ID Number</th>
                                                <th>Reports</th>
                                                <th>Sellers Email</th>
                                                <th>Date</th>
                                                <th>Respond</th>
                                                <th>Delete</th>
                                            </tr>

                        <?php
                                    while ($data = mysqli_fetch_array($result)) {
                                        # display reports...
                        ?>
                        
                                
                                            <tr>
                                                <td><?php echo $data["id"]; ?></td>
                                                <td class="tdTable text-light"><?php echo $data["report"] ."."; ?></td>
                                                <td><?php echo $data["email"]; ?></td>
                                                <td class="tdTable text-light"><?php echo $data["time"]; ?></td>
                                                <td>
                                                    <button class="btn btn-primary">respond</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr> 
                        
                        <?php
                                    }
                                     echo"</table>
                                    </div>  ";   
                                }else {
                                    # throw an error...
                                    echo "<h3 class='text-center'>no report found...</h3>";
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col"></div>
            </div>
    </section>
</body>
</html>
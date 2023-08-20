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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SNNMGSNC57"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-SNNMGSNC57');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopweyla.com</title>
    <link href="assets/img/logoweyla.jpg" rel="icon">
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" media="screen and (max-width: 400px)" href="media@768px.css">
    <style>
        #securityimage{
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="row headerlogoholder">
        <div class="col m-4">
            <p class="fw-bold text-light">Shopweyla <i class="bx bxl-dribbble"></i></p>
        </div>
        <div class="col m-4 text-end fw-bold text-light">
           <a href="account.php">Back</a>
           <i class="bi bi-arrow-right"></i>
        </div>
    </div>
    <div class="row mt-5">
      <div class="col text-center">
        <img src="assets/secureimage/icon3.png" alt="image icon" id="securityimage">
      </div>
    </div>

    <div class="menuContainer">
        <div class="row">
            <div class="col-12 col-md-6 p-4 menuholder">
                <div class="menuBox">
                    <a href="createshop.php" >
                    <div class="row menulink">
                        <div class="col-8">
                        <p>Create Shop</p>
                        </div>
                        <div class="col text-end menuIconholder">
                        <i class="bi bi-plus-circle iconMenu"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 p-4 menuholder">
                <div class="menuBox">
                    <a href="chooseEditlink.php" >
                    <div class="row menulink">
                        <div class="col-8">
                        <p>Edit Shop</p>
                        </div>
                        <div class="col text-end menuIconholder">
                        <i class="bi bi-pen-fill iconMenu"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    
    <?php              
        $userKeyId = $_SESSION['userkeyid'];      
        function (){
            $check = "SELECT * FROM shop WHERE userkey = '$userKeyId'";
            $result = mysqli_query($connection, $check);
            if (mysqli_num_rows($result) > 0) {                                      
    ?>
        <script defer>
            function () {
                let btn = document.querySelector(".acctBtn");
                btn.style.display = "none";
            }
        </script>
    <?php
                           
        } else {
            # code...
           }
                        
        }
    ?>

    <!-- ======= Footer ======= -->
    <?php
        include "footer.html";
    ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>
    
</body>
</html>
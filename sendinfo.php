<?php
  //start session
  session_start();

  //database connection
  require 'databaseconnection.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent</title>
    <link href="assets/img/logoweyla.jpg" rel="icon">
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .btnthank{
            background-color: #0a2c3d;
            color: white;
        }
        #image404{
            width: 60%;
        }

    </style>
</head>
<body>
    <!-- ======= Header ======= -->
    <?php
        include "header.php";
    ?>
        <br><br><br>


    <section>
        <div class="row">
            <div class="col text-center">
                <img src="homeImage/thanku.jpg" alt="thank you" id="image404">
                <h3>Thank you for contacting the Store owner!</h3>
                <br>
                <button class='btnthank p-3 text-center'>
                    <i class='bi bi-arrow-left'></i> 
                    <a href='marketplace.php' class='text-light'>Back to marketplace</a>
                </button>
            </div>
        </div>
    </section>

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
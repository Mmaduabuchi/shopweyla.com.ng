<?php
  //start session
  session_start();

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
    <title>opps!</title>
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
        .errorBtn{
            background-color: #0a2c3d;
            color: white;
        }
        /*#image404{*/
        /*    width: 50%;*/
        /*}*/

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
                <img src="imageindex/error.JPG" alt="error image" id="image404" class="w-100 w-md-50">
                <br>
                <br>
                <button class='errorBtn p-3 text-center'>
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
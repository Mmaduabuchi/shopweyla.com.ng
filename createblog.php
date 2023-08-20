<?php
    //start session
    session_start();

    //check users log
    if (isset($_SESSION['userEmailSession'])) {
        //do nothing
    }else {
        //redirect the user
        header("location: signin.php");
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>create blog post</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
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
  <style type="text/css">    
    .acctBtn{
      background-color: #a4defc;
    }
    .formBox{
        background-color: #fbfcfd;
    }
    #securityimage{
        width: 50%;
    }
    .btnMoveBack{
      background: #0a2c3d;
      color: white;
      width: 40%;
      padding: 0.8rem;
      border-radius: 0.5rem;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php
    include "header.php";
  ?>
  <!-- End Header -->

  <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Create post</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>blog post</li>
                    </ol>
                </div>      
            </div>
        </section>
  </main>
  <br>

    <section class="m-0 m-md-5 formBox">
        <div class="text-center text-md-left">
            <img src='assets/secureimage/icon4.jpeg' alt='image logo' id='securityimage'>
            <p>This page isn't available, we will notify you once is available.</p>
            <p>Thank you.</p>
        </div>
        <div class="row">
          <div class="col text-center">
            <a href="account.php">
              <button class="btnMoveBack">
                <i class="bi bi-arrow-left"></i>
                Move back
              </button>
            </a>
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
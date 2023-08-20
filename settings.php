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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>config your Account</title>
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
  <script src="littlescript.js" defer></script>
  <style type="text/css">    
    .acctBtn{
      background-color: #a4defc;
    }
    .Sbck{
      cursor: pointer;
    }
    .linktext{
      color: #4f5050;
    }
    #securityimage{
      width: 40%;
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
                    <h2>Settings</h2>
                    <ol>
                        <li onclick="backfunction()" class="text-primary Sbck">Back</li>
                        <li>Set account</li>
                    </ol>
                </div>      
            </div>
        </section>
  </main>
  <br><br>
  <div class="row mt-2">
    <div class="col text-center">
      <img src="assets/secureimage/icon2.png" alt="image icon" id="securityimage">
    </div>
  </div>
  <br>
  <section>
    <div class="row">
      <div class="col pl-3">
        <!-- <a href="encrypt.php?regid=AXY34526" class="linktext">
          <p>Update Profile Picture
            <i class="bi bi-arrow-right"></i>
          </p>
        </a> -->
        <a href="encrypt.php?regid=AXY34532" class="linktext">
          <p>Change Email
            <i class="bi bi-arrow-right"></i>
          </p>
        </a>
        <a href="encrypt.php?regid=AXY34541" class="linktext">
          <p>Change Password
            <i class="bi bi-arrow-right"></i> 
          </p>
        </a>
        <a href="encrypt.php?regid=AXY34550" class="linktext">
          <p>Change Mobile Number
            <i class="bi bi-arrow-right"></i>
          </p>
        </a>
      </div>
      <!-- <div class="col"></div> -->
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

  <script>      
    localStorage.setItem("userpageid","nopageid");
  </script>

</body>

</html>
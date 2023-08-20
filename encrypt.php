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

  //check the link
//   $regid = $_GET['regid'];

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
    <title>Encrypt</title>
    <link href="assets/img/logoweyla.jpg" rel="icon">
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

    <link href="assets/css/style.css" rel="stylesheet">
    <script src="littlescript.js" defer></script>
    <style>
        .btnsubmit{
            background: #0a2c3d;
            color: white;
            width: 100%;
        }
        #securityimage{
            width: 40%;
        }
    </style>
</head>
<body class="container-fluid">
    <div class="row headerlogoholder">
        <div class="col m-4">
            <p class="fw-bold text-light"> <a href="index.php" style="color: white;">Shopweyla <i class="bx bxl-dribbble"></i> </a> </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-1 col-md-3"></div>
        <div class="col">
            <div class="row">
                <div class="col text-center">
                    <img src="assets/secureimage/secure.png" alt="security icon" id="securityimage">
                </div>
            </div>
            
                <label class="fw-bold">Enter Your Password</label>
                <input type="password" name="password" id="encryptedPassword" class="form-control p-3" placeholder="Password" required>
                <span class="text-danger fw-bold displayTextEncrypt"></span>
                <br>
                <button class="btn custombtn w-100 p-2 encryptBtn">Continue
                    <i class="bi bi-arrow-right"></i>
                </button>
            
            <button class="btn btnsubmit p-2 mt-2" onclick="backfunction()">
                <i class="bi bi-arrow-left"></i>Back
            </button>
        </div>
        <div class="col-1 col-md-3"></div>
    </div>

    <br><br><br>

    <script>
       //get page link
       let pageLink = window.location.search;
       let queryString = new URLSearchParams(pageLink);
       let paramValue = queryString.get('regid');        
       localStorage.setItem("userpageid", paramValue);
    </script>

    
    <!-- jquery -->
    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>

</body>
</html>
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

    $profileErr = $successmsg = $errormsg = '';
    //get user auth key id
    $userkeyid = $_SESSION['userkeyid'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //get user details
        $profile = $_FILES['image']["name"];
        $imageTmpname = $_FILES["image"]["tmp_name"];
        //traget logo location
        $folderlocation = "shopImage/" . basename($profile);

        //validate user details
        if (empty($profile)) {
            //throw error  
            $profileErr = 'Choose your Image.';
        } else {
            if ($_FILES["image"]["size"] > 2000000) {
                //throw error  
                $errorMsg = "Image size is larger than 2mb..";
                // $profileErr = 'Profile input is invaild.';
            } else {
                //create an array with image extensions
                $extensions = array('.png','.jpg','.jpeg');
                //get the user input file type extension
                $imageFileExtension = pathinfo($profile, PATHINFO_EXTENSION);     
                //convert the image file extension to lower case
                $imageEXEtolowercase = strtolower($imageFileExtension);
                //check if the file extension is valid
                if (in_array($imageEXEtolowercase, $extensions)) {            
                    //error warning
                    $errorMsg = "File extention is invalid try (.png .jpg .jpeg)";
                }else {}
                              
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
    <title>New Profile</title>
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
            width: 70%;
        }
        #backlink{
            color: white;
        }
    </style>
</head>
<body>
    <div class="row headerlogoholder">
        <div class="col m-4">
            <p class="fw-bold text-light">Shopweyla <i class="bx bxl-dribbble"></i></p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-1 col-md-3"></div>
        <div class="col">
            <div class="row">
                <div class="col text-center">
                    <img src="assets/secureimage/icongif.gif" alt="security icon" id="securityimage">
                </div>
            </div>
            <form method="post" action="">
                <label class="fw-bold">Upoad Your New Profile</label>
                <input type="file" name="image" class="form-control p-3" required>
                <span class="text-danger fw-bold "></span>
                <br>
                <button type="submit" class="btn custombtn w-100 p-2 ">Save changes</button>
            </form>
            <button class="btn btnsubmit p-2 mt-2">
                <a href="settings.php" id="backlink"> <i class="bi bi-arrow-left"></i>Back </a>
            </button>
        </div>
        <div class="col-1 col-md-3"></div>
    </div>

    <br><br><br>

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
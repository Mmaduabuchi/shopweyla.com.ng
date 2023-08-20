<?php
  //start session
  session_start();

  //database connection
  require 'databaseconnection.php';
  
  //check users log
  if (!isset($_SESSION['userEmailSession'])) {
    //redirect the user
    header("location: index.php");
  }

  //empty variable
  $errorMsg = $successmsg = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get shop logo
    $shoplogo = $_FILES["shoplogo"]["name"];
    $shoplogoTmpname = $_FILES["shoplogo"]["tmp_name"];
    //traget logo location
    $folderlocation = "shopImage/" . basename($shoplogo);

    if (empty($shoplogo)) {
      $errorMsg = "invaild file.";
    }else {
      if ($_FILES["shoplogo"]["size"] > 2000000) {
        $errorMsg = "Image size is larger than 2mb..";
      }else {
        //create an array with image extensions
        $extensions = array('.png','.jpg','.jpeg');
        //get the user input file type extension
        $shoplogoFileExtension = pathinfo($shoplogo, PATHINFO_EXTENSION);     
        //convert the image file extension to lower case
        $logoEXEtolowercase = strtolower($shoplogoFileExtension);
        //check if the file extension is valid
        if (in_array($logoEXEtolowercase, $extensions)) {            
          //error warning
          $errorMsg = "File extention is invalid try (.png .jpg .jpeg)";
        }else {
          $userkey = $_SESSION['userkeyid'];
          $check = "SELECT * FROM shop WHERE userkey='$userkey'";
          $checkdb = mysqli_query($connection, $check);
          if (!$checkdb) {
            $errorMsg = "ops..";
          }else {
            if (mysqli_num_rows($checkdb) < 1) {
              $errorMsg = "Your do not have any shop.";
            }else {              
              $update = "UPDATE shop SET shopicon='$shoplogo' WHERE userkey='$userkey'";
              if (!mysqli_query($connection, $update)) {
                $errorMsg = "Can not change icon try again later.";
              }else {
                //move to folder
                if (move_uploaded_file($shoplogoTmpname, $folderlocation)) {
                  $successmsg = "Shop icon changed.";
                }else {
                  //throw error
                  $errorMsg = "Opps an error occur..";
                }
              }
            }
          }          
        }
      }      
    }
  }

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
    <title>Edit your Shop</title>
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

    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        
      
      .mybtn{
        background: #0a2c3d;
        padding: 0.7rem;
        color: white;
        border: 2px solid #0a2c3d;
      }
      label{
          font-weight: bold;
      }
    </style>
</head>
<body>
    <div class="row headerlogoholder">
        <div class="col m-4">
            <p class="fw-bold text-light">Shopweyla <i class="bx bxl-dribbble"></i></p>
        </div>
    </div>

    <section class="breadcrumbs mt-5">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Edit Your Shop</h2>
          <ol>
            <li><a href="chooseEditlink.php">Back</a></li>
            <li>Your shop</li>
          </ol>
        </div>
      </div>
    </section>

    <div class="row bg-light mt-5">
      <div class="col-1 col-md-2"></div>
      <div class="col mb-5 ">        
        <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="pt-4">
            <label for="">Change Shop logo</label>
            <input type="file" name="shoplogo" class="form-control p-3">            
            <span class="text-danger fw-bold">
              <?php echo $errorMsg; ?>
            </span>
            <span class="text-success fw-bold">
              <?php echo $successmsg ."<br>"; ?>
            </span>
            <button class="mybtn w-100">Update
                <i class="bi bi-send"></i>
            </button> 
        </form>     
      </div>
      <div class="col-1 col-md-2"></div>
    </div>

    <br><br>

    <!-- ======= Footer ======= -->
    <?php
        include "footer.html";
    ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="assets/js/main.js"></script>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>
    
</body>
</html>
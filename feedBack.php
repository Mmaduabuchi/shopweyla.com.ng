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
  
  //get seller email
  $sellerEmail = $_SESSION['userEmailSession'];
  //get seller key
  $key = $_SESSION['userkeyid'];
  
  $errorMsg = $successMsg = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $seller = $_POST["report"];
      $time = date('d-m-y h:i:sa');
      if(empty($seller)){
          $errorMsg = "Your Report is Empty.";
      }else{
          $db = "INSERT INTO reports (report, userkeyid, email, time) VALUE ('$seller', '$key', '$sellerEmail', '$time')";
          $result = mysqli_query($connection, $db);
          if(!$result){
              $errorMsg = "Hey can you please try again.";
          }else{
              $successMsg = "Your report have been sent.";
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
    <title>Give us your report</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logoweyla.jpg" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>
    .pageDes{
        background: rgb(219, 217, 243);
    }
</style>
<body>
    <!-- ======= Header ======= -->
    <?php
        include "header.php";
    ?>
    <!-- End Header -->
    <br>
    <br>
    <br>
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>My Problems</h2>
          <ol>
            <li><a href="account.php">Dashboard</a></li>
            <li>Report issue</li>
          </ol>
        </div>      
      </div>
    </section>    

    <div class="row p-3 mt-5 pageDes">
        <div class="col"></div>
        <div class="col-10">
            <p>
                <b>Talk to us..</b>
                Shopweyla allows you to communicate with their teams, it helps us serve you and your customer better,
                below is a form field where you can explain to us what issue that you are facing and you can also tell us how 
                and what to do to improve our services, <b>Thank You.</b>.
            </p>
        </div>
        <div class="col"></div>
    </div>
    
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col-10 col-md-8">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <label class="fw-bolder">Explain below what the report is.</label>
                <textarea name="report" cols="30" rows="10" class="form-control" required></textarea>
                <?php
                    if($errorMsg !== ""){
                        echo '
                            <span class="text-danger">
                                <br> '. $errorMsg .'
                            </span>
                        ';
                    }else{
                        echo '
                            <span class="text-success">
                                <br> '. $successMsg .'
                            </span>
                        ';
                    }
                ?>
                <button type="submit" class="btn btn-primary mt-3 w-100 p-3 fw-bold">Send Report</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
<br>
<br>
<br>



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
  <script src="assets/js/main.js"></script>
  <script src="jquery/jquery-3.6.0.js"></script>
  <script src="jquery/jqueryCodeApp.js"></script>

</body>
</html>
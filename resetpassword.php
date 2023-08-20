<?php
  //start session
  session_start();  
  //database connection
  require 'databaseconnection.php';

  $emailErr = $emailSuccess = "";
  //check if form have been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //get user input
      $UserEmail = $_POST["email"];
      //validate user input
      if (empty($UserEmail) || ctype_space($UserEmail) || !filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
          //throw error msg...
          $emailErr = "Invalid Email Format.";
      }else {
          //check is the user exists
          $db = "SELECT email, userkey FROM sellerstable WHERE email='$UserEmail'";
          $dbResult = mysqli_query($connection, $db);
          $checkResultData = mysqli_num_rows($dbResult);
          $fetchResultAsArray = mysqli_fetch_assoc($dbResult);
          if (!$dbResult) {
              # throw error msg...
              $emailErr = "network connection failed...";
          } else {
              # continue...
              if ($checkResultData < 1) {
                  # throw error msg...
                  $emailErr = "User not found.";
              } else {
                    # continue...
                    //send email to the user
                    $to = $UserEmail;
                    $subject = "Reset Your Password.";
                    $msg = "Click on the link to reset your password thank you. 
                            <a herf='www.shopweyla.com.ng/reset.php?userid=" . $fetchResultAsArray['userkey'] . "'>
                                click here
                            </a>";
                    $headers = "Shopweyla forgotten password." . "\r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    //send email
                    if(!mail($to, $subject, $msg, $headers)){
                        //throw error msg...
                        $emailErr = "Email not sent.";
                    }else{
                        //continue
                        //throw success msg...
                        $emailSuccess = "Email sent.";
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
    <title>Reset password</title>
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
    <script src="littlescript.js" defer></script>
    <style>
        .btnsubmit{
            background: #0a2c3d;
            color: white;
            width: 100%;
        }
        #securityimage{
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="row headerlogoholder mb-5">
        <div class="col m-4">
           <p class="fw-bold text-light"> <a href="index.php" style="color: white;">Shopweyla <i class="bx bxl-dribbble"></i> </a> </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-1 col-md-3"></div>
        <div class="col">
            <div class="row">
                <div class="col text-center">
                    <img src="assets/secureimage/forgotten.jpeg" alt="security icon" id="securityimage">
                </div>
            </div>
            <form method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label class="fw-bold">Enter Your Email For Password Reset</label>
                <input type="email" name="email" id="resetEmail" class="form-control p-3" placeholder="Email:" required>
                <span class="text-danger fw-bold ">
                   <?php echo $emailErr; ?>
                </span>
                <span class="text-success fw-bold ">
                   <?php echo $emailSuccess; ?>
                </span>
                <br>
                <button type="submit" class="btn w-100 p-3 custombtn ">Continue
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>
            <button class="btn btnsubmit p-3 mt-2" onclick="backfunction()">
                <i class="bi bi-arrow-left"></i>Back
            </button>
        </div>
        <div class="col-1 col-md-3"></div>
    </div>


    <br><br><br><br>

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
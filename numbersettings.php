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

  $numberErr = $numberConfirmErr = $successmsg = $errormsg = '';
  //get user auth key id
  $userkeyid = $_SESSION['userkeyid'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //get user details
        $number = $_POST['number'];
        $confirmNumber = $_POST['confirmnumber'];
        //validate user details
        if (empty($number) || empty($confirmNumber)) {
            //throw error  
            $numberErr = 'Number input is Empty.';
        } else {
            if (!is_numeric($number)) {
                //throw error  
                $numberErr = 'Number input is invaild.';
            } else {
                //confirm password match
                if ($number !== $confirmNumber) {
                    //throw error  
                    $numberConfirmErr = 'Number did not match.';
                } else {
                    $db = "UPDATE sellerstable SET phone = '$number' WHERE userkey = '$userkeyid'";
                    $result = mysqli_query($connection, $db);
                    if (!$result) {
                        $errormsg = 'An error occured while trying to change your Number.';
                    } else {
                        $successmsg = 'Number changed successfully.';
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
    <title>New Number</title>
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
                    <img src="assets/secureimage/icon6.jpeg" alt="security icon" id="securityimage">
                </div>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <label class="fw-bold">Enter Your New Number</label>
                <span class='text-success successmsg'>
                    <?php echo $successmsg; ?>
                </span>
                <input type="tel" name="number" id="encryptedPassword" class="form-control p-3" placeholder="New Mobile Number" required>
                <span class="text-danger fw-bold ">
                    <?php echo $numberErr;?>
                </span>
                <br>
                <input type="tel" name="confirmnumber" id="encryptedPassword" class="form-control p-3" placeholder="Confirm Mobile Number" required>
                <span class="text-danger fw-bold ">
                    <?php echo $numberConfirmErr .' '. $errormsg;?>
                </span>
                <br>
                <button type="submit" class="btn custombtn w-100 p-3 ">Save changes</button>
            </form>
            <button class="btn btnsubmit p-3 mt-2">
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
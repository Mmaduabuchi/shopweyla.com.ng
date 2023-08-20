<?php
    //start session
    session_start();

    require 'databaseconnection.php';

    //check users log
    if (isset($_SESSION['userEmailSession'])) {
        //do nothing
    }else {
        //redirect the user
        header("location: signin.php");
    }
    //get user id
    $getUserID = $_SESSION['userkeyid'];


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
    <title>Store Link</title>
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
    <link rel="stylesheet" media="screen and (min-width: 768px)" href="media@768px.css">
    <link rel="stylesheet" media="screen and (max-width: 1024px)" href="media@768px.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .bgSuccess{
            background: lightgreen;
            color: black;
        }        
        .hotpink{
            background-color: #e4e7e6;
            padding: 1rem;
            font-weight: bold;
            padding-top: 5%;
            padding-bottom: 5%;
        }
    </style>
</head>
<body>
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>My Store Address</h2>
          <ol>
            <li><a href="account.php">Dashboard</a></li>
            <li>Your Link</li>
          </ol>
        </div>      
      </div>
    </section>

    <div class="row mt-5">
        <div class="col-12 hotpink">
            <p>
                <b class="text-success">NOTE</b> Below is your Store Address which You can be using for your ADVERTISMENT <br> Inviting your friends and family to come and petronize you. 
            </p>
        </div>
        <div class="col bgSuccess p-5 ">
            <input type="text" value="https://shopweyla.com.ng/WelcomeToMyShop.php?shopidkey=<?php echo $getUserID; ?>" id="CopyText" class="form-control p-3">
            <div class="row">
                <div class="col text-end mt-4">
                    <button class="btn btn-primary p-3 w-50 w-md-25 copyBTN">Copy link</button>
                </div>
            </div>
        </div>
    </div>

        

    <br>

    <!-- ======= Footer ======= -->
    <?php include "footer.html"; ?>
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
    <script>
    
        document.querySelector(".copyBTN").addEventlistener("click", () => {
            //get the text field
            var copyText = document.getElementById("#CopyText");
            //copy the text to clipboard
            if(navigator.clipboard.writeText(copyText.value)){
                document.querySelector(".copyBTN").textContent = "Link Copied";
            }else{
                //alert if copy failed
                alert("Failed to copy please try again");
            }
        })
    </script>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>

</body>
</html>
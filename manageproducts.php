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
  
    //get seller id
    $sellerkey = $_SESSION['userkeyid'];



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
    <title>Manage Products</title>
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
          <h2>Manage Products</h2>
          <ol>
            <li><a href="account.php">Dashboard</a></li>
            <li>products</li>
          </ol>
        </div>      
      </div>
    </section>
    <br>
    <?php
        $db = "SELECT * FROM sellersproducts WHERE sellerkeyid='$sellerkey' ";
        $dataResult = mysqli_query($connection, $db);
        $finialResult = mysqli_num_rows($dataResult);
    ?>
    <div class="row">
        <div class="col-md-6 p-4 d-none d-md-block"></div>
        <div class="col-12 col-md-6 p-4 menuholder">
            <div class="menuBox">
                <div class="row menulink">
                <div class="col">
                    <p>You have 
                        <?php
                            if($finialResult < 1){
                                echo $finialResult . " product";
                            }else{
                                echo $finialResult . " products";
                            } 
                        ?> 
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col"></div>
        <div class="col-10 bg-md-light">
            <?php
                //get all registered users
                $selectdata = "SELECT * FROM sellersproducts WHERE sellerkeyid='$sellerkey' ";
                $fetch = mysqli_query($connection, $selectdata);
                if (!$fetch) {
                    //error warning
                    echo "an error occur";
                }else{
                    if (mysqli_num_rows($fetch) < 1) {
                        echo "
                            <div class='row'>
                                <div class='col text-center fw-bold'>
                                    No Product Found..
                                </div>
                            </div>
                        ";
                    }else {
                        while ($productdata = mysqli_fetch_array($fetch)) {
                            # view products here
                            ?>
                            
                            <div class="row">
                                <div class="col-12">
                                    <img src="productsImagesFolder/<?php echo  $productdata["productimage"]; ?>" alt="product image" class="w-50">
                                </div>
                                <div class="col fw-md-bold">
                                    <span><b>Name </b><?php echo $productdata["productname"];?></span>
                                    <br>
                                    <span><b>Price </b><?php echo $productdata["productprice"];?></span>
                                    <br>
                                    <span class="d-none d-md-block"><b>Description </b><?php echo $productdata["productdetails"] . ".";?></span>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-primary p-md-3 w-md-50">
                                        <a href="managementPortal.php?urlcode=<?php echo $productdata["id"];?>" class="text-light">Manage</a>
                                    </button>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <?php
                        }
                    }
                }
            
            ?>
        </div>
        <div class="col"></div>
    </div>
<br>
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
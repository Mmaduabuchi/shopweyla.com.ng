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

  <title>Products</title>
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
          <h2>My Products</h2>
          <ol>
            <li><a href="account.php">Back</a></li>
            <li>Your store</li>
          </ol>
        </div>      
      </div>
    </section>

    <br>

    <!-- ======= Account Section ======= -->
    <section class="portfolio">
      <div class="container">

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
          <?php
            //get seller id
            $sellerkey = $_SESSION['userkeyid'];
            //get all registered users
            $selectdata = "SELECT * FROM sellersproducts WHERE sellerkeyid='$sellerkey' ";
            $fetch = mysqli_query($connection, $selectdata);
            if (!$fetch) {
              //error warning
              echo "an error occur";
            }else{
              if (mysqli_num_rows($fetch) < 1) {
                echo "
                <div class='col'>
                  <div class='row'>
                    <div class='col text-center fw-bold'>
                      <img src='assets/secureimage/icon4.jpeg' alt='image logo' id='securityimage'>
                      <p>You do not have any product in your store yet,
                      <br> Click <a href='uploaditems.php'>here</a> to add Products</p>
                    </div>
                  </div>
                </div>";
              }else {

                while($productdata = mysqli_fetch_array($fetch)){
            
            ?>
            <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
              <div class="portfolio-item">
                <img src="productsImagesFolder/<?php echo $productdata['productimage'];?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h3>
                    <?php
                      echo $productdata['productname'];
                    ?>
                  </h3>
                  <div>
                    <a href="productsImagesFolder/<?php echo $productdata['productimage']?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $productdata['productdetails'];?>">
                      <i class="bx bx-plus"></i>
                    </a>
                    <a href="#" title="Portfolio Details">
                      <i class="bx bx-link"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          <?php
                }
              } 
            }
          ?>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

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
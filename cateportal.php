<?php
  //start session
  session_start();

  require 'databaseconnection.php';
  
  //get seller id
  $productcategories = $_GET['categories'];
  //redirect the user,hacker or tester.
  if (!isset($productcategories)) {
    header("location: errorpage.php");
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
    <title>Categories Portal</title>
    <link href="assets/img/logoweyla.jpg" rel="icon">
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
      .sellerImages{
        width: 80%;
      }
      .infoSeller{
        text-decoration: none;
        color: lightblue;
        font-weight: bold;
      }
      .productBox{
        border: 2px solid #0a2c3d;
        background: #0a2c3d;
        padding-top: 0.5rem;
        text-align: center;
        font-weight: bold;
      }
      .productDetails{
        cursor: pointer;
        background-color: #0a2c3d;
      }
      .productDetails2{
        cursor: pointer;
        background-color: #0a2c3d;
      }
      .productDetails2 :hover{
        color: grey;
        font-weight: bolder;
      }
      .goBtn{
        background-color: #0a2c3d;
      }
      .price{
        color: hotpink;
      }
      #descriptionResult{
        font-family: jokerman;
      }
      /* .productResultContainer{
        background-color: rgba(55, 99, 0, 0.1);
      } */
      .productDetailsContainer{
        background: rgba(10, 40, 220, 0.1);
        margin-bottom: 10px;
        padding-bottom: 0.6rem;
        border-left: 6px solid #0a2c3d;
        border-right: 6px solid #4394bd;
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

    <br>

    <section class="breadcrumbs mt-5">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>You are welcome</h2>
          <ol>
            <li><a href="marketplace.php">market</a></li>
            <li>product list</li>
          </ol>
        </div>
      </div>
    </section>
    
    <br><br>

    <div class="container">
      <div class="row productResultContainer">
        <div class="col-1 col-lg-2"></div>
        <?php
          
          //get all registered user products
          $selectData = "SELECT * FROM sellersproducts WHERE productcategories = '$productcategories' ";
          $runMysqlQuery = mysqli_query($connection, $selectData);
          $checkData = mysqli_num_rows($runMysqlQuery);
          if (!$runMysqlQuery) {
            //error warning
            echo "an error occur";
          }else{
              if ($checkData < 1) {
                      echo "<div class='text-center'><img src='assets/secureimage/icon4.jpeg' alt='image logo' id='securityimage'></div>";
                  echo "<p class='text-center fw-bold'>Nothing in here yet.</p>";
              }
              while($productData = mysqli_fetch_array($runMysqlQuery)){
          
        ?>
        <div class="col-12 col-lg-8 productDetailsContainer">
          <div class="row mt-4">
            <!-- image -->
            <div class="col-12 col-md-2 text-center p-3 bg-white">
              <img src="productsImagesFolder/<?php echo  $productData["productimage"]; ?>" class="sellerImages">
            </div>
            <!-- descriptions -->
            <div class="col">
              <div class="row">
                <!-- name description-->
                <div class="col-12">
                  <h3>
                    <?php echo $productData["productname"]; ?>
                  </h3>
                  <span class='fw-bold'>Description:: </span>
                  <span id="descriptionResult">
                    <?php echo $productData["productdetails"]; ?>
                  </span>
                </div>
                <!-- price and link -->
                <div class="col">
                  <div class="row">
                    <div class="col">
                      <?php 
                        echo "<span class='fw-bold price'>Price:: </span>" . ' N'.$productData["productprice"]; 
                      ?>
                    </div>
                    <div class="col-12 col-md-6 text-end">
                      <button  class="btn goBtn"> <a href='productsDetails.php?ufr=<?php echo $productData["sellerkeyid"] . "&ufrkey=" . $productData['id']. "&selleridkey=" . $productData['sellerkeyid'] ."&categories=" . $productcategories ."&productkey=" . $productData['productkey'];?>' class="text-light">Check this product</a> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
            }
          }
        ?>
        <div class="col-1 col-lg-2"></div>
      </div>
    </div>
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>
</body>
</html>
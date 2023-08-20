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
    $productId = $_GET['urlcode'];
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
    <title>management Portal</title>
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
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
      .box{
          border: 2px solid grey;
          border-top: none;
      }
      .innerBox{
          background: #0a2c3d;
          color: white;
          padding: 1rem;
      }

  </style>
</head>
<body>

    <!-- ======= Header ======= -->
    <?php
        include "header.php";
    ?>
    <!-- End Header -->

    <br><br><br>
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Make changes on Products</h2>
          <ol>
            <li><a href="manageproducts.php">Back</a></li>
            <li>products</li>
          </ol>
        </div>      
      </div>
    </section>
    <br>
    <br>
    <?php
        $productName = $productImage = $productPrice = "";
        $productDetails = $productCategories = $productType = "";
        $datetime = $Id = "";
        $db = "SELECT * FROM sellersproducts WHERE id = '$productId' AND sellerkeyid='$sellerkey' ";
        $data = mysqli_query($connection, $db);
        $result = mysqli_fetch_array($data);
        if (!$data) {
            # throw error...
            echo "Network error occur.";
        }else {
            # continue...
            $Id = $result['id'];
            $productName = $result['productname'];
            $productImage = $result['productimage'];
            $productPrice = $result['productprice'];
            $productDetails = $result['productdetails'];
            $productCategories = $result['productcategories'];
            $productType = $result['productype'];
            $datetime = $result['datetime'];
        }
    
    ?>
    <div class="row">
        <div class="col text-center">
            <img src="productsImagesFolder/<?php echo $productImage;?>" alt="product image" class="w-50">
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-md-1 d-none d-md-block"></div>
                <div class="col">
                    <div class="box">
                        <div class="innerBox">Product Details</div>
                        <ul class="m-0 m-md-3">
                            <li>NAME:: <?php echo $productName; ?></li>
                            <li>PRICE:: <?php echo $productPrice;?></li>
                            <li>CATEGORY:: <?php echo $productCategories?></li>
                            <li>TYPE:: <?php echo $productType?></li>
                            <li>DESCRIPTION:: <?php echo $productDetails?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1 d-none d-md-block"></div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="innerBox p-md-4">Make Changes on your Product</div>
        </div>
    </div>

    <section>
        <div class="row">
            <div class="col-12 mb-5">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-10">
                        <label class="text-danger"><b>New Name*</b></label>
                        <span class="newResultData" style="color: hotpink;"></span>
                        <input type="text" placeholder="Enter New Product Name" class="form-control p-4 ProductNewName">
                        <button class="btn btn-primary p-4 mt-1 w-100 updateProductNameBtn">Update</button>
                    </div>
                    <div class="col"></div>
                </div>
                <hr>
            </div>
            <div class="col-12 mb-5">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-10">
                        <label class="text-danger"><b>New Price*</b></label>
                        <span class="newPriceResultData" style="color: hotpink;"></span>
                        <input type="tel" placeholder="Enter New Product price" class="form-control p-4 ProductNewPrice">
                        <button class="btn btn-primary p-4 mt-1 w-100 updateProductPriceBtn">Update</button>
                    </div>
                    <div class="col"></div>
                </div>
                <hr>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-10">
                        <label>Enter your New product description below.</label>
                        <span class="newDescriptionResultData" style="color: hotpink;"></span>
                        <textarea name="text" class="form-control ProductNewDescription" cols="30" rows="10"></textarea>
                        <button class="btn btn-primary mt-1 p-4 w-100 updateProductDescriptionBtn">Update</button>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <div class="row">
        <div class="col text-center">
            <a href="deleteproduct.php?url=<?php echo $Id;?>">
                <button class="btn btn-danger p-4">Delete Product</button>
            </a>
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
  <script src="assets/js/main.js"></script>
  <script src="jquery/jquery-3.6.0.js"></script>
  <script src="jquery/jqueryCodeApp.js"></script>

</body>
</html>
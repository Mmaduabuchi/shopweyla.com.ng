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

  //create an empty variables
  $err = $success = $status = "";
  $productName = $productPrice = $productImage = $productDetails = $productType = $productCategories = $productCountry = $productDate = "";
  //check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # get product key id
    $productKeyId = $_POST["productKeyId"];
    if (empty($productKeyId)) {
      # throw error
      $err = "Input box is empty.";
    }else {
      # continue
      if (!is_numeric($productKeyId)) {
        # throw error
        $err = "Input is not a product key, try again.";
      }else {
        // $success = $productKeyId;
        $db = "SELECT * FROM sellersproducts WHERE productKeyId = '$productKeyId'";
        $runQuery = mysqli_query($connection, $db);
        $MainData = mysqli_fetch_array($runQuery);
        if (mysqli_num_rows($runQuery) < 1) {
          # throw error
          $err = "Cannot find this product.";
        }else {
          $status = 200;
          $success = "Seen";
          # fetch some product data
          $productName = $MainData["productname"];
          $productPrice = $MainData["productprice"];
          $productImage = $MainData["productimage"];
          $productDetails = $MainData["productdetails"];
          $productType = $MainData["productype"];
          $productCategories = $MainData["productcategories"];
          $productCountry = $MainData["country"];
          $productDate = $MainData["datetime"];
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
    <title>shopweyla Products Id</title>
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
    <script src="littlescript.js" defer></script>   
    <link href="assets/css/style.css" rel="stylesheet">
    
</head>
<body>
    <!-- ======= Header ======= -->
    <?php
        include "header.php";
    ?>
    <!-- End Header -->
    
    <section class="breadcrumbs">
        <br><br><br>
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Identify your Products</h2>
          <ol>
            <li><a href="account.php">back</a></li>
            <li>Identify</li>
          </ol>
        </div>      
      </div>
    </section>
    <br><br>
    <div class="row mb-5">
        <div class="col-1 col-md-3"></div>
        <div class="col">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <span class="fw-bold text-success"><?php echo $success; ?></span>
          <input type="text" name="productKeyId" placeholder="Enter Product Key Id" class="form-control p-3 fw-bold">
          <span class="fw-bold text-danger"><?php echo $err; ?></span>
          <button type="submit" class="btn btn-primary w-100 mt-3 p-3">Check Product</button>
          </form>
        </div>
        <div class="col-1 col-md-3"></div>
    </div>

    <div class="row">
      <?php
        if ($status == 200) {
          # code...
      ?>

        <div class="col text-center">
          <img src="productsImagesFolder/<?php echo $MainData["productimage"]; ?>" alt="product image">             
        </div>
        <div class="col">
          <ol>
            <li><?php echo $MainData["productname"]; ?></li>
            <li><?php echo $MainData["productprice"]; ?></li>
            <li><?php echo $MainData["productdetails"]; ?></li>
            <li><?php echo $MainData["productype"]; ?></li>
            <li><?php echo $MainData["productcategories"]; ?></li>
            <li><?php echo $MainData["country"]; ?></li>
            <li><?php echo $MainData["datetime"]; ?></li>
          </ol>
        </div>


      <?php
        }
      ?>
    </div>





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
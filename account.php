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

  $userKey = $_SESSION['userkeyid'];
  $data = "";
  //fetch user data
  $dbQuery = "SELECT username, middlename FROM sellerstable WHERE userkey='$userKey' ";
  $dataResult = mysqli_query($connection, $dbQuery);
  $dataFetch = mysqli_fetch_assoc($dataResult);
  $data = $dataFetch['username'] ." ".$dataFetch['middlename'];
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

  <title>Welcome To My Dashboard</title>
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
  <style type="text/css">    
    .acctBtn{
      background-color: #a4defc;
    }
    .imageIcon{
      width: 10%;
    }
    #menuIconContainer{
      background: rgb(201, 206, 250);
    }
    .link{
        color: #0a2c3d;
    }
    .dropdownContainer{
      background: #ebcd4c;
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
          <h2>My Dashboard</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Your Account</li>
          </ol>
        </div>      
      </div>
    </section>
    <br>
    <div class="row p-2">
        <div class="col-2 p-2" style="background: #0a2c3d;"></div>
      <div class="col text-end dropdownContainer p-2">
        <img src="accountIcon/icon1.PNG" alt="icon" class="imageIcon">
      </div>
    </div>
    
    <div class="row text-center" style="display: none;" id="menuIconContainer">
      <div class="col-12 dropdownLinkContainer p-3">
        <a href="productsId.php" class="link">
          <h5>Identify Products</h5>
        </a>
      </div>
      <hr>
      <div class="col-12 dropdownLinkContainer p-3">
        <a href="manageproducts.php" class="link">
          <h5>Manage my products</h5>
        </a>
      </div>
      <hr>
      <div class="col-12 dropdownLinkContainer p-3">
        <a href="feedBack.php" class="link">
          <h5>Report an issue</h5>
        </a>
      </div>
    </div>

    <div class="menuContainer m-2">
      <div class="row">
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <a href="storeproductsgallery.php" >
              <div class="row menulink">
                <div class="col-8">
                  <p>All Products</p>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bx bxl-product-hunt iconMenu"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <a href="choosefile.php" >
              <div class="row menulink">
                <div class="col-8">
                  <p>Create/Edit Shop</p>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bi bi-plus-lg iconMenu"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <a href="uploaditems.php">
              <div class="row menulink">
                <div class="col-8">
                  <p>Upload Product</p>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bi bi-upload iconMenu"></i>
                </div>
              </div>
            </a>
          </div>
        </div>        
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <?php 
              $errorTextMsg = $shopImage = $shopName = $status = "";
              //get userkey
              $userIdentifer = $_SESSION['userkeyid'];
              //fetch user shop details
              $dataBaseDB = "SELECT shopname, shopicon FROM shop WHERE userkey='$userIdentifer'";
              $dbResultBase = mysqli_query($connection, $dataBaseDB);
              $checkNumRows = mysqli_num_rows($dbResultBase);
              $assocResult = mysqli_fetch_assoc($dbResultBase);
              if (!$dbResultBase) {
                # throw error msg...
                $errorTextMsg = "service TimeOut..";
              } else {
                # continue...
                if ($checkNumRows < 1) {
                  # throw error msg...
                  $errorTextMsg = "No Store yet..";
                  $status = 404;
                } else {
                  # continue...
                  $shopName = $assocResult['shopname'];
                  $shopImage = $assocResult['shopicon'];
                  $status = 200;
                }
                
              }
              
            ?>
            <a href="WelcomeToMyShop.php?shopidkey=<?php echo $userIdentifer?>" style="color: #ebcd4c">
              <div class="row">
                <div class="col-8">                  
                  <p><?php echo "Store:: " . $shopName; ?></p>
                </div>
                <div class="col text-end menuIconholder">
                  <?php
                    if ($status == 404) {
                      # throw error
                      echo $errorTextMsg;                      
                    } else if ($status == 200) {
                      # display image
                  ?>
                    <img src="shopImage/<?php echo $shopImage; ?>" alt="Image" style="width: 45%; border-radius: 0.7rem;">
                  <?php
                    }
                  ?>                  
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <div class="row">
              <div class="col-8">
                <p><?php echo $data; ?></p>
              </div>
              <div class="col text-end menuIconholder">
                <i class="bx bx-user iconMenu"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <a href="getstorelink.php">
              <div class="row menulink">
                <div class="col-8">
                  <p>Your Store Link</p>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bi bi-folder-symlink iconMenu"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <br><br>
    
    <div class="row mb-2">
      <div class="col-2 col-md-6"></div>
      <div class="col p-4 text-center" style="background: #0a2c3d; color: white;">
        write and create a blog post
        <a href="createblog.php" class="text-light registerlink">
          <span class="registerlink">Here <i class="bi bi-pen-fill"></i> </span> 
        </a>
      </div>
    </div>

  </main><!-- End #main -->

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
  
  
  <script>
      
    //menu dropdown for user account
    var row = document.getElementById("menuIconContainer");

    document.querySelector(".imageIcon").addEventListener("click", ()=> {
        if(row.style.display == "none"){
            row.style.display = "block";
        }else{
            row.style.display = "none";
        }
    });
    
  </script>

</body>
</html>
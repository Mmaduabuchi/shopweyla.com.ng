<?php
  //start session
  session_start();

  require 'databaseconnection.php';
  
  //get seller id
  $shopidkey = $_GET['shopidkey'];
  //redirect the user,hacker or tester.
  if (!isset($shopidkey)) {
    header("location: errorpage.php");
  }
  
  //empty variable
  $error = $emailData = "";
  $dbLan = "SELECT email FROM sellerstable WHERE userkey = '$shopidkey'";
  $runSql = mysqli_query($connection, $dbLan);
  $fetchData = mysqli_fetch_array($runSql);
  if (!$runSql) {
    # throw error msg...
    $error = "Failed";
  } else {
    # throw success msg...
    $emailData = $fetchData['email'];
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8718327664065311"
     crossorigin="anonymous"></script>
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
    <title>Welcome to our shop</title>
  <meta name="description" content="create an account and have a store, create 
  and own your store, post your products for sells, buy and sell any products online,
   create a free store or shop, sell online, have a shop online, bring your products
   to the next level by having a store or shop online, come and own a store for free,
   market your products with us">
  <meta name="keywords" content="fashion, shop, store, fashion store, fashion shop, 
  books, buy books online, sell books online, technology store online,
  technology shop, post goods online, market online, auto mobile store, sell car,
  buy old products, old goods for sell, female wears, male wears, own a store,
  convenient fashion shopping, shopping online">
  
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
      .tips{
        background: rgb(206, 228, 236);
      }
      .feedBackBTN{
          padding: 1rem;
          border: none;
          background-color: #0a2c3d;
          color: white;
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
          <?php
            //get seller id
            $shopidkey = $_GET['shopidkey'];
            //get all registered users
            $selectdata = "SELECT * FROM shop WHERE userkey = '$shopidkey'";
            $fetch = mysqli_query($connection, $selectdata);
            if (!$fetch) {
              //error warning
              echo "an error occur";
            }else{
              while($userdata = mysqli_fetch_array($fetch)){
            
            ?>
          <h2>Welcome to <?php echo $userdata['shopname']; ?> Shop</h2>
          <?php 
              }
            }          
          ?>
          <ol>
            <li><a href="marketplace.php">market</a></li>
            <li>Best shop</li>
          </ol>
        </div>
      </div>
    </section>
    
    <br><br>

    <div class="container">
      <div class="row productResultContainer">
        <div class="col-1"></div>
        <div class="col-10 ">
        <?php
          
          //get all registered user products
          $selectData = "SELECT * FROM sellersproducts WHERE sellerkeyid='$shopidkey' ";
          $runMysqlQuery = mysqli_query($connection, $selectData);
          $checkData = mysqli_num_rows($runMysqlQuery);
          if (!$runMysqlQuery) {
            //error warning
            echo "an error occur";
          }else{
            if ($checkData == "") {
              //throw message to the user
              echo "<p class='textcenter'>Shop is still empty, <span><a href='sendinfo.php' class='infoSeller'>Contact seller..</a></span> </p>";
            }else {
              while($productData = mysqli_fetch_array($runMysqlQuery)){
          
        ?>
        
          <div class="row pt-2 productDetailsContainer">
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
                      <button  class="btn goBtn"> <a href='productsDetails.php?ufr=<?php echo $shopidkey . "&ufrkey=" . $productData['id'] . "&selleridkey=" . $shopidkey ."&categories=" . $productData['productcategories']."&productkey=" . $productData['productkey'];?>' class="text-light">Check this Product</a> </button>
                    </div>
                  </div>
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
        <div class="col-1"></div>
      </div>
    </div>
    <div class="row mt-3 tips">
      <div class="col mt-3">
        <p class="text-center"><b>Safety tips</b></p>
        <br>
        <ul>
          <li>Don't pay in advance, including for delivery.</li>
          <li>Meet the seller at a safe public place before transaction.</li>
          <li>Check the product and ensure it's exactly what you want.</li>
          <li>Only pay when you are satisfied before taking the product home.</li>
        </ul>
      </div>
    </div>
    <section class="breadcrumbs">      
      <h4 class="fw-bold"><i class="bx bxl-dribbble"></i> Send Feedback to Seller.</h4>
    </section>
    
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row">
          <div class="col-lg-6"></div>

          <div class="col-lg-6">
            <div class="row">
                <div class="col-md-6">
                  <input type="text" name="Name" class="form-control p-2" id="userName" placeholder="Your Name">
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                  <input type="email" class="form-control p-2" name="Email" id="userEmail" placeholder="Your Email">
                </div>
              </div>
              <div class=" mt-3">
                <input type="text" class="form-control" name="sellerEmail" id="subject" value="<?php echo $emailData;?>" hidden>
              </div>
              <div class=" mt-3">
                <textarea class="form-control" name="userMessage" rows="5" placeholder="Message"></textarea>
              </div>              
              <div class="resultData fw-bold text-success"></div>
              <div class="text-center mt-3">
                  <button class="feedBackBTN">Send Message 
                    <i class="bx bxs-send"></i>
                  </button>
              </div>
          </div>
        </div>
      </div>
    </section>

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
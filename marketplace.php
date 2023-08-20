<?php
  //start session
  session_start();
  
  //database connection
  require 'databaseconnection.php';
  
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shopweyla.com.ng Market place</title>
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
  <style>
    .shopLogo{
      width: 40%;
      /* border-radius: 5rem; */
    }
    .custombtn2{
      background-color: #0a2c3d;
      font-size: 16px;
      border-radius: 0.2rem;
      border: none;
    }
    #searchShopInput{
      border: 2px solid;
      padding: 1rem;
      font-weight: bold;
      border-radius: 0.2rem 0rem 0rem 0.2rem;
    }
    #searchShopBtn{
      border: 2px solid #0a2c3d;
      padding: 1rem;
      font-weight: bold;
      background-color: #0a2c3d;
      margin-left: -1%;
      color: white;
    }
    #searchShopInput:focus{
      background-color: skyblue;
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

    <!-- ======= Our Services Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Our market place</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Our market place</li>
          </ol>
        </div>

      </div>
    </section>
    <div class="row mt-4">
      <div class="col-12 text-center">
        <form>
          <input type="text" name="searchShop" id="searchShopInput" placeholder="Search for a Store..">
          <input type="button" value="search" id="searchShopBtn">
        </form>
      </div>
      </div>
      <section class="services">
        <div class="container">
          <div class="row result">
            
          </div>
        </div>
      </section>
    </div>
    
    <section class="services">
      <div class="container">
        <div class="row">
          <?php
            //get all registered users
            $selectdata = "SELECT * FROM shop";
            $fetch = mysqli_query($connection, $selectdata);
            if (!$fetch) {
              //error warning
              echo "an error occur";
            }else{
              if (mysqli_num_rows($fetch) < 1) {
                //throw msg
                echo "
                  <div class='col mb-5 text-center fw-bold'>Oops Nothing is Here...</div>
                  ";
              } else {
              
                while($userdata = mysqli_fetch_array($fetch)){
            
            ?>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center" data-aos="fade-up"> 
                  <div class="icon-box icon-box-pink">
                    <div class="col">
                      <img src="shopImage/<?php echo $userdata['shopicon'];?>" alt="shop logo"  class="shopLogo">
                    </div>
                    <br>
                    <h4 class="title">
                      <?php
                        echo $userdata['shopname'] . " Store";
                      ?>
                    </h4>
                    <p class="description">
                      <?php
                        echo $userdata['shopdetails'];
                      ?>
                    </p>
                    <p>
                      <b>Contact:: </b><?php echo $userdata['userphone'];?>
                      <br>
                      <span style='color: hotpink;'>
                        <?php echo $userdata['country'];?>
                      </span>
                    </p>
                    <div class="row">
                      <div class="col text-end">
                        <button class="custombtn2 p-2 w-100 fw-bold">
                          <a href="WelcomeToMyShop.php?shopidkey=<?php echo $userdata['userkey']; ?>" style="color: #eead20">Goto Store
                            <i class="bi bi-arrow-right"></i>
                          </a>
                        </button>
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

  </main>

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
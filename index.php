<?php
  //start session
  session_start();
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

  <title>Welcome to Shopweyla.com.ng</title>
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
  <link href="assets/img/logoweyla.png" rel="icon">
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
    .beforeFooter{
      background: rgb(235, 235, 248);
    }
    .homeImage{
      width: 45%;
    }
  </style>
</head>

<body>

  <!--  Header  -->
  <?php
    include "header.php";
  ?>
  <!-- End Header -->
 
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Shopweyla</span></h2>
          <p class="animate__animated animate__fadeInUp">Shopweyla is an African online marketplace that provides buyers and sellers with an avenue to meet and exchange goods and services.</p>
          <a href="about.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">We do more</h2>
          <p class="animate__animated animate__fadeInUp">Shopweyla Africa is one of the fast growing online shopping classified in Africa. Shopweyla.com.ng is a marketplace where you can buy and sell anything online. both new and used goods.</p>
          <a href="about.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">We love what we do</h2>
          <p class="animate__animated animate__fadeInUp">Shopweyla is an online marketplace that enables buyers and sellers to meet and exchange goods and services.</p>
          <a href="about.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->  

  <main id="main">

    <section>
      <div class="row">
        <div class="col-1 col-md-3 "></div>
        <div class="col text-center border p-4">
          <p>Explore our market place with us today.</p>
          <a href="marketplace.php"> <button class="btn indexbtn p-3">Market Place</button> </a>
        </div>
        <div class="col-1 col-md-3 "></div>
      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box ">
              <div class="icon"><img src="imageindex/fashion.JPG" alt="icon" class="homeImage mb-2"></div>
              <h4 class="title"><a href="cateportal.php?categories=Fashion">Fashion</a></h4>
              <p class="description">Self-expression and autonomy at a particular period and place and in a specific context, of clothing, footwear, lifestyle and accessories.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box ">
              <div class="icon"><img src="imageindex/auto.JPG" alt="icon" class="homeImage mb-2"></div>
              <h4 class="title"><a href="cateportal.php?categories=AutoMobile">AutoMobile</a></h4>
              <p class="description">Passenger vehicle designed for operation on ordinary roads and typically having four wheels and  a gasoline or diesel internal-combustion engine.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box ">
              <div class="icon"><img src="imageindex/home.JPG" alt="icon" class="homeImage mb-2"></div>
              <h4 class="title"><a href="cateportal.php?categories=HomeGarden">Home & Garden</a></h4>
              <p class="description">Discover House and Garden online, your first stop for the latest interior design ideas, beautiful lifestyle inspiration and delicious food recipes.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box ">
              <div class="icon"><img src="imageindex/books.JPG" alt="icon" class="homeImage mb-2"></div>
              <h4 class="title"><a href="cateportal.php?categories=Books">Books</a></h4>
              <p class="description">Medium of recording information in the form of writing or images, typically composed of many pages bound together and protected by a cover.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box ">
              <div class="icon"><img src="imageindex/arts.JPG" alt="icon" class="homeImage mb-2"></div>
              <h4 class="title"><a href="cateportal.php?categories=ArtCrafting">Art & Crafting</a></h4>
              <p class="description">A wide variety of activities involving making things with one's own hand and it's usually a hobby.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box ">
              <div class="icon"><img src="imageindex/apperal.JPG" alt="icon" class="homeImage mb-2"></div>
              <h4 class="title"><a href="cateportal.php?categories=Apparel&Accessories">Apparel & Accessories</a></h4>
              <p class="description">Ready to Wear, Footwear and Headwear, Work and Safety Apperal, etc..</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2>Features</h2>
          <p>Shopweyla makes buying and selling a lot more easier than it use to be, you will enjoy what we have put together to make your dreams come true, scroll down and see more of our offers.</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3>Intuitive and Friendly User Experience.</h3>
            <p class="fst-italic">
              Shopweyla is accessible for everyone. The Flow, Visual interface and store analytics are all easy to use and interact with.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Enjoy our easy to use user interface.</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-2.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Be a shop owner or customer</h3>
            <p class="fst-italic">
              You can operate on Shopweyla as a store owner or you can also be a customer and buy products from other stores.
            </p>
            <p>
              <b>NOTE</b> Purchasing a product through our website is not done within our platform. SO, buying or selling any products must be done on a opened place for security reasons.
            </p>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5">
            <h3>Account and User Security</h3>
            <p>Shopweyla will not in any way ask you for your account details.</p>
            <ul>
              <li><i class="bi bi-check"></i> Account Password.</li>
              <li><i class="bi bi-check"></i> Making any payments within our website or otherwise.</li>
              <li><i class="bi bi-check"></i> Calling you for your account settings.</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-4.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Create your personal store.</h3>
            <p class="fst-italic">
            You can create your personal store, run it with utmost privacy and control with your business.
            </p>
            <p>
              Creating account on our website is very simple, also having a store on our website is very easy to setup and run with your smartPhone, tablets or on your laptop.
            </p>
          </div>
        </div>

      </div>
    </section>

    <div class="row beforeFooter">
      <div class="col-1 col-md-4"></div>
      <div class="col text-center mb-3 mt-3">
        <h4>Set up online store in less than a minute on Shopweyla for free and experience the simplicity of business and the power of online marketing.</h4>
          <a href="signup.php">
            <button class="btn btn-primary w-75 p-md-3">Get Started</button>
          </a>  
      </div>
      <div class="col-1 col-md-4"></div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
    include "footer.html";
  ?>
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
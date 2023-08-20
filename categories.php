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
    <title>Categories</title>
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
        .cate a{
            color: black;
        }
    </style>
</head>
<body>
    <!-- ======= Header ======= -->
    <?php
        include "header.php";
    ?>
    <!-- End Header -->

    <br><br>

    <section class="breadcrumbs mt-5">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Categories</h2>
          <ol>
            <li><a href="marketplace.php">market</a></li>
            <li><a href="search.php">search here</a></li>
          </ol>
        </div>

      </div>
    </section>

    <br><br>

    <div class="row">
        <div class="col-1 col-lg-3"></div>
        <div class="col">

            <div class="cateholder">
                <div class="row">
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=Fashion">
                              <p>Fashion</p>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=Technology">
                               <p>Technology</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cateholder">
                <div class="row">
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=HomeGarden">
                               <p>Home & Garden</p>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=Food">
                               <p>Food</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cateholder">
                <div class="row">
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=Books">
                               <p>Books</p>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=ApparelAccessories">
                               <p>Apparel & Accessories</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cateholder">
                <div class="row">
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=ArtCrafting">
                               <p>Art & Crafting</p>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=MusicalInstrument">
                               <p>Musical & Instrument</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cateholder">
                <div class="row">
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=PetCare">
                               <p>Pet & Care</p>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=FlowersPlants">
                               <p>Flowers & Plants</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cateholder">
                <div class="row">
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=HealthWellness">
                               <p>Health & Wellness</p>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=SportingGoods">
                               <p>Sporting & Goods</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cateholder">
                <div class="row">
                    <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=AutoMobile">
                               <p>Auto mobile</p>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="cate">
                            <a href="cateportal.php?categories=SportingGoods">
                               <p>Sporting & Goods</p>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-1 col-lg-3"></div>
    </div>

    <br><br><br>

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
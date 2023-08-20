<?php
  //start session
  session_start();

  //database connection
  require 'databaseconnection.php';

  $ErrorMsg = $textarea = "";
  
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
    <title>Looking for stores or products</title>
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
        #searchbox{
            padding: 1rem;
            border: 2px solid #0a2c3d;
            border-right: none;
            font-weight: bolder;
        }
        #searchbox:focus{
            background-color: skyblue;
        }
        #btn{
            padding: 1rem;
            font-weight: bolder;
            text-align: center;
            color: white;
            background-color: #0a2c3d;
            margin-left: -1%;
        }
        #formSearchHolder{
            /* display: inline-block; */
            text-align: center;
        }
        .resultContainer{
            border: 2px solid #0a2c3d;
            padding: 1rem;
            font-weight: bold;
            margin-top: 5%;
        }
        .more{
            background-color: #0a2c3d;
            cursor: pointer;
        }
        #productImage{
            width: 50%;
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
          <h2>Looking for?</h2>
          <ol>
            <li><a href="marketplace.php">market</a></li>
            <li>search here</li>
          </ol>
        </div>

      </div>
    </section>

    <br><br>

    <div class="row">
        <div class="col d-none d-md-block"></div>
        <div class="col-12 col-md-8">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="formSearchHolder">
                <input type="text" name="Searchbox" placeholder="Search Here..." id="searchbox" required>
                <input type="submit" value="search" id="btn">
                <br>
                <span class="text-warning"><?php echo $ErrorMsg;?></span>
            </form>
        </div>
        <div class="col d-none d-md-block"></div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-1 col-md-2"></div>
        <div class="col-10 col-md-8">
            <?php            
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $text = $_POST["Searchbox"];
                    if (empty($text)) {
                        $ErrorMsg = "Search box is empty..";
                    }else {
                        if (!preg_match("/^[A-Z\d ]+$/i", $text)) {
                            echo "
                            <div class='text-center fw-bold'>
                               Only letters and white space allowed.
                            </div>";
                        }else {
                            $searchResult = "SELECT * FROM sellersproducts WHERE productname = '$text'";
                            $runQuery = mysqli_query($connection, $searchResult);
                            if (!$runQuery) {
                                $ErrorMsg = "Opps an error occur try again later.";
                            }else {
                                if (mysqli_num_rows($runQuery) > 0) {
                                    while ($result = mysqli_fetch_array($runQuery)) {
            ?>
                                        <div class="row">
                                            <div class="col d-none d-md-block"></div>
                                            <div class="col col-md-12">
                                                <div class="row resultContainer">
                                                    <div class="col-12 text-end">
                                                        <i class="bx bxs-cog"></i>
                                                    </div>
                                                    <div class="col-4">
                                                        <img src="productsImagesFolder/<?php echo $result["productimage"];?>" id="productImage" alt="product Image">
                                                    </div>
                                                    <div class="col productContainer">
                                                        <ul>
                                                            <li>
                                                                Name: <?php echo $result["productname"];?>
                                                            </li>
                                                            <li>
                                                                Price: <?php echo $result["productprice"];?>
                                                            </li>
                                                            <li>
                                                                Description: <?php echo $result["productdetails"];?>
                                                            </li>
                                                        </ul>                                                        
                                                    </div>                                                    
                                                    <button class="btn p-2 more text-center text-light">
                                                        <a href="productsDetails.php?ufr=<?php echo $result["sellerkeyid"];?>&ufrkey=<?php echo $result["id"];?>&selleridkey=<?php echo $result["sellerkeyid"];?>&categories=<?php echo $result["productcategories"];?>&productkey=<?php echo $result["productkey"];?>" class="text-light">More Details </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col d-none d-md-block"></div>
                                        </div> 
                                       
            <?php
                                    }
                                }else {
                                    echo "
                                    <div class='text-center fw-bold'>
                                       No Product Found.
                                    </div>";
                                }
                            }
                        }
                    }
                }else {
                    
            ?>
                    <div class="row">
                        <div class="col text-center">
                            <?php 
                                echo $textarea = "Your search result will display here...";
                            ?>
                        </div>
                    </div>
            <?php
                    
                }
            ?>
        </div>
        <div class="col-1 col-md-2"></div>
    </div>
    <br><br>

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
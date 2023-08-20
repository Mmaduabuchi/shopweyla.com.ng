<?php
  //start session
  session_start();

  //database connection
  require 'databaseconnection.php';

  //get seller id
  $shopidkey = $_GET['ufr'];
  //get seller id
  $selleridkey = $_GET['selleridkey'];
  //redirect the user,hacker or tester.
  if (!isset($shopidkey)) {
      header("location: errorpage.php");
  }


  //get seller details
  $phone = $email = $country = "";
  $selectData = "SELECT phone, email, country FROM sellerstable WHERE userkey = '$selleridkey' ";
  $result = mysqli_query($connection, $selectData);
  if (!$result) {
      echo "an error occur";
  }else {
      if (mysqli_num_rows($result) < 1) {
          //redirect the user
          header("location: errorpage.php");
      }else {
        while($arrdata = mysqli_fetch_array($result)){
            $phone = $arrdata['phone'];
            $email = $arrdata['email'];
            $country = $arrdata['country'];
        }
      }
      
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
    <title>Shopweyla.com.ng product description</title>
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
    <script src="littlescript.js" defer></script>   
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        #backSpanBtn{
            cursor: pointer;
        }
        #imageIcon{
            width: 40%;
        }
        /* table{
            margin: 5%;
        } */
        tr{
            padding: 0.4rem;
        }
        th{
            border: 2px solid black;
        }
        td{
            border: 2px solid black;
            padding: 1rem;
        }
        th{
            text-align: center;
            background: black;
            padding: 0.9rem;
            color: white;
        }
        .detailsContainer{
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 4px solid;
        }
        .desDIVholder{
            padding: 0.9rem;
            background: black;
            color: white;
            font-weight: bold;
        }
        .btncommentbox, .btnCommentBtn{
            padding: 0.7rem;
            color: white;
            font-weight: bold;
            background: #0a2c3d;
        }
        .relatedImageProducts{
            width: 100%;
        }
        #viewAllBtn{
            padding: 0.7rem;
            color: white;
            font-weight: bold;
            background-color: #0a2c3d;
            border-radius: 0.5rem;
        }
      .tips{
        background: rgb(206, 228, 236);
      }
    </style>
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
          <h2>Product Details</h2>
          <ol>
            <li><a href="marketplace.php">Market</a></li>
            <li>Description</li>
          </ol>
        </div>      
      </div>
    </section>
    <br><br>
    <section class='breadcrumbs'>        
        <div class="row">
            <?php
            //get seller id
            $productId = $_GET['ufrkey'];
            //get all registered user products
            $selectData = "SELECT * FROM sellersproducts WHERE id='$productId' ";
            $runMysqlQuery = mysqli_query($connection, $selectData);
            if (!$runMysqlQuery) {
                //error warning
                echo "an error occur";
            }else{
                $productData = mysqli_fetch_array($runMysqlQuery);
            
            ?>

            <div class="col text-center">
                <img src="productsImagesFolder/<?php echo $productData['productimage'];?>" alt="productImage" id="imageIcon">
            </div>

            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-1 col-md-2"></div>
                    <div class="col">
                        <div class="detailsContainer">
                            <div class="desDIVholder">PRODUCT DESCRIPTION: <i class="bxl bxl-product-hunt text-end"></i> </div>
                            <ul>
                                <li><span class="fw-bold">Name:</span> <?php echo $productData['productname'];?></li>
                                <li><span class="fw-bold">Price:</span> <?php echo "N".$productData['productprice'];?></li>
                                <li><span class="fw-bold">Description:</span> <?php echo $productData['productdetails'];?></li>
                                <li><span class="fw-bold">Posted on:</span> <?php echo $productData['datetime'];?></li>
                            </ul>
                            <button class="btn btn-primary w-100 p-3 mb-2">Product Key Id: 
                                <span style="color: hotpink;" class="fw-bold"><?php echo $productData["productKeyId"]; ?></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-1 col-md-2"></div>
                </div>                
            </div>

            <?php  
                }
            ?>            
        </div>
    </section>

    <div class="row">
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <div class="row menulink">
                <div class="col-8">
                  <p>Seller's Email</p>
                  <br>
                  <p>
                      <span class="text-left"><?php echo $email; ?></span>
                  </p>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bi bi-mailbox iconMenu"></i>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <div class="row menulink">
                <div class="col-8">
                  <p>Seller's Address</p>
                  <br>
                  <span>Online</span>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bx bx-building-house iconMenu"></i>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <div class="row menulink">
                <div class="col-8">
                  <p>Country</p>
                  <br>
                  <span><?php echo $country; ?></span>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bi bi-house iconMenu"></i>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 p-4 menuholder">
          <div class="menuBox">
            <div class="row menulink">
                <div class="col-8">
                  <p>Seller's Number</p>
                  <br>
                  <span><?php echo $phone; ?></span>
                </div>
                <div class="col text-end menuIconholder">
                  <i class="bx bx-headphone iconMenu"></i>
                </div>
            </div>
          </div>
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
      <h4 class="fw-bold"><i class="bx bxl-dribbble"></i> Write a Comment About This Product.</h4>
    </section>
    <br>
    <section class="breadcrumbs">
        <div class="row">
            <div class="col-1 col-md-2"></div>
            <div class="col">
                <form class="text-center">
                    <input type="text" name="name" placeholder="Name [optional]." class="form-control p-3" id="commentname">
                    <br>
                    <input type="hidden" name="productkey" id="productkey" value="<?php echo $productData['productkey'];?>">
                    
                    <textarea name="comment" id="comment" cols="25" rows="10" class="form-control" placeholder="Write your Comments Here:" required></textarea>
                    <br>
                    <span class="text-success fw-bold" id="textdisplay"></span>
                    <span class="text-warning fw-bold" id="textdisplay2"></span>
                    <button type="button" id="submitcommentbtn" class="custombtn w-100 p-3">Comment
                        <i class="bi bi-send-slash"></i>
                    </button>
                </form>
            </div>
            <div class="col-1 col-md-2"></div>
        </div>
    </section>
    <br>
    <section class="breadcrumbs">
        <div class="row">
            <div class="col">
                <h3><i class="bx bxl-dribbble"></i>Related Products</h3>
            </div>
            <div class="col-12 p-3 bg-light">
                <div class="row">
                    <div class="col">
                <?php
                    $productcategoriesData = "";
                    $productcategories = $_GET['categories'];
                    //get all registered user products
                    $selectData = "SELECT * FROM sellersproducts WHERE productcategories = '$productcategories' ";
                    $runMysqlQuery = mysqli_query($connection, $selectData);
                    $checkData = mysqli_num_rows($runMysqlQuery);
                    if (!$runMysqlQuery) {
                        //error warning
                        echo "an error occur";
                    }else{
                        if ($checkData < 1) {
                            echo "<p class='text-center'> No related products found. </p>";
                        } else {
                            echo '<div class="row">';
                            while($productData = mysqli_fetch_array($runMysqlQuery)){
                                $productcategoriesData = $productData['productcategories'];
                ?>
                                    <div class="col-3 ">
                                        <a href='productsDetails.php?ufr=<?php echo $productData['sellerkeyid'] . "&ufrkey=" . $productData['id'] . "&selleridkey=" . $productData['sellerkeyid'] ."&categories=" . $productData['productcategories'] ."&productkey=" . $productData['productkey'];?>'>

                                            <div class="row text-center">
                                                <div class="col-12">
                                                    <img src="productsImagesFolder/<?php echo $productData['productimage'];?>" alt="images" class="relatedImageProducts">
                                                </div>
                                                <div class="col-12">
                                                    <b><?php echo $productData['productname']?></b>
                                                </div>
                                                <div class="col-12">
                                                    <b><?php echo $productData['productprice']?></b>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                
                <?php
                            }
                            echo '</div>';
                        }
                        
                    }

                ?>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-3">
                <a href="cateportal.php?categories=<?php echo $productcategoriesData?>">
                    <button id="viewAllBtn">View more contents</button>
                </a>
            </div>
        </div>
    </section>
    <br>
    <section class="breadcrumbs"> 
        <div class="row">
            <div class="col">
                <h4 class="fw-bold"><i class="bx bxl-dribbble"></i> View Comments.</h4>
            </div>
        </div>     
    </section>
    <br>
    <div class="container mb-4">
       <div class="row border">
           <div class="col-2 d-none d-md-block"></div>
           <div class="col text-center">
               <section class="commentBoxSection">
                    <?php include 'displaycomments.php'; ?>
               </section>
           </div>
       </div>
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
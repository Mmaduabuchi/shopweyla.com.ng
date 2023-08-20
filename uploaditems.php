<?php
    //start session
    session_start();
    
    //database connection
    require 'databaseconnection.php';

    //check users log
    if (!isset($_SESSION['userEmailSession'])) {
    //redirect the user
    header("location: index.php");
    }

    //empty variable
    $errorMsgText = $errorMsgName = $errorMsgPrice = $errorMsgImage = $successmsg = $productTypeErr = $ProductCategoriesErr = "";
    //check form if has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //getuser input
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productImage = $_FILES["productImage"]["name"];
        $productDescription = $_POST["productDescription"];
        $productType = $_POST["ProductModel"];
        $ProductCategories = $_POST["ProductCategories"];
        //get file temp name
        $prodctImageTmpName = $_FILES["productImage"]["tmp_name"];
       
        //validate the users input
        if (empty($productName) || ctype_space($productName) || is_numeric($productName) || !preg_match("/^[A-Z\d ]+$/i", $productName)) {
            //throw error
            $errorMsgName = "Only letters and white space allowed.";
        }else {
            if (empty($productPrice) || ctype_space($productPrice)) {
                //throw error                
                $errorMsgPrice = "Only letters and white space allowed.";
            }else {                
                if (empty($productImage)) {
                    //throw error
                    $errorMsgImage = "Invalid file format.";
                }else {
                    if (empty($productDescription) || ctype_space($productDescription)) {
                    //throw error
                    $errorMsgTexterrorMsgText = "Only letters and white space allowed.";
                    }else {
                        //check the file size
                        if ($_FILES["productImage"]["size"] > 20000000) {
                            $errorMsgImage = "Image size is larger than 20mb..";
                        }else {
                            if (empty($productType)) {
                                $productTypeErr = "Please Select Your Product Type.";
                            } else {
                                if (empty($ProductCategories)) {
                                    $ProductCategoriesErr = "Please Select Your Product Categorie.";
                                } else {
                                    //create an array with image extensions
                                    $extensions = array('png', 'jpg', 'jpeg', 'gif');
                                    //get the user input file type extension
                                    $productImageFileExtension = pathinfo($productImage, PATHINFO_EXTENSION);     
                                    //convert the image file extension to lower case
                                    $productEXEtolowercase = strtolower($productImageFileExtension);
                                    //check if the file extension is valid
                                    if (!in_array($productEXEtolowercase, $extensions)) {            
                                        //error warning
                                        $errorMsgImage = "File extention is invalid try (.png .jpg .jpeg)";
                                    }else {
                                        $rand = md5(uniqid().rand());
                                        $newname = $rand . "." . $productEXEtolowercase;
                                        //target the folder to insert the image
                                        $folderlocation = "productsImagesFolder/" . $newname;
                                        //generate products key id
                                        $productsKeyId = random_int(10000000, 99999999);
                                        $keyIdToString = strval($productsKeyId);
                                        //set payment date and time
                                        $getDateTime = date('d-m-y h:i:sa');
                                        //generate product key
                                        $productkey = rand();
                                        //hash the product key
                                        $productKeyHash = password_hash($productkey, PASSWORD_DEFAULT);
                                        //get user id key
                                        $sellerKeyId = $_SESSION['userkeyid'];
                                        //get user country
                                        $getUserCountry = "SELECT country FROM sellerstable WHERE userkey='$sellerKeyId' ";
                                        $queryCheck = mysqli_query($connection, $getUserCountry);
                                        $resultDataForCountry = mysqli_fetch_assoc($queryCheck);
                                        $data = $resultDataForCountry['country'];
                                        //insert into the database
                                        $insertDB = "INSERT INTO sellersproducts (productname, productprice, productimage, productdetails, productype, productcategories, country, productKeyId, productkey, sellerkeyid, datetime) VALUES ('$productName', '$productPrice', '$newname', '$productDescription', '$productType', '$ProductCategories', '$data', '$keyIdToString', '$productKeyHash', '$sellerKeyId', '$getDateTime')";
                                        //check query
                                        if (!mysqli_query($connection, $insertDB)) {
                                            //throw error
                                            $errmsg = "Can't upload your store product try again later..";
                                        }else {
                                            //move to folder
                                            if (move_uploaded_file($prodctImageTmpName, $folderlocation)) {
                                                $successmsg = "Store Product Successfully Uploaded..";
                                            }else {
                                                //throw error
                                                $errorMsg = "Opps an error occur..";
                                            }
                                        } 
                                    }
                                }
                            }        
                        }
                    }
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
        <title>Upload to your store in Shopweyla</title>
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

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <style>
            .productInput{
                margin-right: -0.4rem;
                background: white;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
            }
            #form{
                margin-left: 4px;
            }
            #labelText{
                font-weight: bold;
                font-family: Courier, monospace;
            }
            .uploadBtn{
                background-color: #0a2c3d;
                color: white;
                font-size: 16px;
                border-radius: 0.2rem;
            }

        </style>
    </head>
    <body>
        <!-- ======= Header ======= -->
        <?php
            include "header.php";
        ?>
        <br>

        <section class="breadcrumbs mt-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                <h2>Upload Products</h2>
                <ol>
                    <li><a href="account.php">Back</a></li>
                    <li>Upload</li>
                </ol>
                </div>
            </div>
        </section>

        <div class="row bg-light mt-5">
            <div class="col-2"></div>
            <div class="col mb-5">        
                <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="form" id="form">
                <label for=""  id="labelText">Upload store products.</label>
                <br>
                <div class="row">
                    <div class="col text-end fw-bold">
                    <span class="text-success">
                        <?php
                        echo $successmsg;
                        ?>
                    </span>
                    </div>
                </div>
                <br>
                <span class="text-danger fw-bold">
                    <?php
                    echo $errorMsgName;
                    ?>
                </span>
                <input type="text" name="productName" class="form-control p-3 productInput" placeholder="Enter Product Name" required>
                <br>
                <span class="text-danger fw-bold">
                    <?php
                    echo "<br>" . $errorMsgPrice;
                    ?>
                </span>
                <input type="tel" name="productPrice" class="form-control p-3 productInput" placeholder="Enter Product Price" required>
                <br>
                <label for="">Upload Product Image.</label>
                <span class="text-danger fw-bold">
                    <?php
                    echo "<br>" . $errorMsgImage;
                    ?>
                </span>
                <input type="file" name="productImage" class="form-control p-3" required>
                <br>
                <label for="">Choose Product Type.</label>
                <span class="text-danger fw-bold">
                    <?php
                    echo "<br>" . $productTypeErr;
                    ?>
                </span>
                <select name="ProductModel" class="form-control p-3">
                    <option value="BrandNewProduct">Brand New Product</option>
                    <option value="UsedProduct">Used Product</option>
                </select>
                <br>
                <label for="">Choose Product Categories.</label>
                <span class="text-danger fw-bold">
                    <?php
                    echo "<br>" . $ProductCategoriesErr;
                    ?>
                </span>
                <select name="ProductCategories" class="form-control p-3">
                    <option value="Fashion">Fashion</option>
                    <option value="Technology">Technology</option>
                    <option value="HomeGarden">Home & Garden</option>
                    <option value="Food">Food</option>
                    <option value="Books">Books</option>
                    <option value="ApparelAccessories">Apparel & Accessories</option>
                    <option value="ArtCrafting">Art & Crafting</option>
                    <option value="MusicalInstrument">Musical Instrument</option>
                    <option value="PetCare">Pet Care</option>
                    <option value="FlowersPlants">Flowers & Plants</option>
                    <option value="HealthWellness">Health & Wellness</option>
                    <option value="SportingGoods">Sporting Goods</option>
                    <option value="AutoMobile">Auto Mobile</option>
                </select>
                <br><br>
                <label for="">Describe Your Product Below...</label>
                <span class="text-danger fw-bold">
                    <?php
                    echo "<br>" . $errorMsgText;
                    ?>
                </span>
                <textarea name="productDescription" placeholder="Describe your product inside here..." class="form-control" cols="30" rows="10"></textarea>
                <div>                  
                    <button type="submit" class="mt-3 p-3 w-100 uploadBtn">Upload My Product
                      <i class="bi bi-send-check"></i>
                    </button>
                </div>
                </form>      
            </div>
            <div class="col-2"></div>
        </div>
        <br><br>

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
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
  $errorMsg = $error = $successmsg = "";
  //check form if has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //getuser input
    $shopname = $_POST["shopname"];
    $shopicon = $_FILES["shopicon"]["name"];
    $shopDescription = $_POST["shopDescription"];
    //get file temp name
    $shopTempName = $_FILES["shopicon"]["tmp_name"];    
    //validate the users input
    if (empty($shopname) || ctype_space($shopname)) {
      //throw error
      $errorMsg = "Only letters and white space allowed.";
    }else {
      if (empty($shopicon)) {
        //throw error
        $errorMsg = "Invalid file format.";
      }else {
        if (empty($shopDescription) || ctype_space($shopDescription)) {
          //throw error
          $errorMsg = "Only letters and white space allowed.";
        }else {
          //check the file size
          if ($_FILES["shopicon"]["size"] > 2000000) {
            $errorMsg = "Image size is larger than 2mb..";
          }else {
            //create an array with image extensions
            $extensions = array('.png','.jpg','.jpeg');
            //get the user input file type extension
            $shopIconFileExtension = pathinfo($shopicon, PATHINFO_EXTENSION);     
            //convert the image file extension to lower case
            $productEXEtolowercase = strtolower($shopIconFileExtension);
            //check if the file extension is valid
            if (in_array($productEXEtolowercase, $extensions)) {            
              //error warning
              $errorMsg = "File extention is invalid try (.png .jpg .jpeg)";
            }else {
              $rand = md5(uniqid().rand());
              $newname = $rand . "." . $productEXEtolowercase;
              //target the folder to insert the image
              $folderlocation = "shopImage/" . $newname;
            
              //set payment date and time
              $getDateTime = date('d-m-y h:i:sa');
              //get user id key
              $userKeyId = $_SESSION['userkeyid'];
              //get user phone number
              $userPhone = $_SESSION['userphoneSession'];
              //check if the user has a shop already
              $getShop = "SELECT * FROM shop WHERE userkey='$userKeyId' ";
              $checkquery = mysqli_query($connection, $getShop);
              //check if shop exists
              if (mysqli_num_rows($checkquery) > 0) {
                // throw error
                $error = "You already has a Shop.";
              }else {
                //get user country
                $getUserCountry = "SELECT country FROM sellerstable WHERE userkey='$userKeyId' ";
                $queryCheck = mysqli_query($connection, $getUserCountry);
                $resultDataForCountry = mysqli_fetch_assoc($queryCheck);
                $data = $resultDataForCountry['country'];
                //insert into the database
                $insertDB = "INSERT INTO shop (shopname, shopicon, shopdetails, userphone, country, userkey, timedate) VALUES ('$shopname', '$newname', '$shopDescription', '$userPhone', '$data', '$userKeyId', '$getDateTime')";
                //check query
                if (!mysqli_query($connection, $insertDB)) {
                  //throw error
                  $error = "There was a problem try again later..";
                }else {
                  //move to folder
                  if (move_uploaded_file($shopTempName, $folderlocation)) {
                    $successmsg = "Shop Created Successfully..";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I want to own a shop</title>

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

    <!-- CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
      
      #shopNameInput{
        padding: 0.8rem;
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
      .btn{
        border: 2px solid grey;
        border-left: none;
        padding: 0.5rem;
        background: #0a2c3d;
        color: white;
      }
      
      .btn2{
        /* border: 2px solid grey; */
        border: none; 
        border-radius: 0.3rem;
        padding: 0.5rem;
        background: #0a2c3d;
        color: white;
      }
    </style>
</head>
<body>
    <div class="row headerlogoholder">
        <div class="col m-4">
            <p class="fw-bold text-light">Shopweyla <i class="bx bxl-dribbble"></i></p>
        </div>
    </div>

    
    <section class="breadcrumbs mt-5">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Create Your Shop</h2>
          <ol>
            <li><a href="choosefile.php">Back</a></li>
            <li>Your shop</li>
          </ol>
        </div>
      </div>
    </section>

    <div class="row bg-light mt-5">
      <div class="col-2"></div>
      <div class="col mb-5">        
        <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="form" id="form">
          <label for=""  id="labelText">Get Started Create your Shop.</label>
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
              echo $errorMsg, $error;
            ?>
          </span>
          <input type="text" name="shopname" class="form-control" placeholder="Shop Name" id="shopNameInput" required>
          <br>
          <label for="">Upload Shop icon (Image)</label>
          <span class="text-danger fw-bold">
            <?php
              echo $errorMsg;
            ?>
          </span>
          <input type="file" name="shopicon" class="form-control" required>
          <br>
          <label for="">Describe Your Shop Below...</label>
          <span class="text-danger fw-bold">
            <?php
              echo $errorMsg;
            ?>
          </span>
          <textarea name="shopDescription" placeholder="Shop Description..." class="form-control" cols="30" rows="10"></textarea>
          <div class="text-end">                  
            <button type="submit" class="btn2 mt-3">FINISH
              <i class="bi bi-send-check"></i>
            </button>
          </div>
        </form>      
      </div>
      <div class="col-2"></div>
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


    <script src="assets/js/main.js"></script>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>      
      
</body>
</html>
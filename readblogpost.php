<?php
  //start session
  session_start();
  //database connection
  include 'databaseconnection.php';

  $postImage = $postTitle = $postTime = $postText = "";
  $ufrData = $_GET['ufr'];
  if (isset($ufrData)) {
    $database = "SELECT * FROM blogpost WHERE postkey='$ufrData'";
    $data = mysqli_query($connection, $database);
    $dataAsArr = mysqli_fetch_array($data);
    if (!$data) {
      # throw error msg...
      $error = "network error";
    } else {
      # get all data...
      $postImage = $dataAsArr['blogimage'];
      $postTitle = $dataAsArr['blogtitle'];
      $postText = $dataAsArr['blogtext'];
      $postTime = $dataAsArr['posttime'];
    }
       
  } else {
    # redirect the user...
    header("location: errorpage.php");
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
    <title>Read more contents on shopweyla.com.ng</title>
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
    
</head>
<body>
    <!-- ======= Header ======= -->
    <?php
        include "header.php";
    ?>
        <br><br><br>

    <!-- End Header -->
    <section class="breadcrumbs ">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Read Full Post</h2>
          <ol>
            <li><a href="blog.php">Blog</a></li>
            <li>full contents</li>
          </ol>
        </div>      
      </div>
    </section>
    <div class="row">
        <div class="col p-5"></div>
    </div>
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            <article class="entry">
              <div class="entry-img text-center">
                <img src="admin/blogImagesFolder/<?php echo $postImage; ?>" alt="blog Image" class="img-fluid">
              </div>
              <h2 class="entry-title">
                <a href="#.html"><?php echo $postTitle; ?></a>
              </h2>
              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="about.php">Shopweyla</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01"><?php echo $postTime; ?></time></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li>
                </ul>
              </div>
              <div class="entry-content">
                <p>
                  <?php
                    $filename = "admin/" .$postText;
                    $bolgFile = fopen("$filename", "r") or die("unable to open fileposts!");
                    echo fread($bolgFile, filesize($filename));
                    fclose($bolgFile);
                  
                  ?>
                </p>
              </div>
            </article>
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    
    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>

</body>
</html>
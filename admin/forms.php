<?php

  include "logout.php";
  //database connection
  include 'databaseconnect.php';

  //empty variables for data
  $errorMsg = $successmsg = $errorMsgPost = $errorMsgImage = $errorMsgTitle = "";
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    # run code
    $blogTitle = $_POST['blogTitle'];
    $blogImage = $_FILES['blogImage']['name'];
    $blogPost = $_POST['blogpost'];
    //get file temp name
    $blogImageTmpName = $_FILES["blogImage"]["tmp_name"];
    //target the folder to insert the image
    $folderlocation = "blogImagesFolder/" . basename($blogImage);

    //validate user inputs
    if (empty($blogTitle) || ctype_space($blogTitle) || is_numeric($blogTitle)) {
      # throw error
      $errorMsgTitle = "Only letters and white space allowed.";
    } else {
      if (empty($blogPost) || ctype_space($blogPost)) {
        # throw error
        $errorMsgPost = "Only letters and white space allowed.";
      } else {
        if (empty($blogImage)) {
          # throw error
          $errorMsgImage = "Invalid file format.";
        } else {
          //check the file size
          if ($_FILES["blogImage"]["size"] > 20000000) {
            $errorMsgImage = "Image size is larger than 20mb..";
          }else {
            //create an array with image extensions
            $extensions = array('.png', '.jpg', '.jpeg');
            //get the user input file type extension
            $blogImageFileExtension = pathinfo($blogImage, PATHINFO_EXTENSION);     
            //convert the image file extension to lower case
            $blogEXEtolowercase = strtolower($blogImageFileExtension);
            //check if the file extension is valid
            if (in_array($blogEXEtolowercase, $extensions)) {            
              //error warning
              $errorMsgImage = "File extention is invalid try (.png .jpg .jpeg)";
            } else {
              //generate post key id
              $postkey = md5(uniqid().rand());
              //set payment date and time
              $getDateTime = date('d-m-y h:i:sa');
              # code...
              function random_string($len_of_string){
                  $str_result = "abcdefghijklmnopqrstuvwxyz";
                  return substr(str_shuffle($str_result), 0, $len_of_string);
              }
              $filename = random_string(20).".txt";
              $file = fopen("$filename","w") or die("unable to open file!");
              fwrite($file, $blogPost);
              fclose($file);

              //insert into the database
              $insertDB = "INSERT INTO blogpost (blogtitle, blogimage, blogtext, posttime, postkey) VALUES ('$blogTitle', '$blogImage', '$filename', '$getDateTime', '$postkey')";
              //check query
              if (!mysqli_query($connection, $insertDB)) {
                  //throw error
                  $errorMsgPost = "Can't upload your blog post try again later..";
              }else {
                //move to folder
                if (move_uploaded_file($blogImageTmpName, $folderlocation)) {
                  $successmsg = "Blog Post Successfully Uploaded..";
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
  
  
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin Panel Shopweyla</title>
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="index.php">Shopweyla</a></h1>
    </div>
    <div class="logo-icon text-center">
      <a href="index.php" title="logo"><img src="assets/images/logo.png" alt="logo-icon"> </a>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active">
          <a href="index.php">
            <i class="fa fa-tachometer"></i>
            <span> Dashboard</span>
          </a>
        </li>
        <li>
          <a href="blocks.php">
            <i class="fa fa-th"></i> 
            <span>Admin Board</span>
          </a>
        </li>
        <li>
          <a href="forms.php">
            <i class="fa fa-file-text"></i> 
            <span>upload contents</span>
          </a>
        </li>
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <div class="navbar user-panel-top">
        <div class="search-box">
          <form action="#search-results.html" method="get">
            <input class="search-input" placeholder="Search Here..." type="search" id="search">
            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
          </form>
        </div>
        
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                  aria-expanded="false">
                  <div class="profile_img">
                    <img src="assets/images/profileimg.jpg" class="rounded-circle" alt="" />
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name">Emmanuel</h5>
                    <span class="status ml-2">Available</span>
                  </li>
                  <li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </li>
                  <li> <a href="#"><i class="lnr lnr-cog"></i>Setting</a> </li>
                  <li class="logout"> <a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
<!-- main content start -->
<div class="main-content">

    <!-- content -->
    <div class="container-fluid content-top-gap">

        <!-- breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb my-breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
        <!-- //breadcrumbs -->
        <!-- forms -->
        <section class="forms">
            <!-- forms 1 -->
            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Blog post <span></span></h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label class="input__label">Blog Title 
                              <span class="text-danger"> <?php echo " " . $errorMsgTitle?> </span>
                            </label>
                            <input type="text" name="blogTitle" class="form-control input-style" placeholder="Enter blog title" required>
                        </div>
                        <div class="form-group">
                          <label class="input__label">Blog Image 
                            <span class="text-danger"> <?php echo " " . $errorMsgImage?> </span>
                          </label>
                          <input type="file" name="blogImage" class="form-control input-style" required>
                        </div>
                        <div class="form-group">
                          <label class="input__label">Blog Post
                            <span class="text-danger"> <?php echo " " . $errorMsgPost?> </span>
                          </label>
                          <textarea name="blogpost" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <label class="text-success fw-bold text-center">
                          <span> <?php echo " " . $successmsg?> </span>
                        </label>
                        <button type="submit" class="btn btn-primary btn-style mt-4 w-100">Upload Blog Post Here</button>
                    </form>
                </div>
            </div>
            <!-- //forms 1 -->           
        </section>
    </div>
</div>
<!-- main content end-->
</section>
<!--footer section start-->
<footer class="dashboard">
  <p>&copy 2020 . All Rights Reserved | Design by <a href="#" target="_blank"
      class="text-primary">picanki.tech.hub.com</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>

<!-- chart js -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/utils.js"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="assets/js/bar.js"></script>
<script src="assets/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="assets/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>


</body>

</html>
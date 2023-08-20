<?php

  include "logout.php";
  
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin Panel Shopweyla</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
  <style>
    .searchinput{
      padding: 0.7rem;
      font-weight: bold;
      border: 1px solid #0a2c3d;
    }
    .searchBtn{
      padding: 0.7rem;
      font-weight: bold;
      margin: -1%;
      background: #0a2c3d;
      color: white;
      border: 1px solid #0a2c3d;
    }
  </style>
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
        <div class="profile_details">
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                aria-expanded="false">
                <div class="profile_img">
                  <img src="assets/images/profileimg.jpg" class="rounded-circle" alt="profile image" />
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
    <!--notification menu end -->
  </div>
<div class="main-content">
  <!-- content -->
  <div class="container-fluid content-top-gap">
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">user management panel</li>
      </ol>
    </nav>

    <div class="cards__heading">
      <h3>Welcome to Admin Board</h3>
    </div>

    <div class="card card_border p-lg-5 p-3 mb-4">
      <br>

      <div class="row">
        <div class="col text-center">
          <form action="userSearchResult.php" name="form" method="post">
            <input type="text" name="usersearch" placeholder="Looking for a user" class="searchinput" required>
            <button type="submit" class="searchBtn">look here</button>
          </form>
        </div>
      </div>
      
    </div>

    <div class="card card_border p-lg-5 p-3 mb-4">
      
      <h1>All Shopweyla Sellers</h1>
      <br><br>

      <div class="row">
        <div class="col">
          <?php include 'sellers.php'; ?>
        </div>
      </div>
      
    </div>
  </div>

</div>
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
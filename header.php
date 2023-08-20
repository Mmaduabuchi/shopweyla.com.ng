<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">
    
          <div class="logo">
            <h1 class="text-light"><a href="index.php"><span>Shopweyla</span></a></h1>
          </div>
    
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="active " href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="account.php">Account</a></li>             
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="categories.php">Categories</a></li>
              <li><a href="marketplace.php">Market</a></li>
              <li><a href="search.php">Search for Products</a></li>
              <li><a href="marketplace.php">Search for Stores</a></li>
              <!-- <li class="d-none d-md-block"><br><br><br></li> -->
              <li><a href="blog.php">SiteBlog</a></li>
              <li><a href="settings.php">Settings</a></li>
              <li id="signBtn"><a href="signin.php">Login</a></li>
              <li id="logoutBtn"><a href="logout.php">Log Out</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
    
        </div>
      </header>
</body>
</html>

<?php
  if (isset($_SESSION['userEmailSession'])) {
    echo '    
      <script>
        var btn = document.querySelector("#signBtn");
        var logoutBtn = document.getElementById("logoutBtn");
        btn.style.display = "none";
        logoutBtn.style.display = "block";
      </script>
    ';
  }else {
    echo '    
      <script>
        var btn = document.querySelector("#signBtn");
        var logoutBtn = document.getElementById("logoutBtn");
        btn.style.display = "block";
        logoutBtn.style.display = "none";
      </script>
    ';
  }
  
?>
                  

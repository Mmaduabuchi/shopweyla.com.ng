<?php
  //start session
  session_start();  
  
  //database connection
  require 'databaseconnection.php';

  //get userid
  $userid = $_GET['userid'];

  //empty variable
  $errorMsg = $successMsg = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      # get user inputs
      $password = $_POST['reset'];
      $passwordConfirm = $_POST['resetpassword'];
      
      //validate user inputs
      if (empty($password) || empty($passwordConfirm)) {
          # throw error msg...
          $errorMsg = "Password is empty..";
      } else {
            # continue
            if ($password !== $passwordConfirm) {
                # throw error msg...
                $errorMsg = "Password do not match, Try again..";
            } else {
                # continue
                //hash user password for security reason
                $hashPassword = password_hash($passwordConfirm, PASSWORD_DEFAULT);
                //update database
                $db = "UPDATE sellerstable SET password = '$hashPassword' WHERE userkey = '$userid'";
                $result = mysqli_query($connection, $db);
                if (!$result) {
                    # throw error msg...
                    $errorMsg = "network connection error try again.";
                } else {
                    # continue...
                    $successMsg = "Password changed successfully.";
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
    <title>Reset password</title>
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

    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="row headerlogoholder mb-5">
        <div class="col m-4">
           <p class="fw-bold text-light"> <a href="index.php" style="color: white;">Shopweyla Reset password<i class="bx bxl-dribbble"></i> </a> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-1 col-md-2"></div>
        <div class="col">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <input type="password" name="reset" placeholder="Enter New Password" class="p-3 form-control" required>
                <input type="password" name="resetPassword" placeholder="Confirm New Password" class="p-3 form-control mt-2" required>
                <br>
                <span class="text-danger"><?php echo $errorMsg?></span>
                <span class="text-success"><?php echo $successMsg?></span>
                <button type="submit" class="w-100 p-3 btn btn-primary mt-4">Reset</button>
            </form>
        </div>
        <div class="col-1 col-md-2"></div>
    </div>
    
</body>
</html>
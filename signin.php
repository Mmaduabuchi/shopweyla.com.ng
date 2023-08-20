<?php
    //start session
    session_start();

    
    //check users log
    if (isset($_SESSION['userEmailSession'])) {
        //redirect the user
        header("location: index.php");
    }

    //database connection
    require 'databaseconnection.php';

    //error message
    $errMsg = "";
    //check if the form have been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //get users inputs
        $email = $_POST['email'];
        $password = $_POST['password'];

        $selectData = "SELECT * FROM sellerstable WHERE email = '$email' ";
        $checkResult = mysqli_query($connection, $selectData);
        $dataAsArr = mysqli_fetch_assoc($checkResult);
        if (!$checkResult) {
            $errMsg = "an error occur";
        }else {
            if ($dataAsArr == "") {
                $errMsg = "Invalid Email!";
            }else{
                $accounttype = $dataAsArr['accounttype'];
                if ($accounttype == 'suspended') {
                    //throw error
                    $errMsg = "Your account has been suspended.";
                } else {
                    $passwordFetchData = $dataAsArr['password'];
                    if (password_verify($password, $passwordFetchData)) {
                        # code...
                        if ($email == $dataAsArr['email'] && $dataAsArr['role'] == '001') {
                            $_SESSION['userEmailSession'] = $email;
                            $_SESSION['userphoneSession'] = $dataAsArr['phone'];
                            $_SESSION['userkeyid'] = $dataAsArr['userkey'];
                            $_SESSION['password'] = $passwordFetchData;
                            $_SESSION['userRoleSession'] = $dataAsArr['role'];
                            // $arr = explode('@', $_SESSION['userEmailSession']);
                            header("location: admin/index.php");
                        }elseif ($email == $dataAsArr['email'] && $dataAsArr['role'] == '002') {
                            $_SESSION['userEmailSession'] = $email;
                            $_SESSION['userRoleSession'] = $dataAsArr['role'];
                            $_SESSION['userphoneSession'] = $dataAsArr['phone'];
                            $_SESSION['userkeyid'] = $dataAsArr['userkey'];
                            $_SESSION['password'] = $passwordFetchData;
                            header("location: account.php");
                        }else {
                            $errMsg = "Invalid Email or Password!";
                        }
                    }else{
                        //throw error
                        $errMsg = "incorrect password.";
                    }
                }             
            }
        }
        //close connection
        mysqli_close($connection);
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
    <title>Login into your  Account</title>  
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
    <link rel="stylesheet" media="screen and (min-width: 768px)" href="media@768px.css">
    <link rel="stylesheet" media="screen and (max-width: 1024px)" href="media@768px.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="loginBodyPage">
    <div class="row">
        <div class="col-1 col-md-2"></div>
        <div class="col mt-5">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-12"></div>
                        <div class="col">
                            <h3 class="text-center loginText fw-bold">Shopweyla.com.ng</h3>
                            <h5 class="text-center loginText fw-bold">Yap! Kindly Login below...</h5>
                            <br><br>
                            <span class="text-center fw-bold text-light">LOGIN HERE</span>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="form" id="fromcontainer" method="post">
                                <br>
                                <span class="text-danger">
                                    <?php
                                        echo $errMsg;
                                    ?>
                                </span>
                                <div class="inputHolder">
                                    <i class="bx bx-mail-send bxicon"></i>                                    
                                    <input type="email" name="email" placeholder="Email" id="userinput" class="p-3 p-lg-4">
                                </div>
                                <div class="inputHolder">
                                   <i class="bx bxs-key bxicon"></i>                                    
                                   <input type="password" name="password" placeholder="Password" id="userinput" class="p-3 p-lg-4">
                                </div>
                                <br>
                                <div class="text-center fw-bold">
                                    <a href="resetpassword.php" id="forgotText">
                                        <p>Forgotten Password?</p>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn signupbtn p-3 p-lg-3 w-100 fw-lg-bold">LOGIN <i class="bx bxl-dribbble"></i></button>
                                    </div>
                                </div>                                
                                <div class="text-center loginText fw-bold">
                                    <p>Don't have an account? <a href="signup.php" class="registerlink">Register</a> </p>
                                </div> 
                            </form>
                        </div>
                        <div class="col-12"></div>
                    </div>                    
                </div>
            </div>            
        </div>
        <div class="col-1 col-md-2"></div>
    </div>

    <br><br><br><br>

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
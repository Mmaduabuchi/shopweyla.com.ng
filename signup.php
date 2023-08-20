<?php
    //start session
    session_start();

    //database connection
    require 'databaseconnection.php';
    
    //empty error variable
    $usernameErr = $middlenameErr = $UserEmailErr = $countryErr = $passwordErr = $phoneNumberErr = $confirmPasswordErr = $termsErr = "";
    //success message
    $success = "";
    //check form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //get form values
        $username = $_POST["username"];
        $middlename = $_POST["middlename"];
        $phoneNumber = $_POST["phone"];
        $UserEmail = $_POST["email"];
        $UserCountry = $_POST["country"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPasswrd"];
        // $terms = $_POST["agreed"];
        //validate the users inputs
        if (empty($username) ||  ctype_space($username) || is_numeric($username) || !preg_match("/^[A-Z\d ]+$/i",$username)) {
            //throw error
            $usernameErr = "Only Letters and white space allowed";
        }else {
            if (empty($middlename) || ctype_space($middlename) || is_numeric($middlename) || !preg_match("/^[A-Z\d ]+$/i",$middlename)) {
                //throw error
                $middlenameErr = "Only Letters and white space allowed";
            }else {
                if (empty($phoneNumber) || ctype_space($phoneNumber)) {
                    //throw error
                    $phoneNumberErr = "Invalid Phone Number";
                }else {
                    if (empty($UserEmail) || ctype_space($UserEmail) || !filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
                        //throw error
                        $UserEmailErr = "Invalid Email Format";
                    }else {
                        //search for email
                        $emailsearch = "SELECT email FROM sellerstable WHERE email = '$UserEmail' ";
                        $checkResult = mysqli_query($connection, $emailsearch);
                        if (!$checkResult) {
                            echo "unknown error occur please try again letter.";
                        }else {
                            if (mysqli_num_rows($checkResult) > 0) {
                                # throw error msg...
                                $UserEmailErr = "Email already exist..";
                            } else {
                                # continue validating user data
                                if (empty($UserCountry)) {
                                    # throw error msg...
                                    $countryErr = "Country can't be empty.";
                                } else {
                                    if (empty($password) || ctype_space($password)) {
                                        //throw error
                                        $passwordErr = "Invalid Password or not strong";
                                    }else {
                                        if (empty($confirmPassword) || ctype_space($confirmPassword) || $password !== $confirmPassword) {
                                            //throw error
                                            $confirmPasswordErr = "Password don't match";
                                        }else {
                                            if (!isset($_POST["agreed"])) {
                                                //throw error
                                                $termsErr = "Please agree to our Terms and Conditions.";
                                            }else {
                                                //hash user password for security reason
                                                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                                                //create date and time
                                                $dateTime = date("d-m-y h:i:sa");
                                                //create user key
                                                $userkey = rand();
                                                $userKeyHash = password_hash($userkey, PASSWORD_DEFAULT);
                                                $userkeyid = "ABC-" . $userKeyHash;
                                                //send to database
                                                $insertData = "INSERT INTO sellerstable (username, middlename, phone, email, country, password, date, role, userkey) VALUES ('$username', '$middlename', '$phoneNumber', '$UserEmail', '$UserCountry', '$hashPassword', '$dateTime', '002', '$userkeyid')";
                                                $runQuery = mysqli_query($connection, $insertData);
                                                
                                                //check if sent successfully
                                                if (!$runQuery){
                                                    //throw error
                                                    $usernameErr = "An error occur while uploading your data";
                                                }else {
                                                    $success = "Congratulations, You have successfully been registered, <a href='signin.php' class='fw-bold text-light'> LOGIN</a>";
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
        //close connection
        mysqli_close($connection);
    }
    //check users log
    if (isset($_SESSION['userEmailSession'])) {
        //redirect the user
        header("location: index.php");
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
    <title>Register as a shopweyla seller/Member</title>  
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
        #signupImageLogo{
          width: 40%;
        }
    </style>
</head>
<body class="signinbodypage">
    <div class="row">
        <div class="col-1 col-md-2"></div>
        <div class="col mt-5">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="assets/img/logoweyla.png" alt="site logo" id="signupImageLogo">
                </div>
                <div class="col">
                    <h5 class="text-center loginText fw-bold">Yap! Kindly Register below...</h5>
                    <br><br>
                    <span class="text-center fw-bold text-light">REGISTER HERE</span>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="text-center" name="form" id="fromcontainer" method="post">
                        <span class="text-success fw-bold">
                            <?php
                                echo $success;
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php
                                echo $usernameErr;
                            ?>
                        </span>
                        <input type="text" name="username" placeholder="First Name" id="userinput" class="p-3 p-lg-4 signinput" required>
                        <br>
                        <span class="text-danger">
                            <?php
                                echo $middlenameErr;
                            ?>
                        </span>
                        <input type="text" name="middlename" placeholder="Last Name" id="userinput" class="p-3 p-lg-4 signinput" required>
                        <br>
                        <span class="text-danger">
                            <?php
                                echo $phoneNumberErr;
                            ?>
                        </span>
                        <input type="tel" name="phone" placeholder="Phone" id="userinput" maxlength="15" class="p-3 p-lg-4 signinput" required>
                        <br>
                        <span class="text-danger">
                            <?php
                                echo $UserEmailErr;
                            ?>
                        </span>
                        <input type="email" name="email" placeholder="Email" id="userinput" class="p-3 p-lg-4 signinput" required>
                        <br>
                        <span class="text-danger">
                            <?php
                                echo $countryErr;
                            ?>
                        </span>
                        <select name="country" id="userinput" class="p-3 p-lg-4 signinput">
                            <option value="Nigeria">Nigeria</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Togo">Togo</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Angola">Angola</option>
                            <option value="Ehiopia">Ehiopia</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Chad">Chad</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Ivory Coast">Ivory Coast</option>
                            <option value="Congo">Democratic Republic of Congo</option>
                            <option value="Mali">Mali</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Bukina Faso">Bukina Faso</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Liberia">Liberia</option>
                        </select>
                        <br>
                        <span class="text-danger">
                            <?php
                                echo $passwordErr;
                            ?>
                        </span>
                        <input type="password" name="password" placeholder="Password" id="userinput" class="p-3 p-lg-4 signinput" required>
                        <br>
                        <span class="text-danger">
                            <?php
                                echo $confirmPasswordErr;
                            ?>
                        </span>
                        <input type="password" name="confirmPasswrd" placeholder="Confirm Password" id="userinput" class="p-3 p-lg-4 signinput" required>
                        <br>
                        <div class="row">
                            <div class="col fw-bold text-light">
                            <span class="text-danger">
                                <?php
                                   echo $termsErr;
                                ?>
                            </span>
                            <br>
                              <input type="checkbox" name="agreed" required>
                              <span>Agree to Terms and Condition.</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn signupbtn p-3 p-lg-4 w-100">REGISTER <i class="bx bxl-dribbble"></i></button>
                            </div>
                        </div>                                
                        <div class="text-center loginText fw-bold">
                            <p>I'm already a member <a href="signin.php" class="registerlink">Login</a> </p>
                        </div>
                    </form>
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="jquery/jqueryCodeApp.js"></script>
</body>
</html>
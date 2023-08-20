<?php
   //connect to the database
   require "databaseconnection.php";

   //get user data
   $userSearchInput = mysqli_real_escape_string($connection, $_POST["userSearchResult"]);

   if (empty($userSearchInput) || is_numeric($userSearchInput) || !preg_match("/^[A-Z\d ]+$/i",$userSearchInput)) {
        echo " <p class='resultHolder text-center mt-4 fw-bold'> only letters and white space allowed. </p> ";          
   }else {
       $dbQuery = "SELECT * FROM shop WHERE shopname = '$userSearchInput' ";
       $QueryResult = mysqli_query($connection, $dbQuery);
       if (!$QueryResult) {
          
          echo " <p class='resultHolder text-center mt-4 fw-bold'> Sorry we can't find your result. </p> ";
       }else {
           if (mysqli_num_rows($QueryResult) > 0) {
               while ($result = mysqli_fetch_array($QueryResult)) {
                   echo ' 
                     <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">                  
                      <div class="icon-box icon-box-pink">
                        <div class="">
                          <img src="shopImage/' . $result['shopicon'] . ' " alt="shop logo"  class="shopLogo">
                        </div>
                        <br>
                        <h4 class="title">' . $result['shopname'] . ' " Store" </h4>
                        <p class="description">' . $result['shopdetails'] . '</p>
                        <p>
                    <b>Contact:: </b>' . $result['userphone'] . '
                  </p>
                  <div class="row">
                    <div class="col text-end">
                      <button class="custombtn2 p-2 w-100 fw-bold">
                        <a href="WelcomeToMyShop.php?shopidkey=' . $result['userkey'] . ' " style="color: #eead20">Goto Store
                          <i class="bi bi-arrow-right"></i>
                        </a>
                      </button>
                    </div>
                  </div>            
                </div> 
              </div>';
               }
           }else {
              echo " <p class='resultHolder text-center mt-4 fw-bold'> Sorry no result found. </p> ";
           }
       }
   }


?>
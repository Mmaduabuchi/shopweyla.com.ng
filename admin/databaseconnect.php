<?php

//connect to the server
$connection = mysqli_connect("localhost","root","","shopweyla");
//check server connection
if (!$connection) { 
  die("connection failed:" . mysqli_connect_error());
}


?>
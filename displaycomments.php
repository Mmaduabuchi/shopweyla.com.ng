<?php
    $productkey = $_GET['productkey'];
   //connect to db
   require "databaseconnection.php";

   $dbquery = "SELECT * FROM productcomments WHERE productkey = '$productkey'";
   $result = mysqli_query($connection, $dbquery);
   $checkData = mysqli_num_rows($result);
    if (!$result) {
       echo "an error occur";
    } else {
       if ($checkData < 1) {
           echo "<p>No comment found, please be the first to comment on this product.</p>";
       } else {
            echo "<table>
            <tr>
                <th>Names</th>
                <th>Comments</th>
                <th>Posted Date/Time</th>             
            </tr>";
            while ($rows = mysqli_fetch_array($result)) { 
                    echo "
                    <tr>
                        <td>".$rows["name"]."</td>
                        <td>".$rows["comment"]."</td>
                        <td>".$rows["time"]."</td>
                    </tr>";              
            }
            echo "</table>";
       }     
         
    }
   

?>
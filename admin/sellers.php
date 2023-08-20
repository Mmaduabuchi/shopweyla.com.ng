<?php   

    //database connection
    include 'databaseconnect.php';
  
    //get users
   $db = "SELECT * FROM sellerstable";
   $result = mysqli_query($connection, $db);
   if (!$result) {
       echo "<h4>error found..</h4>";
   }else {
       if (mysqli_num_rows($result) > 0) {  


            ?>

                <table border=1>
                    <tr class="text-center">
                        <th>Username</th>
                        <th>Middlename</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Reg/Date</th>
                        <th>ResistUser</th>
                    </tr>
           
            <?php


           while ($data = mysqli_fetch_array($result)) {


                ?>

                    <tr>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['middlename']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td class="text-center">
                            <a href="edituser.php?regno=<?php echo $data['userkey']?>">
                                <button class="btn btn-primary">Modify</button>
                            </a>
                        </td>
                    </tr>

                <?php
           }

            ?>

                </table>

            <?php

       } else {
          echo "<h4>nothing found..</h4>";
       }
   }



?>
<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      // Check connection
      if (mysqli_connect_errno())
   {
      echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
     $sql="SELECT * FROM Food ORDER BY fname";
     $result = mysqli_query($con,$sql);
     // Print the data from the table row by row
     echo '<table>
     <tr>
        <th>Dish</th>
        <th>Dietary restrictions</th>
        <th>Price</th>
     </tr>';
     while($row = mysqli_fetch_array($result)) {
       echo '
            <tr>
               <td>'.$row['fname'].'</td>
               <td>'.$row['diet_res'].'</td>
               <td>'.$row['price'].'</td>
            </tr>';
          // echo $row['fname'];
          // echo " " . $row['diet_res'];
          // echo " " . $row['price'];
          // echo "<br>";
        }

        echo '
        </table>';
     mysqli_close($con);
?>

<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " .
mysqli_connect_error();
 }
 // Form the SQL query (a DELETE query)
 $sql="DELETE FROM Customer WHERE phone_num = '$_POST[phone_num]'";
 $sql2="DELETE FROM Eat_at WHERE phone_num = '$_POST[phone_num]'";
 $sql3="DELETE FROM Serve WHERE serve_id = '$_POST[serve_id]'";

 if (!mysqli_query($con,$sql))
 {
 echo $USERNAME;
 die('Error: ' . mysqli_error($con));
 }
 if (!mysqli_query($con,$sql2))
 {
 echo $USERNAME;
 die('Error: ' . mysqli_error($con));
 }
 if (!mysqli_query($con,$sql3))
 {
 echo $USERNAME;
 die('Error: ' . mysqli_error($con));
 }
 echo "Customer deleted successfully!"; // Output to user
 mysqli_close($con);
?>
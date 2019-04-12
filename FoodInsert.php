<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   // Check connection
   if (mysqli_connect_errno())
{
     echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
// Form the SQL query (an INSERT query)
$sql="INSERT INTO Food (fname, diet_res, price)
VALUES ('$_POST[fname]','$_POST[diet_res]','$_POST[price]')";
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   echo "1 record added"; // Output to user
   mysqli_close($con);
?>

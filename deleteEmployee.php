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
 $sql="DELETE FROM Employee WHERE emp_id = '$_POST[emp_id]'";
 $sql2="DELETE FROM Hire WHERE emp_id = '$_POST[emp_id]'";

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
 echo "Employee deleted successfully!"; // Output to user
 mysqli_close($con);
?>
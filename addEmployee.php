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
 $sql="INSERT INTO Employee (emp_id, ename, wage)
 VALUES
 ('$_POST[emp_id]','$_POST[ename]','$_POST[wage]')";
 $sql2="INSERT INTO Hire (rest_id, emp_id)
 VALUES
 ('$_POST[rest_id]','$_POST[emp_id]')";

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
 echo "Employee added successfully!"; // Output to user
 mysqli_close($con);
?>
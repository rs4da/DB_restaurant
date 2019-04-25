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
 $sql="INSERT INTO Customer (phone_num, c_table, cname, bill_id)
 VALUES
 ('$_POST[phone_num]','$_POST[c_table]','$_POST[cname]','$_POST[bill_id]')";

 $sql2="INSERT INTO Eat_at (phone_num, rest_id)
 VALUES
 ('$_POST[phone_num]','$_POST[rest_id]')";

 $sql3="INSERT INTO Serve (serve_id, emp_id, phone_num)
 VALUES
 ('$_POST[serve_id]','$_POST[emp_id]','$_POST[phone_num]')";

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
 echo "Customer added successfully!"; // Output to user
 mysqli_close($con);
?>
<?php
   header("Content-type: text/csv");
   header('Content-disposition: attachment; filename=hire.csv');
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
   $sql="SELECT * FROM Hire ORDER BY rest_id";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/hire.csv', 'w');
   fputcsv($output, array('Restaurant ID', 'Employee ID'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, array($row['rest_id'], $row['emp_id']));
   }

   readfile("/tmp/hire.csv");
?>

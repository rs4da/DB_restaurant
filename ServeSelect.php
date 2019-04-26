<?php
   header("Content-type: text/csv");
   header('Content-disposition: attachment; filename=serve.csv');
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
   $sql="SELECT * FROM Serve ORDER BY serve_id";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/serve.csv', 'w');
   fputcsv($output, array('Serve ID', 'Employee ID', 'Phone Number'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, array($row['serve_id'], $row['emp_id'], $row['phone_num']));
   }

   readfile("/tmp/serve.csv");
?>

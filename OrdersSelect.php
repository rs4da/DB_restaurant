<?php
   header("Content-type: text/csv");
   header('Content-disposition: attachment; filename=report.csv');
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
   $sql="SELECT * FROM Orders ORDER BY order_id";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/report.csv', 'w');
   fputcsv($output, array('Order ID', 'Food name', 'Phone number'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, array($row['order_id'], $row['food'], $row['phone_num']));
   }

   readfile("/tmp/report.csv");
?>

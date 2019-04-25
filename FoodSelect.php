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
   $sql="SELECT * FROM Food ORDER BY fname";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/report.csv', 'w');
   fputcsv($output, array('Dish name', 'Dietary rest', 'Price'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, $row);
   }

   readfile("/tmp/report.csv");
?>

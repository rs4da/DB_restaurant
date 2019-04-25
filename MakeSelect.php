<?php
   header("Content-type: text/csv");
   header('Content-disposition: attachment; filename=make.csv');
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
   $sql="SELECT * FROM Make ORDER BY reserv_id";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/make.csv', 'w');
   fputcsv($output, array('Reservation ID', 'Table'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, array($row['reserv_id'], $row['c_table']));
   }

   readfile("/tmp/make.csv");
?>

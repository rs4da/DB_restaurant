<?php
   header("Content-type: text/csv");
   header('Content-disposition: attachment; filename=eat.csv');
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
   $sql="SELECT * FROM Eat_at ORDER BY phone_num";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/eat.csv', 'w');
   fputcsv($output, array('Phone Number', 'Restaurant ID'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, array($row['phone_num'], $row['rest_id']));
   }

   readfile("/tmp/eat.csv");
?>

<?php
   header("Content-type: text/csv");
   header('Content-disposition: attachment; filename=Reservation.csv');
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
   $sql="SELECT * FROM Reservation ORDER BY reserv_id";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/Reservation.csv', 'w');
   fputcsv($output, array('Reservation ID', 'Customer Name', 'Party Size', 'Date', 'Time'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, array($row['reserv_id'], $row['cname'], $row['party_size'], $row['rdate'], $row['rtime']));
   }

   readfile("/tmp/Reservation.csv");
?>

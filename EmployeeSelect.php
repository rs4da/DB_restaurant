<?php
   header("Content-type: text/csv");
   header('Content-disposition: attachment; filename=employee.csv');
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }
     // Form the SQL query (a SELECT query)
   $sql="SELECT * FROM Employee ORDER BY emp_id";
   $results = mysqli_query($con,$sql);
   $output = fopen('/tmp/employee.csv', 'w');
   fputcsv($output, array('Employee ID', 'Employee Name', 'Wage'));
   while ($row = mysqli_fetch_array($results)){
     fputcsv($output, array($row['emp_id'], $row['ename'], $row['wage']));
   }

   readfile("/tmp/employee.csv");
?>

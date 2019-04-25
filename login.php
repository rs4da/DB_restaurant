<?php
    include_once("./library.php"); // To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " .
    mysqli_connect_error();
    }
    
    // Form the SQL query (a DELETE query)
    $sql="DELETE FROM Orders WHERE order_id = '$_POST[order_id]'";

    if (!mysqli_query($con,$sql))
    {
    echo $USERNAME;
    die('Error: ' . mysqli_error($con));
    }
    
    echo "1 record deleted"; // Output to user
    
    mysqli_close($con);
?>
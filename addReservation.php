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
    $sql="INSERT INTO Reservation (rest_id, reserv_id, cname, party_size, rdate, rtime)
    VALUES
    ('$_POST[rest_id]','$_POST[reserv_id]','$_POST[cname]',
        '$_POST[party_size]','$_POST[rdate]','$_POST[rtime]')";

    if (!mysqli_query($con,$sql))
    {
    echo $USERNAME;
    die('Error: ' . mysqli_error($con));
    }
    
    echo "1 record added"; // Output to user
    
    mysqli_close($con);
?>
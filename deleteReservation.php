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
    $sql="DELETE FROM Reservation WHERE  
        reserv_id = '$_POST[reserv_id]' AND 
        cname = '$_POST[cname]' AND
        party_size = '$_POST[party_size]' AND
        rdate = '$_POST[rdate]' AND
        rtime = '$_POST[rtime]'";

    $sql2="DELETE FROM Make WHERE 
        reserv_id = '$_POST[reserv_id]' AND
        c_table = '$_POST[c_table]'";

    if (!mysqli_query($con,$sql))
    {
    echo $USERNAME;
    die('Error: ' . mysqli_error($con));
    }

    if (!mysqli_query($con,$sql2))
    {
    echo $USERNAME;
    die('Error: ' . mysqli_error($con));
    }
    
    echo "1 record deleted"; // Output to user
    
    mysqli_close($con);
?>
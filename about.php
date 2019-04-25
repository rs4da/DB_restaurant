<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<div>
<center>
 <h1>About Tavola</h1>
</center>
 <form action="addLocation.php" method="post">
 <p><b>Add a new restaurant location: </b></p>
 <p>Enter restaurant id: <input type="text" name="rest_id" /></p>
 <p>Enter restaurant address: <input type="text" name="address" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteLocation.php" method="post">
 <p><b>Delete a restaurant location:</b></p>
 <p>Enter restaurant id: <input type="text" name="rest_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>Current locations: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Restaurant');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Restaurant ID</th>
                <th>Restaurant Address</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['rest_id'].'</td>
                <td>'.$row['address'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>
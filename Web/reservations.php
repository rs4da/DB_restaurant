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

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="SELECT * FROM Reservation ORDER BY reserv_id";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Reservation ID</th>
                <th>Customer Name</th>
                <th>Party Size</th>
                <th>Date</th>
                <th>Time</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['reserv_id'].'</td>
                <td>'.$row['cname'].'</td>
                <td>'.$row['party_size'].'</td>
                <td>'.$row['rdate'].'</td>
                <td>'.$row['rtime'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>

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


<!-- Reservation -->
<div>
<center><h1>Reservations</h1></center>
    <form action="addReservation.php" method="post">
        <p><b>Add a new reservation: </b></p>
        <p>Enter reservation id: <input type="text" name="reserv_id" /></p>
        <p>Enter reservation name: <input type="text" name="cname" /></p>
        <p>Enter reservation party size: <input type="text" name="party_size" /></p>
        <p>Enter reservation date: <input type="date" name="rdate" /></p>
        <p>Enter reservation time: <input type="time" name="rtime" /></p>
        <p><input type="submit" /></p>
    </form>

    <form action="deleteReservation.php" method="post">
        <p><b>Delete a reservation:</b></p>
        <p>Enter reservation id: <input type="text" name="rest_id" /></p>
        <p><input type="submit" /></p>
    </form>
	<b><p>Current reservations:</p></b>
</div>


<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Reservation');";
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

<!-- Make -->
<div>
    <form action="addMake.php" method="post">
        <p><b>Add a new reserved table: </b></p>
        <p>Enter reservation id: <input type="text" name="reserv_id" /></p>
        <p>Enter table number: <input type="text" name="c_table" /></p>
        <p><input type="submit" /></p>
    </form>

    <form action="deleteMake.php" method="post">
        <p><b>Delete a reserved table:</b></p>
        <p>Enter reservation id: <input type="text" name="reserv_id" /></p>
        <p>Enter table number: <input type="text" name="c_table" /></p>
        <p><input type="submit" /></p>
    </form>
</div>


<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Make');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Reservation ID</th>
                <th>Table Number</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['reserv_id'].'</td>
                <td>'.$row['c_table'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>

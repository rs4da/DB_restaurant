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
 <p>Orders</p>

 <form action="addOrder.php" method="post">
 <p><b>Add a new order: </b></p>
 <p>Enter restaurant id: <input type="text" name="rest_id" /></p>
 <p>Enter food name: <input type="text" name="food" /></p>
 <p>Enter table number: <input type="text" name="c_table" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteOrder.php" method="post">
 <p><b>Delete an order:</b></p>
 <p>Enter restaurant id: <input type="text" name="rest_id" /></p>
 <p>Enter food name: <input type="text" name="food" /></p>
 <p>Enter table number: <input type="text" name="c_table" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>Current orders: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Orders');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Restaurant ID</th>
                <th>Food Name</th>
		<th>Table Number</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['rest_id'].'</td>
                <td>'.$row['food'].'</td>
                <td>'.$row['c_table'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>
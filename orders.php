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
 <p>Orders</p>
</center>
 <form action="addOrder.php" method="post">
 <p><b>Open a new order: </b></p>
 <p>Enter order id: <input type="text" name="order_id" /></p>
 <p>Enter food name: <input type="text" name="food" /></p>
 <p>Enter customer phone number: <input type="text" name="phone_num" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteOrder.php" method="post">
 <p><b>Close an order:</b></p>
 <p>Enter order id: <input type="text" name="order_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>Current orders: </b></p>

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
                <th>Order ID</th>
                <th>Food Name</th>
		<th>Customer Phone Number</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['order_id'].'</td>
                <td>'.$row['food'].'</td>
                <td>'.$row['phone_num'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>
</div>
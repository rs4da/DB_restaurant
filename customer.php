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
 <center><h1>Customer Info</center></h1>

 <form action="addCustomer.php" method="post">
 <p><b>Add a new customer: </b></p>
 <p>Enter customer's phone number: <input type="text" name="phone_num" /></p>
 <p>Enter table number: <input type="text" name="c_table" /></p>
 <p>Enter customer name: <input type="text" name="cname" /></p>
 <p>Enter bill id: <input type="text" name="bill_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteCustomer.php" method="post">
 <p><b>Delete customer info:</b></p>
 <p>Enter customer's phone number: <input type="text" name="phone_num" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>All current Tavola customers: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Customer');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Phone Number</th>
		<th>Table Number</th>
                <th>Customer Name</th>
		<th>Bill ID</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['phone_num'].'</td>
                <td>'.$row['c_table'].'</td>
                <td>'.$row['cname'].'</td>
                <td>'.$row['bill_id'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>

<div>
 <p>Which Tavola location each customer is eating at</p>

 <form action="addCustomerAtLocation.php" method="post">
 <p><b>Add a new customer: </b></p>
 <p>Enter customer's phone number: <input type="text" name="phone_num" /></p>
 <p>Enter restaurant id: <input type="text" name="rest_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteCustomerAtLocation.php" method="post">
 <p><b>Delete an employee:</b></p>
 <p>Enter customer's phone number: <input type="text" name="phone_num" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>Where current Tavola customers are eating: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Eat_at');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Phone Number</th>
                <th>Restaurant ID</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['phone_num'].'</td>
                <td>'.$row['rest_id'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>

<div>
 <p>Who is serving each customer</p>

 <form action="addServer.php" method="post">
 <p><b>Add a new server: </b></p>
 <p>Enter serve id: <input type="text" name="serve_id" /></p>
 <p>Enter employee id: <input type="text" name="emp_id" /></p>
 <p>Enter customer's phone number: <input type="text" name="phone_num" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteServer.php" method="post">
 <p><b>Delete a server:</b></p>
 <p>Enter serve id: <input type="text" name="serve_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>Who current Tavola customers are being served by: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Serve');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Serve ID</th>
                <th>Employee ID</th>
                <th>Customer Phone Number</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['serve_id'].'</td>
                <td>'.$row['emp_id'].'</td>
		<td>'.$row['phone_num'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>
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
 <center><h1>Employee Info</center></h1>

 <form action="addEmployee.php" method="post">
 <p><b>Add a new employee: </b></p>
 <p>Enter employee id: <input type="text" name="emp_id" /></p>
 <p>Enter employee name: <input type="text" name="ename" /></p>
 <p>Enter employee wage: <input type="text" name="wage" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteEmployee.php" method="post">
 <p><b>Delete employee info:</b></p>
 <p>Enter employee id: <input type="text" name="emp_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>All current Tavola employees: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Employee');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
		<th>Wage</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['emp_id'].'</td>
                <td>'.$row['ename'].'</td>
                <td>'.$row['wage'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>

<div>
 <p>Which Tavola location each employee works</p>

 <form action="addEmployeeAtLocation.php" method="post">
 <p><b>Add a new employee: </b></p>
 <p>Enter restaurant id: <input type="text" name="rest_id" /></p>
 <p>Enter employee id: <input type="text" name="emp_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="deleteEmployeeAtLocation.php" method="post">
 <p><b>Delete an employee:</b></p>
 <p>Enter employee id: <input type="text" name="emp_id" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>Where current Tavola employees work: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Hire');";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Restaurant ID</th>
                <th>Employee ID</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['rest_id'].'</td>
                <td>'.$row['emp_id'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';
    
    mysqli_close($con);
?>

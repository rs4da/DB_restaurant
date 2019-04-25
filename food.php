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
<center><h1>Dishes</h1></center>

 <form action="FoodInsert.php" method="post">
 <p><b>Add a new dish: </b></p>
 <p>Dish name: <input type="text" name="fname" /></p>
 <p>Dietary restriction: <input type="text" name="diet_res" /></p>
 <p>Price: <input type="text" name="price" /></p>
 <p><input type="submit" /></p>
 </form>

 <form action="FoodDelete.php" method="post">
 <p><b>Delete a dish:</b></p>
 <p>Dish name: <input type="text" name="fname" /></p>
 <p><input type="submit" /></p>
 </form>

 <p><b>Current menu: </b></p>
</div>

<?php
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " .
        mysqli_connect_error());
        return null;
    }

    $sql="CALL SelectTable('Food')";
    $result = mysqli_query($con,$sql);

    echo '
        <table>
            <tr>
                <th>Dish name</th>
                <th>Dietary restriction</th>
		            <th>Price</th>
            </tr>';
    while($row = mysqli_fetch_array($result)) {
        echo '
            <tr>
                <td>'.$row['fname'].'</td>
                <td>'.$row['diet_res'].'</td>
                <td>'.$row['price'].'</td>
            </tr>';
        echo "<br>";
    }

    echo '
        </table>';

    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel ="stylesheet" href ="main.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Infant|Gilda+Display|Raleway+Dots|Love+Ya+Like+A+Sister|Reenie+Beanie|Fredericka+the+Great|Shadows+Into+Light+Two|Major+Mono+Display|Bilbo|Architects+Daughter|Sacramento|Marck+Script|Thasadith|Open+Sans+Condensed:300" rel="stylesheet">
    <title>Database Project</title>
    <script type="text/javascript">

    </script>
  </head>

    <!-- Title -->
  <body style="background-color: #faf4ff;">
    <header>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="background-color:transparent !important">
        <a class="navbar-brand" href="admin.php" style="text-shadow: 0 0 10px #9d81d1 , 0 0 10px #1d0f51 , 0 0 10px #1d0f51 , 0 0 10px #9d81d1;">Tavola Italian Kitchen</a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" style="font-color:#ffffff; font-size: 30px;">Orders</a>
                </li>
            </ul>
        </div>
    </nav>
    </header>
<div>

<div class="col-sm-6 offset-sm-3 text-center">
<div class="form-group">
    <form action="addOrder.php" method="POST" enctype="multipart/form-data">
    <p style="font-size: 35px; margin-top: 25px; font-family: 'Garamond';"><b>Add a new order:</b></p>
        <div class="form-group row" style="margin: 1px; padding: 3px;">
            <label for="example-text-input" class="col-5 col-form-label">Enter order id:</label>
            <div class="col-7">
                <input class="form-control" type="text" name="order_id">
            </div>
        </div>

        <div class="form-group row" style="margin: 1px; padding: 3px;">
            <label for="example-search-input" class="col-5 col-form-label">Enter food:</label>
            <div class="col-7">
                <input class="form-control" type="text" name="food">
            </div>
        </div>

        <div class="form-group row" style="margin: 1px; padding: 3px;">
            <label for="example-email-input" class="col-5 col-form-label">Enter phone number:</label>
            <div class="col-7">
                <input class="form-control" type="text" name="phone_num">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px; background-color: #9c63f2; border-color: #9c63f2;">Submit</button>
    </form>

    <form action="deleteOrder.php" method="post">
        <p style="font-size: 35px; margin-top: 25px; font-family: 'Garamond';"><b>Delete an order:</b></p>

        <div class="form-group row" style="margin: 1px; padding: 3px">
            <label for="example-tel-input" class="col-5 col-form-label">Enter order id:</label>
            <div class="col-7">
                <input class="form-control" type="text" name="order_id">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px; background-color: #9c63f2; border-color: #9c63f2;">Submit</button>
    </form>

</div>
</div>


<div class="d-flex flex-column p-1 justify-content-center text-center">

<b style="font-size: 35px; margin-top: 25px; font-family: 'Garamond';"><p>Current orders:</p></b>
<form action="OrdersSelect.php" method="get">
  <input type="submit" class="btn btn-primary" style="margin-top: 10px; background-color: #9c63f2; border-color: #9c63f2;" value="Download table">
</form>

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
    <div style="line-height:0;">
        <table class="table table-hover" style="margin: auto; width: 80%;">
            <thead>
                <tr>
                    <th style="padding: 25px 0px 25px 0px;">Order ID</th>
                    <th style="padding: 25px 0px 25px 0px;">Food Name</th>
                    <th style="padding: 25px 0px 25px 0px;">Phone Number</th>
                </tr>
            </thead>';
    while($row = mysqli_fetch_array($result)) {
        echo '
        <tbody>
            <tr>
                <td style="padding: 25px 0px 25px 0px;">'.$row['order_id'].'</td>
                <td style="padding: 25px 0px 25px 0px;">'.$row['food'].'</td>
                <td style="padding: 25px 0px 25px 0px;">'.$row['phone_num'].'</td>
            </tr>
        </tbody>';
        echo "<br>";
    }

    echo '
        </table>
        </div>';

    mysqli_close($con);
?>

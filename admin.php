<!-- Sumin Kim (sk5gz)
     Jeanie Huynh (gyh3nf)
     Cherokee Toole (​crt5qz)
     Roman Sharykin (​rs4da)  -->


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
        function setFocus() // sets focus on the search box
        {
          document.forms[0].elements[0].focus();
        }

        function validateInfo() { // displays a message when search button is clicked without any input
          var search = document.getElementById("search").value;
          if (search.length == 0) {
            document.getElementById("searcherror").innerHTML = "Please enter the name of an item";
            document.getElementById("search").focus();
            return false;
          }
          else {
            return true;
          }
        }
    </script>
  </head>

    <!-- Title -->
  <body background="" onload="setFocus()">
    <header>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="background-color:transparent !important">
        <a class="navbar-brand" href="index.html" style="text-shadow: 0 0 10px #9d81d1 , 0 0 10px #1d0f51 , 0 0 10px #1d0f51 , 0 0 10px #9d81d1;">Tavola Italian Kitchen</a>
      </nav>
    </header>

    <!-- Boxes displaying item categories -->
<center> 
   <div class="container">
        <div class="row">
            <div class="col-md-4">
	    <form action="restaurantTable.php" method="post">
            <a id="link" href="about.php">
                <div class="categoryproducts">
                    <h3>About Restaurant</h3>
                    <p>Data about this restaurant
                    </p>
                </div>
            </a>
            </div>
            <div class="col-md-4">
            <a id="link" href="reservations.php">
                <div class="categoryproducts">
                    <h3>Reservations</h3>
                    <p>Data about reservations made
                    </p>
                </div>
            </a>
            </div>
            <div class="col-md-4">
            <a id="link" href="orders.php">
                <div class="categoryproducts">
                    <h3>Menu Orders</h3>
                    <p>Data about current orders
                    </p>
                </div>
            </a>
            </div>
            <div class="col-md-4">
            <a id="link" href="food.php">
                <div class="categoryproducts">
                    <h3>Dishes</h3>
                    <p>Data about the dishes we serve
                    </p>
                </div>
            </a>
            </div>
            <div class="col-md-4">
            <a id="link" href="customer.php">
                <div class="categoryproducts">
                    <h3>Customers</h3>
                    <p>Data about customers
                    </p>
                </div>
            </a>
            </div>
            <div class="col-md-4">
            <a id="link" href="employee.php">
                <div class="categoryproducts">
                    <h3>Employees</h3>
                    <p>Data about employees
                    </p>
                </div>
            </a>
            </div>
      </div>
<p><a href="index.html">Log out</a></p>
</center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  </body>
</html>

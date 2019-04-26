<?php ini_set('display_errors',1); ?>
<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      //Check connection
      if (mysqli_connect_errno())
   {
      //echo "Failed to connect to MySQL: " .
   mysqli_connect_error();
   }     
	// Form the SQL query (a SELECT query)
   $sql = "SELECT * FROM users WHERE username = '$_POST[uname]' and password = '$_POST[psw]'";
   $result = mysqli_query($con, $sql);
   $count = mysqli_num_rows($result);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }

   if($count == 1){
	if($row['role'] == "admin"){
		header("Location: admin.php");	
	}
	else{
		header("Location: employeePage.php");
	}	
   }
   else{
	$error = "Your username or password is invalid.";
	header("Location: login.html");
   }
    mysqli_close($con);
?>

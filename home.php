<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

$servername = "10.16.16.1";
$username = "bench-hu1-u-109501";
$password = "nDfMr^hnK";

 // select loggedin users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);

if (!$userRow) {
  $_SESSION["userName"] = "Guest";
} 



// Create connection
$conn = mysqli_connect($servername, $username, $password);

$db_found = mysqli_select_db($conn, $username);



$SQL = "SELECT * FROM survey_index";
$result = mysqli_query($conn, $SQL);

$surveys= array(); // create a new array


while ( $db_field = mysqli_fetch_assoc($result) ) {

  array_push($surveys, $db_field);

}



?>


<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Template Page</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="style.css">

  </head>
<body>
  <script src="https://code.jquery.com/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container">
  <div class="jumbotron">
    <h1>Benchmark</h1>
      <hr />
    <h4>Investigate. Participate.</h4>
  </div> <!-- /jumbotron -->
    <p class="login-details">logged in as <?php echo $_SESSION["userName"]; ?></p> 
  <!--content in here -->
       
 

        <h5>this is the home area</h5>

<div class="well">
<ul>
<?php

foreach ($surveys[0] as $key => $value) {
  if ($key == "survey_name") { echo "<li><button>This survey is called " . $value . "<br />";}
  if ($key == "creator") { echo "It was created by " . $value . "</button></li>";}
} 


?>
</ul>
</div>





        
<?php if ($_SESSION["userName"] == "Guest") {

echo "<p>Please sign in to create new surveys</p>";
echo '<a href="index.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Sign In</a>';

} else {
echo '<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>';

}
?>
  
  </div> <!-- /container -->
  </body>
</html>
<?php ob_end_flush(); ?>













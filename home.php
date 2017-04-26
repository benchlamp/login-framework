<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 // select loggedin users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);

if (!$userRow) {
  $_SESSION["userName"] = "Guest";
} 


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>



 <div id="wrapper">

 <div class="container">
    
     <div class="jumbotron">
     <h3>logged in as <?php echo $_SESSION["userName"]; ?></h3>
     </div>
        <div class="row">
        <div class="col-lg-12">
        <p>this is the home area</p>

<?php if ($_SESSION["userName"] == "Guest") {

echo "<p>Please sign in to create new surveys</p>";
echo '<a href="index.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Sign In</a>';

} else {
echo '<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>';

}
?>


        </div>
        </div>
    
    </div>
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
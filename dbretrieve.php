<?php


$servername = "10.16.16.1";
$username = "bench-hu1-u-109501";
$password = "nDfMr^hnK";


// Create connection
$conn = mysqli_connect($servername, $username, $password);

$db_found = mysqli_select_db($conn, $username);



$SQL = "SELECT * FROM survey_index";
$result = mysqli_query($conn, $SQL);


while ( $db_field = mysqli_fetch_assoc($result) ) {

foreach($db_field as $key => $val) {
    echo $key . " = " . $val . "<br/>";
}

}



?>
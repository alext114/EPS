<?php

$servername = "teaneckcinemascom.startlogicmysql.com";
$username = "teaneckcinemas";
$password = "503cedarlane";
$database="sapeps_database";


//connect to database using mysqli

// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  //echo "Connected";
}

?>

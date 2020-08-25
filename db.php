<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql_dashboard";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//add db
$adconn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($adconn->connect_error) {
  die("Connection failed: " . $adconn->connect_error);
}
?>
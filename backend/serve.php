<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="lh_booker";

// $servername = "sql100.epizy.com";
// $username = "epiz_27942028";
// $password = "SsO9e1XSMZ8WDO";
// $db="epiz_27942028_lhbookings";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
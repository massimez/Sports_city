<?php
$servername   = "localhost";
$database = "City_Sports";
$username = "padmin";
$password = "change-with-your-secure-password";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Could not connect to the database!" . $conn->connect_error);
}

?>
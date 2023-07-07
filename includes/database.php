<?php

// Database connection
$servername = "127.0.0.1";
$username = "student";
$password = "Q1w2e3r4t5";
$dbname = "myTranslate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Display error message and exit if connection failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
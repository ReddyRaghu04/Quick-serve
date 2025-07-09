<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'smart_restaurant';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Oops! Unable to connect to the database.");
}

// Set UTF-8 encoding
$conn->set_charset("utf8");
?>

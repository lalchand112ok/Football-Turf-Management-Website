<?php
// Database connection (replace with your own credentials)
$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hillturf";
$port = 3307; // Adjust the port if needed for your setup

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname, $port);
?>
<?php
// Start the session
session_start();

// Database connection (adjust to your database credentials)
include 'config.php';

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if plan is selected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_plan = mysqli_real_escape_string($conn, $_POST['plan']);
    $user_email = $_SESSION['user']; // Assuming the user is logged in

    // Store the selected plan in the database
    $query = "INSERT INTO user_plans (user_email, selected_plan) VALUES ('$user_email', '$selected_plan')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('You have selected the $selected_plan plan.');</script>";
        // Optionally redirect to a success or confirmation page
        // header("Location: success.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

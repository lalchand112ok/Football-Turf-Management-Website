<?php
// Database connection
include 'config.php';

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $selected_plan = mysqli_real_escape_string($conn, $_POST['plan']);

    // Check if the user is already registered with the same email
    $check_user_query = "SELECT * FROM user_plans WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_user_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Update plan if the user already exists
        $update_query = "UPDATE user_plans SET selected_plan='$selected_plan' WHERE email='$email'";
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Your plan has been updated to $selected_plan.'); window.location.href='success.php';</script>";
        } else {
            echo "<script>alert('Error updating plan: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        // Register new user and insert plan
        $insert_query = "INSERT INTO user_plans (name, email, selected_plan) VALUES ('$name', '$email', '$selected_plan')";
        if (mysqli_query($conn, $insert_query)) {
            echo "<script>alert('You have successfully selected the $selected_plan plan.'); window.location.href='success.php';</script>";
        } else {
            echo "<script>alert('Error registering plan: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

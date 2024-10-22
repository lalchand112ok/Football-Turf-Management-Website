<?php
// Database connection
$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hillturf";
$port = 3307;

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $turf_type = mysqli_real_escape_string($conn, $_POST['turf-type']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment-method']);

    // Calculate total price based on turf type rate and duration
    $rate_query = "SELECT * FROM turf_types WHERE turf_type = '$turf_type'";
    $rate_result = mysqli_query($conn, $rate_query);
    $row = mysqli_fetch_assoc($rate_result);
    $rate_per_hour = $row['rate_per_hour'];

    $total_price = $rate_per_hour * $duration;

    // Insert booking into database
    $insert_query = "INSERT INTO bookings (name, email, date, time, turf_type, duration, total_price, payment_method)
                     VALUES ('$name', '$email', '$date', '$time', '$turf_type', '$duration', '$total_price', '$payment_method')";

    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Booking Successful! Total price: $$total_price. Your payment method is $payment_method.'); window.location.href='success.php';</script>";
    } else {
        echo "<script>alert('Error booking: " . mysqli_error($conn) . "');</script>";
    }
}

$conn->close();
?>

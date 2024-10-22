<?php
// Start the session
session_start();

// Database connection (replace with your own credentials)
$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hillturf";
$port = 3307; // Adjust the port if needed for your setup

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $booking_date = mysqli_real_escape_string($conn, $_POST['date']);
    $booking_time = mysqli_real_escape_string($conn, $_POST['time']);
    $turf_type = mysqli_real_escape_string($conn, $_POST['turf-type']);

    // Insert booking into the database
    $query = "INSERT INTO bookings (name, email, booking_date, booking_time, turf_type) 
              VALUES ('$name', '$email', '$booking_date', '$booking_time', '$turf_type')";
    $conn->query($query);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now - Turf Management System</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
    <!-- Book Now Section -->
    <section id="book-now" class="book-now-section">
        <div class="container">
            <h2>Book Your Turf Now</h2>
            <p>Fill out the form below to reserve your turf space. We will get back to you to confirm your booking.</p>

            <form id="booking-form" method="POST" action="">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>

                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Time</label>
                <input type="time" id="time" name="time" required>

                <label for="turf-type">Turf Type</label>
                <select id="turf-type" name="turf-type" required>
                    <option value="" disabled selected>Select Turf Type</option>
                    <option value="5-a-side">5-a-side</option>
                    <option value="7-a-side">7-a-side</option>
                    <option value="full-size">Full Size</option>
                </select>

                <button type="submit" class="btn">Book Now</button>
            </form>
        </div>
    </section>
</body>
</html>

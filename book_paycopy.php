<!--main-->

<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "hillturf"; // Replace with your database name
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $date = isset($_POST['date']) ? $conn->real_escape_string($_POST['date']) : '';
    $time = isset($_POST['time']) ? $conn->real_escape_string($_POST['time']) : '';
    $turf_type = isset($_POST['turf_type']) ? $conn->real_escape_string($_POST['turf_type']) : '';
    $duration = isset($_POST['duration']) ? (int)$conn->real_escape_string($_POST['duration']) : 0;

    // Calculate total price based on turf type and duration
    $rate = 0;
    if ($turf_type == "5-a-side") {
        $rate = 800;
    } elseif ($turf_type == "7-a-side") {
        $rate = 1500;
    } elseif ($turf_type == "full-size") {
        $rate = 2000;
    }

    $total_price = $rate * $duration;

    // Insert data into the database
    $sql = "INSERT INTO bookingsss (name, email, `date`, `time`, turf_type, duration, total_price)
            VALUES ('$name', '$email', '$date', '$time', '$turf_type', '$duration', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success page or show confirmation message
        header("Location: booking_success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
